<script setup>
import { Comment, More } from '@element-plus/icons-vue'
import Popover from '@/Components/Popover.vue'
import Tooltip from '@/Components/Tooltip.vue'
import { useUserStore } from '@/stores/UserStore.js'
import { useIdea } from '@/Composables/useIdea.ts'
import { ref, defineEmits } from 'vue'
import api from '@/services/api.js'
import { Link } from '@inertiajs/vue3'

defineProps({
  idea: Object,
  submitting: Boolean
})
defineEmits([
  'showEditModalHandler',
  'deleteIdeaHandler',
  'voteUpHandler',
  'voteDownHandler',
  'favoriteIdeaHandler',
  'sendIdeaHandler',
  'showCommentModalHandler'
])

const userStore = useUserStore()
const { cancelEvent } = useIdea()

const showIdeaDescByCollapse = ref(false)
const isLoadingDescription = ref(false)
const ideaDescription = ref('')

const toggleDescription = async (idea) => {
  if (!showIdeaDescByCollapse.value && !ideaDescription.value) {
    isLoadingDescription.value = true
    try {
      const response = await api.ideas.show(idea.id)
      ideaDescription.value = response.data.description
    } catch (error) {
      console.error('G\'oyaning tavsifini olishda xatolik:', error)
    } finally {
      isLoadingDescription.value = false
    }
  }
  showIdeaDescByCollapse.value = !showIdeaDescByCollapse.value
}
</script>

<template>
  <div class="p-4 bg-white border border-green-100 rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
  <!-- IDEA HEADER -->
    <div class="grid grid-cols-1 lg:gap-y-0 lg:gap-x-5">
      <!-- Avatar Media -->
      <div class="flex flex-row items-center gap-x-3 mb-2">
        <Link :href="route('user.profile', idea.author?.id)" class="block shrink-0 focus:outline-none">
          <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
        </Link>

        <Link class="grow block focus:outline-none" :href="route('user.profile', idea.author?.id)">
          <h5 class="group-hover:text-gray-600 group-focus:text-gray-600 text-sm font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:group-focus:text-neutral-400 dark:text-neutral-200">
            {{  idea.author?.name  }}
          </h5>
