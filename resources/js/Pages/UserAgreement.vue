<script setup>
import { Head, Link } from '@inertiajs/vue3'
import App from '@/Layouts/App.vue'
</script>

<template>
  <App>
    <template #header>
      <Head title="Foydalanish shartlari"/>
    </template>

    <el-container>
      <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
          <!-- Content -->
          <div class="lg:col-span-2">
            <div class="py-8 lg:pe-8">
              <div class="space-y-5 lg:space-y-8">
                <Link class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500" :href="route('home')">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                  Asosiy sahifa
                </Link>

                <h2 class="text-3xl font-bold lg:text-5xl dark:text-white">Foydalanish shartlari</h2>

                <div class="text-lg text-gray-700 dark:text-neutral-400 dark:hover:text-neutral-200">
                  <p class="leading-relaxed mb-4">
                    Ushbu shartlar "Startinvest.uz" platformasidan foydalangan holda sizni qamrab oladi. Platformadan foydalanish orqali siz quyidagi shartlarga rozilik bildirasiz:
                  </p>
                  <ul class="list-disc list-inside mb-4">
                    <li>Platformaga faqat qonuniy maqsadlar uchun kirishingiz kerak.</li>
                    <li>Foydalanuvchilar tomonidan kiritilgan ma'lumotlarning to'g'riligi va haqqoniyligi uchun mas'uliyat o'z zimmasiga oladi.</li>
                    <li>Platformada faqat o'z ma'lumotlaringizni yoki ruxsat etilgan ma'lumotlarni yuklashingiz mumkin.</li>
                    <li>Platformada noqonuniy, zararli yoki nopok ma'lumotlarni tarqatish taqiqlanadi.</li>
                    <li>Platformada har qanday xizmatdan foydalanish, kiritish yoki ma'lumot almashishning qonuniyligi foydalanuvchining javobgarligidir.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </el-container>
  </App>
</template>

<style scoped>
</style>
