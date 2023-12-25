<script setup>

import { Head } from '@inertiajs/vue3'
import App from '@/Layouts/App.vue'
import IdeaCard from '@/Components/IdeaCard.vue'
import IdeaModal from '@/Components/modals/IdeaModal.vue'
defineProps({
  idea: Object
})
</script>

<template>
  <App>
    <template #header>
      <Head title="Idea"/>
    </template>

<!--    <el-container>-->
<!--      <el-main>-->
<!--        <IdeaCard-->
<!--          :idea="idea"-->
<!--          :submitting="submitting"-->
<!--          @show-edit-modal-handler="showIdeaEditModal"-->
<!--          @delete-idea-handler="deleteIdea"-->
<!--          @vote-up-handler="voteUp"-->
<!--          @vote-down-handler="voteDown"-->
<!--        ></IdeaCard>-->
<!--      </el-main>-->
<!--    </el-container>-->

<!--    <IdeaModal-->
<!--      v-if="ideaEditModalVisible"-->
<!--      :idea-form="ideaForm"-->
<!--      :submitting="submitting"-->
<!--      title="Edit Idea"-->
<!--      submit-button-text="Save"-->
<!--      @close="showIdeaEditModal(false)"-->
<!--      @submit="ideaSubmit"-->
<!--      @reset="resetForm"-->
<!--    />-->
  </App>
</template>

<style scoped>

</style>
