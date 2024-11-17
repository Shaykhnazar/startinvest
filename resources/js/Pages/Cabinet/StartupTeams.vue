<script setup>

import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import { Head, usePage } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'
import CabinetProfileTeamModals from '@/Components/CabinetProfileTeamModals.vue'
import CabinetProfileUserCardSection from '@/Components/CabinetProfileUserCardSection.vue'
import CabinetStartupTeamsGridSection from '@/Components/CabinetStartupTeamsGridSection.vue'
import CabinetStartupTeamsListSection from '@/Components/CabinetStartupTeamsListSection.vue'
import { useUserStore } from '@/stores/UserStore.js'

const userStore = useUserStore();

const startupTeams = usePage().props.startups.data
const contributedStartups = usePage().props.contributedStartups.data
const joinRequests = usePage().props.joinRequests.data
// Create a reactive variable to track the display type
const displayType = ref('list')


// Retrieve the display type from localStorage on component mount
onMounted(() => {
  // console.log(startupTeams)
  userStore.updateContributedStartups(contributedStartups)
  userStore.updateUserJoinRequests(joinRequests)
  const storedDisplayType = localStorage.getItem('profile-startup-teams-display_type')
  if (storedDisplayType) {
    displayType.value = storedDisplayType
  }
})

// Function to update display type and store it in localStorage
const setDisplayType = (type) => {
  displayType.value = type
  localStorage.setItem('profile-startup-teams-display_type', type)
}
</script>

<template>
  <CabinetLayout>
    <template #header>
      <Head :title="$t('cabinet.startup_teams.title')" />
    </template>

    <div class="max-w-6xl mx-auto">
      <!-- Breadcrumb -->
      <ol class="md:hidden pt-3 pb-1 sm:pb-3 px-2 sm:px-5 flex items-center whitespace-nowrap">
        <li class="flex items-center text-sm text-gray-600 dark:text-neutral-500">
          {{ $t('cabinet.startup_teams.breadcrumb_user_profile') }}
          <svg class="shrink-0 overflow-visible size-4 ms-1.5 text-gray-400 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
          </svg>
        </li>
        <li class="ps-1.5 flex items-center font-semibold text-gray-800 dark:text-neutral-200 text-sm">
          {{ $t('cabinet.startup_teams.breadcrumb_teams') }}
        </li>
      </ol>
      <!-- End Breadcrumb -->

      <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">
        <!-- User Profile Card -->
        <cabinet-profile-user-card-section/>
        <!-- End User Profile Card -->

        <!-- Teams -->
        <!-- Conditionally render grid or list section -->
        <component
          :is="displayType === 'list' ? CabinetStartupTeamsListSection : CabinetStartupTeamsGridSection"
          @updateDisplayType="setDisplayType"
          :startup-teams="startupTeams"
          :contributed-startups="contributedStartups"
          :join-requests="joinRequests"
        />
        <!-- End Teams -->
      </div>
    </div>

<!--    <cabinet-profile-team-modals/>-->
  </CabinetLayout>
</template>

