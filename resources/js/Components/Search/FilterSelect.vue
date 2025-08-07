<template>
    <div class="filter-select relative" ref="containerRef">
        <!-- Single Select -->
        <button
            v-if="!multiple"
            @click="toggleDropdown"
            class="filter-select-button"
            :class="{ 'filter-select-button--open': isOpen }"
        >
            <span class="filter-select-text">
                {{ selectedLabel || placeholder }}
            </span>
            <ChevronDownIcon 
                :class="[
                    'h-4 w-4 text-gray-400 transition-transform',
                    isOpen ? 'transform rotate-180' : ''
                ]"
            />
        </button>

        <!-- Multiple Select -->
        <div
            v-else
            @click="toggleDropdown"
            class="filter-select-button cursor-pointer"
            :class="{ 'filter-select-button--open': isOpen }"
        >
            <div v-if="selectedValues.length === 0" class="filter-select-text">
                {{ placeholder }}
            </div>
            <div v-else class="flex flex-wrap gap-1 py-1">
                <span
                    v-for="value in selectedValues.slice(0, 2)"
                    :key="value"
                    class="inline-flex items-center px-2 py-1 rounded text-xs bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200"
                >
                    {{ getOptionLabel(value) }}
                    <button
                        @click.stop="removeValue(value)"
                        class="ml-1 hover:text-red-600"
                    >
                        <XMarkIcon class="h-3 w-3" />
                    </button>
                </span>
                <span 
                    v-if="selectedValues.length > 2"
                    class="inline-flex items-center px-2 py-1 rounded text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300"
                >
                    +{{ selectedValues.length - 2 }} more
                </span>
            </div>
            <ChevronDownIcon 
                :class="[
                    'h-4 w-4 text-gray-400 transition-transform flex-shrink-0',
                    isOpen ? 'transform rotate-180' : ''
                ]"
            />
        </div>

        <!-- Dropdown -->
        <div
            v-if="isOpen"
            class="filter-select-dropdown"
        >
            <!-- Search Input -->
            <div v-if="searchable && options.length > 10" class="p-2 border-b border-gray-200 dark:border-gray-600">
                <input
                    ref="searchRef"
                    v-model="searchQuery"
                    type="text"
                    placeholder="Search options..."
                    class="w-full px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-1 focus:ring-blue-500"
                    @click.stop
                />
            </div>

            <!-- Options List -->
            <div class="max-h-48 overflow-y-auto">
                <div
                    v-for="option in filteredOptions"
                    :key="getOptionValue(option)"
                    @click="selectOption(option)"
                    class="filter-select-option"
                    :class="{
                        'filter-select-option--selected': isSelected(option),
                        'filter-select-option--highlighted': highlightedIndex === filteredOptions.indexOf(option)
                    }"
                >
                    <div class="flex items-center">
                        <input
                            v-if="multiple"
                            type="checkbox"
                            :checked="isSelected(option)"
                            class="mr-3 rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500 dark:bg-gray-700"
                            @click.stop
                        />
                        <span class="flex-1">{{ getOptionLabel(option) }}</span>
                    </div>
                </div>

                <!-- No Options Message -->
                <div v-if="filteredOptions.length === 0" class="px-3 py-2 text-sm text-gray-500 text-center">
                    {{ searchQuery ? 'No matching options' : 'No options available' }}
                </div>
            </div>

            <!-- Actions (for multiple select) -->
            <div v-if="multiple && options.length > 5" class="border-t border-gray-200 dark:border-gray-600 p-2 flex justify-between">
                <button
                    @click="selectAll"
                    class="text-xs text-blue-600 hover:text-blue-700 font-medium"
                >
                    Select All
                </button>
                <button
                    @click="clearAll"
                    class="text-xs text-gray-500 hover:text-gray-700 font-medium"
                >
                    Clear All
                </button>
            </div>
        </div>

        <!-- Overlay -->
        <div 
            v-if="isOpen"
            @click="closeDropdown"
            class="fixed inset-0 z-10"
        ></div>
    </div>
</template>

<script setup>
import { computed, ref, nextTick, onMounted, onUnmounted, watch } from 'vue'
import { ChevronDownIcon, XMarkIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
    modelValue: {
        type: [String, Number, Array],
        default: () => []
    },
    options: {
        type: Array,
        default: () => []
    },
    placeholder: {
        type: String,
        default: 'Select option...'
    },
    multiple: {
        type: Boolean,
        default: false
    },
    searchable: {
        type: Boolean,
        default: true
    },
    clearable: {
        type: Boolean,
        default: true
    }
})

