<template>
    <AppLayout title="Investor Directory">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
                    <div class="p-6 lg:p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">Investor Directory</h1>
                                <p class="mt-2 text-gray-600">Connect with verified investors actively seeking opportunities</p>
                            </div>
                            <div class="flex space-x-4">
                                <el-button type="primary" @click="applyFilters">
                                    <i class="fas fa-filter mr-2"></i>
                                    Filter
                                </el-button>
                                <el-button @click="resetFilters">
                                    <i class="fas fa-redo mr-2"></i>
                                    Reset
                                </el-button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search and Filters -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-8">
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <el-input
                                    v-model="filters.search"
                                    placeholder="Search investors..."
                                    prefix-icon="Search"
                                    clearable
                                    @clear="applyFilters"
                                    @keyup.enter="applyFilters"
                                />
                            </div>
                            <div>
                                <el-select
                                    v-model="filters.industries"
                                    placeholder="Industries"
                                    multiple
                                    collapse-tags
                                    clearable
                                >
                                    <el-option
                                        v-for="industry in industries"
                                        :key="industry"
                                        :label="industry"
                                        :value="industry"
                                    />
                                </el-select>
                            </div>
                            <div>
                                <el-input
                                    v-model="filters.min_investment"
                                    placeholder="Min Investment"
                                    type="number"
                                    prefix-icon="Money"
                                />
                            </div>
                            <div>
                                <el-input
                                    v-model="filters.max_investment"
                                    placeholder="Max Investment"
                                    type="number"
                                    prefix-icon="Money"
                                />
                            </div>
                        </div>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-600">Sort by:</span>
                                <el-select v-model="sorting.sort_by" @change="applyFilters">
                                    <el-option label="Recently Joined" value="created_at" />
                                    <el-option label="Name" value="name" />
                                    <el-option label="Investment Count" value="investments_count" />
                                    <el-option label="Total Invested" value="total_invested" />
                                </el-select>
                                <el-select v-model="sorting.sort_order" @change="applyFilters">
                                    <el-option label="Descending" value="desc" />
                                    <el-option label="Ascending" value="asc" />
                                </el-select>
                            </div>
                            <div class="text-sm text-gray-600">
                                {{ investors.meta?.total_investors || 0 }} investors found
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Investors Grid -->
                <div v-if="investors.data?.length" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                    <div 
                        v-for="investor in investors.data" 
                        :key="investor.id"
                        class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300"
                    >
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <img 
                                    :src="investor.avatar || '/default-avatar.png'"
                                    :alt="investor.name"
                                    class="w-16 h-16 rounded-full object-cover"
                                >
                                <div class="ml-4 flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ investor.name }}</h3>
                                    <p v-if="investor.company" class="text-sm text-gray-600">{{ investor.company }}</p>
                                    <div class="flex items-center mt-1">
                                        <i class="fas fa-map-marker-alt text-gray-400 text-xs mr-1"></i>
                                        <span class="text-xs text-gray-600">{{ investor.location || 'Global' }}</span>
                                        <el-tag v-if="investor.is_verified" type="success" size="small" class="ml-2">
                                            Verified
                                        </el-tag>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="text-sm text-gray-700 line-clamp-3">{{ investor.bio || 'No bio available' }}</p>
                            </div>

                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-chart-line text-blue-500 w-4"></i>
                                    <span class="ml-2 text-gray-600">{{ investor.total_investments || 0 }} investments</span>
                                </div>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-dollar-sign text-green-500 w-4"></i>
                                    <span class="ml-2 text-gray-600">${{ formatCurrency(investor.total_invested) || '0' }}</span>
                                </div>
                                <div v-if="investor.investment_focus" class="flex items-center text-sm">
                                    <i class="fas fa-bullseye text-purple-500 w-4"></i>
                                    <span class="ml-2 text-gray-600">{{ investor.investment_focus }}</span>
                                </div>
                            </div>

                            <div class="flex space-x-2">
                                <el-button 
                                    type="primary" 
                                    size="small" 
                                    @click="viewProfile(investor.id)"
                                    class="flex-1"
                                >
                                    View Profile
                                </el-button>
                                <el-button 
                                    size="small" 
                                    @click="connectWithInvestor(investor.id)"
                                    class="flex-1"
                                >
                                    Connect
                                </el-button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-else class="bg-white rounded-lg shadow p-12 text-center">
                    <i class="fas fa-users text-gray-300 text-6xl mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No investors found</h3>
                    <p class="text-gray-600 mb-4">Try adjusting your search criteria or filters</p>
                    <el-button @click="resetFilters">Reset Filters</el-button>
                </div>

                <!-- Pagination -->
                <div v-if="investors.meta && investors.meta.last_page > 1" class="bg-white rounded-lg shadow p-6">
                    <el-pagination
                        v-model:current-page="currentPage"
                        :page-size="12"
                        :total="investors.meta.total_investors"
                        layout="prev, pager, next, jumper, total"
                        @current-change="handlePageChange"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref, reactive, onMounted, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import { ElButton, ElInput, ElSelect, ElOption, ElTag, ElPagination, ElMessage } from 'element-plus'

const props = defineProps({
    investors: Object,
    filters: Object,
    sorting: Object
})

const currentPage = ref(1)
const filters = reactive({
    search: props.filters?.search || '',
    industries: props.filters?.industries || [],
    min_investment: props.filters?.min_investment || '',
    max_investment: props.filters?.max_investment || '',
    location: props.filters?.location || ''
})

const sorting = reactive({
    sort_by: props.sorting?.sort_by || 'created_at',
    sort_order: props.sorting?.sort_order || 'desc'
})

const industries = ref([
    'Technology', 'Healthcare', 'Finance', 'Education', 'E-commerce',
    'AI/ML', 'Blockchain', 'SaaS', 'Mobile Apps', 'Gaming',
    'Real Estate', 'Energy', 'Food & Beverage', 'Media', 'Transportation'
])

const applyFilters = () => {
    const params = {
        ...filters,
        ...sorting,
        page: 1
    }
    
    // Remove empty values
    Object.keys(params).forEach(key => {
        if (params[key] === '' || (Array.isArray(params[key]) && params[key].length === 0)) {
            delete params[key]
        }
    })
    
    router.get(route('investor.index'), params, {
        preserveState: true,
        replace: true
    })
}

const resetFilters = () => {
    Object.keys(filters).forEach(key => {
        filters[key] = Array.isArray(filters[key]) ? [] : ''
    })
    sorting.sort_by = 'created_at'
    sorting.sort_order = 'desc'
    currentPage.value = 1
    applyFilters()
}

const handlePageChange = (page) => {
    currentPage.value = page
    const params = {
        ...filters,
        ...sorting,
        page
    }
    
    router.get(route('investor.index'), params, {
        preserveState: true,
        replace: true
    })
}

const viewProfile = (investorId) => {
    router.visit(route('investor.show', investorId))
}

const connectWithInvestor = (investorId) => {
    ElMessage.success('Connection request sent!')
    // TODO: Implement connection logic
}

const formatCurrency = (amount) => {
    if (!amount) return '0'
    return new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount)
}

onMounted(() => {
    // Set current page from URL if exists
    const urlParams = new URLSearchParams(window.location.search)
    const page = parseInt(urlParams.get('page')) || 1
    currentPage.value = page
})
</script>