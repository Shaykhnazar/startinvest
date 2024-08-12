<script setup>

import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <CabinetLayout>
    <template #header>
      <Head title="Kabinet"/>
    </template>

      <!-- Breadcrumb -->
      <ol class="md:hidden py-3 px-2 sm:px-5 flex items-center whitespace-nowrap">
        <li class="flex items-center text-sm text-stone-600 dark:text-neutral-500">
          Dashboard
          <svg class="shrink-0 overflow-visible size-4 ms-1.5 text-stone-400 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
          </svg>
        </li>
        <li class="ps-1.5 flex items-center font-semibold text-stone-800 dark:text-neutral-200 text-sm">
          Overview
        </li>
      </ol>
      <!-- End Breadcrumb -->

      <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">
        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
          <!-- Browsers Card -->
<!--          <div class="h-full flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">-->
<!--            &lt;!&ndash; Header &ndash;&gt;-->
<!--            <div class="p-5 pb-3 flex justify-between items-center">-->
<!--              <h2 class="ms-1 inline-block font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                Browsers-->
<!--              </h2>-->

<!--              <span class="py-1 ps-1.5 pe-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full bg-white border border-gray-200 text-gray-800 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200">-->
<!--              <svg class="shrink-0 size-3" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
<!--                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />-->
<!--              </svg>-->
<!--              Good-->
<!--            </span>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Header &ndash;&gt;-->

<!--            &lt;!&ndash; Body &ndash;&gt;-->
<!--            <div class="flex flex-col justify-between h-full pb-5 px-5">-->
<!--              <div>-->
<!--                <h4 class="text-5xl md:text-6xl font-medium text-blue-600 dark:text-blue-500">-->
<!--                <span class="bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500 text-transparent">-->
<!--                  85%-->
<!--                </span>-->
<!--                </h4>-->

<!--                <p class="mt-5 text-gray-500 dark:text-neutral-500">-->
<!--                  Visitors are viewing website from the desktop device. 57% of all users are using MacOS-->
<!--                </p>-->
<!--              </div>-->

<!--              &lt;!&ndash; Stats &ndash;&gt;-->
<!--              &lt;!&ndash;            <div class="mt-5">&ndash;&gt;-->
<!--              &lt;!&ndash;              &lt;!&ndash; Grid &ndash;&gt;&ndash;&gt;-->
<!--              &lt;!&ndash;              <div class="grid grid-cols-3 gap-3">&ndash;&gt;-->
<!--              &lt;!&ndash;                &lt;!&ndash; Card &ndash;&gt;&ndash;&gt;-->
<!--              &lt;!&ndash;                <div class="p-3  bg-gray-100 dark:bg-neutral-700 rounded-lg">&ndash;&gt;-->
<!--              &lt;!&ndash;                  <img class="shrink-0 size-6 mb-4" src="../assets/svg/brands/chrome.svg" alt="Chrome Logo">&ndash;&gt;-->
<!--              &lt;!&ndash;                  <p class="text-sm text-gray-800 dark:text-neutral-200">&ndash;&gt;-->
<!--              &lt;!&ndash;                    Chrome&ndash;&gt;-->
<!--              &lt;!&ndash;                  </p>&ndash;&gt;-->
<!--              &lt;!&ndash;                  <p class="font-semibold text-lg text-gray-800 dark:text-neutral-200">&ndash;&gt;-->
<!--              &lt;!&ndash;                    56%&ndash;&gt;-->
<!--              &lt;!&ndash;                  </p>&ndash;&gt;-->
<!--              &lt;!&ndash;                </div>&ndash;&gt;-->
<!--              &lt;!&ndash;                &lt;!&ndash; End Card &ndash;&gt;&ndash;&gt;-->

<!--              &lt;!&ndash;                &lt;!&ndash; Card &ndash;&gt;&ndash;&gt;-->
<!--              &lt;!&ndash;                <div class="p-3  bg-gray-100 dark:bg-neutral-700 rounded-lg">&ndash;&gt;-->
<!--              &lt;!&ndash;                  <img class="shrink-0 size-6 mb-4" src="../assets/svg/brands/firefox.svg" alt="Firefox Logo">&ndash;&gt;-->
<!--              &lt;!&ndash;                  <p class="text-sm text-gray-800 dark:text-neutral-200">&ndash;&gt;-->
<!--              &lt;!&ndash;                    Firefox&ndash;&gt;-->
<!--              &lt;!&ndash;                  </p>&ndash;&gt;-->
<!--              &lt;!&ndash;                  <p class="font-semibold text-lg text-gray-800 dark:text-neutral-200">&ndash;&gt;-->
<!--              &lt;!&ndash;                    24%&ndash;&gt;-->
<!--              &lt;!&ndash;                  </p>&ndash;&gt;-->
<!--              &lt;!&ndash;                </div>&ndash;&gt;-->
<!--              &lt;!&ndash;                &lt;!&ndash; End Card &ndash;&gt;&ndash;&gt;-->

<!--              &lt;!&ndash;                &lt;!&ndash; Card &ndash;&gt;&ndash;&gt;-->
<!--              &lt;!&ndash;                <div class="p-3  bg-gray-100 dark:bg-neutral-700 rounded-lg">&ndash;&gt;-->
<!--              &lt;!&ndash;                  <img class="shrink-0 size-6 mb-4" src="../assets/svg/brands/safari.svg" alt="Safari Logo">&ndash;&gt;-->
<!--              &lt;!&ndash;                  <p class="text-sm text-gray-800 dark:text-neutral-200">&ndash;&gt;-->
<!--              &lt;!&ndash;                    Safari&ndash;&gt;-->
<!--              &lt;!&ndash;                  </p>&ndash;&gt;-->
<!--              &lt;!&ndash;                  <p class="font-semibold text-lg text-gray-800 dark:text-neutral-200">&ndash;&gt;-->
<!--              &lt;!&ndash;                    17%&ndash;&gt;-->
<!--              &lt;!&ndash;                  </p>&ndash;&gt;-->
<!--              &lt;!&ndash;                </div>&ndash;&gt;-->
<!--              &lt;!&ndash;                &lt;!&ndash; End Card &ndash;&gt;&ndash;&gt;-->
<!--              &lt;!&ndash;              </div>&ndash;&gt;-->
<!--              &lt;!&ndash;              &lt;!&ndash; End Grid &ndash;&gt;&ndash;&gt;-->
<!--              &lt;!&ndash;            </div>&ndash;&gt;-->
<!--              &lt;!&ndash; End Stats &ndash;&gt;-->

<!--&lt;!&ndash;              <div class="mt-5">&ndash;&gt;-->
<!--&lt;!&ndash;                &lt;!&ndash; Alert &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                <div class="bg-white border border-gray-200 rounded-xl shadow-sm py-2 px-3 dark:bg-neutral-800 dark:border-neutral-700" role="alert" tabindex="-1" aria-labelledby="hs-pro-dpna-label">&ndash;&gt;-->
<!--&lt;!&ndash;                  <div class="flex gap-x-3">&ndash;&gt;-->
<!--&lt;!&ndash;                    <svg class="mt-1 shrink-0 size-5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">&ndash;&gt;-->
<!--&lt;!&ndash;                      <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />&ndash;&gt;-->
<!--&lt;!&ndash;                      <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />&ndash;&gt;-->
<!--&lt;!&ndash;                    </svg>&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="grow">&ndash;&gt;-->
<!--&lt;!&ndash;                      <h3 id="hs-pro-dpna-label" class="text-sm text-gray-800 font-semibold dark:text-white">&ndash;&gt;-->
<!--&lt;!&ndash;                        Push notifications&ndash;&gt;-->
<!--&lt;!&ndash;                      </h3>&ndash;&gt;-->
<!--&lt;!&ndash;                      <p class="text-sm text-gray-700 dark:text-neutral-400">&ndash;&gt;-->
<!--&lt;!&ndash;                        Automatically send me notifications&ndash;&gt;-->
<!--&lt;!&ndash;                      </p>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->

<!--&lt;!&ndash;                    &lt;!&ndash; Switch/Toggle &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="flex justify-between items-center">&ndash;&gt;-->
<!--&lt;!&ndash;                      <label for="hs-pro-dbcpns" class="sr-only">On</label>&ndash;&gt;-->
<!--&lt;!&ndash;                      <div class="relative inline-block">&ndash;&gt;-->
<!--&lt;!&ndash;                        <input type="checkbox" id="hs-pro-dbcpns" class="relative w-11 h-6 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-neutral-900&ndash;&gt;-->

<!--&lt;!&ndash;                      before:inline-block before:size-5 before:bg-white checked:before:bg-white before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-white" checked>&ndash;&gt;-->
<!--&lt;!&ndash;                      </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    &lt;!&ndash; End Switch/Toggle &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;                  </div>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                &lt;!&ndash; End Alert &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;              </div>&ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Body &ndash;&gt;-->
<!--          </div>-->
          <!-- End Browsers Card -->

          <!-- Import Data Card -->
<!--          <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">-->
<!--            &lt;!&ndash; Header &ndash;&gt;-->
<!--            <div class="p-5 pb-4 grid grid-cols-2 items-center gap-x-4">-->
<!--              <div>-->
<!--                <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                  Referral Traffic-->
<!--                </h2>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->

<!--              <div class="flex justify-end items-center gap-x-1">-->
<!--                &lt;!&ndash; Download Dropdown &ndash;&gt;-->
<!--                <div class="hs-dropdown [&#45;&#45;auto-close:inside] [&#45;&#45;placement:bottom-right] relative inline-flex">-->
<!--                  <button id="hs-pro-dbrrtchdd" type="button" class="size-[34px] inline-flex justify-center items-center gap-x-2 rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />-->
<!--                      <polyline points="7 10 12 15 17 10" />-->
<!--                      <line x1="12" x2="12" y1="15" y2="3" />-->
<!--                    </svg>-->
<!--                  </button>-->

