<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    /**
     * Kategori aspirasi yang bisa dipilih pengirim.
     */
    public const KATEGORI = ['kegiatan', 'fasilitas', 'pelayanan', 'kaderisasi', 'lainnya'];

    /**
     * Status penanganan aspirasi.
     */
    public const STATUSES = ['baru', 'diproses', 'selesai', 'ditolak'];

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'kategori',
        'isi',
        'status',
        'tanggapan',
        'tanggapan_at',
    ];

    protected $casts = [
        'tanggapan_at' => 'datetime',
    ];

    /**
     * Label status untuk tampilan.
     */
    public static function labelStatus(string $status): string
    {
        return match ($status) {
            'baru' => 'Baru',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
            default => ucfirst($status),
        };
    }

    /**
     * Label kategori untuk tampilan.
     */
    public static function labelKategori(string $kategori): string
    {
        return match ($kategori) {
            'kegiatan' => 'Kegiatan',
            'fasilitas' => 'Fasilitas',
            'pelayanan' => 'Pelayanan',
            'kaderisasi' => 'Kaderisasi',
            default => 'Lainnya',
        };
    }
}
