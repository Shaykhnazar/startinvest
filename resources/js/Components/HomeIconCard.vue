<!-- CardItem.vue -->
<template>
  <a :href="route(item.route)" class="min-w-[230px] max-w-[230px] group p-4 inline-flex flex-col justify-center items-center text-center bg-white border border-stone-200 rounded-xl shadow-sm hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-800 dark:border-neutral-700 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
    <icon-svg :name="item.icon"></icon-svg>
    <div class="mt-3">
      <h3 class="text-sm font-semibold text-stone-800 group-hover:text-green-600 group-focus:text-green-600 dark:text-neutral-200 dark:group-hover:text-green-500 dark:group-focus:text-green-500">
        {{ item.title }}
      </h3>
      <p class="text-[13px] text-stone-500 dark:text-neutral-500">
        {{ item.short }}
      </p>
    </div>
  </a>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { defineProps } from 'vue'
import IconSvg from '@/Components/svg-icons/icon.vue'

const props = defineProps({
  item: Object
})
</script>
