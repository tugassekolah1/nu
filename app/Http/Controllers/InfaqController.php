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
        $totalMasuk = Infaq::where('arah', 'masuk')->where('status', 'lunas')->sum('nominal');
        $totalKeluar = Infaq::where('arah', 'keluar')->where('status', 'lunas')->sum('nominal');
        $totalInfaq = $totalMasuk;
        $totalDonatur = Infaq::where('arah', 'masuk')->where('status', 'lunas')->count();
        $infaqTerbaru = Infaq::where('arah', 'masuk')->where('status', 'lunas')->latest()->take(5)->get();
        $kasKeluar = Infaq::where('arah', 'keluar')->where('status', 'lunas')->latest('paid_at')->take(10)->get();
        $saldo = $totalMasuk - $totalKeluar;

        return view('infaq.index', compact('totalInfaq', 'totalMasuk', 'totalKeluar', 'saldo', 'totalDonatur', 'infaqTerbaru', 'kasKeluar'));
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
            'arah' => 'masuk',
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
