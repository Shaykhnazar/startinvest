<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
  <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper" v-show="message">
    {{ message }}
  </p>
</template>
