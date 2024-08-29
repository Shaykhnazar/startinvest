<script setup>

import { useUserStore } from '@/stores/UserStore.js'
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({
  isPublic: {
    type: Boolean,
    default: false
  },
})
const user = ref(useUserStore().authUser)

const visitTo = (url) => {
  return router.visit(url)
}
</script>

<template>
  <div class="p-5 pb-0 bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
    <!-- SVG Background Element -->
    <figure>
      <svg class="w-full" preserveAspectRatio="none" width="1113" height="161" viewBox="0 0 1113 161" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_697_201879)">
          <rect x="1" width="1112" height="348" fill="#B2E7FE" />
          <rect width="185.209" height="704.432" transform="matrix(0.50392 0.86375 -0.860909 0.508759 435.452 -177.87)" fill="#FF8F5D" />
          <rect width="184.653" height="378.667" transform="matrix(0.849839 -0.527043 0.522157 0.852849 -10.4556 -16.4521)" fill="#3ECEED" />
          <rect width="184.653" height="189.175" transform="matrix(0.849839 -0.527043 0.522157 0.852849 35.4456 58.5195)" fill="#4C48FF" />
        </g>
        <defs>
          <clipPath id="clip0_697_201879">
            <rect x="0.5" width="1112" height="161" rx="12" fill="white" />
          </clipPath>
        </defs>
      </svg>
    </figure>
    <!-- End SVG Background Element -->

    <!-- Avatar -->
    <div class="-mt-24">
      <div class="relative flex w-[120px] h-[120px] mx-auto border-4 border-white rounded-full dark:border-neutral-800">
        <img class="object-cover size-full rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80" alt="Hero Image">

