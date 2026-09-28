<?php

namespace App\Http\Controllers;

use App\Models\Infaq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfaqController extends Controller
{
    // Halaman Form Infak
    public function index()
    {
        $totalInfaq = Infaq::where('status', 'lunas')->sum('nominal');
        $totalDonatur = Infaq::where('status', 'lunas')->count();
        $infaqTerbaru = Infaq::where('status', 'lunas')->latest()->take(5)->get();

        return view('infaq.index', compact('totalInfaq', 'totalDonatur', 'infaqTerbaru'));
    }

    // Proses Simpan Infak (Pending)
    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required|numeric',
            'metode_pembayaran' => 'required|in:transfer_bank,qris,tunai',
            'nama_donatur' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $infaq = Infaq::create([
            'kode_transaksi' => 'INF-'.strtoupper(Str::random(8)),
            'nama_donatur' => $request->nama_donatur ?? 'Hamba Allah',
            'no_hp' => $request->no_hp,
            'nominal' => $request->nominal,
            'metode_pembayaran' => $request->metode_pembayaran,
            'catatan' => $request->catatan,
            'status' => 'pending',
        ]);

        return redirect()->route('infaq.checkout', $infaq->kode_transaksi);
    }

    // Halaman Instruksi Pembayaran & Simulasi
    public function checkout($kode)
    {
        $infaq = Infaq::where('kode_transaksi', $kode)->firstOrFail();

        return view('infaq.checkout', compact('infaq'));
    }

    // SIMULASI: Ubah Status ke Lunas
    public function simulatePayment($kode)
    {
        $infaq = Infaq::where('kode_transaksi', $kode)->firstOrFail();

        $infaq->update([
            'status' => 'lunas',
            'paid_at' => now(),
        ]);

        return redirect()->route('infaq.success', $infaq->kode_transaksi)
            ->with('success', 'Simulasi Pembayaran Berhasil!');
    }

    // Halaman Pembayaran Berhasil
    public function success($kode)
    {
        $infaq = Infaq::where('kode_transaksi', $kode)->firstOrFail();

        if ($infaq->status !== 'lunas') {
            return redirect()->route('infaq.checkout', $kode);
        }

        return view('infaq.success', compact('infaq'));
    }
}
