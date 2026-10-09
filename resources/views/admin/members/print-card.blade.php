<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Anggota - {{ $member->full_name }}</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/js/member-card.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;
            background-color: #f4f4f4;            min-height: 100vh;
            margin: 0;
            padding: 24px 16px 48px;
            box-sizing: border-box;
        }

        .mc-toolbar {
            max-width: 560px;
            margin: 0 auto 4px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .mc-toolbar .mc-btn {
            background: #ffffff;
        }

        .mc-toolbar .mc-btn:hover {
            background: #006e3a;
        }
    </style>
</head>
<body>

    {{-- Opsi download: depan saja, belakang saja, atau keduanya --}}
    <div class="mc-toolbar no-print">
        <button type="button" onclick="printMemberCard('front')" class="mc-btn">Download Depan</button>
        <button type="button" onclick="printMemberCard('back')" class="mc-btn">Download Belakang</button>
        <button type="button" onclick="printMemberCard('both')" class="mc-btn">Download Depan + Belakang</button>
    </div>

    {{-- Preview kartu interaktif (efek 3D, drag, flip) --}}
    @include('partials.member-card-interactive')

    {{-- Versi datar untuk cetak/download --}}
    @include('partials.member-card-print')

</body>
</html>
