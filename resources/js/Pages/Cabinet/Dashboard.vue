<script setup>

import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import { Head, Link, router, usePage } from '@inertiajs/vue3'
import { useFormatFriendlyDate } from '@/Composables/helpers.js'

const page = usePage()

const startups = page.props.startups
const { formatFriendlyDate } = useFormatFriendlyDate()

</script>

<template>
  <CabinetLayout>
    <template #header>
      <Head :title="$t('cabinet.dashboard.breadcrumbs.dashboard')"/>
    </template>

      <!-- Breadcrumb -->
      <ol class="md:hidden py-3 px-2 sm:px-5 flex items-center whitespace-nowrap">
        <li class="flex items-center text-sm text-stone-600 dark:text-neutral-500">
          {{ $t('cabinet.dashboard.breadcrumbs.dashboard') }}
          <svg class="shrink-0 overflow-visible size-4 ms-1.5 text-stone-400 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
          </svg>
        </li>
        <li class="ps-1.5 flex items-center font-semibold text-stone-800 dark:text-neutral-200 text-sm">
          {{ $t('cabinet.dashboard.breadcrumbs.overview') }}
        </li>
      </ol>
      <!-- End Breadcrumb -->

      <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">

        <!-- Sales Stats Card -->
        <div class="p-5 space-y-4 flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
          <!-- Header -->
          <div class="flex justify-between items-center gap-x-5">
            <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">
              {{ $t('cabinet.dashboard.startup') }}
            </h2>

            <div class="flex justify-end items-center gap-x-2">
              <!-- Button -->
              <button type="button" @click="router.visit(route('dashboard.startups.add'))" class="py-2 px-2.5 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-overlay="#hs-pro-dasadpm">
                <svg class="hidden sm:block shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14" />
                  <path d="M12 5v14" />
                </svg>
                {{ $t('cabinet.dashboard.add_startup') }}
              </button>
              <!-- End Button -->
            </div>
          </div>
          <!-- End Header -->

          <!-- Filter Group -->
          <div class="grid md:grid-cols-2 gap-y-2 md:gap-y-0 md:gap-x-5">
            <div>
              <!-- Search Input -->
              <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                  <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                  </svg>
                </div>
                <input type="text" class="py-[7px] ps-10 pe-8 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600" placeholder="Startup qidirish">
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
              </div>
              <!-- End Search Input -->
            </div>
            <!-- End Col -->

            <div class="flex md:justify-end items-center gap-x-2">
              <!-- Import / Export Dropdown -->
<!--              <div class="hs-dropdown [&#45;&#45;auto-close:true] relative inline-flex">-->
<!--                &lt;!&ndash; Import / Export Button &ndash;&gt;-->
<!--                <button id="hs-pro-dptied" type="button" class="py-2 px-2.5 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                  <svg class="shrink-0 mt-0.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="m3 16 4 4 4-4" />-->
<!--                    <path d="M7 20V4" />-->
<!--                    <path d="m21 8-4-4-4 4" />-->
<!--                    <path d="M17 4v16" />-->
<!--                  </svg>-->
<!--                  Import / Export-->
<!--                  <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="m6 9 6 6 6-6" />-->
<!--                  </svg>-->
<!--                </button>-->
<!--                &lt;!&ndash; End Import / Export Button &ndash;&gt;-->

<!--                &lt;!&ndash; Dropdown &ndash;&gt;-->
<!--                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-44 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dptied">-->
<!--                  <div class="p-1">-->
<!--                    <button type="button" class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-pro-dicm">-->
<!--                      <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />-->
<!--                        <polyline points="7 10 12 15 17 10" />-->
<!--                        <line x1="12" x2="12" y1="15" y2="3" />-->
<!--                      </svg>-->
<!--                      Import contacts-->
<!--                    </button>-->
<!--                    <button type="button" class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-pro-decm">-->
<!--                      <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />-->
<!--                        <polyline points="17 8 12 3 7 8" />-->
<!--                        <line x1="12" x2="12" y1="3" y2="15" />-->
<!--                      </svg>-->
<!--                      Export contacts-->
<!--                    </button>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Dropdown &ndash;&gt;-->
<!--              </div>-->
              <!-- End Import / Export Dropdown -->

              <!-- Download Dropdown -->
