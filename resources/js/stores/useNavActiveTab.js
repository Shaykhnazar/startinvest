import { defineStore } from 'pinia'

export const useNavActiveTab = defineStore("NavActiveTabStore", {
  state: () => ({
    activeTab: 'home',
  }),
  actions: {
    setActiveTab(tab) {
      this.activeTab = tab
    }
  },
  getters: {
    getActiveTab: (state) => state.activeTab
  },
  // persist: {
  //   storage: sessionStorage,
  // },
})
