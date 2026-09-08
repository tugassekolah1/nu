<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <!-- Header / Navbar Sederhana -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('berita.public') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-blue-600 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Beranda
            </a>
            <span class="text-xs font-semibold uppercase tracking-widest text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                {{ $berita->kategori->nama ?? 'Berita' }}
            </span>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Konten Berita Utama -->
    <article class="bg-white p-6 sm:p-10 rounded-[24px] shadow-[0_18px_45px_rgba(23,57,45,0.06)] border border-[#d7e2d7]">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-[#214b35] leading-tight mb-4">
            {{ $berita->judul }}
        </h1>

        <div class="flex items-center space-x-3 text-sm text-[#4b5c53] border-b border-[#e5ebd5] pb-4 mb-6">
            <span class="font-semibold text-[#16372c]">{{ $berita->user->name ?? 'Admin' }}</span>
            <span>•</span>
            <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
        </div>

        @if ($berita->gambar)
            <div class="mb-8 rounded-2xl overflow-hidden">
                <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto max-h-[500px] object-cover">
            </div>
        @endif

        <div class="prose max-w-none text-[#293830] leading-relaxed text-base sm:text-lg">
            {!! nl2br(e($berita->isi)) !!}
        </div>
    </article>

</main>

<!-- Section Warta Terbaru (Ditaruh di Bawah Konten) -->
<section class="bg-[#f7faf7] py-14 border-t border-[#d7e2d7] mt-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#214b35]">Warta Terbaru Lainnya</h2>
            <a href="{{ route('landing') }}" class="text-sm font-bold text-[#214b35] hover:underline">Lihat Semua &rarr;</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($newsList as $item)
                <article class="rounded-[18px] overflow-hidden bg-white shadow-[0_18px_45px_rgba(23,57,45,0.08)] border border-[#d7e2d7] flex flex-col justify-between">
                    <a href="{{ route('berita.show', $item->slug) }}" class="block flex-1">
                        <div class="aspect-[4/3] p-4 text-white flex flex-col justify-end gap-2 relative overflow-hidden @if($loop->iteration % 3 == 1) bg-gradient-to-br from-[#102a20] via-[#213d2f] to-[#365946] @elseif($loop->iteration % 3 == 2) bg-gradient-to-br from-[#294738] via-[#375844] to-[#22372c] @else bg-gradient-to-br from-[#274134] via-[#355648] to-[#4f6d50] @endif"
                             @if ($item->gambar)
                                 style="background-image: linear-gradient(rgba(16,42,32,0.35), rgba(16,42,32,0.85)), url('{{ Storage::url($item->gambar) }}'); background-size: cover; background-position: center;"
                             @endif
                        >
                            <div class="text-xs font-bold text-white/80">Warta NU</div>
                            <h3 class="m-0 font-serif text-lg leading-snug line-clamp-2">{{ $item->judul }}</h3>
                            <div class="text-xs text-white/80">
                                {{ $item->created_at->translatedFormat('d M Y') }}
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('berita.show', $item->slug) }}" class="px-4 py-3 bg-[#8bc14b] text-[#16372c] font-bold text-sm block">
                        Baca selengkapnya
                    </a>
                </article>
            @empty
                <p class="text-[#4b5c53] col-span-3">Belum ada berita lainnya.</p>
            @endforelse
        </div>

    </div>
</section>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16 py-8">
        <div class="max-w-6xl mx-auto px-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Portal Berita. All rights reserved.
        </div>
    </footer>

</body>
</html>