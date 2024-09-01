<template>
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid lg:grid-cols-2 lg:gap-y-16 gap-10">
      <!-- Card -->
      <Link class="group block rounded-xl overflow-hidden focus:outline-none" :href="route('ideas.index')">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
          <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img
                class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl"
                src="https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                alt="Blog Image">
          </div>

          <div class="grow">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
              Go'yalarni amalga oshirishni kechiktirmang
            </h3>
            <p class="mt-3 text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-200">
              Unikal g'oya izlab toping yoki sizda shunday go'ya bor lekin uni amalga oshirishga xoxish yoki imkoniyat yo'q bo'lsa uni biz bilan bo'lishing
            </p>
            <p class="mt-4 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
              Batafsil
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
              </svg>
            </p>
          </div>
        </div>
      </Link>
      <!-- End Card -->

      <!-- Card -->
      <Link class="group block rounded-xl overflow-hidden focus:outline-none" :href="route('startups.index')">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
          <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img
                class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl"
                src="https://images.unsplash.com/photo-1668906093328-99601a1aa584?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                alt="Blog Image">
          </div>

          <div class="grow">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
              Startup loyihalarni birgalikda takomillashtiring
            </h3>
            <p class="mt-3 text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-200">
              Startup loyihangiz bor lekin uni qanday kengaytirib keyingi bosqichga olib chiqishni o'ylayabsizmi? Bizningcha buni amalga oshirishda yaxshi jamoa to'plashingiz zarur!
            </p>
            <p class="mt-4 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
              Batafsil
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
              </svg>
            </p>
          </div>
        </div>
      </Link>
      <!-- End Card -->

      <!-- Card -->
      <Link class="group block rounded-xl overflow-hidden focus:outline-none" :href="route('startups.index')">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
          <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img
                class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl"
                src="https://images.unsplash.com/photo-1567016526105-22da7c13161a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                alt="Blog Image">
          </div>

          <div class="grow">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
              Startup loyihada ishtirok eting
            </h3>
            <p class="mt-3 text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-200">
              O'z ko'nikmala va tajribangizni turli xil startuplarda ishtirok etish orqali rivojlantirish imkoniyati sizda mavjud!
            </p>
            <p class="mt-4 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
              Batafsil
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
              </svg>
            </p>
          </div>
        </div>
      </Link>
      <!-- End Card -->

      <!-- Card -->
      <Link class="group block rounded-xl overflow-hidden focus:outline-none" :href="route('about-us')">
        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-5">
          <div class="shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img
                class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl"
                src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80"
                alt="Blog Image">
          </div>

          <div class="grow">
            <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
              Investitsiya kiriting
            </h3>
            <p class="mt-3 text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-200">
              Agarda siz investor bo'lsangiz, u holda kelajagi porloq deb hisoblagan startupga investorlik qilish imkoniyatiga ega bo'lasiz!
            </p>
            <p class="mt-4 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
              Batafsil
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"/>
              </svg>
            </p>
          </div>
        </div>
      </Link>
      <!-- End Card -->
    </div>
    <!-- End Grid -->
  </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';

</script>
