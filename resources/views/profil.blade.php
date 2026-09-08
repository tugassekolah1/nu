<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil & Struktur Organisasi</title>
    
    <!-- Google Fonts: Plus Jakarta Sans & Baloo 2 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        heading: ['Baloo 2', 'cursive'],
                    },
                    colors: {
                        nu: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            500: '#8bc14b',
                            600: '#6ba82f',
                            700: '#214b35',
                            800: '#16372c',
                            900: '#102a20',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        [x-cloak] { display: none !important; }
        
        /* Glassmorphism Surface Container */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px) saturate(160%);
            -webkit-backdrop-filter: blur(12px) saturate(160%);
        }
    </style>
</head>
<body class="bg-[#f4f8f5] text-slate-800 font-sans antialiased min-h-screen selection:bg-nu-500 selection:text-white" x-data="{ selectedBanom: 'ranting' }">
<x-navbar></x-navbar>
    <!-- Header Section -->
    <header class="relative bg-gradient-to-br from-nu-900 via-nu-800 to-nu-700 text-white pt-48 pb-16 overflow-hidden shadow-xl">
        <!-- Background Pattern Deco -->
        <div class="absolute -top-10 -right-10 w-72 h-72 bg-nu-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-10 -left-10 w-72 h-72 bg-emerald-400/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-4 text-center relative z-10">
            <span class="text-xs font-bold uppercase tracking-widest text-nu-500 bg-white/10 border border-white/15 px-4 py-1.5 rounded-full inline-block mb-3 backdrop-blur-sm shadow-sm">
                Keorganisasian Desa
            </span>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white font-heading leading-tight drop-shadow-sm">
                PROFIL & STRUKTUR PENGURUS
            </h1>
            <p class="mt-2 text-white/80 text-sm sm:text-base max-w-xl mx-auto font-medium">
                Pilih badan otonom di bawah untuk melihat detail profil dan susunan kepengurusan.
            </p>
        </div>
    </header>

    <!-- Navigasi Tab Organisasi -->
    <div class="max-w-6xl mx-auto px-4 -mt-7 relative z-20">
        <div class="glass-card p-2 rounded-2xl shadow-lg border border-white/80 flex flex-wrap justify-center gap-2">
            <button @click="selectedBanom = 'ranting'" :class="selectedBanom === 'ranting' ? 'bg-nu-700 text-white shadow-md shadow-nu-700/20' : 'text-slate-600 hover:bg-emerald-50/80 hover:text-nu-700'" class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-200">Ranting NU</button>
            <button @click="selectedBanom = 'ipnu'" :class="selectedBanom === 'ipnu' ? 'bg-nu-700 text-white shadow-md shadow-nu-700/20' : 'text-slate-600 hover:bg-emerald-50/80 hover:text-nu-700'" class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-200">IPNU</button>
            <button @click="selectedBanom = 'ippnu'" :class="selectedBanom === 'ippnu' ? 'bg-nu-700 text-white shadow-md shadow-nu-700/20' : 'text-slate-600 hover:bg-emerald-50/80 hover:text-nu-700'" class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-200">IPPNU</button>
            <button @click="selectedBanom = 'ansor'" :class="selectedBanom === 'ansor' ? 'bg-nu-700 text-white shadow-md shadow-nu-700/20' : 'text-slate-600 hover:bg-emerald-50/80 hover:text-nu-700'" class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-200">GP Ansor</button>
            <button @click="selectedBanom = 'fatayat'" :class="selectedBanom === 'fatayat' ? 'bg-nu-700 text-white shadow-md shadow-nu-700/20' : 'text-slate-600 hover:bg-emerald-50/80 hover:text-nu-700'" class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-200">Fatayat NU</button>
            <button @click="selectedBanom = 'muslimat'" :class="selectedBanom === 'muslimat' ? 'bg-nu-700 text-white shadow-md shadow-nu-700/20' : 'text-slate-600 hover:bg-emerald-50/80 hover:text-nu-700'" class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-200">Muslimat NU</button>
            <button @click="selectedBanom = 'banser'" :class="selectedBanom === 'banser' ? 'bg-nu-700 text-white shadow-md shadow-nu-700/20' : 'text-slate-600 hover:bg-emerald-50/80 hover:text-nu-700'" class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-200">Banser</button>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="max-w-6xl mx-auto px-4 py-10 space-y-10">

        <!-- KONTEN PROFIL ORGANISASI (Dinamis sesuai Tab) -->
        <section class="glass-card p-6 sm:p-8 rounded-3xl shadow-sm border border-emerald-900/10 transition-all">
            
            <!-- Profil Ranting NU -->
            <div x-show="selectedBanom === 'ranting'" x-transition x-cloak>
                <h2 class="text-xl sm:text-2xl font-bold text-nu-700 mb-2 flex items-center gap-2.5 font-heading">
                    <span class="w-3 h-3 bg-nu-500 rounded-full shadow-sm"></span> Profil Ranting NU Desa
                </h2>
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-medium">Induk organisasi Nahdlatul Ulama di tingkat desa yang mengoordinasikan seluruh badan otonom serta kegiatan keagamaan Islam Ahlussunnah wal Jama'ah.</p>
            </div>

            <!-- Profil IPNU -->
            <div x-show="selectedBanom === 'ipnu'" x-transition x-cloak>
                <h2 class="text-xl sm:text-2xl font-bold text-nu-700 mb-2 flex items-center gap-2.5 font-heading">
                    <span class="w-3 h-3 bg-nu-500 rounded-full shadow-sm"></span> PR IPNU (Ikatan Pelajar Nahdlatul Ulama)
                </h2>
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-medium">Wadah kaderisasi awal bagi pelajar, santri, dan remaja putra di desa untuk membina kepemimpinan dan karakter keislaman.</p>
            </div>

            <!-- Profil IPPNU -->
            <div x-show="selectedBanom === 'ippnu'" x-transition x-cloak>
                <h2 class="text-xl sm:text-2xl font-bold text-nu-700 mb-2 flex items-center gap-2.5 font-heading">
                    <span class="w-3 h-3 bg-nu-500 rounded-full shadow-sm"></span> PR IPPNU (Ikatan Pelajar Putri NU)
                </h2>
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-medium">Wadah pembinaan dan kaderisasi bagi pelajar dan remaja putri NU di tingkat desa.</p>
            </div>

            <!-- Profil GP Ansor -->
            <div x-show="selectedBanom === 'ansor'" x-transition x-cloak>
                <h2 class="text-xl sm:text-2xl font-bold text-nu-700 mb-2 flex items-center gap-2.5 font-heading">
                    <span class="w-3 h-3 bg-nu-500 rounded-full shadow-sm"></span> PR GP Ansor
                </h2>
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-medium">Organisasi kepemudaan NU yang bergerak di bidang keagamaan, sosial kemasyarakatan, dan pengawalan tradisi ulama.</p>
            </div>

            <!-- Profil Fatayat NU -->
            <div x-show="selectedBanom === 'fatayat'" x-transition x-cloak>
                <h2 class="text-xl sm:text-2xl font-bold text-nu-700 mb-2 flex items-center gap-2.5 font-heading">
                    <span class="w-3 h-3 bg-nu-500 rounded-full shadow-sm"></span> PR Fatayat NU
                </h2>
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-medium">Badan otonom untuk perempuan muda NU yang berfokus pada penguatan ekonomi keluarga dan kesehatan masyarakat.</p>
            </div>

            <!-- Profil Muslimat NU -->
            <div x-show="selectedBanom === 'muslimat'" x-transition x-cloak>
                <h2 class="text-xl sm:text-2xl font-bold text-nu-700 mb-2 flex items-center gap-2.5 font-heading">
                    <span class="w-3 h-3 bg-nu-500 rounded-full shadow-sm"></span> PR Muslimat NU
                </h2>
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-medium">Wadah ibu-ibu NU yang mengelola majelis taklim, kegiatan sosial, dan pendidikan keagamaan di desa.</p>
            </div>

            <!-- Profil Banser -->
            <div x-show="selectedBanom === 'banser'" x-transition x-cloak>
                <h2 class="text-xl sm:text-2xl font-bold text-nu-700 mb-2 flex items-center gap-2.5 font-heading">
                    <span class="w-3 h-3 bg-nu-500 rounded-full shadow-sm"></span> Satkorkel Banser
                </h2>
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-medium">Barisan Ansor Serbaguna yang bertugas mengawal kiai, menjaga keamanan kegiatan keagamaan, dan tanggap bencana desa.</p>
            </div>

        </section>


        <!-- KONTEN STRUKTUR PENGURUS (Filtered Grid) -->
        <section>
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-slate-200 pb-3">
                <h3 class="text-xl font-bold text-nu-700 font-heading">
                    Struktur Kepengurusan
                </h3>
                <span class="text-xs font-extrabold text-nu-800 bg-emerald-100/80 border border-emerald-200 px-3 py-1 rounded-full w-fit" x-text="'Menampilkan: ' + selectedBanom.toUpperCase()"></span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($pengurus as $item)
                    <!-- Filter kondisi disempurnakan (memisahkan IPNU dan IPPNU secara presisi) -->
                    <div x-show="(() => {
                            const banom = '{{ strtolower(addslashes($item->label_banom)) }}';
                            if (selectedBanom === 'ipnu') return banom.includes('ipnu') && !banom.includes('ippnu');
                            return banom.includes(selectedBanom);
                         })()"
                         x-transition
                         class="group bg-white rounded-3xl p-5 text-center shadow-sm border border-slate-200/80 flex flex-col items-center justify-between hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        
                        <div class="flex flex-col items-center w-full">
                            
                            <!-- Foto Profil Card Frame (Desain Baru berbentuk Kartu Mini) -->
                            <div class="mb-4 w-full flex justify-center">
                                <div class="w-28 h-36 bg-gradient-to-tr from-slate-100 to-emerald-50 rounded-2xl p-1.5 shadow-md border border-slate-200/80 relative overflow-hidden group-hover:border-nu-500 transition-colors duration-300">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" 
                                             class="w-full h-full object-cover rounded-xl shadow-inner group-hover:scale-105 transition-transform duration-500" 
                                             alt="{{ $item->nama }}">
                                    @else
                                        <div class="w-full h-full bg-slate-100/80 rounded-xl flex flex-col items-center justify-center text-slate-400 p-2 text-center border border-dashed border-slate-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <span class="text-[10px] font-bold uppercase tracking-wider">No Photo</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Nama & Jabatan -->
                            <h4 class="text-base font-extrabold text-slate-800 mb-1 line-clamp-1 group-hover:text-nu-700 transition-colors">
                                {{ $item->nama }}
                            </h4>
                            <p class="text-xs font-semibold text-slate-500 mb-4 line-clamp-2 min-h-[32px]">
                                {{ $item->jabatan }}
                            </p>
                        </div>

                        <!-- Badge Banom -->
                        <span class="bg-nu-500/15 text-nu-800 border border-nu-500/30 text-[11px] font-extrabold px-3.5 py-1.5 rounded-full uppercase tracking-wider">
                            {{ $item->label_banom }}
                        </span>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 bg-white rounded-3xl border border-slate-200/80 shadow-sm">
                        <div class="max-w-xs mx-auto text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <p class="text-sm font-semibold text-slate-600">Data pengurus belum tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>

    </main>

</body>
</html>