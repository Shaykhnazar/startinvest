<template>
  <template v-if="!userStore.isGuest">
    <div class="pb-1 px-4 mb-2 grid grid-cols-3 gap-y-2 lg:gap-y-0 lg:gap-x-5 border-b border-gray-200 dark:border-neutral-700">
      <div class="flex-grow-0">
        <Link :href="route('user.profile', userStore.authUser?.id)" class="block focus:outline-none">
          <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
        </Link>
      </div>
      <!-- End Col -->

      <div @click="$emit('showModal')" class="new-idea-text flex justify-center flex-grow-2 items-center flex-wrap border border-gray-300 rounded-xl dark:border-neutral-700 gap-x-1">
        Yangi G'oya...
      </div>
      <!-- End Col -->

      <div class="flex justify-end items-center flex-wrap gap-x-1">
        <el-button type="primary" @click="$emit('showModal')" round disabled>Ulashish</el-button>
      </div>
      <!-- End Col -->
    </div>
  </template>
</template>
<script setup>
import { useUserStore } from '@/stores/UserStore.js'
import { Link } from '@inertiajs/vue3'

const userStore = useUserStore()

defineEmits(['showModal'])
</script>
<style scoped>
.new-idea-text {
  cursor: text;
  background-color: #fcfcf1;
}
</style>