<!--                  &lt;!&ndash; Download Dropdown &ndash;&gt;-->
<!--                  <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-60 transition-[opacity,margin] duration opacity-0 hidden z-20 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dbrrtchdd">-->
<!--                    <div class="p-1">-->
<!--                      <div class="py-2 px-3">-->
<!--                      <span class="block font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                        Download Report-->
<!--                      </span>-->
<!--                        <span class="block text-xs text-gray-500 dark:text-neutral-500">-->
<!--                        Select Options-->
<!--                      </span>-->
<!--                      </div>-->

<!--                      <div class="m-2 border-t border-gray-200 dark:border-neutral-700"></div>-->

<!--                      <div class="py-1 px-2">-->
<!--                        <div class="flex items-center bg-gray-100 rounded-xl p-1 dark:bg-neutral-800">-->
<!--                          <label for="hs-pro-dbrrtchddts1" class="relative py-1.5 px-3 w-full cursor-pointer text-center text-sm text-gray-800 rounded-lg has-[:checked]:bg-white has-[:checked]:shadow-sm dark:text-neutral-200 dark:has-[:checked]:bg-neutral-600">-->
<!--                            <svg class="relative z-10 me-1.5 inline-block align-middle shrink-0 size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                              <path d="M20.0324 1.91994H9.45071C9.09999 1.91994 8.76367 2.05926 8.51567 2.30725C8.26767 2.55523 8.12839 2.89158 8.12839 3.24228V8.86395L20.0324 15.8079L25.9844 18.3197L31.9364 15.8079V8.86395L20.0324 1.91994Z" fill="#21A366" />-->
<!--                              <path d="M8.12839 8.86395H20.0324V15.8079H8.12839V8.86395Z" fill="#107C41" />-->
<!--                              <path d="M30.614 1.91994H20.0324V8.86395H31.9364V3.24228C31.9364 2.89158 31.7971 2.55523 31.5491 2.30725C31.3011 2.05926 30.9647 1.91994 30.614 1.91994Z" fill="#33C481" />-->
<!--                              <path d="M20.0324 15.8079H8.12839V28.3736C8.12839 28.7243 8.26767 29.0607 8.51567 29.3087C8.76367 29.5567 9.09999 29.6959 9.45071 29.6959H30.6141C30.9647 29.6959 31.3011 29.5567 31.549 29.3087C31.797 29.0607 31.9364 28.7243 31.9364 28.3736V22.7519L20.0324 15.8079Z" fill="#185C37" />-->
<!--                              <path d="M20.0324 15.8079H31.9364V22.7519H20.0324V15.8079Z" fill="#107C41" />-->
<!--                              <path opacity="0.1" d="M16.7261 6.87994H8.12839V25.7279H16.7261C17.0764 25.7269 17.4121 25.5872 17.6599 25.3395C17.9077 25.0917 18.0473 24.756 18.0484 24.4056V8.20226C18.0473 7.8519 17.9077 7.51616 17.6599 7.2684C17.4121 7.02064 17.0764 6.88099 16.7261 6.87994Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                              <path opacity="0.2" d="M15.7341 7.87194H8.12839V26.7199H15.7341C16.0844 26.7189 16.4201 26.5792 16.6679 26.3315C16.9157 26.0837 17.0553 25.748 17.0564 25.3976V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                              <path opacity="0.2" d="M15.7341 7.87194H8.12839V24.7359H15.7341C16.0844 24.7349 16.4201 24.5952 16.6679 24.3475C16.9157 24.0997 17.0553 23.764 17.0564 23.4136V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                              <path opacity="0.2" d="M14.7421 7.87194H8.12839V24.7359H14.7421C15.0924 24.7349 15.4281 24.5952 15.6759 24.3475C15.9237 24.0997 16.0633 23.764 16.0644 23.4136V9.19426C16.0633 8.84386 15.9237 8.50818 15.6759 8.26042C15.4281 8.01266 15.0924 7.87299 14.7421 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                              <path d="M1.51472 7.87194H14.7421C15.0927 7.87194 15.4291 8.01122 15.6771 8.25922C15.925 8.50722 16.0644 8.84354 16.0644 9.19426V22.4216C16.0644 22.7723 15.925 23.1087 15.6771 23.3567C15.4291 23.6047 15.0927 23.7439 14.7421 23.7439H1.51472C1.16402 23.7439 0.827672 23.6047 0.579686 23.3567C0.3317 23.1087 0.192383 22.7723 0.192383 22.4216V9.19426C0.192383 8.84354 0.3317 8.50722 0.579686 8.25922C0.827672 8.01122 1.16402 7.87194 1.51472 7.87194Z" fill="#107C41" />-->
<!--                              <path d="M3.69711 20.7679L6.90722 15.794L3.96694 10.8479H6.33286L7.93791 14.0095C8.08536 14.3091 8.18688 14.5326 8.24248 14.68H8.26328C8.36912 14.4407 8.47984 14.2079 8.5956 13.9817L10.3108 10.8479H12.4822L9.46656 15.7663L12.5586 20.7679H10.2473L8.3932 17.2959C8.30592 17.148 8.23184 16.9927 8.172 16.8317H8.14424C8.09016 16.9891 8.01824 17.1399 7.92998 17.2811L6.02236 20.7679H3.69711Z" fill="white" />-->
<!--                            </svg><span class="relative z-10 align-middle">Excel</span>-->
<!--                            <input type="radio" name="hs-pro-dbrrtchddts" class="hidden" id="hs-pro-dbrrtchddts1" checked>-->
<!--                          </label>-->

<!--                          <label for="hs-pro-dbrrtchddts2" class="relative py-1.5 px-3 w-full cursor-pointer text-center text-sm text-gray-800 rounded-lg has-[:checked]:bg-white has-[:checked]:shadow-sm dark:text-neutral-200 dark:has-[:checked]:bg-neutral-600">-->
<!--                            <svg class="relative z-10 me-1.5 inline-block align-middle shrink-0 size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                              <path d="M30.6141 1.91994H9.45071C9.09999 1.91994 8.76367 2.05926 8.51567 2.30725C8.26767 2.55523 8.12839 2.89158 8.12839 3.24228V8.86395L20.0324 12.3359L31.9364 8.86395V3.24228C31.9364 2.89158 31.797 2.55523 31.549 2.30725C31.3011 2.05926 30.9647 1.91994 30.6141 1.91994Z" fill="#41A5EE" />-->
<!--                              <path d="M31.9364 8.86395H8.12839V15.8079L20.0324 19.2799L31.9364 15.8079V8.86395Z" fill="#2B7CD3" />-->
<!--                              <path d="M31.9364 15.8079H8.12839V22.7519L20.0324 26.2239L31.9364 22.7519V15.8079Z" fill="#185ABD" />-->
<!--                              <path d="M31.9364 22.752H8.12839V28.3736C8.12839 28.7244 8.26767 29.0607 8.51567 29.3087C8.76367 29.5567 9.09999 29.696 9.45071 29.696H30.6141C30.9647 29.696 31.3011 29.5567 31.549 29.3087C31.797 29.0607 31.9364 28.7244 31.9364 28.3736V22.752Z" fill="#103F91" />-->
<!--                              <path opacity="0.1" d="M16.7261 6.87994H8.12839V25.7279H16.7261C17.0764 25.7269 17.4121 25.5872 17.6599 25.3395C17.9077 25.0917 18.0473 24.756 18.0484 24.4056V8.20226C18.0473 7.8519 17.9077 7.51616 17.6599 7.2684C17.4121 7.02064 17.0764 6.88099 16.7261 6.87994Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                              <path opacity="0.2" d="M15.7341 7.87194H8.12839V26.7199H15.7341C16.0844 26.7189 16.4201 26.5792 16.6679 26.3315C16.9157 26.0837 17.0553 25.748 17.0564 25.3976V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                              <path opacity="0.2" d="M15.7341 7.87194H8.12839V24.7359H15.7341C16.0844 24.7349 16.4201 24.5952 16.6679 24.3475C16.9157 24.0997 17.0553 23.764 17.0564 23.4136V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                              <path opacity="0.2" d="M14.7421 7.87194H8.12839V24.7359H14.7421C15.0924 24.7349 15.4281 24.5952 15.6759 24.3475C15.9237 24.0997 16.0633 23.764 16.0644 23.4136V9.19426C16.0633 8.84386 15.9237 8.50818 15.6759 8.26042C15.4281 8.01266 15.0924 7.87299 14.7421 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                              <path d="M1.51472 7.87194H14.7421C15.0927 7.87194 15.4291 8.01122 15.6771 8.25922C15.925 8.50722 16.0644 8.84354 16.0644 9.19426V22.4216C16.0644 22.7723 15.925 23.1087 15.6771 23.3567C15.4291 23.6047 15.0927 23.7439 14.7421 23.7439H1.51472C1.16401 23.7439 0.827669 23.6047 0.579687 23.3567C0.3317 23.1087 0.192383 22.7723 0.192383 22.4216V9.19426C0.192383 8.84354 0.3317 8.50722 0.579687 8.25922C0.827669 8.01122 1.16401 7.87194 1.51472 7.87194Z" fill="#185ABD" />-->
<!--                              <path d="M12.0468 20.7679H10.2612L8.17801 13.9231L5.99558 20.7679H4.20998L2.22598 10.8479H4.01158L5.40038 17.7919L7.48358 11.0463H8.97161L10.9556 17.7919L12.3444 10.8479H14.0308L12.0468 20.7679Z" fill="white" />-->
<!--                            </svg><span class="relative z-10 align-middle">Word</span>-->
<!--                            <input type="radio" name="hs-pro-dbrrtchddts" class="hidden" id="hs-pro-dbrrtchddts2">-->
<!--                          </label>-->
<!--                        </div>-->
<!--                      </div>-->

<!--                      <div class="m-2 border-t border-gray-200 dark:border-neutral-700"></div>-->

