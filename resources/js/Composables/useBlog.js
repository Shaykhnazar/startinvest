import { ref } from 'vue'
import api from '@/services/api'
import { useBlogStore } from '@/stores/BlogStore'
import { useUserStore } from '@/stores/UserStore'
import { useElMessage } from '@/Composables/helpers'

export function useBlog() {
  const blogStore = useBlogStore()
  const userStore = useUserStore()
  const { info, success } = useElMessage()
  const submitting = ref(false)

  const votePost = async (post, voteType) => {
    if (userStore.isGuest) {
      info('Please login to vote')
      return
    }

    if (submitting.value) return

    submitting.value = true
    try {
      const response = await api.blog.posts.vote(post.id, { type: voteType })
      blogStore.updatePost(response.data.post)
      userStore.updateUserVotes(response.data.user_votes)
      info('Vote recorded successfully')
    } catch (error) {
      console.error('Error voting:', error)
    } finally {
      submitting.value = false
    }
  }

  const loadComments = async (postId, page = 1) => {
    try {
      const response = await api.blog.posts.getComments(postId, page)
      if (response?.data?.comments) {
        blogStore.setComments(postId, response.data)
      }
      return response
    } catch (error) {
      console.error('Error loading comments:', error)
      return null
    }
  }

  const addComment = async (postId, data) => {
    if (userStore.isGuest) {
      info('Please login to comment')
      return null
    }

    if (submitting.value) return null

    submitting.value = true
    try {
      const response = await api.blog.posts.addComment(postId, data)
      if (response?.data?.post) {
        success('Comment added successfully')
      }
      return response
    } catch (error) {
      console.error('Error adding comment:', error)
      return null
    } finally {
      submitting.value = false
    }
  }

  const deleteComment = async (postId, commentId) => {
    if (submitting.value) return null

    submitting.value = true
    try {
      const response = await api.blog.posts.deleteComment(postId, commentId)
      if (response?.data?.post) {
        info('Comment deleted successfully')
      }
      return response
    } catch (error) {
      console.error('Error deleting comment:', error)
      return null
    } finally {
      submitting.value = false
    }
  }



  return {
    submitting,
    votePost,
    loadComments,
    addComment,
    deleteComment,
  }
}
