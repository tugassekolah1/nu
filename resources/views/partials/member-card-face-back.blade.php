{{--
    Sisi belakang kartu anggota (identitas NU, ketentuan, dan kolom tanda tangan).
    Butuh: $member
--}}
<div class="mc-side mc-side-back">
    <div class="mc-card-header mc-back-header">
        <img src="{{ asset('images/logo.webp') }}" class="mc-logo" alt="Logo NU">
        <div class="mc-org">
            <h6>Nahdlatul Ulama</h6>
            <span>Kartu Tanda Anggota</span>
        </div>
    </div>

    <div class="mc-back-body">
        <p>
            Kartu ini adalah bukti keanggotaan resmi <strong>Nahdlatul Ulama</strong>.
            Bila ditemukan, mohon dikembalikan kepada pengurus NU terdekat.
        </p>
        <p class="mc-back-sub">Gunakan kartu ini untuk keperluan administrasi keanggotaan.</p>
    </div>

    <div class="mc-card-footer mc-back-footer">
        <span class="mc-back-cardno">{{ $member->member_card_no ?? '—' }}</span>
        <div class="mc-sign">
            <span class="mc-sign-name">{{ $member->full_name }}</span>
            <span class="mc-sign-line"></span>
            <span class="mc-sign-label">Pemegang Kartu</span>
        </div>
    </div>
</div>
