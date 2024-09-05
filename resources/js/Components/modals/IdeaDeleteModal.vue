<script setup>
import { ref, reactive, watch } from 'vue';

const emit = defineEmits(['close', 'deleteIdeaHandler']);

const props = defineProps({
  idea: {
    type: [Object, null],
    required: true,
  },
});

// Initialize the idea as an empty object if props.idea is null
const idea = reactive(props.idea || {});

const visible = ref(true);

// Watch for changes in props.idea and update the idea ref accordingly
watch(() => props.idea, (newIdea) => {
  Object.assign(idea, newIdea ?? {});
}, { immediate: true });
</script>

<template>
  <el-dialog v-model="visible" @close="$emit('close', true)" class="bg-white border border-gray-200 shadow-sm rounded-xl text-black dark:text-neutral-200 dark:bg-neutral-800 dark:border-neutral-700">
    <!-- Body -->
    <div class="p-4">
      <h3 id="hs-pro-dtlam-label" class="text-lg font-medium text-gray-800 dark:text-neutral-200">
        Ishonchingiz komilmi?
      </h3>
      <p class="mt-1 text-gray-500 dark:text-neutral-500">
        Haqiqatan ham bu go'yani oʻchirib tashlamoqchimisiz?
      </p>

      <!-- Button Group -->
      <div class="mt-4 flex flex-wrap gap-x-3 gap-y-3">
        <button type="button" @click="$emit('close', true)" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
          Yo'q
        </button>
        <button type="button" @click="$emit('deleteIdeaHandler', idea.id)" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
          Ha
        </button>
      </div>
      <!-- End Button Group -->
    </div>
  </el-dialog>
</template>

<style scoped>

</style>
