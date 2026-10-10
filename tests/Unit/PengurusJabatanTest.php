<?php

use App\Models\Pengurus;

test('jabatan list opens with the core leadership and closes with anggota', function () {
    $jabatan = Pengurus::daftarJabatan('pac_muslimat');

    expect(array_slice($jabatan, 0, 4))->toBe(['Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara'])
        ->and(array_slice($jabatan, -1))->toBe(['Anggota']);
});

test('organizations without a specific list fall back to the generic bidang options', function () {
    expect(Pengurus::daftarJabatan('pac_ishari'))
        ->toContain('Ketua Bidang Dakwah')
        ->not->toContain('Ketua Bidang Perkaderanan');
});

test('specific organizations get their own bidang options', function () {
    expect(Pengurus::daftarJabatan('mwclazisnu'))->toContain('Kepala Bidang Pengumpulan')
        ->and(Pengurus::daftarJabatan('pac_ansor'))->toContain('Ketua Bidang Perkaderanan');
});

test('jabatan map covers every banom plus a default entry', function () {
    $peta = Pengurus::jabatanPerBanom();

    expect($peta)->toHaveKey('__default__');

    foreach (array_keys(Pengurus::BANOMS) as $kode) {
        expect($peta)->toHaveKey($kode)
            ->and($peta[$kode])->not->toBeEmpty();
    }
});
