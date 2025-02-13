<template>
  <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">
    <h2 class="font-semibold text-gray-800 dark:text-neutral-200">
      Professional Details
    </h2>

    <form @submit.prevent="updateProfileDetails" class="space-y-6">
      <!-- Bio -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
          <label class="sm:mt-2.5 inline-block text-sm text-gray-500">Bio</label>
        </div>
        <div class="sm:col-span-8 xl:col-span-4">
          <textarea
            v-model="form.bio"
            rows="4"
            class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm"
            placeholder="Tell us about yourself..."
          ></textarea>
        </div>
      </div>

      <!-- Skills -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
          <label class="sm:mt-2.5 inline-block text-sm text-gray-500">Skills</label>
        </div>
        <div class="sm:col-span-8 xl:col-span-4">
          <el-select
            v-model="form.skills"
            multiple
            filterable
            allow-create
            placeholder="Add skills"
          >
            <el-option
              v-for="skill in skillOptions"
              :key="skill"
              :label="skill"
              :value="skill"
            />
          </el-select>
        </div>
      </div>

      <!-- Experience -->
      <div v-for="(exp, index) in form.experience" :key="index">
        <div class="grid sm:grid-cols-12 gap-4">
          <div class="sm:col-span-4">
            <input v-model="exp.company" placeholder="Company" class="w-full" />
          </div>
          <div class="sm:col-span-4">
            <input v-model="exp.position" placeholder="Position" class="w-full" />
          </div>
          <div class="sm:col-span-3">
            <el-date-picker
              v-model="exp.period"
              type="daterange"
              range-separator="To"
              start-placeholder="Start date"
              end-placeholder="End date"
            />
          </div>
          <div class="sm:col-span-1">
            <button @click="removeExperience(index)" type="button">
              <i class="el-icon-delete" />
            </button>
          </div>
        </div>
      </div>
      <button @click="addExperience" type="button" class="text-blue-600">
        + Add Experience
      </button>

      <!-- Education -->
      <div class="space-y-4">
        <div v-for="(edu, index) in form.education" :key="index" class="border border-gray-200 rounded-lg p-4 dark:border-neutral-700">
          <div class="grid sm:grid-cols-12 gap-4">
            <div class="sm:col-span-4">
              <input
                v-model="edu.institution"
                placeholder="Institution/University"
                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300"
              />
            </div>

            <div class="sm:col-span-4">
              <input
                v-model="edu.degree"
                placeholder="Degree/Qualification"
                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300"
              />
            </div>

            <div class="sm:col-span-3">
              <el-date-picker
                v-model="edu.period"
                type="daterange"
                range-separator="To"
                start-placeholder="Start date"
                end-placeholder="End date"
                class="w-full"
              />
            </div>

            <div class="sm:col-span-1 flex justify-center items-center">
              <button
                @click="removeEducation(index)"
                type="button"
                class="text-red-500 hover:text-red-700"
              >
                <svg
                  class="w-5 h-5"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                  />
                </svg>
              </button>
            </div>
          </div>

          <div class="mt-3">
      <textarea
        v-model="edu.description"
        placeholder="Description or achievements (optional)"
        rows="2"
        class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300"
      ></textarea>
          </div>
        </div>

        <button
          @click="addEducation"
          type="button"
          class="inline-flex items-center gap-x-2 text-blue-600 hover:text-blue-800 mt-2"
        >
          <svg
            class="w-4 h-4"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 6v6m0 0v6m0-6h6m-6 0H6"
            />
          </svg>
          Add Education
        </button>
      </div>

      <!-- Submit Button -->
      <div class="flex justify-end gap-x-3">
        <button
          type="submit"
          :disabled="form.processing"
          class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm"
        >
          Save Changes
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  userDetail: Object
})

const skillOptions = [
  'JavaScript', 'PHP', 'Python', 'Vue.js', 'Laravel',
  'React', 'Node.js', 'AWS', 'Docker', 'DevOps'
]

const form = useForm({
  bio: props.userDetail?.bio || '',
  skills: props.userDetail?.skills || [],
  experience: props.userDetail?.experience || [],
  education: props.userDetail?.education || [],
  organization: props.userDetail?.organization || ''
})

const addExperience = () => {
  form.experience.push({
    company: '',
    position: '',
    period: null,
    description: ''
  })
}

const removeExperience = (index) => {
  form.experience.splice(index, 1)
}

const addEducation = () => {
  form.education.push({
    institution: '',
    degree: '',
    period: null,
    description: ''
  })
}

const removeEducation = (index) => {
  form.education.splice(index, 1)
}

const updateProfileDetails = () => {
  form.post(route('dashboard.profile.update-details'), {
    preserveScroll: true
  })
}
</script>
