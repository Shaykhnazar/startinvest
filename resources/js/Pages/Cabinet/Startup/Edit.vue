<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'
import TextEditor from '@/Components/tiptap/TextEditor.vue'
import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import { useElMessage } from '@/Composables/helpers'
import BaseFormInputLabel from '@/Components/BaseFormInputLabel.vue'
import BaseFormTextInput from '@/Components/BaseFormTextInput.vue'

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
const onCancel = () => {
  window.history.back()
}
</script>

<template>
  <Head :title="'Tahrirlash: ' + startup.title"/>

  <CabinetLayout>
    <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">
      <!-- Create New Startup Card Form -->
      <div class="max-w-xl mx-auto">
        <!-- Breadcrumb -->
        <ol class="lg:hidden py-3 flex items-center whitespace-nowrap">
          <li class="flex items-center">

            <a class="py-0.5 px-1.5 flex items-center gap-x-1 text-sm rounded-md gray=='true'){text-gray-600 hover:bg-gray-100 focus:bg-gray-100} focus:outline-none dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
              Dashboard
            </a>
            <svg class="shrink-0 overflow-visible size-4  text-gray-400 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
            </svg>
          </li>
          <li class="flex items-center">

            <a class="py-0.5 px-1.5 flex items-center gap-x-1 text-sm rounded-md gray=='true'){text-gray-600 hover:bg-gray-100 focus:bg-gray-100} focus:outline-none dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
              Loyihalarim
            </a>
            <svg class="shrink-0 overflow-visible size-4  text-gray-400 dark:text-neutral-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
            </svg>
          </li>
          <li class="ps-1.5 flex items-center font-semibold text-gray-800 dark:text-neutral-200 text-sm">
            Startupni Tahrirlash 🚀
          </li>
        </ol>
        <!-- End Breadcrumb -->

        <!-- Header -->
        <div class="my-5 flex gap-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket  shrink-0 size-10 text-gray-400 dark:text-neutral-600"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>

          <div class="grow">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-neutral-200">
              Startupni Tahrirlash
            </h1>

            <p class="text-sm text-gray-500 dark:text-neutral-500">
              Startupni tahrirlash
            </p>
          </div>
        </div>
        <!-- End Header -->

        <!-- Card -->
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
          <el-form ref="startupFormRef"
                   status-icon
                   :model="form"
                   :rules="rules"
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
                      <BaseFormTextInput v-model="form.title" placeholder="Startinvest.uz - startup loyihalarni qo'llab quvvatlash uchun onlayn platforma"/>
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel
                      title="Batafsil"
                    />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item prop="description" :class="!locked ? 'required-field' : ''">
                      <text-editor ref="editorRef" :content="form.description" :editable="!locked" @onChange="contentChanged"/>
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->

                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel
                      title="Qo'shimcha Ma'lumotlar"
                    />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item prop="title">
                      <BaseFormTextInput v-model="form.additional_information" placeholder="Loyiha websayti va shunga o'xshash ma'lumotlar"/>
                    </el-form-item>
                  </div>
                  <!-- End Col -->
                </div>
                <!-- End Grid -->

                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
                  <div class="sm:col-span-3">
                    <BaseFormInputLabel
                      title="Boshlanish Sanasi"
                    />
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
                    <BaseFormInputLabel
                      title="Turi"
                    />
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
                    <BaseFormInputLabel
                      title="Holati"
                    />
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
                    <BaseFormInputLabel
                      title="Sanoat tarmoqlari"
                    />
                  </div>
                  <!-- End Col -->

                  <div class="sm:col-span-9">
                    <el-form-item required>
                      <el-select v-model="form.industry_ids" multiple placeholder="Tanlash">
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
                    <BaseFormInputLabel
                      title="MVP versiya ishlab chiqilganmi?"
                    />
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
                        <label for="hs-basic-with-description-unchecked" class="text-sm text-gray-500 ms-3 dark:text-neutral-400">{{ form.has_mvp ? 'Ha' : 'Yo\'q' }}</label>
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
                  Bekor qilish
                </button>

                <button type="button" @click="submitForm" :disabled="!form.title" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500">
                  <svg class="hidden sm:block shrink-0 size-3 lucide lucide-pencil" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/></svg>
                  Yangilash
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
</style>
