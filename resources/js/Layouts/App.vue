<script lang="ts" setup>

import {Link, router} from '@inertiajs/vue3'
import { ChatRound } from '@element-plus/icons-vue'
import {computed, ref} from 'vue'

const activeIndex = ref('home')
// const activeIndexComputed = computed(() => activeIndex.value)
const handleSelect = (key: string, keyPath: string[]) => {
  console.log(key, keyPath)
  activeIndex.value = key
}

const onClickMenuItem = (el, url) => {
  router.visit(url, {
    // onFinish: () => {
    //   activeIndex.value = el.index
    // }
  })
}

// router.on('navigate', (event) => {
//   // console.log(`Navigated to ${event.detail.page.url}`)
//   activeIndex.value = event.detail.page.url
// })


defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
});

const menuItems = [
  {
    name: 'Ideas',
    url: route('ideas'),
    index: '/ideas'
  },
  {
    name: 'StartUps',
    url: route('startups'),
    index: '/startups'
  },
  {
    name: 'Investors',
    url: route('investors'),
    index: '/investors',
    disabled: true
  },
  // {
  //   name: 'Blog',
  //   url: route('blog'),
  //   index: 'blog',
  //   disabled: true
  // },
  {
    name: 'About Us',
    url: route('about-us'),
    index: '/about-us'
  }
]

</script>

<template>
  <slot name="header" />

  <el-container>
    <el-header>
      <el-menu
        :default-active="activeIndex"
        class="el-menu-demo"
        mode="horizontal"
        :ellipsis="false"
        @select="handleSelect"
      >
        <el-menu-item index="home" @click="event => onClickMenuItem(event, route('home'))">
          <img
            style="width: 30px"
            src="/vendor/orchid/favicon.svg"
            alt="Element logo"
          />
        </el-menu-item>

        <el-menu-item
          v-for="menuItem in menuItems"
          :key="menuItem.index"
          :index="menuItem.index"
          :disabled="menuItem.disabled"
          @click="event => onClickMenuItem(event, menuItem.url)"
        >
          {{ menuItem.name }}
        </el-menu-item>

        <div class="flex-grow"/>
        <el-menu-item index="chat" @click="event => onClickMenuItem(event, route('chat'))" disabled>
          <el-icon>
            <ChatRound/>
          </el-icon>
          Chat
        </el-menu-item>
        <template v-if="$page.props.canLogin">
          <el-menu-item index="7">
            <Link
              v-if="$page.props.auth.user"
              :href="route('dashboard')"
            >Dashboard
            </Link>
            <template v-else>
              <Link
                v-if="$page.props.canRegister"
                :href="route('register')"
              >Sign Up
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
          <div class="text-lg font-bold">StartInvest © {{ new Date().getFullYear() }}</div>
        </el-col>
      </el-row>
    </el-footer>
  </el-container>
</template>

<style scoped>

</style>
