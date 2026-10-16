        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-xl text-slate-800 leading-tight">
                        Manajemen Anggota
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">Kelola data pendaftaran, status pembayaran, dan akun anggota.</p>
                </div>
            </div>

            <a href="{{ route('members.create') }}"
               class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition-all shadow-xs hover:shadow-emerald-200 hover:shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Tambah Anggota Baru</span>
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-[calc(100vh-4rem)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            {{-- Alert Sukses --}}
            @if (session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-3 shadow-xs">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Alert Informasi --}}
            @if (session('info'))
                <div class="p-4 bg-sky-50 border border-sky-200 text-sky-800 rounded-2xl flex items-center gap-3 shadow-xs">
                    <svg class="w-5 h-5 text-sky-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm font-medium">{{ session('info') }}</span>
                </div>
            @endif

            {{-- Banom Count Cards --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3">
                @php
                    $totalMembers = array_sum($banomCounts);
                @endphp
                
                {{-- Card Total --}}
                <div class="relative">
                    <a href="{{ route('members.index') }}"
                       @class([
                           'p-4 pr-11 rounded-xl border-2 transition-all hover:shadow-md text-center',
                           'bg-emerald-50 border-emerald-300' => ($banomFilter ?? 'all') === 'all',
                           'bg-white border-slate-200 hover:border-emerald-200' => ($banomFilter ?? 'all') !== 'all',
                       ])>
                        <div class="text-xs font-semibold text-slate-500 uppercase mb-1">Total Anggota</div>
                        <div class="text-2xl font-bold text-slate-900">{{ $totalMembers }}</div>
                    </a>
                    <a href="{{ route('members.cetak-kta-bulk') }}"
                       target="_blank" rel="noopener"
                       title="Cetak KTA seluruh anggota lunas"
                       class="absolute right-2 bottom-2 p-1.5 rounded-lg text-slate-400 hover:bg-emerald-100 hover:text-emerald-700 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                    </a>
                </div>

                {{-- Card Tanpa Organisasi --}}
                <div class="relative">
                    <a href="{{ route('members.index', ['banom' => 'none']) }}"
                       @class([
                           'p-4 rounded-xl border-2 transition-all hover:shadow-md text-center',
                           'bg-orange-50 border-orange-300' => ($banomFilter ?? 'all') === 'none',
                           'bg-white border-slate-200 hover:border-orange-200' => ($banomFilter ?? 'all') !== 'none',
                       ])>
                        <div class="text-xs font-semibold text-slate-500 uppercase mb-1">Tanpa Organisasi</div>
                        <div class="text-2xl font-bold text-slate-900">{{ $banomCounts['none'] ?? 0 }}</div>
                    </a>
                    <a href="{{ route('members.cetak-kta-bulk', ['banom' => 'none']) }}"
                       target="_blank" rel="noopener"
                       title="Cetak KTA anggota tanpa organisasi"
                       class="absolute right-2 bottom-2 p-1.5 rounded-lg text-slate-400 hover:bg-orange-100 hover:text-orange-700 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                    </a>
                </div>

                {{-- Cards per Banom --}}
                @foreach (\App\Models\NuMember::ORGANISASI_GROUPS as $group => $items)
                    @foreach ($items as $code => $desc)
                        <div class="relative">
                            <a href="{{ route('members.index', ['banom' => $code]) }}"
                               @class([
                                   'p-4 rounded-xl border-2 transition-all hover:shadow-md text-center',
                                   'bg-emerald-50 border-emerald-300' => ($banomFilter ?? 'all') === $code,
                                   'bg-white border-slate-200 hover:border-emerald-200' => ($banomFilter ?? 'all') !== $code,
                               ])>
                                <div class="text-xs font-semibold text-slate-500 uppercase mb-1 truncate" title="{{ \App\Models\Pengurus::BANOMS[$code]['label'] ?? $code }}">
                                    {{ \App\Models\Pengurus::BANOMS[$code]['label'] ?? $code }}
                                </div>
                                <div class="text-2xl font-bold text-slate-900">{{ $banomCounts[$code] ?? 0 }}</div>
                            </a>
                            <a href="{{ route('members.cetak-kta-bulk', ['banom' => $code]) }}"
                               target="_blank" rel="noopener"
                               title="Cetak KTA berjamaah {{ \App\Models\Pengurus::BANOMS[$code]['label'] ?? $code }}"
                               class="absolute right-2 bottom-2 p-1.5 rounded-lg text-slate-400 hover:bg-emerald-100 hover:text-emerald-700 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>

            {{-- Search Box --}}
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-4">
                <form action="{{ route('members.index') }}" method="GET" class="flex items-center gap-2">
                    @if (($statusFilter ?? 'all') !== 'all')
                        <input type="hidden" name="status" value="{{ $statusFilter }}">
                    @endif
                    @if (($banomFilter ?? 'all') !== 'all')
                        <input type="hidden" name="banom" value="{{ $banomFilter }}">
                    @endif
                    <div class="flex-1 flex items-center gap-2">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" name="search" placeholder="Cari berdasarkan Nama atau NIK..." 
                               value="{{ $search ?? '' }}"
                               class="flex-1 text-sm text-slate-700 border-0 bg-transparent placeholder-slate-400 focus:outline-none focus:ring-0">
                    </div>
                    @if (($search ?? '') !== '')
                        <a href="{{ route('members.index', array_filter(['status' => ($statusFilter ?? 'all') === 'all' ? null : $statusFilter, 'banom' => ($banomFilter ?? 'all') === 'all' ? null : $banomFilter])) }}"
                           class="text-xs font-bold text-slate-400 hover:text-rose-600 transition-colors px-2 py-1">
                            Clear
                        </a>
                    @endif
                </form>
            </div>

            {{-- Filter Status & Banom --}}
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-4">
                <div class="flex flex-wrap items-center gap-2">
                    @php
                        $statusTabs = ['all' => 'Semua', 'pending' => 'Menunggu Disetujui', 'approved' => 'Sudah Disetujui'];
                        $banomQuery = array_filter(['banom' => ($banomFilter ?? 'all') === 'all' ? null : ($banomFilter ?? null)]);
                    @endphp
                    @foreach ($statusTabs as $value => $label)
                        <a href="{{ route('members.index', array_merge($banomQuery, $value === 'all' ? [] : ['status' => $value])) }}"
                           @class([
                               'px-3.5 py-2 rounded-xl text-xs font-bold transition-all active:scale-95',
                               'bg-emerald-600 text-white shadow-xs' => ($statusFilter ?? 'all') === $value,
                               'bg-white text-slate-600 border border-slate-200 hover:border-emerald-300 hover:text-emerald-700' => ($statusFilter ?? 'all') !== $value,
                           ])>
                            {{ $label }}
                        </a>
                    @endforeach

                    <form action="{{ route('members.index') }}" method="GET" class="flex items-center gap-2 ml-auto">
                        @if (($statusFilter ?? 'all') !== 'all')
                            <input type="hidden" name="status" value="{{ $statusFilter }}">
                        @endif
                        <select name="banom" onchange="this.form.submit()"
                                class="text-xs font-semibold text-slate-700 border border-slate-200 rounded-xl px-3 py-2 bg-white focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100 cursor-pointer">
                            <option value="all">Semua Banom</option>
                            @foreach (\App\Models\NuMember::ORGANISASI_GROUPS as $group => $items)
                                <optgroup label="{{ $group }}">
                                    @foreach ($items as $code => $desc)
                                        <option value="{{ $code }}" @selected(($banomFilter ?? 'all') === $code)>
                                            {{ \App\Models\Pengurus::BANOMS[$code]['label'] ?? $code }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                            <option value="none" @selected(($banomFilter ?? 'all') === 'none')>Tanpa organisasi</option>
                        </select>
                        @if (($banomFilter ?? 'all') !== 'all')
                            <a href="{{ route('members.cetak-kta-bulk', ['banom' => $banomFilter]) }}"
                               target="_blank" rel="noopener"
                               class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white px-3 py-2 rounded-xl text-xs font-bold transition-all shadow-xs">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                </svg>
                                Cetak KTA Banom Ini
                            </a>
                        @endif
                        @if (($search ?? '') !== '' || ($statusFilter ?? 'all') !== 'all' || ($banomFilter ?? 'all') !== 'all')
                            <a href="{{ route('members.index') }}"
                               class="text-xs font-bold text-slate-400 hover:text-rose-600 transition-colors px-1">
                                Reset
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            {{-- Main Table Card --}}
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="text-base font-bold text-slate-800">Daftar Seluruh Anggota</h3>
                    <span class="text-xs font-semibold px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg">
                        Total: {{ $members->total() ?? count($members) }} Data
                    </span>
                </div>

                <form id="bulk-action-form" method="POST" action="">
                    @csrf
                    {{-- Bulk Action Bar (Hidden by default) --}}
                    <div id="bulk-action-bar" class="hidden sticky bottom-0 left-0 right-0 bg-emerald-50 border-t border-emerald-200 px-5 py-3 flex items-center justify-between shadow-lg z-40">
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-emerald-900">
                                <span id="selected-count">0</span> dipilih
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="clearBulkSelection()"
                                    class="px-3 py-1.5 text-xs font-semibold text-slate-600 hover:text-slate-900 transition-colors">
                                Batal
                            </button>
                            <button type="button" onclick="submitBulkPrint()"
                                    class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white px-4 py-1.5 rounded-lg text-xs font-semibold transition-all shadow-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                </svg>
                                Cetak KTA Terpilih
                            </button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-200/80 text-xs uppercase font-bold text-slate-500 tracking-wider">
                                    <th class="px-4 py-4 w-12">
                                        <input type="checkbox" id="select-all" onchange="toggleSelectAll(this)"
                                               class="w-4 h-4 text-emerald-600 border-slate-300 rounded cursor-pointer">
                                    </th>
                                    <th class="px-6 py-4">Informasi Diri</th>
                                    <th class="px-6 py-4">Kontak</th>
                                    <th class="px-6 py-4">Organisasi</th>
                                    <th class="px-6 py-4">No. Kartu</th>
                                    <th class="px-6 py-4">Status Pembayaran</th>
                                    <th class="px-6 py-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse ($members as $member)
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        {{-- Checkbox --}}
                                        <td class="px-4 py-4">
                                            @if ($member->payment_status === 'paid')
                                                <input type="checkbox" name="ids[]" value="{{ $member->id }}"
                                                       onchange="updateBulkActionBar()"
                                                       class="member-checkbox w-4 h-4 text-emerald-600 border-slate-300 rounded cursor-pointer">
                                            @endif
                                        </td>

                                        {{-- NIK & Nama --}}
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                @if ($member->photo)
                                                    <img src="{{ asset('storage/' . $member->photo) }}"
                                                         alt="Foto {{ $member->full_name }}"
                                                         class="w-10 h-10 shrink-0 rounded-full object-cover border border-slate-200 bg-slate-50">
                                                @else
                                                    <span class="w-10 h-10 shrink-0 rounded-full bg-emerald-50 text-emerald-700 inline-flex items-center justify-center font-bold text-sm">
                                                        {{ strtoupper(substr($member->full_name, 0, 1)) }}
                                                    </span>
                                                @endif
                                                <div>
                                                    <div class="font-bold text-slate-900">{{ $member->full_name }}</div>
                                                    <div class="text-xs text-slate-400 font-mono mt-0.5">NIK: {{ $member->nik }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Telepon --}}
                                        <td class="px-6 py-4 text-slate-600 font-medium">
                                            {{ $member->phone }}
                                        </td>

                                        {{-- Organisasi / Banom --}}
                                        <td class="px-6 py-4">
                                            @if ($member->organisasi_label)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100/80 text-emerald-800 whitespace-nowrap">
                                                    {{ $member->organisasi_label }}
                                                </span>
                                            @else
                                                <span class="text-slate-400 italic text-xs">—</span>
                                            @endif
                                        </td>

                                        {{-- No Kartu --}}
                                        <td class="px-6 py-4">
                                            @if($member->member_card_no)
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 font-mono text-xs font-semibold">
                                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                    </svg>
                                                    {{ $member->member_card_no }}
                                                </span>
                                            @else
                                                <span class="text-slate-400 italic text-xs">Belum ada</span>
                                            @endif
                                        </td>

                                        {{-- Status Pembayaran --}}
                                        <td class="px-6 py-4">
                                            @if ($member->payment_status === 'paid')
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100/80 text-emerald-800">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                    Lunas / Aktif
                                                </span>
                                            @else
                                                <div class="space-y-1">
                                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-100/80 text-rose-800">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                                        Belum Bayar
                                                    </span>

                                                    @php $latestPayment = $member->payments()->latest()->first(); @endphp
                                                    @if ($latestPayment && $latestPayment->payment_proof)
                                                        <a href="{{ Storage::url($latestPayment->payment_proof) }}" target="_blank"
                                                           class="flex items-center gap-1 text-xs font-semibold text-emerald-600 hover:text-emerald-800 transition-colors">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                            </svg>
                                                            Lihat Bukti Transfer
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif
                                        </td>

                                        {{-- Kolom Aksi --}}
                                        <td class="px-6 py-4 text-center">
                                            <div class="inline-flex items-center gap-1.5 bg-slate-100/80 p-1.5 rounded-xl border border-slate-200/60">
                                                @if ($member->payment_status === 'unpaid')
                                                    <form action="{{ route('members.confirm-payment', $member) }}"
                                                          method="POST" class="inline"
                                                          onsubmit="return confirm('Konfirmasi bahwa anggota ini sudah melunasi pembayaran?')">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" 
                                                                title="Konfirmasi Lunas"
                                                                class="p-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700  transition-all shadow-xs">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif

                                                @if ($member->payment_status === 'paid')
                                                    <a href="{{ route('members.print-card', $member) }}"
                                                       target="_blank" rel="noopener"
                                                       title="Cetak Kartu Anggota"
                                                       class="p-1.5 rounded-lg text-slate-600 hover:bg-white hover:text-emerald-600 transition-all">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                                        </svg>
                                                    </a>

                                                    <a href="{{ route('members.download-kta', $member) }}"
                                                       target="_blank" rel="noopener"
                                                       title="Download KTA"
                                                       class="p-1.5 rounded-lg text-slate-600 hover:bg-white hover:text-blue-600 transition-all">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                        </svg>
                                                    </a>
                                                @endif

                                                <a href="{{ route('members.edit', $member) }}"
                                                   title="Edit Data"
                                                   class="p-1.5 rounded-lg text-slate-600 hover:bg-white hover:text-emerald-600 transition-all">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </a>

                                                <form action="{{ route('members.destroy', $member) }}"
                                                      method="POST" class="inline"
                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data anggota ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            title="Hapus Data"
                                                            class="p-1.5 rounded-lg text-slate-600 hover:bg-white hover:text-rose-600 transition-all">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-12">
                                            <div class="flex flex-col items-center justify-center space-y-3">
                                                <div class="p-4 bg-slate-100 text-slate-400 rounded-full">
                                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                                    </svg>
                                                </div>
                                                <p class="text-slate-500 font-medium">Belum ada data anggota yang terdaftar.</p>
                                                <a href="{{ route('members.create') }}" class="text-xs font-bold text-emerald-600 hover:underline">
                                                    + Klik di sini untuk menambah anggota pertama
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($members->hasPages())
                        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                            {{ $members->links() }}
                        </div>
                    @endif
                </form>

                <script>
                    const STORAGE_KEY = 'member_selections_{{ $statusFilter }}_{{ $banomFilter }}';

                    // Load saved selections saat page load
                    document.addEventListener('DOMContentLoaded', function() {
                        restoreSelections();
                        updateBulkActionBar();
                    });

                    function getStoredSelections() {
                        const stored = localStorage.getItem(STORAGE_KEY);
                        return stored ? JSON.parse(stored) : [];
                    }

                    function saveSelections() {
                        const checked = Array.from(document.querySelectorAll('.member-checkbox:checked'))
                            .map(cb => parseInt(cb.value));
                        localStorage.setItem(STORAGE_KEY, JSON.stringify(checked));
                    }

                    function restoreSelections() {
                        const stored = getStoredSelections();
                        document.querySelectorAll('.member-checkbox').forEach(cb => {
                            cb.checked = stored.includes(parseInt(cb.value));
                        });
                    }

                    function toggleSelectAll(checkbox) {
                        const memberCheckboxes = document.querySelectorAll('.member-checkbox');
                        memberCheckboxes.forEach(cb => cb.checked = checkbox.checked);
                        saveSelections();
                        updateBulkActionBar();
                    }

                    function updateBulkActionBar() {
                        const stored = getStoredSelections();
                        const bulkBar = document.getElementById('bulk-action-bar');
                        const selectedCount = document.getElementById('selected-count');
                        
                        selectedCount.textContent = stored.length;
                        
                        if (stored.length > 0) {
                            bulkBar.classList.remove('hidden');
                        } else {
                            bulkBar.classList.add('hidden');
                        }

                        // Update checkbox state halaman ini
                        const memberCheckboxes = document.querySelectorAll('.member-checkbox');
                        const currentPageChecked = Array.from(memberCheckboxes).filter(cb => cb.checked).length;
                        const totalOnPage = memberCheckboxes.length;
                        document.getElementById('select-all').checked = currentPageChecked > 0 && currentPageChecked === totalOnPage;
                    }

                    function clearBulkSelection() {
                        document.getElementById('select-all').checked = false;
                        document.querySelectorAll('.member-checkbox').forEach(cb => cb.checked = false);
                        localStorage.removeItem(STORAGE_KEY);
                        updateBulkActionBar();
                    }

                    function submitBulkPrint() {
                        const stored = getStoredSelections();
                        if (stored.length === 0) {
                            alert('Pilih minimal 1 anggota untuk dicetak.');
                            return;
                        }

                        const form = document.getElementById('bulk-action-form');
                        // Clear existing ids
                        form.querySelectorAll('input[name="ids[]"]').forEach(el => el.remove());
                        // Add stored selections
                        stored.forEach(id => {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'ids[]';
                            input.value = id;
                            form.appendChild(input);
                        });
                        form.action = '{{ route("members.cetak-kta-bulk") }}';
                        form.method = 'POST';
                        form.submit();
                    }

                    // Save selections saat checkbox berubah
                    document.addEventListener('change', function(e) {
                        if (e.target.classList.contains('member-checkbox')) {
                            saveSelections();
                            updateBulkActionBar();
                        }
                    });
                </script>
            </div>

        </div>
    </div>
</x-app-layout>