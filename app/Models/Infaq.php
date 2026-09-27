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

    protected $fillable = [
        'kode_transaksi',
        'nama_donatur',
        'no_hp',
        'nominal',
        'metode_pembayaran',
        'status',
        'catatan',
        'paid_at'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];
}