<script setup>

import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import { Head } from '@inertiajs/vue3'
import CabinetProfileEventModals from '@/Components/CabinetProfileEventModals.vue'
import CabinetAddProjectModal from '@/Components/CabinetAddProjectModal.vue'
import CabinetProfileUserCardSection from '@/Components/icons/CabinetProfileUserCardSection.vue'
import CabinetProfileSidebarSection from '@/Components/icons/CabinetProfileSidebarSection.vue'
</script>

<template>
  <CabinetLayout>
    <template #header>
      <Head title="Umumiy profil"/>
    </template>

    <div class="max-w-6xl mx-auto">
    <!-- Breadcrumb -->
    <ol class="md:hidden pt-3 pb-1 sm:pb-3 px-2 sm:px-5 flex items-center whitespace-nowrap">
      <li class="flex items-center text-sm text-gray-600 dark:text-neutral-500">
        User Profile
        <svg class="shrink-0 overflow-visible size-4 ms-1.5 text-gray-400 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
        </svg>
      </li>
      <li class="ps-1.5 flex items-center font-semibold text-gray-800 dark:text-neutral-200 text-sm">
        My Profile
      </li>
    </ol>
    <!-- End Breadcrumb -->

    <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">
      <!-- User Profile Card -->
      <cabinet-profile-user-card-section/>
      <!-- End User Profile Card -->

      <!-- Sidebar Toggle -->
      <cabinet-profile-sidebar-section/>
      <!-- End Sidebar Toggle -->

      <!-- Projects -->
      <div class="xl:p-5 flex flex-col xl:bg-white xl:border xl:border-gray-200 xl:shadow-sm xl:rounded-xl dark:xl:bg-neutral-800 dark:xl:border-neutral-700">
        <!-- Grid -->
        <div class="xl:flex">
          <!-- Activity Offcanvas -->
          <div id="hs-pro-dupsd" class="hs-overlay [--auto-close:xl] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-[320px] bg-white p-5 overflow-y-auto xl:relative xl:z-0 xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 xl:p-0 border-e border-gray-200 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-labelledby="hs-pro-dupsd-label">
            <div class="xl:hidden">
              <!-- Close Button -->
              <div class="absolute top-2 end-4 z-10">
                <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-pro-dupsd">
                  <span class="sr-only">Close</span>
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                  </svg>
                </button>
              </div>
              <!-- End Close Button -->
            </div>

            <!-- Body -->
            <div class="xl:pe-4 mt-3 space-y-5 divide-y divide-gray-200 dark:divide-neutral-700">
              <div class="pt-4 first:pt-0">
                <h2 id="hs-pro-dupsd-label" class="text-sm font-semibold text-gray-800 dark:text-neutral-200">
                  About
                </h2>

                <!-- List -->
                <ul class="mt-3 space-y-2">
                  <li>
                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800 dark:text-neutral-200">
                      <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z" />
                        <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2" />
                        <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2" />
                        <path d="M10 6h4" />
                        <path d="M10 10h4" />
                        <path d="M10 14h4" />
                        <path d="M10 18h4" />
                      </svg>
                      Guideline
                    </div>
                  </li>
                  <li>
                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800 dark:text-neutral-200">
                      <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                        <circle cx="12" cy="10" r="3" />
                      </svg>
                      United Kingdom
                    </div>
                  </li>
                  <li>
                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800 dark:text-neutral-200">
                      <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                      </svg>
                      Europe/London (GMT)
                    </div>
                  </li>
                  <li>
                    <div class="inline-flex items-center gap-x-3 text-sm text-gray-800 dark:text-neutral-200">
                      <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                      </svg>
                      james@site.so
                    </div>
                  </li>
                  <li>
                    <a class="inline-flex items-center gap-x-3 text-sm text-gray-800 hover:text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-neutral-200 dark:hover:text-blue-500" href="#">
                      <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                      </svg>
                      https://example.so/
                    </a>
                  </li>
                  <li>
                    <a class="inline-flex items-center gap-x-3 text-sm text-gray-800 hover:text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-neutral-200 dark:hover:text-blue-500" href="#">
                      <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                      </svg>
                      https://dribbble.com/james/
                    </a>
                  </li>
                  <li>
                    <a class="inline-flex items-center gap-x-3 text-sm text-gray-800 hover:text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-neutral-200 dark:hover:text-blue-500" href="#">
                      <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                      </svg>
                      https://producthunt.com/james/
                    </a>
                  </li>
                </ul>
                <!-- End List -->
              </div>
              <div class="pt-4 first:pt-0">
                <h2 class="text-sm font-semibold text-gray-800 dark:text-neutral-200">
                  Organizations
                </h2>

                <!-- Button Group -->
                <div class="mt-2 space-y-1">
                  <!-- Dropdown -->
                  <div class="hs-dropdown [--trigger:hover] [--placement:top] relative inline-block">
                    <div id="hs-pro-dupodcd1" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 bg-white border border-gray-200 text-gray-800 text-sm font-medium cursor-pointer rounded-lg shadow-sm align-middle dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" role="button">
                      <svg class="shrink-0 size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.0355 1.75926C10.6408 1.75926 5.30597 1.49951 0.0111241 1C-0.288584 7.23394 5.50578 13.1282 12.7987 14.5668L13.9975 14.7266C14.3372 12.4289 15.9956 3.7773 16.595 1.73928C16.4152 1.75926 16.2353 1.75926 16.0355 1.75926Z" fill="#A49DFF" />
                        <path d="M16.615 1.75926C16.615 1.75926 25.2266 7.9932 28.5234 16.3451C30.0419 11.3499 31.1608 6.15498 32 1C26.8051 1.49951 21.71 1.75926 16.615 1.75926Z" fill="#28289A" />
                        <path d="M13.9975 14.7466L13.8177 15.9455C13.8177 15.9455 12.2592 28.4133 23.1886 31.9699C25.2266 26.8748 27.0049 21.6599 28.5234 16.3251C21.9698 15.8456 13.9975 14.7466 13.9975 14.7466Z" fill="#5ADCEE" />
                        <path d="M16.6149 1.75927C16.0155 3.79729 14.3571 12.4089 14.0175 14.7466C14.0175 14.7466 21.9897 15.8456 28.5233 16.3251C25.1866 7.9932 16.6149 1.75927 16.6149 1.75927Z" fill="#7878FF" />
                      </svg>
                      Guideline
                    </div>

                    <div class="hs-dropdown-menu transition-opacity duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 w-72 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-900 dark:text-neutral-400 dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] before:absolute before:-bottom-5 before:left-0 before:w-full before:h-5" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dupodcd1">
                      <!-- Header -->
                      <div class="p-4 flex items-center gap-x-3 border-b border-gray-200 dark:border-neutral-700">
                        <svg class="shrink-0 size-11" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M16.0355 1.75926C10.6408 1.75926 5.30597 1.49951 0.0111241 1C-0.288584 7.23394 5.50578 13.1282 12.7987 14.5668L13.9975 14.7266C14.3372 12.4289 15.9956 3.7773 16.595 1.73928C16.4152 1.75926 16.2353 1.75926 16.0355 1.75926Z" fill="#A49DFF" />
                          <path d="M16.615 1.75926C16.615 1.75926 25.2266 7.9932 28.5234 16.3451C30.0419 11.3499 31.1608 6.15498 32 1C26.8051 1.49951 21.71 1.75926 16.615 1.75926Z" fill="#28289A" />
                          <path d="M13.9975 14.7466L13.8177 15.9455C13.8177 15.9455 12.2592 28.4133 23.1886 31.9699C25.2266 26.8748 27.0049 21.6599 28.5234 16.3251C21.9698 15.8456 13.9975 14.7466 13.9975 14.7466Z" fill="#5ADCEE" />
                          <path d="M16.6149 1.75927C16.0155 3.79729 14.3571 12.4089 14.0175 14.7466C14.0175 14.7466 21.9897 15.8456 28.5233 16.3251C25.1866 7.9932 16.6149 1.75927 16.6149 1.75927Z" fill="#7878FF" />
                        </svg>
                        <div class="grow">
                          <h4 class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                            Guideline
                          </h4>
                          <p class="text-xs text-gray-500 dark:text-neutral-500">
                            @guideline
                          </p>
                        </div>
                        <button type="button" class="p-2 inline-flex items-center text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                          Following
                        </button>
                      </div>
                      <!-- End Header -->

                      <!-- Body -->
                      <div class="p-4 flex items-center gap-x-5 text-gray-600 dark:text-neutral-400">
                        <div class="flex items-center gap-x-2">
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                          </svg>
                          <span class="text-sm font-medium">
                            4
                            <span class="font-normal">
                              projects
                            </span>
                          </span>
                        </div>

                        <div class="flex items-center gap-x-2">
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                          </svg>
                          <span class="text-sm font-medium">
                            9
                            <span class="font-normal">
                              members
                            </span>
                          </span>
                        </div>
                      </div>
                      <!-- End Body -->
                    </div>
                  </div>
                  <!-- End Dropdown -->

                  <!-- Dropdown -->
                  <div class="hs-dropdown [--trigger:hover] [--placement:top] relative inline-block">
                    <div id="hs-pro-dupodcd2" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 bg-white border border-gray-200 text-gray-800 text-sm font-medium cursor-pointer rounded-lg shadow-sm align-middle dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" role="button">
                      <svg class="shrink-0 size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 16C13.8 16 12 14.2 12 12C12 9.8 13.78 8 16 8C18.2 8 20 9.78 20 12C20 14.22 18.22 16 16 16ZM16 0C9.38 0 4 5.38 4 12C4 18.64 9.38 24 16 24C22.62 24 28 18.64 28 12.02C28 12.02 28 12.02 28 12C28 5.38 22.64 0 16 0Z" fill="#5C54FF" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 24C5.8 24 4 25.78 4 28C4 30.2 5.78 32 8 32C10.2 32 12 30.22 12 28C12 25.78 10.22 24 8 24Z" fill="#5C54FF" />
                      </svg>
                      Prosperops
                    </div>

                    <div class="hs-dropdown-menu transition-opacity duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 w-72 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-900 dark:text-neutral-400 dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] before:absolute before:-bottom-5 before:left-0 before:w-full before:h-5" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dupodcd2">
                      <!-- Header -->
                      <div class="p-4 flex items-center gap-x-3 border-b border-gray-200 dark:border-neutral-700">
                        <svg class="shrink-0 size-11" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M16 16C13.8 16 12 14.2 12 12C12 9.8 13.78 8 16 8C18.2 8 20 9.78 20 12C20 14.22 18.22 16 16 16ZM16 0C9.38 0 4 5.38 4 12C4 18.64 9.38 24 16 24C22.62 24 28 18.64 28 12.02C28 12.02 28 12.02 28 12C28 5.38 22.64 0 16 0Z" fill="#5C54FF" />
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M8 24C5.8 24 4 25.78 4 28C4 30.2 5.78 32 8 32C10.2 32 12 30.22 12 28C12 25.78 10.22 24 8 24Z" fill="#5C54FF" />
                        </svg>
                        <div class="grow">
                          <h4 class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                            Prosperops
                          </h4>
                          <p class="text-xs text-gray-500 dark:text-neutral-500">
                            @prosperops
                          </p>
                        </div>
                        <button type="button" class="p-2 inline-flex items-center text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                          Following
                        </button>
                      </div>
                      <!-- End Header -->

                      <!-- Body -->
                      <div class="p-4 flex items-center gap-x-5 text-gray-600 dark:text-neutral-400">
                        <div class="flex items-center gap-x-2">
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                          </svg>
                          <span class="text-sm font-medium">
                            2
                            <span class="font-normal">
                              projects
                            </span>
                          </span>
                        </div>

                        <div class="flex items-center gap-x-2">
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                          </svg>
                          <span class="text-sm font-medium">
                            4
                            <span class="font-normal">
                              members
                            </span>
                          </span>
                        </div>
                      </div>
                      <!-- End Body -->
                    </div>
                  </div>
                  <!-- End Dropdown -->

                  <!-- Dropdown -->
                  <div class="hs-dropdown [--trigger:hover] [--placement:top] relative inline-block">
                    <div id="hs-pro-dupodcd3" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-x-2 bg-white border border-gray-200 text-gray-800 text-sm font-medium cursor-pointer rounded-lg shadow-sm align-middle dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown" role="button">
                      <svg class="shrink-0 size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.7438 0.940745C6.84695 1.30308 2.6841 1.63631 2.48837 1.67533C1.9396 1.77319 1.44038 2.14544 1.20563 2.63537L1 3.06646L1.01982 13.3407L1.04893 23.615L1.36234 24.2517C1.53886 24.6042 2.73365 26.2499 4.0362 27.9439C6.61221 31.2836 6.79802 31.47 7.77726 31.5679C8.06156 31.597 10.1966 31.4991 12.5081 31.3622C14.8295 31.2154 18.5508 30.99 20.7842 30.863C30.3233 30.2839 29.8334 30.3328 30.3815 29.8627C31.0672 29.2947 31.0183 30.2251 31.0474 17.7377C31.0672 7.15003 31.0573 6.45509 30.9006 6.13177C30.7148 5.76943 30.3815 5.51487 26.0329 2.45885C23.1243 0.421704 22.9186 0.313932 21.6155 0.294111C21.0772 0.274911 16.6307 0.568497 11.7438 0.940745ZM22.752 2.28232C23.1633 2.46814 26.1704 4.56412 26.6108 4.9661C26.7284 5.08378 26.7675 5.18164 26.7086 5.24048C26.5717 5.35817 7.96245 6.465 7.42421 6.38634C7.17956 6.34732 6.81722 6.20052 6.61159 6.06302C5.75932 5.48514 3.64413 3.75149 3.64413 3.62452C3.64413 3.29129 3.57538 3.29129 11.8714 2.69421C13.4582 2.58644 16.0633 2.39071 17.6502 2.26312C21.0871 1.98874 22.1159 1.99865 22.752 2.28232ZM28.6677 7.63996C28.8046 7.77685 28.9223 8.04132 28.9613 8.29589C28.9904 8.53125 29.0102 12.9189 28.9904 18.0313C28.9613 26.8067 28.9514 27.3555 28.7848 27.61C28.6869 27.7667 28.4912 27.9333 28.3438 27.9823C27.9331 28.1489 8.43318 29.2557 8.03183 29.138C7.84601 29.0891 7.59083 28.9324 7.45394 28.7955L7.21858 28.541L7.18947 19.0799C7.16965 12.4395 7.18947 9.5012 7.26813 9.23672C7.32697 9.041 7.47376 8.80564 7.60136 8.72759C7.77788 8.60991 8.93364 8.51205 12.9101 8.2773C15.7016 8.1206 20.0206 7.85613 22.4987 7.70933C28.3933 7.34638 28.3741 7.34638 28.6677 7.63996Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />
                        <path d="M23.4277 10.8818C22.3698 10.9506 21.4296 11.0484 21.3218 11.1073C20.9985 11.2739 20.8028 11.5483 20.7638 11.8617C20.7347 12.185 20.8325 12.224 21.8898 12.3516L22.35 12.4104V16.5925C22.35 19.0799 22.311 20.7256 22.2621 20.6767C22.2131 20.6178 20.8226 18.5027 19.167 15.9756C17.512 13.4392 16.1407 11.3525 16.1209 11.3333C16.1011 11.3135 15.024 11.3724 13.7313 11.4609C12.1445 11.5687 11.273 11.6666 11.0965 11.7644C10.8122 11.9112 10.4988 12.4303 10.4988 12.7734C10.4988 12.979 10.871 13.0868 11.6545 13.0868H12.0658V25.1139L11.4 25.3196C10.8809 25.4763 10.7044 25.5741 10.6165 25.7698C10.4598 26.1031 10.4697 26.4066 10.6264 26.4066C10.6852 26.4066 11.792 26.3378 13.0649 26.2598C15.582 26.113 15.8657 26.0442 16.1302 25.5252C16.2088 25.3685 16.277 25.2019 16.277 25.1529C16.277 25.1139 15.9345 24.9962 15.5226 24.8984C15.1014 24.8005 14.6802 24.7027 14.5923 24.6828C14.4257 24.6339 14.4157 24.3304 14.4157 20.1186V15.6033L17.3931 20.2753C20.5173 25.1721 20.9093 25.7308 21.3893 25.9755C21.987 26.2889 23.5051 26.0733 24.2688 25.5741L24.5042 25.4273L24.524 18.7479L24.5531 12.0586L25.0722 11.9608C25.6891 11.8431 25.9734 11.5594 25.9734 11.0695C25.9734 10.7561 25.9536 10.7362 25.66 10.7462C25.4847 10.7542 24.4757 10.813 23.4277 10.8818Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />
                      </svg>
                      Notion
                    </div>

                    <div class="hs-dropdown-menu transition-opacity duration hs-dropdown-open:opacity-100 opacity-0 hidden z-10 w-72 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-900 dark:text-neutral-400 dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] before:absolute before:-bottom-5 before:left-0 before:w-full before:h-5" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dupodcd3">
                      <!-- Header -->
                      <div class="p-4 flex items-center gap-x-3 border-b border-gray-200 dark:border-neutral-700">
                        <svg class="shrink-0 size-11" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.7438 0.940745C6.84695 1.30308 2.6841 1.63631 2.48837 1.67533C1.9396 1.77319 1.44038 2.14544 1.20563 2.63537L1 3.06646L1.01982 13.3407L1.04893 23.615L1.36234 24.2517C1.53886 24.6042 2.73365 26.2499 4.0362 27.9439C6.61221 31.2836 6.79802 31.47 7.77726 31.5679C8.06156 31.597 10.1966 31.4991 12.5081 31.3622C14.8295 31.2154 18.5508 30.99 20.7842 30.863C30.3233 30.2839 29.8334 30.3328 30.3815 29.8627C31.0672 29.2947 31.0183 30.2251 31.0474 17.7377C31.0672 7.15003 31.0573 6.45509 30.9006 6.13177C30.7148 5.76943 30.3815 5.51487 26.0329 2.45885C23.1243 0.421704 22.9186 0.313932 21.6155 0.294111C21.0772 0.274911 16.6307 0.568497 11.7438 0.940745ZM22.752 2.28232C23.1633 2.46814 26.1704 4.56412 26.6108 4.9661C26.7284 5.08378 26.7675 5.18164 26.7086 5.24048C26.5717 5.35817 7.96245 6.465 7.42421 6.38634C7.17956 6.34732 6.81722 6.20052 6.61159 6.06302C5.75932 5.48514 3.64413 3.75149 3.64413 3.62452C3.64413 3.29129 3.57538 3.29129 11.8714 2.69421C13.4582 2.58644 16.0633 2.39071 17.6502 2.26312C21.0871 1.98874 22.1159 1.99865 22.752 2.28232ZM28.6677 7.63996C28.8046 7.77685 28.9223 8.04132 28.9613 8.29589C28.9904 8.53125 29.0102 12.9189 28.9904 18.0313C28.9613 26.8067 28.9514 27.3555 28.7848 27.61C28.6869 27.7667 28.4912 27.9333 28.3438 27.9823C27.9331 28.1489 8.43318 29.2557 8.03183 29.138C7.84601 29.0891 7.59083 28.9324 7.45394 28.7955L7.21858 28.541L7.18947 19.0799C7.16965 12.4395 7.18947 9.5012 7.26813 9.23672C7.32697 9.041 7.47376 8.80564 7.60136 8.72759C7.77788 8.60991 8.93364 8.51205 12.9101 8.2773C15.7016 8.1206 20.0206 7.85613 22.4987 7.70933C28.3933 7.34638 28.3741 7.34638 28.6677 7.63996Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />
                          <path d="M23.4277 10.8818C22.3698 10.9506 21.4296 11.0484 21.3218 11.1073C20.9985 11.2739 20.8028 11.5483 20.7638 11.8617C20.7347 12.185 20.8325 12.224 21.8898 12.3516L22.35 12.4104V16.5925C22.35 19.0799 22.311 20.7256 22.2621 20.6767C22.2131 20.6178 20.8226 18.5027 19.167 15.9756C17.512 13.4392 16.1407 11.3525 16.1209 11.3333C16.1011 11.3135 15.024 11.3724 13.7313 11.4609C12.1445 11.5687 11.273 11.6666 11.0965 11.7644C10.8122 11.9112 10.4988 12.4303 10.4988 12.7734C10.4988 12.979 10.871 13.0868 11.6545 13.0868H12.0658V25.1139L11.4 25.3196C10.8809 25.4763 10.7044 25.5741 10.6165 25.7698C10.4598 26.1031 10.4697 26.4066 10.6264 26.4066C10.6852 26.4066 11.792 26.3378 13.0649 26.2598C15.582 26.113 15.8657 26.0442 16.1302 25.5252C16.2088 25.3685 16.277 25.2019 16.277 25.1529C16.277 25.1139 15.9345 24.9962 15.5226 24.8984C15.1014 24.8005 14.6802 24.7027 14.5923 24.6828C14.4257 24.6339 14.4157 24.3304 14.4157 20.1186V15.6033L17.3931 20.2753C20.5173 25.1721 20.9093 25.7308 21.3893 25.9755C21.987 26.2889 23.5051 26.0733 24.2688 25.5741L24.5042 25.4273L24.524 18.7479L24.5531 12.0586L25.0722 11.9608C25.6891 11.8431 25.9734 11.5594 25.9734 11.0695C25.9734 10.7561 25.9536 10.7362 25.66 10.7462C25.4847 10.7542 24.4757 10.813 23.4277 10.8818Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />
                        </svg>
                        <div class="grow">
                          <h4 class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                            Notion
                          </h4>
                          <p class="text-xs text-gray-500 dark:text-neutral-500">
                            @notion
                          </p>
                        </div>
                        <button type="button" class="p-2 inline-flex items-center text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                          Following
                        </button>
                      </div>
                      <!-- End Header -->

                      <!-- Body -->
                      <div class="p-4 flex items-center gap-x-5 text-gray-600 dark:text-neutral-400">
                        <div class="flex items-center gap-x-2">
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                          </svg>
                          <span class="text-sm font-medium">
                            38
                            <span class="font-normal">
                              projects
                            </span>
                          </span>
                        </div>

                        <div class="flex items-center gap-x-2">
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                          </svg>
                          <span class="text-sm font-medium">
                            30
                            <span class="font-normal">
                              members
                            </span>
                          </span>
                        </div>
                      </div>
                      <!-- End Body -->
                    </div>
                  </div>
                  <!-- End Dropdown -->
                </div>
                <!-- Button Group -->
              </div>
              <div class="pt-4 first:pt-0">
                <h2 class="mb-3 text-sm font-semibold text-gray-800 dark:text-neutral-200">
                  Connections
                </h2>

                <!-- List Group -->
                <ul class="space-y-3">
                  <!-- List Item -->
                  <li>
                    <div class="flex items-center gap-x-3">
                      <span class="flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                        Rd
                      </span>
                      <div class="grow">
                        <a class="block text-sm font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                          Rachel Doe
                        </a>
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                          rach
                        </p>
                      </div>
                      <label for="hs-pro-dupcu1" class="relative py-1.5 px-2 block text-center sm:text-start rounded-lg cursor-pointer text-xs font-medium focus:outline-none">
                        <input type="checkbox" id="hs-pro-dupcu1" class="peer absolute top-0 start-0 size-full bg-white border border-gray-200 text-transparent rounded-lg cursor-pointer focus:ring-white after:block after:size-full after:rounded-md checked:bg-white checked:text-transparent checked:border-gray-200 checked:hover:border-gray-200 checked:focus:border-gray-200 checked:bg-none focus:border-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:after:bg-neutral-800 dark:checked:border-neutral-700 dark:focus:ring-0 dark:focus:ring-offset-0 dark:focus:border-neutral-600 dark:checked:focus:after:border-neutral-600">
                        <span class="relative z-10 peer-checked:hidden text-gray-800 dark:text-white">
                          Connect
                        </span>
                        <span class="relative z-10 hidden peer-checked:flex peer-checked:text-gray-800 text-gray-200 dark:text-white dark:peer-checked:text-white">
                          Unconnect
                        </span>
                      </label>
                    </div>
                  </li>
                  <!-- End List Item -->

                  <!-- List Item -->
                  <li>
                    <div class="flex items-center gap-x-3">
                      <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1670272505340-d906d8d77d03?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                      <div class="grow">
                        <a class="block text-sm font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                          Anna Richard
                        </a>
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                          annarich
                        </p>
                      </div>
                      <label for="hs-pro-dupcu2" class="relative py-1.5 px-2 block text-center sm:text-start rounded-lg cursor-pointer text-xs font-medium focus:outline-none">
                        <input type="checkbox" id="hs-pro-dupcu2" class="peer absolute top-0 start-0 size-full bg-white border border-gray-200 text-transparent rounded-lg cursor-pointer focus:ring-white after:block after:size-full after:rounded-md checked:bg-white checked:text-transparent checked:border-gray-200 checked:hover:border-gray-200 checked:focus:border-gray-200 checked:bg-none focus:border-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:after:bg-neutral-800 dark:checked:border-neutral-700 dark:focus:ring-0 dark:focus:ring-offset-0 dark:focus:border-neutral-600 dark:checked:focus:after:border-neutral-600">
                        <span class="relative z-10 peer-checked:hidden text-gray-800 dark:text-white">
                          Connect
                        </span>
                        <span class="relative z-10 hidden peer-checked:flex peer-checked:text-gray-800 text-gray-200 dark:text-white dark:peer-checked:text-white">
                          Unconnect
                        </span>
                      </label>
                    </div>
                  </li>
                  <!-- End List Item -->

                  <!-- List Item -->
                  <li>
                    <div class="flex items-center gap-x-3">
                      <span class="flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                        Bd
                      </span>
                      <div class="grow">
                        <a class="block text-sm font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                          Bob Dean
                        </a>
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                          bob_data_viewer
                        </p>
                      </div>
                      <label for="hs-pro-dupcu3" class="relative py-1.5 px-2 block text-center sm:text-start rounded-lg cursor-pointer text-xs font-medium focus:outline-none">
                        <input type="checkbox" id="hs-pro-dupcu3" class="peer absolute top-0 start-0 size-full bg-white border border-gray-200 text-transparent rounded-lg cursor-pointer focus:ring-white after:block after:size-full after:rounded-md checked:bg-white checked:text-transparent checked:border-gray-200 checked:hover:border-gray-200 checked:focus:border-gray-200 checked:bg-none focus:border-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:after:bg-neutral-800 dark:checked:border-neutral-700 dark:focus:ring-0 dark:focus:ring-offset-0 dark:focus:border-neutral-600 dark:checked:focus:after:border-neutral-600" checked>
                        <span class="relative z-10 peer-checked:hidden text-gray-800 dark:text-white">
                          Connect
                        </span>
                        <span class="relative z-10 hidden peer-checked:flex peer-checked:text-gray-800 text-gray-200 dark:text-white dark:peer-checked:text-white">
                          Unconnect
                        </span>
                      </label>
                    </div>
                  </li>
                  <!-- End List Item -->

                  <!-- List Item -->
                  <li>
                    <div class="flex items-center gap-x-3">
                      <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                      <div class="grow">
                        <a class="block text-sm font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                          Alex Gustuf
                        </a>
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                          alex
                        </p>
                      </div>
                      <label for="hs-pro-dupcu4" class="relative py-1.5 px-2 block text-center sm:text-start rounded-lg cursor-pointer text-xs font-medium focus:outline-none">
                        <input type="checkbox" id="hs-pro-dupcu4" class="peer absolute top-0 start-0 size-full bg-white border border-gray-200 text-transparent rounded-lg cursor-pointer focus:ring-white after:block after:size-full after:rounded-md checked:bg-white checked:text-transparent checked:border-gray-200 checked:hover:border-gray-200 checked:focus:border-gray-200 checked:bg-none focus:border-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:after:bg-neutral-800 dark:checked:border-neutral-700 dark:focus:ring-0 dark:focus:ring-offset-0 dark:focus:border-neutral-600 dark:checked:focus:after:border-neutral-600" checked>
                        <span class="relative z-10 peer-checked:hidden text-gray-800 dark:text-white">
                          Connect
                        </span>
                        <span class="relative z-10 hidden peer-checked:flex peer-checked:text-gray-800 text-gray-200 dark:text-white dark:peer-checked:text-white">
                          Unconnect
                        </span>
                      </label>
                    </div>
                  </li>
                  <!-- End List Item -->

                  <!-- List Item -->
                  <li>
                    <div class="flex items-center gap-x-3">
                      <img class="shrink-0 size-[38px] rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                      <div class="grow">
                        <a class="block text-sm font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                          Ella Lauda
                        </a>
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                          ellala
                        </p>
                      </div>
                      <label for="hs-pro-dupcu5" class="relative py-1.5 px-2 block text-center sm:text-start rounded-lg cursor-pointer text-xs font-medium focus:outline-none">
                        <input type="checkbox" id="hs-pro-dupcu5" class="peer absolute top-0 start-0 size-full bg-white border border-gray-200 text-transparent rounded-lg cursor-pointer focus:ring-white after:block after:size-full after:rounded-md checked:bg-white checked:text-transparent checked:border-gray-200 checked:hover:border-gray-200 checked:focus:border-gray-200 checked:bg-none focus:border-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:after:bg-neutral-800 dark:checked:border-neutral-700 dark:focus:ring-0 dark:focus:ring-offset-0 dark:focus:border-neutral-600 dark:checked:focus:after:border-neutral-600">
                        <span class="relative z-10 peer-checked:hidden text-gray-800 dark:text-white">
                          Connect
                        </span>
                        <span class="relative z-10 hidden peer-checked:flex peer-checked:text-gray-800 text-gray-200 dark:text-white dark:peer-checked:text-white">
                          Unconnect
                        </span>
                      </label>
                    </div>
                  </li>
                  <!-- End List Item -->

                  <!-- List Item -->
                  <li>
                    <div class="flex items-center gap-x-3">
                      <span class="flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                        Fh
                      </span>
                      <div class="grow">
                        <a class="block text-sm font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                          Finch Hoot
                        </a>
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                          fhoot
                        </p>
                      </div>
                      <label for="hs-pro-dupcu6" class="relative py-1.5 px-2 block text-center sm:text-start rounded-lg cursor-pointer text-xs font-medium focus:outline-none">
                        <input type="checkbox" id="hs-pro-dupcu6" class="peer absolute top-0 start-0 size-full bg-white border border-gray-200 text-transparent rounded-lg cursor-pointer focus:ring-white after:block after:size-full after:rounded-md checked:bg-white checked:text-transparent checked:border-gray-200 checked:hover:border-gray-200 checked:focus:border-gray-200 checked:bg-none focus:border-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:after:bg-neutral-800 dark:checked:border-neutral-700 dark:focus:ring-0 dark:focus:ring-offset-0 dark:focus:border-neutral-600 dark:checked:focus:after:border-neutral-600" checked>
                        <span class="relative z-10 peer-checked:hidden text-gray-800 dark:text-white">
                          Connect
                        </span>
                        <span class="relative z-10 hidden peer-checked:flex peer-checked:text-gray-800 text-gray-200 dark:text-white dark:peer-checked:text-white">
                          Unconnect
                        </span>
                      </label>
                    </div>
                  </li>
                  <!-- End List Item -->
                </ul>
                <!-- End List Group -->
              </div>

              <div class="pt-4 first:pt-0">
                <h2 class="mb-2 text-sm text-gray-500 dark:text-neutral-500">
                  Explore help topics
                </h2>

                <!-- List Group -->
                <ul class="space-y-2">
                  <!-- List Item -->
                  <li>
                    <a class="p-2.5 flex items-center gap-x-3 bg-white border border-gray-200 text-sm font-medium text-gray-800 dark:text-neutral-200 rounded-xl hover:text-blue-600 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:text-blue-500 dark:focus:bg-neutral-700" href="#">
                      <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                        <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                        </svg>
                      </span>
                      <div class="grow">
                        <p>
                          Preline Course
                        </p>
                      </div>
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                      </svg>
                    </a>
                  </li>
                  <!-- End List Item -->

                  <!-- List Item -->
                  <li>
                    <a class="p-2.5 flex items-center gap-x-3 bg-white border border-gray-200 text-sm font-medium text-gray-800 dark:text-neutral-200 rounded-xl hover:text-blue-600 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:text-blue-500 dark:focus:bg-neutral-700" href="#">
                      <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                        <svg class="shrink-0 size-3.5 text-purple-600 dark:text-purple-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        </svg>
                      </span>
                      <div class="grow">
                        <p>
                          Community Group
                        </p>
                      </div>
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                      </svg>
                    </a>
                  </li>
                  <!-- End List Item -->

                  <!-- List Item -->
                  <li>
                    <a class="p-2.5 flex items-center gap-x-3 bg-white border border-gray-200 text-sm font-medium text-gray-800 dark:text-neutral-200 rounded-xl hover:text-blue-600 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:text-blue-500 dark:focus:bg-neutral-700" href="#">
                      <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                        <svg class="shrink-0 size-3.5 text-cyan-600 dark:text-cyan-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z" />
                          <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z" />
                        </svg>
                      </span>
                      <div class="grow">
                        <p>
                          Hire a Partner Expert
                        </p>
                      </div>
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                      </svg>
                    </a>
                  </li>
                  <!-- End List Item -->

                  <!-- List Item -->
                  <li>
                    <a class="p-2.5 flex items-center gap-x-3 bg-white border border-gray-200 text-sm font-medium text-gray-800 dark:text-neutral-200 rounded-xl hover:text-blue-600 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:text-blue-500 dark:focus:bg-neutral-700" href="#">
                      <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                        <svg class="shrink-0 size-3.5 text-indigo-600 dark:text-indigo-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                        </svg>
                      </span>
                      <div class="grow">
                        <p>
                          Help center
                        </p>
                      </div>
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                      </svg>
                    </a>
                  </li>
                  <!-- End List Item -->
                </ul>
                <!-- End List Group -->
              </div>
            </div>
            <!-- End Body -->
          </div>
          <!-- End Activity Offcanvas -->

          <!-- Content -->
          <div class="xl:ps-5 grow space-y-5">
            <!-- Sales Card -->
