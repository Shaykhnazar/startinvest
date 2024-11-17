<script setup>
import CabinetLayout from '@/Layouts/CabinetLayout.vue';
import { Head } from '@inertiajs/vue3';
import UpdateProfileInformationForm from '@/Pages/Cabinet/Partials/UpdateProfileInformationForm.vue'
import UpdatePasswordForm from '@/Pages/Cabinet/Partials/UpdatePasswordForm.vue'
import DeleteUserForm from '@/Pages/Cabinet/Partials/DeleteUserForm.vue'

defineProps({
  mustVerifyEmail: {
    type: Boolean,
  },
  status: {
    type: String,
  },
  userDetail: Object,
  socialProfiles: Array,
});
</script>

<template>
  <CabinetLayout>
    <template #header>
      <Head :title="$t('cabinet.profile_edit.title')" />
    </template>

    <!-- Breadcrumb -->
    <ol class="md:hidden pt-3 pb-1 sm:pb-3 px-2 sm:px-5 flex items-center whitespace-nowrap">
      <li class="flex items-center text-sm text-gray-600 dark:text-neutral-500">
        {{ $t('cabinet.profile_edit.breadcrumb_account') }}
        <svg class="shrink-0 overflow-visible size-4 ms-1.5 text-gray-400 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
        </svg>
      </li>
      <li class="ps-1.5 flex items-center font-semibold text-gray-800 dark:text-neutral-200 text-sm">
        {{ $t('cabinet.profile_edit.breadcrumb_profile') }}
      </li>
    </ol>
    <!-- End Breadcrumb -->

    <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-3">
      <!-- Account Nav -->
      <div class="w-full flex flex-row whitespace-nowrap overflow-x-auto overflow-y-hidden pb-1 [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm whitespace-nowrap border border-transparent text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 bg-white !border-gray-200 focus:text-gray-800 shadow-sm dark:bg-neutral-800 dark:!border-neutral-700 dark:focus:text-neutral-200 " href="#">
          {{ $t('cabinet.profile_edit.profile') }}
        </a>
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm whitespace-nowrap border border-transparent text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400  " href="#">
          {{ $t('cabinet.profile_edit.notifications') }}
        </a>
