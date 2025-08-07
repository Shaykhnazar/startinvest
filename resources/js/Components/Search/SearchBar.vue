<template>
    <div class="search-bar relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <MagnifyingGlassIcon class="h-5 w-5 text-gray-400" />
            </div>
            
            <input
                ref="searchInput"
                v-model="searchQuery"
                @keyup.enter="handleSearch"
                @input="handleInput"
                @focus="showSuggestions = true"
                @blur="handleBlur"
                type="text"
                placeholder="Search startups, investors, or investment opportunities..."
                class="block w-full pl-10 pr-12 py-4 text-lg border border-gray-300 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all shadow-sm"
            />
            
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center space-x-2">
                <!-- Clear button -->
                <button
                    v-if="searchQuery"
                    @click="clearSearch"
                    class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors"
                >
                    <XMarkIcon class="h-5 w-5" />
                </button>
                
                <!-- Search button -->
                <button
                    @click="handleSearch"
                    class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-2 text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Search
                </button>
            </div>
        </div>

        <!-- Search Suggestions Dropdown -->
        <div
            v-if="showSuggestions && (suggestions.length > 0 || recentSearches.length > 0)"
            class="absolute z-50 w-full mt-2 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-lg max-h-96 overflow-y-auto"
        >
            <!-- Recent Searches -->
            <div v-if="recentSearches.length > 0 && !searchQuery" class="p-4 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Recent searches</h3>
                <div class="space-y-1">
                    <button
                        v-for="search in recentSearches.slice(0, 5)"
                        :key="search"
                        @click="selectSuggestion(search)"
                        class="w-full text-left px-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-colors flex items-center"
                    >
                        <ClockIcon class="h-4 w-4 mr-2 text-gray-400" />
                        {{ search }}
                    </button>
                </div>
            </div>

            <!-- Suggestions by Category -->
            <div v-if="suggestions.length > 0" class="p-4">
                <!-- Startup Suggestions -->
                <div v-if="suggestions.startups?.length" class="mb-4">
                    <h4 class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2 flex items-center">
                        <RocketLaunchIcon class="h-3 w-3 mr-1" />
                        Startups
                    </h4>
                    <div class="space-y-1">
                        <button
                            v-for="startup in suggestions.startups.slice(0, 3)"
                            :key="startup"
                            @click="selectSuggestion(startup)"
                            class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-colors"
                        >
                            {{ startup }}
                        </button>
                    </div>
                </div>

                <!-- Industry Suggestions -->
                <div v-if="suggestions.industries?.length" class="mb-4">
                    <h4 class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2 flex items-center">
                        <BuildingOffice2Icon class="h-3 w-3 mr-1" />
                        Industries
                    </h4>
                    <div class="space-y-1">
                        <button
                            v-for="industry in suggestions.industries.slice(0, 3)"
                            :key="industry"
                            @click="selectSuggestion(industry)"
                            class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-colors"
                        >
                            {{ industry }}
                        </button>
                    </div>
                </div>

                <!-- Investor Suggestions -->
                <div v-if="suggestions.investors?.length" class="mb-4">
                    <h4 class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2 flex items-center">
                        <UsersIcon class="h-3 w-3 mr-1" />
                        Investors
                    </h4>
                    <div class="space-y-1">
                        <button
                            v-for="investor in suggestions.investors.slice(0, 3)"
                            :key="investor"
                            @click="selectSuggestion(investor)"
                            class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-colors"
                        >
                            {{ investor }}
                        </button>
                    </div>
                </div>

                <!-- Investment Round Suggestions -->
                <div v-if="suggestions.investment_rounds?.length">
                    <h4 class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2 flex items-center">
                        <CurrencyDollarIcon class="h-3 w-3 mr-1" />
                        Investment Rounds
                    </h4>
                    <div class="space-y-1">
                        <button
                            v-for="round in suggestions.investment_rounds.slice(0, 3)"
                            :key="round"
                            @click="selectSuggestion(round)"
                            class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-md transition-colors"
                        >
                            {{ round }}
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="p-4 border-t border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-750">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4 text-xs text-gray-500">
                        <span class="flex items-center">
                            <kbd class="kbd">Enter</kbd>
                            <span class="ml-1">to search</span>
                        </span>
                        <span class="flex items-center">
                            <kbd class="kbd">Esc</kbd>
                            <span class="ml-1">to close</span>
                        </span>
                    </div>
                    <Link 
                        :href="route('search.advanced')"
                        class="text-xs text-blue-600 hover:text-blue-700 font-medium"
                    >
                        Advanced Search
                    </Link>
                </div>
            </div>
        </div>

        <!-- Overlay to close suggestions -->
        <div 
            v-if="showSuggestions"
            @click="showSuggestions = false"
            class="fixed inset-0 z-40"
        ></div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { Link } from '@inertiajs/vue3'
