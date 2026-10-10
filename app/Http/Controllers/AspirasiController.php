<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AspirasiController extends Controller
{
    /**
     * Halaman kotak aspirasi: formulir kirim + tanggapan pengurus.
     */
    public function index(): View
    {
        $ditanggapi = Aspirasi::where('status', 'selesai')
            ->whereNotNull('tanggapan')
            ->latest('tanggapan_at')
            ->take(10)
            ->get();

        $totalDiterima = Aspirasi::count();

        return view('aspirasi', [
            'ditanggapi' => $ditanggapi,
            'totalDiterima' => $totalDiterima,
            'hasil' => null,
            'kodeCari' => '',
        ]);
    }

    /**
     * Lacak aspirasi berdasarkan nomor pelacakan + lihat tanggapan admin.
     */
    public function lacak(Request $request): View
    {
        $kodeCari = strtoupper(trim((string) $request->query('kode', '')));

        $hasil = $kodeCari !== ''
            ? Aspirasi::where('kode', $kodeCari)->first()
            : null;

        $ditanggapi = Aspirasi::where('status', 'selesai')
            ->whereNotNull('tanggapan')
            ->latest('tanggapan_at')
            ->take(10)
            ->get();

        $totalDiterima = Aspirasi::count();

        return view('aspirasi', [
            'ditanggapi' => $ditanggapi,
            'totalDiterima' => $totalDiterima,
            'hasil' => $hasil,
            'kodeCari' => $kodeCari,
            'tidakDitemukan' => $kodeCari !== '' && $hasil === null,
        ]);
    }

    /**
     * Simpan aspirasi yang dikirim warga.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'no_hp' => 'nullable|string|max:20',
            'kategori' => ['required', Rule::in(Aspirasi::KATEGORI)],
            'isi' => 'required|string|min:10|max:2000',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'email.email' => 'Format email tidak valid.',
            'no_hp.max' => 'No HP maksimal 20 karakter.',
            'kategori.required' => 'Kategori aspirasi wajib dipilih.',
            'kategori.in' => 'Kategori aspirasi tidak dikenali.',
            'isi.required' => 'Isi aspirasi wajib diisi.',
            'isi.min' => 'Isi aspirasi minimal 10 karakter.',
            'isi.max' => 'Isi aspirasi maksimal 2000 karakter.',
        ]);

        $aspirasi = Aspirasi::create($validated);

        return redirect()
            ->route('aspirasi.lacak', ['kode' => $aspirasi->kode])
            ->with('success', 'Aspirasi berhasil dikirim. Simpan nomor pelacakan berikut untuk memantau status dan tanggapan pengurus.');
    }
}
