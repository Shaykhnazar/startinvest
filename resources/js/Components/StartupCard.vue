<script setup>
import { Link } from '@inertiajs/vue3'
import { useStartupTeamActions } from '@/Composables/useStartupTeamActions.js';

const props = defineProps({
  startup: Object,
});

const {
  handleJoinRequest,
  buttonText,
} = useStartupTeamActions(props.startup);
</script>

<template>
  <div
    class="p-4 relative flex flex-col bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
    <div class="grid lg:grid-cols-12 gap-y-2 lg:gap-y-0 gap-x-4">
      <div class="lg:col-span-3">
        <p>
          <Link :href="route('startups.show', startup.id)" class="inline-flex items-center gap-x-1 text-gray-800 decoration-2 hover:underline font-medium hover:text-blue-600 focus:outline-none focus:underline focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:outline-none dark:focus:text-blue-500">
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-view"><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/><circle cx="12" cy="12" r="1"/><path d="M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0"/></svg>-->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-view"><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/><circle cx="12" cy="12" r="1"/><path d="M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0"/></svg>
            Tanishish
          </Link>
        </p>

        <!-- Badge Group -->
        <div class="mt-1 lg:mt-2 -mx-0.5 sm:-mx-1">
          <template v-for="industry in startup.industries" :key="industry.id">
            <span class="m-0.5 sm:m-1 p-1.5 sm:p-2 inline-block bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">{{ industry.title }}</span>
          </template>
        </div>
        <!-- End Badge Group -->
      </div>
      <!-- End Col -->

      <div class="lg:col-span-6">
        <p class="mt-1 text-md text-dark-500 dark:text-neutral-200">
          {{ startup.title }}
        </p>

        <!-- Avatar Group -->
        <div class="mt-2 flex items-center gap-x-3">
          <h4 class="text-xs text-gray-500 dark:text-neutral-400">
            Holati: <span class="lowercase">{{ startup.status.label }}</span>
          </h4>
<!--          <h4 class="text-xs uppercase text-gray-500 dark:text-neutral-200">-->
<!--            Members:-->
<!--          </h4>-->
<!--          <div class="flex items-center -space-x-2">-->
<!--            <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--            <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">L</span>-->
<!--            <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--            <img class="shrink-0 size-7 rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">-->
<!--            <span class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">O</span>-->
<!--          </div>-->
        </div>
        <!-- End Avatar Group -->
      </div>
      <!-- End Col -->

      <div class="lg:col-span-3">
        <!-- Button Group -->
        <div class="flex lg:flex-col justify-end items-center gap-2 border-t border-gray-200 lg:border-t-0 pt-3 lg:pt-0 dark:border-neutral-700">
          <div class="lg:order-2 lg:ms-auto" v-if="user?.id !== startup.owner.id">
            <button type="button" @click="handleJoinRequest(startup.id)" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dtlam">
              {{ buttonText }}
            </button>
          </div>
        </div>
        <!-- End Button Group -->
      </div>
      <!-- End Col -->
    </div>
  </div>
</template>

<style lang="scss" scoped>

</style>
