import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react'; // <- 追記

export default defineConfig({
    plugins: [
        react(), // <- 追記
        laravel({
            input: 'resources/js/app.jsx', // <- inputを修正
            refresh: true,
        }),
    ],
});
