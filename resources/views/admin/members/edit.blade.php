<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Anggota
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('members.update', $member) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <x-input-label for="nik" value="NIK" />
                        <x-text-input id="nik" name="nik" type="text" maxlength="16"
                                      class="mt-1 block w-full"
                                      value="{{ old('nik', $member->nik) }}" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="full_name" value="Nama Lengkap" />
                        <x-text-input id="full_name" name="full_name" type="text"
                                      class="mt-1 block w-full"
                                      value="{{ old('full_name', $member->full_name) }}" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="phone" value="No. HP" />
                        <x-text-input id="phone" name="phone" type="text"
                                      class="mt-1 block w-full"
                                      value="{{ old('phone', $member->phone) }}" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="gender" value="Jenis Kelamin" />
                        <select id="gender" name="gender" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="L" {{ old('gender', $member->gender) === 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender', $member->gender) === 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <x-input-label for="address" value="Alamat" />
                        <textarea id="address" name="address" rows="3" required
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('address', $member->address) }}</textarea>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                            Update
                        </button>
                        <a href="{{ route('members.index') }}"
                           class="bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-lg">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>