// vite.config.js
import { defineConfig } from "file:///var/www/startinvest_uz/node_modules/vite/dist/node/index.js";
import laravel from "file:///var/www/startinvest_uz/node_modules/laravel-vite-plugin/dist/index.js";
import vue from "file:///var/www/startinvest_uz/node_modules/@vitejs/plugin-vue/dist/index.mjs";
import AutoImport from "file:///var/www/startinvest_uz/node_modules/unplugin-auto-import/dist/vite.js";
import Components from "file:///var/www/startinvest_uz/node_modules/unplugin-vue-components/dist/vite.js";
import { ElementPlusResolver } from "file:///var/www/startinvest_uz/node_modules/unplugin-vue-components/dist/resolvers.js";
import svgLoader from "file:///var/www/startinvest_uz/node_modules/vite-svg-loader/index.js";
var __vite_injected_original_import_meta_url = "file:///var/www/startinvest_uz/vite.config.js";
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: "resources/js/app.js",
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
      "@/": `${new URL("resources/js", __vite_injected_original_import_meta_url).pathname}/`
    }
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCIvdmFyL3d3dy9zdGFydGludmVzdF91elwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiL3Zhci93d3cvc3RhcnRpbnZlc3RfdXovdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL3Zhci93d3cvc3RhcnRpbnZlc3RfdXovdml0ZS5jb25maWcuanNcIjtpbXBvcnQgeyBkZWZpbmVDb25maWcgfSBmcm9tICd2aXRlJztcbmltcG9ydCBsYXJhdmVsIGZyb20gJ2xhcmF2ZWwtdml0ZS1wbHVnaW4nO1xuaW1wb3J0IHZ1ZSBmcm9tICdAdml0ZWpzL3BsdWdpbi12dWUnO1xuaW1wb3J0IEF1dG9JbXBvcnQgZnJvbSAndW5wbHVnaW4tYXV0by1pbXBvcnQvdml0ZSdcbmltcG9ydCBDb21wb25lbnRzIGZyb20gJ3VucGx1Z2luLXZ1ZS1jb21wb25lbnRzL3ZpdGUnXG5pbXBvcnQgeyBFbGVtZW50UGx1c1Jlc29sdmVyIH0gZnJvbSAndW5wbHVnaW4tdnVlLWNvbXBvbmVudHMvcmVzb2x2ZXJzJ1xuaW1wb3J0IHN2Z0xvYWRlciBmcm9tICd2aXRlLXN2Zy1sb2FkZXInXG5cbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XG4gIHBsdWdpbnM6IFtcbiAgICAgIGxhcmF2ZWwoe1xuICAgICAgICAgIGlucHV0OiAncmVzb3VyY2VzL2pzL2FwcC5qcycsXG4gICAgICAgICAgcmVmcmVzaDogdHJ1ZSxcbiAgICAgIH0pLFxuICAgICAgdnVlKHtcbiAgICAgICAgICB0ZW1wbGF0ZToge1xuICAgICAgICAgICAgICB0cmFuc2Zvcm1Bc3NldFVybHM6IHtcbiAgICAgICAgICAgICAgICAgIGJhc2U6IG51bGwsXG4gICAgICAgICAgICAgICAgICBpbmNsdWRlQWJzb2x1dGU6IGZhbHNlLFxuICAgICAgICAgICAgICB9LFxuICAgICAgICAgIH0sXG4gICAgICB9KSxcbiAgICAgIEF1dG9JbXBvcnQoe1xuICAgICAgICAgIHJlc29sdmVyczogW0VsZW1lbnRQbHVzUmVzb2x2ZXIoKV0sXG4gICAgICB9KSxcbiAgICAgIENvbXBvbmVudHMoe1xuICAgICAgICAgIHJlc29sdmVyczogW0VsZW1lbnRQbHVzUmVzb2x2ZXIoKV0sXG4gICAgICB9KSxcbiAgICAgIHN2Z0xvYWRlcigpXG4gIF0sXG4gICAgcmVzb2x2ZToge1xuICAgICAgICBhbGlhczoge1xuICAgICAgICAgICdALyc6IGAke25ldyBVUkwoJ3Jlc291cmNlcy9qcycsIGltcG9ydC5tZXRhLnVybCkucGF0aG5hbWV9L2AsXG4gICAgICAgIH1cbiAgICB9LFxufSk7XG4iXSwKICAibWFwcGluZ3MiOiAiO0FBQXVQLFNBQVMsb0JBQW9CO0FBQ3BSLE9BQU8sYUFBYTtBQUNwQixPQUFPLFNBQVM7QUFDaEIsT0FBTyxnQkFBZ0I7QUFDdkIsT0FBTyxnQkFBZ0I7QUFDdkIsU0FBUywyQkFBMkI7QUFDcEMsT0FBTyxlQUFlO0FBTmdJLElBQU0sMkNBQTJDO0FBUXZNLElBQU8sc0JBQVEsYUFBYTtBQUFBLEVBQzFCLFNBQVM7QUFBQSxJQUNMLFFBQVE7QUFBQSxNQUNKLE9BQU87QUFBQSxNQUNQLFNBQVM7QUFBQSxJQUNiLENBQUM7QUFBQSxJQUNELElBQUk7QUFBQSxNQUNBLFVBQVU7QUFBQSxRQUNOLG9CQUFvQjtBQUFBLFVBQ2hCLE1BQU07QUFBQSxVQUNOLGlCQUFpQjtBQUFBLFFBQ3JCO0FBQUEsTUFDSjtBQUFBLElBQ0osQ0FBQztBQUFBLElBQ0QsV0FBVztBQUFBLE1BQ1AsV0FBVyxDQUFDLG9CQUFvQixDQUFDO0FBQUEsSUFDckMsQ0FBQztBQUFBLElBQ0QsV0FBVztBQUFBLE1BQ1AsV0FBVyxDQUFDLG9CQUFvQixDQUFDO0FBQUEsSUFDckMsQ0FBQztBQUFBLElBQ0QsVUFBVTtBQUFBLEVBQ2Q7QUFBQSxFQUNFLFNBQVM7QUFBQSxJQUNMLE9BQU87QUFBQSxNQUNMLE1BQU0sR0FBRyxJQUFJLElBQUksZ0JBQWdCLHdDQUFlLEVBQUUsUUFBUTtBQUFBLElBQzVEO0FBQUEsRUFDSjtBQUNKLENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
