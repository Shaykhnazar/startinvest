<!-- Inside Ideas/Index.vue -->
<template>
  <App>
    <template #header>
      <Head title="Ideas"/>
    </template>

    <el-container>
      <el-main>
        <!-- NEW IDEA -->
        <template v-if="!isGuest">
          <el-row justify="center" align="middle" >
            <el-col :span="1">
              <el-avatar :size="20" :src="circleUrl"/>
            </el-col>
            <el-col :span="9" @click="showIdeaModal(true)" style="cursor: text">
              New Idea...
            </el-col>
            <el-col :span="2">
              <el-button type="primary" @click="showIdeaModal(true)" round disabled>Post</el-button>
            </el-col>
          </el-row>
          <el-row justify="center" align="middle">
            <el-col :span="12">
              <el-divider />
            </el-col>
          </el-row>
        </template>

        <!-- IDEA LIST -->
        <template v-for="idea in ideasDynamic.data" :key="idea.id">
          <el-row justify="center" align="middle">
            <el-col :span="4">
              <Popover>
                <template #reference>
                  <el-avatar :size="20" :src="circleUrl" class="mr-1 icon-pointer"/>
                </template>
                <p>{{ idea.author.name }}</p>
              </Popover>
              <el-text size="small" class="icon-pointer">
                <Popover>
                  <template #reference>
                    <span>{{ idea.author.name }}</span>
                  </template>
                  <div>
                    <p>{{ idea.author.name }}</p>
                  </div>
                </Popover>
              </el-text>
            </el-col>
            <el-col :span="2" :offset="6">
              <Popover placement="right-end" trigger="click" width="50">
                <template #reference>
                  <el-icon size="20" class="icon-pointer"><More/></el-icon>
                </template>
                <ul>
                  <template v-if="isAuthorOfIdea(idea)">
                    <li class="icon-pointer" @click="showEditIdeaDialog(true, idea)">Edit</li><hr/>
                    <el-popconfirm
                      confirm-button-text="Yes"
                      cancel-button-text="No"
                      icon-color="#626AEF"
                      title="Are you sure to delete this?"
                      @confirm="confirmEvent(idea.id)"
                      @cancel="cancelEvent"
                    >
                      <template #reference>
                        <li class="icon-pointer" style="color: #ff1100" >Delete</li>
                      </template>
                    </el-popconfirm>
                    <hr/>
                  </template>
                  <li class="icon-pointer" style="color: #e72121">Report</li>
                </ul>
              </Popover>
            </el-col>
          </el-row>
          <el-row justify="center" align="middle" class="mb-2 mt-2">
            <el-text>
              {{ idea.title }}
            </el-text>
          </el-row>
          <!-- Icon Actions -->
          <el-row justify="center" align="middle">
            <el-col :span="2">
              <el-badge :hidden="idea.upvotes == 0" :value="idea.upvotes" class="item" type="success">
                <el-icon size="20" class="icon-pointer mt-0.5 mr-2" @click="voteUp(idea)">
                  <icon-svg name="like-solid" v-if="idea.has_user_upvoted ?? false" />
                  <icon-svg name="like-regular" v-else />
                </el-icon>
              </el-badge>
              <el-badge :hidden="idea.downvotes == 0" :value="idea.downvotes" class="item">
                <el-icon size="20" class="icon-pointer mt-0.5 ml-2 mr-2" @click="voteDown(idea)">
                  <icon-svg name="dislike-solid" v-if="idea.has_user_downvoted ?? false" />
                  <icon-svg name="dislike-regular" v-else />
                </el-icon>
              </el-badge>
            </el-col>
            <el-col :span="3" :offset="6">
              <el-icon size="20" class="icon-pointer mr-2">
                <Comment/>
              </el-icon>
              <el-icon size="20" class="icon-pointer mr-2">
                <Promotion/>
              </el-icon>
              <el-icon size="20" class="icon-pointer">
                <icon-svg name="save-regular"/>
              </el-icon>
            </el-col>
          </el-row>
          <el-row justify="center" align="middle">
            <el-col :span="12">
              <el-divider />
            </el-col>
          </el-row>
        </template>
      </el-main>
    </el-container>

    <el-dialog v-model="showNewIdeaModal" title="New Idea">
      <el-form
        ref="ideaFormRef"
        :model="ideaForm"
        :rules="rules"
        status-icon
      >
        <el-form-item label="Title" prop="title" required>
          <el-input v-model="ideaForm.title" autocomplete="off" placeholder="Idea short title"/>
        </el-form-item>
        <el-form-item label="Description (optional)" prop="description">
          <el-input
            v-model="ideaForm.description"
            :rows="2"
            type="textarea"
            placeholder="Describe your idea"
          />
        </el-form-item>
      </el-form>
      <template #footer>
      <span class="dialog-footer">
        <el-button @click="resetForm(ideaFormRef)" round>Reset</el-button>
        <el-button type="primary" @click="newIdeaSubmit(ideaFormRef)" round :disabled="!ideaForm.title">
          Post
        </el-button>
      </span>
      </template>
    </el-dialog>

    <el-dialog v-model="showEditIdeaModal" title="Edit Idea">
      <el-form
        ref="editIdeaFormRef"
        :model="ideaForm"
        :rules="rules"
        status-icon
      >
        <el-form-item label="Title" prop="title" required>
          <el-input v-model="ideaForm.title" autocomplete="off" placeholder="Idea short title" />
        </el-form-item>
        <el-form-item label="Description (optional)" prop="description">
          <el-input
            v-model="ideaForm.description"
            :rows="2"
            type="textarea"
            placeholder="Describe your idea"
          />
        </el-form-item>
      </el-form>
      <template #footer>
      <span class="dialog-footer">
        <el-button @click="resetForm(editIdeaFormRef)" round>Reset</el-button>
        <el-button type="primary" @click="editIdeaSubmit(editIdeaFormRef)" round :disabled="!ideaForm.title">
          Save
        </el-button>
      </span>
      </template>
    </el-dialog>
  </App>
