<script setup>
import { ref } from 'vue'
import CardItem from '@/Components/HomeIconCard.vue'

const cardItems = ref([
  {
    id: 1,
    icon: 'lucide-lightbulb',
    title: 'G\'oya',
    short: 'Biz sizning ajoyib g\'oyangizni muvaffaqiyatga aylantirishga yordam bera olamiz',
    route: 'ideas.index'
  },
  {
    id: 2,
    icon: 'lucide-users',
    title: 'Jamoa',
    short: 'Sizga kerakli mutahhasislardan o\'z jamoangizni tashkil etishda ko\'maklashamiz',
    route: 'startups.index'
  },
  {
    id: 3,
    icon: 'lucide-flag',
    title: 'Startup',
    short: 'Loyihangizga asos soling va MVP versiyada uni ishlab chiqing',
    route: 'startups.index'
  },
  {
    id: 4,
    icon: 'lucide-banknote',
    title: 'Investitsiya',
    short: 'Eng yaxshi deb hisoblagan startup loyihani izlab toping va uni moliyalashtiring',
    route: 'startups.index'
  },
  {
    id: 5,
    icon: 'lucide-circle-check',
    title: 'Natija',
    short: 'Loyihani muvaffaqiyatli ishga tushiring va keyingi bosqichga olib chiqing',
    route: 'startups.index'
  },
])
</script>

<template>
  <!-- Card Grid -->
  <div class="mb-3 pb-2 flex flex-row justify-between gap-4 overflow-x-auto [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-stone-100 [&::-webkit-scrollbar-thumb]:bg-stone-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
    <template v-for="item in cardItems" :key="item.id">
      <CardItem :item="item" />
    </template>
  </div>

  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!--    <div class="aspect-w-16 aspect-h-7">-->
    <!--      <img class="w-full object-cover rounded-xl"-->
    <!--           src="https://images.unsplash.com/photo-1624571409412-1f253e1ecc89?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80"-->
    <!--           alt="Features Image">-->
    <!--    </div>-->

    <!-- Grid -->
    <div class="mt-5 lg:mt-16 grid lg:grid-cols-3 gap-8 lg:gap-12">
      <div class="lg:col-span-1">
        <h2 class="font-bold text-2xl md:text-3xl text-gray-800 dark:text-neutral-200">
          Platformaning asosiy afzalliklari
        </h2>
        <p class="mt-2 md:mt-4 text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-200">
          Bu kabi platforma ko'plab yosh tadbirkorlar va startupchilar uchun juda foydalidir, chunki u ularning g'oyalarini haqiqatga aylantirishda zarur bo'lgan resurslar va bilimlarni bir joyga jamlashga va undan foydalanish imkonini beradi.
          Shuningdek, ushbu platforma moliyaviy yordam va maslahatlar bilan ta'minlash orqali loyihalarni yanada tezroq va samarali amalga oshirishlariga yordam beradi.
        </p>
      </div>
      <!-- End Col -->

      <div class="lg:col-span-2">
        <div class="grid sm:grid-cols-2 gap-8 md:gap-12">
          <!-- Icon Block -->
          <div class="flex gap-x-5">
            <svg class="shrink-0 mt-1 size-6 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
              <rect width="18" height="10" x="3" y="11" rx="2"/>
              <circle cx="12" cy="5" r="2"/>
              <path d="M12 7v4"/>
              <line x1="8" x2="8" y1="16" y2="16"/>
              <line x1="16" x2="16" y1="16" y2="16"/>
            </svg>
            <div class="grow">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                Innovatsion g'oyalar jamlangan
              </h3>
              <p class="mt-1 text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-200">
                G'oyalar va resurslarni samarali birlashtirish imkoniyati.
              </p>
            </div>
          </div>
          <!-- End Icon Block -->

          <!-- Icon Block -->
          <div class="flex gap-x-5">
            <svg class="shrink-0 mt-1 size-6 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
              <path d="M7 10v12"/>
              <path
                d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z"/>
            </svg>
            <div class="grow">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                Oddiy va hamyonbop
              </h3>
              <p class="mt-1 text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-200">
                Reklama qilish uchun ijtimoiy-tarmoqlardan va saytdan foydalanish imkoniyati
              </p>
            </div>
          </div>
          <!-- End Icon Block -->

          <!-- Icon Block -->
          <div class="flex gap-x-5">
            <svg class="shrink-0 mt-1 size-6 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            <div class="grow">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                Jamoa uchun mo'ljallangan
              </h3>
              <p class="mt-1 text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-200">
                Loyihangizni platforma ichida boshqarish imkoniyati
              </p>
            </div>
          </div>
          <!-- End Icon Block -->

          <!-- Icon Block -->
          <div class="flex gap-x-5">
            <svg class="shrink-0 mt-1 size-6 text-blue-600 dark:text-blue-500 lucide lucide-handshake" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" >
              <path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/>
              <path d="m21 3 1 11h-2"/>
              <path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/>
              <path d="M3 4h8"/>
            </svg>
            <div class="grow">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                Hamjamiyat
              </h3>
              <p class="mt-1 text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-200">
                Turli soha vakillari va biznes egalarining o'zaro hamkorlik qilishi uchun yaratilgan muhit
              </p>
            </div>
          </div>
          <!-- End Icon Block -->

        </div>
      </div>
      <!-- End Col -->
    </div>
    <!-- End Grid -->
  </div>
</template>
