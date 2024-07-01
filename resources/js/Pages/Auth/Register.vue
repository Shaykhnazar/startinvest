<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import AuthProviderButtons from '@/Components/AuthProviderButtons.vue'
import {useUserStore} from '@/stores/UserStore.js'

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

</script>

<template>
  <GuestLayout>
    <Head title="Register"/>

    <div class="mt-4 mb-4">
      <span class="text-lg font-semibold flex items-center justify-center">Sign up</span>
    </div>

    <form @submit.prevent="submit">
      <div>
        <InputLabel for="name" value="Name"/>

        <TextInput
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
        />

        <InputError class="mt-2" :message="form.errors.name"/>
      </div>

      <div class="mt-4">
        <InputLabel for="email" value="Email"/>

        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
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
          autocomplete="new-password"
        />

        <InputError class="mt-2" :message="form.errors.password"/>
      </div>

      <div class="mt-4">
        <InputLabel for="password_confirmation" value="Confirm Password"/>

        <TextInput
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />

        <InputError class="mt-2" :message="form.errors.password_confirmation"/>
      </div>

      <div class="flex items-center justify-between mt-5 mb-5">
        <Link
          :href="route('login')"
          class="text-sm text-gray-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-blue-800"
        >
          Already have an account?
        </Link>

        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Register
        </PrimaryButton>
      </div>

      <div style="position: relative; text-align: center; margin-top: 20px; margin-bottom: 20px;">
        <hr style="border: 1px solid #ccc;">
        <span style="position: absolute; top: -10px; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 0 10px;">
          Sign up with:
        </span>
      </div>

      <AuthProviderButtons :form="form"/>
    </form>
  </GuestLayout>
</template>
