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

            {{-- Main Table Card --}}
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="text-base font-bold text-slate-800">Daftar Seluruh Anggota</h3>
                    <span class="text-xs font-semibold px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg">
                        Total: {{ $members->total() ?? count($members) }} Data
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200/80 text-xs uppercase font-bold text-slate-500 tracking-wider">
                                <th class="px-6 py-4">Informasi Diri</th>
                                <th class="px-6 py-4">Kontak</th>
                                <th class="px-6 py-4">No. Kartu</th>
                                <th class="px-6 py-4">Status Pembayaran</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($members as $member)
                                <tr class="hover:bg-slate-50/80 transition-colors">
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
                                    <td colspan="5" class="text-center py-12">
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
            </div>

        </div>
    </div>
</x-app-layout>