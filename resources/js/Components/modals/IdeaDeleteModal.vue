<script setup>
import { defineEmits, ref, reactive, watch } from 'vue';

const props = defineProps({
  idea: {
    type: [Object, null],
    required: true,
  },
  isVisible: {
    type: Boolean,
    default: true,
  }
});

// Initialize the idea as an empty object if props.idea is null
const idea = reactive(props.idea || {});
const visible = ref(true);

const emit = defineEmits(['close', 'deleteIdeaHandler']);

// Watch for changes in props.idea and update the idea ref accordingly
watch(() => props.idea, (newIdea) => {
  if (newIdea) {
    Object.assign(idea, newIdea); // Update properties of the reactive object
  } else {
    Object.keys(idea).forEach(key => delete idea[key]); // Clear the object if newIdea is null
  }
}, { immediate: true });

// Watch for changes in props.visible and update the isVisible ref accordingly
watch(() => props.isVisible, (newVisible) => {
  visible.value = newVisible;
}, { immediate: true });
</script>

<template>
  <!-- Delete Team Alert Modal -->
  <div id="hs-pro-dtlam" :class="{'hidden': visible, 'hs-overlay size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--close-when-click-inside:true] pointer-events-none': true }" role="dialog" tabindex="-1" aria-labelledby="hs-pro-dtlam-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-md sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
      <div class="relative w-full max-h-full overflow-hidden flex flex-col bg-white rounded-xl pointer-events-auto shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-800">
        <!-- Close Button -->
        <div class="absolute top-2 end-4 z-10">
          <button type="button" @click="$emit('close')" class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-pro-dtlam">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
        <!-- End Close Button -->

        <!-- Body -->
        <div class="p-4">
          <h3 id="hs-pro-dtlam-label" class="text-lg font-medium text-gray-800 dark:text-neutral-200">
            Ishonchingiz komilmi?
          </h3>
          <p class="mt-1 text-gray-500 dark:text-neutral-500">
            Haqiqatan ham bu go'yani oʻchirib tashlamoqchimisiz?
          </p>

          <!-- Button Group -->
          <div class="mt-4 flex justify-end gap-x-3">
            <button type="button" @click="$emit('close')" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dtlam">
              Bekor qilish
            </button>
            <button type="button" @click="$emit('deleteIdeaHandler', idea.id)" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
              Ha, ishonchim komil
            </button>
          </div>
          <!-- End Button Group -->
        </div>
        <!-- End Body -->
      </div>
    </div>
  </div>
  <!-- End Delete Team Alert Modal -->
</template>

<style scoped>

</style>
