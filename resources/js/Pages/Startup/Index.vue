<script setup>
import { Head, usePage, router } from '@inertiajs/vue3';
import App from '@/Layouts/App.vue';
import StartupCard from '@/Components/StartupCard.vue';
import { ref, reactive, watch, computed } from 'vue';
import { usePaginationLoadMore } from '@/Composables/usePaginationLoadMore.js'
import _ from 'lodash'

// Data from the server
const page = usePage();
const industries = ref(page.props.industries.data || []);
const statusOptions = ref(page.props.startupStatuses.data || []);
const filters = reactive({ ...page.props.filters } || {});

// Startup data and pagination logic
const { items, loadMoreItems, canLoadMoreItems, loading, resetItems } = usePaginationLoadMore('startups');

// Apply filters
const applyFilters = () => {
  // console.log(page.url)

  router.get(page.url, { ...filters, page: 1 }, {
    replace: true,
    preserveScroll: true,
    preserveState: true,
    onSuccess: (page) => {
      resetItems();
    }
  });
}

const applyFiltersWithDelay = _.debounce(applyFilters, 800);

const clearFilters = () => {
  filters.search = null;
  filters.industry_id = null;
  filters.status_id = null;
  filters.sort = null;
  filters.page = 1;
  applyFilters(true);
}

// Watch for filter changes and reset items
// watch(filters, () => {
//   resetItems();
//   applyFiltersWithDelay();
// }, { deep: true });
</script>

<template>
  <App>
    <template #header>
      <Head :title="$t('site.startup.title')" />
    </template>
