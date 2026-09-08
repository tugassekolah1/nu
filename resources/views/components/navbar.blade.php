 <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              colors: {
                "warm-bg": "#F7F5EF",
                "warm-card": "#FDFCF7",
                "charcoal": "#171816",
                "muted-charcoal": "#4F544E",
                "nu-deep": "#16452F",
                "nu-night": "#141815",
                "muted-sage": "#E7ECE4",
                "warm-beige": "#EDE8DD",
                "muted-gold": "#B49352",
                "border-neutral": "#E5E2D9",
                "border-subtle": "#D5D2C8",
              },
              fontFamily: {
                sans: ["Inter", "sans-serif"],
                arabic: ["Amiri", "serif"],
              },
              borderRadius: {
                "btn": "14px",
                "card": "20px",
                "container-r": "28px",
              },
              boxShadow: {
                "subtle": "0 2px 10px rgba(23, 24, 22, 0.04), 0 1px 3px rgba(23, 24, 22, 0.03)",
                "elevated": "0 10px 30px rgba(23, 24, 22, 0.06), 0 1px 3px rgba(23, 24, 22, 0.04)",
              }
            }
          }
        };
    </script>
    <style>
        @layer base {
          body {
            font-family: 'Inter', sans-serif;
            color: #171816;
            background-color: #F7F5EF;
            -webkit-font-smoothing: antialiased;
          }
        }
        .neutral-frosted {
          background: rgba(247, 245, 239, 0.88);
          backdrop-filter: blur(16px);
          -webkit-backdrop-filter: blur(16px);
          border: 1px solid rgba(215, 210, 200, 0.7);
        }
        .dark-editorial-panel {
          background: #16452F;
          border: 1px solid rgba(255, 255, 255, 0.12);
        }
    </style>
<header class="fixed top-0 inset-x-0 z-50 px-4 sm:px-8 pt-4 pb-2 transition-all">
    <div class="max-w-7xl mx-auto neutral-frosted rounded-full px-5 py-3 shadow-subtle flex items-center justify-between">
        <!-- Brand & Official Badge -->
        <a class="flex items-center gap-3 group" href="{{ route('landing') }}">
            <img alt="Logo NU Banjaranyar" class="w-10 h-10 object-contain drop-shadow-sm group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida/AEtjO1VVjAZeFl8x9UC1ygLyGJQ7s08PMheg8thGTpLjMGEDNy6dxehyc8qxHnJ3TWq0onXXPh6_HPNWDese-jycKUQ2eb98-bnO7YW_VY0GaCIEySrmJqvz-GHn0s7CMUqoutQaae-CsDK4XqFr1CTpqkfXyJQS3h0oeeJcHzC-gIHlGibUdsPPEn0o-vdxP46pPspwdFoEMDPWgm6H4UW6yedGPXqeoPVeyU2SVeokYJCsQ1wcEIIhfseMkPXD"/>
            <div class="flex flex-col">
                <span class="font-bold text-base sm:text-lg tracking-tight text-charcoal leading-tight">NU BANJARANYAR</span>
                <span class="text-xs font-medium text-muted-charcoal tracking-wide">Kecamatan Cilongok, Banyumas</span>
            </div>
        </a>
        <!-- Desktop Nav -->
        <nav class="hidden lg:flex items-center gap-1 text-sm font-medium text-muted-charcoal">
            <a class="px-4 py-2 rounded-full text-charcoal font-semibold bg-warm-beige/70 transition-colors" href="{{ route('landing') }}">Beranda</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="#agenda">Agenda</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="#berita">Warta Kabar</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="#layanan">Layanan Warga</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="#tentang">Tentang NU</a>
            <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="{{ route('profil') }}">Pengurus</a>
        </nav>
        <!-- Action CTAs -->
        <div class="flex items-center gap-2 sm:gap-3">
            <a class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 min-h-[44px] rounded-btn bg-nu-deep text-white font-medium text-sm hover:bg-[#113725] transition-all active:scale-95 shadow-sm" href="{{ route('members.register-form') }}">
                <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                <span>Daftar Anggota</span>
            </a>
            <a class="inline-flex items-center gap-1.5 px-4 py-2 min-h-[44px] rounded-btn bg-warm-card hover:bg-warm-beige/60 text-charcoal font-semibold text-xs sm:text-sm border border-border-subtle transition-all" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">
                <span class="material-symbols-outlined text-muted-charcoal text-[18px]">chat</span>
                <span class="hidden md:inline">Hubungi Kami</span>
            </a>
        </div>
    </div>
</header>
