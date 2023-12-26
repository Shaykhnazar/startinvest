<template>
  <App>
    <template #header>
      <Head title="Ideas"/>
    </template>

    <el-container>
      <el-main>
        <!-- NEW IDEA -->
        <PostNewIdeaSection
          @show-modal="showIdeaModal"
        />

        <!-- IDEA LIST -->
        <template v-for="idea in ideasDynamic.data" :key="idea.id">
          <IdeaCard
            :idea="idea"
            :submitting="submitting"
            @show-edit-modal-handler="showIdeaEditModal"
            @delete-idea-handler="deleteIdea"
            @vote-up-handler="voteUp"
            @vote-down-handler="voteDown"
            @favorite-idea-handler="favoriteIdeaHandler"
            @send-idea-handler="sendIdeaHandler"
          ></IdeaCard>
        </template>
<!--TODO: Implement pagination with infinite scroll        -->
      </el-main>
    </el-container>

    <IdeaModal
      v-if="ideaModalVisible"
      :idea-form="ideaForm"
      :submitting="submitting"
      title="New Idea"
      submit-button-text="Post"
      @close="showIdeaModal(false)"
      @submit="ideaSubmit"
      @reset="resetForm"
    />
    <IdeaModal
      v-if="ideaEditModalVisible"
      :idea-form="ideaForm"
      :submitting="submitting"
      title="Edit Idea"
      submit-button-text="Save"
      @close="showIdeaEditModal(false)"
      @submit="ideaSubmit"
      @reset="resetForm"
    />
  </App>
</template>

<script setup>
import {reactive, ref} from 'vue';

import App from '@/Layouts/App.vue'
import { Head } from '@inertiajs/vue3';
import IdeaModal from "@/Components/modals/IdeaModal.vue";
import IdeaCard from '@/Components/IdeaCard.vue'
import PostNewIdeaSection from '@/Components/PostNewIdeaSection.vue'
import { useIdea } from '@/Composables/useIdea.ts'
import { useAuthUser } from '@/Composables/useAuthUser.ts'
import { useElMessage } from '@/Composables/helpers.js'
import api from '@/services/api'

const props = defineProps({
  ideas: {
    type: Object,
  }
})
const ideasDynamic = reactive(props.ideas)

const { ideaForm, resetForm,  showIdeaModal, showIdeaEditModal, ideaModalVisible, ideaEditModalVisible } = useIdea()
const {info, success} = useElMessage();
const {authUser, isGuest} = useAuthUser();

const submitting = ref(false)

const updateIdeaList = (updatedIdea, remove = false) => {
  // Assuming the backend returns updated idea data with upvotes, downvotes, and userVote
  const index = ideasDynamic.data.findIndex((item) => item.id === updatedIdea.id);

  if (index !== -1 && !remove) {
    // Update the idea in the local state
    ideasDynamic.data[index] = updatedIdea;
  } else if (!remove) {
    // Add the idea to the local state
    ideasDynamic.data.unshift(updatedIdea);
  } else {
    // Remove the idea from the local state
    ideasDynamic.data.splice(index, 1);
  }
}

const ideaSubmit = async (formEl, ideaData) => {
  if (!formEl) return;
  await formEl.validate((valid, fields) => {
    if (valid) {
      submitting.value = true
      console.log('submit!');

      if (ideaData.id !== null) {
        // Send the edited idea data to the backend
        api.ideas.edit(ideaData.id, {
          title: ideaData.title,
          description: ideaData.description,
        }).then((response) => {
          updateIdeaList(response.data.idea)
          showIdeaEditModal(false)
          success('Idea edited successfully')
        }).finally(() => {
          submitting.value = false
        });
      } else {
        api.ideas.add({
          title: ideaData.title,
          description: ideaData.description,
          author_id: authUser.value.id,
        }).then((response) => {
          updateIdeaList(response.data.idea)
          showIdeaModal(false)
          success('Idea added successfully')
        }).finally(() => {
          submitting.value = false
        })
      }

    } else {
      console.log('error submit!', fields);
    }
  });
};
const deleteIdea = (id) => {
  submitting.value = true
  api.ideas.delete(id).then((response) => {
    updateIdeaList(response.data.idea, true)
    info('Idea deleted successfully')
  }).finally(() => {
    submitting.value = false
  })
}

function voteUp(idea) {
  if (votePreCheck() && !idea.has_user_upvoted && !submitting.value) {
    voteSubmit(idea, 'up')
  }
}
function voteDown(idea) {
  if (votePreCheck() && !idea.has_user_downvoted && !submitting.value) {
    voteSubmit(idea, 'down')
  }
}

function favoriteIdeaHandler(idea) {
  if (isGuest.value) {
    info('Please login to save ideas')
  }
  else if (!submitting.value) {
    submitting.value = true
    api.ideas.favorite(idea.id).then((response) => {
      updateIdeaList(response.data.idea)
      if (!idea.has_user_favorited) {
        success('Idea saved successfully')
      }
    }).finally(() => {
      submitting.value = false
    })
  }
}

function sendIdeaHandler(idea) {
  // TODO: send idea need to be implemented
}

function votePreCheck() {
  if (isGuest.value) {
    info('Please login to vote')
    return false
  }
  return true
}

function voteSubmit(idea, type) {
  submitting.value = true
  api.ideas.vote(idea.id, {
    type: type,
    user_id: authUser.value.id,
  }).then((response) => {
    updateIdeaList(response.data.idea)

    info('Voted successfully')
  }).finally(() => {
    submitting.value = false
  });
}


</script>
<style lang="scss" scoped>
</style>
