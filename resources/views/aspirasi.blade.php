<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <x-public-head title="Kotak Aspirasi — NU Banjaranyar" />
</head>

<body class="bg-warm-bg text-charcoal antialiased selection:bg-muted-sage selection:text-nu-deep">
    <x-navbar />

    <main>
        <!-- HERO -->
        <header class="relative overflow-hidden bg-nu-deep text-white pt-32 sm:pt-36 pb-16 sm:pb-20">
            <div class="absolute -top-20 -right-16 w-96 h-96 rounded-full bg-nu-500/15 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-28 -left-16 w-80 h-80 rounded-full bg-muted-gold/15 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-8">
                <nav aria-label="Navigasi balik" class="mb-6 text-sm text-white/70">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a class="hover:text-white hover:underline underline-offset-4 transition-colors" href="{{ route('landing') }}">Beranda</a></li>
                        <li aria-hidden="true">›</li>
                        <li class="text-white font-semibold" aria-current="page">Kotak Aspirasi</li>
                    </ol>
                </nav>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-end">
                    <div class="lg:col-span-7">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-1.5 text-xs font-bold uppercase tracking-widest backdrop-blur-sm">
                            <span class="material-symbols-outlined text-[16px] text-muted-gold">volunteer_activism</span>
                            <span>Suara Warga untuk Ranting</span>
                        </span>

                        <h1 class="mt-6 font-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.1]">
                            Kotak Aspirasi
                        </h1>

                        <p class="mt-5 text-base sm:text-lg text-white/80 leading-relaxed max-w-xl">
                            Punya usul, kritik, atau ide untuk kemajuan Nahdlatul Ulama Desa Banjaranyar?
                            Sampaikan di sini — pengurus akan membaca dan menindaklanjuti setiap aspirasi.
                        </p>
                    </div>

                    <div class="lg:col-span-5">
                        <div class="rounded-container-r bg-white/10 border border-white/15 backdrop-blur-md p-6 sm:p-8 shadow-elevated">
                            <div class="grid grid-cols-2 gap-6">
                                <div>
                                    <span class="block text-4xl font-extrabold text-white leading-none">{{ $totalDiterima }}</span>
                                    <span class="block text-xs font-semibold uppercase tracking-wider text-white/70 mt-2">Aspirasi Diterima</span>
                                </div>
                                <div>
                                    <span class="block text-4xl font-extrabold text-muted-gold leading-none">{{ $ditanggapi->count() }}</span>
                                    <span class="block text-xs font-semibold uppercase tracking-wider text-white/70 mt-2">Sudah Dijawab</span>
                                </div>
                            </div>
                            <div class="mt-6 pt-5 border-t border-white/15 flex items-center gap-2.5 text-xs text-white/75">
                                <span class="material-symbols-outlined text-[18px] text-muted-gold">lock</span>
                                <span>Identitas hanya dipakai pengurus untuk menindaklanjuti.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- FORM & CARA KERJA -->
        <section class="max-w-7xl mx-auto px-4 sm:px-8 py-16 sm:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                {{-- Formulir aspirasi --}}
                <div class="lg:col-span-7" id="form-aspirasi">
                    <div class="bg-warm-card rounded-container-r border border-border-neutral shadow-subtle p-6 sm:p-10">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-muted-sage text-charcoal text-xs font-bold uppercase tracking-wider border border-border-neutral">
                            <span class="material-symbols-outlined text-[16px] text-muted-charcoal">edit_note</span>
                            <span>Tulis Aspirasi</span>
                        </span>

                        <h2 class="mt-5 font-heading text-2xl sm:text-3xl font-extrabold text-charcoal tracking-tight">
                            Kirim Aspirasi Anda
                        </h2>
                        <p class="mt-2 text-sm sm:text-base text-muted-charcoal leading-relaxed">
                            Isi formulir berikut dengan singkat dan jelas. Semua kolom bertanda <span class="text-rose-600 font-semibold">*</span> wajib diisi.
                        </p>

                        @if (session('success'))
                            <div role="status" class="mt-6 flex items-start gap-3 rounded-[18px] border border-[#8bc14b]/40 bg-[#8bc14b]/15 p-4 text-sm text-charcoal">
                                <span class="material-symbols-outlined text-nu-deep text-[20px] shrink-0">check_circle</span>
                                <span class="font-semibold">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div role="alert" class="mt-6 rounded-[18px] border border-rose-300 bg-rose-50 p-4 text-sm text-rose-700">
                                <p class="font-bold mb-1.5">Aspirasi belum terkirim:</p>
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('aspirasi.store') }}" method="POST" class="mt-7 space-y-5">
                            @csrf

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="nama" class="mb-1.5 block text-sm font-semibold text-[#17392D]">
                                        Nama <span class="text-rose-600">*</span>
                                    </label>
                                    <input
                                        id="nama"
                                        name="nama"
                                        type="text"
                                        maxlength="100"
                                        value="{{ old('nama') }}"
                                        placeholder="Nama Anda / Anonim"
                                        required
                                        class="min-h-[44px] w-full rounded-[14px] border border-[#DCE4DE] bg-white px-4 py-2.5 text-[#171816] placeholder:text-[#7B8780] focus:border-[#1F5A3F] focus:outline-none focus:ring-2 focus:ring-[#1F5A3F]/20"
                                    >
                                </div>

                                <div>
                                    <label for="email" class="mb-1.5 block text-sm font-semibold text-[#17392D]">
                                        Email <span class="text-muted-charcoal font-normal">(opsional)</span>
                                    </label>
                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        maxlength="100"
                                        value="{{ old('email') }}"
                                        placeholder="nama@email.com"
                                        class="min-h-[44px] w-full rounded-[14px] border border-[#DCE4DE] bg-white px-4 py-2.5 text-[#171816] placeholder:text-[#7B8780] focus:border-[#1F5A3F] focus:outline-none focus:ring-2 focus:ring-[#1F5A3F]/20"
                                    >
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="no_hp" class="mb-1.5 block text-sm font-semibold text-[#17392D]">
                                        No. HP / WhatsApp <span class="text-muted-charcoal font-normal">(opsional)</span>
                                    </label>
                                    <input
                                        id="no_hp"
                                        name="no_hp"
                                        type="text"
                                        maxlength="20"
                                        value="{{ old('no_hp') }}"
                                        placeholder="08xxxxxxxxxx"
                                        class="min-h-[44px] w-full rounded-[14px] border border-[#DCE4DE] bg-white px-4 py-2.5 text-[#171816] placeholder:text-[#7B8780] focus:border-[#1F5A3F] focus:outline-none focus:ring-2 focus:ring-[#1F5A3F]/20"
                                    >
                                </div>

                                <div>
                                    <label for="kategori" class="mb-1.5 block text-sm font-semibold text-[#17392D]">
                                        Kategori <span class="text-rose-600">*</span>
                                    </label>
                                    <select
                                        id="kategori"
                                        name="kategori"
                                        required
                                        class="min-h-[44px] w-full rounded-[14px] border border-[#DCE4DE] bg-white px-4 py-2.5 text-[#171816] focus:border-[#1F5A3F] focus:outline-none focus:ring-2 focus:ring-[#1F5A3F]/20"
                                    >
                                        <option value="">Pilih kategori</option>
                                        @foreach (\App\Models\Aspirasi::KATEGORI as $item)
                                            <option value="{{ $item }}" @selected(old('kategori') === $item)>
                                                {{ \App\Models\Aspirasi::labelKategori($item) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="isi" class="mb-1.5 block text-sm font-semibold text-[#17392D]">
                                    Isi Aspirasi <span class="text-rose-600">*</span>
                                </label>
                                <textarea
                                    id="isi"
                                    name="isi"
                                    rows="6"
                                    minlength="10"
                                    maxlength="2000"
                                    required
                                    placeholder="Tuliskan usul, kritik, atau ide Anda, misalnya: usulan kegiatan rutin, perbaikan fasilitas, atau saran pelayanan pengurus..."
                                    class="block w-full rounded-[14px] border border-[#DCE4DE] bg-white px-4 py-2.5 text-[#171816] placeholder:text-[#7B8780] focus:border-[#1F5A3F] focus:outline-none focus:ring-2 focus:ring-[#1F5A3F]/20"
                                >{{ old('isi') }}</textarea>
                                <p class="mt-1.5 text-xs text-muted-charcoal">Minimal 10 karakter, maksimal 2000 karakter.</p>
                            </div>

                            <div class="flex flex-col sm:flex-row sm:items-center gap-3 pt-1">
                                <button type="submit"
                                        class="inline-flex items-center justify-center gap-2 px-7 py-3.5 min-h-[48px] rounded-full bg-nu-deep text-white text-sm font-bold hover:bg-[#113725] shadow-subtle transition-all active:scale-95">
                                    <span>Kirim Aspirasi</span>
                                    <span class="material-symbols-outlined text-[18px]">send</span>
                                </button>
                                <span class="text-xs text-muted-charcoal">Dengan mengirim, Anda menyetujui aspirasi ditindaklanjuti oleh pengurus.</span>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Cara kerja --}}
                <div class="lg:col-span-5">
                    <div class="bg-warm-card rounded-container-r border border-border-neutral shadow-subtle p-6 sm:p-8">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-warm-beige text-charcoal text-xs font-bold uppercase tracking-wider border border-border-subtle">
                            <span class="material-symbols-outlined text-[16px] text-muted-charcoal">route</span>
                            <span>Bagaimana Cara Kerjanya?</span>
                        </span>

                        <ol class="mt-6 space-y-5">
                            @php
                                $langkah = [
                                    ['judul' => 'Anda kirim aspirasi', 'isi' => 'Tulis usul atau kritik melalui formulir di samping. Boleh memakai nama sendiri maupun Anonim.'],
                                    ['judul' => 'Pengurus membaca & meninjau', 'isi' => 'Sekretariat memeriksa setiap aspirasi masuk lalu menentukan langkah tindak lanjut.'],
                                    ['judul' => 'Tanggapan dipublikasikan', 'isi' => 'Aspirasi yang sudah ditindaklanjuti beserta jawaban pengurus tampil di halaman ini.'],
                                ];
                            @endphp

                            @foreach ($langkah as $index => $langkahItem)
                                <li class="flex gap-4">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-nu-deep text-white text-sm font-extrabold">
                                        {{ $index + 1 }}
                                    </span>
                                    <div>
                                        <p class="text-sm font-bold text-charcoal">{{ $langkahItem['judul'] }}</p>
                                        <p class="mt-1 text-sm text-muted-charcoal leading-relaxed">{{ $langkahItem['isi'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ol>

                        <div class="mt-7 rounded-[18px] border border-border-subtle bg-warm-bg p-5">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-muted-gold text-[22px] shrink-0">priority_high</span>
                                <div class="text-sm text-muted-charcoal leading-relaxed">
                                    <p class="font-bold text-charcoal">Butuh jawaban cepat?</p>
                                    <p class="mt-1">
                                        Untuk hal yang mendesak, hubungi sekretariat langsung lewat WhatsApp
                                        <a class="font-semibold text-nu-deep underline underline-offset-4 hover:text-[#113725]" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">0812-3456-7890</a>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TANGGAPAN PENGURUS -->
        <section class="w-full bg-warm-card border-y border-border-neutral py-16 sm:py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                    <div>
                        <h2 class="font-heading text-3xl sm:text-4xl font-extrabold text-charcoal tracking-tight">Tanggapan Pengurus</h2>
                        <p class="mt-2 text-base text-muted-charcoal">Aspirasi warga yang sudah ditindaklanjuti beserta jawabannya.</p>
                    </div>
                    <span class="text-sm font-semibold text-muted-charcoal bg-warm-bg border border-border-neutral rounded-full px-4 py-1.5">
                        {{ $ditanggapi->count() }} tanggapan terbaru
                    </span>
                </div>

                @if ($ditanggapi->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($ditanggapi as $aspirasi)
                            <article class="bg-warm-bg rounded-card border border-border-neutral p-6 flex flex-col hover:border-border-subtle hover:shadow-subtle transition-all">
                                <div class="flex flex-wrap items-center gap-x-3 gap-y-1.5 text-xs font-semibold text-muted-charcoal">
                                    <span class="px-2.5 py-0.5 rounded-full bg-muted-sage text-charcoal text-[11px] font-bold uppercase tracking-wider border border-border-neutral">
                                        {{ \App\Models\Aspirasi::labelKategori($aspirasi->kategori) }}
                                    </span>
                                    <span>{{ $aspirasi->created_at->locale('id')->translatedFormat('d F Y') }}</span>
                                </div>

                                <p class="mt-3 text-sm text-charcoal leading-relaxed">{{ $aspirasi->isi }}</p>
                                <p class="mt-2 text-xs font-semibold text-muted-charcoal">— {{ $aspirasi->nama }}</p>

                                <div class="mt-5 pt-4 border-t border-border-subtle">
                                    <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-nu-deep">
                                        <span class="material-symbols-outlined text-[16px]">forum</span>
                                        <span>Tanggapan Pengurus</span>
                                        @if ($aspirasi->tanggapan_at)
                                            <span class="text-muted-charcoal normal-case tracking-normal font-medium">
                                                · {{ $aspirasi->tanggapan_at->locale('id')->translatedFormat('d F Y') }}
                                            </span>
                                        @endif
                                    </div>
                                    <p class="mt-2 text-sm text-muted-charcoal leading-relaxed">{{ $aspirasi->tanggapan }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="bg-warm-bg rounded-card border border-border-neutral p-12 flex flex-col items-center text-center">
                        <span class="material-symbols-outlined text-muted-charcoal text-5xl mb-3">inbox</span>
                        <p class="text-lg font-bold text-charcoal">Belum ada tanggapan yang dipublikasikan</p>
                        <p class="mt-1.5 max-w-md text-sm text-muted-charcoal">
                            Kirim aspirasi pertama Anda — tanggapan pengurus akan tampil di sini setelah ditindaklanjuti.
                        </p>
                    </div>
                @endif
            </div>
        </section>

        <!-- CTA -->
        <section class="max-w-7xl mx-auto px-4 sm:px-8 py-16 sm:py-24">
            <div class="relative overflow-hidden rounded-container-r bg-warm-beige/70 border border-border-subtle p-8 sm:p-12 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
                <div class="absolute -top-10 -right-10 w-48 h-48 rounded-full bg-muted-gold/10 blur-3xl pointer-events-none"></div>
                <div class="relative max-w-xl">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-muted-sage text-charcoal text-xs font-bold uppercase tracking-wider mb-4 border border-border-neutral">
                        <span class="material-symbols-outlined text-[16px] text-muted-charcoal">groups</span>
                        Bersama Memajukan Ranting
                    </span>
                    <h2 class="font-heading text-2xl sm:text-3xl font-extrabold text-charcoal tracking-tight mb-3">
                        Setiap Suara Warga Berharga
                    </h2>
                    <p class="text-base text-muted-charcoal leading-relaxed">
                        Aspirasi yang membangun membantu pengurus menyusun program kerja yang lebih sesuai dengan kebutuhan jamaah Banjaranyar.
                    </p>
                </div>
                <div class="relative shrink-0">
                    <a class="inline-flex items-center justify-center gap-3 px-8 py-4 min-h-[52px] rounded-full bg-nu-deep hover:bg-[#113725] text-white font-bold text-base shadow-subtle transition-all active:scale-95"
                       href="#form-aspirasi">
                        <span class="material-symbols-outlined text-[22px]">arrow_upward</span>
                        <span>Kirim Aspirasi</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Floating WhatsApp -->
    <div class="fixed bottom-6 right-6 z-40">
        <a aria-label="Hubungi WhatsApp Pengurus"
           class="flex items-center gap-2.5 px-4 py-3 min-h-[44px] rounded-full bg-warm-card/95 border border-border-subtle text-charcoal shadow-subtle hover:shadow-elevated hover:-translate-y-0.5 active:scale-95 transition-all"
           href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">
            <div class="w-8 h-8 rounded-full bg-nu-deep text-white flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-[19px]">chat</span>
            </div>
            <span class="hidden sm:inline text-xs font-bold text-charcoal">Sekretariat NU</span>
        </a>
    </div>

    <x-footer />
</body>
</html>
