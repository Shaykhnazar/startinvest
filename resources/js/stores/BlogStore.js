import { defineStore } from 'pinia'

export const useBlogStore = defineStore("BlogStore", {
  state: () => ({
    comments: {},
    posts: {}
  }),

  actions: {
    setComments(postId, commentsData) {
      this.comments[postId] = commentsData.comments || []
    },

    addComment(postId, comment) {
      if (!this.comments[postId]) {
        this.comments[postId] = []
      }
      this.comments[postId].unshift(comment)
    },

    updatePost(post) {
      this.posts[post.id] = post
    },

    deleteComment(postId, commentId) {
      if (this.comments[postId]) {
        this.comments[postId] = this.comments[postId].filter(
          c => c.id !== commentId
        )
      }
    }
  },

  getters: {
    getPostById: (state) => (id) => state.posts[id],
    getComments: (state) => (postId) => state.comments[postId] || []
  }
})
