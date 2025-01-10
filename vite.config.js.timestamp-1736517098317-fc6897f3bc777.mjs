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
import i18n from "file:///var/www/startinvest/node_modules/laravel-vue-i18n/dist/vite.mjs";
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
    svgLoader(),
    i18n()
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
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCIvdmFyL3d3dy9zdGFydGludmVzdFwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiL3Zhci93d3cvc3RhcnRpbnZlc3Qvdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL3Zhci93d3cvc3RhcnRpbnZlc3Qvdml0ZS5jb25maWcuanNcIjtpbXBvcnQgeyBmaWxlVVJMVG9QYXRoLCBVUkwgfSBmcm9tICdub2RlOnVybCdcbmltcG9ydCBwYXRoIGZyb20gJ25vZGU6cGF0aCc7XG5cbmltcG9ydCB7IGRlZmluZUNvbmZpZywgbG9hZEVudiB9IGZyb20gJ3ZpdGUnO1xuaW1wb3J0IEF1dG9JbXBvcnQgZnJvbSAndW5wbHVnaW4tYXV0by1pbXBvcnQvdml0ZSdcbmltcG9ydCBDb21wb25lbnRzIGZyb20gJ3VucGx1Z2luLXZ1ZS1jb21wb25lbnRzL3ZpdGUnXG5pbXBvcnQgeyBFbGVtZW50UGx1c1Jlc29sdmVyIH0gZnJvbSAndW5wbHVnaW4tdnVlLWNvbXBvbmVudHMvcmVzb2x2ZXJzJ1xuaW1wb3J0IHZ1ZSBmcm9tICdAdml0ZWpzL3BsdWdpbi12dWUnO1xuaW1wb3J0IHZ1ZURldlRvb2xzIGZyb20gJ3ZpdGUtcGx1Z2luLXZ1ZS1kZXZ0b29scydcbmltcG9ydCBsYXJhdmVsIGZyb20gJ2xhcmF2ZWwtdml0ZS1wbHVnaW4nO1xuaW1wb3J0IHN2Z0xvYWRlciBmcm9tICd2aXRlLXN2Zy1sb2FkZXInXG5pbXBvcnQgZnMgZnJvbSAnZnMnO1xuaW1wb3J0IGkxOG4gZnJvbSAnbGFyYXZlbC12dWUtaTE4bi92aXRlJztcblxuY29uc3QgZW52ID0gbG9hZEVudignYWxsJywgcHJvY2Vzcy5jd2QoKSk7XG5cbi8vIGh0dHBzOi8vdml0ZWpzLmRldi9jb25maWcvXG5leHBvcnQgZGVmYXVsdCBkZWZpbmVDb25maWcoe1xuICBwbHVnaW5zOiBbXG4gICAgbGFyYXZlbCh7XG4gICAgICBpbnB1dDogW1xuICAgICAgICAncmVzb3VyY2VzL2pzL2FwcC5qcycsXG4gICAgICBdLFxuICAgICAgcmVmcmVzaDogdHJ1ZSxcbiAgICB9KSxcbiAgICB2dWUoe1xuICAgICAgdGVtcGxhdGU6IHtcbiAgICAgICAgdHJhbnNmb3JtQXNzZXRVcmxzOiB7XG4gICAgICAgICAgYmFzZTogbnVsbCxcbiAgICAgICAgICBpbmNsdWRlQWJzb2x1dGU6IGZhbHNlLFxuICAgICAgICB9LFxuICAgICAgfSxcbiAgICB9KSxcbiAgICB2dWVEZXZUb29scygpLFxuICAgIEF1dG9JbXBvcnQoe1xuICAgICAgcmVzb2x2ZXJzOiBbRWxlbWVudFBsdXNSZXNvbHZlcigpXSxcbiAgICB9KSxcbiAgICBDb21wb25lbnRzKHtcbiAgICAgIHJlc29sdmVyczogW0VsZW1lbnRQbHVzUmVzb2x2ZXIoKV0sXG4gICAgfSksXG4gICAgc3ZnTG9hZGVyKCksXG4gICAgaTE4bigpXG4gIF0sXG4gIHJlc29sdmU6IHtcbiAgICBhbGlhczoge1xuICAgICAgJ0AnOiBmaWxlVVJMVG9QYXRoKG5ldyBVUkwoJy4vcmVzb3VyY2VzL2pzJywgaW1wb3J0Lm1ldGEudXJsKSlcbiAgICB9XG4gIH0sXG4gIHNlcnZlcjoge1xuICAgIGhvc3Q6IHRydWUsXG4gICAgcG9ydDogZW52LlZJVEVfQVNTRVRfUE9SVCxcbiAgICBzdHJpY3RQb3J0OiB0cnVlLFxuICAgIGhtcjoge1xuICAgICAgaG9zdDogZW52LlZJVEVfQVNTRVRfSE9TVCxcbiAgICAgIHBvcnQ6IGVudi5WSVRFX0FTU0VUX1BPUlQsXG4gICAgfSxcbiAgICAvLyBodHRwczoge1xuICAgIC8vICAga2V5OiBmcy5yZWFkRmlsZVN5bmMoZW52LlZJVEVfUFJJVktFWV9QQVRIKSxcbiAgICAvLyAgIGNlcnQ6IGZzLnJlYWRGaWxlU3luYyhlbnYuVklURV9DRVJUX1BBVEgpLFxuICAgIC8vIH0sXG4gIH0sXG59KTtcbiJdLAogICJtYXBwaW5ncyI6ICI7QUFBOE8sU0FBUyxlQUFlLFdBQVc7QUFHalIsU0FBUyxjQUFjLGVBQWU7QUFDdEMsT0FBTyxnQkFBZ0I7QUFDdkIsT0FBTyxnQkFBZ0I7QUFDdkIsU0FBUywyQkFBMkI7QUFDcEMsT0FBTyxTQUFTO0FBQ2hCLE9BQU8saUJBQWlCO0FBQ3hCLE9BQU8sYUFBYTtBQUNwQixPQUFPLGVBQWU7QUFFdEIsT0FBTyxVQUFVO0FBWitILElBQU0sMkNBQTJDO0FBY2pNLElBQU0sTUFBTSxRQUFRLE9BQU8sUUFBUSxJQUFJLENBQUM7QUFHeEMsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDMUIsU0FBUztBQUFBLElBQ1AsUUFBUTtBQUFBLE1BQ04sT0FBTztBQUFBLFFBQ0w7QUFBQSxNQUNGO0FBQUEsTUFDQSxTQUFTO0FBQUEsSUFDWCxDQUFDO0FBQUEsSUFDRCxJQUFJO0FBQUEsTUFDRixVQUFVO0FBQUEsUUFDUixvQkFBb0I7QUFBQSxVQUNsQixNQUFNO0FBQUEsVUFDTixpQkFBaUI7QUFBQSxRQUNuQjtBQUFBLE1BQ0Y7QUFBQSxJQUNGLENBQUM7QUFBQSxJQUNELFlBQVk7QUFBQSxJQUNaLFdBQVc7QUFBQSxNQUNULFdBQVcsQ0FBQyxvQkFBb0IsQ0FBQztBQUFBLElBQ25DLENBQUM7QUFBQSxJQUNELFdBQVc7QUFBQSxNQUNULFdBQVcsQ0FBQyxvQkFBb0IsQ0FBQztBQUFBLElBQ25DLENBQUM7QUFBQSxJQUNELFVBQVU7QUFBQSxJQUNWLEtBQUs7QUFBQSxFQUNQO0FBQUEsRUFDQSxTQUFTO0FBQUEsSUFDUCxPQUFPO0FBQUEsTUFDTCxLQUFLLGNBQWMsSUFBSSxJQUFJLGtCQUFrQix3Q0FBZSxDQUFDO0FBQUEsSUFDL0Q7QUFBQSxFQUNGO0FBQUEsRUFDQSxRQUFRO0FBQUEsSUFDTixNQUFNO0FBQUEsSUFDTixNQUFNLElBQUk7QUFBQSxJQUNWLFlBQVk7QUFBQSxJQUNaLEtBQUs7QUFBQSxNQUNILE1BQU0sSUFBSTtBQUFBLE1BQ1YsTUFBTSxJQUFJO0FBQUEsSUFDWjtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUEsRUFLRjtBQUNGLENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
