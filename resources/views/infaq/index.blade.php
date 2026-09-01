<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infak & Sedekah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 min-h-screen py-10 px-4">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-100">
        
        <!-- Header Total Infak -->
        <div class="bg-emerald-800 text-white p-6 text-center">
            <p class="text-xs font-semibold uppercase tracking-wider text-emerald-200">Total Infak Terkumpul</p>
            <h1 class="text-3xl font-extrabold mt-1">Rp {{ number_format($totalInfaq, 0, ',', '.') }}</h1>
        </div>
@if ($errors->any())
    <div style="background-color: #fee2e2; border: 1px solid #ef4444; color: #b91c1c; padding: 12px; border-radius: 8px; margin-bottom: 16px;">
        <strong style="display: block; margin-bottom: 4px;">Terjadi kesalahan:</strong>
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('infaq.store') }}" method="POST" class="p-6 space-y-4">
            @csrf

            <!-- Nominal -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nominal Infak (Rp)</label>
                <input type="number" name="nominal"  placeholder="Contoh: 50000" required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>

            <!-- Nama Donatur -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Donatur</label>
                <input type="text" name="nama_donatur" placeholder="Kosongkan untuk 'Hamba Allah'"
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>

            <!-- Metode Pembayaran -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Metode Pembayaran</label>
                <select name="metode_pembayaran" required
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    <option value="qris">QRIS (Scan Barcode)</option>
                    <option value="transfer_bank">Transfer Bank (BSI)</option>
                    <option value="tunai">Tunai / Bayar di Tempat</option>
                </select>
            </div>

            <!-- Doa / Catatan -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Pesan / Doa (Opsional)</label>
                <textarea name="catatan" rows="2" placeholder="Semoga berkah..."
                          class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
            </div>

            <button type="submit" class="w-full bg-emerald-700 hover:bg-emerald-800 text-white font-bold py-3 rounded-xl shadow-lg shadow-emerald-700/20 transition-all">
                Lanjutkan Infak
            </button>
        </form>

    </div>
</body>
</html>