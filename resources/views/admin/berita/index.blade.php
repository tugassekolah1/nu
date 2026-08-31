<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Berita
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">Daftar Berita</h3>
                    <a href="{{ route('berita.create') }}"
                       class="bg-blue-600 hover:bg-blue-700  px-4 py-2 rounded-lg text-sm">
                        + Tambah Berita
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2">Gambar</th>
                                <th class="px-4 py-2">Judul</th>
                                <th class="px-4 py-2">Penulis</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($beritas as $berita)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">
                                        @if ($berita->gambar)
                                            <img src="{{ Storage::url($berita->gambar) }}"
                                                 class="w-10 h-12 object-cover rounded">
                                        @else
                                            <span class="text-gray-400 text-xs">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 font-medium">{{ $berita->judul }}</td>
                                    <td class="px-4 py-2">{{ $berita->user->name ?? '-' }}</td>
                                    <td class="px-4 py-2">
                                        @if ($berita->status)
                                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">Publish</span>
                                        @else
                                            <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded-full text-xs">Draft</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ $berita->created_at->format('d M Y') }}</td>
                                    <td class="px-4 py-2 text-center space-x-2">
                                        <a href="{{ route('berita.edit', $berita) }}"
                                           class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('berita.destroy', $berita) }}"
                                              method="POST" class="inline"
                                              onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-6 text-gray-500">
                                        Belum ada berita.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $beritas->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>