@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Pengurus') }}
            </h2>

            <a href="{{ route('pengurus.index') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Pengurus
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Ringkasan Error Validasi --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                        <div class="font-semibold mb-1">Terjadi kesalahan pada inputan:</div>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pengurus.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Nama Pengurus --}}
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap & Gelar <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Contoh: K.H. Ahmad Syarif" required
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#214b35] focus:ring-[#214b35] text-sm">
                        <p class="text-xs text-gray-500 mt-1">Tuliskan nama beserta gelar jika ada.</p>
                    </div>

                    {{-- Jabatan --}}
                    <div>
                        <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-1">Jabatan <span class="text-red-500">*</span></label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" placeholder="Contoh: Ketua / Sekretaris" required
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#214b35] focus:ring-[#214b35] text-sm">
                        <p class="text-xs text-gray-500 mt-1">Satu jabatan hanya boleh diisi satu orang dalam satu organisasi.</p>
                    </div>

                    {{-- Dropdown Organisasi / Banom --}}
                    <div>
                        <label for="banom" class="block text-sm font-medium text-gray-700 mb-1">Pilih Organisasi / Banom <span class="text-red-500">*</span></label>
                        <select name="banom" id="banom" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#214b35] focus:ring-[#214b35] text-sm bg-white">
                            <option value="" disabled {{ old('banom') ? '' : 'selected' }}>-- Pilih Pengurus NU / Banom Tingkat Kecamatan --</option>
                            @foreach ($banomOptions as $kode => $opsi)
                                <option value="{{ $kode }}" data-label="{{ $opsi['label'] }}" @selected(old('banom') === $kode)>{{ $opsi['name'] }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Label tampilan (contoh: PAC IPNU) ikut terisi otomatis sesuai pilihan.</p>
                    </div>

                    {{-- Foto --}}
                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto Pengurus (Opsional)</label>
                        <input type="file" name="foto" id="foto" accept="image/jpeg,image/png,image/jpg,image/webp"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#214b35]/10 file:text-[#214b35] hover:file:bg-[#214b35]/20 cursor-pointer">
                        <p class="text-xs text-gray-500 mt-1">Format JPG/PNG, maksimal 2 MB. Kosongkan jika tidak ada foto, sistem menampilkan inisial otomatis.</p>
                    </div>

                    {{-- Urutan --}}
                    <div>
                        <label for="urutan" class="block text-sm font-medium text-gray-700 mb-1">Nomor Urutan Tampil</label>
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan') }}" min="1" step="1"
                               class="w-24 rounded-md border-gray-300 shadow-sm focus:border-[#214b35] focus:ring-[#214b35] text-sm" placeholder="otomatis">
                        <p class="text-xs text-gray-500 mt-1">Angka lebih kecil tampil lebih awal. <strong>Kosongkan</strong> untuk mengisi nomor urut otomatis (angka berikutnya).</p>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('pengurus.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-300 transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2 bg-[#214b35] text-white text-sm font-medium rounded-md hover:bg-[#1a3c2a] transition-colors shadow-sm">
                            Simpan Data
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
