<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Tanda Anggota</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --m3-primary: #006e3a;
            --m3-on-primary: #ffffff;
            --m3-surface-tint: rgba(255, 255, 255, 0.65);
            --glass-border: rgba(255, 255, 255, 0.6);
            --glass-shadow: 0 16px 32px 0 rgba(0, 40, 20, 0.12);
            --m3-easing-expressive: cubic-bezier(0.2, 0.0, 0, 1.0);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 50%, #a5d6a7 100%);
            min-height: 100vh;
            color: #1b1c1e;
        }

        /* Glassmorphism Surface Container */
        .glass-card {
            background: var(--m3-surface-tint);
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            box-shadow: var(--glass-shadow);
            transition: all 0.4s var(--m3-easing-expressive);
        }

        .form-control-m3 {
            border-radius: 14px;
            border: 1.5px solid rgba(0, 110, 58, 0.2);
            padding: 12px 20px;
            background: rgba(255, 255, 255, 0.85);
            transition: all 0.3s var(--m3-easing-expressive);
        }

        .form-control-m3:focus {
            background: #ffffff;
            border-color: var(--m3-primary);
            box-shadow: 0 0 0 4px rgba(0, 110, 58, 0.15);
            outline: none;
        }

        .btn-m3-primary {
            background-color: var(--m3-primary);
            color: var(--m3-on-primary);
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 600;
            border: none;
            transition: all 0.3s var(--m3-easing-expressive);
        }

        .btn-m3-primary:hover {
            background-color: #00522b;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 110, 58, 0.25);
            color: #ffffff;
        }

        /* Information Details List */
        .info-label {
            font-size: 0.825rem;
            color: #526350;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        .info-value {
            font-size: 1rem;
            color: #1b1c1e;
            font-weight: 700;
            margin-bottom: 12px;
        }

        /* Enhanced ID Card Screen Preview Layout */
        .card-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            perspective: 1000px;
        }

        /* Ukuran layar yang diperbesar agar mudah dibaca */
        .id-card {
            width: 420px;
            height: 260px;
            background: linear-gradient(135deg, #006e3a 0%, #004d28 100%);
            color: #ffffff;
            border-radius: 16px;
            padding: 18px 22px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.25), 
                        inset 0 1px 2px rgba(255, 255, 255, 0.4);
            position: relative;
            box-sizing: border-box;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.25);
            transition: transform 0.5s var(--m3-easing-expressive);
        }

        .id-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent 45%,
                rgba(255, 255, 255, 0.12) 50%,
                transparent 55%
            );
            transform: rotate(30deg);
            pointer-events: none;
        }

        .id-card:hover {
            transform: translateY(-6px) rotateX(4deg) rotateY(2deg);
        }

        .id-card .header {
            text-align: center;
            border-bottom: 1.5px solid rgba(255, 255, 255, 0.3);
            padding-bottom: 8px;
            margin-bottom: 14px;
        }

        .id-card .header h6 {
            margin: 0;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .id-card .content {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .id-card .photo {
            width: 90px;
            height: 115px;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            flex-shrink: 0;
        }

        .id-card .photo-placeholder {
            width: 90px;
            height: 115px;
            border: 2px solid rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 11px;
            font-weight: 600;
            text-align: center;
            flex-shrink: 0;
        }

        .id-card .details {
            font-size: 12px;
            flex-grow: 1;
            line-height: 1.5;
        }

        .id-card .details p {
            margin: 3px 0;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.95);
        }

        .id-card .details strong {
            font-weight: 700;
            color: #ffffff;
            display: inline-block;
            width: 65px;
        }

        .id-card .qr-code {
            background: #ffffff;
            padding: 5px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .id-card .qr-code svg, .id-card .qr-code img {
            width: 50px !important;
            height: 50px !important;
        }

        .id-card .footer {
            position: absolute;
            bottom: 12px;
            left: 22px;
            right: 22px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .animate-fade-up {
            animation: fadeUp 0.5s var(--m3-easing-expressive) forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* -------------------------------------------------------------
           CSS Khusus Cetak (@media print)
           Ukuran disesuaikan otomatis ke standar ISO CR80 (85.6mm x 53.98mm)
        ------------------------------------------------------------- */
        @media print {
            .no-print, nav, footer, .btn, form, .alert, h4, p.text-muted {
                display: none !important;
            }

            body {
                background: none !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .container {
                width: 100% !important;
                max-width: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .card-container {
                margin: 0 !important;
                padding: 0 !important;
                perspective: none !important;
            }

            .id-card {
                width: 85.6mm !important;
                height: 53.98mm !important;
                padding: 8px 12px !important;
                border-radius: 10px !important;
                box-shadow: none !important;
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                transform: none !important;
                background: linear-gradient(135deg, #006633 0%, #004d26 100%) !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .id-card::before {
                display: none !important;
            }

            .id-card .header {
                padding-bottom: 2px !important;
                margin-bottom: 6px !important;
            }

            .id-card .header h6 {
                font-size: 10px !important;
                letter-spacing: 1px !important;
            }

            .id-card .content {
                gap: 10px !important;
            }

            .id-card .photo, .id-card .photo-placeholder {
                width: 48px !important;
                height: 62px !important;
            }

            .id-card .details {
                font-size: 8.5px !important;
                line-height: 1.3 !important;
            }

            .id-card .details strong {
                width: 45px !important;
            }

            .id-card .qr-code {
                padding: 2px !important;
            }

            .id-card .qr-code svg, .id-card .qr-code img {
                width: 34px !important;
                height: 34px !important;
            }

            .id-card .footer {
                bottom: 6px !important;
                left: 12px !important;
                right: 12px !important;
            }

            @page {
                size: 85.6mm 53.98mm;
                margin: 0;
            }
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <!-- Form Pencarian -->
            <div class="glass-card p-4 mb-4 no-print animate-fade-up">
                <h4 class="text-center mb-4 fw-bold" style="color: var(--m3-primary);">Pencarian Kartu Anggota</h4>
                <form action="{{ route('members.search') }}" method="GET">
                    <div class="d-flex gap-2">
                        <input type="text" name="nik" class="form-control form-control-m3" placeholder="Masukkan 16 Digit NIK" value="{{ request('nik') }}" maxlength="16" required>
                        <button type="submit" class="btn-m3-primary text-nowrap">Cari Data</button>
                    </div>
                </form>
            </div>

            <!-- Hasil Pencarian -->
            @if(request()->has('nik'))
                @if($member)
                    @if($member->payment_status === 'paid')
                        
                        <!-- Informasi Detail Pengguna -->
                        <div class="glass-card p-4 mb-4 no-print animate-fade-up" style="animation-delay: 0.1s;">
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                <h5 class="fw-bold m-0" style="color: var(--m3-primary);">Informasi Anggota</h5>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">
                                    Status: LUNAS
                                </span>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="info-label">Nama Lengkap</div>
                                    <div class="info-value">{{ $member->full_name }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="info-label">NIK</div>
                                    <div class="info-value">{{ $member->nik }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="info-label">Nomor Registrasi</div>
                                    <div class="info-value">{{ $member->member_card_no }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="info-label">Alamat Lengkap</div>
                                    <div class="info-value">{{ $member->address }}</div>
                                </div>
                            </div>

                            <div class="text-end mt-2 pt-3 border-top">
                                <button onclick="window.print()" class="btn-m3-primary w-100 shadow-sm">
                                    🖨️ Cetak / Download PDF
                                </button>
                            </div>
                        </div>

                        <!-- Preview Kartu Tanda Anggota -->
                        <div class="no-print text-center mb-2 animate-fade-up" style="animation-delay: 0.2s;">
                            <span class="fw-bold text-secondary text-uppercase small" style="letter-spacing: 1px;">Preview Tampilan Kartu</span>
                        </div>

                        <div class="card-container animate-fade-up" style="animation-delay: 0.25s;">
                            <div class="id-card" id="printableCard">
                                <div class="header">
                                    <h6>Kartu Tanda Anggota</h6>
                                </div>

                                <div class="content">
                                    @if($member->photo)
                                        <img src="{{ asset('storage/' . $member->photo) }}" class="photo" alt="Foto">
                                    @else
                                        <div class="photo-placeholder">No Photo</div>
                                    @endif

                                    <div class="details">
                                        <p><strong>Nama</strong>: {{ $member->full_name }}</p>
                                        <p><strong>NIK</strong>: {{ $member->nik }}</p>
                                        <p><strong>No Reg</strong>: {{ $member->member_card_no }}</p>
                                        <p><strong>Alamat</strong>: {{ Str::limit($member->address, 32) }}</p>
                                    </div>
                                </div>

                                <div class="footer">
                                    <span style="font-size: 10px; opacity: 0.9; font-weight: 600;">Berlaku Anggota Aktif</span>
                                    <div class="qr-code">
                                        {!! $qrCode !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        <!-- Anggota Belum Lunas -->
                        <div class="glass-card p-4 text-center no-print animate-fade-up" style="border-left: 5px solid #ffb703;">
                            <h5 class="fw-bold text-warning-emphasis mb-2">Pembayaran Belum Dikonfirmasi</h5>
                            <p class="mb-0 text-secondary">Status pembayaran untuk NIK <strong>{{ $member->nik }}</strong> masih <strong>PENDING / UNPAID</strong>. Kartu anggota baru dapat dicetak setelah status pembayaran Lunas.</p>
                        </div>
                    @endif
                @else
                    <!-- NIK Tidak Ditemukan -->
                    <div class="glass-card p-4 text-center no-print animate-fade-up" style="border-left: 5px solid #ba1a1a;">
                        <h5 class="fw-bold text-danger mb-2">Data Tidak Ditemukan</h5>
                        <p class="mb-0 text-secondary">Data anggota dengan NIK <strong>{{ request('nik') }}</strong> tidak terdaftar dalam sistem.</p>
                    </div>
                @endif
            @endif

        </div>
    </div>
</div>

</body>
</html>