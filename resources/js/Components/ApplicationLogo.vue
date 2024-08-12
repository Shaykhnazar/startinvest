<template>
  <img
    style="width: 100px;"
    src="/images/logo.svg"
    :class="customClass"
    alt="Element logo"
  />
</template>
<script setup>
defineProps({
  customClass: ''
})
</script>
