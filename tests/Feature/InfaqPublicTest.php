<?php

use App\Models\Infaq;

test('public infaq page renders the donation form and total', function () {
    Infaq::create([
        'kode_transaksi' => 'INF-LUNAS01',
        'nama_donatur' => 'Bu Siti',
        'nominal' => 150000,
        'metode_pembayaran' => 'qris',
        'status' => 'lunas',
        'paid_at' => now(),
    ]);

    $this->get('/infaq')
        ->assertOk()
        ->assertSee('Infak & Sedekah')
        ->assertSee('150.000')
        ->assertSee('1 transaksi')
        ->assertSee('Bu Siti')
        ->assertSee('name="nominal"', false)
        ->assertSee(route('infaq.store'), false)
        ->assertSee('Tautan Navigasi');
});

test('public infaq page keeps an empty state when there is no donation yet', function () {
    $this->get('/infaq')
        ->assertOk()
        ->assertSee('Belum ada infak yang tercatat.');
});

test('infaq form rejects a missing nominal', function () {
    $this->from('/infaq')
        ->post('/infaq', ['metode_pembayaran' => 'qris'])
        ->assertSessionHasErrors('nominal');

    expect(Infaq::count())->toBe(0);
});

test('infaq donation flow goes from form to checkout to success', function () {
    $this->post('/infaq', [
        'nominal' => 75000,
        'metode_pembayaran' => 'transfer_bank',
        'nama_donatur' => 'Hamba Allah',
    ])->assertSessionHasNoErrors();

    $infaq = Infaq::sole();

    expect($infaq->status)->toBe('pending');

    $this->get(route('infaq.checkout', $infaq->kode_transaksi))
        ->assertOk()
        ->assertSee('Instruksi Pembayaran')
        ->assertSee('75.000')
        ->assertSee($infaq->kode_transaksi);

    $this->post(route('infaq.simulate', $infaq->kode_transaksi))
        ->assertRedirect(route('infaq.success', $infaq->kode_transaksi));

    $this->get(route('infaq.success', $infaq->kode_transaksi))
        ->assertOk()
        ->assertSee('Alhamdulillah')
        ->assertSee($infaq->kode_transaksi)
        ->assertSee('75.000');
});
