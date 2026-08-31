<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NU Banjaranyar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
   @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
</head>
<body>

   <!-- Wrapper Navbar -->
<header class="fixed top-0 left-0 w-full z-50 flex justify-center transition-all duration-300">
<nav id="navbar" class="w-[90%] max-w-5xl mt-6 px-6 py-3 flex items-center justify-between rounded-full bg-emerald-950/10 backdrop-blur-md border border-emerald-800/30 shadow-xl shadow-emerald-950/10 transition-all duration-300">    
    <!-- Logo -->
    <div class="text-xl font-bold tracking-tight text-white">
      NU<span class="text-lime-400">.</span>
    </div>

    <!-- Links Desktop -->
    <ul class="hidden md:flex text-white items-center gap-8 text-sm font-medium text-slate-400">
      <li><a href="#home" class="hover:text-lime-400 transition-colors">Home</a></li>
      <li><a href="#warta" class="hover:text-lime-400 transition-colors">Warta</a></li>
      <li><a href="#agenda" class="hover:text-lime-400 transition-colors">Agenda</a></li>
      <li><a href="#pengurus" class="hover:text-lime-400 transition-colors">Pengurus</a></li>
    </ul>

    <!-- CTA Button Desktop -->
    <a href="#get-started" class="hidden md:inline-block bg-lime-400 hover:bg-lime-300 text-slate-950 font-semibold text-sm px-5 py-2 rounded-full transition-all shadow-lg shadow-lime-400/20">
      Get Started
    </a>

    <!-- Tombol Hamburger Mobile -->
    <button id="menu-btn" class="md:hidden text-white focus:outline-none p-1">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

    <!-- Dropdown Menu Mobile -->
    <div id="mobile-menu" class="hidden text-white text-3xl absolute top-full left-0 right-0 mt-3 p-2 bg-emerald-950/10 backdrop-blur-md border border-emerald-800/30 shadow-xl shadow-emerald-950/10 rounded-2xl border  shadow-2xl flex-col gap-4 text-center md:hidden">
      <a href="#" class="text-slate-300 font-medium hover:text-lime-400 py-1">Home</a>
      <a href="#warta" class="text-slate-300 font-medium hover:text-lime-400 py-1">Warta</a>
      <a href="#agenda" class="text-slate-300 font-medium hover:text-lime-400 py-1">Agenda</a>
      <a href="#pengurus" class="text-slate-300 font-medium hover:text-lime-400 py-1">Pengurus</a>
      <a href="#get-started" class="bg-lime-400 hover:bg-lime-300 text-slate-950 font-semibold text-sm px-5 py-2.5 rounded-full mt-2 inline-block">
        Get Started
      </a>
    </div>

  </nav>
