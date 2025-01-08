<template>
  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img
      v-if="post.featured_image"
      :src="post.featured_image"
      :alt="post.title"
      class="w-full h-48 object-cover"
    >
    <div class="p-6">
      <h2 class="text-xl font-semibold mb-2">
        <Link
          :href="route('blog.show', post.slug)"
          class="hover:text-primary-600"
        >
          {{ post.title }}
        </Link>
      </h2>
      <Link
        v-if="post.category"
        :href="route('blog.category', post.category.slug)"
        class="text-sm text-primary-600 hover:text-primary-700"
      >
        {{ post.category.name }}
      </Link>
      <p class="text-gray-600 mt-2">{{ post.excerpt }}</p>
      <div class="mt-4 flex items-center text-sm text-gray-500">
        <span>{{ post.published_at }}</span>
        <span class="mx-2">•</span>
        <span class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
          {{ post.views_count }}
        </span>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  post: {
    type: Object,
    required: true
  }
})
</script>

<style scoped>

</style>