<!--                      <div class="flex justify-between items-center py-2 px-3 cursor-pointer rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-700">-->
<!--                        <label for="hs-pro-dbrrtchdds1" class="flex flex-1 items-center gap-x-3 cursor-pointer text-sm text-gray-800 dark:text-neutral-300">-->
<!--                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />-->
<!--                            <path d="m15 5 4 4" />-->
<!--                          </svg>Section name-->
<!--                        </label>-->
<!--                        <input type="checkbox" class="shrink-0 size-3.5 border-gray-300 rounded text-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-pro-dbrrtchdds1" checked>-->
<!--                      </div>-->
<!--                      <div class="flex justify-between items-center py-2 px-3 cursor-pointer rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-700">-->
<!--                        <label for="hs-pro-dbrrtchdds2" class="flex flex-1 items-center gap-x-3 cursor-pointer text-sm text-gray-800 dark:text-neutral-300">-->
<!--                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                            <path d="M16 22h2a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v3" />-->
<!--                            <polyline points="14 2 14 8 20 8" />-->
<!--                            <path d="M4.04 11.71a5.84 5.84 0 1 0 8.2 8.29" />-->
<!--                            <path d="M13.83 16A5.83 5.83 0 0 0 8 10.17V16h5.83Z" />-->
<!--                          </svg>Comparison stats-->
<!--                        </label>-->
<!--                        <input type="checkbox" class="shrink-0 size-3.5 border-gray-300 rounded text-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-pro-dbrrtchdds2" checked>-->
<!--                      </div>-->
<!--                      <div class="flex justify-between items-center py-2 px-3 cursor-pointer rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-700">-->
<!--                        <label for="hs-pro-dbrrtchdds3" class="flex flex-1 items-center gap-x-3 cursor-pointer text-sm text-gray-800 dark:text-neutral-300">-->
<!--                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                            <circle cx="12" cy="12" r="10" />-->
<!--                          </svg>Legend indicator-->
<!--                        </label>-->
<!--                        <input type="checkbox" class="shrink-0 size-3.5 border-gray-300 rounded text-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-pro-dbrrtchdds3" checked>-->
<!--                      </div>-->

<!--                      <div class="my-1 border-t border-gray-200 dark:border-neutral-700"></div>-->

<!--                      <button type="button" class="w-full py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">-->
<!--                        Download-->
<!--                      </button>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Download Dropdown &ndash;&gt;-->
<!--                </div>-->
<!--                &lt;!&ndash; End Download Dropdown &ndash;&gt;-->

<!--                &lt;!&ndash; Download Dropdown &ndash;&gt;-->
<!--                <div class="hs-dropdown [&#45;&#45;auto-close:inside] [&#45;&#45;placement:bottom-right] relative inline-flex">-->
<!--                  <button id="hs-pro-dbrrtchmd" type="button" class="size-[34px] inline-flex justify-center items-center gap-x-2 rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <circle cx="12" cy="12" r="1" />-->
<!--                      <circle cx="12" cy="5" r="1" />-->
<!--                      <circle cx="12" cy="19" r="1" />-->
<!--                    </svg>-->
<!--                  </button>-->

<!--                  &lt;!&ndash; Download Dropdown &ndash;&gt;-->
<!--                  <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-48 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dbrrtchmd">-->
<!--                    <div class="p-1">-->
<!--                      <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] text-gray-800 hover:bg-gray-100 disabled:opacity-50 focus:outline-none focus:bg-gray-100 disabled:pointer-events-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <circle cx="18" cy="5" r="3" />-->
<!--                          <circle cx="6" cy="12" r="3" />-->
<!--                          <circle cx="18" cy="19" r="3" />-->
<!--                          <line x1="8.59" x2="15.42" y1="13.51" y2="17.49" />-->
<!--                          <line x1="15.41" x2="8.59" y1="6.51" y2="10.49" />-->
<!--                        </svg>-->
<!--                        Share reports-->
<!--                      </button>-->
<!--                      <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] text-gray-800 hover:bg-gray-100 disabled:opacity-50 focus:outline-none focus:bg-gray-100 disabled:pointer-events-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M8 3H5a2 2 0 0 0-2 2v3" />-->
<!--                          <path d="M21 8V5a2 2 0 0 0-2-2h-3" />-->
<!--                          <path d="M3 16v3a2 2 0 0 0 2 2h3" />-->
<!--                          <path d="M16 21h3a2 2 0 0 0 2-2v-3" />-->
<!--                        </svg>-->
<!--                        View in fullscreen-->
<!--                      </button>-->
<!--                      <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] text-gray-800 hover:bg-gray-100 disabled:opacity-50 focus:outline-none focus:bg-gray-100 disabled:pointer-events-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M3 3h6l6 18h6" />-->
<!--                          <path d="M14 3h7" />-->
<!--                        </svg>-->
<!--                        Connect other apps-->
<!--                      </button>-->

<!--                      <div class="my-1 border-t border-gray-200 dark:border-neutral-700"></div>-->

<!--                      <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] text-gray-800 hover:bg-gray-100 disabled:opacity-50 focus:outline-none focus:bg-gray-100 disabled:pointer-events-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />-->
<!--                          <line x1="9" x2="15" y1="10" y2="10" />-->
<!--                          <line x1="12" x2="12" y1="7" y2="13" />-->
<!--                        </svg>-->
<!--                        Submit Feedback-->
<!--                      </button>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Download Dropdown &ndash;&gt;-->
<!--                </div>-->
<!--                &lt;!&ndash; End Download Dropdown &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Header &ndash;&gt;-->

<!--            &lt;!&ndash; Body &ndash;&gt;-->
<!--            <div class="h-full p-5 pt-0">-->
<!--              <div class="h-full flex flex-col justify-between space-y-4">-->
<!--                <div class="space-y-4">-->
<!--                  <div class="flex gap-x-1 w-full h-2.5 rounded-full overflow-hidden">-->
<!--                    <div class="flex flex-col justify-center overflow-hidden bg-blue-500 text-xs text-white text-center whitespace-nowrap" style="width: 42%" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                    <div class="flex flex-col justify-center overflow-hidden bg-violet-500 text-xs text-white text-center whitespace-nowrap" style="width: 27%" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                    <div class="flex flex-col justify-center overflow-hidden bg-teal-400 text-xs text-white text-center whitespace-nowrap" style="width: 16%" role="progressbar" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                    <div class="flex flex-col justify-center overflow-hidden bg-blue-400 text-xs text-white text-center whitespace-nowrap" style="width: 6%" role="progressbar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                    <div class="flex flex-col justify-center overflow-hidden bg-gray-200 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-500" style="width: 9%" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->

<!--                  &lt;!&ndash; List Group &ndash;&gt;-->
<!--                  <ul>-->
<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="py-2 grid grid-cols-2 justify-between items-center gap-x-4">-->
<!--                      <div class="flex items-center">-->
<!--                        <span class="shrink-0 size-2.5 inline-block bg-blue-600 rounded-sm me-2.5"></span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                        github.com-->
<!--                      </span>-->
<!--                      </div>-->
<!--                      <div class="text-end">-->
<!--                      <span class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        164k-->
<!--                      </span>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->

<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="py-2 grid grid-cols-2 justify-between items-center gap-x-4">-->
<!--                      <div class="flex items-center">-->
<!--                        <span class="shrink-0 size-2.5 inline-block bg-violet-500 rounded-sm me-2.5"></span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                        accounts.google.com-->
<!--                      </span>-->
<!--                      </div>-->
<!--                      <div class="text-end">-->
<!--                      <span class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        49k-->
<!--                      </span>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->

<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="py-2 grid grid-cols-2 justify-between items-center gap-x-4">-->
<!--                      <div class="flex items-center">-->
<!--                        <span class="shrink-0 size-2.5 inline-block bg-teal-400 rounded-sm me-2.5"></span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                        themes.getbootstrap.com-->
<!--                      </span>-->
<!--                      </div>-->
<!--                      <div class="text-end">-->
<!--                      <span class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        26k-->
<!--                      </span>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->

<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="py-2 grid grid-cols-2 justify-between items-center gap-x-4">-->
<!--                      <div class="flex items-center">-->
<!--                        <span class="shrink-0 size-2.5 inline-block bg-blue-400 rounded-sm me-2.5"></span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                        htmlstream.com-->
<!--                      </span>-->
<!--                      </div>-->
<!--                      <div class="text-end">-->
<!--                      <span class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        8k-->
<!--                      </span>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->

<!--                    &lt;!&ndash; List Item &ndash;&gt;-->
<!--                    <li class="py-2 grid grid-cols-2 justify-between items-center gap-x-4">-->
<!--                      <div class="flex items-center">-->
<!--                        <span class="shrink-0 size-2.5 inline-block bg-gray-200 rounded-sm me-2 dark:bg-neutral-500"></span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                        Others-->
<!--                      </span>-->
<!--                      </div>-->
<!--                      <div class="text-end">-->
<!--                      <span class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        12k-->
<!--                      </span>-->
<!--                      </div>-->
<!--                    </li>-->
<!--                    &lt;!&ndash; End List Item &ndash;&gt;-->
<!--                  </ul>-->
<!--                  &lt;!&ndash; End List Group &ndash;&gt;-->
<!--                </div>-->

