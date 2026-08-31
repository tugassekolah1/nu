<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota NU - Warta NU</title>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800 selection:bg-emerald-500 selection:text-white min-h-full flex flex-col justify-between relative overflow-x-hidden">

    <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-emerald-100/60 rounded-full blur-3xl -z-10 pointer-events-none"></div>

    <header class="bg-white/80 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2.5 group focus:outline-none focus:ring-2 focus:ring-emerald-500/30 rounded-lg p-1 transition-all">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-800 to-emerald-600 flex items-center justify-center text-white shadow-md shadow-emerald-900/20 group-hover:scale-105 transition-transform duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/>
                        <path d="M18 14h-8"/>
                        <path d="M15 18h-5"/>
                        <path d="M10 6h8v4h-8z"/>
                    </svg>
                </div>
                <span class="font-serif font-black text-lg tracking-tight text-slate-900 group-hover:text-emerald-800 transition-colors">WARTA NU</span>
            </a>

            <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-600 hover:text-emerald-800 bg-slate-100 hover:bg-emerald-50/80 px-3.5 py-2 rounded-full border border-slate-200/60 hover:border-emerald-200 transition-all shadow-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m12 19-7-7 7-7"/>
                    <path d="M19 12H5"/>
                </svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </header>

    <main class="max-w-lg mx-auto px-4 py-10 w-full flex-grow">

        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-1.5 bg-emerald-100/80 text-emerald-800 text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3 border border-emerald-200/50">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <line x1="19" x2="19" y1="8" y2="14"/>
                    <line x1="22" x2="16" y1="11" y2="11"/>
                </svg>
                <span>Keanggotaan Resmi</span>
            </span>
            <h1 class="text-3xl font-serif font-bold text-slate-900 tracking-tight">Formulir Pendaftaran Anggota</h1>
            <p class="text-slate-500 text-sm mt-1.5 leading-relaxed">Lengkapi data diri Anda di bawah ini untuk bergabung dalam jaringan komunitas Warta NU.</p>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-50/90 border border-emerald-200 text-emerald-800 rounded-2xl flex items-start gap-3 shadow-sm">
                <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <path d="m9 11 3 3L22 4"/>
                </svg>
                <div class="text-sm font-medium">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 bg-rose-50/90 border border-rose-200 text-rose-800 rounded-2xl shadow-sm">
                <div class="flex items-center gap-2 mb-2 font-semibold text-sm text-rose-900">
                    <svg class="w-4 h-4 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" x2="12" y1="8" y2="12"/>
                        <line x1="12" x2="12.01" y1="16" y2="16"/>
                    </svg>
                    <span>Terdapat beberapa kesalahan input:</span>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 text-rose-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white border border-slate-200/80 rounded-3xl shadow-xl shadow-slate-200/60 p-6 sm:p-8 relative overflow-hidden backdrop-blur-sm">
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-600 via-emerald-500 to-teal-400"></div>

            <form action="{{ route('members.register') }}" method="POST" x-data="{ loading: false }" @submit="loading = true" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        NIK (Nomor Induk Kependudukan) <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative flex items-center">
                        <div class="absolute left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 z-10">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="14" x="2" y="5" rx="2"/>
                                <line x1="2" x2="22" y1="10" y2="10"/>
                            </svg>
                        </div>
                        <input type="text" name="nik" maxlength="16" pattern="[0-9]{16}" inputmode="numeric" value="{{ old('nik') }}" required placeholder="16 digit NIK sesuai KTP"
                               style="padding-left: 2.75rem !important;"
                               class="w-full pr-4 py-2.5 text-sm bg-slate-50/50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all outline-none @error('nik') border-rose-500 ring-2 ring-rose-500/20 @enderror">
                    </div>
                    @error('nik')
                        <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Nama Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative flex items-center">
                        <div class="absolute left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 z-10">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                        </div>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required placeholder="Nama lengkap sesuai identitas"
                               style="padding-left: 2.75rem !important;"
                               class="w-full pr-4 py-2.5 text-sm bg-slate-50/50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all outline-none @error('full_name') border-rose-500 ring-2 ring-rose-500/20 @enderror">
                    </div>
                    @error('full_name')
                        <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        No. WhatsApp / HP <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative flex items-center">
                        <div class="absolute left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 z-10">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="Contoh: 081234567890"
                               style="padding-left: 2.75rem !important;"
                               class="w-full pr-4 py-2.5 text-sm bg-slate-50/50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all outline-none @error('phone') border-rose-500 ring-2 ring-rose-500/20 @enderror">
                    </div>
                    @error('phone')
                        <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Jenis Kelamin <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative flex items-center">
                        <div class="absolute left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 z-10">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </div>
                        <select name="gender" required
                                style="padding-left: 2.75rem !important;"
                                class="w-full pr-10 py-2.5 text-sm bg-slate-50/50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all outline-none appearance-none @error('gender') border-rose-500 ring-2 ring-rose-500/20 @enderror">
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('gender') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender') === 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <div class="absolute right-0 pr-3.5 flex items-center pointer-events-none text-slate-400 z-10">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </div>
                    </div>
                    @error('gender')
                        <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Alamat Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute top-3 left-0 pl-3.5 flex items-start pointer-events-none text-slate-400 z-10">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <textarea name="address" rows="3" required placeholder="Jalan, RT/RW, Desa/Kelurahan, Kecamatan..."
                                  style="padding-left: 2.75rem !important;"
                                  class="w-full pr-4 py-2.5 text-sm bg-slate-50/50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 transition-all outline-none resize-none @error('address') border-rose-500 ring-2 ring-rose-500/20 @enderror">{{ old('address') }}</textarea>
                    </div>
                    @error('address')
                        <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" :disabled="loading"
                        class="w-full mt-2 inline-flex items-center justify-center gap-2 bg-emerald-700 hover:bg-emerald-800 disabled:bg-emerald-400 text-white font-bold px-6 py-3.5 rounded-xl text-xs uppercase tracking-wider shadow-lg shadow-emerald-700/20 hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all cursor-pointer disabled:cursor-not-allowed">
                    <template x-if="!loading">
                        <span class="inline-flex items-center justify-center gap-2">
                            <span>Daftar Anggota Sekarang</span>
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/>
                                <path d="m12 5 7 7-7 7"/>
                            </svg>
                        </span>
                    </template>
                    <template x-if="loading">
                        <span class="inline-flex items-center justify-center gap-2" x-cloak>
                            <svg class="w-4 h-4 animate-spin shrink-0" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Memproses Pendaftaran...</span>
                        </span>
                    </template>
                </button>
            </form>
        </div>
    </main>

    <footer class="py-6 border-t border-slate-200/80 bg-white text-center text-xs text-slate-400">
        <p>&copy; {{ date('Y') }} Warta NU. Seluruh Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>