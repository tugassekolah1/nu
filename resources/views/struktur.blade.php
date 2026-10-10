<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <x-public-head title="Struktur Pengurus — NU Banjaranyar" />

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
                        <li class="text-white font-semibold" aria-current="page">Struktur Pengurus</li>
                    </ol>
                </nav>

                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-1.5 text-xs font-bold uppercase tracking-widest backdrop-blur-sm">
                    <span class="material-symbols-outlined text-[16px] text-muted-gold">account_tree</span>
                    <span>Susunan Kepengurusan Organisasi</span>
                </span>

                <h1 class="mt-6 font-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.1]">
                    Struktur Pengurus
                </h1>

                <p class="mt-5 text-base sm:text-lg text-white/80 leading-relaxed max-w-xl">
                    {{ $tabs[$tabAktif]['desc'] }}
                </p>

                <div class="mt-7 inline-flex items-center gap-3 rounded-container-r bg-white/10 border border-white/15 backdrop-blur-md px-6 py-4">
                    <span class="block text-4xl font-extrabold text-white leading-none">{{ $totalTab }}</span>
                    <span class="block text-xs font-semibold uppercase tracking-wider text-white/70">Pengurus<br>{{ $tabs[$tabAktif]['label'] }}</span>
                </div>
            </div>
        </header>

        <!-- TABS KATEGORI -->
        <div class="max-w-7xl mx-auto px-4 sm:px-8 pt-10">
            <div class="flex flex-wrap justify-center gap-2" role="tablist" aria-label="Filter kategori organisasi">
                @foreach ($tabs as $kode => $info)
                    <a href="{{ route('struktur', array_filter(['tab' => $kode, 'jabatan' => ($jabatanFilter ?? 'all') === 'all' ? null : $jabatanFilter])) }}" role="tab" aria-selected="{{ $tabAktif === $kode ? 'true' : 'false' }}"
                       class="px-4 sm:px-5 py-2.5 min-h-[44px] inline-flex items-center rounded-full text-sm font-bold transition-all active:scale-95 border
                              {{ $tabAktif === $kode
                                  ? 'bg-nu-deep text-white border-nu-deep shadow-subtle'
                                  : 'bg-warm-card text-charcoal border-border-subtle hover:bg-warm-beige/60' }}">
                        {{ $info['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- Dropdown filter jabatan --}}
            @if (($jabatanList ?? collect())->isNotEmpty())
                <form method="GET" action="{{ route('struktur') }}" class="mt-5 flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-2.5">
                    <input type="hidden" name="tab" value="{{ $tabAktif }}">
                    <label for="jabatan" class="text-xs font-bold uppercase tracking-widest text-muted-charcoal sm:mr-1 self-start sm:self-center">Jabatan</label>
                    <select id="jabatan" name="jabatan" onchange="this.form.submit()"
                            class="min-h-[44px] rounded-full border border-border-subtle bg-warm-card px-5 pr-10 text-sm font-semibold text-charcoal focus:outline-none focus:border-nu-deep focus:ring-2 focus:ring-nu-deep/20 cursor-pointer max-w-full">
                        <option value="all">Semua jabatan (piramida)</option>
                        @foreach ($jabatanList as $row)
                            <option value="{{ $row['jabatan'] }}" @selected(($jabatanFilter ?? 'all') === $row['jabatan'])>
                                {{ $row['jabatan'] }} ({{ $row['jumlah'] }})
                            </option>
                        @endforeach
                    </select>
                    @if (($jabatanFilter ?? 'all') !== 'all')
                        <a href="{{ route('struktur', ['tab' => $tabAktif]) }}"
                           class="inline-flex items-center justify-center min-h-[44px] px-4 rounded-full text-xs font-bold text-muted-charcoal hover:text-rose-600 transition-colors">
                            Reset
                        </a>
                    @endif
                </form>
            @endif
        </div>

        <!-- PIRAMIDA -->
        <section class="max-w-6xl mx-auto px-4 sm:px-8 py-12 sm:py-16 reveal">
            @if ($totalTab === 0)
                <div class="bg-warm-card rounded-container-r border border-dashed border-border-subtle p-12 flex flex-col items-center text-center">
                    <span class="material-symbols-outlined text-muted-charcoal text-5xl mb-3">group_off</span>
                    <p class="text-lg font-bold text-charcoal">Belum ada data pengurus</p>
                    <p class="text-sm text-muted-charcoal mt-1.5 max-w-md">
                        Susunan {{ $tabs[$tabAktif]['label'] }} belum diinput. Silakan hubungi sekretariat atau kembali lagi nanti.
                    </p>
                </div>
            @elseif (($jabatanFilter ?? 'all') !== 'all')
                {{-- Hasil filter dropdown: tampil ringkas tanpa piramida --}}
                <p class="text-center text-xs font-bold uppercase tracking-widest text-muted-charcoal mb-4">
                    {{ $jabatanFilter }} ({{ $hasilFilter->count() }})
                </p>
                @if ($hasilFilter->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-4xl mx-auto">
                        @foreach ($hasilFilter as $p)
                            @include('partials.pengurus-card', ['p' => $p])
                        @endforeach
                    </div>
                @else
                    <div class="bg-warm-card rounded-container-r border border-dashed border-border-subtle p-12 flex flex-col items-center text-center">
                        <span class="material-symbols-outlined text-muted-charcoal text-5xl mb-3">person_search</span>
                        <p class="text-lg font-bold text-charcoal">Tidak ditemukan</p>
                        <p class="text-sm text-muted-charcoal mt-1.5">Tidak ada pengurus dengan jabatan tersebut.</p>
                    </div>
                @endif
            @else
                {{-- LEVEL 1: KETUA --}}
                @if ($ketua->isNotEmpty())
                    <p class="text-center text-xs font-bold uppercase tracking-widest text-muted-charcoal mb-4">Pimpinan</p>
                    <div class="flex flex-wrap justify-center gap-6">
                        @foreach ($ketua as $p)
                            @include('partials.pengurus-card', ['p' => $p, 'besar' => true])
                        @endforeach
                    </div>
                @endif

                {{-- LEVEL 2: PENGURUS HARIAN --}}
                @if ($inti->isNotEmpty())
                    @if ($ketua->isNotEmpty())
                        <div class="flex justify-center" aria-hidden="true"><div class="w-px h-8 bg-border-subtle"></div></div>
                    @endif
                    <p class="text-center text-xs font-bold uppercase tracking-widest text-muted-charcoal mb-4">Pengurus Harian</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-4xl mx-auto">
                        @foreach ($inti as $p)
                            @include('partials.pengurus-card', ['p' => $p])
                        @endforeach
                    </div>
                @endif

                {{-- LEVEL 3: BIDANG --}}
                @if ($bidang->isNotEmpty())
                    @if ($ketua->isNotEmpty() || $inti->isNotEmpty())
                        <div class="flex justify-center" aria-hidden="true"><div class="w-px h-8 bg-border-subtle"></div></div>
                    @endif
                    <p class="text-center text-xs font-bold uppercase tracking-widest text-muted-charcoal mb-4">Ketua Bidang / Departemen ({{ $bidang->count() }})</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($bidang as $p)
                            @include('partials.pengurus-card', ['p' => $p])
                        @endforeach
                    </div>
                @endif
            @endif
        </section>

        <!-- CTA -->
        <section class="max-w-7xl mx-auto px-4 sm:px-8 pb-16 sm:pb-24 reveal">
            <div class="relative overflow-hidden rounded-container-r bg-warm-card border border-border-neutral p-8 sm:p-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
                <div class="relative max-w-xl">
                    <h2 class="font-heading text-xl sm:text-2xl font-extrabold text-charcoal tracking-tight">
                        Ingin Bergabung Menjadi Pengurus atau Anggota?
                    </h2>
                    <p class="mt-2 text-sm sm:text-base text-muted-charcoal leading-relaxed">
                        Pendaftaran anggota baru selalu terbuka. Hubungi sekretariat untuk informasi kaderisasi di setiap banom.
                    </p>
                </div>
                <div class="relative flex flex-wrap justify-center gap-3 shrink-0">
                    <a class="inline-flex items-center gap-2 px-6 py-3 min-h-[48px] rounded-full bg-nu-deep text-white text-sm font-semibold hover:bg-[#113725] transition-all active:scale-95"
                       href="{{ route('members.register-form') }}">
                        <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                        <span>Daftar Anggota</span>
                    </a>
                    <a class="inline-flex items-center gap-2 px-6 py-3 min-h-[48px] rounded-full bg-warm-bg text-charcoal text-sm font-semibold border border-border-subtle hover:bg-warm-beige/60 transition-all active:scale-95"
                       href="{{ route('kontak') }}">
                        <span class="material-symbols-outlined text-[18px]">call</span>
                        <span>Hubungi Kami</span>
                    </a>
                </div>
            </div>
            <div class="mt-6 text-center">
                <a class="inline-flex items-center gap-1.5 text-sm font-bold text-nu-deep hover:underline underline-offset-4"
                   href="{{ route('profil') }}">
                    <span class="material-symbols-outlined text-[18px]">groups</span>
                    <span>Lihat halaman profil organisasi (visi, misi & sejarah)</span>
                </a>
            </div>
            </div>
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
