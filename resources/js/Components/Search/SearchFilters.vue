<template>
    <div class="search-filters">
        <!-- Filter Toggle Button (Mobile) -->
        <div class="lg:hidden mb-4">
            <button
                @click="showMobileFilters = !showMobileFilters"
                class="w-full flex items-center justify-between px-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm"
            >
                <span class="flex items-center text-gray-700 dark:text-gray-300">
                    <AdjustmentsHorizontalIcon class="h-5 w-5 mr-2" />
                    Filters
                    <span v-if="activeFiltersCount > 0" class="ml-2 px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 text-xs rounded-full">
                        {{ activeFiltersCount }}
                    </span>
                </span>
                <ChevronDownIcon 
                    :class="[
                        'h-5 w-5 text-gray-400 transition-transform',
                        showMobileFilters ? 'transform rotate-180' : ''
                    ]"
                />
            </button>
        </div>

        <!-- Filters Container -->
        <div 
            :class="[
                'filters-container',
                'lg:block',
                showMobileFilters ? 'block' : 'hidden'
            ]"
        >
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6">
                <!-- Active Filters Summary -->
                <div v-if="activeFiltersCount > 0" class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-blue-900 dark:text-blue-200">
                            Active Filters ({{ activeFiltersCount }})
                        </h3>
                        <button
                            @click="clearAllFilters"
                            class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium"
                        >
                            Clear All
                        </button>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <div v-for="(value, key) in activeFilters" :key="key" class="flex flex-wrap gap-1">
                            <span v-if="Array.isArray(value)" v-for="item in value" :key="item" class="filter-tag">
                                {{ getFilterLabel(key, item) }}
                                <button @click="removeFilter(key, item)" class="ml-1 hover:text-red-600">
                                    <XMarkIcon class="h-3 w-3" />
                                </button>
                            </span>
                            <span v-else class="filter-tag">
                                {{ getFilterLabel(key, value) }}
                                <button @click="removeFilter(key)" class="ml-1 hover:text-red-600">
                                    <XMarkIcon class="h-3 w-3" />
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Filter Sections -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Industries Filter -->
                    <div class="filter-group">
                        <label class="filter-label">Industries</label>
                        <FilterSelect
                            :model-value="localFilters.industries"
                            :options="filterOptions.industries"
                            multiple
                            placeholder="Select industries..."
                            @update:model-value="updateFilter('industries', $event)"
                        />
                    </div>

                    <!-- Investment Stages Filter -->
                    <div class="filter-group">
                        <label class="filter-label">Investment Stages</label>
                        <FilterSelect
                            :model-value="localFilters.stages"
                            :options="filterOptions.stages"
                            multiple
                            placeholder="Select stages..."
                            @update:model-value="updateFilter('stages', $event)"
                        />
                    </div>

                    <!-- Location Filter -->
                    <div class="filter-group">
                        <label class="filter-label">Location</label>
                        <FilterSelect
                            :model-value="localFilters.location"
                            :options="filterOptions.locations"
                            placeholder="Select location..."
                            @update:model-value="updateFilter('location', $event)"
                        />
                    </div>

                    <!-- Funding Status Filter -->
                    <div class="filter-group">
                        <label class="filter-label">Funding Status</label>
                        <FilterSelect
                            :model-value="localFilters.funding_status"
                            :options="fundingStatusOptions"
                            placeholder="Select status..."
                            @update:model-value="updateFilter('funding_status', $event)"
                        />
                    </div>

                    <!-- Funding Range Filter -->
                    <div class="filter-group">
                        <label class="filter-label">Funding Range</label>
                        <div class="grid grid-cols-2 gap-2">
                            <input
                                v-model="localFilters.min_funding"
                                type="number"
                                placeholder="Min"
                                class="filter-input text-sm"
                                @input="updateFilter('min_funding', $event.target.value)"
                            />
                            <input
                                v-model="localFilters.max_funding"
                                type="number"
                                placeholder="Max"
                                class="filter-input text-sm"
                                @input="updateFilter('max_funding', $event.target.value)"
                            />
                        </div>
                    </div>

                    <!-- Sort Options -->
                    <div class="filter-group">
                        <label class="filter-label">Sort By</label>
                        <div class="space-y-2">
                            <FilterSelect
                                :model-value="localFilters.sort_by"
                                :options="sortOptions"
                                placeholder="Sort by..."
                                @update:model-value="updateFilter('sort_by', $event)"
                            />
                            <div class="flex gap-2">
                                <button
                                    @click="updateFilter('sort_order', 'asc')"
                                    :class="[
                                        'flex-1 px-3 py-2 text-sm font-medium rounded-md transition-colors',
                                        localFilters.sort_order === 'asc'
                                            ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300'
                                            : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600'
                                    ]"
                                >
                                    ↑ Asc
                                </button>
                                <button
                                    @click="updateFilter('sort_order', 'desc')"
                                    :class="[
                                        'flex-1 px-3 py-2 text-sm font-medium rounded-md transition-colors',
                                        localFilters.sort_order === 'desc'
                                            ? 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300'
                                            : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600'
                                    ]"
                                >
                                    ↓ Desc
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Filters (Toggles) -->
                    <div class="filter-group">
                        <label class="filter-label">Additional Options</label>
                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input
                                    v-model="localFilters.has_mvp"
                                    type="checkbox"
                                    class="rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500 dark:bg-gray-700"
                                    @change="updateFilter('has_mvp', $event.target.checked || null)"
                                />
                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Has MVP</span>
                            </label>
                            <label class="flex items-center">
                                <input
                                    v-model="localFilters.verified"
                                    type="checkbox"
                                    class="rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500 dark:bg-gray-700"
                                    @change="updateFilter('verified', $event.target.checked || null)"
                                />
                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Verified Only</span>
                            </label>
                            <label class="flex items-center">
                                <input
                                    v-model="localFilters.accepting_pitches"
                                    type="checkbox"
                                    class="rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500 dark:bg-gray-700"
                                    @change="updateFilter('accepting_pitches', $event.target.checked || null)"
                                />
                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Accepting Pitches</span>
                            </label>
                        </div>
                    </div>

                    <!-- Quick Filter Presets -->
                    <div class="filter-group md:col-span-2 lg:col-span-3 xl:col-span-4">
                        <label class="filter-label">Quick Filters</label>
                        <div class="flex flex-wrap gap-2">
                            <button
                                v-for="preset in filterPresets"
                                :key="preset.name"
                                @click="applyPreset(preset)"
                                class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                            >
                                {{ preset.name }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, ref, reactive, watch } from 'vue'
