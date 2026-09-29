<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Pendaftaran — NU Banjaranyar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="min-h-full bg-slate-50 text-slate-800 antialiased flex flex-col justify-between">

    <div class="max-w-xl w-full mx-auto px-4 py-8 sm:py-12">

        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors bg-white px-4 py-2 rounded-full border border-slate-200 shadow-sm hover:shadow">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

        <!-- Header Halaman -->
        <div class="mb-6">
            <span class="inline-block px-3 py-1 text-xs font-bold tracking-wider text-emerald-800 bg-emerald-100 rounded-full uppercase mb-2">
                Konfirmasi Pembayaran
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Pembayaran Pendaftaran</h1>
            <p class="text-slate-600 mt-2 text-sm sm:text-base leading-relaxed">
                Halo <strong class="text-slate-900 font-semibold">{{ $member->full_name }}</strong>, silakan selesaikan pembayaran di bawah ini untuk mengaktifkan keanggotaan kamu.
            </p>
        </div>

        <!-- Alert Sukses -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-start gap-3 shadow-sm">
                <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Alert Error -->
       {{-- Alert Error --}}
@if ($errors->any())
    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl flex items-start gap-3 shadow-sm">
        <svg class="w-5 h-5 text-rose-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <div class="text-sm">
            <strong class="font-semibold block mb-1">Gagal memproses unggahan:</strong>
            <ul class="list-disc list-inside space-y-1 text-rose-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

        <!-- Card Utamanya -->
        <div class="bg-white shadow-xl shadow-slate-200/60 rounded-3xl border border-slate-100 p-6 sm:p-8">

            @if ($member->payment_status === 'paid')
                <!-- Tampilan Jika Sudah Lunas -->
                <div class="text-center py-6">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <span class="inline-flex items-center gap-1.5 bg-emerald-100/80 text-emerald-800 px-4 py-2 rounded-full font-bold text-sm">
                        Pembayaran Dikonfirmasi ✓
                    </span>
                    <p class="mt-5 text-slate-600 text-sm">
                        Selamat! Keanggotaan Anda telah aktif.
                    </p>
                    <div class="mt-4 p-4 bg-slate-50 border border-slate-200 rounded-2xl inline-block w-full">
                        <span class="block text-xs uppercase tracking-wider text-slate-400 font-bold mb-1">Nomor Kartu Anggota</span>
                        <span class="text-lg font-mono font-extrabold text-emerald-900">{{ $member->member_card_no }}</span>
                    </div>
                </div>
            @else
                <!-- Tampilan QRIS & Upload Bukti -->
                <div class="text-center mb-6">
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200/80 inline-block">
                        <img src="{{ asset('images/qris.png') }}" alt="QRIS" class="w-60 sm:w-64 mx-auto rounded-xl shadow-sm border border-slate-100">
                    </div>
                    <p class="mt-3 text-xs sm:text-sm text-slate-500 font-medium">
                        Scan QRIS menggunakan Mobile Banking atau E-Wallet pilihan Anda
                    </p>
                </div>

                <!-- Detail Transaksi -->
                <div class="bg-slate-50/80 rounded-2xl p-4 mb-6 border border-slate-100 space-y-2.5 text-sm">
                    <div class="flex justify-between items-center py-0.5">
                        <span class="text-slate-500 font-medium">Kode Transaksi</span>
                        <span class="font-mono font-bold text-slate-800 bg-white px-2.5 py-0.5 rounded border border-slate-200 text-xs">{{ $payment->transaction_code }}</span>
                    </div>
                    <div class="flex justify-between items-center py-0.5">
                        <span class="text-slate-500 font-medium">Jumlah Bayar</span>
                        <span class="font-extrabold text-slate-900 text-base">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center py-0.5 border-t border-slate-200/60 pt-2.5">
                        <span class="text-slate-500 font-medium">Status Pembayaran</span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                            Belum Bayar
                        </span>
                    </div>
                </div>

                <!-- Status Bukti Transfer -->
                @if ($payment->payment_proof)
                    <div class="mb-6 p-4 bg-sky-50 border border-sky-200 text-sky-800 rounded-2xl text-sm flex items-start gap-3">
                        <svg class="w-5 h-5 text-sky-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>Bukti transfer sudah diunggah. Anda dapat mengunggah ulang jika terdapat kesalahan.</span>
                    </div>
                @endif

                <!-- Form Upload -->
                <form action="{{ route('members.upload-proof', $member) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            {{ $payment->payment_proof ? 'Unggah Ulang Bukti Transfer' : 'Unggah Bukti Transfer' }}
                        </label>
                        <div class="relative border-2 border-dashed border-slate-300 hover:border-emerald-500 rounded-2xl p-4 text-center transition-colors bg-slate-50/50 hover:bg-emerald-50/30">
                            <input type="file" name="proof" accept="image/*" required id="proofInput"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="space-y-1" id="uploadState">
                                <svg class="mx-auto h-8 w-8 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="text-xs text-slate-600">
                                    <span class="font-semibold text-emerald-700">Klik untuk memilih foto</span> atau drag & drop
                                </p>
                                <p class="text-[11px] text-slate-400">PNG, JPG, JPEG (Maks. 2MB)</p>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full bg-emerald-700 hover:bg-emerald-800 active:scale-[0.99] text-white font-bold px-5 py-3.5 rounded-2xl shadow-lg shadow-emerald-700/20 transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        Kirim Bukti Transfer
                    </button>
                </form>
            @endif

        </div>

        <!-- Footer Kecil -->
        <p class="text-center text-xs text-slate-400 mt-8">
            Butuh bantuan? Hubungi Sekretariat NU Banjaranyar
        </p>

    </div>

    <!-- Script Sederhana Tampilkan Nama File yang Dipilih -->
    <script>
        const proofInput = document.getElementById('proofInput');
        const uploadState = document.getElementById('uploadState');

        if(proofInput) {
            proofInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const fileName = e.target.files[0].name;
                    uploadState.innerHTML = `
                        <svg class="mx-auto h-8 w-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-xs font-semibold text-emerald-800">${fileName}</p>
                        <p class="text-[11px] text-slate-400">Klik lagi untuk mengganti foto</p>
                    `;
                }
            });
        }
    </script>
</body>
</html>