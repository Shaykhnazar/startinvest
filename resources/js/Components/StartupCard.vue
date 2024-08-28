<script setup>
import { useUserStore } from '@/stores/UserStore.js';
import api from '@/services/api.js';
import { useElMessage } from '@/Composables/helpers.js'
import { usePage, Link } from '@inertiajs/vue3'
import { JOIN_REQUEST_STATUSES } from '@/services/const.js'
import { computed, onMounted } from 'vue'

const { success, info, warning } = useElMessage()
const userStore = useUserStore()

const user = userStore.authUser

const props = defineProps({
  startup: Object,
});

const showConfirmationDialog = (callback, confirmText) => {
  // console.log('Opening confirmation dialog...');
  if (window.confirm(confirmText)) {
    callback();
  }
}

const handleJoinRequest = (startupId) => {
  if (joinPreCheck()) {
    if (userStore.hasPendingJoinRequest(startupId)) {
      // Cancel the pending request
      showConfirmationDialog(() => cancelJoining(startupId), 'So\'rovni bekor qilmoqchimisiz?');
    } else if (userStore.isContributor(startupId)) {
      // Leave the team
      showConfirmationDialog(() => leaveTeam(startupId), 'Jamoani tark etmoqchimisiz?');
    } else {
      // Prompt user to send a join request
      showConfirmationDialog(() => sendJoinRequest(startupId), 'Jamoaga qo\'shilish uchun so\'rov yuborishni xohlaysizmi?');
    }
  }
}

const sendJoinRequest = async (startupId) => {
  try {
    await api.startups.sendRequest(startupId, {
      status: JOIN_REQUEST_STATUSES.PENDING
    })
    success('Jamoaga qo\'shilish so\'rovi muvaffaqiyatli yuborildi!')
    refreshJoinRequests();
  } catch (error) {
    console.error('Jamoaga qo\'shilish so\'rovini yuborishda xato:', error)
    info('Jamoaga qo\'shilish so\'rovini yuborishda xatolik')
  }
}

const cancelJoining = async (startupId, ) => {
  try {
    const request = userStore.getJoinRequest(startupId);
    await api.startups.handleJoinRequest(startupId, {
      requestId: request?.id,
      fromStatus: request?.status,
      toStatus: JOIN_REQUEST_STATUSES.CANCELED
    });
    warning('Jamoaga qo\'shilish so\'rovi bekor qilindi!');
    refreshJoinRequests();
  } catch (error) {
    console.error('Error cancel joining:', error);
  }
}

const leaveTeam = async (startupId) => {
  try {
    await api.startups.sendRequest(startupId, {
      status: JOIN_REQUEST_STATUSES.LEAVED
    });
    success('Jamoani tark etish so\'rovi jo\'natildi!');
    refreshJoinRequests();
  } catch (error) {
    console.error('Error leaving team:', error);
  }
}

const refreshJoinRequests = () => {
  userStore.updateUserJoinRequests(usePage().props.auth.user.data.joinRequests)
}

const buttonText = computed(() => {
  const hasPendingRequest = userStore.hasPendingJoinRequest(props.startup.id)
  const isContributor = userStore.isContributor(props.startup.id)

  if (userStore.isGuest) {
    return 'Jamoaga qo\'shilish';
  } else if (hasPendingRequest) {
    return 'Jamoaga qo\'shilish so\'rovini bekor qilish ❌';
  } else if (isContributor) {
    return 'Jamoani tark etish';
  } else {
    return 'Jamoaga qo\'shilish';
  }
})

function joinPreCheck() {
  if (userStore.isGuest) {
    info('Iltimos, so\'rov yuborish uchun tizimga kiring')
    return false
  }
  return true
}

onMounted(() => {
  // console.log(userStore.authUser)
})
</script>

<template>
  <div class="p-4 relative flex flex-col bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
    <div class="grid lg:grid-cols-12 gap-y-2 lg:gap-y-0 gap-x-4">
      <div class="lg:col-span-3">
        <p>
          <Link :href="route('startups.show', startup.id)" class="inline-flex items-center gap-x-1 text-gray-800 decoration-2 hover:underline font-semibold hover:text-blue-600 focus:outline-none focus:underline focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:outline-none dark:focus:text-blue-500">
            #Tanishish
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
            Holati: <span class="lowercase">{{ startup.status }}</span>
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
          <div class="lg:order-2 lg:ms-auto" v-if="user.id !== startup.owner.id">
            <button type="button" @click="handleJoinRequest(startup.id)" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dtlam">
              {{ buttonText }}
            </button>
          </div>

          <!-- More Dropdown -->
<!--          <div class="lg:order-1 lg:ms-auto">-->
<!--            &lt;!&ndash; More Dropdown &ndash;&gt;-->
<!--            <div class="hs-dropdown [&#45;&#45;placement:bottom-right] relative inline-flex">-->
<!--              <button id="hs-pro-dupc1" type="button" class="size-7 inline-flex justify-center items-center gap-x-2 rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-200 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">-->
<!--                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>-->
<!--              </button>-->

