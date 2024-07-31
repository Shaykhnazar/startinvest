<template>
  <el-dialog v-model="visible" :title="title" @close="handleClose" style="border-radius: 5px;">
    <el-form
        ref="formRefComputed"
        :model="ideaForm"
        :rules="rules"
        status-icon
        @submit.prevent
    >
      <el-form-item label="Title" prop="title" required>
        <el-input v-model="ideaForm.title" autocomplete="off" placeholder="Idea short title" clearable />
      </el-form-item>
      <el-form-item label="Description (optional)" prop="description">
        <el-input
            v-model="ideaForm.description"
            :rows="2"
            type="textarea"
            placeholder="Describe your idea"
            clearable
        />
      </el-form-item>
    </el-form>
    <template #footer>
      <span class="dialog-footer">
        <el-button @click="$emit('reset', formRefComputed)" round>Reset</el-button>
        <el-button type="primary" @click="$emit('submit', formRefComputed, ideaForm)" round :disabled="!ideaForm.title || submitting">
          {{ submitButtonText }}
        </el-button>
      </span>
    </template>
  </el-dialog>
</template>
<script lang="ts" setup>
import { useIdea } from '@/Composables/useIdea.ts'
import {  ref } from 'vue';
import type { FormInstance } from 'element-plus'

const { rules } = useIdea()
const visible = ref(true);
const formRefComputed = ref<FormInstance>();

const emit = defineEmits(['close', 'submit', 'reset']);

const handleClose = () => {
  emit('close')
}

const props = defineProps({
  title: {
    type: String,
  },
  submitButtonText: {
    type: String,
  },
  ideaForm: {
    type: Object,
  },
  submitting: Boolean
})

const ideaForm = ref(props.ideaForm)
</script>
