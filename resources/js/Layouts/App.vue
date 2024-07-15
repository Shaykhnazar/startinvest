<script setup>

import { Link, router, usePage } from '@inertiajs/vue3'
import { ChatRound } from '@element-plus/icons-vue'
import {computed, onMounted, defineComponent, ref} from 'vue'
import { useUserStore } from '@/stores/UserStore.js'
import { useNavActiveTab } from '@/stores/useNavActiveTab.js'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import AnnouncementBanner from '@/Components/AnnouncementBanner.vue'

defineComponent({
  AnnouncementBanner
})
const activeTabStore = useNavActiveTab()

const handleSelect = (key, keyPath) => {
  console.log(key, keyPath)
  activeTabStore.setActiveTab(key)
  router.visit(route(key))
}

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  isTestMode: {
    type: Boolean,
    default: false
  }
});

const menuItems = [
  {
    name: 'Ideas',
    url: 'ideas.index',
  },
  {
    name: 'StartUps',
    url: 'startups.index',
  },
  {
    name: 'Investors',
    url: 'investors',
    disabled: true
  },
  // {
  //   name: 'Blog',
  //   url: route('blog'),
  //   disabled: true
  // },
  {
    name: 'About Us',
    url: 'about-us',
  }
]
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
    <el-header>
      <el-menu
        :default-active="activeTabStore.getActiveTab"
        class="el-menu-demo"
        mode="horizontal"
        :ellipsis="false"
        @select="handleSelect"
      >
        <el-menu-item index="home">
          <ApplicationLogo
            class="h-40 w-auto pt-5"
          />
        </el-menu-item>
        <el-menu-item
          v-for="menuItem in menuItems"
          :index="menuItem.url"
          :disabled="menuItem.disabled"
        >
          {{ menuItem.name }}
        </el-menu-item>

        <div class="flex-grow"/>
        <el-menu-item index="chat">
          <el-icon>
            <ChatRound/>
          </el-icon>
          Chat
        </el-menu-item>
        <template v-if="$page.props.canLogin">
          <el-menu-item :index="$page.props.auth.user ? 'dashboard.index' : 'login'">
            <Link
              v-if="$page.props.auth.user"
              :href="route('dashboard.index')"
            >Dashboard
            </Link>
            <template v-else>
              <Link
                :href="route('login')"
              >Login
              </Link
              >
            </template>
          </el-menu-item>
        </template>
      </el-menu>
    </el-header>
    <el-main>
      <slot />
    </el-main>
    <el-footer>
      <el-row>
        <el-col
          :span="24"
          :offset="0"
          class="text-center"
        >
          <div class="text-lg font-bold"> © {{ new Date().getFullYear() }} StartInvest | All rights reserved.</div>
        </el-col>
      </el-row>
    </el-footer>
  </el-container>
</template>

<style scoped>

</style>