import { 
    AdjustmentsHorizontalIcon, 
    ChevronDownIcon,
    XMarkIcon 
} from '@heroicons/vue/24/outline'
import FilterSelect from '@/Components/Search/FilterSelect.vue'

const props = defineProps({
    filters: {
        type: Object,
        default: () => ({})
    },
    filterOptions: {
        type: Object,
        default: () => ({})
    }
})

const emit = defineEmits(['update-filters', 'clear-filters'])

const showMobileFilters = ref(false)
const localFilters = reactive({ ...props.filters })

// Filter options
const fundingStatusOptions = [
    { value: 'seeking', label: 'Seeking Funding' },
    { value: 'funded', label: 'Recently Funded' },
    { value: 'not_seeking', label: 'Not Seeking' }
]

const sortOptions = [
    { value: 'created_at', label: 'Most Recent' },
    { value: 'funding_raised', label: 'Funding Raised' },
    { value: 'investment_count', label: 'Investment Count' },
    { value: 'title', label: 'Name (A-Z)' }
]

const filterPresets = [
    {
        name: 'Early Stage Startups',
        filters: {
            stages: ['pre_seed', 'seed'],
            funding_status: 'seeking',
            has_mvp: true
        }
    },
    {
        name: 'Growth Stage',
        filters: {
            stages: ['series_a', 'series_b'],
            funding_status: 'seeking'
        }
    },
    {
        name: 'Tech Startups',
        filters: {
            industries: ['Technology', 'Software', 'AI/ML'],
            has_mvp: true
        }
    },
    {
        name: 'Active Investors',
        filters: {
            verified: true,
            accepting_pitches: true
        }
    }
]

// Computed properties
const activeFilters = computed(() => {
    const active = {}
    for (const [key, value] of Object.entries(localFilters)) {
        if (value !== null && value !== undefined && value !== '' && 
            (Array.isArray(value) ? value.length > 0 : true)) {
            active[key] = value
        }
    }
    return active
})

const activeFiltersCount = computed(() => {
    return Object.keys(activeFilters.value).length
})

// Methods
const updateFilter = (key, value) => {
    if (value === '' || value === null || (Array.isArray(value) && value.length === 0)) {
        delete localFilters[key]
    } else {
        localFilters[key] = value
    }
    
    emit('update-filters', { ...localFilters })
}

const removeFilter = (key, item = null) => {
    if (item && Array.isArray(localFilters[key])) {
        localFilters[key] = localFilters[key].filter(v => v !== item)
        if (localFilters[key].length === 0) {
            delete localFilters[key]
        }
    } else {
        delete localFilters[key]
    }
    
    emit('update-filters', { ...localFilters })
}

const clearAllFilters = () => {
    Object.keys(localFilters).forEach(key => {
        delete localFilters[key]
    })
    emit('clear-filters')
}

const applyPreset = (preset) => {
    Object.assign(localFilters, preset.filters)
    emit('update-filters', { ...localFilters })
}

const getFilterLabel = (key, value) => {
    switch (key) {
        case 'industries':
            return value
        case 'stages':
            const stage = props.filterOptions.stages?.find(s => s.value === value)
            return stage?.label || value
        case 'location':
            return value
        case 'funding_status':
            const status = fundingStatusOptions.find(s => s.value === value)
            return status?.label || value
        case 'sort_by':
            const sort = sortOptions.find(s => s.value === value)
            return `Sort: ${sort?.label || value}`
        case 'sort_order':
            return value === 'asc' ? 'Ascending' : 'Descending'
        case 'has_mvp':
            return 'Has MVP'
        case 'verified':
            return 'Verified'
        case 'accepting_pitches':
            return 'Accepting Pitches'
        case 'min_funding':
            return `Min: $${parseInt(value).toLocaleString()}`
        case 'max_funding':
            return `Max: $${parseInt(value).toLocaleString()}`
        default:
            return value
    }
}

// Watch for prop changes
watch(() => props.filters, (newFilters) => {
    Object.assign(localFilters, newFilters)
}, { deep: true })
</script>

<style scoped>
.filter-group {
    @apply space-y-2;
}

.filter-label {
    @apply block text-sm font-medium text-gray-700 dark:text-gray-300;
}

.filter-input {
    @apply block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent;
}

.filter-tag {
    @apply inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200;
}

.filters-container {
    @apply transition-all duration-200;
}

@media (max-width: 1023px) {
    .filters-container {
        @apply border-t border-gray-200 dark:border-gray-700 pt-4 mt-4;
    }
}
</style>