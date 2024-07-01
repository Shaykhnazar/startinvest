<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, router, useForm, usePage } from '@inertiajs/vue3';
import AuthProviderButtons from '@/Components/AuthProviderButtons.vue';
import { useUserStore } from '@/stores/UserStore.js'

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
</script>

<template>
  <GuestLayout>
    <Head title="Log in"/>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>

    <div class="mt-4 mb-4">
      <span class="text-lg font-semibold flex items-center justify-center">Sign in</span>
    </div>

    <form @submit.prevent="submit">
      <div>
        <InputLabel for="email" value="Email"/>

        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autofocus
          autocomplete="username"
        />

        <InputError class="mt-2" :message="form.errors.email"/>
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="Password"/>

        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="current-password"
        />

        <InputError class="mt-2" :message="form.errors.password"/>
      </div>

      <div class="flex items-center justify-between mt-5 mb-5">
        <label class="flex items-center">
          <Checkbox name="remember" v-model:checked="form.remember"/>
          <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
        </label>

        <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-gray-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-blue-800">
          Forgot your password?
        </Link>
      </div>

      <div class="flex items-center justify-center mt-5 mb-5">
        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Log in
        </PrimaryButton>
      </div>


      <div style="position: relative; text-align: center; margin-top: 20px; margin-bottom: 20px;">
        <hr style="border: 1px solid #ccc;">
        <span style="position: absolute; top: -10px; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 0 10px;">
          Sign in with:
        </span>
      </div>

      <AuthProviderButtons :form="form"/>

      <div style="position: relative; text-align: center; margin-top: 20px; margin-bottom: 20px;">
        <hr style="border: 1px solid #ccc;">
        <span style="position: absolute; top: -10px; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 0 10px;">
          Don't have an account?
        </span>
      </div>
      <div class="flex items-center justify-center">
        <PrimaryButton @click="registerRedirect" type="button">
          Sign Up
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
