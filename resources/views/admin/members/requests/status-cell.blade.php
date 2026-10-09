@php($state = $member->registrationState())

<div class="space-y-1.5" data-member-state="{{ $state }}">
    <span @class([
        'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold whitespace-nowrap',
        'bg-amber-100/80 text-amber-800' => $state === 'pending',
        'bg-emerald-100/80 text-emerald-800' => $state === 'accepted',
        'bg-rose-100/80 text-rose-800' => $state === 'rejected',
    ])>
        <span @class([
            'w-1.5 h-1.5 rounded-full',
            'bg-amber-500' => $state === 'pending',
            'bg-emerald-500' => $state === 'accepted',
            'bg-rose-500' => $state === 'rejected',
        ])></span>
        {{ match ($state) {
            'accepted' => 'Diterima',
            'rejected' => 'Ditolak',
            default => 'Menunggu',
        } }}
    </span>

    @if ($state === 'rejected' && $member->rejection_reason)
        <p class="text-xs text-rose-500 leading-snug max-w-[220px]" title="{{ $member->rejection_reason }}">
            Alasan: {{ Str::limit($member->rejection_reason, 60) }}
        </p>
    @endif
</div>