import { 
    MagnifyingGlassIcon, 
    XMarkIcon, 
    ClockIcon,
    RocketLaunchIcon,
    BuildingOffice2Icon,
    UsersIcon,
    CurrencyDollarIcon
} from '@heroicons/vue/24/outline'

const props = defineProps({
    query: {
        type: String,
        default: ''
    },
    suggestions: {
        type: Object,
        default: () => ({})
    }
})

const emit = defineEmits(['search', 'suggestion-select'])

const searchInput = ref(null)
const searchQuery = ref(props.query)
const showSuggestions = ref(false)
const recentSearches = ref([])

// Load recent searches from localStorage
onMounted(() => {
    try {
        const stored = localStorage.getItem('recent_searches')
        if (stored) {
            recentSearches.value = JSON.parse(stored)
        }
    } catch (e) {
        console.warn('Failed to load recent searches:', e)
    }
    
    // Add keyboard event listeners
    document.addEventListener('keydown', handleKeydown)
})

onUnmounted(() => {
    document.removeEventListener('keydown', handleKeydown)
})

const handleKeydown = (event) => {
    // Close suggestions on Escape
    if (event.key === 'Escape') {
        showSuggestions.value = false
        searchInput.value?.blur()
    }
    
    // Focus search on Ctrl+K or Cmd+K
    if ((event.ctrlKey || event.metaKey) && event.key === 'k') {
        event.preventDefault()
        searchInput.value?.focus()
        showSuggestions.value = true
    }
}

const handleInput = () => {
    showSuggestions.value = true
    
    // Emit suggestion request if query is long enough
    if (searchQuery.value.length >= 2) {
        emit('suggestion-select', searchQuery.value)
    }
}

const handleSearch = () => {
    if (!searchQuery.value.trim()) return
    
    showSuggestions.value = false
    saveRecentSearch(searchQuery.value)
    emit('search', searchQuery.value)
}

const handleBlur = () => {
    // Delay hiding suggestions to allow for click events
    setTimeout(() => {
        showSuggestions.value = false
    }, 200)
}

const selectSuggestion = (suggestion) => {
    searchQuery.value = suggestion
    showSuggestions.value = false
    saveRecentSearch(suggestion)
    emit('suggestion-select', suggestion)
}

const clearSearch = () => {
    searchQuery.value = ''
    searchInput.value?.focus()
    showSuggestions.value = true
}

const saveRecentSearch = (search) => {
    try {
        const recent = [...recentSearches.value.filter(s => s !== search), search]
        recentSearches.value = recent.slice(-10) // Keep last 10 searches
        localStorage.setItem('recent_searches', JSON.stringify(recentSearches.value))
    } catch (e) {
        console.warn('Failed to save recent search:', e)
    }
}

// Watch for prop changes
computed(() => {
    if (props.query !== searchQuery.value) {
        searchQuery.value = props.query
    }
})
</script>

<style scoped>
.kbd {
    @apply inline-flex items-center px-1.5 py-0.5 rounded border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 text-xs font-mono;
}

.search-bar {
    @apply w-full max-w-4xl mx-auto;
}

/* Custom scrollbar for suggestions dropdown */
.overflow-y-auto {
    scrollbar-width: thin;
    scrollbar-color: #cbd5e1 transparent;
}

.overflow-y-auto::-webkit-scrollbar {
    width: 6px;
}

.overflow-y-auto::-webkit-scrollbar-track {
    background: transparent;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
    background-color: #cbd5e1;
    border-radius: 3px;
}

.dark .overflow-y-auto::-webkit-scrollbar-thumb {
    background-color: #475569;
}
</style>