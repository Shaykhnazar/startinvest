<template>
  <el-col :xs="8" :sm="4" :md="4" :lg="4" :xl="4">
    <el-card shadow="hover">
      <div class="card-header text-center">
        <span class="font-bold">
            <el-icon size="30">
                <slot name="icon"/>
            </el-icon>
        </span>
      </div>
      <p class="text-center">{{ textTitle }}</p>
    </el-card>
  </el-col>
    <el-col v-if="hasRightArrowIcon" :span="1">
        <p class="text-center" style="margin-top: 70%; margin-bottom: 30%;">
            <el-icon size="30"><Right /></el-icon>
        </p>
    </el-col>
</template>
<script setup>
defineProps({
    hasRightArrowIcon: {
        type: Boolean,
        default: true
    },
    textTitle: {
        type: String,
    }
})
</script>
<style scoped>
</style>
