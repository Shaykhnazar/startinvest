<template>
  <App>
    <template #header>
      <Head title="Startups" />
    </template>
    <el-backtop :right="50" :bottom="50" :visibility-height="300" />

    <el-container>
      <el-aside class="hidden md:block">
<!--        <div class="hs-accordion-group">-->
<!--          <div class="hs-accordion active" id="hs-unstyled-heading-one">-->
<!--            <button class="hs-accordion-toggle" aria-expanded="true" aria-controls="hs-unstyled-collapse-one">-->
<!--              Accordion #1-->
<!--            </button>-->
<!--            <div id="hs-unstyled-collapse-one" class="hs-accordion-content overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-unstyled-heading-one">-->
<!--              It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="hs-accordion" id="hs-unstyled-heading-two">-->
<!--            <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-unstyled-collapse-two">-->
<!--              Accordion #2-->
<!--            </button>-->
<!--            <div id="hs-unstyled-collapse-two" class="hs-accordion-content hidden overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-unstyled-heading-two">-->
<!--              It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.-->
<!--            </div>-->
<!--          </div>-->

<!--          <div class="hs-accordion" id="hs-unstyled-heading-three">-->
<!--            <button class="hs-accordion-toggle" aria-expanded="false" aria-controls="hs-unstyled-collapse-three">-->
<!--              Accordion #3-->
<!--            </button>-->
<!--            <div id="hs-unstyled-collapse-three" class="hs-accordion-content hidden overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-unstyled-heading-three">-->
<!--              It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
      </el-aside>
      <el-main>
        <!-- Filter Group -->
        <div class="py-4 grid lg:grid-cols-2 gap-y-2 lg:gap-y-0 lg:gap-x-5 border-y border-gray-200 dark:border-neutral-700">
          <div>
            <!-- Search Input -->
            <div class="relative">
              <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
              </div>
              <input type="text" class="py-2 px-3 ps-10 pe-8 block w-full bg-white xl:bg-gray-100 border-gray-200 xl:border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 xl:dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600" placeholder="Startup nomi yoki kalit so'z bo'yicha qidiring">
              <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1">
                <button type="button" class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                </button>
              </div>
            </div>
            <!-- End Search Input -->
          </div>
          <!-- End Col -->

<!--          <div class="flex lg:justify-end items-center flex-wrap gap-x-1">-->
<!--            &lt;!&ndash; Industriya &ndash;&gt;-->
<!--            <div class="relative">-->
<!--              <select  data-hs-select='{-->
<!--                "placeholder": "Turkumini tanlang",-->
<!--                "hasSearch": true,-->
<!--                "searchPlaceholder": "Turkumini tanlang",-->
<!--                "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 py-2 px-3",-->
<!--                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",-->
<!--                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",-->
<!--                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-3 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",-->
<!--                "dropdownClasses": "max-h-64 p-1 pt-0 space-y-0.5 z-50 w-full overflow-hidden overflow-y-auto bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900",-->
<!--                "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200\" data-title></div></div></div>",-->
<!--                "viewport": "#@@viewportID"-->
<!--              }' class="hidden">-->
<!--                <option value="">Tanlang</option>-->

<!--                <option v-for="industry in industries" :key="industry.id" :value="industry.id" :label="industry.title">-->
<!--                  {{ industry.title }}-->
<!--                </option>-->
<!--              </select>-->

<!--              <div class="absolute top-1/2 end-2.5 -translate-y-1/2">-->
<!--                <svg class="shrink-0 size-3.5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>-->
<!--              </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Select &ndash;&gt;-->

<!--            &lt;!&ndash; Status &ndash;&gt;-->
<!--            <div class="relative inline-block">-->
<!--              <select id="hs-pro-select-with-icons" data-hs-select='{-->
<!--                "placeholder": "Holati",-->
<!--                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative p-2 pe-8 inline-flex shrink-0 justify-center items-center gap-x-1.5 border border-transparent text-sm text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-800 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:xl:bg-neutral-800 dark:hover:bg-neutral-700 dark:hover:text-neutral-200 dark:focus:bg-neutral-700",-->

<!--                "dropdownClasses": "end-0 mt-2 p-1 space-y-0.5 z-50 w-40 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-900",-->
<!--                "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 flex gap-x-3 py-1.5 px-2 text-[13px] text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                "optionTemplate": "<div class=\"flex items-center w-full\"><div class=\"me-2 sm:me-3\" data-icon></div><span data-title></span><span class=\"hidden hs-selected:block ms-auto\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"-->
<!--              }' class="hidden">-->
<!--                <option value="">Tanlang</option>-->
<!--                <option v-for="(status, index) in statusOptions" :key="index" :value="status.value" :label="status.label">-->
<!--                  {{ status.label }}-->
<!--                </option>-->
<!--              </select>-->

<!--              <div class="absolute top-1/2 end-2.5 -translate-y-1/2">-->
<!--                <svg class="shrink-0 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>-->
<!--              </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Select &ndash;&gt;-->

<!--            &lt;!&ndash; Sort &ndash;&gt;-->
<!--            <div class="relative inline-flex items-center">-->
<!--              <span class="me-1 text-sm text-gray-800 dark:text-neutral-200">Saralash:</span>-->
<!--              <select id="hs-pro-select-sort" data-hs-select='{-->
<!--                "placeholder": "Saralash",-->
<!--                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",-->
<!--                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative p-2 pe-8 inline-flex shrink-0 justify-center items-center gap-x-1.5 border border-transparent text-sm text-gray-500 rounded-lg hover:bg-gray-100 hover:text-gray-800 focus:outline-none focus:bg-gray-100 before:absolute before:inset-0 before:z-[1] dark:text-neutral-400 dark:xl:bg-neutral-800 dark:hover:bg-neutral-700 dark:hover:text-neutral-200 dark:focus:bg-neutral-700",-->
<!--                "dropdownClasses": "end-0 mt-2 p-1 space-y-0.5 z-50 w-32 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-900",-->
<!--                "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 flex gap-x-3 py-1.5 px-2 text-[13px] text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
<!--                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div>"-->
<!--              }' class="hidden">-->
<!--                <option value="">Tanlash</option>-->
<!--                <option selected>Yangilari birinchi</option>-->
<!--              </select>-->

<!--              <div class="absolute top-1/2 end-2.5 -translate-y-1/2">-->
<!--                <svg class="shrink-0 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>-->
<!--              </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; End Select &ndash;&gt;-->
<!--          </div>-->
          <!-- End Col -->
        </div>
        <!-- End Filter Group -->

        <!-- STARTUP LIST -->
        <div class="space-y-3">
          <template v-for="startup in startups.data" :key="startup.id">
            <StartupCard
              :startup="startup"
            />
          </template>
        </div>

        <div ref="landmark"></div>
      </el-main>
    </el-container>
  </App>
</template>

<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import App from '@/Layouts/App.vue';
import StartupCard from '@/Components/StartupCard.vue';
import { ref } from 'vue'

const page = usePage()
const industries = ref(page.props.industries.data || []) // Get industries from props
const statusOptions = ref(page.props.startupStatuses);

const props = defineProps({
  startups: {
    type: Object,
    required: true
  }
});


</script>

<style lang="scss" scoped>
</style>
