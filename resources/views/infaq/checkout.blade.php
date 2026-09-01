<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Pembayaran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen py-10 px-4">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100 p-6 space-y-6">
        
        <div class="text-center">
            <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full uppercase">Menunggu Pembayaran</span>
            <h2 class="text-xl font-bold text-slate-800 mt-2">Instruksi Pembayaran</h2>
            <p class="text-xs text-slate-500">Kode: {{ $infaq->kode_transaksi }}</p>
        </div>

        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 text-center">
            <p class="text-xs text-slate-500">Total Pembayaran</p>
            <p class="text-2xl font-extrabold text-emerald-700">Rp {{ number_format($infaq->nominal, 0, ',', '.') }}</p>
        </div>

        <!-- Detail Metode Dummy -->
        <div class="text-sm space-y-2 border-t border-b py-4">
            <div class="flex justify-between">
                <span class="text-slate-500">Donatur:</span>
                <span class="font-semibold text-slate-800">{{ $infaq->nama_donatur }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500">Metode:</span>
                <span class="font-semibold uppercase text-slate-800">{{ str_replace('_', ' ', $infaq->metode_pembayaran) }}</span>
            </div>
        </div>

        <!-- SIMULASI BUTTON (Ubah Status ke Lunas Tanpa Gateaway) -->
        <div class="bg-emerald-50 p-4 rounded-xl border border-emerald-200 text-center">
            <p class="text-xs text-emerald-800 mb-3 font-medium">✨ <strong>Mode Sandbox/Testing:</strong> Tekan tombol di bawah untuk menyimulasikan pembayaran berhasil.</p>
            
            <form action="{{ route('infaq.simulate', $infaq->kode_transaksi) }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 rounded-lg text-sm shadow transition-all">
                    Simulasikan Bayar Lunas Now
                </button>
            </form>
        </div>

    </div>
</body>
</html>