<template>
    <div class="investment-trends-chart">
        <div v-if="!chartData.length" class="flex items-center justify-center h-64 text-gray-500">
            <div class="text-center">
                <ChartBarIcon class="w-12 h-12 mx-auto mb-4 text-gray-300" />
                <p>No investment trend data available</p>
            </div>
        </div>
        
        <div v-else class="space-y-4">
            <!-- Chart Type Toggle -->
            <div class="flex justify-between items-center">
                <div class="flex space-x-2">
                    <button 
                        @click="chartType = 'line'"
                        :class="[
                            'px-3 py-1 rounded-md text-sm font-medium transition-colors',
                            chartType === 'line' 
                                ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300' 
                                : 'text-gray-500 hover:text-gray-700 dark:text-gray-400'
                        ]"
                    >
                        Trend Line
                    </button>
                    <button 
                        @click="chartType = 'bar'"
                        :class="[
                            'px-3 py-1 rounded-md text-sm font-medium transition-colors',
                            chartType === 'bar' 
                                ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300' 
                                : 'text-gray-500 hover:text-gray-700 dark:text-gray-400'
                        ]"
                    >
                        Bar Chart
                    </button>
                </div>
                
                <div class="flex items-center space-x-4 text-sm">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                        <span class="text-gray-600 dark:text-gray-400">Investment Count</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded mr-2"></div>
                        <span class="text-gray-600 dark:text-gray-400">Total Amount</span>
                    </div>
                </div>
            </div>

            <!-- SVG Chart -->
            <div class="h-64 w-full relative">
                <svg class="w-full h-full" viewBox="0 0 800 240" preserveAspectRatio="xMidYMid meet">
                    <!-- Grid lines -->
                    <g class="grid-lines">
                        <line v-for="i in 5" :key="`h-${i}`"
                              :x1="60" :x2="740"
                              :y1="40 + (i - 1) * 40"
                              :y2="40 + (i - 1) * 40"
                              stroke="currentColor"
                              :class="'stroke-gray-200 dark:stroke-gray-700'"
                              stroke-width="1"
                        />
                    </g>

                    <!-- Y-axis labels -->
                    <g class="y-axis-labels">
                        <text v-for="(label, i) in yAxisLabels" :key="`y-${i}`"
                              :x="50" :y="45 + i * 40"
                              text-anchor="end"
                              class="text-xs fill-gray-500 dark:fill-gray-400"
                        >
                            {{ label }}
                        </text>
                    </g>

                    <!-- Chart content -->
                    <g v-if="chartType === 'line'">
                        <!-- Investment count line -->
                        <path
                            :d="investmentCountPath"
                            fill="none"
                            stroke="rgb(59 130 246)"
                            stroke-width="3"
                            class="drop-shadow-sm"
                        />
                        <!-- Data points -->
                        <circle v-for="(point, i) in chartPoints" :key="`count-${i}`"
                                :cx="point.x" :cy="point.countY"
                                r="4" fill="rgb(59 130 246)"
                                class="hover:r-6 transition-all cursor-pointer"
                                @mouseenter="showTooltip($event, chartData[i])"
                                @mouseleave="hideTooltip"
                        />

                        <!-- Total amount line (scaled) -->
                        <path
                            :d="totalAmountPath"
                            fill="none"
                            stroke="rgb(34 197 94)"
                            stroke-width="3"
                            stroke-dasharray="5,5"
                            class="drop-shadow-sm"
                        />
                        <!-- Data points -->
                        <circle v-for="(point, i) in chartPoints" :key="`amount-${i}`"
                                :cx="point.x" :cy="point.amountY"
                                r="4" fill="rgb(34 197 94)"
                                class="hover:r-6 transition-all cursor-pointer"
                                @mouseenter="showTooltip($event, chartData[i])"
                                @mouseleave="hideTooltip"
                        />
                    </g>

                    <g v-else>
                        <!-- Bar chart -->
                        <rect v-for="(point, i) in chartPoints" :key="`bar-${i}`"
                              :x="point.x - 15"
                              :y="point.countY"
                              :width="30"
                              :height="200 - point.countY"
                              fill="rgb(59 130 246)"
                              opacity="0.7"
                              class="hover:opacity-100 transition-all cursor-pointer"
                              @mouseenter="showTooltip($event, chartData[i])"
                              @mouseleave="hideTooltip"
                        />
                    </g>

                    <!-- X-axis labels -->
                    <g class="x-axis-labels">
                        <text v-for="(point, i) in chartPoints" :key="`x-${i}`"
                              :x="point.x" :y="230"
                              text-anchor="middle"
                              class="text-xs fill-gray-500 dark:fill-gray-400"
                        >
                            {{ formatPeriod(chartData[i].period) }}
                        </text>
                    </g>
                </svg>

                <!-- Tooltip -->
                <div
                    v-if="tooltip.show"
                    :style="{ left: tooltip.x + 'px', top: tooltip.y + 'px' }"
                    class="absolute z-10 bg-gray-900 text-white p-3 rounded-lg shadow-lg text-sm pointer-events-none"
                >
                    <div class="font-semibold">{{ formatPeriod(tooltip.data?.period) }}</div>
                    <div class="space-y-1 mt-1">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                            <span>{{ tooltip.data?.investment_count }} investments</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded mr-2"></div>
                            <span>{{ tooltip.data?.formatted_total }}</span>
                        </div>
                        <div class="text-gray-300 text-xs">
                            Avg: {{ tooltip.data?.formatted_average }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Stats -->
            <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="text-center">
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ totalInvestments }}
                    </div>
                    <div class="text-sm text-gray-500">Total Investments</div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ formatCurrency(totalAmount) }}
                    </div>
                    <div class="text-sm text-gray-500">Total Amount</div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ formatCurrency(averageAmount) }}
                    </div>
                    <div class="text-sm text-gray-500">Average Investment</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, ref, reactive } from 'vue'
