import {reactive, ref} from 'vue'
import type {FormRules} from 'element-plus'
import {router} from "@inertiajs/vue3";

export function useIdea() {
  // DATA
  interface RuleIdeaForm {
    id: number|null
    title: string
    description: string
  }
  const ideaForm = reactive<RuleIdeaForm>({
    id: null,
    title: '',
    description: '',
  });
  const ideaCommentForm = reactive({
    body: '',
    parent_id: null,
    idea: null
  });
  const rules = reactive<FormRules<RuleIdeaForm>>({
    title: [
      {required: true, message: 'Please input title', trigger: 'blur'},
      {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'},
    ],
    description: [
      {required: false, message: 'Please input description', trigger: 'blur'},
    ],
  })

  const ideaModalVisible = ref(false);
  const ideaEditModalVisible = ref(false);
  const ideaCommentModalVisible = ref(false);

  // METHODS
  const showIdeaModal = (value = true) => {
    ideaForm.id = null;
    ideaForm.title = '';
    ideaForm.description = '';
    // Show the modal
    ideaModalVisible.value = value
  };
  const showIdeaEditModal = (value = true, idea = null) => {
    // Populate the edit form with the details of the selected idea
    if (idea) {
      ideaForm.id = idea.id;
      ideaForm.title = idea.title;
      ideaForm.description = idea.description;
    }
    // Show the modal
    ideaEditModalVisible.value = value;
  }
  const showIdeaCommentModal = (value = true, idea = null, parentCommentId = null) => {
    // Populate the edit form with the details of the selected idea
    // console.log(idea)
    ideaCommentForm.idea = idea ?? null
    ideaCommentForm.parent_id = parentCommentId ?? null
    ideaCommentForm.body = ''
    // Show the modal
    ideaCommentModalVisible.value = value
  }

  const cancelEvent = () => {
    console.log('cancel!')
  }
  const resetForm = (formEl) => {
    if (!formEl) return
    formEl.resetFields()
  }

  return {
    ideaForm,
    ideaCommentForm,
    rules,
    ideaModalVisible,
    ideaEditModalVisible,
    ideaCommentModalVisible,
    showIdeaModal,
    showIdeaEditModal,
    showIdeaCommentModal,
    cancelEvent,
    resetForm
  }

}
