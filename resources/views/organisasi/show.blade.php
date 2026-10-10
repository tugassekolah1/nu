<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <x-public-head title="{{ $org['nama'] }} — Organisasi NU" />

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

        /* Bagan struktur: gulir horizontal di mobile */
        .bagan-scroll {
            scrollbar-width: thin;
            scrollbar-color: #D5D2C8 transparent;
        }
        .bagan-scroll::-webkit-scrollbar {
            height: 6px;
        }
        .bagan-scroll::-webkit-scrollbar-thumb {
            background: #D5D2C8;
            border-radius: 99px;
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
                        <li><a class="hover:text-white hover:underline underline-offset-4 transition-colors" href="{{ route('organisasi') }}">Organisasi</a></li>
                        <li aria-hidden="true">›</li>
                        <li class="text-white font-semibold" aria-current="page">{{ $org['singkatan'] }}</li>
                    </ol>
                </nav>

                <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                    <span class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-white/10 border border-white/20 overflow-hidden flex items-center justify-center shrink-0 backdrop-blur-sm">
                        <img src="{{ asset('images/logo.webp') }}" alt="Logo {{ $org['singkatan'] }}"
                             class="w-full h-full object-cover">
                    </span>
                    <div class="min-w-0">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-1.5 text-xs font-bold uppercase tracking-widest backdrop-blur-sm">
                            <span class="material-symbols-outlined text-[16px] text-muted-gold">account_tree</span>
                            <span>{{ config('organisasi.kategori')[$org['kategori']] }}</span>
                        </span>
                        <h1 class="mt-4 font-heading text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-[1.1]">
                            {{ $org['nama'] }}
                        </h1>
                        <p class="mt-2 text-sm sm:text-base text-white/75 font-semibold">{{ $org['singkatan'] }}</p>
                    </div>
                </div>

            </div>
        </header>

        <!-- TAB NAVIGASI -->
        <div class="sticky top-[72px] z-40 bg-warm-bg/95 backdrop-blur-md border-b border-border-neutral">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="flex items-center justify-between gap-3">
                    <nav class="flex gap-1 overflow-x-auto" role="tablist" aria-label="Navigasi detail organisasi">
                        @php
                            $tabs = [
                                'profil' => 'Profil',
                                'struktur' => 'Struktur Pengurus',
                                'program' => 'Program Kerja',
                            ];
                        @endphp
                        @foreach ($tabs as $kode => $label)
                            <a href="{{ route('organisasi.show', ['slug' => $org['slug'], 'tab' => $kode]) }}"
                               role="tab" aria-selected="{{ $tabAktif === $kode ? 'true' : 'false' }}"
                               class="px-4 sm:px-5 py-3.5 min-h-[48px] inline-flex items-center text-sm font-bold whitespace-nowrap border-b-2 transition-colors
                                      {{ $tabAktif === $kode
                                          ? 'border-nu-deep text-nu-deep'
                                          : 'border-transparent text-muted-charcoal hover:text-charcoal' }}">
                                {{ $label }}
                            </a>
                        @endforeach
                    </nav>
                    <a href="{{ route('organisasi') }}"
                       class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2.5 min-h-[44px] rounded-full bg-warm-card text-charcoal text-xs font-bold border border-border-subtle hover:bg-warm-beige/60 transition-all shrink-0">
                        <span class="material-symbols-outlined text-[15px]">arrow_back</span>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- KONTEN TAB -->
        <div class="max-w-7xl mx-auto px-4 sm:px-8 py-12 sm:py-16">
            @if ($tabAktif === 'profil')
                <!-- TAB PROFIL -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 reveal">
                    <div class="lg:col-span-7 space-y-8">
                        <section class="bg-white rounded-card border border-border-neutral shadow-subtle p-6 sm:p-8">
                            <h2 class="font-heading text-xl sm:text-2xl font-extrabold text-charcoal tracking-tight">Tentang Organisasi</h2>
                            <p class="mt-3 text-sm sm:text-base text-muted-charcoal leading-relaxed">{{ $org['deskripsi'] }}</p>
                        </section>

                        <section class="bg-white rounded-card border border-border-neutral shadow-subtle p-6 sm:p-8">
                            <h2 class="font-heading text-xl sm:text-2xl font-extrabold text-charcoal tracking-tight">Sejarah Singkat</h2>
                            <p class="mt-3 text-sm sm:text-base text-muted-charcoal leading-relaxed">{{ $org['sejarah'] }}</p>
                        </section>

                        <section class="bg-white rounded-card border border-border-neutral shadow-subtle p-6 sm:p-8">
                            <h2 class="font-heading text-xl sm:text-2xl font-extrabold text-charcoal tracking-tight">Visi</h2>
                            <p class="mt-3 text-sm sm:text-base text-muted-charcoal leading-relaxed">{{ $org['visi'] }}</p>

                            <h3 class="mt-6 font-heading text-lg font-extrabold text-charcoal tracking-tight">Misi</h3>
                            <ul class="mt-3 space-y-2.5">
                                @foreach ($org['misi'] as $misi)
                                    <li class="flex items-start gap-3 text-sm sm:text-base text-muted-charcoal leading-relaxed">
                                        <span class="material-symbols-outlined text-nu-deep text-[18px] shrink-0 mt-0.5">check_circle</span>
                                        <span>{{ $misi }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </div>

                    <aside class="lg:col-span-5">
                        <div class="bg-white rounded-card border border-border-neutral shadow-subtle p-6 sm:p-8 lg:sticky lg:top-40">
                            <h2 class="font-heading text-lg font-extrabold text-charcoal tracking-tight">Informasi</h2>
                            <dl class="mt-4 space-y-4 text-sm">
                                <div class="flex items-start justify-between gap-3 pb-4 border-b border-border-neutral">
                                    <dt class="text-muted-charcoal">Kategori</dt>
                                    <dd class="font-bold text-charcoal text-right">{{ config('organisasi.kategori')[$org['kategori']] }}</dd>
                                </div>
                                <div class="flex items-start justify-between gap-3 pb-4 border-b border-border-neutral">
                                    <dt class="text-muted-charcoal">Status Data</dt>
                                    <dd class="font-bold text-right">
                                        @if ($org['terverifikasi'])
                                            <span class="inline-flex items-center gap-1.5 text-emerald-700">
                                                <span class="material-symbols-outlined text-[16px]">verified</span>
                                                Terverifikasi
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 text-muted-charcoal">
                                                <span class="material-symbols-outlined text-[16px]">info</span>
                                                Contoh data
                                            </span>
                                        @endif
                                    </dd>
                                </div>
                                @if ($org['kontak'])
                                    <div class="flex items-start justify-between gap-3">
                                        <dt class="text-muted-charcoal shrink-0">Kontak</dt>
                                        <dd class="font-bold text-charcoal text-right">{{ $org['kontak'] }}</dd>
                                    </div>
                                @endif
                            </dl>

                            <div class="mt-6 flex flex-col gap-2.5">
                                <a href="{{ route('organisasi.show', ['slug' => $org['slug'], 'tab' => 'struktur']) }}"
                                   class="inline-flex items-center justify-center gap-2 px-5 py-3 min-h-[48px] rounded-full bg-nu-deep text-white text-sm font-bold hover:bg-[#113725] transition-all active:scale-95">
                                    <span class="material-symbols-outlined text-[18px]">account_tree</span>
                                    <span>Lihat Struktur Pengurus</span>
                                </a>
                                <a href="{{ route('organisasi.show', ['slug' => $org['slug'], 'tab' => 'program']) }}"
                                   class="inline-flex items-center justify-center gap-2 px-5 py-3 min-h-[48px] rounded-full bg-warm-bg text-charcoal text-sm font-bold border border-border-subtle hover:bg-warm-beige/60 transition-all active:scale-95">
                                    <span class="material-symbols-outlined text-[18px]">list_alt</span>
                                    <span>Lihat Program Kerja</span>
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>

            @elseif ($tabAktif === 'struktur')
                <!-- TAB STRUKTUR PENGURUS -->
                <div class="reveal">
                    @if ($punyaStruktur)
                        <div class="bg-white rounded-card border border-border-neutral shadow-subtle p-6 sm:p-10">
                            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-3">
                                <div>
                                    <h2 class="font-heading text-xl sm:text-2xl font-extrabold text-charcoal tracking-tight">Bagan Struktur Pengurus</h2>
                                    <p class="text-sm text-muted-charcoal mt-1">{{ $org['nama'] }} — masa khidmat berjalan.</p>
                                </div>
                                <span class="text-xs font-semibold text-muted-charcoal bg-warm-bg border border-border-neutral rounded-full px-3.5 py-1.5">
                                    {{ $ketua->count() + $inti->count() + $bidang->count() }} pengurus
                                </span>
                            </div>

                            <div class="bagan-scroll overflow-x-auto pb-4">
                                <div class="min-w-[720px] flex flex-col items-center">
                                    @if ($ketua->isNotEmpty())
                                        <p class="text-[11px] font-bold uppercase tracking-widest text-muted-charcoal mb-3">Pimpinan</p>
                                        <div class="flex flex-wrap justify-center gap-6">
                                            @foreach ($ketua as $p)
                                                @include('partials.pengurus-card', ['p' => $p, 'besar' => true])
                                            @endforeach
                                        </div>
                                    @endif

                                    @if ($inti->isNotEmpty())
                                        @if ($ketua->isNotEmpty())
                                            <div aria-hidden="true"><div class="w-px h-8 bg-border-subtle"></div></div>
                                        @endif
                                        <p class="text-[11px] font-bold uppercase tracking-widest text-muted-charcoal mb-3">Pengurus Harian</p>
                                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 w-full max-w-2xl">
                                            @foreach ($inti as $p)
                                                @include('partials.pengurus-card', ['p' => $p])
                                            @endforeach
                                        </div>
                                    @endif

                                    @if ($bidang->isNotEmpty())
                                        @if ($ketua->isNotEmpty() || $inti->isNotEmpty())
                                            <div aria-hidden="true"><div class="w-px h-8 bg-border-subtle"></div></div>
                                        @endif
                                        <p class="text-[11px] font-bold uppercase tracking-widest text-muted-charcoal mb-3">Bidang / Departemen</p>
                                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 w-full">
                                            @foreach ($bidang as $p)
                                                @include('partials.pengurus-card', ['p' => $p])
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-muted-charcoal text-center">Geser horizontal untuk melihat bagan seluruhnya.</p>
                        </div>
                    @else
                        <div class="bg-white rounded-card border border-dashed border-border-subtle p-12 flex flex-col items-center text-center">
                            <span class="material-symbols-outlined text-muted-charcoal text-5xl mb-3">account_tree_off</span>
                            <p class="text-lg font-bold text-charcoal">Data struktur pengurus belum tersedia</p>
                            <p class="text-sm text-muted-charcoal mt-1.5 max-w-md">
                                Susunan kepengurusan {{ $org['nama'] }} belum diinput oleh sekretariat.
                                Silakan kembali lagi nanti atau hubungi sekretariat untuk informasi lebih lanjut.
                            </p>
                            <a href="{{ route('kontak') }}"
                               class="mt-6 inline-flex items-center gap-2 px-6 py-3 min-h-[44px] rounded-full bg-nu-deep text-white text-sm font-semibold hover:bg-[#113725] transition-all active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">call</span>
                                <span>Hubungi Sekretariat</span>
                            </a>
                        </div>
                    @endif
                </div>

            @else
                <!-- TAB PROGRAM KERJA -->
                <div class="reveal">
                    <div class="bg-white rounded-card border border-border-neutral shadow-subtle p-6 sm:p-10">
                        <h2 class="font-heading text-xl sm:text-2xl font-extrabold text-charcoal tracking-tight">Program Kerja</h2>
                        <p class="text-sm text-muted-charcoal mt-1">{{ $org['nama'] }} — periode berjalan.</p>

                        <ol class="mt-8 space-y-4">
                            @foreach ($org['program'] as $index => $program)
                                <li class="flex gap-4 rounded-card bg-warm-bg border border-border-neutral p-5">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-nu-deep text-white text-sm font-extrabold">
                                        {{ $index + 1 }}
                                    </span>
                                    <p class="text-sm sm:text-base text-charcoal leading-relaxed pt-1.5">{{ $program }}</p>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            @endif
        </div>

        <!-- ORGANISASI LAINNYA -->
        @if ($lainnya->isNotEmpty())
            <section class="w-full bg-warm-card border-t border-border-neutral py-16 sm:py-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-8">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-3">
                        <div>
                            <h2 class="font-heading text-2xl sm:text-3xl font-extrabold text-charcoal tracking-tight">Organisasi Lainnya</h2>
                            <p class="text-sm sm:text-base text-muted-charcoal mt-1">Jelajahi organisasi dalam kategori yang sama.</p>
                        </div>
                        <a href="{{ route('organisasi') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-nu-deep hover:underline underline-offset-4 shrink-0">
                            Lihat semua
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($lainnya as $l)
                            <a href="{{ route('organisasi.show', $l['slug']) }}"
                               class="group bg-white rounded-card border border-border-neutral shadow-subtle p-5 flex flex-col hover:-translate-y-1 hover:shadow-elevated hover:border-border-subtle transition-all duration-300">
                                <span class="w-12 h-12 rounded-full bg-warm-bg border border-border-neutral overflow-hidden flex items-center justify-center">
                                    <img src="{{ asset('images/logo.webp') }}" alt="Logo {{ $l['singkatan'] }}" loading="lazy" class="w-full h-full object-cover">
                                </span>
                                <h3 class="mt-3 text-base font-bold text-charcoal leading-snug group-hover:text-nu-deep transition-colors">{{ $l['singkatan'] }}</h3>
                                <p class="mt-1.5 text-xs text-muted-charcoal leading-relaxed line-clamp-2">{{ $l['deskripsi'] }}</p>
                                <span class="mt-3 inline-flex items-center gap-1 text-xs font-bold text-nu-deep">
                                    Lihat Profil
                                    <span class="material-symbols-outlined text-[14px] group-hover:translate-x-0.5 transition-transform">arrow_forward</span>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
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