</header>
 
    <header class="hero">
        <div class="container hero-inner">
            <h1 class="hero-title">Nahdlatul Ulama<br>Ranting Banjaranyar</h1>
            <p class="hero-subtitle">Menjaga tradisi Ahlussunnah wal Jama'ah, mempererat ukhuwah, dan melayani umat melalui dakwah, pendidikan, dan pemberdayaan masyarakat.</p>

            <div class="hero-cta">
                <a href="#warta" class="hero-btn primary">
                    <i data-lucide="newspaper" style="width:18px;height:18px;"></i>
                    Lihat Berita
                </a>
                <a href="#agenda" class="hero-btn secondary">
                    <i data-lucide="calendar-days" style="width:18px;height:18px;"></i>
                    Acara Mendatang
                </a>
                <a href="{{ route('members.register-form') }}" class="hero-btn secondary">
                    <i data-lucide="user-plus" style="width:18px;height:18px;"></i>
                    Daftar Anggota
                </a>
            </div>
        </div>
    </header>

    <main>
        <section class="section">
            <div class="container">
                <h2 class="section-title">Layanan &amp; Informasi</h2>
                <div class="menu-grid">
                    <a href="{{ route('members.register-form') }}" class="menu-card">
                        <div class="icon-wrap"><i data-lucide="user-plus"></i></div>
                        <span>Daftar Anggota</span>
                    </a>
                    <a href="#warta" class="menu-card">
                        <div class="icon-wrap"><i data-lucide="newspaper"></i></div>
                        <span>Warta Berita</span>
                    </a>
                    <a href="#pengurus" class="menu-card">
                        <div class="icon-wrap"><i data-lucide="users"></i></div>
                        <span>Struktur Pengurus</span>
                    </a>
                    <a href="#agenda" class="menu-card">
                        <div class="icon-wrap"><i data-lucide="calendar-days"></i></div>
                        <span>Agenda Kegiatan</span>
                    </a>
                    <a href="#" class="menu-card">
                        <div class="icon-wrap"><i data-lucide="hand-coins"></i></div>
                        <span>Donasi / Infaq</span>
                    </a>
                    <a href="#" class="menu-card">
                        <div class="icon-wrap"><i data-lucide="images"></i></div>
                        <span>Galeri Kegiatan</span>
                    </a>
                    <a href="#" class="menu-card">
                        <div class="icon-wrap"><i data-lucide="book-open"></i></div>
                        <span>Profil Organisasi</span>
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="menu-card">
                        <div class="icon-wrap"><i data-lucide="phone"></i></div>
                        <span>Kontak Kami</span>
                    </a>
                </div>
            </div>
        </section>

        <section class="section" id="warta">
            <div class="container">
                <h2 class="section-title">Warta Terbaru</h2>
                <div class="news-row">
                    @forelse ($newsList as $berita)
                        <article class="news-card">
                            <a href="{{ route('berita.show', $berita->slug) }}">
                                <div class="news-visual"
                                     @if ($berita->gambar)
                                         style="background-image: linear-gradient(rgba(16,42,32,0.35), rgba(16,42,32,0.8)), url('{{ Storage::url($berita->gambar) }}'); background-size: cover; background-position: center;"
                                     @endif
                                >
                                    <div class="news-kicker">Warta NU</div>
                                    <h3>{{ $berita->judul }}</h3>
                                    <div class="news-meta">
                                        {{ $berita->user->name ?? 'Admin' }} • {{ $berita->created_at->translatedFormat('d M Y') }}
                                    </div>
                                </div>
                                <div class="news-footer">Baca selengkapnya</div>
                            </a>
                        </article>
                    @empty
                        <p style="color: var(--ink-soft);">Belum ada berita yang diterbitkan.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="section" id="agenda">
            <div class="container content-grid">
                <div>
                    <h2 class="section-title">Sambutan Pengurus</h2>
                    <div class="text-panel">
                        <p>Selamat datang di website resmi NU Ranting Banjaranyar. Kami berkomitmen untuk terus mempererat silaturahmi antar warga Nahdliyin, menyebarkan dakwah Ahlussunnah wal Jama'ah, serta memberikan pelayanan terbaik bagi seluruh anggota dan masyarakat sekitar.</p>
                    </div>

                    <div id="pengurus" class="people-grid" style="margin-top: 20px;">
                        <article class="people-card">
                            <div class="people-photo"></div>
                            <div class="copy">
                                <h4>Ketua Ranting</h4>
                                <p>Memimpin jalannya organisasi dan mengoordinasikan seluruh program kerja ranting.</p>
                            </div>
                        </article>
                        <article class="people-card">
                            <div class="people-photo"></div>
                            <div class="copy">
                                <h4>Sekretaris</h4>
                                <p>Mengelola administrasi, surat-menyurat, dan dokumentasi kegiatan organisasi.</p>
                            </div>
                        </article>
                        <article class="people-card">
                            <div class="people-photo"></div>
                            <div class="copy">
                                <h4>Bendahara</h4>
                                <p>Mengelola keuangan organisasi termasuk infaq, donasi, dan iuran keanggotaan.</p>
                            </div>
                        </article>
                    </div>
                </div>

                <aside>
                    <h2 class="section-title">Agenda Kegiatan</h2>
                    <div class="calendar-card">
                        <div class="calendar-top">
                            <i data-lucide="arrow-left" style="width: 18px; height: 18px;"></i>
                            <span>{{ now()->translatedFormat('F Y') }}</span>
                            <i data-lucide="arrow-right" style="width: 18px; height: 18px;"></i>
                        </div>
                        <div class="calendar-days">
                            <span>M</span><span>S</span><span>S</span><span>R</span><span>K</span><span>J</span><span>S</span>
                        </div>
                        <div class="calendar-dates">
                            @for ($i = 1; $i <= 30; $i++)
                                <span class="{{ $i === (int) now()->format('j') ? 'active' : 'soft' }}">{{ $i }}</span>
                            @endfor
                        </div>
                    </div>

                    <div class="event-card">
                        <div class="label">Rutin</div>
                        <strong>Pengajian Mingguan</strong>
                        <span class="time">Setiap Kamis, 19:30 WIB • Masjid Ranting</span>
                        <span class="event-badge">Pengajian</span>
                    </div>

                    <div class="agenda-card" style="margin-top: 16px;">
                        <div class="agenda-list">
                            <div class="agenda-item">
                                <div class="agenda-avatar"></div>
                                <div>
                                    <strong>Rapat Koordinasi Pengurus</strong>
                                    <span>Setiap Awal Bulan</span>
                                </div>
                            </div>
                            <div class="agenda-item">
                                <div class="agenda-avatar"></div>
                                <div>
                                    <strong>Ziarah &amp; Tahlil Rutin</strong>
                                    <span>Setiap Malam Jumat Legi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

        <div class="contact-strip">
            <div class="container">
                <h3>Ada Pertanyaan?</h3>
                <p>Hubungi pengurus kami langsung untuk info pendaftaran atau kegiatan.</p>
                <a href="https://wa.me/6281234567890" target="_blank" class="contact-btn">
                    <i data-lucide="message-circle" style="width:18px;height:18px;"></i>
                    Chat via WhatsApp
                </a>
            </div>
        </div>
    </main>

    <footer>
        <div class="container footer-inner">
            <span>Copyright © {{ now()->year }} NU Ranting Banjaranyar</span>
            <span>Kontak: nubanjaranyar@gmail.com</span>
        </div>
    </footer>

   <script src="https://unpkg.com/lucide@0.469.0/dist/umd/lucide.min.js"></script>
