<script setup>

import { usePage } from '@inertiajs/vue3'
import { onMounted } from 'vue'
import { useUserStore } from '@/stores/UserStore.js'
import AnnouncementBanner from '@/Components/AnnouncementBanner.vue'
import HomeNavbar from '@/Components/HomeNavbar.vue'
import HomeFooter from '@/Components/HomeFooter.vue'

const userStore = useUserStore();
const pageProps = usePage().props

onMounted(() => {
  pageProps.auth.user && userStore.setAuthUser(pageProps.auth.user.data)
})
</script>

<template>
  <announcement-banner :is-test-mode="pageProps.isTestMode" />

  <slot name="header" />

  <el-container>
    <el-header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full">
      <home-navbar/>
    </el-header>
    <el-main>
      <slot />
    </el-main>
    <el-footer>
      <home-footer/>
    </el-footer>
  </el-container>
</template>

<style scoped>

</style>
