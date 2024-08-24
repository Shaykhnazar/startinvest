<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
  password: '',
});

const confirmUserDeletion = () => {
  confirmingUserDeletion.value = true;

  nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
  form.delete(route('profile.destroy'), {
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
  <section class="space-y-6">
    <header>
      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Hisobni o‘chirish</h2>

      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Hisobingiz o‘chirib tashlanganidan so‘ng, barcha resurslar va ma’lumotlar doimiy ravishda o‘chirib tashlanadi.
        Hisobingizni o‘chirishdan oldin, saqlamoqchi bo‘lgan har qanday ma’lumot yoki axborotni yuklab oling.
      </p>
    </header>

    <DangerButton @click="confirmUserDeletion">Hisobni o‘chirish</DangerButton>

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
  </section>
</template>
