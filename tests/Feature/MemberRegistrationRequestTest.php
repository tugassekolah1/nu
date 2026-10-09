<?php

use App\Models\NuMember;
use App\Models\User;

function pendingRegistrationRequest(array $overrides = []): NuMember
{
    return NuMember::create(array_merge([
        'nik' => '3300000000000201',
        'full_name' => 'Pendaftar Baru',
        'phone' => '081234567801',
        'gender' => 'L',
        'address' => 'Banjaranyar',
        'status' => 'pending_payment',
        'payment_status' => 'unpaid',
    ], $overrides));
}

test('admin can open the registration requests page', function () {
    $member = pendingRegistrationRequest();

    $this->actingAs(User::factory()->admin()->create())
        ->get(route('admin.members.requests'))
        ->assertOk()
        ->assertSee('Permintaan Pendaftaran Anggota')
        ->assertSee('Pendaftar Baru')
        ->assertSee(route('admin.members.requests.accept', $member), false)
        ->assertSee(route('admin.members.requests.reject', $member), false);
});

test('guest is redirected to login and non admin gets 403', function () {
    $this->get(route('admin.members.requests'))->assertRedirect('/login');

    $this->actingAs(User::factory()->create())
        ->get(route('admin.members.requests'))
        ->assertForbidden();
});

test('accepting a request marks it accepted and the member active', function () {
    $member = pendingRegistrationRequest();

    $response = $this->actingAs(User::factory()->admin()->create())
        ->patchJson(route('admin.members.requests.accept', $member))
        ->assertOk()
        ->assertJson(['success' => true]);

    expect($response->json('html.status'))->toContain('Diterima');

    $member->refresh();
    expect($member->registration_status)->toBe('accepted')
        ->and($member->status)->toBe('active');
});

test('rejected status persists after reload of the requests page', function () {
    $member = pendingRegistrationRequest();

    $this->actingAs(User::factory()->admin()->create())
        ->patchJson(route('admin.members.requests.reject', $member), [
            'reason' => 'NIK tidak sesuai dokumen identitas.',
        ])
        ->assertOk()
        ->assertJson(['success' => true]);

    $member->refresh();
    expect($member->registration_status)->toBe('rejected')
        ->and($member->rejection_reason)->toBe('NIK tidak sesuai dokumen identitas.');

    $this->actingAs(User::factory()->admin()->create())
        ->get(route('admin.members.requests'))
        ->assertOk()
        ->assertSee('Ditolak')
        ->assertSee('NIK tidak sesuai dokumen identitas.');
});

test('rejecting without a reason is rejected by validation', function () {
    $member = pendingRegistrationRequest();

    $this->actingAs(User::factory()->admin()->create())
        ->patchJson(route('admin.members.requests.reject', $member), [])
        ->assertStatus(422)
        ->assertJsonValidationErrors('reason');

    expect($member->refresh()->registration_status)->toBeNull();
});

test('an already processed request cannot be accepted or rejected again', function () {
    $done = pendingRegistrationRequest(['registration_status' => 'accepted', 'status' => 'active']);
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->patchJson(route('admin.members.requests.accept', $done))
        ->assertStatus(422);

    $this->actingAs($admin)
        ->patchJson(route('admin.members.requests.reject', $done), ['reason' => 'Alasan.'])
        ->assertStatus(422);
});

test('legacy active members are shown as accepted without extra columns', function () {
    $legacy = pendingRegistrationRequest([
        'nik' => '3300000000000202',
        'full_name' => 'Anggota Lama',
        'status' => 'active',
        'payment_status' => 'paid',
        'member_card_no' => 'NU-2026-202',
    ]);

    expect($legacy->registrationState())->toBe('accepted');

    $this->actingAs(User::factory()->admin()->create())
        ->get(route('admin.members.requests'))
        ->assertOk()
        ->assertSee('Anggota Lama')
        ->assertSee('Selesai diproses');
});

test('the status filter narrows the list', function () {
    pendingRegistrationRequest();
    pendingRegistrationRequest([
        'nik' => '3300000000000203',
        'full_name' => 'Sudah Ditolak',
        'registration_status' => 'rejected',
        'rejection_reason' => 'Data belum lengkap.',
    ]);

    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('admin.members.requests', ['status' => 'rejected']))
        ->assertOk()
        ->assertSee('Sudah Ditolak')
        ->assertDontSee('Pendaftar Baru');

    $this->actingAs($admin)
        ->get(route('admin.members.requests', ['status' => 'pending']))
        ->assertOk()
        ->assertSee('Pendaftar Baru')
        ->assertDontSee('Sudah Ditolak');
});

test('the search finds members by name or nik', function () {
    pendingRegistrationRequest();
    pendingRegistrationRequest([
        'nik' => '3300000000000204',
        'full_name' => 'Kholifah Romli',
    ]);

    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get(route('admin.members.requests', ['q' => 'Kholifah']))
        ->assertOk()
        ->assertSee('Kholifah Romli')
        ->assertDontSee('Pendaftar Baru');

    $this->actingAs($admin)
        ->get(route('admin.members.requests', ['q' => '3300000000000201']))
        ->assertOk()
        ->assertSee('Pendaftar Baru')
        ->assertDontSee('Kholifah Romli');
});

test('the public status page shows the rejection and its reason', function () {
    $member = pendingRegistrationRequest([
        'registration_status' => 'rejected',
        'rejection_reason' => 'Berkas identitas belum lengkap.',
    ]);

    $this->get(route('members.card', ['nik' => $member->nik]))
        ->assertOk()
        ->assertSee('Pengajuan Ditolak')
        ->assertSee('Berkas identitas belum lengkap.')
        ->assertDontSee('Menunggu Pembayaran');
});

test('the sidebar shows the requests menu for admins', function () {
    $this->actingAs(User::factory()->admin()->create())
        ->get('/dashboard')
        ->assertOk()
        ->assertSee('Permintaan Pendaftaran')
        ->assertSee(route('admin.members.requests'), false);
});
