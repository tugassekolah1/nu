<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infaq extends Model
{
    use HasFactory;

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