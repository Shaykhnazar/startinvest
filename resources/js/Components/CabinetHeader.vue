<script setup>

import DropdownLink from '@/Components/DropdownLink.vue';
import { useUserStore } from '@/stores/UserStore.js'
import { router, Link } from '@inertiajs/vue3'
import { reactive } from 'vue'

const user = reactive(useUserStore().authUser)

const logoutHandle = () => {
  useUserStore().$reset()
  router.post(route('logout'))
}
</script>

<template>
  <!-- ========== HEADER ========== -->
  <header class="lg:ms-[260px] fixed top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 bg-white border-b border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
    <div class="flex justify-between xl:grid xl:grid-cols-3 basis-full items-center w-full py-2.5 px-2 sm:px-5">
      <div class="xl:col-span-1 flex items-center md:gap-x-3">
        <div class="lg:hidden">
          <!-- Sidebar Toggle -->
          <button type="button" class="w-7 h-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-pro-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-pro-sidebar">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M17 8L21 12L17 16M3 12H13M3 6H13M3 18H13" />
            </svg>
          </button>
          <!-- End Sidebar Toggle -->
        </div>

        <div class="hidden lg:block min-w-80 xl:w-full">
          <!-- Search Input -->
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
              <svg class="shrink-0 size-4 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
              </svg>
            </div>
            <input type="text" class="py-2 ps-10 pe-16 block w-full bg-white border-gray-200 rounded-lg text-sm focus:outline-none focus:border-gray-200 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600" placeholder="Izlash" data-hs-overlay="#hs-pro-dnsm">
            <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1">
              <button type="button" class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10" />
                  <path d="m15 9-6 6" />
                  <path d="m9 9 6 6" />
                </svg>
              </button>
            </div>
            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-3 text-gray-400">
              <svg class="shrink-0 size-3 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3" />
              </svg>
              <span class="mx-1">
                <svg class="shrink-0 size-3 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14" />
                  <path d="M12 5v14" />
                </svg>
              </span>
              <span class="text-xs">/</span>
            </div>
          </div>
          <!-- End Search Input -->
        </div>
      </div>

      <div class="xl:col-span-2 flex justify-end items-center gap-x-2">
        <div class="flex items-center">
          <div class="lg:hidden">
            <!-- Search Button Icon -->
            <button type="button" class="inline-flex shrink-0 justify-center items-center gap-x-2 size-[38px] rounded-full text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dnsm">
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
              </svg>
            </button>
            <!-- End Search Button Icon -->
          </div>

          <!-- Help Dropdown -->
<!--          <div class="hs-dropdown [&#45;&#45;placement:bottom-right] relative inline-flex">-->
<!--            &lt;!&ndash; Help Button Icon &ndash;&gt;-->
<!--            <div class="hs-tooltip [&#45;&#45;placement:bottom] inline-block">-->
<!--              <button id="hs-pro-dnhd" type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 " aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                  <circle cx="12" cy="12" r="10" />-->
<!--                  <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />-->
<!--                  <path d="M12 17h.01" />-->
<!--                </svg>-->
<!--              </button>-->
<!--              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">-->
<!--                Help and Support-->
<!--              </span>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Help Button Icon &ndash;&gt;-->

<!--            &lt;!&ndash; Help Dropdown &ndash;&gt;-->
<!--            <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-60 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dnhd">-->
<!--              <div class="p-1">-->
<!--                <a class="flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <circle cx="12" cy="12" r="10" />-->
<!--                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />-->
<!--                    <path d="M12 17h.01" />-->
<!--                  </svg>-->
<!--                  Help Centre-->
<!--                </a>-->
<!--                <a class="flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />-->
<!--                    <circle cx="9" cy="7" r="4" />-->
<!--                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />-->
<!--                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />-->
<!--                  </svg>-->
<!--                  Community-->
<!--                </a>-->
<!--                <a class="flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />-->
<!--                    <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />-->
<!--                  </svg>-->
<!--                  What’s New-->
<!--                </a>-->

<!--                <div class="my-1 border-t border-gray-200 dark:border-neutral-800"></div>-->

<!--                <a class="flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <circle cx="12" cy="12" r="10" />-->
<!--                    <path d="M12 16v-4" />-->
<!--                    <path d="M12 8h.01" />-->
<!--                  </svg>-->
<!--                  Privacy and Legal-->
<!--                </a>-->
<!--                <a class="flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />-->
<!--                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />-->
<!--                  </svg>-->
<!--                  Documentation-->
<!--                </a>-->
<!--                <a class="flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />-->
<!--                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />-->
<!--                  </svg>-->
<!--                  Hire an Expert-->
<!--                  <div class="ms-auto">-->
<!--                    <span class="inline-flex items-center gap-1.5 py-px px-1.5 rounded text-[10px] leading-4 font-medium bg-gray-100 text-gray-800 dark:bg-neutral-700 dark:text-neutral-300">-->
<!--                      New-->
<!--                    </span>-->
<!--                  </div>-->
<!--                </a>-->

<!--                <div class="my-1 border-t border-gray-200 dark:border-neutral-800"></div>-->

<!--                <a class="flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />-->
<!--                    <line x1="9" x2="15" y1="10" y2="10" />-->
<!--                    <line x1="12" x2="12" y1="7" y2="13" />-->
<!--                  </svg>-->
<!--                  Submit Feedback-->
<!--                </a>-->
<!--                <div class="hs-dropdown [&#45;&#45;strategy:static] md:[&#45;&#45;strategy:absolute] [&#45;&#45;adaptive:none] md:[&#45;&#45;trigger:hover] relative">-->
<!--                  <button id="hs-pro-dropdown-help-and-support" type="button" class="hs-dropdown-toggle w-full flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <rect width="20" height="16" x="2" y="4" rx="2" />-->
<!--                      <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />-->
<!--                    </svg>-->
<!--                    Contact Us-->
<!--                    <svg class="rotate-90 md:rotate-0 ms-auto size-3" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="m9 18 6-6-6-6" />-->
<!--                    </svg>-->
<!--                  </button>-->

