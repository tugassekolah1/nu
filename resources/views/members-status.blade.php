<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Pendaftaran Anggota — NU Banjaranyar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-main: #f4f7f4;
            --surface: #ffffff;
            --surface-soft: #f8faf8;
            --ink-primary: #0f291e;
            --ink-secondary: #4a5d53;
            --ink-muted: #809388;
            --line: #e1e8e2;

            --brand-green: #0d6838;
            --brand-green-light: #128c4c;
            --brand-gold: #d97706;
            --brand-danger: #dc2626;

            --shadow-sm: 0 2px 8px rgba(15, 41, 30, 0.04);
            --shadow-md: 0 12px 32px rgba(15, 41, 30, 0.08);
            --shadow-lg: 0 24px 48px -12px rgba(15, 41, 30, 0.12);

            --radius-lg: 24px;
            --radius-md: 16px;
            --radius-sm: 12px;
            --container: 1080px;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            font-family: "Plus Jakarta Sans", system-ui, -apple-system, sans-serif;
            color: var(--ink-primary);
            background: var(--bg-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
        }

        img { max-width: 100%; display: block; }
        a { color: inherit; text-decoration: none; }

        .container { width: min(var(--container), calc(100% - 32px)); margin: 0 auto; }

        /* Header / Banner */
        .page-header {
            background: linear-gradient(135deg, #093820 0%, #0f522c 50%, #153c28 100%);
            color: #fff;
            padding: 64px 0 100px;
            position: relative;
            overflow: hidden;
        }
        .page-header::after {
            content: "";
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 48px;
            background: var(--bg-main);
            clip-path: ellipse(60% 100% at 50% 100%);
        }
        .header-bg-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.08;
            background-image: radial-gradient(#fff 1px, transparent 1px);
            background-size: 24px 24px;
            pointer-events: none;
        }
        .page-header-inner { position: relative; z-index: 1; text-align: center; }

        .page-header .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #d1fae5;
            font-size: 13px;
            font-weight: 700;
            padding: 8px 18px;
            border-radius: 999px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }
        .page-header h1 {
            margin: 0;
            font-family: "Playfair Display", Georgia, serif;
            font-size: clamp(32px, 5vw, 48px);
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: -0.01em;
        }
        .page-header p {
            margin: 16px auto 0;
            color: rgba(255, 255, 255, 0.85);
            font-size: 16px;
            line-height: 1.6;
            max-width: 600px;
        }

        /* Konten */
        main { flex: 1; position: relative; z-index: 3; padding-bottom: 80px; }

        .search-card {
            background: var(--surface);
            border: 1px solid rgba(15, 41, 30, 0.06);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            padding: 40px;
            max-width: 760px;
            margin: -48px auto 0;
            position: relative;
            z-index: 5;
        }

        .search-card h2 {
            margin: 0 0 6px;
            font-size: 20px;
            font-weight: 800;
        }
        .search-card .hint {
            margin: 0 0 24px;
            font-size: 14px;
            color: var(--ink-secondary);
            line-height: 1.6;
        }

        .search-form { display: flex; gap: 12px; }
        .search-form input {
            flex: 1;
            width: 100%;
            padding: 15px 18px;
            border: 1.5px solid var(--line);
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 15px;
            color: var(--ink-primary);
            background: var(--surface-soft);
            outline: none;
            transition: all 200ms ease;
        }
        .search-form input:focus {
            border-color: var(--brand-green);
            box-shadow: 0 0 0 4px rgba(13, 104, 56, 0.12);
            background: #fff;
        }
        .search-form input::placeholder { color: var(--ink-muted); }

        .btn {
            padding: 15px 30px;
            border-radius: 999px;
            font-family: inherit;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            border: none;
            transition: all 200ms cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn:active { transform: translateY(0); }
        .btn-primary {
            background: linear-gradient(135deg, var(--brand-green) 0%, var(--brand-green-light) 100%);
            color: #fff;
            box-shadow: 0 8px 20px rgba(13, 104, 56, 0.25);
        }
        .btn-outline {
            background: var(--surface-soft);
            color: var(--brand-green);
            border: 1.5px solid var(--line);
        }
        .btn-outline:hover { background: #e8eee9; }

        /* Hasil Status */
        .result-card {
            background: var(--surface);
            border: 1px solid rgba(15, 41, 30, 0.06);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 40px;
            max-width: 760px;
            margin: 28px auto 0;
        }

        .result-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            padding-bottom: 20px;
            margin-bottom: 24px;
            border-bottom: 1px dashed var(--line);
        }
        .result-head .name { font-size: 22px; font-weight: 800; margin: 0; }
        .result-head .nik { font-size: 13px; color: var(--ink-muted); margin: 4px 0 0; font-weight: 600; }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.02em;
        }
        .status-pill::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: currentColor;
        }
        .status-active { background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0; }
        .status-pending { background: #fffbeb; color: #b45309; border: 1px solid #fde68a; }
        .status-none { background: #fef2f2; color: #b91c1c; border: 1px solid #fecaca; }

        /* Timeline Progres */
        .timeline { list-style: none; margin: 0 0 28px; padding: 0; }
        .timeline li {
            position: relative;
            padding: 0 0 24px 44px;
        }
        .timeline li:last-child { padding-bottom: 0; }
        .timeline li::before {
            content: "";
            position: absolute;
            left: 13px;
            top: 28px;
            bottom: 0;
            width: 2px;
            background: var(--line);
        }
        .timeline li:last-child::before { display: none; }

        .step-dot {
            position: absolute;
            left: 0;
            top: 0;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--surface-soft);
            border: 2px solid var(--line);
            color: var(--ink-muted);
            font-size: 13px;
            font-weight: 800;
        }
        .timeline li.done .step-dot { background: var(--brand-green); border-color: var(--brand-green); color: #fff; }
        .timeline li.done::before { background: var(--brand-green); }
        .timeline li.active-step .step-dot {
            background: #fffbeb;
            border-color: var(--brand-gold);
            color: var(--brand-gold);
            animation: pulse 1.6s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(217, 119, 6, 0.35); }
            50% { box-shadow: 0 0 0 8px rgba(217, 119, 6, 0); }
        }

        .step-title { font-size: 15px; font-weight: 800; margin: 2px 0 3px; }
        .step-desc { font-size: 13.5px; color: var(--ink-secondary); margin: 0; line-height: 1.55; }

        /* Detail Data */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px 24px;
            background: var(--surface-soft);
            border: 1px solid var(--line);
            border-radius: var(--radius-md);
            padding: 24px;
        }
        .detail-item .label {
            font-size: 11.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--ink-muted);
            margin-bottom: 4px;
        }
        .detail-item .value {
            font-size: 15px;
            font-weight: 700;
            color: var(--ink-primary);
            word-break: break-word;
        }
        .detail-item .value.mono { font-family: ui-monospace, SFMono-Regular, Menlo, monospace; }

        .result-actions {
            display: flex;
            gap: 14px;
            margin-top: 26px;
            padding-top: 22px;
            border-top: 1px solid var(--line);
        }
        .result-actions .btn { flex: 1; }

        .note {
            margin-top: 18px;
            font-size: 13px;
            color: var(--ink-muted);
            line-height: 1.6;
            text-align: center;
        }

        .empty-state {
            text-align: center;
            padding: 12px 0 4px;
        }
        .empty-state .icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            background: #fef2f2;
            color: var(--brand-danger);
        }
        .empty-state h3 { margin: 0 0 8px; font-size: 18px; font-weight: 800; }
        .empty-state p { margin: 0; font-size: 14.5px; color: var(--ink-secondary); line-height: 1.6; }

        /* CTA pendaftaran */
        .alt-cta {
            max-width: 760px;
            margin: 20px auto 0;
            text-align: center;
            font-size: 14px;
            color: var(--ink-secondary);
        }
        .alt-cta a { color: var(--brand-green); font-weight: 700; text-decoration: underline; }

        /* Footer */
        footer {
            margin-top: auto;
            background: #09140e;
            color: #94a39a;
            padding: 24px 0;
            font-size: 13.5px;
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        .footer-inner { display: flex; align-items: center; justify-content: space-between; gap: 16px; }

        @media (max-width: 860px) {
            .search-card, .result-card { padding: 28px 22px; }
            .detail-grid { grid-template-columns: 1fr; }
            .footer-inner { flex-direction: column; align-items: center; text-align: center; gap: 8px; }
        }
        @media (max-width: 640px) {
            .page-header { padding: 40px 0 80px; }
            .search-form { flex-direction: column; }
            .search-form .btn { width: 100%; }
            .result-actions { flex-direction: column; }
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar></x-navbar>

    <header class="page-header">
        <div class="header-bg-pattern"></div>
        <div class="container page-header-inner">
            <span class="badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                Tracking KARTANU
            </span>
            <h1>Cek Status Pendaftaran</h1>
            <p>Masukkan 16 digit NIK yang Anda gunakan saat mendaftar untuk melihat progres pendaftaran, verifikasi pembayaran, dan status kartu anggota.</p>
        </div>
    </header>

    <main>
        <!-- Form Pencarian -->
        <div class="container">
            <div class="search-card">
                <h2>Cari Data Pendaftaran</h2>
                <p class="hint">Status diperbarui secara otomatis oleh sistem setiap kali ada perubahan oleh admin.</p>
                <form class="search-form" action="{{ route('members.status-check') }}" method="GET">
                    <input type="text" name="nik" value="{{ request('nik') }}" placeholder="Masukkan 16 digit NIK"
                           maxlength="16" inputmode="numeric" autocomplete="off" required
                           oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    <button type="submit" class="btn btn-primary">Cek Status</button>
                </form>
            </div>

            @if (request()->has('nik'))
                <div class="result-card">
                    @if ($member)
                        @php
                            $isPaid    = $member->payment_status === 'paid';
                            $isActive  = $member->status === 'active';
                            $hasProof  = $payment && $payment->payment_proof;
                            $proofDone = $isPaid || $hasProof;
                        @endphp

                        <div class="result-head">
                            <div>
                                <p class="name">{{ $member->full_name }}</p>
                                <p class="nik">NIK: {{ $member->nik }}</p>
                            </div>
                            @if ($isActive)
                                <span class="status-pill status-active">Anggota Aktif</span>
                            @elseif ($proofDone)
                                <span class="status-pill status-pending">Menunggu Verifikasi</span>
                            @else
                                <span class="status-pill status-pending">Menunggu Pembayaran</span>
                            @endif
                        </div>

                        <!-- Timeline Progres Pendaftaran -->
                        <ul class="timeline">
                            <li class="done">
                                <span class="step-dot">✓</span>
                                <p class="step-title">1. Pendaftaran Diterima</p>
                                <p class="step-desc">
                                    Data Anda telah masuk ke sistem pada
                                    {{ $member->created_at?->translatedFormat('d F Y') ?? '-' }} pukul
                                    {{ $member->created_at?->format('H:i') }} WIB.
                                </p>
                            </li>

                            <li class="{{ $isPaid ? 'done' : ($proofDone ? 'active-step' : '') }}">
                                <span class="step-dot">{{ $isPaid ? '✓' : '2' }}</span>
                                <p class="step-title">2. Pembayaran Pendaftaran</p>
                                <p class="step-desc">
                                    @if ($isPaid)
                                        Pembayaran telah dikonfirmasi oleh admin. Terima kasih atas khidmat Anda.
                                    @elseif ($proofDone)
                                        Bukti transfer sudah diterima dan sedang menunggu verifikasi admin.
                                    @else
                                        Pembayaran belum dilakukan. Silakan segera lakukan pembayaran agar keanggotaan dapat diaktifkan.
                                    @endif
                                </p>
                            </li>

                            <li class="{{ $isPaid && $member->member_card_no ? 'done' : '' }}">
                                <span class="step-dot">{{ $isPaid && $member->member_card_no ? '✓' : '3' }}</span>
                                <p class="step-title">3. Kartu Tanda Anggota</p>
                                <p class="step-desc">
                                    @if ($isPaid && $member->member_card_no)
                                        Kartu Anda aktif dengan nomor registrasi <strong>{{ $member->member_card_no }}</strong>.
                                    @else
                                        Nomor kartu akan diterbitkan setelah pembayaran dikonfirmasi admin.
                                    @endif
                                </p>
                            </li>
                        </ul>

                        <!-- Detail Data -->
                        <div class="detail-grid">
                            <div class="detail-item">
                                <div class="label">Nama Lengkap</div>
                                <div class="value">{{ $member->full_name }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="label">No. WhatsApp</div>
                                <div class="value">{{ $member->phone }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="label">Status Keanggotaan</div>
                                <div class="value">{{ $isActive ? 'Aktif' : 'Belum Aktif (Menunggu Pembayaran)' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="label">Status Pembayaran</div>
                                <div class="value">{{ $isPaid ? 'Lunas' : ($proofDone ? 'Bukti Diterima — Menunggu Verifikasi' : 'Belum Bayar') }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="label">Nomor Registrasi Kartu</div>
                                <div class="value mono">{{ $member->member_card_no ?? '—' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="label">Kode Transaksi</div>
                                <div class="value mono">{{ $payment->transaction_code ?? '—' }}</div>
                            </div>
                        </div>

                        <!-- Aksi -->
                        <div class="result-actions">
                            @if (! $isPaid)
                                <a class="btn btn-primary" href="{{ route('members.payment-page', $member) }}">
                                    {{ $proofDone ? 'Lihat Detail Pembayaran' : 'Lanjutkan Pembayaran' }}
                                </a>
                                <a class="btn btn-outline" href="{{ route('members.register-form') }}">Daftar Ulang</a>
                            @else
                                <a class="btn btn-primary" href="{{ route('members.search', ['nik' => $member->nik]) }}">
                                    Lihat & Cetak Kartu
                                </a>
                                <a class="btn btn-outline" href="{{ route('landing') }}">Kembali ke Beranda</a>
                            @endif
                        </div>

                        <p class="note">
                            Ada perubahan data yang belum sesuai? Hubungi pengurus melalui WhatsApp untuk penyesuaian.
                        </p>
                    @else
                        <!-- NIK Tidak Ditemukan -->
                        <div class="empty-state">
                            <div class="icon">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            </div>
                            <h3>Data Pendaftaran Tidak Ditemukan</h3>
                            <p>
                                NIK <strong>{{ request('nik') }}</strong> belum terdaftar dalam sistem.<br>
                                Pastikan NIK yang dimasukkan sudah benar, atau daftar sebagai anggota terlebih dahulu.
                            </p>
                        </div>

                        <div class="result-actions">
                            <a class="btn btn-primary" href="{{ route('members.register-form') }}">Daftar Anggota Sekarang</a>
                            <a class="btn btn-outline" href="{{ route('members.search') }}">Cek Kartu Anggota</a>
                        </div>
                    @endif
                </div>
            @endif

            <p class="alt-cta">
                Sudah mendaftar tapi lupa NIK-nya? Hubungi admin, atau kunjungi
                <a href="{{ route('members.search') }}">halaman cek kartu anggota</a>.
            </p>
        </div>
    </main>

    <footer>
        <div class="container footer-inner">
            <span>Copyright © {{ now()->year }} NU Ranting Banjaranyar. All rights reserved.</span>
            <span>Kontak Admin: <strong>nubanjaranyar@gmail.com</strong></span>
        </div>
    </footer>
</body>
</html>
