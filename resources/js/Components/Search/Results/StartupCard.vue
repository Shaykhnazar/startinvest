<template>
    <div class="startup-card bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-md transition-all duration-200 p-6">
        <!-- Header -->
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                    {{ item.title?.charAt(0)?.toUpperCase() || 'S' }}
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white line-clamp-1">
                        {{ item.title }}
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ item.industry }}
                    </p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <span v-if="item.verified" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                    <CheckCircleIcon class="w-3 h-3 mr-1" />
                    Verified
                </span>
                <span v-if="item.has_mvp" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                    MVP
                </span>
            </div>
        </div>

        <!-- Description -->
        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
            {{ item.description || 'No description available' }}
        </p>

        <!-- Stats -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="text-center">
                <div class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ formatCurrency(item.total_raised || 0) }}
                </div>
                <div class="text-xs text-gray-500">Total Raised</div>
            </div>
            <div class="text-center">
                <div class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ item.investment_count || 0 }}
                </div>
                <div class="text-xs text-gray-500">Investments</div>
            </div>
        </div>

        <!-- Location & Date -->
        <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-4">
            <div class="flex items-center">
                <MapPinIcon class="w-4 h-4 mr-1" />
                {{ item.location || 'Location not specified' }}
            </div>
            <div class="flex items-center">
                <CalendarDaysIcon class="w-4 h-4 mr-1" />
                {{ formatDate(item.created_at) }}
            </div>
        </div>

        <!-- Funding Status -->
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div 
                    :class="[
                        'w-2 h-2 rounded-full',
                        getFundingStatusColor(item.funding_status)
                    ]"
                ></div>
                <span class="text-sm text-gray-600 dark:text-gray-300">
                    {{ getFundingStatusLabel(item.funding_status) }}
                </span>
            </div>

            <!-- Action Button -->
            <button class="inline-flex items-center px-3 py-1.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
                View Details
                <ArrowRightIcon class="w-4 h-4 ml-1" />
            </button>
        </div>

        <!-- Active Investment Round -->
        <div v-if="item.active_round" class="mt-4 p-3 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-sm font-medium text-green-800 dark:text-green-200">
                        {{ item.active_round.name }} - {{ formatCurrency(item.active_round.target_amount) }}
                    </div>
                    <div class="text-xs text-green-600 dark:text-green-300">
                        {{ Math.round((item.active_round.raised_amount / item.active_round.target_amount) * 100) }}% funded
                    </div>
                </div>
                <CurrencyDollarIcon class="w-5 h-5 text-green-500" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { 
    CheckCircleIcon, 
    MapPinIcon, 
    CalendarDaysIcon,
    ArrowRightIcon,
    CurrencyDollarIcon
} from '@heroicons/vue/24/outline'
import { formatCurrency, formatDate } from '@/Utils/formatters'

defineProps({
    item: {
        type: Object,
        required: true
    },
    type: {
        type: String,
        default: 'startup'
    }
})

const getFundingStatusColor = (status) => {
    const colors = {
        seeking: 'bg-yellow-400',
        funded: 'bg-green-400',
        not_seeking: 'bg-gray-400'
    }
    return colors[status] || 'bg-gray-400'
}

const getFundingStatusLabel = (status) => {
    const labels = {
        seeking: 'Seeking Funding',
        funded: 'Recently Funded',
        not_seeking: 'Not Seeking'
    }
    return labels[status] || 'Unknown'
}
</script>

<style scoped>
.startup-card {
    @apply transition-transform hover:scale-102;
}

.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>