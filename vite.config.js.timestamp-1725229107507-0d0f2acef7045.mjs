// vite.config.js
import { fileURLToPath, URL } from "node:url";
import { defineConfig, loadEnv } from "file:///var/www/startinvest/node_modules/vite/dist/node/index.js";
import AutoImport from "file:///var/www/startinvest/node_modules/unplugin-auto-import/dist/vite.js";
import Components from "file:///var/www/startinvest/node_modules/unplugin-vue-components/dist/vite.js";
import { ElementPlusResolver } from "file:///var/www/startinvest/node_modules/unplugin-vue-components/dist/resolvers.js";
import vue from "file:///var/www/startinvest/node_modules/@vitejs/plugin-vue/dist/index.mjs";
import vueDevTools from "file:///var/www/startinvest/node_modules/vite-plugin-vue-devtools/dist/vite.mjs";
import laravel from "file:///var/www/startinvest/node_modules/laravel-vite-plugin/dist/index.js";
import svgLoader from "file:///var/www/startinvest/node_modules/vite-svg-loader/index.js";
var __vite_injected_original_import_meta_url = "file:///var/www/startinvest/vite.config.js";
var env = loadEnv("all", process.cwd());
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/js/app.js"
      ],
      refresh: true
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false
        }
      }
    }),
    vueDevTools(),
    AutoImport({
      resolvers: [ElementPlusResolver()]
    }),
    Components({
      resolvers: [ElementPlusResolver()]
    }),
    svgLoader()
  ],
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./resources/js", __vite_injected_original_import_meta_url))
    }
  },
  server: {
    host: true,
    port: env.VITE_ASSET_PORT,
    strictPort: true,
    hmr: {
      host: env.VITE_ASSET_HOST,
      port: env.VITE_ASSET_PORT
    }
    // https: {
    //   key: fs.readFileSync(env.VITE_PRIVKEY_PATH),
    //   cert: fs.readFileSync(env.VITE_CERT_PATH),
    // },
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCIvdmFyL3d3dy9zdGFydGludmVzdFwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiL3Zhci93d3cvc3RhcnRpbnZlc3Qvdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL3Zhci93d3cvc3RhcnRpbnZlc3Qvdml0ZS5jb25maWcuanNcIjtpbXBvcnQgeyBmaWxlVVJMVG9QYXRoLCBVUkwgfSBmcm9tICdub2RlOnVybCdcbmltcG9ydCBwYXRoIGZyb20gJ25vZGU6cGF0aCc7XG5cbmltcG9ydCB7IGRlZmluZUNvbmZpZywgbG9hZEVudiB9IGZyb20gJ3ZpdGUnO1xuaW1wb3J0IEF1dG9JbXBvcnQgZnJvbSAndW5wbHVnaW4tYXV0by1pbXBvcnQvdml0ZSdcbmltcG9ydCBDb21wb25lbnRzIGZyb20gJ3VucGx1Z2luLXZ1ZS1jb21wb25lbnRzL3ZpdGUnXG5pbXBvcnQgeyBFbGVtZW50UGx1c1Jlc29sdmVyIH0gZnJvbSAndW5wbHVnaW4tdnVlLWNvbXBvbmVudHMvcmVzb2x2ZXJzJ1xuaW1wb3J0IHZ1ZSBmcm9tICdAdml0ZWpzL3BsdWdpbi12dWUnO1xuaW1wb3J0IHZ1ZURldlRvb2xzIGZyb20gJ3ZpdGUtcGx1Z2luLXZ1ZS1kZXZ0b29scydcbmltcG9ydCBsYXJhdmVsIGZyb20gJ2xhcmF2ZWwtdml0ZS1wbHVnaW4nO1xuaW1wb3J0IHN2Z0xvYWRlciBmcm9tICd2aXRlLXN2Zy1sb2FkZXInXG5pbXBvcnQgZnMgZnJvbSAnZnMnO1xuXG5jb25zdCBlbnYgPSBsb2FkRW52KCdhbGwnLCBwcm9jZXNzLmN3ZCgpKTtcblxuLy8gaHR0cHM6Ly92aXRlanMuZGV2L2NvbmZpZy9cbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XG4gIHBsdWdpbnM6IFtcbiAgICBsYXJhdmVsKHtcbiAgICAgIGlucHV0OiBbXG4gICAgICAgICdyZXNvdXJjZXMvanMvYXBwLmpzJyxcbiAgICAgIF0sXG4gICAgICByZWZyZXNoOiB0cnVlLFxuICAgIH0pLFxuICAgIHZ1ZSh7XG4gICAgICB0ZW1wbGF0ZToge1xuICAgICAgICB0cmFuc2Zvcm1Bc3NldFVybHM6IHtcbiAgICAgICAgICBiYXNlOiBudWxsLFxuICAgICAgICAgIGluY2x1ZGVBYnNvbHV0ZTogZmFsc2UsXG4gICAgICAgIH0sXG4gICAgICB9LFxuICAgIH0pLFxuICAgIHZ1ZURldlRvb2xzKCksXG4gICAgQXV0b0ltcG9ydCh7XG4gICAgICByZXNvbHZlcnM6IFtFbGVtZW50UGx1c1Jlc29sdmVyKCldLFxuICAgIH0pLFxuICAgIENvbXBvbmVudHMoe1xuICAgICAgcmVzb2x2ZXJzOiBbRWxlbWVudFBsdXNSZXNvbHZlcigpXSxcbiAgICB9KSxcbiAgICBzdmdMb2FkZXIoKVxuICBdLFxuICByZXNvbHZlOiB7XG4gICAgYWxpYXM6IHtcbiAgICAgICdAJzogZmlsZVVSTFRvUGF0aChuZXcgVVJMKCcuL3Jlc291cmNlcy9qcycsIGltcG9ydC5tZXRhLnVybCkpXG4gICAgfVxuICB9LFxuICBzZXJ2ZXI6IHtcbiAgICBob3N0OiB0cnVlLFxuICAgIHBvcnQ6IGVudi5WSVRFX0FTU0VUX1BPUlQsXG4gICAgc3RyaWN0UG9ydDogdHJ1ZSxcbiAgICBobXI6IHtcbiAgICAgIGhvc3Q6IGVudi5WSVRFX0FTU0VUX0hPU1QsXG4gICAgICBwb3J0OiBlbnYuVklURV9BU1NFVF9QT1JULFxuICAgIH0sXG4gICAgLy8gaHR0cHM6IHtcbiAgICAvLyAgIGtleTogZnMucmVhZEZpbGVTeW5jKGVudi5WSVRFX1BSSVZLRVlfUEFUSCksXG4gICAgLy8gICBjZXJ0OiBmcy5yZWFkRmlsZVN5bmMoZW52LlZJVEVfQ0VSVF9QQVRIKSxcbiAgICAvLyB9LFxuICB9LFxufSk7XG4iXSwKICAibWFwcGluZ3MiOiAiO0FBQThPLFNBQVMsZUFBZSxXQUFXO0FBR2pSLFNBQVMsY0FBYyxlQUFlO0FBQ3RDLE9BQU8sZ0JBQWdCO0FBQ3ZCLE9BQU8sZ0JBQWdCO0FBQ3ZCLFNBQVMsMkJBQTJCO0FBQ3BDLE9BQU8sU0FBUztBQUNoQixPQUFPLGlCQUFpQjtBQUN4QixPQUFPLGFBQWE7QUFDcEIsT0FBTyxlQUFlO0FBVjBILElBQU0sMkNBQTJDO0FBYWpNLElBQU0sTUFBTSxRQUFRLE9BQU8sUUFBUSxJQUFJLENBQUM7QUFHeEMsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDMUIsU0FBUztBQUFBLElBQ1AsUUFBUTtBQUFBLE1BQ04sT0FBTztBQUFBLFFBQ0w7QUFBQSxNQUNGO0FBQUEsTUFDQSxTQUFTO0FBQUEsSUFDWCxDQUFDO0FBQUEsSUFDRCxJQUFJO0FBQUEsTUFDRixVQUFVO0FBQUEsUUFDUixvQkFBb0I7QUFBQSxVQUNsQixNQUFNO0FBQUEsVUFDTixpQkFBaUI7QUFBQSxRQUNuQjtBQUFBLE1BQ0Y7QUFBQSxJQUNGLENBQUM7QUFBQSxJQUNELFlBQVk7QUFBQSxJQUNaLFdBQVc7QUFBQSxNQUNULFdBQVcsQ0FBQyxvQkFBb0IsQ0FBQztBQUFBLElBQ25DLENBQUM7QUFBQSxJQUNELFdBQVc7QUFBQSxNQUNULFdBQVcsQ0FBQyxvQkFBb0IsQ0FBQztBQUFBLElBQ25DLENBQUM7QUFBQSxJQUNELFVBQVU7QUFBQSxFQUNaO0FBQUEsRUFDQSxTQUFTO0FBQUEsSUFDUCxPQUFPO0FBQUEsTUFDTCxLQUFLLGNBQWMsSUFBSSxJQUFJLGtCQUFrQix3Q0FBZSxDQUFDO0FBQUEsSUFDL0Q7QUFBQSxFQUNGO0FBQUEsRUFDQSxRQUFRO0FBQUEsSUFDTixNQUFNO0FBQUEsSUFDTixNQUFNLElBQUk7QUFBQSxJQUNWLFlBQVk7QUFBQSxJQUNaLEtBQUs7QUFBQSxNQUNILE1BQU0sSUFBSTtBQUFBLE1BQ1YsTUFBTSxJQUFJO0FBQUEsSUFDWjtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUEsRUFLRjtBQUNGLENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
