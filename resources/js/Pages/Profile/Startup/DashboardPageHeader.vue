<template>
  <el-page-header @back="onBack">
    <div class="header-container">
      <div class="header-content">
        <slot name="content" />
      </div>
      <div class="header-extra" v-if="hasExtraSlot">
        <slot name="extra" />
      </div>
    </div>
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
