<script setup lang="ts">
import CabinetHeader from '@/Components/CabinetHeader.vue'
import CabinetFooter from '@/Components/CabinetFooter.vue'
import CabinetAside from '@/Components/CabinetAside.vue'
import { onUpdated, onMounted } from 'vue';
import { useUserStore } from '@/stores/UserStore.js'
import {usePage} from '@inertiajs/vue3';
import { type IStaticMethods } from "preline";

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
  <slot name="header" />

  <CabinetHeader/>

  <CabinetAside/>

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" class="lg:ps-[260px] pt-[59px] pb-[40px] sm:pb-[64px] bg-[#F9FAFB] dark:bg-[#171717]">
    <slot/>
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <CabinetFooter/>
</template>

<style scoped>

</style>
