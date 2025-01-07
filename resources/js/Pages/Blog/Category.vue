<template>
  <App>
    <template #header>
      <Head :title="category.name" />
    </template>
    <div class="container mx-auto px-4 py-8">
      <div class="flex flex-wrap -mx-4">
        <!-- Main Content -->
        <div class="w-full lg:w-3/4 px-4">
          <h1 class="text-3xl font-bold mb-2">{{ category.name }}</h1>
          <p class="text-gray-600 mb-8">{{ category.description }}</p>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <PostCard
              v-for="post in posts"
              :key="post.id"
              :post="post"
            />
          </div>
        </div>

        <!-- Sidebar -->
        <Sidebar
          :categories="categories"
          :current-category="category.slug"
        />
      </div>
    </div>
  </App>
</template>

<script setup>
import { Head, usePage } from '@inertiajs/vue3'
import App from '@/Layouts/App.vue'
import PostCard from '@/Components/Blog/PostCard.vue'
import Sidebar from '@/Components/Blog/Sidebar.vue'

const page = usePage()
const category = page.props.category.data
const posts = page.props.posts.data
const categories = page.props.categories.data
</script>

<style scoped>
</style>
