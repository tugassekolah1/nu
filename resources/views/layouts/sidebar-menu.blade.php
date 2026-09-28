@php
    $isAdmin = Auth::user()->is_admin;

    $icons = [
        'home' => 'M2.25 12l8.954-8.955a1.126 1.126 0 011.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25',
        'document' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z',
        'calendar' => 'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5',
        'photo' => 'M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 19.5h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v12a1.5 1.5 0 001.5 1.5zm13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z',
        'users' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z',
        'user' => 'M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z',
        'banknotes' => 'M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z',
        'external' => 'M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25',
    ];

    $menu = [
        [
            'label' => 'Utama',
            'items' => [
                ['name' => 'Dashboard', 'href' => route('dashboard'), 'active' => request()->routeIs('dashboard', 'admin.dashboard'), 'icon' => 'home'],
            ],
        ],
        [
            'label' => 'Konten',
            'items' => [
                ['name' => 'Manajemen Berita', 'href' => route('berita.index'), 'active' => request()->routeIs('berita.*'), 'icon' => 'document'],
                ['name' => 'Agenda', 'href' => route('agenda.index'), 'active' => request()->routeIs('agenda.*'), 'icon' => 'calendar'],
                ['name' => 'Galeri', 'href' => route('gallery.index'), 'active' => request()->routeIs('gallery.*'), 'icon' => 'photo'],
            ],
        ],
        [
            'label' => 'Organisasi',
            'items' => [
                ['name' => 'Anggota', 'href' => route('members.index'), 'active' => request()->routeIs('members.*'), 'icon' => 'users'],
                ['name' => 'Pengurus', 'href' => route('pengurus.index'), 'active' => request()->routeIs('pengurus.*'), 'icon' => 'user'],
            ],
        ],
        [
            'label' => 'Keuangan',
            'items' => [
                [
                    'name' => 'Infaq',
                    'href' => $isAdmin ? route('admin.infaq.index') : route('infaq.index'),
                    'active' => $isAdmin && request()->routeIs('admin.infaq.*'),
                    'icon' => 'banknotes',
                ],
            ],
        ],
        [
            'label' => 'Lainnya',
            'items' => [
                ['name' => 'Lihat Website', 'href' => url('/'), 'active' => false, 'icon' => 'external', 'external' => true],
                ['name' => 'Profil', 'href' => route('profile.edit'), 'active' => request()->routeIs('profile.*'), 'icon' => 'user'],
            ],
        ],
    ];
@endphp

<nav class="flex-1 space-y-5 overflow-y-auto px-3 py-4">
    @foreach ($menu as $group)
        <div>
            <p class="px-3 pb-2 text-xs font-bold uppercase tracking-widest text-slate-400">
                {{ $group['label'] }}
            </p>

            <ul class="space-y-1.5">
                @foreach ($group['items'] as $item)
                    <li>
                        <a href="{{ $item['href'] }}"
                           @if ($item['external'] ?? false) target="_blank" rel="noopener" @endif
                           @class([
                               'group flex items-center gap-3 rounded-2xl px-3 py-2.5 text-sm font-semibold transition-all active:scale-[0.98]',
                               'bg-emerald-600 text-white shadow-xs' => $item['active'],
                               'text-slate-600 hover:bg-slate-50 hover:text-slate-800' => ! $item['active'],
                           ])>
                            <span @class([
                                'flex h-8 w-8 shrink-0 items-center justify-center rounded-xl transition-colors',
                                'bg-white/20 text-white' => $item['active'],
                                'bg-slate-100 text-slate-500 group-hover:bg-emerald-50 group-hover:text-emerald-600' => ! $item['active'],
                            ])>
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$item['icon']] }}" />
                                </svg>
                            </span>
                            <span>{{ $item['name'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</nav>

<div class="border-t border-slate-200/80 p-3">
    <div class="flex items-center gap-3 rounded-2xl border border-slate-200/80 bg-slate-50 p-3">
        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-sm font-black text-emerald-600">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <div class="min-w-0">
            <p class="truncate text-sm font-bold text-slate-800">{{ Auth::user()->name }}</p>
            <p class="truncate text-xs text-slate-400">{{ Auth::user()->email }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf
        <button type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200/80 bg-white px-3 py-2.5 text-xs font-bold text-slate-600 transition-all active:scale-95 hover:border-rose-200 hover:bg-rose-50 hover:text-rose-600">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
            <span>Keluar</span>
        </button>
    </form>
</div>
