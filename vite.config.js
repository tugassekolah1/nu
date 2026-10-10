import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/member-card.js',
            ],
            refresh: [
                'app/Livewire/**',
                'app/View/Components/**',
                'lang/**',
                'resources/lang/**',
                'resources/views/**',
                'routes/**',
            ],
        }),
    ],
    server: {
        watch: {
            // Abaikan file artefak/cache agar tidak memicu full-reload liar.
            // Tanpa ini, kompilasi ulang Blade di storage/framework/views
            // menembakkan "page reload" yang membatalkan navigasi yang
            // sedang berjalan (klik menu terasa tidak pindah halaman).
            ignored: ['**/storage/**', '**/bootstrap/cache/**'],
        },
    },
});
