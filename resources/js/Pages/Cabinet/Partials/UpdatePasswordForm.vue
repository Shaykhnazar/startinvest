<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
  <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">
    <div class="inline-flex items-center gap-x-2">
      <h2 class="font-semibold text-gray-800 dark:text-neutral-200">
        Parolni yangilash
      </h2>

      <!-- Tooltip -->
      <div class="hs-tooltip inline-block">
        <svg class="hs-tooltip-toggle shrink-0 ms-1 size-3 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
          <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
        </svg>
        <div class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-[60] p-4 w-96 bg-white rounded-xl shadow-xl dark:bg-neutral-900 dark:text-neutral-400" role="tooltip">
          <p class="font-medium text-gray-800 dark:text-neutral-200">
            Parol talablari:
          </p>
          <p class="mt-1 text-sm font-normal text-gray-500 dark:text-neutral-400">
            Hisobingiz xavfsiz bo'lishi uchun uzoq va tasodifiy paroldan foydalanayotganingizga ishonch hosil qiling.
            Ushbu talablar bajarilganligini tekshiring:
          </p>
          <ul class="mt-1 ps-3.5 list-disc list-outside text-sm font-normal text-gray-500 dark:text-neutral-400">
            <li>
              Kamida 8 ta belgidan iborat bo'lishi kerak - qancha ko'p bo'lsa, shuncha yaxshi
            </li>
            <li>
              Hech bo'lmaganda bitta kichik harf mavjud bo'lishi kerak
            </li>
            <li>
              Hech bo'lmaganda bitta katta harf mavjud bo'lishi kerak
            </li>
            <li>
              Hech bo'lmaganda bitta raqam, belgi yoki bo'sh joy belgisi mavjud bo'lishi kerak
            </li>
          </ul>
        </div>
      </div>
      <!-- End Tooltip -->
    </div>
    <form @submit.prevent="updatePassword" class="mt-6 space-y-6">
      <!-- Grid -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
          <label for="hs-pro-dappcp" class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
            Joriy parol
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-8 xl:col-span-4">
          <!-- Input -->
          <div class="relative">
            <input id="hs-pro-dappcp" type="text" v-model="form.current_password" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Joriy parolni kiriting">
            <button type="button" data-hs-toggle-password='{
                        "target": "#hs-pro-dappcp"
                      }' class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
              <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />
                <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />
                <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />
                <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22" />
                <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3" />
              </svg>
            </button>
          </div>
          <!-- End Input -->
        </div>
        <!-- End Col -->
        <InputError :message="form.errors.current_password" class="mt-2" />
      </div>
      <!-- End Grid -->

      <!-- Grid -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
          <label for="hs-pro-dappnp" class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
            Yangi parol
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-8 xl:col-span-4">
          <div data-hs-toggle-password-group class="space-y-2">
            <!-- Input -->
            <div class="relative">
              <input id="hs-pro-dappnp" type="text" v-model="form.password" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Yangi parolni kiriting">
              <button type="button" data-hs-toggle-password='{
                          "target": ["#hs-pro-dappnp", "#hs-pro-dapprnp"]
                        }' class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />
                  <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />
                  <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />
                  <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22" />
                  <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                  <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3" />
                </svg>
              </button>

              <InputError :message="form.errors.password" class="mt-2" />
            </div>
            <!-- End Input -->

            <!-- Input -->
            <div class="relative">
              <input id="hs-pro-dapprnp" type="text" v-model="form.password_confirmation" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Yangi parolni takrorlang">
              <button type="button" data-hs-toggle-password='{
                          "target": ["#hs-pro-dappnp", "#hs-pro-dapprnp"]
                        }' class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24" />
                  <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68" />
                  <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61" />
                  <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22" />
                  <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                  <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3" />
                </svg>
              </button>

              <InputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>
            <!-- End Input -->

            <div data-hs-strong-password='{
                          "target": "#hs-pro-dappnp",
                          "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-blue-500 opacity-50 mx-1"
                        }' class="flex mt-2 -mx-1"></div>

            <p class="text-sm text-gray-600 dark:text-neutral-400">
              Darajasi: <span></span>
            </p>

            <!-- Button Group -->
            <div class="flex items-center gap-x-3">
              <button type="submit" :disabled="form.processing" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                O'zgartirish
              </button>
              <a class="text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-400 dark:hover:text-blue-500"  :href="route('password.request')">
                Men parolimni unutdim
              </a>

              <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saqlangan.</p>
            </div>
            <!-- End Button Group -->
          </div>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Grid -->
    </form>
  </div>
</template>
