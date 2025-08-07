import { ref, reactive } from 'vue'
import axios from 'axios'

export function useSearch() {
    const isLoading = ref(false)
    const suggestions = ref({})
    const recentSearches = ref([])
    const savedSearches = ref([])

    // Error state
    const error = ref(null)

    /**
     * Get search suggestions
     * @param {string} query - Search query
     * @param {number} limit - Maximum number of suggestions
     * @returns {Promise<Object>} Search suggestions
     */
    const getSuggestions = async (query, limit = 5) => {
        if (!query || query.length < 2) {
            suggestions.value = {}
            return suggestions.value
        }

        try {
            isLoading.value = true
            error.value = null

            const response = await axios.get(route('search.suggestions'), {
                params: { q: query, limit }
            })

            suggestions.value = response.data
            return suggestions.value

        } catch (err) {
            console.error('Error fetching search suggestions:', err)
            error.value = err.response?.data?.message || 'Failed to fetch suggestions'
            suggestions.value = {}
            return suggestions.value

        } finally {
            isLoading.value = false
        }
    }

    /**
     * Perform a search
     * @param {string} query - Search query
     * @param {Object} filters - Search filters
     * @param {number} perPage - Results per page
     * @returns {Promise<Object>} Search results
     */
    const search = async (query, filters = {}, perPage = 12) => {
        try {
            isLoading.value = true
            error.value = null

            const response = await axios.get(route('search.index'), {
                params: {
                    q: query,
                    per_page: perPage,
                    ...filters
                }
            })

            // Save to recent searches
            if (query) {
                saveRecentSearch(query)
            }

            return response.data

        } catch (err) {
            console.error('Error performing search:', err)
            error.value = err.response?.data?.message || 'Search failed'
            throw err

        } finally {
            isLoading.value = false
        }
    }

    /**
     * Search specific entity type
     * @param {string} type - Entity type (startups, investors, investment_rounds)
     * @param {string} query - Search query
     * @param {Object} filters - Search filters
     * @param {number} perPage - Results per page
     * @returns {Promise<Object>} Search results
     */
    const searchByType = async (type, query, filters = {}, perPage = 12) => {
        const endpoints = {
            startups: 'search.startups',
            investors: 'search.investors',
            investment_rounds: 'search.investment-rounds'
        }

        const endpoint = endpoints[type]
        if (!endpoint) {
            throw new Error(`Invalid search type: ${type}`)
        }

        try {
            isLoading.value = true
            error.value = null

            const response = await axios.get(route(endpoint), {
                params: {
                    q: query,
                    per_page: perPage,
                    ...filters
                }
            })

            if (query) {
                saveRecentSearch(query)
            }

            return response.data

        } catch (err) {
            console.error(`Error searching ${type}:`, err)
            error.value = err.response?.data?.message || 'Search failed'
            throw err

        } finally {
            isLoading.value = false
        }
    }

    /**
     * Perform advanced search
     * @param {Object} criteria - Advanced search criteria
     * @returns {Promise<Object>} Search results
     */
    const advancedSearch = async (criteria) => {
        try {
            isLoading.value = true
            error.value = null

            const response = await axios.post(route('search.advanced'), {
                criteria
            })

            return response.data

        } catch (err) {
            console.error('Error performing advanced search:', err)
            error.value = err.response?.data?.message || 'Advanced search failed'
            throw err

        } finally {
            isLoading.value = false
        }
    }

    /**
     * Get filter options
     * @returns {Promise<Object>} Available filter options
     */
    const getFilterOptions = async () => {
        try {
            const response = await axios.get(route('search.filter-options'))
            return response.data

        } catch (err) {
            console.error('Error fetching filter options:', err)
            error.value = err.response?.data?.message || 'Failed to fetch filter options'
            return {}
        }
    }

    /**
     * Save a search for later
     * @param {string} query - Search query
     * @param {Object} filters - Search filters
     * @param {string} name - Optional name for the search
     * @returns {Promise<void>}
     */
    const saveSearch = async (query, filters = {}, name = null) => {
        try {
            await axios.post(route('search.save'), {
                query,
                filters,
                name
            })

            // Refresh saved searches
            await getSavedSearches()

        } catch (err) {
            console.error('Error saving search:', err)
            error.value = err.response?.data?.message || 'Failed to save search'
            throw err
        }
    }

    /**
     * Get saved searches for the current user
     * @returns {Promise<Array>} Saved searches
     */
    const getSavedSearches = async () => {
        try {
            const response = await axios.get(route('search.saved'))
            savedSearches.value = response.data
            return savedSearches.value

        } catch (err) {
            console.error('Error fetching saved searches:', err)
            savedSearches.value = []
            return savedSearches.value
        }
    }

    /**
     * Get recent searches
     * @param {number} limit - Maximum number of recent searches
     * @returns {Promise<Array>} Recent searches
     */
    const getRecentSearches = async (limit = 10) => {
        try {
            const response = await axios.get(route('search.recent'), {
                params: { limit }
            })

            recentSearches.value = response.data
            return recentSearches.value

        } catch (err) {
            console.error('Error fetching recent searches:', err)
            // Fall back to local storage
            loadRecentSearchesFromStorage()
            return recentSearches.value
        }
    }

    /**
     * Save search to recent searches (localStorage)
     * @param {string} query - Search query
     */
    const saveRecentSearch = (query) => {
        if (!query || query.trim() === '') return

        try {
            const recent = recentSearches.value.filter(search => search !== query)
            recent.unshift(query)
            
            // Keep only last 10 searches
            recentSearches.value = recent.slice(0, 10)
            
            // Save to localStorage
            localStorage.setItem('recent_searches', JSON.stringify(recentSearches.value))

        } catch (err) {
            console.warn('Failed to save recent search:', err)
        }
    }

    /**
     * Load recent searches from localStorage
     */
    const loadRecentSearchesFromStorage = () => {
        try {
            const stored = localStorage.getItem('recent_searches')
            if (stored) {
                recentSearches.value = JSON.parse(stored)
            }
        } catch (err) {
            console.warn('Failed to load recent searches:', err)
            recentSearches.value = []
        }
    }

    /**
     * Clear recent searches
     */
    const clearRecentSearches = () => {
        recentSearches.value = []
        try {
            localStorage.removeItem('recent_searches')
        } catch (err) {
            console.warn('Failed to clear recent searches:', err)
        }
    }

    /**
     * Delete a saved search
     * @param {number} searchId - ID of the search to delete
     * @returns {Promise<void>}
     */
    const deleteSavedSearch = async (searchId) => {
        try {
            await axios.delete(route('search.delete', searchId))
            
            // Remove from local array
            savedSearches.value = savedSearches.value.filter(search => search.id !== searchId)

        } catch (err) {
            console.error('Error deleting saved search:', err)
            error.value = err.response?.data?.message || 'Failed to delete search'
            throw err
        }
    }

    /**
     * Build search URL with parameters
     * @param {string} query - Search query
     * @param {Object} filters - Search filters
     * @returns {string} Search URL
     */
    const buildSearchUrl = (query, filters = {}) => {
        const params = new URLSearchParams()
        
        if (query) params.append('q', query)
        
        Object.entries(filters).forEach(([key, value]) => {
            if (value !== null && value !== undefined && value !== '') {
                if (Array.isArray(value)) {
                    value.forEach(v => params.append(`${key}[]`, v))
                } else {
                    params.append(key, value)
                }
            }
        })

        return route('search.index') + '?' + params.toString()
    }

    // Initialize recent searches from localStorage
    loadRecentSearchesFromStorage()

    return {
        // State
        isLoading,
        suggestions,
        recentSearches,
        savedSearches,
        error,

        // Methods
        getSuggestions,
        search,
        searchByType,
        advancedSearch,
        getFilterOptions,
        saveSearch,
        getSavedSearches,
        getRecentSearches,
        saveRecentSearch,
        clearRecentSearches,
        deleteSavedSearch,
        buildSearchUrl
    }
}