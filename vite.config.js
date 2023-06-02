import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss',
        'resources/sass/pages/**',
        'resources/js/app.js',
        'resources/js/pages/**',
      ],
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
