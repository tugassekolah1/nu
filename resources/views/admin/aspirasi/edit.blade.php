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
                        Tanggapi Aspirasi
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">Ubah status penanganan dan kirim jawaban untuk warga.</p>
                </div>
            </div>

            <a href="{{ route('admin.aspirasi.index') }}"
               class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 active:scale-95 text-slate-700 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Kembali</span>
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-[calc(100vh-4rem)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if ($errors->any())
                <div class="p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl shadow-xs">
                    <p class="text-sm font-bold mb-1">Data belum bisa disimpan:</p>
                    <ul class="list-disc list-inside text-sm space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                {{-- Detail aspirasi --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6">
                    <div class="flex items-center justify-between gap-3 pb-4 border-b border-slate-100">
                        <h3 class="text-base font-bold text-slate-800">Isi Aspirasi</h3>
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
                    </div>

                    <dl class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Pengirim</dt>
                            <dd class="mt-1 font-bold text-slate-800">{{ $aspirasi->nama }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Kategori</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-700">
                                    {{ \App\Models\Aspirasi::labelKategori($aspirasi->kategori) }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Email</dt>
                            <dd class="mt-1 text-slate-700">{{ $aspirasi->email ?: '-' }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">No. HP</dt>
                            <dd class="mt-1 text-slate-700">{{ $aspirasi->no_hp ?: '-' }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Masuk</dt>
                            <dd class="mt-1 text-slate-700">{{ $aspirasi->created_at->translatedFormat('d F Y, H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-slate-400">Terakhir Dijawab</dt>
                            <dd class="mt-1 text-slate-700">
                                {{ $aspirasi->tanggapan_at ? $aspirasi->tanggapan_at->translatedFormat('d F Y, H:i') : 'Belum dijawab' }}
                            </dd>
                        </div>
                    </dl>

                    <div class="mt-5 rounded-2xl bg-slate-50 border border-slate-100 p-4">
                        <p class="text-sm text-slate-700 leading-relaxed whitespace-pre-line">{{ $aspirasi->isi }}</p>
                    </div>

                    <div class="mt-5 flex items-center justify-between gap-3 pt-4 border-t border-slate-100">
                        <span class="text-xs text-slate-400">ID #{{ $aspirasi->id }}</span>

                        <form action="{{ route('admin.aspirasi.destroy', $aspirasi) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus aspirasi ini? Tindakan ini tidak bisa dibatalkan.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-2 border border-rose-200 text-rose-600 hover:bg-rose-50 active:scale-95 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Form status & tanggapan --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6">
                    <h3 class="text-base font-bold text-slate-800 pb-4 border-b border-slate-100">Status &amp; Tanggapan</h3>

                    <form action="{{ route('admin.aspirasi.update', $aspirasi) }}" method="POST" class="mt-5 space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="status" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                Status Penanganan <span class="text-rose-600">*</span>
                            </label>
                            <select id="status" name="status" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 focus:bg-white focus:border-amber-400 focus:ring-2 focus:ring-amber-100 outline-none transition-all">
                                @foreach (\App\Models\Aspirasi::STATUSES as $item)
                                    <option value="{{ $item }}" @selected(old('status', $aspirasi->status) === $item)>
                                        {{ \App\Models\Aspirasi::labelStatus($item) }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1.5 text-xs text-slate-400">
                                Status "Selesai" membuat tanggapan tampil di halaman publik.
                            </p>
                        </div>

                        <div>
                            <label for="tanggapan" class="block text-sm font-semibold text-slate-700 mb-1.5">
                                Tanggapan Pengurus
                            </label>
                            <textarea id="tanggapan" name="tanggapan" rows="7" maxlength="2000"
                                      placeholder="Tuliskan jawaban atau tindak lanjut untuk aspirasi ini..."
                                      class="block w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 placeholder:text-slate-400 focus:bg-white focus:border-amber-400 focus:ring-2 focus:ring-amber-100 outline-none transition-all">{{ old('tanggapan', $aspirasi->tanggapan) }}</textarea>
                            <p class="mt-1.5 text-xs text-slate-400">Kosongkan bila tidak ingin memberi tanggapan.</p>
                        </div>

                        <div class="flex flex-wrap gap-2 pt-1">
                            <button type="submit"
                                    class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-700 active:scale-95 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all shadow-xs hover:shadow-amber-200 hover:shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span>Simpan Perubahan</span>
                            </button>

                            <a href="{{ route('admin.aspirasi.index') }}"
                               class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 active:scale-95 text-slate-600 px-5 py-2.5 rounded-xl text-sm font-semibold transition-all">
                                <span>Batal</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
