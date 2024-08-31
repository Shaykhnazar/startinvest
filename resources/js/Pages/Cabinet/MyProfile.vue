<script setup>

import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import { Head } from '@inertiajs/vue3'
import CabinetProfileEventModals from '@/Components/CabinetProfileEventModals.vue'
import CabinetAddProjectModal from '@/Components/CabinetAddProjectModal.vue'
import CabinetProfileUserCardSection from '@/Components/CabinetProfileUserCardSection.vue'
import CabinetProfileSidebarSection from '@/Components/CabinetProfileSidebarSection.vue'
import CabinetProfileMain from '@/Components/CabinetProfileMainSection.vue'
</script>

<template>
  <CabinetLayout>
    <template #header>
      <Head title="Shaxsiy profil"/>
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
      <li class="ps-1.5 flex items-center font-semibold text-gray-800 dark:text-neutral-200 text-sm">
        My Profile
      </li>
    </ol>
    <!-- End Breadcrumb -->

    <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">
      <!-- User Profile Card -->
      <cabinet-profile-user-card-section/>
      <!-- End User Profile Card -->

      <!-- Sidebar Toggle -->
      <cabinet-profile-sidebar-section/>
      <!-- End Sidebar Toggle -->

      <!-- Projects -->
      <cabinet-profile-main/>
      <!-- End Projects -->

<!--      <cabinet-profile-event-modals/>-->
<!--      <cabinet-add-project-modal/>-->
    </div>
  </div>
  </CabinetLayout>
</template>

