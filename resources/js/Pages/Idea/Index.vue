<template>
  <App>
    <template #header>
      <Head title="Ideas"/>
    </template>
    <el-backtop :right="50" :bottom="50" />

    <el-container>
      <el-main>
        <!-- NEW IDEA -->
        <PostNewIdeaSection
          @show-modal="showIdeaModal"
        />

        <!-- IDEA LIST -->
        <template v-for="idea in items" :key="idea.id">
          <IdeaCard
            :idea="idea"
            :submitting="submitting"
            @show-edit-modal-handler="showIdeaEditModal"
            @show-comment-modal-handler="showIdeaCommentModal"
            @delete-idea-handler="deleteIdea"
            @vote-up-handler="voteUp"
            @vote-down-handler="voteDown"
            @favorite-idea-handler="favoriteIdeaHandler"
            @send-idea-handler="sendIdeaHandler"
          />
        </template>

        <div ref="landmark"></div>
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
    <IdeaCommentModal
      v-if="ideaCommentModalVisible"
      :idea-comment-form="ideaCommentForm"
      :submitting="submitting"
      submit-button-text="Post"
      @close="showIdeaCommentModal(false)"
      @submit="commentIdeaHandler"
    />
  </App>
</template>

<script setup>
import { ref, onMounted } from 'vue';

import App from '@/Layouts/App.vue'
import { Head, usePage } from '@inertiajs/vue3';
import IdeaModal from "@/Components/modals/IdeaModal.vue";
import IdeaCard from '@/Components/IdeaCard.vue'
import PostNewIdeaSection from '@/Components/PostNewIdeaSection.vue'
import { useIdea } from '@/Composables/useIdea.ts'
import { useUserStore } from '@/stores/UserStore.js'
import { useElMessage } from '@/Composables/helpers.js'
import api from '@/services/api'
import IdeaCommentModal from '@/Components/modals/IdeaCommentModal.vue'
import { useInfiniteScroll } from '@/Composables/useInfiniteScroll.js'
import { VOTE_TYPES } from '@/services/const.js'

const props = defineProps({
  ideas: {
    type: Object,
  }
})
const landmark = ref(null)

const { ideaForm, ideaCommentForm, resetForm,  showIdeaModal, showIdeaEditModal, showIdeaCommentModal, ideaModalVisible, ideaEditModalVisible, ideaCommentModalVisible } = useIdea()
const {info, success} = useElMessage();
const { items } = useInfiniteScroll('ideas', landmark)
const userStore = useUserStore()

const submitting = ref(false)

const updateIdeaList = (updatedIdea, remove = false) => {
  // Assuming the backend returns updated idea data with upvotes, downvotes
  const index = items.value.findIndex((item) => item.id === updatedIdea.id);

  if (index !== -1 && !remove) {
    // Update the idea in the local state
    items.value[index] = updatedIdea;
  } else if (!remove) {
    // Add the idea to the local state
    items.value.unshift(updatedIdea);
  } else {
    // Remove the idea from the local state
    items.value.splice(index, 1);
  }
}

const ideaSubmit = async (formEl, ideaData) => {
  if (!formEl) return;
  await formEl.validate((valid, fields) => {
    if (valid) {
      submitting.value = true
      // console.log('submit!');

      if (ideaData.id !== null) {
        ideaEdit(ideaData)
      } else {
        ideaAdd(ideaData)
      }
    } else {
      // console.log('error submit!', fields);
    }
  });
};

const ideaEdit = (ideaData) => {
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
}

const ideaAdd = (ideaData) => {
  api.ideas.add({
    title: ideaData.title,
    description: ideaData.description,
  }).then((response) => {
    updateIdeaList(response.data.idea)
    showIdeaModal(false)
    success('Idea added successfully')
  }).finally(() => {
    submitting.value = false
  })
}

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
  if (votePreCheck() && !userStore.hasUpvotedIdea(idea) && !submitting.value) {
    voteSubmit(idea, VOTE_TYPES.UP)
  }
}
function voteDown(idea) {
  if (votePreCheck() && !userStore.hasDownvotedIdea(idea) && !submitting.value) {
    voteSubmit(idea, VOTE_TYPES.DOWN)
  }
}

async function favoriteIdeaHandler(idea) {
  if (userStore.isGuest) {
    info('Please login to save ideas')
  }
  else if (!submitting.value) {
    submitting.value = true
    await api.ideas.favorite(idea.id).then((response) => {
      updateIdeaList(response.data.idea)
      userStore.updateUserFavorites(response.data.user_favorites)
      if (userStore.hasFavoritedIdea(idea)) {
        success('Idea saved successfully')
      } else {
        info('Idea removed from your favorites')
      }
    }).finally(() => {
      submitting.value = false
    })
  }
}

async function commentIdeaHandler(formEl, ideaCommentFormData) {
  if (userStore.isGuest) {
    info('Please login to comment')
  }
  else if (!submitting.value) {
    if (!formEl) return;
    await formEl.validate((valid, fields) => {
      if (valid) {
        submitting.value = true
        api.ideas.comment(ideaCommentFormData.idea.id, {
          body: ideaCommentFormData.body,
          parent_id: ideaCommentFormData.parent_id ?? null,
        }).then((response) => {
          updateIdeaList(response.data.idea)
          userStore.updateUserComments(response.data.user_comments)
        }).finally(() => {
          submitting.value = false
        })
      } else {
        console.log('error submit!', fields);
      }
    });
  }
}

function sendIdeaHandler(idea) {
  // TODO: send idea need to be implemented
}

function votePreCheck() {
  if (userStore.isGuest) {
    info('Please login to vote')
    return false
  }
  return true
}

async function voteSubmit(idea, type) {
  submitting.value = true
  await api.ideas.vote(idea.id, {
    type: type,
  }).then((response) => {
    updateIdeaList(response.data.idea)
    userStore.updateUserVotes(response.data.user_votes)
    info('Voted successfully')
  }).finally(() => {
    submitting.value = false
  });
}


</script>
<style lang="scss" scoped>
</style>
