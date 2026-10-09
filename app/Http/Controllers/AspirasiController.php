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

        return view('aspirasi', compact('ditanggapi', 'totalDiterima'));
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

        Aspirasi::create($validated);

        return redirect()
            ->route('aspirasi.index')
            ->with('success', 'Aspirasi berhasil dikirim. Pengurus akan menindaklanjuti.');
    }
}