<!--            <div class="p-5 space-y-3 flex flex-col bg-white border border-gray-200 rounded-xl shadow-sm xl:shadow-none dark:bg-neutral-800 dark:border-neutral-700">-->
<!--              &lt;!&ndash; Header &ndash;&gt;-->
<!--              <div class="flex justify-between items-center">-->
<!--                <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                  Sales-->
<!--                </h2>-->

<!--                &lt;!&ndash; Calendar Dropdown &ndash;&gt;-->
<!--                <div class="hs-dropdown [&#45;&#45;auto-close:inside] [&#45;&#45;placement:bottom-right] inline-flex">-->
<!--                  <button id="hs-pro-dnic" type="button" class="p-2 inline-flex items-center text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                    <svg class="shrink-0 me-2 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />-->
<!--                      <line x1="16" x2="16" y1="2" y2="6" />-->
<!--                      <line x1="8" x2="8" y1="2" y2="6" />-->
<!--                      <line x1="3" x2="21" y1="10" y2="10" />-->
<!--                      <path d="M8 14h.01" />-->
<!--                      <path d="M12 14h.01" />-->
<!--                      <path d="M16 14h.01" />-->
<!--                      <path d="M8 18h.01" />-->
<!--                      <path d="M12 18h.01" />-->
<!--                      <path d="M16 18h.01" />-->
<!--                    </svg>-->
<!--                    Today-->
<!--                    <svg class="shrink-0 ms-1.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="m6 9 6 6 6-6" />-->
<!--                    </svg>-->
<!--                  </button>-->

