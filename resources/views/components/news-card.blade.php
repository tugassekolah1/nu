@props(['berita'])

<article {{ $attributes->merge(['class' => 'group bg-warm-card rounded-card border border-border-neutral shadow-subtle p-3 flex flex-col hover:-translate-y-1.5 hover:shadow-elevated hover:border-border-subtle transition-all duration-300']) }}>
    <a class="relative block aspect-[16/10] overflow-hidden rounded-[16px] bg-warm-beige"
       href="{{ route('berita.show', $berita->slug) }}">
        @if ($berita->gambar)
            <img src="{{ Storage::url($berita->gambar) }}"
                 alt="{{ $berita->judul }}"
                 loading="lazy"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
            <div class="w-full h-full flex items-center justify-center text-muted-charcoal/60">
                <span class="material-symbols-outlined text-5xl">article</span>
            </div>
        @endif
        <span class="absolute top-3 left-3 inline-flex items-center gap-1.5 rounded-full bg-nu-deep/90 backdrop-blur-sm text-white text-[11px] font-bold uppercase tracking-wider px-2.5 py-1 border border-white/15">
            <span class="w-1.5 h-1.5 rounded-full bg-muted-gold"></span>
            {{ $berita->jenis }}
        </span>
    </a>

    <div class="px-3 pt-4 pb-2 flex flex-col flex-1">
        <div class="flex flex-wrap items-center gap-x-3 gap-y-1">
            <span class="text-xs font-semibold text-muted-charcoal flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[15px] text-muted-gold">event</span>
                {{ $berita->created_at->locale('id')->translatedFormat('d F Y') }}
            </span>
            <span class="text-xs font-semibold text-muted-charcoal flex items-center gap-1.5"
                  title="{{ number_format($berita->views) }} kali dibaca">
                <span class="material-symbols-outlined text-[15px] text-muted-gold">visibility</span>
                {{ number_format($berita->views) }} dibaca
            </span>
        </div>

        <h3 class="mt-2 text-lg font-bold text-charcoal leading-snug group-hover:text-nu-deep transition-colors">
            <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
        </h3>

        <p class="mt-2 text-sm text-muted-charcoal leading-relaxed line-clamp-2">
            {{ Str::limit(strip_tags($berita->isi), 130) }}
        </p>

        <a class="mt-auto pt-4 inline-flex items-center gap-1.5 text-nu-deep text-sm font-semibold group/link"
           href="{{ route('berita.show', $berita->slug) }}">
            <span>Baca selengkapnya</span>
            <span class="material-symbols-outlined text-[18px] transition-transform duration-200 group-hover/link:translate-x-1">arrow_forward</span>
        </a>
    </div>
</article>
