import { ref, reactive, computed } from 'vue'
import axios from 'axios'

export function useAnalytics() {
    const isLoading = ref(false)
    const error = ref(null)
    
    // Analytics data state
    const platformOverview = ref({})
    const investmentTrends = ref([])
    const userActivity = ref({})
    const performanceMetrics = ref({})
    const industryAnalytics = ref([])
    const stageAnalytics = ref([])
    const investorAnalytics = ref({})
    const startupAnalytics = ref({})
    const customAnalytics = ref({})

    // Loading states for individual sections
    const loadingStates = reactive({
        overview: false,
        trends: false,
        activity: false,
        performance: false,
        industry: false,
        stage: false,
        investor: false,
        startup: false,
        custom: false
    })

    /**
     * Get platform overview analytics
     * @returns {Promise<Object>} Platform overview data
     */
    const getPlatformOverview = async () => {
        try {
            loadingStates.overview = true
            error.value = null

            const response = await axios.get(route('analytics.dashboard'))
            
            if (response.data.analytics) {
                platformOverview.value = response.data.analytics.platform_overview || {}
                investmentTrends.value = response.data.analytics.investment_trends || []
                userActivity.value = response.data.analytics.user_activity || {}
                performanceMetrics.value = response.data.analytics.performance_metrics || {}
            }

            return response.data.analytics

        } catch (err) {
            console.error('Error fetching platform overview:', err)
            error.value = err.response?.data?.message || 'Failed to fetch platform overview'
            throw err

        } finally {
            loadingStates.overview = false
        }
    }

    /**
     * Get investment analytics
     * @param {number} months - Number of months to analyze
     * @returns {Promise<Object>} Investment analytics data
     */
    const getInvestmentAnalytics = async (months = 12) => {
        try {
            loadingStates.trends = true
            error.value = null

            const response = await axios.get(route('analytics.investments'), {
                params: { months }
            })

            if (response.data.analytics) {
                investmentTrends.value = response.data.analytics.investment_trends || []
                industryAnalytics.value = response.data.analytics.industry_analytics || []
                stageAnalytics.value = response.data.analytics.stage_analytics || []
            }

            return response.data.analytics

        } catch (err) {
            console.error('Error fetching investment analytics:', err)
            error.value = err.response?.data?.message || 'Failed to fetch investment analytics'
            throw err

        } finally {
            loadingStates.trends = false
        }
    }

    /**
     * Get investor analytics
     * @returns {Promise<Object>} Investor analytics data
     */
    const getInvestorAnalytics = async () => {
        try {
            loadingStates.investor = true
            error.value = null

            const response = await axios.get(route('analytics.investors'))
            investorAnalytics.value = response.data.analytics || {}

            return response.data.analytics

        } catch (err) {
            console.error('Error fetching investor analytics:', err)
            error.value = err.response?.data?.message || 'Failed to fetch investor analytics'
            throw err

        } finally {
            loadingStates.investor = false
        }
    }

    /**
     * Get startup analytics
     * @returns {Promise<Object>} Startup analytics data
     */
    const getStartupAnalytics = async () => {
        try {
            loadingStates.startup = true
            error.value = null

            const response = await axios.get(route('analytics.startups'))
            startupAnalytics.value = response.data.analytics || {}

            return response.data.analytics

        } catch (err) {
            console.error('Error fetching startup analytics:', err)
            error.value = err.response?.data?.message || 'Failed to fetch startup analytics'
            throw err

        } finally {
            loadingStates.startup = false
        }
    }

    /**
     * Get custom analytics with filters
     * @param {Object} filters - Custom filter criteria
     * @returns {Promise<Object>} Custom analytics data
     */
    const getCustomAnalytics = async (filters = {}) => {
        try {
            loadingStates.custom = true
            error.value = null

            const response = await axios.get(route('analytics.custom'), {
                params: filters
            })

            customAnalytics.value = response.data.analytics || {}
            return response.data.analytics

        } catch (err) {
            console.error('Error fetching custom analytics:', err)
            error.value = err.response?.data?.message || 'Failed to fetch custom analytics'
            throw err

        } finally {
            loadingStates.custom = false
        }
    }

    /**
     * Export analytics data
     * @param {string} type - Type of analytics to export
     * @param {string} format - Export format (json, csv, xlsx, pdf)
     * @returns {Promise<Blob>} Export file
     */
    const exportAnalytics = async (type = 'overview', format = 'csv') => {
        try {
            const response = await axios.get(route('analytics.export'), {
                params: { type, format },
                responseType: format === 'json' ? 'json' : 'blob'
            })

            if (format !== 'json') {
                // Create download link for file formats
                const blob = new Blob([response.data])
                const url = window.URL.createObjectURL(blob)
                const link = document.createElement('a')
                link.href = url
                link.download = `analytics_${type}_${new Date().toISOString().split('T')[0]}.${format}`
                document.body.appendChild(link)
                link.click()
                document.body.removeChild(link)
                window.URL.revokeObjectURL(url)
            }

            return response.data

        } catch (err) {
            console.error('Error exporting analytics:', err)
            error.value = err.response?.data?.message || 'Failed to export analytics'
            throw err
        }
    }

    /**
     * Refresh all analytics data
     * @returns {Promise<void>}
     */
    const refreshAllAnalytics = async () => {
        try {
            isLoading.value = true
            
            await Promise.all([
                getPlatformOverview(),
                getInvestmentAnalytics(),
                getInvestorAnalytics(),
                getStartupAnalytics()
            ])

        } catch (err) {
            console.error('Error refreshing analytics:', err)
            error.value = 'Failed to refresh analytics data'

        } finally {
            isLoading.value = false
        }
    }

    /**
     * Calculate growth percentage
     * @param {number} current - Current value
     * @param {number} previous - Previous value
     * @returns {Object} Growth data with percentage and direction
     */
    const calculateGrowth = (current, previous) => {
        if (!previous || previous === 0) {
            return {
                percentage: current > 0 ? 100 : 0,
                direction: current > 0 ? 'up' : 'neutral',
                isPositive: current > 0
            }
        }

        const percentage = ((current - previous) / previous) * 100
        
        return {
            percentage: Math.abs(percentage),
            direction: percentage > 0 ? 'up' : percentage < 0 ? 'down' : 'neutral',
            isPositive: percentage >= 0
        }
    }

    /**
     * Format analytics data for charts
     * @param {Array} data - Raw analytics data
     * @param {string} xField - X-axis field name
     * @param {string} yField - Y-axis field name
     * @returns {Array} Formatted chart data
     */
    const formatChartData = (data, xField, yField) => {
        if (!Array.isArray(data)) return []

        return data.map(item => ({
            x: item[xField],
            y: item[yField],
            label: item.label || item[xField],
            ...item
        }))
    }

    /**
     * Get trend analysis for time-series data
     * @param {Array} data - Time-series data
     * @param {string} valueField - Field containing values to analyze
     * @returns {Object} Trend analysis
     */
    const getTrendAnalysis = (data, valueField = 'value') => {
        if (!Array.isArray(data) || data.length < 2) {
            return { trend: 'insufficient_data', slope: 0 }
        }

        // Calculate simple linear regression
        const n = data.length
        let sumX = 0, sumY = 0, sumXY = 0, sumXX = 0

        data.forEach((item, index) => {
            const x = index
            const y = item[valueField] || 0
            sumX += x
            sumY += y
            sumXY += x * y
            sumXX += x * x
        })

        const slope = (n * sumXY - sumX * sumY) / (n * sumXX - sumX * sumX)
        
        return {
            trend: slope > 0.1 ? 'increasing' : slope < -0.1 ? 'decreasing' : 'stable',
            slope,
            isPositive: slope > 0,
            strength: Math.abs(slope) > 1 ? 'strong' : Math.abs(slope) > 0.1 ? 'moderate' : 'weak'
        }
    }

    /**
     * Get performance insights
     * @returns {Object} Performance insights and recommendations
     */
    const getPerformanceInsights = () => {
        const insights = []
        
        // Analyze platform metrics
        if (platformOverview.value.platform_success_rate < 50) {
            insights.push({
                type: 'warning',
                title: 'Low Success Rate',
                message: 'Platform success rate is below 50%. Consider improving startup vetting processes.',
                priority: 'high'
            })
        }

        // Analyze investment trends
        if (investmentTrends.value.length > 0) {
            const recentTrend = getTrendAnalysis(investmentTrends.value.slice(-6), 'total_amount')
            if (recentTrend.trend === 'decreasing') {
                insights.push({
                    type: 'alert',
                    title: 'Declining Investment Volume',
                    message: 'Investment volume has been declining over the past 6 months.',
                    priority: 'high'
                })
            }
        }

        // Analyze user activity
        if (userActivity.value.user_retention < 60) {
            insights.push({
                type: 'info',
                title: 'User Retention Opportunity',
                message: 'User retention rate could be improved through better onboarding and engagement.',
                priority: 'medium'
            })
        }

        return insights
    }

    // Computed properties
    const totalFunding = computed(() => {
        return platformOverview.value.total_investment_volume || 0
    })

    const isAnyLoading = computed(() => {
        return Object.values(loadingStates).some(loading => loading) || isLoading.value
    })

    const hasData = computed(() => {
        return Object.keys(platformOverview.value).length > 0
    })

    return {
        // State
        isLoading,
        loadingStates,
        error,
        platformOverview,
        investmentTrends,
        userActivity,
        performanceMetrics,
        industryAnalytics,
        stageAnalytics,
        investorAnalytics,
        startupAnalytics,
        customAnalytics,

        // Computed
        totalFunding,
        isAnyLoading,
        hasData,

        // Methods
        getPlatformOverview,
        getInvestmentAnalytics,
        getInvestorAnalytics,
        getStartupAnalytics,
        getCustomAnalytics,
        exportAnalytics,
        refreshAllAnalytics,
        calculateGrowth,
        formatChartData,
        getTrendAnalysis,
        getPerformanceInsights
    }
}