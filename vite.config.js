import vue from '@vitejs/plugin-vue'
import laravel from 'laravel-vite-plugin'
import { defineConfig } from 'vite'
import { fileURLToPath, URL } from 'url'

export default defineConfig({
    resolve: {
        alias: {
            // Damit '@' auf resources/js zeigt
            '@': fileURLToPath(new URL('./resources/js', import.meta.url)),
        },
    },
    plugins: [
        vue(),
        laravel({
            input: ['resources/js/app.ts'],
            ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            // Wenn du SCSS nutzt, hier z.B. globale Variablen importieren
            scss: {
                additionalData: `@import "@/styles/variables.scss";`
            }
        }
    }
})
