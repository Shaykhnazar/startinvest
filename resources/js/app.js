import './bootstrap';
import '../css/app.css';
import 'element-plus/dist/index.css'
import 'preline'

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'

import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import * as ElementPlusIconsVue from '@element-plus/icons-vue'
import IconSvg from '@/Components/svg-icons/icon.vue'
import { i18nVue } from 'laravel-vue-i18n';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
                app.component(key, component)
            }
      app.component('IconSvg', IconSvg)

      return app.use(plugin)
            .use(pinia)
            .use(i18nVue, {
              resolve: async lang => {
                const langs = import.meta.glob('../../lang/*.json');
                return await langs[`../../lang/${lang}.json`]();
              }
            })
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