<!--                  <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-[318px] transition-[opacity,margin] duration opacity-0 hidden z-50 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dnic">-->

<!--                    &lt;!&ndash; Calendar &ndash;&gt;-->
<!--                    <div class="p-3 space-y-0.5">-->
<!--                      &lt;!&ndash; Months &ndash;&gt;-->
<!--                      <div class="grid grid-cols-5 items-center gap-x-3 mx-1.5 pb-3">-->
<!--                        &lt;!&ndash; Prev Button &ndash;&gt;-->
<!--                        <div class="col-span-1">-->
<!--                          <button type="button" class="size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-label="Previous">-->
<!--                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                              <path d="m15 18-6-6 6-6" />-->
<!--                            </svg>-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        &lt;!&ndash; End Prev Button &ndash;&gt;-->

<!--                        &lt;!&ndash; Month / Year &ndash;&gt;-->
<!--                        <div class="col-span-3 flex justify-center items-center gap-x-1">-->
<!--                          <div class="relative">-->
<!--                            <select data-hs-select='{-->
<!--                                  "placeholder": "Select month",-->
<!--                                  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                                  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",-->
<!--                                  "dropdownClasses": "mt-2 z-50 w-32 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",-->
<!--                                  "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",-->
<!--                                  "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                                }' class="hidden">-->
<!--                              <option value="0">January</option>-->
<!--                              <option value="1">February</option>-->
<!--                              <option value="2">March</option>-->
<!--                              <option value="3">April</option>-->
<!--                              <option value="4">May</option>-->
<!--                              <option value="5">June</option>-->
<!--                              <option value="6" selected>July</option>-->
<!--                              <option value="7">August</option>-->
<!--                              <option value="8">September</option>-->
<!--                              <option value="9">October</option>-->
<!--                              <option value="10">November</option>-->
<!--                              <option value="11">December</option>-->
<!--                            </select>-->
<!--                          </div>-->

