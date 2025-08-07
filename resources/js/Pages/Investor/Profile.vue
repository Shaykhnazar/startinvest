<template>
    <AppLayout title="Investor Profile">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Profile Header -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
                    <div class="relative">
                        <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-32"></div>
                        <div class="px-6 pb-6">
                            <div class="flex items-end -mt-16 mb-4">
                                <img 
                                    :src="investor.avatar || '/default-avatar.png'"
                                    :alt="investor.name"
                                    class="w-32 h-32 rounded-full border-4 border-white shadow-lg object-cover"
                                >
                                <div class="ml-6 pb-4">
                                    <div class="flex items-center space-x-3">
                                        <h1 class="text-3xl font-bold text-gray-900">{{ investor.name }}</h1>
                                        <el-tag v-if="investor.is_verified" type="success" size="large">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Verified
                                        </el-tag>
                                    </div>
                                    <p v-if="investor.company" class="text-lg text-gray-600 mt-1">{{ investor.company }}</p>
                                    <p v-if="investor.position" class="text-gray-600">{{ investor.position }}</p>
                                    <div class="flex items-center mt-2 text-gray-600">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        <span>{{ investor.location || 'Global' }}</span>
                                        <span v-if="investor.investment_experience_years" class="ml-4">
                                            <i class="fas fa-calendar mr-1"></i>
                                            {{ investor.investment_experience_years }} years experience
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-between items-start">
                                <div class="flex-1 mr-8">
                                    <p v-if="investor.bio" class="text-gray-700 mb-4">{{ investor.bio }}</p>
                                    <p v-if="investor.investment_thesis" class="text-gray-700 italic">"{{ investor.investment_thesis }}"</p>
                                </div>
                                
                                <div class="flex space-x-3">
                                    <el-button v-if="canEdit" type="primary" @click="editProfile">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Profile
                                    </el-button>
                                    <el-button v-else @click="connectWithInvestor">
                                        <i class="fas fa-handshake mr-2"></i>
                                        Connect
                                    </el-button>
                                    <el-button v-if="investor.website" @click="visitWebsite" link>
                                        <i class="fas fa-external-link-alt mr-2"></i>
                                        Website
                                    </el-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Overview -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-chart-line text-blue-500 text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Investments</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ portfolioStats.total_investments || 0 }}</dd>
                                    </dl>
                                </div>
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
                                        <dd class="text-lg font-medium text-gray-900">${{ formatCurrency(portfolioStats.total_invested) }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-building text-purple-500 text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Portfolio Companies</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ portfolioStats.portfolio_companies || 0 }}</dd>
                                    </dl>
                                </div>
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
                                        <dt class="text-sm font-medium text-gray-500 truncate">Portfolio ROI</dt>
                                        <dd class="text-lg font-medium text-gray-900">{{ formatPercentage(portfolioStats.portfolio_roi) }}%</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Tabs -->
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <el-tabs v-model="activeTab" class="px-6">
                        <!-- Investment Focus Tab -->
                        <el-tab-pane label="Investment Focus" name="focus">
                            <div class="py-6">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-4">Investment Preferences</h3>
                                        <div class="space-y-4">
                                            <div v-if="investor.investment_focus">
                                                <dt class="text-sm font-medium text-gray-500">Focus Areas</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ investor.investment_focus }}</dd>
                                            </div>
                                            <div v-if="investor.investment_stage_focus">
                                                <dt class="text-sm font-medium text-gray-500">Stage Focus</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ investor.investment_stage_focus }}</dd>
                                            </div>
                                            <div v-if="investor.investment_size_min || investor.investment_size_max">
                                                <dt class="text-sm font-medium text-gray-500">Investment Size</dt>
                                                <dd class="mt-1 text-sm text-gray-900">
                                                    ${{ formatCurrency(investor.investment_size_min) }} - ${{ formatCurrency(investor.investment_size_max) }}
                                                </dd>
                                            </div>
                                            <div v-if="investor.preferred_contact_method">
                                                <dt class="text-sm font-medium text-gray-500">Preferred Contact</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ investor.preferred_contact_method }}</dd>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-4">Services Offered</h3>
                                        <div class="space-y-2">
                                            <div v-if="investor.mentorship_available" class="flex items-center">
                                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                                <span class="text-sm text-gray-700">Mentorship Available</span>
                                            </div>
                                            <div v-if="investor.co_investment_interested" class="flex items-center">
                                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                                <span class="text-sm text-gray-700">Co-Investment Opportunities</span>
                                            </div>
                                            <div v-if="investor.accepts_unsolicited_pitches" class="flex items-center">
                                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                                <span class="text-sm text-gray-700">Accepts Unsolicited Pitches</span>
                                            </div>
                                        </div>
                                        
                                        <div v-if="investor.response_time_days" class="mt-4">
                                            <dt class="text-sm font-medium text-gray-500">Average Response Time</dt>
                                            <dd class="mt-1 text-sm text-gray-900">{{ investor.response_time_days }} days</dd>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </el-tab-pane>

                        <!-- Recent Investments Tab -->
                        <el-tab-pane label="Recent Investments" name="investments">
                            <div class="py-6">
                                <div v-if="recentInvestments?.length" class="space-y-4">
                                    <div 
                                        v-for="investment in recentInvestments" 
                                        :key="investment.id"
                                        class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow"
                                    >
                                        <div class="flex justify-between items-start">
                                            <div class="flex-1">
                                                <h4 class="text-lg font-medium text-gray-900">{{ investment.startup?.name }}</h4>
                                                <p class="text-sm text-gray-600 mt-1">{{ investment.startup?.description }}</p>
                                                <div class="flex items-center mt-2 space-x-4 text-sm text-gray-500">
                                                    <span>Amount: ${{ formatCurrency(investment.amount) }}</span>
                                                    <span>Date: {{ formatDate(investment.created_at) }}</span>
                                                    <span>Status: {{ investment.status }}</span>
                                                </div>
                                            </div>
                                            <el-button size="small" @click="viewStartup(investment.startup?.id)">
                                                View Startup
                                            </el-button>
                                        </div>
                                    </div>
                                </div>
                                <div v-else class="text-center py-8">
                                    <i class="fas fa-chart-line text-gray-300 text-4xl mb-2"></i>
                                    <p class="text-gray-500">No recent investments</p>
                                </div>
                            </div>
                        </el-tab-pane>

                        <!-- Industry Breakdown Tab -->
                        <el-tab-pane label="Portfolio Analysis" name="analysis">
                            <div class="py-6">
                                <div v-if="industryBreakdown?.length" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-4">Industry Breakdown</h3>
                                        <div class="space-y-3">
                                            <div 
                                                v-for="industry in industryBreakdown" 
                                                :key="industry.industry"
                                                class="flex justify-between items-center"
                                            >
                                                <span class="text-sm font-medium text-gray-700">{{ industry.industry }}</span>
                                                <span class="text-sm text-gray-900">${{ formatCurrency(industry.total) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-4">Risk Assessment</h3>
                                        <div class="space-y-3">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm font-medium text-gray-700">Risk Score</span>
                                                <span class="text-sm text-gray-900">{{ portfolioStats.risk_score || 'N/A' }}/10</span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm font-medium text-gray-700">Diversification Score</span>
                                                <span class="text-sm text-gray-900">{{ formatPercentage(portfolioStats.diversification_score) }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-else class="text-center py-8">
                                    <i class="fas fa-chart-pie text-gray-300 text-4xl mb-2"></i>
                                    <p class="text-gray-500">No portfolio data available</p>
                                </div>
                            </div>
                        </el-tab-pane>
                    </el-tabs>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import { ElButton, ElTag, ElTabs, ElTabPane, ElMessage } from 'element-plus'

const props = defineProps({
    investor: Object,
    portfolioStats: Object,
    recentInvestments: Array,
    industryBreakdown: Array,
    canEdit: Boolean
})

const activeTab = ref('focus')

const editProfile = () => {
    router.visit(route('investor.edit', props.investor.id))
}

const connectWithInvestor = () => {
    ElMessage.success('Connection request sent!')
    // TODO: Implement connection logic
}

const visitWebsite = () => {
    window.open(props.investor.website, '_blank')
}

const viewStartup = (startupId) => {
    router.visit(route('startup.show', startupId))
}

const formatCurrency = (amount) => {
    if (!amount) return '0'
    return new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount)
}

const formatPercentage = (value) => {
    if (!value) return '0'
    return parseFloat(value).toFixed(1)
}

const formatDate = (dateString) => {
    if (!dateString) return 'N/A'
    return new Date(dateString).toLocaleDateString()
}
</script>