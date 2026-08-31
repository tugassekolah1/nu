<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>

<x-app-layout>
    <div class="py-8 bg-slate-50 min-h-[calc(100vh-4rem)] font-sans antialiased text-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Welcome Hero Banner -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-emerald-950 via-emerald-900 to-teal-900 p-8 sm:p-10 text-white shadow-2xl border border-emerald-900/50">
                <div class="absolute -right-16 -bottom-16 w-80 h-80 bg-emerald-500/15 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute top-0 right-1/4 w-60 h-60 bg-teal-400/10 rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="space-y-3">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-emerald-800/60 border border-emerald-500/30 text-emerald-200 backdrop-blur-md shadow-xs">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-emerald-400"></i>
                            <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                        </div>
                        <h1 class="text-2xl sm:text-4xl font-black tracking-tight font-serif">
                            Selamat Datang, {{ Auth::user()->name ?? 'Pengurus' }}! 👋
                        </h1>
                        <p class="text-emerald-100/80 text-sm sm:text-base max-w-xl font-light leading-relaxed">
                            Pantau perkembangan data anggota NU dan terbitkan berita terbaru langsung melalui panel kendali terpadu ini.
                        </p>
                    </div>

                    <div class="flex items-center gap-3 shrink-0 flex-wrap">
                        <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl text-xs font-bold uppercase tracking-wider bg-emerald-500 hover:bg-emerald-400 text-white transition-all shadow-lg shadow-emerald-950/30 hover:scale-105 active:scale-95">
                            <i data-lucide="plus-circle" class="w-4 h-4"></i>
                            <span>Tulis Berita</span>
                        </a>
                        <a href="{{ route('members.index') }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-xl text-xs font-bold uppercase tracking-wider bg-white/10 hover:bg-white/20 text-white border border-white/20 backdrop-blur-md transition-all hover:scale-105 active:scale-95 shadow-xs">
                            <i data-lucide="user-plus" class="w-4 h-4"></i>
                            <span>Anggota Baru</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Grid Dashboard -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Left Content Column -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Stats Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        
                        <!-- Members Card -->
                        <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-xs hover:shadow-xl transition-all relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-bl-full pointer-events-none group-hover:scale-110 transition-transform duration-500"></div>
                            
                            <div class="relative z-10 flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Keanggotaan</span>
                                <div class="p-3 bg-emerald-50 text-emerald-700 rounded-2xl group-hover:bg-emerald-700 group-hover:text-white transition-all shadow-xs">
                                    <i data-lucide="users" class="w-5 h-5"></i>
                                </div>
                            </div>
                            
                            <div class="relative z-10 mt-5">
                                <h3 class="text-4xl font-black text-slate-900 tracking-tight">
                                    {{ $totalMembers ?? 0 }}
                                </h3>
                                <p class="text-xs text-slate-500 mt-1 font-medium">Anggota NU Terdaftar</p>
                            </div>

                            <div class="relative z-10 mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                                <a href="{{ route('members.index') }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 inline-flex items-center gap-1.5 group/link">
                                    <span>Kelola Direktori</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform group-hover/link:translate-x-1"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Publications Card -->
                        <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-xs hover:shadow-xl transition-all relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-teal-50 rounded-bl-full pointer-events-none group-hover:scale-110 transition-transform duration-500"></div>
                            
                            <div class="relative z-10 flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Publikasi</span>
                                <div class="p-3 bg-teal-50 text-teal-700 rounded-2xl group-hover:bg-teal-700 group-hover:text-white transition-all shadow-xs">
                                    <i data-lucide="newspaper" class="w-5 h-5"></i>
                                </div>
                            </div>
                            
                            <div class="relative z-10 mt-5">
                                <h3 class="text-4xl font-black text-slate-900 tracking-tight">
                                    {{ $totalNews ?? 0 }}
                                </h3>
                                <p class="text-xs text-slate-500 mt-1 font-medium">Artikel & Warta Rilis</p>
                            </div>

                            <div class="relative z-10 mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                                <a href="{{ route('berita.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 inline-flex items-center gap-1.5 group/link">
                                    <span>Lihat Postingan</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform group-hover/link:translate-x-1"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Quick Modules Section -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <div>
                                <h3 class="font-bold text-slate-900 text-lg font-serif">Modul Utama</h3>
                                <p class="text-xs text-slate-400">Pilih akses cepat pengelolaan data portal</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <a href="{{ route('members.index') }}" class="group p-6 rounded-2xl border border-slate-200/75 bg-slate-50/50 hover:bg-emerald-50/40 hover:border-emerald-300 transition-all flex flex-col justify-between space-y-4 shadow-xs">
                                <div class="flex items-center gap-4">
                                    <div class="p-3.5 bg-white shadow-sm border border-slate-200/60 text-emerald-700 rounded-2xl group-hover:scale-110 group-hover:bg-emerald-700 group-hover:text-white transition-all">
                                        <i data-lucide="user-check" class="w-6 h-6"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 group-hover:text-emerald-800 transition-colors text-base">Data Anggota</h4>
                                        <span class="text-[11px] font-semibold text-slate-400">Verifikasi & Database</span>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-600 leading-relaxed font-light">
                                    Kelola seluruh data keanggotaan NU, perbarui informasi profil, serta cetak laporan terpadu.
                                </p>
                            </a>

                            <a href="{{ route('berita.index') }}" class="group p-6 rounded-2xl border border-slate-200/75 bg-slate-50/50 hover:bg-teal-50/40 hover:border-teal-300 transition-all flex flex-col justify-between space-y-4 shadow-xs">
                                <div class="flex items-center gap-4">
                                    <div class="p-3.5 bg-white shadow-sm border border-slate-200/60 text-teal-700 rounded-2xl group-hover:scale-110 group-hover:bg-teal-700 group-hover:text-white transition-all">
                                        <i data-lucide="file-text" class="w-6 h-6"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 group-hover:text-teal-800 transition-colors text-base">Warta & Berita</h4>
                                        <span class="text-[11px] font-semibold text-slate-400">Pengelolaan Konten</span>
                                    </div>
                                </div>
                                <p class="text-xs text-slate-600 leading-relaxed font-light">
                                    Buat pengumuman terbaru, tulis artikel warta, dan kelola rilis media internal secara instan.
                                </p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar Column -->
                <div class="space-y-8">
                    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs space-y-6">
                        <h3 class="font-bold text-slate-900 text-base font-serif border-b border-slate-100 pb-4">Status Layanan</h3>
                        
                        <div class="space-y-3.5">
                            <div class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                                <div class="flex items-center gap-3">
                                    <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span class="text-xs font-bold text-slate-700">Sistem Portal</span>
                                </div>
                                <span class="text-[11px] font-bold text-emerald-700 bg-emerald-100/70 px-2.5 py-1 rounded-lg">Aktif</span>
                            </div>

                            <div class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                                <div class="flex items-center gap-3">
                                    <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                                    <span class="text-xs font-bold text-slate-700">Hak Akses</span>
                                </div>
                                <span class="text-[11px] font-bold text-slate-700 bg-slate-200/70 px-2.5 py-1 rounded-lg">Administrator</span>
                            </div>
                        </div>

                        <div class="p-4.5 rounded-2xl bg-emerald-50/60 border border-emerald-100 flex items-start gap-3.5 mt-4">
                            <i data-lucide="info" class="w-5 h-5 text-emerald-700 shrink-0 mt-0.5"></i>
                            <p class="text-xs text-emerald-950 leading-relaxed font-light">
                                Pastikan untuk selalu memverifikasi kelengkapan data anggota sebelum mencetak dokumen resmi organisasi.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>

<script>
    // Initialize Lucide Icons
    lucide.createIcons();
</script>