<!--                          <span class="text-gray-800 dark:text-neutral-200">/</span>-->

<!--                          <div class="relative">-->
<!--                            <select data-hs-select='{-->
<!--                                  "placeholder": "Select year",-->
<!--                                  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                                  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",-->
<!--                                  "dropdownClasses": "mt-2 z-50 w-20 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",-->
<!--                                  "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",-->
<!--                                  "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                                }' class="hidden">-->
<!--                              <option selected>2023</option>-->
<!--                              <option>2024</option>-->
<!--                              <option>2025</option>-->
<!--                              <option>2026</option>-->
<!--                              <option>2027</option>-->
<!--                            </select>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                        &lt;!&ndash; End Month / Year &ndash;&gt;-->

<!--                        &lt;!&ndash; Next Button &ndash;&gt;-->
<!--                        <div class="col-span-1 flex justify-end">-->
<!--                          <button type="button" class=" size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-label="Next">-->
<!--                            <svg class="shrink-0 size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                              <path d="m9 18 6-6-6-6" />-->
<!--                            </svg>-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        &lt;!&ndash; End Next Button &ndash;&gt;-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Months &ndash;&gt;-->

<!--                      &lt;!&ndash; Weeks &ndash;&gt;-->
<!--                      <div class="flex pb-1.5">-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                          Mo-->
<!--                        </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                          Tu-->
<!--                        </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                          We-->
<!--                        </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                          Th-->
<!--                        </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                          Fr-->
<!--                        </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                          Sa-->
<!--                        </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                          Su-->
<!--                        </span>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Weeks &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                            26-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                            27-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                            28-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                            29-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                            30-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            1-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            2-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            3-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            4-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            5-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            6-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            7-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            8-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            9-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            10-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            11-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            12-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            13-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            14-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            15-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            16-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            17-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            18-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            19-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center bg-blue-600 border border-transparent text-sm font-medium text-white hover:border-blue-600 rounded-full dark:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:border-neutral-700">-->
<!--                            20-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            21-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            22-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            23-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            24-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            25-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            26-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            27-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            28-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            29-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            30-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            31-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            1-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            2-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            3-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            4-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            5-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            6-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Calendar Dropdown &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Header &ndash;&gt;-->

<!--              &lt;!&ndash; Stats Grid &ndash;&gt;-->
<!--              <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">-->
<!--                &lt;!&ndash; Card &ndash;&gt;-->
<!--                <div class="p-4 flex flex-col border border-gray-200 rounded-xl dark:border-neutral-700">-->
<!--                  <h2 class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                    In-store sales-->
<!--                  </h2>-->

<!--                  <div class="flex items-center gap-x-1.5">-->
<!--                    <p class="text-xl font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                      $287,390-->
<!--                    </p>-->
<!--                    <span class="inline-flex items-center gap-x-1 text-sm text-red-600 rounded-full dark:text-red-500">-->
<!--                      4.9%-->
<!--                      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <polyline points="22 17 13.5 8.5 8.5 13.5 2 7" />-->
<!--                        <polyline points="16 17 22 17 22 11" />-->
<!--                      </svg>-->
<!--                    </span>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Card &ndash;&gt;-->

