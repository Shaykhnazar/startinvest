<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';
import { useUserStore } from '@/stores/UserStore.js'

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
  password: '',
});
const user = ref(useUserStore().authUser)

const confirmUserDeletion = () => {
  confirmingUserDeletion.value = true;

  nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
  form.delete(route('dashboard.profile.destroy', user.value.id), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onError: () => passwordInput.value.focus(),
    onFinish: () => form.reset(),
  });
};

const closeModal = () => {
  confirmingUserDeletion.value = false;

  form.reset();
};
</script>

<template>
  <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">
    <!-- Grid -->
    <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
      <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
        <label class="inline-block text-sm text-gray-500 dark:text-neutral-500">
          Hisobni o‘chirish
        </label>
      </div>
      <!-- End Col -->

      <div class="sm:col-span-8 xl:col-span-4">
        <button type="button" @click="confirmUserDeletion" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-red-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
          Hisobimni o'chirish
        </button>

        <p class="mt-3 text-sm text-gray-500 dark:text-neutral-500">
          Bu darhol barcha ma'lumotlarni o'chirib tashlaydi. Bu amalni qaytarib bo‘lmaydi, shuning uchun ehtiyotkorlik bilan davom eting. <a class="text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-400 dark:hover:text-blue-500" href="#">Batafsil ma'lumot</a>
        </p>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Grid -->

    <Modal :show="confirmingUserDeletion" @close="closeModal">
      <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
          Hisobingizni o‘chirishni xohlayotganingizdan aminmisiz?
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
          Hisobingiz o‘chirib tashlanganidan so‘ng, barcha resurslar va ma’lumotlar doimiy ravishda o‘chirib tashlanadi.
          Hisobingizni doimiy ravishda o‘chirishni xohlayotganingizni tasdiqlash uchun parolingizni kiriting.
        </p>

        <div class="mt-6">
          <InputLabel for="password" value="Parol" class="sr-only"/>

          <TextInput
            id="password"
            ref="passwordInput"
            v-model="form.password"
            type="password"
            class="mt-1 block w-3/4"
            placeholder="Parol"
            @keyup.enter="deleteUser"
          />

          <InputError :message="form.errors.password" class="mt-2"/>
        </div>

        <div class="mt-6 flex justify-end">
          <SecondaryButton @click="closeModal"> Bekor qilish</SecondaryButton>

          <DangerButton
            class="ms-3"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            @click="deleteUser"
          >
            Hisobni o‘chirish
          </DangerButton>
        </div>
      </div>
    </Modal>
  </div>
</template>
