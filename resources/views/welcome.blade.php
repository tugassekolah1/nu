<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Nahdlatul Ulama Banjaranyar, Cilongok - Berkhidmat untuk Umat</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@200..700,0..1&display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              colors: {
                "warm-bg": "#F7F5EF",
                "warm-card": "#FDFCF7",
                "charcoal": "#171816",
                "muted-charcoal": "#4F544E",
                "nu-deep": "#16452F",
                "nu-night": "#141815",
                "muted-sage": "#E7ECE4",
                "warm-beige": "#EDE8DD",
                "muted-gold": "#B49352",
                "border-neutral": "#E5E2D9",
                "border-subtle": "#D5D2C8",
              },
              fontFamily: {
                sans: ["Inter", "sans-serif"],
                arabic: ["Amiri", "serif"],
              },
              borderRadius: {
                "btn": "14px",
                "card": "20px",
                "container-r": "28px",
              },
              boxShadow: {
                "subtle": "0 2px 10px rgba(23, 24, 22, 0.04), 0 1px 3px rgba(23, 24, 22, 0.03)",
                "elevated": "0 10px 30px rgba(23, 24, 22, 0.06), 0 1px 3px rgba(23, 24, 22, 0.04)",
              }
            }
          }
        };
    </script>
    <style>
        @layer base {
          body {
            font-family: 'Inter', sans-serif;
            color: #171816;
            background-color: #F7F5EF;
            -webkit-font-smoothing: antialiased;
          }
        }
        .neutral-frosted {
          background: rgba(247, 245, 239, 0.88);
          backdrop-filter: blur(16px);
          -webkit-backdrop-filter: blur(16px);
          border: 1px solid rgba(215, 210, 200, 0.7);
        }
        .dark-editorial-panel {
          background: #16452F;
          border: 1px solid rgba(255, 255, 255, 0.12);
        }
        /* Animasi awal saat halaman dibuka: hero section */
#beranda .lg\:col-span-6,
#beranda h1,
#beranda p {
  opacity: 0;
  animation: fadeInUp 0.8s ease-out forwards;
}
#beranda h1 { animation-delay: 0.15s; }
#beranda p  { animation-delay: 0.3s; }

@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(24px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* Animasi saat di-scroll: berlaku untuk SEMUA <section> otomatis */
section {
  opacity: 0;
  transform: translateY(32px);
  transition: opacity 0.7s ease-out, transform 0.7s ease-out;
}
section.revealed {
  opacity: 1;
  transform: translateY(0);
}

/* Card di dalam grid ikut stagger otomatis, tanpa perlu class tambahan */
section.revealed .grid > * {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeInUp 0.6s ease-out forwards;
}
section.revealed .grid > *:nth-child(1) { animation-delay: 0.05s; }
section.revealed .grid > *:nth-child(2) { animation-delay: 0.15s; }
section.revealed .grid > *:nth-child(3) { animation-delay: 0.25s; }
section.revealed .grid > *:nth-child(4) { animation-delay: 0.35s; }

@media (prefers-reduced-motion: reduce) {
  section, section .grid > *, #beranda * {
    opacity: 1 !important;
    transform: none !important;
    animation: none !important;
    transition: none !important;
  }
}
    </style>
