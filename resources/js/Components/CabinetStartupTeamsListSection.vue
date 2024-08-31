<script setup>
import { defineEmits, ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import StartupCard from '@/Components/StartupCard.vue'

const props = defineProps({
  startupTeams: {
    type: Array,
  }
})

const emit = defineEmits(['updateDisplayType'])

const switchToGrid = () => {
  emit('updateDisplayType', 'grid')
}

const switchToList = () => {
  emit('updateDisplayType', 'list')
}
</script>

<template>
  <div class="lg:p-5 space-y-4 flex flex-col lg:bg-white lg:border lg:border-gray-200 lg:shadow-sm lg:rounded-lg dark:lg:bg-neutral-800 dark:lg:border-neutral-700">
    <!-- Header -->
    <div class="flex justify-between items-center gap-x-2">
      <!-- Nav Tab -->
      <nav class="p-1  inline-flex bg-gray-100 rounded-xl dark:bg-neutral-900/50" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
        <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-sm hs-tab-active:focus:bg-gray-50 hs-tab-active:focus:text-gray-800 py-2 px-3 inline-flex justify-center items-center gap-x-2  text-sm font-medium text-gray-800 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 dark:hs-tab-active:bg-neutral-700 dark:hs-tab-active:focus:bg-neutral-800 dark:hs-tab-active:focus:text-neutral-200 active " id="hs-pro-tabs-dupt-item-open" aria-selected="true" data-hs-tab="#hs-pro-tabs-dupt-open" aria-controls="hs-pro-tabs-dupt-open" role="tab">
          Hammasi
        </button>
        <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-sm hs-tab-active:focus:bg-gray-50 hs-tab-active:focus:text-gray-800 py-2 px-3 inline-flex justify-center items-center gap-x-2  text-sm font-medium text-gray-800 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 dark:hs-tab-active:bg-neutral-700 dark:hs-tab-active:focus:bg-neutral-800 dark:hs-tab-active:focus:text-neutral-200  " id="hs-pro-tabs-dupt-item-archived" aria-selected="false" data-hs-tab="#hs-pro-tabs-dupt-archived" aria-controls="hs-pro-tabs-dupt-archived" role="tab">
          Arxivdagilar
        </button>
      </nav>
      <!-- End Nav Tab -->

      <!-- Form Group -->
      <div class="flex justify-end items-center gap-x-2">
        <!-- Button -->
        <button type="button" @click="router.visit(route('startups.index'))" class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">
<!--          <svg class="hidden sm:block shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 1C8.55228 1 9 1.44772 9 2V7L14 7C14.5523 7 15 7.44771 15 8C15 8.55228 14.5523 9 14 9L9 9V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V9.00001L2 9.00001C1.44772 9.00001 1 8.5523 1 8.00001C0.999999 7.44773 1.44771 7.00001 2 7.00001L7 7.00001V2C7 1.44772 7.44772 1 8 1Z" />-->
<!--          </svg>-->
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scan-search "><path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/><circle cx="12" cy="12" r="3"/><path d="m16 16-1.9-1.9"/></svg>
          Startup izlash
        </button>
        <!-- End Button -->

        <!-- Button Group -->
        <div class="p-[3px] flex items-center bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700">
          <a class="flex shrink-0 justify-center items-center size-[30px] border-md text-gray-800 rounded-md disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 bg-gray-100 focus:bg-gray-200 focus:text-gray-800 dark:focus:text-neutral-200 dark:bg-neutral-700 dark:focus:bg-neutral-600 "
             href="#"
             @click="switchToList">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="3" x2="21" y1="6" y2="6" />
              <line x1="3" x2="21" y1="12" y2="12" />
              <line x1="3" x2="21" y1="18" y2="18" />
            </svg>
          </a>
          <a class="inline-flex shrink-0 justify-center items-center size-[30px] border-md text-gray-800 rounded-md disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500  "
             href="#"
             @click="switchToGrid">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect width="7" height="7" x="3" y="3" rx="1" />
              <rect width="7" height="7" x="14" y="3" rx="1" />
              <rect width="7" height="7" x="14" y="14" rx="1" />
              <rect width="7" height="7" x="3" y="14" rx="1" />
            </svg>
          </a>
        </div>
        <!-- End Button Group -->
      </div>
      <!-- End Form Group -->
    </div>
    <!-- End Header -->

    <div>
      <!-- Tab Content -->
      <div id="hs-pro-tabs-dupt-open" role="tabpanel" aria-labelledby="hs-pro-tabs-dupt-item-open">
        <!-- Card List Group -->
        <div class="space-y-3">
          <template v-for="startup in startupTeams" :key="startup.id">
            <StartupCard
              :startup="startup"
            />
          </template>
        </div>
        <!-- End Card List Group -->

        <div class="mt-5">
          <!-- Footer -->
          <div class="grid grid-cols-2 items-center gap-y-2 sm:gap-y-0 sm:gap-x-5">
            <p class="text-sm text-gray-800 dark:text-neutral-200">
              <span class="font-medium">8</span>
              <span class="text-gray-500 dark:text-neutral-500"> mavjud</span>
            </p>

            <!-- Pagination -->
            <nav class="flex justify-end items-center gap-x-1" aria-label="Pagination">
              <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-white dark:hover:bg-white/10 dark:focus:bg-neutral-700" aria-label="Previous">
                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="m15 18-6-6 6-6" />
                </svg>
                <span class="sr-only">Oldingi</span>
              </button>
              <div class="flex items-center gap-x-1">
                <span class="min-h-[38px] min-w-[38px] flex justify-center items-center bg-gray-100 text-gray-800 py-2 px-3 text-sm rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:text-white" aria-current="page">1</span>
                <span class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-sm dark:text-neutral-500">of</span>
                <span class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-sm dark:text-neutral-500">3</span>
              </div>
              <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-white dark:hover:bg-white/10 dark:focus:bg-neutral-700" aria-label="Next">
                <span class="sr-only">Keyingi</span>
                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </button>
            </nav>
            <!-- End Pagination -->
          </div>
          <!-- End Footer -->
        </div>
      </div>
      <!-- End Tab Content -->

      <!-- Tab Content -->
      <div id="hs-pro-tabs-dupt-archived" role="tabpanel" class="hidden" aria-labelledby="hs-pro-tabs-dupt-item-archived">
        <!-- Empty State -->
<!--        <div class="p-5 min-h-[500px]  flex flex-col justify-center items-center text-center">-->
<!--          <svg class="w-48 mx-auto mb-4" width="178" height="90" viewBox="0 0 178 90" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--            <rect x="27" y="50.5" width="124" height="39" rx="7.5" fill="currentColor" class="fill-white dark:fill-neutral-800" />-->
<!--            <rect x="27" y="50.5" width="124" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-50 dark:stroke-neutral-700/10" />-->
<!--            <rect x="34.5" y="58" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />-->
<!--            <rect x="66.5" y="61" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />-->
<!--            <rect x="66.5" y="73" width="77" height="6" rx="3" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />-->
<!--            <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" fill="currentColor" class="fill-white dark:fill-neutral-800" />-->
<!--            <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-100 dark:stroke-neutral-700/30" />-->
<!--            <rect x="27" y="36" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />-->
<!--            <rect x="59" y="39" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />-->
<!--            <rect x="59" y="51" width="92" height="6" rx="3" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />-->
<!--            <g filter="url(#filter17)">-->
<!--              <rect x="12" y="6" width="154" height="40" rx="8" fill="currentColor" class="fill-white dark:fill-neutral-800" shape-rendering="crispEdges" />-->
<!--              <rect x="12.5" y="6.5" width="153" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-100 dark:stroke-neutral-700/60" shape-rendering="crispEdges" />-->
<!--              <rect x="20" y="14" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700 " />-->
<!--              <rect x="52" y="17" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700" />-->
<!--              <rect x="52" y="29" width="106" height="6" rx="3" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700" />-->
<!--            </g>-->
<!--            <defs>-->
<!--              <filter id="filter17" x="0" y="0" width="178" height="64" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">-->
<!--                <feFlood flood-opacity="0" result="BackgroundImageFix" />-->
<!--                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />-->
<!--                <feOffset dy="6" />-->
<!--                <feGaussianBlur stdDeviation="6" />-->
<!--                <feComposite in2="hardAlpha" operator="out" />-->
<!--                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0" />-->
<!--                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1187_14810" />-->
<!--                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1187_14810" result="shape" />-->
<!--              </filter>-->
<!--            </defs>-->
<!--          </svg>-->

<!--          <div class="max-w-sm mx-auto">-->
<!--            <p class="mt-2 font-medium text-gray-800 dark:text-neutral-200">-->
<!--              No open teams-->
<!--            </p>-->
<!--            <p class="mb-5 text-sm text-gray-500 dark:text-neutral-500">-->
<!--              Connect your mailbox or manually add your first person to get started.-->
<!--            </p>-->
<!--          </div>-->

<!--          &lt;!&ndash; Button Group &ndash;&gt;-->
<!--          <div class="mb-5">-->
<!--            <button type="button" class="m-1 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--              <svg class="size-4" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                <g clip-path="url(#clip0_4132_5805)">-->
<!--                  <path d="M32.2566 16.36C32.2566 15.04 32.1567 14.08 31.9171 13.08H16.9166V19.02H25.7251C25.5454 20.5 24.5866 22.72 22.4494 24.22L22.4294 24.42L27.1633 28.1L27.4828 28.14C30.5189 25.34 32.2566 21.22 32.2566 16.36Z" fill="#4285F4" />-->
<!--                  <path d="M16.9166 32C21.231 32 24.8463 30.58 27.5028 28.12L22.4694 24.2C21.1111 25.14 19.3135 25.8 16.9366 25.8C12.7021 25.8 9.12677 23 7.84844 19.16L7.66867 19.18L2.71513 23L2.65521 23.18C5.2718 28.4 10.6648 32 16.9166 32Z" fill="#34A853" />-->
<!--                  <path d="M7.82845 19.16C7.48889 18.16 7.28915 17.1 7.28915 16C7.28915 14.9 7.48889 13.84 7.80848 12.84V12.62L2.81499 8.73999L2.6552 8.81999C1.55663 10.98 0.937439 13.42 0.937439 16C0.937439 18.58 1.55663 21.02 2.63522 23.18L7.82845 19.16Z" fill="#FBBC05" />-->
<!--                  <path d="M16.9166 6.18C19.9127 6.18 21.9501 7.48 23.0886 8.56L27.6027 4.16C24.8263 1.58 21.231 0 16.9166 0C10.6648 0 5.27181 3.6 2.63525 8.82L7.80851 12.84C9.10681 8.98 12.6821 6.18 16.9166 6.18Z" fill="#EB4335" />-->
<!--                </g>-->
<!--                <defs>-->
<!--                  <clipPath id="clip0_4132_5805">-->
<!--                    <rect width="32" height="32" fill="white" transform="translate(0.937439)" />-->
<!--                  </clipPath>-->
<!--                </defs>-->
<!--              </svg>-->
<!--              Connect Google Account-->
<!--            </button>-->

<!--            <button type="button" class="m-1 py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--              <svg class="size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7326 0C9.96372 0.00130479 8.53211 1.43397 8.53342 3.19935C8.53211 4.96473 9.96503 6.39739 11.7339 6.39869H14.9345V3.20065C14.9358 1.43527 13.5029 0.00260958 11.7326 0C11.7339 0 11.7339 0 11.7326 0M11.7326 8.53333H3.20053C1.43161 8.53464 -0.00130383 9.9673 3.57297e-06 11.7327C-0.00261123 13.4981 1.4303 14.9307 3.19922 14.9333H11.7326C13.5016 14.932 14.9345 13.4994 14.9332 11.734C14.9345 9.9673 13.5016 8.53464 11.7326 8.53333V8.53333Z" fill="#36C5F0" />-->
<!--                <path fill-rule="evenodd" clip-rule="evenodd" d="M32 11.7327C32.0013 9.9673 30.5684 8.53464 28.7995 8.53333C27.0306 8.53464 25.5976 9.9673 25.5989 11.7327V14.9333H28.7995C30.5684 14.932 32.0013 13.4994 32 11.7327ZM23.4666 11.7327V3.19935C23.4679 1.43527 22.0363 0.00260958 20.2674 0C18.4984 0.00130479 17.0655 1.43397 17.0668 3.19935V11.7327C17.0642 13.4981 18.4971 14.9307 20.2661 14.9333C22.035 14.932 23.4679 13.4994 23.4666 11.7327Z" fill="#2EB67D" />-->
<!--                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2661 32C22.035 31.9987 23.4679 30.566 23.4666 28.8007C23.4679 27.0353 22.035 25.6026 20.2661 25.6013H17.0656V28.8007C17.0642 30.5647 18.4972 31.9974 20.2661 32ZM20.2661 23.4654H28.7995C30.5684 23.4641 32.0013 22.0314 32 20.266C32.0026 18.5006 30.5697 17.068 28.8008 17.0654H20.2674C18.4985 17.0667 17.0656 18.4993 17.0669 20.2647C17.0656 22.0314 18.4972 23.4641 20.2661 23.4654V23.4654Z" fill="#ECB22E" />-->
<!--                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.93953e-07 20.266C-0.00130651 22.0314 1.43161 23.4641 3.20052 23.4654C4.96944 23.4641 6.40235 22.0314 6.40105 20.266V17.0667H3.20052C1.43161 17.068 -0.00130651 18.5006 8.93953e-07 20.266ZM8.53342 20.266V28.7993C8.53081 30.5647 9.96372 31.9974 11.7326 32C13.5016 31.9987 14.9345 30.566 14.9332 28.8007V20.2686C14.9358 18.5032 13.5029 17.0706 11.7339 17.068C9.96372 17.068 8.53211 18.5006 8.53342 20.266C8.53342 20.2673 8.53342 20.266 8.53342 20.266Z" fill="#E01E5A" />-->
<!--              </svg>-->
<!--              Connect Slack Account-->
<!--            </button>-->
<!--          </div>-->
<!--          &lt;!&ndash; End Button Group &ndash;&gt;-->
<!--          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-overlay="#hs-pro-datm">-->
<!--            <svg class="hidden sm:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--              <path d="M5 12h14" />-->
<!--              <path d="M12 5v14" />-->
<!--            </svg>Add team-->
<!--          </button>-->
<!--        </div>-->
        <!-- End Empty State -->
      </div>
      <!-- End Tab Content -->
    </div>
  </div>
</template>

<style scoped>

</style>