<!--    <el-backtop :right="50" :bottom="50" :visibility-height="300" />-->

    <el-container>
      <el-aside class="hidden md:block">
      </el-aside>
      <el-main style="padding-top: 0px">
        <!-- Filter Group -->
        <div class="py-4 grid lg:grid-cols-2 gap-y-2 lg:gap-y-0 lg:gap-x-5">
          <div>
            <!-- Search Input -->
            <div class="relative">
              <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
              </div>
              <input
                v-model="filters.search"
                @input="applyFiltersWithDelay"
                type="text"
                class="py-2 px-3 ps-10 pe-8 block w-full bg-white border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-transparent dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600"
                :placeholder="$t('site.startup.filters.search_placeholder')"
              />
              <div class="hidden absolute inset-y-0 end-0 items-center pointer-events-none z-20 pe-1">
                <button type="button" class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" aria-label="Close">
                  <span class="sr-only">{{ $t('site.startup.filters.close') }}</span>
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                </button>
              </div>
            </div>
            <!-- End Search Input -->
          </div>
          <!-- End Col -->

          <div class="flex lg:justify-end items-center flex-wrap gap-y-2 gap-x-1">
            <!-- Industriya -->
            <div class="relative">
              <select :data-hs-select='JSON.stringify({
                "placeholder": $t("site.startup.filters.industry_placeholder"),
                "hasSearch": true,
                "searchPlaceholder": $t("site.startup.filters.select_industry"),
                "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 py-2 px-3",
                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-3 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                "dropdownClasses": "max-h-64 p-1 pt-0 space-y-0.5 z-50 w-full overflow-hidden overflow-y-auto bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900",
                "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",
                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200\" data-title></div></div></div>"
              })'
                class="hidden"
                v-model="filters.industry_id"
              >
                <option value="">{{ $t("site.startup.filters.select") }}</option>

                <option v-for="industry in industries" :key="industry.id" :value="industry.id" :label="industry.title">
                  {{ industry.title }}
                </option>
              </select>

              <div class="absolute top-1/2 end-2.5 -translate-y-1/2">
                <svg class="shrink-0 size-3.5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
              </div>
            </div>
            <!-- End Select -->

            <!-- Status -->
            <div class="relative inline-block">
              <select id="hs-pro-select-with-icons" :data-hs-select='JSON.stringify({
                "placeholder": $t("site.startup.filters.status_placeholder"),
                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-3 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                "dropdownClasses": "end-0 mt-2 p-1 space-y-0.5 z-50 w-40 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-900",
                "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 flex gap-x-3 py-1.5 px-2 text-[13px] text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",
                "optionTemplate": "<div class=\"flex items-center w-full\"><div class=\"me-2 sm:me-3\" data-icon></div><span data-title></span><span class=\"hidden hs-selected:block ms-auto\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
              })'
                class="hidden"
                v-model="filters.status_id"
              >
                <option value="">{{ $t("site.startup.filters.select") }}</option>
                <option v-for="(status, index) in statusOptions" :key="index" :value="status.id" :label="status.label">
                  {{ status.label }}
                </option>
              </select>

              <div class="absolute top-1/2 end-2.5 -translate-y-1/2">
                <svg class="shrink-0 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
              </div>
            </div>
            <!-- End Select -->

            <!-- Sort -->
            <div class="relative inline-flex items-center mr-1">
              <select id="hs-pro-select-sorting" :data-hs-select='JSON.stringify({
                "placeholder": $t("site.startup.filters.sort_placeholder"),
                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"-ms-0.5 me-1.5\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-3 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                "dropdownClasses": "mt-2 z-50 w-36 p-1 space-y-0.5 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-900",
                "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-3 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div data-title></div></div><div class=\"text-sm text-gray-500 dark:text-neutral-500\" data-description></div></div>",
                "viewport": "#hs-modal-status-body"
               })'
                class="hidden"
                v-model="filters.sort"
              >
                <option value="">{{ $t("site.startup.filters.select") }}</option>
                <option value="created_at-desc" selected data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m3 16 4 4 4-4\"/><path d=\"M7 20V4\"/><rect x=\"15\" y=\"4\" width=\"4\" height=\"6\" ry=\"2\"/><path d=\"M17 20v-6h-2\"/><path d=\"M15 20h4\"/></svg>"
                  }'>{{ $t("site.startup.filters.newest_first") }}</option>
                <option value="created_at-asc" data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m3 16 4 4 4-4\"/><path d=\"M7 20V4\"/><path d=\"M17 10V4h-2\"/><path d=\"M15 10h4\"/><rect x=\"15\" y=\"14\" width=\"4\" height=\"6\" ry=\"2\"/></svg>"
                  }'>{{ $t("site.startup.filters.oldest_first") }}</option>
                <option value="title-asc" data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m3 16 4 4 4-4\"/><path d=\"M7 20V4\"/><path d=\"M20 8h-5\"/><path d=\"M15 10V6.5a2.5 2.5 0 0 1 5 0V10\"/><path d=\"M15 14h5l-5 6h5\"/></svg>"
                  }'>{{ $t("site.startup.filters.alphabetical") }}</option>
                <option value="title-desc" data-hs-select-option='{
                    "icon": "<svg class=\"shrink-0 size-4\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m3 8 4-4 4 4\"/><path d=\"M7 4v16\"/><path d=\"M20 8h-5\"/><path d=\"M15 10V6.5a2.5 2.5 0 0 1 5 0V10\"/><path d=\"M15 14h5l-5 6h5\"/></svg>"
                  }'>{{ $t("site.startup.filters.reverse_alphabetical") }}</option>
              </select>

              <div class="absolute top-1/2 end-2.5 -translate-y-1/2">
                <svg class="shrink-0 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
              </div>
            </div>
            <!-- End Select -->

            <div class="relative inline-flex justify-end">
              <!-- Filter Button -->
              <button
                type="button"
                @click="applyFilters"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                {{ $t("site.startup.actions.filter") }}
              </button>

              <!-- Clear Button -->
              <button
                type="button"
                @click="clearFilters"
                class="inline-flex items-center px-4 py-2 ml-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                {{ $t("site.startup.actions.clear") }}
              </button>
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Filter Group -->

        <!-- STARTUP LIST -->
        <div class="space-y-3">
          <template v-for="startup in items" :key="startup.id">
            <StartupCard
              :startup="startup"
            />
          </template>
        </div>

<!--        <div ref="landmark"></div>-->
        <!-- Load More Button -->
        <div class="flex justify-center mt-6">
          <el-button
            v-if="canLoadMoreItems"
            @click="loadMoreItems"
            :loading="loading"
            type="primary"
            class="py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-500">
            {{ $t("site.startup.actions.load_more") }}
          </el-button>
        </div>
      </el-main>
    </el-container>
  </App>
</template>


<style lang="scss" scoped>
</style>
