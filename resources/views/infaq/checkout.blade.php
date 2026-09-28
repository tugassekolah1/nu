<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <x-public-head title="Selesaikan Pembayaran — NU Banjaranyar" />
</head>

<body class="bg-[#F5F7F4] text-[#17392D] antialiased selection:bg-[#E7ECE4] selection:text-[#16452F]">
    <x-navbar />

    <main>
        <!-- HERO PENDEK -->
        <header class="relative overflow-hidden bg-[#16452F] text-white pt-32 sm:pt-36 pb-12">
            <div class="absolute -top-16 -right-10 w-80 h-80 rounded-full bg-[#C99A2E]/10 blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-6xl mx-auto px-5">
                <nav aria-label="Navigasi balik" class="mb-5 text-sm text-white/70">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a class="hover:text-white hover:underline underline-offset-4" href="{{ route('landing') }}">Beranda</a></li>
                        <li aria-hidden="true">›</li>
                        <li><a class="hover:text-white hover:underline underline-offset-4" href="{{ route('infaq.index') }}">Infaq</a></li>
                        <li aria-hidden="true">›</li>
                        <li class="text-white font-semibold" aria-current="page">Pembayaran</li>
                    </ol>
                </nav>

                <span class="inline-flex items-center gap-2 rounded-full border border-[#C99A2E]/40 bg-[#C99A2E]/20 px-4 py-1.5 text-xs font-bold uppercase tracking-widest text-[#F3DFAE]">
                    Menunggu Pembayaran
                </span>

                <h1 class="mt-4 max-w-3xl text-3xl sm:text-5xl font-extrabold leading-tight tracking-tight">
                    Instruksi Pembayaran
                </h1>
                <p class="mt-3 max-w-2xl text-base sm:text-lg leading-relaxed text-white/80">
                    Selesaikan pembayaran sesuai metode yang Anda pilih, lalu simpan kode transaksi berikut.
                </p>
            </div>
        </header>

        <section class="mx-auto max-w-2xl px-5 py-12">
            <div class="rounded-[28px] border border-[#DCE4DE] bg-white p-6 shadow-[0_8px_24px_rgba(23,24,22,0.05)] sm:p-8">
                <div class="text-center">
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#7B8780]">Total Pembayaran</p>
                    <p class="mt-1 text-3xl font-extrabold text-[#1F5A3F] sm:text-4xl">
                        Rp {{ number_format($infaq->nominal, 0, ',', '.') }}
                    </p>
                    <p class="mt-3 inline-flex rounded-full border border-[#DCE4DE] bg-[#F5F7F4] px-4 py-1.5 font-mono text-xs font-bold text-[#526158]">
                        Kode: {{ $infaq->kode_transaksi }}
                    </p>
                </div>

                <dl class="mt-7 space-y-3 border-y border-[#DCE4DE] py-5 text-sm">
                    <div class="flex items-center justify-between gap-3">
                        <dt class="text-[#7B8780]">Donatur</dt>
                        <dd class="text-right font-semibold text-[#17392D]">{{ $infaq->nama_donatur }}</dd>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <dt class="text-[#7B8780]">Metode</dt>
                        <dd class="text-right font-semibold uppercase text-[#17392D]">{{ str_replace('_', ' ', $infaq->metode_pembayaran) }}</dd>
                    </div>
                    @if ($infaq->catatan)
                        <div class="flex items-start justify-between gap-3">
                            <dt class="shrink-0 text-[#7B8780]">Pesan</dt>
                            <dd class="text-right text-[#526158]">{{ $infaq->catatan }}</dd>
                        </div>
                    @endif
                </dl>

                <div class="mt-6 rounded-2xl border border-[#C99A2E]/30 bg-[#FBF4E4] p-5 text-center">
                    <p class="text-sm leading-relaxed text-[#526158]">
                        <strong class="font-bold text-[#17392D]">Mode sandbox:</strong>
                        tekan tombol di bawah untuk mensimulasikan pembayaran berhasil.
                    </p>

                    <form action="{{ route('infaq.simulate', $infaq->kode_transaksi) }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="min-h-[44px] w-full rounded-[14px] bg-[#1F5A3F] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#16452F] active:scale-[0.98]">
                            Simulasikan Pembayaran Lunas
                        </button>
                    </form>
                </div>

                <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('infaq.index') }}" class="min-h-[44px] flex-1 rounded-[14px] border border-[#DCE4DE] bg-white px-6 py-3 text-center text-sm font-semibold text-[#16452F] transition hover:bg-[#E8F2EA] active:scale-[0.98]">
                        Kembali ke Formulir
                    </a>
                    <a href="{{ route('landing') }}" class="min-h-[44px] flex-1 rounded-[14px] px-6 py-3 text-center text-sm font-semibold text-[#526158] transition hover:bg-[#E8F2EA] hover:text-[#16452F] active:scale-[0.98]">
                        Ke Beranda
                    </a>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</body>
</html>
