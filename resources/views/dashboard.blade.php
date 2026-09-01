    @vite(['resources/css/app.css', 'resources/js/app.js'])

  <div class="p-6 bg-slate-100 min-h-screen space-y-8 font-sans antialiased">
    
    {{-- Header Section dengan Sapaan & Tanggal --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-white p-6 rounded-2xl shadow-sm border border-slate-200/80 transition-all duration-300 hover:shadow-md">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-emerald-500/10 text-emerald-600 rounded-2xl hidden sm:block">
                {{-- SVG Icon Dashboard Header --}}
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight">Selamat Datang di Panel Admin 👋</h1>
                <p class="text-sm text-slate-500 font-medium mt-1">Pilih menu di bawah untuk mengelola data anggota atau berita dengan mudah.</p>
            </div>
        </div>
        
        {{-- Badge Tanggal --}}
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-50 border border-slate-200 text-slate-600 font-semibold text-sm self-start md:self-auto shadow-xs">
            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span>{{ now()->translatedFormat('l, d F Y') }}</span>
        </div>
    </div>

    {{-- Interactive Cards Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Card: Total Infak --}}
<a href="{{ route('infaq.index') }}" 
   class="group relative p-6 rounded-2xl border border-slate-200/80 bg-white hover:bg-emerald-50/40 hover:border-emerald-300 transition-all duration-300 flex flex-col justify-between space-y-6 shadow-xs hover:shadow-xl hover:-translate-y-1.5 active:scale-[0.99]">
    
    <div class="flex items-start justify-between">
        <div class="space-y-1">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest group-hover:text-emerald-700 transition-colors">
                Keuangan & Sedekah
            </span>
            <h2 class="text-lg font-bold text-slate-800 group-hover:text-emerald-950">Total Infak</h2>
        </div>
        
        {{-- Icon Uang / Dompet --}}
        <div class="p-4 rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 shadow-xs group-hover:rotate-6">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
    </div>

    <div class="flex items-end justify-between pt-2">
        <div>
            <h3 class="text-3xl font-black text-slate-900 group-hover:text-emerald-900 transition-colors tracking-tight">
                Rp {{ number_format($totalInfaq ?? 0, 0, ',', '.') }}
            </h3>
            <p class="text-xs text-slate-400 mt-1">Total infak terkumpul (lunas)</p>
        </div>
        
        {{-- Tombol Aksi Visual --}}
        <div class="inline-flex items-center gap-2 text-xs font-bold text-emerald-700 bg-emerald-100/80 group-hover:bg-emerald-600 group-hover:text-white px-4 py-2.5 rounded-xl transition-all duration-300 shadow-xs">
            <span>Kelola Infak</span>
            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </div>
    </div>
</a>
        {{-- Card 1: Kelola Anggota --}}
        <a href="{{ route('members.index') }}" 
           class="group relative p-6 rounded-2xl border border-slate-200/80 bg-white hover:bg-emerald-50/40 hover:border-emerald-300 transition-all duration-300 flex flex-col justify-between space-y-6 shadow-xs hover:shadow-xl hover:-translate-y-1.5 active:scale-[0.99]">
            
            <div class="flex items-start justify-between">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest group-hover:text-emerald-700 transition-colors">
                        Data Utama
                    </span>
                    <h2 class="text-lg font-bold text-slate-800 group-hover:text-emerald-950">Total Anggota</h2>
                </div>
                {{-- SVG Icon Anggota --}}
                <div class="p-4 rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 shadow-xs group-hover:rotate-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>

            <div class="flex items-end justify-between pt-2">
                <div>
                    <h3 class="text-4xl font-black text-slate-900 group-hover:text-emerald-900 transition-colors tracking-tight">
                        {{ $totalMembers ?? 0 }}
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">Orang terdaftar</p>
                </div>
                
                {{-- Tombol Aksi Visual --}}
                <div class="inline-flex items-center gap-2 text-xs font-bold text-emerald-700 bg-emerald-100/80 group-hover:bg-emerald-600 group-hover:text-white px-4 py-2.5 rounded-xl transition-all duration-300 shadow-xs">
                    <span>Kelola Anggota</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </div>
            </div>
        </a>

        {{-- Card 2: Kelola Publikasi / Berita --}}
        <a href="{{ route('berita.index') }}" 
           class="group relative p-6 rounded-2xl border border-slate-200/80 bg-white hover:bg-teal-50/40 hover:border-teal-300 transition-all duration-300 flex flex-col justify-between space-y-6 shadow-xs hover:shadow-xl hover:-translate-y-1.5 active:scale-[0.99]">
            
            <div class="flex items-start justify-between">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest group-hover:text-teal-700 transition-colors">
                        Informasi & Artikel
                    </span>
                    <h2 class="text-lg font-bold text-slate-800 group-hover:text-teal-950">Total Publikasi</h2>
                </div>
                {{-- SVG Icon Berita --}}
                <div class="p-4 rounded-2xl bg-teal-50 text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition-all duration-300 shadow-xs group-hover:-rotate-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
            </div>

            <div class="flex items-end justify-between pt-2">
                <div>
                    <h3 class="text-4xl font-black text-slate-900 group-hover:text-teal-900 transition-colors tracking-tight">
                        {{ $totalNews ?? 0 }}
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">Berita diterbitkan</p>
                </div>
                
                {{-- Tombol Aksi Visual --}}
                <div class="inline-flex items-center gap-2 text-xs font-bold text-teal-700 bg-teal-100/80 group-hover:bg-teal-600 group-hover:text-white px-4 py-2.5 rounded-xl transition-all duration-300 shadow-xs">
                    <span>Kelola Berita</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </div>
                
            </div>
        </a>

    </div>

    {{-- Section Panduan & Akses Cepat (User Friendly untuk Awam) --}}
    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
        <div class="flex items-center gap-2 border-b border-slate-100 pb-3">
            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            <h2 class="text-base font-bold text-slate-800">Menu Akses Cepat</h2>
        </div>
        
        <p class="text-xs text-slate-500">Klik tombol di bawah ini jika Anda ingin langsung membuka halaman pengelolaan tanpa menekan kartu di atas:</p>

        <div class="flex flex-wrap gap-4 pt-1">
            <a href="{{ route('members.index') }}" 
               class="inline-flex items-center gap-2.5 px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white font-bold text-sm shadow-sm hover:shadow-emerald-200 hover:shadow-lg transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                <span>Halaman Kelola Anggota</span>
            </a>

            <a href="{{ route('berita.index') }}" 
               class="inline-flex items-center gap-2.5 px-5 py-3 rounded-xl bg-teal-600 hover:bg-teal-700 active:scale-95 text-white font-bold text-sm shadow-sm hover:shadow-teal-200 hover:shadow-lg transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                <span>Halaman Kelola Berita</span>
            </a>
            <a href="{{ route('agenda.index') }}"
   class="inline-flex items-center bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg text-sm">
    Kelola Agenda
</a>
        </div>
    </div>

</div>