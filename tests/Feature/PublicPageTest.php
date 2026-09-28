<?php

use App\Models\Pengurus;

test('landing page renders the shared public footer', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Tautan Navigasi')
        ->assertSee('NU BANJARANYAR');
});

test('profil page groups pengurus by badan otonom', function () {
    Pengurus::create([
        'nama' => 'Ahmad Fauzi',
        'jabatan' => 'Ketua',
        'banom' => 'ranting',
        'label_banom' => 'Ranting NU',
        'urutan' => 1,
    ]);

    Pengurus::create([
        'nama' => 'Zahra Aulia',
        'jabatan' => 'Anggota',
        'banom' => 'ipnu',
        'label_banom' => 'PR IPNU',
        'urutan' => 2,
    ]);

    $this->get('/profil')
        ->assertOk()
        ->assertSee('Profil Organisasi')
        ->assertSee('Ranting NU')
        ->assertSee('PR IPNU')
        ->assertSee('Ahmad Fauzi')
        ->assertSee('Zahra Aulia')
        ->assertSee('Pilih badan otonom yang ingin dilihat susunan pengurusnya')
        ->assertSee(route('landing'), false);
});

test('profil page shows visi, misi, and the short history for first time visitors', function () {
    $this->get('/profil')
        ->assertOk()
        ->assertSee('Visi & Misi')
        ->assertSee('Misi: 5 langkah utama')
        ->assertSee('Sejarah Singkat')
        ->assertSee('Awal Mula dan Tradisi Pesantren')
        ->assertSee('Tonggak penting yang perlu diketahui')
        ->assertSee('href="#visi-misi"', false)
        ->assertSee('href="#sejarah"', false)
        ->assertSee('Ketuk salah satu judul di atas')
        ->assertSee('aria-label="Kembali ke atas halaman"', false);
});

test('profil page shows an empty state without any pengurus', function () {
    $this->get('/profil')
        ->assertOk()
        ->assertSee('Data pengurus belum tersedia.')
        ->assertDontSee('href="#struktur"', false);
});

test('galeri page renders the shared public head and footer', function () {
    $this->get('/galeri')
        ->assertOk()
        ->assertSee('Dokumentasi rekam jejak')
        ->assertSee('Tautan Navigasi')
        ->assertSee('NU BANJARANYAR');
});
