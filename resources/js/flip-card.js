/**
 * FlipCard — port vanilla JS dari komponen React Bits "FlipCard"
 * (variant JavaScript + Tailwind) memakai API vanilla dari paket `motion`.
 *
 * Struktur DOM yang diharapkan:
 *
 *   <div data-flip-card>
 *     <span class="fc-shadow-el"></span>          (opsional, untuk bayangan)
 *     <div class="fc-rotor">
 *       <div class="fc-face">...depan...</div>
 *       <div class="fc-face fc-face-back">...belakang...</div>
 *     </div>
 *   </div>
 *
 * Hasil: `createFlipCard(root, options)` mengembalikan API
 * { flip, showFront, showBack, reset, setFlipped, isFlipped, destroy }.
 */

import { animate, motionValue } from 'motion';

const SLOP = { fine: 4, coarse: 8 };
const TILT_SPRING = { stiffness: 240, damping: 24, mass: 0.6 };
const LIFT_SPRING = { stiffness: 320, damping: 26 };
const FLING = 0.16;
const HISTORY_MS = 90;

const clamp = (v, lo, hi) => Math.min(hi, Math.max(lo, v));
const snap = deg => Math.round(deg / 180) * 180;
const isBack = deg => Math.abs(Math.round(deg / 180)) % 2 === 1;

