<template>
  <AppLayout>
    <div class="min-h-screen bg-gray-50 py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="md:flex md:items-center md:justify-between mb-8">
          <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
              Investment Dashboard
            </h2>
            <p class="mt-1 text-sm text-gray-500">
              Monitor your investment portfolio and performance
            </p>
          </div>
          <div class="mt-4 flex md:mt-0 md:ml-4">
            <button
              @click="showCreateModal = true"
              class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
              <PlusIcon class="-ml-1 mr-2 h-5 w-5" />
              New Investment
            </button>
          </div>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
          <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                  <ChartBarIcon class="h-8 w-8 text-gray-400" />
                </div>
                <div class="ml-5 w-0 flex-1">
                  <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">
                      Total Investments
                    </dt>
                    <dd class="text-lg font-medium text-gray-900">
                      {{ dashboardData.total_investments }}
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                  <CurrencyDollarIcon class="h-8 w-8 text-gray-400" />
                </div>
                <div class="ml-5 w-0 flex-1">
                  <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">
                      Total Invested
                    </dt>
                    <dd class="text-lg font-medium text-gray-900">
                      {{ formatCurrency(dashboardData.total_invested) }}
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                  <ArrowTrendingUpIcon class="h-8 w-8 text-gray-400" />
                </div>
                <div class="ml-5 w-0 flex-1">
                  <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">
                      Average ROI
                    </dt>
                    <dd class="text-lg font-medium text-gray-900">
                      {{ dashboardData.average_roi?.toFixed(1) ?? '0.0' }}%
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
              <div class="flex items-center">
                <div class="flex-shrink-0">
                  <CheckCircleIcon class="h-8 w-8 text-gray-400" />
                </div>
                <div class="ml-5 w-0 flex-1">
                  <dl>
                    <dt class="text-sm font-medium text-gray-500 truncate">
                      Active Investments
                    </dt>
                    <dd class="text-lg font-medium text-gray-900">
                      {{ dashboardData.active_investments }}
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
          <!-- Portfolio Performance Chart -->
          <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">Portfolio Performance</h3>
              <div class="h-64">
                <canvas ref="performanceChart"></canvas>
              </div>
            </div>
          </div>

          <!-- Investment Distribution -->
          <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
              <h3 class="text-lg font-medium text-gray-900 mb-4">Investment by Stage</h3>
              <div class="h-64">
                <canvas ref="distributionChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Investments -->
        <div class="bg-white shadow overflow-hidden sm:rounded-md mb-8">
          <div class="px-4 py-5 sm:px-6">
            <div class="flex items-center justify-between">
              <h3 class="text-lg font-medium text-gray-900">Recent Investments</h3>
              <router-link
                :to="{ name: 'investments.index' }"
                class="text-sm font-medium text-indigo-600 hover:text-indigo-500"
              >
                View all
              </router-link>
            </div>
          </div>
          <ul class="divide-y divide-gray-200">
            <li v-for="investment in dashboardData.recent_investments" :key="investment.id">
              <div class="px-4 py-4 sm:px-6 hover:bg-gray-50">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <img
                        v-if="investment.startup?.logo"
                        :src="investment.startup.logo"
                        :alt="investment.startup.title"
                        class="h-10 w-10 rounded-full"
                      >
                      <div
                        v-else
                        class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center"
                      >
                        <span class="text-sm font-medium text-gray-700">
                          {{ investment.startup?.title?.charAt(0) }}
                        </span>
                      </div>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ investment.startup?.title }}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{ formatCurrency(investment.amount?.value) }} • 
                        {{ investment.dates?.invested_at_formatted }}
                      </div>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <span
                      :class="[
                        'inline-flex px-2 py-1 text-xs font-semibold rounded-full',
                        investment.status?.color === 'success' ? 'bg-green-100 text-green-800' :
                        investment.status?.color === 'warning' ? 'bg-yellow-100 text-yellow-800' :
                        investment.status?.color === 'danger' ? 'bg-red-100 text-red-800' :
                        'bg-gray-100 text-gray-800'
                      ]"
                    >
                      {{ investment.status?.label }}
                    </span>
                    <ChevronRightIcon class="ml-2 h-5 w-5 text-gray-400" />
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>

        <!-- Investment Opportunities -->
        <div class="bg-white shadow rounded-lg">
          <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium text-gray-900">Investment Opportunities</h3>
            <p class="mt-1 text-sm text-gray-500">
              Discover new startups looking for investment
            </p>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <div class="text-center">
              <LightBulbIcon class="mx-auto h-12 w-12 text-gray-400" />
              <h3 class="mt-2 text-sm font-medium text-gray-900">Coming Soon</h3>
              <p class="mt-1 text-sm text-gray-500">
                AI-powered investment recommendations will be available soon.
              </p>
            </div>
          </div>
        </div>

        <!-- Create Investment Modal -->
        <InvestmentModal
          v-model="showCreateModal"
          @created="handleInvestmentCreated"
        />
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import {
  PlusIcon,
  ChartBarIcon,
  CurrencyDollarIcon,
  ArrowTrendingUpIcon,
  CheckCircleIcon,
  ChevronRightIcon,
  LightBulbIcon
} from '@heroicons/vue/24/outline'
import Chart from 'chart.js/auto'
import AppLayout from '@/Layouts/App.vue'
import InvestmentModal from '@/Components/Investment/InvestmentModal.vue'
import { useInvestment } from '@/Composables/useInvestment'
import { formatCurrency } from '@/Composables/helpers'

const { getDashboardData, loading } = useInvestment()

const showCreateModal = ref(false)
const performanceChart = ref(null)
const distributionChart = ref(null)
const dashboardData = ref({
  total_investments: 0,
  total_invested: 0,
  active_investments: 0,
  average_roi: 0,
  recent_investments: [],
  investment_by_stage: [],
  monthly_investment_trend: []
})

onMounted(async () => {
  await loadDashboardData()
  initializeCharts()
})

const loadDashboardData = async () => {
  try {
    const data = await getDashboardData()
    dashboardData.value = data
  } catch (error) {
    console.error('Failed to load dashboard data:', error)
  }
}

const initializeCharts = () => {
  // Performance Chart
  if (performanceChart.value) {
    new Chart(performanceChart.value, {
      type: 'line',
      data: {
        labels: dashboardData.value.monthly_investment_trend?.map(item => item.period) || [],
        datasets: [{
          label: 'Investment Amount',
          data: dashboardData.value.monthly_investment_trend?.map(item => item.total_amount) || [],
          borderColor: 'rgb(79, 70, 229)',
          backgroundColor: 'rgba(79, 70, 229, 0.1)',
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value) {
                return formatCurrency(value)
              }
            }
          }
        }
      }
    })
  }

  // Distribution Chart
  if (distributionChart.value) {
    new Chart(distributionChart.value, {
      type: 'doughnut',
      data: {
        labels: dashboardData.value.investment_by_stage?.map(item => item.stage) || [],
        datasets: [{
          data: dashboardData.value.investment_by_stage?.map(item => item.total_amount) || [],
          backgroundColor: [
            'rgb(79, 70, 229)',
            'rgb(16, 185, 129)',
            'rgb(245, 158, 11)',
            'rgb(239, 68, 68)',
            'rgb(139, 92, 246)'
          ]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    })
  }
}

const handleInvestmentCreated = (investment) => {
  showCreateModal.value = false
  loadDashboardData() // Refresh dashboard data
  router.visit(route('investments.show', investment.id))
}
</script>