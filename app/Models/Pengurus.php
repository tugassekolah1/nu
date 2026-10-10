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
        'cbp_ipnu' => ['label' => 'CBP IPNU', 'name' => 'CBP (Corps Brigade Pembangunan)'],
        'kpp_ippnu' => ['label' => 'KPP IPPNU', 'name' => 'KPP (Korps Pelajar Putri)'],
        'pac_isnu' => ['label' => 'PAC ISNU', 'name' => 'PAC ISNU (Ikatan Sarjana NU)'],
        'pac_jqhnu' => ['label' => 'PAC JQHNU', 'name' => "PAC JQHNU (Jam'iyyatul Qurra wal Huffazh)"],
        'pac_jatman' => ['label' => 'PAC Jatman NU', 'name' => 'PAC Jatman (Jam\'iyyah Ahli Thariqah)'],
        'pac_ishari' => ['label' => 'PAC Ishari NU', 'name' => 'PAC Ishari NU (Ikatan Seni Hadhrah)'],
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

    /**
     * Tab kategori struktur organisasi untuk halaman piramida pengurus.
     * Kode tab => label, kode banom yang termasuk, dan deskripsi singkat.
     */
    public const STRUKTUR_TABS = [
        'mwcnu' => [
            'label' => 'MWC NU',
            'codes' => ['mwcnu'],
            'desc' => 'Majelis Wakil Cabang — induk organisasi NU tingkat kecamatan.',
        ],
        'ansor' => [
            'label' => 'GP Ansor',
            'codes' => ['pac_ansor', 'satkoryon_banser'],
            'desc' => 'Gerakan Pemuda Ansor beserta Barisan Ansor Serbaguna.',
        ],
        'muslimat' => [
            'label' => 'Muslimat NU',
            'codes' => ['pac_muslimat'],
            'desc' => 'Wadah perjuangan perempuan dan tokoh wanita NU.',
        ],
        'fatayat' => [
            'label' => 'Fatayat NU',
            'codes' => ['pac_fatayat'],
            'desc' => 'Wadah perempuan muda NU (maksimal 40 tahun).',
        ],
        'ipnu-ippnu' => [
            'label' => 'IPNU-IPPNU',
            'codes' => ['pac_ipnu', 'pac_ippnu', 'cbp_ipnu', 'kpp_ippnu'],
            'desc' => 'Ikatan pelajar putra-putri NU beserta unit CBP dan KPP.',
        ],
    ];

    /**
     * Tentukan level piramida dari teks jabatan.
     * 1 = Ketua, 2 = pengurus harian (wakil/sekretaris/bendahara), 3 = bidang.
     */
    public static function levelJabatan(?string $jabatan): int
    {
        $j = mb_strtolower(trim((string) $jabatan));

        if (str_contains($j, 'wakil')) {
            return 2;
        }

        if (str_contains($j, 'ketua')
            && ! str_contains($j, 'bidang')
            && ! str_contains($j, 'departemen')
            && ! str_contains($j, 'seksi')
            && ! str_contains($j, 'komisi')
        ) {
            return 1;
        }

        if (str_contains($j, 'sekret') || str_contains($j, 'bendahara') || str_contains($j, 'bendaraha')) {
            return 2;
        }

        return 3;
    }

    /**
     * Bobot urut pengurus harian: wakil → sekretaris → bendahara.
     */
    public static function bobotInti(?string $jabatan): int
    {
        $j = mb_strtolower(trim((string) $jabatan));

        return match (true) {
            str_contains($j, 'wakil') => 1,
            str_contains($j, 'sekret') => 2,
            str_contains($j, 'bendahara'), str_contains($j, 'bendaraha') => 3,
            default => 4,
        };
    }
}