<!--              <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-40 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dupc1">-->
<!--                <div class="p-1">-->
<!--                  <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-pro-detm">-->
<!--                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>-->
<!--                    Edit team-->
<!--                  </button>-->
<!--                  <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">-->
<!--                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>-->
<!--                    Add to favorites-->
<!--                  </button>-->
<!--                  <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">-->
<!--                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="5" x="2" y="4" rx="2"/><path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9"/><path d="M10 13h4"/></svg>-->
<!--                    Archive team-->
<!--                  </button>-->

<!--                  <div class="my-1 border-t border-gray-200 dark:border-neutral-700"></div>-->

<!--                  <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-red-600 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-red-500 dark:hover:bg-neutral-800 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dtlam">-->
<!--                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>-->
<!--                    Delete team-->
<!--                  </button>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            &lt;!&ndash; End More Dropdown &ndash;&gt;-->
<!--          </div>-->
          <!-- End More Dropdown -->
        </div>
        <!-- End Button Group -->
      </div>
      <!-- End Col -->
    </div>
  </div>

  <!-- Add Team Modal -->
  <div id="hs-pro-datm" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--close-when-click-inside:true] pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-pro-datm-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-xl sm:w-full mx-3 mb-7 h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] sm:mx-auto">
      <div class="w-full max-h-full flex flex-col bg-white rounded-xl pointer-events-auto shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-800">
        <!-- Header -->
        <div class="py-2.5 px-4 flex justify-between items-center border-b dark:border-neutral-700">
          <h3 id="hs-pro-datm-label" class="font-medium text-gray-800 dark:text-neutral-200">
            Create team
          </h3>
          <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-pro-datm">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
          <div class="p-4 space-y-5">
            <div class="space-y-2">
              <label for="hs-pro-dactmt" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Title
              </label>

              <input id="hs-pro-dactmt" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Team title" value=" ">
            </div>

            <div class="space-y-2">
              <label for="dactmi" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Industry
              </label>

              <input id="dactmi" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter name">
            </div>

            <div class="space-y-2">
              <label for="dactmd" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Description
              </label>

              <textarea id="dactmd" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" rows="3" placeholder="Tell us a little bit about team"></textarea>
            </div>

            <div class="space-y-2">
              <label for="dactmm" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Members
              </label>

              <!-- Input Form -->
              <div class="flex items-center gap-x-3">
                <input id="dactmm" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter name">

                <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                  Add
                </button>
              </div>
              <!-- End Input Form -->
            </div>

            <div class="space-y-2">
              <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Suggested members
              </label>

              <div class="flex items-center space-x-2">
                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach1" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-dactcach1" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none"  >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  James Collins
                </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach2" class="relative block rounded-full cursor-pointer">
                    <span class="hs-tooltip-toggle flex shrink-0 justify-center items-center size-[46px] bg-white border border-gray-200 text-gray-700 font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">L</span><span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-dactcach2" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none"  >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  Lori Hunter
                </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach3" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-dactcach3" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none"  >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  Lewis Clarke
                </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach4" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-dactcach4" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none"  >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  Ella Lauda
                </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach5" class="relative block rounded-full cursor-pointer">
                    <span class="hs-tooltip-toggle flex shrink-0 justify-center items-center size-[46px] bg-white border border-gray-200 text-gray-700 font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">O</span><span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-dactcach5" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none"  >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  Ols Schols
                </span>
                </div>
                <!-- End User -->
              </div>
            </div>

            <!-- Drag 'n Drop -->
            <div class="space-y-2">
              <label class="block block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Cover
              </label>
              <div class="p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600">
                <div class="text-center">
                  <svg class="w-16 text-gray-400 mx-auto dark:text-neutral-400" width="70" height="46" viewBox="0 0 70 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.05172 9.36853L17.2131 7.5083V41.3608L12.3018 42.3947C9.01306 43.0871 5.79705 40.9434 5.17081 37.6414L1.14319 16.4049C0.515988 13.0978 2.73148 9.92191 6.05172 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500"/>
                    <path d="M63.9483 9.36853L52.7869 7.5083V41.3608L57.6982 42.3947C60.9869 43.0871 64.203 40.9434 64.8292 37.6414L68.8568 16.4049C69.484 13.0978 67.2685 9.92191 63.9483 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500"/>
                    <rect x="17.0656" y="1.62305" width="35.8689" height="42.7541" rx="5" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500"/>
                    <path d="M47.9344 44.3772H22.0655C19.3041 44.3772 17.0656 42.1386 17.0656 39.3772L17.0656 35.9161L29.4724 22.7682L38.9825 33.7121C39.7832 34.6335 41.2154 34.629 42.0102 33.7025L47.2456 27.5996L52.9344 33.7209V39.3772C52.9344 42.1386 50.6958 44.3772 47.9344 44.3772Z" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500"/>
                    <circle cx="39.5902" cy="14.9672" r="4.16393" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500"/>
                  </svg>

                  <div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
                  <span class="pe-1 font-medium text-gray-800 dark:text-neutral-200">
                    Drop your files here or
                  </span>
                    <label for="hs-pro-dactc" class="relative cursor-pointer bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-neutral-800 dark:text-blue-500 dark:hover:text-blue-600">
                      <span>browse</span>
                      <input id="hs-pro-dactc" type="file" class="sr-only">
                    </label>
                  </div>

                  <p class="mt-1 text-xs text-gray-400 dark:text-neutral-400">
                    CSV, XLS, DOCX
                  </p>
                </div>
              </div>
            </div>
            <!-- End Drag 'n Drop -->
          </div>
        </div>
        <!-- End Body -->

        <!-- Footer -->
        <div class="p-4 flex justify-between gap-x-2">
          <div class="flex-1 flex flex-wrap justify-end items-center gap-2">
            <button type="button" class="py-2 px-3 inline-flex justify-center items-center text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-datm">
              Cancel
            </button>

            <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500" data-hs-overlay="#hs-pro-datm">
              Create team
            </button>
          </div>
        </div>
        <!-- Footer -->
      </div>
    </div>
  </div>
  <!-- End Add Team Modal -->
  <!-- Add Team Modal -->
  <div id="hs-pro-detm" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--close-when-click-inside:true] pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-pro-detm-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-xl sm:w-full mx-3 mb-7 h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] sm:mx-auto">
      <div class="w-full max-h-full flex flex-col bg-white rounded-xl pointer-events-auto shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-800">
        <!-- Header -->
        <div class="py-2.5 px-4 flex justify-between items-center border-b dark:border-neutral-700">
          <h3 id="hs-pro-detm-label" class="font-medium text-gray-800 dark:text-neutral-200">
            Edit team
          </h3>
          <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-pro-detm">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
          <div class="p-4 space-y-5">
            <div class="space-y-2">
              <label for="hs-pro-daetmt" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Title
              </label>

              <input id="hs-pro-daetmt" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Team title" value="conference ">
            </div>

            <div class="space-y-2">
              <label for="daetmi" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Industry
              </label>

              <input id="daetmi" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter name">
            </div>

            <div class="space-y-2">
              <label for="daetmd" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Description
              </label>

              <textarea id="daetmd" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" rows="3" placeholder="Tell us a little bit about team">Online meeting services group</textarea>
            </div>

            <div class="space-y-2">
              <label for="daetmm" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Members
              </label>

              <!-- Input Form -->
              <div class="flex items-center gap-x-3">
                <input id="daetmm" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter name">

                <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                  Add
                </button>
              </div>
              <!-- End Input Form -->
            </div>

            <div class="space-y-2">
              <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Suggested members
              </label>

              <div class="flex items-center space-x-2">
                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach1" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-daetcach1" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none" checked >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  James Collins
                </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach2" class="relative block rounded-full cursor-pointer">
                    <span class="hs-tooltip-toggle flex shrink-0 justify-center items-center size-[46px] bg-white border border-gray-200 text-gray-700 font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">L</span><span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-daetcach2" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none"  >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  Lori Hunter
                </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach3" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-daetcach3" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none"  >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  Lewis Clarke
                </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach4" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-daetcach4" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none"  >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  Ella Lauda
                </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach5" class="relative block rounded-full cursor-pointer">
                    <span class="hs-tooltip-toggle flex shrink-0 justify-center items-center size-[46px] bg-white border border-gray-200 text-gray-700 font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">O</span><span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                    <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                      <input type="checkbox" id="hs-pro-daetcach5" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none" checked >
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                      </svg>
                    </span>
                  </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                  Ols Schols
                </span>
                </div>
                <!-- End User -->
              </div>
            </div>

            <!-- Drag 'n Drop -->
            <div class="space-y-2">
              <label class="block block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Cover
              </label>
              <div class="p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600">
                <div class="text-center">
                  <svg class="w-16 text-gray-400 mx-auto dark:text-neutral-400" width="70" height="46" viewBox="0 0 70 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.05172 9.36853L17.2131 7.5083V41.3608L12.3018 42.3947C9.01306 43.0871 5.79705 40.9434 5.17081 37.6414L1.14319 16.4049C0.515988 13.0978 2.73148 9.92191 6.05172 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500"/>
                    <path d="M63.9483 9.36853L52.7869 7.5083V41.3608L57.6982 42.3947C60.9869 43.0871 64.203 40.9434 64.8292 37.6414L68.8568 16.4049C69.484 13.0978 67.2685 9.92191 63.9483 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500"/>
                    <rect x="17.0656" y="1.62305" width="35.8689" height="42.7541" rx="5" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500"/>
                    <path d="M47.9344 44.3772H22.0655C19.3041 44.3772 17.0656 42.1386 17.0656 39.3772L17.0656 35.9161L29.4724 22.7682L38.9825 33.7121C39.7832 34.6335 41.2154 34.629 42.0102 33.7025L47.2456 27.5996L52.9344 33.7209V39.3772C52.9344 42.1386 50.6958 44.3772 47.9344 44.3772Z" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500"/>
                    <circle cx="39.5902" cy="14.9672" r="4.16393" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500"/>
                  </svg>

                  <div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
                  <span class="pe-1 font-medium text-gray-800 dark:text-neutral-200">
                    Drop your files here or
                  </span>
                    <label for="hs-pro-daetc" class="relative cursor-pointer bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-neutral-800 dark:text-blue-500 dark:hover:text-blue-600">
                      <span>browse</span>
                      <input id="hs-pro-daetc" type="file" class="sr-only">
                    </label>
                  </div>

                  <p class="mt-1 text-xs text-gray-400 dark:text-neutral-400">
                    CSV, XLS, DOCX
                  </p>
                </div>
              </div>
            </div>
            <!-- End Drag 'n Drop -->
          </div>
        </div>
        <!-- End Body -->

        <!-- Footer -->
        <div class="p-4 flex justify-between gap-x-2">
          <div class="flex-1 flex flex-wrap justify-end items-center gap-2">
            <button type="button" class="py-2 px-3 inline-flex justify-center items-center text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-detm">
              Cancel
            </button>

            <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500" data-hs-overlay="#hs-pro-detm">
              Save changes
            </button>
          </div>
        </div>
        <!-- Footer -->
      </div>
    </div>
  </div>
  <!-- End Add Team Modal -->

  <!--  &lt;!&ndash; STARTUP HEADER &ndash;&gt;-->
