<template>
  <el-page-header>
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
const props = defineProps(['hasExtraSlot'])
</script>
