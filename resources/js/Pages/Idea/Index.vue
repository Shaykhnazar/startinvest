<template>
  <App>
    <template #header>
      <Head title="G'oyalar"/>
    </template>
    <el-backtop :right="50" :bottom="50" :visibility-height="300" />

    <el-container class="justify-center">
      <el-aside class="hidden md:block">
      </el-aside>
      <el-main class="max-w-[50rem]">
        <!-- NEW IDEA -->
        <PostNewIdeaSection
          @show-modal="showIdeaModal"
        />
        <!-- End  NEW IDEA -->

        <!-- IDEA LIST -->
        <template v-for="idea in items" :key="idea.id">
          <IdeaCard
            :idea="idea"
            :submitting="submitting"
            @show-edit-modal-handler="showIdeaEditModal"
            @show-comment-modal-handler="showIdeaCommentModal"
            @show-delete-modal-handler="showIdeaDeleteModal"
            @vote-up-handler="voteUp"
            @vote-down-handler="voteDown"
            @favorite-idea-handler="favoriteIdeaHandler"
            @send-idea-handler="sendIdeaHandler"
            class="mb-2"
          />
        </template>

        <div ref="landmark"></div>
      </el-main>
      <el-aside class="hidden lg:block">
      </el-aside>
    </el-container>

    <IdeaModal
      v-if="ideaModalVisible"
      :idea-form="ideaForm"
      :submitting="submitting"
      title="Yangi g'oya"
      submit-button-text="Ulashish"
      @close="showIdeaModal(false)"
      @submit="ideaSubmit"
      @reset="resetForm"
    />
    <IdeaModal
      v-if="ideaEditModalVisible"
      :idea-form="ideaForm"
      :submitting="submitting"
      title="G'oyani tahrirlash"
      submit-button-text="Saqlash"
      @close="showIdeaEditModal(false)"
      @submit="ideaSubmit"
      @reset="resetForm"
    />
    <IdeaCommentModal
      v-if="ideaCommentModalVisible"
      :idea-comment-form="ideaCommentForm"
      :submitting="submitting"
      submit-button-text="Ulashish"
      @close="showIdeaCommentModal(false)"
      @submit="commentIdeaHandler"
    />
    <IdeaDeleteModal
      v-show="ideaDeleteModalVisible"
      :is-visible="ideaDeleteModalVisible"
      :idea="ideaDeleteModalProps.idea"
      @close="showIdeaDeleteModal(false)"
      @delete-idea-handler="deleteIdea"
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
import IdeaDeleteModal from '@/Components/modals/IdeaDeleteModal.vue'

const props = defineProps({
  ideas: {
    type: Object,
  }
})
const landmark = ref(null)

const {
  ideaForm,
  ideaCommentForm,
  ideaDeleteModalProps,
  resetForm,
  showIdeaModal,
  showIdeaEditModal,
  showIdeaCommentModal,
  showIdeaDeleteModal,
  ideaModalVisible,
  ideaEditModalVisible,
  ideaCommentModalVisible,
  ideaDeleteModalVisible
} = useIdea()
const { info, success } = useElMessage()
const { items } = useInfiniteScroll('ideas', landmark)
const userStore = useUserStore()

const submitting = ref(false)

const updateIdeaList = (updatedIdea, remove = false) => {
  const index = items.findIndex(item => item.id === updatedIdea.id);

  if (index !== -1 && !remove) {
    // Use Vue.set or direct assignment for reactivity
    items[index] = updatedIdea;
  } else if (!remove) {
    items.unshift(updatedIdea);
  } else {
    items.splice(index, 1);
  }
};


const ideaSubmit = async (formEl, ideaData) => {
  if (!formEl) return;
  await formEl.validate((valid, fields) => {
    if (valid) {
      submitting.value = true

      if (ideaData.id !== null) {
        ideaEdit(ideaData)
      } else {
        ideaAdd(ideaData)
      }
    }
  });
};

const ideaEdit = async (ideaData) => {
  await api.ideas.edit(ideaData.id, {
    title: ideaData.title,
    description: ideaData.description,
  }).then((response) => {
    updateIdeaList(response.data.idea)
    showIdeaEditModal(false)
    success('G\'oya muvaffaqiyatli tahrirlandi')
  }).finally(() => {
    submitting.value = false
  });
}

const ideaAdd = async (ideaData) => {
  await api.ideas.add({
    title: ideaData.title,
    description: ideaData.description,
  }).then((response) => {
    updateIdeaList(response.data.idea)
    showIdeaModal(false)
    success('G\'oya muvaffaqiyatli qo\'shildi'
  )
  }).finally(() => {
    submitting.value = false
  })
}

const deleteIdea = async (id) => {
  submitting.value = true
  await api.ideas.delete(id).then((response) => {
    updateIdeaList(response.data.idea, true)
    showIdeaDeleteModal(false)
    info('G\'oya muvaffaqiyatli o\'chirildi'
  )
  }).finally(() => {
    submitting.value = false
  })
}

async function voteUp(idea) {
  if (votePreCheck() && !userStore.hasUpvotedIdea(idea) && !submitting.value) {
    await voteSubmit(idea, VOTE_TYPES.UP)
  }
}

async function voteDown(idea) {
  if (votePreCheck() && !userStore.hasDownvotedIdea(idea) && !submitting.value) {
    await voteSubmit(idea, VOTE_TYPES.DOWN)
  }
}

async function favoriteIdeaHandler(idea) {
  if (userStore.isGuest) {
    info('G\'oyalarni saqlash uchun tizimga kiring')
  } else if (!submitting.value) {
    submitting.value = true
    await api.ideas.favorite(idea.id).then((response) => {
      updateIdeaList(response.data.idea)
      userStore.updateUserFavorites(response.data.user_favorites)
      if (userStore.hasFavoritedIdea(idea)) {
        success('G\'oya muvaffaqiyatli saqlandi')
      } else {
        info('G\'oya sizning sevimlilar ro\'yxatingizdan o\'chirildi'
      )
      }
    }).finally(() => {
      submitting.value = false
    })
  }
}

async function commentIdeaHandler(formEl, ideaCommentFormData) {
  if (userStore.isGuest) {
    info('Iltimos, sharh qoldirish uchun tizimga kiring');
  } else if (!submitting.value) {
    if (!formEl) return;
    await formEl.validate(async (valid, fields) => {
      if (valid) {
        submitting.value = true;
        await api.ideas.comment(ideaCommentFormData.idea.id, {
          body: ideaCommentFormData.body,
          parent_id: ideaCommentFormData.parent_id ?? null,
        }).then((response) => {
          // Directly update the ideaComments array
          updateIdeaList(response.data.idea);
          userStore.updateUserComments(response.data.user_comments);
        }).finally(() => {
          submitting.value = false;
        });
      }
    });
  }
}

function sendIdeaHandler(idea) {
  // TODO: send idea need to be implemented
}

function votePreCheck() {
  if (userStore.isGuest) {
    info('Ovoz berish uchun tizimga kiring')
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
    info('Ovoz berildi')
  }).finally(() => {
    submitting.value = false
  });
}
</script>

<style lang="scss" scoped>
</style>
