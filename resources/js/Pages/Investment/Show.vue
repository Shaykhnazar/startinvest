<template>
  <AppLayout>
    <div class="min-h-screen bg-gray-50 py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="md:flex md:items-center md:justify-between mb-8">
          <div class="flex-1 min-w-0">
            <nav class="flex" aria-label="Breadcrumb">
              <ol class="flex items-center space-x-4">
                <li>
                  <div>
                    <router-link :to="{ name: 'investments.index' }" class="text-gray-400 hover:text-gray-500">
                      <HomeIcon class="flex-shrink-0 h-5 w-5" />
                      <span class="sr-only">Home</span>
                    </router-link>
                  </div>
                </li>
                <li>
                  <div class="flex items-center">
                    <ChevronRightIcon class="flex-shrink-0 h-5 w-5 text-gray-400" />
                    <router-link
                      :to="{ name: 'investments.index' }"
                      class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                    >
                      Investments
                    </router-link>
                  </div>
                </li>
                <li>
                  <div class="flex items-center">
                    <ChevronRightIcon class="flex-shrink-0 h-5 w-5 text-gray-400" />
                    <span class="ml-4 text-sm font-medium text-gray-500">
                      {{ investment.startup?.title }}
                    </span>
                  </div>
                </li>
              </ol>
            </nav>
            <div class="mt-2 flex items-center space-x-4">
              <h1 class="text-2xl font-bold text-gray-900">
                {{ investment.startup?.title }}
              </h1>
              <span
                :class="[
                  'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium',
                  investment.status?.color === 'success' ? 'bg-green-100 text-green-800' :
                  investment.status?.color === 'warning' ? 'bg-yellow-100 text-yellow-800' :
                  investment.status?.color === 'danger' ? 'bg-red-100 text-red-800' :
                  'bg-gray-100 text-gray-800'
                ]"
              >
                {{ investment.status?.label }}
              </span>
            </div>
          </div>
          <div class="mt-4 flex space-x-3 md:mt-0 md:ml-4">
            <button
              v-if="canEdit"
              @click="showEditModal = true"
              class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50"
            >
              <PencilIcon class="-ml-1 mr-2 h-5 w-5" />
              Edit
            </button>
            <button
              v-if="investment.status_flags?.can_exit"
              @click="showExitModal = true"
              class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700"
            >
              <ArrowRightOnRectangleIcon class="-ml-1 mr-2 h-5 w-5" />
              Record Exit
            </button>
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <!-- Main Content -->
          <div class="lg:col-span-2 space-y-6">
            <!-- Investment Overview -->
            <div class="bg-white shadow rounded-lg">
              <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Investment Overview</h3>
                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                  <div>
                    <dt class="text-sm font-medium text-gray-500">Investment Amount</dt>
                    <dd class="mt-1 text-2xl font-semibold text-gray-900">
                      {{ investment.amount?.formatted }}
                    </dd>
                  </div>
                  <div v-if="investment.equity_percentage">
                    <dt class="text-sm font-medium text-gray-500">Equity Percentage</dt>
                    <dd class="mt-1 text-2xl font-semibold text-gray-900">
                      {{ investment.equity_percentage }}%
                    </dd>
                  </div>
                  <div>
                    <dt class="text-sm font-medium text-gray-500">Investment Stage</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                      {{ investment.investment_stage?.name }}
                    </dd>
                  </div>
                  <div>
                    <dt class="text-sm font-medium text-gray-500">Investment Date</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                      {{ investment.dates?.invested_at_formatted }}
                    </dd>
                  </div>
                </dl>
              </div>
            </div>

            <!-- Performance Metrics -->
            <div class="bg-white shadow rounded-lg">
              <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Performance Metrics</h3>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                  <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-sm font-medium text-gray-500">Current ROI</dt>
                    <dd class="mt-1 text-lg font-semibold text-gray-900">
                      <span :class="investment.returns?.actual_roi >= 0 ? 'text-green-600' : 'text-red-600'">
                        {{ investment.returns?.actual_roi?.toFixed(1) ?? '0.0' }}%
                      </span>
                    </dd>
                  </div>
                  <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-sm font-medium text-gray-500">Expected ROI</dt>
                    <dd class="mt-1 text-lg font-semibold text-gray-900">
                      {{ investment.returns?.expected_roi?.toFixed(1) ?? 'N/A' }}%
                    </dd>
                  </div>
                  <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-sm font-medium text-gray-500">Profit/Loss</dt>
                    <dd class="mt-1 text-lg font-semibold">
                      <span :class="investment.returns?.profit_loss >= 0 ? 'text-green-600' : 'text-red-600'">
                        {{ investment.returns?.profit_loss_formatted }}
                      </span>
                    </dd>
                  </div>
                </div>

                <!-- Performance Chart -->
                <div class="mt-6">
                  <h4 class="text-sm font-medium text-gray-900 mb-3">Investment Performance</h4>
                  <div class="h-64">
                    <canvas ref="performanceChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Investment Updates -->
            <div class="bg-white shadow rounded-lg">
              <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center justify-between mb-4">
                  <h3 class="text-lg font-medium text-gray-900">Investment Updates</h3>
                  <button
                    v-if="canEdit"
                    @click="showUpdateModal = true"
                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500"
                  >
                    Add Update
                  </button>
                </div>

                <div v-if="investment.updates?.length > 0" class="flow-root">
                  <ul class="-mb-8">
                    <li v-for="(update, index) in investment.updates" :key="update.id">
                      <div class="relative pb-8">
                        <span
                          v-if="index !== investment.updates.length - 1"
                          class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                        />
                        <div class="relative flex space-x-3">
                          <div>
                            <span
                              :class="[
                                'h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white',
                                update.flags?.is_milestone ? 'bg-yellow-500' :
                                update.update_type?.color === 'success' ? 'bg-green-500' :
                                update.update_type?.color === 'danger' ? 'bg-red-500' :
                                'bg-gray-400'
                              ]"
                            >
                              <CheckIcon v-if="update.flags?.is_milestone" class="h-5 w-5 text-white" />
                              <InformationCircleIcon v-else class="h-5 w-5 text-white" />
                            </span>
                          </div>
                          <div class="flex-1 min-w-0">
                            <div>
                              <div class="text-sm">
                                <span class="font-medium text-gray-900">
                                  {{ update.title }}
                                </span>
                                <span
                                  :class="[
                                    'ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium',
                                    update.update_type?.color === 'success' ? 'bg-green-100 text-green-800' :
                                    update.update_type?.color === 'danger' ? 'bg-red-100 text-red-800' :
                                    'bg-gray-100 text-gray-800'
                                  ]"
                                >
                                  {{ update.update_type?.label }}
                                </span>
                              </div>
                              <p class="mt-0.5 text-sm text-gray-500">
                                {{ update.dates?.time_ago }}
                              </p>
                            </div>
                            <div class="mt-2 text-sm text-gray-700">
                              <p>{{ update.content_excerpt }}</p>
                              <div v-if="update.financial?.has_financial_impact" class="mt-2">
                                <span class="text-sm font-medium">Financial Impact: </span>
                                <span
                                  :class="update.financial.impact_type === 'positive' ? 'text-green-600' : 'text-red-600'"
                                >
                                  {{ update.financial.impact_formatted }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>

                <div v-else class="text-center py-8">
                  <InformationCircleIcon class="mx-auto h-12 w-12 text-gray-400" />
                  <h3 class="mt-2 text-sm font-medium text-gray-900">No updates yet</h3>
                  <p class="mt-1 text-sm text-gray-500">
                    Investment updates will appear here as they become available.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Sidebar -->
          <div class="space-y-6">
            <!-- Startup Info -->
            <div class="bg-white shadow rounded-lg">
              <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Startup Information</h3>
                <div class="space-y-3">
                  <div class="flex items-center space-x-3">
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
                    <div>
                      <p class="text-sm font-medium text-gray-900">
                        {{ investment.startup?.title }}
                      </p>
                      <p class="text-sm text-gray-500">
                        {{ investment.startup?.type }}
                      </p>
                    </div>
                  </div>
                  <div v-if="investment.startup?.description" class="text-sm text-gray-600">
                    {{ investment.startup.description }}
                  </div>
                  <div v-if="investment.startup?.industries?.length" class="flex flex-wrap gap-2">
                    <span
                      v-for="industry in investment.startup.industries"
                      :key="industry.id"
                      class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800"
                    >
                      {{ industry.name }}
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Investment Status -->
            <div class="bg-white shadow rounded-lg">
              <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Investment Status</h3>
                <div class="space-y-3">
                  <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Due Diligence</span>
                    <CheckCircleIcon
                      :class="[
                        'h-5 w-5',
                        investment.status_flags?.due_diligence_completed ? 'text-green-500' : 'text-gray-300'
                      ]"
                    />
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Contract Signed</span>
                    <CheckCircleIcon
                      :class="[
                        'h-5 w-5',
                        investment.status_flags?.contract_signed ? 'text-green-500' : 'text-gray-300'
                      ]"
                    />
                  </div>
                  <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">Payment Confirmed</span>
                    <CheckCircleIcon
                      :class="[
                        'h-5 w-5',
                        investment.status_flags?.payment_confirmed ? 'text-green-500' : 'text-gray-300'
                      ]"
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- Documents -->
            <div class="bg-white shadow rounded-lg">
              <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center justify-between mb-4">
                  <h3 class="text-lg font-medium text-gray-900">Documents</h3>
                  <button
                    v-if="canEdit"
                    @click="showDocumentModal = true"
                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500"
                  >
                    Upload
                  </button>
                </div>

                <div v-if="investment.documents?.length > 0" class="space-y-3">
                  <div
                    v-for="document in investment.documents"
                    :key="document.id"
                    class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50"
                  >
                    <DocumentIcon class="h-8 w-8 text-gray-400" />
                    <div class="flex-1 min-w-0">
                      <p class="text-sm font-medium text-gray-900 truncate">
                        {{ document.title }}
                      </p>
                      <p class="text-sm text-gray-500">
                        {{ document.file?.size_formatted }} • {{ document.dates?.created_at_formatted }}
                      </p>
                    </div>
                    <button
                      v-if="document.permissions?.can_download"
                      class="text-indigo-600 hover:text-indigo-900"
                    >
                      <ArrowDownTrayIcon class="h-5 w-5" />
                    </button>
                  </div>
                </div>

                <div v-else class="text-center py-6">
                  <DocumentIcon class="mx-auto h-12 w-12 text-gray-400" />
                  <h3 class="mt-2 text-sm font-medium text-gray-900">No documents</h3>
                  <p class="mt-1 text-sm text-gray-500">
                    Investment documents will appear here.
                  </p>
                </div>
              </div>
            </div>

            <!-- Related Investments -->
            <div v-if="relatedInvestments?.length > 0" class="bg-white shadow rounded-lg">
              <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Related Investments</h3>
                <div class="space-y-3">
                  <div
                    v-for="related in relatedInvestments"
                    :key="related.id"
                    class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded"
                  >
                    <div class="flex-1 min-w-0">
                      <p class="text-sm font-medium text-gray-900">
                        {{ related.investor?.name }}
                      </p>
                      <p class="text-sm text-gray-500">
                        {{ related.amount?.formatted }} • {{ related.dates?.invested_at_formatted }}
                      </p>
                    </div>
                    <span
                      :class="[
                        'inline-flex px-2 py-1 text-xs font-semibold rounded-full',
                        related.status?.color === 'success' ? 'bg-green-100 text-green-800' :
                        related.status?.color === 'warning' ? 'bg-yellow-100 text-yellow-800' :
                        'bg-gray-100 text-gray-800'
                      ]"
                    >
                      {{ related.status?.label }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modals -->
        <InvestmentModal
          v-model="showEditModal"
          :investment="investment"
          @updated="handleInvestmentUpdated"
        />
        
        <InvestmentExitModal
          v-model="showExitModal"
          :investment="investment"
          @exited="handleInvestmentExited"
        />
        
        <InvestmentUpdateModal
          v-model="showUpdateModal"
          :investment="investment"
          @created="handleUpdateCreated"
        />
        
        <DocumentUploadModal
          v-model="showDocumentModal"
          :investment="investment"
          @uploaded="handleDocumentUploaded"
        />
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { router } from '@inertiajs/vue3'
import {
  HomeIcon,
  ChevronRightIcon,
  PencilIcon,
  ArrowRightOnRectangleIcon,
  CheckIcon,
  InformationCircleIcon,
  CheckCircleIcon,
  DocumentIcon,
  ArrowDownTrayIcon
} from '@heroicons/vue/24/outline'
import Chart from 'chart.js/auto'
import AppLayout from '@/Layouts/App.vue'
import InvestmentModal from '@/Components/Investment/InvestmentModal.vue'
import InvestmentExitModal from '@/Components/Investment/InvestmentExitModal.vue'
import InvestmentUpdateModal from '@/Components/Investment/InvestmentUpdateModal.vue'
import DocumentUploadModal from '@/Components/Investment/DocumentUploadModal.vue'

const props = defineProps({
  investment: Object,
  analytics: Object,
  canEdit: Boolean,
  relatedInvestments: Array
})

const showEditModal = ref(false)
const showExitModal = ref(false)
const showUpdateModal = ref(false)
const showDocumentModal = ref(false)
const performanceChart = ref(null)

onMounted(() => {
  initializePerformanceChart()
})

const initializePerformanceChart = () => {
  if (!performanceChart.value || !props.analytics?.financial_timeline) return

  const timeline = props.analytics.financial_timeline
  
  new Chart(performanceChart.value, {
    type: 'line',
    data: {
      labels: timeline.map(item => new Date(item.created_at).toLocaleDateString()),
      datasets: [{
        label: 'Financial Impact',
        data: timeline.map(item => item.financial_impact),
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
          beginAtZero: true
        }
      }
    }
  })
}

const handleInvestmentUpdated = () => {
  showEditModal.value = false
  router.reload({ only: ['investment', 'analytics'] })
}

const handleInvestmentExited = () => {
  showExitModal.value = false
  router.reload({ only: ['investment', 'analytics'] })
}

const handleUpdateCreated = () => {
  showUpdateModal.value = false
  router.reload({ only: ['investment'] })
}

const handleDocumentUploaded = () => {
  showDocumentModal.value = false
  router.reload({ only: ['investment'] })
}
</script>