<!--              <div class="hs-dropdown [&#45;&#45;auto-close:inside] relative inline-flex">-->
<!--                <button id="hs-pro-dptfd" type="button" class="py-2 px-2.5 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                  <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <line x1="21" x2="14" y1="4" y2="4" />-->
<!--                    <line x1="10" x2="3" y1="4" y2="4" />-->
<!--                    <line x1="21" x2="12" y1="12" y2="12" />-->
<!--                    <line x1="8" x2="3" y1="12" y2="12" />-->
<!--                    <line x1="21" x2="16" y1="20" y2="20" />-->
<!--                    <line x1="12" x2="3" y1="20" y2="20" />-->
<!--                    <line x1="14" x2="14" y1="2" y2="6" />-->
<!--                    <line x1="8" x2="8" y1="10" y2="14" />-->
<!--                    <line x1="16" x2="16" y1="18" y2="22" />-->
<!--                  </svg>-->
<!--                  Filter-->
<!--                  <span class="font-medium text-[10px] py-0.5 px-[5px] bg-gray-800 text-white leading-3 rounded-full dark:bg-neutral-500">-->
<!--                  5-->
<!--                </span>-->
<!--                </button>-->

<!--                &lt;!&ndash; Download Dropdown &ndash;&gt;-->
<!--                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-48 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dptfd">-->
<!--                  &lt;!&ndash; Search Input &ndash;&gt;-->
<!--                  <div class="pt-1 px-1">-->
<!--                    <div class="pb-1 border-b border-gray-200 dark:border-neutral-800">-->
<!--                      <div class="relative">-->
<!--                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-2.5">-->
<!--                          <svg class="shrink-0 size-3.5 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                            <circle cx="11" cy="11" r="8"></circle>-->
<!--                            <path d="m21 21-4.3-4.3"></path>-->
<!--                          </svg>-->
<!--                        </div>-->
<!--                        <input type="text" class="py-1.5 px-8 block w-full bg-gray-100 border-transparent rounded-md text-sm placeholder:text-gray-500 focus:outline-none focus:border-blue-500 focus:ring-blue-500 focus:bg-white disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-transparent dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600 dark:focus:bg-neutral-900" placeholder="Search">-->
<!--                        <div class="hidden absolute inset-y-0 end-0 flex items-center z-20 pe-1">-->
<!--                          <button type="button" class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" aria-label="Close">-->
<!--                            <span class="sr-only">Close</span>-->
<!--                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                              <circle cx="12" cy="12" r="10" />-->
<!--                              <path d="m15 9-6 6" />-->
<!--                              <path d="m9 9 6 6" />-->
<!--                            </svg>-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Search Input &ndash;&gt;-->

<!--                  <div class="p-1 space-y-0.5">-->
<!--                    <a class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <rect width="18" height="18" x="3" y="3" rx="2" />-->
<!--                        <circle cx="12" cy="10" r="3" />-->
<!--                        <path d="M7 21v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2" />-->
<!--                      </svg>-->
<!--                      Name-->
<!--                    </a>-->
<!--                    <a class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <rect width="20" height="16" x="2" y="4" rx="2" />-->
<!--                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />-->
<!--                      </svg>-->
<!--                      Email addresses-->
<!--                    </a>-->
<!--                    <a class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M11 12H3" />-->
<!--                        <path d="M16 6H3" />-->
<!--                        <path d="M16 18H3" />-->
<!--                        <path d="M21 12h-6" />-->
<!--                      </svg>-->
<!--                      Description-->
<!--                    </a>-->
<!--                    <a class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />-->
<!--                        <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" />-->
<!--                        <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" />-->
<!--                        <path d="M10 6h4" />-->
<!--                        <path d="M10 10h4" />-->
<!--                        <path d="M10 14h4" />-->
<!--                        <path d="M10 18h4" />-->
<!--                      </svg>-->
<!--                      Company-->
<!--                    </a>-->
<!--                    <a class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />-->
<!--                        <rect width="18" height="18" x="3" y="4" rx="2" />-->
<!--                        <circle cx="12" cy="10" r="2" />-->
<!--                        <line x1="8" x2="8" y1="2" y2="4" />-->
<!--                        <line x1="16" x2="16" y1="2" y2="4" />-->
<!--                      </svg>-->
<!--                      User ID-->
<!--                    </a>-->
<!--                    <a class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />-->
<!--                      </svg>-->
<!--                      Phone numbers-->
<!--                    </a>-->
<!--                    <a class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />-->
<!--                        <circle cx="12" cy="10" r="3" />-->
<!--                      </svg>-->
<!--                      Location-->
<!--                    </a>-->
<!--                    <a class="w-full flex gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">-->
<!--                      <svg class="shrink-0 mt-0.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />-->
<!--                        <path d="m9 12 2 2 4-4" />-->
<!--                      </svg>-->
<!--                      Signed up as-->
<!--                    </a>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Download Dropdown &ndash;&gt;-->
<!--              </div>-->
              <!-- End Download Dropdown -->
            </div>
            <!-- End Col -->
          </div>
          <!-- End Filter Group -->

          <!-- Table Section -->
          <div class="overflow-x-auto [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <div class="min-w-full inline-block align-middle">
              <!-- Table -->
              <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                <thead>
                <tr class="border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
