<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'
import TextEditor from '@/Components/tiptap/TextEditor.vue'
import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import DashboardPageHeader from '@/Pages/Cabinet/Startup/DashboardPageHeader.vue'
import { useElMessage } from '@/Composables/helpers'

const { success, error } = useElMessage()

const page = usePage()

const typeOptions = ref(page.props.startupTypes)
const statusOptions = ref(page.props.startupStatuses.data);
const startup = page.props.startup.data

const industries = ref(page.props.industries.data || []) // Get industries from props

const selectedIndustries = ref(page.props.selectedIndustries || []) // Get selected industries

const form = useForm({
  title: startup.title,
  description: startup.description,
  additional_information: startup.additional_information,
  start_date: startup.start_date,
  type: startup.type,
  status_id: startup.status.id,
  has_mvp: startup.has_mvp,
  industry_ids: selectedIndustries.value // Set selected industries
})

const validateTitleField = (rule, value, callback) => {
  if (value === null || value === '') {
    callback(new Error("'Sarlavha' maydoni talab qilinadi."))
  } else {
    callback()
  }
}

const validateContentField = (rule, value, callback) => {
  if (value === null) {
    callback(new Error("'Tarkib' maydoni talab qilinadi."))
  } else {
    callback()
  }
}

const rules = {
  title: [{ validator: validateTitleField, trigger: 'change' }],
  description: [{ validator: validateContentField, trigger: 'change' }],
}

const locked = ref(false)
const editorRef = ref(null) // Add a ref for the text editor

const submitForm = () => {
  form.transform((data) => ({
    ...data,
    description: editorRef.value.getContentAsHTML(),
  })).put(route('dashboard.startups.update', { id: startup.id }), {
    onSuccess: () => {
      success('Startup muvaffaqiyatli yangilandi!')
    }
  })
}

const contentChanged = () => {
  if (editorRef.value.getContent().content.length === 1 &&
    typeof editorRef.value.getContent().content[0].content === 'undefined') {
    form.description = null
  } else {
    form.description = editorRef.value.getContent()
  }
}
</script>

<template>
  <Head :title="'Tahrirlash: ' + startup.title"/>

  <CabinetLayout>
    <div style="margin: 20px 20px;">
      <dashboard-page-header :has-extra-slot="true">
        <template #content>
          <span class="text-large font-600 mr-3">Startupni Tahrirlash 🚀</span>
        </template>
      </dashboard-page-header>
      <div style="padding: 20px 20px">
        <el-row :gutter="20">
          <el-col :span="18" :offset="3">
            <el-form
              ref="startupFormRef"
              status-icon
              :model="form"
              :rules="rules"
              @submit.prevent
            >
              <el-form-item label="Sarlavha" prop="title" required>
                <el-input v-model="form.title"/>
              </el-form-item>
              <el-form-item label="Batafsil" prop="description" :class="!locked ? 'required-field' : ''" required>
                <text-editor ref="editorRef" :content="form.description" :editable="!locked" @onChange="contentChanged"/>
              </el-form-item>
              <el-form-item label="Qo'shimcha Ma'lumot" prop="additional_information">
                <el-input v-model="form.additional_information"/>
              </el-form-item>
              <el-form-item label="Boshlanish Sanasi" prop="start_date">
                <el-date-picker v-model="form.start_date"/>
              </el-form-item>
              <el-form-item label="Turi">
                <el-select v-model="form.type">
                  <el-option v-for="(type, index) in typeOptions" :key="index" :value="type.value" :label="type.label">{{ type.label }}</el-option>
                </el-select>
              </el-form-item>
              <el-form-item label="Holati">
                <el-select v-model="form.status_id">
                  <el-option v-for="(status, index) in statusOptions" :key="index" :value="status.id" :label="status.label">
                    {{ status.label }}
                  </el-option>
                </el-select>
              </el-form-item>
              <el-form-item label="Sanoat tarmoqlari" required>
                <el-select v-model="form.industry_ids" multiple>
                  <el-option v-for="industry in industries" :key="industry.id" :value="industry.id" :label="industry.title">{{ industry.title }}</el-option>
                </el-select>
              </el-form-item>
              <el-form-item label="MVP versiya ishlab chiqilganmi?">
                <el-switch v-model="form.has_mvp"></el-switch>
              </el-form-item>
              <el-form-item>
                <el-button type="primary" @click="submitForm" round :disabled="!form.title" class="ml-2 mr-10">
                  Yangilash
                </el-button>
              </el-form-item>
            </el-form>
          </el-col>
        </el-row>
      </div>
    </div>
  </CabinetLayout>
</template>

<style scoped>
.common-layout {
  padding: 50px;
}
</style>