<!--        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm whitespace-nowrap border border-transparent text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400  " href="#">-->
<!--          Integrations-->
<!--        </a>-->
<!--        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm whitespace-nowrap border border-transparent text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400  " href="#">-->
<!--          Preferences-->
<!--        </a>-->
<!--        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm whitespace-nowrap border border-transparent text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400  " href="#">-->
<!--          Workspace-->
<!--        </a>-->
<!--        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm whitespace-nowrap border border-transparent text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400  " href="#">-->
<!--          Plan &amp; Billing-->
<!--        </a>-->
<!--        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm whitespace-nowrap border border-transparent text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400  " href="#">-->
<!--          Members-->
<!--        </a>-->
      </div>
      <!-- End Account Nav -->

      <!-- Account Card -->
      <div class="p-5 md:p-8 bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
        <!-- Title -->
        <div class="mb-4 xl:mb-8">
          <h1 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
            {{ $t('cabinet.profile_edit.profile') }}
          </h1>
          <p class="text-sm text-gray-500 dark:text-neutral-500">
            {{ $t('cabinet.profile_edit.profile_description') }}
          </p>
        </div>
        <!-- End Title -->

        <!-- Form -->
        <!-- Avatar -->
        <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">
        <!--  Grid-->
          <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
            <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
              <label class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
                {{ $t('cabinet.profile_edit.avatar_label') }}
              </label>
            </div>
            <!-- End Col -->

            <div class="sm:col-span-8 xl:col-span-4">
              <!-- Logo Upload Group -->
              <div class="flex flex-wrap items-center gap-3 sm:gap-5">
                <span class="flex shrink-0 justify-center items-center size-20 border-2 border-dotted border-gray-300 text-gray-400 rounded-full dark:border-neutral-700 dark:text-neutral-600">
                  <svg class="shrink-0 size-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                    <circle cx="9" cy="9" r="2" />
                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                  </svg>
                </span>

                <div class="grow">
                  <div class="flex items-center gap-x-2">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <polyline points="17 8 12 3 7 8" />
                        <line x1="12" x2="12" y1="3" y2="15" />
                      </svg>
                      {{ $t('cabinet.profile_edit.upload_image_button') }}
                    </button><button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-red-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" disabled>
                    {{ $t('cabinet.profile_edit.delete_image_button') }}
                  </button>
                  </div>
                  <p class="mt-2 text-xs text-gray-500 dark:text-neutral-500">
                    {{ $t('cabinet.profile_edit.avatar_note') }}
                  </p>
                </div>
              </div>
              <!-- End Logo Upload Group -->
            </div>
            <!-- End Col -->
          </div>
          <!--  End Grid-->
        </div>
        <!-- End Avatar -->

        <!-- Cover Photo -->
        <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">
          <!-- Grid -->
          <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
            <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
              <label class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
                Muqova fotosurati
              </label>
            </div>
            <!-- End Col -->

            <div class="sm:col-span-8 xl:col-span-4">
              <!-- Drag 'n Drop -->
              <div class="mt-2 p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600">
                <div class="text-center">
                  <svg class="w-16 text-gray-400 mx-auto dark:text-neutral-400" width="70" height="46" viewBox="0 0 70 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.05172 9.36853L17.2131 7.5083V41.3608L12.3018 42.3947C9.01306 43.0871 5.79705 40.9434 5.17081 37.6414L1.14319 16.4049C0.515988 13.0978 2.73148 9.92191 6.05172 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500" />
                    <path d="M63.9483 9.36853L52.7869 7.5083V41.3608L57.6982 42.3947C60.9869 43.0871 64.203 40.9434 64.8292 37.6414L68.8568 16.4049C69.484 13.0978 67.2685 9.92191 63.9483 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500" />
                    <rect x="17.0656" y="1.62305" width="35.8689" height="42.7541" rx="5" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500" />
                    <path d="M47.9344 44.3772H22.0655C19.3041 44.3772 17.0656 42.1386 17.0656 39.3772L17.0656 35.9161L29.4724 22.7682L38.9825 33.7121C39.7832 34.6335 41.2154 34.629 42.0102 33.7025L47.2456 27.5996L52.9344 33.7209V39.3772C52.9344 42.1386 50.6958 44.3772 47.9344 44.3772Z" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500" />
                    <circle cx="39.5902" cy="14.9672" r="4.16393" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500" />
                  </svg>

                  <div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
                    <span class="pe-1 font-medium text-gray-800 dark:text-neutral-200">
                      Faylingizni shu yerga tashlang yoki
                    </span>
                    <label for="hs-pro-dapcp" class="relative cursor-pointer bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-neutral-800 dark:text-blue-500 dark:hover:text-blue-600">
                      <span>tanlang</span>
                      <input id="hs-pro-dapcp" type="file" class="sr-only" name="hs-pro-dapcp">
                    </label>
                  </div>

                  <p class="mt-1 text-xs text-gray-400 dark:text-neutral-400">
                    2 MB gacha bo'lgan rasmni tanlang.
                  </p>
                </div>
              </div>
              <!-- End Drag 'n Drop -->
            </div>
            <!-- End Col -->
          </div>
          <!-- End Grid -->
        </div>
        <!-- End Cover Photo -->

        <!-- Social Accounts -->
        <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">
          <h2 class="font-semibold text-gray-800 dark:text-neutral-200">
            {{ $t('cabinet.profile_edit.social_accounts_title') }}
          </h2>

          <!-- Grid -->
          <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
            <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
              <label for="hs-pro-dapsaurl" class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
                {{ $t('cabinet.profile_edit.social_link_label') }}
              </label>
            </div>
            <!-- End Col -->

            <div class="sm:col-span-8 xl:col-span-4">
              <div class="space-y-2">
                <div id="hs-wrapper-for-copy" class="space-y-2">
                  <input id="hs-pro-dapsaurl" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Ijtimoiy tarmoqqa havola">
                  <input type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Ijtimoiy tarmoqqa havola">
                  <input id="hs-content-for-copy" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Ijtimoiy tarmoqqa havola">
                </div>

                <!-- Add Link -->
                <p class="mt-3">
                  <button type="button" data-hs-copy-markup='{
                        "targetSelector": "#hs-content-for-copy",
                        "wrapperSelector": "#hs-wrapper-for-copy",
                        "limit": 4
                      }' class="py-1.5 px-2 inline-flex items-center gap-x-1 text-xs font-medium rounded-full border border-dashed border-gray-200 bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M5 12h14" />
                      <path d="M12 5v14" />
                    </svg>
                    {{ $t('cabinet.profile_edit.add_link_button') }}
                  </button>
                </p>
                <!-- End Add Link -->
              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Grid -->
        </div>
        <!-- End Social Accounts -->

        <!-- Personal Info -->
        <UpdateProfileInformationForm
          :must-verify-email="mustVerifyEmail"
          :status="status"
        />
        <!-- End Personal Info -->

        <!-- Password -->
        <UpdatePasswordForm/>
        <!-- End Password -->

          <!-- Connect Accounts -->
