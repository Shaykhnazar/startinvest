<script setup lang="ts">
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { loadLanguageAsync, getActiveLanguage } from 'laravel-vue-i18n';
import type { IStaticMethods } from 'preline'
// import api from '@/services/api';

declare global {
  interface Window {
    HSStaticMethods: IStaticMethods;
  }
}
// Reactive variable for current language
const currentLanguage = ref(getActiveLanguage());

// List of available languages with icons and labels
const languages = [
  {
    value: 'uz_Latn',
    label: 'UZ',
    icon: '<svg class="shrink-0 size-4 rounded-full" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250"><rect width="500" height="250" fill="#1eb53a"/> <rect width="500" height="125" fill="#0099b5"/> <rect width="500" height="90" y="80" fill="#ce1126"/> <rect width="500" height="80" y="85" fill="#fff"/> <circle cx="70" cy="40" r="30" fill="#fff"/> <circle cx="80" cy="40" r="30" fill="#0099b5"/> <g fill="#fff" transform="translate(136,64)"> <g id="s3"> <g id="s"> <g id="f"> <g id="t"> <path id="o" d="M0,-6V0H3" transform="rotate(18,0,-6)"/> <use xlink:href="#o" transform="scale(-1,1)"/> </g> <use xlink:href="#t" transform="rotate(72)"/> </g> <use xlink:href="#t" transform="rotate(-72)"/> <use xlink:href="#f" transform="rotate(144)"/> </g> <use xlink:href="#s" y="-24"/> <use xlink:href="#s" y="-48"/> </g> <use xlink:href="#s3" x="24"/> <use xlink:href="#s3" x="48"/> <use xlink:href="#s" x="-48"/> <use xlink:href="#s" x="-24"/> <use xlink:href="#s" x="-24" y="-24"/> </g> </svg>',
  },
  {
    value: 'en',
    label: 'EN',
    icon: '<svg class="shrink-0 size-4 rounded-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 30"><clipPath id="a"><path d="M0 0v30h60V0z"/></clipPath><clipPath id="b"><path d="M30 15h30v15zv15H0zH0V0zV0h30z"/></clipPath><g clip-path="url(#a)"><path d="M0 0v30h60V0z" fill="#012169"/><path d="M0 0l60 30m0-30L0 30" stroke="#fff" stroke-width="6"/><path d="M0 0l60 30m0-30L0 30" clip-path="url(#b)" stroke="#C8102E" stroke-width="4"/><path d="M30 0v30M0 15h60" stroke="#fff" stroke-width="10"/><path d="M30 0v30M0 15h60" stroke="#C8102E" stroke-width="6"/></g></svg>',
  },
  {
    value: 'ru',
    label: 'RU',
    icon: '<svg class="shrink-0 size-4 rounded-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 6"><rect fill="#fff" width="9" height="3"/><rect fill="#d52b1e" y="3" width="9" height="3"/><rect fill="#0039a6" y="2" width="9" height="2"/></svg>',
  }
];

// Change language asynchronously
const changeLanguage = async (event) => {
  const selectedLanguage = event.target.value;

  // Load the selected language in the frontend
  await loadLanguageAsync(selectedLanguage);
  currentLanguage.value = getActiveLanguage();

  // Update the language preference on the backend
  router.post(route('language.switch'), { locale: selectedLanguage }, {
    onSuccess: () => {
      setTimeout(() => {
        window.HSStaticMethods.autoInit();
      }, 100)
      console.log(`Language switched to ${selectedLanguage} on the backend`);
    },
    onError: (error) => {
      console.error('Error switching language:', error);
    },
  })



  // api.language.switch(selectedLanguage)
  //   .then(() => console.log(`Language switched to ${selectedLanguage} on the backend`))
  //   .catch((error) => console.error('Error switching language:', error));
};
</script>

<template>
  <!-- Language Select -->
  <div class="relative">
    <select id="hs-pro-select-language" @change="changeLanguage" data-hs-select='{
      "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><div data-icon></div></button>",
      "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-3 pe-7 flex items-center gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm text-gray-800 hover:border-gray-300 focus:outline-none focus:border-gray-300 dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-200 dark:hover:border-neutral-700 dark:focus:border-neutral-700",
      "dropdownClasses": "end-0 w-full min-w-[180px] max-h-72 p-1 space-y-0.5 z-50 w-full overflow-hidden overflow-y-auto bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900",
      "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",
      "optionTemplate": "<div><div class=\"flex items-center gap-x-2\"><div data-icon></div><div class=\"text-gray-800 dark:text-neutral-200\" data-title></div><span class=\"hidden hs-selected:block ms-auto\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div></div>"
    }'>
      <option v-for="language in languages" :key="language.value" :value="language.value" :selected="currentLanguage === language.value" :data-hs-select-option='JSON.stringify({
        icon: language.icon
      })'>{{ language.label }}</option>
    </select>

    <div class="absolute top-1/2 end-2.5 -translate-y-1/2">
      <svg class="shrink-0 size-3.5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
    </div>
  </div>
  <!-- End Language Select -->
</template>

<style scoped>
</style>