<!--        <div class="absolute bottom-0 -end-2">-->
<!--          <button type="button" class="group p-2 max-w-[125px] inline-flex justify-center items-center gap-x-2 text-start bg-red-600 border border-red-600 text-white text-xs font-medium rounded-full shadow-sm align-middle focus:outline-none focus:bg-red-500" data-hs-overlay="#hs-pro-dsm">-->
<!--            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--              <circle cx="12" cy="12" r="10" />-->
<!--              <path d="M8 14s1.5 2 4 2 4-2 4-2" />-->
<!--              <line x1="9" x2="9.01" y1="9" y2="9" />-->
<!--              <line x1="15" x2="15.01" y1="9" y2="9" />-->
<!--            </svg>-->
<!--            <span class="group-hover:block hidden">Offline</span>-->
<!--          </button>-->
<!--        </div>-->
      <template v-if="!isPublic">
        <div class="absolute bottom-0 -end-2">
          <button type="button" class="group p-2 max-w-[125px] inline-flex justify-center items-center gap-x-1.5 text-start bg-white border border-gray-200 text-gray-800 text-xs font-medium rounded-full whitespace-nowrap shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dsm">
            <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10" />
              <path d="M8 14s1.5 2 4 2 4-2 4-2" />
              <line x1="9" x2="9.01" y1="9" y2="9" />
              <line x1="15" x2="15.01" y1="9" y2="9" />
            </svg>
            <span class="group-hover:block hidden">Set status</span>
          </button>
        </div>
      </template>
      </div>

      <div class="mt-3 text-center">
        <h1 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
          {{ user.name }}
        </h1>
        <p class="text-gray-500 dark:text-neutral-500">
          {{ user.email }}
        </p>
      </div>
    </div>
    <!-- End Avatar -->

    <!-- Header -->
    <div class="mt-7 py-0.5 flex flex-row justify-between items-center gap-x-2 whitespace-nowrap overflow-x-auto overflow-y-hidden [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
      <!-- Nav -->
      <template v-if="!isPublic">
        <nav class="flex gap-x-1">
          <a
            :class="{
              'px-2.5 py-1.5 relative inline-flex items-center gap-x-2 hover:bg-gray-100 text-sm whitespace-nowrap rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 after:absolute after:-bottom-[11px] after:inset-x-2.5 after:z-10 after:h-0.5 after:pointer-events-none dark:text-neutral-500 dark:hover:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700': true,
              'after:bg-gray-800 text-gray-800 font-medium dark:bg-neutral-800 dark:text-white dark:after:bg-neutral-200': route().current('dashboard.my-profile')
            }" href="#" @click="visitTo(route('dashboard.my-profile'))">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="18" cy="15" r="3" />
              <circle cx="9" cy="7" r="4" />
              <path d="M10 15H6a4 4 0 0 0-4 4v2" />
              <path d="m21.7 16.4-.9-.3" />
              <path d="m15.2 13.9-.9-.3" />
              <path d="m16.6 18.7.3-.9" />
              <path d="m19.1 12.2.3-.9" />
              <path d="m19.6 18.7-.4-1" />
              <path d="m16.8 12.3-.4-1" />
              <path d="m14.3 16.6 1-.4" />
              <path d="m20.7 13.8 1-.4" />
            </svg>
            Umumiy profil
          </a>
          <a :class="{
            'px-2.5 py-1.5 relative inline-flex items-center gap-x-2 hover:bg-gray-100 text-sm whitespace-nowrap rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 after:absolute after:-bottom-[11px] after:inset-x-2.5 after:z-10 after:h-0.5 after:pointer-events-none dark:text-neutral-500 dark:hover:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700': true,
            'after:bg-gray-800 text-gray-800 font-medium dark:bg-neutral-800 dark:text-white dark:after:bg-neutral-200': route().current('dashboard.startup-teams')
          }" href="#" @click="visitTo(route('dashboard.startup-teams'))">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
              <circle cx="9" cy="7" r="4" />
              <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            Startuplar
          </a>
  <!--        <a class="px-2.5 py-1.5 relative inline-flex items-center gap-x-2 hover:bg-gray-100 text-gray-500 hover:text-gray-800 text-sm whitespace-nowrap rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 after:absolute after:-bottom-[11px] after:inset-x-2.5 after:z-10 after:h-0.5 after:pointer-events-none dark:text-neutral-500 dark:hover:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700  " href="#">-->
  <!--          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
  <!--            <path d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V6.5L15.5 2z" />-->
  <!--            <path d="M3 7.6v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8" />-->
  <!--            <path d="M15 2v5h5" />-->
  <!--          </svg>-->
  <!--          Fayllar-->
  <!--        </a>-->
  <!--        <a class="px-2.5 py-1.5 relative inline-flex items-center gap-x-2 hover:bg-gray-100 text-gray-500 hover:text-gray-800 text-sm whitespace-nowrap rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 after:absolute after:-bottom-[11px] after:inset-x-2.5 after:z-10 after:h-0.5 after:pointer-events-none dark:text-neutral-500 dark:hover:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700  " href="#">-->
  <!--          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
  <!--            <path d="M8 3 4 7l4 4" />-->
  <!--            <path d="M4 7h16" />-->
  <!--            <path d="m16 21 4-4-4-4" />-->
  <!--            <path d="M20 17H4" />-->
  <!--          </svg>-->
  <!--          Bog'lanmalar-->
  <!--        </a>-->
        </nav>
      </template>
      <!-- End Nav -->

      <div class="pb-3">
        <template v-if="isPublic">
          <label for="hs-pro-dupfub" class="relative py-2 px-3 w-full sm:w-auto block text-center sm:text-start rounded-lg cursor-pointer text-sm font-medium focus:outline-none">
            <input type="checkbox" id="hs-pro-dupfub" class="peer absolute top-0 start-0 size-full bg-transparent border border-gray-200 text-transparent rounded-lg cursor-pointer focus:ring-white after:block after:size-full after:rounded-md checked:text-transparent checked:border-gray-200 checked:hover:border-gray-200 checked:focus:border-gray-200 checked:bg-none focus:border-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:checked:after:bg-neutral-800 dark:checked:border-neutral-700 dark:focus:ring-0 dark:focus:ring-offset-0 dark:focus:border-neutral-600 dark:checked:focus:after:border-neutral-600" checked>
            <span class="relative z-10 peer-checked:hidden text-gray-800 dark:text-white">
              Kuzatish
            </span>
            <span class="relative z-10 hidden peer-checked:flex peer-checked:text-gray-800 text-gray-200 dark:text-white dark:peer-checked:text-white">
              Kuzatishdan voz kechish
            </span>
          </label>
        </template>
        <template v-else>
          <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" @click="visitTo(route('dashboard.profile.edit', user?.id))" href="#">
            Tahrirlash
          </a>
        </template>
      </div>
    </div>
    <!-- End Header -->
  </div>
</template>

<style scoped>

</style>