<!--                  <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 md:w-48 hidden z-10 top-0 end-full md:!me-3 md:mt-1 md:p-1 bg-white md:shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] md:rounded-lg before:absolute before:-end-5 before:top-0 before:h-full before:w-5 dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dropdown-help-and-support">-->
<!--                    <a class="flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z" />-->
<!--                        <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1" />-->
<!--                      </svg>-->
<!--                      Contact Support-->
<!--                    </a>-->
<!--                    <a class="flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3" />-->
<!--                      </svg>-->
<!--                      Contact Sales-->
<!--                    </a>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Help Dropdown &ndash;&gt;-->
<!--          </div>-->
          <!-- End Help Dropdown -->

          <!-- Notifications Button Icon -->
<!--          <div class="hs-dropdown [&#45;&#45;auto-close:inside] [&#45;&#45;placement:bottom-right] relative inline-flex">-->
<!--            <div class="hs-tooltip [&#45;&#45;placement:bottom] inline-block">-->
<!--              <button id="hs-pro-dnnd" type="button" class="hs-tooltip-toggle relative size-[38px] inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                  <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />-->
<!--                  <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />-->
<!--                </svg>-->
<!--                <span class="flex absolute top-0 end-0 z-10 -mt-1.5 -me-1.5">-->
<!--                  <span class="animate-ping absolute inline-flex size-full rounded-full bg-red-400 opacity-75 dark:bg-red-600"></span>-->
<!--                  <span class="relative min-w-[18px] min-h-[18px] inline-flex justify-center items-center text-[10px] bg-red-500 text-white rounded-full px-1">-->
<!--                    2-->
<!--                  </span>-->
<!--                </span>-->
<!--              </button>-->
<!--              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">-->
<!--                Notifications-->
<!--              </span>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Notifications Button Icon &ndash;&gt;-->

<!--            &lt;!&ndash; Notifications Dropdown &ndash;&gt;-->
<!--&lt;!&ndash;            <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-full sm:w-96 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white border-t border-gray-200 sm:border-t-0 sm:rounded-lg shadow-md sm:shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900 dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dnnd">&ndash;&gt;-->
<!--&lt;!&ndash;              &lt;!&ndash; Header &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;              <div class="px-5 pt-3 flex justify-between items-center border-b border-gray-200 dark:border-neutral-800">&ndash;&gt;-->
<!--&lt;!&ndash;                &lt;!&ndash; Nav Tab &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                <nav class="flex  gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">&ndash;&gt;-->
<!--&lt;!&ndash;                  <button type="button" class="hs-tab-active:after:bg-gray-800 hs-tab-active:text-gray-800 px-2 py-1.5 mb-2 relative inline-flex justify-center items-center gap-x-2 text-nowrap  hover:bg-gray-100 text-gray-500 hover:text-gray-800 text-sm rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 after:absolute after:-bottom-2 after:inset-x-2.5 after:z-10 after:h-0.5 after:pointer-events-none dark:hs-tab-active:text-neutral-200 dark:hs-tab-active:after:bg-neutral-400 dark:text-neutral-500 dark:hover:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 active " id="hs-pro-tabs-dnn-item-all" aria-selected="true" data-hs-tab="#hs-pro-tabs-dnn-all" aria-controls="hs-pro-tabs-dnn-all" role="tab">&ndash;&gt;-->
<!--&lt;!&ndash;                    All&ndash;&gt;-->
<!--&lt;!&ndash;                  </button>&ndash;&gt;-->
<!--&lt;!&ndash;                  <button type="button" class="hs-tab-active:after:bg-gray-800 hs-tab-active:text-gray-800 px-2 py-1.5 mb-2 relative inline-flex justify-center items-center gap-x-2 text-nowrap  hover:bg-gray-100 text-gray-500 hover:text-gray-800 text-sm rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 after:absolute after:-bottom-2 after:inset-x-2.5 after:z-10 after:h-0.5 after:pointer-events-none dark:hs-tab-active:text-neutral-200 dark:hs-tab-active:after:bg-neutral-400 dark:text-neutral-500 dark:hover:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700  " id="hs-pro-tabs-dnn-item-archived" aria-selected="false" data-hs-tab="#hs-pro-tabs-dnn-archived" aria-controls="hs-pro-tabs-dnn-archived" role="tab">&ndash;&gt;-->
<!--&lt;!&ndash;                    Archived&ndash;&gt;-->
<!--&lt;!&ndash;                  </button>&ndash;&gt;-->
<!--&lt;!&ndash;                </nav>&ndash;&gt;-->
<!--&lt;!&ndash;                &lt;!&ndash; End Nav Tab &ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                &lt;!&ndash; Notifications Button Icon &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                <div class="hs-tooltip relative inline-block mb-3">&ndash;&gt;-->
<!--&lt;!&ndash;                  <a class="hs-tooltip-toggle size-7 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="../../pro/dashboard/account-profile.html">&ndash;&gt;-->
<!--&lt;!&ndash;                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                      <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />&ndash;&gt;-->
<!--&lt;!&ndash;                      <circle cx="12" cy="12" r="3" />&ndash;&gt;-->
<!--&lt;!&ndash;                    </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                  </a>&ndash;&gt;-->
<!--&lt;!&ndash;                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                    Preferences&ndash;&gt;-->
<!--&lt;!&ndash;                  </span>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                &lt;!&ndash; End Notifications Button Icon &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;              </div>&ndash;&gt;-->
<!--&lt;!&ndash;              &lt;!&ndash; End Header &ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;              &lt;!&ndash; Tab Content &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;              <div id="hs-pro-tabs-dnn-all" role="tabpanel" aria-labelledby="hs-pro-tabs-dnn-item-all">&ndash;&gt;-->
<!--&lt;!&ndash;                <div class="h-[480px] overflow-y-auto overflow-hidden [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                  <ul class="divide-y divide-gray-200 dark:divide-neutral-800">&ndash;&gt;-->
<!--&lt;!&ndash;                    &lt;!&ndash; List Item &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                    <li class="relative group w-full flex gap-x-5 text-start bg-gray-100 dark:bg-neutral-800 p-5">&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="relative shrink-0">&ndash;&gt;-->
<!--&lt;!&ndash;                        <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">&ndash;&gt;-->
<!--&lt;!&ndash;                        <span class="absolute top-4 -start-3 size-2 bg-blue-600 rounded-full dark:bg-blue-500"></span>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="grow">&ndash;&gt;-->
<!--&lt;!&ndash;                        <p class="text-xs text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                          2 hours ago&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->

