<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthSidebar from '@/Components/AuthSidebar.vue'

const props = defineProps({
  email: {
    type: String,
    required: true,
  },
  token: {
    type: String,
    required: true,
  },
});

const form = useForm({
  token: props.token,
  email: props.email,
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post(route('password.store'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>

<template>
  <Head title="Parolni tiklash" />

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
            Parolingizni tiklang
          </h1>
          <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
            Hisobingizga bog'langan elektron pochta manzilini kiriting. Biz sizga parolingizni tiklash uchun havolani yuboramiz.
          </p>
        </div>
        <!-- End Title -->

        <form @submit.prevent="submit">
          <div class="space-y-5">
            <div>
              <label for="hs-pro-dale" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                Elektron pochta
              </label>

              <input type="email"
                     id="hs-pro-dale"
                     class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                     placeholder="sizning@email.com"
                     v-model="form.email"
                     required
                     autofocus
                     autocomplete="username"
              >
              <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                Yangi parol
              </label>
              <TextInput
                id="password"
                type="password"
                v-model="form.password"
                required
                autocomplete="new-password"
                class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
              />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div>
              <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                Parolni tasdiqlash
              </label>
              <TextInput
                id="password_confirmation"
                type="password"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
                class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
              />
              <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Parolni tiklash
            </PrimaryButton>
          </div>
        </form>

        <p class="text-sm text-gray-500 dark:text-neutral-500">
          Parolingizni unutmadingizmi?
          <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-500" href="#">
            Tizimga kirish
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
          </a>
        </p>
      </div>
    </div>
    <!-- End Content -->
  </main>
  <!-- ========== END MAIN CONTENT ========== -->
</template>
