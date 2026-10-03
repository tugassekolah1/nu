<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infaq extends Model
{
    use HasFactory;

    /**
     * Pilihan metode pembayaran yang diterima.
     */
    public const METODE = ['transfer_bank', 'qris', 'tunai'];

    /**
     * Pilihan status transaksi infaq.
     */
    public const STATUSES = ['pending', 'lunas', 'dibatalkan'];

    /**
     * Arah kas: masuk (donasi) atau keluar (penyaluran/belanja).
     */
    public const ARAH = ['masuk', 'keluar'];

    /**
     * Kategori penggunaan untuk kas keluar.
     */
    public const KATEGORI_KELUAR = [
        'santunan_yatim',
        'bantuan_dhuafa',
        'operasional_majelis',
        'dakwah_kaderisasi',
        'sarana_prasarana',
        'lainnya',
    ];

    protected $fillable = [
        'kode_transaksi',
        'nama_donatur',
        'no_hp',
        'nominal',
        'metode_pembayaran',
        'status',
        'arah',
        'kategori',
        'penanggung_jawab',
        'bukti_path',
        'catatan',
        'paid_at'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];
}