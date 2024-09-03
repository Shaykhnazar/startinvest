<script setup>

import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
  <App>
    <template #header>
      <Head title="Biz haqimizda"/>
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

                <h2 class="text-3xl font-bold lg:text-5xl dark:text-white">Startinvest.uz haqida</h2>

                <div class="text-lg text-gray-800 dark:text-neutral-200">
                  <p class="text-gray-700 leading-relaxed mb-4">
                    🚀 Startinvest.uz - bu Startuplarni rivojlantirish, investitsiya jalb qilish uchun online platforma!<br>

                    <q>Sizda agarda go’ya yoki startup qurish va uni moliyalashtirish istagi bor bo’lsa ushbu platforma orqali uni amalga oshirishingiz mumkin!</q><br>
                    <q>Agarda siz investor bo'lsangiz, u holda bizning platformadagi kelajagi porloq deb hisoblangan startuplarga investorlik qilish imkoniyatiga ega bo'lasiz!</q>
                  </p>

                  <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">Platformaning asosiy maqsadi va afzalliklari ❔:</h2>
                    <div class="text-gray-700 leading-relaxed" style="text-indent: 20px">
                      <ul class="list-disc list-inside text-gray-700 leading-relaxed mb-4">
                        <li>Agarda sizda MVP formatidagi startup loyihangiz bo’lsa uni moliyalashtirish uchun bizning platformadan foydalangan holda investitsiya jalb qilishingiz mumkin bo’ladi.</li>
                        <li>Bizning platformada investorlar sizning go’yangizni kuzatishi va agarda ularga maq’ul kelsa ularga investitsiya kiritishi mumkin.</li>
                        <li>Agarda sizda faqatgina go’ya yoki amaliyot o’tash istagi bo’lsa unda siz o’zingizni qiziqtirgan g’oya ustida jamoa to’plashingiz va uni MVP versiyada tayyorlab, platformada orqali e’lon qilish orqali loyihangizga investorlarni jalb qilishingiz mumkin.</li>
                      </ul>
                    </div>
                  </div>

                  <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-2">Plaftormadagi foydalanuvchi rollari 🕵️:</h2>
                    <div class="text-gray-700 leading-relaxed">
                      <ul class="list-disc list-inside text-gray-700 leading-relaxed mb-4">
                        <li>Go’ya ulashuvchilar - shunchaki hayoliga kelgan go’yani ulashadigan foydalanuvchilar (sababi ular shu go’yani o’zlari amalga oshirishga imkoniyati va salohiyati bo’lmasligi lekin uni kimdir amalga oshirishini hohlovchi kimsalar)</li>
                        <li>Dasturchilar, loyiha menedjerlari(PM), jamoa yetakchilari(Team lead)…</li>
                        <li>Investorlar - kompaniya, tadbirkorlar, katta/o'rta/kichik biznes egalari</li>
                      </ul>
                    </div>
                  </div>
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
