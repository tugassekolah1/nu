<?php

use App\Models\Berita;
use App\Models\User;

test('admin can create berita with jenis and slug', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/admin/berita', [
            'judul' => 'Rapat Kerja NU',
            'slug' => 'rapat-kerja-nu',
            'jenis' => 'Kegiatan',
            'isi' => 'Isi berita rapat kerja.',
            'status' => 1,
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect('/admin/berita');

    $berita = Berita::sole();

    expect($berita->slug)->toBe('rapat-kerja-nu')
        ->and($berita->jenis)->toBe('Kegiatan')
        ->and($berita->user_id)->toBe($user->id);
});

test('slug is generated from judul when slug is left empty', function () {
    $this->actingAs(User::factory()->create())
        ->post('/admin/berita', [
            'judul' => 'Syuriah Gelar Mubes',
            'slug' => '',
            'jenis' => 'Pengumuman',
            'isi' => 'Isi berita mubes.',
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect('/admin/berita');

    expect(Berita::sole()->slug)->toBe('syuriah-gelar-mubes');
});

test('invalid jenis is rejected', function () {
    $this->actingAs(User::factory()->create())
        ->post('/admin/berita', [
            'judul' => 'Berita Validasi Jenis',
            'slug' => 'berita-validasi-jenis',
            'jenis' => 'Opini',
            'isi' => 'Isi berita.',
        ])
        ->assertSessionHasErrors('jenis');
});

test('jenis is required', function () {
    $this->actingAs(User::factory()->create())
        ->post('/admin/berita', [
            'judul' => 'Berita Tanpa Jenis',
            'slug' => 'berita-tanpa-jenis',
            'isi' => 'Isi berita.',
        ])
        ->assertSessionHasErrors('jenis');
});

test('duplicate slug is rejected', function () {
    $user = User::factory()->create();

    Berita::create([
        'judul' => 'Berita Pertama',
        'slug' => 'berita-pertama',
        'jenis' => 'Artikel',
        'isi' => 'Isi berita pertama.',
        'user_id' => $user->id,
        'status' => true,
    ]);

    $this->actingAs($user)
        ->post('/admin/berita', [
            'judul' => 'Berita Kedua',
            'slug' => 'berita-pertama',
            'jenis' => 'Artikel',
            'isi' => 'Isi berita kedua.',
        ])
        ->assertSessionHasErrors('slug');
});

test('admin can update jenis and slug of a berita', function () {
    $user = User::factory()->create();

    $berita = Berita::create([
        'judul' => 'Berita Lama',
        'slug' => 'berita-lama',
        'jenis' => 'Berita',
        'isi' => 'Isi berita lama.',
        'user_id' => $user->id,
        'status' => true,
    ]);

    $this->actingAs($user)
        ->put("/admin/berita/{$berita->id}", [
            'judul' => 'Berita Lama',
            'slug' => 'berita-lama-diubah',
            'jenis' => 'Pengumuman',
            'isi' => 'Isi berita diperbarui.',
            'status' => 1,
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect('/admin/berita');

    expect($berita->refresh()->slug)->toBe('berita-lama-diubah')
        ->and($berita->jenis)->toBe('Pengumuman');
});

test('slug can be left empty on update and is regenerated from judul', function () {
    $user = User::factory()->create();

    $berita = Berita::create([
        'judul' => 'Judul Baru Sekali',
        'slug' => 'judul-baru-sekali-2',
        'jenis' => 'Berita',
        'isi' => 'Isi berita.',
        'user_id' => $user->id,
        'status' => true,
    ]);

    $this->actingAs($user)
        ->put("/admin/berita/{$berita->id}", [
            'judul' => 'Judul Baru',
            'slug' => '',
            'jenis' => 'Kegiatan',
            'isi' => 'Isi berita.',
            'status' => 1,
        ])
        ->assertSessionHasNoErrors();

    expect($berita->refresh()->slug)->toBe('judul-baru');
});

test('berita form shows jenis options and slug field', function () {
    $content = $this->actingAs(User::factory()->create())
        ->get('/admin/berita/create')
        ->assertOk()
        ->assertSee('name="slug"', false)
        ->assertSee('name="jenis"', false)
        ->getContent();

    foreach (Berita::JENIS as $jenis) {
        expect($content)->toContain('value="'.$jenis.'"');
    }
});

test('admin berita list shows jenis and slug', function () {
    $user = User::factory()->create();

    Berita::create([
        'judul' => 'Berita Ditampilkan',
        'slug' => 'berita-ditampilkan',
        'jenis' => 'Pengumuman',
        'isi' => 'Isi berita.',
        'user_id' => $user->id,
        'status' => true,
    ]);

    $this->actingAs($user)
        ->get('/admin/berita')
        ->assertOk()
        ->assertSee('Pengumuman')
        ->assertSee('/berita-ditampilkan', false);
});

test('public berita detail page shows jenis', function () {
    $user = User::factory()->create();

    $berita = Berita::create([
        'judul' => 'Berita Publik',
        'slug' => 'berita-publik',
        'jenis' => 'Pengumuman',
        'isi' => 'Isi berita publik.',
        'user_id' => $user->id,
        'status' => true,
    ]);

    $this->get("/berita/{$berita->slug}")
        ->assertOk()
        ->assertSee('Pengumuman');
});

function seedBeritasForSearch(): User
{
    $user = User::factory()->create();

    Berita::create([
        'judul' => 'Rapat Koordinasi',
        'slug' => 'rapat-koordinasi',
        'jenis' => 'Kegiatan',
        'isi' => 'Agenda rapat koordinasi pengurus.',
        'user_id' => $user->id,
        'status' => true,
    ]);

    Berita::create([
        'judul' => 'Syuriah Gelar Mubes',
        'slug' => 'syuriah-gelar-mubes',
        'jenis' => 'Pengumuman',
        'isi' => 'Pengumuman mubes tahunan.',
        'user_id' => $user->id,
        'status' => true,
    ]);

    Berita::create([
        'judul' => 'Draft Internal',
        'slug' => 'draft-internal',
        'jenis' => 'Artikel',
        'isi' => 'Artikel yang belum dipublish.',
        'user_id' => $user->id,
        'status' => false,
    ]);

    return $user;
}

test('admin can search berita by judul, slug, and isi', function () {
    $user = seedBeritasForSearch();

    $this->actingAs($user)
        ->get('/admin/berita?q=mubes')
        ->assertOk()
        ->assertSee('Syuriah Gelar Mubes')
        ->assertDontSee('Rapat Koordinasi')
        ->assertDontSee('Draft Internal');

    $this->actingAs($user)
        ->get('/admin/berita?q=rapat-koordinasi')
        ->assertOk()
        ->assertSee('Rapat Koordinasi')
        ->assertDontSee('Syuriah Gelar Mubes');

    $this->actingAs($user)
        ->get('/admin/berita?q=agenda+rapat')
        ->assertOk()
        ->assertSee('Rapat Koordinasi')
        ->assertDontSee('Syuriah Gelar Mubes');
});

test('admin can filter berita by jenis', function () {
    $user = seedBeritasForSearch();

    $this->actingAs($user)
        ->get('/admin/berita?jenis=Kegiatan')
        ->assertOk()
        ->assertSee('Rapat Koordinasi')
        ->assertDontSee('Syuriah Gelar Mubes')
        ->assertDontSee('Draft Internal');
});

test('unknown jenis filter is ignored on the admin list', function () {
    $user = seedBeritasForSearch();

    $this->actingAs($user)
        ->get('/admin/berita?jenis=TidakAda')
        ->assertOk()
        ->assertSee('Rapat Koordinasi')
        ->assertSee('Syuriah Gelar Mubes')
        ->assertSee('Draft Internal');
});

test('admin search shows empty state when nothing matches', function () {
    $user = seedBeritasForSearch();

    $this->actingAs($user)
        ->get('/admin/berita?q=zzzzz')
        ->assertOk()
        ->assertDontSee('Rapat Koordinasi')
        ->assertSee('Tidak ada berita yang cocok dengan pencarian Anda.');
});

test('public berita list can be searched', function () {
    seedBeritasForSearch();

    $this->get('/berita?q=mubes')
        ->assertOk()
        ->assertSee('Hasil Pencarian')
        ->assertSee('Syuriah Gelar Mubes')
        ->assertDontSee('Rapat Koordinasi');
});

test('public berita list can be filtered by jenis', function () {
    seedBeritasForSearch();

    $this->get('/berita?jenis=Kegiatan')
        ->assertOk()
        ->assertSee('Rapat Koordinasi')
        ->assertDontSee('Syuriah Gelar Mubes');
});

test('public search never shows draft berita', function () {
    seedBeritasForSearch();

    $this->get('/berita?q=internal')
        ->assertOk()
        ->assertDontSee('Draft Internal');
});

test('public search shows empty state when nothing matches', function () {
    seedBeritasForSearch();

    $this->get('/berita?q=zzzzz')
        ->assertOk()
        ->assertSee('Tidak ada berita yang cocok dengan pencarian Anda.');
});

test('search and jenis filters are kept in the public pagination links', function () {
    $user = seedBeritasForSearch();

    foreach (range(1, 6) as $i) {
        Berita::create([
            'judul' => "Berita Tambahan {$i}",
            'slug' => "berita-tambahan-{$i}",
            'jenis' => 'Artikel',
            'isi' => 'Isi berita tambahan.',
            'user_id' => $user->id,
            'status' => true,
        ]);
    }

    $this->get('/berita?q=berita&jenis=Artikel')
        ->assertOk()
        ->assertSee('page=2', false);
});

test('public berita list renders the editorial layout when there is no search', function () {
    seedBeritasForSearch();

    $this->get('/berita')
        ->assertOk()
        ->assertSee('Kabar Lainnya')
        ->assertDontSee('Hasil Pencarian');
});
