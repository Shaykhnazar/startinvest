<script setup>

import { Head, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import TextEditor from '@/Components/tiptap/TextEditor.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import DashboardPageHeader from '@/Pages/Profile/Startup/DashboardPageHeader.vue'

const form = useForm({
  title: '',
  description: '',
  additional_information: '',
  start_date: '',
  type: 'public',
  status: 'on start',
  has_mvp: false,
})


const validateTitleField = (rule, value, callback) => {
  if (value === '') {
    callback(new Error('The "Title" field is required.'))
  } else {
    callback()
  }
}

const validateContentField = (rule, value, callback) => {
  if (value === null) {
    callback(new Error('The "Content" field is required.'))
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
const startupFormRef = ref(null) // Add a ref for the form

// Option values
const typeOptions = ['public', 'private'];
const statusOptions = ['on start', 'progressing', 'team building', 'release', 'testing', 'on production'];

const submitForm = () => {
  // Handle form submission logic
  console.log(form)
  // TODO: we need to modify description field before send it to backend
  console.log(editorRef.value.getContentAsHTML())
}

const contentChanged = () => {
  if (editorRef.value.getContent().content.length === 1 &&
    typeof editorRef.value.getContent().content[0].content === 'undefined') {
    form.description = null
  } else {
    form.description = editorRef.value.getContent()
  }
  validateOneFieldExecute('description')
}

// Validation
const validateOneFieldExecute = (fieldName = '') => {
  if (startupFormRef.value) {
    startupFormRef.value.validateField(fieldName)
  }
}


</script>

<template>
  <Head title="Add a new Startup"/>

  <AuthenticatedLayout>
    <div style="padding-top: 20px;">
      <dashboard-page-header :has-extra-slot="true">
        <template #content>
          <span class="text-large font-600 mr-3">Startup </span>
        </template>
        <template #extra>
          <el-button type="primary" @click="submitForm" round :disabled="!form.title" class="ml-2 mr-10">
            Add
          </el-button>
        </template>
      </dashboard-page-header>
      <el-container style="padding-top: 20px;">
        <el-row :gutter="24">
          <el-col :span="20" :offset="4">
            <el-form ref="startupFormRef"
             status-icon
             :rules="rules"
            >
              <el-form-item label="Title" prop="title">
                <el-input v-model="form.title" />
              </el-form-item>
              <el-form-item label="Description" prop="description" :class="!locked ? 'required-field' : ''">
                <text-editor ref="editorRef" :content="form.description" :editable="!locked" @onChange="contentChanged" />
              </el-form-item>
              <el-form-item label="Additional Information" prop="additional_information">
                <el-input v-model="form.additional_information" />
              </el-form-item>
              <el-form-item label="Start Date" prop="start_date">
                <el-date-picker v-model="form.start_date" />
              </el-form-item>
              <el-form-item label="Type">
                <el-radio-group v-model="form.type">
                  <el-radio v-for="type in typeOptions" :key="type" :value="type">{{ type }}</el-radio>
                </el-radio-group>
              </el-form-item>
              <el-form-item label="Status">
                <el-select v-model="form.status">
                  <el-option v-for="status in statusOptions" :key="status" :value="status">{{ status }}</el-option>
                </el-select>
              </el-form-item>
              <el-form-item label="Has MVP">
                <el-switch v-model="form.has_mvp"></el-switch>
              </el-form-item>
            </el-form>
          </el-col>
        </el-row>
      </el-container>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.common-layout {
  padding: 50px;
}
</style>