<!--                &lt;!&ndash; Avatar Group &ndash;&gt;-->
<!--                <div class="flex items-center -space-x-2">-->
<!--                  <div class="hs-tooltip hover:z-10">-->
<!--                    <img class="shrink-0 size-7 lg:size-[38px] border-2 border-white rounded-full dark:border-neutral-700" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                    James Collins-->
<!--                  </span>-->
<!--                  </div>-->
<!--                  <div class="hs-tooltip hover:z-10">-->
<!--                  <span class="flex shrink-0 justify-center items-center size-7 lg:size-[38px] bg-white border border-gray-200 text-gray-700 text-xs lg:text-sm font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                    E-->
<!--                  </span>-->
<!--                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                    Ella Lauda-->
<!--                  </span>-->
<!--                  </div>-->
<!--                  <div class="hs-tooltip hover:z-10">-->
<!--                    <img class="shrink-0 size-7 lg:size-[38px] border-2 border-white rounded-full dark:border-neutral-700" src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                    Costa Quinn-->
<!--                  </span>-->
<!--                  </div>-->
<!--                  <div class="hs-tooltip hover:z-10">-->
<!--                    <img class="shrink-0 size-7 lg:size-[38px] border-2 border-white rounded-full dark:border-neutral-700" src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                    Amanda Harvey-->
<!--                  </span>-->
<!--                  </div>-->
<!--                  <div class="hs-tooltip hover:z-10">-->
<!--                    <img class="shrink-0 size-7 lg:size-[38px] border-2 border-white rounded-full dark:border-neutral-700" src="https://images.unsplash.com/photo-1568048689711-5e0325cea8c0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                    Alisa Grasso-->
<!--                  </span>-->
<!--                  </div>-->
<!--                  <div class="hs-tooltip hover:z-10">-->
<!--                  <span class="flex shrink-0 justify-center items-center size-7 lg:size-[38px] bg-white border border-gray-200 text-gray-700 text-xs lg:text-sm font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                    O-->
<!--                  </span>-->
<!--                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                    Ols Schols-->
<!--                  </span>-->
<!--                  </div>-->
<!--                  <div>-->
<!--                  <span class="ms-4 lg:ms-5 text-sm text-gray-500 dark:text-neutral-500">-->
<!--                    215k more-->
<!--                  </span>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Avatar Group &ndash;&gt;-->
<!--              </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Body &ndash;&gt;-->

<!--            &lt;!&ndash; Footer &ndash;&gt;-->
<!--            <div class="text-center border-t border-gray-200 dark:border-neutral-700">-->
<!--              <a class="p-3 flex justify-center items-center gap-x-2 text-sm text-blue-600 rounded-b-lg hover:text-blue-700 focus:outline-none focus:decoration-2 focus:underline focus:text-blue-700 dark:text-blue-500 dark:hover:text-blue-600 dark:focus:text-blue-600" href="#">-->
<!--                View full reports-->
<!--              </a>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Footer &ndash;&gt;-->
<!--          </div>-->
          <!-- End Import Data Card -->

          <!-- Sales Stats Card -->
<!--          <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">-->
<!--            &lt;!&ndash; Header &ndash;&gt;-->
<!--            <div class="p-5 pb-3 flex justify-between items-center">-->
<!--              <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                Total sales-->
<!--              </h2>-->

<!--              &lt;!&ndash; Calendar Dropdown &ndash;&gt;-->
<!--              <div class="hs-dropdown [&#45;&#45;auto-close:inside] inline-flex">-->
<!--                <button id="hs-pro-dnic" type="button" class="p-2 inline-flex items-center text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                  <svg class="shrink-0 me-2 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />-->
<!--                    <line x1="16" x2="16" y1="2" y2="6" />-->
<!--                    <line x1="8" x2="8" y1="2" y2="6" />-->
<!--                    <line x1="3" x2="21" y1="10" y2="10" />-->
<!--                    <path d="M8 14h.01" />-->
<!--                    <path d="M12 14h.01" />-->
<!--                    <path d="M16 14h.01" />-->
<!--                    <path d="M8 18h.01" />-->
<!--                    <path d="M12 18h.01" />-->
<!--                    <path d="M16 18h.01" />-->
<!--                  </svg>-->
<!--                  Today-->
<!--                  <svg class="shrink-0 ms-1.5 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="m6 9 6 6 6-6" />-->
<!--                  </svg>-->
<!--                </button>-->

<!--                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-[318px] transition-[opacity,margin] duration opacity-0 hidden z-50 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dnic">-->

<!--                  &lt;!&ndash; Calendar &ndash;&gt;-->
<!--                  <div class="p-3 space-y-0.5">-->
<!--                    &lt;!&ndash; Months &ndash;&gt;-->
<!--                    <div class="grid grid-cols-5 items-center gap-x-3 mx-1.5 pb-3">-->
<!--                      &lt;!&ndash; Prev Button &ndash;&gt;-->
<!--                      <div class="col-span-1">-->
<!--                        <button type="button" class="size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-label="Previous">-->
<!--                          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                            <path d="m15 18-6-6 6-6" />-->
<!--                          </svg>-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; End Prev Button &ndash;&gt;-->

<!--                      &lt;!&ndash; Month / Year &ndash;&gt;-->
<!--                      <div class="col-span-3 flex justify-center items-center gap-x-1">-->
<!--                        <div class="relative">-->
<!--                          <select data-hs-select='{-->
<!--                              "placeholder": "Select month",-->
<!--                              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",-->
<!--                              "dropdownClasses": "mt-2 z-50 w-32 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",-->
<!--                              "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",-->
<!--                              "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                            }' class="hidden">-->
<!--                            <option value="0">January</option>-->
<!--                            <option value="1">February</option>-->
<!--                            <option value="2">March</option>-->
<!--                            <option value="3">April</option>-->
<!--                            <option value="4">May</option>-->
<!--                            <option value="5">June</option>-->
<!--                            <option value="6" selected>July</option>-->
<!--                            <option value="7">August</option>-->
<!--                            <option value="8">September</option>-->
<!--                            <option value="9">October</option>-->
<!--                            <option value="10">November</option>-->
<!--                            <option value="11">December</option>-->
<!--                          </select>-->
<!--                        </div>-->

<!--                        <span class="text-gray-800 dark:text-neutral-200">/</span>-->

<!--                        <div class="relative">-->
<!--                          <select data-hs-select='{-->
<!--                              "placeholder": "Select year",-->
<!--                              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",-->
<!--                              "dropdownClasses": "mt-2 z-50 w-20 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",-->
<!--                              "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",-->
<!--                              "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                            }' class="hidden">-->
<!--                            <option selected>2023</option>-->
<!--                            <option>2024</option>-->
<!--                            <option>2025</option>-->
<!--                            <option>2026</option>-->
<!--                            <option>2027</option>-->
<!--                          </select>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; End Month / Year &ndash;&gt;-->

<!--                      &lt;!&ndash; Next Button &ndash;&gt;-->
<!--                      <div class="col-span-1 flex justify-end">-->
<!--                        <button type="button" class=" size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-label="Next">-->
<!--                          <svg class="shrink-0 size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                            <path d="m9 18 6-6-6-6" />-->
<!--                          </svg>-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; End Next Button &ndash;&gt;-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Months &ndash;&gt;-->

<!--                    &lt;!&ndash; Weeks &ndash;&gt;-->
<!--                    <div class="flex pb-1.5">-->
<!--                    <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                      Mo-->
<!--                    </span>-->
<!--                      <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                      Tu-->
<!--                    </span>-->
<!--                      <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                      We-->
<!--                    </span>-->
<!--                      <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                      Th-->
<!--                    </span>-->
<!--                      <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                      Fr-->
<!--                    </span>-->
<!--                      <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                      Sa-->
<!--                    </span>-->
<!--                      <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                      Su-->
<!--                    </span>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Weeks &ndash;&gt;-->

<!--                    &lt;!&ndash; Days &ndash;&gt;-->
<!--                    <div class="flex">-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                          26-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                          27-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                          28-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                          29-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200" disabled>-->
<!--                          30-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          1-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          2-->
<!--                        </button>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Days &ndash;&gt;-->

<!--                    &lt;!&ndash; Days &ndash;&gt;-->
<!--                    <div class="flex">-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          3-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          4-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          5-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          6-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          7-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          8-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          9-->
<!--                        </button>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Days &ndash;&gt;-->

<!--                    &lt;!&ndash; Days &ndash;&gt;-->
<!--                    <div class="flex">-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          10-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          11-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          12-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          13-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          14-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          15-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          16-->
<!--                        </button>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Days &ndash;&gt;-->

<!--                    &lt;!&ndash; Days &ndash;&gt;-->
<!--                    <div class="flex">-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          17-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          18-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          19-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center bg-blue-600 border border-transparent text-sm font-medium text-white hover:border-blue-600 rounded-full dark:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:border-neutral-700">-->
<!--                          20-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          21-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          22-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          23-->
<!--                        </button>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Days &ndash;&gt;-->

<!--                    &lt;!&ndash; Days &ndash;&gt;-->
<!--                    <div class="flex">-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          24-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          25-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          26-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          27-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          28-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          29-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          30-->
<!--                        </button>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Days &ndash;&gt;-->

<!--                    &lt;!&ndash; Days &ndash;&gt;-->
<!--                    <div class="flex">-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                          31-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                          1-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                          2-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                          3-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                          4-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                          5-->
<!--                        </button>-->
<!--                      </div>-->
<!--                      <div>-->
<!--                        <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                          6-->
<!--                        </button>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Days &ndash;&gt;-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Calendar Dropdown &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Header &ndash;&gt;-->

<!--            &lt;!&ndash; Body &ndash;&gt;-->
<!--            <div class="h-full pb-5 px-5 space-y-8">-->
<!--              <h4 class="text-4xl font-medium text-gray-800 dark:text-neutral-200">-->
<!--                <span class="-me-1.5 text-sm align-top text-gray-500 dark:text-neutral-500">$</span>-->
<!--                43,350-->
<!--              </h4>-->

<!--              &lt;!&ndash; List Group &ndash;&gt;-->
<!--              <ul class="space-y-3">-->
<!--                &lt;!&ndash; List Item &ndash;&gt;-->
<!--                <li class="flex flex-wrap justify-between items-center gap-x-2">-->
<!--                  <div>-->
<!--                    <div class="flex items-center gap-x-2">-->
<!--                      <div class="inline-block size-2.5 bg-blue-600 rounded-sm"></div>-->
<!--                      <h2 class="inline-block align-middle text-gray-500 dark:text-neutral-400">-->
<!--                        Store sales-->
<!--                      </h2>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div>-->
<!--                  <span class="text-gray-800 dark:text-neutral-200">-->
<!--                    $51,392-->
<!--                  </span>-->
<!--                    <span class="ms-3 min-w-[80px] inline-block text-gray-600 dark:text-neutral-400">-->
<!--                    <svg class="inline-block align-middle size-4 text-teal-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />-->
<!--                      <polyline points="16 7 22 7 22 13" />-->
<!--                    </svg>-->
<!--                    38.2%-->
<!--                  </span>-->
<!--                  </div>-->
<!--                </li>-->
<!--                &lt;!&ndash; End List Item &ndash;&gt;-->

