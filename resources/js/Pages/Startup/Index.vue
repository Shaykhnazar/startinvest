<template>
  <App>
    <template #header>
      <Head title="Startups" />
    </template>
    <el-backtop :right="50" :bottom="50" />

    <el-container>
      <el-main>
        <!-- FILTER SECTION -->
        <div class="flex mb-4">
          <el-input
            v-model="filters.search"
            placeholder="Search startups"
            class="mr-4"
            @input="applyFilters"
          />
          <el-select
            v-model="filters.category"
            placeholder="Select category"
            @change="applyFilters"
            class="w-full"
          >
            <el-option
              v-for="category in categories"
              :key="category"
              :label="category"
              :value="category"
            />
          </el-select>
        </div>

        <!-- STARTUP LIST -->
        <template v-for="startup in filteredStartups" :key="startup.id">
          <StartupCard
            :startup="startup"
          />
        </template>

        <div ref="landmark"></div>
      </el-main>
    </el-container>
  </App>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import { Head } from '@inertiajs/vue3';
import App from '@/Layouts/App.vue';
import StartupCard from '@/components/StartupCard.vue';
import { useUserStore } from '@/stores/UserStore.js';
import { useElMessage } from '@/Composables/helpers.js';
import { useInfiniteScroll } from '@/Composables/useInfiniteScroll.js';
import api from '@/services/api';

const props = defineProps({
  startups: {
    type: Object,
    required: true
  }
});

const landmark = ref(null);
const { info, success } = useElMessage();
const { items } = useInfiniteScroll('startups', landmark);
const userStore = useUserStore();
const submitting = ref(false);

const filters = ref({
  search: '',
  category: ''
});

const categories = ['Tech', 'Health', 'Finance', 'Education'];

const filteredStartups = computed(() => {
  return items.value.filter(startup => {
    return (
      (filters.value.search === '' || startup.title.toLowerCase().includes(filters.value.search.toLowerCase())) &&
      (filters.value.category === '' || startup.category === filters.value.category)
    );
  });
});

watch(filters, () => {
  applyFilters();
}, { deep: true });

const applyFilters = () => {
  // Currently refetching data, this can be optimized to filter locally or backend support for filtering.
};

</script>

<style lang="scss" scoped>
</style>
