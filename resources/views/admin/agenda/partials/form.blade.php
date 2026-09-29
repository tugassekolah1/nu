@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- CDN CSS & JS Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<div class="mb-4">
    <x-input-label for="title" value="Judul Agenda" />
    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                  value="{{ old('title', $agenda->title ?? '') }}" required autofocus />
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
    <div>
        <x-input-label for="event_date" value="Tanggal" />
        <x-text-input id="event_date" name="event_date" type="date" class="mt-1 block w-full"
                      value="{{ old('event_date', isset($agenda) ? $agenda->event_date->format('Y-m-d') : '') }}" required />
    </div>
    <div>
    <x-input-label for="event_time" value="Waktu " />
    <x-text-input id="event_time" name="event_time" type="text" class="mt-1 block w-full bg-white"
                  placeholder="Pilih jam..."
                  value="{{ old('event_time', isset($agenda->event_time) ? \Carbon\Carbon::parse($agenda->event_time)->format('H:i') : '') }}" />
</div>

<script>
    flatpickr("#event_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true // <--- Memaksa format 24 Jam
    });
</script>
</div>

<div class="mb-4">
    <x-input-label for="category" value="Kategori" />
    <x-text-input id="category" name="category" type="text" class="mt-1 block w-full"
                  placeholder="Contoh: Pengajian, Rapat, Ziarah"
                  value="{{ old('category', $agenda->category ?? 'Kegiatan') }}" required />
</div>

<div class="mb-4">
    <x-input-label for="location" value="Lokasi " />
    <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                  value="{{ old('location', $agenda->location ?? '') }}" />
</div>

<div class="mb-4">
    <x-input-label for="description" value="Keterangan (opsional)" />
    <textarea id="description" name="description" rows="3"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $agenda->description ?? '') }}</textarea>
</div>