<template>
    <div class="startup-list-item bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-md transition-all duration-200 p-4">
        <div class="flex items-center justify-between">
            <!-- Main Content -->
            <div class="flex items-center space-x-4 flex-1 min-w-0">
                <!-- Avatar -->
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                    {{ item.title?.charAt(0)?.toUpperCase() || 'S' }}
                </div>

                <!-- Details -->
                <div class="flex-1 min-w-0">
                    <div class="flex items-center space-x-2 mb-1">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                            {{ item.title }}
                        </h3>
                        <span v-if="item.verified" class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                            <CheckCircleIcon class="w-3 h-3 mr-1" />
                            Verified
                        </span>
                        <span v-if="item.has_mvp" class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                            MVP
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">
                        {{ item.industry }} • {{ item.location || 'Location not specified' }}
                    </p>
                    <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-2">
                        {{ item.description || 'No description available' }}
                    </p>
                </div>
            </div>

            <!-- Stats -->
            <div class="flex items-center space-x-6 ml-4">
                <div class="text-center">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ formatCurrency(item.total_raised || 0) }}
                    </div>
                    <div class="text-xs text-gray-500">Raised</div>
                </div>
                <div class="text-center">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ item.investment_count || 0 }}
                    </div>
                    <div class="text-xs text-gray-500">Investments</div>
                </div>
                
                <!-- Status & Action -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-1">
                        <div 
                            :class="[
                                'w-2 h-2 rounded-full',
                                getFundingStatusColor(item.funding_status)
                            ]"
                        ></div>
                        <span class="text-xs text-gray-600 dark:text-gray-300">
                            {{ getFundingStatusLabel(item.funding_status) }}
                        </span>
                    </div>
                    
                    <button class="inline-flex items-center px-3 py-1 bg-purple-600 hover:bg-purple-700 text-white text-xs font-medium rounded transition-colors">
                        View
                        <ArrowRightIcon class="w-3 h-3 ml-1" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { 
    CheckCircleIcon, 
    ArrowRightIcon
} from '@heroicons/vue/24/outline'
import { formatCurrency } from '@/Utils/formatters'

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
        seeking: 'Seeking',
        funded: 'Funded',
        not_seeking: 'Not Seeking'
    }
    return labels[status] || 'Unknown'
}
</script>

<style scoped>
.startup-list-item {
    @apply transition-transform hover:scale-101;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>