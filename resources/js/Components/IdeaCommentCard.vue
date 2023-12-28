<script setup>
import Popover from '@/Components/Popover.vue'
import {useAuthUser } from '@/Composables/useAuthUser.ts'

const {circleUrl} = useAuthUser()

defineProps({
  comment: Object,
  submitting: Boolean,
})

defineEmits(['deleteCommentHandler'])
</script>

<template>
  <el-row justify="center" align="middle" :gutter="12" class="idea-header">
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12" class="flex-start-col">
      <Popover>
        <template #reference>
          <el-avatar :size="20" :src="circleUrl" class="mr-2 icon-pointer"/>
        </template>
        <p>{{ comment.author.name }}</p>
      </Popover>
      <el-text size="small" class="icon-pointer">
        <Popover>
          <template #reference>
            <span>{{ comment.author.name }}</span>
          </template>
          <div>
            <p>{{ comment.author.name }}</p>
          </div>
        </Popover>
      </el-text>
    </el-col>
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12" class="flex-end-col">
      <el-text size="small">
        {{ comment.created_at }}
      </el-text>
    </el-col>
  </el-row>
  <el-row justify="start" align="middle" :gutter="12" class="idea-header comment-text">
    <el-text>
      {{ comment.body }}
    </el-text>
  </el-row>
</template>

<style scoped>
.flex-start-col {
  flex-direction: row;
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.flex-end-col {
  flex-direction: row;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}
.comment-text {
  white-space: pre-wrap;
  word-break: break-word;
  background-color: #fcfcf1;
  border-radius: 5px;
  padding: 0 10px 0 10px;
}
</style>
