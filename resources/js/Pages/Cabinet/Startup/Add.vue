<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'
import MarkdownEditor from "@/Components/MarkdownEditor.vue";
import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import BaseFormInputLabel from '@/Components/BaseFormInputLabel.vue'
import BaseFormTextInput from '@/Components/BaseFormTextInput.vue'

const page = usePage()

const typeOptions = ref(page.props.startupTypes)
const statusOptions = ref(page.props.startupStatuses.data);

const form = useForm({
  title: '',
  description: '',
  additional_information: '',
  start_date: '',
  type: 'private',
  status_id: statusOptions[0],
  has_mvp: false,
  industry_ids: []
})

const industries = ref(page.props.industries.data || []) // Get industries from props

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
const startupFormRef = ref(null) // Add a ref for the form

const submitForm = () => {
  // Handle form submission logic
  console.log(form)

  form.transform((data) => ({
    ...data,
    // description: editorRef.value.getContentAsHTML(),
  })).post('/dashboard/startups/add')
}


const onCancel = () => {
  window.history.back()
}
</script>

<template>
  <Head :title="$t('cabinet.startup_add.title')" />

  <CabinetLayout>
    <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">
      <!-- Create New Startup Card Form -->
      <div class="max-w-xl mx-auto">
        <!-- Breadcrumb -->
        <ol class="lg:hidden py-3 flex items-center whitespace-nowrap">
          <li class="flex items-center">

            <a class="py-0.5 px-1.5 flex items-center gap-x-1 text-sm rounded-md gray=='true'){text-gray-600 hover:bg-gray-100 focus:bg-gray-100} focus:outline-none dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
              {{ $t('cabinet.startup_add.breadcrumb_dashboard') }}
            </a>
            <svg class="shrink-0 overflow-visible size-4  text-gray-400 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
            </svg>
          </li>
          <li class="flex items-center">

            <a class="py-0.5 px-1.5 flex items-center gap-x-1 text-sm rounded-md gray=='true'){text-gray-600 hover:bg-gray-100 focus:bg-gray-100} focus:outline-none dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
              {{ $t('cabinet.startup_add.breadcrumb_my_projects') }}
            </a>
            <svg class="shrink-0 overflow-visible size-4  text-gray-400 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
            </svg>
          </li>
          <li class="ps-1.5 flex items-center font-semibold text-gray-800 dark:text-neutral-200 text-sm">
            {{ $t('cabinet.startup_add.breadcrumb_add_project') }}
          </li>
        </ol>
        <!-- End Breadcrumb -->

        <!-- Header -->
        <div class="my-5 flex gap-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket  shrink-0 size-10 text-gray-400 dark:text-neutral-600"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>

          <div class="grow">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-neutral-200">
              {{ $t('cabinet.startup_add.header') }}
            </h1>

            <p class="text-sm text-gray-500 dark:text-neutral-500">
              {{ $t('cabinet.startup_add.header_description') }}
            </p>
          </div>
        </div>
        <!-- End Header -->

        <!-- Card -->
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
          <el-form ref="startupFormRef"
                   status-icon
                   :rules="rules"
                   @submit.prevent
          >
            <div class="py-2 sm:py-4 px-2">
              <div class="p-4 space-y-5">
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel :title="$t('cabinet.startup_add.fields.title')" />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item prop="title">
                      <BaseFormTextInput v-model="form.title" :placeholder="$t('cabinet.startup_add.fields.title_placeholder')"/>
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel :title="$t('cabinet.startup_add.fields.description')" />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item prop="description"  :class="['editor-container', !locked ? 'required-field' : '']">
                      <MarkdownEditor
                        ref="editorRef"
                        v-model="form.description"
                        placeholder="Write your content here..."
                        unique-id="startup-form-description"
                      />
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel :title="$t('cabinet.startup_add.fields.additional_information')" />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item prop="title">
                      <BaseFormTextInput v-model="form.additional_information" :placeholder="$t('cabinet.startup_add.fields.additional_information_placeholder')" />
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->

                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel :title="$t('cabinet.startup_add.fields.start_date')" />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item prop="start_date">
                      <el-date-picker v-model="form.start_date"/>
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->

                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel :title="$t('cabinet.startup_add.fields.type')" />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item>
                      <el-select v-model="form.type" placeholder="Tanlash">
                        <el-option v-for="(type, index) in typeOptions" :key="index" :value="type.value" :label="type.label">
                          {{ type.label }}
                        </el-option>
                      </el-select>
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->

                 <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel :title="$t('cabinet.startup_add.fields.status')" />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item>
                      <el-select v-model="form.status_id" placeholder="Tanlash">
                        <el-option v-for="(status, index) in statusOptions" :key="index" :value="status.id" :label="status.label">
                          {{ status.label }}
                        </el-option>
                      </el-select>
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->

                 <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel :title="$t('cabinet.startup_add.fields.industries')" />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item required>
                      <el-select v-model="form.industry_ids" multiple placeholder="Choose">
                        <el-option v-for="industry in industries" :key="industry.id" :value="industry.id" :label="industry.title">{{
                            industry.title
                          }}
                        </el-option>
                      </el-select>
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->

                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel :title="$t('cabinet.startup_add.fields.has_mvp')" />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item prop="has_mvp">
                      <div class="flex items-center">
                        <input type="checkbox"
                               v-model="form.has_mvp"
                               id="hs-basic-with-description-unchecked"
                               class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-blue-600 checked:border-blue-600 focus:checked:border-blue-600 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-neutral-400 dark:checked:before:bg-blue-200"
                        >
                        <label for="hs-basic-with-description-unchecked" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">{{ form.has_mvp ? $t('cabinet.startup_add.fields.yes') : $t('cabinet.startup_add.fields.no') }}</label>
                      </div>
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->
              </div>
            </div>

            <!-- Footer -->
            <div class="p-6 pt-0 flex justify-end gap-x-2">
              <div class="w-full flex justify-end items-center gap-x-2">
                <button type="button" @click="onCancel"  class="py-2 px-3 inline-flex justify-center items-center text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                  {{ $t('cabinet.startup_add.buttons.cancel') }}
                </button>

                <button type="button" @click="submitForm" :disabled="!form.title" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500">
                  <svg class="hidden sm:block shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 1C8.55228 1 9 1.44772 9 2V7L14 7C14.5523 7 15 7.44771 15 8C15 8.55228 14.5523 9 14 9L9 9V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V9.00001L2 9.00001C1.44772 9.00001 1 8.5523 1 8.00001C0.999999 7.44773 1.44771 7.00001 2 7.00001L7 7.00001V2C7 1.44772 7.44772 1 8 1Z" />
                  </svg>
                  {{ $t('cabinet.startup_add.buttons.submit') }}
                </button>
              </div>
            </div>
            <!-- End Footer -->
          </el-form>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Create New Startup Card Form -->
    </div>
  </CabinetLayout>
</template>

<style scoped>
.common-layout {
  padding: 50px;
}
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
