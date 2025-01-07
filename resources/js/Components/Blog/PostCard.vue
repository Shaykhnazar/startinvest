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
      <div class="mt-4 text-sm text-gray-500">
        {{ post.published_at }}
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
