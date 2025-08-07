<template>
    <div class="search-page">
        <Head title="Search" />
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Search Platform</h1>
            <p class="text-gray-600 dark:text-gray-400">
                Find startups, investors, and investment opportunities
            </p>
        </div>

        <!-- Search Bar -->
        <div class="mb-8">
            <SearchBar 
                :query="query"
                :suggestions="suggestions"
                @search="handleSearch"
                @suggestion-select="handleSuggestionSelect"
            />
        </div>

        <!-- Search Filters -->
        <div class="mb-8">
            <SearchFilters 
                :filters="filters"
                :filter-options="filterOptions"
                @update-filters="handleFilterUpdate"
                @clear-filters="clearFilters"
            />
        </div>

        <!-- Search Results -->
        <div v-if="results">
            <div class="mb-6 flex items-center justify-between">
                <div class="text-lg font-semibold text-gray-900 dark:text-white">
                    Search Results
                    <span class="text-sm font-normal text-gray-500 ml-2">
                        ({{ results.total_results }} total)
                    </span>
                </div>
                
                <!-- View Toggle -->
                <div class="flex space-x-2">
                    <button 
                        @click="viewMode = 'grid'"
                        :class="[
                            'p-2 rounded-lg transition-colors',
                            viewMode === 'grid' 
                                ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300' 
                                : 'text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700'
                        ]"
                    >
                        <Squares2X2Icon class="w-5 h-5" />
                    </button>
                    <button 
                        @click="viewMode = 'list'"
                        :class="[
                            'p-2 rounded-lg transition-colors',
                            viewMode === 'list' 
                                ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300' 
                                : 'text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700'
                        ]"
                    >
                        <ListBulletIcon class="w-5 h-5" />
                    </button>
                </div>
            </div>

            <!-- Results Tabs -->
            <div class="mb-6">
                <nav class="flex space-x-8" aria-label="Tabs">
                    <button
                        @click="activeTab = 'all'"
                        :class="[
                            'py-2 px-1 border-b-2 font-medium text-sm transition-colors',
                            activeTab === 'all' 
                                ? 'border-blue-500 text-blue-600 dark:text-blue-400' 
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400'
                        ]"
                    >
                        All Results ({{ results.total_results }})
                    </button>
                    <button
                        @click="activeTab = 'startups'"
                        :class="[
                            'py-2 px-1 border-b-2 font-medium text-sm transition-colors',
                            activeTab === 'startups' 
                                ? 'border-blue-500 text-blue-600 dark:text-blue-400' 
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400'
                        ]"
                    >
                        Startups ({{ results.startups?.data?.length || 0 }})
                    </button>
                    <button
                        @click="activeTab = 'investors'"
                        :class="[
                            'py-2 px-1 border-b-2 font-medium text-sm transition-colors',
                            activeTab === 'investors' 
                                ? 'border-blue-500 text-blue-600 dark:text-blue-400' 
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400'
                        ]"
                    >
                        Investors ({{ results.investors?.data?.length || 0 }})
                    </button>
                    <button
                        @click="activeTab = 'investment_rounds'"
                        :class="[
                            'py-2 px-1 border-b-2 font-medium text-sm transition-colors',
                            activeTab === 'investment_rounds' 
                                ? 'border-blue-500 text-blue-600 dark:text-blue-400' 
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400'
                        ]"
                    >
                        Investment Rounds ({{ results.investment_rounds?.data?.length || 0 }})
                    </button>
                </nav>
            </div>

            <!-- Results Content -->
            <div class="space-y-6">
                <!-- All Results Tab -->
                <div v-if="activeTab === 'all'" class="space-y-8">
                    <!-- Startups Section -->
                    <div v-if="results.startups?.data?.length" class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <RocketLaunchIcon class="w-5 h-5 mr-2 text-purple-500" />
                            Startups
                        </h3>
                        <SearchResultsGrid 
                            :items="results.startups.data" 
                            :view-mode="viewMode"
                            type="startup"
                        />
                        <div v-if="results.startups.data.length >= 6" class="text-center">
                            <Link 
                                :href="route('search.startups', { q: query, ...filters })"
                                class="text-blue-600 hover:text-blue-700 font-medium"
                            >
                                View all startup results →
                            </Link>
                        </div>
                    </div>

                    <!-- Investors Section -->
                    <div v-if="results.investors?.data?.length" class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <UsersIcon class="w-5 h-5 mr-2 text-green-500" />
                            Investors
                        </h3>
                        <SearchResultsGrid 
                            :items="results.investors.data" 
                            :view-mode="viewMode"
                            type="investor"
                        />
                        <div v-if="results.investors.data.length >= 6" class="text-center">
                            <Link 
                                :href="route('search.investors', { q: query, ...filters })"
                                class="text-blue-600 hover:text-blue-700 font-medium"
                            >
                                View all investor results →
                            </Link>
                        </div>
                    </div>

                    <!-- Investment Rounds Section -->
                    <div v-if="results.investment_rounds?.data?.length" class="space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <CurrencyDollarIcon class="w-5 h-5 mr-2 text-blue-500" />
                            Investment Rounds
                        </h3>
                        <SearchResultsGrid 
                            :items="results.investment_rounds.data" 
                            :view-mode="viewMode"
                            type="investment_round"
                        />
                        <div v-if="results.investment_rounds.data.length >= 6" class="text-center">
                            <Link 
                                :href="route('search.investment-rounds', { q: query, ...filters })"
                                class="text-blue-600 hover:text-blue-700 font-medium"
                            >
                                View all investment round results →
                            </Link>
                        </div>
                    </div>
                </div>

                <!-- Individual Tab Content -->
                <div v-else-if="activeTab === 'startups' && results.startups?.data?.length">
                    <SearchResultsGrid 
                        :items="results.startups.data" 
                        :view-mode="viewMode"
                        type="startup"
                    />
                </div>

                <div v-else-if="activeTab === 'investors' && results.investors?.data?.length">
                    <SearchResultsGrid 
                        :items="results.investors.data" 
                        :view-mode="viewMode"
                        type="investor"
                    />
                </div>

                <div v-else-if="activeTab === 'investment_rounds' && results.investment_rounds?.data?.length">
                    <SearchResultsGrid 
                        :items="results.investment_rounds.data" 
                        :view-mode="viewMode"
                        type="investment_round"
                    />
                </div>

                <!-- No Results -->
                <div v-if="!hasResults" class="text-center py-12">
                    <MagnifyingGlassIcon class="w-12 h-12 mx-auto text-gray-300 mb-4" />
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        No results found
                    </h3>
                    <p class="text-gray-500 mb-4">
                        Try adjusting your search terms or filters
                    </p>
                    <button 
                        @click="clearAll"
                        class="text-blue-600 hover:text-blue-700 font-medium"
                    >
                        Clear search and filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div v-else class="text-center py-16">
            <MagnifyingGlassIcon class="w-16 h-16 mx-auto text-gray-300 mb-6" />
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                Start searching
            </h2>
            <p class="text-gray-500 mb-8">
                Enter keywords to find startups, investors, and investment opportunities
            </p>
            
            <!-- Quick Search Suggestions -->
            <div class="max-w-2xl mx-auto">
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">
                    Popular searches:
                </h3>
                <div class="flex flex-wrap justify-center gap-2">
                    <button 
                        v-for="suggestion in popularSearches" 
                        :key="suggestion"
                        @click="handleSearch(suggestion)"
                        class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                    >
                        {{ suggestion }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, ref, watch } from 'vue'