<!--&lt;!&ndash;                        <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">&ndash;&gt;-->
<!--&lt;!&ndash;                          Eilis Warner&ndash;&gt;-->
<!--&lt;!&ndash;                        </span>&ndash;&gt;-->
<!--&lt;!&ndash;                        <p class="text-sm text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                          changed an issue from 'in Progress' to 'Review'&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->

<!--&lt;!&ndash;                      <div>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="sm:group-hover:opacity-100 sm:opacity-0 sm:absolute sm:top-5 sm:end-5">&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                          <div class="inline-block p-0.5 bg-white border border-gray-200 rounded-lg shadow-sm transition ease-out dark:bg-neutral-800 dark:border-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="flex items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <polyline points="9 11 12 14 22 4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4 hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="18" height="18" x="3" y="3" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M8 12h8" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Mark this notification as read&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="20" height="5" x="2" y="4" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M10 13h4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Archive this notification&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; End Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </li>&ndash;&gt;-->
<!--&lt;!&ndash;                    &lt;!&ndash; End List Item &ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                    &lt;!&ndash; List Item &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                    <li class="relative group w-full flex gap-x-5 text-start  p-5">&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="relative shrink-0">&ndash;&gt;-->
<!--&lt;!&ndash;                        <span class="flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 text-gray-500 text-sm font-semibold rounded-full shadow-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">&ndash;&gt;-->
<!--&lt;!&ndash;                          C&ndash;&gt;-->
<!--&lt;!&ndash;                        </span>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="grow">&ndash;&gt;-->
<!--&lt;!&ndash;                        <p class="text-xs text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                          3 days ago&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->

<!--&lt;!&ndash;                        <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">&ndash;&gt;-->
<!--&lt;!&ndash;                          Clara Becker&ndash;&gt;-->
<!--&lt;!&ndash;                        </span>&ndash;&gt;-->
<!--&lt;!&ndash;                        <p class="text-sm text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                          mentioned you in a comment&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="mt-2">&ndash;&gt;-->
<!--&lt;!&ndash;                          <blockquote class="ps-3 border-s-4 border-gray-200 text-sm text-gray-500 dark:border-neutral-700 dark:text-neutral-400">&ndash;&gt;-->
<!--&lt;!&ndash;                            Nice work, love! You really nailed it. Keep it up!&ndash;&gt;-->
<!--&lt;!&ndash;                          </blockquote>&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->

<!--&lt;!&ndash;                      <div>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="sm:group-hover:opacity-100 sm:opacity-0 sm:absolute sm:top-5 sm:end-5">&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                          <div class="inline-block p-0.5 bg-white border border-gray-200 rounded-lg shadow-sm transition ease-out dark:bg-neutral-800 dark:border-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="flex items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <polyline points="9 11 12 14 22 4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4 hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="18" height="18" x="3" y="3" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M8 12h8" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Mark this notification as read&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="20" height="5" x="2" y="4" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M10 13h4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Archive this notification&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; End Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </li>&ndash;&gt;-->
<!--&lt;!&ndash;                    &lt;!&ndash; End List Item &ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                    &lt;!&ndash; List Item &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                    <li class="relative group w-full flex gap-x-5 text-start  p-5">&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="relative shrink-0">&ndash;&gt;-->
<!--&lt;!&ndash;                        <span class="flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 text-gray-500 text-sm font-semibold rounded-full shadow-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">&ndash;&gt;-->
<!--&lt;!&ndash;                          P&ndash;&gt;-->
<!--&lt;!&ndash;                        </span>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="grow">&ndash;&gt;-->
<!--&lt;!&ndash;                        <p class="text-xs text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                          5 Jan 2023&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->

<!--&lt;!&ndash;                        <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">&ndash;&gt;-->
<!--&lt;!&ndash;                          New Update on Preline&ndash;&gt;-->
<!--&lt;!&ndash;                        </span>&ndash;&gt;-->
<!--&lt;!&ndash;                        <p class="text-sm text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                          Add yourself to our new “Hire Page”. Let visitors know you’re open to freelance or full-time work.&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->
<!--&lt;!&ndash;                        <a class="mt-2 p-1.5 inline-flex items-center border border-gray-200 rounded-xl hover:bg-gray-50 hover:shadow-sm focus:outline-none focus:bg-gray-100 dark:border-neutral-700 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">&ndash;&gt;-->
<!--&lt;!&ndash;                          <img class="w-[70px] h-[62px] object-cover rounded-lg" src="https://images.unsplash.com/photo-1670272505340-d906d8d77d03?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="Avatar">&ndash;&gt;-->
<!--&lt;!&ndash;                          <div class="grow py-2.5 px-4">&ndash;&gt;-->
<!--&lt;!&ndash;                            <p class="text-sm font-medium text-gray-800 dark:text-neutral-300">&ndash;&gt;-->
<!--&lt;!&ndash;                              Get hired!&ndash;&gt;-->
<!--&lt;!&ndash;                            </p>&ndash;&gt;-->
<!--&lt;!&ndash;                            <p class="inline-flex items-center gap-x-1 text-sm text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                              Get started&ndash;&gt;-->
<!--&lt;!&ndash;                              <svg class="shrink-0 size-4 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                <path d="m9 18 6-6-6-6" />&ndash;&gt;-->
<!--&lt;!&ndash;                              </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                            </p>&ndash;&gt;-->
<!--&lt;!&ndash;                          </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        </a>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->

<!--&lt;!&ndash;                      <div>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="sm:group-hover:opacity-100 sm:opacity-0 sm:absolute sm:top-5 sm:end-5">&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                          <div class="inline-block p-0.5 bg-white border border-gray-200 rounded-lg shadow-sm transition ease-out dark:bg-neutral-800 dark:border-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="flex items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <polyline points="9 11 12 14 22 4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4 hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="18" height="18" x="3" y="3" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M8 12h8" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Mark this notification as read&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="20" height="5" x="2" y="4" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M10 13h4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Archive this notification&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; End Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </li>&ndash;&gt;-->
<!--&lt;!&ndash;                    &lt;!&ndash; End List Item &ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                    &lt;!&ndash; List Item &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                    <li class="relative group w-full flex gap-x-5 text-start  p-5">&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="relative shrink-0">&ndash;&gt;-->
<!--&lt;!&ndash;                        <span class="flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 text-gray-500 text-sm font-semibold rounded-full shadow-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400">&ndash;&gt;-->
<!--&lt;!&ndash;                          P&ndash;&gt;-->
<!--&lt;!&ndash;                        </span>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="grow">&ndash;&gt;-->
<!--&lt;!&ndash;                        <p class="text-xs text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                          5 Jan 2023&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->