<!--                &lt;!&ndash; Card &ndash;&gt;-->
<!--                <div class="p-4 flex flex-col border border-gray-200 rounded-xl dark:border-neutral-700">-->
<!--                  <h2 class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                    Website sales-->
<!--                  </h2>-->

<!--                  <div class="flex items-center gap-x-1.5">-->
<!--                    <p class="text-xl font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                      $75,990-->
<!--                    </p>-->
<!--                    <span class="inline-flex items-center gap-x-1 text-sm text-teal-600 rounded-full dark:text-teal-500">-->
<!--                      25.8%-->
<!--                      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />-->
<!--                        <polyline points="16 7 22 7 22 13" />-->
<!--                      </svg>-->
<!--                    </span>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Card &ndash;&gt;-->

<!--                &lt;!&ndash; Card &ndash;&gt;-->
<!--                <div class="p-4 flex flex-col border border-gray-200 rounded-xl dark:border-neutral-700">-->
<!--                  <h2 class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                    Discount-->
<!--                  </h2>-->

<!--                  <div class="flex items-center gap-x-1.5">-->
<!--                    <p class="text-xl font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                      $68,307-->
<!--                    </p>-->
<!--                    <span class="inline-flex items-center gap-x-1 text-sm text-teal-600 rounded-full dark:text-teal-500">-->
<!--                      90.3%-->
<!--                      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />-->
<!--                        <polyline points="16 7 22 7 22 13" />-->
<!--                      </svg>-->
<!--                    </span>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Card &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Stats Grid &ndash;&gt;-->

<!--              &lt;!&ndash; Progress &ndash;&gt;-->
<!--              <div class="my-4">-->
<!--                &lt;!&ndash; Header &ndash;&gt;-->
<!--                <div class="mb-3">-->
<!--                  <h4 class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                    Monthly closed sales-->
<!--                  </h4>-->
<!--                  <span class="block text-xl font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                    $45,302-->
<!--                  </span>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Header &ndash;&gt;-->

<!--                &lt;!&ndash; Legend Indicator &ndash;&gt;-->
<!--                <div class="mb-1 flex justify-between items-center">-->
<!--                  <div class="inline-flex items-center w-1/4">-->
<!--                    <span class="hidden sm:inline-block shrink-0 size-2.5 bg-red-500 rounded-sm me-1.5"></span>-->
<!--                    <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                      Bad-->
<!--                    </span>-->
<!--                  </div>-->
<!--                  <div class="inline-flex items-center w-1/4">-->
<!--                    <span class="hidden sm:inline-block shrink-0 size-2.5 bg-orange-500 rounded-sm me-1.5"></span>-->
<!--                    <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                      Average-->
<!--                    </span>-->
<!--                  </div>-->
<!--                  <div class="inline-flex items-center w-1/4">-->
<!--                    <span class="hidden sm:inline-block shrink-0 size-2.5 bg-yellow-200 rounded-sm me-1.5"></span>-->
<!--                    <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                      Good-->
<!--                    </span>-->
<!--                  </div>-->
<!--                  <div class="inline-flex items-center w-1/4">-->
<!--                    <span class="hidden sm:inline-block shrink-0 size-2.5 bg-teal-400 rounded-sm me-1.5"></span>-->
<!--                    <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                      Excellent-->
<!--                    </span>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Legend Indicator &ndash;&gt;-->

