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
        .container { width: min(var(--container), calc(100% - 32px)); margin: 0 auto; }

        /* NAV */
        .nav { background: #fff; border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 20; }
        .nav-inner { min-height: 76px; display: flex; align-items: center; justify-content: space-between; gap: 16px; }
        .brand { display: flex; align-items: center; gap: 12px; font-weight: 800; }
        .brand-mark {
            width: 44px; height: 44px; border-radius: 14px;
            background: linear-gradient(135deg, #183c2f 0%, #82be46 100%);
            display: grid; place-items: center; color: white; box-shadow: var(--shadow); font-size: 17px;
        }
        .brand-name { font-size: 20px; line-height: 1.15; }
        .brand-name small { display: block; font-size: 12px; font-weight: 600; color: var(--ink-soft); }
        .nav-actions { display: flex; align-items: center; gap: 10px; }
        .btn-wa {
            display: inline-flex; align-items: center; gap: 6px; background: #25D366; color: #fff !important;
            padding: 10px 16px; border-radius: 999px; font-weight: 700; font-size: 14px;
        }
        .btn-daftar-nav {
            background: var(--brand-dark); color: #fff !important; padding: 10px 18px;
            border-radius: 999px; font-weight: 700; font-size: 14px;
        }

        /* HERO */
        .hero {
            position: relative; overflow: hidden;
            background: linear-gradient(120deg, #10291f 0%, #1c5133 55%, #2f6b45 100%);
            color: #fff;
        }
        .hero::before {
            content: ""; position: absolute; inset: 0;
            background: radial-gradient(circle at 18% 30%, rgba(151,214,90,0.28), transparent 24%),
                        radial-gradient(circle at 85% 24%, rgba(152,208,91,0.18), transparent 18%);
            pointer-events: none;
        }
        .hero-inner {
            position: relative; z-index: 1; min-height: 380px;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-align: center; gap: 22px; padding: 64px 0 56px;
        }
        .hero-title {
            margin: 0; font-family: "Baloo 2", cursive; font-size: clamp(32px, 5.5vw, 60px);
            line-height: 1.1; letter-spacing: -0.02em; text-shadow: 0 8px 18px rgba(0,0,0,0.15);
        }
        .hero-subtitle { margin: 0; max-width: 640px; color: rgba(255,255,255,0.9); font-size: 17px; line-height: 1.6; }

        .hero-cta { display: flex; flex-wrap: wrap; justify-content: center; gap: 14px; margin-top: 6px; }
        .hero-btn {
            display: inline-flex; align-items: center; gap: 8px; padding: 15px 26px;
            border-radius: 14px; font-weight: 700; font-size: 15px; transition: transform 160ms ease, box-shadow 160ms ease;
        }
        .hero-btn:hover { transform: translateY(-2px); }
        .hero-btn.primary { background: #8bc14b; color: #16372c; box-shadow: 0 14px 26px rgba(139,193,75,0.35); }
        .hero-btn.secondary { background: rgba(255,255,255,0.14); color: #fff; border: 1.5px solid rgba(255,255,255,0.3); }

        /* MENU / LAYANAN GRID (gabungan, sudah gak duplikat) */
        .section { padding: 46px 0 0; }
        .section-title { margin: 0 0 20px; font-size: clamp(26px, 3vw, 38px); line-height: 1.15; letter-spacing: -0.02em; font-weight: 800; color: var(--brand-dark); }

        .menu-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 16px; }
        .menu-card {
            background: var(--surface); border: 1px solid var(--line); border-radius: 18px;
            padding: 22px 16px; text-align: center; box-shadow: var(--shadow);
            transition: transform 160ms ease, border-color 160ms ease;
        }
        .menu-card:hover { transform: translateY(-3px); border-color: var(--brand-deep); }
        .menu-card .icon-wrap {
            width: 52px; height: 52px; margin: 0 auto 12px; border-radius: 14px;
            background: linear-gradient(180deg, #90ca47 0%, #7ebb3d 100%);
            display: grid; place-items: center; color: #fff;
        }
        .menu-card .icon-wrap i { width: 24px; height: 24px; }
        .menu-card span { display: block; font-weight: 700; font-size: 15px; color: var(--ink); }

        /* CONTENT GRID (agenda + berita) */
        .content-grid { display: grid; grid-template-columns: minmax(0, 1.6fr) minmax(300px, 1fr); gap: 32px; align-items: start; }

        .calendar-card, .event-card, .agenda-card { background: var(--surface); border: 1px solid var(--line); border-radius: 20px; box-shadow: var(--shadow); }
        .calendar-card { padding: 20px 20px 16px; }
        .calendar-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; color: #56675e; font-weight: 700; font-size: 15px; }
        .calendar-days, .calendar-dates { display: grid; grid-template-columns: repeat(7, 1fr); gap: 6px; text-align: center; }
        .calendar-days span { font-size: 12px; color: #8a988f; font-weight: 700; text-transform: uppercase; }
        .calendar-dates { margin-top: 10px; }
        .calendar-dates span { width: 34px; height: 34px; display: grid; place-items: center; margin: 0 auto; border-radius: 10px; font-size: 14px; color: #56675f; }
        .calendar-dates .active { background: var(--brand-dark); color: #fff; font-weight: 800; }
        .calendar-dates .soft { background: #dceabb; color: #45683f; }

        .event-card { margin-top: 16px; padding: 18px; }
        .event-card .label { font-size: 12px; color: #7f8c85; text-transform: uppercase; font-weight: 700; margin-bottom: 6px; }
        .event-card strong { display: block; font-size: 16px; color: var(--ink); margin-bottom: 4px; }
        .event-card span.time { color: #61736a; font-size: 14px; }
        .event-badge { display: inline-block; margin-top: 10px; padding: 6px 14px; border-radius: 999px; background: #8bc14b; color: #16372c; font-weight: 700; font-size: 13px; }

        /* NEWS */
        .news-row { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 20px; }
        .news-card { border-radius: 18px; overflow: hidden; background: var(--surface); box-shadow: var(--shadow); border: 1px solid var(--line); }
        .news-visual {
            aspect-ratio: 4 / 3; padding: 20px; color: #fff; display: flex; flex-direction: column;
            justify-content: flex-end; gap: 8px; position: relative; overflow: hidden;
        }
        .news-card:nth-child(3n+1) .news-visual { background: linear-gradient(145deg, #102a20, #213d2f 60%, #365946); }
        .news-card:nth-child(3n+2) .news-visual { background: linear-gradient(145deg, #294738, #375844 56%, #22372c); }
        .news-card:nth-child(3n+3) .news-visual { background: linear-gradient(145deg, #274134, #355648 56%, #4f6d50); }
        .news-kicker { font-size: 13px; font-weight: 700; color: rgba(255,255,255,0.85); }
        .news-visual h3 { margin: 0; font-family: Georgia, serif; font-size: clamp(19px, 2.2vw, 24px); line-height: 1.25; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .news-meta { font-size: 13px; color: rgba(255,255,255,0.85); }
        .news-footer { padding: 14px 18px; background: #8bc14b; color: #16372c; font-weight: 700; font-size: 14px; }

        /* SAMBUTAN + PENGURUS */
        .text-panel { background: var(--surface); border-radius: 18px; padding: 24px; border: 1px solid var(--line); box-shadow: var(--shadow); }
        .text-panel p { margin: 0; color: var(--ink-soft); line-height: 1.75; font-size: 15px; }

        .people-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; }
        .people-card { background: var(--surface); border-radius: 18px; overflow: hidden; border: 1px solid var(--line); box-shadow: var(--shadow); }
        .people-photo { aspect-ratio: 1.15 / 1; background: linear-gradient(135deg, #cad7cf 0%, #f0f4ef 100%); position: relative; }
        .people-photo::before { content: ""; position: absolute; inset: 14px 16px auto; height: 120px; border-radius: 16px; background: linear-gradient(135deg, #4d6c5d, #9cb995); }
        .people-card .copy { padding: 16px; }
        .people-card h4 { margin: 0 0 8px; font-size: 16px; }
        .people-card p { margin: 0; color: var(--ink-soft); font-size: 14px; line-height: 1.6; }

        .agenda-card { padding: 18px; }
        .agenda-list { display: grid; gap: 14px; }
        .agenda-item { display: grid; grid-template-columns: 46px 1fr; gap: 14px; align-items: center; }
        .agenda-avatar { width: 46px; height: 46px; border-radius: 14px; background: linear-gradient(135deg, #c8d5c9, #eff4ee); position: relative; }
        .agenda-avatar::before { content: ""; position: absolute; inset: 9px; border-radius: 999px; background: linear-gradient(180deg, #5f766a 0%, #d3ddd5 100%); }
        .agenda-item strong { display: block; font-size: 15px; }
        .agenda-item span { display: block; color: var(--ink-soft); font-size: 13px; margin-top: 3px; }

        /* KONTAK STRIP */
        .contact-strip {
            margin-top: 46px; background: var(--brand-dark); color: #fff; padding: 32px 0; text-align: center;
        }
        .contact-strip h3 { margin: 0 0 8px; font-size: 22px; font-family: "Baloo 2", cursive; }
        .contact-strip p { margin: 0 0 18px; color: rgba(255,255,255,0.85); font-size: 15px; }
        .contact-btn {
            display: inline-flex; align-items: center; gap: 8px; background: #25D366; color: #fff;
            padding: 13px 24px; border-radius: 999px; font-weight: 700; font-size: 15px;
        }

        footer { background: #101715; color: #d2d9d5; padding: 20px 0; font-size: 14px; }
        .footer-inner { display: flex; align-items: center; justify-content: space-between; gap: 14px; flex-wrap: wrap; }

        @media (max-width: 1100px) {
            .menu-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .content-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 860px) {
            .nav-inner, .footer-inner { flex-direction: column; align-items: flex-start; gap: 10px; }
            .people-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 640px) {
            .container { width: min(calc(100% - 24px), var(--container)); }
            .hero-inner { min-height: 320px; padding: 52px 0 40px; }
            .hero-btn { width: 100%; justify-content: center; }
            .hero-cta { flex-direction: column; width: 100%; }

            .menu-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
            .menu-card { padding: 16px 10px; }
            .menu-card span { font-size: 13px; }
            .menu-card .icon-wrap { width: 44px; height: 44px; }
            .menu-card .icon-wrap i { width: 20px; height: 20px; }

            .news-row, .people-grid { grid-template-columns: 1fr 1fr; gap: 12px; }
            .news-visual { aspect-ratio: 1 / 1; padding: 14px; }
            .news-visual h3 { font-size: 15px; -webkit-line-clamp: 3; }
            .news-kicker, .news-meta { font-size: 11px; }
            .news-footer { padding: 10px 14px; font-size: 12px; }

            .people-card .copy { padding: 12px; }
            .people-card h4 { font-size: 14px; }
            .people-card p { font-size: 12px; }
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

            <div class="nav-actions">
                <a href="https://wa.me/6281234567890" target="_blank" class="btn-wa">
                    <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
                    WhatsApp
                </a>
                <a href="{{ route('members.register-form') }}" class="btn-daftar-nav">Daftar Anggota</a>
            </div>
        </div>
    </nav>

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
</body>
</html>