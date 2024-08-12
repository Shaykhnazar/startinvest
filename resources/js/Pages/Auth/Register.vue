<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import AuthProviderButtons from '@/Components/AuthProviderButtons.vue'
import {useUserStore} from '@/stores/UserStore.js'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import AuthSidebar from '@/Components/AuthSidebar.vue'

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
      form.reset('password', 'password_confirmation')
      usePage().props.auth.user && userStore.setAuthUser(usePage().props.auth.user.data)
    },
  });
};

const heroText = 'Startup loyihaga asos soling, jamoa yig\'ing va StartInvest bilan investitsiyalarni jalb qiling.'

</script>

<template>
  <Head title="Register"/>

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
            Ro'yxatdan o'ting
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
              <label for="hs-pro-dalfn" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                Ism
              </label>

              <input
                type="text"
                id="hs-pro-dalfn"
                class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                placeholder="John Doe"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
              >
              <InputError class="mt-2" :message="form.errors.name"/>
            </div>

            <div>
              <label for="hs-pro-dale" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                Elekton Pochta
              </label>

              <input type="email" id="hs-pro-dale" class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                 placeholder="you@email.com"
                 v-model="form.email"
                 required
                 autocomplete="username"
              >
              <InputError class="mt-2" :message="form.errors.email"/>
            </div>

            <div data-hs-toggle-password-group class="space-y-3">
              <!-- Input -->
              <div>
                <label for="hs-pro-dappnp" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                  Parol
                </label>

                <div class="relative">
                  <input id="hs-pro-dappnp"
                         type="password"
                         class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                         placeholder="********"
                         v-model="form.password"
                         required
                         autocomplete="new-password"
                  >
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
              <!-- End Input -->

              <!-- Input -->
              <div class="relative">
                <input id="hs-pro-dapprnp" type="password" class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                       placeholder="********"
                       v-model="form.password_confirmation"
                       required
                       autocomplete="new-password"
                >
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
              <!-- End Input -->
              <InputError class="mt-2" :message="form.errors.password_confirmation"/>
            </div>

<!--            <div>-->
<!--              <label for="hs-pro-dappcn" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">-->
<!--                Company name-->
<!--              </label>-->

<!--              <input type="text" id="hs-pro-dappcn" class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="e.g. Preline">-->
<!--            </div>-->

<!--            TODO: Add page terms and conditions -->
<!--            <div class="flex gap-x-2">-->
<!--              <input type="checkbox" class="shrink-0 border-gray-200 size-3.5 mt-[3px] rounded text-blue-600 focus:ring-offset-0 dark:bg-neutral-800 dark:checked:bg-blue-500 dark:border-neutral-700" id="hs-pro-dsftac">-->
<!--              <label for="hs-pro-dsftac" class="text-sm text-gray-800 ms-1.5 dark:text-neutral-200">-->
<!--                Men -->
<!--                <a class="inline-flex items-center gap-x-1.5 font-medium text-blue-600 hover:text-blue-700 decoration-2 hover:underline dark:text-blue-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600" href="#">-->
<!--                  Foydalanish Shartlarini-->
<!--                </a> qabul qilaman-->
<!--              </label>-->
<!--            </div>-->

            <button type="submit" class="py-2.5 px-3 w-full inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600">
              Ro'yxatdan o'tish
            </button>
          </div>
        </form>

        <p class="text-sm text-gray-500 dark:text-neutral-500">
          Akkauntingiz bormi?
          <Link :href="route('login')" class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-500">
            Kirish
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </Link>
        </p>
      </div>
    </div>
    <!-- End Content -->
  </main>

<!--  <GuestLayout>-->

<!--&lt;!&ndash;    <div class="mt-4 mb-4">&ndash;&gt;-->
<!--&lt;!&ndash;      <span class="text-lg font-semibold flex items-center justify-center">Sign up</span>&ndash;&gt;-->
<!--&lt;!&ndash;    </div>&ndash;&gt;-->

<!--    <form @submit.prevent="submit">-->
<!--      <div>-->
<!--        <InputLabel for="name" value="Name"/>-->

<!--        <TextInput-->
<!--          id="name"-->
<!--          type="text"-->
<!--          class="mt-1 block w-full"-->
<!--          v-model="form.name"-->
<!--          required-->
<!--          autofocus-->
<!--          autocomplete="name"-->
<!--        />-->

<!--        <InputError class="mt-2" :message="form.errors.name"/>-->
<!--      </div>-->

<!--      <div class="mt-4">-->
<!--        <InputLabel for="email" value="Email"/>-->

<!--        <TextInput-->
<!--          id="email"-->
<!--          type="email"-->
<!--          class="mt-1 block w-full"-->
<!--          v-model="form.email"-->
<!--          required-->
<!--          autocomplete="username"-->
<!--        />-->

<!--        <InputError class="mt-2" :message="form.errors.email"/>-->
<!--      </div>-->

<!--      <div class="mt-4">-->
<!--        <InputLabel for="password" value="Password"/>-->

<!--        <TextInput-->
<!--          id="password"-->
<!--          type="password"-->
<!--          class="mt-1 block w-full"-->
<!--          v-model="form.password"-->
<!--          required-->
<!--          autocomplete="new-password"-->
<!--        />-->

<!--        <InputError class="mt-2" :message="form.errors.password"/>-->
<!--      </div>-->

<!--      <div class="mt-4">-->
<!--        <InputLabel for="password_confirmation" value="Confirm Password"/>-->

<!--        <TextInput-->
<!--          id="password_confirmation"-->
<!--          type="password"-->
<!--          class="mt-1 block w-full"-->
<!--          v-model="form.password_confirmation"-->
<!--          required-->
<!--          autocomplete="new-password"-->
<!--        />-->

<!--        <InputError class="mt-2" :message="form.errors.password_confirmation"/>-->
<!--      </div>-->

<!--      <div class="flex items-center justify-between mt-5 mb-5">-->
<!--        <Link-->
<!--          :href="route('login')"-->
<!--          class="text-sm text-gray-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-blue-800"-->
<!--        >-->
<!--          Already have an account?-->
<!--        </Link>-->

<!--        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">-->
<!--          Register-->
<!--        </PrimaryButton>-->
<!--      </div>-->

<!--      <div style="position: relative; text-align: center; margin-top: 20px; margin-bottom: 20px;">-->
<!--        <hr style="border: 1px solid #ccc;">-->
<!--        <span style="position: absolute; top: -10px; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 0 10px;">-->
<!--          Sign up with:-->
<!--        </span>-->
<!--      </div>-->

<!--      <AuthProviderButtons :form="form"/>-->
<!--    </form>-->
<!--  </GuestLayout>-->
</template>