<!--                &lt;!&ndash; Progress &ndash;&gt;-->
<!--                <div class="relative">-->
<!--                  <div class="flex w-full h-2.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700">-->
<!--                    <div class="flex flex-col justify-center overflow-hidden bg-gradient-to-r from-red-500 via-yellow-400 to-teal-400 text-xs text-white text-center whitespace-nowrap w-full" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                  <div class="absolute top-1/2 start-[38%] w-2 h-5 bg-orange-500 border-2 border-white rounded-full transform -translate-y-1/2 dark:border-neutral-800"></div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Progress &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Progress &ndash;&gt;-->
<!--            </div>-->
            <!-- End Sales Card -->

            <!-- Projects Card -->
            <div class="flex flex-col bg-white border border-gray-200 rounded-xl shadow-sm xl:shadow-none dark:bg-neutral-800 dark:border-neutral-700">
              <!-- Header -->
              <div class="p-5 pb-2 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">
                  Projects
                </h2>

                <!-- Form Group -->
                <div class="flex sm:justify-end items-center gap-x-2">
                  <!-- Search Input -->
                  <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3">
                      <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                      </svg>
                    </div>
                    <input type="text" class="py-1.5 px-8 w-40 sm:w-full block bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600" placeholder="Search">
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

                  <!-- Button -->
                  <button type="button" class="p-2 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-overlay="#hs-pro-dasadpm">
                    <svg class="hidden sm:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M5 12h14" />
                      <path d="M12 5v14" />
                    </svg>
                    Add project
                  </button>
                  <!-- End Button -->
                </div>
                <!-- End Form Group -->
              </div>
              <!-- End Header -->

              <!-- Nav Tab -->
              <div class="px-5">
                <!-- Nav Tab -->
                <nav class="relative  flex space-x-1 after:absolute after:bottom-0 after:inset-x-0 after:border-b-2 after:border-gray-200 dark:after:border-neutral-700" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                  <button type="button" class="hs-tab-active:after:bg-gray-800 hs-tab-active:text-gray-800 px-2.5 py-1.5 mb-2 relative inline-flex justify-center items-center gap-x-2  hover:bg-gray-100 text-gray-500 hover:text-gray-800 text-sm rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 after:absolute after:-bottom-2 after:inset-x-0 after:z-10 after:h-0.5 after:pointer-events-none dark:hs-tab-active:text-neutral-200 dark:hs-tab-active:after:bg-neutral-400 dark:text-neutral-500 dark:hover:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 active " id="hs-pro-tabs-dupmp-item-open" aria-selected="true" data-hs-tab="#hs-pro-tabs-dupmp-open" aria-controls="hs-pro-tabs-dupmp-open" role="tab">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                      <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                      <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                    </svg>4 Open
                  </button>
                  <button type="button" class="hs-tab-active:after:bg-gray-800 hs-tab-active:text-gray-800 px-2.5 py-1.5 mb-2 relative inline-flex justify-center items-center gap-x-2  hover:bg-gray-100 text-gray-500 hover:text-gray-800 text-sm rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 after:absolute after:-bottom-2 after:inset-x-0 after:z-10 after:h-0.5 after:pointer-events-none dark:hs-tab-active:text-neutral-200 dark:hs-tab-active:after:bg-neutral-400 dark:text-neutral-500 dark:hover:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700  " id="hs-pro-tabs-dupmp-item-closed" aria-selected="false" data-hs-tab="#hs-pro-tabs-dupmp-closed" aria-controls="hs-pro-tabs-dupmp-closed" role="tab">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                      <rect width="20" height="5" x="2" y="4" rx="2" />
                      <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />
                      <path d="M10 13h4" />
                    </svg>0 Closed
                  </button>
                </nav>
                <!-- End Nav Tab -->
              </div>
              <!-- End Nav Tab -->

              <!-- Tab Content -->
              <div>
                <!-- Tab Content -->
                <div id="hs-pro-tabs-dupmp-open" role="tabpanel" class="block " aria-labelledby="hs-pro-tabs-dupmp-item-open">
                  <!-- List Group -->
                  <ul class="py-2 px-5">
                    <!-- List Item -->
                    <li class="py-3 border-b last:border-b-0 border-gray-200 dark:border-neutral-700">
                      <div class="flex gap-x-3">
                        <span class="mt-1 flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                          <svg class="shrink-0 size-5" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25.3586 7.57888L17.7797 6.7368L8.5165 7.57888L7.67426 16L8.51634 24.4211L16.9375 25.4738L25.3586 24.4211L26.2007 15.7896L25.3586 7.57888Z" fill="white" />
                            <path d="M11.9712 20.6442C11.3417 20.2189 10.9059 19.5979 10.668 18.7768L12.1291 18.1747C12.2617 18.68 12.4932 19.0715 12.8238 19.3494C13.1523 19.6274 13.5523 19.7642 14.0196 19.7642C14.4976 19.7642 14.9081 19.6189 15.2512 19.3283C15.5942 19.0378 15.767 18.6672 15.767 18.2189C15.767 17.76 15.5859 17.3851 15.2238 17.0947C14.8617 16.8043 14.407 16.6589 13.8638 16.6589H13.0196V15.2126H13.7774C14.2448 15.2126 14.6385 15.0864 14.9585 14.8338C15.2785 14.5811 15.4385 14.2358 15.4385 13.7958C15.4385 13.4043 15.2953 13.0926 15.0091 12.859C14.7228 12.6254 14.3606 12.5075 13.9206 12.5075C13.4912 12.5075 13.15 12.6213 12.8974 12.8507C12.6448 13.0802 12.4616 13.3622 12.3459 13.6949L10.8996 13.0928C11.0912 12.5496 11.4428 12.0696 11.9585 11.6549C12.4744 11.2402 13.1332 11.0317 13.9332 11.0317C14.5248 11.0317 15.0574 11.1454 15.5291 11.3749C16.0006 11.6043 16.3712 11.9222 16.6385 12.3264C16.9059 12.7326 17.0385 13.1875 17.0385 13.6926C17.0385 14.2085 16.9144 14.6442 16.6659 15.0021C16.4174 15.36 16.1121 15.6336 15.75 15.8253V15.9115C16.228 16.1115 16.6174 16.4168 16.9248 16.8274C17.23 17.2379 17.3836 17.7285 17.3836 18.3011C17.3836 18.8738 17.2384 19.3853 16.9478 19.8338C16.6572 20.2822 16.2552 20.6358 15.7457 20.8926C15.2342 21.1494 14.6595 21.28 14.0216 21.28C13.2827 21.2821 12.6006 21.0694 11.9712 20.6442Z" fill="#1A73E8" />
                            <path d="M20.9374 13.3938L19.3416 14.5538L18.5395 13.337L21.4174 11.2611H22.5206V21.0526H20.9374V13.3938Z" fill="#1A73E8" />
                            <path d="M25.3585 32L32.9374 24.4211L29.148 22.737L25.3585 24.4211L23.6744 28.2106L25.3585 32Z" fill="#EA4335" />
                            <path d="M6.83215 28.2106L8.51631 32H25.3584V24.4211H8.51631L6.83215 28.2106Z" fill="#34A853" />
                            <path d="M3.46368 0C2.068 0 0.937439 1.13056 0.937439 2.52624V24.421L4.72688 26.1051L8.51632 24.421V7.57888H25.3584L27.0426 3.78944L25.3586 0H3.46368Z" fill="#4285F4" />
                            <path d="M0.937439 24.4211V29.4738C0.937439 30.8696 2.068 32 3.46368 32H8.51632V24.4211H0.937439Z" fill="#188038" />
                            <path d="M25.3586 7.57888V24.421H32.9375V7.57888L29.148 5.89472L25.3586 7.57888Z" fill="#FBBC04" />
                            <path d="M32.9375 7.57888V2.52624C32.9375 1.1304 31.8069 0 30.4112 0H25.3586V7.57888H32.9375Z" fill="#1967D2" />
                          </svg>
                        </span>
                        <div class="grow">
                          <a class="font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                            Get a complete audit store
                          </a>
                          <p class="text-xs text-gray-500 dark:text-neutral-500">
                            Updated 5 days ago
                          </p>
                        </div>

                        <!-- Button Group -->
                        <div>
                          <div class="flex border border-gray-200 divide-x divide-gray-200 rounded-lg -space-x-px dark:border-neutral-700 dark:divide-neutral-700">
                            <!-- Copy Project Button Tooltip -->
                            <div class="hs-tooltip inline-block">
                              <button type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-s-md bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                                  <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                                </svg>
                              </button>
                              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                                Copy project
                              </span>
                            </div>
                            <!-- End Copy Project Button Tooltip -->

                            <!-- Close Project Button Tooltip -->
                            <div class="hs-tooltip inline-block">
                              <button type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-e-md bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="20" height="5" x="2" y="4" rx="2" />
                                  <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />
                                  <path d="M10 13h4" />
                                </svg>
                              </button>
                              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                                Close project
                              </span>
                            </div>
                            <!-- End Close Project Button Tooltip -->
                          </div>
                        </div>
                        <!-- End Button Group -->
                      </div>
                    </li>
                    <!-- End List Item -->

                    <!-- List Item -->
                    <li class="py-3 border-b last:border-b-0 border-gray-200 dark:border-neutral-700">
                      <div class="flex gap-x-3">
                        <span class="mt-1 flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                          <svg class="shrink-0 size-5" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.0355 1.75926C10.6408 1.75926 5.30597 1.49951 0.0111241 1C-0.288584 7.23394 5.50578 13.1282 12.7987 14.5668L13.9975 14.7266C14.3372 12.4289 15.9956 3.7773 16.595 1.73928C16.4152 1.75926 16.2353 1.75926 16.0355 1.75926Z" fill="#A49DFF" />
                            <path d="M16.615 1.75926C16.615 1.75926 25.2266 7.9932 28.5234 16.3451C30.0419 11.3499 31.1608 6.15498 32 1C26.8051 1.49951 21.71 1.75926 16.615 1.75926Z" fill="#28289A" />
                            <path d="M13.9975 14.7466L13.8177 15.9455C13.8177 15.9455 12.2592 28.4133 23.1886 31.9699C25.2266 26.8748 27.0049 21.6599 28.5234 16.3251C21.9698 15.8456 13.9975 14.7466 13.9975 14.7466Z" fill="#5ADCEE" />
                            <path d="M16.6149 1.75927C16.0155 3.79729 14.3571 12.4089 14.0175 14.7466C14.0175 14.7466 21.9897 15.8456 28.5233 16.3251C25.1866 7.9932 16.6149 1.75927 16.6149 1.75927Z" fill="#7878FF" />
                          </svg>
                        </span>
                        <div class="grow">
                          <a class="font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                            Build stronger customer relationships
                          </a>
                          <p class="text-xs text-gray-500 dark:text-neutral-500">
                            Updated 2 months ago
                          </p>
                        </div>

                        <!-- Button Group -->
                        <div>
                          <div class="flex border border-gray-200 divide-x divide-gray-200 rounded-lg -space-x-px dark:border-neutral-700 dark:divide-neutral-700">
                            <!-- Copy Project Button Tooltip -->
                            <div class="hs-tooltip inline-block">
                              <button type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-s-md bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                                  <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                                </svg>
                              </button>
                              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                                Copy project
                              </span>
                            </div>
                            <!-- End Copy Project Button Tooltip -->

                            <!-- Close Project Button Tooltip -->
                            <div class="hs-tooltip inline-block">
                              <button type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-e-md bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="20" height="5" x="2" y="4" rx="2" />
                                  <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />
                                  <path d="M10 13h4" />
                                </svg>
                              </button>
                              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                                Close project
                              </span>
                            </div>
                            <!-- End Close Project Button Tooltip -->
                          </div>
                        </div>
                        <!-- End Button Group -->
                      </div>
                    </li>
                    <!-- End List Item -->

                    <!-- List Item -->
                    <li class="py-3 border-b last:border-b-0 border-gray-200 dark:border-neutral-700">
                      <div class="flex gap-x-3">
                        <span class="mt-1 flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                            <path d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                          </svg>
                        </span>
                        <div class="grow">
                          <a class="font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                            James’ UI/UX project
                          </a>
                          <p class="text-xs text-gray-500 dark:text-neutral-500">
                            Updated 3 hours ago
                          </p>
                        </div>

                        <!-- Button Group -->
                        <div>
                          <div class="flex border border-gray-200 divide-x divide-gray-200 rounded-lg -space-x-px dark:border-neutral-700 dark:divide-neutral-700">
                            <!-- Copy Project Button Tooltip -->
                            <div class="hs-tooltip inline-block">
                              <button type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-s-md bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                                  <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                                </svg>
                              </button>
                              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                                Copy project
                              </span>
                            </div>
                            <!-- End Copy Project Button Tooltip -->

                            <!-- Close Project Button Tooltip -->
                            <div class="hs-tooltip inline-block">
                              <button type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-e-md bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="20" height="5" x="2" y="4" rx="2" />
                                  <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />
                                  <path d="M10 13h4" />
                                </svg>
                              </button>
                              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                                Close project
                              </span>
                            </div>
                            <!-- End Close Project Button Tooltip -->
                          </div>
                        </div>
                        <!-- End Button Group -->
                      </div>
                    </li>
                    <!-- End List Item -->

                    <!-- List Item -->
                    <li class="py-3 border-b last:border-b-0 border-gray-200 dark:border-neutral-700">
                      <div class="flex gap-x-3">
                        <span class="mt-1 flex shrink-0 justify-center items-center size-[38px] bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">
                          <svg class="shrink-0 size-5" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 16C13.8 16 12 14.2 12 12C12 9.8 13.78 8 16 8C18.2 8 20 9.78 20 12C20 14.22 18.22 16 16 16ZM16 0C9.38 0 4 5.38 4 12C4 18.64 9.38 24 16 24C22.62 24 28 18.64 28 12.02C28 12.02 28 12.02 28 12C28 5.38 22.64 0 16 0Z" fill="#5C54FF" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 24C5.8 24 4 25.78 4 28C4 30.2 5.78 32 8 32C10.2 32 12 30.22 12 28C12 25.78 10.22 24 8 24Z" fill="#5C54FF" />
                          </svg>
                        </span>
                        <div class="grow">
                          <a class="font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500" href="#">
                            Tailwind CSS
                          </a>
                          <p class="text-xs text-gray-500 dark:text-neutral-500">
                            Updated 45 minutes ago
                          </p>
                        </div>

                        <!-- Button Group -->
                        <div>
                          <div class="flex border border-gray-200 divide-x divide-gray-200 rounded-lg -space-x-px dark:border-neutral-700 dark:divide-neutral-700">
                            <!-- Copy Project Button Tooltip -->
                            <div class="hs-tooltip inline-block">
                              <button type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-s-md bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="14" height="14" x="8" y="8" rx="2" ry="2" />
                                  <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2" />
                                </svg>
                              </button>
                              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                                Copy project
                              </span>
                            </div>
                            <!-- End Copy Project Button Tooltip -->

                            <!-- Close Project Button Tooltip -->
                            <div class="hs-tooltip inline-block">
                              <button type="button" class="hs-tooltip-toggle size-[38px] inline-flex justify-center items-center gap-x-2 rounded-e-md bg-white text-gray-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:text-neutral-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="20" height="5" x="2" y="4" rx="2" />
                                  <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />
                                  <path d="M10 13h4" />
                                </svg>
                              </button>
                              <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                                Close project
                              </span>
                            </div>
                            <!-- End Close Project Button Tooltip -->
                          </div>
                        </div>
                        <!-- End Button Group -->
                      </div>
                    </li>
                    <!-- End List Item -->
                  </ul>
                  <!-- End List Group -->

                  <!-- Footer -->
                  <div class="text-center border-t border-gray-200 dark:border-neutral-700">
                    <a class="p-3 flex justify-center items-center gap-x-1 text-sm text-blue-600 font-medium rounded-b-lg hover:text-blue-700 focus:outline-none focus:bg-gray-100 dark:text-blue-500 dark:hover:text-blue-600 dark:focus:bg-neutral-700" href="#">
                      View all projects
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6" />
                      </svg>
                    </a>
                  </div>
                  <!-- End Footer -->
                </div>
                <!-- Tab Content -->

                <!-- Tab Content -->
                <div id="hs-pro-tabs-dupmp-closed" role="tabpanel" class="hidden " aria-labelledby="hs-pro-tabs-dupmp-item-closed">
                  <!-- Empty State -->
                  <div class="p-5 min-h-[328px]  flex flex-col justify-center items-center text-center">
                    <svg class="w-48 mx-auto mb-4" width="178" height="90" viewBox="0 0 178 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="27" y="50.5" width="124" height="39" rx="7.5" fill="currentColor" class="fill-white dark:fill-neutral-800" />
                      <rect x="27" y="50.5" width="124" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-50 dark:stroke-neutral-700/10" />
                      <rect x="34.5" y="58" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />
                      <rect x="66.5" y="61" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />
                      <rect x="66.5" y="73" width="77" height="6" rx="3" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />
                      <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" fill="currentColor" class="fill-white dark:fill-neutral-800" />
                      <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-100 dark:stroke-neutral-700/30" />
                      <rect x="27" y="36" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />
                      <rect x="59" y="39" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />
                      <rect x="59" y="51" width="92" height="6" rx="3" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />
                      <g filter="url(#filter13)">
                        <rect x="12" y="6" width="154" height="40" rx="8" fill="currentColor" class="fill-white dark:fill-neutral-800" shape-rendering="crispEdges" />
                        <rect x="12.5" y="6.5" width="153" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-100 dark:stroke-neutral-700/60" shape-rendering="crispEdges" />
                        <rect x="20" y="14" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700 " />
                        <rect x="52" y="17" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700" />
                        <rect x="52" y="29" width="106" height="6" rx="3" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700" />
                      </g>
                      <defs>
                        <filter id="filter13" x="0" y="0" width="178" height="64" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                          <feFlood flood-opacity="0" result="BackgroundImageFix" />
                          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                          <feOffset dy="6" />
                          <feGaussianBlur stdDeviation="6" />
                          <feComposite in2="hardAlpha" operator="out" />
                          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0" />
                          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1187_14810" />
                          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1187_14810" result="shape" />
                        </filter>
                      </defs>
                    </svg>

                    <div class="max-w-sm mx-auto">
                      <p class="mt-2 font-medium text-gray-800 dark:text-neutral-200">
                        No closed projects
                      </p>
                      <p class="mb-5 text-sm text-gray-500 dark:text-neutral-500">

                      </p>
                    </div>
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-overlay="#hs-pro-dasadpm">
                      <svg class="hidden sm:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                      </svg>Add project
                    </button>
                  </div>
                  <!-- End Empty State -->
                </div>
                <!-- Tab Content -->
              </div>
              <!-- Tab Content -->
            </div>
            <!-- End Projects Card -->

            <!-- Events Card -->
