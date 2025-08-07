<template>
  <div class="px-4 py-4 sm:px-6 hover:bg-gray-50 transition-colors duration-150">
    <div class="flex items-center justify-between">
      <div class="flex items-center min-w-0 flex-1">
        <!-- Startup Logo/Avatar -->
        <div class="flex-shrink-0">
          <img
            v-if="investment.startup?.logo"
            :src="investment.startup.logo"
            :alt="investment.startup.title"
            class="h-12 w-12 rounded-full object-cover"
          >
          <div
            v-else
            class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center"
          >
            <span class="text-lg font-medium text-gray-700">
              {{ investment.startup?.title?.charAt(0) }}
            </span>
          </div>
        </div>

        <!-- Investment Info -->
        <div class="ml-4 min-w-0 flex-1">
          <div class="flex items-center space-x-2 mb-1">
            <p class="text-sm font-medium text-gray-900 truncate">
              {{ investment.startup?.title }}
            </p>
            <span
              :class="[
                'inline-flex px-2 py-0.5 text-xs font-medium rounded-full',
                investment.status?.color === 'success' ? 'bg-green-100 text-green-800' :
                investment.status?.color === 'warning' ? 'bg-yellow-100 text-yellow-800' :
                investment.status?.color === 'danger' ? 'bg-red-100 text-red-800' :
                investment.status?.color === 'info' ? 'bg-blue-100 text-blue-800' :
                'bg-gray-100 text-gray-800'
              ]"
            >
              {{ investment.status?.label }}
            </span>
          </div>
          
          <div class="flex items-center space-x-4 text-sm text-gray-500">
            <span class="flex items-center">
              <CurrencyDollarIcon class="h-4 w-4 mr-1" />
              {{ investment.amount?.formatted }}
            </span>
            <span v-if="investment.equity_percentage" class="flex items-center">
              <ChartPieIcon class="h-4 w-4 mr-1" />
              {{ investment.equity_percentage }}% equity
            </span>
            <span class="flex items-center">
              <CalendarIcon class="h-4 w-4 mr-1" />
              {{ investment.dates?.invested_at_formatted }}
            </span>
          </div>
        </div>
      </div>

      <!-- Performance Metrics -->
      <div class="flex items-center space-x-6 ml-4">
        <div class="text-right">
          <div class="text-sm font-medium text-gray-900">
            ROI: 
            <span 
              :class="investment.returns?.actual_roi >= 0 ? 'text-green-600' : 'text-red-600'"
            >
              {{ investment.returns?.actual_roi?.toFixed(1) ?? '0.0' }}%
            </span>
          </div>
          <div class="text-sm text-gray-500">
            P/L: {{ investment.returns?.profit_loss_formatted }}
          </div>
        </div>

        <!-- Performance Score -->
        <div class="flex-shrink-0">
          <div class="relative w-16 h-16">
            <svg class="w-16 h-16 transform -rotate-90" viewBox="0 0 100 100">
              <circle
                cx="50"
                cy="50"
                r="45"
                stroke="#e5e7eb"
                stroke-width="8"
                fill="none"
              />
              <circle
                cx="50"
                cy="50"
                r="45"
                :stroke="getPerformanceColor(investment.performance?.score)"
                stroke-width="8"
                fill="none"
                stroke-linecap="round"
                :stroke-dasharray="circumference"
                :stroke-dashoffset="circumference - (investment.performance?.score / 100) * circumference"
                class="transition-all duration-300"
              />
            </svg>
            <div class="absolute inset-0 flex items-center justify-center">
              <span class="text-xs font-medium text-gray-900">
                {{ Math.round(investment.performance?.score || 0) }}
              </span>
            </div>
          </div>
        </div>

        <!-- Action Menu -->
        <div class="flex-shrink-0">
          <Menu as="div" class="relative inline-block text-left">
            <div>
              <MenuButton class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                <EllipsisVerticalIcon class="h-5 w-5" />
              </MenuButton>
            </div>

            <transition
              enter-active-class="transition duration-100 ease-out"
              enter-from-class="transform scale-95 opacity-0"
              enter-to-class="transform scale-100 opacity-100"
              leave-active-class="transition duration-75 ease-in"
              leave-from-class="transform scale-100 opacity-100"
              leave-to-class="transform scale-95 opacity-0"
            >
              <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                <MenuItem v-slot="{ active }">
                  <button
                    @click="$emit('view', investment)"
                    :class="[
                      active ? 'bg-gray-100' : '',
                      'flex w-full px-4 py-2 text-left text-sm text-gray-700'
                    ]"
                  >
                    <EyeIcon class="h-4 w-4 mr-2" />
                    View Details
                  </button>
                </MenuItem>
                
                <MenuItem v-if="investment.permissions?.can_edit" v-slot="{ active }">
                  <button
                    @click="$emit('edit', investment)"
                    :class="[
                      active ? 'bg-gray-100' : '',
                      'flex w-full px-4 py-2 text-left text-sm text-gray-700'
                    ]"
                  >
                    <PencilIcon class="h-4 w-4 mr-2" />
                    Edit Investment
                  </button>
                </MenuItem>

                <MenuItem v-if="investment.status_flags?.can_exit" v-slot="{ active }">
                  <button
                    @click="$emit('exit', investment)"
                    :class="[
                      active ? 'bg-gray-100' : '',
                      'flex w-full px-4 py-2 text-left text-sm text-gray-700'
                    ]"
                  >
                    <ArrowRightOnRectangleIcon class="h-4 w-4 mr-2" />
                    Record Exit
                  </button>
                </MenuItem>

                <MenuItem v-if="investment.permissions?.can_delete" v-slot="{ active }">
                  <button
                    @click="$emit('delete', investment)"
                    :class="[
                      active ? 'bg-gray-100' : '',
                      'flex w-full px-4 py-2 text-left text-sm text-red-600'
                    ]"
                  >
                    <TrashIcon class="h-4 w-4 mr-2" />
                    Delete Investment
                  </button>
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>
        </div>
      </div>
    </div>

    <!-- Additional Info (collapsible) -->
    <div v-if="showDetails" class="mt-4 pt-4 border-t border-gray-200">
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
          <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Investment Stage</h4>
          <p class="mt-1 text-sm text-gray-900">
            {{ investment.investment_stage?.name }}
          </p>
        </div>
        <div v-if="investment.performance?.duration_days">
          <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Duration</h4>
          <p class="mt-1 text-sm text-gray-900">
            {{ formatDuration(investment.performance.duration_days) }}
          </p>
        </div>
        <div v-if="investment.returns?.expected_roi">
          <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Expected ROI</h4>
          <p class="mt-1 text-sm text-gray-900">
            {{ investment.returns.expected_roi.toFixed(1) }}%
          </p>
        </div>
      </div>

      <div v-if="investment.metadata?.notes" class="mt-3">
        <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Notes</h4>
        <p class="text-sm text-gray-600 line-clamp-2">
          {{ investment.metadata.notes }}
        </p>
      </div>
    </div>

    <!-- Toggle Details Button -->
    <div class="mt-3 flex justify-center">
      <button
        @click="showDetails = !showDetails"
        class="text-xs text-gray-400 hover:text-gray-600 focus:outline-none"
      >
        <ChevronDownIcon
          :class="['h-4 w-4 transition-transform duration-200', showDetails ? 'rotate-180' : '']"
        />
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import {
  CurrencyDollarIcon,
  ChartPieIcon,
  CalendarIcon,
  EllipsisVerticalIcon,
  EyeIcon,
  PencilIcon,
  ArrowRightOnRectangleIcon,
  TrashIcon,
  ChevronDownIcon
} from '@heroicons/vue/24/outline'

const props = defineProps({
  investment: {
    type: Object,
    required: true
  }
})

defineEmits(['view', 'edit', 'exit', 'delete'])

const showDetails = ref(false)

const circumference = computed(() => {
  return 2 * Math.PI * 45 // radius is 45
})

const getPerformanceColor = (score) => {
  if (score >= 80) return '#10b981' // green
  if (score >= 60) return '#f59e0b' // yellow
  if (score >= 40) return '#f97316' // orange
  return '#ef4444' // red
}

const formatDuration = (days) => {
  if (days < 30) {
    return `${days} days`
  } else if (days < 365) {
    const months = Math.floor(days / 30)
    return `${months} month${months !== 1 ? 's' : ''}`
  } else {
    const years = Math.floor(days / 365)
    const remainingMonths = Math.floor((days % 365) / 30)
    if (remainingMonths === 0) {
      return `${years} year${years !== 1 ? 's' : ''}`
    }
    return `${years}y ${remainingMonths}m`
  }
}
</script>