<!--  <el-row justify="center" align="middle" :gutter="12" class="startup-header">-->
<!--    <el-col :xs="6" :sm="6" :md="6" :lg="6" :xl="6" class="flex-start-col">-->
<!--      <Popover>-->
<!--        <template #reference>-->
<!--          <el-avatar :size="20" :src="userStore.avatar" class="mr-2 icon-pointer" />-->
<!--        </template>-->
<!--        <p>{{ startup.author?.name }}</p>-->
<!--      </Popover>-->
<!--      <el-text size="small" class="icon-pointer">-->
<!--        <Popover>-->
<!--          <template #reference>-->
<!--            <span>{{ startup.author?.name }}</span>-->
<!--          </template>-->
<!--          <div>-->
<!--            <p>{{ startup.author?.name }}</p>-->
<!--          </div>-->
<!--        </Popover>-->
<!--      </el-text>-->
<!--    </el-col>-->
<!--    <el-col :xs="6" :sm="6" :md="6" :lg="6" :xl="6" class="flex-end-col">-->
<!--      <el-text size="small">-->
<!--        {{ startup.created_at }}-->
<!--      </el-text>-->
<!--      <Popover placement="right-end" trigger="click" :width="50" :show-after="0" :hide-after="0">-->
<!--        <template #reference>-->
<!--          <el-icon size="20" class="icon-pointer ml-1"><More/></el-icon>-->
<!--        </template>-->
<!--        <ul>-->
<!--          <li class="icon-pointer" style="color: #e72121">Report</li>-->
<!--        </ul>-->
<!--      </Popover>-->
<!--    </el-col>-->
<!--  </el-row>-->
<!--  &lt;!&ndash; Title &ndash;&gt;-->
<!--  <el-row justify="center" align="middle" :gutter="12" class="flex-col">-->
<!--    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12" class="startup-title" @click="toggleDescription(startup)">-->
<!--      <el-text>-->
<!--        {{ startup.title }} <span >...</span>-->
<!--      </el-text>-->
<!--    </el-col>-->
<!--    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12">-->
<!--      <el-collapse-transition>-->
<!--        <div v-show="showStartupDescByCollapse" class="startup-desc">-->
<!--          <el-text v-if="isLoadingDescription">Loading...</el-text>-->
<!--          <el-text v-else>{{ startupDescription }}</el-text>-->
<!--        </div>-->
<!--      </el-collapse-transition>-->
<!--    </el-col>-->
<!--  </el-row>-->
<!--  &lt;!&ndash; Actions &ndash;&gt;-->
<!--  <el-row justify="center" align="top" :gutter="12" class="default-row">-->
<!--    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12" >-->
<!--      <el-divider />-->
<!--    </el-col>-->
<!--  </el-row>-->
</template>

<style lang="scss" scoped>

</style>
