import { fileURLToPath, URL } from 'node:url'
import path from 'node:path';

import { defineConfig, loadEnv } from 'vite';
import AutoImport from 'unplugin-auto-import/vite'
import Components from 'unplugin-vue-components/vite'
import { ElementPlusResolver } from 'unplugin-vue-components/resolvers'
import vue from '@vitejs/plugin-vue';
import vueDevTools from 'vite-plugin-vue-devtools'
import laravel from 'laravel-vite-plugin';
import svgLoader from 'vite-svg-loader'
import fs from 'fs';
import i18n from 'laravel-vue-i18n/vite';

const env = loadEnv('all', process.cwd());

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
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
    vueDevTools(),
    AutoImport({
      resolvers: [ElementPlusResolver()],
    }),
    Components({
      resolvers: [ElementPlusResolver()],
    }),
    svgLoader(),
    i18n()
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./resources/js', import.meta.url))
    }
  },
  server: {
    host: true,
    port: 8080,
    strictPort: true,
    hmr: {
      host: env.VITE_ASSET_HOST,
      port: env.VITE_ASSET_PORT,
    },
    // https: {
    //   key: fs.readFileSync(env.VITE_PRIVKEY_PATH),
    //   cert: fs.readFileSync(env.VITE_CERT_PATH),
    // },
  },
});
