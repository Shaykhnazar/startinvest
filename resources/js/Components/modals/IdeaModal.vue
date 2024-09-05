<script lang="ts" setup>
import { useIdea } from '@/Composables/useIdea.ts'
import {ref, reactive, watch} from 'vue';
import type { FormInstance } from 'element-plus'
import TextEditor from "@/Components/tiptap/TextEditor.vue";
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
  if (editorRef.value.getContent().content.length === 1 &&
    typeof editorRef.value.getContent().content[0].content === 'undefined') {
    ideaForm.description = null
  } else {
    ideaForm.description = editorRef.value.getContent()
  }
}
function beforeSubmit(ideaForm) {
  ideaForm.description = editorRef.value.getContentAsHTML()
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
<!--<template>-->
<!--  <div id="#hs-modal-idea-new" :class="{'hidden': !visible, 'hs-overlay size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [&#45;&#45;close-when-click-inside:true] pointer-events-none': true }" role="dialog" tabindex="-1" aria-labelledby="#hs-modal-idea-new-label">-->
<!--    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">-->
<!--      <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">-->
<!--        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">-->
<!--          <h3 class="font-bold text-gray-800 dark:text-white">-->
<!--            {{ title }}-->
<!--          </h3>-->
<!--          <button id="#hs-modal-idea-new-label" type="button" @click="handleClose" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-modal-idea-new">-->
<!--            <span class="sr-only">Close</span>-->
<!--            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--              <path d="M18 6 6 18"></path>-->
<!--              <path d="m6 6 12 12"></path>-->
<!--            </svg>-->
<!--          </button>-->
<!--        </div>-->
<!--        <div class="p-4 overflow-y-auto">-->
<!--          <div class="space-y-4">-->
<!--            <el-form-->
<!--              ref="formRefComputed"-->
<!--              :model="ideaForm"-->
<!--              :rules="rules"-->
<!--              status-icon-->
<!--              @submit.prevent-->
<!--            >-->
<!--              <el-form-item label="Sarlavha" prop="title" required>-->
<!--                <el-input v-model="ideaForm.title" autocomplete="off" placeholder="G'oyaning qisqa sarlavhasi" clearable />-->
<!--              </el-form-item>-->
<!--              <el-form-item label="G'oyangizni tasvirlang" prop="description">-->
<!--                <text-editor ref="editorRef"-->
<!--                             :content="ideaForm.description"-->
<!--                             :editable="!locked"-->
<!--                             @onChange="contentChanged"-->
<!--                />-->
<!--              </el-form-item>-->
<!--            </el-form>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">-->
<!--          <button type="button" @click="$emit('reset', formRefComputed)" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-modal-idea-new">-->
<!--            Qayta tiklash-->
<!--          </button>-->
<!--          <button type="button" @click="$emit('submit', formRefComputed, beforeSubmit(ideaForm))" :disabled="!ideaForm.title || submitting" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">-->
<!--            {{ submitButtonText }}-->
<!--          </button>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</template>-->
<template>
  <el-dialog v-model="visible" @close="handleClose" fullscreen class="bg-white border border-gray-200 shadow-sm rounded-xl text-black dark:text-neutral-400 dark:bg-neutral-800 dark:border-neutral-700">
    <div class="space-y-4">
      <h3 class="text-lg font-medium text-gray-800 dark:text-neutral-200">
        {{ title }}
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
                  title="Sarlavha"
                />
              </div>
              <!-- End Col -->

              <div class="sm:col-span-9">
                <el-form-item prop="title" required>
                  <BaseFormTextInput v-model="ideaForm.title" placeholder="G'oyaning qisqacha sarlavhasi"/>
                </el-form-item>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Grid -->
            <!-- Grid -->
            <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
              <div class="sm:col-span-3">
                <BaseFormInputLabel
                  title="G'oyangizni tasvirlang"
                />
              </div>
              <!-- End Col -->

              <div class="sm:col-span-9">
                <el-form-item prop="description" :class="!locked ? 'required-field' : ''">
                  <text-editor ref="editorRef" :content="ideaForm.description" :editable="!locked" @onChange="contentChanged"/>
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
            Qayta tiklash
          </button>
          <button type="button" @click="$emit('submit', formRefComputed, beforeSubmit(ideaForm))" :disabled="!ideaForm.title || submitting" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            {{ submitButtonText }}
          </button>
        </div>
      </div>
    </template>
  </el-dialog>
</template>

