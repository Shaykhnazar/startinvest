import { defineStore } from 'pinia'
import { JOIN_REQUEST_STATUSES, VOTE_TYPES } from '@/services/const.js'

export const useUserStore = defineStore("UserStore", {
  state: () => ({
    authUser: null,
  }),
  actions: {
    setAuthUser(user) {
      this.authUser = { ...user }
    },
    updateUserVotes(newVotes) {
      this.authUser.votes = newVotes
    },
    updateUserFavorites(newFavorites) {
      this.authUser.favorites = newFavorites
    },
    updateUserComments(newComments) {
      this.authUser.comments = newComments
    },
    updateUserJoinRequests(newJoinRequests) {
      this.authUser.joinRequests = newJoinRequests
    },
    updateContributedStartups(newContributors) {
      this.authUser.contributedStartups = newContributors
    },
    updateUserNotifications(newNotifications) {
      this.authUser.notifications = newNotifications;
    },
  },
  getters: {
    isGuest: (state) => state.authUser === null,
    isAuthorOfIdea: (state) => (idea) => state.authUser?.id === idea.author.id,
    avatar: (state) => state.authUser?.avatar ?? 'https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png',
    hasFavoritedIdea: (state) => (idea) => state.authUser?.favorites.some(favorite => favorite.favoriteable_id === idea.id),
    hasVotedIdea: (state) => (idea) => state.authUser?.votes.some(vote => vote.voteable_id === idea.id),
    hasUpvotedIdea: (state) => (idea) => state.authUser?.votes.some(vote => vote.voteable_id === idea.id && vote.type === VOTE_TYPES.UP),
    hasDownvotedIdea: (state) => (idea) => state.authUser?.votes.some(vote => vote.voteable_id === idea.id && vote.type === VOTE_TYPES.DOWN),
    hasPendingJoinRequest: (state) => (startupId) => {
      return state.authUser?.joinRequests.some(request => request.startup_id === startupId && request.status === JOIN_REQUEST_STATUSES.PENDING.value)
    },
    isContributor: (state) => (startupId) => {
      return state.authUser?.contributedStartups.some(startup => startup.id === startupId);
    },
    getJoinRequest: (state) => (startupId) => {
      return state.authUser?.joinRequests.find(request => request.startup_id === startupId) ?? null;
    },
    getContributedStartups: (state) => () => {
      return state.authUser?.contributedStartups ?? null;
    },
    getUnreadNotifications: (state) => {
      return state.authUser?.notifications.filter(notification => !notification.read_at) ?? [];
    },
    // Blog related getters
    hasVotedPost: (state) => (post) =>
      state.authUser?.votes.some(vote =>
        vote.voteable_id === post.id &&
        vote.voteable_type === 'App\\Models\\BlogPost'
      ),

    hasUpvotedPost: (state) => (post) =>
      state.authUser?.votes.some(vote =>
        vote.voteable_id === post.id &&
        vote.voteable_type === 'App\\Models\\BlogPost' &&
        vote.type === VOTE_TYPES.UP
      ),

    hasDownvotedPost: (state) => (post) =>
      state.authUser?.votes.some(vote =>
        vote.voteable_id === post.id &&
        vote.voteable_type === 'App\\Models\\BlogPost' &&
        vote.type === VOTE_TYPES.DOWN
      ),

    canDeleteComment: (state) => (comment) =>
      state.authUser && (
        state.authUser.id === comment.author.id
      ),
  },
  persist: {
    storage: sessionStorage,
  },
})
