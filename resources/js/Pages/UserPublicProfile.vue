<script setup>

import { Head, usePage } from '@inertiajs/vue3'
import { onMounted } from 'vue'
import App from '@/Layouts/App.vue'
import PublicProfileUserCardSection from '@/Components/PublicProfileUserCardSection.vue'

const page = usePage();
const user = page.props.user.data;

// onMounted(() => {
//   console.log(user)
// })

</script>

<template>
  <App>
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
<!--      <li class="ps-1.5 flex items-center font-semibold text-gray-800 dark:text-neutral-200 text-sm">-->
<!--        User Profile-->
<!--      </li>-->
    </ol>
    <!-- End Breadcrumb -->

    <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">
      <!-- User Profile Card -->
      <public-profile-user-card-section :is-public="true" :user="user"/>
      <!-- End User Profile Card -->
    </div>
  </div>
  </App>
</template>

<style scoped>

</style>
