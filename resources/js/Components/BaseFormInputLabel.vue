<script setup>
defineProps({
    title: {
        type: String,
    },
});
</script>

<template>
  <label class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
    <span v-if="title">{{ title }}</span>
    <span v-else><slot /></span>
  </label>
</template>
