@if ($member->registrationState() === 'pending')
    <div class="inline-flex items-center gap-1.5">
        <button type="button"
                data-accept-btn
                data-url="{{ route('admin.members.requests.accept', $member) }}"
                data-name="{{ $member->full_name }}"
                title="Terima Permintaan"
                class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-lg text-xs font-bold transition-all shadow-xs active:scale-95 disabled:opacity-70 disabled:cursor-not-allowed">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            Terima
        </button>

        <button type="button"
                data-reject-btn
                data-url="{{ route('admin.members.requests.reject', $member) }}"
                data-name="{{ $member->full_name }}"
                title="Tolak Permintaan"
                class="inline-flex items-center gap-1.5 bg-white border border-rose-200 text-rose-600 hover:bg-rose-50 px-3 py-1.5 rounded-lg text-xs font-bold transition-all shadow-xs active:scale-95 disabled:opacity-70 disabled:cursor-not-allowed">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            Tolak
        </button>
    </div>
@else
    <span class="text-slate-400 italic text-xs">Selesai diproses</span>
@endif