import { Head, Link, router } from '@inertiajs/vue3'
import { 
    MagnifyingGlassIcon, 
    RocketLaunchIcon, 
    UsersIcon, 
    CurrencyDollarIcon,
    Squares2X2Icon,
    ListBulletIcon
} from '@heroicons/vue/24/outline'
import SearchBar from '@/Components/Search/SearchBar.vue'
import SearchFilters from '@/Components/Search/SearchFilters.vue'
import SearchResultsGrid from '@/Components/Search/SearchResultsGrid.vue'
import { useSearch } from '@/Composables/useSearch'

const props = defineProps({
    query: {
        type: String,
        default: ''
    },
    results: {
        type: Object,
        default: null
    },
    filters: {
        type: Object,
        default: () => ({})
    },
    filter_options: {
        type: Object,
        default: () => ({})
    }
})

const { suggestions, getSuggestions } = useSearch()

const activeTab = ref('all')
const viewMode = ref('grid')
const filterOptions = computed(() => props.filter_options)

const popularSearches = [
    'Fintech', 'AI startup', 'Series A', 'Healthcare', 'SaaS', 
    'Angel investor', 'Seed funding', 'Tech startup'
]

const hasResults = computed(() => {
    if (!props.results) return false
    
    return (props.results.startups?.data?.length > 0) ||
           (props.results.investors?.data?.length > 0) ||
           (props.results.investment_rounds?.data?.length > 0)
})

const handleSearch = (searchQuery) => {
    router.get(route('search.index'), {
        q: searchQuery,
        ...props.filters
    }, {
        preserveState: true,
        preserveScroll: true
    })
}

const handleSuggestionSelect = (suggestion) => {
    handleSearch(suggestion)
}

const handleFilterUpdate = (updatedFilters) => {
    router.get(route('search.index'), {
        q: props.query,
        ...updatedFilters
    }, {
        preserveState: true,
        preserveScroll: true
    })
}

const clearFilters = () => {
    router.get(route('search.index'), {
        q: props.query
    })
}

const clearAll = () => {
    router.get(route('search.index'))
}

// Get search suggestions when query changes
watch(() => props.query, (newQuery) => {
    if (newQuery && newQuery.length >= 2) {
        getSuggestions(newQuery)
    }
}, { immediate: true })
</script>

<style scoped>
.search-page {
    @apply max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8;
}
</style>