<template>
  <el-dialog v-model="visible" title="G'oya Izohlari" @close="handleClose" style="border-radius: 5px;">

    <!-- IDEA COMMENT LIST -->
    <div class="idea-comment-container">
      <IdeaCommentCard
        v-for="comment in ideaComments"
        :key="comment.id"
        :comment="comment"
        :submitting="submitting"
        @delete-comment-handler="deleteComment"
      />
    </div>

    <template #footer v-if="!isGuest">
      <!-- IDEA COMMENT FORM -->
      <el-form
        ref="ideaCommentFormRef"
        :model="ideaCommentForm"
        status-icon
        @submit.prevent
      >
        <el-row justify="center" align="middle" :gutter="12">
          <el-col :xs="2" :sm="2" :md="2" :lg="2" :xl="2" class="flex-start-col">
            <Popover>
              <template #reference>
                <el-avatar :size="20" :src="avatar" class="mr-2 icon-pointer"/>
              </template>
              <p>{{ ideaCommentForm.idea.author?.name }}</p>
            </Popover>
          </el-col>
          <el-col :xs="16" :sm="16" :md="16" :lg="16" :xl="16" class="idea-flex-center-col">
            <el-form-item prop="body" required :rules="bodyRules">
              <el-input v-model="ideaCommentForm.body" autocomplete="off" placeholder="Izoh yozish..." clearable />
            </el-form-item>
          </el-col>
          <el-col :xs="6" :sm="6" :md="6" :lg="6" :xl="6" class="flex-end-col">
            <el-form-item>
              <el-button type="primary" @click="$emit('submit', ideaCommentFormRef, ideaCommentForm)" round :disabled="!ideaCommentForm.body || submitting">
                {{ submitButtonText }}
              </el-button>
            </el-form-item>
          </el-col>
        </el-row>
      </el-form>
    </template>
  </el-dialog>
</template>
<script lang="ts" setup>
import {reactive, ref, watch} from 'vue';
import type { FormInstance } from 'element-plus'
import IdeaCommentCard from '@/Components/IdeaCommentCard.vue';
import { useUserStore } from '@/stores/UserStore.js'
import { storeToRefs } from 'pinia'
import Popover from "@/Components/Popover.vue";
import _ from 'lodash'

const userStore = useUserStore()
const { isGuest, avatar } = storeToRefs(userStore);

const visible = ref(true);
const ideaCommentFormRef = ref<FormInstance>();

const emit = defineEmits(['close', 'submit']);

const handleClose = () => {
  emit('close')
}

const props = defineProps({
  submitButtonText: {
    type: String,
  },
  ideaCommentForm: {
    type: Object,
  },
  submitting: Boolean
})

const ideaCommentForm = reactive(props.ideaCommentForm)
const bodyRules = ref([
  { required: true, message: 'Izohni kiriting', trigger: 'blur' },
  { min: 3, max: 255, message: 'Uzunligi 3 dan 255 gacha bo\'lishi kerak', trigger: 'blur' },
])
const ideaComments = reactive(props.ideaCommentForm.idea.comments || [])

const deleteComment = () => {
  emit('delete-comment-handler')
}
</script>
<style scoped>
.flex-start-col {
  flex-direction: row;
  //display: flex;
  justify-content: flex-start;
  align-items: start;
}
.idea-flex-center-col {
  flex-direction: row;
  //display: flex;
  justify-content: space-between;
  align-items: center;
}

.flex-end-col {
  flex-direction: row;
  //display: flex;
  justify-content: flex-end;
  align-items: center;
}

.idea-comment-container {
  max-height: 300px; /* Set the maximum height you desire */
  overflow-y: auto;
}
</style>