<script>
    lucide.createIcons();
</script>
<script>
    (function () {
        const nav = document.getElementById('mainNav');
        let lastScroll = 0;
        let ticking = false;

        function handleScroll() {
            const current = window.scrollY;

            // Kasih shadow lebih tegas begitu mulai scroll
            nav.classList.toggle('nav-scrolled', current > 20);

            // Scroll ke bawah & sudah lewat 120px -> sembunyikan navbar ke atas
            // Scroll ke atas -> tampilkan lagi
            if (current > lastScroll && current > 120) {
                nav.classList.add('nav-hidden');
            } else {
                nav.classList.remove('nav-hidden');
            }

            lastScroll = current <= 0 ? 0 : current;
            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(handleScroll);
                ticking = true;
            }
        });
    })();
    document.addEventListener('DOMContentLoaded', () => {
      const navbar = document.getElementById('navbar');
      const menuBtn = document.getElementById('menu-btn');
      const mobileMenu = document.getElementById('mobile-menu');

      // 1. Toggle Menu Mobile
      menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('flex');
      });

      // 2. Logic Floating -> Sticky saat Scroll Direction
      const floatingClasses = ['w-[90%]', 'max-w-5xl', 'mt-6', 'rounded-full', 'border', 'shadow-lg'];
      const stickyClasses = ['w-full', 'max-w-full', 'mt-0', 'rounded-none', 'border-b', 'shadow-sm'];

      let lastScrollY = window.scrollY;

      window.addEventListener('scroll', () => {
        const currentScroll = window.scrollY;

        // Tutup menu mobile jika di-scroll
        if (!mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
          mobileMenu.classList.remove('flex');
        }

        if (currentScroll <= 0) {
          navbar.classList.remove(...stickyClasses);
          navbar.classList.add(...floatingClasses);
          lastScrollY = currentScroll;
          return;
        }

        if (currentScroll > lastScrollY) {
          // Scroll Ke Bawah -> Sticky
          navbar.classList.remove(...floatingClasses);
          navbar.classList.add(...stickyClasses);
        } else {
          // Scroll Ke Atas -> Floating
          navbar.classList.remove(...stickyClasses);
          navbar.classList.add(...floatingClasses);
        }

        lastScrollY = currentScroll;
      });
    });
</script>
</body>
</html>