<script setup>
defineProps(['placement', 'content'])

const getEffect = () => {
  if (localStorage.getItem('hs_theme') === 'light') {
    return "light"
  }

  return "dark"
}
</script>

<template>
  <div class="hs-tooltip inline-block">
    <slot/>
    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
      {{ content }}
    </span>
  </div>
</template>

<style scoped>

</style>
