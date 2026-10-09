{{--
    Kartu versi cetak/download: datar, tanpa efek 3D/perspective.
    Harus menjadi child langsung <body> agar aturan print
    "body > * { display: none }" tidak menyembunyikannya.
    Butuh: $member, $qrCode
--}}
<div class="mc-print" aria-hidden="true">
    <div class="mc-print-page mc-print-front">
        @include('partials.member-card-face-front')
    </div>
    <div class="mc-print-page mc-print-back">
        @include('partials.member-card-face-back')
    </div>
</div>
