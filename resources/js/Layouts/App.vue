<script setup lang="ts">

import { Link, router, usePage } from '@inertiajs/vue3'
import { ChatRound } from '@element-plus/icons-vue'
import {computed, onMounted, defineComponent, ref} from 'vue'
import { useUserStore } from '@/stores/UserStore.js'
import { useNavActiveTab } from '@/stores/useNavActiveTab.js'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import AnnouncementBanner from '@/Components/AnnouncementBanner.vue'
import HomeNavbar from '@/Components/HomeNavbar.vue'

defineComponent({
  AnnouncementBanner
})

import { type IStaticMethods } from "preline/preline";
import HomeFooter from "@/Components/HomeFooter.vue";
declare global {
  interface Window {
    HSStaticMethods: IStaticMethods;
  }
}

const userStore = useUserStore();
const pageProps = usePage().props

onMounted(() => {
  setTimeout(() => {
    window.HSStaticMethods.autoInit();
  }, 100)
  pageProps.auth.user && userStore.setAuthUser(pageProps.auth.user.data)
})
</script>

<template>
  <announcement-banner :is-test-mode="pageProps.isTestMode" />

  <slot name="header" />

  <el-container class="main-container">
    <el-header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full py-7">
      <home-navbar/>
    </el-header>
    <el-main>
      <slot />
    </el-main>
    <el-footer class="footer">
<!--      <home-footer/>-->
    </el-footer>
  </el-container>
</template>

<style scoped>

</style>
