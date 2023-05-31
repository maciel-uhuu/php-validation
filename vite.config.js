import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/reset.scss', 'resources/css/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost', // fixes vite not being accessible
        },
        watch: {
            usePolling: true, // fixes hmr not working
        }
    }
});
