<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manajemen Anggota
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('info'))
                <div class="mb-4 p-4 bg-blue-100 text-blue-700 rounded-lg">
                    {{ session('info') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium">Daftar Anggota</h3>
                    <a href="{{ route('members.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                        + Tambah Anggota
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2">NIK</th>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">No. HP</th>
                                <th class="px-4 py-2">No. Kartu</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($members as $member)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $member->nik }}</td>
                                    <td class="px-4 py-2 font-medium">{{ $member->full_name }}</td>
                                    <td class="px-4 py-2">{{ $member->phone }}</td>
                                    <td class="px-4 py-2">{{ $member->member_card_no ?? '-' }}</td>
                                    <td class="px-4 py-2">
    @if ($member->payment_status === 'paid')
        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">
            Lunas / Aktif
        </span>
    @else
        <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs">
            Belum Bayar
        </span>
        @php $latestPayment = $member->payments()->latest()->first(); @endphp
        @if ($latestPayment && $latestPayment->payment_proof)
            <a href="{{ Storage::url($latestPayment->payment_proof) }}" target="_blank"
               class="block text-xs text-blue-600 hover:underline mt-1">
                Lihat Bukti
            </a>
        @endif
    @endif
</td>
<td class="px-4 py-2 text-center space-x-2">
    @if ($member->payment_status === 'unpaid')
        <form action="{{ route('members.confirm-payment', $member) }}"
              method="POST" class="inline"
              onsubmit="return confirm('Konfirmasi anggota ini sudah bayar?')">
            @csrf
            @method('PATCH')
            <button type="submit" class="text-green-600 hover:underline text-sm">
                Konfirmasi Lunas
            </button>
        </form>
    @endif

    <a href="{{ route('members.edit', $member) }}"
       class="text-blue-600 hover:underline text-sm">
        Edit
    </a>

    <form action="{{ route('members.destroy', $member) }}"
          method="POST" class="inline"
          onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
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
                                    <td colspan="6" class="text-center py-6 text-gray-500">
                                        Belum ada anggota.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $members->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>