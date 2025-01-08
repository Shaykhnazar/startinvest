<template>
  <div class="flex items-center space-x-6 my-6">
    <button
      @click="handleLike"
      :disabled="submitting"
      class="flex items-center space-x-2"
      :class="{ 'text-blue-500': userStore.hasUpvotedPost(post), 'text-gray-500 hover:text-blue-500': !userStore.hasUpvotedPost(post) }"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" :fill="userStore.hasUpvotedPost(post) ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
      </svg>
      <span>{{ post.upvotes || 0 }}</span>
    </button>

    <button
      @click="handleDislike"
      :disabled="submitting"
      class="flex items-center space-x-2"
      :class="{ 'text-red-500': userStore.hasDownvotedPost(post), 'text-gray-500 hover:text-red-500': !userStore.hasDownvotedPost(post) }"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" :fill="userStore.hasDownvotedPost(post) ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
      </svg>
      <span>{{ post.downvotes || 0 }}</span>
    </button>
  </div>
</template>

<script setup>
import { useUserStore } from '@/stores/UserStore'
import { useBlog } from '@/Composables/useBlog'
import { VOTE_TYPES } from '@/services/const'

const props = defineProps({
  post: {
    type: Object,
    required: true
  }
})

const userStore = useUserStore()
const { submitting, votePost } = useBlog()

const handleLike = async () => {
  if (!userStore.hasUpvotedPost(props.post)) {
    await votePost(props.post, VOTE_TYPES.UP)
  }
}

const handleDislike = async () => {
  if (!userStore.hasDownvotedPost(props.post)) {
    await votePost(props.post, VOTE_TYPES.DOWN)
  }
}
</script>
