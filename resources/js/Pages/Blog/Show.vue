<template>
  <App>
    <template #header>
      <Head :title="post.title" />
    </template>
    <div class="container mx-auto px-4 py-8">
      <div class="max-w-4xl mx-auto">
        <Link class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500" :href="route('blog.index')">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
          {{ $t('site.blog.posts') }}
        </Link>

        <!-- Post Header -->
        <h1 class="text-4xl font-bold mb-4 mt-4">{{ post.title }}</h1>

        <div class="flex items-center text-gray-600 mb-8">
          <Link
            v-if="post.category"
            :href="route('blog.category', post.category.slug)"
            class="text-primary-600 hover:text-primary-700"
          >
            {{ post.category.name }}
          </Link>
          <span v-if="post.category" class="mx-2">•</span>
          <span>{{ post.published_at }}</span>
        </div>

        <!-- Featured Image -->
        <img
          v-if="post.featured_image"
          :src="post.featured_image"
          :alt="post.title"
          class="w-full rounded-lg mb-8"
        >

        <!-- Post Content -->
        <div
          class="prose max-w-none"
          v-html="post.content"
        />

        <!-- Related Posts -->
        <div v-if="relatedPosts.length" class="mt-12">
          <h2 class="text-2xl font-bold mb-6">{{ $t('site.blog.related_posts') }}</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <RelatedPostCard
              v-for="post in relatedPosts"
              :key="post.id"
              :post="post"
            />
          </div>
        </div>
      </div>
    </div>
  </App>
</template>

<script setup>
import { Link, usePage, Head } from '@inertiajs/vue3'
import App from '@/Layouts/App.vue'
import RelatedPostCard from '@/Components/Blog/RelatedPostCard.vue'

const page = usePage();
const post = page.props.post.data;
const relatedPosts = page.props.relatedPosts.data;

</script>


<style scoped>

</style>
