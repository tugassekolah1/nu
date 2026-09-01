<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    // Arahkan Eloquent ke tabel penguruses
    protected $table = 'penguruses';

    protected $fillable = [
        'nama',
        'jabatan',
        'banom',
        'label_banom',
        'foto',
        'urutan',
    ];
}