<!--                &lt;!&ndash; List Item &ndash;&gt;-->
<!--                <li class="flex flex-wrap justify-between items-center gap-x-2">-->
<!--                  <div>-->
<!--                    <div class="flex items-center gap-x-2">-->
<!--                      <div class="inline-block size-2.5 bg-purple-600 rounded-sm"></div>-->
<!--                      <h2 class="inline-block align-middle text-gray-500 dark:text-neutral-400">-->
<!--                        Online sales-->
<!--                      </h2>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div>-->
<!--                  <span class="text-gray-800 dark:text-neutral-200">-->
<!--                    $46,420-->
<!--                  </span>-->
<!--                    <span class="ms-3 min-w-[80px] inline-block text-gray-600 dark:text-neutral-400">-->
<!--                    <svg class="inline-block align-middle size-4 text-teal-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />-->
<!--                      <polyline points="16 7 22 7 22 13" />-->
<!--                    </svg>-->
<!--                    5.9%-->
<!--                  </span>-->
<!--                  </div>-->
<!--                </li>-->
<!--                &lt;!&ndash; End List Item &ndash;&gt;-->

<!--                &lt;!&ndash; List Item &ndash;&gt;-->
<!--                <li class="flex flex-wrap justify-between items-center gap-x-2">-->
<!--                  <div>-->
<!--                    <div class="flex items-center gap-x-2">-->
<!--                      <div class="inline-block size-2.5 bg-gray-300 rounded-sm dark:bg-neutral-500"></div>-->
<!--                      <h2 class="inline-block align-middle text-gray-500 dark:text-neutral-400">-->
<!--                        Others-->
<!--                      </h2>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div>-->
<!--                  <span class="text-gray-800 dark:text-neutral-200">-->
<!--                    $39,539-->
<!--                  </span>-->
<!--                    <span class="ms-3 min-w-[80px] inline-block text-gray-600 dark:text-neutral-400">-->
<!--                    <svg class="inline-block align-middle size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <polyline points="22 17 13.5 8.5 8.5 13.5 2 7" />-->
<!--                      <polyline points="16 17 22 17 22 11" />-->
<!--                    </svg>-->
<!--                    3.1%-->
<!--                  </span>-->
<!--                  </div>-->
<!--                </li>-->
<!--                &lt;!&ndash; End List Item &ndash;&gt;-->
<!--              </ul>-->
<!--              &lt;!&ndash; End List Group &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Body &ndash;&gt;-->

<!--            &lt;!&ndash; Footer &ndash;&gt;-->
<!--            <div class="p-5 pt-0 space-y-8">-->
<!--              <div class="w-full">-->
<!--                &lt;!&ndash; Apex Line Chart &ndash;&gt;-->
<!--                <div id="hs-total-sales-lines-chart" class="min-h-[115px] "></div>-->
<!--              </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Footer &ndash;&gt;-->
<!--          </div>-->
          <!-- End Sales Stats Card -->
        </div>
        <!-- End Cards Grid -->

        <!-- Double Area Chart in Card -->
<!--        <div class="p-5 flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">-->
<!--          &lt;!&ndash; Header &ndash;&gt;-->
<!--          <div class="grid md:grid-cols-2 items-start gap-2 md:gap-4">-->
<!--            <div class="space-y-1">-->
<!--              &lt;!&ndash; Select &ndash;&gt;-->
<!--              <div class="relative inline-block">-->
<!--                <select id="hs-pro-select-revenue" data-hs-select='{-->
<!--                  "placeholder": "Select option...",-->
<!--                  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative -ms-2 py-1.5 ps-2.5 pe-6 inline-flex shrink-0 justify-center items-center gap-x-1.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-700",-->
<!--                  "dropdownClasses": "mt-2 z-50 w-48 p-1 space-y-0.5 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-950",-->
<!--                  "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-1.5 px-2 w-full text-[13px] text-gray-800 rounded-lg cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700",-->
<!--                  "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                }' class="hidden">-->
<!--                  <option value="">Choose</option>-->
<!--                  <option selected>Revenue</option>-->
<!--                  <option>Total sales</option>-->
<!--                  <option>New sales</option>-->
<!--                  <option>Refunds</option>-->
<!--                  <option>New subscriptions</option>-->
<!--                  <option>Trial conversion rate</option>-->
<!--                  <option>Affiliate revenue</option>-->
<!--                  <option>Affiliate clicks</option>-->
<!--                </select>-->

<!--                <div class="absolute top-1/2 end-2 -translate-y-1/2">-->
<!--                  <svg class="shrink-0 size-3.5 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="m6 9 6 6 6-6" />-->
<!--                  </svg>-->
<!--                </div>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Select &ndash;&gt;-->

<!--              <h4 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                $62,820.59-->
<!--                <svg class="inline-block align-top mt-1 shrink-0 size-5 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                  <polyline points="22 17 13.5 8.5 8.5 13.5 2 7" />-->
<!--                  <polyline points="16 17 22 17 22 11" />-->
<!--                </svg>-->
<!--              </h4>-->
<!--              <p class="text-sm text-red-500">-->
<!--                0.2% less than the previous 30 days.-->
<!--              </p>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Col &ndash;&gt;-->

<!--            <div class="flex md:justify-end items-center gap-x-1">-->
<!--              &lt;!&ndash; Calendar Dropdown &ndash;&gt;-->
<!--              <div class="hs-dropdown [&#45;&#45;placement:bottom-right] [&#45;&#45;strategy:absolute] [&#45;&#45;flip:false] [&#45;&#45;auto-close:inside] relative inline-flex">-->
<!--                <button id="hs-pro-dachcd" type="button" class="py-2 px-2.5 inline-flex items-center gap-x-1.5 font-medium text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                  <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />-->
<!--                    <line x1="16" x2="16" y1="2" y2="6" />-->
<!--                    <line x1="8" x2="8" y1="2" y2="6" />-->
<!--                    <line x1="3" x2="21" y1="10" y2="10" />-->
<!--                    <path d="M8 14h.01" />-->
<!--                    <path d="M12 14h.01" />-->
<!--                    <path d="M16 14h.01" />-->
<!--                    <path d="M8 18h.01" />-->
<!--                    <path d="M12 18h.01" />-->
<!--                    <path d="M16 18h.01" />-->
<!--                  </svg>-->
<!--                  25 Jul, 2023 - 25 Aug, 2023-->
<!--                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="m6 9 6 6 6-6" />-->
<!--                  </svg>-->
<!--                </button>-->

<!--                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-[318px] sm:w-[636px] transition-[opacity,margin] duration opacity-0 hidden start-5 z-50 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dachcd">-->
<!--                  &lt;!&ndash; Calendar &ndash;&gt;-->
<!--                  <div class="sm:flex">-->
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
<!--                              "placeholder": "Select month",-->
<!--                              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",-->
<!--                              "dropdownClasses": "mt-2 z-50 w-32 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",-->
<!--                              "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",-->
<!--                              "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                            }' class="hidden">-->
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
<!--                              "placeholder": "Select year",-->
<!--                              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",-->
<!--                              "dropdownClasses": "mt-2 z-50 w-20 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",-->
<!--                              "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",-->
<!--                              "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                            }' class="hidden">-->
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
<!--                          <button type="button" class="opacity-0 pointer-events-none size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-label="Next">-->
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
<!--                      <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Mo-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Tu-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        We-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Th-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Fr-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Sa-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Su-->
<!--                      </span>-->
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
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
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
<!--                        <div class="bg-gray-100 rounded-s-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center bg-blue-600 border border-transparent text-sm font-medium text-white hover:border-blue-600 rounded-full dark:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:border-neutral-700">-->
<!--                            25-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            26-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            27-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            28-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            29-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            30-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            31-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gradient-to-r from-gray-100 dark:from-neutral-800">-->
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

<!--                    &lt;!&ndash; Calendar &ndash;&gt;-->
<!--                    <div class="p-3 space-y-0.5">-->
<!--                      &lt;!&ndash; Months &ndash;&gt;-->
<!--                      <div class="grid grid-cols-5 items-center gap-x-3 mx-1.5 pb-3">-->
<!--                        &lt;!&ndash; Prev Button &ndash;&gt;-->
<!--                        <div class="col-span-1">-->
<!--                          <button type="button" class="opacity-0 pointer-events-none size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-label="Previous">-->
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
<!--                              "placeholder": "Select month",-->
<!--                              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",-->
<!--                              "dropdownClasses": "mt-2 z-50 w-32 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",-->
<!--                              "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",-->
<!--                              "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                            }' class="hidden">-->
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
<!--                              "placeholder": "Select year",-->
<!--                              "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:text-blue-500",-->
<!--                              "dropdownClasses": "mt-2 z-50 w-20 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",-->
<!--                              "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",-->
<!--                              "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--                            }' class="hidden">-->
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
<!--                          <button type="button" class="size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-label="Next">-->
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
<!--                      <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Mo-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Tu-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        We-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Th-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Fr-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Sa-->
<!--                      </span>-->
<!--                        <span class="m-px w-10 block text-center text-sm text-gray-500 dark:text-neutral-500">-->
<!--                        Su-->
<!--                      </span>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Weeks &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div class="bg-gradient-to-l from-gray-100 dark:from-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            31-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700">-->
<!--                            1-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700">-->
<!--                            2-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700">-->
<!--                            3-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700">-->
<!--                            4-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            5-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            6-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            7-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            8-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            9-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            10-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            11-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            12-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            13-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            14-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            15-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            16-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            17-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            18-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            19-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            20-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            21-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            22-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            23-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 first:rounded-s-full last:rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 dark:text-neutral-200">-->
<!--                            24-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div class="bg-gray-100 rounded-e-full dark:bg-neutral-800">-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center bg-blue-600 border border-transparent text-sm font-medium text-white hover:border-blue-600 rounded-full dark:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:hover:border-neutral-700">-->
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
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
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
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->