<!--          <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">-->
<!--            &lt;!&ndash; Grid &ndash;&gt;-->
<!--            <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">-->
<!--              <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">-->
<!--                <label class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">-->
<!--                  Connect accounts-->
<!--                </label>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->

<!--              <div class="sm:col-span-8 xl:col-span-4">-->
<!--                &lt;!&ndash; Button Group &ndash;&gt;-->
<!--                <div class="flex flex-col sm:flex-row gap-2">-->
<!--                  <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                    <svg class="size-4" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                      <g clip-path="url(#clip0_4132_5805)">-->
<!--                        <path d="M32.2566 16.36C32.2566 15.04 32.1567 14.08 31.9171 13.08H16.9166V19.02H25.7251C25.5454 20.5 24.5866 22.72 22.4494 24.22L22.4294 24.42L27.1633 28.1L27.4828 28.14C30.5189 25.34 32.2566 21.22 32.2566 16.36Z" fill="#4285F4" />-->
<!--                        <path d="M16.9166 32C21.231 32 24.8463 30.58 27.5028 28.12L22.4694 24.2C21.1111 25.14 19.3135 25.8 16.9366 25.8C12.7021 25.8 9.12677 23 7.84844 19.16L7.66867 19.18L2.71513 23L2.65521 23.18C5.2718 28.4 10.6648 32 16.9166 32Z" fill="#34A853" />-->
<!--                        <path d="M7.82845 19.16C7.48889 18.16 7.28915 17.1 7.28915 16C7.28915 14.9 7.48889 13.84 7.80848 12.84V12.62L2.81499 8.73999L2.6552 8.81999C1.55663 10.98 0.937439 13.42 0.937439 16C0.937439 18.58 1.55663 21.02 2.63522 23.18L7.82845 19.16Z" fill="#FBBC05" />-->
<!--                        <path d="M16.9166 6.18C19.9127 6.18 21.9501 7.48 23.0886 8.56L27.6027 4.16C24.8263 1.58 21.231 0 16.9166 0C10.6648 0 5.27181 3.6 2.63525 8.82L7.80851 12.84C9.10681 8.98 12.6821 6.18 16.9166 6.18Z" fill="#EB4335" />-->
<!--                      </g>-->
<!--                      <defs>-->
<!--                        <clipPath id="clip0_4132_5805">-->
<!--                          <rect width="32" height="32" fill="white" transform="translate(0.937439)" />-->
<!--                        </clipPath>-->
<!--                      </defs>-->
<!--                    </svg>-->
<!--                    Remove Google-->
<!--                    <svg class="shrink-0 size-3 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />-->
<!--                    </svg>-->
<!--                  </button>-->

