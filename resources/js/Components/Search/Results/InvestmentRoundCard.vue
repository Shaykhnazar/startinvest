<template>
    <div class="investment-round-card bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-md transition-all duration-200 p-6">
        <!-- Header -->
        <div class="flex items-start justify-between mb-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white line-clamp-1">
                    {{ item.name }}
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ item.startup?.title || 'Unknown Startup' }} • {{ item.round_type }}
                </p>
            </div>
            <div class="flex flex-col items-end space-y-1">
                <span 
                    :class="[
                        'inline-flex items-center px-2 py-1 rounded-full text-xs font-medium',
                        getStatusClasses(item.status)
                    ]"
                >
                    {{ getStatusLabel(item.status) }}
                </span>
                <span v-if="item.stage" class="text-xs text-gray-500 dark:text-gray-400">
                    {{ item.stage.name }}
                </span>
            </div>
        </div>

        <!-- Description -->
        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
            {{ item.description || 'No description available' }}
        </p>

        <!-- Funding Progress -->
        <div class="mb-4">
            <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                    Progress
                </span>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    {{ Math.round((item.raised_amount / item.target_amount) * 100) }}%
                </span>
            </div>
            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                <div 
                    class="bg-blue-600 h-2 rounded-full transition-all duration-500"
                    :style="{ width: `${Math.min((item.raised_amount / item.target_amount) * 100, 100)}%` }"
                ></div>
            </div>
            <div class="flex justify-between items-center mt-2 text-sm">
                <span class="text-gray-600 dark:text-gray-300">
                    {{ formatCurrency(item.raised_amount) }} raised
                </span>
                <span class="font-medium text-gray-900 dark:text-white">
                    {{ formatCurrency(item.target_amount) }} target
                </span>
            </div>
        </div>

        <!-- Investment Range -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="text-center">
                <div class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ formatCurrency(item.min_investment || 0) }}
                </div>
                <div class="text-xs text-gray-500">Min Investment</div>
            </div>
            <div class="text-center">
                <div class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ item.max_investment ? formatCurrency(item.max_investment) : 'No Max' }}
                </div>
                <div class="text-xs text-gray-500">Max Investment</div>
            </div>
        </div>

        <!-- Valuation -->
        <div v-if="item.pre_money_valuation" class="mb-4 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Pre-money Valuation
                    </div>
                    <div class="text-lg font-bold text-gray-900 dark:text-white">
                        {{ formatCurrency(item.pre_money_valuation) }}
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Post-money
                    </div>
                    <div class="text-lg font-bold text-gray-900 dark:text-white">
                        {{ formatCurrency(item.post_money_valuation || (item.pre_money_valuation + item.target_amount)) }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Deadline & Investors -->
        <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-4">
            <div v-if="item.deadline" class="flex items-center">
                <CalendarDaysIcon class="w-4 h-4 mr-1" />
                {{ getDeadlineText(item.deadline) }}
            </div>
            <div class="flex items-center">
                <UsersIcon class="w-4 h-4 mr-1" />
                {{ item.investor_count || 0 }} investors
            </div>
        </div>

        <!-- Restrictions & Requirements -->
        <div v-if="item.is_accredited_only || item.geographical_restrictions" class="mb-4">
            <div class="flex flex-wrap gap-2">
                <span 
                    v-if="item.is_accredited_only"
                    class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200"
                >
                    <ShieldExclamationIcon class="w-3 h-3 mr-1" />
                    Accredited Only
                </span>
                <span 
                    v-if="item.geographical_restrictions && item.geographical_restrictions.length > 0"
                    class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200"
                >
                    <MapPinIcon class="w-3 h-3 mr-1" />
                    Location Restricted
                </span>
            </div>
        </div>

        <!-- Action Button -->
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div 
                    :class="[
                        'w-2 h-2 rounded-full',
                        getUrgencyColor(item.deadline)
                    ]"
                ></div>
                <span class="text-sm text-gray-600 dark:text-gray-300">
                    {{ getUrgencyLabel(item.deadline) }}
                </span>
            </div>

            <button 
                :class="[
                    'inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors',
                    item.status === 'active' 
                        ? 'bg-blue-600 hover:bg-blue-700 text-white'
                        : 'bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 cursor-not-allowed'
                ]"
                :disabled="item.status !== 'active'"
            >
                {{ item.status === 'active' ? 'Invest Now' : 'View Details' }}
                <ArrowRightIcon class="w-4 h-4 ml-1" />
            </button>
        </div>
    </div>
</template>

<script setup>
import { 
    CalendarDaysIcon,
    UsersIcon,
    ShieldExclamationIcon,
    MapPinIcon,
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

const getStatusLabel = (status) => {
    const labels = {
        draft: 'Draft',
        active: 'Active',
        successful: 'Successful',
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
    if (diffInDays === 0) return 'Closes today'
    if (diffInDays === 1) return 'Closes tomorrow'
    if (diffInDays <= 7) return `${diffInDays} days left`
    
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

const getUrgencyLabel = (deadline) => {
    if (!deadline) return 'No deadline'
    
    const deadlineDate = new Date(deadline)
    const now = new Date()
    const diffInDays = Math.ceil((deadlineDate - now) / (1000 * 60 * 60 * 24))
    
    if (diffInDays < 0) return 'Closed'
    if (diffInDays <= 3) return 'Ending soon'
    if (diffInDays <= 7) return 'This week'
    return 'Active'
}
</script>

<style scoped>
.investment-round-card {
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