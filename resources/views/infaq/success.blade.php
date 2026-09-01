<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infak Berhasil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen py-10 px-4">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100 p-6 text-center space-y-4">
        
        <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto text-2xl font-bold">
            ✓
        </div>

        <h2 class="text-2xl font-bold text-slate-800">Alhamdulillah!</h2>
        <p class="text-sm text-slate-600">Infak Anda telah berhasil kami terima. Terima kasih telah menyisihkan sebagian rezeki.</p>

        <div class="bg-slate-50 p-4 rounded-xl text-left text-sm space-y-2 border">
            <div class="flex justify-between">
                <span class="text-slate-500">Kode Transaksi</span>
                <span class="font-mono font-bold">{{ $infaq->kode_transaksi }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500">Nominal</span>
                <span class="font-bold text-emerald-700">Rp {{ number_format($infaq->nominal, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500">Waktu Bayar</span>
                <span>{{ $infaq->paid_at->format('d M Y, H:i') }} WIB</span>
            </div>
        </div>

        <a href="{{ route('/') }}" class="inline-block bg-slate-800 hover:bg-slate-900 text-white text-sm font-semibold px-6 py-2.5 rounded-xl transition-all">
            Kembali ke Beranda
        </a>

    </div>
</body>
</html>