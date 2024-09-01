<template>
  <component :is="icon" :class="{'fill-current': useClassFillCurrent, svgClass}" aria-hidden="true"/>
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
  useClassFillCurrent: false,
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
</style>
