<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Agenda Kegiatan
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
                    <h3 class="text-lg font-medium">Daftar Agenda</h3>
                    <a href="{{ route('agenda.create') }}"
                       class="bg-blue-600 hover:bg-blue-700  px-4 py-2 rounded-lg text-sm">
                        + Tambah Agenda
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Judul</th>
                                <th class="px-4 py-2">Kategori</th>
                                <th class="px-4 py-2">Lokasi</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agendaList as $agenda)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">
                                        {{ $agenda->event_date->translatedFormat('d M Y') }}
                                        @if ($agenda->event_time)
                                            <div class="text-xs text-gray-400">{{ $agenda->event_time }}</div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 font-medium">{{ $agenda->title }}</td>
                                    <td class="px-4 py-2">
                                        <span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-full text-xs">
                                            {{ $agenda->category }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">{{ $agenda->location ?? '-' }}</td>
                                    <td class="px-4 py-2 text-center space-x-2">
                                        <a href="{{ route('agenda.edit', $agenda) }}"
                                           class="text-blue-600 hover:underline text-sm">Edit</a>
                                        <form action="{{ route('agenda.destroy', $agenda) }}"
                                              method="POST" class="inline"
                                              onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-6 text-gray-500">
                                        Belum ada agenda.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $agendaList->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>