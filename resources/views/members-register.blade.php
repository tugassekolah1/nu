<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Anggota — NU Banjaranyar</title>
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
            --brand-deep: #356c49;
            --brand-dark: #214b35;
            --shadow: 0 18px 45px rgba(23, 57, 45, 0.08);
            --radius-lg: 24px;
            --radius-md: 16px;
            --radius-sm: 12px;
            --container: 1180px;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; font-family: "Inter", system-ui, sans-serif; color: var(--ink); background: var(--bg); min-height: 100vh; display: flex; flex-direction: column; }
        img { max-width: 100%; display: block; }
        a { color: inherit; text-decoration: none; }

        .container { width: min(var(--container), calc(100% - 32px)); margin: 0 auto; }

        /* Navigasi */
        .nav { background: #fff; border-bottom: 1px solid var(--line); position: sticky; top: 0; z-index: 20; }
        .nav-inner { display: flex; align-items: center; justify-content: space-between; gap: 16px; min-height: 76px; }
        .brand { display: flex; align-items: center; gap: 12px; font-weight: 800; letter-spacing: -0.02em; }
        .brand-mark {
            width: 42px; height: 42px; border-radius: 14px;
            background: linear-gradient(135deg, #183c2f 0%, #82be46 100%);
            display: grid; place-items: center; color: white; box-shadow: var(--shadow); font-size: 15px;
        }
        .brand-name { font-size: 18px; line-height: 1.15; }
        .brand-name small { display: block; font-size: 11px; font-weight: 600; color: var(--ink-soft); }
        .nav-back {
            display: inline-flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 700;
            color: var(--brand-deep); background: var(--surface-soft); padding: 10px 16px; border-radius: 999px;
            border: 1px solid var(--line);
        }

        /* Header kecil */
        .page-header {
            background: linear-gradient(115deg, rgba(16, 47, 32, 0.92), rgba(28, 81, 51, 0.72));
            color: #fff; padding: 48px 0 56px; position: relative; overflow: hidden;
        }
        .page-header::before {
            content: ""; position: absolute; inset: 0;
            background: radial-gradient(circle at 18% 30%, rgba(151, 214, 90, 0.28), transparent 24%),
                        radial-gradient(circle at 85% 24%, rgba(152, 208, 91, 0.18), transparent 18%);
            pointer-events: none;
        }
        .page-header-inner { position: relative; z-index: 1; text-align: center; }
        .page-header .badge {
            display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.22); color: #fff; font-size: 12px; font-weight: 700;
            padding: 7px 14px; border-radius: 999px; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 14px;
        }
        .page-header h1 {
            margin: 0; font-family: "Baloo 2", cursive; font-size: clamp(32px, 5vw, 56px);
            line-height: 1.05; letter-spacing: -0.02em; text-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }
        .page-header p { margin: 12px auto 0; color: rgba(255, 255, 255, 0.88); font-size: 16px; max-width: 560px; }

        /* Notifikasi */
        .alert {
            max-width: 720px; margin: 0 auto 20px; padding: 16px 18px; border-radius: var(--radius-sm);
            font-size: 14px; font-weight: 500; display: flex; align-items: flex-start; gap: 10px;
        }
        .alert-success { background: #e7f5ea; border: 1px solid #b6dfc0; color: #1e5631; }
        .alert-error { background: #fdecec; border: 1px solid #f3b8b8; color: #8a1f1f; }
        .alert ul { margin: 4px 0 0; padding-left: 18px; }

        /* Form area */
        .form-section { padding: 0 0 64px; margin-top: -32px; position: relative; z-index: 3; }
        .form-card {
            background: var(--surface); border: 1px solid rgba(33, 75, 53, 0.08); border-radius: var(--radius-lg);
            box-shadow: var(--shadow); padding: 40px; max-width: 720px; margin: 0 auto;
        }
        .form-note { font-size: 12px; color: var(--ink-soft); margin: 0 0 24px; }
        .form-note .req { color: #c0392b; font-weight: 700; }

        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
        .form-group { display: flex; flex-direction: column; gap: 8px; position: relative; }
        .form-group.full { grid-column: 1 / -1; }
        .form-group label { font-size: 13px; font-weight: 700; color: var(--ink); text-transform: uppercase; letter-spacing: 0.04em; }
        .form-group label .req { color: #c0392b; margin-left: 4px; }

        .form-group input, .form-group select, .form-group textarea {
            padding: 14px 16px; border: 1px solid var(--line); border-radius: var(--radius-sm);
            font-family: inherit; font-size: 15px; color: var(--ink); background: var(--surface-soft);
            outline: none; transition: border-color 180ms ease, box-shadow 180ms ease; width: 100%;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: var(--brand-deep); box-shadow: 0 0 0 3px rgba(53, 108, 73, 0.12); background: #fff;
        }
        .form-group input::placeholder, .form-group textarea::placeholder { color: #95a49a; }
        .form-group.has-error input,
        .form-group.has-error select,
        .form-group.has-error textarea { border-color: #c0392b; background: #fdf3f3; }
        .form-error { font-size: 12px; color: #c0392b; font-weight: 600; margin: 2px 0 0; }

        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2354665d' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 14px center; padding-right: 40px; cursor: pointer;
        }
        .form-group textarea { min-height: 100px; resize: vertical; line-height: 1.6; }
        .nik-counter { position: absolute; right: 14px; top: 41px; font-size: 11px; font-weight: 700; color: #95a49a; pointer-events: none; }

        .form-actions { display: flex; gap: 14px; margin-top: 32px; padding-top: 24px; border-top: 1px solid var(--line); }
        .btn {
            padding: 14px 28px; border-radius: 999px; font-family: inherit; font-size: 15px; font-weight: 700;
            cursor: pointer; border: none; transition: transform 160ms ease, box-shadow 160ms ease, opacity 160ms ease;
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn:hover { transform: translateY(-1px); }
        .btn-primary { background: linear-gradient(180deg, #90ca47 0%, #7ebb3d 100%); color: #fff; box-shadow: 0 10px 22px rgba(75, 125, 34, 0.22); flex: 1; }
        .btn-primary:hover { box-shadow: 0 14px 28px rgba(75, 125, 34, 0.28); }
        .btn-primary:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
        .btn-secondary { background: var(--surface-soft); color: var(--ink-soft); border: 1px solid var(--line); }
        .btn-secondary:hover { background: var(--line); color: var(--ink); }

        .form-privacy { font-size: 12px; color: var(--ink-soft); text-align: center; margin: 18px 0 0; line-height: 1.6; }

        .spinner {
            width: 16px; height: 16px; border: 2.5px solid rgba(255,255,255,0.4); border-top-color: #fff;
            border-radius: 50%; animation: spin 0.7s linear infinite; display: none;
        }
        .btn-primary.loading .spinner { display: inline-block; }
        .btn-primary.loading .btn-text { display: none; }
        @keyframes spin { to { transform: rotate(360deg); } }

        footer { margin-top: auto; background: #101715; color: #d2d9d5; padding: 18px 0; font-size: 13px; }
        .footer-inner { display: flex; align-items: center; justify-content: space-between; gap: 14px; }

        @media (max-width: 860px) {
            .nav-inner { padding: 14px 0; }
            .form-grid { grid-template-columns: 1fr; }
            .form-card { padding: 28px 22px; }
            .footer-inner { flex-direction: column; align-items: flex-start; }
        }
        @media (max-width: 640px) {
            .container { width: min(calc(100% - 24px), var(--container)); }
            .form-actions { flex-direction: column; }
            .btn { width: 100%; }
            .brand-name { font-size: 15px; }
            .nav-back span.label { display: none; }
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
            <a href="{{ route('landing') }}" class="nav-back">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                <span class="label">Kembali ke Beranda</span>
            </a>
        </div>
    </nav>

    <header class="page-header">
        <div class="container page-header-inner">
            <span class="badge">Keanggotaan Resmi</span>
            <h1>Formulir Pendaftaran Anggota</h1>
            <p>Silakan lengkapi data diri Anda di bawah ini untuk bergabung sebagai anggota NU Ranting Banjaranyar.</p>
        </div>
    </header>

    <section class="form-section">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:1px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:1px;"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                    <div>
                        <strong>Terdapat beberapa kesalahan input:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form class="form-card" action="{{ route('members.register') }}" method="POST" id="registerForm" novalidate>
                @csrf

                <p class="form-note">Kolom bertanda <span class="req">*</span> wajib diisi.</p>

                <div class="form-grid">
                    <div class="form-group @error('nik') has-error @enderror">
                        <label for="nik">NIK <span class="req">*</span></label>
                        <input type="text" id="nik" name="nik" placeholder="16 digit NIK sesuai KTP"
                               maxlength="16" inputmode="numeric" autocomplete="off"
                               value="{{ old('nik') }}" required>
                        <span class="nik-counter" id="nikCounter">0/16</span>
                        @error('nik')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('full_name') has-error @enderror">
                        <label for="full_name">Nama Lengkap <span class="req">*</span></label>
                        <input type="text" id="full_name" name="full_name" placeholder="Nama lengkap sesuai identitas"
                               autocomplete="name" value="{{ old('full_name') }}" required>
                        @error('full_name')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('gender') has-error @enderror">
                        <label for="gender">Jenis Kelamin <span class="req">*</span></label>
                        <select id="gender" name="gender" required>
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih jenis kelamin</option>
                            <option value="L" {{ old('gender') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') === 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group @error('phone') has-error @enderror">
                        <label for="phone">No. WhatsApp / HP <span class="req">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="Contoh: 081234567890"
                               inputmode="numeric" autocomplete="tel" value="{{ old('phone') }}" required>
                        @error('phone')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group full @error('address') has-error @enderror">
                        <label for="address">Alamat Lengkap <span class="req">*</span></label>
                        <textarea id="address" name="address" autocomplete="street-address" required
                                  placeholder="Jalan, RT/RW, Desa/Kelurahan, Kecamatan...">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <span class="spinner"></span>
                        <span class="btn-text">Daftar Anggota Sekarang</span>
                    </button>
                    <button type="reset" class="btn btn-secondary">Reset Form</button>
                </div>

                <p class="form-privacy">Dengan mendaftar, Anda menyetujui data ini digunakan untuk keperluan administrasi keanggotaan NU dan tidak akan dibagikan ke pihak lain.</p>
            </form>
        </div>
    </section>

    <footer>
        <div class="container footer-inner">
            <span>Copyright © {{ now()->year }} NU Ranting Banjaranyar</span>
            <span>Kontak: nubanjaranyar@gmail.com</span>
        </div>
    </footer>

    <script>
        // Filter angka-only untuk NIK & No. HP, plus counter digit NIK
        const nikInput = document.getElementById('nik');
        const nikCounter = document.getElementById('nikCounter');
        const phoneInput = document.getElementById('phone');

        function updateNikCounter() {
            nikCounter.textContent = nikInput.value.length + '/16';
        }

        nikInput.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
            updateNikCounter();
        });
        updateNikCounter();

        phoneInput.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Loading state saat submit
        document.getElementById('registerForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            btn.classList.add('loading');
            btn.disabled = true;
        });
    </script>
</body>
</html>