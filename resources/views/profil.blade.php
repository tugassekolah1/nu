<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <x-public-head title="Profil & Struktur Pengurus — NU Banjaranyar" />
</head>

<body class="bg-[#F5F7F4] text-[#17392D] antialiased selection:bg-[#E7ECE4] selection:text-[#16452F]">
    @php
        $deskripsiBanom = [
            'ranting' => 'Induk organisasi Nahdlatul Ulama di tingkat desa yang mengoordinasikan seluruh badan otonom serta kegiatan keagamaan Islam Ahlussunnah wal Jama\'ah.',
            'ipnu' => 'Wadah kaderisasi awal bagi pelajar, santri, dan remaja putra di desa untuk membina kepemimpinan dan karakter keislaman.',
            'ippnu' => 'Wadah pembinaan dan kaderisasi bagi pelajar dan remaja putri NU di tingkat desa.',
            'ansor' => 'Organisasi kepemudaan NU yang bergerak di bidang keagamaan, sosial kemasyarakatan, dan pengawalan tradisi ulama.',
            'fatayat' => 'Badan otonom untuk perempuan muda NU yang berfokus pada penguatan ekonomi keluarga dan kesehatan masyarakat.',
            'muslimat' => 'Wadah ibu-ibu NU yang mengelola majelis taklim, kegiatan sosial, dan pendidikan keagamaan di desa.',
            'banser' => 'Barisan Ansor Serbaguna yang bertugas mengawal kiai, menjaga keamanan kegiatan keagamaan, dan tanggap bencana desa.',
        ];
    @endphp

    <x-navbar />

    <main>
        <!-- HERO PENDEK -->
        <header class="relative overflow-hidden bg-[#16452F] text-white pt-32 sm:pt-36 pb-14">
            <div class="absolute -top-16 -right-10 w-80 h-80 rounded-full bg-[#8bc14b]/10 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-10 w-72 h-72 rounded-full bg-[#C99A2E]/10 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-6xl mx-auto px-5">
                <nav aria-label="Navigasi balik" class="mb-5 text-sm text-white/70">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a class="hover:text-white hover:underline underline-offset-4" href="{{ route('landing') }}">Beranda</a></li>
                        <li aria-hidden="true">›</li>
                        <li class="text-white font-semibold" aria-current="page">Pengurus</li>
                    </ol>
                </nav>

                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-1.5 text-xs font-bold uppercase tracking-widest">
                    Keorganisasian Desa
                </span>

                <h1 class="mt-4 max-w-3xl text-3xl sm:text-5xl font-extrabold leading-tight tracking-tight">
                    Profil &amp; Struktur Pengurus
                </h1>
                <p class="mt-3 max-w-2xl text-base sm:text-lg leading-relaxed text-white/80">
                    Susunan kepengurusan Nahdlatul Ulama beserta seluruh badan otonom di Desa Banjaranyar.
                </p>

                <dl class="mt-7 flex flex-wrap gap-3">
                    <div class="rounded-2xl border border-white/15 bg-white/10 px-5 py-3 backdrop-blur-sm">
                        <dt class="text-xs font-semibold uppercase tracking-wider text-white/60">Jumlah Pengurus</dt>
                        <dd class="text-2xl font-extrabold">{{ $totalPengurus }} orang</dd>
                    </div>
                    <div class="rounded-2xl border border-white/15 bg-white/10 px-5 py-3 backdrop-blur-sm">
                        <dt class="text-xs font-semibold uppercase tracking-wider text-white/60">Badan Otonom</dt>
                        <dd class="text-2xl font-extrabold">{{ $sections->count() }} lembaga</dd>
                    </div>
                </dl>
            </div>
        </header>

        @if ($sections->isNotEmpty())
            <!-- PILIH BADAN OTONOM (sticky) -->
            <div id="pilihan-banom" class="sticky top-[88px] z-40 mt-9 px-5">
                <nav class="mx-auto max-w-6xl" aria-label="Pilih badan otonom">
                    <div class="rounded-2xl border border-[#DCE4DE] bg-white/90 p-2 shadow-[0_8px_24px_rgba(23,24,22,0.06)] backdrop-blur">
                        <ul class="flex min-w-max gap-2" data-chips>
                            <li>
                                <a class="chip is-active" data-chip href="#struktur">
                                    Semua
                                    <span class="chip-count">{{ $totalPengurus }}</span>
                                </a>
                            </li>
                            @foreach ($sections as $section)
                                <li>
                                    <a class="chip" data-chip href="#{{ $section['slug'] }}">
                                        {{ $section['label'] }}
                                        <span class="chip-count">{{ $section['jumlah'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </nav>
            </div>

            <!-- STRUKTUR PER BADAN OTONOM -->
            <div id="struktur" class="mx-auto max-w-6xl space-y-14 px-5 py-10 scroll-mt-[160px]">
                @foreach ($sections as $section)
                    <section id="{{ $section['slug'] }}" class="scroll-mt-[160px]" aria-labelledby="judul-{{ $section['slug'] }}">
                        <div class="mb-6 flex flex-wrap items-end justify-between gap-3 border-b border-[#DCE4DE] pb-4">
                            <div class="min-w-0">
                                <h2 id="judul-{{ $section['slug'] }}" class="text-2xl font-bold text-[#17392D]">
                                    {{ $section['label'] }}
                                </h2>
                                <p class="mt-1 max-w-2xl text-sm leading-relaxed text-[#526158]">
                                    {{ $deskripsiBanom[$section['slug']] ?? 'Susunan kepengurusan ' . $section['label'] . ' di Desa Banjaranyar.' }}
                                </p>
                            </div>
                            <span class="shrink-0 rounded-full border border-[#DCE4DE] bg-white px-3.5 py-1.5 text-xs font-bold text-[#1F5A3F]">
                                {{ $section['jumlah'] }} pengurus
                            </span>
                        </div>

                        @php
                            $ketua = $section['items']->first(
                                fn ($item) => str_starts_with(strtolower(trim($item->jabatan)), 'ketua')
                            );
                            $anggota = $ketua
                                ? $section['items']->where('id', '!=', $ketua->id)->values()
                                : $section['items'];
                        @endphp

                        @if ($ketua)
                            <!-- KARTU KETUA (penekanan hierarki) -->
                            <article class="mb-6 flex flex-col items-center gap-6 rounded-[28px] border border-[#C99A2E]/30 bg-[#16452F] p-6 text-center text-white sm:flex-row sm:p-8 sm:text-left">
                                <div class="h-40 w-32 shrink-0 overflow-hidden rounded-2xl border-2 border-white/20 bg-white/10">
                                    @if ($ketua->foto)
                                        <img src="{{ asset('storage/' . $ketua->foto) }}" alt="Foto {{ $ketua->nama }}" loading="lazy" class="h-full w-full object-cover">
                                    @else
                                        <div class="flex h-full w-full items-center justify-center text-3xl font-extrabold text-white/50">
                                            {{ \Illuminate\Support\Str::of($ketua->nama)->explode(' ')->filter()->map(fn ($w) => \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($w, 0, 1)))->take(2)->implode('') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <span class="inline-flex rounded-full border border-[#C99A2E]/40 bg-[#C99A2E]/20 px-3.5 py-1.5 text-xs font-extrabold uppercase tracking-wider text-[#F3DFAE]">
                                        {{ $ketua->jabatan }}
                                    </span>
                                    <h3 class="mt-3 text-2xl font-bold leading-snug sm:text-3xl">{{ $ketua->nama }}</h3>
                                    <p class="mt-2 text-sm leading-relaxed text-white/70 sm:text-base">
                                        Pimpinan {{ $section['label'] }} Desa Banjaranyar periode berjalan.
                                    </p>
                                </div>
                            </article>
                        @endif

                        @if ($anggota->isNotEmpty())
                            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                @foreach ($anggota as $item)
                                    @php
                                        $inisial = \Illuminate\Support\Str::of($item->nama)->explode(' ')->filter()->map(fn ($w) => \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($w, 0, 1)))->take(2)->implode('');
                                    @endphp
                                    <article class="group flex flex-col items-center gap-3 rounded-3xl border border-[#DCE4DE] bg-white p-5 text-center transition duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(23,24,22,0.08)]">
                                        <div class="h-36 w-28 overflow-hidden rounded-2xl border border-[#DCE4DE] bg-[#F5F7F4] sm:h-40 sm:w-32">
                                            @if ($item->foto)
                                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto {{ $item->nama }}" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                            @else
                                                <div class="flex h-full w-full items-center justify-center text-2xl font-extrabold text-[#1F5A3F]/50">
                                                    {{ $inisial }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="w-full">
                                            <h3 class="text-base font-bold leading-snug text-[#17392D]">{{ $item->nama }}</h3>
                                            <p class="mt-1 text-sm leading-snug text-[#526158]">{{ $item->jabatan }}</p>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        @endif
                    </section>
                @endforeach
            </div>
        @else
            <!-- EMPTY STATE -->
            <div class="mx-auto max-w-3xl px-5 py-16">
                <div class="rounded-3xl border border-[#DCE4DE] bg-white p-10 text-center">
                    <span class="material-symbols-outlined text-5xl text-[#7B8780]">groups</span>
                    <p class="mt-4 text-base font-semibold text-[#17392D]">Data pengurus belum tersedia.</p>
                    <p class="mt-1 text-sm text-[#526158]">Silakan kembali lagi nanti atau hubungi sekretariat.</p>
                    <a href="{{ route('landing') }}" class="mt-6 inline-flex min-h-[44px] items-center gap-2 rounded-[14px] bg-[#1F5A3F] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#16452F] active:scale-95">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        @endif
    </main>

    <x-footer />

    <style>
        .chip {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            min-height: 44px;
            padding: 0.5rem 1.25rem;
            border-radius: 999px;
            background: #F5F7F4;
            border: 1px solid #DCE4DE;
            color: #526158;
            font-size: 0.875rem;
            font-weight: 700;
            white-space: nowrap;
            transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
        }

        .chip:hover {
            background: #E8F2EA;
            color: #16452F;
        }

        .chip:focus-visible {
            outline: 2px solid #1F5A3F;
            outline-offset: 2px;
        }

        .chip.is-active {
            background: #1F5A3F;
            border-color: #1F5A3F;
            color: #ffffff;
        }

        .chip-count {
            font-size: 0.75rem;
            font-weight: 800;
            padding: 0.125rem 0.5rem;
            border-radius: 999px;
            background: #E8F2EA;
            color: #1F5A3F;
        }

        .chip.is-active .chip-count {
            background: rgba(255, 255, 255, 0.18);
            color: #ffffff;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chips = Array.from(document.querySelectorAll('[data-chip]'));
            if (!chips.length || !('IntersectionObserver' in window)) return;

            const sectionIds = chips
                .map((chip) => chip.getAttribute('href'))
                .filter((href) => href && href.startsWith('#') && href !== '#struktur')
                .map((href) => href.slice(1));

            const sections = sectionIds
                .map((id) => document.getElementById(id))
                .filter(Boolean);

            if (!sections.length) return;

            function setActive(id) {
                chips.forEach((chip) => {
                    chip.classList.toggle('is-active', chip.getAttribute('href') === '#' + id);
                });
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) setActive(entry.target.id);
                });
            }, { rootMargin: '-30% 0px -55% 0px', threshold: 0 });

            sections.forEach((section) => observer.observe(section));

            chips.forEach((chip) => {
                chip.addEventListener('click', function () {
                    const id = this.getAttribute('href').slice(1);
                    if (id !== 'struktur') setActive(id);
                });
            });
        });
    </script>
</body>
</html>
