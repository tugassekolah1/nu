<?php

use App\Models\Pengurus;

test('landing page renders the shared public footer', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Tautan Navigasi')
        ->assertSee('NU BANJARANYAR');
});

test('landing page shows the core pengurus inti section', function () {
    Pengurus::create([
        'nama' => 'Ahmad Fauzi',
        'jabatan' => 'Ketua',
        'banom' => 'mwcnu',
        'label_banom' => 'MWCNU',
        'urutan' => 1,
    ]);

    Pengurus::create([
        'nama' => 'Bambang Anggota',
        'jabatan' => 'Anggota',
        'banom' => 'mwcnu',
        'label_banom' => 'MWCNU',
        'urutan' => 5,
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSee('Pengurus Inti')
        ->assertSee('Ahmad Fauzi')
        ->assertDontSee('Bambang Anggota');
});

test('/profil redirects to the organisasi profil tab', function () {
    $this->get('/profil')
        ->assertRedirect('/organisasi/mwcnu?tab=profil');
});

test('/struktur redirects to the organisasi struktur tab', function () {
    $this->get('/struktur')
        ->assertRedirect('/organisasi/mwcnu?tab=struktur');
});

test('pengurus are listed on the struktur tab of their own organisation', function () {
    Pengurus::create([
        'nama' => 'Ahmad Fauzi',
        'jabatan' => 'Ketua',
        'banom' => 'ranting',
        'label_banom' => 'Ranting NU',
        'urutan' => 1,
    ]);

    Pengurus::create([
        'nama' => 'Zahra Aulia',
        'jabatan' => 'Ketua',
        'banom' => 'pac_ipnu',
        'label_banom' => 'PAC IPNU',
        'urutan' => 2,
    ]);

    $this->get(route('organisasi.show', ['slug' => 'prnu', 'tab' => 'struktur']))
        ->assertOk()
        ->assertSee('Ahmad Fauzi')
        ->assertDontSee('Zahra Aulia');

    $this->get(route('organisasi.show', ['slug' => 'ipnu', 'tab' => 'struktur']))
        ->assertOk()
        ->assertSee('Zahra Aulia')
        ->assertDontSee('Ahmad Fauzi');
});

test('pengurus from an extra banom code appear on the parent organisation page', function () {
    Pengurus::create([
        'nama' => 'Slamet Riyadi',
        'jabatan' => 'Komandan',
        'banom' => 'satkoryon_banser',
        'label_banom' => 'Satkoryon Banser',
        'urutan' => 1,
    ]);

    // Satkoryon Banser menaungi GP Ansor, jadi tampil di halaman GP Ansor.
    $this->get(route('organisasi.show', ['slug' => 'gp-ansor', 'tab' => 'struktur']))
        ->assertOk()
        ->assertSee('Slamet Riyadi');
});

test('struktur pengurus can be filtered by jabatan', function () {
    Pengurus::create([
        'nama' => 'Ahmad Fauzi',
        'jabatan' => 'Ketua',
        'banom' => 'mwcnu',
        'label_banom' => 'MWCNU',
        'urutan' => 1,
    ]);

    Pengurus::create([
        'nama' => 'Budi Santoso',
        'jabatan' => 'Sekretaris',
        'banom' => 'mwcnu',
        'label_banom' => 'MWCNU',
        'urutan' => 2,
    ]);

    $this->get(route('organisasi.show', ['slug' => 'mwcnu', 'tab' => 'struktur', 'jabatan' => 'Sekretaris']))
        ->assertOk()
        ->assertSee('Sekretaris (1)')
        ->assertSee('Budi Santoso')
        ->assertDontSee('Ahmad Fauzi');

    // Nilai jabatan yang tidak dikenal jatuh kembali ke bagan lengkap.
    $this->get(route('organisasi.show', ['slug' => 'mwcnu', 'tab' => 'struktur', 'jabatan' => 'Ngawur']))
        ->assertOk()
        ->assertSee('Ahmad Fauzi')
        ->assertSee('Budi Santoso');
});

test('profil tab shows visi, misi, and the short history for first time visitors', function () {
    $this->get(route('organisasi.show', ['slug' => 'mwcnu', 'tab' => 'profil']))
        ->assertOk()
        ->assertSee('Visi')
        ->assertSee('Misi')
        ->assertSee('Sejarah Singkat')
        ->assertSee('Awal Mula dan Tradisi Pesantren')
        ->assertSee('Tonggak Penting')
        ->assertSee('Pelopor Pendidikan Ma\'arif');
});

test('galeri page renders the shared public head and footer', function () {
    $this->get('/galeri')
        ->assertOk()
        ->assertSee('Dokumentasi rekam jejak')
        ->assertSee('Tautan Navigasi')
        ->assertSee('NU BANJARANYAR');
});