<!--&lt;!&ndash;                        <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">&ndash;&gt;-->
<!--&lt;!&ndash;                          We’re updating our Privacy Policy as of 10th January 2023.content&ndash;&gt;-->
<!--&lt;!&ndash;                        </span>&ndash;&gt;-->
<!--&lt;!&ndash;                        <p>&ndash;&gt;-->
<!--&lt;!&ndash;                          <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-400 dark:hover:text-blue-500" href="#">&ndash;&gt;-->
<!--&lt;!&ndash;                            Learn more&ndash;&gt;-->
<!--&lt;!&ndash;                            <svg class="shrink-0 size-4 transition ease-in-out group-hover:translate-x-1 group-focus:translate-x-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                              <path d="m9 18 6-6-6-6" />&ndash;&gt;-->
<!--&lt;!&ndash;                            </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                          </a>&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->

<!--&lt;!&ndash;                      <div>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="sm:group-hover:opacity-100 sm:opacity-0 sm:absolute sm:top-5 sm:end-5">&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                          <div class="inline-block p-0.5 bg-white border border-gray-200 rounded-lg shadow-sm transition ease-out dark:bg-neutral-800 dark:border-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="flex items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <polyline points="9 11 12 14 22 4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4 hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="18" height="18" x="3" y="3" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M8 12h8" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Mark this notification as read&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="20" height="5" x="2" y="4" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M10 13h4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Archive this notification&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; End Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </li>&ndash;&gt;-->
<!--&lt;!&ndash;                    &lt;!&ndash; End List Item &ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;                    &lt;!&ndash; List Item &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                    <li class="relative group w-full flex gap-x-5 text-start bg-gray-100 dark:bg-neutral-800 p-5">&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="relative shrink-0">&ndash;&gt;-->
<!--&lt;!&ndash;                        <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1614880353165-e56fac2ea9a8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">&ndash;&gt;-->
<!--&lt;!&ndash;                        <span class="absolute top-4 -start-3 size-2 bg-blue-600 rounded-full dark:bg-blue-500"></span>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="grow">&ndash;&gt;-->
<!--&lt;!&ndash;                        <p class="text-xs text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                          31 Dec 2022&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->

<!--&lt;!&ndash;                        <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">&ndash;&gt;-->
<!--&lt;!&ndash;                          Rubia Walter&ndash;&gt;-->
<!--&lt;!&ndash;                        </span>&ndash;&gt;-->
<!--&lt;!&ndash;                        <p class="text-sm text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                          Joined the Slack group HS Team&ndash;&gt;-->
<!--&lt;!&ndash;                        </p>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->

<!--&lt;!&ndash;                      <div>&ndash;&gt;-->
<!--&lt;!&ndash;                        <div class="sm:group-hover:opacity-100 sm:opacity-0 sm:absolute sm:top-5 sm:end-5">&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                          <div class="inline-block p-0.5 bg-white border border-gray-200 rounded-lg shadow-sm transition ease-out dark:bg-neutral-800 dark:border-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="flex items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <polyline points="9 11 12 14 22 4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4 hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="18" height="18" x="3" y="3" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M8 12h8" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Mark this notification as read&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                              <div class="hs-tooltip relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="hs-tooltip-toggle size-7 flex shrink-0 justify-center items-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 rounded disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:focus:bg-neutral-700">&ndash;&gt;-->
<!--&lt;!&ndash;                                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <rect width="20" height="5" x="2" y="4" rx="2" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />&ndash;&gt;-->
<!--&lt;!&ndash;                                    <path d="M10 13h4" />&ndash;&gt;-->
<!--&lt;!&ndash;                                  </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                                </button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">&ndash;&gt;-->
<!--&lt;!&ndash;                                  Archive this notification&ndash;&gt;-->
<!--&lt;!&ndash;                                </span>&ndash;&gt;-->
<!--&lt;!&ndash;                              </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          </div>&ndash;&gt;-->
<!--&lt;!&ndash;                          &lt;!&ndash; End Segment Button Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                        </div>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </li>&ndash;&gt;-->
<!--&lt;!&ndash;                    &lt;!&ndash; End List Item &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                  </ul>&ndash;&gt;-->
<!--&lt;!&ndash;                  &lt;!&ndash; End List Group &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->

<!--&lt;!&ndash;                &lt;!&ndash; Footer &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                <div class="text-center border-t border-gray-200 dark:border-neutral-800">&ndash;&gt;-->
<!--&lt;!&ndash;                  <a class="p-4 flex justify-center items-center gap-x-2 text-sm text-gray-500 font-medium sm:rounded-b-lg hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300" href="../../docs/index.html">&ndash;&gt;-->
<!--&lt;!&ndash;                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                      <path d="M18 6 7 17l-5-5" />&ndash;&gt;-->
<!--&lt;!&ndash;                      <path d="m22 10-7.5 7.5L13 16" />&ndash;&gt;-->
<!--&lt;!&ndash;                    </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                    Mark all as read&ndash;&gt;-->
<!--&lt;!&ndash;                  </a>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                &lt;!&ndash; End Footer &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;              </div>&ndash;&gt;-->
<!--&lt;!&ndash;              &lt;!&ndash; End Tab Content &ndash;&gt;&ndash;&gt;-->

