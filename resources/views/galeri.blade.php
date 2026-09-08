<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kegiatan - NU Ranting Banjaranyar</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-900 text-gray-100 font-sans antialiased selection:bg-emerald-500 selection:text-white">
<x-navbar></x-navbar>
    <!-- HEADER / HERO LAYER -->
    <header class="relative overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800 pt-32 pb-20 border-b border-emerald-800/40">
        
        <!-- Blob Dekorasi -->
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-lime-400/10 rounded-full blur-3xl"></div>
        <div class="absolute top-10 -right-20 w-80 h-80 bg-amber-300/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6">
            
            <!-- Tombol Back to Home -->
            <div class="mb-8">
                
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

            @forelse ($galleries as $item)
                <!-- Card Foto Dynamic -->
                <div class="group relative bg-emerald-950/40 border border-emerald-800/30 rounded-2xl overflow-hidden shadow-xl hover:border-emerald-600/50 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="aspect-video w-full overflow-hidden bg-emerald-900/50 relative">
                            <img src="{{ asset('storage/' . $item->foto) }}" 
                                 alt="{{ $item->judul }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/20 to-transparent opacity-80"></div>
                        </div>
                        <div class="p-5 relative">
                            <h3 class="font-bold text-lg text-white group-hover:text-amber-300 transition-colors">
                                {{ $item->judul }}
                            </h3>
                            @if ($item->deskripsi)
                                <p class="mt-2 text-xs text-emerald-100/70 line-clamp-2 leading-relaxed">
                                    {{ $item->deskripsi }}
                                </p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="px-5 pb-5 pt-0">
                        <p class="text-xs text-emerald-200/70 flex items-center gap-1.5 border-t border-emerald-800/30 pt-3">
                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-emerald-400"></i>
                            {{ $item->created_at->isoFormat('D MMMM Y') }}
                        </p>
                    </div>
                </div>
            @empty
                <!-- Tampilan Jika Data Kosong -->
                <div class="col-span-full text-center py-16 bg-emerald-950/20 border border-emerald-800/30 rounded-2xl">
                    <i data-lucide="image-off" class="w-12 h-12 mx-auto text-emerald-600 mb-3"></i>
                    <p class="text-emerald-200/70 text-sm">Belum ada foto galeri yang diunggah.</p>
                </div>
            @endforelse

        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>