<template>
  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img
      v-if="post.featured_image"
      :src="post.featured_image"
      :alt="post.title"
      class="w-full h-40 object-cover"
    >
    <div class="p-4">
      <h3 class="font-semibold mb-2">
        <Link
          :href="route('blog.show', post.slug)"
          class="hover:text-primary-600"
        >
          {{ post.title }}
        </Link>
      </h3>
      <div class="text-sm text-gray-500">
        {{ post.published_at }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  post: Object
})
</script>

<style scoped>

</style>
