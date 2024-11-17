<script setup>
import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import { Head, router, usePage } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'
import MyStartupCardGrid from '@/Components/MyStartupCardGrid.vue'

const page = usePage()
const showModal = ref(false)

const startups = page.props.startups
const startupsArchived = page.props.startupsArchived

onMounted(() => {
  // console.log(startups)
})

const addNew = () => {
  router.visit(route('dashboard.startups.add'))
}
</script>

<template>
  <Head title="Loyihalarim"/>

  <CabinetLayout>
    <div class="max-w-6xl mx-auto">
      <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">
        <div
          class="p-5 space-y-4 flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
          <!-- Header -->
          <div class="flex justify-between items-center gap-x-2">
            <!-- Nav Tab -->
            <nav class="p-1  inline-flex bg-gray-100 rounded-xl dark:bg-neutral-900/50" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
              <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-sm hs-tab-active:focus:bg-gray-50 hs-tab-active:focus:text-gray-800 py-2 px-3 inline-flex justify-center items-center gap-x-2  text-sm font-medium text-gray-800 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 dark:hs-tab-active:bg-neutral-700 dark:hs-tab-active:focus:bg-neutral-800 dark:hs-tab-active:focus:text-neutral-200 active " id="hs-pro-tabs-dupt-item-open" aria-selected="true" data-hs-tab="#hs-pro-tabs-dupt-open" aria-controls="hs-pro-tabs-dupt-open" role="tab">
                {{ $t('cabinet.startup_teams.all') }}
              </button>
              <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-sm hs-tab-active:focus:bg-gray-50 hs-tab-active:focus:text-gray-800 py-2 px-3 inline-flex justify-center items-center gap-x-2  text-sm font-medium text-gray-800 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 dark:hs-tab-active:bg-neutral-700 dark:hs-tab-active:focus:bg-neutral-800 dark:hs-tab-active:focus:text-neutral-200  " id="hs-pro-tabs-dupt-item-archived" aria-selected="false" data-hs-tab="#hs-pro-tabs-dupt-archived" aria-controls="hs-pro-tabs-dupt-archived" role="tab">
                {{ $t('cabinet.startup_teams.archive') }}
              </button>
            </nav>
            <!-- End Nav Tab -->

            <!-- Form Group -->
            <div class="flex justify-end items-center gap-x-2">
              <!-- Button -->
              <button type="button" @click="addNew" class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                <svg class="hidden sm:block shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8 1C8.55228 1 9 1.44772 9 2V7L14 7C14.5523 7 15 7.44771 15 8C15 8.55228 14.5523 9 14 9L9 9V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V9.00001L2 9.00001C1.44772 9.00001 1 8.5523 1 8.00001C0.999999 7.44773 1.44771 7.00001 2 7.00001L7 7.00001V2C7 1.44772 7.44772 1 8 1Z" />
                </svg>
                {{ $t('cabinet.dashboard.add_startup') }}
              </button>
              <!-- End Button -->

              <!-- Button Group -->
              <div
                class="p-[3px] flex items-center bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700">
                <a class="inline-flex shrink-0 justify-center items-center size-[30px] border-md text-gray-800 rounded-md disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 bg-gray-100 focus:bg-gray-200 focus:text-gray-800 dark:focus:text-neutral-200 dark:bg-neutral-700 dark:focus:bg-neutral-600 "
                   href="#"
                >
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="7" x="3" y="3" rx="1"/>
                    <rect width="7" height="7" x="14" y="3" rx="1"/>
                    <rect width="7" height="7" x="14" y="14" rx="1"/>
                    <rect width="7" height="7" x="3" y="14" rx="1"/>
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
              <!-- Startups Grid -->
              <div class="grid sm:grid-cols-1 xl:grid-cols-2 gap-5">

                <div>
                  <!-- Grid -->
                  <div class="grid gap-y-5">
                    <!-- Startup Card -->
                    <template v-for="startup in startups.data" :key="startup.id">
                      <MyStartupCardGrid
                        :startup="startup"
                      />
                    </template>
                    <!-- End Startup Card -->
                  </div>
                  <!-- End Grid -->
                </div>
                <!-- End Col -->

              </div>
              <!-- End Startups Grid -->

              <!--        <div class="mt-5">-->
              <!--          &lt;!&ndash; Footer &ndash;&gt;-->
              <!--          <div class="grid grid-cols-2 items-center gap-y-2 sm:gap-y-0 sm:gap-x-5">-->
              <!--            <p class="text-sm text-gray-800 dark:text-neutral-200">-->
              <!--              <span class="font-medium">8</span>-->
              <!--              <span class="text-gray-500 dark:text-neutral-500">results</span>-->
              <!--            </p>-->

              <!--            &lt;!&ndash; Pagination &ndash;&gt;-->
              <!--            <nav class="flex justify-end items-center gap-x-1" aria-label="Pagination">-->
              <!--              <button type="button"-->
              <!--                      class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-white dark:hover:bg-white/10 dark:focus:bg-neutral-700"-->
              <!--                      aria-label="Previous">-->
              <!--                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
              <!--                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
              <!--                     stroke-linejoin="round">-->
              <!--                  <path d="m15 18-6-6 6-6"/>-->
              <!--                </svg>-->
              <!--                <span class="sr-only">Previous</span>-->
              <!--              </button>-->
              <!--              <div class="flex items-center gap-x-1">-->
              <!--                <span-->
              <!--                    class="min-h-[38px] min-w-[38px] flex justify-center items-center bg-gray-100 text-gray-800 py-2 px-3 text-sm rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:text-white"-->
              <!--                    aria-current="page">1</span>-->
              <!--                <span-->
              <!--                    class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-sm dark:text-neutral-500">of</span>-->
              <!--                <span-->
              <!--                    class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-sm dark:text-neutral-500">3</span>-->
              <!--              </div>-->
              <!--              <button type="button"-->
              <!--                      class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-white dark:hover:bg-white/10 dark:focus:bg-neutral-700"-->
              <!--                      aria-label="Next">-->
              <!--                <span class="sr-only">Next</span>-->
              <!--                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
              <!--                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
              <!--                     stroke-linejoin="round">-->
              <!--                  <path d="m9 18 6-6-6-6"/>-->
              <!--                </svg>-->
              <!--              </button>-->
              <!--            </nav>-->
              <!--            &lt;!&ndash; End Pagination &ndash;&gt;-->
              <!--          </div>-->
              <!--          &lt;!&ndash; End Footer &ndash;&gt;-->
              <!--        </div>-->
            </div>
            <!-- End Tab Content -->

            <!-- Tab Content -->
            <div id="hs-pro-tabs-dupt-archived" role="tabpanel" class="hidden"
                 aria-labelledby="hs-pro-tabs-dupt-item-archived">
              <!-- Startups Grid -->
              <div class="grid sm:grid-cols-1 xl:grid-cols-2 gap-5">
                <div>
                  <!-- Grid -->
                  <div class="grid gap-y-5">
                    <!-- Startup Card -->
                    <template v-for="startup in startupsArchived.data" :key="startup.id">
                      <MyStartupCardGrid
                        :startup="startup"
                      />
                    </template>
                    <!-- End Startup Card -->
                  </div>
                  <!-- End Grid -->
                </div>
                <!-- End Col -->

              </div>
              <!-- End Startups Grid -->
            </div>
            <!-- End Tab Content -->
          </div>
        </div>
      </div>
    </div>
  </CabinetLayout>
</template>

<style scoped>
.common-layout {
  padding: 20px;
}

.el-row {
  margin-bottom: 20px;
}

.el-card {
  cursor: pointer;
}

.startup-card {
  margin-bottom: 20px;
}

.aside {
  background-color: #f9f9f9;
  padding: 20px;
}

@media (max-width: 768px) {
  .el-container {
    flex-direction: column !important;
  }
  .aside {
    width: 100%;
    margin-bottom: 20px;
  }
  .el-main {
    width: 100%;
  }
}
</style>
