<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Banom & Lembaga NU Desa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#f7faf7] text-gray-800 font-sans antialiased" x-data="{ activeTab: 'profil-nu' }">

    <!-- Header / Hero Section -->
    <header class="bg-gradient-to-br from-[#102a20] via-[#213d2f] to-[#365946] text-white py-12 shadow-lg relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 sm:mb-0 sm:absolute sm:top-6 sm:left-6">
            <a href="{{ url('/') }}" 
               class="inline-flex items-center gap-2 px-3.5 py-2 bg-white/10 hover:bg-white/20 text-white border border-white/20 rounded-xl text-xs sm:text-sm font-medium backdrop-blur-sm transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Kembali ke Beranda</span>
            </a>
        </div>

        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-xs font-bold uppercase tracking-widest text-[#8bc14b] bg-white/10 px-3 py-1 rounded-full inline-block mb-3">
                PR NU Desa / Ranting
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white">
                PROFIL ORGANISASI & BANOM
            </h1>
            <p class="mt-3 text-white/80 text-sm sm:text-base font-medium max-w-2xl mx-auto">
                Struktur, Paham Keagamaan, dan Badan Otonom Nahdlatul Ulama di Tingkat Desa
            </p>
        </div>
    </header>

    <!-- Navigation Tabs (Pemisah Kategori Utama) -->
    <div class="max-w-6xl mx-auto px-4 -mt-6 relative z-10">
        <div class="bg-white p-1.5 rounded-2xl shadow-md border border-[#d7e2d7] flex flex-wrap justify-center gap-1 sm:gap-2">
            <button @click="activeTab = 'profil-nu'" 
                    :class="activeTab === 'profil-nu' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:text-[#214b35] hover:bg-emerald-50'"
                    class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition">
                Induk NU Desa
            </button>
            <button @click="activeTab = 'pemuda-pelajar'" 
                    :class="activeTab === 'pemuda-pelajar' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:text-[#214b35] hover:bg-emerald-50'"
                    class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition">
                IPNU, IPPNU & Ansor
            </button>
            <button @click="activeTab = 'banom-utama'" 
                    :class="activeTab === 'banom-utama' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:text-[#214b35] hover:bg-emerald-50'"
                    class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition">
                Fatayat, Muslimat & Banser
            </button>
            <button @click="activeTab = 'lembaga-lajnah'" 
                    :class="activeTab === 'lembaga-lajnah' ? 'bg-[#214b35] text-white shadow' : 'text-gray-600 hover:text-[#214b35] hover:bg-emerald-50'"
                    class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition">
                Lembaga & Lazisnu
            </button>
        </div>
    </div>

    <main class="max-w-6xl mx-auto px-4 py-8 space-y-8">

        <!-- TAB 1: PROFIL NU & ASUJA -->
        <div x-show="activeTab === 'profil-nu'" class="space-y-6">
            <section class="bg-white p-6 sm:p-8 rounded-[20px] shadow-sm border border-[#d7e2d7]">
                <h2 class="text-xl font-bold text-[#214b35] border-b border-[#e5ebd5] pb-3 mb-4 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 bg-[#8bc14b] rounded-full"></span>
                    Identitas & Paham Keagamaan (Aswaja)
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                    <div>
                        <span class="font-medium text-gray-500 block mb-1">Prinsip Berdiri NU:</span>
                        <p class="text-gray-700 leading-relaxed">
                            Nahdlatul Ulama berpegang teguh pada ajaran <strong>Ahlussunnah wal Jama'ah</strong> dalam akidah (Asy'ariyah/Maturidiyah), Fikih (4 Mazhab), dan Tasawuf (Al-Ghazali & Junaid Al-Baghdadi).
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-center">
                        <div class="p-3 bg-emerald-50 rounded-xl border border-emerald-100">
                            <div class="font-bold text-[#214b35]">Tawassuth</div>
                            <div class="text-xs text-emerald-700">Moderat</div>
                        </div>
                        <div class="p-3 bg-emerald-50 rounded-xl border border-emerald-100">
                            <div class="font-bold text-[#214b35]">Tawazun</div>
                            <div class="text-xs text-emerald-700">Seimbang</div>
                        </div>
                        <div class="p-3 bg-emerald-50 rounded-xl border border-emerald-100">
                            <div class="font-bold text-[#214b35]">I'tidal</div>
                            <div class="text-xs text-emerald-700">Tegak Lurus</div>
                        </div>
                        <div class="p-3 bg-emerald-50 rounded-xl border border-emerald-100">
                            <div class="font-bold text-[#214b35]">Tasamuh</div>
                            <div class="text-xs text-emerald-700">Toleran</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- TAB 2: IPNU, IPPNU, GP ANSOR -->
        <div x-show="activeTab === 'pemuda-pelajar'" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- IPNU -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm border border-[#d7e2d7] flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#214b35] font-extrabold flex items-center justify-center text-xs mb-3">IPNU</div>
                    <h3 class="text-lg font-bold text-[#214b35]">PR IPNU Desa</h3>
                    <p class="text-xs text-emerald-700 font-semibold mb-3">Ikatan Pelajar Nahdlatul Ulama</p>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Wadah kaderisasi pelajar, santri, dan remaja putra NU di tingkat desa untuk membina akidah, kedisiplinan, serta kepemimpinan.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] text-gray-500">
                    Anggota: Pelajar Putra (Usia 13-27 tahun)
                </div>
            </div>

            <!-- IPPNU -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm border border-[#d7e2d7] flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#214b35] font-extrabold flex items-center justify-center text-xs mb-3">IPPNU</div>
                    <h3 class="text-lg font-bold text-[#214b35]">PR IPPNU Desa</h3>
                    <p class="text-xs text-emerald-700 font-semibold mb-3">Ikatan Pelajar Putri Nahdlatul Ulama</p>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Wadah pembinaan dan kaderisasi bagi pelajar, santri, dan remaja putri NU dalam mengembangkan potensi diri dan tradisi keislaman.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] text-gray-500">
                    Anggota: Pelajar Putri (Usia 13-27 tahun)
                </div>
            </div>

            <!-- GP ANSOR -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm border border-[#d7e2d7] flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#214b35] font-extrabold flex items-center justify-center text-xs mb-3">ANSOR</div>
                    <h3 class="text-lg font-bold text-[#214b35]">PR GP Ansor Desa</h3>
                    <p class="text-xs text-emerald-700 font-semibold mb-3">Gerakan Pemuda Ansor</p>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Organisasi pemuda NU yang bergerak di bidang kepemudaan, keagamaan, sosial kemasyarakatan, dan pengawalan Ulama.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-gray-100 text-[11px] text-gray-500">
                    Anggota: Pemuda Putra (Usia 20-45 tahun)
                </div>
            </div>

        </div>

        <!-- TAB 3: FATAYAT, MUSLIMAT, BANSER -->
        <div x-show="activeTab === 'banom-utama'" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- FATAYAT NU -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm border border-[#d7e2d7]">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#214b35] font-extrabold flex items-center justify-center text-xs mb-3">FNU</div>
                <h3 class="text-lg font-bold text-[#214b35]">PR Fatayat NU</h3>
                <p class="text-xs text-emerald-700 font-semibold mb-3">Badan Otonom Pemudi NU</p>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Wadah pemberdayaan perempuan muda NU yang berfokus pada kesehatan reproduksi, penguatan ekonomi keluarga, dan pengajian rutin desa.
                </p>
            </div>

            <!-- MUSLIMAT NU -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm border border-[#d7e2d7]">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#214b35] font-extrabold flex items-center justify-center text-xs mb-3">MNU</div>
                <h3 class="text-lg font-bold text-[#214b35]">PR Muslimat NU</h3>
                <p class="text-xs text-emerald-700 font-semibold mb-3">Badan Otonom Wanita NU</p>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Wadah ibu-ibu NU yang mengelola kegiatan pengajian keagamaan, majelis taklim, PAUD/TK, serta kegiatan sosial kemasyarakatan desa.
                </p>
            </div>

            <!-- BANSER -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm border border-[#d7e2d7]">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#214b35] font-extrabold flex items-center justify-center text-xs mb-3">BANSER</div>
                <h3 class="text-lg font-bold text-[#214b35]">Satkorkel Banser</h3>
                <p class="text-xs text-emerald-700 font-semibold mb-3">Barisan Ansor Serbaguna</p>
                <p class="text-xs text-gray-600 leading-relaxed">
                    Tenaga inti GP Ansor yang bertugas dalam pengamanan kegiatan ulama, ketertiban pengajian, serta penanggulangan bencana di desa.
                </p>
            </div>

        </div>

        <!-- TAB 4: LEMBAGA & LAJNAH DESA -->
        <div x-show="activeTab === 'lembaga-lajnah'" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- LAZISNU DESA -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm border border-[#d7e2d7] flex gap-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-100 text-[#214b35] flex items-center justify-center font-bold flex-shrink-0">
                    💰
                </div>
                <div>
                    <h3 class="text-base font-bold text-[#214b35]">UPZIS / LAZISNU Desa</h3>
                    <p class="text-xs text-gray-600 mt-1 leading-relaxed">
                        Lembaga pengelola Zakat, Infak, dan Sedekah (Koin NU) untuk santunan anak yatim, bantuan koin sehat, dan fasilitas sarana ibadah warga.
                    </p>
                </div>
            </div>

            <!-- LDNU / MAJELIS TAKLIM -->
            <div class="bg-white p-6 rounded-[20px] shadow-sm border border-[#d7e2d7] flex gap-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-100 text-[#214b35] flex items-center justify-center font-bold flex-shrink-0">
                    📖
                </div>
                <div>
                    <h3 class="text-base font-bold text-[#214b35]">LTM / LDNU Ranting</h3>
                    <p class="text-xs text-gray-600 mt-1 leading-relaxed">
                        Lembaga Takmir Masjid & Dakwah yang mengoordinasikan kegiatan rutinan Manaqib, Lailatul Ijtima', Dibaan, dan kebersihan masjid/musholla desa.
                    </p>
                </div>
            </div>

        </div>

    </main>

    <footer class="bg-[#102a20] text-white/70 py-8 text-center text-xs border-t border-[#213d2f] mt-16">
        <p>&copy; {{ date('Y') }} Pengurus Ranting Nahdlatul Ulama Desa.</p>
    </footer>

</body>
</html>