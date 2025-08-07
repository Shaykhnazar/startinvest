<template>
    <div class="analytics-dashboard">
        <Head title="Analytics Dashboard" />
        
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Analytics Dashboard</h1>
            <p class="text-gray-600 dark:text-gray-400">Comprehensive platform insights and metrics</p>
        </div>

        <!-- Key Metrics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <MetricCard
                :value="analytics.platform_overview.total_users"
                label="Total Users"
                icon="users"
                color="blue"
            />
            <MetricCard
                :value="analytics.platform_overview.total_investors"
                label="Investors"
                icon="trending-up"
                color="green"
            />
            <MetricCard
                :value="formatCurrency(analytics.platform_overview.total_investment_volume)"
                label="Total Investment Volume"
                icon="dollar-sign"
                color="purple"
            />
            <MetricCard
                :value="`${analytics.platform_overview.platform_success_rate.toFixed(1)}%`"
                label="Success Rate"
                icon="target"
                color="orange"
            />
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Investment Trends -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Investment Trends</h3>
                <InvestmentTrendsChart :data="analytics.investment_trends" />
            </div>

            <!-- User Activity -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">User Activity (30 Days)</h3>
                <UserActivityChart :data="analytics.user_activity" />
            </div>
        </div>

        <!-- Performance Metrics -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Performance Metrics</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-600">
                        {{ analytics.performance_metrics.investment_success_rate.toFixed(1) }}%
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Investment Success Rate</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-600">
                        {{ analytics.performance_metrics.round_success_rate.toFixed(1) }}%
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Round Success Rate</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-purple-600">
                        {{ Math.round(analytics.performance_metrics.average_time_to_funding) }} days
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Avg. Time to Funding</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-orange-600">
                        {{ Math.round(analytics.performance_metrics.average_round_duration) }} days
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Avg. Round Duration</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
            <div class="flex flex-wrap gap-4">
                <Link 
                    :href="route('analytics.investments')"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors"
                >
                    <ChartBarIcon class="w-4 h-4 mr-2" />
                    Investment Analytics
                </Link>
                <Link 
                    :href="route('analytics.investors')"
                    class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors"
                >
                    <UsersIcon class="w-4 h-4 mr-2" />
                    Investor Analytics
                </Link>
                <Link 
                    :href="route('analytics.startups')"
                    class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors"
                >
                    <RocketLaunchIcon class="w-4 h-4 mr-2" />
                    Startup Analytics
                </Link>
                <Link 
                    :href="route('analytics.custom')"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors"
                >
                    <CogIcon class="w-4 h-4 mr-2" />
                    Custom Analytics
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3'
import { ChartBarIcon, UsersIcon, RocketLaunchIcon, CogIcon } from '@heroicons/vue/24/outline'
import MetricCard from '@/Components/Analytics/MetricCard.vue'
import InvestmentTrendsChart from '@/Components/Analytics/InvestmentTrendsChart.vue'
import UserActivityChart from '@/Components/Analytics/UserActivityChart.vue'
import { formatCurrency } from '@/Utils/formatters'

defineProps({
    analytics: {
        type: Object,
        required: true
    }
})
</script>

<style scoped>
.analytics-dashboard {
    @apply max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8;
}
</style>