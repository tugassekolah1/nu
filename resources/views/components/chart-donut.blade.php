@props([
    'items' => [],
    'size' => 210,
    'thickness' => 26,
    'total' => null,
])

@php
    // Setiap item: ['label' => ..., 'value' => ..., 'color' => '#...']
    $total = $total ?? array_sum(array_column($items, 'value'));
    $radius = ($size - $thickness) / 2;
    $tengah = $size / 2;
    $keliling = 2 * M_PI * $radius;
    $jarak = 0;
    $warnaKosong = '#e2e8f0';
@endphp

<svg viewBox="0 0 {{ $size }} {{ $size }}" role="img"
     {{ $attributes->merge(['class' => 'mx-auto w-full max-w-[240px] h-auto']) }}>
    <title>Total pembaca: {{ number_format($total) }}</title>

    <g transform="rotate(-90 {{ $tengah }} {{ $tengah }})">
        <circle cx="{{ $tengah }}" cy="{{ $tengah }}" r="{{ $radius }}" fill="none"
                stroke="{{ $warnaKosong }}" stroke-width="{{ $thickness }}"/>

        @foreach ($items as $item)
            @php
                $panjang = $total > 0 ? ((int) $item['value'] / $total) * $keliling : 0;
                $sisa = max($keliling - $panjang, 0);
            @endphp
            @if ($panjang > 0)
                <circle cx="{{ $tengah }}" cy="{{ $tengah }}" r="{{ $radius }}" fill="none"
                        stroke="{{ $item['color'] ?? '#64748b' }}"
                        stroke-width="{{ $thickness }}"
                        stroke-dasharray="{{ round($panjang, 2) }} {{ round($sisa, 2) }}"
                        stroke-dashoffset="{{ round(-$jarak, 2) }}">
                    <title>
                        {{ $item['label'] ?? '' }}: {{ number_format((int) $item['value']) }}
                        ({{ $total > 0 ? round(((int) $item['value'] / $total) * 100, 1) : 0 }}%)
                    </title>
                </circle>
            @endif
            @php $jarak += $panjang; @endphp
        @endforeach
    </g>

    <text x="{{ $tengah }}" y="{{ $tengah - 2 }}" text-anchor="middle"
          class="fill-slate-900 font-black" style="font-size: 30px">
        {{ $total >= 1000 ? round($total / 1000, 1).'rb' : number_format($total) }}
    </text>
    <text x="{{ $tengah }}" y="{{ $tengah + 18 }}" text-anchor="middle"
          class="fill-slate-400 font-semibold uppercase" style="font-size: 9px; letter-spacing: 0.12em">
        Total dibaca
    </text>
</svg>
