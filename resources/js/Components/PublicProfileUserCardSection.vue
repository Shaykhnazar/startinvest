<script setup>

import { useUserStore } from '@/stores/UserStore.js'
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  isPublic: {
    type: Boolean,
    default: false
  },
  user: Object
})
const user = ref(props.user)

const visitTo = (url) => {
  return router.visit(url)
}

const goToChat = (userId) => {
  const url = route('chat.cabinet', { friend: userId });
  const windowFeatures = "width=600,height=400,scrollbars=yes,resizable=yes";
  window.open(url, '_blank', windowFeatures);
};
</script>

<template>
  <!-- Overlay User Profile -->
<!--  <div class="relative pt-5 before:absolute before:top-0 before:start-0 before:-z-[1] before:w-full before:h-[200px] lg:before:h-[230px] before:bg-gray-800 dark:before:bg-neutral-950">-->
<!--    <div class="max-w-5xl mx-auto px-2 sm:px-5 xl:px-0">-->
<!--      <div class="flex sm:items-center gap-5 pt-4 lg:pt-10 mb-5 md:mb-8">-->
<!--        &lt;!&ndash; Avatar &ndash;&gt;-->
<!--        <div class="shrink-0">-->
<!--          <div class="relative shrink-0">-->
<!--            &lt;!&ndash; <div class="shrink-0 size-16 sm:size-20 bg-gray-700 rounded-3xl dark:bg-neutral-900">-->
<!--              <span class="flex shrink-0 justify-center items-center size-16 sm:size-20 bg-gray-600 text-2xl font-semibold uppercase text-white rounded-2xl sm:rounded-3xl">-->
<!--                AH-->
<!--              </span>-->
<!--            </div> &ndash;&gt;-->
<!--            <div class="shrink-0 size-16 sm:size-20 bg-gray-700 rounded-3xl dark:bg-neutral-900">-->
<!--              <img class="shrink-0 size-16 sm:size-20 rounded-2xl sm:rounded-3xl" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--            </div>-->
<!--            <div class="absolute -bottom-3 inset-x-0 text-center">-->
<!--              <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-semibold uppercase rounded-md bg-gradient-to-tr from-lime-500 to-teal-500 text-white">Pro</span>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        &lt;!&ndash; End Avatar &ndash;&gt;-->

<!--        &lt;!&ndash; Body &ndash;&gt;-->
<!--        <div class="grow">-->
<!--          <h1 class="text-2xl md:text-3xl font-semibold text-white">-->
<!--            {{ user.name }}-->
<!--          </h1>-->

<!--          &lt;!&ndash; List &ndash;&gt;-->
<!--          <ul class="mt-2 flex flex-wrap items-center gap-x-3">-->
<!--            <li class="relative before:hidden md:before:inline-block first:before:hidden first:before:ms-0 before:content-['•'] before:text-white/40 before:me-1.5">-->
<!--            <span class="text-sm text-white/50">-->
<!--              Role:-->
<!--            </span>-->
<!--              <span class="inline-flex items-center gap-x-2 text-sm text-gray-200">-->
<!--              - -->
<!--            </span>-->
<!--            </li>-->

<!--&lt;!&ndash;            <li class="relative before:hidden md:before:inline-block first:before:hidden first:before:ms-0 before:content-['•'] before:text-white/40 before:me-1.5">&ndash;&gt;-->
<!--&lt;!&ndash;            <span class="text-sm text-white/50">&ndash;&gt;-->
<!--&lt;!&ndash;              Phone:&ndash;&gt;-->
<!--&lt;!&ndash;            </span>&ndash;&gt;-->
<!--&lt;!&ndash;              <span class="inline-flex items-center gap-x-2 text-sm text-gray-200">&ndash;&gt;-->
<!--&lt;!&ndash;              (892) 312-5483&ndash;&gt;-->
<!--&lt;!&ndash;            </span>&ndash;&gt;-->
<!--&lt;!&ndash;            </li>&ndash;&gt;-->

<!--            <li class="relative before:hidden md:before:inline-block first:before:hidden first:before:ms-0 before:content-['•'] before:text-white/40 before:me-1.5">-->
<!--            <span class="text-sm text-white/50">-->
<!--              Email:-->
<!--            </span>-->
<!--              <span class="inline-flex items-center gap-x-2 text-sm text-gray-200">-->
<!--              {{ user.email }}-->
<!--            </span>-->
<!--            </li>-->
<!--          </ul>-->
<!--          &lt;!&ndash; End List &ndash;&gt;-->
<!--        </div>-->
<!--        &lt;!&ndash; End Body &ndash;&gt;-->

<!--        <div class="ms-auto">-->
<!--          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-nowrap text-sm bg-white/10 text-white rounded-lg hover:bg-white/20 focus:outline-none focus:bg-white/20 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#@@modalID">-->
<!--            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M8 12h.01"/><path d="M12 12h.01"/><path d="M16 12h.01"/></svg>-->
<!--            Aloqa-->
<!--          </button>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
  <!-- End Overlay User Profile -->

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
      <div class="pb-3">
          <label for="hs-pro-dupfub" class="relative py-2 px-3 w-full sm:w-auto block text-center sm:text-start rounded-lg cursor-pointer text-sm font-medium focus:outline-none">
            <input type="checkbox" id="hs-pro-dupfub" class="peer absolute top-0 start-0 size-full bg-transparent border border-gray-200 text-transparent rounded-lg cursor-pointer focus:ring-white after:block after:size-full after:rounded-md checked:text-transparent checked:border-gray-200 checked:hover:border-gray-200 checked:focus:border-gray-200 checked:bg-none focus:border-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:checked:after:bg-neutral-800 dark:checked:border-neutral-700 dark:focus:ring-0 dark:focus:ring-offset-0 dark:focus:border-neutral-600 dark:checked:focus:after:border-neutral-600" checked>
            <span class="relative z-10 peer-checked:hidden text-gray-800 dark:text-white">
              Kuzatish
            </span>
            <span class="relative z-10 hidden peer-checked:flex peer-checked:text-gray-800 text-gray-200 dark:text-white dark:peer-checked:text-white">
              Kuzatishdan voz kechish
            </span>
          </label>
      </div>
      <div class="pb-3">
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-blue-600 text-white shadow-sm hover:bg-blue-700  disabled:opacity-50 disabled:pointer-events-none focus:bg-blue-700 dark:bg-blue-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-blue-700 dark:focus:bg-blue-700" @click="goToChat(user?.id)" href="#">
          <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M8 12h.01"/><path d="M12 12h.01"/><path d="M16 12h.01"/></svg>
          Aloqa
        </a>
      </div>
      </div>
    <!-- End Header -->
  </div>

</template>

<style scoped>

</style>
