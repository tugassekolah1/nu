<?php

use App\Models\Pengurus;

test('direktori hanya menampilkan organisasi terverifikasi', function () {
    $this->get(route('organisasi'))
        ->assertOk()
        ->assertSee('Organisasi &amp; Badan Otonom')
        ->assertDontSee('Contoh data')
        ->assertDontSee('Pagar Nusa Nahdlatul Ulama');

    $this->get(route('organisasi', ['q' => 'LAZISNU']))
        ->assertOk()
        ->assertSee('Lembaga Amil Zakat, Infaq, dan Sedekah NU');

    $this->get(route('organisasi', ['kategori' => 'banom']))
        ->assertOk()
        ->assertSee('Gerakan Pemuda Ansor');

    $this->get(route('organisasi', ['q' => 'OrganisasiNgawur']))
        ->assertOk()
        ->assertSee('Tidak ada organisasi yang cocok');
});

test('profil dan struktur organisasi', function () {
    Pengurus::create(['nama' => 'H. Ketua MWC', 'jabatan' => 'Ketua', 'banom' => 'mwcnu', 'label_banom' => 'MWCNU', 'urutan' => 1]);

    $this->get(route('organisasi.show', 'mwcnu'))->assertOk()->assertSee('Sejarah Singkat');
    $this->get(route('organisasi.show', ['slug' => 'mwcnu', 'tab' => 'struktur']))->assertOk()->assertSee('Bagan Struktur Pengurus');
    $this->get(route('organisasi.show', ['slug' => 'mwcnu', 'tab' => 'program']))->assertOk()->assertSee('Program Kerja');
    $this->get('/organisasi/slug-ngawur')->assertNotFound();

    // Belum ada data pengurus → empty state
    $this->get(route('organisasi.show', ['slug' => 'lazisnu', 'tab' => 'struktur']))
        ->assertOk()
        ->assertSee('Data struktur pengurus belum tersedia');
});
