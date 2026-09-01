<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NU Banjaranyar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --bg: #eef2ec;
            --surface: #ffffff;
            --ink: #17392d;
            --ink-soft: #4b5c53;
            --line: #d7e2d7;
            --brand-deep: #356c49;
            --brand-dark: #214b35;
            --shadow: 0 18px 45px rgba(23, 57, 45, 0.08);
            --container: 1180px;
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; font-family: "Inter", system-ui, sans-serif; color: var(--ink); background: var(--bg); font-size: 16px; }
        img { max-width: 100%; display: block; }
        a { color: inherit; text-decoration: none; }

        /* NAV */
       body { padding-top: 88px; }

/* NAV — floating pill, auto-hide saat scroll ke bawah */
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(20px, -30px) scale(1.1); }
    66% { transform: translate(-15px, 15px) scale(0.95); }
}
.animate-blob { animation: blob 9s infinite ease-in-out; }

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-up { animation: fadeUp 0.7s ease-out forwards; }

        /* PAGINATION */
        .news-pagination { margin-top: 28px; display: flex; justify-content: center; }
        .news-pagination nav { display: flex; width: 100%; justify-content: center; }

        /* 1. Sembunyikan navigasi bawaan mobile (Prev/Next simpel) */
        .news-pagination nav > div:first-child { display: none !important; }

        /* 2. PAKSA nomor halaman (desktop view) agar MUNCUL di mobile */
        .news-pagination nav > div:last-child {
            display: flex !important;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        /* 3. Sembunyikan teks "Showing X to Y of Z results" */
        .news-pagination nav > div:last-child > div:first-child { display: none !important; }

        /* 4. Tampilkan nomor halaman & panah navigasi */
        .news-pagination nav > div:last-child > div:last-child {
            display: flex !important;
            justify-content: center;
            flex-wrap: wrap;
            gap: 4px;
        }

        /* Style untuk angka & tombol */
        .news-pagination span[aria-current="page"] span,
        .news-pagination a,
        .news-pagination span[aria-disabled="true"] span {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 40px; height: 40px; margin: 2px; padding: 0 12px;
            border-radius: 10px; font-size: 14px; font-weight: 700;
            background: var(--surface); color: var(--ink); border: 1px solid var(--line);
            transition: background 160ms ease, color 160ms ease;
        }

        .news-pagination a:hover { background: var(--brand-dark); color: #fff; border-color: var(--brand-dark); }
        .news-pagination span[aria-current="page"] span {
            background: var(--brand-dark); color: #fff; border-color: var(--brand-dark);
        }
        .news-pagination span[aria-disabled="true"] span {
            opacity: 0.4; pointer-events: none;
        }
    </style>
</head>
<body class="font-[Inter,system-ui,sans-serif] text-[#17392d] bg-[#eef2ec] text-base pt-[88px]">

 <!-- NAVBAR -->
<header class="fixed top-0 left-0 w-full z-50 flex justify-center transition-all duration-300">
    <nav id="navbar" class="w-[92%] max-w-5xl mt-5 px-6 py-3 flex items-center justify-between rounded-full bg-emerald-950/85 backdrop-blur-md border border-emerald-800/40 shadow-xl shadow-emerald-950/20 transition-all duration-300">

        <a href="{{ route('landing') }}" class="flex items-center gap-2.5">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-lime-400 flex items-center justify-center text-emerald-950 font-black text-sm shadow-md">
                NU
            </div>
            <div class="leading-tight hidden sm:block">
                <span class="block font-bold text-sm text-white">NU BANJARANYAR</span>
                <span class="block text-[11px] text-emerald-200/80 font-medium">Nahdlatul Ulama</span>
            </div>
        </a>

        <ul class="hidden md:flex items-center gap-8 text-sm font-medium">
            <li><a href="{{ route('landing') }}" class="text-emerald-100 hover:text-amber-300 transition-colors">Beranda</a></li>
            <li><a href="#warta" class="text-emerald-100 hover:text-amber-300 transition-colors">Warta</a></li>
            <li><a href="#agenda" class="text-emerald-100 hover:text-amber-300 transition-colors">Agenda</a></li>
            <li><a href="#pengurus" class="text-emerald-100 hover:text-amber-300 transition-colors">Pengurus</a></li>
        </ul>

        <a href="{{ route('members.register-form') }}" class="hidden md:inline-flex items-center bg-amber-400 hover:bg-amber-300 active:scale-95 text-emerald-950 font-bold text-sm px-5 py-2 rounded-full transition-all shadow-md shadow-amber-400/25">
            Daftar Anggota
        </a>

        <button id="menu-btn" class="md:hidden text-emerald-100 hover:text-white focus:outline-none p-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <div id="mobile-menu" class="hidden absolute top-full left-0 right-0 mt-3 p-4 bg-emerald-950/95 backdrop-blur-md border border-emerald-800/40 rounded-2xl shadow-2xl flex-col gap-2 text-center md:hidden">
            <a href="{{ route('landing') }}" class="text-emerald-100 font-medium hover:text-amber-300 py-2 transition-colors">Beranda</a>
            <a href="#warta" class="text-emerald-100 font-medium hover:text-amber-300 py-2 transition-colors">Warta</a>
            <a href="#agenda" class="text-emerald-100 font-medium hover:text-amber-300 py-2 transition-colors">Agenda</a>
            <a href="#pengurus" class="text-emerald-100 font-medium hover:text-amber-300 py-2 transition-colors">Pengurus</a>
            <a href="{{ route('members.register-form') }}" class="bg-amber-400 hover:bg-amber-300 text-emerald-950 font-bold text-sm px-5 py-2.5 rounded-full mt-2 inline-block transition-all">
                Daftar Anggota
            </a>
        </div>

    </nav>
</header>

<!-- HERO -->
<header class="relative overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-800 to-emerald-700 pt-32 pb-24">

    <!-- Blob animasi lembut -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-lime-400/20 rounded-full blur-3xl animate-blob"></div>
    <div class="absolute top-10 -right-20 w-80 h-80 bg-amber-300/15 rounded-full blur-3xl animate-blob [animation-delay:2s]"></div>
    <div class="absolute bottom-0 left-1/3 w-72 h-72 bg-emerald-400/15 rounded-full blur-3xl animate-blob [animation-delay:4s]"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-6 text-center flex flex-col items-center gap-6">

        <span class="animate-fade-up [animation-delay:.1s] opacity-0 inline-flex items-center gap-2 bg-white/10 border border-white/20 text-emerald-50 text-xs font-semibold px-4 py-1.5 rounded-full">
            Selamat Datang di Website Resmi
        </span>

        <h1 class="animate-fade-up [animation-delay:.25s] opacity-0 font-serif font-extrabold text-white text-4xl sm:text-5xl lg:text-6xl leading-tight tracking-tight">
            Nahdlatul Ulama<br>
            <span class="text-amber-300">Ranting Banjaranyar</span>
        </h1>

        <p class="animate-fade-up [animation-delay:.4s] opacity-0 text-emerald-50/90 text-base sm:text-lg leading-relaxed max-w-xl">
            Menjaga tradisi Ahlussunnah wal Jama'ah, mempererat ukhuwah, dan melayani umat melalui dakwah, pendidikan, dan pemberdayaan masyarakat.
        </p>

        <div class="animate-fade-up [animation-delay:.55s] opacity-0 flex flex-col sm:flex-row gap-4 w-full sm:w-auto mt-2">
            <a href="#warta" class="inline-flex items-center justify-center gap-2 bg-amber-400 hover:bg-amber-300 text-emerald-950 font-bold text-base px-7 py-4 rounded-2xl shadow-lg shadow-amber-400/25 hover:-translate-y-0.5 transition-all">
                <i data-lucide="newspaper" class="w-5 h-5"></i>
                Lihat Berita
            </a>
            <a href="#agenda" class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/25 text-white font-bold text-base px-7 py-4 rounded-2xl hover:-translate-y-0.5 transition-all">
                <i data-lucide="calendar-days" class="w-5 h-5"></i>
                Acara Mendatang
            </a>
            <a href="{{ route('members.register-form') }}" class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/25 text-white font-bold text-base px-7 py-4 rounded-2xl hover:-translate-y-0.5 transition-all">
                <i data-lucide="user-plus" class="w-5 h-5"></i>
                Daftar Anggota
            </a>
        </div>

    </div>
</header>

<main>
    <!-- LAYANAN & INFORMASI -->
    <section class="pt-[46px]">
        <div class="w-[min(1180px,calc(100%-32px))] mx-auto w-[min(calc(100%-24px),1180px)]">
            <h2 class="m-0 mb-5 text-[clamp(26px,3vw,38px)] leading-[1.15] tracking-[-0.02em] font-extrabold text-[#214b35]">Layanan &amp; Informasi</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-3 md:gap-4">
                <a href="{{ route('members.register-form') }}" class="bg-white border border-[#d7e2d7] rounded-[18px] p-4 md:p-[22px] md:px-4 text-center shadow-[0_18px_45px_rgba(23,57,45,0.08)] hover:-translate-y-[3px] hover:border-[#356c49] transition-all duration-160">
                    <div class="w-11 h-11 md:w-[52px] md:h-[52px] mx-auto mb-3 rounded-[14px] bg-gradient-to-b from-[#90ca47] to-[#7ebb3d] grid place-items-center text-white">
                        <i data-lucide="user-plus" class="w-5 h-5 md:w-6 md:h-6"></i>
                    </div>
                    <span class="block font-bold text-[13px] md:text-[15px] text-[#17392d]">Daftar Anggota</span>
                </a>
                <a href="#warta" class="bg-white border border-[#d7e2d7] rounded-[18px] p-4 md:p-[22px] md:px-4 text-center shadow-[0_18px_45px_rgba(23,57,45,0.08)] hover:-translate-y-[3px] hover:border-[#356c49] transition-all duration-160">
                    <div class="w-11 h-11 md:w-[52px] md:h-[52px] mx-auto mb-3 rounded-[14px] bg-gradient-to-b from-[#90ca47] to-[#7ebb3d] grid place-items-center text-white">
                        <i data-lucide="newspaper" class="w-5 h-5 md:w-6 md:h-6"></i>
                    </div>
                    <span class="block font-bold text-[13px] md:text-[15px] text-[#17392d]">Warta Berita</span>
                </a>
                <a href="#pengurus" class="bg-white border border-[#d7e2d7] rounded-[18px] p-4 md:p-[22px] md:px-4 text-center shadow-[0_18px_45px_rgba(23,57,45,0.08)] hover:-translate-y-[3px] hover:border-[#356c49] transition-all duration-160">
                    <div class="w-11 h-11 md:w-[52px] md:h-[52px] mx-auto mb-3 rounded-[14px] bg-gradient-to-b from-[#90ca47] to-[#7ebb3d] grid place-items-center text-white">
                        <i data-lucide="users" class="w-5 h-5 md:w-6 md:h-6"></i>
                    </div>
                    <span class="block font-bold text-[13px] md:text-[15px] text-[#17392d]">Struktur Pengurus</span>
                </a>
                <a href="#agenda" class="bg-white border border-[#d7e2d7] rounded-[18px] p-4 md:p-[22px] md:px-4 text-center shadow-[0_18px_45px_rgba(23,57,45,0.08)] hover:-translate-y-[3px] hover:border-[#356c49] transition-all duration-160">
                    <div class="w-11 h-11 md:w-[52px] md:h-[52px] mx-auto mb-3 rounded-[14px] bg-gradient-to-b from-[#90ca47] to-[#7ebb3d] grid place-items-center text-white">
                        <i data-lucide="calendar-days" class="w-5 h-5 md:w-6 md:h-6"></i>
                    </div>
                    <span class="block font-bold text-[13px] md:text-[15px] text-[#17392d]">Agenda Kegiatan</span>
                </a>
                <a href="{{route('infaq.index')}}" class="bg-white border border-[#d7e2d7] rounded-[18px] p-4 md:p-[22px] md:px-4 text-center shadow-[0_18px_45px_rgba(23,57,45,0.08)] hover:-translate-y-[3px] hover:border-[#356c49] transition-all duration-160">
                    <div class="w-11 h-11 md:w-[52px] md:h-[52px] mx-auto mb-3 rounded-[14px] bg-gradient-to-b from-[#90ca47] to-[#7ebb3d] grid place-items-center text-white">
                        <i data-lucide="hand-coins" class="w-5 h-5 md:w-6 md:h-6"></i>
                    </div>
                    <span class="block font-bold text-[13px] md:text-[15px] text-[#17392d]">Donasi / Infaq</span>
                </a>
                <a href="/galeri" class="bg-white border border-[#d7e2d7] rounded-[18px] p-4 md:p-[22px] md:px-4 text-center shadow-[0_18px_45px_rgba(23,57,45,0.08)] hover:-translate-y-[3px] hover:border-[#356c49] transition-all duration-160">
                    <div class="w-11 h-11 md:w-[52px] md:h-[52px] mx-auto mb-3 rounded-[14px] bg-gradient-to-b from-[#90ca47] to-[#7ebb3d] grid place-items-center text-white">
                        <i data-lucide="images" class="w-5 h-5 md:w-6 md:h-6"></i>
                    </div>
                    <span class="block font-bold text-[13px] md:text-[15px] text-[#17392d]">Galeri Kegiatan</span>
                </a>
                <a href="/profil" class="bg-white border border-[#d7e2d7] rounded-[18px] p-4 md:p-[22px] md:px-4 text-center shadow-[0_18px_45px_rgba(23,57,45,0.08)] hover:-translate-y-[3px] hover:border-[#356c49] transition-all duration-160">
                    <div class="w-11 h-11 md:w-[52px] md:h-[52px] mx-auto mb-3 rounded-[14px] bg-gradient-to-b from-[#90ca47] to-[#7ebb3d] grid place-items-center text-white">
                        <i data-lucide="book-open" class="w-5 h-5 md:w-6 md:h-6"></i>
                    </div>
                    <span class="block font-bold text-[13px] md:text-[15px] text-[#17392d]">Profil Organisasi</span>
                </a>
                <a href="https://wa.me/6281234567890" target="_blank" class="bg-white border border-[#d7e2d7] rounded-[18px] p-4 md:p-[22px] md:px-4 text-center shadow-[0_18px_45px_rgba(23,57,45,0.08)] hover:-translate-y-[3px] hover:border-[#356c49] transition-all duration-160">
                    <div class="w-11 h-11 md:w-[52px] md:h-[52px] mx-auto mb-3 rounded-[14px] bg-gradient-to-b from-[#90ca47] to-[#7ebb3d] grid place-items-center text-white">
                        <i data-lucide="phone" class="w-5 h-5 md:w-6 md:h-6"></i>
                    </div>
                    <span class="block font-bold text-[13px] md:text-[15px] text-[#17392d]">Kontak Kami</span>
                </a>
            </div>
        </div>
    </section>

    <!-- WARTA TERBARU -->
    <section class="pt-[46px]" id="warta">
        <div class="w-[min(1180px,calc(100%-32px))] mx-auto w-[min(calc(100%-24px),1180px)]">
            <h2 class="m-0 mb-5 text-[clamp(26px,3vw,38px)] leading-[1.15] tracking-[-0.02em] font-extrabold text-[#214b35]">Warta Terbaru</h2>
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 md:gap-5">
                @forelse ($newsList as $berita)
                    <article class="rounded-[18px] overflow-hidden bg-white shadow-[0_18px_45px_rgba(23,57,45,0.08)] border border-[#d7e2d7]">
                        <a href="{{ route('berita.show', $berita->slug) }}">
                            <div class="aspect-square md:aspect-[4/3] p-3.5 md:p-5 text-white flex flex-col justify-end gap-2 relative overflow-hidden @if($loop->iteration % 3 == 1) bg-gradient-to-br from-[#102a20] via-[#213d2f] to-[#365946] @elseif($loop->iteration % 3 == 2) bg-gradient-to-br from-[#294738] via-[#375844] to-[#22372c] @else bg-gradient-to-br from-[#274134] via-[#355648] to-[#4f6d50] @endif"
                                 @if ($berita->gambar)
                                     style="background-image: linear-gradient(rgba(16,42,32,0.35), rgba(16,42,32,0.8)), url('{{ Storage::url($berita->gambar) }}'); background-size: cover; background-position: center;"
                                 @endif
                            >
                                <div class="text-[11px] md:text-[13px] font-bold text-white/85">Warta NU</div>
                                <h3 class="m-0 font-serif text-[15px] md:text-[clamp(19px,2.2vw,24px)] leading-[1.25] line-clamp-3">{{ $berita->judul }}</h3>
                                <div class="text-[11px] md:text-[13px] text-white/85">
                                    {{ $berita->user->name ?? 'Admin' }} • {{ $berita->created_at->translatedFormat('d M Y') }}
                                </div>
                            </div>
                            <div class="px-3.5 py-2.5 md:px-[18px] md:py-3.5 bg-[#8bc14b] text-[#16372c] font-bold text-xs md:text-sm">Baca selengkapnya</div>
                        </a>
                    </article>
                @empty
                    <p class="text-[#4b5c53]">Belum ada berita yang diterbitkan.</p>
                @endforelse
            </div>
            <div class="news-pagination mt-7 flex justify-center">
                {{ $newsList->links() }}
            </div>
        </div>
    </section>

    <!-- SAMBUTAN & AGENDA -->
    <section class="pt-[46px]" id="pengurus">
        <div class="w-[min(1180px,calc(100%-32px))] mx-auto grid lg:grid-cols-[1.6fr_1fr] gap-8 items-start">
            <div>
                <h2 class="m-0 mb-5 text-[clamp(26px,3vw,38px)] leading-[1.15] tracking-[-0.02em] font-extrabold text-[#214b35]">Sambutan Pengurus</h2>
                <div class="bg-white rounded-[18px] p-6 border border-[#d7e2d7] shadow-[0_18px_45px_rgba(23,57,45,0.08)]">
                    <p class="m-0 text-[#4b5c53] leading-[1.75] text-[15px]">Selamat datang di website resmi NU Ranting Banjaranyar. Kami berkomitmen untuk terus mempererat silaturahmi antar warga Nahdliyin, menyebarkan dakwah Ahlussunnah wal Jama'ah, serta memberikan pelayanan terbaik bagi seluruh anggota dan masyarakat sekitar.</p>
                </div>

                <div id="pengurus" class="grid grid-cols-2 gap-3 md:gap-[18px] mt-5">
                    <article class="bg-white rounded-[18px] overflow-hidden border border-[#d7e2d7] shadow-[0_18px_45px_rgba(23,57,45,0.08)]">
                        <div class="aspect-[1.15/1] bg-gradient-to-br from-[#cad7cf] to-[#f0f4ef] relative">
                            <div class="absolute inset-x-4 top-3.5 h-[120px] rounded-2xl bg-gradient-to-br from-[#4d6c5d] to-[#9cb995]"></div>
                        </div>
                        <div class="p-3 md:p-4">
                            <h4 class="m-0 mb-2 text-sm md:text-base">Ketua Ranting</h4>
                            <p class="m-0 text-[#4b5c53] text-xs md:text-sm leading-[1.6]">Memimpin jalannya organisasi dan mengoordinasikan seluruh program kerja ranting.</p>
                        </div>
                    </article>
                    <article class="bg-white rounded-[18px] overflow-hidden border border-[#d7e2d7] shadow-[0_18px_45px_rgba(23,57,45,0.08)]">
                        <div class="aspect-[1.15/1] bg-gradient-to-br from-[#cad7cf] to-[#f0f4ef] relative">
                            <div class="absolute inset-x-4 top-3.5 h-[120px] rounded-2xl bg-gradient-to-br from-[#4d6c5d] to-[#9cb995]"></div>
                        </div>
                        <div class="p-3 md:p-4">
                            <h4 class="m-0 mb-2 text-sm md:text-base">Sekretaris</h4>
                            <p class="m-0 text-[#4b5c53] text-xs md:text-sm leading-[1.6]">Mengelola administrasi, surat-menyurat, dan dokumentasi kegiatan organisasi.</p>
                        </div>
                    </article>
                    <article class="bg-white rounded-[18px] overflow-hidden border border-[#d7e2d7] shadow-[0_18px_45px_rgba(23,57,45,0.08)]">
                        <div class="aspect-[1.15/1] bg-gradient-to-br from-[#cad7cf] to-[#f0f4ef] relative">
                            <div class="absolute inset-x-4 top-3.5 h-[120px] rounded-2xl bg-gradient-to-br from-[#4d6c5d] to-[#9cb995]"></div>
                        </div>
                        <div class="p-3 md:p-4">
                            <h4 class="m-0 mb-2 text-sm md:text-base">Bendahara</h4>
                            <p class="m-0 text-[#4b5c53] text-xs md:text-sm leading-[1.6]">Mengelola keuangan organisasi termasuk infaq, donasi, dan iuran keanggotaan.</p>
                        </div>
                    </article>
                </div>
            </div>

            <aside id="agenda">
                <h2 class="m-0 mb-5 text-[clamp(26px,3vw,38px)] leading-[1.15] tracking-[-0.02em] font-extrabold text-[#214b35]">Agenda Kegiatan</h2>
                <div class="bg-white border border-[#d7e2d7] rounded-[20px] shadow-[0_18px_45px_rgba(23,57,45,0.08)] p-5 pb-4">
                    <div class="flex items-center justify-between mb-4 text-[#56675e] font-bold text-[15px]">
                        <i data-lucide="arrow-left" class="w-[18px] h-[18px]"></i>
                        <span>{{ now()->translatedFormat('F Y') }}</span>
                        <i data-lucide="arrow-right" class="w-[18px] h-[18px]"></i>
                    </div>
                    <div class="grid grid-cols-7 gap-1.5 text-center">
                        <span class="text-xs text-[#8a988f] font-bold uppercase">M</span>
                        <span class="text-xs text-[#8a988f] font-bold uppercase">S</span>
                        <span class="text-xs text-[#8a988f] font-bold uppercase">S</span>
                        <span class="text-xs text-[#8a988f] font-bold uppercase">R</span>
                        <span class="text-xs text-[#8a988f] font-bold uppercase">K</span>
                        <span class="text-xs text-[#8a988f] font-bold uppercase">J</span>
                        <span class="text-xs text-[#8a988f] font-bold uppercase">S</span>
                    </div>
                    <div class="grid grid-cols-7 gap-1.5 text-center mt-2.5">
                        @for ($i = 1; $i <= 30; $i++)
                            <span class="w-[34px] h-[34px] grid place-items-center mx-auto rounded-[10px] text-sm {{ $i === (int) now()->format('j') ? 'bg-[#214b35] text-white font-extrabold' : 'bg-[#dceabb] text-[#45683f]' }}">{{ $i }}</span>
                        @endfor
                    </div>
                </div>

                @forelse ($upcomingAgenda as $index => $agenda)
                    @if ($index === 0)
                        <div class="bg-white border border-[#d7e2d7] rounded-[20px] shadow-[0_18px_45px_rgba(23,57,45,0.08)] mt-4 p-[18px]">
                            <div class="text-xs text-[#7f8c85] uppercase font-bold mb-1.5">{{ $agenda->event_date->translatedFormat('d F Y') }}</div>
                            <strong class="block text-base text-[#17392d] mb-1">{{ $agenda->title }}</strong>
                            <span class="text-[#61736a] text-sm">
                                {{ $agenda->event_time ?? 'Waktu menyusul' }}
                                @if ($agenda->location) • {{ $agenda->location }} @endif
                            </span>
                            <span class="inline-block mt-2.5 px-3.5 py-1.5 rounded-full bg-[#8bc14b] text-[#16372c] font-bold text-[13px]">{{ $agenda->category }}</span>
                        </div>
                    @endif
                @empty
                    <div class="bg-white border border-[#d7e2d7] rounded-[20px] shadow-[0_18px_45px_rgba(23,57,45,0.08)] mt-4 p-[18px]">
                        <div class="text-xs text-[#7f8c85] uppercase font-bold mb-1.5">Info</div>
                        <strong class="block text-base text-[#17392d] mb-1">Belum ada agenda terjadwal</strong>
                        <span class="text-[#61736a] text-sm">Nantikan kegiatan selanjutnya</span>
                    </div>
                @endforelse

                @if ($upcomingAgenda->count() > 1)
                    <div class="bg-white border border-[#d7e2d7] rounded-[20px] shadow-[0_18px_45px_rgba(23,57,45,0.08)] mt-4 p-[18px]">
                        <div class="grid gap-3.5">
                            @foreach ($upcomingAgenda->skip(1) as $agenda)
                                <div class="grid grid-cols-[46px_1fr] gap-3.5 items-center">
                                    <div class="w-[46px] h-[46px] rounded-[14px] bg-gradient-to-br from-[#c8d5c9] to-[#eff4ee] relative">
                                        <div class="absolute inset-[9px] rounded-full bg-gradient-to-b from-[#5f766a] to-[#d3ddd5]"></div>
                                    </div>
                                    <div>
                                        <strong class="block text-[15px]">{{ $agenda->title }}</strong>
                                        <span class="block text-[#4b5c53] text-[13px] mt-[3px]">{{ $agenda->event_date->translatedFormat('d M Y') }}@if ($agenda->event_time) • {{ $agenda->event_time }} @endif</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </aside>
        </div>
    </section>

  

    <!-- KONTAK STRIP -->
    <div class="mt-[46px] bg-[#214b35] text-white py-8 text-center w-full">
        <div class="w-[min(1180px,calc(100%-32px))] mx-auto">
            <h3 class="m-0 mb-2 text-[22px] font-['Baloo_2',cursive]">Ada Pertanyaan?</h3>
            <p class="m-0 mb-[18px] text-white/85 text-[15px]">Hubungi pengurus kami langsung untuk info pendaftaran atau kegiatan.</p>
            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center gap-2 bg-[#25D366] text-white px-6 py-[13px] rounded-full font-bold text-[15px] hover:opacity-90 transition-opacity">
                <i data-lucide="message-circle" class="w-[18px] h-[18px]"></i>
                Chat via WhatsApp
            </a>
        </div>
    </div>
</main>

<footer class="bg-[#101715] text-[#d2d9d5] py-5 text-sm w-full">
    <div class="w-[min(1180px,calc(100%-32px))] mx-auto flex flex-col md:flex-row items-start md:items-center justify-between gap-3.5 flex-wrap">
        <span>Copyright © {{ now()->year }} NU Ranting Banjaranyar</span>
        <span>Kontak: nubanjaranyar@gmail.com</span>
    </div>
</footer>

<script src="https://unpkg.com/lucide@0.469.0/dist/umd/lucide.min.js"></script>
<script>
    function filterBanom(category) {
        const cards = document.querySelectorAll('.pengurus-card');
        const buttons = document.querySelectorAll('.tab-btn');

        buttons.forEach(btn => {
            btn.classList.remove('bg-emerald-800', 'text-white', 'border-emerald-800', 'shadow-md');
            btn.classList.add('bg-white', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300', 'border-slate-300', 'dark:border-slate-700');
        });

        event.currentTarget.classList.remove('bg-white', 'dark:bg-slate-800', 'text-slate-700', 'dark:text-slate-300', 'border-slate-300', 'dark:border-slate-700');
        event.currentTarget.classList.add('bg-emerald-800', 'text-white', 'border-emerald-800', 'shadow-md');

        cards.forEach(card => {
            if (category === 'all' || card.classList.contains(category)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    lucide.createIcons();
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        const navbar = document.getElementById('navbar');
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        const floatingClasses = ['w-[92%]', 'max-w-5xl', 'mt-5', 'rounded-full', 'border', 'shadow-xl'];
        const stickyClasses = ['w-full', 'max-w-full', 'mt-0', 'rounded-none', 'border-b', 'shadow-md'];

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex');
            });
        }

        function applyNavbarStyle(toSticky) {
            if (!navbar) return;
            if (toSticky) {
                navbar.classList.remove(...floatingClasses);
                navbar.classList.add(...stickyClasses);
            } else {
                navbar.classList.remove(...stickyClasses);
                navbar.classList.add(...floatingClasses);
            }
        }

        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentScroll = window.scrollY;

            if (mobileMenu && !mobileMenu.classList.contains('hidden') && Math.abs(currentScroll - lastScrollY) > 20) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
            }

            if (currentScroll <= 10) {
                applyNavbarStyle(false);
            } else if (currentScroll > lastScrollY) {
                applyNavbarStyle(true);
            } else {
                applyNavbarStyle(false);
            }

            lastScrollY = currentScroll <= 0 ? 0 : currentScroll;
        }, { passive: true });
    });
</script>

</body>
</html>