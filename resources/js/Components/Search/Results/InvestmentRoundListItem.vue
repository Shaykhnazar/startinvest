<template>
    <div class="investment-round-list-item bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-md transition-all duration-200 p-4">
        <div class="flex items-center justify-between">
            <!-- Main Content -->
            <div class="flex items-center space-x-4 flex-1 min-w-0">
                <!-- Status Indicator -->
                <div 
                    :class="[
                        'w-10 h-10 rounded-lg flex items-center justify-center text-white font-bold text-sm flex-shrink-0',
                        getStatusBackgroundColor(item.status)
                    ]"
                >
                    {{ item.round_type?.charAt(0)?.toUpperCase() || 'R' }}
                </div>

                <!-- Details -->
                <div class="flex-1 min-w-0">
                    <div class="flex items-center space-x-2 mb-1">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                            {{ item.name }}
                        </h3>
                        <span 
                            :class="[
                                'inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium',
                                getStatusClasses(item.status)
                            ]"
                        >
                            {{ getStatusLabel(item.status) }}
                        </span>
                        <span v-if="item.is_accredited_only" class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200">
                            <ShieldExclamationIcon class="w-3 h-3 mr-1" />
                            Accredited
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">
                        {{ item.startup?.title || 'Unknown Startup' }} • {{ item.round_type }} • {{ item.stage?.name }}
                    </p>
                    <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-2">
                        {{ item.description || 'No description available' }}
                    </p>
                </div>
            </div>

            <!-- Progress & Stats -->
            <div class="flex items-center space-x-6 ml-4">
                <!-- Progress -->
                <div class="w-24">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs text-gray-500">Progress</span>
                        <span class="text-xs font-medium text-gray-900 dark:text-white">
                            {{ Math.round((item.raised_amount / item.target_amount) * 100) }}%
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                        <div 
                            class="bg-blue-600 h-2 rounded-full transition-all duration-500"
                            :style="{ width: `${Math.min((item.raised_amount / item.target_amount) * 100, 100)}%` }"
                        ></div>
                    </div>
                </div>

                <!-- Funding Stats -->
                <div class="text-center">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ formatCurrency(item.raised_amount) }}
                    </div>
                    <div class="text-xs text-gray-500">Raised</div>
                </div>
                <div class="text-center">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ formatCurrency(item.target_amount) }}
                    </div>
                    <div class="text-xs text-gray-500">Target</div>
                </div>
                
                <!-- Investors -->
                <div class="text-center">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ item.investor_count || 0 }}
                    </div>
                    <div class="text-xs text-gray-500">Investors</div>
                </div>
                
                <!-- Deadline & Action -->
                <div class="flex items-center space-x-3">
                    <div v-if="item.deadline" class="text-center">
                        <div class="flex items-center space-x-1">
                            <div 
                                :class="[
                                    'w-2 h-2 rounded-full',
                                    getUrgencyColor(item.deadline)
                                ]"
                            ></div>
                            <span class="text-xs text-gray-600 dark:text-gray-300">
                                {{ getDeadlineText(item.deadline) }}
                            </span>
                        </div>
                    </div>
                    
                    <button 
                        :class="[
                            'inline-flex items-center px-3 py-1 text-xs font-medium rounded transition-colors',
                            item.status === 'active' 
                                ? 'bg-blue-600 hover:bg-blue-700 text-white'
                                : 'bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 cursor-not-allowed'
                        ]"
                        :disabled="item.status !== 'active'"
                    >
                        {{ item.status === 'active' ? 'Invest' : 'View' }}
                        <ArrowRightIcon class="w-3 h-3 ml-1" />
                    </button>
                </div>
            </div>
        </div>

        <!-- Investment Range & Valuation -->
        <div class="mt-3 flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
            <div class="flex items-center space-x-4">
                <span>
                    Min: {{ formatCurrency(item.min_investment || 0) }}
                </span>
                <span v-if="item.max_investment">
                    Max: {{ formatCurrency(item.max_investment) }}
                </span>
                <span v-if="item.pre_money_valuation">
                    Pre-money: {{ formatCurrency(item.pre_money_valuation) }}
                </span>
            </div>
            <div v-if="item.geographical_restrictions && item.geographical_restrictions.length > 0" class="flex items-center">
                <MapPinIcon class="w-3 h-3 mr-1" />
                <span>Location restricted</span>
            </div>
        </div>
    </div>
</template>

<script setup>
import { 
    ArrowRightIcon,
    ShieldExclamationIcon,
    MapPinIcon
} from '@heroicons/vue/24/outline'
import { formatCurrency } from '@/Utils/formatters'

defineProps({
    item: {
        type: Object,
        required: true
    },
    type: {
        type: String,
        default: 'investment_round'
    }
})

const getStatusClasses = (status) => {
    const classes = {
        draft: 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200',
        active: 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200',
        successful: 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200',
        failed: 'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200',
        cancelled: 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200'
    }
    return classes[status] || classes.draft
}

const getStatusBackgroundColor = (status) => {
    const colors = {
        draft: 'bg-gray-500',
        active: 'bg-green-500',
        successful: 'bg-blue-500',
        failed: 'bg-red-500',
        cancelled: 'bg-gray-500'
    }
    return colors[status] || colors.draft
}

const getStatusLabel = (status) => {
    const labels = {
        draft: 'Draft',
        active: 'Active',
        successful: 'Success',
        failed: 'Failed',
        cancelled: 'Cancelled'
    }
    return labels[status] || 'Unknown'
}

const getDeadlineText = (deadline) => {
    if (!deadline) return 'No deadline'
    
    const deadlineDate = new Date(deadline)
    const now = new Date()
    const diffInDays = Math.ceil((deadlineDate - now) / (1000 * 60 * 60 * 24))
    
    if (diffInDays < 0) return 'Closed'
    if (diffInDays === 0) return 'Today'
    if (diffInDays === 1) return 'Tomorrow'
    if (diffInDays <= 7) return `${diffInDays}d left`
    
    return deadlineDate.toLocaleDateString('en-US', { 
        month: 'short', 
        day: 'numeric' 
    })
}

const getUrgencyColor = (deadline) => {
    if (!deadline) return 'bg-gray-400'
    
    const deadlineDate = new Date(deadline)
    const now = new Date()
    const diffInDays = Math.ceil((deadlineDate - now) / (1000 * 60 * 60 * 24))
    
    if (diffInDays < 0) return 'bg-gray-400'
    if (diffInDays <= 3) return 'bg-red-400'
    if (diffInDays <= 7) return 'bg-yellow-400'
    return 'bg-green-400'
}
</script>

<style scoped>
.investment-round-list-item {
    @apply transition-transform hover:scale-101;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>