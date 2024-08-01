<script setup>
import { Head } from '@inertiajs/vue3';
import App from '@/Layouts/App.vue';
import HomeCarousel from "@/Components/HomeCarousel.vue";
import HomeIconBlocksSection from '@/Components/HomeIconBlocksSection.vue'
import HomeCardBlogSection from '@/Components/HomeCardBlogSection.vue'
</script>

<template>
  <App>
    <template #header>
      <Head title="Home page"/>
    </template>

    <home-carousel/>
    <!-- Features -->
    <home-icon-blocks-section/>
    <!-- End Features -->
    <!-- Card Blog -->
    <home-card-blog-section/>
    <!-- End Card Blog -->
  </App>
</template>

