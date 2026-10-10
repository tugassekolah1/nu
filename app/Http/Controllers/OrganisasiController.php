<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrganisasiController extends Controller
{
    /**
     * Direktori organisasi NU: pencarian + filter kategori.
     */
    public function index(Request $request): View
    {
        $kategori = $request->query('kategori', 'semua');
        if (! isset(config('organisasi.kategori')[$kategori])) {
            $kategori = 'semua';
        }

        $q = trim((string) $request->query('q', ''));

        $semua = collect(config('organisasi.organisasi'));

        // Hanya tampilkan organisasi yang terverifikasi keberadaannya
        $terverifikasi = $semua->where('terverifikasi', true);

        $terfilter = $terverifikasi
            ->when($kategori !== 'semua', fn ($items) => $items->where('kategori', $kategori))
            ->when($q !== '', fn ($items) => $items->filter(fn ($org) => str_contains(
                mb_strtolower($org['nama'].' '.$org['singkatan'].' '.$org['deskripsi']),
                mb_strtolower($q)
            )))
            ->values();

        // Navigasi logo: hanya banom terverifikasi yang dipakai sebagai tautan cepat
        $navigasi = $terverifikasi
            ->filter(fn ($org) => $org['banom'] !== null && $org['kategori'] === 'banom')
            ->values();

        return view('organisasi.index', [
            'kategoriAktif' => $kategori,
            'q' => $q,
            'daftar' => $terfilter,
            'navigasi' => $navigasi,
            'totalSemua' => $terverifikasi->count(),
        ]);
    }

    /**
     * Halaman detail profil organisasi dengan tab Profil / Struktur / Program.
     */
    public function show(Request $request, string $slug): View
    {
        $organisasi = collect(config('organisasi.organisasi'))
            ->firstWhere('slug', $slug);

        abort_if($organisasi === null, 404);

        $tab = $request->query('tab', 'profil');
        if (! in_array($tab, ['profil', 'struktur', 'program'], true)) {
            $tab = 'profil';
        }

        // Struktur pengurus dari tabel penguruses bila organisasi punya banom
        $ketua = collect();
        $inti = collect();
        $bidang = collect();

        if ($organisasi['banom'] !== null) {
            $pengurus = Pengurus::query()
                ->where('banom', $organisasi['banom'])
                ->orderBy('urutan')
                ->orderBy('id')
                ->get();

            $ketua = $pengurus->filter(fn ($p) => Pengurus::levelJabatan($p->jabatan) === 1)->values();

            $inti = $pengurus->filter(fn ($p) => Pengurus::levelJabatan($p->jabatan) === 2)
                ->sortBy(fn ($p) => [Pengurus::bobotInti($p->jabatan), $p->urutan ?? 0, $p->id])
                ->values();

            $bidang = $pengurus->filter(fn ($p) => Pengurus::levelJabatan($p->jabatan) === 3)->values();
        }

        $lainnya = collect(config('organisasi.organisasi'))
            ->where('kategori', $organisasi['kategori'])
            ->where('slug', '!=', $slug)
            ->take(4)
            ->values();

        return view('organisasi.show', [
            'org' => $organisasi,
            'tabAktif' => $tab,
            'ketua' => $ketua,
            'inti' => $inti,
            'bidang' => $bidang,
            'punyaStruktur' => $ketua->isNotEmpty() || $inti->isNotEmpty() || $bidang->isNotEmpty(),
            'lainnya' => $lainnya,
        ]);
    }
}