<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                      <div class="flex">-->
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
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            7-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            8-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            9-->
<!--                          </button>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                          <button type="button" class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:border-neutral-500 dark:focus:bg-neutral-700" disabled>-->
<!--                            10-->
<!--                          </button>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                      &lt;!&ndash; Days &ndash;&gt;-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Calendar &ndash;&gt;-->

<!--                  &lt;!&ndash; Button Group &ndash;&gt;-->
<!--                  <div class="flex items-center py-3 px-4 justify-end border-t border-gray-200 dark:border-neutral-700 gap-x-2">-->

<!--                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                      Cancel-->
<!--                    </button>-->
<!--                    <button type="button" class="py-2 px-3  inline-flex justify-center items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">-->
<!--                      Apply-->
<!--                    </button>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Button Group &ndash;&gt;-->
<!--                </div>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Calendar Dropdown &ndash;&gt;-->

<!--              &lt;!&ndash; Download Dropdown &ndash;&gt;-->
<!--              <div class="hs-dropdown [&#45;&#45;auto-close:inside] [&#45;&#45;placement:bottom-right] relative inline-flex">-->
<!--                <button id="hs-pro-dachd" type="button" class="size-[34px] inline-flex justify-center items-center gap-x-2 rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />-->
<!--                    <polyline points="7 10 12 15 17 10" />-->
<!--                    <line x1="12" x2="12" y1="15" y2="3" />-->
<!--                  </svg>-->
<!--                </button>-->

<!--                &lt;!&ndash; Download Dropdown &ndash;&gt;-->
<!--                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-60 transition-[opacity,margin] duration opacity-0 hidden z-20 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dachd">-->
<!--                  <div class="p-1">-->
<!--                    <div class="py-2 px-3">-->
<!--                    <span class="block font-semibold text-gray-800 dark:text-neutral-200">-->
<!--                      Download Report-->
<!--                    </span>-->
<!--                      <span class="block text-xs text-gray-500 dark:text-neutral-500">-->
<!--                      Select Options-->
<!--                    </span>-->
<!--                    </div>-->

<!--                    <div class="m-2 border-t border-gray-200 dark:border-neutral-700"></div>-->

<!--                    <div class="py-1 px-2">-->
<!--                      <div class="flex items-center bg-gray-100 rounded-xl p-1 dark:bg-neutral-800">-->
<!--                        <label for="hs-pro-dachdts1" class="relative py-1.5 px-3 w-full cursor-pointer text-center text-sm text-gray-800 rounded-lg has-[:checked]:bg-white has-[:checked]:shadow-sm dark:text-neutral-200 dark:has-[:checked]:bg-neutral-600">-->
<!--                          <svg class="relative z-10 me-1.5 inline-block align-middle shrink-0 size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="M20.0324 1.91994H9.45071C9.09999 1.91994 8.76367 2.05926 8.51567 2.30725C8.26767 2.55523 8.12839 2.89158 8.12839 3.24228V8.86395L20.0324 15.8079L25.9844 18.3197L31.9364 15.8079V8.86395L20.0324 1.91994Z" fill="#21A366" />-->
<!--                            <path d="M8.12839 8.86395H20.0324V15.8079H8.12839V8.86395Z" fill="#107C41" />-->
<!--                            <path d="M30.614 1.91994H20.0324V8.86395H31.9364V3.24228C31.9364 2.89158 31.7971 2.55523 31.5491 2.30725C31.3011 2.05926 30.9647 1.91994 30.614 1.91994Z" fill="#33C481" />-->
<!--                            <path d="M20.0324 15.8079H8.12839V28.3736C8.12839 28.7243 8.26767 29.0607 8.51567 29.3087C8.76367 29.5567 9.09999 29.6959 9.45071 29.6959H30.6141C30.9647 29.6959 31.3011 29.5567 31.549 29.3087C31.797 29.0607 31.9364 28.7243 31.9364 28.3736V22.7519L20.0324 15.8079Z" fill="#185C37" />-->
<!--                            <path d="M20.0324 15.8079H31.9364V22.7519H20.0324V15.8079Z" fill="#107C41" />-->
<!--                            <path opacity="0.1" d="M16.7261 6.87994H8.12839V25.7279H16.7261C17.0764 25.7269 17.4121 25.5872 17.6599 25.3395C17.9077 25.0917 18.0473 24.756 18.0484 24.4056V8.20226C18.0473 7.8519 17.9077 7.51616 17.6599 7.2684C17.4121 7.02064 17.0764 6.88099 16.7261 6.87994Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                            <path opacity="0.2" d="M15.7341 7.87194H8.12839V26.7199H15.7341C16.0844 26.7189 16.4201 26.5792 16.6679 26.3315C16.9157 26.0837 17.0553 25.748 17.0564 25.3976V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                            <path opacity="0.2" d="M15.7341 7.87194H8.12839V24.7359H15.7341C16.0844 24.7349 16.4201 24.5952 16.6679 24.3475C16.9157 24.0997 17.0553 23.764 17.0564 23.4136V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                            <path opacity="0.2" d="M14.7421 7.87194H8.12839V24.7359H14.7421C15.0924 24.7349 15.4281 24.5952 15.6759 24.3475C15.9237 24.0997 16.0633 23.764 16.0644 23.4136V9.19426C16.0633 8.84386 15.9237 8.50818 15.6759 8.26042C15.4281 8.01266 15.0924 7.87299 14.7421 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                            <path d="M1.51472 7.87194H14.7421C15.0927 7.87194 15.4291 8.01122 15.6771 8.25922C15.925 8.50722 16.0644 8.84354 16.0644 9.19426V22.4216C16.0644 22.7723 15.925 23.1087 15.6771 23.3567C15.4291 23.6047 15.0927 23.7439 14.7421 23.7439H1.51472C1.16402 23.7439 0.827672 23.6047 0.579686 23.3567C0.3317 23.1087 0.192383 22.7723 0.192383 22.4216V9.19426C0.192383 8.84354 0.3317 8.50722 0.579686 8.25922C0.827672 8.01122 1.16402 7.87194 1.51472 7.87194Z" fill="#107C41" />-->
<!--                            <path d="M3.69711 20.7679L6.90722 15.794L3.96694 10.8479H6.33286L7.93791 14.0095C8.08536 14.3091 8.18688 14.5326 8.24248 14.68H8.26328C8.36912 14.4407 8.47984 14.2079 8.5956 13.9817L10.3108 10.8479H12.4822L9.46656 15.7663L12.5586 20.7679H10.2473L8.3932 17.2959C8.30592 17.148 8.23184 16.9927 8.172 16.8317H8.14424C8.09016 16.9891 8.01824 17.1399 7.92998 17.2811L6.02236 20.7679H3.69711Z" fill="white" />-->
<!--                          </svg><span class="relative z-10 align-middle">Excel</span>-->
<!--                          <input type="radio" name="hs-pro-dachdts" class="hidden" id="hs-pro-dachdts1" checked>-->
<!--                        </label>-->

<!--                        <label for="hs-pro-dachdts2" class="relative py-1.5 px-3 w-full cursor-pointer text-center text-sm text-gray-800 rounded-lg has-[:checked]:bg-white has-[:checked]:shadow-sm dark:text-neutral-200 dark:has-[:checked]:bg-neutral-600">-->
<!--                          <svg class="relative z-10 me-1.5 inline-block align-middle shrink-0 size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="M30.6141 1.91994H9.45071C9.09999 1.91994 8.76367 2.05926 8.51567 2.30725C8.26767 2.55523 8.12839 2.89158 8.12839 3.24228V8.86395L20.0324 12.3359L31.9364 8.86395V3.24228C31.9364 2.89158 31.797 2.55523 31.549 2.30725C31.3011 2.05926 30.9647 1.91994 30.6141 1.91994Z" fill="#41A5EE" />-->
<!--                            <path d="M31.9364 8.86395H8.12839V15.8079L20.0324 19.2799L31.9364 15.8079V8.86395Z" fill="#2B7CD3" />-->
<!--                            <path d="M31.9364 15.8079H8.12839V22.7519L20.0324 26.2239L31.9364 22.7519V15.8079Z" fill="#185ABD" />-->
<!--                            <path d="M31.9364 22.752H8.12839V28.3736C8.12839 28.7244 8.26767 29.0607 8.51567 29.3087C8.76367 29.5567 9.09999 29.696 9.45071 29.696H30.6141C30.9647 29.696 31.3011 29.5567 31.549 29.3087C31.797 29.0607 31.9364 28.7244 31.9364 28.3736V22.752Z" fill="#103F91" />-->
<!--                            <path opacity="0.1" d="M16.7261 6.87994H8.12839V25.7279H16.7261C17.0764 25.7269 17.4121 25.5872 17.6599 25.3395C17.9077 25.0917 18.0473 24.756 18.0484 24.4056V8.20226C18.0473 7.8519 17.9077 7.51616 17.6599 7.2684C17.4121 7.02064 17.0764 6.88099 16.7261 6.87994Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                            <path opacity="0.2" d="M15.7341 7.87194H8.12839V26.7199H15.7341C16.0844 26.7189 16.4201 26.5792 16.6679 26.3315C16.9157 26.0837 17.0553 25.748 17.0564 25.3976V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                            <path opacity="0.2" d="M15.7341 7.87194H8.12839V24.7359H15.7341C16.0844 24.7349 16.4201 24.5952 16.6679 24.3475C16.9157 24.0997 17.0553 23.764 17.0564 23.4136V9.19426C17.0553 8.84386 16.9157 8.50818 16.6679 8.26042C16.4201 8.01266 16.0844 7.87299 15.7341 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                            <path opacity="0.2" d="M14.7421 7.87194H8.12839V24.7359H14.7421C15.0924 24.7349 15.4281 24.5952 15.6759 24.3475C15.9237 24.0997 16.0633 23.764 16.0644 23.4136V9.19426C16.0633 8.84386 15.9237 8.50818 15.6759 8.26042C15.4281 8.01266 15.0924 7.87299 14.7421 7.87194Z" class="fill-black dark:fill-neutral-200" fill="currentColor" />-->
<!--                            <path d="M1.51472 7.87194H14.7421C15.0927 7.87194 15.4291 8.01122 15.6771 8.25922C15.925 8.50722 16.0644 8.84354 16.0644 9.19426V22.4216C16.0644 22.7723 15.925 23.1087 15.6771 23.3567C15.4291 23.6047 15.0927 23.7439 14.7421 23.7439H1.51472C1.16401 23.7439 0.827669 23.6047 0.579687 23.3567C0.3317 23.1087 0.192383 22.7723 0.192383 22.4216V9.19426C0.192383 8.84354 0.3317 8.50722 0.579687 8.25922C0.827669 8.01122 1.16401 7.87194 1.51472 7.87194Z" fill="#185ABD" />-->
<!--                            <path d="M12.0468 20.7679H10.2612L8.17801 13.9231L5.99558 20.7679H4.20998L2.22598 10.8479H4.01158L5.40038 17.7919L7.48358 11.0463H8.97161L10.9556 17.7919L12.3444 10.8479H14.0308L12.0468 20.7679Z" fill="white" />-->
<!--                          </svg><span class="relative z-10 align-middle">Word</span>-->
<!--                          <input type="radio" name="hs-pro-dachdts" class="hidden" id="hs-pro-dachdts2">-->
<!--                        </label>-->
<!--                      </div>-->
<!--                    </div>-->

