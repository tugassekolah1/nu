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
    <x-input-label for="judul" value="Judul Berita" />
    <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full"
                  value="{{ old('judul', $berita->judul ?? '') }}" required autofocus />
</div>

<div class="mb-4">
    <x-input-label for="slug" value="Slug (URL)" />
    <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full"
                  value="{{ old('slug', $berita->slug ?? '') }}"
                  placeholder="otomatis-dari-judul" />
    <p class="text-xs text-gray-500 mt-1">
        Terisi otomatis dari judul, boleh diubah. Kosongkan agar dibuat otomatis.
    </p>
</div>

<div class="mb-4">
    <x-input-label for="jenis" value="Jenis Berita" />
    <select id="jenis" name="jenis" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        @foreach (\App\Models\Berita::JENIS as $jenis)
            <option value="{{ $jenis }}"
                    {{ old('jenis', $berita->jenis ?? 'Berita') === $jenis ? 'selected' : '' }}>
                {{ $jenis }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <x-input-label for="isi" value="Isi Berita" />
    <textarea id="isi" name="isi" rows="8"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              required>{{ old('isi', $berita->isi ?? '') }}</textarea>
</div>

<div class="mb-4">
    <x-input-label for="gambar" value="Gambar (opsional)" />
    <input id="gambar" name="gambar" type="file" accept="image/*"
           class="mt-1 block w-full text-sm text-gray-600" />

    @isset($berita)
        @if ($berita->gambar)
            <img src="{{ Storage::url($berita->gambar) }}" class="w-32 mt-2 rounded">
        @endif
    @endisset
</div>

<div class="mb-4 flex items-center gap-2">
    <input type="checkbox" id="status" name="status" value="1"
           {{ old('status', $berita->status ?? true) ? 'checked' : '' }}
           class="rounded border-gray-300 text-blue-600 shadow-sm">
    <x-input-label for="status" value="Publish sekarang" />
</div>

<script>
    (function () {
        const judul = document.getElementById('judul');
        const slug = document.getElementById('slug');
        if (!judul || !slug) return;

        let manualEdit = false;
        slug.addEventListener('input', function () {
            manualEdit = true;
        });

        function slugify(value) {
            return value
                .toLowerCase()
                .trim()
                .replace(/['’]/g, '')
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        function autoFill() {
            if (!manualEdit || !slug.value) {
                slug.value = slugify(judul.value);
            }
        }

        judul.addEventListener('input', autoFill);

        if (!slug.value) {
            slug.value = slugify(judul.value);
        }
    })();
</script>