</head>
<body class="selection:bg-muted-sage selection:text-nu-deep bg-warm-bg text-charcoal">
<!-- 1. NAVBAR (Neutral Frosted Editorial Glass) -->
{{-- <header class="fixed top-0 inset-x-0 z-50 px-4 sm:px-8 pt-4 pb-2 transition-all">
    <div class="max-w-7xl mx-auto neutral-frosted rounded-full px-5 py-3 shadow-subtle flex items-center justify-between">
        <!-- Brand & Official Badge -->
        <a class="flex items-center gap-3 group" href="{{ route('landing') }}">
            <img alt="Logo NU Banjaranyar" class="w-10 h-10 object-contain drop-shadow-sm group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida/AEtjO1VVjAZeFl8x9UC1ygLyGJQ7s08PMheg8thGTpLjMGEDNy6dxehyc8qxHnJ3TWq0onXXPh6_HPNWDese-jycKUQ2eb98-bnO7YW_VY0GaCIEySrmJqvz-GHn0s7CMUqoutQaae-CsDK4XqFr1CTpqkfXyJQS3h0oeeJcHzC-gIHlGibUdsPPEn0o-vdxP46pPspwdFoEMDPWgm6H4UW6yedGPXqeoPVeyU2SVeokYJCsQ1wcEIIhfseMkPXD"/>
            <div class="flex flex-col">
                <span class="font-bold text-base sm:text-lg tracking-tight text-charcoal leading-tight">NU BANJARANYAR</span>
                <span class="text-xs font-medium text-muted-charcoal tracking-wide">Kecamatan Cilongok, Banyumas</span>
            </div>
        </a>
        <!-- Desktop Nav -->
        <nav class="hidden lg:flex items-center gap-1 text-sm font-medium text-muted-charcoal">
            <a class="px-4 py-2 rounded-full text-charcoal font-semibold bg-warm-beige/70 transition-colors" href="{{ route('landing') }}">Beranda</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="#agenda">Agenda</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="#berita">Warta Kabar</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="#layanan">Layanan Warga</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="#tentang">Tentang NU</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="{{ route('profil') }}">Pengurus</a>
        </nav>
        <!-- Action CTAs -->
        <div class="flex items-center gap-2 sm:gap-3">
            <a class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 min-h-[44px] rounded-btn bg-nu-deep text-white font-medium text-sm hover:bg-[#113725] transition-all active:scale-95 shadow-sm" href="{{ route('members.register-form') }}">
                <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                <span>Daftar Anggota</span>
            </a>
            <a class="inline-flex items-center gap-1.5 px-4 py-2 min-h-[44px] rounded-btn bg-warm-card hover:bg-warm-beige/60 text-charcoal font-semibold text-xs sm:text-sm border border-border-subtle transition-all" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">
                <span class="material-symbols-outlined text-muted-charcoal text-[18px]">chat</span>
                <span class="hidden md:inline">Hubungi Kami</span>
            </a>
        </div>
    </div>
</header> --}}
<x-navbar></x-navbar>
<main class="w-full bg-warm-bg">
    <!-- 2. HERO / ORGANIZATION INTRODUCTION (EDITORIAL ART DIRECTION) -->
    <section class="relative pt-32 sm:pt-36 lg:pt-40 pb-20 sm:pb-24 px-4 sm:px-8 max-w-7xl mx-auto" id="beranda">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
            <!-- Left: Monumental Editorial Text & CTAs -->
            <div class="lg:col-span-6 flex flex-col justify-center text-left">
                <!-- Basmalah Calligraphy -->
                <div class="mb-5 inline-flex items-center">
                    <p class="font-arabic text-2xl sm:text-3xl text-muted-gold tracking-wide select-none font-normal">
                        بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
                    </p>
                </div>
                <!-- Institutional Tag -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-muted-sage text-charcoal font-medium text-xs sm:text-sm mb-6 w-fit border border-border-neutral">
                    <span class="w-2 h-2 rounded-full bg-nu-deep"></span>
                    <span>Website Resmi MWC NU Cilongok</span>
                </div>
                <!-- Headline -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-charcoal tracking-tight leading-[1.14] mb-6">
                    Nahdlatul Ulama <span class="block text-nu-deep">Kecamatan Cilongok</span>
                </h1>
                <!-- Warm Paragraph -->
                <p class="text-base sm:text-lg text-muted-charcoal leading-relaxed mb-8 max-w-xl">
                    Berkhidmah untuk Umat, Menjaga Tradisi Ahlussunnah wal Jama'ah. Wadah persaudaraan Nahdliyin desa Banjaranyar yang mandiri, guyub, dan penuh maslahat.
                </p>
                <!-- Direct High-Contrast Action CTAs -->
                <div class="flex flex-wrap items-center gap-3 sm:gap-4">
                    <a class="inline-flex items-center justify-center gap-2 px-6 py-3.5 min-h-[48px] rounded-btn bg-nu-deep text-white font-semibold text-base hover:bg-[#113725] shadow-subtle transition-all active:scale-95" href="#agenda">
                        <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        <span>Lihat Agenda Terdekat</span>
                    </a>
                    <a class="inline-flex items-center justify-center gap-2 px-6 py-3.5 min-h-[48px] rounded-btn bg-warm-card text-charcoal font-semibold text-base border border-border-subtle hover:bg-warm-beige/50 transition-all shadow-subtle" href="#berita">
                        <span>Baca Warta Terbaru</span>
                        <span class="material-symbols-outlined text-[18px] text-muted-charcoal">arrow_forward</span>
                    </a>
                </div>
                <!-- Quick Stat Badge Row (dengan Count-Up Animation) -->
                <div class="mt-10 pt-8 border-t border-border-neutral flex items-center gap-8 text-left" id="hero-stats-counter">
                    <div>
                        <div class="text-2xl sm:text-3xl font-bold text-charcoal"
                             data-count-target="{{ preg_replace('/[^0-9]/', '', $stats['majelis_taklim'] ?? '12') }}"
                             data-count-suffix="{{ preg_replace('/[0-9]/', '', $stats['majelis_taklim'] ?? '12') }}">0</div>
                        <div class="text-xs sm:text-sm text-muted-charcoal font-medium">Majelis Taklim</div>
                    </div>
                    <div class="h-8 w-px bg-border-neutral"></div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-bold text-charcoal"
                             data-count-target="{{ preg_replace('/[^0-9]/', '', $stats['warga_nahdliyin'] ?? '850+') }}"
                             data-count-suffix="{{ preg_replace('/[0-9]/', '', $stats['warga_nahdliyin'] ?? '850+') }}">0</div>
                        <div class="text-xs sm:text-sm text-muted-charcoal font-medium">Warga Nahdliyin</div>
                    </div>
                    <div class="h-8 w-px bg-border-neutral"></div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-bold text-charcoal"
                             data-count-target="100"
                             data-count-suffix="%">0</div>
                        <div class="text-xs sm:text-sm text-muted-charcoal font-medium">ZISWAF Terverifikasi</div>
                    </div>
                </div>
            </div>
            <!-- Right: Authentic Photographic Container -->
            <div class="lg:col-span-6 relative">
                <div class="relative rounded-container-r overflow-hidden shadow-elevated bg-warm-card border border-border-neutral">
                    <img alt="Masjid Komunitas Nahdlatul Ulama Jawa Tengah" class="w-full h-[380px] sm:h-[460px] lg:h-[500px] object-cover hover:scale-[1.02] transition-transform duration-700 ease-out" src="https://lh3.googleusercontent.com/aida/AEtjO1XjdFNzwEN44vo6uvXmdLOU24k5K44IEpb0OdCUfG-RxXEdQXf913ZWxoz2dmsD08PciwI6DqHPNugh6LIkGV6DML8vlIq4Td7eZcePFKwHudAZXw-kBdKWOLygVJrjuiqfsCG7K1uwIVBKQqNUbU5CLocxDxT-cfUbaK6qOaW8uIUdZ5R0nlAt21NXXJ-iN5va7vrnDkQI69kXYqON9WyK6wAEmWLJAv8FSyrhPKecmmEQ10fQAKjuGZE3"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal/70 via-transparent to-transparent"></div>
                    <!-- Bottom Overlay on Image -->
                    <div class="absolute bottom-4 left-4 right-4 p-4 sm:p-5 rounded-card bg-warm-card/95 border border-border-neutral text-charcoal shadow-subtle">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-muted-sage text-charcoal flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-[22px]">mosque</span>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-bold uppercase tracking-wider text-nu-deep">Pusat Amaliyah & Khidmat</p>
                                <p class="text-sm font-semibold text-charcoal line-clamp-1">Masjid Jami' Al-Ikhlas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
    <!-- 3. AGENDA TERDEKAT (DIRECTLY VISIBLE, INSTANTLY SCANNABLE EDITORIAL LAYOUT) -->
    <section class="w-full py-16 sm:py-24 bg-warm-card border-y border-border-neutral" id="agenda">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-muted-sage text-charcoal text-xs font-semibold uppercase tracking-wider mb-2 border border-border-neutral">
                        <span class="material-symbols-outlined text-[16px] text-muted-charcoal">event_upcoming</span>
                        <span>Jadwal Pengajian Ranting</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-charcoal tracking-tight">Agenda Terdekat</h2>
                    <p class="text-base text-muted-charcoal mt-1">Ikuti kegiatan & pengajian NU yang akan datang di wilayah Banjaranyar.</p>
                </div>
                <a class="inline-flex items-center gap-2 font-semibold text-sm text-nu-deep hover:text-charcoal transition-colors group" href="#agenda">
                    <span>Lihat Semua Agenda</span>
                    <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
            <!-- Editorial Grid: 1 Large Featured + 2 Secondary Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
                <!-- FEATURED BIG UPCOMING EVENT CARD (Huge Bold Date Typography) -->
                @if($upcomingAgenda->isNotEmpty())
                    @php $featuredAgenda = $upcomingAgenda->first(); @endphp
                    <div class="lg:col-span-7 bg-warm-bg rounded-container-r p-6 sm:p-8 border border-border-neutral flex flex-col justify-between relative overflow-hidden shadow-subtle">
                        <div class="relative z-10">
                            <!-- Badge Row -->
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
                                <span class="px-3.5 py-1 rounded-full bg-nu-deep text-white text-xs font-bold uppercase tracking-wider">
                                    Agenda Utama Terdekat
                                </span>
                                <span class="text-xs font-semibold px-3 py-1 rounded-full bg-warm-beige text-charcoal border border-border-subtle">
                                    {{ $featuredAgenda->category ?? 'Malam Rabu Pon' }}
                                </span>
                            </div>
                            <!-- Huge Date Typography -->
                            <div class="mb-4">
                                <span class="block text-xs uppercase tracking-widest font-bold text-muted-charcoal">WAKTU PELAKSANAAN</span>
                                <p class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-charcoal tracking-tight mt-1">
                                    {{ strtoupper($featuredAgenda->event_date->locale('id')->translatedFormat('l, d F Y')) }}
                                </p>
                                <p class="text-sm font-semibold text-nu-deep mt-0.5">{{ $featuredAgenda->event_time ?? 'Pukul 19.45 WIB (Ba\'da Isya)' }} — Selesai</p>
                            </div>
                            <!-- Event Title & Excerpt -->
                            <h3 class="text-xl sm:text-2xl font-bold text-charcoal mb-3 leading-snug">
                                {{ $featuredAgenda->title }}
                            </h3>
                            <p class="text-sm sm:text-base text-muted-charcoal leading-relaxed mb-6">
                                {{ Str::limit($featuredAgenda->description ?? $featuredAgenda->deskripsi ?? 'Rangkaian istighotsah kubro, tahlil massal, sholawat nahdliyah, dan taushiyah keaswajaan bersama segenap jajaran Syuriyah dan Tanfidziyah Ranting.', 200) }}
                            </p>
                            <!-- Meta specs -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 p-4 rounded-card bg-warm-card border border-border-neutral text-sm">
                                @if($featuredAgenda->location ?? $featuredAgenda->lokasi ?? null)
                                    <div class="flex items-start gap-2.5">
                                        <span class="material-symbols-outlined text-muted-charcoal text-[20px] shrink-0">location_on</span>
                                        <span class="font-medium text-charcoal">{{ $featuredAgenda->location ?? $featuredAgenda->lokasi }}</span>
                                    </div>
                                @endif
                                @if($featuredAgenda->speaker ?? $featuredAgenda->pemateri ?? null)
                                    <div class="flex items-start gap-2.5">
                                        <span class="material-symbols-outlined text-muted-gold text-[20px] shrink-0">record_voice_over</span>
                                        <span class="font-medium text-charcoal">Mau'idzah: {{ $featuredAgenda->speaker ?? $featuredAgenda->pemateri }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Action bottom -->
                        <div class="relative z-10 mt-8 pt-6 border-t border-border-neutral flex flex-wrap items-center justify-between gap-4">
                            <span class="text-xs font-medium text-muted-charcoal">Terbuka untuk Umum (Putra & Putri)</span>
                            <a class="inline-flex items-center gap-2 px-5 py-2.5 min-h-[44px] rounded-btn bg-nu-deep text-white text-sm font-medium hover:bg-[#113725] transition-colors" href="https://wa.me/6281234567890?text=Konfirmasi%20Kehadiran%20{{ urlencode($featuredAgenda->title) }}" rel="noopener noreferrer" target="_blank">
                                <span>Lihat Detail & Lokasi</span>
                                <span class="material-symbols-outlined text-[18px]">navigation</span>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- 2 SECONDARY UPCOMING EVENTS STACKED -->
                <div class="lg:col-span-5 flex flex-col gap-6">
                    @forelse($upcomingAgenda->skip(1)->take(2) as $agenda)
                        <div class="bg-warm-bg rounded-container-r p-6 border border-border-neutral flex flex-col justify-between shadow-subtle">
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-bold uppercase tracking-wider text-muted-charcoal">{{ $agenda->event_date->translatedFormat('l, d M Y') }}</span>
                                    <span class="text-xs px-2.5 py-0.5 rounded-full bg-muted-sage text-charcoal font-semibold border border-border-neutral">{{ $agenda->category ?? 'LAZISNU' }}</span>
                                </div>
                                <h4 class="text-lg font-bold text-charcoal mb-2 hover:text-nu-deep transition-colors">
                                    {{ $agenda->title }}
                                </h4>
                                <p class="text-xs sm:text-sm text-muted-charcoal line-clamp-2 leading-relaxed mb-4">
                                    {{ Str::limit($agenda->description ?? $agenda->deskripsi ?? '', 150) }}
                                </p>
                                <div class="flex items-center gap-2 text-xs font-medium text-muted-charcoal">
                                    <span class="material-symbols-outlined text-[18px] text-muted-charcoal">apartment</span>
                                    <span>{{ $agenda->location ?? $agenda->lokasi ?? 'Aula Gedung Ranting PRNU Banjaranyar' }}</span>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-border-neutral flex items-center justify-between">
                                <span class="text-xs text-muted-charcoal">{{ $agenda->event_time ?? 'Pukul 08.30 WIB' }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="bg-warm-bg rounded-container-r p-6 border border-border-neutral flex flex-col justify-center items-center text-center shadow-subtle">
                            <span class="material-symbols-outlined text-muted-charcoal text-4xl mb-2">event_busy</span>
                            <p class="text-sm font-semibold text-charcoal">Belum ada agenda tambahan</p>
                            <p class="text-xs text-muted-charcoal mt-1">Nantikan kegiatan selanjutnya</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- 4. KABAR TERBARU (EDITORIAL NEWS COMPOSITION: ASYMMETRIC) -->
    <section class="w-full py-16 sm:py-24 bg-warm-bg" id="berita">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-muted-sage text-charcoal text-xs font-semibold uppercase tracking-wider mb-2 border border-border-neutral">
                        <span class="material-symbols-outlined text-[16px] text-muted-charcoal">feed</span>
                        <span>Warta & Narasi Nahdliyin</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-charcoal tracking-tight">Kabar Terbaru Ranting</h2>
                    <p class="text-base text-muted-charcoal mt-1">Dokumentasi gerak, fatwa, dan kabar sosial seputar warga NU Cilongok.</p>
                </div>
                <a class="inline-flex items-center gap-2 font-semibold text-sm text-nu-deep hover:text-charcoal transition-colors group" href="{{ route('berita.public')}}">
                    <span>Lihat Semua Berita</span>
                    <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                <!-- ONE LARGE FEATURED STORY (Left) -->
                @if($newsList->isNotEmpty())
                    @php $featuredNews = $newsList->first(); @endphp
                    <article class="lg:col-span-7 bg-warm-card rounded-container-r border border-border-neutral overflow-hidden flex flex-col justify-between shadow-subtle group">
                        <div>
                            <div class="relative h-64 sm:h-80 w-full overflow-hidden">
                                <img alt="{{ $featuredNews->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ $featuredNews->gambar ? Storage::url($featuredNews->gambar) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuALJW36SfuHdqaIUBnAV33yc_p3mURfwwxP-zISe3TI_oxyOpGcbYYs31ulyiDy4QChMr9yTHggIvicAsmVx6hsW4WW0WmI3evkBVt2UljE3wn7qNo-yN8xigpyzZ4E4Qowhq5xm347RUfevQm4nC8Sd3lOFHwRgQeGkkDgckRn-NnLo3_EgLpE_9XJt2XfwJ2_cuz1EqdF7qlRqrTSlnRR_xGHmxw7X9r867rxPKhq0fF5osmjZQ94jw' }}"/>
                                <div class="absolute top-4 left-4">
                                    <span class="px-3.5 py-1 rounded-full bg-charcoal/90 text-white text-xs font-semibold backdrop-blur-md">
                                        Laporan Utama
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 sm:p-8">
                                <div class="flex items-center gap-3 text-xs text-muted-charcoal font-medium mb-3">
                                    <span>{{ $featuredNews->created_at->translatedFormat('d F Y') }}</span>
                                    <span>•</span>
                                    <span>Oleh {{ $featuredNews->user->name ?? 'Sekretariat PRNU' }}</span>
                                    @if($featuredNews->kategori)
                                        <span>•</span>
                                        <span class="text-nu-deep font-semibold">{{ $featuredNews->kategori }}</span>
                                    @endif
                                </div>
                                <h3 class="text-2xl sm:text-3xl font-extrabold text-charcoal mb-4 leading-snug group-hover:text-nu-deep transition-colors">
                                    <a href="{{ route('berita.show', $featuredNews->slug) }}">{{ $featuredNews->judul }}</a>
                                </h3>
                                <p class="text-base text-muted-charcoal leading-relaxed">
                                    {{ Str::limit(strip_tags($featuredNews->konten), 250) }}
                                </p>
                            </div>
                        </div>
                        <div class="px-6 sm:px-8 pb-6 sm:pb-8 pt-2 flex items-center justify-between">
                            <a class="inline-flex items-center gap-2 text-sm font-bold text-nu-deep hover:underline" href="{{ route('berita.show', $featuredNews->slug) }}">
                                <span>Baca Selengkapnya</span>
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </a>
                            <span class="text-xs text-muted-charcoal">4 menit baca</span>
                        </div>
                    </article>
                @endif

                <!-- TWO/THREE SECONDARY STORIES (Right Stacked) -->
                <div class="lg:col-span-5 flex flex-col gap-6 ">
                    @if($newsList->count() > 1)
                        @foreach($newsList->skip(1)->take(2) as $berita)
                            <article class="bg-warm-card rounded-card p-5 border border-border-neutral flex flex-col sm:flex-row gap-4 items-start shadow-subtle group">
                                <div class="w-full sm:w-36 h-32 rounded-btn overflow-hidden shrink-0">
                                    <img alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $berita->gambar ? Storage::url($berita->gambar) : '' }}"/>
                                </div>
                                <div class="flex flex-col justify-between flex-1">
                                    <div>
                                        <span class="text-[11px] font-bold text-muted-charcoal uppercase tracking-wider">{{ $berita->kategori ?? 'Kaderisasi Banom' }}</span>
                                        <h4 class="text-base font-bold text-charcoal mt-1 mb-1 leading-snug group-hover:text-nu-deep transition-colors">
                                            <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                                        </h4>
                                        <p class="text-xs text-muted-charcoal line-clamp-2 leading-relaxed">
                                            {{ Str::limit(strip_tags($berita->konten), 120) }}
                                        </p>
                                    </div>
                                    <div class="mt-3 flex items-center justify-between text-xs text-muted-charcoal font-medium">
                                        <span>{{ $berita->created_at->translatedFormat('d M Y') }}</span>
                                        <a href="{{ route('berita.show', $berita->slug) }}" class="text-nu-deep font-semibold group-hover:underline">Baca →</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- 5. YANG MUNGKIN ANDA CARI (PRIMARY SERVICES USABILITY SECTION) -->
    <section class="w-full py-16 sm:py-24 bg-warm-card border-t border-border-neutral" id="layanan">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="max-w-2xl mb-12">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-muted-sage text-charcoal text-xs font-semibold uppercase tracking-wider mb-2 border border-border-neutral">
                    <span class="material-symbols-outlined text-[16px] text-muted-charcoal">touch_app</span>
                    <span>Aksesibilitas Umat</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-charcoal tracking-tight">Yang Mungkin Anda Cari</h2>
                <p class="text-base text-muted-charcoal mt-1">Layanan terpadu yang dirancang mudah dan jelas untuk seluruh kalangan warga dan sesepuh jamaah.</p>
            </div>
            <!-- Varied Card Hierarchy -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Large & Prominent Anchor Visual (KARTANU) -->
                <a class="md:col-span-2 lg:col-span-1 p-6 sm:p-7 rounded-container-r bg-nu-deep text-white flex flex-col justify-between hover:bg-[#113725] transition-all shadow-subtle group relative overflow-hidden" href="{{ route('members.register-form') }}">
                    <div class="relative z-10">
                        <div class="w-14 h-14 rounded-card bg-white/10 flex items-center justify-center text-white mb-6 border border-white/20">
                            <span class="material-symbols-outlined text-[30px]">badge</span>
                        </div>
                        <span class="text-xs uppercase tracking-widest font-bold text-muted-gold">Layanan Utama</span>
                        <h3 class="text-2xl font-bold mt-1 mb-2 text-white">Daftar Anggota (KARTANU)</h3>
                        <p class="text-sm text-white/80 leading-relaxed">
                            Pendaftaran resmi Kartu Tanda Anggota Nahdlatul Ulama secara mandiri, mudah, dan tercatat di pusat.
                        </p>
                    </div>
                    <div class="relative z-10 mt-8 pt-4 border-t border-white/15 flex items-center justify-between text-sm font-semibold text-muted-gold">
                        <span>Isi Formulir Sekarang</span>
                        <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1.5 transition-transform">arrow_forward</span>
                    </div>
                </a>
                <!-- Card 2: Agenda & Jadwal Majelis -->
                <a class="p-6 sm:p-7 rounded-container-r bg-warm-bg border border-border-neutral flex flex-col justify-between hover:bg-warm-card hover:shadow-subtle transition-all group" href="#agenda">
                    <div>
                        <div class="w-14 h-14 rounded-card bg-muted-sage flex items-center justify-center text-charcoal mb-6">
                            <span class="material-symbols-outlined text-[30px]">calendar_month</span>
                        </div>
                        <h3 class="text-xl font-bold text-charcoal mb-2 group-hover:text-nu-deep transition-colors">Agenda & Jadwal Majelis</h3>
                        <p class="text-sm text-muted-charcoal leading-relaxed">
                            Informasi jadwal rotasi selapanan, tahlil keliling, dan pengajian kitab kuning tiap musala.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-border-neutral flex items-center justify-between text-sm font-semibold text-nu-deep">
                        <span>Cek Jadwal</span>
                        <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1.5 transition-transform">arrow_forward</span>
                    </div>
                </a>
                <!-- Card 3: Warta & Informasi Jamaah -->
                <a class="p-6 sm:p-7 rounded-container-r bg-warm-bg border border-border-neutral flex flex-col justify-between hover:bg-warm-card hover:shadow-subtle transition-all group" href="#berita">
                    <div>
                        <div class="w-14 h-14 rounded-card bg-muted-sage flex items-center justify-center text-charcoal mb-6">
                            <span class="material-symbols-outlined text-[30px]">newspaper</span>
                        </div>
                        <h3 class="text-xl font-bold text-charcoal mb-2 group-hover:text-nu-deep transition-colors">Warta & Berita Jamaah</h3>
                        <p class="text-sm text-muted-charcoal leading-relaxed">
                            Publikasi kabar berkala, rilisan resmi ranting, dan informasi kemaslahatan warga.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-border-neutral flex items-center justify-between text-sm font-semibold text-nu-deep">
                        <span>Buka Warta</span>
                        <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1.5 transition-transform">arrow_forward</span>
                    </div>
                </a>
                <!-- Card 4: Koin NU & ZISWAF Mandiri -->
                <a class="p-6 sm:p-7 rounded-container-r bg-warm-bg border border-border-neutral flex flex-col justify-between hover:bg-warm-card hover:shadow-subtle transition-all group" href="{{ route('infaq.index') }}">
                    <div>
                        <div class="w-14 h-14 rounded-card bg-warm-beige flex items-center justify-center text-charcoal mb-6 border border-border-subtle">
                            <span class="material-symbols-outlined text-[30px]">savings</span>
                        </div>
                        <h3 class="text-xl font-bold text-charcoal mb-2 group-hover:text-nu-deep transition-colors">Koin NU & ZISWAF</h3>
                        <p class="text-sm text-muted-charcoal leading-relaxed">
                            Layanan jemput koin infaq, zakat fitrah & mal via UPZIS LAZISNU Banjaranyar secara amanah.
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-border-neutral flex items-center justify-between text-sm font-semibold text-nu-deep">
                        <span>Salurkan Donasi</span>
                        <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1.5 transition-transform">arrow_forward</span>
                    </div>
                </a>
                <a class="p-6 sm:p-7 rounded-container-r bg-warm-bg border border-border-neutral flex flex-col justify-between hover:bg-warm-card hover:shadow-subtle transition-all group" href="/cek-kartu">
                    <div>
                        <div class="w-14 h-14 rounded-card bg-warm-beige flex items-center justify-center text-charcoal mb-6 border border-border-subtle">
                            <span class="material-symbols-outlined text-[30px]">savings</span>
                        </div>
                        <h3 class="text-xl font-bold text-charcoal mb-2 group-hover:text-nu-deep transition-colors">cetak kartu</h3>
                        <p class="text-sm text-muted-charcoal leading-relaxed">
                            Layanan cetak kartu anggota
                        </p>
                    </div>
                    <div class="mt-8 pt-4 border-t border-border-neutral flex items-center justify-between text-sm font-semibold text-nu-deep">
                        <span>Cetak</span>
                        <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1.5 transition-transform">arrow_forward</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- 6. INFORMASI & LAYANAN (QUIETER ACCESSIBILITY ROW) -->
    <section class="w-full py-12 bg-warm-bg border-b border-border-neutral">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="flex items-center justify-between mb-6">
                <span class="text-xs font-bold uppercase tracking-wider text-muted-charcoal">Informasi & Layanan Lainnya</span>
                <span class="text-xs text-muted-charcoal">Sekretariat PRNU Banjaranyar</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Item 1 -->
                <div class="p-4 rounded-card bg-warm-card border border-border-neutral flex items-center gap-3.5 hover:border-border-subtle transition-colors">
                    <div class="w-10 h-10 rounded-full bg-warm-beige flex items-center justify-center text-charcoal shrink-0">
                        <span class="material-symbols-outlined text-[20px]">account_tree</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-charcoal truncate">Struktur Pengurus</p>
                        <p class="text-xs text-muted-charcoal truncate">Masa Khidmat 2023 - 2028</p>
                    </div>
                    <a class="text-muted-charcoal hover:text-charcoal" href="{{ route('profil') }}">
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </a>
                </div>
                <!-- Item 2 -->
                <div class="p-4 rounded-card bg-warm-card border border-border-neutral flex items-center gap-3.5 hover:border-border-subtle transition-colors">
                    <div class="w-10 h-10 rounded-full bg-warm-beige flex items-center justify-center text-charcoal shrink-0">
                        <span class="material-symbols-outlined text-[20px]">photo_library</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-charcoal truncate">Galeri Dokumentasi</p>
                        <p class="text-xs text-muted-charcoal truncate">Foto & Video Kegiatan</p>
                    </div>
                    <a class="text-muted-charcoal hover:text-charcoal" href="{{ route('galeri.index') }}">
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </a>
                </div>
                <!-- Item 3 -->
                <div class="p-4 rounded-card bg-warm-card border border-border-neutral flex items-center gap-3.5 hover:border-border-subtle transition-colors">
                    <div class="w-10 h-10 rounded-full bg-warm-beige flex items-center justify-center text-charcoal shrink-0">
                        <span class="material-symbols-outlined text-[20px]">menu_book</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-charcoal truncate">Profil Ranting</p>
                        <p class="text-xs text-muted-charcoal truncate">Sejarah & Wilayah Dakwah</p>
                    </div>
                    <a class="text-muted-charcoal hover:text-charcoal" href="{{ route('profil') }}">
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </a>
                </div>
                <!-- Item 4 -->
                <div class="p-4 rounded-card bg-warm-card border border-border-neutral flex items-center gap-3.5 hover:border-border-subtle transition-colors">
                    <div class="w-10 h-10 rounded-full bg-warm-beige flex items-center justify-center text-charcoal shrink-0">
                        <span class="material-symbols-outlined text-[20px]">location_on</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-charcoal truncate">Kontak Sekretariat</p>
                        <p class="text-xs text-muted-charcoal truncate">{{ $kontak['alamat'] ?? 'Jl. Raya Cilongok No. 12' }}</p>
                    </div>
                    <a class="text-muted-charcoal hover:text-charcoal" href="#kontak">
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. TENTANG NU KECAMATAN (EDITORIAL DARK SECTION FOR VISUAL RHYTHM - SOLID DEEP NU GREEN) -->
    <section class="w-full py-20 sm:py-28 bg-nu-deep text-white relative overflow-hidden" id="tentang">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Big Typography Statement -->
                <div class="lg:col-span-6 flex flex-col">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-white text-xs font-semibold tracking-wider uppercase mb-6 w-fit border border-white/10">
                        <span>Khidmat Jam'iyyah</span>
                    </div>
                    <h2 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.15] mb-6 text-white">
                        Menjaga Tradisi, <br/>
                        <span class="text-muted-gold">Menggerakkan Maslahat.</span>
                    </h2>
                    <p class="text-base sm:text-lg text-white/80 leading-relaxed mb-8">
                        Di tanah ini, Nahdlatul Ulama terus menapaki jalan dakwah yang merangkul, membimbing amaliah Ahlussunnah wal Jama'ah an-Nahdliyah, dan mengawal kemandirian ekonomi umat melalui gotong royong tanpa henti.
                    </p>
                    <div>
                        <a class="inline-flex items-center gap-2 px-6 py-3 min-h-[48px] rounded-btn bg-warm-card text-charcoal font-bold text-sm hover:bg-warm-beige transition-colors shadow-subtle" href="{{ route('profil') }}">
                            <span>Profil Selengkapnya</span>
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                </div>
                <!-- Right: Authentic Quote Card Split Layout -->
                <div class="lg:col-span-6">
                    <div class="p-8 sm:p-10 rounded-container-r dark-editorial-panel relative">
                        <p class="font-arabic text-2xl sm:text-3xl text-muted-gold text-right leading-loose mb-6">
                            تَعَاوَنُوا عَلَى الْبِرِّ وَالتَّقْوَىٰ وَلَا تَعَاوَنُوا عَلَى الْإِثْمِ وَالْعُدْوَانِ
                        </p>
                        <blockquote class="text-base sm:text-lg italic text-white/90 leading-relaxed mb-6 font-light">
                            "{{ $pengurus['rais_syuriyah']['message'] ?? 'Nahdlatul Ulama adalah tali pengikat persaudaraan dan penjaga benteng akidah. Dengan kebersamaan kita menjaga masjid, merawat generasi muda, dan saling menopang dalam setiap kesulitan hidup.' }}"
                        </blockquote>
                        <div class="pt-6 border-t border-white/15 flex items-center justify-between">
                            <div>
                                <p class="text-base font-bold text-white">{{ $pengurus['rais_syuriyah']['name'] ?? 'K.H. Masrur Ihsan' }}</p>
                                <p class="text-xs text-muted-gold font-medium">Rais Syuriyah PRNU Cilongok</p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-muted-gold border border-white/10">
                                <span class="material-symbols-outlined text-[20px]">verified</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. PENGURUS (PORTRAIT PHOTOGRAPHY GRID) -->
   <section class="w-full py-16 sm:py-24 bg-warm-card border-b border-border-neutral" id="pengurus">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-muted-sage text-charcoal text-xs font-semibold uppercase tracking-wider mb-2 border border-border-neutral">
                    <span class="material-symbols-outlined text-[16px] text-muted-charcoal">group</span>
                    <span>Khidmat Kepemimpinan</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-charcoal tracking-tight">Pengurus Ranting NU</h2>
                <p class="text-base text-muted-charcoal mt-1">Ulama dan tokoh penggerak masa khidmat {{ $periode ?? '2023 - 2028' }}.</p>
            </div>
            <a class="inline-flex items-center gap-2 font-semibold text-sm text-nu-deep hover:text-charcoal transition-colors group" href="{{ route('profil') }}">
                <span>Lihat Struktur Lengkap</span>
                <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>

        <!-- 4:5 Portrait Grid for Leadership -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 reveal-stagger">
            @forelse ($pengurus as $item)
                <div class="rounded-card bg-warm-bg border border-border-neutral overflow-hidden flex flex-col shadow-subtle hover:border-border-subtle transition-all group">
                    <div class="aspect-[4/5] w-full overflow-hidden bg-warm-beige relative">
                        @if($item->foto)
                            <img alt="{{ $item->nama }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                 src="{{ asset('storage/' . $item->foto) }}"/>
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <div class="text-center p-4">
                                    <span class="material-symbols-outlined text-muted-charcoal text-5xl">badge</span>
                                    <p class="text-xs text-muted-charcoal font-medium mt-2">{{ $item->label_banom ?? 'Pengurus' }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="absolute top-3 right-3 px-2.5 py-1 rounded-full bg-charcoal/80 text-[11px] font-bold text-white">
                            {{ $item->label_banom ?? 'Pengurus' }}
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 justify-between bg-warm-card">
                        <div>
                            <h3 class="text-lg font-bold text-charcoal leading-snug">{{ $item->nama }}</h3>
                            <p class="text-xs font-semibold text-nu-deep mt-0.5">{{ $item->jabatan }}</p>
                        </div>
                        @if($item->deskripsi ?? null)
                            <p class="text-xs text-muted-charcoal mt-3 pt-3 border-t border-border-neutral">
                                {{ $item->deskripsi }}
                            </p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-warm-bg rounded-container-r border border-border-neutral shadow-subtle">
                    <span class="material-symbols-outlined text-muted-charcoal text-4xl mb-2">group_off</span>
                    <p class="text-sm font-semibold text-charcoal mt-2">Data pengurus belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

    <!-- INFAQ & KOIN NU (INTEGRATED TRANSPARENCY BLOCK) -->
    <section class="w-full py-16 bg-warm-bg" id="infaq-lazisnu">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="rounded-container-r bg-warm-card border border-border-neutral p-8 sm:p-12 shadow-subtle grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-warm-beige text-charcoal text-xs font-bold uppercase tracking-wider mb-3 border border-border-subtle">
                        <span class="material-symbols-outlined text-[16px] text-muted-gold">verified_user</span>
                        <span>Layanan Mandiri ZISWAF</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-charcoal tracking-tight mb-4">
                        Salurkan Koin NU & Sedekah untuk Warga Membutuhkan
                    </h3>
                    <p class="text-base text-muted-charcoal leading-relaxed mb-6">
                        UPZIS LAZISNU Banjaranyar menyalurkan amanah donasi untuk biaya kesehatan warga dhuafa, beasiswa santri madrasah, dan santunan yatim piatu desa secara berkala dan terbuka.
                    </p>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-card bg-warm-bg border border-border-neutral">
                        <div class="flex-1">
                            <span class="text-xs text-muted-charcoal block">Rekening Bank Syariah Indonesia (BSI)</span>
                            <span class="text-xl font-bold font-mono text-charcoal tracking-wider">{{ $infaqInfo['rekening'] ?? '7192-8821-09' }}</span>
                            <span class="text-xs text-muted-charcoal block">a.n. LAZISNU BANJARANYAR</span>
                        </div>
                        <button class="px-4 py-2.5 min-h-[44px] rounded-btn bg-warm-card hover:bg-warm-beige text-charcoal text-xs font-bold border border-border-subtle flex items-center gap-1.5 shadow-subtle active:scale-95 transition-all" onclick="navigator.clipboard.writeText('{{ $infaqInfo['rekening'] ?? '7192882109' }}'); alert('Nomor Rekening BSI Tersalin');">
                            <span class="material-symbols-outlined text-[16px] text-muted-charcoal">content_copy</span>
                            <span>Salin Rekening</span>
                        </button>
                    </div>
                </div>
                <div class="lg:col-span-5 flex flex-col items-center text-center p-6 rounded-card bg-warm-bg border border-border-neutral">
                    <span class="text-xs font-bold text-muted-charcoal uppercase tracking-wider mb-3">Pindai QRIS Standar Bank Indonesia</span>
                    <div class="p-3 bg-white rounded-card shadow-subtle border border-border-neutral w-48 h-48 flex items-center justify-center">
                        <svg class="w-full h-full text-charcoal" fill="currentColor" viewbox="0 0 100 100">
                            <rect fill="currentColor" height="26" rx="3" width="26" x="10" y="10"></rect>
                            <rect fill="white" height="18" rx="2" width="18" x="14" y="14"></rect>
                            <rect fill="currentColor" height="10" rx="1" width="10" x="18" y="18"></rect>
                            <rect fill="currentColor" height="26" rx="3" width="26" x="64" y="10"></rect>
                            <rect fill="white" height="18" rx="2" width="18" x="68" y="14"></rect>
                            <rect fill="currentColor" height="10" rx="1" width="10" x="72" y="18"></rect>
                            <rect fill="currentColor" height="26" rx="3" width="26" x="10" y="64"></rect>
                            <rect fill="white" height="18" rx="2" width="18" x="14" y="68"></rect>
                            <rect fill="currentColor" height="10" rx="1" width="10" x="18" y="72"></rect>
                            <rect height="6" rx="1" width="6" x="42" y="12"></rect>
                            <rect height="6" rx="1" width="6" x="52" y="12"></rect>
                            <rect height="12" rx="1" width="6" x="42" y="24"></rect>
                            <rect height="6" rx="1" width="6" x="52" y="30"></rect>
                            <rect height="16" rx="1" width="6" x="12" y="42"></rect>
                            <rect height="6" rx="1" width="12" x="24" y="42"></rect>
                            <rect height="6" rx="1" width="6" x="24" y="52"></rect>
                            <rect fill="#16452F" height="16" rx="2" width="16" x="42" y="44"></rect>
                            <rect height="6" rx="1" width="6" x="64" y="44"></rect>
                            <rect height="6" rx="1" width="12" x="76" y="44"></rect>
                            <rect height="6" rx="1" width="12" x="64" y="56"></rect>
                            <rect height="14" rx="1" width="6" x="82" y="56"></rect>
                            <rect height="12" rx="1" width="6" x="44" y="68"></rect>
                            <rect height="6" rx="1" width="8" x="54" y="74"></rect>
                            <rect height="14" rx="1" width="14" x="68" y="74"></rect>
                        </svg>
                    </div>
                    <p class="text-xs text-muted-charcoal mt-3">NMID: {{ $infaqInfo['nmid'] ?? 'ID10202519283719' }} • Bebas Biaya Admin</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. CONTACT & WHATSAPP CLOSING SECTION -->
    <section class="w-full py-16 sm:py-20 bg-warm-card border-t border-border-neutral" id="kontak">
        <div class="max-w-7xl mx-auto px-4 sm:px-8">
            <div class="rounded-container-r bg-warm-beige/70 border border-border-subtle p-8 sm:p-14 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-muted-sage text-charcoal text-xs font-bold uppercase tracking-wider mb-3 border border-border-neutral">
                        <span class="material-symbols-outlined text-[16px] text-muted-charcoal">support_agent</span>
                        <span>Layanan Sekretariat</span>
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-charcoal tracking-tight mb-3">
                        Ada yang Ingin Ditanyakan? <br/>
                        <span class="text-nu-deep">Pengurus Kami Siap Membantu.</span>
                    </h2>
                    <p class="text-base text-muted-charcoal leading-relaxed">
                        Konsultasi persuratan majelis, rekomendasi pernikahan/pendidikan santri, inventaris tenda & sound, atau info keanggotaan.
                    </p>
                </div>
                <div class="shrink-0 flex flex-col sm:flex-row items-center gap-3">
                    <a class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 min-h-[50px] rounded-btn bg-nu-deep hover:bg-[#113725] text-white font-bold text-base shadow-subtle transition-all active:scale-95" href="https://wa.me/{{ $kontak['whatsapp'] ?? '6281234567890' }}?text=Assalamu%27alaikum%20Pengurus%20NU%20Banjaranyar" rel="noopener noreferrer" target="_blank">
                        <span class="material-symbols-outlined text-[24px]">chat</span>
                        <div class="text-left">
                            <span class="block text-[11px] font-normal uppercase tracking-wider text-white/80">WhatsApp Sekretariat</span>
                            <span>+62 {{ $kontak['whatsapp'] ?? '812-3456-7890' }}</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- 10. FLOATING WHATSAPP BUTTON (Subtle Neutral & Deep NU Green) -->
<div class="fixed bottom-6 right-6 z-40">
    <a aria-label="Hubungi WhatsApp Pengurus" class="flex items-center gap-2.5 px-4 py-3 rounded-full bg-warm-card/95 border border-border-subtle text-charcoal shadow-subtle hover:shadow-elevated hover:scale-105 active:scale-95 transition-all group" href="https://wa.me/{{ $kontak['whatsapp'] ?? '6281234567890' }}" rel="noopener noreferrer" target="_blank">
        <div class="w-8 h-8 rounded-full bg-nu-deep text-white flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-[19px]">chat</span>
        </div>
        <div class="hidden sm:flex flex-col text-left">
            <span class="text-xs font-bold text-charcoal leading-tight">Sekretariat NU</span>
            <span class="text-[11px] text-muted-charcoal">Respon Cepat</span>
        </div>
    </a>
</div>

<!-- 11. FOOTER (Deep Charcoal #141815) -->
<footer class="w-full bg-nu-night text-white pt-16 pb-12 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-white/10">
            <!-- Col 1: Identity & Address (5 cols) -->
            <div class="lg:col-span-5 flex flex-col">
                <div class="flex items-center gap-3 mb-4">
                    <img alt="Emblem NU" class="w-10 h-10 object-contain brightness-0 invert opacity-90" src="https://lh3.googleusercontent.com/aida/AEtjO1VVjAZeFl8x9UC1ygLyGJQ7s08PMheg8thGTpLjMGEDNy6dxehyc8qxHnJ3TWq0onXXPh6_HPNWDese-jycKUQ2eb98-bnO7YW_VY0GaCIEySrmJqvz-GHn0s7CMUqoutQaae-CsDK4XqFr1CTpqkfXyJQS3h0oeeJcHzC-gIHlGibUdsPPEn0o-vdxP46pPspwdFoEMDPWgm6H4UW6yedGPXqeoPVeyU2SVeokYJCsQ1wcEIIhfseMkPXD"/>
                    <div>
                        <span class="font-extrabold text-lg tracking-tight block leading-none text-white">NU BANJARANYAR</span>
                        <span class="text-xs text-white/60 font-medium">Kecamatan Cilongok, Banyumas</span>
                    </div>
                </div>
                <p class="text-sm text-white/70 leading-relaxed max-w-sm mb-6">
                    Pengurus Ranting Nahdlatul Ulama Desa Banjaranyar, MWC NU Kecamatan Cilongok, PCNU Kabupaten Banyumas. Merawat akidah Ahlussunnah wal Jama'ah an-Nahdliyah.
                </p>
                <div class="flex items-start gap-2.5 text-xs text-white/60 leading-relaxed">
                    <span class="material-symbols-outlined text-muted-gold text-[18px] shrink-0">location_on</span>
                    <span>{{ $kontak['alamat'] ?? 'Gedung Sekretariat PRNU, Jl. Raya Cilongok No. 12, Banjaranyar, Banyumas, Jawa Tengah 53162' }}</span>
                </div>
            </div>
            <!-- Col 2: Quick Links (3 cols) -->
            <div class="lg:col-span-3 flex flex-col">
                <span class="text-xs font-bold tracking-wider text-muted-gold uppercase mb-4">Tautan Navigasi</span>
                <ul class="space-y-2.5 text-sm text-white/70">
                    <li><a class="hover:text-white transition-colors" href="{{ route('landing') }}">Beranda Ranting</a></li>
                    <li><a class="hover:text-white transition-colors" href="#agenda">Jadwal Agenda & Majelis</a></li>
                    <li><a class="hover:text-white transition-colors" href="#berita">Warta & Kabar Terkini</a></li>
                    <li><a class="hover:text-white transition-colors" href="#layanan">Layanan Kemaslahatan</a></li>
                    <li><a class="hover:text-white transition-colors" href="{{ route('members.register-form') }}">Pendaftaran KARTANU</a></li>
                </ul>
            </div>
            <!-- Col 3: Banom & Lembaga (4 cols) -->
            <div class="lg:col-span-4 flex flex-col">
                <span class="text-xs font-bold tracking-wider text-muted-gold uppercase mb-4">Badan Otonom & Lembaga</span>
                <div class="grid grid-cols-2 gap-2.5 text-sm text-white/70">
                    <a class="hover:text-white transition-colors" href="#">• Muslimat NU</a>
                    <a class="hover:text-white transition-colors" href="#">• GP Ansor</a>
                    <a class="hover:text-white transition-colors" href="#">• Fatayat NU</a>
                    <a class="hover:text-white transition-colors" href="#">• Banser Satkoryon</a>
                    <a class="hover:text-white transition-colors" href="#">• IPNU & IPPNU</a>
                    <a class="hover:text-white transition-colors" href="{{ route('infaq.index') }}">• LAZISNU UPZIS</a>
                </div>
                <div class="mt-6 pt-4 border-t border-white/10 text-xs text-white/60">
                    <p><strong class="text-white">Email:</strong> {{ $kontak['email'] ?? 'sekretariat@nubanjaranyar.or.id' }}</p>
                    <p class="mt-1"><strong class="text-white">Jam Khidmat:</strong> {{ $kontak['jam_layanan'] ?? 'Setiap Hari Ahad & Rabu (08.00 - 16.00 WIB)' }}</p>
                </div>
            </div>
        </div>
        <!-- Copyright & Calligraphy sub -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-white/60">
            <p>© {{ now()->year }} Nahdlatul Ulama Banjaranyar, Cilongok, Banyumas. Khidmat untuk Umat & Bangsa.</p>
            <p class="font-arabic text-lg text-muted-gold tracking-wide">مَنْ أَحَبَّ قَوْمًا حُشِرَ مَعَهُمْ</p>
        </div>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function () {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

  // Otomatis pilih SEMUA <section> tanpa perlu tambah class manual
  document.querySelectorAll('section').forEach((el) => observer.observe(el));

  // Section pertama (hero) langsung tampil, ga usah nunggu scroll
  const hero = document.querySelector('#beranda');
  if (hero) hero.classList.add('revealed');
});
document.addEventListener('DOMContentLoaded', function () {
  function animateCount(el) {
    const target = parseInt(el.getAttribute('data-count-target'), 10) || 0;
    const suffix = el.getAttribute('data-count-suffix') || '';
    const duration = 1500;
    const startTime = performance.now();

    function easeOutQuad(t) {
      return t * (2 - t);
    }

    function tick(now) {
      const elapsed = now - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const eased = easeOutQuad(progress);
      const current = Math.floor(eased * target);

      el.textContent = current.toLocaleString('id-ID') + suffix;

      if (progress < 1) {
        requestAnimationFrame(tick);
      } else {
        el.textContent = target.toLocaleString('id-ID') + suffix;
      }
    }

    requestAnimationFrame(tick);
  }

  // Khusus stats di hero: langsung jalan saat load, TIDAK pakai IntersectionObserver,
  // karena section hero selalu terlihat begitu halaman dibuka.
  const heroStats = document.getElementById('hero-stats-counter');
  if (heroStats) {
    const heroCounters = heroStats.querySelectorAll('[data-count-target]');
    heroCounters.forEach((el) => animateCount(el));
  }

  // Kalau nanti ada blok statistik LAIN di section yang baru terlihat setelah scroll
  // (bukan di hero), pakai observer terpisah dengan id/class berbeda, contoh:
  //
  // const otherStats = document.querySelectorAll('.scroll-stats-counter [data-count-target]');
  // const observer = new IntersectionObserver((entries) => {
  //   entries.forEach((entry) => {
  //     if (entry.isIntersecting) {
  //       animateCount(entry.target);
  //       observer.unobserve(entry.target);
  //     }
  //   });
  // }, { threshold: 0.4 });
  // otherStats.forEach((el) => observer.observe(el));
});
</script>
</body>
</html>