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