</template>

<script lang="ts" setup>
import {ref, reactive, toRefs, computed} from 'vue';
import type {FormInstance, FormRules} from 'element-plus'

import App from '@/Layouts/App.vue'
import {Head, router, usePage} from '@inertiajs/vue3';
import {Comment,  More, Promotion} from '@element-plus/icons-vue'
import IconSvg from "@/Components/svg-icons/icon.vue";
import api from '@/services/api'
import Popover from "@/Components/Popover.vue";

const props = defineProps({
  ideas: {
    type: Object,
  }
})
const state = reactive({
  circleUrl:
    'https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png',
})
const showNewIdeaModal = ref(false);
const showEditIdeaModal = ref(false);
const ideaFormRef = ref<FormInstance>()
const editIdeaFormRef = ref<FormInstance>();

const {circleUrl} = toRefs(state)
const ideasDynamic = reactive(props.ideas)

const ideaForm = reactive<RuleForm>({
  id: null,
  title: '',
  description: '',
});

interface RuleForm {
  id: number|null
  title: string
  description: string
}

const rules = reactive<FormRules<RuleForm>>({
  title: [
    {required: true, message: 'Please input title', trigger: 'blur'},
    {min: 3, max: 255, message: 'Length should be 3 to 255', trigger: 'blur'},
  ],
  description: [
    {required: false, message: 'Please input description', trigger: 'blur'},
  ],
})
const $page = usePage()

const authUser = ref($page.props.auth.user || null)
const isGuest = computed(() => authUser.value === null)
const isAuthorOfIdea = ref((idea) => !isGuest.value && authUser.value.id === idea.author.id)

const showIdeaModal = (value) => showNewIdeaModal.value = value
const showEditIdeaDialog = (value, idea) => {
  // Populate the edit form with the details of the selected idea
  ideaForm.id = idea.id;
  ideaForm.title = idea.title;
  ideaForm.description = idea.description;
  // Show the edit modal
  showEditIdeaModal.value = value;
};

const newIdeaSubmit = async (formEl: FormInstance | undefined) => {
  if (!formEl) return
  await formEl.validate((valid, fields) => {
    if (valid) {
      console.log('submit!')
      showIdeaModal(false)

      api.ideas.add({
        title: ideaForm.title,
        description: ideaForm.description,
        author_id: authUser.value.id,
      }).then((response) => {
        updateIdeaData(response)
      })
    } else {
      console.log('error submit!', fields)
    }
  })
}
const editIdeaSubmit = async (formEl: FormInstance | undefined) => {
  if (!formEl) return;
  await formEl.validate((valid, fields) => {
    if (valid) {
      console.log('submit!');
      showEditIdeaModal.value = false;

      if (ideaForm.id !== null) {
        // Send the edited idea data to the backend
        api.ideas.edit(ideaForm.id, {
          title: ideaForm.title,
          description: ideaForm.description,
        }).then((response) => {
          updateIdeaData(response);
        });
      } else {
        console.log('error submit!', fields);
      }

    } else {
      console.log('error submit!', fields);
    }
  });
};

const resetForm = (formEl: FormInstance | undefined) => {
  if (!formEl) return
  formEl.resetFields()
}

function voteUp(idea) {
  if (!isGuest.value && !idea.has_user_upvoted) {
    voteSubmit(idea, 'up')
  }
}
function voteDown(idea) {
  if (!isGuest.value && !idea.has_user_downvoted) {
    voteSubmit(idea, 'down')
  }
}
function voteSubmit(idea, type) {
  api.ideas.vote(idea.id, {
    type: type,
    user_id: authUser.value.id,
  }).then((response) => {
    updateIdeaData(response);
  });
}

const updateIdeaData = (response, remove = false) => {
  // Assuming the backend returns updated idea data with upvotes, downvotes, and userVote
  const updatedIdea = response.data.idea;
  const index = ideasDynamic.data.findIndex((item) => item.id === updatedIdea.id);

  if (index !== -1 && !remove) {
    // Update the idea in the local state
    ideasDynamic.data[index] = updatedIdea;
  } else if(!remove) {
    // Add the idea to the local state
    ideasDynamic.data.unshift(updatedIdea);
  } else {
    console.log({index, updatedIdea})
    // Remove the idea from the local state
    ideasDynamic.data.splice(index, 1);
  }
}
const deleteIdea = (id) => {
  api.ideas.delete(id).then((response) => {
    updateIdeaData(response, true)
  })
}

const confirmEvent = (id) => {
  console.log('confirm!')
  deleteIdea(id)
}
const cancelEvent = () => {
  console.log('cancel!')
}

</script>
<style lang="scss" scoped>
.icon-pointer {
  cursor: pointer;
  &:hover {
    color: #409EFF;
  }
}
</style>
