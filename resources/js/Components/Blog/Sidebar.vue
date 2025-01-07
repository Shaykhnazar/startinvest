<template>
  <div class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
    <div class="bg-white rounded-lg shadow-md p-6">
      <h3 class="text-lg font-semibold mb-4">{{ $t('site.blog.categories') }}</h3>
      <ul class="space-y-2">
        <li v-for="category in categories" :key="category.id">
          <Link
            :href="route('blog.category', category.slug)"
            class="text-gray-600 hover:text-primary-600"
            :class="{ 'text-primary-600 font-semibold': currentCategory === category.slug }"
          >
            {{ category.name }}
          </Link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  categories: {
    type: Object,
    required: true
  },
  currentCategory: {
    type: String,
    default: null
  }
})
</script>

<style scoped>

</style>
