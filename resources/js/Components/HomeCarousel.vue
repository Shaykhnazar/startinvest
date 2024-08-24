<script setup>
import {Link} from '@inertiajs/vue3'
import { onMounted, ref } from 'vue'

const ASSETS_BASE_URL = 'https://startinvestuz-190827817.imgix.net'
const ASSETS_FORMAT_PARAMS = '?q=80&w=1920&auto=format&fit=crop'


onMounted(() => {
  // console.log(ASSETS_URL)
})

const carouselItems = ref([
    {
      id: 1,
      image_url: `https://startinvestuz-190827817.imgix.net/carousel_1.jpg?q=80&w=1920&auto=format&fit=crop`,
      title: 'G\'oya',
      short: 'G\'oyalaringiz bilan o\'rtoqlashing!',
      route: 'ideas.index'
    },
    {
      id: 2,
      image_url: `https://startinvestuz-190827817.imgix.net/carousel_2.jpg?q=80&w=1920&auto=format&fit=crop`,
      title: 'Startup',
      short: 'Keyingi jamoa a\'zolaringizni toping va mahoratingizni oshiring!',
      route: 'startups.index'
    },
    {
      id: 3,
      image_url: `https://startinvestuz-190827817.imgix.net/carousel_3.jpg?q=80&w=1920&auto=format&fit=crop`,
      title: 'Investitsiya',
      short: 'Eng yaxshi deb hisoblagan startap loyihani izlab toping va uni moliyalashtiring!',
      route: 'startups.index'
    },
])
</script>

<template>
  <!-- Slider -->
  <div class="px-4 lg:px-6 lg:px-8 py-10">
    <div data-hs-carousel='{
      "loadingClasses": "opacity-0",
      "isAutoplay": true
    }' class="relative">
      <div class="hs-carousel relative overflow-hidden w-full h-[30rem] md:h-[calc(100vh-106px)]  bg-gray-100 rounded-2xl dark:bg-neutral-800">
        <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
          <!-- Item -->
          <div class="hs-carousel-slide" v-for="(item, index) in carouselItems" :key="index">
            <div :style="{ backgroundImage: `url(${item.image_url})` }" class="h-[30rem] md:h-[calc(100vh-106px)] flex flex-col bg-cover bg-center bg-no-repeat">
              <div class="mt-auto w-2/3 md:max-w-lg ps-5 pb-5 md:ps-10 md:pb-10">
                <span class="block text-white">{{ item.title }}</span>
                <span class="block text-white text-xl md:text-3xl">{{ item.short }}</span>
                <div class="mt-5">
                  <a :href="route(item.route)" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl bg-white border border-transparent text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    Batafsil
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Item -->
        </div>
      </div>

      <!-- Arrows -->
      <button type="button" class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-12 h-full text-black hover:bg-white/20 rounded-s-2xl focus:outline-none focus:bg-white/20">
      <span class="text-2xl" aria-hidden="true">
        <svg class="shrink-0 size-3.5 md:size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
        </svg>
      </span>
        <span class="sr-only">Oldingi</span>
      </button>

      <button type="button" class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-12 h-full text-black hover:bg-white/20 rounded-e-2xl focus:outline-none focus:bg-white/20">
        <span class="sr-only">Keyingi</span>
        <span class="text-2xl" aria-hidden="true">
        <svg class="shrink-0 size-3.5 md:size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
        </svg>
      </span>
      </button>
      <!-- End Arrows -->
    </div>
  </div>
  <!-- End Slider -->
</template>

<style scoped>

</style>
