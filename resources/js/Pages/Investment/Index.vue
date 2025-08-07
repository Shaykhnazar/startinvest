<template>
  <AppLayout>
    <div class="min-h-screen bg-gray-50 py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="md:flex md:items-center md:justify-between mb-8">
          <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
              My Investments
            </h2>
            <p class="mt-1 text-sm text-gray-500">
              Track and manage your investment portfolio
            </p>
          </div>
          <div class="mt-4 flex md:mt-0 md:ml-4">
            <button
              @click="showCreateModal = true"
              class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700"
            >
              <PlusIcon class="-ml-1 mr-2 h-5 w-5" />
              New Investment
            </button>
          </div>
        </div>

        <!-- Filters -->
        <div class="bg-white shadow rounded-lg mb-6">
          <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
              <div>
                <label for="search" class="block text-sm font-medium text-gray-700">
                  Search
                </label>
                <input
                  id="search"
                  v-model="filters.search"
                  type="text"
                  placeholder="Search startups..."
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                  @input="debouncedFilter"
                >
              </div>

              <div>
                <label for="status" class="block text-sm font-medium text-gray-700">
                  Status
                </label>
                <select
                  id="status"
                  v-model="filters.status"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                  @change="applyFilters"
                >
                  <option value="">All Statuses</option>
                  <option value="pending">Pending</option>
                  <option value="approved">Approved</option>
                  <option value="active">Active</option>
                  <option value="completed">Completed</option>
                  <option value="exited">Exited</option>
                  <option value="cancelled">Cancelled</option>
                </select>
              </div>

              <div>
                <label for="min_amount" class="block text-sm font-medium text-gray-700">
                  Min Amount
                </label>
                <input
                  id="min_amount"
                  v-model="filters.min_amount"
                  type="number"
                  placeholder="0"
                  min="0"
                  step="1000"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                  @input="debouncedFilter"
                >
              </div>

              <div>
                <label for="max_amount" class="block text-sm font-medium text-gray-700">
                  Max Amount
                </label>
                <input
                  id="max_amount"
                  v-model="filters.max_amount"
                  type="number"
                  placeholder="No limit"
                  min="0"
                  step="1000"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                  @input="debouncedFilter"
                >
              </div>
            </div>

            <div class="mt-4 flex items-center justify-between">
              <div class="flex items-center space-x-4">
                <button
                  @click="clearFilters"
                  class="text-sm text-gray-500 hover:text-gray-700"
                >
                  Clear filters
                </button>
                <span class="text-sm text-gray-500">
                  {{ stats.total }} investments found
                </span>
              </div>
              
              <div class="flex items-center space-x-2">
                <label class="text-sm text-gray-700">Sort by:</label>
                <select
                  v-model="sortBy"
                  class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                  @change="applyFilters"
                >
                  <option value="created_at">Date Created</option>
                  <option value="invested_at">Investment Date</option>
                  <option value="amount">Amount</option>
                  <option value="roi">ROI</option>
                </select>
                <button
                  @click="sortDirection = sortDirection === 'asc' ? 'desc' : 'asc'; applyFilters()"
                  class="p-1 text-gray-400 hover:text-gray-600"
                >
                  <ArrowUpIcon v-if="sortDirection === 'asc'" class="h-4 w-4" />
                  <ArrowDownIcon v-else class="h-4 w-4" />
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Investment List -->
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
          <div v-if="loading" class="p-6 text-center">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-indigo-600 mx-auto"></div>
            <p class="mt-2 text-sm text-gray-500">Loading investments...</p>
          </div>

          <ul v-else-if="investments.data.length > 0" class="divide-y divide-gray-200">
            <li v-for="investment in investments.data" :key="investment.id">
              <InvestmentCard
                :investment="investment"
                @view="viewInvestment"
                @edit="editInvestment"
                @delete="deleteInvestment"
              />
            </li>
          </ul>

          <div v-else class="p-6 text-center">
            <ChartBarIcon class="mx-auto h-12 w-12 text-gray-400" />
            <h3 class="mt-2 text-sm font-medium text-gray-900">No investments found</h3>
            <p class="mt-1 text-sm text-gray-500">
              Get started by creating your first investment.
            </p>
            <div class="mt-6">
              <button
                @click="showCreateModal = true"
                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"
              >
                <PlusIcon class="-ml-1 mr-2 h-5 w-5" />
                New Investment
              </button>
            </div>
          </div>
        </div>

        <!-- Pagination -->
        <div v-if="investments.data.length > 0" class="mt-6">
          <nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 rounded-lg shadow">
            <div class="hidden sm:block">
              <p class="text-sm text-gray-700">
                Showing
                <span class="font-medium">{{ investments.from }}</span>
                to
                <span class="font-medium">{{ investments.to }}</span>
                of
                <span class="font-medium">{{ investments.total }}</span>
                results
              </p>
            </div>
            <div class="flex flex-1 justify-between sm:justify-end">
              <button
                v-if="investments.prev_page_url"
                @click="changePage(investments.current_page - 1)"
                class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
              >
                Previous
              </button>
              <button
                v-if="investments.next_page_url"
                @click="changePage(investments.current_page + 1)"
                class="relative ml-3 inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
              >
                Next
              </button>
            </div>
          </nav>
        </div>

        <!-- Create Investment Modal -->
        <InvestmentModal
          v-model="showCreateModal"
          @created="handleInvestmentCreated"
        />

        <!-- Edit Investment Modal -->
        <InvestmentModal
          v-model="showEditModal"
          :investment="selectedInvestment"
          @updated="handleInvestmentUpdated"
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
  ArrowUpIcon,
  ArrowDownIcon
} from '@heroicons/vue/24/outline'
import AppLayout from '@/Layouts/App.vue'
import InvestmentCard from '@/Components/Investment/InvestmentCard.vue'
import InvestmentModal from '@/Components/Investment/InvestmentModal.vue'
import { useInvestment } from '@/Composables/useInvestment'
import { debounce } from 'lodash'

