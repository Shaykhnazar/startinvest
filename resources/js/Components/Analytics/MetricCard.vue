<template>
    <div class="metric-card" :class="cardClasses">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="metric-icon" :class="iconClasses">
                    <component :is="iconComponent" class="w-6 h-6" />
                </div>
            </div>
            <div class="ml-4 flex-1">
                <div class="metric-value" :class="valueClasses">
                    {{ value }}
                </div>
                <div class="metric-label">
                    {{ label }}
                </div>
            </div>
        </div>
        
        <!-- Trend indicator -->
        <div v-if="trend" class="mt-3 flex items-center">
            <component 
                :is="trend.direction === 'up' ? ArrowTrendingUpIcon : ArrowTrendingDownIcon" 
                class="w-4 h-4 mr-1"
                :class="trend.direction === 'up' ? 'text-green-500' : 'text-red-500'"
            />
            <span 
                class="text-sm font-medium"
                :class="trend.direction === 'up' ? 'text-green-600' : 'text-red-600'"
            >
                {{ Math.abs(trend.percentage) }}%
            </span>
            <span class="text-sm text-gray-500 ml-1">
                vs last {{ trend.period }}
            </span>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import {
    UsersIcon,
    TrendingUpIcon,
    CurrencyDollarIcon,
    TargetIcon,
    ChartBarIcon,
    BuildingOffice2Icon,
    ArrowTrendingUpIcon,
    ArrowTrendingDownIcon
} from '@heroicons/vue/24/outline'

const props = defineProps({
    value: {
        type: [String, Number],
        required: true
    },
    label: {
        type: String,
        required: true
    },
    icon: {
        type: String,
        default: 'chart-bar'
    },
    color: {
        type: String,
        default: 'blue'
    },
    trend: {
        type: Object,
        default: null
    }
})

const iconComponents = {
    'users': UsersIcon,
    'trending-up': TrendingUpIcon,
    'dollar-sign': CurrencyDollarIcon,
    'target': TargetIcon,
    'chart-bar': ChartBarIcon,
    'building': BuildingOffice2Icon
}

const iconComponent = computed(() => {
    return iconComponents[props.icon] || ChartBarIcon
})

const colorClasses = {
    blue: {
        card: 'border-blue-200 dark:border-blue-800',
        icon: 'bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-400',
        value: 'text-blue-600 dark:text-blue-400'
    },
    green: {
        card: 'border-green-200 dark:border-green-800',
        icon: 'bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-400',
        value: 'text-green-600 dark:text-green-400'
    },
    purple: {
        card: 'border-purple-200 dark:border-purple-800',
        icon: 'bg-purple-100 text-purple-600 dark:bg-purple-900 dark:text-purple-400',
        value: 'text-purple-600 dark:text-purple-400'
    },
    orange: {
        card: 'border-orange-200 dark:border-orange-800',
        icon: 'bg-orange-100 text-orange-600 dark:bg-orange-900 dark:text-orange-400',
        value: 'text-orange-600 dark:text-orange-400'
    },
    red: {
        card: 'border-red-200 dark:border-red-800',
        icon: 'bg-red-100 text-red-600 dark:bg-red-900 dark:text-red-400',
        value: 'text-red-600 dark:text-red-400'
    }
}

const cardClasses = computed(() => [
    'bg-white dark:bg-gray-800 rounded-lg shadow-sm border p-6 hover:shadow-md transition-shadow',
    colorClasses[props.color]?.card || colorClasses.blue.card
])

const iconClasses = computed(() => [
    'w-12 h-12 rounded-lg flex items-center justify-center',
    colorClasses[props.color]?.icon || colorClasses.blue.icon
])

const valueClasses = computed(() => [
    'text-2xl font-bold',
    colorClasses[props.color]?.value || colorClasses.blue.value
])
</script>

<style scoped>
.metric-card {
    @apply transition-all duration-200;
}

.metric-card:hover {
    @apply transform scale-105;
}

.metric-value {
    @apply leading-none;
}

.metric-label {
    @apply text-sm text-gray-600 dark:text-gray-400 mt-1;
}

.metric-icon {
    @apply transition-colors duration-200;
}
</style>