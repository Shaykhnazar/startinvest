<template>
  <el-dialog v-model="visible" :title="title" @close="handleClose" style="border-radius: 5px;">
    <el-form
      ref="formRefComputed"
      :model="ideaForm"
      :rules="rules"
      status-icon
      @submit.prevent
    >
      <el-form-item label="Sarlavha" prop="title" required>
        <el-input v-model="ideaForm.title" autocomplete="off" placeholder="G'oyaning qisqa sarlavhasi" clearable />
      </el-form-item>
      <el-form-item label="G'oyangizni tasvirlang" prop="description">
        <text-editor ref="editorRef"
         :content="ideaForm.description"
         :editable="!locked"
         @onChange="contentChanged"
        />
      </el-form-item>
    </el-form>
    <template #footer>
      <span class="dialog-footer">
        <el-button @click="$emit('reset', formRefComputed)" round>Qayta tiklash</el-button>
        <el-button type="primary" @click="$emit('submit', formRefComputed, beforeSubmit(ideaForm))" round :disabled="!ideaForm.title || submitting">
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
import TextEditor from "@/Components/tiptap/TextEditor.vue";

const { rules } = useIdea()
const visible = ref(true);
const locked = ref(false)
const editorRef = ref(null) // Add a ref for the text editor
const formRefComputed = ref<FormInstance>();

const contentChanged = () => {
  if (editorRef.value.getContent().content.length === 1 &&
    typeof editorRef.value.getContent().content[0].content === 'undefined') {
    ideaForm.value.description = null
  } else {
    ideaForm.value.description = editorRef.value.getContent()
  }
}
function beforeSubmit(ideaForm) {
  ideaForm.description = editorRef.value.getContentAsHTML()
  return ideaForm
}

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
