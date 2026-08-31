<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NU Banjaranyar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #eef2ec;
            --surface: #ffffff;
            --surface-soft: #f7faf6;
            --ink: #17392d;
            --ink-soft: #54655d;
            --line: #d7e2d7;
            --brand: #86c244;
            --brand-deep: #356c49;
            --brand-dark: #214b35;
            --brand-ink: #ffffff;
            --shadow: 0 18px 45px rgba(23, 57, 45, 0.08);
            --radius-lg: 24px;
            --radius-md: 16px;
            --radius-sm: 12px;
            --container: 1180px;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; font-family: "Inter", system-ui, sans-serif; color: var(--ink); background: var(--bg); }
        img { max-width: 100%; display: block; }
        a { color: inherit; text-decoration: none; }

        .container { width: min(var(--container), calc(100% - 32px)); margin: 0 auto; }

        .topbar { background: #111; color: #d9e1dc; padding: 10px 0; font-size: 13px; }
        .topbar-inner, .nav-inner { display: flex; align-items: center; justify-content: space-between; gap: 16px; }

        .search-shell {
            display: flex; align-items: center; gap: 10px; width: min(420px, 100%);
            background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 999px; padding: 8px 14px;
        }
        .search-shell input, .search-main input { width: 100%; border: 0; outline: 0; background: transparent; font: inherit; }
        .search-shell input { color: #fff; }
        .search-shell input::placeholder { color: #bec8c2; }

        .nav { background: #fff; border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 20; }
        .nav-inner { min-height: 76px; }
        .brand { display: flex; align-items: center; gap: 14px; font-weight: 800; letter-spacing: -0.02em; }
        .brand-mark {
            width: 42px; height: 42px; border-radius: 14px;
            background: linear-gradient(135deg, #183c2f 0%, #82be46 100%);
            display: grid; place-items: center; color: white; box-shadow: var(--shadow);
            font-size: 18px;
        }
        .brand-name { font-size: 22px; line-height: 1.1; }
        .brand-name small { display: block; font-size: 11px; font-weight: 600; color: var(--ink-soft); letter-spacing: 0; }

        .nav-links { display: flex; align-items: center; gap: 28px; font-weight: 600; font-size: 14px; }
        .nav-links a { color: #1f2c26; transition: color 160ms ease; }
        .nav-links a:hover { color: var(--brand-deep); }
        .btn-daftar {
            background: var(--brand-dark); color: #fff !important; padding: 10px 18px;
            border-radius: 999px; font-weight: 700;
        }

        .hero {
            position: relative; overflow: hidden;
            background: linear-gradient(120deg, #10291f 0%, #1c5133 55%, #2f6b45 100%);
            color: #fff;
        }
        .hero::before {
            content: ""; position: absolute; inset: 0;
            background:
                radial-gradient(circle at 18% 30%, rgba(151, 214, 90, 0.28), transparent 24%),
                radial-gradient(circle at 85% 24%, rgba(152, 208, 91, 0.18), transparent 18%),
                radial-gradient(circle at 70% 78%, rgba(255, 255, 255, 0.1), transparent 22%);
            pointer-events: none;
        }
        .hero-inner {
            position: relative; z-index: 1; min-height: 360px;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-align: center; gap: 20px; padding: 64px 0 56px;
        }
        .hero-title {
            margin: 0; font-family: "Baloo 2", cursive; font-size: clamp(36px, 5.5vw, 68px);
            line-height: 1.05; letter-spacing: -0.02em; text-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }
        .hero-subtitle { margin: 0; max-width: 680px; color: rgba(255, 255, 255, 0.88); font-size: 16px; }

        .search-main {
            width: min(620px, 100%); display: flex; align-items: center; gap: 12px;
            background: rgba(255, 255, 255, 0.96); border-radius: 999px; padding: 16px 22px;
            box-shadow: 0 16px 32px rgba(11, 30, 21, 0.24);
        }
        .search-main input::placeholder { color: #8b9790; }
        .search-icon { color: #597267; flex: 0 0 auto; }

        .hero-tags { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; max-width: 900px; }
        .hero-tags span {
            padding: 9px 14px; border-radius: 999px; background: rgba(255, 255, 255, 0.16);
            border: 1px solid rgba(255, 255, 255, 0.16); backdrop-filter: blur(6px);
            font-size: 13px; font-weight: 600; color: rgba(255, 255, 255, 0.95);
        }

        .section { padding: 42px 0 0; }
        .actions { margin-top: -26px; position: relative; z-index: 3; }
        .actions-grid { display: grid; grid-template-columns: repeat(8, minmax(0, 1fr)); gap: 14px; }
        .action-card {
            background: linear-gradient(180deg, #90ca47 0%, #7ebb3d 100%); color: #fff;
            border-radius: 14px; padding: 16px 12px; text-align: center;
            box-shadow: 0 14px 24px rgba(75, 125, 34, 0.16);
            transition: transform 160ms ease, box-shadow 160ms ease;
        }
        .action-card:hover { transform: translateY(-2px); box-shadow: 0 18px 28px rgba(75, 125, 34, 0.22); }
        .action-card i { width: 24px; height: 24px; margin-bottom: 10px; }
        .action-card span { display: block; font-weight: 700; font-size: 13px; }

        .content-grid { display: grid; grid-template-columns: minmax(0, 1.65fr) minmax(320px, 0.95fr); gap: 36px; align-items: start; }
        .section-title {
            margin: 0 0 18px; font-size: clamp(28px, 3vw, 42px); line-height: 1.1;
            letter-spacing: -0.03em; font-weight: 800; color: var(--brand-dark);
        }

        .docs-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; }
        .doc-card {
            min-height: 88px; border-radius: 14px; color: #fff; padding: 18px;
            display: flex; flex-direction: column; justify-content: flex-end; gap: 10px;
            box-shadow: var(--shadow); transition: transform 160ms ease;
        }
        .doc-card:hover { transform: translateY(-2px); }
        .doc-card:nth-child(1), .doc-card:nth-child(5) { background: #294636; }
        .doc-card:nth-child(2), .doc-card:nth-child(6) { background: #477e58; }
        .doc-card:nth-child(3), .doc-card:nth-child(4) { background: #608f73; }
        .doc-card i { width: 18px; height: 18px; }
        .doc-card strong { font-size: 14px; }

        .calendar-card, .event-card, .birthday-card {
            background: var(--surface); border: 1px solid rgba(32, 77, 54, 0.08);
            border-radius: 20px; box-shadow: var(--shadow);
        }
        .calendar-card { padding: 20px 20px 16px; }
        .calendar-header, .calendar-days, .calendar-dates {
            display: grid; grid-template-columns: repeat(7, 1fr); gap: 8px; text-align: center;
        }
        .calendar-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; color: #5a695f; font-weight: 700; }
        .calendar-days span { font-size: 11px; color: #95a49a; font-weight: 700; text-transform: uppercase; }
        .calendar-dates { margin-top: 10px; }
        .calendar-dates span {
            width: 36px; height: 36px; display: grid; place-items: center; margin: 0 auto;
            border-radius: 10px; font-size: 13px; color: #56675f;
        }
        .calendar-dates .active { background: var(--brand-dark); color: #fff; font-weight: 800; }
        .calendar-dates .soft { background: #dceabb; color: #45683f; }

        .event-card { margin-top: 16px; padding: 16px 18px; display: grid; grid-template-columns: auto 1fr auto; gap: 14px; align-items: center; }
        .event-card small { display: block; color: #7f8c85; font-size: 11px; text-transform: uppercase; font-weight: 700; margin-bottom: 4px; }
        .event-card strong { display: block; color: var(--ink); font-size: 14px; }
        .event-card span { color: #61736a; font-size: 12px; }
        .event-badge { padding: 8px 12px; border-radius: 999px; background: #8bc14b; color: #fff; font-weight: 700; font-size: 12px; }

        .news-row, .people-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; }
        .news-card { border-radius: 18px; overflow: hidden; background: var(--surface); box-shadow: var(--shadow); border: 1px solid rgba(33, 75, 53, 0.06); }
        .news-visual {
            aspect-ratio: 1 / 1; padding: 20px; color: #fff; display: flex; flex-direction: column;
            justify-content: space-between; position: relative; overflow: hidden;
        }
        .news-visual::before, .news-visual::after { content: ""; position: absolute; border-radius: 50%; background: rgba(144, 202, 71, 0.25); }
        .news-visual::before { width: 180px; height: 180px; bottom: -90px; right: -30px; }
        .news-visual::after { width: 110px; height: 110px; top: -50px; left: -30px; }
        .news-card:nth-child(3n+1) .news-visual { background: linear-gradient(145deg, #102a20, #213d2f 60%, #365946); }
        .news-card:nth-child(3n+2) .news-visual { background: linear-gradient(145deg, #294738, #375844 56%, #22372c); }
        .news-card:nth-child(3n+3) .news-visual { background: linear-gradient(145deg, #274134, #355648 56%, #4f6d50); }
        .news-kicker { position: relative; z-index: 1; font-size: 12px; font-weight: 700; color: rgba(255, 255, 255, 0.82); }
        .news-visual h3 {
            position: relative; z-index: 1; margin: 0; font-family: Georgia, "Times New Roman", serif;
            font-size: clamp(20px, 2.4vw, 30px); line-height: 1.15; letter-spacing: -0.02em;
            display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
        }
        .news-meta { position: relative; z-index: 1; font-size: 12px; color: rgba(255, 255, 255, 0.82); }
        .news-footer { padding: 14px 18px; background: #8bc14b; color: #16372c; font-weight: 700; font-size: 13px; }

        .text-panel { background: var(--surface); border-radius: 18px; padding: 22px; border: 1px solid rgba(33, 75, 53, 0.08); box-shadow: var(--shadow); }
        .text-panel p { margin: 0; color: var(--ink-soft); line-height: 1.7; }

        .people-card { background: var(--surface); border-radius: 18px; overflow: hidden; border: 1px solid rgba(33, 75, 53, 0.08); box-shadow: var(--shadow); }
        .people-photo { aspect-ratio: 1.18 / 1; background: linear-gradient(135deg, #cad7cf 0%, #f0f4ef 100%); position: relative; overflow: hidden; }
        .people-photo::before {
            content: ""; position: absolute; inset: 14px 16px auto; height: 130px; border-radius: 16px;
            background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.32), transparent 32%), linear-gradient(135deg, #4d6c5d, #9cb995);
        }
        .people-card:nth-child(2) .people-photo::before { background: radial-gradient(circle at 40% 28%, rgba(255,255,255,0.28), transparent 28%), linear-gradient(135deg, #667f71, #b3c7bb); }
        .people-card:nth-child(3) .people-photo::before { background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.28), transparent 30%), linear-gradient(135deg, #5e7b6a, #94aa8d); }
        .people-card .copy { padding: 14px 16px 16px; }
        .people-card h4 { margin: 0 0 8px; font-size: 15px; line-height: 1.4; }
        .people-card p { margin: 0; color: var(--ink-soft); font-size: 13px; line-height: 1.65; }

        .list-card { padding: 18px; }
        .birthday-list { display: grid; gap: 14px; }
        .birthday-item { display: grid; grid-template-columns: 44px 1fr; gap: 12px; align-items: center; }
        .avatar { width: 44px; height: 44px; border-radius: 14px; background: linear-gradient(135deg, #c8d5c9, #eff4ee); position: relative; overflow: hidden; }
        .avatar::before { content: ""; position: absolute; inset: 8px; border-radius: 999px; background: linear-gradient(180deg, #5f766a 0%, #d3ddd5 100%); }
        .birthday-item strong { display: block; font-size: 14px; }
        .birthday-item span { display: block; color: var(--ink-soft); font-size: 12px; margin-top: 2px; }

        footer { margin-top: 46px; background: #101715; color: #d2d9d5; padding: 18px 0; font-size: 13px; }
        .footer-inner { display: flex; align-items: center; justify-content: space-between; gap: 14px; }

        @media (max-width: 1100px) {
            .actions-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); }
            .content-grid, .news-row { grid-template-columns: 1fr; }
        }
        @media (max-width: 860px) {
            .nav-inner, .topbar-inner, .footer-inner { flex-direction: column; align-items: flex-start; }
            .nav-links { flex-wrap: wrap; gap: 14px 18px; }
            .docs-grid, .people-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 640px) {
            .container { width: min(calc(100% - 24px), var(--container)); }
            .hero-inner { min-height: 320px; padding: 52px 0 40px; }
            .search-main { padding: 14px 16px; }
            .hero-tags { gap: 8px; }
            .hero-tags span { font-size: 12px; }
            .actions-grid, .docs-grid, .people-grid, .news-row { grid-template-columns: 1fr; }
            .calendar-dates span { width: 32px; height: 32px; font-size: 12px; }
        }
    </style>
</head>
<body>

    

    <nav class="nav">
        <div class="container nav-inner">
            <a href="{{ route('landing') }}" class="brand">
                <span class="brand-mark">NU</span>
                <span class="brand-name">
                    NU BANJARANYAR
                    <small>Nahdlatul Ulama</small>
                </span>
            </a>

            <div class="nav-links">
                <a href="{{ route('landing') }}">Beranda</a>
                <a href="#warta">Warta &amp; Berita</a>
                <a href="#pengurus">Struktur Pengurus</a>
                <a href="#agenda">Agenda Kegiatan</a>
                <a href="{{ route('members.register-form') }}" class="btn-daftar">Daftar Anggota</a>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container hero-inner">
            <h1 class="hero-title">Nahdlatul Ulama<br>Ranting Banjaranyar</h1>
            <p class="hero-subtitle">Menjaga tradisi Ahlussunnah wal Jama'ah, mempererat ukhuwah, dan melayani umat melalui dakwah, pendidikan, dan pemberdayaan masyarakat.</p>

            <div class="search-main">
                <i class="search-icon" data-lucide="search"></i>
                <input type="text" placeholder="Cari warta, kegiatan, atau informasi keanggotaan">
            </div>

            <div class="hero-tags">
                <span># Aswaja</span>
                <span># Pengajian Rutin</span>
                <span># Ke-NU-an</span>
                <span># Keanggotaan</span>
                <span># Kegiatan Sosial</span>
                <span># Ziswaf</span>
            </div>
        </div>
    </header>

    <section class="actions">
        <div class="container">
            <div class="actions-grid">
                <a href="{{ route('members.register-form') }}" class="action-card"><i data-lucide="user-plus"></i><span>Daftar Anggota</span></a>
                <a href="#warta" class="action-card"><i data-lucide="newspaper"></i><span>Warta Berita</span></a>
                <a href="#pengurus" class="action-card"><i data-lucide="users"></i><span>Struktur Pengurus</span></a>
                <a href="#agenda" class="action-card"><i data-lucide="calendar-days"></i><span>Agenda</span></a>
                <a href="#" class="action-card"><i data-lucide="hand-coins"></i><span>Donasi / Infaq</span></a>
                <a href="#" class="action-card"><i data-lucide="book-open"></i><span>Profil NU</span></a>
                <a href="#" class="action-card"><i data-lucide="hand-helping"></i><span>Layanan Umat</span></a>
                <a href="#" class="action-card"><i data-lucide="phone"></i><span>Kontak Kami</span></a>
            </div>
        </div>
    </section>

    <main class="section">
        <div class="container content-grid">
            <section>
                <h2 class="section-title">Layanan &amp; Informasi</h2>
                <div class="docs-grid">
                    <a href="{{ route('members.register-form') }}" class="doc-card"><i data-lucide="user-plus"></i><strong>Pendaftaran Anggota</strong></a>
                    <a href="#" class="doc-card"><i data-lucide="landmark"></i><strong>Profil Organisasi</strong></a>
                    <a href="#pengurus" class="doc-card"><i data-lucide="users-round"></i><strong>Struktur Kepengurusan</strong></a>
                    <a href="#agenda" class="doc-card"><i data-lucide="calendar-clock"></i><strong>Kegiatan Rutin</strong></a>
                    <a href="#" class="doc-card"><i data-lucide="hand-coins"></i><strong>Donasi &amp; Infaq</strong></a>
                    <a href="#" class="doc-card"><i data-lucide="images"></i><strong>Galeri Kegiatan</strong></a>
                    <a href="#warta" class="doc-card"><i data-lucide="newspaper"></i><strong>Publikasi Warta</strong></a>
                    <a href="#" class="doc-card"><i data-lucide="phone"></i><strong>Kontak Pengurus</strong></a>
                </div>
            </section>

            <aside id="agenda">
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
                    <div>
                        <small>Rutin</small>
                        <strong>Pengajian Mingguan</strong>
                    </div>
                    <div>
                        <strong>Setiap Kamis Malam</strong>
                        <span>19:30 - Selesai • Masjid Ranting</span>
                    </div>
                    <div class="event-badge">Pengajian</div>
                </div>
            </aside>
        </div>

        <div class="container section" id="warta">
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

        <div class="container section content-grid" id="pengurus">
            <section>
                <h2 class="section-title">Sambutan Pengurus</h2>
                <div class="text-panel">
                    <p>Selamat datang di website resmi NU Ranting Banjaranyar. Kami berkomitmen untuk terus mempererat silaturahmi antar warga Nahdliyin, menyebarkan dakwah Ahlussunnah wal Jama'ah, serta memberikan pelayanan terbaik bagi seluruh anggota dan masyarakat sekitar.</p>
                </div>

                <div class="people-grid" style="margin-top: 18px;">
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
            </section>

            <aside>
                <h2 class="section-title">Kegiatan Mendatang</h2>
                <div class="birthday-card list-card">
                    <div class="birthday-list">
                        <div class="birthday-item">
                            <div class="avatar"></div>
                            <div>
                                <strong>Pengajian Rutin Mingguan</strong>
                                <span>Setiap Kamis, 19:30 WIB</span>
                            </div>
                        </div>
                        <div class="birthday-item">
                            <div class="avatar"></div>
                            <div>
                                <strong>Rapat Koordinasi Pengurus</strong>
                                <span>Setiap Awal Bulan</span>
                            </div>
                        </div>
                        <div class="birthday-item">
                            <div class="avatar"></div>
                            <div>
                                <strong>Ziarah &amp; Tahlil Rutin</strong>
                                <span>Setiap Malam Jumat Legi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
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
</body>
</html>