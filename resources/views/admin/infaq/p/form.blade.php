@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-4">
    <x-input-label for="nominal" value="Nominal (Rp)" />
    <x-text-input id="nominal" name="nominal" type="number" min="1" step="1" class="mt-1 block w-full"
                  value="{{ old('nominal', $infaq->nominal ?? '') }}" placeholder="Contoh: 50000" required autofocus />
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div class="mb-4">
        <x-input-label for="nama_donatur" value="Nama Donatur" />
        <x-text-input id="nama_donatur" name="nama_donatur" type="text" class="mt-1 block w-full"
                      value="{{ old('nama_donatur', $infaq->nama_donatur ?? '') }}" placeholder="Hamba Allah jika kosong" />
    </div>

    <div class="mb-4">
        <x-input-label for="no_hp" value="No. HP (opsional)" />
        <x-text-input id="no_hp" name="no_hp" type="text" class="mt-1 block w-full"
                      value="{{ old('no_hp', $infaq->no_hp ?? '') }}" placeholder="08xxxxxxxxxx" />
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <div class="mb-4">
        <x-input-label for="metode_pembayaran" value="Metode Pembayaran" />
        <select id="metode_pembayaran" name="metode_pembayaran" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @foreach (\App\Models\Infaq::METODE as $metode)
                <option value="{{ $metode }}"
                        {{ old('metode_pembayaran', $infaq->metode_pembayaran ?? 'tunai') === $metode ? 'selected' : '' }}>
                    {{ str_replace('_', ' ', ucwords($metode, '_')) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <x-input-label for="status" value="Status" />
        <select id="status" name="status" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @foreach (\App\Models\Infaq::STATUSES as $item)
                <option value="{{ $item }}"
                        {{ old('status', $infaq->status ?? 'pending') === $item ? 'selected' : '' }}>
                    {{ ucfirst($item) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <x-input-label for="paid_at" value="Tanggal Bayar" />
        <x-text-input id="paid_at" name="paid_at" type="date" class="mt-1 block w-full"
                      value="{{ old('paid_at', isset($infaq) && $infaq->paid_at ? $infaq->paid_at->format('Y-m-d') : '') }}" />
        <p class="text-xs text-gray-500 mt-1">Diisi otomatis saat status Lunas.</p>
    </div>
</div>

<div class="mb-4">
    <x-input-label for="catatan" value="Catatan (opsional)" />
    <textarea id="catatan" name="catatan" rows="3"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              placeholder="Contoh: infak dari Kegiatan Jumat Bersih">{{ old('catatan', $infaq->catatan ?? '') }}</textarea>
</div>