const props = defineProps({
  investments: Object,
  filters: Object,
  stats: Object
})

const { deleteInvestment: deleteInvestmentAPI, loading } = useInvestment()

const showCreateModal = ref(false)
const showEditModal = ref(false)
const selectedInvestment = ref(null)

const filters = ref({
  search: props.filters?.search || '',
  status: props.filters?.status || '',
  min_amount: props.filters?.min_amount || '',
  max_amount: props.filters?.max_amount || ''
})

const sortBy = ref('created_at')
const sortDirection = ref('desc')

const debouncedFilter = debounce(() => {
  applyFilters()
}, 500)

const applyFilters = () => {
  router.get(route('investments.index'), {
    ...filters.value,
    sort_by: sortBy.value,
    sort_direction: sortDirection.value
  }, {
    preserveState: true,
    preserveScroll: true
  })
}

const clearFilters = () => {
  filters.value = {
    search: '',
    status: '',
    min_amount: '',
    max_amount: ''
  }
  applyFilters()
}

const changePage = (page) => {
  router.get(route('investments.index'), {
    ...filters.value,
    page,
    sort_by: sortBy.value,
    sort_direction: sortDirection.value
  }, {
    preserveState: true,
    preserveScroll: true
  })
}

const viewInvestment = (investment) => {
  router.visit(route('investments.show', investment.id))
}

const editInvestment = (investment) => {
  selectedInvestment.value = investment
  showEditModal.value = true
}

const deleteInvestment = async (investment) => {
  if (confirm(`Are you sure you want to delete the investment in ${investment.startup?.title}?`)) {
    try {
      await deleteInvestmentAPI(investment.id)
      router.reload({ only: ['investments', 'stats'] })
    } catch (error) {
      alert('Failed to delete investment. Please try again.')
    }
  }
}

const handleInvestmentCreated = (investment) => {
  showCreateModal.value = false
  router.reload({ only: ['investments', 'stats'] })
}

const handleInvestmentUpdated = (investment) => {
  showEditModal.value = false
  selectedInvestment.value = null
  router.reload({ only: ['investments', 'stats'] })
}
</script>