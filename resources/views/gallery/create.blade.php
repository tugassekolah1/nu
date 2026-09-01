@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Foto Galeri') }}
            </h2>
            
            <a href="{{ route('gallery.index') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
                        <div class="font-semibold mb-1">Terjadi kesalahan pada inputan:</div>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Foto <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#214b35] focus:ring-[#214b35] text-sm">
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi / Keterangan</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" 
                                  class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#214b35] focus:ring-[#214b35] text-sm">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div>
                        <label for="urutan" class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampilan</label>
                        <input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}" 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#214b35] focus:ring-[#214b35] text-sm">
                    </div>

                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">File Foto <span class="text-red-500">*</span></label>
                        <input type="file" name="foto" id="foto" accept="image/jpeg,image/png,image/jpg,image/webp" required 
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#214b35]/10 file:text-[#214b35] hover:file:bg-[#214b35]/20 cursor-pointer">
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('gallery.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-300 transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2 bg-[#214b35] text-white text-sm font-medium rounded-md hover:bg-[#1a3c2a] transition-colors shadow-sm">
                            Simpan Foto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>