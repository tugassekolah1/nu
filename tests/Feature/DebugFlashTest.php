<?php

use App\Models\User;

test('debug flash lifecycle', function () {
    $this->actingAs(User::factory()->create())
        ->from(route('pengurus.create'))
        ->post(route('pengurus.store'), [
            'nama' => 'Budi Santoso',
            'jabatan' => '',
            'banom' => 'pac_ipnu',
        ])
        ->assertSessionHasErrors('jabatan');

    $afterPost = [
        'has_errors' => session()->has('errors'),
        'errors_type' => gettype(session()->get('errors')),
        'errors_keys' => is_array(session()->get('errors')) ? array_keys(session()->get('errors')) : null,
        'errors_class' => is_object(session()->get('errors')) ? get_class(session()->get('errors')) : null,
        'flash_new' => session()->get('_flash.new'),
        'flash_old' => session()->get('_flash.old'),
        'old_input' => session()->get('_old_input'),
    ];

    $response = $this->get(route('pengurus.create'));

    $afterGet = [
        'has_errors' => session()->has('errors'),
        'errors_type' => gettype(session()->get('errors')),
        'errors_count' => is_object(session()->get('errors')) ? session()->get('errors')->count() : null,
        'flash_new' => session()->get('_flash.new'),
        'flash_old' => session()->get('_flash.old'),
        'old_input' => session()->get('_old_input'),
        'view_has_block' => str_contains($response->getContent(), 'Terjadi kesalahan pada inputan:'),
        'view_has_old' => str_contains($response->getContent(), 'value="Budi Santoso"'),
    ];

    dump(['AFTER_POST' => $afterPost, 'AFTER_GET' => $afterGet]);
});
