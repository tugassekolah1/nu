<?php

use App\Models\Agenda;
use App\Models\User;

test('admin can open the agenda edit page', function () {
    $agenda = Agenda::create([
        'title'      => 'Agenda Uji Edit',
        'category'   => 'Kegiatan',
        'event_date' => now()->addDays(5)->toDateString(),
        'event_time' => '19:00 WIB',
        'location'   => 'Aula Ranting',
    ]);

    $this->actingAs(User::factory()->create())
        ->get(route('agenda.edit', $agenda))
        ->assertOk()
        ->assertSee('Agenda Uji Edit');
});

test('admin can update an agenda', function () {
    $agenda = Agenda::create([
        'title'      => 'Agenda Sebelum Update',
        'category'   => 'Kegiatan',
        'event_date' => now()->addDays(5)->toDateString(),
    ]);

    $this->actingAs(User::factory()->create())
        ->from(route('agenda.edit', $agenda))
        ->put(route('agenda.update', $agenda), [
            'title'       => 'Agenda Sesudah Update',
            'category'    => 'Pengajian',
            'event_date'  => now()->addDays(7)->toDateString(),
            'event_time'  => '20:00 WIB',
            'location'    => 'Masjid Utama',
            'description' => 'Deskripsi baru',
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('agenda.index'));

    expect($agenda->fresh()->title)->toBe('Agenda Sesudah Update');
});

test('admin can delete an agenda', function () {
    $agenda = Agenda::create([
        'title'      => 'Agenda Untuk Dihapus',
        'category'   => 'Kegiatan',
        'event_date' => now()->addDays(5)->toDateString(),
    ]);

    $this->actingAs(User::factory()->create())
        ->delete(route('agenda.destroy', $agenda))
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('agenda.index'));

    expect(Agenda::find($agenda->id))->toBeNull();
});

test('update does not create a duplicate agenda', function () {
    $agenda = Agenda::create([
        'title'      => 'Judul Lama',
        'category'   => 'Kegiatan',
        'event_date' => now()->addDays(5)->toDateString(),
    ]);

    $before = Agenda::count();

    $this->actingAs(User::factory()->create())
        ->put(route('agenda.update', $agenda), [
            'title'      => 'Judul Baru',
            'category'   => 'Kegiatan',
            'event_date' => now()->addDays(6)->toDateString(),
        ])
        ->assertSessionHasNoErrors();

    expect(Agenda::count())->toBe($before)
        ->and($agenda->fresh()->title)->toBe('Judul Baru');
});
