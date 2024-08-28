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
    updateContributors(newContributors) {
      this.authUser.contributedStartups = newContributors
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
      return state.authUser?.joinRequests.some(request => request.startup_id === startupId && request.status === JOIN_REQUEST_STATUSES.PENDING)
    },
    getJoinRequest: (state) => (startupId) => {
      return state.authUser?.joinRequests.find(request => request.startup_id === startupId) ?? null;
    },
    isContributor: (state) => (startupId) => {
      return state.authUser?.contributedStartups.some(startup => startup.id === startupId);
    }
  },
  persist: {
    storage: sessionStorage,
  },
})