<!--&lt;!&ndash;              &lt;!&ndash; Tab Content &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;              <div id="hs-pro-tabs-dnn-archived" class="hidden" role="tabpanel" aria-labelledby="hs-pro-tabs-dnn-item-archived">&ndash;&gt;-->
<!--&lt;!&ndash;                &lt;!&ndash; Empty State &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                <div class="p-5 min-h-[533px] flex flex-col justify-center items-center text-center">&ndash;&gt;-->
<!--&lt;!&ndash;                  <svg class="w-48 mx-auto mb-4" width="178" height="90" viewBox="0 0 178 90" fill="none" xmlns="http://www.w3.org/2000/svg">&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="27" y="50.5" width="124" height="39" rx="7.5" fill="currentColor" class="fill-white dark:fill-neutral-800" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="27" y="50.5" width="124" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-50 dark:stroke-neutral-700/10" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="34.5" y="58" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="66.5" y="61" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="66.5" y="73" width="77" height="6" rx="3" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" fill="currentColor" class="fill-white dark:fill-neutral-800" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-100 dark:stroke-neutral-700/30" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="27" y="36" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="59" y="39" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <rect x="59" y="51" width="92" height="6" rx="3" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />&ndash;&gt;-->
<!--&lt;!&ndash;                    <g filter="url(#filter15)">&ndash;&gt;-->
<!--&lt;!&ndash;                      <rect x="12" y="6" width="154" height="40" rx="8" fill="currentColor" class="fill-white dark:fill-neutral-800" shape-rendering="crispEdges" />&ndash;&gt;-->
<!--&lt;!&ndash;                      <rect x="12.5" y="6.5" width="153" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-100 dark:stroke-neutral-700/60" shape-rendering="crispEdges" />&ndash;&gt;-->
<!--&lt;!&ndash;                      <rect x="20" y="14" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700 " />&ndash;&gt;-->
<!--&lt;!&ndash;                      <rect x="52" y="17" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700" />&ndash;&gt;-->
<!--&lt;!&ndash;                      <rect x="52" y="29" width="106" height="6" rx="3" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700" />&ndash;&gt;-->
<!--&lt;!&ndash;                    </g>&ndash;&gt;-->
<!--&lt;!&ndash;                    <defs>&ndash;&gt;-->
<!--&lt;!&ndash;                      <filter id="filter15" x="0" y="0" width="178" height="64" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">&ndash;&gt;-->
<!--&lt;!&ndash;                        <feFlood flood-opacity="0" result="BackgroundImageFix" />&ndash;&gt;-->
<!--&lt;!&ndash;                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />&ndash;&gt;-->
<!--&lt;!&ndash;                        <feOffset dy="6" />&ndash;&gt;-->
<!--&lt;!&ndash;                        <feGaussianBlur stdDeviation="6" />&ndash;&gt;-->
<!--&lt;!&ndash;                        <feComposite in2="hardAlpha" operator="out" />&ndash;&gt;-->
<!--&lt;!&ndash;                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0" />&ndash;&gt;-->
<!--&lt;!&ndash;                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1187_14810" />&ndash;&gt;-->
<!--&lt;!&ndash;                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1187_14810" result="shape" />&ndash;&gt;-->
<!--&lt;!&ndash;                      </filter>&ndash;&gt;-->
<!--&lt;!&ndash;                    </defs>&ndash;&gt;-->
<!--&lt;!&ndash;                  </svg>&ndash;&gt;-->

<!--&lt;!&ndash;                  <div class="max-w-sm mx-auto">&ndash;&gt;-->
<!--&lt;!&ndash;                    <p class="mt-2 font-medium text-gray-800 dark:text-neutral-200">&ndash;&gt;-->
<!--&lt;!&ndash;                      No archived notifications&ndash;&gt;-->
<!--&lt;!&ndash;                    </p>&ndash;&gt;-->
<!--&lt;!&ndash;                    <p class="mb-5 text-sm text-gray-500 dark:text-neutral-500">&ndash;&gt;-->
<!--&lt;!&ndash;                      No data here yet. We will notify you when there's an update.&ndash;&gt;-->
<!--&lt;!&ndash;                    </p>&ndash;&gt;-->
<!--&lt;!&ndash;                  </div>&ndash;&gt;-->

<!--&lt;!&ndash;                  <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">&ndash;&gt;-->
<!--&lt;!&ndash;                    Notifications settings&ndash;&gt;-->
<!--&lt;!&ndash;                  </a>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                &lt;!&ndash; End Empty State &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;              </div>&ndash;&gt;-->
<!--&lt;!&ndash;              &lt;!&ndash; End Tab Content &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->
<!--          </div>-->
          <!-- End Notifications Dropdown -->

          <!-- Activity Button Icon -->
<!--          <div class="hs-tooltip [&#45;&#45;placement:bottom] inline-block">-->
<!--            <button type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dnam">-->
<!--              <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                <path d="M22 12h-4l-3 9L9 3l-3 9H2" />-->
<!--              </svg>-->
<!--            </button>-->
<!--            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">-->
<!--              Activity-->
<!--            </span>-->
<!--          </div>-->
          <!-- End Activity Button Icon -->
        </div>

        <!-- Invite Users -->
<!--        <div class="hs-dropdown [&#45;&#45;auto-close:inside] [&#45;&#45;placement:bottom-right] relative inline-flex">-->
<!--          <button id="hs-pro-dnshd" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 focus:outline-none focus:bg-gray-100 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--            Share-->
<!--          </button>-->

<!--          &lt;!&ndash; Invite Users Dropdown &ndash;&gt;-->
<!--          <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-full sm:w-[460px] transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white border-t border-gray-200 sm:border-t-0 sm:rounded-lg shadow-md sm:shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900 dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dnshd">-->
<!--            &lt;!&ndash; Header &ndash;&gt;-->
<!--            <div class="p-4 border-b border-gray-200 dark:border-neutral-700">-->
<!--              <span class="block text-xs font-medium text-gray-800 mb-2 dark:text-neutral-300">-->
<!--                Invite-->
<!--              </span>-->

<!--              &lt;!&ndash; Input Form &ndash;&gt;-->
<!--              <div class="flex items-center gap-x-2">-->
<!--                <div class="relative w-full">-->
<!--                  <input type="text" class="py-2 px-3 pe-24 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-500 dark:focus:ring-neutral-600" placeholder="Add name or emails">-->
<!--                  <div class="absolute inset-y-0 end-0 flex items-center z-20 pe-[5px] text-gray-400">-->
<!--                    &lt;!&ndash; Select &ndash;&gt;-->
<!--                    <div class="relative inline-block">-->
<!--                      <select id="hs-pro-select-mini-dropdown" data-hs-select='{-->
<!--                          "placeholder": "Select option...",-->
<!--                          "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                          "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-1.5 ps-2.5 pe-6 inline-flex shrink-0 justify-center items-center gap-x-1.5 text-xs text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700",-->

<!--                          "dropdownClasses": "end-0 mt-2 z-50 w-28 p-1 space-y-0.5 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-950",-->
<!--                          "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-1.5 px-2 w-full text-xs text-gray-800 rounded-lg cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                          "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                        }' class="hidden">-->
<!--                        <option value="">Choose</option>-->
<!--                        <option selected>Can view</option>-->
<!--                        <option>Can edit</option>-->
<!--                        <option>Admin</option>-->
<!--                      </select>-->