<!--                  <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                    <svg class="size-4" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                      <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7326 0C9.96372 0.00130479 8.53211 1.43397 8.53342 3.19935C8.53211 4.96473 9.96503 6.39739 11.7339 6.39869H14.9345V3.20065C14.9358 1.43527 13.5029 0.00260958 11.7326 0C11.7339 0 11.7339 0 11.7326 0M11.7326 8.53333H3.20053C1.43161 8.53464 -0.00130383 9.9673 3.57297e-06 11.7327C-0.00261123 13.4981 1.4303 14.9307 3.19922 14.9333H11.7326C13.5016 14.932 14.9345 13.4994 14.9332 11.734C14.9345 9.9673 13.5016 8.53464 11.7326 8.53333Z" fill="#36C5F0" />-->
<!--                      <path fill-rule="evenodd" clip-rule="evenodd" d="M32 11.7327C32.0013 9.9673 30.5684 8.53464 28.7995 8.53333C27.0306 8.53464 25.5976 9.9673 25.5989 11.7327V14.9333H28.7995C30.5684 14.932 32.0013 13.4994 32 11.7327ZM23.4666 11.7327V3.19935C23.4679 1.43527 22.0363 0.00260958 20.2674 0C18.4984 0.00130479 17.0655 1.43397 17.0668 3.19935V11.7327C17.0642 13.4981 18.4971 14.9307 20.2661 14.9333C22.035 14.932 23.4679 13.4994 23.4666 11.7327Z" fill="#2EB67D" />-->
<!--                      <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2661 32C22.035 31.9987 23.4679 30.566 23.4666 28.8007C23.4679 27.0353 22.035 25.6026 20.2661 25.6013H17.0656V28.8007C17.0642 30.5647 18.4972 31.9974 20.2661 32ZM20.2661 23.4654H28.7995C30.5684 23.4641 32.0013 22.0314 32 20.266C32.0026 18.5006 30.5697 17.068 28.8008 17.0654H20.2674C18.4985 17.0667 17.0656 18.4993 17.0669 20.2647C17.0656 22.0314 18.4972 23.4641 20.2661 23.4654Z" fill="#ECB22E" />-->
<!--                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.93953e-07 20.266C-0.00130651 22.0314 1.43161 23.4641 3.20052 23.4654C4.96944 23.4641 6.40235 22.0314 6.40105 20.266V17.0667H3.20052C1.43161 17.068 -0.00130651 18.5006 8.93953e-07 20.266ZM8.53342 20.266V28.7993C8.5308 30.5647 9.96372 31.9974 11.7326 32C13.5016 31.9987 14.9345 30.566 14.9332 28.8007V20.2686C14.9358 18.5032 13.5029 17.0706 11.7339 17.068C9.96372 17.068 8.53211 18.5006 8.53342 20.266C8.53342 20.2673 8.53342 20.266 8.53342 20.266Z" fill="#E01E5A" />-->
<!--                    </svg>-->
<!--                    Connect with Slack-->
<!--                  </button>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Button Group &ndash;&gt;-->

<!--                <p class="mt-3 text-sm text-gray-500 dark:text-neutral-500">-->
<!--                  Access your Preline Workspaces with any email address, or by connecting an account.-->
<!--                </p>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Grid &ndash;&gt;-->
<!--          </div>-->
          <!-- End Connect Accounts -->

          <!-- Two-Step Verification -->
<!--          <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">-->
<!--            &lt;!&ndash; Grid &ndash;&gt;-->
<!--            <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">-->
<!--              <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">-->
<!--                <label class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">-->
<!--                  Two-Step Verification-->
<!--                </label>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->

<!--              <div class="sm:col-span-8 xl:col-span-4">-->
<!--                &lt;!&ndash; Alert &ndash;&gt;-->
<!--                <div class="p-4 bg-blue-50 text-blue-600 rounded-lg bg-blue-500/10" role="alert" tabindex="-1" aria-labelledby="hs-pro-dasfaaoea-label">-->
<!--                  <div class="flex">-->
<!--                    <svg class="shrink-0 size-5 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />-->
<!--                      <path d="m9 12 2 2 4-4" />-->
<!--                    </svg>-->
<!--                    <div class="ms-3 space-y-2">-->
<!--                      <h3 id="hs-pro-dasfaaoea-label" class="text-sm text-blue-600 dark:text-blue-500">-->
<!--                        Advanced security features are available on Enterprise-->
<!--                      </h3>-->
<!--                      <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">-->
<!--                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">-->
<!--                          <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />-->
<!--                        </svg>-->
<!--                        Upgrade-->
<!--                      </button>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; End Alert &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Grid &ndash;&gt;-->
<!--          </div>-->
          <!-- End Two-Step Verification -->

          <!-- Disable Ads -->
<!--          <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">-->
<!--            &lt;!&ndash; Grid &ndash;&gt;-->
<!--            <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">-->
<!--              <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">-->
<!--                <label class="inline-block text-sm text-gray-500 dark:text-neutral-500">-->
<!--                  Disable Ads-->
<!--                  <span class="ms-1 inline-flex items-center gap-x-1.5 px-1.5 text-[10px] font-medium bg-blue-600 text-white rounded-full dark:bg-blue-500">-->
<!--                    PRO-->
<!--                  </span>-->
<!--                </label>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->

<!--              <div class="sm:col-span-8 xl:col-span-4">-->
<!--                <div class="mt-1.5 flex">-->
<!--                  <input type="checkbox" class="shrink-0 border-gray-200 size-3.5 rounded text-blue-600 focus:ring-offset-0 dark:bg-neutral-800 dark:checked:bg-blue-500 dark:border-neutral-700" id="hs-pro-dapdach">-->
<!--                  <label for="hs-pro-dapdach" class="text-xs text-gray-600 ms-2 dark:text-neutral-400">-->
<!--                    With your Pro account, you can disable ads across the site.-->
<!--                  </label>-->
<!--                </div>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Grid &ndash;&gt;-->
<!--          </div>-->
          <!-- End Disable Ads -->

          <!-- Sessions -->
