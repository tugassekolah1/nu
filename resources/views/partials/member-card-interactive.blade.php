{{--
    Preview kartu anggota interaktif memakai FlipCard (port vanilla JS dari
    React Bits FlipCard, di resources/js/flip-card.js, animasi via `motion`).
    Fitur: flip spring, drag untuk memutar (dengan flick), tilt mengikuti
    kursor, kilau (glare), bayangan yang menyempit saat kartu menyamping,
    dukungan keyboard (Enter/Space), serta API cetak
    window.printMemberCard('front' | 'back' | 'both').
    Butuh: $member, $qrCode — plus @vite('resources/js/member-card.js').
--}}
<style>
    /* ---------------- Panggung & kartu ---------------- */
    .mc-stage {
        position: relative;
        max-width: 560px;
        margin: 20px auto 0;
        display: flex;
        justify-content: center;
        padding: 8px 12px 44px; /* ruang untuk bayangan di bawah kartu */
    }

    /* Akar FlipCard — semua variabel (--fc-*) diisi oleh flip-card.js */
    .fc-card {
        position: relative;
        display: inline-block;
        max-width: 100%;
        width: var(--fc-w);
        height: var(--fc-h);
        border-radius: var(--fc-radius);
        cursor: pointer;
        touch-action: pan-y;
        user-select: none;
        -webkit-user-select: none;
        -webkit-tap-highlight-color: transparent;
        -webkit-touch-callout: none;
        outline: none;
    }

    .fc-card[data-axis="x"] { touch-action: pan-x; }
    .fc-card[data-draggable] { cursor: grab; }
    .fc-card[data-dragging] { cursor: grabbing; }
    .fc-card[data-disabled] { cursor: default; opacity: 0.6; }

    .fc-card:focus-visible {
        outline: 3px solid rgba(0, 110, 58, 0.45);
        outline-offset: 6px;
    }

    /* Bayangan dinamis di bawah kartu */
    .fc-shadow-el {
        position: absolute;
        inset: 12% 9% -5%;
        border-radius: var(--fc-radius);
        background: color-mix(in srgb, var(--fc-shadow) calc(var(--fc-shadow-o) * 100%), transparent);
        filter: blur(22px);
        pointer-events: none;
    }

    .fc-rotor {
        position: absolute;
        inset: 0;
        transform-style: preserve-3d;
    }

    .fc-face {
        position: absolute;
        inset: 0;
        overflow: hidden;
        border-radius: var(--fc-radius);
        background: var(--fc-bg);
        color: var(--fc-ink);
        border: 1px solid rgba(255, 255, 255, 0.25);
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
    }

    .fc-face img { -webkit-user-drag: none; }

    .fc-face-back { transform: rotateY(180deg); }
    .fc-card[data-axis="x"] .fc-face-back { transform: rotateX(180deg); }

    /* Kilau (glare) yang mengikuti kursor */
    .fc-glare {
        position: absolute;
        inset: 0;
        pointer-events: none;
        opacity: var(--fc-sheen, 0);
        background: radial-gradient(
            circle farthest-side at var(--fc-gx, 50%) var(--fc-gy, 50%),
            rgba(255, 255, 255, var(--fc-glare)) 0%,
            rgba(255, 255, 255, calc(var(--fc-glare) * 0.76)) 12%,
            rgba(255, 255, 255, calc(var(--fc-glare) * 0.5)) 26%,
            rgba(255, 255, 255, calc(var(--fc-glare) * 0.28)) 42%,
            rgba(255, 255, 255, calc(var(--fc-glare) * 0.12)) 60%,
            rgba(255, 255, 255, calc(var(--fc-glare) * 0.04)) 78%,
            rgba(255, 255, 255, 0) 100%
        );
    }

    /* Modus hemat gerak (prefers-reduced-motion): silang pudar, tanpa 3D */
    .fc-card[data-fade] .fc-face {
        opacity: 0;
        backface-visibility: visible;
        -webkit-backface-visibility: visible;
        transition: opacity 200ms ease;
    }
    .fc-card[data-fade="front"] .fc-face:not(.fc-face-back) { opacity: 1; }
    .fc-card[data-fade="back"] .fc-face-back { opacity: 1; transform: none; }

    /* ---------------- Desain sisi kartu ---------------- */
    .mc-side {
        position: absolute;
        inset: 0;
        box-sizing: border-box;
        padding: 18px 22px;
        display: flex;
        flex-direction: column;
        background: linear-gradient(135deg, #006e3a 0%, #004d28 100%);
        color: #ffffff;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, 'Segoe UI', Arial, sans-serif;
    }

    .mc-side::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg,
            transparent 45%,
            rgba(255, 255, 255, 0.12) 50%,
            transparent 55%
        );
        transform: rotate(30deg);
        pointer-events: none;
    }

    .mc-side-back {
        background: linear-gradient(225deg, #006e3a 0%, #004d28 100%);
    }

    .mc-card-header {
        text-align: center;
        border-bottom: 1.5px solid rgba(255, 255, 255, 0.3);
        padding-bottom: 8px;
        margin-bottom: 14px;
    }

    .mc-card-header h6 {
        margin: 0;
        font-size: 14px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .mc-card-content {
        display: flex;
        gap: 16px;
        align-items: center;
    }

    .mc-photo {
        width: 90px;
        height: 115px;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        flex-shrink: 0;
    }

    .mc-photo-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.15);
        color: #ffffff;
        font-size: 11px;
        font-weight: 600;
        text-align: center;
    }

    .mc-details {
        font-size: 12px;
        flex-grow: 1;
        line-height: 1.5;
        min-width: 0;
    }

    .mc-details p {
        margin: 3px 0;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.95);
    }

    .mc-details strong {
        font-weight: 700;
        color: #ffffff;
        display: inline-block;
        width: 65px;
    }

    .mc-card-footer {
        position: absolute;
        bottom: 12px;
        left: 22px;
        right: 22px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }

    .mc-valid {
        font-size: 10px;
        opacity: 0.9;
        font-weight: 600;
    }

    .mc-qr {
        background: #ffffff;
        padding: 5px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .mc-qr svg,
    .mc-qr img {
        width: 50px !important;
        height: 50px !important;
        display: block;
    }

    /* Sisi belakang */
    .mc-back-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .mc-logo {
        height: 26px;
        width: auto;
        object-fit: contain;
        flex-shrink: 0;
    }

    .mc-org h6 {
        margin: 0;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        line-height: 1.2;
    }

    .mc-org span {
        display: block;
        font-size: 9px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        opacity: 0.85;
        margin-top: 2px;
    }

    .mc-back-body {
        flex: 1;
        min-height: 0;
        padding-bottom: 40px;
        box-sizing: border-box;
        font-size: 11px;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.92);
    }

    .mc-back-body p {
        margin: 0 0 6px;
    }

    .mc-back-sub {
        font-size: 10px;
        opacity: 0.75;
    }

    .mc-back-cardno {
        font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
        font-size: 11px;
        font-weight: 700;
        padding: 3px 8px;
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.12);
    }

    .mc-sign {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        text-align: right;
    }

    .mc-sign-name {
        font-size: 11px;
        font-weight: 700;
        max-width: 180px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .mc-sign-line {
        width: 150px;
        border-bottom: 1px dashed rgba(255, 255, 255, 0.65);
        margin: 3px 0 2px;
    }

    .mc-sign-label {
        font-size: 8px;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.75;
    }

    /* ---------------- Kontrol ---------------- */
    .mc-controls {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-top: 6px;
    }

    .mc-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 10px 18px;
        border-radius: 14px;
        border: 1.5px solid rgba(0, 110, 58, 0.25);
        background: rgba(255, 255, 255, 0.85);
        color: #006e3a;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.2;
        text-align: center;
        cursor: pointer;
        transition: all 0.25s cubic-bezier(0.2, 0, 0, 1);
        user-select: none;
        -webkit-user-select: none;
    }

    .mc-btn:hover {
        background: #006e3a;
        color: #ffffff;
        border-color: #006e3a;
        transform: translateY(-1px);
        box-shadow: 0 8px 16px rgba(0, 110, 58, 0.22);
    }

    .mc-btn:active {
        transform: scale(0.98);
    }

    .mc-btn:focus-visible {
        outline: 3px solid rgba(0, 110, 58, 0.35);
        outline-offset: 2px;
    }

    .mc-btn.is-active {
        background: #006e3a;
        color: #ffffff;
        border-color: #006e3a;
        box-shadow: 0 6px 14px rgba(0, 110, 58, 0.25);
    }

    .mc-hint {
        text-align: center;
        font-size: 12px;
        color: #7b8780;
        margin: 10px 0 0;
    }

    .mc-fade-up {
        animation: mcFadeUp 0.5s cubic-bezier(0.2, 0, 0, 1) both;
    }

    @keyframes mcFadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ---------------- Cetak / Download ----------------
       Versi datar tanpa efek 3D. Hanya .mc-print yang dicetak. */
    .mc-print {
        display: none;
    }

    @media print {
        body > * {
            display: none !important;
        }

        body > .mc-print {
            display: block !important;
        }

        .mc-print-page {
            position: relative;
            width: 85.6mm;
            height: 53.98mm;
            overflow: hidden;
            box-sizing: border-box;
        }

        .mc-print-front {
            page-break-after: always;
            break-after: page;
        }

        body[data-print-side="front"] .mc-print-front {
            page-break-after: auto;
            break-after: auto;
        }

        body[data-print-side="front"] .mc-print-back,
        body[data-print-side="back"] .mc-print-front {
            display: none !important;
        }

        .mc-print-page .mc-side {
            padding: 8px 12px;
            border-radius: 10px;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .mc-print-page .mc-side::before {
            display: none !important;
        }

        .mc-print-page .mc-card-header {
            padding-bottom: 2px;
            margin-bottom: 6px;
        }

        .mc-print-page .mc-card-header h6 {
            font-size: 10px !important;
            letter-spacing: 1px !important;
        }

        .mc-print-page .mc-card-content {
            gap: 10px !important;
        }

        .mc-print-page .mc-photo {
            width: 48px !important;
            height: 62px !important;
            box-shadow: none;
        }

        .mc-print-page .mc-details {
            font-size: 8.5px !important;
            line-height: 1.3 !important;
        }

        .mc-print-page .mc-details p {
            margin: 1.5px 0 !important;
        }

        .mc-print-page .mc-details strong {
            width: 45px !important;
        }

        .mc-print-page .mc-card-footer {
            bottom: 6px;
            left: 12px;
            right: 12px;
        }

        .mc-print-page .mc-valid {
            font-size: 7px !important;
        }

        .mc-print-page .mc-qr {
            padding: 2px !important;
            box-shadow: none;
        }

        .mc-print-page .mc-qr svg,
        .mc-print-page .mc-qr img {
            width: 34px !important;
            height: 34px !important;
        }

        .mc-print-page .mc-logo {
            height: 17px !important;
        }

        .mc-print-page .mc-org h6 {
            font-size: 10px !important;
            letter-spacing: 1px !important;
        }

        .mc-print-page .mc-org span {
            font-size: 7px !important;
        }

        .mc-print-page .mc-back-body {
            font-size: 8px !important;
            line-height: 1.45 !important;
            padding-bottom: 26px !important;
        }

        .mc-print-page .mc-back-sub {
            font-size: 7px !important;
        }

        .mc-print-page .mc-back-cardno {
            font-size: 8px !important;
            padding: 2px 5px !important;
        }

        .mc-print-page .mc-sign-name {
            font-size: 8px !important;
            max-width: 130px !important;
        }

        .mc-print-page .mc-sign-line {
            width: 110px !important;
            margin: 2px 0 1px !important;
        }

        .mc-print-page .mc-sign-label {
            font-size: 6.5px !important;
        }

        @page {
            size: 85.6mm 53.98mm;
            margin: 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .mc-btn,
        .mc-fade-up {
            transition: none !important;
            animation: none !important;
        }
    }
</style>

<div class="mc-stage mc-fade-up no-print" id="mcStage">
    <div class="fc-card"
         id="mcCard"
         data-flip-card
         data-width="420"
         data-height="260"
         data-radius="16"
         data-aria-label="Kartu anggota {{ $member->full_name }}">
        <span class="fc-shadow-el" aria-hidden="true"></span>
        <div class="fc-rotor">
            <div class="fc-face">
                @include('partials.member-card-face-front')
            </div>
            <div class="fc-face fc-face-back">
                @include('partials.member-card-face-back')
            </div>
        </div>
    </div>
</div>

<div class="mc-controls no-print" role="group" aria-label="Kontrol kartu">
    <button type="button" class="mc-btn is-active" data-fc="front" aria-pressed="true">Lihat Depan</button>
    <button type="button" class="mc-btn" data-fc="back" aria-pressed="false">Lihat Belakang</button>
    <button type="button" class="mc-btn" data-fc="flip">Putar Kartu</button>
    <button type="button" class="mc-btn" data-fc="reset">Reset Posisi</button>
</div>

<p class="mc-hint no-print">
    Klik atau ketuk kartu untuk membalik &bull; Geser kartu untuk memutarnya perlahan
</p>
