<?php

use App\Models\NuMember;
use App\Models\Payment;

test('kartu anggota page renders the public search form', function () {
    $this->get('/kartu-anggota')
        ->assertOk()
        ->assertSee('<title>Kartu Anggota', false)
        ->assertSee('name="nik"', false)
        ->assertSee(route('members.card'), false);
});

test('legacy cek-status and cek-kartu urls redirect to the kartu anggota page', function () {
    $this->get('/cek-status?nik=3300000000000001')
        ->assertRedirect(route('members.card', ['nik' => '3300000000000001']));

    $this->get('/cek-kartu?nik=3300000000000001')
        ->assertRedirect(route('members.card', ['nik' => '3300000000000001']));

    $this->get('/cek-status')
        ->assertRedirect(route('members.card'));
});

test('unknown nik shows the not submitted state with a registration cta', function () {
    $this->get('/kartu-anggota?nik=3300000000000000')
        ->assertOk()
        ->assertSee('Belum Ada Pengajuan')
        ->assertSee('3300000000000000')
        ->assertSee(route('members.register-form'), false)
        ->assertDontSee('id="mcStage"', false);
});

test('a pending registration shows the waiting state without print buttons', function () {
    $member = NuMember::create([
        'nik'            => '3300000000000001',
        'full_name'      => 'Budi Santoso',
        'phone'          => '081234567890',
        'gender'         => 'L',
        'address'        => 'Banjaranyar',
        'status'         => 'pending_payment',
        'payment_status' => 'unpaid',
    ]);

    Payment::create([
        'nu_member_id'     => $member->id,
        'transaction_code' => 'TRX-CHECKSTATUS',
        'amount'           => 5000,
        'payment_status'   => 'unpaid',
    ]);

    $this->get('/kartu-anggota?nik=3300000000000001')
        ->assertOk()
        ->assertSee('Budi Santoso')
        ->assertSee('Menunggu Persetujuan')
        ->assertSee('Tanggal pengajuan')
        ->assertSee('Menunggu Pembayaran')
        ->assertSee('Belum Bayar')
        ->assertSee('TRX-CHECKSTATUS')
        ->assertSee(route('members.payment-page', $member), false)
        ->assertDontSee('id="mcStage"', false)
        ->assertDontSee("printMemberCard(", false);
});

test('a proof waiting for admin verification stays pending without print buttons', function () {
    $member = NuMember::create([
        'nik'            => '3300000000000002',
        'full_name'      => 'Siti Aminah',
        'phone'          => '081234567891',
        'gender'         => 'P',
        'address'        => 'Banjaranyar',
        'status'         => 'pending_payment',
        'payment_status' => 'unpaid',
    ]);

    Payment::create([
        'nu_member_id'     => $member->id,
        'transaction_code' => 'TRX-PROOF01',
        'amount'           => 5000,
        'payment_proof'    => 'payment-proofs/proof.jpg',
        'payment_status'   => 'unpaid',
    ]);

    $this->get('/kartu-anggota?nik=3300000000000002')
        ->assertOk()
        ->assertSee('Menunggu Persetujuan')
        ->assertSee('Bukti Diterima')
        ->assertDontSee('id="mcStage"', false)
        ->assertDontSee("printMemberCard(", false);
});

test('a rejected application shows the reason and a reapply cta without print', function () {
    $member = NuMember::create([
        'nik'                => '3300000000000005',
        'full_name'          => 'Zainul Arifin',
        'phone'              => '081234567893',
        'gender'             => 'L',
        'address'            => 'Banjaranyar',
        'status'             => 'pending_payment',
        'payment_status'     => 'unpaid',
        'registration_status'=> 'rejected',
        'rejection_reason'   => 'Berkas identitas belum lengkap.',
    ]);

    $this->get('/kartu-anggota?nik=' . $member->nik)
        ->assertOk()
        ->assertSee('Pengajuan Ditolak')
        ->assertSee('Berkas identitas belum lengkap.')
        ->assertSee('Ajukan Kembali')
        ->assertSee(route('members.register-form'), false)
        ->assertDontSee('id="mcStage"', false)
        ->assertDontSee("printMemberCard(", false);
});

test('an approved member sees the card right on the page with print and download', function () {
    $member = NuMember::create([
        'nik'            => '3300000000000003',
        'full_name'      => 'Ahmad Fauzi',
        'phone'          => '081234567892',
        'gender'         => 'L',
        'address'        => 'Banjaranyar',
        'status'         => 'active',
        'payment_status' => 'paid',
        'member_card_no' => 'NU-2026-001',
    ]);

    Payment::create([
        'nu_member_id'     => $member->id,
        'transaction_code' => 'TRX-PAID001',
        'amount'           => 5000,
        'payment_status'   => 'paid',
    ]);

    $this->get('/kartu-anggota?nik=3300000000000003')
        ->assertOk()
        ->assertSee('Disetujui / Aktif')
        ->assertSee('Pengajuan Disetujui — Kartu Siap Digunakan')
        ->assertSee('Lunas')
        ->assertSee('NU-2026-001')
        ->assertSee('id="mcStage"', false)
        ->assertSee('Cetak Kartu')
        ->assertSee("printMemberCard('front')", false)
        ->assertSee("printMemberCard('back')", false)
        ->assertSee("printMemberCard('both')", false);
});
