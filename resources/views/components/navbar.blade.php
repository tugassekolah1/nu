<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Nahdlatul Ulama Banjaranyar, Cilongok - Berkhidmat untuk Umat</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@200..700,0..1&display=swap" rel="stylesheet"/>
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
</head>
<body class="selection:bg-muted-sage selection:text-nu-deep bg-warm-bg text-charcoal">
<!-- 1. NAVBAR (Neutral Frosted Editorial Glass) -->
<!-- 1. NAVBAR (Neutral Frosted Editorial Glass) -->
<!-- 1. NAVBAR (Neutral Frosted Editorial Glass) -->
@props(['active' => ''])

<header 
    x-data="{ mobileMenuOpen: false }" 
    id="main-navbar"
    class="fixed top-0 inset-x-0 z-50 header-floating">
    <div class="navbar-wrapper max-w-7xl mx-auto px-4 sm:px-8 pt-4 pb-2">
        <div class="neutral-frosted rounded-2xl md:rounded-full px-5 py-3 shadow-subtle flex items-center justify-between relative navbar-inner">
            
            <!-- Brand & Official Badge -->
            <a class="flex items-center gap-3 group" href="{{ route('landing') }}">
                <img alt="Logo NU Banjaranyar" class="w-10 h-10 object-contain drop-shadow-sm group-hover:scale-105 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida/AEtjO1VVjAZeFl8x9UC1ygLyGJQ7s08PMheg8thGTpLjMGEDNy6dxehyc8qxHnJ3TWq0onXXPh6_HPNWDese-jycKUQ2eb98-bnO7YW_VY0GaCIEySrmJqvz-GHn0s7CMUqoutQaae-CsDK4XqFr1CTpqkfXyJQS3h0oeeJcHzC-gIHlGibUdsPPEn0o-vdxP46pPspwdFoEMDPWgm6H4UW6yedGPXqeoPVeyU2SVeokYJCsQ1wcEIIhfseMkPXD"/>
                <div class="flex flex-col">
                    <span class="font-bold text-base sm:text-lg tracking-tight text-charcoal leading-tight">PWC NU</span>
                    <span class="text-xs font-medium text-muted-charcoal tracking-wide">Kecamatan Cilongok, Banyumas</span>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-1 text-sm font-medium text-muted-charcoal">
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('landing') ? 'text-charcoal font-semibold bg-warm-beige/70' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('landing') }}">
                    Beranda
                </a>
                <a class="px-4 py-2 rounded-full hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="{{ route('landing') }}#agenda">Agenda</a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('berita.public') || request()->routeIs('berita.show') ? 'text-charcoal font-semibold bg-warm-beige/70' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('berita.public') }}">
                    Warta Kabar
                </a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('infaq.*') ? 'text-charcoal font-semibold bg-warm-beige/70' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('infaq.index') }}">
                    Infaq
                </a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('galeri.index') ? 'text-charcoal font-semibold bg-warm-beige/70' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('galeri.index') }}">
                    Galeri
                </a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('profil') ? 'text-charcoal font-semibold bg-warm-beige/70' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('profil') }}">
                    Pengurus
                </a>
            </nav>

            <!-- Action CTAs & Mobile Toggle -->
            <div class="flex items-center gap-2 sm:gap-3">
                <a class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 min-h-[44px] rounded-btn bg-nu-deep text-white font-medium text-sm hover:bg-[#113725] transition-all active:scale-95 shadow-sm {{ request()->routeIs('members.register-form') ? 'ring-2 ring-muted-gold' : '' }}" href="{{ route('members.register-form') }}">
                    <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                    <span>Daftar Anggota</span>
                </a>
                <a class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 min-h-[44px] rounded-btn bg-warm-card hover:bg-warm-beige/60 text-charcoal font-semibold text-xs sm:text-sm border border-border-subtle transition-all" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">
                    <span class="material-symbols-outlined text-muted-charcoal text-[18px]">chat</span>
                    <span>Hubungi Kami</span>
                </a>

                <!-- Mobile Hamburger Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" id="mobile-menu-btn" class="lg:hidden p-2.5 rounded-xl bg-warm-beige/50 hover:bg-warm-beige/80 text-charcoal focus:outline-none transition-colors" aria-label="Toggle Menu">
                    <span class="material-symbols-outlined block text-2xl" id="menu-icon">menu</span>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div id="mobile-menu" class="hidden lg:hidden mt-2 neutral-frosted rounded-2xl p-5 shadow-elevated border border-border-neutral flex-col gap-3 transition-all">
            <nav class="flex flex-col gap-1 text-sm font-medium text-muted-charcoal">
                <a class="px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('landing') ? 'text-charcoal font-semibold bg-warm-beige/80' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('landing') }}">Beranda</a>
                <a class="px-4 py-2.5 rounded-xl hover:text-charcoal hover:bg-warm-beige/50 transition-colors" href="{{ route('landing') }}#agenda">Agenda</a>
                <a class="px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('berita.public') || request()->routeIs('berita.show') ? 'text-charcoal font-semibold bg-warm-beige/80' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('berita.public') }}">Warta Kabar</a>
                <a class="px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('infaq.*') ? 'text-charcoal font-semibold bg-warm-beige/80' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('infaq.index') }}">Infaq</a>
                <a class="px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('galeri.index') ? 'text-charcoal font-semibold bg-warm-beige/80' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('galeri.index') }}">Galeri</a>
                <a class="px-4 py-2.5 rounded-xl transition-colors {{ request()->routeIs('profil') ? 'text-charcoal font-semibold bg-warm-beige/80' : 'hover:text-charcoal hover:bg-warm-beige/50' }}" href="{{ route('profil') }}">Pengurus</a>
            </nav>

            <div class="pt-3 border-t border-border-subtle flex flex-col gap-2">
                <a class="flex items-center justify-center gap-2 px-5 py-3 rounded-btn bg-nu-deep text-white font-medium text-sm hover:bg-[#113725] transition-all" href="{{ route('members.register-form') }}">
                    <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                    <span>Daftar Anggota</span>
                </a>
                <a class="flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-btn bg-warm-card hover:bg-warm-beige/60 text-charcoal font-semibold text-sm border border-border-subtle transition-all" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">
                    <span class="material-symbols-outlined text-muted-charcoal text-[18px]">chat</span>
                    <span>Hubungi Kami (WhatsApp)</span>
                </a>
            </div>
        </div>

        @if(isset($slot) && $slot->isNotEmpty())
            <div class="mt-2">
                {{ $slot }}
            </div>
        @endif
    </div>
</header>

<!-- CSS: Floating default & saat scroll ke atas, Sticky full-width saat scroll ke bawah -->
<style>
    #main-navbar .navbar-wrapper,
    #main-navbar .navbar-inner {
        transition: max-width 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    padding 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    border-radius 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    margin 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    box-shadow 0.3s ease;
    }

    /* ============================================
       STATE 1: FLOATING (default di atas & saat scroll ke ATAS)
       Pill mengambang, ada margin kanan-kiri, sudut membulat
       ============================================ */
    #main-navbar.header-floating .navbar-wrapper {
        max-width: 80rem; /* setara max-w-7xl */
        padding-left: 1rem;
        padding-right: 1rem;
        padding-top: 1rem;
        padding-bottom: 0.5rem;
    }

    /* ============================================
       STATE 2: STICKY FULL WIDTH (saat scroll ke BAWAH)
       Nempel penuh kanan-kiri layar, tanpa sudut membulat, tanpa margin
       ============================================ */
    #main-navbar.header-sticky-full .navbar-wrapper {
        max-width: 100%;
        padding-left: 0;
        padding-right: 0;
        padding-top: 0;
        padding-bottom: 0;
    }

    #main-navbar.header-sticky-full .navbar-inner {
        border-radius: 0 !important;
        max-width: 100%;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
        box-shadow: 0 8px 24px rgba(23, 24, 22, 0.10);
    }

    @media (min-width: 640px) {
        #main-navbar.header-sticky-full .navbar-inner {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    #main-navbar.header-sticky-full #mobile-menu {
        border-radius: 0 !important;
    }

    @media (prefers-reduced-motion: reduce) {
        #main-navbar .navbar-wrapper,
        #main-navbar .navbar-inner {
            transition: none;
        }
    }
</style>

<!-- JavaScript: Deteksi arah scroll -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex');
                menuIcon.textContent = mobileMenu.classList.contains('flex') ? 'close' : 'menu';
            });
        }

        // === Navbar scroll behavior ===
        const header = document.getElementById('main-navbar');
        if (!header) return;

        let lastScrollY = window.scrollY;
        let ticking = false;
        const TOP_THRESHOLD = 12; // toleransi biar tidak "gemetar" pas di paling atas

        function updateNavbar() {
            const currentScrollY = window.scrollY;

            if (currentScrollY <= TOP_THRESHOLD) {
                // Di paling atas halaman → floating (default)
                header.classList.remove('header-sticky-full');
                header.classList.add('header-floating');
            } else if (currentScrollY > lastScrollY) {
                // Scroll ke BAWAH → sticky full width
                header.classList.remove('header-floating');
                header.classList.add('header-sticky-full');
            } else {
                // Scroll ke ATAS → kembali floating
                header.classList.remove('header-sticky-full');
                header.classList.add('header-floating');
            }

            lastScrollY = currentScrollY;
            ticking = false;
        }

        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(updateNavbar);
                ticking = true;
            }
        }, { passive: true });
    });
</script>