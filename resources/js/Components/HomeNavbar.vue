<script setup>

import { Link, router } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'

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

const menuItems = [
  {
    name: 'G\'oyalar',
    route: 'ideas.index',
  },
  {
    name: 'Startuplar',
    route: 'startups.index',
  },
  // {
  //   name: 'Investors',
  //   route: 'investors',
  //   disabled: true
  // },
  // {
  //   name: 'Blog',
  //   route: 'blog',
  //   disabled: true
  // },
  {
    name: 'Biz haqimizda',
    route: 'about-us',
  }
]

const visitTo = (url) => {
  return router.visit(url)
}

</script>

<template>
  <!-- ========== HEADER ========== -->
    <nav class="relative max-w-7xl w-full flex flex-wrap md:grid md:grid-cols-12 basis-full items-center px-4 md:px-6 md:px-8 mx-auto">
      <div class="md:col-span-3">
        <!-- Logo -->
        <Link :href="route('home')"
          class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
        >
          <ApplicationLogo/>
        </Link>
        <!-- End Logo -->
      </div>

      <!-- Button Group -->
      <div class="flex items-center gap-x-1 md:gap-x-2 ms-auto py-1 md:ps-6 md:order-3 md:col-span-3">
        <template v-if="$page.props.canLogin">
          <button v-if="!$page.props.auth.user" type="button" @click="visitTo(route('login'))" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-lime-400 text-black hover:bg-lime-500 focus:outline-none focus:bg-lime-500 transition disabled:opacity-50 disabled:pointer-events-none">
            Tizimga kirish
          </button>
          <button v-else type="button" @click="visitTo(route('dashboard.index'))" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-lime-400 text-black hover:bg-lime-500 focus:outline-none focus:bg-lime-500 transition disabled:opacity-50 disabled:pointer-events-none">
            Kabinet
          </button>
        </template>

        <div class="md:hidden">
          <button type="button" class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail">
            <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
            <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
      </div>
      <!-- End Button Group -->

      <!-- Collapse -->
      <div id="hs-navbar-hcail" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6" aria-labelledby="hs-navbar-hcail-collapse">
        <div class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0">
          <div
            v-for="menuItem in menuItems"
          >
            <Link :class="{
              'relative inline-block text-black focus:outline-none before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 dark:text-white': route().current() === menuItem.route,
              'inline-block text-black hover:text-gray-600 focus:outline-none focus:text-gray-600 dark:text-white dark:hover:text-neutral-300 dark:focus:text-neutral-300': route().current() !== menuItem.route
            }"
              :href="route(menuItem.route)" aria-current="page"
            >
              {{ menuItem.name }}
            </Link>
          </div>
        </div>
      </div>
      <!-- End Collapse -->
    </nav>
  <!-- ========== END HEADER ========== -->
</template>

<style scoped>

</style>
