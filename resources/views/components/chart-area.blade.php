@props([
    'labels' => [],
    'values' => [],
    'color' => '#0d9488',
    'labelEvery' => 5,
    'height' => 240,
])

@php
    // --- Geometri grafik ---
    $jumlah = max(count($values), 2);
    $lebar = 760;
    $padAtas = 18;
    $padBawah = 30;
    $padKiri = 46;
    $padKanan = 14;
    $tinggiGrafik = $height - $padAtas - $padBawah;
    $lebarGrafik = $lebar - $padKiri - $padKanan;

    // Bulatkan batas atas ke angka "rapi" agar garis bantu tidak aneh.
    $mentah = max($values) ?: 1;
    $eksponen = 10 ** floor(log10((float) $mentah));
    $batas = (int) $eksponen;
    foreach ([1, 1.5, 2, 2.5, 4, 5, 7.5, 10] as $kelipatan) {
        if ((float) $mentah <= $kelipatan * $eksponen) {
            $batas = (int) round($kelipatan * $eksponen);
            break;
        }
    }

    $stepX = $lebarGrafik / ($jumlah - 1);
    $titik = [];
    foreach ($values as $i => $nilai) {
        $titik[] = [
            'x' => round($padKiri + $stepX * $i, 2),
            'y' => round($padAtas + (1 - ((float) $nilai / $batas)) * $tinggiGrafik, 2),
            'nilai' => (int) $nilai,
            'label' => $labels[$i] ?? '',
        ];
    }

    $polyline = implode(' ', array_map(
        fn (array $t) => $t['x'].','.$t['y'],
        $titik
    ));
    $bentuk = $titik[0]['x'].','.round($padAtas + $tinggiGrafik, 2).' '.$polyline
        .' '.$titik[count($titik) - 1]['x'].','.round($padAtas + $tinggiGrafik, 2);

    $garisBantu = [];
    for ($g = 0; $g <= 3; $g++) {
        $rasio = $g / 3;
        $garisBantu[] = [
            'y' => round($padAtas + (1 - $rasio) * $tinggiGrafik, 2),
            'nilai' => (int) round($batas * $rasio),
        ];
    }

    $uid = 'gradien-'.uniqid();
    $puncak = max($values ?: [0]);
@endphp

<svg viewBox="0 0 {{ $lebar }} {{ $height }}" role="img"
     {{ $attributes->merge(['class' => 'w-full h-auto']) }}>
    <title>Grafik pembaca harian. Puncak: {{ number_format($puncak) }} pembaca.</title>

    <defs>
        <linearGradient id="{{ $uid }}" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="{{ $color }}" stop-opacity="0.30"/>
            <stop offset="100%" stop-color="{{ $color }}" stop-opacity="0.02"/>
        </linearGradient>
    </defs>

    @foreach ($garisBantu as $garis)
        <line x1="{{ $padKiri }}" x2="{{ $lebar - $padKanan }}"
              y1="{{ $garis['y'] }}" y2="{{ $garis['y'] }}"
              stroke="#e2e8f0" stroke-width="1" stroke-dasharray="4 4"/>
        <text x="{{ $padKiri - 8 }}" y="{{ $garis['y'] + 4 }}" text-anchor="end"
              class="fill-slate-400 font-semibold" style="font-size: 10px">
            {{ $garis['nilai'] }}
        </text>
    @endforeach

    <polygon points="{{ $bentuk }}" fill="url(#{{ $uid }})"/>

    <polyline points="{{ $polyline }}" fill="none" stroke="{{ $color }}"
              stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round"/>

    @foreach ($titik as $t)
        <circle cx="{{ $t['x'] }}" cy="{{ $t['y'] }}" r="3.2" fill="#ffffff"
                stroke="{{ $color }}" stroke-width="2">
            <title>{{ $t['label'] }} — {{ number_format($t['nilai']) }} pembaca</title>
        </circle>
    @endforeach

    @foreach ($titik as $i => $t)
        @if ($i % $labelEvery === 0)
            <text x="{{ $t['x'] }}" y="{{ $height - 9 }}" text-anchor="middle"
                  class="fill-slate-400 font-semibold" style="font-size: 10px">
                {{ $t['label'] }}
            </text>
        @endif
    @endforeach
</svg>
