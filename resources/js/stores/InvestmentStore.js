import { defineStore } from 'pinia'
import { useInvestment } from '@/Composables/useInvestment'

export const useInvestmentStore = defineStore('investment', {
  state: () => ({
    investments: [],
    dashboardData: {
      total_investments: 0,
      total_invested: 0,
      active_investments: 0,
      average_roi: 0,
      recent_investments: [],
      investment_by_stage: [],
      monthly_investment_trend: []
    },
    portfolioSummary: {
      total_invested: 0,
      total_returns: 0,
      unrealized_investments: 0,
      net_profit_loss: 0,
      portfolio_roi: 0,
      diversification_score: 0,
      risk_score: 0
    },
    filters: {
      status: '',
      search: '',
      min_amount: null,
      max_amount: null,
      startup_id: null,
      date_from: null,
      date_to: null
    },
    sortBy: 'created_at',
    sortDirection: 'desc',
    loading: false,
    error: null
  }),

  getters: {
    // Get investments by status
    investmentsByStatus: (state) => (status) => {
      return state.investments.filter(investment => 
        investment.status?.value === status
      )
    },

    // Get active investments
    activeInvestments: (state) => {
      return state.investments.filter(investment => 
        investment.status?.value === 'active'
      )
    },

    // Get completed investments
    completedInvestments: (state) => {
      return state.investments.filter(investment => 
        ['completed', 'exited'].includes(investment.status?.value)
      )
    },

    // Get pending investments
    pendingInvestments: (state) => {
      return state.investments.filter(investment => 
        investment.status?.value === 'pending'
      )
    },

    // Calculate total invested
    totalInvested: (state) => {
      return state.investments.reduce((total, investment) => 
        total + (investment.amount?.value || 0), 0
      )
    },

    // Calculate total returns
    totalReturns: (state) => {
      return state.investments.reduce((total, investment) => 
        total + (investment.returns?.actual_return || 0), 0
      )
    },

    // Calculate portfolio ROI
    portfolioROI: (state) => {
      const totalInvested = state.totalInvested
      const totalReturns = state.totalReturns
      
      if (totalInvested === 0) return 0
      return ((totalReturns - totalInvested) / totalInvested) * 100
    },

    // Get investment analytics
    investmentAnalytics() {
      const { getInvestmentAnalytics } = useInvestment()
      return getInvestmentAnalytics(this.investments)
    },

    // Get investments by industry (through startup relationship)
    investmentsByIndustry: (state) => {
      const industryMap = new Map()
      
      state.investments.forEach(investment => {
        const industries = investment.startup?.industries || []
        industries.forEach(industry => {
          if (!industryMap.has(industry.name)) {
            industryMap.set(industry.name, {
              name: industry.name,
              count: 0,
              total_amount: 0,
              investments: []
            })
          }
          
          const industryData = industryMap.get(industry.name)
          industryData.count += 1
          industryData.total_amount += investment.amount?.value || 0
          industryData.investments.push(investment)
        })
      })
      
      return Array.from(industryMap.values())
    },

    // Get top performing investments
    topPerformingInvestments: (state) => {
      return [...state.investments]
        .filter(investment => investment.returns?.actual_roi != null)
        .sort((a, b) => (b.returns?.actual_roi || 0) - (a.returns?.actual_roi || 0))
        .slice(0, 5)
    },

    // Get underperforming investments
    underperformingInvestments: (state) => {
      return [...state.investments]
        .filter(investment => investment.returns?.actual_roi != null)
        .sort((a, b) => (a.returns?.actual_roi || 0) - (b.returns?.actual_roi || 0))
        .slice(0, 5)
    }
  },

  actions: {
    // Load dashboard data
    async loadDashboardData() {
      this.loading = true
      this.error = null
      
      try {
        const { getDashboardData } = useInvestment()
        this.dashboardData = await getDashboardData()
      } catch (error) {
        this.error = error.message || 'Failed to load dashboard data'
        throw error
      } finally {
        this.loading = false
      }
    },

    // Load portfolio summary
    async loadPortfolioSummary() {
      this.loading = true
      this.error = null
      
      try {
        const { getPortfolioSummary } = useInvestment()
        this.portfolioSummary = await getPortfolioSummary()
      } catch (error) {
        this.error = error.message || 'Failed to load portfolio summary'
        throw error
      } finally {
        this.loading = false
      }
    },

    // Add investment to store
    addInvestment(investment) {
      this.investments.unshift(investment)
      this.updateDashboardStats()
    },

    // Update investment in store
    updateInvestment(updatedInvestment) {
      const index = this.investments.findIndex(inv => inv.id === updatedInvestment.id)
      if (index !== -1) {
        this.investments[index] = updatedInvestment
        this.updateDashboardStats()
      }
    },

    // Remove investment from store
    removeInvestment(investmentId) {
      const index = this.investments.findIndex(inv => inv.id === investmentId)
      if (index !== -1) {
        this.investments.splice(index, 1)
        this.updateDashboardStats()
      }
    },

    // Update filters
    updateFilters(newFilters) {
      this.filters = { ...this.filters, ...newFilters }
    },

    // Clear filters
    clearFilters() {
      this.filters = {
        status: '',
        search: '',
        min_amount: null,
        max_amount: null,
        startup_id: null,
        date_from: null,
        date_to: null
      }
    },

    // Update sorting
    updateSorting(sortBy, sortDirection = 'desc') {
      this.sortBy = sortBy
      this.sortDirection = sortDirection
      this.sortInvestments()
    },

    // Sort investments
    sortInvestments() {
      this.investments.sort((a, b) => {
        let aValue, bValue
        
        switch (this.sortBy) {
          case 'amount':
            aValue = a.amount?.value || 0
            bValue = b.amount?.value || 0
            break
          case 'roi':
            aValue = a.returns?.actual_roi || 0
            bValue = b.returns?.actual_roi || 0
            break
          case 'invested_at':
            aValue = new Date(a.dates?.invested_at || 0)
            bValue = new Date(b.dates?.invested_at || 0)
            break
          case 'created_at':
          default:
            aValue = new Date(a.dates?.created_at || 0)
            bValue = new Date(b.dates?.created_at || 0)
            break
        }
        
        if (this.sortDirection === 'asc') {
          return aValue > bValue ? 1 : -1
        } else {
          return aValue < bValue ? 1 : -1
        }
      })
    },

    // Update dashboard statistics
    updateDashboardStats() {
      const { getInvestmentAnalytics } = useInvestment()
      const analytics = getInvestmentAnalytics(this.investments)
      
      this.dashboardData = {
        ...this.dashboardData,
        total_investments: analytics.totalInvestments,
        total_invested: analytics.totalInvested,
        active_investments: analytics.activeInvestments,
        average_roi: analytics.averageROI
      }
    },

    // Filter investments
    getFilteredInvestments() {
      let filtered = [...this.investments]
      
      // Apply search filter
      if (this.filters.search) {
        const searchTerm = this.filters.search.toLowerCase()
        filtered = filtered.filter(investment => 
          investment.startup?.title?.toLowerCase().includes(searchTerm)
        )
      }
      
      // Apply status filter
      if (this.filters.status) {
        filtered = filtered.filter(investment => 
          investment.status?.value === this.filters.status
        )
      }
      
      // Apply amount range filters
      if (this.filters.min_amount) {
        filtered = filtered.filter(investment => 
          (investment.amount?.value || 0) >= this.filters.min_amount
        )
      }
      
      if (this.filters.max_amount) {
        filtered = filtered.filter(investment => 
          (investment.amount?.value || 0) <= this.filters.max_amount
        )
      }
      
      // Apply startup filter
      if (this.filters.startup_id) {
        filtered = filtered.filter(investment => 
          investment.startup?.id === this.filters.startup_id
        )
      }
      
      // Apply date filters
      if (this.filters.date_from) {
        const fromDate = new Date(this.filters.date_from)
        filtered = filtered.filter(investment => {
          const investedAt = new Date(investment.dates?.invested_at)
          return investedAt >= fromDate
        })
      }
      
      if (this.filters.date_to) {
        const toDate = new Date(this.filters.date_to)
        filtered = filtered.filter(investment => {
          const investedAt = new Date(investment.dates?.invested_at)
          return investedAt <= toDate
        })
      }
      
      return filtered
    },

    // Get investment statistics
    getInvestmentStats() {
      const total = this.investments.length
      const active = this.activeInvestments.length
      const completed = this.completedInvestments.length
      const pending = this.pendingInvestments.length
      const totalAmount = this.totalInvested
      const averageAmount = total > 0 ? totalAmount / total : 0
      
      const successfulInvestments = this.completedInvestments.filter(inv => 
        (inv.returns?.actual_roi || 0) > 0
      ).length
      const successRate = completed > 0 ? (successfulInvestments / completed) * 100 : 0
      
      return {
        total,
        active,
        completed,
        pending,
        total_amount: totalAmount,
        average_amount: averageAmount,
        success_rate: successRate
      }
    },

    // Reset store state
    reset() {
      this.$reset()
    }
  },

  persist: {
    key: 'investment-store',
    storage: localStorage,
    paths: ['filters', 'sortBy', 'sortDirection']
  }
})