<!--                  <th scope="col" class="px-3 py-2.5 text-start">-->
<!--                    <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                  </th>-->

                  <th scope="col" class="min-w-[280px] ">
                    <!-- Sort Dropdown -->
                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">
                      <button id="hs-pro-dutnms" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        {{ $t('cabinet.dashboard.title') }}
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="m7 15 5 5 5-5" />
                          <path d="m7 9 5-5 5 5" />
                        </svg>
                      </button>

                      <!-- Dropdown -->
<!--                      <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-40 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dutnms">-->
<!--                        <div class="p-1">-->
<!--                          <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">-->
<!--                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                              <path d="m5 12 7-7 7 7" />-->
<!--                              <path d="M12 19V5" />-->
<!--                            </svg>-->
<!--                            Sort ascending-->
<!--                          </button>-->
<!--                          <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">-->
<!--                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                              <path d="M12 5v14" />-->
<!--                              <path d="m19 12-7 7-7-7" />-->
<!--                            </svg>-->
<!--                            Sort descending-->
<!--                          </button>-->
<!--                          <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">-->
<!--                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                              <path d="m12 19-7-7 7-7" />-->
<!--                              <path d="M19 12H5" />-->
<!--                            </svg>-->
<!--                            Move left-->
<!--                          </button>-->
<!--                          <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">-->
<!--                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                              <path d="M5 12h14" />-->
<!--                              <path d="m12 5 7 7-7 7" />-->
<!--                            </svg>-->
<!--                            Move right-->
<!--                          </button>-->

<!--                          <div class="my-1 border-t border-gray-200 dark:border-neutral-800"></div>-->