<!--          <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">-->
<!--            &lt;!&ndash; Grid &ndash;&gt;-->
<!--            <div class="grid sm:grid-cols-12 gap-y-1.5 2xl:gap-y-0 sm:gap-x-5">-->
<!--              <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">-->
<!--                <label class="inline-block text-sm text-gray-500 dark:text-neutral-500">-->
<!--                  Sessions-->
<!--                </label>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->

<!--              <div class="sm:col-span-8 2xl:col-span-10">-->
<!--                &lt;!&ndash; Grid &ndash;&gt;-->
<!--                <div class="grid xl:grid-cols-2 2xl:grid-cols-3 gap-5">-->
<!--                  &lt;!&ndash; Card &ndash;&gt;-->
<!--                  <div class="p-5 space-y-4 flex flex-col bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">-->
<!--                    &lt;!&ndash; Header &ndash;&gt;-->
<!--                    <div class="flex justify-between">-->
<!--                      <div class="flex flex-col justify-center items-center size-[38px] border border-gray-200 rounded-lg dark:border-neutral-700">-->
<!--                        <svg class="size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16" />-->
<!--                        </svg>-->
<!--                      </div>-->

<!--                      <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />-->
<!--                          <polyline points="16 17 21 12 16 7" />-->
<!--                          <line x1="21" x2="9" y1="12" y2="12" />-->
<!--                        </svg>-->
<!--                        Sign out-->
<!--                      </button>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Header &ndash;&gt;-->

<!--                    &lt;!&ndash; Heading &ndash;&gt;-->
<!--                    <div class="flex justify-between items-center">-->
<!--                      <span class="font-medium text-gray-800 dark:text-neutral-200">-->
<!--                        Mac-->
<!--                      </span>-->
<!--                      <span class="inline-flex items-center gap-1.5 py-px px-2 text-xs font-medium bg-blue-100 text-blue-800 rounded-full dark:bg-blue-500/10 dark:text-blue-500">-->
<!--                        Current session-->
<!--                      </span>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Heading &ndash;&gt;-->

<!--                    &lt;!&ndash; List Group &ndash;&gt;-->
<!--                    <ul class="space-y-2">-->
<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          Location:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          United Kingdom-->
<!--                        </span>-->
<!--                      </li>-->

<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          Device:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          Safari - iOS-->
<!--                        </span>-->
<!--                      </li>-->

<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          IP address:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          129.562.028.172-->
<!--                        </span>-->
<!--                      </li>-->

<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          Recent activity:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          5 minutes ago-->
<!--                        </span>-->
<!--                      </li>-->
<!--                    </ul>-->
<!--                    &lt;!&ndash; End List Group &ndash;&gt;-->

<!--                    <button type="button" class="py-2 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <circle cx="12" cy="12" r="10" />-->
<!--                        <path d="M12 16v-4" />-->
<!--                        <path d="M12 8h.01" />-->
<!--                      </svg>-->
<!--                      Don’t recognize something?-->
<!--                    </button>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Card &ndash;&gt;-->

<!--                  &lt;!&ndash; Card &ndash;&gt;-->
<!--                  <div class="p-5 space-y-4 flex flex-col bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">-->
<!--                    &lt;!&ndash; Header &ndash;&gt;-->
<!--                    <div class="flex justify-between">-->
<!--                      <div class="flex flex-col justify-center items-center size-[38px] border border-gray-200 rounded-lg dark:border-neutral-700">-->
<!--                        <svg class="size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16" />-->
<!--                        </svg>-->
<!--                      </div>-->

<!--                      <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />-->
<!--                          <polyline points="16 17 21 12 16 7" />-->
<!--                          <line x1="21" x2="9" y1="12" y2="12" />-->
<!--                        </svg>-->
<!--                        Sign out-->
<!--                      </button>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Header &ndash;&gt;-->

<!--                    &lt;!&ndash; Heading &ndash;&gt;-->
<!--                    <div class="flex justify-between items-center">-->
<!--                      <span class="font-medium text-gray-800 dark:text-neutral-200">-->
<!--                        Mac-->
<!--                      </span>-->

