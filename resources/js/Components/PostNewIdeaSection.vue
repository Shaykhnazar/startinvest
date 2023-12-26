<template>
  <template v-if="!isGuest">
    <el-row justify="center" align="middle" :gutter="12">
      <el-col :xs="2" :sm="2" :md="1" :lg="1" :xl="1" class="idea-flex-start-col">
        <el-avatar :size="20" :src="circleUrl"/>
      </el-col>
      <el-col :xs="7" :sm="7" :md="9" :lg="9" :xl="9" @click="$emit('showModal')" style="cursor: text" class="idea-flex-center-col">
        New Idea...
      </el-col>
      <el-col :xs="3" :sm="3" :md="2" :lg="2" :xl="2" class="idea-flex-end-col">
        <el-button type="primary" @click="$emit('showModal')" round disabled>Post</el-button>
      </el-col>
    </el-row>
    <el-row justify="center" align="middle" :gutter="12" class="default-row">
      <el-col :xs="12" :sm="12" :md="12">
        <el-divider/>
      </el-col>
    </el-row>
  </template>
</template>
<script setup>
import { useAuthUser } from '@/Composables/useAuthUser.ts'

const { isGuest, circleUrl } = useAuthUser();

defineEmits(['showModal'])
</script>
<style scoped>
.idea-flex-start-col {
  flex-direction: row;
  display: flex;
  justify-content: flex-start;
  align-items: center;
}
.idea-flex-center-col {
  flex-direction: row;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.idea-flex-end-col {
  flex-direction: row;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}
.default-row {
  max-height: 30px
}
</style>
