<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>{{ $berita->judul }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <div class="max-w-3xl mx-auto px-6 py-12">

        <a href="{{ route('landing') }}" class="text-blue-600 hover:underline text-sm">
            &larr; Kembali ke daftar berita
        </a>

        @if ($berita->gambar)
            <img src="{{ Storage::url($berita->gambar) }}"
                 class="w-25 d-flex justify-content-center h-64 object-cover rounded-lg my-6">
        @endif

        <h1 class="text-3xl font-bold mb-2">{{ $berita->judul }}</h1>

        <p class="text-sm text-gray-400 mb-6">
            Oleh {{ $berita->user->name ?? 'Admin' }} · {{ $berita->created_at->format('d M Y') }}
        </p>

        <div class="prose max-w-none text-gray-800 leading-relaxed">
            {!! nl2br(e($berita->isi)) !!}
        </div>

    </div>

</body>
</html>