<!--                      <span class="inline-flex items-center gap-1.5 py-px px-2 text-xs font-medium bg-gray-100 text-gray-800 rounded-full dark:bg-neutral-700 dark:text-neutral-200">-->
<!--                        Expired-->
<!--                      </span>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Heading &ndash;&gt;-->

<!--                    &lt;!&ndash; List Group &ndash;&gt;-->
<!--                    <ul class="space-y-2">-->
<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          Location:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          United Kingdom-->
<!--                        </span>-->
<!--                      </li>-->

<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          Device:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          Safari - iOS-->
<!--                        </span>-->
<!--                      </li>-->

<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          IP address:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          129.562.028.172-->
<!--                        </span>-->
<!--                      </li>-->

<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          Recent activity:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          1 month ago-->
<!--                        </span>-->
<!--                      </li>-->
<!--                    </ul>-->
<!--                    &lt;!&ndash; End List Group &ndash;&gt;-->

<!--                    <button type="button" class="py-2 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <circle cx="12" cy="12" r="10" />-->
<!--                        <path d="M12 16v-4" />-->
<!--                        <path d="M12 8h.01" />-->
<!--                      </svg>-->
<!--                      Don’t recognize something?-->
<!--                    </button>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Card &ndash;&gt;-->

<!--                  &lt;!&ndash; Card &ndash;&gt;-->
<!--                  <div class="p-5 space-y-4 flex flex-col bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">-->
<!--                    &lt;!&ndash; Header &ndash;&gt;-->
<!--                    <div class="flex justify-between">-->
<!--                      <div class="flex flex-col justify-center items-center size-[38px] border border-gray-200 rounded-lg dark:border-neutral-700">-->
<!--                        <svg class="size-5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <rect width="16" height="20" x="4" y="2" rx="2" ry="2" />-->
<!--                          <line x1="12" x2="12.01" y1="18" y2="18" />-->
<!--                        </svg>-->
<!--                      </div>-->

<!--                      <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />-->
<!--                          <polyline points="16 17 21 12 16 7" />-->
<!--                          <line x1="21" x2="9" y1="12" y2="12" />-->
<!--                        </svg>-->
<!--                        Sign out-->
<!--                      </button>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End Header &ndash;&gt;-->

<!--                    &lt;!&ndash; Heading &ndash;&gt;-->
<!--                    <div class="flex justify-between items-center">-->
<!--                      <span class="font-medium text-gray-800 dark:text-neutral-200">-->
<!--                        iPad PRO-->
<!--                      </span>-->

<!--                    </div>-->
<!--                    &lt;!&ndash; End Heading &ndash;&gt;-->

<!--                    &lt;!&ndash; List Group &ndash;&gt;-->
<!--                    <ul class="space-y-2">-->
<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          Location:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          United Kingdom-->
<!--                        </span>-->
<!--                      </li>-->

<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          Device:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          Safari - iOS-->
<!--                        </span>-->
<!--                      </li>-->

<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          IP address:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          129.562.028.172-->
<!--                        </span>-->
<!--                      </li>-->

<!--                      <li class="flex justify-between items-center">-->
<!--                        <span class="text-xs uppercase text-gray-500 dark:text-neutral-500">-->
<!--                          Recent activity:-->
<!--                        </span>-->
<!--                        <span class="text-sm text-gray-800 dark:text-neutral-200">-->
<!--                          2 days ago-->
<!--                        </span>-->
<!--                      </li>-->
<!--                    </ul>-->
<!--                    &lt;!&ndash; End List Group &ndash;&gt;-->

<!--                    <button type="button" class="py-2 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">-->
<!--                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                        <circle cx="12" cy="12" r="10" />-->
<!--                        <path d="M12 16v-4" />-->
<!--                        <path d="M12 8h.01" />-->
<!--                      </svg>-->
<!--                      Don’t recognize something?-->
<!--                    </button>-->
<!--                  </div>-->
<!--                  &lt;!&ndash; End Card &ndash;&gt;-->
<!--                </div>-->
<!--                &lt;!&ndash; End Grid &ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Col &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Grid &ndash;&gt;-->
<!--          </div>-->
          <!-- End Sessions -->

          <!-- Danger Zone -->
          <DeleteUserForm/>
          <!-- End Danger Zone -->
        <!-- End Form -->
      </div>
      <!-- End Account Card -->
    </div>
  </CabinetLayout>
</template>

<style scoped>

</style>
