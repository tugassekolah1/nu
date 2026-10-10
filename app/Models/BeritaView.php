<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class BeritaView extends Model
{
    use HasFactory;

    protected $table = 'berita_views';

    protected $fillable = ['berita_id', 'tanggal', 'jumlah'];

    protected $casts = [
        'jumlah' => 'integer',
    ];

    public function berita(): BelongsTo
    {
        return $this->belongsTo(Berita::class);
    }

    /**
     * Tanggal dibaca sebagai objek tanggal (kolom tetap disimpan date-murni
     * "Y-m-d" agar pencarian rekap harian tetap cocok).
     */
    protected function tanggal(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value)->startOfDay() : null,
        );
    }
}
