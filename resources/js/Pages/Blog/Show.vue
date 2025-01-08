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
          <span class="mx-2">•</span>
          <span class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            {{ post.views_count }}
          </span>
        </div>

        <!-- Featured Image -->
        <img
          v-if="post.featured_image"
          :src="post.featured_image"
          :alt="post.title"
          class="w-full rounded-lg mb-8"
        >

        <!-- Post Content -->
        <article
          class="prose prose-lg prose-img:rounded-xl prose-headings:underline prose-a:text-blue-600 max-w-none"
          v-html="renderedContent"
        />

        <!-- Share Buttons -->
        <ShareButtons
          :url="currentUrl"
          :title="post.title"
        />

        <!-- Like/Dislike -->
        <LikeDislike
          :post="post"
        />

        <!-- Comments Section -->
        <Comments :post="post" />

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
import { marked } from 'marked'
import { computed } from 'vue'
import ShareButtons from '@/Components/Blog/ShareButtons.vue'
import LikeDislike from '@/Components/Blog/LikeDislike.vue'
import Comments from '@/Components/Blog/Comments.vue'

const page = usePage();
const post = page.props.post.data;
const relatedPosts = page.props.relatedPosts.data;

const currentUrl = computed(() => window.location.href)

// Configure marked options
marked.setOptions({
  breaks: true,
  gfm: true,
  headerIds: true,
  mangle: false
})

// Convert markdown to HTML
const renderedContent = computed(() => {
  if (!post.content) return ''
  return marked(post.content)
})
</script>


<style>
/* Note: removed 'scoped' to allow styles to affect rendered markdown */
.prose {
  max-width: none;
}

.prose img {
  margin: 2rem auto;
  border-radius: 0.5rem;
}

.prose a {
  color: #2563eb;
  text-decoration: underline;
}

.prose a:hover {
  color: #1d4ed8;
}

.prose pre {
  background-color: #1f2937;
  color: #e5e7eb;
  padding: 1rem;
  border-radius: 0.5rem;
  overflow-x: auto;
}

.prose code {
  color: #ef4444;
  background-color: #f3f4f6;
  padding: 0.25rem 0.5rem;
  border-radius: 0.25rem;
}

.prose blockquote {
  border-left-color: #3b82f6;
  border-left-width: 4px;
  padding-left: 1rem;
  font-style: italic;
}

.prose ul {
  list-style-type: disc;
  padding-left: 1.5rem;
}

.prose ol {
  list-style-type: decimal;
  padding-left: 1.5rem;
}

.prose li {
  margin-top: 0.5rem;
  margin-bottom: 0.5rem;
}

.prose h1 {
  font-size: 2.25rem;
  margin-top: 2rem;
  margin-bottom: 1rem;
  font-weight: 700;
}

.prose h2 {
  font-size: 1.875rem;
  margin-top: 1.5rem;
  margin-bottom: 0.75rem;
  font-weight: 600;
}

.prose h3 {
  font-size: 1.5rem;
  margin-top: 1.25rem;
  margin-bottom: 0.75rem;
  font-weight: 600;
}

.prose p {
  margin-top: 1rem;
  margin-bottom: 1rem;
  line-height: 1.75;
}

.prose hr {
  margin: 2rem 0;
  border-color: #e5e7eb;
}
</style>
