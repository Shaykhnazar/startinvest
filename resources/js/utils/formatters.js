/**
 * Format currency values
 * @param {number} amount - The amount to format
 * @param {string} currency - The currency symbol (default: '$')
 * @returns {string} Formatted currency string
 */
export const formatCurrency = (amount, currency = '$') => {
    if (amount === null || amount === undefined || isNaN(amount)) {
        return `${currency}0`
    }

    const numAmount = Number(amount)

    if (numAmount >= 1_000_000_000) {
        return `${currency}${(numAmount / 1_000_000_000).toFixed(1)}B`
    }
    
    if (numAmount >= 1_000_000) {
        return `${currency}${(numAmount / 1_000_000).toFixed(1)}M`
    }
    
    if (numAmount >= 1_000) {
        return `${currency}${(numAmount / 1_000).toFixed(1)}K`
    }
    
    return `${currency}${numAmount.toLocaleString('en-US', { 
        minimumFractionDigits: 0, 
        maximumFractionDigits: 0 
    })}`
}

/**
 * Format date strings
 * @param {string|Date} date - The date to format
 * @param {object} options - Formatting options
 * @returns {string} Formatted date string
 */
export const formatDate = (date, options = {}) => {
    if (!date) return 'Unknown date'

    try {
        const dateObj = date instanceof Date ? date : new Date(date)
        
        if (isNaN(dateObj.getTime())) {
            return 'Invalid date'
        }

        const defaultOptions = {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            ...options
        }

        return dateObj.toLocaleDateString('en-US', defaultOptions)
    } catch (error) {
        console.warn('Date formatting error:', error)
        return 'Invalid date'
    }
}

/**
 * Format date relative to now (e.g., "2 days ago")
 * @param {string|Date} date - The date to format
 * @returns {string} Relative date string
 */
export const formatRelativeDate = (date) => {
    if (!date) return 'Unknown'

    try {
        const dateObj = date instanceof Date ? date : new Date(date)
        const now = new Date()
        const diffInSeconds = Math.floor((now - dateObj) / 1000)

        if (diffInSeconds < 60) return 'Just now'
        if (diffInSeconds < 3600) return `${Math.floor(diffInSeconds / 60)} minutes ago`
        if (diffInSeconds < 86400) return `${Math.floor(diffInSeconds / 3600)} hours ago`
        if (diffInSeconds < 2592000) return `${Math.floor(diffInSeconds / 86400)} days ago`
        if (diffInSeconds < 31536000) return `${Math.floor(diffInSeconds / 2592000)} months ago`
        
        return `${Math.floor(diffInSeconds / 31536000)} years ago`
    } catch (error) {
        console.warn('Relative date formatting error:', error)
        return 'Unknown'
    }
}

/**
 * Format percentage values
 * @param {number} value - The percentage value (0-100)
 * @param {number} decimals - Number of decimal places
 * @returns {string} Formatted percentage string
 */
export const formatPercentage = (value, decimals = 1) => {
    if (value === null || value === undefined || isNaN(value)) {
        return '0%'
    }
    
    return `${Number(value).toFixed(decimals)}%`
}

/**
 * Format large numbers with appropriate suffixes
 * @param {number} num - The number to format
 * @param {number} decimals - Number of decimal places
 * @returns {string} Formatted number string
 */
export const formatNumber = (num, decimals = 1) => {
    if (num === null || num === undefined || isNaN(num)) {
        return '0'
    }

    const numValue = Number(num)

    if (numValue >= 1_000_000_000) {
        return `${(numValue / 1_000_000_000).toFixed(decimals)}B`
    }
    
    if (numValue >= 1_000_000) {
        return `${(numValue / 1_000_000).toFixed(decimals)}M`
    }
    
    if (numValue >= 1_000) {
        return `${(numValue / 1_000).toFixed(decimals)}K`
    }
    
    return numValue.toLocaleString('en-US')
}

/**
 * Truncate text to specified length
 * @param {string} text - The text to truncate
 * @param {number} length - Maximum length
 * @param {string} suffix - Suffix to add (default: '...')
 * @returns {string} Truncated text
 */
export const truncateText = (text, length = 100, suffix = '...') => {
    if (!text || typeof text !== 'string') return ''
    if (text.length <= length) return text
    
    return text.substring(0, length).trim() + suffix
}

/**
 * Format file size
 * @param {number} bytes - File size in bytes
 * @param {number} decimals - Number of decimal places
 * @returns {string} Formatted file size
 */
export const formatFileSize = (bytes, decimals = 2) => {
    if (bytes === 0) return '0 Bytes'
    
    const k = 1024
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB']
    const i = Math.floor(Math.log(bytes) / Math.log(k))
    
    return `${parseFloat((bytes / Math.pow(k, i)).toFixed(decimals))} ${sizes[i]}`
}

/**
 * Format duration in seconds to human readable format
 * @param {number} seconds - Duration in seconds
 * @returns {string} Formatted duration
 */
export const formatDuration = (seconds) => {
    if (!seconds || seconds < 0) return '0s'
    
    const hours = Math.floor(seconds / 3600)
    const minutes = Math.floor((seconds % 3600) / 60)
    const secs = Math.floor(seconds % 60)
    
    if (hours > 0) {
        return `${hours}h ${minutes}m`
    } else if (minutes > 0) {
        return `${minutes}m ${secs}s`
    } else {
        return `${secs}s`
    }
}

/**
 * Format phone numbers
 * @param {string} phone - Phone number to format
 * @returns {string} Formatted phone number
 */
export const formatPhoneNumber = (phone) => {
    if (!phone) return ''
    
    // Remove all non-digits
    const cleaned = phone.replace(/\D/g, '')
    
    // Format US phone numbers
    if (cleaned.length === 10) {
        return `(${cleaned.slice(0, 3)}) ${cleaned.slice(3, 6)}-${cleaned.slice(6)}`
    }
    
    if (cleaned.length === 11 && cleaned[0] === '1') {
        return `+1 (${cleaned.slice(1, 4)}) ${cleaned.slice(4, 7)}-${cleaned.slice(7)}`
    }
    
    // Return original if we can't format it
    return phone
}

/**
 * Capitalize first letter of each word
 * @param {string} str - String to capitalize
 * @returns {string} Capitalized string
 */
export const capitalizeWords = (str) => {
    if (!str || typeof str !== 'string') return ''
    
    return str.replace(/\w\S*/g, (txt) => 
        txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase()
    )
}

/**
 * Convert camelCase or snake_case to Title Case
 * @param {string} str - String to convert
 * @returns {string} Title case string
 */
export const toTitleCase = (str) => {
    if (!str || typeof str !== 'string') return ''
    
    return str
        .replace(/([A-Z])/g, ' $1') // Add space before capital letters
        .replace(/_/g, ' ') // Replace underscores with spaces
        .replace(/^./, (match) => match.toUpperCase()) // Capitalize first letter
        .replace(/\s+/g, ' ') // Remove extra spaces
        .trim()
}