<script setup lang="ts">

import { usePage } from '@inertiajs/vue3'
import { onMounted } from 'vue'
import { useUserStore } from '@/stores/UserStore.js'
import AnnouncementBanner from '@/Components/AnnouncementBanner.vue'
import HomeNavbar from '@/Components/HomeNavbar.vue'
import HomeFooter from '@/Components/HomeFooter.vue'
import { type IStaticMethods } from "preline";

const userStore = useUserStore();
const pageProps = usePage().props

declare global {
  interface Window {
    HSStaticMethods: IStaticMethods;
  }
}

onMounted(() => {
  setTimeout(() => {
    window.HSStaticMethods.autoInit();
  }, 100)

  pageProps.auth.user && userStore.setAuthUser(pageProps.auth.user.data)

  // Dynamically load the external script
  const script = document.createElement('script');
  script.src = '/vendor/preline/dist/index.js?v=1.0.0';
  script.onload = () => {
    console.log('Preline script loaded successfully.');
    // If preline has specific initializations, you can trigger them here
  };
  script.onerror = () => {
    console.error('Failed to load Preline script.');
  };
  document.body.appendChild(script);
})
</script>

<template>
  <announcement-banner :is-test-mode="pageProps.isTestMode" />

  <slot name="header" />

  <el-container class="main-container">
    <el-header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full">
      <home-navbar/>
    </el-header>
    <el-main>
      <slot />
    </el-main>
    <el-footer class="mt-auto py-5">
      <home-footer/>
    </el-footer>
  </el-container>
</template>

<style scoped>
.main-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh; /* Ensures the container takes at least the full viewport height */
}
</style>
