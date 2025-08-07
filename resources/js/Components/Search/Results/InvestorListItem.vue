<template>
    <div class="investor-list-item bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-md transition-all duration-200 p-4">
        <div class="flex items-center justify-between">
            <!-- Main Content -->
            <div class="flex items-center space-x-4 flex-1 min-w-0">
                <!-- Avatar -->
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                    {{ item.name?.charAt(0)?.toUpperCase() || 'I' }}
                </div>

                <!-- Details -->
                <div class="flex-1 min-w-0">
                    <div class="flex items-center space-x-2 mb-1">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                            {{ item.name }}
                        </h3>
                        <span v-if="item.is_verified" class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                            <CheckCircleIcon class="w-3 h-3 mr-1" />
                            Verified
                        </span>
                        <span v-if="item.accepts_unsolicited_pitches" class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                            Open
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">
                        {{ item.company || 'Independent Investor' }} • {{ item.location || 'Location not specified' }}
                    </p>
                    <p class="text-xs text-gray-600 dark:text-gray-300 line-clamp-2">
                        {{ item.bio || item.investment_thesis || 'No bio available' }}
                    </p>
                </div>
            </div>

            <!-- Stats -->
            <div class="flex items-center space-x-6 ml-4">
                <div class="text-center">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ formatCurrency(item.total_invested || 0) }}
                    </div>
                    <div class="text-xs text-gray-500">Invested</div>
                </div>
                <div class="text-center">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ item.investment_count || 0 }}
                    </div>
                    <div class="text-xs text-gray-500">Investments</div>
                </div>
                
                <!-- Experience -->
                <div v-if="item.investment_experience_years" class="text-center">
                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                        {{ item.investment_experience_years }}+
                    </div>
                    <div class="text-xs text-gray-500">Years</div>
                </div>
                
                <!-- Status & Action -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-1">
                        <div 
                            :class="[
                                'w-2 h-2 rounded-full',
                                getActivityStatusColor(item.last_active_at)
                            ]"
                        ></div>
                        <span class="text-xs text-gray-600 dark:text-gray-300">
                            {{ getActivityStatusLabel(item.last_active_at) }}
                        </span>
                    </div>
                    
                    <button class="inline-flex items-center px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs font-medium rounded transition-colors">
                        Profile
                        <ArrowRightIcon class="w-3 h-3 ml-1" />
                    </button>
                </div>
            </div>
        </div>

        <!-- Investment Range & Focus Areas -->
        <div class="mt-3 flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
            <div class="flex items-center space-x-4">
                <span>
                    Range: {{ formatInvestmentRange(item.investment_size_min, item.investment_size_max) }}
                </span>
                <span v-if="item.mentorship_available" class="flex items-center">
                    <AcademicCapIcon class="w-3 h-3 mr-1" />
                    Mentorship
                </span>
            </div>
            <div v-if="item.investment_focus" class="flex space-x-1">
                <span 
                    v-for="focus in getFocusAreas(item.investment_focus)" 
                    :key="focus"
                    class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded text-xs"
                >
                    {{ focus }}
                </span>
            </div>
        </div>
    </div>
</template>

<script setup>
import { 
    CheckCircleIcon, 
    ArrowRightIcon,
    AcademicCapIcon
} from '@heroicons/vue/24/outline'
import { formatCurrency } from '@/Utils/formatters'

defineProps({
    item: {
        type: Object,
        required: true
    },
    type: {
        type: String,
        default: 'investor'
    }
})

const formatInvestmentRange = (min, max) => {
    if (!min && !max) return 'Not specified'
    if (!min) return `Up to ${formatCurrency(max)}`
    if (!max) return `From ${formatCurrency(min)}`
    return `${formatCurrency(min)} - ${formatCurrency(max)}`
}

const getFocusAreas = (focus) => {
    if (!focus) return []
    return focus.split(',').map(f => f.trim()).slice(0, 2)
}

const getActivityStatusColor = (lastActiveAt) => {
    if (!lastActiveAt) return 'bg-gray-400'
    
    const daysSince = Math.floor((new Date() - new Date(lastActiveAt)) / (1000 * 60 * 60 * 24))
    if (daysSince <= 7) return 'bg-green-400'
    if (daysSince <= 30) return 'bg-yellow-400'
    return 'bg-gray-400'
}

const getActivityStatusLabel = (lastActiveAt) => {
    if (!lastActiveAt) return 'Unknown'
    
    const daysSince = Math.floor((new Date() - new Date(lastActiveAt)) / (1000 * 60 * 60 * 24))
    if (daysSince <= 1) return 'Active'
    if (daysSince <= 7) return 'This week'
    if (daysSince <= 30) return 'This month'
    return 'Less active'
}
</script>

<style scoped>
.investor-list-item {
    @apply transition-transform hover:scale-101;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>