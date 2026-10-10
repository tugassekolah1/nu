<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <x-public-head title="Galeri Kegiatan - NU Ranting Banjaranyar" />

    <style>
        /* Entrance animation (hormati reduced motion) */
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
        .reveal-stagger > * {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s cubic-bezier(0.22, 1, 0.36, 1),
                        transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-stagger.revealed > *:nth-child(1) { transition-delay: 0ms; }
        .reveal-stagger.revealed > *:nth-child(2) { transition-delay: 60ms; }
        .reveal-stagger.revealed > *:nth-child(3) { transition-delay: 120ms; }
        .reveal-stagger.revealed > *:nth-child(4) { transition-delay: 180ms; }
        .reveal-stagger.revealed > *:nth-child(5) { transition-delay: 240ms; }
        .reveal-stagger.revealed > *:nth-child(6) { transition-delay: 300ms; }
        .reveal-stagger.revealed > * {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .reveal,
            .reveal-stagger > * {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }

        .bg-grid-light {
            background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.12) 1px, transparent 0);
            background-size: 22px 22px;
        }
    </style>
</head>

<body class="bg-warm-bg text-charcoal antialiased selection:bg-muted-sage selection:text-nu-deep">
    <x-navbar></x-navbar>

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
                    <li class="text-white font-semibold" aria-current="page">Galeri</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-end">
                <div class="lg:col-span-7">
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-1.5 text-xs font-bold uppercase tracking-widest backdrop-blur-sm">
                        <span class="material-symbols-outlined text-[16px] text-muted-gold">photo_library</span>
                        <span>Dokumentasi &amp; Arsip</span>
                    </span>

                    <h1 class="mt-6 font-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.1]">
                        Galeri <span class="text-muted-gold">Kegiatan NU</span>
                    </h1>

                    <p class="mt-5 text-base sm:text-lg text-white/80 leading-relaxed max-w-xl">
                        Dokumentasi rekam jejak kegiatan keagamaan, sosial, dan keorganisasian
                        Nahdlatul Ulama Ranting Banjaranyar.
                    </p>
                </div>

                <div class="lg:col-span-5">
                    <div class="rounded-container-r bg-white/10 border border-white/15 backdrop-blur-md p-6 sm:p-8 shadow-elevated">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <span class="block text-4xl font-extrabold text-white leading-none">{{ $galleries->count() }}</span>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-white/70 mt-2">Foto Terdokumentasi</span>
                            </div>
                            <div>
                                <span class="block text-4xl font-extrabold text-muted-gold leading-none">{{ $galleries->pluck('created_at')->unique('Y-m')->count() }}</span>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-white/70 mt-2">Periode Dokumentasi</span>
                            </div>
                        </div>
                        <div class="mt-6 pt-5 border-t border-white/15 flex items-center gap-2.5 text-xs text-white/75">
                            <span class="material-symbols-outlined text-[18px] text-muted-gold">history_edu</span>
                            <span>Klik foto untuk melihat ukuran penuh.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- GALERI GRID SECTION -->
    <main class="relative max-w-7xl mx-auto px-4 sm:px-8 py-16 sm:py-24 reveal">
        {{-- Pil judul melayang di batas hero --}}
        <span class="absolute left-1/2 -translate-x-1/2 -top-5 z-20 inline-flex items-center gap-1.5 rounded-full bg-warm-card px-4 py-2 text-charcoal text-xs font-bold uppercase tracking-wider border border-border-neutral shadow-elevated">
            <span class="material-symbols-outlined text-[16px] text-muted-charcoal">photo_camera</span>
            <span>Galeri Foto</span>
        </span>

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-charcoal tracking-tight">Dokumentasi Kegiatan</h2>
                <p class="text-base text-muted-charcoal mt-2">Momen kebersamaan jamaah Banjaranyar yang terekam dalam bingkai foto.</p>
            </div>
            <span class="text-sm font-semibold text-muted-charcoal bg-warm-card border border-border-neutral rounded-full px-4 py-1.5">
                {{ $galleries->count() }} foto
            </span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 reveal-stagger">
            @forelse ($galleries as $item)
                <article class="group bg-warm-card rounded-card border border-border-neutral shadow-subtle p-3 flex flex-col hover:-translate-y-1.5 hover:shadow-elevated hover:border-border-subtle transition-all duration-300">
                    <button type="button"
                            data-galeri-modal
                            data-src="{{ asset('storage/' . $item->foto) }}"
                            data-judul="{{ $item->judul }}"
                            @if ($item->deskripsi) data-deskripsi="{{ $item->deskripsi }}" @endif
                            data-tanggal="{{ $item->created_at->locale('id')->translatedFormat('D, d MMMM Y') }}"
                            aria-label="Lihat foto {{ $item->judul }} ukuran penuh"
                            class="relative block w-full aspect-video overflow-hidden rounded-[16px] bg-warm-beige text-left cursor-zoom-in">
                        <img src="{{ asset('storage/' . $item->foto) }}"
                             alt="{{ $item->judul }}"
                             loading="lazy"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 inline-flex items-center gap-1.5 rounded-full bg-nu-deep/90 backdrop-blur-sm text-white text-[11px] font-bold uppercase tracking-wider px-2.5 py-1 border border-white/15">
                            <span class="w-1.5 h-1.5 rounded-full bg-muted-gold"></span>
                            Foto
                        </span>
                        <span class="absolute bottom-3 right-3 inline-flex items-center justify-center w-9 h-9 rounded-full bg-white/85 text-nu-deep opacity-0 group-hover:opacity-100 translate-y-1 group-hover:translate-y-0 transition-all duration-300 shadow-subtle">
                            <span class="material-symbols-outlined text-[20px]">zoom_in</span>
                        </span>
                    </button>

                    <div class="px-3 pt-4 pb-3 flex flex-col flex-1">
                        <h3 class="font-bold text-lg text-charcoal leading-snug group-hover:text-nu-deep transition-colors">
                            {{ $item->judul }}
                        </h3>

                        @if ($item->deskripsi)
                            <p class="mt-2 text-sm text-muted-charcoal leading-relaxed line-clamp-2">
                                {{ $item->deskripsi }}
                            </p>
                        @endif

                        <p class="mt-auto pt-4 text-xs font-semibold text-muted-charcoal flex items-center gap-1.5 border-t border-border-neutral">
                            <span class="material-symbols-outlined text-[16px] text-muted-gold">event</span>
                            {{ $item->created_at->locale('id')->translatedFormat('D, d MMMM Y') }}
                        </p>
                    </div>
                </article>
            @empty
                <!-- Tampilan Jika Data Kosong -->
                <div class="col-span-full bg-warm-card rounded-container-r border border-border-neutral shadow-subtle py-16 px-6 flex flex-col items-center text-center">
                    <span class="material-symbols-outlined text-muted-charcoal text-5xl mb-3">image_off</span>
                    <p class="text-lg font-bold text-charcoal">Belum ada foto galeri</p>
                    <p class="text-sm text-muted-charcoal mt-1.5 max-w-md">
                        Dokumentasi kegiatan akan segera ditampilkan di sini setelah diunggah oleh sekretariat.
                    </p>
                </div>
            @endforelse
        </div>
    </main>

    <x-footer />

    <!-- MODAL LIGHTBOX GALERI -->
    <div id="galeri-modal" class="fixed inset-0 z-[70] hidden items-center justify-center p-4 sm:p-8" role="dialog" aria-modal="true" aria-label="Pratinjau foto galeri">
        <div id="galeri-modal-backdrop" class="absolute inset-0 bg-nu-night/85 backdrop-blur-sm"></div>

        <figure class="relative z-10 w-full max-w-4xl overflow-hidden rounded-container-r bg-warm-card border border-border-neutral shadow-elevated">
            <div class="relative bg-nu-night flex items-center justify-center min-h-55 max-h-[70vh]">
                <img id="galeri-modal-img" src="" alt="" class="max-h-[70vh] w-auto max-w-full object-contain" />
                <button id="galeri-modal-prev" type="button" aria-label="Foto sebelumnya"
                        class="absolute left-3 top-1/2 -translate-y-1/2 inline-flex items-center justify-center w-11 h-11 min-w-[44px] min-h-[44px] rounded-full bg-white/90 text-charcoal shadow-subtle hover:bg-white active:scale-95 transition">
                    <span class="material-symbols-outlined text-[22px]">chevron_left</span>
                </button>
                <button id="galeri-modal-next" type="button" aria-label="Foto berikutnya"
                        class="absolute right-3 top-1/2 -translate-y-1/2 inline-flex items-center justify-center w-11 h-11 min-w-[44px] min-h-[44px] rounded-full bg-white/90 text-charcoal shadow-subtle hover:bg-white active:scale-95 transition">
                    <span class="material-symbols-outlined text-[22px]">chevron_right</span>
                </button>
            </div>
            <figcaption class="p-5 sm:p-6 flex items-start justify-between gap-4">
                <div class="min-w-0">
                    <p id="galeri-modal-count" class="text-[11px] font-bold uppercase tracking-widest text-muted-charcoal"></p>
                    <h3 id="galeri-modal-judul" class="mt-1 font-bold text-lg text-charcoal leading-snug"></h3>
                    <p id="galeri-modal-deskripsi" class="mt-1 text-sm text-muted-charcoal leading-relaxed"></p>
                    <p id="galeri-modal-tanggal" class="mt-2 text-xs font-semibold text-muted-charcoal flex items-center gap-1.5"></p>
                </div>
                <a id="galeri-modal-open" href="#" target="_blank" rel="noopener"
                   class="shrink-0 inline-flex items-center gap-1.5 px-4 py-2.5 min-h-[44px] rounded-full bg-warm-bg border border-border-subtle text-charcoal text-xs font-bold hover:bg-warm-beige/60 transition-colors">
                    <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                    <span class="hidden sm:inline">Ukuran penuh</span>
                </a>
            </figcaption>
            <button id="galeri-modal-close" type="button" aria-label="Tutup pratinjau"
                    class="absolute top-3 right-3 inline-flex items-center justify-center w-11 h-11 min-w-[44px] min-h-[44px] rounded-full bg-white/90 text-charcoal shadow-subtle hover:bg-white active:scale-95 transition">
                <span class="material-symbols-outlined text-[22px]">close</span>
            </button>
        </figure>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const targets = document.querySelectorAll('.reveal, .reveal-stagger');

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

        // Lightbox galeri: klik foto → modal, dengan navigasi sebelum/berikutnya
        (function () {
            const modal = document.getElementById('galeri-modal');
            if (!modal) return;

            const img = document.getElementById('galeri-modal-img');
            const judul = document.getElementById('galeri-modal-judul');
            const deskripsi = document.getElementById('galeri-modal-deskripsi');
            const tanggal = document.getElementById('galeri-modal-tanggal');
            const count = document.getElementById('galeri-modal-count');
            const openLink = document.getElementById('galeri-modal-open');
            const btnClose = document.getElementById('galeri-modal-close');
            const btnPrev = document.getElementById('galeri-modal-prev');
            const btnNext = document.getElementById('galeri-modal-next');
            const backdrop = document.getElementById('galeri-modal-backdrop');
            const triggers = Array.from(document.querySelectorAll('[data-galeri-modal]'));
            let activeIndex = 0;
            let lastFocused = null;

            function render(index) {
                activeIndex = (index + triggers.length) % triggers.length;
                const el = triggers[activeIndex];
                img.src = el.dataset.src;
                img.alt = el.dataset.judul || 'Foto galeri';
                judul.textContent = el.dataset.judul || '';
                deskripsi.textContent = el.dataset.deskripsi || '';
                deskripsi.style.display = el.dataset.deskripsi ? '' : 'none';
                tanggal.textContent = el.dataset.tanggal || '';
                count.textContent = 'Foto ' + (activeIndex + 1) + ' dari ' + triggers.length;
                openLink.href = el.dataset.src;
                const single = triggers.length < 2;
                btnPrev.style.display = single ? 'none' : '';
                btnNext.style.display = single ? 'none' : '';
            }

            function open(index, trigger) {
                lastFocused = trigger || document.activeElement;
                render(index);
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
                btnClose.focus();
            }

            function close() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
                img.removeAttribute('src');
                if (lastFocused && lastFocused.focus) lastFocused.focus();
            }

            triggers.forEach((el, index) => {
                el.addEventListener('click', () => open(index, el));
            });
            btnClose.addEventListener('click', close);
            backdrop.addEventListener('click', close);
            btnPrev.addEventListener('click', (e) => { e.stopPropagation(); render(activeIndex - 1); });
            btnNext.addEventListener('click', (e) => { e.stopPropagation(); render(activeIndex + 1); });

            document.addEventListener('keydown', (e) => {
                if (modal.classList.contains('hidden')) return;
                if (e.key === 'Escape') close();
                if (e.key === 'ArrowLeft') render(activeIndex - 1);
                if (e.key === 'ArrowRight') render(activeIndex + 1);
            });
        })();
    </script>
</body>
</html>
