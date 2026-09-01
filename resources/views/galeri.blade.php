<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan - NU Ranting Banjaranyar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-900 text-gray-100 font-sans antialiased selection:bg-emerald-500 selection:text-white">

    <!-- HEADER / HERO HERO LAYER -->
    <header class="relative overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800 pt-16 pb-20 border-b border-emerald-800/40">
        
        <!-- Blob Dekorasi -->
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-lime-400/10 rounded-full blur-3xl"></div>
        <div class="absolute top-10 -right-20 w-80 h-80 bg-amber-300/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6">
            
            <!-- Tombol Back to Home (Kiri Atas) -->
            <div class="mb-8">
                <a href="{{ route('landing') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-950/80 hover:bg-emerald-900 text-emerald-100 border border-emerald-800/50 rounded-full text-xs sm:text-sm font-medium backdrop-blur-md transition-all duration-200 shadow-lg hover:-translate-x-1">
                    <i data-lucide="arrow-left" class="w-4 h-4 text-amber-300"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>

            <!-- Judul Halaman -->
            <div class="text-center max-w-2xl mx-auto">
                <span class="inline-flex items-center gap-2 bg-white/10 border border-white/20 text-emerald-200 text-xs font-semibold px-4 py-1.5 rounded-full mb-4">
                    Dokumentasi & Arsip
                </span>
                <h1 class="font-serif font-extrabold text-white text-3xl sm:text-5xl leading-tight">
                    Galeri <span class="text-amber-300">Kegiatan NU</span>
                </h1>
                <p class="mt-3 text-emerald-100/80 text-sm sm:text-base leading-relaxed">
                    Dokumentasi rekam jejak kegiatan keagamaan, sosial, dan keorganisasian Nahdlatul Ulama Ranting Banjaranyar.
                </p>
            </div>

        </div>
    </header>

    <!-- GALERI GRID SECTION -->
    <main class="max-w-6xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card Foto 1 -->
            <div class="group relative bg-emerald-950/40 border border-emerald-800/30 rounded-2xl overflow-hidden shadow-xl hover:border-emerald-600/50 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden bg-emerald-900/50 relative">
                    <img src="https://images.unsplash.com/photo-1542810634-71277d95dcbb?q=80&w=800&auto=format&fit=crop" 
                         alt="Pengajian Rutin" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/20 to-transparent opacity-80"></div>
                </div>
                <div class="p-5 relative">
                    <span class="text-xs font-semibold text-amber-300 bg-amber-400/10 border border-amber-400/20 px-2.5 py-1 rounded-md">
                        Keagamaan
                    </span>
                    <h3 class="mt-3 font-bold text-lg text-white group-hover:text-amber-300 transition-colors">
                        Pengajian Rutin Lailatul Ijtima'
                    </h3>
                    <p class="mt-1 text-xs text-emerald-200/70 flex items-center gap-1.5">
                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-emerald-400"></i>
                        15 Agustus 2026
                    </p>
                </div>
            </div>

            <!-- Card Foto 2 -->
            <div class="group relative bg-emerald-950/40 border border-emerald-800/30 rounded-2xl overflow-hidden shadow-xl hover:border-emerald-600/50 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden bg-emerald-900/50 relative">
                    <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=800&auto=format&fit=crop" 
                         alt="Santunan Anak Yatim" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/20 to-transparent opacity-80"></div>
                </div>
                <div class="p-5 relative">
                    <span class="text-xs font-semibold text-amber-300 bg-amber-400/10 border border-amber-400/20 px-2.5 py-1 rounded-md">
                        Sosial
                    </span>
                    <h3 class="mt-3 font-bold text-lg text-white group-hover:text-amber-300 transition-colors">
                        Santunan Anak Yatim & Dhuafa
                    </h3>
                    <p class="mt-1 text-xs text-emerald-200/70 flex items-center gap-1.5">
                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-emerald-400"></i>
                        10 Juli 2026
                    </p>
                </div>
            </div>

            <!-- Card Foto 3 -->
            <div class="group relative bg-emerald-950/40 border border-emerald-800/30 rounded-2xl overflow-hidden shadow-xl hover:border-emerald-600/50 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden bg-emerald-900/50 relative">
                    <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=800&auto=format&fit=crop" 
                         alt="Pelatihan Banser" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/20 to-transparent opacity-80"></div>
                </div>
                <div class="p-5 relative">
                    <span class="text-xs font-semibold text-amber-300 bg-amber-400/10 border border-amber-400/20 px-2.5 py-1 rounded-md">
                        Kaderisasi
                    </span>
                    <h3 class="mt-3 font-bold text-lg text-white group-hover:text-amber-300 transition-colors">
                        Diklatsar Banser Satkoryon
                    </h3>
                    <p class="mt-1 text-xs text-emerald-200/70 flex items-center gap-1.5">
                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-emerald-400"></i>
                        25 Mei 2026
                    </p>
                </div>
            </div>

        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>