<!--            <div class="flex flex-col bg-white border border-gray-200 rounded-xl shadow-sm xl:shadow-none dark:bg-neutral-800 dark:border-neutral-700">-->
<!--              &lt;!&ndash; Header &ndash;&gt;-->
<!--              <div class="p-5 pb-0 flex justify-between items-center gap-2">-->
<!--                <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                  Events-->
<!--                </h2>-->

<!--                &lt;!&ndash; Form Group &ndash;&gt;-->
<!--                <div class="flex sm:justify-end items-center gap-x-2">-->
<!--                  &lt;!&ndash; Button &ndash;&gt;-->
<!--                  <button type="button" class="p-2 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-overlay="#hs-pro-daem">-->
<!--                    <svg class="hidden sm:block shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="M5 12h14" />-->
<!--                      <path d="M12 5v14" />-->
<!--                    </svg>-->
<!--                    Add event-->
<!--                  </button>-->
<!--                  &lt;!&ndash; End Button &ndash;&gt;-->
<!--                </div>-->
<!--                &lt;!&ndash; End Form Group &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Header &ndash;&gt;-->

<!--              &lt;!&ndash; Body &ndash;&gt;-->
<!--              <div class="p-5">-->
<!--                <h2 class="text-sm font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                  March 29, 2023-->
<!--                </h2>-->

<!--                &lt;!&ndash; Weekly Calendar &ndash;&gt;-->
<!--                <div class="mt-2 p-1 flex justify-between items-center gap-x-0.5 sm:gap-x-1 bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">-->
<!--                  <button type="button" class="min-w-8 h-12 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-500/10 dark:text-neutral-400 dark:focus:bg-neutral-700">-->
<!--                    <svg class="shrink-0 size-5 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="m15 18-6-6 6-6" />-->
<!--                    </svg>-->
<!--                  </button>-->
<!--                  <button type="button" class="w-full h-12 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-500/10 dark:text-neutral-400 dark:focus:bg-neutral-700" disabled>-->
<!--                    <span class="block">Mon</span>-->
<!--                    <span class="block">27</span>-->
<!--                  </button>-->
<!--                  <button type="button" class="w-full h-12 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-500/10 dark:text-neutral-400 dark:focus:bg-neutral-700">-->
<!--                    <span class="block">Tue</span>-->
<!--                    <span class="block">2</span>-->
<!--                  </button>-->
<!--                  <button type="button" class="w-full h-12 text-sm text-blue-600 rounded-lg bg-blue-100 focus:outline-none focus:bg-blue-200 dark:bg-blue-500/10 dark:text-blue-500 dark:focus:bg-blue-500/20">-->
<!--                    <span class="block">Wed</span>-->
<!--                    <span class="block font-semibold">29</span>-->
<!--                  </button>-->
<!--                  <button type="button" class="w-full h-12 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-500/10 dark:text-neutral-400 dark:focus:bg-neutral-700">-->
<!--                    <span class="block">Thu</span>-->
<!--                    <span class="block">30</span>-->
<!--                  </button>-->
<!--                  <button type="button" class="hidden sm:block w-full h-12 text-sm text-gray-500 rounded-lg hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-500/10 dark:text-neutral-400 dark:focus:bg-neutral-700">-->
<!--                    <span class="block">Fri</span>-->
<!--                    <span class="block">31</span>-->
<!--                  </button>-->
<!--                  <button type="button" class="hidden sm:block w-full h-12 text-sm text-gray-500 rounded-lg hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-500/10 dark:text-neutral-400 dark:focus:bg-neutral-700">-->
<!--                    <span class="block">Sat</span>-->
<!--                    <span class="block">1</span>-->
<!--                  </button>-->
<!--                  <button type="button" class="hidden sm:block w-full h-12 text-sm text-gray-500 rounded-lg hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:bg-neutral-500/10 dark:text-neutral-400 dark:focus:bg-neutral-700">-->
<!--                    <span class="block">Sun</span>-->
<!--                    <span class="block">2</span>-->
<!--                  </button>-->
<!--                  <button type="button" class="min-w-8 h-12 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-neutral-500/10 dark:text-neutral-400 dark:focus:bg-neutral-700">-->
<!--                    <svg class="shrink-0 size-5 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="m9 18 6-6-6-6" />-->
<!--                    </svg>-->
<!--                  </button>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Weekly Calendar &ndash;&gt;-->

<!--                <div class="mt-5">-->
<!--                  &lt;!&ndash; Events List Group &ndash;&gt;-->
<!--                  <ul class="flex flex-col bg-white border border-gray-200 rounded-xl -space-y-px dark:bg-neutral-800 dark:border-neutral-700">-->
<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="border-t border-gray-200 first:border-t-0 dark:border-neutral-700">-->
<!--                      <div class="p-3 ps-0 flex flex-col sm:flex-row sm:items-center gap-y-2 sm:gap-y-0 sm:gap-x-3">-->
<!--                        <div class="sm:order-2 sm:ms-auto ps-3 sm:ps-0">-->
<!--                          <button type="button" class="py-1.5 px-2 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                            Attending-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="sm:order-1">-->
<!--                          <button type="button" class="ps-[13px] -ms-px group block text-start border-s-[3px] border-red-500 focus:outline-none" data-hs-overlay="#hs-pro-deem">-->
<!--                            <span class="block text-start text-sm font-medium text-gray-800 group-hover:text-blue-600 group-focus:text-blue-600 dark:group-hover:text-blue-500 dark:group-focus:text-blue-500 dark:text-neutral-200">-->
<!--                              12:30 PM - 14:00 PM-->
<!--                            </span>-->
<!--                            <span class="block text-sm text-gray-600 dark:text-neutral-400">-->
<!--                              Project onboarding with new teammates-->
<!--                            </span>-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->

