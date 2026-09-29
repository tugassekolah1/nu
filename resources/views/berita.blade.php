<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;1,6..72,400&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-secondary-container": "#785d21",
                        "on-secondary-fixed": "#261900",
                        "tertiary": "#232823",
                        "surface-container-lowest": "#ffffff",
                        "surface-container": "#efeeea",
                        "error-container": "#ffdad6",
                        "primary-fixed": "#bceecf",
                        "primary-container": "#16452f",
                        "secondary": "#765a1f",
                        "on-primary": "#ffffff",
                        "inverse-on-surface": "#f2f1ed",
                        "tertiary-container": "#393e39",
                        "on-primary-fixed-variant": "#214f38",
                        "secondary-fixed": "#ffdea3",
                        "on-surface-variant": "#414943",
                        "on-secondary-fixed-variant": "#5b4307",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed-dim": "#c3c8c0",
                        "background": "#fbf9f5",
                        "surface": "#fbf9f5",
                        "primary": "#002e1b",
                        "on-secondary": "#ffffff",
                        "secondary-fixed-dim": "#e6c27c",
                        "on-primary-container": "#82b296",
                        "surface-container-high": "#e9e8e4",
                        "inverse-surface": "#30312e",
                        "on-error": "#ffffff",
                        "outline": "#717973",
                        "on-tertiary-container": "#a4a9a2",
                        "on-tertiary-fixed": "#181d18",
                        "surface-container-low": "#f5f3f0",
                        "on-error-container": "#93000a",
                        "inverse-primary": "#a0d2b4",
                        "primary-fixed-dim": "#a0d2b4",
                        "on-primary-fixed": "#002112",
                        "outline-variant": "#c0c9c1",
                        "surface-bright": "#fbf9f5",
                        "error": "#ba1a1a",
                        "surface-tint": "#3a674f",
                        "surface-dim": "#dbdad6",
                        "on-background": "#1b1c1a",
                        "on-surface": "#1b1c1a",
                        "surface-container-highest": "#e4e2df",
                        "on-tertiary-fixed-variant": "#434842",
                        "secondary-container": "#fed890",
                        "tertiary-fixed": "#dfe4dc",
                        "surface-variant": "#e4e2df"
                    },
                    borderRadius: {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    spacing: {
                        "max-width-editorial": "720px",
                        "max-width-canvas": "1280px",
                        "space-16": "1rem",
                        "space-2": "0.125rem",
                        "gutter-desktop": "2rem",
                        "space-96": "6rem",
                        "space-12": "0.75rem",
                        "space-32": "2rem",
                        "space-24": "1.5rem",
                        "space-64": "4rem",
                        "space-48": "3rem",
                        "space-8": "0.5rem",
                        "space-4": "0.25rem",
                        "gutter-mobile": "1rem"
                    },
                    fontFamily: {
                        "headline-md": ["Newsreader"],
                        "label-meta": ["Inter"],
                        "body-lead": ["Newsreader"],
                        "body-md": ["Inter"],
                        "headline-sm": ["Inter"],
                        "quote-pull": ["Newsreader"],
                        "label-editorial": ["Inter"],
                        "headline-lg-mobile": ["Newsreader"],
                        "headline-lg": ["Newsreader"],
                        "headline-xl-mobile": ["Newsreader"],
                        "headline-xl": ["Newsreader"],
                        "display-hero-mobile": ["Newsreader"],
                        "body-lg": ["Inter"],
                        "display-hero": ["Newsreader"]
                    },
                    fontSize: {
                        "headline-md": ["22px", {"lineHeight": "30px", "fontWeight": "500"}],
                        "label-meta": ["13px", {"lineHeight": "18px", "fontWeight": "400"}],
                        "body-lead": ["21px", {"lineHeight": "34px", "letterSpacing": "0.005em", "fontWeight": "400"}],
                        "body-md": ["16px", {"lineHeight": "26px", "fontWeight": "400"}],
                        "headline-sm": ["18px", {"lineHeight": "26px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "quote-pull": ["26px", {"lineHeight": "38px", "letterSpacing": "-0.01em", "fontWeight": "400"}],
                        "label-editorial": ["12px", {"lineHeight": "16px", "letterSpacing": "0.08em", "fontWeight": "600"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "32px", "letterSpacing": "0em", "fontWeight": "500"}],
                        "headline-lg": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.01em", "fontWeight": "500"}],
                        "headline-xl-mobile": ["28px", {"lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "500"}],
                        "headline-xl": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.015em", "fontWeight": "400"}],
                        "display-hero-mobile": ["36px", {"lineHeight": "44px", "letterSpacing": "-0.01em", "fontWeight": "500"}],
                        "body-lg": ["18px", {"lineHeight": "30px", "fontWeight": "400"}],
                        "display-hero": ["56px", {"lineHeight": "64px", "letterSpacing": "-0.02em", "fontWeight": "400"}]
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-surface font-body-md text-body-md text-on-surface antialiased min-h-screen">

<x-navbar></x-navbar>
<main class="w-full pt-10 bg-surface">
    <div class="flex flex-col w-full">

        {{-- Top Editorial Header & Date Stamp --}}
        <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop pt-space-32 md:pt-space-48">
            {{-- ... header content ... --}}
        </section>

        {{-- Search & Category Filter Controls --}}
        <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop pt-space-32">
            <form method="GET" action="{{ route('berita.public') }}"
                  class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-16">
                <div class="flex items-center gap-space-8 w-full lg:w-auto">
                    <div class="relative flex-1 lg:w-80">
                        <input type="search" name="q" value="{{ $q }}"
                               placeholder="Cari berita..."
                               aria-label="Cari berita"
                               class="w-full px-space-16 py-space-8 pr-10 rounded-lg bg-surface-container-low border border-on-surface/10 text-body-md text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:border-primary transition-colors"/>
                        <span class="material-symbols-outlined text-[20px] text-on-surface-variant absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">search</span>
                    </div>
                    @if (!empty($jenis))
                        <input type="hidden" name="jenis" value="{{ $jenis }}"/>
                    @endif
                    <button type="submit"
                            class="px-space-16 py-space-8 rounded-lg bg-primary text-on-primary font-label-meta text-label-meta font-semibold hover:opacity-90 transition-opacity">
                        Cari
                    </button>
                    @if (trim((string) $q) !== '' || !empty($jenis))
                        <a href="{{ route('berita.public') }}"
                           class="px-space-16 py-space-8 rounded-lg bg-surface-container-low text-on-surface font-label-meta text-label-meta font-semibold hover:bg-surface-container transition-colors">
                            Reset
                        </a>
                    @endif
                </div>

                <div class="flex flex-wrap gap-space-8">
                    <a href="{{ route('berita.public', array_filter(['q' => $q])) }}"
                       class="{{ empty($jenis) ? 'bg-primary text-on-primary' : 'bg-surface-container-low text-on-surface' }} px-space-12 py-space-4 rounded-lg font-label-meta text-label-meta font-semibold transition-colors">
                        Semua
                    </a>
                    @foreach (\App\Models\Berita::JENIS as $pilihan)
                        <a href="{{ route('berita.public', array_filter(['q' => $q, 'jenis' => $pilihan])) }}"
                           class="{{ ($jenis ?? '') === $pilihan ? 'bg-primary text-on-primary' : 'bg-surface-container-low text-on-surface' }} px-space-12 py-space-4 rounded-lg font-label-meta text-label-meta font-semibold transition-colors">
                            {{ $pilihan }}
                        </a>
                    @endforeach
                </div>
            </form>
        </section>

        @if ($isFiltering)
            {{-- ========================================== --}}
            {{-- HASIL PENCARIAN / FILTER JENIS --}}
            {{-- ========================================== --}}
            <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop py-space-32">
                <div class="flex items-baseline justify-between pb-space-16 border-b border-on-surface/10 mb-space-24">
                    <h3 class="font-headline-md text-headline-md text-on-surface font-headline-md tracking-tight">
                        Hasil Pencarian
                    </h3>
                    <span class="font-label-meta text-label-meta text-on-surface-variant">
                        {{ $newsList->total() }} berita ditemukan
                    </span>
                </div>

                @if ($newsList->isEmpty())
                    <div class="p-space-24 rounded-lg bg-surface-container-low text-on-surface-variant">
                        Tidak ada berita yang cocok dengan pencarian Anda.
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-space-24">
                        @foreach ($newsList as $berita)
                            <article class="group flex flex-col gap-space-12">
                                <a href="{{ route('berita.show', $berita->slug) }}"
                                   class="block w-full overflow-hidden rounded-lg bg-surface-container-high aspect-[16/10]">
                                    @if ($berita->gambar)
                                        <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}"
                                             class="w-full h-full object-cover transform transition-transform duration-500 ease-out group-hover:scale-[1.015]" loading="lazy"/>
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-on-surface-variant">
                                            <span class="material-symbols-outlined text-4xl">image</span>
                                        </div>
                                    @endif
                                </a>
                                <div class="flex items-center gap-space-8">
                                    <span class="font-label-editorial text-label-editorial text-primary uppercase font-bold tracking-wider">
                                        {{ $berita->jenis }}
                                    </span>
                                    <span class="text-on-surface-variant/40">•</span>
                                    <span class="font-label-meta text-label-meta text-on-surface-variant">
                                        {{ $berita->created_at->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                                <h4 class="font-headline-md text-headline-md text-on-surface group-hover:text-primary transition-colors">
                                    <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                                </h4>
                                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed line-clamp-3">
                                    {{ Str::limit(strip_tags($berita->isi), 160) }}
                                </p>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>

        @else

        {{-- ========================================== --}}
        {{-- DINAMIS: Featured Lead Story (Berita Utama) --}}
        {{-- ========================================== --}}
        @if($newsList->isNotEmpty())
            @php $featuredNews = $newsList->first(); @endphp
            <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop pt-space-48 py-10 pb-space-32">
                <article class="group relative flex flex-col lg:grid lg:grid-cols-12 gap-space-32 items-start">
                    {{-- Media Well --}}
                    <div class="w-full lg:col-span-8 overflow-hidden rounded-xl bg-surface-container-high relative aspect-[16/10] sm:aspect-[16/9]">
                        @if($featuredNews->gambar)
                            <img class="w-full h-full object-cover transform transition-transform duration-700 ease-out group-hover:scale-[1.015]"
                                 src="{{ Storage::url($featuredNews->gambar) }}"
                                 alt="{{ $featuredNews->judul }}"
                                 loading="eager"/>
                        @else
                            {{-- Placeholder jika tidak ada gambar --}}
                            <div class="w-full h-full bg-surface-container-high flex items-center justify-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-6xl">image</span>
                            </div>
                        @endif
                        <div class="absolute top-space-16 left-space-16">
                            <span class="inline-flex items-center px-space-12 py-space-4 bg-primary text-on-primary font-label-editorial text-[11px] font-semibold tracking-wider uppercase rounded-lg shadow-sm">
                                BERITA UTAMA
                            </span>
                        </div>
                    </div>
                    {{-- Narrative Well --}}
                    <div class="w-full lg:col-span-4 flex flex-col justify-between self-stretch pt-space-8 lg:pt-0">
                        <div>
                            {{-- Metadata --}}
                            <div class="flex items-center flex-wrap gap-space-8 mb-space-12">
                                <span class="font-label-editorial text-label-editorial text-primary font-bold tracking-wider uppercase">
                                    {{ strtoupper($featuredNews->jenis) }}
                                </span>
                                <span class="text-on-surface-variant/40">•</span>
                                <span class="font-label-meta text-label-meta text-on-surface-variant font-medium">
                                    {{ $featuredNews->created_at->translatedFormat('d F Y') }}
                                </span>
                                <span class="text-on-surface-variant/40">•</span>
                                <span class="font-label-meta text-label-meta text-on-surface-variant font-medium">
                                    MWC NU KECAMATAN
                                </span>
                            </div>
                            {{-- Headline --}}
                            <h2 class="font-headline-lg text-headline-lg md:text-[34px] md:leading-[42px] text-on-surface font-headline-md group-hover:text-primary transition-colors duration-200 mb-space-16">
                                <a href="{{ route('berita.show', $featuredNews->slug) }}">{{ $featuredNews->judul }}</a>
                            </h2>
                            {{-- Excerpt --}}
                            <p class="font-body-md text-body-md break-words text-on-surface-variant leading-relaxed mb-space-24">
                                {{ Str::limit(strip_tags($featuredNews->isi), 200) }}
                            </p>
                        </div>
                        {{-- Read Action --}}
                        <div class="pt-space-16 border-t border-on-surface/10 mt-auto">
                            <a class="inline-flex items-center gap-space-8 text-primary font-body-md text-body-md font-semibold group/link" href="{{ route('berita.show', $featuredNews->slug) }}">
                                <span>Baca berita selengkapnya</span>
                                <span class="material-symbols-outlined text-[20px] transition-transform duration-200 group-hover/link:translate-x-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
            </section>
        @endif

        {{-- Editorial Section Title & Hairline --}}
        <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop pt-space-48">
            <div class="flex items-center justify-between pb-space-16 border-b border-on-surface/10">
                <div class="flex items-baseline gap-space-12">
                    <h3 class="font-headline-md text-headline-md text-on-surface font-headline-md tracking-tight">
                        Kabar Lainnya
                    </h3>
                    <span class="font-label-meta text-label-meta text-on-surface-variant hidden sm:inline">
                        Dihimpun dari 12 Ranting dan Banom
                    </span>
                </div>
                <div class="flex items-center gap-space-8 text-on-surface-variant font-label-meta text-label-meta">
                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                    <span>Terverifikasi Redaksi</span>
                </div>
            </div>
        </section>

        {{-- ========================================== --}}
        {{-- DINAMIS: Kabar Lainnya List --}}
        {{-- ========================================== --}}
        <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop py-space-32">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-space-32 lg:gap-space-48 items-start">
                {{-- Primary 7-Column Editorial Column --}}
                <div class="md:col-span-7 flex flex-col gap-space-48">
                    @if($newsList->count() > 1)
                        @foreach($newsList->skip(1)->take(2) as $index => $berita)
                            @if($index % 2 === 0)
                                {{-- Format Feature (gambar besar di atas) --}}
                                <article class="group flex flex-col gap-space-16 pb-space-40 border-b border-on-surface/10" >
                                    <div class="w-full overflow-hidden rounded-lg bg-surface-container-high aspect-[16/10]">
                                        @if($berita->gambar)
                                            <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover transform transition-transform duration-500 ease-out group-hover:scale-[1.015]" loading="lazy"/>
                                        @endif
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center gap-space-8 mb-space-8">
                                            <span class="font-label-editorial text-label-editorial text-primary uppercase font-bold tracking-wider">
                                                {{ $berita->jenis }}
                                            </span>
                                            <span class="text-on-surface-variant/40">•</span>
                                            <span class="font-label-meta text-label-meta text-on-surface-variant">
                                                {{ $berita->created_at->translatedFormat('d F Y') }}
                                            </span>
                                        </div>
                                        <h4 class="font-headline-md text-headline-md md:text-[26px] md:leading-[34px] text-on-surface font-headline-md group-hover:text-primary transition-colors duration-200 mb-space-12">
                                            <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                                        </h4>
                                        <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-space-16">
                                            {{ Str::limit(strip_tags($berita->isi), 160) }}
                                        </p>
                                        <a class="inline-flex items-center gap-space-8 text-primary font-body-md text-body-md font-semibold self-start group/btn" href="{{ route('berita.show', $berita->slug) }}">
                                            <span>Baca berita</span>
                                            <span class="material-symbols-outlined text-[18px] transition-transform duration-200 group-hover/btn:translate-x-1">arrow_forward</span>
                                        </a>
                                    </div>
                                </article>
                            @else
                                {{-- Format Sosial Impact (gambar kecil di kiri) --}}
                                <article class="group flex flex-col sm:flex-row gap-space-24 pb-space-40 border-b border-on-surface/10 items-start">
                                    <div class="w-full sm:w-5/12 overflow-hidden rounded-lg bg-surface-container-high shrink-0 aspect-[4/3]">
                                        @if($berita->gambar)
                                            <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover transform transition-transform duration-500 ease-out group-hover:scale-[1.015]" loading="lazy"/>
                                        @endif
                                    </div>
                                    <div class="w-full sm:w-7/12 flex flex-col justify-between">
                                        <div>
                                            <div class="flex items-center gap-space-8 mb-space-8">
                                                <span class="font-label-editorial text-label-editorial text-secondary uppercase font-bold tracking-wider">
                                                    {{ $berita->jenis }}
                                                </span>
                                                <span class="text-on-surface-variant/40">•</span>
                                                <span class="font-label-meta text-label-meta text-on-surface-variant">
                                                    {{ $berita->created_at->translatedFormat('d F Y') }}
                                                </span>
                                            </div>
                                            <h4 class="font-headline-md text-headline-md text-on-surface font-headline-md group-hover:text-primary transition-colors duration-200 mb-space-8">
                                                <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                                            </h4>
                                            <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed line-clamp-3 mb-space-16">
                                                {{ Str::limit(strip_tags($berita->isi), 200) }}
                                            </p>
                                        </div>
                                        <a class="inline-flex items-center gap-space-8 text-primary font-body-md text-body-md font-semibold group/btn" href="{{ route('berita.show', $berita->slug) }}">
                                            <span>Baca berita</span>
                                            <span class="material-symbols-outlined text-[18px] transition-transform duration-200 group-hover/btn:translate-x-1">arrow_forward</span>
                                        </a>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    @endif
                </div>

                {{-- Secondary 5-Column Lateral Column --}}
                <div class="md:col-span-5 flex flex-col gap-space-32">
                    @if($newsList->count() > 3)
                        @foreach($newsList->skip(3)->take(2) as $berita)
                            <article class="group p-space-24 rounded-lg bg-surface-container-low transition-colors duration-200 hover:bg-surface-container" data-category-item="{{ \Illuminate\Support\Str::slug($berita->jenis) }}">
                                <div class="flex items-center gap-space-8 mb-space-8">
                                    <span class="font-label-editorial text-label-editorial text-primary uppercase font-bold tracking-wider">
                                        {{ $berita->jenis }}
                                    </span>
                                    <span class="text-on-surface-variant/40">•</span>
                                    <span class="font-label-meta text-label-meta text-on-surface-variant">
                                        {{ $berita->created_at->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                                <h4 class="font-headline-md text-headline-md text-on-surface font-headline-md group-hover:text-primary transition-colors duration-200 mb-space-12">
                                    <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                                </h4>
                                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed mb-space-16">
                                    {{ Str::limit(strip_tags($berita->isi), 150) }}
                                </p>
                                <a class="inline-flex items-center gap-space-8 text-primary font-body-md text-body-md font-semibold group/link" href="{{ route('berita.show', $berita->slug) }}">
                                    <span>Baca berita</span>
                                    <span class="material-symbols-outlined text-[18px] transition-transform duration-200 group-hover/link:translate-x-1">arrow_forward</span>
                                </a>
                            </article>
                        @endforeach
                    @endif

                    {{-- Authentic Bulletin Snippet --}}
                    <div class="p-space-24 rounded-lg bg-surface-container-high/60 border-l-4 border-primary">
                        <span class="font-label-editorial text-label-editorial text-primary uppercase font-bold tracking-wider block mb-space-4">KUTIPAN MWC</span>
                        <blockquote class="font-body-lead text-body-lead text-on-surface font-Newsreader italic leading-snug mb-space-8">
                            "Merawat kebersamaan ranting adalah menyalakan obor ketentraman di setiap sudut desa kita."
                        </blockquote>
                        <span class="font-label-meta text-label-meta text-on-surface-variant">— Rais Syuriyah MWC NU Kecamatan</span>
                    </div>
                </div>
            </div>
        </section>

        @endif

        {{-- ========================================== --}}
        {{-- PAGINATION --}}
        {{-- ========================================== --}}
        @if($newsList instanceof \Illuminate\Pagination\LengthAwarePaginator && $newsList->hasPages())
            <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop py-space-32 flex flex-col items-center justify-center">
                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center gap-space-8">
                    {{-- Previous Page Link --}}
                    @if ($newsList->onFirstPage())
                        <span class="px-space-16 py-space-8 rounded-lg bg-surface-container-low text-on-surface-variant cursor-not-allowed opacity-50">‹ Sebelumnya</span>
                    @else
                        <a href="{{ $newsList->previousPageUrl() }}" rel="prev" class="px-space-16 py-space-8 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface transition-colors">‹ Sebelumnya</a>
                    @endif

                    {{-- Pagination Elements --}}
                    <div class="flex items-center gap-space-4">
                        @foreach ($newsList->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span class="px-space-8 py-space-4 text-on-surface-variant">{{ $element }}</span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $newsList->currentPage())
                                        <span class="px-space-16 py-space-8 rounded-lg bg-primary text-on-primary font-semibold">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}" class="px-space-16 py-space-8 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface transition-colors">{{ $page }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>

                    {{-- Next Page Link --}}
                    @if ($newsList->hasMorePages())
                        <a href="{{ $newsList->nextPageUrl() }}" rel="next" class="px-space-16 py-space-8 rounded-lg bg-surface-container-low hover:bg-surface-container text-on-surface transition-colors">Selanjutnya ›</a>
                    @else
                        <span class="px-space-16 py-space-8 rounded-lg bg-surface-container-low text-on-surface-variant cursor-not-allowed opacity-50">Selanjutnya ›</span>
                    @endif
                </nav>
                <span class="font-label-meta text-label-meta text-on-surface-variant mt-space-8">
                    Menampilkan {{ $newsList->firstItem() ?? 0 }}-{{ $newsList->lastItem() ?? 0 }} dari {{ $newsList->total() }} warta
                </span>
            </section>
        @endif

        {{-- Editorial Redaksi & Layanan Informasi Box --}}
        <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop pb-space-64">
            {{-- ... redaksi box ... --}}
        </section>
    </div>
</main>

<footer class="w-full bg-surface-container-low mt-space-64">
    <x-footer />
</footer>
</body>
</html>