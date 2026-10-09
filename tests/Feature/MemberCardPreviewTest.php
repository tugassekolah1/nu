<?php

use App\Models\NuMember;

function paidMemberForCardPreview(array $overrides = []): NuMember
{
    return NuMember::create(array_merge([
        'nik' => '3300000000000301',
        'full_name' => 'Fulanah Kartunah',
        'phone' => '081234567802',
        'gender' => 'P',
        'address' => 'Banjaranyar',
        'status' => 'active',
        'payment_status' => 'paid',
        'member_card_no' => 'NU-2026-301',
        'photo' => 'members-photo/fulanah.png',
    ], $overrides));
}

test('the kartu anggota page keeps its search form for guests', function () {
    $this->get(route('members.card'))
        ->assertOk()
        ->assertSee('Kartu Anggota — NU Banjaranyar', false)
        ->assertSee('name="nik"', false);
});

test('a paid member gets the interactive 3d preview with all control buttons', function () {
    $member = paidMemberForCardPreview();

    $this->get(route('members.card', ['nik' => $member->nik]))
        ->assertOk()
        ->assertSee('Preview Tampilan Kartu')
        ->assertSee('Lihat Depan')
        ->assertSee('Lihat Belakang')
        ->assertSee('Putar Kartu')
        ->assertSee('Reset Posisi')
        ->assertSee('id="mcStage"', false)
        ->assertSee('mc-face-front', false)
        ->assertSee('mc-face-back', false)
        ->assertSee('storage/members-photo/fulanah.png', false)
        ->assertSee('KARTU TANDA ANGGOTA');
});

test('the three download modes are offered and print only flat cards', function () {
    $member = paidMemberForCardPreview();

    $this->get(route('members.card', ['nik' => $member->nik]))
        ->assertOk()
        ->assertSee("printMemberCard('front')", false)
        ->assertSee("printMemberCard('back')", false)
        ->assertSee("printMemberCard('both')", false)
        ->assertSee('class="mc-print"', false)
        ->assertSee('mc-print-front', false)
        ->assertSee('mc-print-back', false);
});

test('an unpaid member does not get the card preview', function () {
    $member = paidMemberForCardPreview([
        'nik' => '3300000000000302',
        'payment_status' => 'unpaid',
    ]);

    $this->get(route('members.card', ['nik' => $member->nik]))
        ->assertOk()
        ->assertSee('Pembayaran Belum Dikonfirmasi')
        ->assertDontSee('id="mcStage"', false);
});

test('the admin print card page renders both sides and the download options', function () {
    $member = paidMemberForCardPreview([
        'nik' => '3300000000000303',
        'full_name' => 'Fulan Fulanah',
        'member_card_no' => 'NU-2026-106',
        'photo' => 'members-photo/fulan.png',
    ]);

    $this->actingAs(\App\Models\User::factory()->admin()->create())
        ->get('/members/'.$member->id.'/print-card')
        ->assertOk()
        ->assertSee('Download Depan', false)
        ->assertSee('Download Belakang', false)
        ->assertSee('Download Depan + Belakang', false)
        ->assertSee('Lihat Depan')
        ->assertSee('mc-face-front', false)
        ->assertSee('mc-face-back', false)
        ->assertSee('Nahdlatul Ulama');
});
