<template>
    <AppLayout title="Investor Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
                    <div class="p-6 lg:p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">Investment Dashboard</h1>
                                <p class="mt-2 text-gray-600">Track your portfolio performance and discover new opportunities</p>
                            </div>
                            <div class="flex space-x-4">
                                <el-button type="primary" @click="viewRecommendations">
                                    <i class="fas fa-lightbulb mr-2"></i>
                                    View Recommendations
                                </el-button>
                                <el-button @click="exportPortfolio">
                                    <i class="fas fa-download mr-2"></i>
                                    Export Portfolio
                                </el-button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Key Metrics -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-chart-line text-blue-500 text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Investments</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ metrics.total_investments || 0 }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <span class="font-medium text-green-600">{{ metrics.active_investments || 0 }}</span>
                                <span class="text-gray-600 ml-1">active</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-dollar-sign text-green-500 text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Invested</dt>
                                        <dd class="text-lg font-medium text-gray-900">${{ formatCurrency(metrics.total_invested) }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <span class="font-medium text-gray-600">${{ formatCurrency(metrics.portfolio_value) }}</span>
                                <span class="text-gray-600 ml-1">current value</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-trophy text-yellow-500 text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Returns</dt>
                                        <dd class="text-lg font-medium text-gray-900">${{ formatCurrency(metrics.total_returns) }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <span :class="getROIClass(metrics.portfolio_roi)" class="font-medium">
                                    {{ formatPercentage(metrics.portfolio_roi) }}%
                                </span>
                                <span class="text-gray-600 ml-1">ROI</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-clock text-purple-500 text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Pending</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ metrics.pending_investments || 0 }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <span class="text-gray-600">investments awaiting review</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and Performance -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <!-- ROI Trend Chart -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Portfolio ROI Trend</h3>
                            <div class="h-64">
                                <canvas ref="roiChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Performance -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Top Performing Investments</h3>
                            <div class="space-y-3">
                                <div 
                                    v-for="(investment, index) in portfolioPerformance.slice(0, 5)" 
                                    :key="investment.id"
                                    class="flex items-center justify-between p-3 border border-gray-200 rounded-lg"
                                >
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-500 w-6">{{ index + 1 }}.</span>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">{{ investment.startup?.name }}</p>
                                            <p class="text-sm text-gray-500">${{ formatCurrency(investment.initial_investment) }} invested</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p :class="getROIClass(investment.roi_percentage)" class="text-sm font-medium">
                                            {{ formatPercentage(investment.roi_percentage) }}%
                                        </p>
                                        <p class="text-sm text-gray-500">${{ formatCurrency(investment.current_valuation) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div v-if="portfolioPerformance.length === 0" class="text-center py-8">
                                <i class="fas fa-chart-bar text-gray-300 text-4xl mb-2"></i>
                                <p class="text-gray-500">No performance data available</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity and Recommendations -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Recent Activity -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Recent Activity</h3>
                            <div class="flow-root">
                                <ul class="-mb-8">
                                    <li v-for="(activity, index) in recentActivity" :key="activity.id" class="relative pb-8">
                                        <div v-if="index !== recentActivity.length - 1" class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></div>
                                        <div class="relative flex space-x-3">
                                            <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                <i class="fas fa-dollar-sign text-white text-xs"></i>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div>
                                                    <p class="text-sm text-gray-500">
                                                        Invested ${{ formatCurrency(activity.amount) }} in
                                                        <a href="#" class="font-medium text-gray-900">{{ activity.startup?.name }}</a>
                                                    </p>
                                                    <p class="text-xs text-gray-400">{{ formatDate(activity.created_at) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div v-if="recentActivity.length === 0" class="text-center py-8">
                                <i class="fas fa-history text-gray-300 text-4xl mb-2"></i>
                                <p class="text-gray-500">No recent activity</p>
                            </div>
                        </div>
                    </div>

                    <!-- Investment Recommendations -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Recommended for You</h3>
                                <el-button size="small" @click="viewRecommendations">View All</el-button>
                            </div>
                            <div class="space-y-4">
                                <div 
                                    v-for="recommendation in recommendations.slice(0, 3)" 
                                    :key="recommendation.id"
                                    class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer"
                                    @click="viewStartup(recommendation.id)"
                                >
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">{{ recommendation.name }}</h4>
                                            <p class="text-sm text-gray-600 mt-1">{{ recommendation.description?.substring(0, 100) }}...</p>
                                            <div class="flex items-center mt-2 space-x-3">
                                                <span class="text-xs text-gray-500">{{ recommendation.industry }}</span>
                                                <span class="text-xs text-gray-500">${{ formatCurrency(recommendation.funding_goal) }} goal</span>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-xs font-medium text-blue-600">{{ recommendation.match_score || 85 }}% match</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="recommendations.length === 0" class="text-center py-8">
                                <i class="fas fa-lightbulb text-gray-300 text-4xl mb-2"></i>
                                <p class="text-gray-500">No recommendations available</p>
                                <el-button size="small" class="mt-2" @click="updatePreferences">Update Preferences</el-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref, onMounted, nextTick } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import { ElButton, ElMessage } from 'element-plus'
import Chart from 'chart.js/auto'

const props = defineProps({
    metrics: Object,
    recentActivity: Array,
    portfolioPerformance: Array,
    recommendations: Array
})

const roiChart = ref(null)

const viewRecommendations = () => {
    router.visit(route('investor.recommendations'))
}

const exportPortfolio = () => {
    // TODO: Implement portfolio export
    ElMessage.success('Portfolio export started')
}

const viewStartup = (startupId) => {
    router.visit(route('startup.show', startupId))
}

const updatePreferences = () => {
    router.visit(route('investor.edit', { id: 'me' }))
}

const formatCurrency = (amount) => {
    if (!amount) return '0'
    return new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount)
}

const formatPercentage = (value) => {
    if (!value) return '0.0'
    return parseFloat(value).toFixed(1)
}

const formatDate = (dateString) => {
    if (!dateString) return 'N/A'
    return new Date(dateString).toLocaleDateString()
}

const getROIClass = (roi) => {
    if (!roi) return 'text-gray-600'
    return parseFloat(roi) >= 0 ? 'text-green-600' : 'text-red-600'
}

const initializeROIChart = () => {
    if (!roiChart.value) return

    const ctx = roiChart.value.getContext('2d')
    
    // Mock data - replace with actual ROI trend data
    const monthlyROI = props.metrics.monthly_roi_trend || [
        { month: 'Jan', roi: 5.2 },
        { month: 'Feb', roi: 7.8 },
        { month: 'Mar', roi: 12.1 },
        { month: 'Apr', roi: 15.6 },
        { month: 'May', roi: 18.3 },
        { month: 'Jun', roi: 22.4 }
    ]

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: monthlyROI.map(d => d.month),
            datasets: [{
                label: 'Portfolio ROI (%)',
                data: monthlyROI.map(d => d.roi),
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value + '%'
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'ROI: ' + context.parsed.y + '%'
                        }
                    }
                }
            }
        }
    })
}

onMounted(() => {
    nextTick(() => {
        initializeROIChart()
    })
})
</script>