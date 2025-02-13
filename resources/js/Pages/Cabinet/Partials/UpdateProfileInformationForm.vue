<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { useUserStore } from '@/stores/UserStore.js'
import { computed } from 'vue';

defineProps({
  mustVerifyEmail: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});
const user = computed(useUserStore().authUser)

const form = useForm({
  name: user.name,
  email: user.email,
});
</script>

<template>
    <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">
      <h2 class="font-semibold text-gray-800 dark:text-neutral-200">
        Shaxsiy ma'lumotlar
      </h2>
      <form @submit.prevent="form.patch(route('dashboard.profile.update', user?.id))" class="mt-6 space-y-6">

      <!-- Grid -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
          <label for="hs-pro-dappinm" class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
            Ism
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-8 xl:col-span-4">
          <input id="hs-pro-dappinm" type="text" v-model="form.name" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter full name">

          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
            To`liq ismingizni yoki o`zingiz uchun qulay bo`lgan ismni kiriting.
          </p>
        </div>

        <InputError class="mt-2" :message="form.errors.name" />
        <!-- End Col -->
      </div>
      <!-- End Grid -->

      <!-- Grid -->
<!--      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">-->
<!--        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">-->
<!--          <label for="hs-pro-dappiun" class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">-->
<!--            Username-->
<!--          </label>-->
<!--        </div>-->
<!--        &lt;!&ndash; End Col &ndash;&gt;-->
<!--  -->
<!--        <div class="sm:col-span-8 xl:col-span-4">-->
<!--          <input id="hs-pro-dappiun" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter username">-->
<!--  -->
<!--          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">-->
<!--            Enter your display name on Preline public forums.-->
<!--          </p>-->
<!--        </div>-->
<!--        &lt;!&ndash; End Col &ndash;&gt;-->
<!--      </div>-->
      <!-- End Grid -->

      <!-- Grid -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
          <label for="hs-pro-dappiem" class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
            Elektron pochta
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-8 xl:col-span-4">
          <input id="hs-pro-dappiem" type="text" v-model="form.email" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter email address">

          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
            Tizimga kirish uchun foydalanmoqchi bo'lgan elektron pochta manzilini kiriting.
          </p>
        </div>

        <InputError class="mt-2" :message="form.errors.email" />
        <!-- End Col -->
      </div>
      <!-- End Grid -->

<!--      <div v-if="mustVerifyEmail && user.email_verified_at === null">-->
<!--        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">-->
<!--          Elektron pochta manzilingiz tasdiqlanmagan.-->
<!--          <Link-->
<!--            :href="route('verification.send')"-->
<!--            method="post"-->
<!--            as="button"-->
<!--            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"-->
<!--          >-->
<!--            Tasdiqlash elektron pochtasini qayta yuborish uchun shu yerga bosing.-->
<!--          </Link>-->
<!--        </p>-->

<!--        <div-->
<!--          v-show="status === 'verification-link-sent'"-->
<!--          class="mt-2 font-medium text-sm text-green-600 dark:text-green-400"-->
<!--        >-->
<!--          Yangi tasdiqlash havolasi elektron pochta manzilingizga yuborildi.-->
<!--        </div>-->
<!--      </div>-->


      <!-- Button Group -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2"></div>

        <div class="sm:col-span-8 xl:col-span-4">
          <div class="flex gap-x-3">
            <button type="submit" :disabled="form.processing" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">
              Saqlash
            </button>
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
              Bekor qilish
            </button>
            <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saqlandi.</p>
          </div>
        </div>
      </div>
      <!-- End Button Group -->
      </form>
    </div>
</template>
