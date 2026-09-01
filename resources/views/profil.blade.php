<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Organisasi - Nahdlatul Ulama</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Header / Hero Section -->
 <header class="bg-gradient-to-r from-emerald-900 via-emerald-800 to-emerald-900 text-white py-12 shadow-lg relative overflow-hidden">
    <!-- Kontainer Tombol Kembali (Posisi Kiri Atas) -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 sm:mb-0 sm:absolute sm:top-6 sm:left-6">
        <a href="{{ url('/') }}" 
           class="inline-flex items-center gap-2 px-3.5 py-2 bg-white/10 hover:bg-white/20 text-white border border-white/20 rounded-lg text-xs sm:text-sm font-medium backdrop-blur-sm transition-all duration-200 shadow-sm hover:shadow">
            <!-- Icon Panah Kiri -->
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Kembali ke Beranda</span>
        </a>
    </div>

    <!-- Judul Header Utama -->
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-wide text-white drop-shadow-sm">
            NAHDLATUL ULAMA (NU)
        </h1>
        <p class="mt-3 text-emerald-100 text-base sm:text-lg font-medium max-w-2xl mx-auto">
            Membangun Umat, Menjaga Tradisi, Memperkuat Bangsa
        </p>
    </div>
</header>
    <main class="max-w-5xl mx-auto px-4 py-8 space-y-8">

        <!-- Ringkasan Identitas -->
        <section class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h2 class="text-xl font-semibold text-emerald-800 border-b border-gray-200 pb-2 mb-4">
                Identitas Organisasi
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <span class="font-medium text-gray-500 block">Tanggal Berdiri:</span>
                    <span class="text-gray-900 font-semibold">16 Rajab 1344 H / 31 Januari 1926 M</span>
                </div>
                <div>
                    <span class="font-medium text-gray-500 block">Tempat Berdiri:</span>
                    <span class="text-gray-900 font-semibold">Surabaya, Jawa Timur</span>
                </div>
                <div class="md:col-span-2">
                    <span class="font-medium text-gray-500 block">Pendiri Utama:</span>
                    <span class="text-gray-900 font-semibold">Hadratussyeikh KH. M. Hasyim Asy'ari, KH. Abdul Wahab Hasbullah, KH. Bisri Syansuri</span>
                </div>
            </div>
        </section>

        <!-- Paham Keagamaan & Prinsip -->
        <section class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h2 class="text-xl font-semibold text-emerald-800 border-b border-gray-200 pb-2 mb-4">
                Paham Keagamaan & Prinsip Sikap
            </h2>
            <p class="text-sm text-gray-600 mb-4">
                Berpegang teguh pada ajaran <strong class="text-gray-800">Ahlussunnah wal Jama'ah (Aswaja)</strong> dalam bidang akidah, fikih, dan tasawuf.
            </p>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center">
                <div class="p-3 bg-emerald-50 rounded-lg border border-emerald-100">
                    <div class="font-bold text-emerald-900">Tawassuth</div>
                    <div class="text-xs text-emerald-700">Moderat</div>
                </div>
                <div class="p-3 bg-emerald-50 rounded-lg border border-emerald-100">
                    <div class="font-bold text-emerald-900">Tawazun</div>
                    <div class="text-xs text-emerald-700">Seimbang</div>
                </div>
                <div class="p-3 bg-emerald-50 rounded-lg border border-emerald-100">
                    <div class="font-bold text-emerald-900">I'tidal</div>
                    <div class="text-xs text-emerald-700">Tegak Lurus</div>
                </div>
                <div class="p-3 bg-emerald-50 rounded-lg border border-emerald-100">
                    <div class="font-bold text-emerald-900">Tasamuh</div>
                    <div class="text-xs text-emerald-700">Toleran</div>
                </div>
            </div>
        </section>

        <!-- Badan Otonom -->
        <section class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h2 class="text-xl font-semibold text-emerald-800 border-b border-gray-200 pb-2 mb-4">
                Badan Otonom (Banom) Utama
            </h2>
            <ul class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-sm text-gray-700">
                <li class="bg-gray-50 px-3 py-2 rounded">• Muslimat NU</li>
                <li class="bg-gray-50 px-3 py-2 rounded">• Fatayat NU</li>
                <li class="bg-gray-50 px-3 py-2 rounded">• GP Ansor / Banser</li>
                <li class="bg-gray-50 px-3 py-2 rounded">• IPNU & IPPNU</li>
                <li class="bg-gray-50 px-3 py-2 rounded">• Pagar Nusa</li>
                <li class="bg-gray-50 px-3 py-2 rounded">• PMII</li>
            </ul>
        </section>

    </main>

    <footer class="bg-gray-800 text-gray-400 py-6 text-center text-sm">
        <p>&copy; Profil Organisasi Nahdlatul Ulama</p>
    </footer>

</body>
</html>