<!--                      <div class="absolute top-1/2 end-1.5 -translate-y-1/2">-->
<!--                        <svg class="shrink-0 size-3.5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="m6 9 6 6 6-6" />-->
<!--                        </svg>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Select &ndash;&gt;-->
<!--                  </div>-->
<!--                </div>-->

<!--                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">-->
<!--                  Send-->
<!--                </button>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Input Form &ndash;&gt;-->

<!--              <div class="flex mt-2">-->
<!--                <input type="checkbox" class="shrink-0 size-3.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-pro-dnshdch" checked>-->
<!--                <label for="hs-pro-dnshdch" class="text-xs text-gray-600 ms-1.5 dark:text-neutral-400">-->
<!--                  Notify recipients via email-->
<!--                </label>-->
<!--              </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Header &ndash;&gt;-->

<!--            &lt;!&ndash; Body &ndash;&gt;-->
<!--            <div id="hs-dropdown-share-body" class="p-4 space-y-4 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">-->
<!--              <span class="block text-xs font-medium text-gray-800 dark:text-neutral-300">-->
<!--                From Htmlstream-->
<!--              </span>-->

<!--              &lt;!&ndash; User &ndash;&gt;-->
<!--              <div class="w-full flex items-center gap-x-3">-->
<!--                <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">-->
<!--                <div class="grow">-->
<!--                  <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">-->
<!--                    James Collison <span class="text-xs font-normal text-gray-500 dark:text-neutral-500">(you)</span>-->
<!--                  </span>-->
<!--                  <span class="block text-xs text-gray-500 dark:text-neutral-500">-->
<!--                    james@site.com-->
<!--                  </span>-->
<!--                </div>-->

<!--                &lt;!&ndash; Select &ndash;&gt;-->
<!--                <div class="relative">-->
<!--                  <select data-hs-select='{-->
<!--                      "placeholder": "Select option...",-->
<!--                      "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                      "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-1.5 ps-2.5 pe-6 inline-flex shrink-0 justify-center items-center gap-x-1.5 text-xs text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700",-->
<!--                      "dropdownClasses": "end-0 mt-2 z-50 w-28 p-1 space-y-0.5 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-950",-->
<!--                      "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-1.5 px-2 w-full text-xs text-gray-800 rounded-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                      "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",-->
<!--                      "viewport": "#hs-dropdown-share-body"-->
<!--                    }' class="hidden">-->
<!--                    <option value="">Choose</option>-->
<!--                    <option>Can view</option>-->
<!--                    <option>Can edit</option>-->
<!--                    <option selected>Admin</option>-->
<!--                    <option>Remove</option>-->
<!--                  </select>-->

<!--                  <div class="absolute top-1/2 end-1.5 -translate-y-1/2">-->
<!--                    <svg class="shrink-0 size-3.5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="m6 9 6 6 6-6" />-->
<!--                    </svg>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Select &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End User &ndash;&gt;-->

<!--              &lt;!&ndash; User &ndash;&gt;-->
<!--              <div class="w-full flex items-center gap-x-3">-->
<!--                <span class="flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 text-gray-500 text-sm font-semibold rounded-full shadow-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-500">-->
<!--                  L-->
<!--                </span>-->
<!--                <div class="grow">-->
<!--                  <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">-->
<!--                    Liza Harrison-->
<!--                  </span>-->
<!--                  <span class="block text-xs text-gray-500 dark:text-neutral-500">-->
<!--                    liza@site.com-->
<!--                  </span>-->
<!--                </div>-->

<!--                &lt;!&ndash; Select &ndash;&gt;-->
<!--                <div class="relative">-->
<!--                  <select data-hs-select='{-->
<!--                      "placeholder": "Select option...",-->
<!--                      "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                      "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-1.5 ps-2.5 pe-6 inline-flex shrink-0 justify-center items-center gap-x-1.5 text-xs text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700",-->
<!--                      "dropdownClasses": "end-0 mt-2 z-50 w-28 p-1 space-y-0.5 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-950",-->
<!--                      "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-1.5 px-2 w-full text-xs text-gray-800 rounded-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                      "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",-->
<!--                      "viewport": "#hs-dropdown-share-body"-->
<!--                    }' class="hidden">-->
<!--                    <option value="">Choose</option>-->
<!--                    <option selected>Can view</option>-->
<!--                    <option>Can edit</option>-->
<!--                    <option>Admin</option>-->
<!--                    <option>Remove</option>-->
<!--                  </select>-->

<!--                  <div class="absolute top-1/2 end-1.5 -translate-y-1/2">-->
<!--                    <svg class="shrink-0 size-3.5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="m6 9 6 6 6-6" />-->
<!--                    </svg>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Select &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End User &ndash;&gt;-->

<!--              &lt;!&ndash; User &ndash;&gt;-->
<!--              <div class="w-full flex items-center gap-x-3">-->
<!--                <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">-->
<!--                <div class="grow">-->
<!--                  <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">-->
<!--                    Daniel Hobbs-->
<!--                  </span>-->
<!--                  <span class="block text-xs text-gray-500 dark:text-neutral-500">-->
<!--                    dhobbs@site.com-->
<!--                  </span>-->
<!--                </div>-->

<!--                &lt;!&ndash; Select &ndash;&gt;-->
<!--                <div class="relative">-->
<!--                  <select data-hs-select='{-->
<!--                      "placeholder": "Select option...",-->
<!--                      "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                      "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-1.5 ps-2.5 pe-6 inline-flex shrink-0 justify-center items-center gap-x-1.5 text-xs text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700",-->
<!--                      "dropdownClasses": "end-0 mt-2 z-50 w-28 p-1 space-y-0.5 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-950",-->
<!--                      "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-1.5 px-2 w-full text-xs text-gray-800 rounded-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                      "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",-->
<!--                      "viewport": "#hs-dropdown-share-body"-->
<!--                    }' class="hidden">-->
<!--                    <option value="">Choose</option>-->
<!--                    <option>Can view</option>-->
<!--                    <option selected>Can edit</option>-->
<!--                    <option>Admin</option>-->
<!--                    <option>Remove</option>-->
<!--                  </select>-->

<!--                  <div class="absolute top-1/2 end-1.5 -translate-y-1/2">-->
<!--                    <svg class="shrink-0 size-3.5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="m6 9 6 6 6-6" />-->
<!--                    </svg>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Select &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End User &ndash;&gt;-->