export function createFlipCard(root, options = {}) {
    const {
        flipped: controlledValue,
        defaultFlipped = false,
        onFlipChange,
        axis = 'y',
        flipOnClick = true,
        draggable = true,
        dragDistance = 0,
        tilt = true,
        tiltMax = 12,
        glare = true,
        glareOpacity = 0.22,
        hoverScale = 1.03,
        perspective = 1100,
        stiffness = 170,
        damping = 20,
        width = 300,
        height = 400,
        radius = 22,
        background = '#27272a',
        color = '#f5f5f5',
        shadow = true,
        shadowColor = '#000000',
        shadowOpacity = 0.45,
        disabled = false,
        ariaLabel = 'Flip card',
    } = options;

    const reduceQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    const isReduced = () => reduceQuery.matches;

    const rotor = root.querySelector('.fc-rotor');
    const faces = rotor ? rotor.querySelectorAll('.fc-face') : [];
    const frontFace = faces[0] || null;
    const backFace = faces[1] || null;
    const shadowEl = root.querySelector('.fc-shadow-el');

    if (!rotor || !frontFace || !backFace) {
        throw new Error('createFlipCard: root harus berisi .fc-rotor dengan dua .fc-face (depan & belakang).');
    }

    /* ---------------- Variabel animasi ---------------- */

    const controlled = controlledValue !== undefined;
    let inner = !!defaultFlipped;
    let shown = controlled ? !!controlledValue : inner;
    let targetDeg = shown ? 180 : 0;
    let isDisabled = !!disabled;

    const turn = motionValue(shown ? 180 : 0);
    const tiltX = motionValue(0);
    const tiltY = motionValue(0);
    const lift = motionValue(1);
    const sheen = motionValue(0);
    const gx = motionValue(50);
    const gy = motionValue(50);

    let spinAnim = null;
    let tiltXAnim = null;
    let tiltYAnim = null;
    let liftAnim = null;
    let sheenAnim = null;
    let grip = null;
    const springTo = (mv, to, springOpts) => {
        const anim = animate(mv, to, { type: 'spring', ...springOpts });
        return anim;
    };

    /* ---------------- Render ---------------- */

    const render = () => {
        const t = turn.get();

        if (!isReduced()) {
            const tx = tiltX.get();
            const ty = tiltY.get();
            const s = lift.get();

            rotor.style.transform = axis === 'x'
                ? `perspective(${perspective}px) scale(${s}) rotateY(${ty}deg) rotateX(${t + tx}deg)`
                : `perspective(${perspective}px) scale(${s}) rotateX(${tx}deg) rotateY(${t + ty}deg)`;
        }

        // Bayangan menyempit saat kartu menyamping (menghadap tepi).
        if (shadowEl) {
            const facing = Math.abs(Math.cos((t * Math.PI) / 180));
            const spread = 0.08 + 0.92 * facing;
            const shade = 0.1 + 0.9 * facing * facing;

            shadowEl.style.transform = axis === 'x' ? `scaleY(${spread})` : `scaleX(${spread})`;
            shadowEl.style.opacity = String(shade);
        }

        root.style.setProperty('--fc-sheen', String(sheen.get()));
        root.style.setProperty('--fc-gx', `${gx.get()}%`);
        root.style.setProperty('--fc-gy', `${gy.get()}%`);
    };

    [turn, tiltX, tiltY, lift, sheen, gx, gy].forEach(mv => mv.on('change', render));

    /* ---------------- Sisi tampil / tersembunyi ---------------- */

    const updateFaces = () => {
        root.setAttribute('aria-pressed', String(shown));
        frontFace.setAttribute('aria-hidden', String(shown));
        frontFace.inert = shown;
        backFace.setAttribute('aria-hidden', String(!shown));
        backFace.inert = !shown;

        if (isReduced()) {
            root.setAttribute('data-fade', shown ? 'back' : 'front');
        } else {
            root.removeAttribute('data-fade');
        }
    };

    const emitFlip = () => {
        updateFaces();
        onFlipChange?.(shown);
    };

    /* ---------------- Inti logika flip ---------------- */

    const settle = (to, velocity = 0, instant = false) => {
        spinAnim?.stop();
        targetDeg = to;

        if (instant || isReduced()) {
            turn.jump(to);
        } else {
            spinAnim = animate(turn, to, {
                type: 'spring',
                stiffness,
                damping,
                velocity,
                restDelta: 0.05,
            });
        }

        const next = isBack(to);
        if (next === shown) return;
        shown = next;
        if (!controlled) inner = next;
        emitFlip();
    };

    const flip = (instant = false) => {
        const base = snap(turn.get());
        settle(isBack(base) ? base - 180 : base + 180, 0, instant);
    };

    const rest = () => {
        tiltXAnim?.stop();
        tiltYAnim?.stop();
        sheenAnim?.stop();
        liftAnim?.stop();
        tiltX.set(0);
        tiltY.set(0);
        sheen.set(0);
        lift.set(1);
    };

    /* ---------------- Pointer ---------------- */

    const onPointerDown = e => {
        if (isDisabled || e.button !== 0 || grip) return;
        try {
            e.currentTarget.setPointerCapture(e.pointerId);
        } catch { /* pointer capture tidak didukung */ }

        spinAnim?.stop();
        grip = {
            id: e.pointerId,
            x: e.clientX,
            y: e.clientY,
            base: turn.get(),
            moved: false,
            slop: e.pointerType === 'touch' ? SLOP.coarse : SLOP.fine,
            w: root.offsetWidth || width,
            h: root.offsetHeight || height,
            hist: [],
        };
        if (!isReduced()) {
            liftAnim?.stop();
            liftAnim = springTo(lift, hoverScale, LIFT_SPRING);
        }
    };

    const onPointerMove = e => {
        if (grip && grip.id === e.pointerId) {
            const d = axis === 'x' ? e.clientY - grip.y : e.clientX - grip.x;

            if (!grip.moved) {
                if (Math.abs(d) < grip.slop || !draggable || isReduced()) return;
                grip.moved = true;
                root.setAttribute('data-dragging', '');
                tiltXAnim?.stop();
                tiltYAnim?.stop();
                sheenAnim?.stop();
                tiltX.set(0);
                tiltY.set(0);
                sheen.set(0);
            }

            const span = dragDistance > 0 ? dragDistance : axis === 'x' ? grip.h : grip.w;
            const deg = grip.base + (axis === 'x' ? -1 : 1) * (d / span) * 180;
            turn.set(deg);

            const now = performance.now();
            grip.hist.push({ t: now, v: deg });
            while (grip.hist.length > 2 && now - grip.hist[0].t > HISTORY_MS) grip.hist.shift();
            return;
        }

        if (!tilt || isReduced() || isDisabled || e.pointerType === 'touch') return;

        const r = e.currentTarget.getBoundingClientRect();
        const px = clamp((e.clientX - r.left) / r.width, 0, 1);
        const py = clamp((e.clientY - r.top) / r.height, 0, 1);

        tiltXAnim?.stop();
        tiltYAnim?.stop();
        sheenAnim?.stop();
        tiltXAnim = springTo(tiltX, (0.5 - py) * 2 * tiltMax, TILT_SPRING);
        tiltYAnim = springTo(tiltY, (px - 0.5) * 2 * tiltMax, TILT_SPRING);
        gx.set(px * 100);
        gy.set(py * 100);
        sheenAnim = springTo(sheen, 1, LIFT_SPRING);
    };

    // Lepas pegangan: putuskan sisi akhir (dengan membawa kecepatan flick).
    const release = (e, cancelled) => {
        const g = grip;
        if (!g || g.id !== e.pointerId) return;

        grip = null;
        try {
            if (e.currentTarget.hasPointerCapture(e.pointerId)) {
                e.currentTarget.releasePointerCapture(e.pointerId);
            }
        } catch { /* noop */ }

        root.removeAttribute('data-dragging');

        const hovered = e.pointerType !== 'touch' && root.matches(':hover');
        if (!hovered) rest();

        if (!g.moved) {
            if (!cancelled && flipOnClick) flip(false);
            else settle(targetDeg, 0, false);
            return;
        }

        const here = turn.get();
        let velocity = 0;
        const a = g.hist[0];
        const b = g.hist[g.hist.length - 1];
        if (!cancelled && a && b && b.t > a.t && performance.now() - b.t < 60) {
            velocity = ((b.v - a.v) / (b.t - a.t)) * 1000;
        }

        const to = cancelled
            ? snap(g.base)
            : clamp(snap(here + velocity * FLING), snap(here) - 180, snap(here) + 180);

        settle(to, velocity, false);
    };

    const onKeyDown = e => {
        if (isDisabled || (e.key !== 'Enter' && e.key !== ' ')) return;
        e.preventDefault();
        if (!e.repeat) flip(true);
    };

    const onClick = e => {
        // Klik yang dipicu keyboard (tanpa pointer) memiliki detail 0.
        if (!isDisabled && e.detail === 0) flip(true);
    };

    const onDragStart = e => e.preventDefault();

    const onPointerEnter = e => {
        if (!isReduced() && !isDisabled && e.pointerType !== 'touch') {
            liftAnim?.stop();
            liftAnim = springTo(lift, hoverScale, LIFT_SPRING);
        }
    };

    const onPointerLeave = () => {
        if (!grip) rest();
    };

    const onPointerUp = e => release(e, false);
    const onPointerCancel = e => release(e, true);
    const onReducedChange = () => updateFaces();

    root.addEventListener('pointerdown', onPointerDown);
    root.addEventListener('pointermove', onPointerMove);
    root.addEventListener('pointerup', onPointerUp);
    root.addEventListener('pointercancel', onPointerCancel);
    root.addEventListener('lostpointercapture', onPointerCancel);
    root.addEventListener('pointerenter', onPointerEnter);
    root.addEventListener('pointerleave', onPointerLeave);
    root.addEventListener('keydown', onKeyDown);
    root.addEventListener('click', onClick);
    root.addEventListener('dragstart', onDragStart);
    reduceQuery.addEventListener('change', onReducedChange);

    /* ---------------- State awal & konfigurasi root ---------------- */

    root.setAttribute('role', 'button');
    root.setAttribute('aria-pressed', String(shown));
    root.setAttribute('aria-label', ariaLabel);
    root.setAttribute('data-axis', axis);

    root.style.setProperty('--fc-w', typeof width === 'number' ? `${width}px` : width);
    root.style.setProperty('--fc-h', typeof height === 'number' ? `${height}px` : height);
    root.style.setProperty('--fc-radius', typeof radius === 'number' ? `${radius}px` : radius);
    root.style.setProperty('--fc-bg', background);
    root.style.setProperty('--fc-ink', color);
    root.style.setProperty('--fc-shadow', shadowColor);
    root.style.setProperty('--fc-shadow-o', String(shadowOpacity));
    root.style.setProperty('--fc-glare', String(glareOpacity));

    if (shadowEl) shadowEl.style.display = shadow ? '' : 'none';

    // Efek kilau (glare) mengikuti kursor pada kedua sisi.
    if (glare) {
        faces.forEach(face => {
            const g = document.createElement('span');
            g.className = 'fc-glare';
            g.setAttribute('aria-hidden', 'true');
            face.appendChild(g);
        });
    }

    const setDisabledState = value => {
        isDisabled = !!value;
        if (isDisabled) {
            rest();
            root.setAttribute('data-disabled', '');
            root.setAttribute('aria-disabled', 'true');
            root.setAttribute('tabindex', '-1');
        } else {
            root.removeAttribute('data-disabled');
            root.removeAttribute('aria-disabled');
            root.setAttribute('tabindex', '0');
        }
    };

    root.setAttribute('tabindex', '0');
    if (isDisabled) setDisabledState(true);

    updateFaces();
    render();

    /* ---------------- API publik ---------------- */

    return {
        flip: (instant = false) => {
            if (!isDisabled) flip(instant);
        },
        showFront: () => {
            if (!isDisabled && shown) flip(false);
        },
        showBack: () => {
            if (!isDisabled && !shown) flip(false);
        },
        /** Kembalikan ke kondisi diam (tilt/glare hilang, sisi tetap). */
        reset: rest,
        setFlipped: value => {
            const to = value ? 180 : 0;
            if (isBack(targetDeg) === !!value) return;
            targetDeg = to;
            if (isReduced()) turn.jump(to);
            else {
                spinAnim?.stop();
                spinAnim = animate(turn, to, { type: 'spring', stiffness, damping, restDelta: 0.05 });
            }
            shown = !!value;
            if (!controlled) inner = shown;
            emitFlip();
        },
        setDisabled: setDisabledState,
        isFlipped: () => shown,
        destroy: () => {
            spinAnim?.stop();
            tiltXAnim?.stop();
            tiltYAnim?.stop();
            liftAnim?.stop();
            sheenAnim?.stop();
            root.removeEventListener('pointerdown', onPointerDown);
            root.removeEventListener('pointermove', onPointerMove);
            root.removeEventListener('pointerup', onPointerUp);
            root.removeEventListener('pointercancel', onPointerCancel);
            root.removeEventListener('lostpointercapture', onPointerCancel);
            root.removeEventListener('pointerenter', onPointerEnter);
            root.removeEventListener('pointerleave', onPointerLeave);
            root.removeEventListener('keydown', onKeyDown);
            root.removeEventListener('click', onClick);
            root.removeEventListener('dragstart', onDragStart);
            reduceQuery.removeEventListener('change', onReducedChange);
        },
    };
}

export default createFlipCard;
