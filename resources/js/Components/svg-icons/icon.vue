<template>
  <component :is="icon" :class="svgClass" aria-hidden="true" class="fill-current" />
</template>

<script setup>
import { defineAsyncComponent, computed } from 'vue'

const props = defineProps({
  name: {
    type: String,
    required: true,
  },
  className: {
    type: String,
    default: '',
  },
})

const svgClass = computed(() => {
  if (props.className) {
    return 'svg-icon ' + props.className
  } else {
    return 'svg-icon'
  }
})

const icon = defineAsyncComponent(() => import(`../../icons/svg/${props.name}.svg`))
</script>

<style scoped>
.svg-icon {
  vertical-align: -0.6em;
  fill: currentColor;
  overflow: hidden;
}

.table-btn {
  vertical-align: 0;
  margin: 4px 0px 0px 0px;
}
</style>
