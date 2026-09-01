<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil & Struktur Organisasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#f7faf7] text-gray-800 font-sans antialiased" x-data="{ selectedBanom: 'ranting' }">

    <!-- Header Section -->
    <header class="bg-gradient-to-br from-[#102a20] via-[#213d2f] to-[#365946] text-white py-12 shadow-lg">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <span class="text-xs font-bold uppercase tracking-widest text-[#8bc14b] bg-white/10 px-3 py-1 rounded-full inline-block mb-3">
                Keorganisasian Desa
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white">
                PROFIL & STRUKTUR PENGURUS
            </h1>
            <p class="mt-2 text-white/80 text-sm max-w-xl mx-auto">
                Pilih badan otonom di bawah untuk melihat detail profil dan susunan kepengurusan.
            </p>
        </div>
    </header>

    <!-- Navigasi Tab Organisasi -->
    <div class="max-w-6xl mx-auto px-4 -mt-6 relative z-10">
        <div class="bg-white p-2 rounded-2xl shadow-md border border-[#d7e2d7] flex flex-wrap justify-center gap-1.5">
            <button @click="selectedBanom = 'ranting'" :class="selectedBanom === 'ranting' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:bg-emerald-50'" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition">Ranting NU</button>
            <button @click="selectedBanom = 'ipnu'" :class="selectedBanom === 'ipnu' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:bg-emerald-50'" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition">IPNU</button>
            <button @click="selectedBanom = 'ippnu'" :class="selectedBanom === 'ippnu' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:bg-emerald-50'" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition">IPPNU</button>
            <button @click="selectedBanom = 'ansor'" :class="selectedBanom === 'ansor' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:bg-emerald-50'" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition">GP Ansor</button>
            <button @click="selectedBanom = 'fatayat'" :class="selectedBanom === 'fatayat' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:bg-emerald-50'" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition">Fatayat NU</button>
            <button @click="selectedBanom = 'muslimat'" :class="selectedBanom === 'muslimat' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:bg-emerald-50'" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition">Muslimat NU</button>
            <button @click="selectedBanom = 'banser'" :class="selectedBanom === 'banser' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:bg-emerald-50'" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition">Banser</button>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="max-w-6xl mx-auto px-4 py-8 space-y-10">

        <!-- KONTEN PROFIL ORGANISASI (Dinamis sesuai Tab) -->
        <section class="bg-white p-6 sm:p-8 rounded-[24px] shadow-sm border border-[#d7e2d7]">
            
            <!-- Profil Ranting NU -->
            <div x-show="selectedBanom === 'ranting'" x-transition>
                <h2 class="text-xl font-bold text-[#214b35] mb-2 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-[#8bc14b] rounded-full"></span> Profil Ranting NU Desa
                </h2>
                <p class="text-sm text-gray-600 leading-relaxed">Induk organisasi Nahdlatul Ulama di tingkat desa yang mengoordinasikan seluruh badan otonom serta kegiatan keagamaan Islam Ahlussunnah wal Jama'ah.</p>
            </div>

            <!-- Profil IPNU -->
            <div x-show="selectedBanom === 'ipnu'" x-transition x-cloak>
                <h2 class="text-xl font-bold text-[#214b35] mb-2 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-[#8bc14b] rounded-full"></span> PR IPNU (Ikatan Pelajar Nahdlatul Ulama)
                </h2>
                <p class="text-sm text-gray-600 leading-relaxed">Wadah kaderisasi awal bagi pelajar, santri, dan remaja putra di desa untuk membina kepemimpinan dan karakter keislaman.</p>
            </div>

            <!-- Profil IPPNU -->
            <div x-show="selectedBanom === 'ippnu'" x-transition x-cloak>
                <h2 class="text-xl font-bold text-[#214b35] mb-2 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-[#8bc14b] rounded-full"></span> PR IPPNU (Ikatan Pelajar Putri NU)
                </h2>
                <p class="text-sm text-gray-600 leading-relaxed">Wadah pembinaan dan kaderisasi bagi pelajar dan remaja putri NU di tingkat desa.</p>
            </div>

            <!-- Profil GP Ansor -->
            <div x-show="selectedBanom === 'ansor'" x-transition x-cloak>
                <h2 class="text-xl font-bold text-[#214b35] mb-2 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-[#8bc14b] rounded-full"></span> PR GP Ansor
                </h2>
                <p class="text-sm text-gray-600 leading-relaxed">Organisasi kepemudaan NU yang bergerak di bidang keagamaan, sosial kemasyarakatan, dan pengawalan tradisi ulama.</p>
            </div>

            <!-- Profil Fatayat NU -->
            <div x-show="selectedBanom === 'fatayat'" x-transition x-cloak>
                <h2 class="text-xl font-bold text-[#214b35] mb-2 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-[#8bc14b] rounded-full"></span> PR Fatayat NU
                </h2>
                <p class="text-sm text-gray-600 leading-relaxed">Badan otonom untuk perempuan muda NU yang berfokus pada penguatan ekonomi keluarga dan kesehatan masyarakat.</p>
            </div>

            <!-- Profil Muslimat NU -->
            <div x-show="selectedBanom === 'muslimat'" x-transition x-cloak>
                <h2 class="text-xl font-bold text-[#214b35] mb-2 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-[#8bc14b] rounded-full"></span> PR Muslimat NU
                </h2>
                <p class="text-sm text-gray-600 leading-relaxed">Wadah ibu-ibu NU yang mengelola majelis taklim, kegiatan sosial, dan pendidikan keagamaan di desa.</p>
            </div>

            <!-- Profil Banser -->
            <div x-show="selectedBanom === 'banser'" x-transition x-cloak>
                <h2 class="text-xl font-bold text-[#214b35] mb-2 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-[#8bc14b] rounded-full"></span> Satkorkel Banser
                </h2>
                <p class="text-sm text-gray-600 leading-relaxed">Barisan Ansor Serbaguna yang bertugas mengawal kiai, menjaga keamanan kegiatan keagamaan, dan tanggap bencana desa.</p>
            </div>

        </section>


        <!-- KONTEN STRUKTUR PENGURUS (Filtered Grid) -->
        <section>
            <div class="mb-6 flex justify-between items-center border-b border-[#d7e2d7] pb-3">
                <h3 class="text-lg font-extrabold text-[#214b35] font-['Baloo_2',cursive]">
                    Struktur Kepengurusan
                </h3>
                <span class="text-xs text-[#4b5c53] font-semibold" x-text="'Menampilkan pengurus: ' + selectedBanom.toUpperCase()"></span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($pengurus as $item)
                    <!-- Kartu hanya muncul jika label_banom cocok dengan Tab aktif -->
                    <div x-show="('{{ addslashes($item->label_banom) }}').toLowerCase().includes(selectedBanom.toLowerCase())"
                         x-transition
                         class="bg-white rounded-[20px] p-6 text-center shadow-sm border border-[#d7e2d7] flex flex-col items-center justify-between hover:shadow-md transition">
                        
                        <div class="flex flex-col items-center w-full">
                            <div class="mb-4">
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" class="w-24 h-24 rounded-full object-cover border-4 border-[#8bc14b]/30 shadow" alt="{{ $item->nama }}">
                                @else
                                    <div class="w-24 h-24 rounded-full bg-emerald-50 flex items-center justify-center text-[#214b35] font-bold text-xs border border-dashed border-[#d7e2d7]">No Photo</div>
                                @endif
                            </div>
                            
                            <h4 class="text-base font-bold text-[#1d2b26] mb-1 line-clamp-1">{{ $item->nama }}</h4>
                            <p class="text-xs font-semibold text-[#4b5c53] mb-3">{{ $item->jabatan }}</p>
                        </div>

                        <span class="bg-[#8bc14b] text-[#16372c] text-[11px] font-bold px-3 py-1 rounded-full">
                            {{ $item->label_banom }}
                        </span>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 bg-white rounded-2xl border border-[#d7e2d7]">
                        <p class="text-gray-500 text-sm">Data pengurus belum tersedia.</p>
                    </div>
                @endforelse
            </div>
        </section>

    </main>

</body>
</html>