<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthSidebar from '@/Components/AuthSidebar.vue'

defineProps({
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
});

const submit = () => {
  form.post(route('password.email'));
};
</script>

<template>
  <Head :title="$t('pages.password.reset.title')"/>

  <!-- ========== MAIN CONTENT ========== -->
  <main class="flex min-h-full">
    <!-- Sidebar -->
    <AuthSidebar/>
    <!-- End Sidebar -->
    <!-- Content -->
    <div class="grow px-5">
      <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
        {{ status }}
      </div>
      <div class="h-full min-h-screen sm:w-[448px] flex flex-col justify-center mx-auto space-y-5">
        <!-- Title -->
        <div>
          <h1 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-neutral-200">
            {{ $t('pages.password.reset.heading') }}
          </h1>
          <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
            {{ $t('pages.password.reset.instructions') }}
          </p>
        </div>
        <!-- End Title -->

        <form @submit.prevent="submit">
          <div class="space-y-5">
            <div>
              <label for="hs-pro-dale" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                {{ $t('pages.password.reset.email_label') }}
              </label>

              <input type="email"
                     id="hs-pro-dale"
                     class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"
                     :placeholder="$t('pages.password.reset.email_placeholder')"
                     v-model="form.email"
                     required
                     autofocus
                     autocomplete="username"
              >
              <InputError class="mt-2" :message="form.errors.email"/>
            </div>

            <button type="submit" :disabled="form.processing"
                    class="py-2.5 px-3 w-full inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500">
              {{ $t('pages.password.reset.button') }}
            </button>
          </div>
        </form>

        <p class="text-sm text-gray-500 dark:text-neutral-500">
          {{ $t('pages.password.reset.reminder') }}
          <Link :href="route('login')"
                class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-500">
            {{ $t('pages.password.reset.login_link') }}
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
  <!-- ========== END MAIN CONTENT ========== -->
</template>
