<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { useUserStore } from '@/stores/UserStore.js'

const props = defineProps({
  status: {
    type: String,
  },
});

const form = useForm({});

const submit = () => {
  form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');

const logoutHandle = () => {
  form.post(route('logout'), {
    onSuccess: () => {
      useUserStore().$reset()
    }
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Emailni Tasdiqlash" />

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
      Ro'yxatdan o'tganingiz uchun rahmat! Davom etishdan oldin, elektron pochtangizga yuborilgan havolani bosib, manzilingizni tasdiqlashingiz mumkinmi? Agar siz elektron pochta xabarini olmagan bo'lsangiz, yana birini yuborishdan mamnunmiz.
    </div>

    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400" v-if="verificationLinkSent">
      Ro'yxatdan o'tish paytida taqdim etgan elektron pochta manzilingizga yangi tasdiqlash havolasi yuborildi.
    </div>

    <form @submit.prevent="submit">
      <div class="mt-4 flex items-center justify-between">
        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Tasdiqlash xabarini qayta yuboring
        </PrimaryButton>

        <Link
          @click="logoutHandle"
          method="post"
          as="button"
          class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
        >Chiqish</Link
        >
      </div>
    </form>
  </GuestLayout>
</template>