<!--                    <div class="m-2 border-t border-gray-200 dark:border-neutral-700"></div>-->

<!--                    <div class="flex justify-between items-center py-2 px-3 cursor-pointer rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-700">-->
<!--                      <label for="hs-pro-dachds1" class="flex flex-1 items-center gap-x-3 cursor-pointer text-sm text-gray-800 dark:text-neutral-300">-->
<!--                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />-->
<!--                          <path d="m15 5 4 4" />-->
<!--                        </svg>Section name-->
<!--                      </label>-->
<!--                      <input type="checkbox" class="shrink-0 size-3.5 border-gray-300 rounded text-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-pro-dachds1" checked>-->
<!--                    </div>-->
<!--                    <div class="flex justify-between items-center py-2 px-3 cursor-pointer rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-700">-->
<!--                      <label for="hs-pro-dachds2" class="flex flex-1 items-center gap-x-3 cursor-pointer text-sm text-gray-800 dark:text-neutral-300">-->
<!--                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M16 22h2a2 2 0 0 0 2-2V7.5L14.5 2H6a2 2 0 0 0-2 2v3" />-->
<!--                          <polyline points="14 2 14 8 20 8" />-->
<!--                          <path d="M4.04 11.71a5.84 5.84 0 1 0 8.2 8.29" />-->
<!--                          <path d="M13.83 16A5.83 5.83 0 0 0 8 10.17V16h5.83Z" />-->
<!--                        </svg>Comparison stats-->
<!--                      </label>-->
<!--                      <input type="checkbox" class="shrink-0 size-3.5 border-gray-300 rounded text-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-pro-dachds2" checked>-->
<!--                    </div>-->
<!--                    <div class="flex justify-between items-center py-2 px-3 cursor-pointer rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-700">-->
<!--                      <label for="hs-pro-dachds3" class="flex flex-1 items-center gap-x-3 cursor-pointer text-sm text-gray-800 dark:text-neutral-300">-->
<!--                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <circle cx="12" cy="12" r="10" />-->
<!--                        </svg>Legend indicator-->
<!--                      </label>-->
<!--                      <input type="checkbox" class="shrink-0 size-3.5 border-gray-300 rounded text-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-pro-dachds3" checked>-->
<!--                    </div>-->

<!--                    <div class="my-1 border-t border-gray-200 dark:border-neutral-700"></div>-->

<!--                    <button type="button" class="w-full py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">-->
<!--                      Download-->
<!--                    </button>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Download Dropdown &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Download Dropdown &ndash;&gt;-->

<!--              &lt;!&ndash; Download Dropdown &ndash;&gt;-->
<!--              <div class="hs-dropdown [&#45;&#45;auto-close:inside] [&#45;&#45;placement:bottom-right] relative inline-flex">-->
<!--                <button id="hs-pro-dachmd" type="button" class="size-[34px] inline-flex justify-center items-center gap-x-2 rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <circle cx="12" cy="12" r="1" />-->
<!--                    <circle cx="12" cy="5" r="1" />-->
<!--                    <circle cx="12" cy="19" r="1" />-->
<!--                  </svg>-->
<!--                </button>-->

<!--                &lt;!&ndash; Download Dropdown &ndash;&gt;-->
<!--                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-48 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dachmd">-->
<!--                  <div class="p-1">-->
<!--                    <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] text-gray-800 hover:bg-gray-100 disabled:opacity-50 focus:outline-none focus:bg-gray-100 disabled:pointer-events-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <circle cx="18" cy="5" r="3" />-->
<!--                        <circle cx="6" cy="12" r="3" />-->
<!--                        <circle cx="18" cy="19" r="3" />-->
<!--                        <line x1="8.59" x2="15.42" y1="13.51" y2="17.49" />-->
<!--                        <line x1="15.41" x2="8.59" y1="6.51" y2="10.49" />-->
<!--                      </svg>-->
<!--                      Share reports-->
<!--                    </button>-->
<!--                    <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] text-gray-800 hover:bg-gray-100 disabled:opacity-50 focus:outline-none focus:bg-gray-100 disabled:pointer-events-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M8 3H5a2 2 0 0 0-2 2v3" />-->
<!--                        <path d="M21 8V5a2 2 0 0 0-2-2h-3" />-->
<!--                        <path d="M3 16v3a2 2 0 0 0 2 2h3" />-->
<!--                        <path d="M16 21h3a2 2 0 0 0 2-2v-3" />-->
<!--                      </svg>-->
<!--                      View in fullscreen-->
<!--                    </button>-->
<!--                    <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] text-gray-800 hover:bg-gray-100 disabled:opacity-50 focus:outline-none focus:bg-gray-100 disabled:pointer-events-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M3 3h6l6 18h6" />-->
<!--                        <path d="M14 3h7" />-->
<!--                      </svg>-->
<!--                      Connect other apps-->
<!--                    </button>-->

<!--                    <div class="my-1 border-t border-gray-200 dark:border-neutral-700"></div>-->

<!--                    <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] text-gray-800 hover:bg-gray-100 disabled:opacity-50 focus:outline-none focus:bg-gray-100 disabled:pointer-events-none dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />-->
<!--                        <line x1="9" x2="15" y1="10" y2="10" />-->
<!--                        <line x1="12" x2="12" y1="7" y2="13" />-->
<!--                      </svg>-->
<!--                      Submit Feedback-->
<!--                    </button>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Download Dropdown &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Download Dropdown &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Col &ndash;&gt;-->
<!--          </div>-->
<!--          &lt;!&ndash; End Header &ndash;&gt;-->

<!--          &lt;!&ndash; Legend Indicator &ndash;&gt;-->
<!--          <div class="flex justify-center sm:justify-end items-center gap-x-4 mt-5 sm:mt-0 sm:mb-6">-->
<!--            <div class="inline-flex items-center">-->
<!--              <span class="size-2.5 inline-block bg-blue-600 rounded-sm me-2"></span>-->
<!--              <span class="text-[13px] text-gray-600 dark:text-neutral-400">-->
<!--              This month-->
<!--            </span>-->
<!--            </div>-->
<!--            <div class="inline-flex items-center">-->
<!--              <span class="size-2.5 inline-block bg-purple-600 rounded-sm me-2"></span>-->
<!--              <span class="text-[13px] text-gray-600 dark:text-neutral-400">-->
<!--              Last month-->
<!--            </span>-->
<!--            </div>-->
<!--          </div>-->
<!--          &lt;!&ndash; End Legend Indicator &ndash;&gt;-->

<!--          &lt;!&ndash; Apex Line Chart &ndash;&gt;-->
<!--          <div id="hs-sales-line-chart" class="min-h-[415px] "></div>-->
<!--        </div>-->
        <!-- End Double Area Chart in Card -->

        <!-- Sales Stats Card -->
<!--        <div class="p-5 space-y-4 flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">-->
<!--          &lt;!&ndash; Header &ndash;&gt;-->
<!--          <div class="flex justify-between items-center gap-x-5">-->
<!--            <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">-->
<!--              Project-->
<!--            </h2>-->

<!--            <div class="flex justify-end items-center gap-x-2">-->
<!--              &lt;!&ndash; Button &ndash;&gt;-->
<!--              <button type="button" class="py-2 px-2.5 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-overlay="#hs-pro-dasadpm">-->
<!--                <svg class="hidden sm:block shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                  <path d="M5 12h14" />-->
<!--                  <path d="M12 5v14" />-->
<!--                </svg>-->
<!--                Add project-->
<!--              </button>-->
<!--              &lt;!&ndash; End Button &ndash;&gt;-->
<!--            </div>-->
<!--          </div>-->
<!--          &lt;!&ndash; End Header &ndash;&gt;-->

<!--          &lt;!&ndash; Filter Group &ndash;&gt;-->
<!--          <div class="grid md:grid-cols-2 gap-y-2 md:gap-y-0 md:gap-x-5">-->
<!--            <div>-->
<!--              &lt;!&ndash; Search Input &ndash;&gt;-->
<!--              <div class="relative">-->
<!--                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">-->
<!--                  <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <circle cx="11" cy="11" r="8" />-->
<!--                    <path d="m21 21-4.3-4.3" />-->
<!--                  </svg>-->
<!--                </div>-->
<!--                <input type="text" class="py-[7px] ps-10 pe-8 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600" placeholder="Search projects">-->
<!--                <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1">-->
<!--                  <button type="button" class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" aria-label="Close">-->
<!--                    <span class="sr-only">Close</span>-->
<!--                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <circle cx="12" cy="12" r="10" />-->
<!--                      <path d="m15 9-6 6" />-->
<!--                      <path d="m9 9 6 6" />-->
<!--                    </svg>-->
<!--                  </button>-->
<!--                </div>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Search Input &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Col &ndash;&gt;-->

