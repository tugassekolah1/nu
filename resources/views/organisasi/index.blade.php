<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <x-public-head title="Organisasi & Badan Otonom — MWCNU Cilongok" />

    <style>
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1),
                        transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .reveal {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }

        .bg-grid-light {
            background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.12) 1px, transparent 0);
            background-size: 22px 22px;
        }

        /* Navigasi logo: geser horizontal di mobile */
        .logo-nav {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .logo-nav::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-warm-bg text-charcoal antialiased selection:bg-muted-sage selection:text-nu-deep">
    <x-navbar />

    <main>
        <!-- HERO -->
        <header class="relative overflow-hidden bg-nu-deep text-white pt-32 sm:pt-36 pb-16 sm:pb-20">
            <div class="absolute inset-0 bg-grid-light pointer-events-none"></div>
            <div class="absolute -top-20 -right-16 w-96 h-96 rounded-full bg-nu-500/15 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-28 -left-16 w-80 h-80 rounded-full bg-muted-gold/15 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-8">
                <nav aria-label="Navigasi balik" class="mb-6 text-sm text-white/70">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a class="hover:text-white hover:underline underline-offset-4 transition-colors" href="{{ route('landing') }}">Beranda</a></li>
                        <li aria-hidden="true">›</li>
                        <li class="text-white font-semibold" aria-current="page">Organisasi</li>
                    </ol>
                </nav>

                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-1.5 text-xs font-bold uppercase tracking-widest backdrop-blur-sm">
                    <span class="material-symbols-outlined text-[16px] text-muted-gold">account_tree</span>
                    <span>Direktori Organisasi</span>
                </span>

                <h1 class="mt-6 font-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.1]">
                    Organisasi &amp;<br>Badan Otonom
                </h1>

                <p class="mt-5 text-base sm:text-lg text-white/80 leading-relaxed max-w-xl">
                    Kenali jajaran pengurus, badan otonom, lembaga, dan jaringan organisasi
                    Nahdlatul Ulama di wilayah kecamatan kami.
                </p>

                <div class="mt-7 inline-flex items-center gap-3 rounded-container-r bg-white/10 border border-white/15 backdrop-blur-md px-6 py-4">
                    <span class="block text-4xl font-extrabold text-white leading-none">{{ $totalSemua }}</span>
                    <span class="block text-xs font-semibold uppercase tracking-wider text-white/70">Organisasi<br>Terdaftar</span>
                </div>
            </div>
        </header>

        <!-- NAVIGASI LOGO LINGKARAN -->
        <section class="max-w-7xl mx-auto px-4 sm:px-8 pt-12">
            <p class="text-xs font-bold uppercase tracking-widest text-muted-charcoal mb-4">Jelajahi Organisasi</p>
            <div class="logo-nav flex gap-4 overflow-x-auto pb-3 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-6 lg:grid-cols-11 sm:overflow-visible">
                @foreach ($navigasi as $org)
                    <a href="{{ route('organisasi.show', $org['slug']) }}"
                       class="group shrink-0 flex flex-col items-center gap-2 w-20 sm:w-auto"
                       aria-label="Lihat {{ $org['nama'] }}">
                        <span class="w-16 h-16 sm:w-18 sm:h-18 rounded-full bg-warm-card border border-border-neutral shadow-subtle overflow-hidden flex items-center justify-center group-hover:border-nu-deep group-hover:shadow-elevated transition-all duration-200">
                            <img src="{{ asset('images/logo.webp') }}" alt="Logo {{ $org['singkatan'] }}" loading="lazy"
                                 class="w-full h-full object-cover">
                        </span>
                        <span class="text-[11px] font-bold text-center leading-tight text-charcoal group-hover:text-nu-deep transition-colors">{{ $org['singkatan'] }}</span>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- PENCARIAN & FILTER -->
        <section class="max-w-7xl mx-auto px-4 sm:px-8 pt-8">
            <div class="bg-warm-card rounded-container-r border border-border-neutral shadow-subtle p-5 sm:p-6">
                <form action="{{ route('organisasi') }}" method="GET" class="flex flex-col gap-4">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-muted-charcoal text-[20px]">search</span>
                        <input type="search" name="q" value="{{ $q }}" maxlength="100"
                               placeholder="Cari nama organisasi, mis. Muslimat, Ansor, LAZISNU..."
                               class="min-h-[48px] w-full rounded-[14px] border border-border-neutral bg-white pl-12 pr-4 py-3 text-sm text-charcoal placeholder:text-muted-charcoal focus:border-nu-deep focus:outline-none focus:ring-2 focus:ring-nu-deep/20" />
                    </div>

                    <div class="flex flex-wrap gap-2" role="tablist" aria-label="Filter kategori">
                        @foreach (config('organisasi.kategori') as $kode => $label)
                            <a href="{{ route('organisasi', array_filter(['kategori' => $kode === 'semua' ? null : $kode, 'q' => $q !== '' ? $q : null])) }}"
                               role="tab" aria-selected="{{ $kategoriAktif === $kode ? 'true' : 'false' }}"
                               class="px-4 py-2.5 min-h-[44px] inline-flex items-center rounded-full text-sm font-bold transition-all active:scale-95 border
                                      {{ $kategoriAktif === $kode
                                          ? 'bg-nu-deep text-white border-nu-deep shadow-subtle'
                                          : 'bg-warm-bg text-charcoal border-border-subtle hover:bg-warm-beige/60' }}">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>
                </form>
            </div>
        </section>

        <!-- GRID CARD ORGANISASI -->
        <section class="max-w-7xl mx-auto px-4 sm:px-8 py-12 sm:py-16">
            @if ($daftar->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 reveal">
                    @foreach ($daftar as $org)
                        <article class="group bg-white rounded-card border border-border-neutral shadow-subtle p-6 flex flex-col hover:-translate-y-1 hover:shadow-elevated hover:border-border-subtle transition-all duration-300">
                            <div class="flex items-start justify-between gap-3">
                                <span class="w-14 h-14 rounded-full bg-warm-card border border-border-neutral overflow-hidden flex items-center justify-center shrink-0">
                                    <img src="{{ asset('images/logo.webp') }}" alt="Logo {{ $org['singkatan'] }}" loading="lazy"
                                         class="w-full h-full object-cover">
                                </span>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-muted-sage text-charcoal text-[10px] font-bold uppercase tracking-wider border border-border-neutral">
                                    {{ config('organisasi.kategori')[$org['kategori']] }}
                                </span>
                            </div>

                            <h2 class="mt-4 text-lg font-bold text-charcoal leading-snug group-hover:text-nu-deep transition-colors">
                                {{ $org['nama'] }}
                            </h2>
                            <p class="text-xs font-bold text-nu-deep mt-0.5">{{ $org['singkatan'] }}</p>

                            <p class="mt-3 text-sm text-muted-charcoal leading-relaxed line-clamp-2">
                                {{ $org['deskripsi'] }}
                            </p>

                            <div class="mt-auto pt-5 mt-5 border-t border-border-neutral flex flex-wrap gap-2">
                                <a href="{{ route('organisasi.show', ['slug' => $org['slug'], 'tab' => 'profil']) }}"
                                   class="inline-flex items-center gap-1.5 px-4 py-2.5 min-h-[44px] rounded-full bg-nu-deep text-white text-xs font-bold hover:bg-[#113725] transition-all active:scale-95">
                                    <span class="material-symbols-outlined text-[15px]">visibility</span>
                                    <span>Lihat Profil</span>
                                </a>
                                <a href="{{ route('organisasi.show', ['slug' => $org['slug'], 'tab' => 'struktur']) }}"
                                   class="inline-flex items-center gap-1.5 px-4 py-2.5 min-h-[44px] rounded-full bg-warm-bg text-charcoal text-xs font-bold border border-border-subtle hover:bg-warm-beige/60 transition-all active:scale-95">
                                    <span class="material-symbols-outlined text-[15px]">account_tree</span>
                                    <span>Lihat Struktur</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="bg-warm-card rounded-container-r border border-dashed border-border-subtle p-12 flex flex-col items-center text-center">
                    <span class="material-symbols-outlined text-muted-charcoal text-5xl mb-3">search_off</span>
                    <p class="text-lg font-bold text-charcoal">Tidak ada organisasi yang cocok</p>
                    <p class="text-sm text-muted-charcoal mt-1.5 max-w-md">
                        Coba kata kunci lain atau pilih kategori yang berbeda.
                    </p>
                    <a href="{{ route('organisasi') }}"
                       class="mt-6 inline-flex items-center gap-2 px-6 py-3 min-h-[44px] rounded-full bg-nu-deep text-white text-sm font-semibold hover:bg-[#113725] transition-all active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">refresh</span>
                        <span>Tampilkan Semua</span>
                    </a>
                </div>
            @endif
        </section>
    </main>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const targets = document.querySelectorAll('.reveal');

            if (reduceMotion || !('IntersectionObserver' in window)) {
                targets.forEach((el) => el.classList.add('revealed'));
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

            targets.forEach((el) => observer.observe(el));
        });
    </script>
</body>
</html>
