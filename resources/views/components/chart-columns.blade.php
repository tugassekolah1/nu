@props([
    'items' => [],
    'color' => '#4f46e5',
])

@php
    // --- Geometri grafik batang ---
    $lebar = 620;
    $tinggi = 220;
    $padAtas = 20;
    $padBawah = 32;
    $padKiri = 40;
    $padKanan = 10;
    $tinggiGrafik = $tinggi - $padAtas - $padBawah;
    $lebarGrafik = $lebar - $padKiri - $padKanan;

    $nilai = array_column($items, 'value');
    $mentah = max($nilai) ?: 1;
    $eksponen = 10 ** floor(log10((float) $mentah));
    $batas = (int) $eksponen;
    foreach ([1, 1.5, 2, 2.5, 4, 5, 7.5, 10] as $kelipatan) {
        if ((float) $mentah <= $kelipatan * $eksponen) {
            $batas = (int) round($kelipatan * $eksponen);
            break;
        }
    }

    $jumlahBatang = max(count($items), 1);
    $ruang = $lebarGrafik / $jumlahBatang;
    $tebal = min(38, max(10, $ruang * 0.55));

    $garisBantu = [];
    for ($g = 0; $g <= 3; $g++) {
        $rasio = $g / 3;
        $garisBantu[] = [
            'y' => round($padAtas + (1 - $rasio) * $tinggiGrafik, 2),
            'nilai' => (int) round($batas * $rasio),
        ];
    }
@endphp

<svg viewBox="0 0 {{ $lebar }} {{ $tinggi }}" role="img"
     {{ $attributes->merge(['class' => 'w-full h-auto']) }}>
    <title>Grafik batang: {{ count($items) }} data, nilai tertinggi {{ number_format(max($nilai) ?: 0) }}.</title>

    @foreach ($garisBantu as $garis)
        <line x1="{{ $padKiri }}" x2="{{ $lebar - $padKanan }}"
              y1="{{ $garis['y'] }}" y2="{{ $garis['y'] }}"
              stroke="#e2e8f0" stroke-width="1" stroke-dasharray="4 4"/>
        <text x="{{ $padKiri - 8 }}" y="{{ $garis['y'] + 4 }}" text-anchor="end"
              class="fill-slate-400 font-semibold" style="font-size: 10px">
            {{ $garis['nilai'] }}
        </text>
    @endforeach

    @foreach ($items as $i => $item)
        @php
            $tinggiBatang = ((float) $item['value'] / $batas) * $tinggiGrafik;
            $x = round($padKiri + $ruang * $i + ($ruang - $tebal) / 2, 2);
            $y = round($padAtas + $tinggiGrafik - $tinggiBatang, 2);
            $lebarBatang = round($tebal, 2);
            $jariJari = min(4, $lebarBatang / 2, max($tinggiBatang, 0.01));
        @endphp

        <path d="M {{ $x }} {{ $padAtas + $tinggiGrafik }} L {{ $x }} {{ $y + $jariJari }}
                 Q {{ $x }} {{ $y }} {{ $x + $jariJari }} {{ $y }}
                 L {{ $x + $lebarBatang - $jariJari }} {{ $y }}
                 Q {{ $x + $lebarBatang }} {{ $y }} {{ $x + $lebarBatang }} {{ $y + $jariJari }}
                 L {{ $x + $lebarBatang }} {{ $padAtas + $tinggiGrafik }} Z"
              fill="{{ $color }}" opacity="0.85">
            <title>{{ $item['label'] ?? '' }} — {{ number_format($item['value']) }}</title>
        </path>

        <text x="{{ round($x + $lebarBatang / 2, 2) }}" y="{{ round($y - 6, 2) }}"
              text-anchor="middle" class="fill-slate-500 font-bold" style="font-size: 10px">
            {{ number_format((int) $item['value']) }}
        </text>

        <text x="{{ round($padKiri + $ruang * $i + $ruang / 2, 2) }}" y="{{ $tinggi - 10 }}"
              text-anchor="middle" class="fill-slate-400 font-semibold" style="font-size: 10px">
            {{ $item['label'] ?? '' }}
        </text>
    @endforeach
</svg>
