<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import AuthProviderButtons from '@/Components/AuthProviderButtons.vue';
import { useUserStore } from '@/stores/UserStore.js';
import AuthSidebar from '@/Components/AuthSidebar.vue';
import { trans } from 'laravel-vue-i18n';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const userStore = useUserStore();

const submit = () => {
  form.post(route('register'), {
    onFinish: () => {
      form.reset('password', 'password_confirmation');
      usePage().props.auth.user && userStore.setAuthUser(usePage().props.auth.user.data);
    },
  });
};
</script>

<template>
  <Head :title="$t('pages.register.title')"/>

  <!-- ========== MAIN CONTENT ========== -->
  <main class="flex min-h-full">
    <!-- Sidebar -->
    <AuthSidebar/>
    <!-- End Sidebar -->

    <!-- Content -->
    <div class="grow px-5">
      <div class="h-full min-h-screen sm:w-[448px] flex flex-col justify-center mx-auto space-y-5">
        <!-- Title -->
        <div>
          <h1 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $t('pages.register.heading') }}
          </h1>
          <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
            {{ $t('pages.register.hero_text') }}
          </p>
        </div>
        <!-- End Title -->

        <!-- Button Group -->
        <AuthProviderButtons :form="form"/>
        <!-- End Button Group -->

        <div
          class="flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-700 dark:after:border-neutral-700">
          {{ $t('pages.register.or') }}
        </div>

        <form @submit.prevent="submit">
          <div class="space-y-5">
            <div>
              <label for="hs-pro-dalfn" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                {{ $t('pages.register.name_label') }}
              </label>

              <input
                type="text"
                id="hs-pro-dalfn"
                class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                :placeholder="$t('pages.register.name_placeholder')"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
              />
              <InputError class="mt-2" :message="form.errors.name"/>
            </div>

            <div>
              <label for="hs-pro-dale" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                {{ $t('pages.register.email_label') }}
              </label>

              <input
                type="email"
                id="hs-pro-dale"
                class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                :placeholder="$t('pages.register.email_placeholder')"
                v-model="form.email"
                required
                autocomplete="username"
              />
              <InputError class="mt-2" :message="form.errors.email"/>
            </div>

            <div data-hs-toggle-password-group class="space-y-3">
              <div>
                <label for="hs-pro-dappnp" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                  {{ $t('pages.register.password_label') }}
                </label>

                <div class="relative">
                  <input
                    id="hs-pro-dappnp"
                    type="password"
                    class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                    :placeholder="$t('pages.register.password_placeholder')"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                  />
                  <button type="button" data-hs-toggle-password='{
                        "target": ["#hs-pro-dappnp", "#hs-pro-dapprnp"]
                      }' class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                    <svg class="shrink-0 size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                      <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                      <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                      <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"/>
                      <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                      <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"/>
                    </svg>
                  </button>
                </div>
                <InputError class="mt-2" :message="form.errors.password"/>
              </div>

              <div class="relative">
                <input
                  id="hs-pro-dapprnp"
                  type="password"
                  class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                  :placeholder="$t('pages.register.password_confirm_placeholder')"
                  v-model="form.password_confirmation"
                  required
                  autocomplete="new-password"
                />
                <button type="button" data-hs-toggle-password='{
                      "target": ["#hs-pro-dappnp", "#hs-pro-dapprnp"]
                    }' class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                  <svg class="shrink-0 size-4" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                    <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                    <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                    <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"/>
                    <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                    <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"/>
                  </svg>
                </button>
              </div>
              <InputError class="mt-2" :message="form.errors.password_confirmation"/>
            </div>

            <button
              type="submit"
              class="py-2.5 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600"
            >
              {{ $t('pages.register.submit_button') }}
            </button>
          </div>
        </form>

        <p class="text-sm text-gray-500 dark:text-neutral-500">
          {{ $t('pages.register.already_have_account') }}
          <Link :href="route('login')"
                class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-500">
            {{ $t('pages.register.login_link') }}
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m9 18 6-6-6-6"/>
            </svg>
          </Link>
        </p>
      </div>
    </div>
    <!-- End Content -->
  </main>
</template>
