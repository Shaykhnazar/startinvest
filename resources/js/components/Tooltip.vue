<script setup>
defineProps(['placement', 'content'])
</script>

<template>
  <el-tooltip
    class="box-item"
    effect="dark"
    :content="content"
    :placement="placement"
  >
    <slot/>
  </el-tooltip>
</template>

<style scoped>

</style>
