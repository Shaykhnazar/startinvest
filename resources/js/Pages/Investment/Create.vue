<template>
  <AppLayout>
    <div class="min-h-screen bg-gray-50 py-6">
      <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
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
                  <span class="ml-4 text-sm font-medium text-gray-500">Create Investment</span>
                </div>
              </li>
            </ol>
          </nav>
          <h1 class="mt-2 text-2xl font-bold text-gray-900">Create New Investment</h1>
          <p class="mt-1 text-sm text-gray-500">
            Submit a new investment proposal for a startup
          </p>
        </div>

        <!-- Investment Form -->
        <div class="bg-white shadow rounded-lg">
          <form @submit.prevent="submitForm">
            <div class="px-4 py-5 sm:p-6">
              <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <!-- Startup Selection -->
                <div class="sm:col-span-6">
                  <label for="startup" class="block text-sm font-medium text-gray-700">
                    Startup *
                  </label>
                  <select
                    id="startup"
                    v-model="form.startup_id"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    :class="{ 'border-red-300': errors.startup_id }"
                  >
                    <option value="">Select a startup to invest in</option>
                    <option
                      v-for="startup in startups"
                      :key="startup.id"
                      :value="startup.id"
                    >
                      {{ startup.title }}
                    </option>
                  </select>
                  <p v-if="errors.startup_id" class="mt-2 text-sm text-red-600">
                    {{ errors.startup_id }}
                  </p>
                </div>

                <!-- Investment Stage -->
                <div class="sm:col-span-3">
                  <label for="investment_stage" class="block text-sm font-medium text-gray-700">
                    Investment Stage *
                  </label>
                  <select
                    id="investment_stage"
                    v-model="form.investment_stage_id"
                    required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    :class="{ 'border-red-300': errors.investment_stage_id }"
                  >
                    <option value="">Select investment stage</option>
                    <option
                      v-for="stage in investmentStages"
                      :key="stage.id"
                      :value="stage.id"
                    >
                      {{ stage.name }}
                    </option>
                  </select>
                  <p v-if="errors.investment_stage_id" class="mt-2 text-sm text-red-600">
                    {{ errors.investment_stage_id }}
                  </p>
                </div>

                <!-- Currency -->
                <div class="sm:col-span-3">
                  <label for="currency" class="block text-sm font-medium text-gray-700">
                    Currency
                  </label>
                  <select
                    id="currency"
                    v-model="form.currency"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                  >
                    <option value="USD">USD ($)</option>
                    <option value="EUR">EUR (€)</option>
                    <option value="UZS">UZS</option>
                    <option value="RUB">RUB (₽)</option>
                  </select>
                  <p v-if="errors.currency" class="mt-2 text-sm text-red-600">
                    {{ errors.currency }}
                  </p>
                </div>

                <!-- Investment Amount -->
                <div class="sm:col-span-3">
                  <label for="amount" class="block text-sm font-medium text-gray-700">
                    Investment Amount *
                  </label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm">{{ getCurrencySymbol(form.currency) }}</span>
                    </div>
                    <input
                      id="amount"
                      v-model="form.amount"
                      type="number"
                      step="0.01"
                      min="1"
                      required
                      class="block w-full pl-8 pr-12 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      :class="{ 'border-red-300': errors.amount }"
                      placeholder="0.00"
                    >
                  </div>
                  <p v-if="errors.amount" class="mt-2 text-sm text-red-600">
                    {{ errors.amount }}
                  </p>
                </div>

                <!-- Equity Percentage -->
                <div class="sm:col-span-3">
                  <label for="equity_percentage" class="block text-sm font-medium text-gray-700">
                    Equity Percentage
                  </label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <input
                      id="equity_percentage"
                      v-model="form.equity_percentage"
                      type="number"
                      step="0.01"
                      min="0"
                      max="100"
                      class="block w-full pr-8 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      :class="{ 'border-red-300': errors.equity_percentage }"
                      placeholder="0.00"
                    >
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm">%</span>
                    </div>
                  </div>
                  <p v-if="errors.equity_percentage" class="mt-2 text-sm text-red-600">
                    {{ errors.equity_percentage }}
                  </p>
                </div>

                <!-- Expected Return -->
                <div class="sm:col-span-3">
                  <label for="expected_return" class="block text-sm font-medium text-gray-700">
                    Expected Return
                  </label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm">{{ getCurrencySymbol(form.currency) }}</span>
                    </div>
                    <input
                      id="expected_return"
                      v-model="form.expected_return"
                      type="number"
                      step="0.01"
                      min="0"
                      class="block w-full pl-8 pr-12 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      :class="{ 'border-red-300': errors.expected_return }"
                      placeholder="0.00"
                    >
                  </div>
                  <p v-if="errors.expected_return" class="mt-2 text-sm text-red-600">
                    {{ errors.expected_return }}
                  </p>
                  <p class="mt-2 text-sm text-gray-500">
                    Expected return from this investment
                  </p>
                </div>

                <!-- Investment Date -->
                <div class="sm:col-span-3">
                  <label for="invested_at" class="block text-sm font-medium text-gray-700">
                    Investment Date
                  </label>
                  <input
                    id="invested_at"
                    v-model="form.invested_at"
                    type="date"
                    :max="today"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    :class="{ 'border-red-300': errors.invested_at }"
                  >
                  <p v-if="errors.invested_at" class="mt-2 text-sm text-red-600">
                    {{ errors.invested_at }}
                  </p>
                </div>

                <!-- Notes -->
                <div class="sm:col-span-6">
                  <label for="notes" class="block text-sm font-medium text-gray-700">
                    Notes
                  </label>
                  <textarea
                    id="notes"
                    v-model="form.notes"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    :class="{ 'border-red-300': errors.notes }"
                    placeholder="Additional notes about this investment..."
                  />
                  <p v-if="errors.notes" class="mt-2 text-sm text-red-600">
                    {{ errors.notes }}
                  </p>
                  <p class="mt-2 text-sm text-gray-500">
                    {{ form.notes?.length || 0 }}/5000 characters
                  </p>
                </div>

                <!-- ROI Calculator -->
                <div v-if="form.amount && form.expected_return" class="sm:col-span-6">
                  <div class="bg-blue-50 rounded-lg p-4">
                    <h4 class="text-sm font-medium text-blue-900 mb-2">Expected ROI Calculation</h4>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                      <div>
                        <span class="text-blue-700">Expected ROI:</span>
                        <span class="font-semibold text-blue-900 ml-2">
                          {{ calculateExpectedROI() }}%
                        </span>
                      </div>
                      <div>
                        <span class="text-blue-700">Expected Profit:</span>
                        <span class="font-semibold text-blue-900 ml-2">
                          {{ formatCurrency(form.expected_return - form.amount, form.currency) }}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Form Actions -->
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 rounded-b-lg">
              <div class="flex justify-between">
                <button
                  type="button"
                  @click="$router.go(-1)"
                  class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                  Cancel
                </button>
                <button
                  type="submit"
                  :disabled="processing"
                  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50"
                >
                  <span v-if="processing" class="mr-2">
                    <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-white"></div>
                  </span>
                  {{ processing ? 'Creating...' : 'Create Investment' }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'
import { HomeIcon, ChevronRightIcon } from '@heroicons/vue/24/outline'
import AppLayout from '@/Layouts/App.vue'
import { useInvestment } from '@/Composables/useInvestment'
import { formatCurrency } from '@/Composables/helpers'

const props = defineProps({
  startups: Array,
  investmentStages: Array
})

const { createInvestment, processing, errors } = useInvestment()

const form = ref({
  startup_id: '',
  investment_stage_id: '',
  amount: '',
  equity_percentage: '',
  expected_return: '',
  invested_at: new Date().toISOString().split('T')[0],
  currency: 'USD',
  notes: ''
})

const today = computed(() => {
  return new Date().toISOString().split('T')[0]
})

const getCurrencySymbol = (currency) => {
  const symbols = {
    USD: '$',
    EUR: '€',
    UZS: 'UZS',
    RUB: '₽'
  }
  return symbols[currency] || currency
}

const calculateExpectedROI = () => {
  if (!form.value.amount || !form.value.expected_return) return '0.0'
  
  const amount = parseFloat(form.value.amount)
  const expectedReturn = parseFloat(form.value.expected_return)
  
  if (amount <= 0) return '0.0'
  
  const roi = ((expectedReturn - amount) / amount) * 100
  return roi.toFixed(1)
}

const submitForm = async () => {
  try {
    const investment = await createInvestment(form.value)
    
    if (investment) {
      router.visit(route('investments.show', investment.id), {
        onSuccess: () => {
          // Success message will be shown by the backend
        }
      })
    }
  } catch (error) {
    // Errors are handled by the composable
    console.error('Investment creation failed:', error)
  }
}
</script>