<!--                          <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">-->
<!--                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                              <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />-->
<!--                              <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />-->
<!--                              <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />-->
<!--                              <line x1="2" x2="22" y1="2" y2="22" />-->
<!--                            </svg>-->
<!--                            Hide in view-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
                      <!-- End Dropdown -->
                    </div>
                    <!-- End Sort Dropdown -->
                  </th>

                  <th scope="col" class="min-w-[180px] ">
                    <!-- Sort Dropdown -->
                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">
                      <button id="hs-pro-duttgs" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        {{ $t('cabinet.dashboard.industry') }}
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="m7 15 5 5 5-5" />
                          <path d="m7 9 5-5 5 5" />
                        </svg>
                      </button>
                    </div>
                    <!-- End Sort Dropdown -->
                  </th>

                  <th scope="col" class="min-w-[180px] ">
                    <!-- Sort Dropdown -->
                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">
                      <button id="hs-pro-dutass" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        {{ $t('cabinet.dashboard.participants') }}
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="m7 15 5 5 5-5" />
                          <path d="m7 9 5-5 5 5" />
                        </svg>
                      </button>
                    </div>
                    <!-- End Sort Dropdown -->
                  </th>

                  <th scope="col">
                    <!-- Sort Dropdown -->
                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">
                      <button id="hs-pro-dutprs" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        {{ $t('cabinet.dashboard.mvp_available') }}
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="m7 15 5 5 5-5" />
                          <path d="m7 9 5-5 5 5" />
                        </svg>
                      </button>


                    </div>
                    <!-- End Sort Dropdown -->
                  </th>

                  <th scope="col">
                    <!-- Sort Dropdown -->
                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">
                      <button id="hs-pro-dutdds" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        {{ $t('cabinet.dashboard.start_date') }}
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="m7 15 5 5 5-5" />
                          <path d="m7 9 5-5 5 5" />
                        </svg>
                      </button>

                    </div>
                    <!-- End Sort Dropdown -->
                  </th>

                  <th scope="col">
                    <!-- Sort Dropdown -->
                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">
                      <button id="hs-pro-dutrts" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        {{ $t('cabinet.dashboard.type') }}
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="m7 15 5 5 5-5" />
                          <path d="m7 9 5-5 5 5" />
                        </svg>
                      </button>

                    </div>
                    <!-- End Sort Dropdown -->
                  </th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                <tr class="divide-x divide-gray-200 dark:divide-neutral-700" v-for="startup in startups.data" :key="startup.id">
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
                  <td class="size-px whitespace-nowrap">
                    <div class="px-5 py-2">
                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">
                        <Link :href="route('dashboard.startups.show', startup.id )" class="inline-flex items-center gap-x-1 text-gray-800 decoration-2 hover:underline font-medium hover:text-blue-600 focus:outline-none focus:underline focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:outline-none dark:focus:text-blue-500">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-view"><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/><circle cx="12" cy="12" r="1"/><path d="M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0"/></svg>
                          {{ startup.title }}
                        </Link>
                      </p>
                      <p class="text-sm text-gray-500 dark:text-neutral-500">{{ $t('cabinet.dashboard.status') }}: {{ startup.status.label }}</p>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="flex flex-wrap gap-1.5 px-4 py-1">
                      <template v-for="industry in startup.industries" :key="industry.id">
                        <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">
                          {{ industry.title }}
                        </span>
                      </template>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-5 py-2">
                      <div class="flex items-center -space-x-2">
                        <span v-if="startup.contributors.length === 0" class="text-sm text-gray-600 dark:text-neutral-400">{{ $t('cabinet.dashboard.not_available') }}</span>
                        <div class="hs-tooltip hover:z-10" v-for="user in startup.contributors" :key="user.id">
                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">
                            {{ user.name }}
                          </span>
                        </div>
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            L-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lori Hunter-->
<!--                          </span>-->
<!--                        </div>-->
                      </div>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-5 py-2">
                      <div class="flex items-center gap-x-3">
                        <span class="text-sm text-gray-500 dark:text-neutral-500">
                          <span v-if="startup.has_mvp" class="m-1 p-2 inline-block bg-green-100 text-green-800 text-xs rounded-md dark:bg-green-100 dark:text-green-700">{{ $t('common.yes') }}</span>
                          <span v-else class="m-1 p-2 inline-block bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">{{ $t('common.no') }}</span>
                        </span>
                      </div>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-5 py-2">
                      <span class="text-sm text-gray-600 dark:text-neutral-400">
                        {{ formatFriendlyDate(startup.start_date) }}
                      </span>
                    </div>
                  </td>
                  <td class="size-px whitespace-nowrap">
                    <div class="px-5 py-2 flex gap-x-1">
                      <span class="text-sm text-gray-600 dark:text-neutral-400">
                        {{ startup.type }}
                      </span>
                    </div>
                  </td>
                </tr>

                </tbody>
              </table>
              <!-- End Table -->
            </div>
          </div>
          <!-- End Table Section -->

          <!-- Footer -->
<!--          <div class="grid grid-cols-2 items-center gap-y-2 sm:gap-y-0 sm:gap-x-5">-->
<!--            <p class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--              <span class="font-medium">27</span>-->
<!--              <span class="text-gray-500 dark:text-neutral-500">results</span>-->
<!--            </p>-->

<!--            &lt;!&ndash; Pagination &ndash;&gt;-->
<!--            <nav class="flex justify-end items-center gap-x-1" aria-label="Pagination">-->
<!--              <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-white dark:hover:bg-white/10 dark:focus:bg-neutral-700" aria-label="Previous">-->
<!--                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                  <path d="m15 18-6-6 6-6" />-->
<!--                </svg>-->
<!--                <span class="sr-only">Previous</span>-->
<!--              </button>-->
<!--              <div class="flex items-center gap-x-1">-->
<!--                <span class="min-h-[38px] min-w-[38px] flex justify-center items-center bg-gray-100 text-gray-800 py-2 px-3 text-sm rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:text-white" aria-current="page">1</span>-->
<!--                <span class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-sm dark:text-neutral-500">of</span>-->
<!--                <span class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-sm dark:text-neutral-500">3</span>-->
<!--              </div>-->
<!--              <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-white dark:hover:bg-white/10 dark:focus:bg-neutral-700" aria-label="Next">-->
<!--                <span class="sr-only">Next</span>-->
<!--                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                  <path d="m9 18 6-6-6-6" />-->
<!--                </svg>-->
<!--              </button>-->
<!--            </nav>-->
<!--            &lt;!&ndash; End Pagination &ndash;&gt;-->
<!--          </div>-->
          <!-- End Footer -->

        </div>
        <!-- End Sales Stats Card -->
      </div>

  </CabinetLayout>

</template>

<style scoped>

</style>
