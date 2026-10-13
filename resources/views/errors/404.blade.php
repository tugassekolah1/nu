<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Halaman Tidak Ditemukan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-warm-bg text-charcoal antialiased">
    <x-navbar />

    <main class="min-h-[calc(100vh-200px)] flex items-center justify-center px-4 sm:px-8 py-16">
        <div class="max-w-xl text-center">
            <div class="mb-8">
                <span class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-nu-deep/10 mb-4">
                    <span class="material-symbols-outlined text-5xl text-nu-deep">error</span>
                </span>
            </div>
            
            <h1 class="text-5xl sm:text-6xl font-extrabold text-nu-deep mb-4">404</h1>
            <h2 class="text-2xl sm:text-3xl font-bold text-charcoal mb-3">Halaman Tidak Ditemukan</h2>
            
            <p class="text-base sm:text-lg text-muted-charcoal leading-relaxed mb-8">
                Maaf, halaman yang Anda cari tidak tersedia. Mungkin tautan sudah berubah atau halaman telah dihapus.
            </p>

            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ route('landing') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 min-h-[48px] rounded-full bg-nu-deep text-white font-semibold hover:bg-[#113725] transition-all active:scale-95">
                    <span class="material-symbols-outlined">home</span>
                    <span>Kembali ke Beranda</span>
                </a>
                <a href="{{ route('organisasi') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 min-h-[48px] rounded-full bg-warm-card text-charcoal font-semibold border border-border-subtle hover:bg-warm-beige/60 transition-all active:scale-95">
                    <span class="material-symbols-outlined">groups</span>
                    <span>Organisasi</span>
                </a>
            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>
