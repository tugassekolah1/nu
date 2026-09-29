<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    // Arahkan Eloquent ke tabel penguruses
    protected $table = 'penguruses';

    /**
     * Daftar badan otonom / organisasi tingkat kecamatan.
     * Kode (nilai dropdown) => ['label' => label_banom, 'name' => teks tampilan].
     */
    public const BANOMS = [
        'mwcnu' => ['label' => 'MWCNU', 'name' => 'MWCNU (Majelis Wakil Cabang NU)'],
        'pac_ipnu' => ['label' => 'PAC IPNU', 'name' => 'PAC IPNU (Ikatan Pelajar NU)'],
        'pac_ippnu' => ['label' => 'PAC IPPNU', 'name' => 'PAC IPPNU (Ikatan Pelajar Putri NU)'],
        'pac_fatayat' => ['label' => 'PAC Fatayat NU', 'name' => 'PAC Fatayat NU'],
        'satkoryon_banser' => ['label' => 'Satkoryon Banser', 'name' => 'Satkoryon Banser'],
        'pac_ansor' => ['label' => 'PAC GP Ansor', 'name' => 'PAC GP Ansor'],
        'pac_muslimat' => ['label' => 'PAC Muslimat NU', 'name' => 'PAC Muslimat NU'],
        'pac_pargu' => ['label' => 'PAC Pergunu', 'name' => 'PAC Pergunu (Persatuan Guru NU)'],
        'pac_pencak_silat' => ['label' => 'PAC Pagar Nusa', 'name' => 'PAC Pagar Nusa'],
        'mwclazisnu' => ['label' => 'UPZIS LAZISNU', 'name' => 'UPZIS LAZISNU Kecamatan'],
    ];

    protected $fillable = [
        'nama',
        'jabatan',
        'banom',
        'label_banom',
        'foto',
        'urutan',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];
}