<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="border-t border-gray-200 first:border-t-0 dark:border-neutral-700">-->
<!--                      <div class="p-3 flex items-center gap-x-3">-->
<!--                        <div class="flex items-center gap-x-2">-->
<!--                          <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                            <path d="m21.44 11.05-9.19 9.19a6 6 0 0 1-8.49-8.49l8.57-8.57A4 4 0 1 1 18 8.84l-8.59 8.57a2 2 0 0 1-2.83-2.83l8.49-8.48" />-->
<!--                          </svg>-->
<!--                          <p class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                            3 files attached-->
<!--                          </p>-->
<!--                        </div>-->
<!--                        <div class="ms-auto">-->
<!--                          <div class="flex -space-x-px">-->
<!--                            <button type="button" class="flex justify-center items-center size-7 text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium first:rounded-s-full last:rounded-e-full shadow-sm align-middle hover:bg-gray-50 disabled:opacity-40 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                              <svg class="shrink-0 size-3.5" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                <path d="M20.0324 1.91994H9.45071C9.09999 1.91994 8.76367 2.05926 8.51567 2.30725C8.26767 2.55523 8.12839 2.89158 8.12839 3.24228V8.86395L20.0324 15.8079L25.9844 18.3197L31.9364 15.8079V8.86395L20.0324 1.91994Z" fill="#21A366" />-->
<!--                                <path d="M8.12839 8.86395H20.0324V15.8079H8.12839V8.86395Z" fill="#107C41" />-->
<!--                                <path d="M30.614 1.91994H20.0324V8.86395H31.9364V3.24228C31.9364 2.89158 31.7971 2.55523 31.5491 2.30725C31.3011 2.05926 30.9647 1.91994 30.614 1.91994Z" fill="#33C481" />-->
<!--                                <path d="M20.0324 15.8079H8.12839V28.3736C8.12839 28.7243 8.26767 29.0607 8.51567 29.3087C8.76367 29.5567 9.09999 29.6959 9.45071 29.6959H30.6141C30.9647 29.6959 31.3011 29.5567 31.549 29.3087C31.797 29.0607 31.9364 28.7243 31.9364 28.3736V22.7519L20.0324 15.8079Z" fill="#185C37" />-->
<!--                                <path d="M20.0324 15.8079H31.9364V22.7519H20.0324V15.8079Z" fill="#107C41" />-->
<!--                                <path opacity="0.1" d="M16.7261 6.87994H8.12839V25.7279H16.7261C17.0764 25.7269 17.4121 25.5872 17.6599 25.3395C17.9077 25.0917 18.0473 24.756 18.0484 24.4056V8.20226C18.0473 7.8519 17.9077 7.51616 17.6599 7.2684C17.4121 7.02064 17.0764 6.88099 16.7261 6.87994Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                                <path opacity="0.2" d="M15.7341 7.87194H8.12839V26.7199H15.7341C16.0844 26.7189 16.4201 26.5792 16.6679 26.3315C16.9157 26.0837 17.0553 25.748 17.0564 25.3976V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                                <path opacity="0.2" d="M15.7341 7.87194H8.12839V24.7359H15.7341C16.0844 24.7349 16.4201 24.5952 16.6679 24.3475C16.9157 24.0997 17.0553 23.764 17.0564 23.4136V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                                <path opacity="0.2" d="M14.7421 7.87194H8.12839V24.7359H14.7421C15.0924 24.7349 15.4281 24.5952 15.6759 24.3475C15.9237 24.0997 16.0633 23.764 16.0644 23.4136V9.19426C16.0633 8.84386 15.9237 8.50818 15.6759 8.26042C15.4281 8.01266 15.0924 7.87299 14.7421 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                                <path d="M1.51472 7.87194H14.7421C15.0927 7.87194 15.4291 8.01122 15.6771 8.25922C15.925 8.50722 16.0644 8.84354 16.0644 9.19426V22.4216C16.0644 22.7723 15.925 23.1087 15.6771 23.3567C15.4291 23.6047 15.0927 23.7439 14.7421 23.7439H1.51472C1.16402 23.7439 0.827672 23.6047 0.579686 23.3567C0.3317 23.1087 0.192383 22.7723 0.192383 22.4216V9.19426C0.192383 8.84354 0.3317 8.50722 0.579686 8.25922C0.827672 8.01122 1.16402 7.87194 1.51472 7.87194Z" fill="#107C41" />-->
<!--                                <path d="M3.69711 20.7679L6.90722 15.794L3.96694 10.8479H6.33286L7.93791 14.0095C8.08536 14.3091 8.18688 14.5326 8.24248 14.68H8.26328C8.36912 14.4407 8.47984 14.2079 8.5956 13.9817L10.3108 10.8479H12.4822L9.46656 15.7663L12.5586 20.7679H10.2473L8.3932 17.2959C8.30592 17.148 8.23184 16.9927 8.172 16.8317H8.14424C8.09016 16.9891 8.01824 17.1399 7.92998 17.2811L6.02236 20.7679H3.69711Z" fill="white" />-->
<!--                              </svg>-->
<!--                            </button>-->
<!--                            <button type="button" class="flex justify-center items-center size-7 text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium first:rounded-s-full last:rounded-e-full shadow-sm align-middle hover:bg-gray-50 disabled:opacity-40 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                              <svg class="shrink-0 size-3.5" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                <path d="M11.7438 0.940745C6.84695 1.30308 2.6841 1.63631 2.48837 1.67533C1.9396 1.77319 1.44038 2.14544 1.20563 2.63537L1 3.06646L1.01982 13.3407L1.04893 23.615L1.36234 24.2517C1.53886 24.6042 2.73365 26.2499 4.0362 27.9439C6.61221 31.2836 6.79802 31.47 7.77726 31.5679C8.06156 31.597 10.1966 31.4991 12.5081 31.3622C14.8295 31.2154 18.5508 30.99 20.7842 30.863C30.3233 30.2839 29.8334 30.3328 30.3815 29.8627C31.0672 29.2947 31.0183 30.2251 31.0474 17.7377C31.0672 7.15003 31.0573 6.45509 30.9006 6.13177C30.7148 5.76943 30.3815 5.51487 26.0329 2.45885C23.1243 0.421704 22.9186 0.313932 21.6155 0.294111C21.0772 0.274911 16.6307 0.568497 11.7438 0.940745ZM22.752 2.28232C23.1633 2.46814 26.1704 4.56412 26.6108 4.9661C26.7284 5.08378 26.7675 5.18164 26.7086 5.24048C26.5717 5.35817 7.96245 6.465 7.42421 6.38634C7.17956 6.34732 6.81722 6.20052 6.61159 6.06302C5.75932 5.48514 3.64413 3.75149 3.64413 3.62452C3.64413 3.29129 3.57538 3.29129 11.8714 2.69421C13.4582 2.58644 16.0633 2.39071 17.6502 2.26312C21.0871 1.98874 22.1159 1.99865 22.752 2.28232ZM28.6677 7.63996C28.8046 7.77685 28.9223 8.04132 28.9613 8.29589C28.9904 8.53125 29.0102 12.9189 28.9904 18.0313C28.9613 26.8067 28.9514 27.3555 28.7848 27.61C28.6869 27.7667 28.4912 27.9333 28.3438 27.9823C27.9331 28.1489 8.43318 29.2557 8.03183 29.138C7.84601 29.0891 7.59083 28.9324 7.45394 28.7955L7.21858 28.541L7.18947 19.0799C7.16965 12.4395 7.18947 9.5012 7.26813 9.23672C7.32697 9.041 7.47376 8.80564 7.60136 8.72759C7.77788 8.60991 8.93364 8.51205 12.9101 8.2773C15.7016 8.1206 20.0206 7.85613 22.4987 7.70933C28.3933 7.34638 28.3741 7.34638 28.6677 7.63996Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                                <path d="M23.4277 10.8818C22.3698 10.9506 21.4296 11.0484 21.3218 11.1073C20.9985 11.2739 20.8028 11.5483 20.7638 11.8617C20.7347 12.185 20.8325 12.224 21.8898 12.3516L22.35 12.4104V16.5925C22.35 19.0799 22.311 20.7256 22.2621 20.6767C22.2131 20.6178 20.8226 18.5027 19.167 15.9756C17.512 13.4392 16.1407 11.3525 16.1209 11.3333C16.1011 11.3135 15.024 11.3724 13.7313 11.4609C12.1445 11.5687 11.273 11.6666 11.0965 11.7644C10.8122 11.9112 10.4988 12.4303 10.4988 12.7734C10.4988 12.979 10.871 13.0868 11.6545 13.0868H12.0658V25.1139L11.4 25.3196C10.8809 25.4763 10.7044 25.5741 10.6165 25.7698C10.4598 26.1031 10.4697 26.4066 10.6264 26.4066C10.6852 26.4066 11.792 26.3378 13.0649 26.2598C15.582 26.113 15.8657 26.0442 16.1302 25.5252C16.2088 25.3685 16.277 25.2019 16.277 25.1529C16.277 25.1139 15.9345 24.9962 15.5226 24.8984C15.1014 24.8005 14.6802 24.7027 14.5923 24.6828C14.4257 24.6339 14.4157 24.3304 14.4157 20.1186V15.6033L17.3931 20.2753C20.5173 25.1721 20.9093 25.7308 21.3893 25.9755C21.987 26.2889 23.5051 26.0733 24.2688 25.5741L24.5042 25.4273L24.524 18.7479L24.5531 12.0586L25.0722 11.9608C25.6891 11.8431 25.9734 11.5594 25.9734 11.0695C25.9734 10.7561 25.9536 10.7362 25.66 10.7462C25.4847 10.7542 24.4757 10.813 23.4277 10.8818Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                              </svg>-->
<!--                            </button>-->
<!--                            <button type="button" class="flex justify-center items-center size-7 text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium first:rounded-s-full last:rounded-e-full shadow-sm align-middle hover:bg-gray-50 disabled:opacity-40 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                              <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />-->
<!--                                <polyline points="7 10 12 15 17 10" />-->
<!--                                <line x1="12" x2="12" y1="15" y2="3" />-->
<!--                              </svg>-->
<!--                            </button>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->

<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="border-t border-gray-200 first:border-t-0 dark:border-neutral-700">-->
<!--                      <div class="p-3 flex items-center gap-x-3">-->
<!--                        <h4 class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                          Attendees-->
<!--                        </h4>-->
<!--                        <div class="ms-auto">-->
<!--                          <div class="flex items-center -space-x-2">-->
<!--                            <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                            <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">L</span>-->
<!--                            <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                            <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                            <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">L</span>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->
<!--                  </ul>-->
<!--                  &lt;!&ndash; End Events List Group &ndash;&gt;-->
<!--                </div>-->

<!--                <div class="mt-3">-->
<!--                  &lt;!&ndash; Events List Group &ndash;&gt;-->
<!--                  <ul class="flex flex-col bg-white border border-gray-200 rounded-xl -space-y-px dark:bg-neutral-800 dark:border-neutral-700">-->
<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="border-t border-gray-200 first:border-t-0 dark:border-neutral-700">-->
<!--                      <div class="p-3 ps-0 flex flex-col sm:flex-row sm:items-center gap-y-2 sm:gap-y-0 sm:gap-x-3">-->
<!--                        <div class="sm:order-2 sm:ms-auto ps-3 sm:ps-0">-->
<!--                          <button type="button" class="py-1.5 px-2 inline-flex items-center gap-x-1 text-xs rounded-lg border border-blue-600 text-blue-600 hover:border-blue-500 hover:text-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-700 dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400 dark:focus:border-blue-600">-->
<!--                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                              <path d="M5 12h14" />-->
<!--                              <path d="M12 5v14" />-->
<!--                            </svg>-->
<!--                            Attend-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="sm:order-1">-->
<!--                          <button type="button" class="ps-[13px] -ms-px group block text-start border-s-[3px] border-red-500 focus:outline-none" data-hs-overlay="#hs-pro-deem">-->
<!--                            <span class="block text-start text-sm font-medium text-gray-800 group-hover:text-blue-600 group-focus:text-blue-600 dark:group-hover:text-blue-500 dark:group-focus:text-blue-500 dark:text-neutral-200">-->
<!--                              1:00 PM - 3:00 PM-->
<!--                            </span>-->
<!--                            <span class="block text-sm text-gray-600 dark:text-neutral-400">-->
<!--                              Preline update v2.0-->
<!--                            </span>-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->

<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="border-t border-gray-200 first:border-t-0 dark:border-neutral-700">-->
<!--                      <div class="p-3 flex items-center gap-x-3">-->
<!--                        <h4 class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                          Attendees-->
<!--                        </h4>-->
<!--                        <div class="ms-auto">-->
<!--                          <div class="flex items-center -space-x-2">-->
<!--                            <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                            <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                            <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->
<!--                  </ul>-->
<!--                  &lt;!&ndash; End Events List Group &ndash;&gt;-->
<!--                </div>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Body &ndash;&gt;-->
<!--            </div>-->
            <!-- End Events Card -->
          </div>
          <!-- End Content -->
        </div>
        <!-- End Grid -->
      </div>
      <!-- End Projects -->

      <cabinet-profile-event-modals/>
      <cabinet-add-project-modal/>
    </div>
  </div>
  </CabinetLayout>
</template>

<style scoped>

</style>
