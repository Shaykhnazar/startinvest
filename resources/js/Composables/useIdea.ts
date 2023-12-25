import {reactive, ref} from 'vue'
import type {FormRules} from 'element-plus'
import {router} from "@inertiajs/vue3";

export function useIdea() {
  // DATA
  interface RuleForm {
    id: number|null
    title: string
    description: string
  }
  const ideaForm = reactive<RuleForm>({
    id: null,
    title: '',
    description: '',
  });
  const rules = reactive<FormRules<RuleForm>>({
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

  const ideaShowAction = (idea: { id: any; }) => {
    router.get(route('ideas.show', idea.id))
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
    rules,
    ideaModalVisible,
    ideaEditModalVisible,
    ideaShow: ideaShowAction,
    showIdeaModal,
    showIdeaEditModal,
    cancelEvent,
    resetForm
  }

}
