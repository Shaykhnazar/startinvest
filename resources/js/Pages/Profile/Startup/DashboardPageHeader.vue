<template>
  <el-page-header @back="onBack">
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
import { router, usePage } from '@inertiajs/vue3'
const props = defineProps(['hasExtraSlot'])

const page = usePage()

const onBack = () => {
  window.history.back()
}
</script>