<!--            <div class="flex md:justify-end items-center gap-x-2">-->
<!--              &lt;!&ndash; Import / Export Dropdown &ndash;&gt;-->
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
<!--              &lt;!&ndash; End Import / Export Dropdown &ndash;&gt;-->

<!--              &lt;!&ndash; Download Dropdown &ndash;&gt;-->
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
<!--              &lt;!&ndash; End Download Dropdown &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Col &ndash;&gt;-->
<!--          </div>-->
<!--          &lt;!&ndash; End Filter Group &ndash;&gt;-->

<!--          &lt;!&ndash; Table Section &ndash;&gt;-->
<!--          <div class="overflow-x-auto [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">-->
<!--            <div class="min-w-full inline-block align-middle">-->
<!--              &lt;!&ndash; Table &ndash;&gt;-->
<!--              <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">-->
<!--                <thead>-->
<!--                <tr class="border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">-->
<!--                  <th scope="col" class="px-3 py-2.5 text-start">-->
<!--                    <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                  </th>-->

<!--                  <th scope="col" class="min-w-[280px] ">-->
<!--                    &lt;!&ndash; Sort Dropdown &ndash;&gt;-->
<!--                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">-->
<!--                      <button id="hs-pro-dutnms" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                        Name-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="m7 15 5 5 5-5" />-->
<!--                          <path d="m7 9 5-5 5 5" />-->
<!--                        </svg>-->
<!--                      </button>-->

<!--                      &lt;!&ndash; Dropdown &ndash;&gt;-->
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
<!--                      &lt;!&ndash; End Dropdown &ndash;&gt;-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Sort Dropdown &ndash;&gt;-->
<!--                  </th>-->

<!--                  <th scope="col" class="min-w-[180px] ">-->
<!--                    &lt;!&ndash; Sort Dropdown &ndash;&gt;-->
<!--                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">-->
<!--                      <button id="hs-pro-duttgs" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                        Tags-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="m7 15 5 5 5-5" />-->
<!--                          <path d="m7 9 5-5 5 5" />-->
<!--                        </svg>-->
<!--                      </button>-->

<!--                      &lt;!&ndash; Dropdown &ndash;&gt;-->
<!--                      <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-40 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-duttgs">-->
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
<!--                      &lt;!&ndash; End Dropdown &ndash;&gt;-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Sort Dropdown &ndash;&gt;-->
<!--                  </th>-->

<!--                  <th scope="col" class="min-w-[180px] ">-->
<!--                    &lt;!&ndash; Sort Dropdown &ndash;&gt;-->
<!--                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">-->
<!--                      <button id="hs-pro-dutass" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                        Assignee-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="m7 15 5 5 5-5" />-->
<!--                          <path d="m7 9 5-5 5 5" />-->
<!--                        </svg>-->
<!--                      </button>-->

<!--                      &lt;!&ndash; Dropdown &ndash;&gt;-->
<!--                      <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-40 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dutass">-->
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
<!--                      &lt;!&ndash; End Dropdown &ndash;&gt;-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Sort Dropdown &ndash;&gt;-->
<!--                  </th>-->

<!--                  <th scope="col">-->
<!--                    &lt;!&ndash; Sort Dropdown &ndash;&gt;-->
<!--                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">-->
<!--                      <button id="hs-pro-dutprs" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                        Progress-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="m7 15 5 5 5-5" />-->
<!--                          <path d="m7 9 5-5 5 5" />-->
<!--                        </svg>-->
<!--                      </button>-->

<!--                      &lt;!&ndash; Dropdown &ndash;&gt;-->
<!--                      <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-40 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dutprs">-->
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
<!--                      &lt;!&ndash; End Dropdown &ndash;&gt;-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Sort Dropdown &ndash;&gt;-->
<!--                  </th>-->

<!--                  <th scope="col">-->
<!--                    &lt;!&ndash; Sort Dropdown &ndash;&gt;-->
<!--                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">-->
<!--                      <button id="hs-pro-dutdds" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                        Deadline-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="m7 15 5 5 5-5" />-->
<!--                          <path d="m7 9 5-5 5 5" />-->
<!--                        </svg>-->
<!--                      </button>-->

<!--                      &lt;!&ndash; Dropdown &ndash;&gt;-->
<!--                      <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-40 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dutdds">-->
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
<!--                      &lt;!&ndash; End Dropdown &ndash;&gt;-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Sort Dropdown &ndash;&gt;-->
<!--                  </th>-->

<!--                  <th scope="col">-->
<!--                    &lt;!&ndash; Sort Dropdown &ndash;&gt;-->
<!--                    <div class="hs-dropdown relative inline-flex w-full cursor-pointer">-->
<!--                      <button id="hs-pro-dutrts" type="button" class="px-5 py-2.5 text-start w-full flex items-center gap-x-1 text-sm text-nowrap font-normal text-gray-500 focus:outline-none focus:bg-gray-100 dark:text-neutral-500 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                        Rating-->
<!--                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="m7 15 5 5 5-5" />-->
<!--                          <path d="m7 9 5-5 5 5" />-->
<!--                        </svg>-->
<!--                      </button>-->

<!--                      &lt;!&ndash; Dropdown &ndash;&gt;-->
<!--                      <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-40 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dutrts">-->
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
<!--                      &lt;!&ndash; End Dropdown &ndash;&gt;-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Sort Dropdown &ndash;&gt;-->
<!--                  </th>-->
<!--                </tr>-->
<!--                </thead>-->

<!--                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">-->
<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Improve website UI</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Website</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        SaaS-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        IT-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Tech-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        B2B-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            James Collins-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            L-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lori Hunter-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lewis Clarke-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ella Lauda-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            O-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ols Schols-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">1/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 20%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                        Apr 10, 2023-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Internal UX audit</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Website</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Ecommerce-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Shopify-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1570654639102-bdd95efeca7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Anna Richard-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            L-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lori Hunter-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Costa Quinn-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">1/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 20%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                        May 5, 2023-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Digital marketing</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">IT department</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Sales-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Marketing-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            A-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Alex Brown-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            B-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Bob Dean-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            M-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Mark Colbert-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            C-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Chris Mathew-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            A-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Alex Brown-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            E-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Emma Watson-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">5/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 100%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                        Apr 29, 2023-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Case studies</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">IT department</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Branding-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            David Harrison-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">5/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 100%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Social media assets</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Marketing</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        B2B-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            A-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Alex Brown-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            C-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Chris Mathew-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Costa Quinn-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1670272505340-d906d8d77d03?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Mia Maya-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            M-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Mark Colbert-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">0/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 0%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                        Mar 16, 2023-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">UI/UX library</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Marketing</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        SaaS-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        B2B-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1568048689711-5e0325cea8c0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Alisa Grasso-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Amanda Harvey-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lewis Clarke-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">2/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 40%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                        Jun 1, 2023-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Defining core values of the Guideline</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Marketing</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Sales-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Branding-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1568048689711-5e0325cea8c0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Alisa Grasso-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            L-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lori Hunter-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            O-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ols Schols-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">5/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 100%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Seeking feedback</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Company</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Tech-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        IT-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Fintech-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        AI-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            James Collins-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            L-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lori Hunter-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lewis Clarke-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ella Lauda-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">0/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 0%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                        Apr 8, 2023-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Trending NFT Collections</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Analysis</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Crypto-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Wallet-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            James Collins-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            L-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lori Hunter-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            A-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Alex Brown-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            O-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ols Schols-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lewis Clarke-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ella Lauda-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            O-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ols Schols-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">4/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 80%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->

<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Understanding and leveraging Notion strength</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Analysis</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Online-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            L-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lori Hunter-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            O-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ols Schols-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">4/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 80%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                        Apr 25, 2023-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">App design</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Branding</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Branding-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Design-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Amanda Harvey-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            James Collins-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            L-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lori Hunter-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ella Lauda-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">2/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 60%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                        Mar 3, 2023-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->

<!--                <tr class="divide-x divide-gray-200 dark:divide-neutral-700">-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-3 py-4">-->
<!--                      <input type="checkbox" class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <p class="text-sm font-semibold text-gray-800 dark:text-neutral-200">Untitled</p>-->
<!--                      <p class="text-sm text-gray-500 dark:text-neutral-500">Not defined</p>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="flex flex-wrap gap-1.5 px-4 py-1">-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        IT-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Tech-->
<!--                      </span>-->
<!--                      <span class="p-2 bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        B2B-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center -space-x-2">-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            James Collins-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            L-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lori Hunter-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Lewis Clarke-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                            O-->
<!--                          </span>-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ols Schols-->
<!--                          </span>-->
<!--                        </div>-->
<!--                        <div class="hs-tooltip hover:z-10">-->
<!--                          <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--                          <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity hidden invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700" role="tooltip">-->
<!--                            Ella Lauda-->
<!--                          </span>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <div class="flex items-center gap-x-3">-->
<!--                        <span class="text-sm text-gray-500 dark:text-neutral-500">0/5</span>-->
<!--                        <div class="flex w-16 h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">-->
<!--                          <div class="flex flex-col justify-center overflow-hidden bg-gray-800 text-xs text-white text-center whitespace-nowrap dark:bg-neutral-200" style="width: 0%"></div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2">-->
<!--                      <span class="text-sm text-gray-600 dark:text-neutral-400">-->
<!--                        May 22, 2023-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                  <td class="size-px whitespace-nowrap">-->
<!--                    <div class="px-5 py-2 flex gap-x-1">-->
<!--                      <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                      <svg class="shrink-0 size-3.5 text-gray-300 dark:text-neutral-700" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />-->
<!--                      </svg>-->
<!--                    </div>-->
<!--                  </td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--              </table>-->
<!--              &lt;!&ndash; End Table &ndash;&gt;-->
<!--            </div>-->
<!--          </div>-->
<!--          &lt;!&ndash; End Table Section &ndash;&gt;-->

<!--          &lt;!&ndash; Footer &ndash;&gt;-->
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
<!--          &lt;!&ndash; End Footer &ndash;&gt;-->

<!--        </div>-->
        <!-- End Sales Stats Card -->
      </div>

  </CabinetLayout>

</template>

<style scoped>

</style>
