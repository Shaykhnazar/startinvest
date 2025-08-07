import { ref } from 'vue'
import axios from 'axios'

export function useInvestment() {
  const loading = ref(false)
  const processing = ref(false)
  const errors = ref({})

  // Get dashboard data
  const getDashboardData = async () => {
    loading.value = true
    try {
      const response = await axios.get('/api/investments/dashboard')
      return response.data
    } catch (error) {
      console.error('Failed to fetch dashboard data:', error)
      throw error
    } finally {
      loading.value = false
    }
  }

  // Create investment
  const createInvestment = async (data) => {
    processing.value = true
    errors.value = {}
    
    try {
      const response = await axios.post('/api/investments', data)
      
      if (response.data.success) {
        return response.data.investment
      } else {
        throw new Error(response.data.message || 'Failed to create investment')
      }
    } catch (error) {
      if (error.response?.status === 422) {
        errors.value = error.response.data.errors || {}
      } else {
        console.error('Investment creation failed:', error)
        throw error
      }
      return null
    } finally {
      processing.value = false
    }
  }

  // Update investment
  const updateInvestment = async (id, data) => {
    processing.value = true
    errors.value = {}
    
    try {
      const response = await axios.put(`/api/investments/${id}`, data)
      
      if (response.data.success) {
        return response.data.investment
      } else {
        throw new Error(response.data.message || 'Failed to update investment')
      }
    } catch (error) {
      if (error.response?.status === 422) {
        errors.value = error.response.data.errors || {}
      } else {
        console.error('Investment update failed:', error)
        throw error
      }
      return null
    } finally {
      processing.value = false
    }
  }

  // Delete investment
  const deleteInvestment = async (id) => {
    loading.value = true
    
    try {
      const response = await axios.delete(`/api/investments/${id}`)
      
      if (response.data.success) {
        return true
      } else {
        throw new Error(response.data.message || 'Failed to delete investment')
      }
    } catch (error) {
      console.error('Investment deletion failed:', error)
      throw error
    } finally {
      loading.value = false
    }
  }

  // Update investment status
  const updateInvestmentStatus = async (id, status, notes = null) => {
    processing.value = true
    
    try {
      const response = await axios.patch(`/api/investments/${id}/status`, {
        status,
        notes
      })
      
      if (response.data.success) {
        return response.data.investment
      } else {
        throw new Error(response.data.message || 'Failed to update status')
      }
    } catch (error) {
      console.error('Status update failed:', error)
      throw error
    } finally {
      processing.value = false
    }
  }

  // Record investment exit
  const recordInvestmentExit = async (id, exitData) => {
    processing.value = true
    
    try {
      const response = await axios.patch(`/api/investments/${id}/exit`, exitData)
      
      if (response.data.success) {
        return response.data.investment
      } else {
        throw new Error(response.data.message || 'Failed to record exit')
      }
    } catch (error) {
      console.error('Exit recording failed:', error)
      throw error
    } finally {
      processing.value = false
    }
  }

  // Get portfolio summary
  const getPortfolioSummary = async () => {
    loading.value = true
    
    try {
      const response = await axios.get('/api/investments/portfolio')
      return response.data
    } catch (error) {
      console.error('Failed to fetch portfolio summary:', error)
      throw error
    } finally {
      loading.value = false
    }
  }

  // Export investments
  const exportInvestments = async (filters = {}) => {
    loading.value = true
    
    try {
      const response = await axios.get('/api/investments/export', {
        params: filters
      })
      
      if (response.data.success) {
        return response.data.data
      } else {
        throw new Error(response.data.message || 'Failed to export investments')
      }
    } catch (error) {
      console.error('Export failed:', error)
      throw error
    } finally {
      loading.value = false
    }
  }

  // Calculate ROI
  const calculateROI = (amount, actualReturn) => {
    if (!actualReturn || amount <= 0) return 0
    return ((actualReturn - amount) / amount) * 100
  }

  // Calculate expected ROI
  const calculateExpectedROI = (amount, expectedReturn) => {
    if (!expectedReturn || amount <= 0) return 0
    return ((expectedReturn - amount) / amount) * 100
  }

  // Format investment amount
  const formatInvestmentAmount = (amount, currency = 'USD') => {
    const symbols = {
      USD: '$',
      EUR: '€',
      UZS: 'UZS ',
      RUB: '₽'
    }
    
    const symbol = symbols[currency] || currency
    const formattedAmount = new Intl.NumberFormat('en-US', {
      minimumFractionDigits: currency === 'UZS' ? 0 : 2,
      maximumFractionDigits: currency === 'UZS' ? 0 : 2
    }).format(amount)
    
    return `${symbol}${formattedAmount}`
  }

  // Get investment status color
  const getStatusColor = (status) => {
    const colors = {
      pending: 'warning',
      approved: 'info',
      active: 'success',
      completed: 'primary',
      cancelled: 'danger',
      exited: 'secondary'
    }
    return colors[status] || 'secondary'
  }

  // Get investment risk level
  const getInvestmentRisk = (investment) => {
    let riskScore = 0
    
    // Stage risk
    if (investment.investment_stage?.name?.toLowerCase().includes('seed')) {
      riskScore += 30
    } else if (investment.investment_stage?.name?.toLowerCase().includes('series a')) {
      riskScore += 20
    }
    
    // Amount risk
    if (investment.amount?.value > 100000) {
      riskScore += 20
    }
    
    // Duration risk
    const duration = investment.performance?.duration_days
    if (duration && duration > 1095) { // More than 3 years
      riskScore += 15
    }
    
    if (riskScore < 30) return { level: 'Low', color: 'green' }
    if (riskScore < 60) return { level: 'Medium', color: 'yellow' }
    return { level: 'High', color: 'red' }
  }

  // Investment analytics helpers
  const getInvestmentAnalytics = (investments) => {
    const totalInvestments = investments.length
    const totalInvested = investments.reduce((sum, inv) => sum + (inv.amount?.value || 0), 0)
    const activeInvestments = investments.filter(inv => inv.status?.value === 'active').length
    const completedInvestments = investments.filter(inv => 
      ['completed', 'exited'].includes(inv.status?.value)
    )
    
    const totalReturns = completedInvestments.reduce((sum, inv) => 
      sum + (inv.returns?.actual_return || 0), 0
    )
    
    const averageROI = completedInvestments.length > 0 
      ? completedInvestments.reduce((sum, inv) => sum + (inv.returns?.actual_roi || 0), 0) / completedInvestments.length
      : 0
    
    const successfulInvestments = completedInvestments.filter(inv => 
      (inv.returns?.actual_roi || 0) > 0
    ).length
    
    const successRate = completedInvestments.length > 0 
      ? (successfulInvestments / completedInvestments.length) * 100
      : 0
    
    return {
      totalInvestments,
      totalInvested,
      activeInvestments,
      totalReturns,
      averageROI,
      successRate,
      netProfitLoss: totalReturns - totalInvested,
      portfolioROI: totalInvested > 0 ? ((totalReturns - totalInvested) / totalInvested) * 100 : 0
    }
  }

  return {
    loading,
    processing,
    errors,
    getDashboardData,
    createInvestment,
    updateInvestment,
    deleteInvestment,
    updateInvestmentStatus,
    recordInvestmentExit,
    getPortfolioSummary,
    exportInvestments,
    calculateROI,
    calculateExpectedROI,
    formatInvestmentAmount,
    getStatusColor,
    getInvestmentRisk,
    getInvestmentAnalytics
  }
}