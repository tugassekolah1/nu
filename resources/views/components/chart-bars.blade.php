@props([
    'items' => [],
    'color' => '#0d9488',
])

@php
    // Setiap item: ['label' => ..., 'value' => ..., 'meta' => ...]
    $nilai = array_column($items, 'value');
    $maksimal = max($nilai) ?: 1;
    $total = array_sum($nilai);
@endphp

<ul role="list" {{ $attributes->merge(['class' => 'space-y-3.5']) }}>
    @foreach ($items as $i => $item)
        @php $persen = round(((int) $item['value'] / $maksimal) * 100, 2); @endphp
        <li>
            <div class="mb-1.5 flex items-baseline justify-between gap-3">
                <span class="min-w-0 flex-1 truncate text-sm font-semibold text-slate-700"
                      title="{{ $item['label'] ?? '' }}">
                    <span class="mr-2 text-xs font-black text-slate-300">{{ $i + 1 }}</span>
                    {{ $item['label'] ?? '' }}
                </span>
                <span class="shrink-0 text-sm font-black text-slate-900">
                    {{ number_format((int) $item['value']) }}
                    <span class="text-xs font-semibold text-slate-400">
                        ({{ $total > 0 ? round(((int) $item['value'] / $total) * 100, 1) : 0 }}%)
                    </span>
                </span>
            </div>

            <div class="h-2.5 w-full overflow-hidden rounded-full bg-slate-100"
                 role="img" aria-label="{{ $item['label'] ?? '' }}: {{ number_format((int) $item['value']) }}">
                <div class="h-full rounded-full" style="width: {{ $persen }}%; background-color: {{ $color }}"></div>
            </div>

            @isset($item['meta'])
                <p class="mt-1 text-xs text-slate-400">{{ $item['meta'] }}</p>
            @endisset
        </li>
    @endforeach
</ul>
