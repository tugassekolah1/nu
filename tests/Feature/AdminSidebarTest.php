<?php

use App\Models\User;

test('admin dashboard renders the grouped sidebar menu', function () {
    $this->actingAs(User::factory()->admin()->create())
        ->get('/dashboard')
        ->assertOk()
        ->assertSee('Utama')
        ->assertSee('Konten')
        ->assertSee('Organisasi')
        ->assertSee('Keuangan')
        ->assertSee('Manajemen Berita')
        ->assertSee('Galeri')
        ->assertSee(route('members.index'), false)
        ->assertSee(route('admin.infaq.index'), false)
        ->assertSee(route('profile.edit'), false);
});

test('non admin dashboard sidebar links to the public infaq page', function () {
    $this->actingAs(User::factory()->create())
        ->get('/dashboard')
        ->assertOk()
        ->assertSee('Keuangan')
        ->assertSee(route('infaq.index'), false)
        ->assertDontSee(route('admin.infaq.index'), false);
});

test('admin infaq page renders the sidebar shell', function () {
    $this->actingAs(User::factory()->admin()->create())
        ->get('/admin/infaq')
        ->assertOk()
        ->assertSee('Manajemen Berita')
        ->assertSee('Keluar');
});

test('profile page renders the sidebar shell', function () {
    $this->actingAs(User::factory()->create())
        ->get('/profile')
        ->assertOk()
        ->assertSee('Manajemen Berita')
        ->assertSee('Profil');
});

test('sidebar marks the active menu item on both desktop and mobile sidebars', function () {
    $html = $this->actingAs(User::factory()->admin()->create())
        ->get('/admin/infaq')
        ->assertOk()
        ->getContent();

    expect(preg_match_all('/<nav[^>]*data-sidebar-nav/', $html))->toBe(2)
        ->and(preg_match_all('/<a[^>]*aria-current="page"/', $html))->toBe(2)
        ->and($html)->toMatch('/<a href="[^"]*admin\/infaq"[^>]*aria-current="page"/');
});

test('sidebar marks the dashboard item instead when no other menu is active', function () {
    $html = $this->actingAs(User::factory()->admin()->create())
        ->get('/dashboard')
        ->assertOk()
        ->getContent();

    expect(preg_match_all('/<a[^>]*aria-current="page"/', $html))->toBe(2)
        ->and($html)->toMatch('/<a href="[^"]*\/dashboard"[^>]*aria-current="page"/');
});
