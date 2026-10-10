<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2.5 bg-amber-50 text-amber-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-xl text-slate-800 leading-tight">
                        Kotak Aspirasi
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">Baca, tindaklanjuti, dan hapus aspirasi yang dikirim warga.</p>
                </div>
            </div>

            <a href="{{ route('aspirasi.index') }}"
               target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 active:scale-95 text-slate-700 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span>Lihat Halaman Publik</span>
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-[calc(100vh-4rem)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @php
                $filtering = trim($q) !== '' || !empty($status) || !empty($kategori);
            @endphp

            {{-- Alert --}}
            @if (session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-3 shadow-xs">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Kartu Rekap --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-5">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Aspirasi</p>
                    <p class="text-2xl font-black text-slate-900 mt-2">{{ $rekap['total'] }}</p>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-5">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Baru Masuk</p>
                    <p class="text-2xl font-black text-amber-600 mt-2">{{ $rekap['baru'] }}</p>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-5">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Sedang Diproses</p>
                    <p class="text-2xl font-black text-blue-600 mt-2">{{ $rekap['diproses'] }}</p>
                </div>
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-5">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Selesai Ditangani</p>
                    <p class="text-2xl font-black text-emerald-600 mt-2">{{ $rekap['selesai'] }}</p>
                </div>
            </div>

            {{-- Pencarian & Filter --}}
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-4">
                <form method="GET" action="{{ route('admin.aspirasi.index') }}"
                      class="flex flex-col sm:flex-row gap-3 sm:items-center">
                    <div class="relative flex-1">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                        </svg>
                        <input type="search" name="q" value="{{ $q }}"
                               placeholder="Cari nama, email, atau isi aspirasi..."
                               class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 placeholder:text-slate-400 focus:bg-white focus:border-amber-400 focus:ring-2 focus:ring-amber-100 outline-none transition-all" />
                    </div>

                    <select name="kategori"
                            class="sm:w-48 px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 focus:bg-white focus:border-amber-400 focus:ring-2 focus:ring-amber-100 outline-none transition-all">
                        <option value="">Semua Kategori</option>
                        @foreach (\App\Models\Aspirasi::KATEGORI as $item)
                            <option value="{{ $item }}" {{ ($kategori ?? '') === $item ? 'selected' : '' }}>
                                {{ \App\Models\Aspirasi::labelKategori($item) }}
                            </option>
                        @endforeach
                    </select>

                    <select name="status"
                            class="sm:w-44 px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 focus:bg-white focus:border-amber-400 focus:ring-2 focus:ring-amber-100 outline-none transition-all">
                        <option value="">Semua Status</option>
                        @foreach (\App\Models\Aspirasi::STATUSES as $item)
                            <option value="{{ $item }}" {{ ($status ?? '') === $item ? 'selected' : '' }}>
                                {{ \App\Models\Aspirasi::labelStatus($item) }}
                            </option>
                        @endforeach
                    </select>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-900 active:scale-95 text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                            </svg>
                            <span>Filter</span>
                        </button>

                        @if ($filtering)
                            <a href="{{ route('admin.aspirasi.index') }}"
                               class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:bg-slate-50 active:scale-95 text-slate-600 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
                                <span>Reset</span>
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Tabel Aspirasi --}}
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="text-base font-bold text-slate-800">Daftar Aspirasi Masuk</h3>
                    <span class="text-xs font-semibold px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg">
                        Total: {{ $aspirasis->total() }} Data
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200/80 text-xs uppercase font-bold text-slate-500 tracking-wider">
                                <th class="px-6 py-4">Pengirim</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Aspirasi</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Masuk</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($aspirasis as $aspirasi)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    {{-- Pengirim --}}
                                    <td class="px-6 py-4 align-top">
                                        <div class="font-bold text-slate-900">{{ $aspirasi->nama }}</div>
                                        <div class="text-xs text-slate-400 mt-0.5">
                                            {{ $aspirasi->email ?: ($aspirasi->no_hp ?: 'Tanpa kontak') }}
                                        </div>
                                        @if ($aspirasi->kode)
                                            <div class="mt-1 font-mono text-[11px] font-bold text-slate-500">{{ $aspirasi->kode }}</div>
                                        @endif
                                    </td>

                                    {{-- Kategori --}}
                                    <td class="px-6 py-4 align-top">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700">
                                            {{ \App\Models\Aspirasi::labelKategori($aspirasi->kategori) }}
                                        </span>
                                    </td>

                                    {{-- Isi --}}
                                    <td class="px-6 py-4 align-top">
                                        <p class="text-slate-700 max-w-md">{{ \Illuminate\Support\Str::limit($aspirasi->isi, 120) }}</p>
                                        @if ($aspirasi->tanggapan)
                                            <p class="mt-1.5 text-xs text-emerald-700 max-w-md">
                                                <span class="font-bold">Tanggapan:</span> {{ \Illuminate\Support\Str::limit($aspirasi->tanggapan, 100) }}
                                            </p>
                                        @endif
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4 align-top">
                                        @php
                                            $badge = match ($aspirasi->status) {
                                                'baru' => 'bg-amber-100 text-amber-800',
                                                'diproses' => 'bg-blue-100 text-blue-800',
                                                'selesai' => 'bg-emerald-100 text-emerald-800',
                                                default => 'bg-rose-100 text-rose-800',
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $badge }}">
                                            {{ \App\Models\Aspirasi::labelStatus($aspirasi->status) }}
                                        </span>
                                    </td>

                                    {{-- Masuk --}}
                                    <td class="px-6 py-4 align-top text-slate-600 font-medium whitespace-nowrap">
                                        {{ $aspirasi->created_at->translatedFormat('d M Y') }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-6 py-4 align-top text-center">
                                        <div class="inline-flex items-center gap-1.5 bg-slate-100/80 p-1.5 rounded-xl border border-slate-200/60">
                                            <a href="{{ route('admin.aspirasi.edit', $aspirasi) }}"
                                               title="Tanggapi Aspirasi"
                                               class="p-1.5 rounded-lg text-slate-600 hover:bg-white hover:text-amber-600 transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>

                                            <form action="{{ route('admin.aspirasi.destroy', $aspirasi) }}"
                                                  method="POST" class="inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        title="Hapus Aspirasi"
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
                                    <td colspan="6" class="text-center py-12">
                                        <div class="flex flex-col items-center justify-center space-y-3">
                                            <div class="p-4 bg-slate-100 text-slate-400 rounded-full">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                                </svg>
                                            </div>
                                            <p class="text-slate-500 font-medium">
                                                {{ $filtering ? 'Tidak ada aspirasi yang cocok dengan filter.' : 'Belum ada aspirasi yang masuk.' }}
                                            </p>
                                            @if ($filtering)
                                                <a href="{{ route('admin.aspirasi.index') }}" class="text-xs font-bold text-amber-600 hover:underline">
                                                    Hapus filter untuk melihat semua data
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($aspirasis->hasPages())
                    <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                        {{ $aspirasis->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
