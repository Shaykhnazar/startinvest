<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
import AuthProviderButtons from '@/Components/AuthProviderButtons.vue';
import { useUserStore } from '@/stores/UserStore.js'
import AuthSidebar from '@/Components/AuthSidebar.vue'

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const userStore = useUserStore();

const submit = () => {
  form.post(route('login'), {
    onFinish: () => {
      form.reset('password')
      usePage().props.auth.user && userStore.setAuthUser(usePage().props.auth.user.data)
    },
  });
};

const registerRedirect = () => {
  router.get(route('register'))
}

const heroText = 'Startup loyihaga asos soling, jamoa yig\'ing va StartInvest bilan investitsiyalarni jalb qiling.'
</script>

<template>
  <Head title="Log in"/>

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
            Hisobingizga kiring
          </h1>
          <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
            {{ heroText }}
          </p>
        </div>
        <!-- End Title -->

        <!-- Button Group -->
        <AuthProviderButtons :form="form"/>
        <!-- End Button Group -->

        <div class="flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 dark:text-neutral-500 dark:before:border-neutral-700 dark:after:border-neutral-700">Yoki</div>

        <form @submit.prevent="submit">
          <div class="space-y-5">
            <div>
              <label for="hs-pro-dale" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                Elektron Pochta
              </label>

              <input type="email"
                     id="hs-pro-dale"
                     v-model="form.email"
                     class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                     placeholder="you@email.com"
                     required
                     autofocus
                     autocomplete="username"
              >
              <InputError class="mt-2" :message="form.errors.email"/>
            </div>

            <div>
              <div class="flex justify-between items-center mb-2">
                <label for="hs-pro-dalp" class="block text-sm font-medium text-gray-800 dark:text-white">
                  Parol
                </label>

                <Link v-if="canResetPassword" :href="route('password.request')" class="inline-flex items-center gap-x-1.5 text-xs text-gray-600 hover:text-gray-700 decoration-2 hover:underline focus:outline-none focus:underline dark:text-neutral-500 dark:hover:text-neutral-600">
                  Men parolimni unutdim
                </Link>
              </div>

              <div class="relative">
                <input id="hs-pro-dalp"
                       type="password"
                       class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                       placeholder="********"
                       v-model="form.password"
                       required
                       autocomplete="current-password"
                >
                <InputError class="mt-2" :message="form.errors.password"/>
                <button type="button" data-hs-toggle-password='{
                      "target": "#hs-pro-dalp"
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
            </div>

            <div class="flex gap-x-2">
              <Checkbox name="remember" v-model:checked="form.remember" id="hs-pro-dsftac"/>
              <label for="hs-pro-dsftac" class="text-sm text-gray-800 ms-1.5 dark:text-neutral-200">
                Meni eslab qol
              </label>
            </div>

            <button type="submit" :disabled="form.processing" class="py-2.5 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600">
              Kirish
            </button>
          </div>
        </form>

        <p class="text-sm text-gray-500 dark:text-neutral-500">
          Hali akkauntingiz yo'qmi?
          <Link :href="route('register')" class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-500">
            Ro'yxatdan o'tish
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </Link>
        </p>
      </div>
    </div>
    <!-- End Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->
</template>
