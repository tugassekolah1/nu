@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Pengurus') }}
            </h2>
            
            <a href="{{ url('/dashboard') }}" target="_blank" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
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
                
                {{-- Header Section & Tombol Tambah --}}
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Pengurus</h3>
                    <a href="{{ route('pengurus.create') }}" class="px-4 py-2 bg-[#214b35] text-white text-sm font-medium rounded-lg hover:bg-[#1a3c2a] transition-colors">
                        + Tambah Pengurus
                    </a>
                </div>

                {{-- Alert Sukses --}}
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Tabel Data Pengurus --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 border border-gray-200 rounded-lg">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Foto</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Jabatan</th>
                                <th scope="col" class="px-6 py-3">Banom</th>
                                <th scope="col" class="px-6 py-3">Urutan</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengurus as $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">
                                        @if ($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-12 h-12 rounded-full object-cover border">
                                        @else
                                            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xs text-gray-400 border">
                                                No Pic
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-800">{{ $item->nama }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $item->jabatan }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 text-xs font-semibold text-[#214b35] bg-[#214b35]/10 rounded-full">
                                            {{ $item->label_banom }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">{{ $item->urutan ?? '-' }}</td>
                                   <td class="px-6 py-4 text-center align-middle">
    <div class="flex items-center justify-center gap-2">
        <a href="{{ route('pengurus.edit', $item->id) }}" 
           class="inline-flex items-center justify-center px-3 py-1.5 bg-amber-500 text-white text-xs font-medium rounded hover:bg-amber-600 transition-colors leading-none h-8">
            Edit
        </a>
        <form action="{{ route('pengurus.destroy', $item->id) }}" method="POST" class="inline-block m-0 p-0" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                        Belum ada data pengurus.
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