<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <x-public-head title="Profil & Struktur Pengurus — NU Banjaranyar" />
</head>

<body class="bg-[#F5F7F4] text-[#17392D] antialiased selection:bg-[#E7ECE4] selection:text-[#16452F]">
    @php
        $misi = [
            [
                'judul' => 'Memperkuat Aqidah &amp; Tradisi Keagamaan',
                'isi' => 'Meneguhkan aqidah Ahlussunnah wal Jama\'ah dan menjaga tradisi keagamaan lewat kajian kitab, pesantren, dan pengajian rutin syuriah di setiap ranting.',
            ],
            [
                'judul' => 'Meningkatkan Mutu Pendidikan',
                'isi' => 'Mengembangkan sekolah dan madrasah di bawah naungan LP Ma\'arif NU Cilongok, antara lain <a class="font-semibold text-[#1F5A3F] underline underline-offset-4 hover:text-[#16452F]" href="https://s.id/mtsmanusaci54" target="_blank" rel="noopener noreferrer">MTs Ma\'arif NU 1 Cilongok</a> dan MTs Ma\'arif NU 3 Gununglurah, agar anak-anak kita tumbuh menjadi generasi yang berilmu dan bertakwa.',
            ],
            [
                'judul' => 'Memperluas Layanan Kesehatan &amp; Sosial',
                'isi' => 'Menjangkau layanan kesehatan yang murah dan mudah dijangkau bagi warga, termasuk lewat program pelayanan umat yang dikelola bersama.',
            ],
            [
                'judul' => 'Mandiri Secara Ekonomi',
                'isi' => 'Mengelola infak dan sedekah melalui UPZIS LAZISNU Cilongok untuk membantu ekonomi warga, meringankan yang membutuhkan, dan membiayai kegiatan organisasi.',
            ],
            [
                'judul' => 'Bekerja Sama dengan Semua Pihak',
                'isi' => 'Menjalin kerja sama dengan <a class="font-semibold text-[#1F5A3F] underline underline-offset-4 hover:text-[#16452F]" href="https://cilongokkec.banyumaskab.go.id/page/58402/visi-misi" target="_blank" rel="noopener noreferrer">Pemerintah Kecamatan Cilongok</a>, dinas terkait, dan organisasi kemasyarakatan lain agar warga Cilongok hidup tentram, damai, dan sejahtera.',
            ],
        ];

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
                    Profil Organisasi
                </span>

                <h1 class="mt-4 max-w-3xl text-3xl sm:text-5xl font-extrabold leading-tight tracking-tight">
                    Profil &amp; Struktur Pengurus
                </h1>
                <p class="mt-3 max-w-2xl text-base sm:text-lg leading-relaxed text-white/80">
                    Kenali visi dan misi, sejarah singkat, hingga susunan kepengurusan Nahdlatul Ulama beserta seluruh badan otonom.
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

        <!-- DAFTAR ISI HALAMAN (sticky) -->
        <div id="daftar-isi" class="sticky top-[88px] z-40 mt-9 px-5">
            <nav class="mx-auto max-w-6xl" aria-label="Daftar isi halaman profil">
                <div class="rounded-2xl border border-[#DCE4DE] bg-white/90 p-2 shadow-[0_8px_24px_rgba(23,24,22,0.06)] backdrop-blur">
                    <ul class="flex flex-wrap gap-2" data-chips>
                        <li>
                            <a class="chip is-active" data-chip href="#visi-misi">
                                Visi &amp; Misi
                            </a>
                        </li>
                        <li>
                            <a class="chip" data-chip href="#sejarah">
                                Sejarah
                            </a>
                        </li>
                        @if ($sections->isNotEmpty())
                            <li>
                                <a class="chip" data-chip href="#struktur">
                                    Pengurus
                                    <span class="chip-count">{{ $totalPengurus }}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                <p class="mt-2 px-1 text-sm text-[#526158]">
                </p>
            </nav>
        </div>

        <!-- VISI, MISI & SEJARAH -->
        <div class="mx-auto max-w-6xl space-y-14 px-5 py-10">
            <section id="visi-misi" class="scroll-mt-[180px]" data-chip-target="#visi-misi" aria-labelledby="judul-visi-misi">
                <div class="mb-6 flex flex-wrap items-end justify-between gap-3 border-b border-[#DCE4DE] pb-4">
                    <div class="min-w-0">
                        <h2 id="judul-visi-misi" class="text-2xl font-bold text-[#17392D]">Visi &amp; Misi</h2>
                        <p class="mt-1 max-w-2xl text-base leading-relaxed text-[#526158]">
                            Tujuan yang dijalankan MWC NU Kecamatan Cilongok sebagai naungan Ranting NU Banjaranyar.
                        </p>
                    </div>
                    <span class="shrink-0 rounded-full border border-[#DCE4DE] bg-white px-3.5 py-1.5 text-xs font-bold text-[#1F5A3F]">
                        MWCNU Cilongok
                    </span>
                </div>

                <article class="rounded-[28px] border border-[#C99A2E]/30 bg-[#16452F] p-6 text-center text-white sm:p-9 sm:text-left">
                    <span class="inline-flex rounded-full border border-[#C99A2E]/40 bg-[#C99A2E]/20 px-3.5 py-1.5 text-xs font-extrabold uppercase tracking-wider text-[#F3DFAE]">
                        Visi
                    </span>
                    <blockquote class="mt-4 text-xl font-semibold leading-relaxed sm:text-2xl">
                        &ldquo;Terwujudnya kemandirian jam'iyah dan jamaah Nahdlatul Ulama di tingkat Kecamatan Cilongok yang kokoh pada aqidah Ahlussunnah wal Jama'ah An-Nahdliyah, unggul dalam pelayanan pendidikan, kesehatan, ekonomi, serta maslahah bagi umat.&rdquo;
                    </blockquote>
                </article>

                <h3 class="mt-8 text-lg font-bold text-[#17392D]">Misi: 5 langkah utama</h3>
                <ol class="mt-4 space-y-4">
                    @foreach ($misi as $index => $langkah)
                        <li class="flex gap-4 rounded-3xl border border-[#DCE4DE] bg-white p-5 sm:p-6">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#E8F2EA] text-sm font-extrabold text-[#1F5A3F]">
                                {{ $index + 1 }}
                            </span>
                            <div class="min-w-0">
                                <h4 class="font-bold leading-snug text-[#17392D]">{!! $langkah['judul'] !!}</h4>
                                <p class="mt-1 text-base leading-relaxed text-[#526158]">{!! $langkah['isi'] !!}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </section>

            <section id="sejarah" class="scroll-mt-[180px]" data-chip-target="#sejarah" aria-labelledby="judul-sejarah">
                <div class="mb-6 flex flex-wrap items-end justify-between gap-3 border-b border-[#DCE4DE] pb-4">
                    <div class="min-w-0">
                        <h2 id="judul-sejarah" class="text-2xl font-bold text-[#17392D]">Sejarah Singkat</h2>
                        <p class="mt-1 max-w-2xl text-base leading-relaxed text-[#526158]">
                            Perjalanan Nahdlatul Ulama di Kecamatan Cilongok, dari pesantren hingga menjadi organisasi yang melayani warga.
                        </p>
                    </div>
                    <span class="shrink-0 rounded-full border border-[#DCE4DE] bg-white px-3.5 py-1.5 text-xs font-bold text-[#1F5A3F]">
                        Kecamatan Cilongok
                    </span>
                </div>

                <div class="space-y-4">
                    <article class="rounded-3xl border border-[#DCE4DE] bg-white p-6">
                        <h3 class="font-bold text-[#17392D]">Awal Mula dan Tradisi Pesantren</h3>
                        <p class="mt-2 text-base leading-relaxed text-[#526158]">
                            Cilongok adalah salah satu kecamatan terbesar di Kabupaten Banyumas dan sejak lama dikenal sebagai
                            daerah dengan tradisi pesantren yang kuat. Di sinilah Nahdlatul Ulama tumbuh berkat para ulama,
                            sesepuh, dan kiai kampung yang berdakwah dari mushala ke mushala. Mereka menjaga amaliah Islam
                            Ahlussunnah wal Jama'ah sekaligus melindungi warga dari paham keagamaan yang radikal.
                        </p>
                    </article>

                    <article class="rounded-3xl border border-[#DCE4DE] bg-white p-6">
                        <h3 class="font-bold text-[#17392D]">Berdirinya MWCNU Cilongok</h3>
                        <p class="mt-2 text-base leading-relaxed text-[#526158]">
                            Setelah Pengurus Cabang Nahdlatul Ulama (PCNU) Kabupaten Banyumas berkembang, dibentuklah Majelis
                            Wakil Cabang Nahdlatul Ulama (MWCNU) Kecamatan Cilongok. Tugasnya menaungi puluhan Pengurus Ranting
                            NU (PRNU) di desa-desa, termasuk Ranting NU Banjaranyar. Sejak berdiri, MWCNU Cilongok konsisten
                            menjadi penggerak organisasi yang aktif.
                        </p>
                    </article>
                </div>

                <h3 class="mt-8 text-lg font-bold text-[#17392D]">Tonggak penting yang perlu diketahui</h3>
                <div class="mt-4 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <article class="rounded-3xl border border-[#DCE4DE] bg-white p-6">
                        <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#E8F2EA] text-[#1F5A3F]">
                            <span class="material-symbols-outlined">school</span>
                        </span>
                        <h4 class="mt-3 font-bold text-[#17392D]">Pelopor Pendidikan Ma'arif</h4>
                        <p class="mt-2 text-base leading-relaxed text-[#526158]">
                            Mengelola puluhan sekolah dan madrasah NU secara mandiri. Semangat kebersamaan ini ditandai dengan
                            diresmikannya Joglo Ma'arif sebagai pusat koordinasi pendidikan di Cilongok.
                        </p>
                    </article>

                    <article class="rounded-3xl border border-[#DCE4DE] bg-white p-6">
                        <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#E8F2EA] text-[#1F5A3F]">
                            <span class="material-symbols-outlined">health_and_safety</span>
                        </span>
                        <h4 class="mt-3 font-bold text-[#17392D]">Mandiri di Bidang Kesehatan</h4>
                        <p class="mt-2 text-base leading-relaxed text-[#526158]">
                            MWCNU Cilongok memulai pembangunan RSI NU Cilongok, rumah sakit berbasis umat yang dirancang untuk
                            melayani kesehatan masyarakat luas.
                        </p>
                    </article>

                    <article class="rounded-3xl border border-[#DCE4DE] bg-white p-6">
                        <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#FBF4E4] text-[#C99A2E]">
                            <span class="material-symbols-outlined">military_tech</span>
                        </span>
                        <h4 class="mt-3 font-bold text-[#17392D]">MWCNU Paling Utama</h4>
                        <p class="mt-2 text-base leading-relaxed text-[#526158]">
                            Atas kerja keras pengurus dari tingkat anak ranting hingga lembaga, MWCNU Cilongok sering diakui
                            sebagai salah satu MWCNU terbaik di lingkungan PCNU Banyumas.
                        </p>
                    </article>
                </div>

                <div class="mt-6 rounded-3xl border border-[#DCE4DE] bg-[#E8F2EA] p-6">
                    <p class="mt-2 text-base leading-relaxed text-[#16452F]">
                        Hingga saat ini, MWCNU Cilongok terus berbenah, termasuk dari sisi digital, demi melayani jamaah dan
                        memperkuat organisasi menuju abad kedua Nahdlatul Ulama.
                    </p>
                    <p class="mt-2 text-sm leading-relaxed text-[#526158]">
                        Catatan: nama tokoh pendiri dan tahun terbitnya SK pertama MWC Cilongok masih menunggu data resmi dari
                        sekretariat, dan akan ditambahkan bila data sudah tersedia.
                    </p>
                </div>
            </section>
        </div>

        @if ($sections->isNotEmpty())
            <!-- STRUKTUR PER BADAN OTONOM -->
            <div id="struktur" class="mx-auto max-w-6xl space-y-14 px-5 py-10 scroll-mt-[180px]">
                <!-- PILIH BADAN OTONOM -->
                <div>
                    <p class="mb-3 text-sm font-semibold text-[#526158]">
                        Pilih badan otonom yang ingin dilihat susunan pengurusnya:
                    </p>
                    <ul class="flex flex-wrap gap-2">
                        @foreach ($sections as $section)
                            <li>
                                <a class="chip" href="#{{ $section['slug'] }}">
                                    {{ $section['label'] }}
                                    <span class="chip-count">{{ $section['jumlah'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                @foreach ($sections as $section)
                    <section id="{{ $section['slug'] }}" class="scroll-mt-[180px]" data-chip-target="#struktur" aria-labelledby="judul-{{ $section['slug'] }}">
                        <div class="mb-6 flex flex-wrap items-end justify-between gap-3 border-b border-[#DCE4DE] pb-4">
                            <div class="min-w-0">
                                <h2 id="judul-{{ $section['slug'] }}" class="text-2xl font-bold text-[#17392D]">
                                    {{ $section['label'] }}
                                </h2>
                                <p class="mt-1 max-w-2xl text-base leading-relaxed text-[#526158]">
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
                                    <p class="mt-2 text-base leading-relaxed text-white/75">
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
                                            <p class="mt-1 text-base leading-snug text-[#526158]">{{ $item->jabatan }}</p>
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

    <button
        id="ke-atas"
        type="button"
        aria-label="Kembali ke atas halaman"
        class="fixed bottom-6 right-6 z-40 hidden min-h-[48px] min-w-[48px] items-center justify-center rounded-full border border-[#DCE4DE] bg-white/95 p-3 text-[#16452F] shadow-[0_10px_30px_rgba(23,24,22,0.16)] backdrop-blur transition hover:bg-[#E8F2EA] active:scale-95"
    >
        <span class="material-symbols-outlined text-2xl" aria-hidden="true">arrow_upward</span>
    </button>

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
            const watched = Array.from(document.querySelectorAll('[data-chip-target]'));

            if (chips.length && watched.length && 'IntersectionObserver' in window) {
                function setActive(target) {
                    chips.forEach((chip) => {
                        chip.classList.toggle('is-active', chip.getAttribute('href') === target);
                    });
                }

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            setActive(entry.target.getAttribute('data-chip-target'));
                        }
                    });
                }, { rootMargin: '-30% 0px -55% 0px', threshold: 0 });

                watched.forEach((section) => observer.observe(section));

                chips.forEach((chip) => {
                    chip.addEventListener('click', function () {
                        setActive(this.getAttribute('href'));
                    });
                });
            }

            const keAtas = document.getElementById('ke-atas');
            if (keAtas) {
                const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                function toggleKeAtas() {
                    const show = window.scrollY > 500;
                    keAtas.classList.toggle('hidden', !show);
                    keAtas.classList.toggle('flex', show);
                }

                toggleKeAtas();
                window.addEventListener('scroll', toggleKeAtas, { passive: true });

                keAtas.addEventListener('click', function () {
                    window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
                });
            }
        });
    </script>
</body>
</html>
