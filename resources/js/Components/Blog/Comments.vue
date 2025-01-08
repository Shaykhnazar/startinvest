<template>
  <div class="my-8">
    <h3 class="text-2xl font-bold mb-6">Comments ({{ comments.length }})</h3>

    <!-- Comment Form -->
    <form v-if="$page.props.auth.user" @submit.prevent="submitComment" class="mb-8">
      <textarea
        v-model="form.body"
        rows="3"
        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
        placeholder="Write a comment..."
      ></textarea>
      <div class="mt-2 flex justify-end">
        <button
          type="submit"
          :disabled="submitting"
          class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50"
        >
          Post Comment
        </button>
      </div>
    </form>
    <div v-else class="mb-8 p-4 bg-gray-50 rounded-lg text-center">
      <Link :href="route('login')" class="text-blue-600 hover:text-blue-700">
        Login to comment
      </Link>
    </div>

    <!-- Comments List -->
    <div class="space-y-6">
      <div v-for="comment in comments" :key="comment.id" class="flex space-x-4">
        <div class="flex-shrink-0">
          <img
            :src="comment.author.avatar || '/images/default-avatar.png'"
            :alt="comment.author.name"
            class="h-10 w-10 rounded-full"
          >
        </div>
        <div class="flex-grow">
          <div class="flex items-center space-x-2">
            <span class="font-medium">{{ comment.author.name }}</span>
            <span class="text-gray-500 text-sm">{{ comment.created_at }}</span>
          </div>
          <p class="mt-1 text-gray-800">{{ comment.body }}</p>

          <!-- Comment Actions -->
          <div class="mt-2 flex items-center space-x-4">
            <button
              v-if="userStore.canDeleteComment(comment)"
              @click="handleDeleteComment(comment)"
              :disabled="submitting"
              class="text-sm text-red-500 hover:text-red-600"
            >
              Delete
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Load More -->
    <button
      v-if="hasMoreComments"
      @click="loadMoreComments"
      :disabled="submitting"
      class="mt-6 w-full py-2 text-center text-gray-600 hover:text-gray-800"
    >
      Load More Comments
    </button>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useBlog } from '@/Composables/useBlog'
import { useUserStore } from '@/stores/UserStore'
import { useBlogStore } from '@/stores/BlogStore'

const props = defineProps({
  post: {
    type: Object,
    required: true
  }
})

const userStore = useUserStore()
const blogStore = useBlogStore()
const { submitting, loadComments, addComment, deleteComment } = useBlog()

const form = ref({
  body: ''
})
const hasMoreComments = ref(true)
const page = ref(1)

// Use computed for reactive comments
const comments = computed(() => blogStore.getComments(props.post.id))

onMounted(() => {
  loadInitialComments()
})

const loadInitialComments = async () => {
  const response = await loadComments(props.post.id)
  if (response?.data?.comments) {
    hasMoreComments.value = response.data.comments.length >= 10 // Assuming 10 per page
  }
}

const loadMoreComments = async () => {
  page.value++
  const response = await loadComments(props.post.id, page.value)
  if (response?.data?.comments) {
    hasMoreComments.value = response.data.comments.length >= 10
  }
}

const submitComment = async () => {
  if (!form.value.body.trim()) return

  const response = await addComment(props.post.id, {
    body: form.value.body
  })

  if (response?.data?.post) {
    blogStore.updatePost(response.data.post)
    form.value.body = ''
    // Reload comments to show the new one
    await loadInitialComments()
  }
}

const handleDeleteComment = async (comment) => {
  if (!confirm('Are you sure you want to delete this comment?')) return

  const response = await deleteComment(props.post.id, comment.id)
  if (response?.data?.post) {
    blogStore.updatePost(response.data.post)
    // Reload comments after deletion
    await loadInitialComments()
  }
}
</script>
