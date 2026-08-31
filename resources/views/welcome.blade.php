<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>WARTA NU - Portal Berita Modern Islami</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Source+Serif+4:wght@400;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet"/>
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container": "#efeeea",
                        "surface-container-highest": "#e4e2de",
                        "on-error": "#ffffff",
                        "cream-canvas": "#fdfbf7",
                        "on-tertiary-container": "#aab1c5",
                        "secondary-fixed-dim": "#e9c349",
                        "on-surface": "#1b1c1a",
                        "on-error-container": "#93000a",
                        "surface-variant": "#e4e2de",
                        "tertiary-container": "#3d4455",
                        "on-primary-fixed-variant": "#0b513d",
                        "outline-variant": "#bfc9c3",
                        "primary-container": "#064e3b",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary": "#ffffff",
                        "background": "#fbf9f5",
                        "on-secondary-fixed-variant": "#574500",
                        "surface-bright": "#fbf9f5",
                        "inverse-on-surface": "#f2f0ed",
                        "on-primary": "#ffffff",
                        "surface": "#fbf9f5",
                        "tertiary-fixed": "#dce2f7",
                        "on-primary-container": "#80bea6",
                        "secondary-container": "#fed65b",
                        "on-tertiary-fixed": "#141b2b",
                        "outline": "#707974",
                        "inverse-surface": "#30312e",
                        "on-primary-fixed": "#002117",
                        "primary": "#003527",
                        "on-secondary-container": "#745c00",
                        "secondary": "#735c00",
                        "on-tertiary": "#ffffff",
                        "on-background": "#1b1c1a",
                        "primary-fixed": "#b0f0d6",
                        "emerald-deep": "#064e3b",
                        "on-surface-variant": "#404944",
                        "primary-fixed-dim": "#95d3ba",
                        "surface-dim": "#dbdad6",
                        "nu-green": "#22C55E",
                        "on-tertiary-fixed-variant": "#404758",
                        "surface-container-high": "#eae8e4",
                        "error-container": "#ffdad6",
                        "surface-tint": "#2b6954",
                        "on-secondary-fixed": "#241a00",
                        "secondary-fixed": "#ffe088",
                        "gold-leaf": "#d4af37",
                        "slate-ink": "#111827",
                        "surface-container-low": "#f5f3ef",
                        "error": "#ba1a1a",
                        "tertiary-fixed-dim": "#c0c6db",
                        "inverse-primary": "#95d3ba",
                        "tertiary": "#272e3e"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "margin-desktop": "40px",
                        "container-max": "1280px",
                        "section-gap": "80px",
                        "margin-mobile": "16px",
                        "gutter": "24px",
                        "base": "8px"
                    },
                    "fontFamily": {
                        "title-lg": ["\"Source Serif 4\""],
                        "display-lg": ["\"Source Serif 4\""],
                        "headline-md": ["\"Source Serif 4\""],
                        "headline-md-mobile": ["\"Source Serif 4\""],
                        "body-lg": ["Inter"],
                        "caption": ["Inter"],
                        "body-md": ["Inter"],
                        "display-lg-mobile": ["\"Source Serif 4\""],
                        "label-md": ["Inter"]
                    },
                    "fontSize": {
                        "title-lg": ["22px", { "lineHeight": "28px", "fontWeight": "600" }],
                        "display-lg": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["32px", { "lineHeight": "40px", "fontWeight": "600" }],
                        "headline-md-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "600" }],
                        "body-lg": ["18px", { "lineHeight": "30px", "fontWeight": "400" }],
                        "caption": ["12px", { "lineHeight": "16px", "fontWeight": "400" }],
                        "body-md": ["16px", { "lineHeight": "26px", "fontWeight": "400" }],
                        "display-lg-mobile": ["32px", { "lineHeight": "40px", "fontWeight": "700" }],
                        "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600" }]
                    }
                }
            }
        }
    </script>
    <style>
        .pattern-overlay {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l30 30-30 30L0 30z' fill='%23064e3b' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-cream-canvas text-on-surface font-body-md text-body-md antialiased selection:bg-gold-leaf selection:text-primary">

<!-- Header Navbar -->
<header class="bg-background dark:bg-background border-b border-outline-variant dark:border-outline shadow-sm dark:shadow-none sticky top-0 z-50">
    <div class="flex justify-between items-center w-full px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto h-20">
        <div class="flex items-center gap-8">
            <a class="font-display-lg text-display-lg font-bold text-emerald-deep dark:text-primary-fixed-dim shrink-0" href="/">Warta NU</a>
            <nav class="hidden md:flex items-center gap-6">
                <a class="text-primary dark:text-secondary-fixed border-b-2 border-secondary font-bold pb-1 font-title-lg text-sm" href="#">Berita Utama</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant hover:text-primary hover:bg-surface-container-low dark:hover:bg-tertiary-container transition-colors duration-200 px-3 py-2 rounded-lg font-title-lg text-title-lg" href="#">Keislaman</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant hover:text-primary hover:bg-surface-container-low dark:hover:bg-tertiary-container transition-colors duration-200 px-3 py-2 rounded-lg font-title-lg text-title-lg" href="#">Opini & Fatwa</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant hover:text-primary hover:bg-surface-container-low dark:hover:bg-tertiary-container transition-colors duration-200 px-3 py-2 rounded-lg font-title-lg text-title-lg" href="#">Pesantren</a>
                <a class="text-on-surface-variant dark:text-on-surface-variant hover:text-primary hover:bg-surface-container-low dark:hover:bg-tertiary-container transition-colors duration-200 px-3 py-2 rounded-lg font-title-lg text-title-lg" href="#">Khazanah</a>
            </nav>
        </div>
        <div class="flex items-center gap-4">
            <button aria-label="search" class="text-on-surface-variant hover:text-primary transition-colors p-2 hidden md:block">
                <span class="material-symbols-outlined" data-icon="search">search</span>
            </button>
            <a class="bg-primary hover:bg-emerald-deep text-on-primary px-6 py-2.5 rounded-full font-label-md text-label-md transition-all shadow-sm" href="{{ route('members.register-form') }}">Pendaftaran Anggota</a>
        </div>
    </div>
</header>

<main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-section-gap space-y-section-gap">
    
    @if($newsList->isNotEmpty())
        @php $headline = $newsList->first(); @endphp

        <!-- Hero / Headline Section -->
        <section class="relative rounded-xl overflow-hidden bg-surface-container-lowest shadow-sm border border-surface-variant">
            <div class="grid md:grid-cols-2 gap-0">
                <div class="p-8 md:p-12 flex flex-col justify-center relative pattern-overlay z-10">
                    <div class="inline-flex items-center gap-2 mb-6">
                        <span class="bg-[#fcf6e5] text-on-secondary-container px-3 py-1 rounded-full font-label-md text-label-md border border-gold-leaf/30">
                            {{ $headline->kategori->nama ?? 'Laporan Utama' }}
                        </span>
                        <span class="text-on-surface-variant font-caption text-caption flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm" data-icon="schedule">schedule</span> 
                            {{ $headline->created_at->translatedFormat('d M Y') }}
                        </span>
                    </div>
                    <h1 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-emerald-deep mb-4 leading-tight">
                        <a href="{{ route('berita.show', $headline->slug) }}" class="hover:underline">
                            {{ $headline->judul }}
                        </a>
                    </h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 line-clamp-3">
                        {{ Str::limit(strip_tags($headline->isi), 180) }}
                    </p>
                    <div>
                        <a class="inline-flex items-center gap-2 border-2 border-gold-leaf text-secondary hover:bg-gold-leaf hover:text-on-secondary px-6 py-3 rounded-full font-label-md text-label-md transition-colors" href="{{ route('berita.show', $headline->slug) }}">
                            Baca Selengkapnya
                            <span class="material-symbols-outlined text-sm" data-icon="arrow_forward">arrow_forward</span>
                        </a>
                    </div>
                </div>
                <div class="relative h-64 md:h-auto min-h-[400px]">
                    @if($headline->gambar)
                        <img alt="{{ $headline->judul }}" class="absolute inset-0 w-full h-full object-cover" src="{{ Storage::url($headline->gambar) }}"/>
                    @else
                        <div class="absolute inset-0 w-full h-full bg-slate-200 flex items-center justify-center text-slate-500">
                            <span>Tidak ada gambar</span>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Kabar Terkini (Grid List Berita) -->
        <section>
            <div class="flex items-center justify-between mb-8 border-b-2 border-surface-variant pb-4">
                <h2 class="font-headline-md text-headline-md text-emerald-deep flex items-center gap-2">
                    <span class="w-2 h-8 bg-gold-leaf inline-block rounded-sm"></span>
                    Kabar Terkini
                </h2>
                <a class="text-primary hover:text-emerald-deep font-label-md text-label-md flex items-center gap-1 transition-colors" href="#">
                    Lihat Semua 
                    <span class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
                @foreach($newsList->skip(1) as $berita)
                    <article class="bg-surface-container-lowest rounded-xl overflow-hidden border-t-4 border-emerald-deep border-x border-b border-surface-variant shadow-[0_4px_20px_rgba(6,78,59,0.05)] hover:shadow-lg transition-shadow duration-300 group flex flex-col h-full">
                        <div class="relative h-48 overflow-hidden">
                            @if($berita->gambar)
                                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $berita->judul }}" src="{{ Storage::url($berita->gambar) }}"/>
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-400">
                                    <span class="text-xs">Tidak ada gambar</span>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="bg-surface-container-lowest/90 backdrop-blur-sm text-emerald-deep px-3 py-1 rounded-full font-caption text-caption font-semibold">
                                    {{ $berita->kategori->nama ?? 'Berita' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-on-surface-variant font-caption text-caption mb-3 flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm" data-icon="calendar_today">calendar_today</span> 
                                {{ $berita->created_at->translatedFormat('d M Y') }}
                            </div>
                            <h3 class="font-title-lg text-title-lg text-primary group-hover:text-gold-leaf transition-colors mb-3 line-clamp-2">
                                <a href="{{ route('berita.show', $berita->slug) }}">
                                    {{ $berita->judul }}
                                </a>
                            </h3>
                            <p class="font-body-md text-body-md text-on-surface-variant mb-6 line-clamp-3 flex-grow">
                                {{ Str::limit(strip_tags($berita->isi), 120) }}
                            </p>
                            <a class="inline-flex items-center gap-1 text-primary font-label-md text-label-md group-hover:underline mt-auto" href="{{ route('berita.show', $berita->slug) }}">
                                Baca artikel 
                                <span class="material-symbols-outlined text-sm" data-icon="arrow_right_alt">arrow_right_alt</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

    @else
        <!-- Tampilan jika tidak ada berita di database -->
        <div class="text-center py-16 bg-surface-container-lowest rounded-xl border border-surface-variant">
            <p class="text-on-surface-variant font-body-lg">Belum ada berita yang diterbitkan.</p>
        </div>
    @endif

    <!-- CTA Banner -->
    <section class="bg-gradient-to-r from-emerald-deep to-primary rounded-xl overflow-hidden relative shadow-lg">
        <div class="absolute inset-0 pattern-overlay opacity-20"></div>
        <div class="relative z-10 px-8 py-16 md:px-16 md:py-20 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
            <div class="max-w-2xl">
                <h2 class="font-display-lg-mobile md:font-display-lg text-display-lg-mobile md:text-display-lg text-on-primary mb-4">Gabung Bersama Anggota Nahdlatul Ulama</h2>
                <p class="font-body-lg text-body-lg text-primary-fixed-dim">Jadilah bagian dari organisasi Islam terbesar di dunia. Bersama kita rawat tradisi, bangun peradaban, dan sebarkan Islam rahmatan lil 'alamin.</p>
            </div>
            <div class="shrink-0">
                <a class="bg-secondary hover:bg-gold-leaf text-on-secondary px-8 py-4 rounded-full font-label-md text-label-md transition-colors shadow-md flex items-center gap-2 text-lg" href="{{ route('members.register-form') }}">
                    Daftar Sekarang
                    <span class="material-symbols-outlined" data-icon="person_add">person_add</span>
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="bg-primary dark:bg-on-primary-fixed w-full mt-section-gap border-t-4 border-gold-leaf flat no shadows">
    <div class="w-full py-12 px-margin-mobile md:px-margin-desktop flex flex-col md:flex-row justify-between items-center max-w-container-max mx-auto gap-8">
        <div class="flex flex-col items-center md:items-start gap-4">
            <div class="font-headline-md text-headline-md text-on-primary">Warta NU</div>
            <p class="text-on-primary-fixed-variant font-caption text-caption text-center md:text-left max-w-sm">Media Informasi dan Komunikasi Resmi Nahdlatul Ulama, menyajikan berita terpercaya berlandaskan Islam Ahlussunnah wal Jamaah.</p>
        </div>
        <nav class="flex flex-wrap justify-center gap-6">
            <a class="text-on-primary opacity-80 hover:opacity-100 font-body-md text-body-md hover:text-secondary-fixed transition-colors" href="#">Tentang Kami</a>
            <a class="text-on-primary opacity-80 hover:opacity-100 font-body-md text-body-md hover:text-secondary-fixed transition-colors" href="#">Redaksi</a>
            <a class="text-on-primary opacity-80 hover:opacity-100 font-body-md text-body-md hover:text-secondary-fixed transition-colors" href="#">Pedoman Media</a>
            <a class="text-on-primary opacity-80 hover:opacity-100 font-body-md text-body-md hover:text-secondary-fixed transition-colors" href="#">Kontak</a>
            <a class="text-on-primary opacity-80 hover:opacity-100 font-body-md text-body-md hover:text-secondary-fixed transition-colors" href="#">Iklan</a>
        </nav>
    </div>
    <div class="border-t border-primary-container py-6">
        <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center md:text-left text-on-primary-fixed-variant font-caption text-caption">
            © {{ date('Y') }} Warta NU. Media Resmi Nahdlatul Ulama.
        </div>
    </div>
</footer>

</body>
</html>