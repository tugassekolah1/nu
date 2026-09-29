<?php

use App\Models\NuMember;
use App\Models\Payment;

test('cek status page renders the public search form', function () {
    $this->get('/cek-status')
        ->assertOk()
        ->assertSee('Cek Status Pendaftaran')
        ->assertSee('name="nik"', false)
        ->assertSee(route('members.status-check'), false);
});

test('cek status page shows an empty state when the nik is unknown', function () {
    $this->get('/cek-status?nik=3300000000000000')
        ->assertOk()
        ->assertSee('Data Pendaftaran Tidak Ditemukan')
        ->assertSee('3300000000000000')
        ->assertSee(route('members.register-form'), false);
});

test('cek status page reports an unpaid registration without proof', function () {
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

    $this->get('/cek-status?nik=3300000000000001')
        ->assertOk()
        ->assertSee('Budi Santoso')
        ->assertSee('Menunggu Pembayaran')
        ->assertSee('Belum Bayar')
        ->assertSee('TRX-CHECKSTATUS')
        ->assertSee(route('members.payment-page', $member), false);
});

test('cek status page reports a proof waiting for admin verification', function () {
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

    $this->get('/cek-status?nik=3300000000000002')
        ->assertOk()
        ->assertSee('Menunggu Verifikasi')
        ->assertSee('Bukti Diterima');
});

test('cek status page reports an active member and links to the card search', function () {
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

    $this->get('/cek-status?nik=3300000000000003')
        ->assertOk()
        ->assertSee('Anggota Aktif')
        ->assertSee('Lunas')
        ->assertSee('NU-2026-001')
        ->assertSee('Lihat & Cetak Kartu', false)
        ->assertSee(route('members.search', ['nik' => $member->nik]), false);
});