<!--          <p class="text-sm text-gray-500 dark:text-neutral-500">-->
<!--            {{ idea.author?.email }}-->
<!--          </p>-->
        </Link>

          <div class="flex justify-end">
            <el-text size="small">
              {{ idea.created_at }}
            </el-text>
            <div class="relative">
              <Popover placement="right-end" trigger="click" :width="50" :show-after="0" :hide-after="0">
                <template #reference>
                  <el-icon size="20" class="icon-pointer ml-1"><More/></el-icon>
                </template>
                <ul>
                  <template v-if="userStore.isAuthorOfIdea(idea)">
                    <li class="icon-pointer" @click="$emit('showEditModalHandler', true, idea)">Tahrirlash</li><hr/>
                    <el-popconfirm
                      confirm-button-text="Ha"
                      cancel-button-text="Yo'q"
                      icon-color="#626AEF"
                      title="O'chirishni tasdiqlaysizmi?"
                      @confirm="$emit('deleteIdeaHandler', idea.id)"
                      @cancel="cancelEvent"
                    >
                      <template #reference>
                        <li class="icon-pointer" style="color: #ff1100">O'chirish</li>
                      </template>
                    </el-popconfirm>
                    <hr/>
                  </template>
                  <li class="icon-pointer" style="color: #e72121">Shikoyat qilish</li>
                </ul>
              </Popover>
            </div>
          </div>
      </div>
      <!-- End Avatar Media -->
    </div>
    <!-- Title -->
    <div class="grid grid-cols-1 gap-y-2 lg:gap-y-0 lg:gap-x-5">
      <div class="idea-title flex justify-center items-center gap-x-0.5" @click="toggleDescription(idea)">
        <p class="text-md text-dark-500 dark:text-neutral-200">
          {{ idea.title }}
        </p>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
      </div>
      <div class="mb-4">
        <el-collapse-transition>
          <div v-show="showIdeaDescByCollapse" class="idea-desc">
            <el-text v-if="isLoadingDescription">Yuklanmoqda...</el-text>
            <el-text v-else v-html="ideaDescription"></el-text>
          </div>
        </el-collapse-transition>
      </div>
    </div>
    <!-- Actions -->
    <div class="grid grid-cols-2 lg:gap-y-0 lg:gap-x-5">
      <div>
        <div class="absolute">
          <el-badge :hidden="idea.upvotes === 0" :value="idea.upvotes" class="item" type="success">
            <Tooltip :content="userStore.hasUpvotedIdea(idea) ? '👍' : '👍'" placement="top">
              <el-icon size="20" class="icon-pointer mt-0.5 mr-2" @click="$emit('voteUpHandler', idea)">
                <icon-svg name="like-solid" v-if="userStore.hasUpvotedIdea(idea)"/>
                <icon-svg name="like-regular" v-else />
              </el-icon>
            </Tooltip>
          </el-badge>
          <el-badge :hidden="idea.downvotes === 0" :value="idea.downvotes" class="item">
            <Tooltip :content="userStore.hasDownvotedIdea(idea) ? '👎' : '👎'" placement="top">
              <el-icon size="20" class="icon-pointer mt-0.5 ml-2 mr-2" @click="$emit('voteDownHandler', idea)">
                <icon-svg name="dislike-solid" v-if="userStore.hasDownvotedIdea(idea)"/>
                <icon-svg name="dislike-regular" v-else />
              </el-icon>
            </Tooltip>
          </el-badge>
        </div>
      </div>
      <div class="flex justify-end items-center flex-wrap gap-x-1">
        <el-badge :hidden="!idea.comments_count || idea.comments_count === 0" :value="idea.comments_count" class="tooltip-base-box" type="info">
          <Tooltip content="Izoh" placement="top">
            <el-icon size="20" class="icon-pointer mt-0.5 mr-2" @click="$emit('showCommentModalHandler', true, idea)">
              <Comment/>
            </el-icon>
          </Tooltip>
        </el-badge>
        <!--      <Tooltip content="Yuborish" placement="top">-->
        <!--        <el-icon size="20" class="icon-pointer mr-2" @click="$emit('sendIdeaHandler', idea)">-->
        <!--          <Promotion/>-->
        <!--        </el-icon>-->
        <!--      </Tooltip>-->
        <Tooltip :content="userStore.hasFavoritedIdea(idea) ? 'Saqlangan' : 'Saqlash'" placement="top">
          <el-icon size="20" class="icon-pointer mt-0.5 ml-2" @click="$emit('favoriteIdeaHandler', idea)">
            <icon-svg name="save-solid" v-if="userStore.hasFavoritedIdea(idea)" />
            <icon-svg name="save-regular" v-else/>
          </el-icon>
        </Tooltip>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.icon-pointer {
  cursor: pointer;
  &:hover {
    color: #409EFF;
  }
}
.idea-title {
  cursor: pointer;
  text-decoration: none;
  white-space: pre-wrap;
  word-break: break-word;
  background: transparent;
  border-radius: 5px;
  &:hover {
    background-color: #eded90;
  }
}
.idea-header {
  margin-bottom: 10px;
}
.idea-desc {
  height: auto;
  cursor: text;
  text-decoration: none;
  background-color: #fcfcf1;
  border-radius: 5px;
  border: 1px solid #eded90;
  padding: 0 10px 0 10px;
  margin-top: 2px;
}

.default-row {
  max-height: 30px;
  //flex-direction: column;
  //display: flex;
  //justify-content: center;
  //align-items: flex-start;
}

.flex-start-col {
  flex-direction: row;
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.flex-end-col {
  flex-direction: row;
  display: flex;
  justify-content: flex-end;
  align-items: center;
}

</style>