<!--              &lt;!&ndash; Show More Button &ndash;&gt;-->
<!--              <button type="button" class="hs-collapse-toggle hs-collapse-open:hidden w-full text-start flex items-center gap-x-3 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="hs-pro-dshdc-item-button" aria-expanded="false" aria-controls="hs-pro-dshdc-button" data-hs-collapse="#hs-pro-dshdc-button">-->
<!--                <span class="flex shrink-0 justify-center items-center size-[38px] text-sm font-semibold text-gray-500 rounded-lg dark:text-neutral-500">-->
<!--                  <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />-->
<!--                  </svg>-->
<!--                </span>-->

<!--                <span class="grow">-->
<!--                  <span class="text-xs text-gray-500 dark:text-neutral-500">-->
<!--                    2 more people-->
<!--                  </span>-->
<!--                </span>-->
<!--              </button>-->
<!--              &lt;!&ndash; End Show More Button &ndash;&gt;-->

<!--              &lt;!&ndash; Show More Collapse &ndash;&gt;-->
<!--              <div id="hs-pro-dshdc-button" class="hs-collapse hidden w-full transition-none space-y-4" aria-labelledby="hs-pro-dshdc-item-button">-->
<!--                &lt;!&ndash; User &ndash;&gt;-->
<!--                <div class="w-full flex items-center gap-x-3">-->
<!--                  <span class="flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 text-gray-500 text-sm font-semibold rounded-full shadow-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-500">-->
<!--                    O-->
<!--                  </span>-->
<!--                  <div class="grow">-->
<!--                    <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">-->
<!--                      Ols Shols-->
<!--                    </span>-->
<!--                    <span class="block text-xs text-gray-500 dark:text-neutral-500">-->
<!--                      ols@site.com-->
<!--                    </span>-->
<!--                  </div>-->

<!--                  &lt;!&ndash; Select &ndash;&gt;-->
<!--                  <div class="relative">-->
<!--                    <select data-hs-select='{-->
<!--                        "placeholder": "Select option...",-->
<!--                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-1.5 ps-2.5 pe-6 inline-flex shrink-0 justify-center items-center gap-x-1.5 text-xs text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700",-->
<!--                        "dropdownClasses": "end-0 mt-2 z-50 w-28 p-1 space-y-0.5 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-950",-->
<!--                        "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-1.5 px-2 w-full text-xs text-gray-800 rounded-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",-->
<!--                      "viewport": "#hs-dropdown-share-body"-->
<!--                      }' class="hidden">-->
<!--                      <option value="">Choose</option>-->
<!--                      <option>Can view</option>-->
<!--                      <option selected>Can edit</option>-->
<!--                      <option>Admin</option>-->
<!--                      <option>Remove</option>-->
<!--                    </select>-->

<!--                    <div class="absolute top-1/2 end-1.5 -translate-y-1/2">-->
<!--                      <svg class="shrink-0 size-2.5 text-gray-600 dark:text-neutral-400" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
<!--                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Select &ndash;&gt;-->
<!--                </div>-->
<!--                &lt;!&ndash; End User &ndash;&gt;-->

<!--                &lt;!&ndash; User &ndash;&gt;-->
<!--                <div class="w-full flex items-center gap-x-3">-->
<!--                  <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">-->
<!--                  <div class="grow">-->
<!--                    <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">-->
<!--                      Crane-->
<!--                    </span>-->
<!--                    <span class="block text-xs text-gray-500 dark:text-neutral-500">-->
<!--                      crane@site.com-->
<!--                    </span>-->
<!--                  </div>-->

<!--                  &lt;!&ndash; Select &ndash;&gt;-->
<!--                  <div class="relative">-->
<!--                    <select data-hs-select='{-->
<!--                        "placeholder": "Select option...",-->
<!--                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-1.5 ps-2.5 pe-6 inline-flex shrink-0 justify-center items-center gap-x-1.5 text-xs text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700",-->
<!--                        "dropdownClasses": "end-0 mt-2 z-50 w-28 p-1 space-y-0.5 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-950",-->
<!--                        "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-1.5 px-2 w-full text-xs text-gray-800 rounded-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",-->
<!--                      "viewport": "#hs-dropdown-share-body"-->
<!--                      }' class="hidden">-->
<!--                      <option value="">Choose</option>-->
<!--                      <option selected>Can view</option>-->
<!--                      <option>Can edit</option>-->
<!--                      <option>Admin</option>-->
<!--                      <option>Remove</option>-->
<!--                    </select>-->

<!--                    <div class="absolute top-1/2 end-1.5 -translate-y-1/2">-->
<!--                      <svg class="shrink-0 size-2.5 text-gray-600 dark:text-neutral-400" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
<!--                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Select &ndash;&gt;-->
<!--                </div>-->
<!--                &lt;!&ndash; End User &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Show More Collapse &ndash;&gt;-->

<!--              &lt;!&ndash; User &ndash;&gt;-->
<!--              <div class="w-full flex items-center gap-x-3">-->
<!--                <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1670272505340-d906d8d77d03?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">-->
<!--                <div class="grow">-->
<!--                  <span class="block text-sm font-medium text-gray-800 dark:text-neutral-300">-->
<!--                    Anna Richard-->
<!--                  </span>-->
<!--                  <span class="block text-xs text-gray-500 dark:text-neutral-500">-->
<!--                    anna@site.com-->
<!--                  </span>-->
<!--                </div>-->

<!--                &lt;!&ndash; Select &ndash;&gt;-->
<!--                <div class="relative">-->
<!--                  <select data-hs-select='{-->
<!--                      "placeholder": "Select option...",-->
<!--                      "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                      "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-1.5 ps-2.5 pe-6 inline-flex shrink-0 justify-center items-center gap-x-1.5 text-xs text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700",-->
<!--                      "dropdownClasses": "end-0 mt-2 z-50 w-28 p-1 space-y-0.5 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-950",-->
<!--                      "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-1.5 px-2 w-full text-xs text-gray-800 rounded-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                      "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",-->
<!--                      "viewport": "#hs-dropdown-share-body"-->
<!--                    }' class="hidden">-->
<!--                    <option value="">Choose</option>-->
<!--                    <option>Can view</option>-->
<!--                    <option selected>Can edit</option>-->
<!--                    <option>Admin</option>-->
<!--                    <option>Remove</option>-->
<!--                  </select>-->

