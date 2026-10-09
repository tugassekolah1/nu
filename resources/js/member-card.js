/**
 * Entry khusus halaman kartu anggota.
 *
 * Menginisialisasi preview kartu interaktif (FlipCard port) dan API cetak
 * window.printMemberCard('front' | 'back' | 'both').
 */

import { createFlipCard } from './flip-card.js';

/** Cetak kartu (depan / belakang / keduanya) lewat dialog cetak browser. */
window.printMemberCard = function (side) {
    if (side !== 'front' && side !== 'back' && side !== 'both') {
        side = 'both';
    }

    document.body.setAttribute('data-print-side', side);

    let started = false;
    const go = function () {
        if (started) return;
        started = true;
        window.print();
    };

    // Pastikan gambar (foto & logo) sudah termuat agar hasil PDF tidak kosong.
    const images = Array.prototype.slice.call(document.querySelectorAll('.mc-print img'));
    const pending = images.filter(img => !img.complete);

    if (pending.length === 0) {
        go();
        return;
    }

    let remaining = pending.length;
    pending.forEach(img => {
        const done = () => {
            remaining -= 1;
            if (remaining <= 0) go();
        };
        img.addEventListener('load', done, { once: true });
        img.addEventListener('error', done, { once: true });
    });

    // Jaga-jaga bila gambar lambat dimuat.
    window.setTimeout(go, 1500);
};

window.addEventListener('afterprint', () => {
    document.body.removeAttribute('data-print-side');
});

function initFlipCard() {
    const root = document.querySelector('[data-flip-card]');
    if (!root) return;

    // Tombol kontrol di sekitar kartu: data-fc="front|back|flip|reset".
    const buttons = document.querySelectorAll('[data-fc]');
    const frontBtn = document.querySelector('[data-fc="front"]');
    const backBtn = document.querySelector('[data-fc="back"]');

    const syncButtons = shownBack => {
        if (frontBtn) {
            frontBtn.classList.toggle('is-active', !shownBack);
            frontBtn.setAttribute('aria-pressed', String(!shownBack));
        }
        if (backBtn) {
            backBtn.classList.toggle('is-active', shownBack);
            backBtn.setAttribute('aria-pressed', String(shownBack));
        }
    };

    const card = createFlipCard(root, {
        width: Number(root.dataset.width) || 420,
        height: Number(root.dataset.height) || 260,
        radius: Number(root.dataset.radius) || 16,
        perspective: 1200,
        glareOpacity: 0.18,
        shadowOpacity: 0.35,
        ariaLabel: root.dataset.ariaLabel || 'Kartu anggota',
        onFlipChange: syncButtons,
    });

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            switch (btn.dataset.fc) {
                case 'front':
                    card.showFront();
                    break;
                case 'back':
                    card.showBack();
                    break;
                case 'flip':
                    card.flip();
                    break;
                case 'reset':
                    card.reset();
                    break;
            }
        });
    });

    syncButtons(card.isFlipped());
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFlipCard);
} else {
    initFlipCard();
}
