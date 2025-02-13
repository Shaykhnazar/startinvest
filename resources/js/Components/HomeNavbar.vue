<script setup>

import { Link, router } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import DarkModeSwitcher from '@/Components/DarkModeSwitcher.vue'
import { reactive, ref, watch } from 'vue'
import { wTrans } from 'laravel-vue-i18n';
import LanguageSelect from '@/Components/LanguageSelect.vue'

const collapsed = ref(true); // Add a reactive state for collapse

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  isTestMode: {
    type: Boolean,
    default: false
  }
});

const menuItems = reactive([
  {
    name: wTrans('site.navbar.ideas'),
    route: 'ideas.index',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lightbulb  mt-0.5 size-4"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>`
  },
  {
    name: wTrans('site.navbar.startups'),
    route: 'startups.index',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket  mt-0.5 size-4"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>`
  },
  // {
  //   name: 'Investors',
  //   route: 'investors',
  //   disabled: true
  // },
  {
    name: wTrans('site.navbar.blog'),
    route: 'blog.index',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15M9 11l3 3m0 0l3-3m-3 3V8" />
    </svg>`
  },
  {
    name: wTrans('site.navbar.about_us'),
    route: 'about-us',
    svg: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>`
  }
])

// Function to close the navbar collapse after route changes
const closeNavbar = () => {
  collapsed.value = true;
};

const toggleNavbar = () => {
  collapsed.value = !collapsed.value;
};

// Watch for route changes and close the navbar
watch(() => route().current(), () => {
  closeNavbar(); // Close navbar on route change
});
</script>

<template>
  <!-- ========== HEADER ========== -->
  <header class="sticky top-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-white border-b border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
    <nav class="relative max-w-7xl w-full flex flex-wrap md:flex-nowrap md:grid md:grid-cols-12 basis-full items-center h-16 px-4 md:px-6 mx-auto">
      <div class="md:col-span-3 flex items-center">
        <!-- Logo -->
        <Link :href="route('home')"
          class="flex-none text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
        >
          <ApplicationLogo custom-class="-mb-5"/>
        </Link>
        <!-- End Logo -->
      </div>

      <!-- Button Group -->
      <div class="flex items-center gap-x-1 md:gap-x-2 ml-auto md:ml-0 py-1 md:ps-6 md:order-3 md:col-span-3">
        <!-- Only show on desktop -->
        <div class="hidden md:flex md:items-center md:gap-x-2">
          <language-select/>
          <dark-mode-switcher/>
        </div>
        <template v-if="$page.props.canLogin">
          <button v-if="!$page.props.auth.user" type="button" @click="router.visit(route('login'))" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-lime-400 text-black hover:bg-lime-500 focus:outline-none focus:bg-lime-500 transition disabled:opacity-50 disabled:pointer-events-none">
            {{ $t('site.navbar.login') }}
          </button>
          <button v-else type="button" @click="router.visit(route('dashboard.index'))" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-lime-400 text-black hover:bg-lime-500 focus:outline-none focus:bg-lime-500 transition disabled:opacity-50 disabled:pointer-events-none">
            {{ $t('site.navbar.dashboard') }}
          </button>
        </template>

        <div class="md:hidden">
          <button type="button" @click="toggleNavbar" class="hs-collapse-toggle size-10 flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
            <svg v-if="collapsed" class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
            <svg v-else class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
      </div>
      <!-- End Button Group -->

      <!-- Collapse -->
      <div id="hs-navbar-hcail" :class="{ 'hidden': collapsed, 'block': !collapsed }"  class="hs-collapse w-full md:block md:w-auto md:basis-auto md:order-2 md:col-span-6 bg-white dark:bg-neutral-800 md:bg-transparent md:dark:bg-transparent rounded-xl" aria-labelledby="hs-navbar-hcail-collapse">
        <div class="flex flex-col gap-y-4 gap-x-0 p-4 md:p-0 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7">
          <div
            v-for="menuItem in menuItems"
            :key="menuItem.route"
            class="hover:bg-[#F3F3F3] dark:hover:bg-[#333333] rounded-xl p-1"
          >
            <template v-if="route().current() === menuItem.route">
              <a
                class="relative inline-block w-full md:w-auto text-black focus:outline-none before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 dark:text-white"
                href="#"
                @click="router.visit(route(menuItem.route))"
                aria-current="page"
              >
                {{ menuItem.name }}
              </a>
            </template>
            <template v-else>
              <a
                class="inline-block w-full md:w-auto text-black hover:text-gray-600 focus:outline-none focus:text-gray-600 dark:text-white dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                href="#"
                @click="router.visit(route(menuItem.route))"
              >
                {{ menuItem.name }}
              </a>
            </template>
          </div>

          <!-- Mobile-only switchers at bottom of menu -->
          <div class="md:hidden flex flex-col gap-y-4 mt-4 pt-4 border-t border-gray-200 dark:border-neutral-700">
            <div class="flex items-center justify-between px-1">
              <span class="text-sm text-gray-600 dark:text-gray-300">{{ wTrans('site.navbar.language') }}</span>
              <language-select/>
            </div>
            <div class="flex items-center justify-between px-1">
              <span class="text-sm text-gray-600 dark:text-gray-300">{{ wTrans('site.navbar.theme') }}</span>
              <dark-mode-switcher/>
            </div>
          </div>
        </div>
      </div>
      <!-- End Collapse -->
    </nav>
  </header>
  <!-- ========== END HEADER ========== -->
</template>

<style scoped>
.hs-collapse {
  transition: all 0.3s ease-in-out;
}

@media (max-width: 768px) {
  .hs-collapse {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    margin: 0.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
  }
}
</style>
