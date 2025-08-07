<template>
    <div class="search-results-grid">
        <!-- Grid View -->
        <div 
            v-if="viewMode === 'grid'"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
        >
            <!-- Startup Cards -->
            <div 
                v-for="item in items" 
                :key="`${type}-${item.id}`"
                class="result-card"
            >
                <component 
                    :is="getCardComponent(type)" 
                    :item="item" 
                    :type="type"
                    @click="handleItemClick(item)"
                />
            </div>
        </div>

        <!-- List View -->
        <div 
            v-else
            class="space-y-4"
        >
            <div 
                v-for="item in items" 
                :key="`${type}-${item.id}`"
                class="result-list-item"
            >
                <component 
                    :is="getListComponent(type)" 
                    :item="item" 
                    :type="type"
                    @click="handleItemClick(item)"
                />
            </div>
        </div>

        <!-- Empty State -->
        <div v-if="items.length === 0" class="text-center py-8">
            <component :is="getEmptyIcon(type)" class="w-12 h-12 mx-auto text-gray-300 mb-4" />
            <p class="text-gray-500">No {{ type.replace('_', ' ') }} found matching your criteria</p>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import { 
    RocketLaunchIcon, 
    UsersIcon, 
    CurrencyDollarIcon 
} from '@heroicons/vue/24/outline'
import StartupCard from '@/Components/Search/Results/StartupCard.vue'
import InvestorCard from '@/Components/Search/Results/InvestorCard.vue'
import InvestmentRoundCard from '@/Components/Search/Results/InvestmentRoundCard.vue'
import StartupListItem from '@/Components/Search/Results/StartupListItem.vue'
import InvestorListItem from '@/Components/Search/Results/InvestorListItem.vue'
import InvestmentRoundListItem from '@/Components/Search/Results/InvestmentRoundListItem.vue'

const props = defineProps({
    items: {
        type: Array,
        required: true
    },
    type: {
        type: String,
        required: true,
        validator: value => ['startup', 'investor', 'investment_round'].includes(value)
    },
    viewMode: {
        type: String,
        default: 'grid',
        validator: value => ['grid', 'list'].includes(value)
    }
})

const emit = defineEmits(['item-click'])

const getCardComponent = (type) => {
    const components = {
        startup: StartupCard,
        investor: InvestorCard,
        investment_round: InvestmentRoundCard
    }
    return components[type] || StartupCard
}

const getListComponent = (type) => {
    const components = {
        startup: StartupListItem,
        investor: InvestorListItem,
        investment_round: InvestmentRoundListItem
    }
    return components[type] || StartupListItem
}

const getEmptyIcon = (type) => {
    const icons = {
        startup: RocketLaunchIcon,
        investor: UsersIcon,
        investment_round: CurrencyDollarIcon
    }
    return icons[type] || RocketLaunchIcon
}

const handleItemClick = (item) => {
    emit('item-click', { item, type: props.type })
    
    // Navigate to item detail page
    const routes = {
        startup: 'startups.show',
        investor: 'investors.show',
        investment_round: 'investment-rounds.show'
    }
    
    if (routes[props.type]) {
        router.visit(route(routes[props.type], item.id))
    }
}
</script>

<style scoped>
.search-results-grid {
    @apply w-full;
}

.result-card {
    @apply transition-transform hover:scale-105 cursor-pointer;
}

.result-list-item {
    @apply cursor-pointer;
}

.result-card:hover,
.result-list-item:hover {
    @apply shadow-lg;
}
</style>