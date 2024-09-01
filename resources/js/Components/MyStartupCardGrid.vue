<script setup>
import { Link, router } from '@inertiajs/vue3'
import { reactive } from 'vue'
import { useUserStore } from '@/stores/UserStore.js'
import { useFormatFriendlyDate } from '@/Composables/helpers.js'

const props = defineProps({
  startup: Object,
});

const user = reactive(useUserStore().authUser)


const viewStartup = (id) => {
  router.visit(route('dashboard.startups.show', { id }));
}

const { formatFriendlyDate } = useFormatFriendlyDate()

</script>

<template>
  <div
    class="p-4 flex flex-col bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
<!--    <img class="mb-4 w-full object-cover rounded-xl"-->
<!--         src="https://images.unsplash.com/photo-1635776062127-d379bfcba9f8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80"-->
<!--         alt="Avatar">-->

    <div class="flex justify-between items-center gap-x-2">
      <Link :href="route('startups.show', startup.id)" class="inline-flex items-center gap-x-1 text-gray-800 decoration-2 hover:underline font-medium hover:text-blue-600 focus:outline-none focus:underline focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:outline-none dark:focus:text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-view"><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/><circle cx="12" cy="12" r="1"/><path d="M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0"/></svg>
        Saytda ko'rish
      </Link>

    </div>

    <p class="mt-1 text-md text-dark-200 dark:text-neutral-200">
      {{ startup.title }}
    </p>

    <p class="text-sm mt-4 text-dark-500 dark:text-neutral-300">
      📝 Eslatma: {{ startup.additional_information }}
    </p>

    <p class="text-sm mt-1 text-dark-500 dark:text-neutral-300">
      📅 Boshlanish Sanasi: {{ formatFriendlyDate(startup.start_date) }}
    </p>

    <p class="text-sm mt-1 text-dark-500 dark:text-neutral-300">
      📢 Turi:
      <span class="p-2 inline-block bg-blue-100 text-blue-800 text-xs rounded-md dark:bg-blue-100 dark:text-blue-700">{{ startup.type }}</span>
    </p>

    <p class="text-sm mt-1 text-dark-500 dark:text-neutral-300">
      MVP versiyasi mavjud:
      <span v-if="startup.has_mvp" class="m-1 p-2 inline-block bg-green-100 text-green-800 text-xs rounded-md dark:bg-green-100 dark:text-green-700">Ha</span>
      <span v-else class="m-1 p-2 inline-block bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">Yo'q</span>
    </p>

    <!-- Badge Group -->
    <div class="mt-1 -mx-1 text-sm text-dark-500 dark:text-neutral-300">
      🔍 Sanoat tarmoqlari:
      <template v-for="industry in startup.industries" :key="industry.id">
        <span class="m-1 p-2 inline-block bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">{{ industry.title }}</span>
      </template>
    </div>
    <!-- End Badge Group -->

    <!-- Avatar Group -->
    <div class="mt-2 flex items-center gap-x-3">
      <h4 class="text-sm text-dark-500 dark:text-neutral-200">
        Holati: <span class="m-1 p-2 inline-block bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200">{{ startup.status.label }}</span>
      </h4>
<!--      <h4 class="text-xs uppercase text-gray-500 dark:text-neutral-200">-->
<!--        Members:-->
<!--      </h4>-->
<!--      <div class="ms-auto">-->
<!--        <div class="flex items-center -space-x-2">-->
<!--          <img class="shrink-0 size-7 rounded-full"-->
<!--               src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80"-->
<!--               alt="Avatar">-->
<!--          <span-->
<!--            class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">L</span>-->
<!--          <img class="shrink-0 size-7 rounded-full"-->
<!--               src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80"-->
<!--               alt="Avatar">-->
<!--          <img class="shrink-0 size-7 rounded-full"-->
<!--               src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80"-->
<!--               alt="Avatar">-->
<!--          <span-->
<!--            class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 text-gray-700 text-xs font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">O</span>-->
<!--        </div>-->
<!--      </div>-->
    </div>
    <!-- End Avatar Group -->

    <div class="mt-5">
      <button type="button"
              @click="viewStartup(startup.id)"
              class="py-2 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
              data-hs-overlay="#hs-pro-dtlam">
        Batafsil
      </button>
    </div>
  </div>
</template>

<style lang="scss" scoped>

</style>
