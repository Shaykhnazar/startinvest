<script lang="ts" setup>
import { useIdea } from '@/Composables/useIdea.ts'
import {ref, reactive, watch} from 'vue';
import type { FormInstance } from 'element-plus'
import MarkdownEditor from "@/Components/MarkdownEditor.vue";
import BaseFormInputLabel from "@/Components/BaseFormInputLabel.vue";
import BaseFormTextInput from "@/Components/BaseFormTextInput.vue";

const emit = defineEmits(['close', 'submit', 'reset']);

const props = defineProps({
  title: {
    type: String,
  },
  submitButtonText: {
    type: String,
  },
  ideaForm: {
    type: [Object, null],
  },
  submitting: Boolean,
  isVisible: {
    type: Boolean,
    default: false,
  },
})

const { rules } = useIdea()
const visible = ref(true);
const locked = ref(false)
const editorRef = ref(null)
const formRefComputed = ref<FormInstance>();
const ideaForm = reactive(props.ideaForm || {});

const contentChanged = () => {
  if (editorRef.value === 'undefined') {
    ideaForm.description = null
  } else {
    ideaForm.description = editorRef.value
  }
}
function beforeSubmit(ideaForm) {
  // ideaForm.description = editorRef.value.getContentAsHTML()
  return ideaForm
}

const handleClose = () => {
  // Clear the form on close
  ideaForm.title = '';
  ideaForm.description = '';
  emit('close')
}

watch(() => props.isVisible, (newVal) => {
  visible.value = newVal;
});

// Watch for changes in props.idea and update the idea ref accordingly
watch(() => props.ideaForm, (newIdeaForm) => {
  if (newIdeaForm) {
    // Loop through each key in newIdeaForm and update ideaForm
    for (const key in newIdeaForm) {
      if (newIdeaForm.hasOwnProperty(key)) {
        ideaForm[key] = newIdeaForm[key];
      }
    }
  }
}, { immediate: true });
</script>
<template>
  <el-dialog v-model="visible" @close="handleClose" fullscreen class="bg-white border border-gray-200 shadow-sm rounded-xl text-black dark:text-neutral-400 dark:bg-neutral-800 dark:border-neutral-700">
    <div class="space-y-4">
      <h3 class="text-lg font-medium text-gray-800 dark:text-neutral-200">
        {{ $t('site.idea.form_title') }}
      </h3>
      <el-form
        ref="formRefComputed"
        :model="ideaForm"
        :rules="rules"
        status-icon
        @submit.prevent
      >
        <div class="py-2 sm:py-4 px-2">
          <div class="p-4 space-y-5">
            <!-- Grid -->
            <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
              <div class="sm:col-span-3">
                <BaseFormInputLabel
                  :title="$t('site.idea.title_label')"
                />
              </div>
              <!-- End Col -->

              <div class="sm:col-span-9">
                <el-form-item prop="title" required>
                  <BaseFormTextInput v-model="ideaForm.title" :placeholder="$t('site.idea.title_placeholder')"/>
                </el-form-item>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Grid -->
            <!-- Grid -->
            <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
              <div class="sm:col-span-3">
                <BaseFormInputLabel
                  :title="$t('site.idea.description_label')"
                />
              </div>
              <!-- End Col -->

              <div class="sm:col-span-9">
                <el-form-item prop="description"  :class="['editor-container', !locked ? 'required-field' : '']">
                  <MarkdownEditor
                    ref="editorRef"
                    v-model="ideaForm.description"
                    placeholder="Write your blog post content here..."
                    @change="contentChanged"
                  />
                </el-form-item>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Grid -->
          </div>
        </div>
      </el-form>
    </div>
    <template #footer>
      <div class="pt-0 flex justify-end gap-x-2">
        <div class="w-full flex justify-end items-center gap-x-2">
          <button type="button" @click="$emit('reset', formRefComputed)" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-modal-idea-new">
            {{ $t('site.idea.reset_button') }}
          </button>
          <button type="button" @click="$emit('submit', formRefComputed, beforeSubmit(ideaForm))" :disabled="!ideaForm.title || submitting" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            {{ submitButtonText }}
          </button>
        </div>
      </div>
    </template>
  </el-dialog>
</template>
<style scoped>
.editor-container {
  width: 100%;
  margin: 0;
  padding: 0;
}

@media (max-width: 768px) {
  .editor-container {
    width: calc(100% + 2rem);
    margin-left: -1rem;
    margin-right: -1rem;
  }

  :deep(.el-form-item__content) {
    margin-left: 0 !important;
  }
}

/* Remove conflicting element-plus styles */
:deep(.el-form-item__content) {
  line-height: normal;
}
</style>
