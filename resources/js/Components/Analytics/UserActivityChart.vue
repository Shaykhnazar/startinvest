<template>
    <div class="user-activity-chart">
        <div v-if="!hasData" class="flex items-center justify-center h-48 text-gray-500">
            <div class="text-center">
                <UsersIcon class="w-12 h-12 mx-auto mb-4 text-gray-300" />
                <p>No user activity data available</p>
            </div>
        </div>

        <div v-else class="space-y-4">
            <!-- Activity Summary -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="text-center p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <div class="text-xl font-bold text-blue-600 dark:text-blue-400">
                        {{ data.new_users }}
                    </div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">New Users</div>
                </div>
                <div class="text-center p-3 bg-green-50 dark:bg-green-900/20 rounded-lg">
                    <div class="text-xl font-bold text-green-600 dark:text-green-400">
                        {{ data.new_investors }}
                    </div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">New Investors</div>
                </div>
                <div class="text-center p-3 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                    <div class="text-xl font-bold text-purple-600 dark:text-purple-400">
                        {{ data.new_startups }}
                    </div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">New Startups</div>
                </div>
                <div class="text-center p-3 bg-orange-50 dark:bg-orange-900/20 rounded-lg">
                    <div class="text-xl font-bold text-orange-600 dark:text-orange-400">
                        {{ data.active_users }}
                    </div>
                    <div class="text-xs text-gray-600 dark:text-gray-400">Active Users</div>
                </div>
            </div>

            <!-- Daily Activity Chart -->
            <div v-if="dailyActivity.length" class="h-48">
                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                    Daily Activity (Last 30 Days)
                </h4>
                
                <svg class="w-full h-full" viewBox="0 0 800 160" preserveAspectRatio="xMidYMid meet">
                    <!-- Grid -->
                    <g class="grid">
                        <line v-for="i in 4" :key="`grid-${i}`"
                              :x1="40" :x2="760"
                              :y1="20 + (i - 1) * 30"
                              :y2="20 + (i - 1) * 30"
                              stroke="currentColor"
                              class="stroke-gray-200 dark:stroke-gray-700"
                              stroke-width="1"
                              opacity="0.5"
                        />
                    </g>

                    <!-- Activity bars -->
                    <g class="activity-bars">
                        <rect v-for="(point, i) in activityPoints" :key="`bar-${i}`"
                              :x="point.x - 2"
                              :y="point.y"
                              :width="4"
                              :height="140 - point.y"
                              :fill="getBarColor(point.value, maxDailyActivity)"
                              class="hover:opacity-80 transition-opacity cursor-pointer"
                              @mouseenter="showActivityTooltip($event, dailyActivity[i])"
                              @mouseleave="hideTooltip"
                        />
                    </g>

                    <!-- X-axis (simplified - show only some dates) -->
                    <g class="x-axis">
                        <text v-for="(point, i) in activityPoints.filter((_, idx) => idx % 5 === 0)" 
                              :key="`x-${i}`"
                              :x="point.x" :y="155"
                              text-anchor="middle"
                              class="text-xs fill-gray-500 dark:fill-gray-400"
                        >
                            {{ formatDate(dailyActivity[activityPoints.findIndex(p => p.x === point.x)].date) }}
                        </text>
                    </g>
                </svg>

                <!-- Activity Tooltip -->
                <div
                    v-if="activityTooltip.show"
                    :style="{ left: activityTooltip.x + 'px', top: activityTooltip.y + 'px' }"
                    class="absolute z-10 bg-gray-900 text-white p-2 rounded shadow-lg text-xs pointer-events-none"
                >
                    <div class="font-semibold">{{ formatDate(activityTooltip.data?.date) }}</div>
                    <div>{{ activityTooltip.data?.investments }} investments</div>
                    <div>{{ activityTooltip.data?.formatted_volume }}</div>
                </div>
            </div>

            <!-- Retention Metrics -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            User Retention Rate
                        </div>
                        <div class="text-xs text-gray-500">
                            Percentage of new users active in the last week
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                            {{ Math.round(data.user_retention) }}%
                        </div>
                        <div 
                            class="h-2 w-16 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden"
                        >
                            <div 
                                class="h-full bg-blue-500 transition-all duration-500"
                                :style="{ width: `${Math.min(data.user_retention, 100)}%` }"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, ref, reactive } from 'vue'
import { UsersIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
    data: {
        type: Object,
        required: true
    }
})

const activityTooltip = reactive({
    show: false,
    x: 0,
    y: 0,
    data: null
})

const hasData = computed(() => {
    return props.data && Object.keys(props.data).length > 0
})

const dailyActivity = computed(() => {
    return props.data?.daily_activity || []
})

const maxDailyActivity = computed(() => {
    return Math.max(...dailyActivity.value.map(d => d.investments), 1)
})

const activityPoints = computed(() => {
    if (!dailyActivity.value.length) return []
    
    const width = 720 // 760 - 40 (margins)
    const height = 120 // 140 - 20 (margins)
    const stepX = width / (dailyActivity.value.length - 1 || 1)
    
    return dailyActivity.value.map((item, index) => {
        const x = 40 + (index * stepX)
        const y = 20 + height - (item.investments / maxDailyActivity.value * height)
        
        return { x, y, value: item.investments }
    })
})

const getBarColor = (value, max) => {
    const intensity = value / max
    if (intensity > 0.8) return 'rgb(239 68 68)' // red-500
    if (intensity > 0.6) return 'rgb(245 101 101)' // red-400
    if (intensity > 0.4) return 'rgb(251 146 60)' // orange-400
    if (intensity > 0.2) return 'rgb(34 197 94)' // green-500
    return 'rgb(59 130 246)' // blue-500
}

const formatDate = (dateString) => {
    if (!dateString) return ''
    const date = new Date(dateString)
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' })
}

const showActivityTooltip = (event, data) => {
    const rect = event.target.getBoundingClientRect()
    const container = event.target.closest('.user-activity-chart').getBoundingClientRect()
    
    activityTooltip.show = true
    activityTooltip.x = rect.left - container.left + 10
    activityTooltip.y = rect.top - container.top - 10
    activityTooltip.data = data
}

const hideTooltip = () => {
    activityTooltip.show = false
}
</script>

<style scoped>
.user-activity-chart {
    @apply relative;
}

svg text {
    @apply select-none;
}

.activity-bars rect {
    @apply transition-all duration-200;
}

.grid {
    @apply opacity-50;
}
</style>