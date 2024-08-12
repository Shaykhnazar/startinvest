<template>
  <el-page-header @back="onBack" title="Orqaga">
    <template #content>
      <div class="flex items-center">
        <slot name="content" />
      </div>
    </template>
    <template #extra v-if="hasExtraSlot">
      <div class="flex items-center">
        <slot name="extra" />
      </div>
    </template>
  </el-page-header>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
const props = defineProps(['hasExtraSlot'])

const page = usePage()

const onBack = () => {
  window.history.back()
}
</script>

<style scoped>
.header-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.header-content {
  flex: 1;
}

.header-extra {
  display: flex;
  align-items: center;
}
</style>
