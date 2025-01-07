<template>
  <App>
    <template #header>
      <Head :title="$t('site.startup.title')" />
    </template>
    <div class="container mx-auto px-4 py-8">
      <div class="flex flex-wrap -mx-4">
        <!-- Main Content -->
        <div class="w-full lg:w-3/4 px-4">
          <h1 class="text-3xl font-bold mb-8">{{ $t('site.blog.title') }}</h1>

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
          :current-category="filters.category"
        />
      </div>
    </div>
  </App>
</template>

<script setup>
import { defineProps } from 'vue'
import App from '@/Layouts/App.vue'
import PostCard from '@/Components/Blog/PostCard.vue'
// import Pagination from '@/Components/Pagination.vue'
import Sidebar from '@/Components/Blog/Sidebar.vue'
import { Head, usePage } from '@inertiajs/vue3'

const page = usePage();
const posts = page.props.posts.data;
const categories = page.props.categories.data;
const filters = page.props.filters;
</script>
<style scoped>

</style>