import { ChartBarIcon } from '@heroicons/vue/24/outline'
import { formatCurrency } from '@/Utils/formatters'

const props = defineProps({
    data: {
        type: Array,
        default: () => []
    }
})

const chartType = ref('line')
const tooltip = reactive({
    show: false,
    x: 0,
    y: 0,
    data: null
})

const chartData = computed(() => props.data || [])

const maxCount = computed(() => {
    return Math.max(...chartData.value.map(d => d.investment_count), 1)
})

const maxAmount = computed(() => {
    return Math.max(...chartData.value.map(d => d.total_amount), 1)
})

const yAxisLabels = computed(() => {
    const max = maxCount.value
    return Array.from({ length: 5 }, (_, i) => Math.round(max - (i * max / 4)))
})

const chartPoints = computed(() => {
    if (!chartData.value.length) return []
    
    const width = 680 // 740 - 60 (margins)
    const height = 160 // 200 - 40 (margins)
    const stepX = width / (chartData.value.length - 1 || 1)
    
    return chartData.value.map((item, index) => {
        const x = 60 + (index * stepX)
        const countY = 40 + height - (item.investment_count / maxCount.value * height)
        const amountY = 40 + height - (item.total_amount / maxAmount.value * height)
        
        return { x, countY, amountY }
    })
})

const investmentCountPath = computed(() => {
    if (!chartPoints.value.length) return ''
    
    const points = chartPoints.value.map(p => `${p.x},${p.countY}`).join(' L ')
    return `M ${points}`
})

const totalAmountPath = computed(() => {
    if (!chartPoints.value.length) return ''
    
    const points = chartPoints.value.map(p => `${p.x},${p.amountY}`).join(' L ')
    return `M ${points}`
})

const totalInvestments = computed(() => {
    return chartData.value.reduce((sum, item) => sum + item.investment_count, 0)
})

const totalAmount = computed(() => {
    return chartData.value.reduce((sum, item) => sum + item.total_amount, 0)
})

const averageAmount = computed(() => {
    return totalInvestments.value > 0 ? totalAmount.value / totalInvestments.value : 0
})

const formatPeriod = (period) => {
    if (!period) return ''
    const [year, month] = period.split('-')
    const date = new Date(year, month - 1)
    return date.toLocaleDateString('en-US', { month: 'short', year: '2-digit' })
}

const showTooltip = (event, data) => {
    const rect = event.target.getBoundingClientRect()
    const container = event.target.closest('.investment-trends-chart').getBoundingClientRect()
    
    tooltip.show = true
    tooltip.x = rect.left - container.left + 10
    tooltip.y = rect.top - container.top - 10
    tooltip.data = data
}

const hideTooltip = () => {
    tooltip.show = false
}
</script>

<style scoped>
.investment-trends-chart {
    @apply relative;
}

.grid-lines {
    @apply opacity-50;
}

svg text {
    @apply select-none;
}

path {
    @apply transition-all duration-200;
}

circle {
    @apply transition-all duration-200;
}

rect {
    @apply transition-all duration-200;
}
</style>