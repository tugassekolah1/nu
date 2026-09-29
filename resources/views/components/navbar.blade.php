<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">

<!-- NAVBAR PUBLIK (Neutral Frosted Editorial Glass) -->
<header
    x-data="{ mobileMenuOpen: false }"
    id="main-navbar"
    class="fixed top-0 inset-x-0 z-50 header-floating font-sans">
    <div class="navbar-wrapper max-w-7xl mx-auto px-4 sm:px-8 pt-4 pb-2">
        <div class="neutral-frosted rounded-2xl md:rounded-full px-5 py-3 shadow-[0_2px_10px_rgba(23,24,22,0.04),0_1px_3px_rgba(23,24,22,0.03)] flex items-center justify-between relative navbar-inner">

            <!-- Brand & Official Badge -->
            <a class="flex items-center gap-3 group" href="{{ route('landing') }}">
                <img alt="Logo NU Banjaranyar" class="w-10 h-10 object-contain drop-shadow-sm group-hover:scale-105 transition-transform duration-300 rounded" src="{{ asset('images/logo.webp') }}"/>
                <div class="flex flex-col">
                    <span class="font-bold text-base sm:text-lg tracking-tight text-[#171816] leading-tight">PWC NU</span>
                    <span class="text-xs font-medium text-[#4F544E] tracking-wide">Kecamatan Cilongok, Banyumas</span>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-1 text-sm font-medium text-[#4F544E]">
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('landing') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/70' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('landing') }}">
                    Beranda
                </a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('agenda.public') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/70' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('agenda.public') }}">Agenda</a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('berita.public') || request()->routeIs('berita.show') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/70' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('berita.public') }}">
                    Warta Kabar
                </a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('infaq.*') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/70' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('infaq.index') }}">
                    Infaq
                </a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('galeri.index') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/70' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('galeri.index') }}">
                    Galeri
                </a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('profil') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/70' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('profil') }}">
                    Pengurus
                </a>
                <a class="px-4 py-2 rounded-full transition-colors {{ request()->routeIs('members.status-check') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/70' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('members.status-check') }}">
                    Cek Status
                </a>
            </nav>

            <!-- Action CTAs & Mobile Toggle -->
            <div class="flex items-center gap-2 sm:gap-3">
                <a class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 min-h-[44px] rounded-[14px] bg-[#16452F] text-white font-medium text-sm hover:bg-[#113725] transition-all active:scale-95 shadow-sm {{ request()->routeIs('members.register-form') ? 'ring-2 ring-[#B49352]' : '' }}" href="{{ route('members.register-form') }}">
                    <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                    <span>Daftar Anggota</span>
                </a>
                <a class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 min-h-[44px] rounded-[14px] bg-[#FDFCF7] hover:bg-[#EDE8DD]/60 text-[#171816] font-semibold text-xs sm:text-sm border border-[#D5D2C8] transition-all" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">
                    <span class="material-symbols-outlined text-[#4F544E] text-[18px]">chat</span>
                    <span>Hubungi Kami</span>
                </a>

                <!-- Mobile Hamburger Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" id="mobile-menu-btn" class="lg:hidden p-2.5 min-w-[44px] min-h-[44px] rounded-xl bg-[#EDE8DD]/50 hover:bg-[#EDE8DD]/80 text-[#171816] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#16452F] transition-colors" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobile-menu">
                    <span class="material-symbols-outlined block text-2xl" id="menu-icon">menu</span>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div id="mobile-menu" class="hidden lg:hidden mt-2 neutral-frosted rounded-2xl p-5 shadow-[0_10px_30px_rgba(23,24,22,0.06),0_1px_3px_rgba(23,24,22,0.04)] border border-[#E5E2D9] flex-col gap-3 transition-all">
            <nav class="flex flex-col gap-1 text-sm font-medium text-[#4F544E]">
                <a class="px-4 py-2.5 min-h-[44px] rounded-xl transition-colors {{ request()->routeIs('landing') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/80' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('landing') }}">Beranda</a>
                <a class="px-4 py-2.5 min-h-[44px] rounded-xl transition-colors {{ request()->routeIs('agenda.public') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/80' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('agenda.public') }}">Agenda</a>
                <a class="px-4 py-2.5 min-h-[44px] rounded-xl transition-colors {{ request()->routeIs('berita.public') || request()->routeIs('berita.show') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/80' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('berita.public') }}">Warta Kabar</a>
                <a class="px-4 py-2.5 min-h-[44px] rounded-xl transition-colors {{ request()->routeIs('infaq.*') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/80' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('infaq.index') }}">Infaq</a>
                <a class="px-4 py-2.5 min-h-[44px] rounded-xl transition-colors {{ request()->routeIs('galeri.index') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/80' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('galeri.index') }}">Galeri</a>
                <a class="px-4 py-2.5 min-h-[44px] rounded-xl transition-colors {{ request()->routeIs('profil') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/80' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('profil') }}">Pengurus</a>
                <a class="px-4 py-2.5 min-h-[44px] rounded-xl transition-colors {{ request()->routeIs('members.status-check') ? 'text-[#171816] font-semibold bg-[#EDE8DD]/80' : 'hover:text-[#171816] hover:bg-[#EDE8DD]/50' }}" href="{{ route('members.status-check') }}">Cek Status Pendaftaran</a>
            </nav>

            <div class="pt-3 border-t border-[#D5D2C8] flex flex-col gap-2">
                <a class="flex items-center justify-center gap-2 px-5 py-3 min-h-[44px] rounded-[14px] bg-[#16452F] text-white font-medium text-sm hover:bg-[#113725] transition-all" href="{{ route('members.register-form') }}">
                    <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                    <span>Daftar Anggota</span>
                </a>
                <a class="flex items-center justify-center gap-1.5 px-4 py-2.5 min-h-[44px] rounded-[14px] bg-[#FDFCF7] hover:bg-[#EDE8DD]/60 text-[#171816] font-semibold text-sm border border-[#D5D2C8] transition-all" href="https://wa.me/6281234567890" rel="noopener noreferrer" target="_blank">
                    <span class="material-symbols-outlined text-[#4F544E] text-[18px]">chat</span>
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

<style>
    .neutral-frosted {
        background: rgba(247, 245, 239, 0.88);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(215, 210, 200, 0.7);
    }

    #main-navbar .navbar-wrapper,
    #main-navbar .navbar-inner {
        transition: max-width 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    padding 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    border-radius 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    margin 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    box-shadow 0.3s ease;
    }

    /* STATE 1: FLOATING (default di atas & saat scroll ke ATAS) */
    #main-navbar.header-floating .navbar-wrapper {
        max-width: 90rem;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-top: 1rem;
        padding-bottom: 0.5rem;
    }

    /* STATE 2: STICKY FULL WIDTH (saat scroll ke BAWAH) */
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function () {
                const wasHidden = mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden', !wasHidden);
                mobileMenu.classList.toggle('flex', wasHidden);
                menuIcon.textContent = wasHidden ? 'close' : 'menu';
                menuBtn.setAttribute('aria-expanded', String(wasHidden));
            });
        }

        // Navbar scroll behavior
        const header = document.getElementById('main-navbar');
        if (!header) return;

        let lastScrollY = window.scrollY;
        let ticking = false;
        const TOP_THRESHOLD = 12;

        function updateNavbar() {
            const currentScrollY = window.scrollY;

            if (currentScrollY <= TOP_THRESHOLD) {
                header.classList.remove('header-sticky-full');
                header.classList.add('header-floating');
            } else if (currentScrollY > lastScrollY) {
                header.classList.remove('header-floating');
                header.classList.add('header-sticky-full');
            } else {
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
