<template>
  <template v-if="!userStore.isGuest">
    <div class="pb-4 pt-2 px-4 mb-2 grid grid-cols-1 gap-y-2 lg:gap-y-0 lg:gap-x-5 border bg-white rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
      <div class="flex flex-row items-center">
        <Link :href="route('user.profile', userStore.authUser?.id)" class="block focus:outline-none w-1/5">
          <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
        </Link>
        <div @click="$emit('showModal')" class="new-idea-text inline-flex justify-start items-center border w-4/5 rounded-full border-gray-700 dark:border-neutral-100 dark:text-neutral-300 hover:bg-[#F3F3F3] dark:hover:bg-[#2B2F32]">
          <span class="py-2 px-4">Yangi G'oya...</span>
        </div>
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
}
</style>