<!--                  <div class="absolute top-1/2 end-1.5 -translate-y-1/2">-->
<!--                    <svg class="shrink-0 size-3.5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="m6 9 6 6 6-6" />-->
<!--                    </svg>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Select &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End User &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Body &ndash;&gt;-->

<!--            &lt;!&ndash; Subfooter &ndash;&gt;-->
<!--            <div class="p-4 border-t border-gray-200 dark:border-neutral-800">-->
<!--              <span class="block text-xs font-medium text-gray-800 mb-2 dark:text-neutral-300">-->
<!--                Share read-only link-->
<!--              </span>-->

<!--              &lt;!&ndash; Input Form &ndash;&gt;-->
<!--              <div class="flex items-center gap-x-2">-->
<!--                <input id="hs-pro-share-input-dropdown" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-500 dark:focus:ring-neutral-600" readonly value="https://www.figma.com/community/file/1179068859697769656">-->

<!--                <button type="button" class="js-clipboard [&#45;&#45;is-toggle-tooltip:false] hs-tooltip size-[38px] shrink-0 inline-flex justify-center items-center gap-x-2 rounded-lg border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-200 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-200 dark:focus:bg-neutral-600" data-clipboard-target="#hs-pro-share-input-dropdown" data-clipboard-action="copy" data-clipboard-success-text="Copied">-->
<!--                  <svg class="js-clipboard-default shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />-->
<!--                    <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />-->
<!--                  </svg>-->
<!--                  <svg class="js-clipboard-success hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <polyline points="20 6 9 17 4 12"></polyline>-->
<!--                  </svg>-->
<!--                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                    <span class="js-clipboard-success-text">Copy</span>-->
<!--                  </span>-->
<!--                </button>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Input Form &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Subfooter &ndash;&gt;-->

<!--            &lt;!&ndash; Footer &ndash;&gt;-->
<!--            <div class="p-4 border-t border-gray-200 dark:border-neutral-700">-->
<!--              <a class="inline-flex items-center gap-x-1.5 text-xs text-gray-500 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-400 dark:hover:text-blue-500" href="#">-->
<!--                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                  <circle cx="12" cy="12" r="10" />-->
<!--                  <path d="M12 16v-4" />-->
<!--                  <path d="M12 8h.01" />-->
<!--                </svg>-->
<!--                Read more about share-->
<!--              </a>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Footer &ndash;&gt;-->
<!--          </div>-->
<!--          &lt;!&ndash; End Invite Users Dropdown &ndash;&gt;-->
<!--        </div>-->
        <!-- End Invite Users -->

        <div class="border-e border-gray-200 w-px h-6 mx-1.5 dark:border-neutral-700"></div>

        <div class="h-[38px] ">
          <!-- Account Dropdown -->
          <div class="hs-dropdown inline-flex   [--strategy:absolute] [--auto-close:inside] [--placement:bottom-right] relative text-start">
            <button id="hs-dnad" type="button" class="inline-flex shrink-0 items-center gap-x-3 text-start rounded-full focus:outline-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
              <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">
            </button>

            <!-- Account Dropdown -->
            <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-60 transition-[opacity,margin] duration opacity-0 hidden z-20 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-dnad">
              <div class="p-1 border-b border-gray-200 dark:border-neutral-800">
                <Link class="py-2 px-3 flex items-center gap-x-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" :href="route('dashboard.my-profile')">
                  <img class="shrink-0 size-8 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Avatar">

                  <div class="grow">
                    <span class="text-sm font-semibold text-gray-800 dark:text-neutral-300">
                      {{ user?.name }}
                    </span>
                    <p class="text-xs text-gray-500 dark:text-neutral-500">
                      {{ user?.email }}
                    </p>
                  </div>
                </Link>
              </div>
              <div class="p-1">
<!--                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <rect width="20" height="14" x="2" y="5" rx="2" />-->
<!--                    <line x1="2" x2="22" y1="10" y2="10" />-->
<!--                  </svg>-->
<!--                  Billing-->
<!--                </a>-->
<!--                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />-->
<!--                    <circle cx="12" cy="12" r="3" />-->
<!--                  </svg>-->
<!--                  Settings-->
<!--                </a>-->
                <DropdownLink :href="route('dashboard.profile.edit', user?.id)">
                  <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                  </svg>
                  Akkaunt
                </DropdownLink>
              </div>
              <div class="px-4 py-3.5 border-y border-gray-200 dark:border-neutral-800">
                <!-- Switch/Toggle -->
                <div class="flex justify-between items-center">
                  <label for="@@darkmodeID" class="text-sm text-gray-800 dark:text-neutral-300">Qorong'i rejim</label>
                  <div class="relative inline-block">
                    <input data-hs-theme-switch type="checkbox" id="@@darkmodeID" class="relative w-11 h-6 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-neutral-900

                    before:inline-block before:size-5 before:bg-white checked:before:bg-white before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-white">
                  </div>
                </div>
                <!-- End Switch/Toggle -->
              </div>
              <div class="p-1">
<!--                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  Customization-->
<!--                  <div class="ms-auto">-->
<!--                    <span class="ms-auto inline-flex items-center gap-1.5 py-px px-1.5 rounded text-[10px] leading-4 font-medium bg-gray-100 text-gray-800 dark:bg-neutral-700 dark:text-neutral-300">-->
<!--                      New-->
<!--                    </span>-->
<!--                  </div>-->
<!--                </a>-->
<!--                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                  Manage team-->
<!--                </a>-->
                <button type="button" @click="logoutHandle" class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                  Chiqish
                </button>
              </div>
<!--              <div class="p-1 border-t border-gray-200 dark:border-neutral-800">-->
<!--                <button type="button" class="flex mt-0.5 gap-x-3 py-2 px-3 w-full rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-pro-dasadam">-->
<!--                  <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <circle cx="12" cy="12" r="10" />-->
<!--                    <path d="M8 12h8" />-->
<!--                    <path d="M12 8v8" />-->
<!--                  </svg>-->
<!--                  Add team account-->
<!--                </button>-->
<!--              </div>-->
            </div>
            <!-- End Account Dropdown -->
          </div>
          <!-- End Account Dropdown -->
        </div>
      </div>
    </div>
  </header>
  <!-- ========== END HEADER ========== -->
</template>

<style scoped>

</style>
