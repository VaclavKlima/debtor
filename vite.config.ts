import {defineConfig, normalizePath} from 'vite';
import laravel from 'laravel-vite-plugin';
// @ts-ignore
import path from 'node:path';
import {viteStaticCopy} from 'vite-plugin-static-copy';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/main.scss',
                'resources/sass/oneui/themes/amethyst.scss',
                'resources/sass/oneui/themes/city.scss',
                'resources/sass/oneui/themes/flat.scss',
                'resources/sass/oneui/themes/modern.scss',
                'resources/sass/oneui/themes/smooth.scss',
                'resources/js/oneui/app.js',
                'resources/js/app.ts',
                'resources/js/pages/slick.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/media',
                    dest: normalizePath(path.resolve(__dirname, './public'))
                }
            ]
        })
    ],
    esbuild: {
        target: 'ESNext',
    }
});
