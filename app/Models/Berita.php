<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    /**
     * Pilihan jenis berita yang tersedia di form admin.
     */
    public const JENIS = ['Pengumuman', 'Kegiatan', 'Artikel', 'Berita'];

    protected $fillable = ['judul', 'slug', 'jenis', 'isi', 'gambar', 'user_id', 'status'];

    protected $attributes = [
        'jenis' => 'Berita',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Filter berita berdasarkan kata kunci (judul/slug/isi) dan jenis.
     * Jenis di luar daftar JENIS diabaikan.
     */
    public function scopeFilter(Builder $query, ?string $q = null, ?string $jenis = null): Builder
    {
        $q = trim((string) $q);

        return $query
            ->when($q !== '', function (Builder $query) use ($q) {
                $like = "%{$q}%";

                $query->where(function (Builder $query) use ($like) {
                    $query->where('judul', 'like', $like)
                        ->orWhere('slug', 'like', $like)
                        ->orWhere('isi', 'like', $like);
                });
            })
            ->when(in_array($jenis, self::JENIS, true), fn (Builder $query) => $query->where('jenis', $jenis));
    }
}