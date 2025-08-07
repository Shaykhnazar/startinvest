<template>
    <div class="investor-card bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm hover:shadow-md transition-all duration-200 p-6">
        <!-- Header -->
        <div class="flex items-start space-x-4 mb-4">
            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                {{ item.name?.charAt(0)?.toUpperCase() || 'I' }}
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white line-clamp-1">
                    {{ item.name }}
                </h3>
                <p v-if="item.company" class="text-sm text-gray-500 dark:text-gray-400 line-clamp-1">
                    {{ item.company }}
                </p>
                <div class="flex items-center mt-1 space-x-2">
                    <span v-if="item.is_verified" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                        <CheckCircleIcon class="w-3 h-3 mr-1" />
                        Verified
                    </span>
                    <span v-if="item.accepts_unsolicited_pitches" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                        Accepting Pitches
                    </span>
                </div>
            </div>
        </div>

        <!-- Bio/Description -->
        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
            {{ item.bio || item.investment_thesis || 'No bio available' }}
        </p>

        <!-- Investment Stats -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="text-center">
                <div class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ formatCurrency(item.total_invested || 0) }}
                </div>
                <div class="text-xs text-gray-500">Total Invested</div>
            </div>
            <div class="text-center">
                <div class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ item.investment_count || 0 }}
                </div>
                <div class="text-xs text-gray-500">Investments</div>
            </div>
        </div>

        <!-- Investment Range -->
        <div class="mb-4">
            <div class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Investment Range
            </div>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                {{ formatInvestmentRange(item.investment_size_min, item.investment_size_max) }}
            </div>
        </div>

        <!-- Focus Areas -->
        <div v-if="item.investment_focus" class="mb-4">
            <div class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Investment Focus
            </div>
            <div class="flex flex-wrap gap-1">
                <span 
                    v-for="focus in getFocusAreas(item.investment_focus)" 
                    :key="focus"
                    class="inline-flex items-center px-2 py-1 rounded text-xs bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300"
                >
                    {{ focus }}
                </span>
            </div>
        </div>

        <!-- Location & Experience -->
        <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-4">
            <div class="flex items-center">
                <MapPinIcon class="w-4 h-4 mr-1" />
                {{ item.location || 'Location not specified' }}
            </div>
            <div v-if="item.investment_experience_years" class="flex items-center">
                <ChartBarIcon class="w-4 h-4 mr-1" />
                {{ item.investment_experience_years }}+ years exp.
            </div>
        </div>

        <!-- Status & Action -->
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div 
                    :class="[
                        'w-2 h-2 rounded-full',
                        getActivityStatusColor(item.last_active_at)
                    ]"
                ></div>
                <span class="text-sm text-gray-600 dark:text-gray-300">
                    {{ getActivityStatusLabel(item.last_active_at) }}
                </span>
            </div>

            <!-- Action Button -->
            <button class="inline-flex items-center px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                View Profile
                <ArrowRightIcon class="w-4 h-4 ml-1" />
            </button>
        </div>

        <!-- Mentorship Available -->
        <div v-if="item.mentorship_available" class="mt-4 p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
            <div class="flex items-center">
                <AcademicCapIcon class="w-5 h-5 text-blue-500 mr-2" />
                <span class="text-sm font-medium text-blue-800 dark:text-blue-200">
                    Offers Mentorship
                </span>
            </div>
        </div>
    </div>
</template>

<script setup>
import { 
    CheckCircleIcon, 
    MapPinIcon,
    ArrowRightIcon,
    ChartBarIcon,
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
    return focus.split(',').map(f => f.trim()).slice(0, 3)
}

const getActivityStatusColor = (lastActiveAt) => {
    if (!lastActiveAt) return 'bg-gray-400'
    
    const daysSince = Math.floor((new Date() - new Date(lastActiveAt)) / (1000 * 60 * 60 * 24))
    if (daysSince <= 7) return 'bg-green-400'
    if (daysSince <= 30) return 'bg-yellow-400'
    return 'bg-gray-400'
}

const getActivityStatusLabel = (lastActiveAt) => {
    if (!lastActiveAt) return 'Activity unknown'
    
    const daysSince = Math.floor((new Date() - new Date(lastActiveAt)) / (1000 * 60 * 60 * 24))
    if (daysSince <= 1) return 'Active today'
    if (daysSince <= 7) return 'Active this week'
    if (daysSince <= 30) return 'Active this month'
    return 'Less active'
}
</script>

<style scoped>
.investor-card {
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