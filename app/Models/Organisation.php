<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = ['name', 'slug', 'logo', 'description'];

    // Relasi ke berita
    public function news()
    {
        return $this->hasMany(News::class);
    }

    // Relasi ke anggota
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    // Relasi ke struktur
    public function structures()
    {
        return $this->hasMany(Structure::class);
    }
}