import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/manager.css', 
                'resources/js/app.js',
                'resources/js/res_manager.js',
                'resources/js/login.js',
                'resources/js/pos.js',
                'resources/js/admin.js',
                'resources/js/sign-up.js'           
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            'vue': 'vue/dist/vue.esm-bundler.js'
        },
    },
    build: {
        chunkSizeWarningLimit: 1600,
    },
});
