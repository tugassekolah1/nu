@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Galeri') }}
            </h2>
            
            <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Galeri Foto</h3>
                    <a href="{{ route('gallery.create') }}" class="px-4 py-2 bg-[#214b35] text-white text-sm font-medium rounded-lg hover:bg-[#1a3c2a] transition-colors">
                        + Tambah Foto
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 border border-gray-200 rounded-lg">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Foto</th>
                                <th scope="col" class="px-6 py-3">Judul</th>
                                <th scope="col" class="px-6 py-3">Deskripsi</th>
                                <th scope="col" class="px-6 py-3">Urutan</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900 align-middle">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 align-middle">
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-16 h-12 object-cover rounded border">
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-800 align-middle">{{ $item->judul }}</td>
                                    <td class="px-6 py-4 text-gray-600 align-middle max-w-xs truncate">{{ $item->deskripsi ?? '-' }}</td>
                                    <td class="px-6 py-4 text-gray-600 align-middle">{{ $item->urutan }}</td>
                                    <td class="px-6 py-4 text-center align-middle">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('gallery.edit', $item->id) }}" 
                                               class="inline-flex items-center justify-center px-3 py-1.5 bg-amber-500 text-white text-xs font-medium rounded hover:bg-amber-600 transition-colors leading-none h-8">
                                                Edit
                                            </a>
                                            <form action="{{ route('gallery.destroy', $item->id) }}" method="POST" class="inline-block m-0 p-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center justify-center px-3 py-1.5 bg-red-600 text-white text-xs font-medium rounded hover:bg-red-700 transition-colors leading-none h-8">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                        Belum ada foto galeri.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>