const emit = defineEmits(['update:modelValue'])

const containerRef = ref(null)
const searchRef = ref(null)
const isOpen = ref(false)
const searchQuery = ref('')
const highlightedIndex = ref(-1)

// Computed properties
const selectedValues = computed(() => {
    if (props.multiple) {
        return Array.isArray(props.modelValue) ? props.modelValue : []
    }
    return props.modelValue ? [props.modelValue] : []
})

const selectedLabel = computed(() => {
    if (props.multiple || !props.modelValue) return null
    return getOptionLabel(props.modelValue)
})

const filteredOptions = computed(() => {
    if (!searchQuery.value) return props.options
    
    const query = searchQuery.value.toLowerCase()
    return props.options.filter(option => {
        const label = getOptionLabel(option).toLowerCase()
        const value = getOptionValue(option).toString().toLowerCase()
        return label.includes(query) || value.includes(query)
    })
})

// Methods
const getOptionValue = (option) => {
    return typeof option === 'object' ? option.value : option
}

const getOptionLabel = (option) => {
    if (typeof option === 'object') {
        return option.label || option.name || option.value
    }
    return option
}

const isSelected = (option) => {
    const value = getOptionValue(option)
    return selectedValues.value.includes(value)
}

const toggleDropdown = async () => {
    isOpen.value = !isOpen.value
    
    if (isOpen.value) {
        await nextTick()
        if (searchRef.value && props.searchable) {
            searchRef.value.focus()
        }
    }
}

const closeDropdown = () => {
    isOpen.value = false
    searchQuery.value = ''
    highlightedIndex.value = -1
}

const selectOption = (option) => {
    const value = getOptionValue(option)
    
    if (props.multiple) {
        const newValues = [...selectedValues.value]
        const index = newValues.indexOf(value)
        
        if (index > -1) {
            newValues.splice(index, 1)
        } else {
            newValues.push(value)
        }
        
        emit('update:modelValue', newValues)
    } else {
        emit('update:modelValue', value)
        closeDropdown()
    }
}

const removeValue = (value) => {
    if (props.multiple) {
        const newValues = selectedValues.value.filter(v => v !== value)
        emit('update:modelValue', newValues)
    }
}

const selectAll = () => {
    if (props.multiple) {
        const allValues = filteredOptions.value.map(option => getOptionValue(option))
        emit('update:modelValue', allValues)
    }
}

const clearAll = () => {
    emit('update:modelValue', props.multiple ? [] : null)
}

const handleKeydown = (event) => {
    if (!isOpen.value) return
    
    const { key } = event
    const optionsLength = filteredOptions.value.length
    
    switch (key) {
        case 'Escape':
            closeDropdown()
            break
        case 'ArrowDown':
            event.preventDefault()
            highlightedIndex.value = (highlightedIndex.value + 1) % optionsLength
            break
        case 'ArrowUp':
            event.preventDefault()
            highlightedIndex.value = highlightedIndex.value <= 0 ? optionsLength - 1 : highlightedIndex.value - 1
            break
        case 'Enter':
            event.preventDefault()
            if (highlightedIndex.value >= 0 && highlightedIndex.value < optionsLength) {
                selectOption(filteredOptions.value[highlightedIndex.value])
            }
            break
    }
}

// Lifecycle
onMounted(() => {
    document.addEventListener('keydown', handleKeydown)
})

onUnmounted(() => {
    document.removeEventListener('keydown', handleKeydown)
})

// Watch for search query changes to reset highlighted index
watch(searchQuery, () => {
    highlightedIndex.value = -1
})
</script>

<style scoped>
.filter-select {
    @apply relative;
}

.filter-select-button {
    @apply w-full flex items-center justify-between px-3 py-2 text-left bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-colors;
}

.filter-select-button--open {
    @apply ring-1 ring-blue-500 border-blue-500;
}

.filter-select-text {
    @apply block truncate text-gray-900 dark:text-white;
}

.filter-select-button .filter-select-text:empty::before {
    content: attr(data-placeholder);
    @apply text-gray-500 dark:text-gray-400;
}

.filter-select-dropdown {
    @apply absolute z-20 w-full mt-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md shadow-lg;
}

.filter-select-option {
    @apply px-3 py-2 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors;
}

.filter-select-option--selected {
    @apply bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300;
}

.filter-select-option--highlighted {
    @apply bg-gray-100 dark:bg-gray-700;
}

/* Custom scrollbar for options */
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