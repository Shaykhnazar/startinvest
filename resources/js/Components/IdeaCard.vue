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
  'voteUpHandler',
  'voteDownHandler',
  'favoriteIdeaHandler',
  'sendIdeaHandler',
  'showCommentModalHandler',
  'showDeleteModalHandler'
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
          <h5 class="group-hover:text-gray-600 group-focus:text-gray-600 text-sm font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:group-focus:text-neutral-400 dark:text-neutral-200 ">
            <span class=" hover:underline hover:text-blue-500 dark:hover:text-blue-500 focus:outline-none dark:focus:outline-none focus:text-blue-500 dark:focus:text-blue-500">{{  idea.author?.name  }}</span>
          </h5>
          <p class="text-sm text-gray-500 dark:text-neutral-500">
            {{ idea.created_at }}
          </p>
        </Link>

          <div class="flex justify-end">
            <!-- More Dropdown -->
            <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
              <button id="hs-pro-dupc1" type="button" class="size-7 inline-flex justify-center items-center gap-x-2 rounded-lg border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-200 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <svg class="lucide lucide-ellipsis shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
              </button>

              <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-40 transition-[opacity,margin] duration opacity-0 hidden z-10 bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-900" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-dupc1">
                <div class="p-1">
                  <button type="button" @click="$emit('showEditModalHandler', true, idea)" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-overlay="#hs-pro-detm">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                      <path d="m15 5 4 4" />
                    </svg>
                    Tahrirlash
                  </button>
<!--                  <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">-->
<!--                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />-->
<!--                    </svg>-->
<!--                    Add to favorites-->
<!--                  </button>-->
<!--                  <button type="button" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">-->
<!--                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                      <rect width="20" height="5" x="2" y="4" rx="2" />-->
<!--                      <path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9" />-->
<!--                      <path d="M10 13h4" />-->
<!--                    </svg>-->
<!--                    Archive-->
<!--                  </button>-->

                  <div class="my-1 border-t border-gray-200 dark:border-neutral-700"></div>

                  <template v-if="userStore.isAuthorOfIdea(idea)">
                    <button type="button" @click="$emit('showDeleteModalHandler', true, idea)" class="w-full flex items-center gap-x-3 py-1.5 px-2 rounded-lg text-[13px] font-normal text-red-600 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-red-500 dark:hover:bg-neutral-800 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dtlam">
                      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 6h18" />
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                        <line x1="10" x2="10" y1="11" y2="17" />
                        <line x1="14" x2="14" y1="11" y2="17" />
                      </svg>
                      O'chirish
                    </button>
                  </template>
                </div>
              </div>
            </div>
            <!-- End More Dropdown -->
          </div>
      </div>
      <!-- End Avatar Media -->
    </div>
    <!-- Title -->
    <div class="grid grid-cols-1 gap-y-2 lg:gap-y-0 lg:gap-x-5">
      <div class="idea-title flex justify-center items-center gap-x-0.5 dark:hover:bg-neutral-800" @click="toggleDescription(idea)">
        <p class="text-md text-dark-500 dark:text-neutral-200 hover:underline focus:outline-none dark:focus:outline-none ">
          {{ idea.title }}
        </p>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
      </div>
      <div class="mb-4">
        <el-collapse-transition>
          <div v-show="showIdeaDescByCollapse" class="idea-desc">
            <el-text v-if="isLoadingDescription">Yuklanmoqda...</el-text>
            <el-text v-else v-html="ideaDescription" class="dark:text-neutral-300"></el-text>
          </div>
        </el-collapse-transition>
      </div>
    </div>
    <!-- Actions -->
    <div class="grid grid-cols-2 gap-y-1 pt-2 lg:gap-y-0 lg:gap-x-5 border-t border-gray-200 dark:border-neutral-700">
      <div>
        <div class="absolute">
          <el-badge :hidden="idea.upvotes === 0" :value="idea.upvotes" class="item dark:hover:bg-neutral-700 dark:hover:rounded" type="success">
            <Tooltip :content="userStore.hasUpvotedIdea(idea) ? '👍' : '👍'" placement="top">
              <el-icon size="20" class="icon-pointer mt-0.5 mr-2 dark:text-[#409EFF]" @click="$emit('voteUpHandler', idea)">
                <icon-svg name="like-solid" v-if="userStore.hasUpvotedIdea(idea)"/>
                <icon-svg name="like-regular" v-else />
              </el-icon>
            </Tooltip>
          </el-badge>
          <el-badge :hidden="idea.downvotes === 0" :value="idea.downvotes" class="item dark:hover:bg-neutral-700 dark:hover:rounded">
            <Tooltip :content="userStore.hasDownvotedIdea(idea) ? '👎' : '👎'" placement="top">
              <el-icon size="20" class="icon-pointer mt-0.5 ml-2 mr-2 dark:text-[#409EFF]" @click="$emit('voteDownHandler', idea)">
                <icon-svg name="dislike-solid" v-if="userStore.hasDownvotedIdea(idea)"/>
                <icon-svg name="dislike-regular" v-else />
              </el-icon>
            </Tooltip>
          </el-badge>
        </div>
      </div>
      <div class="flex justify-end items-center flex-wrap gap-x-1">
        <el-badge :hidden="!idea.comments_count || idea.comments_count === 0" :value="idea.comments_count" class="tooltip-base-box dark:hover:bg-neutral-700 dark:hover:rounded" type="info">
          <Tooltip content="Izoh" placement="top">
            <el-icon size="20" class="icon-pointer mt-0.5 mr-2 dark:text-[#409EFF]" @click="$emit('showCommentModalHandler', true, idea)">
              <Comment/>
            </el-icon>
          </Tooltip>
        </el-badge>
        <!--      <Tooltip content="Yuborish" placement="top">-->
        <!--        <el-icon size="20" class="icon-pointer mr-2" @click="$emit('sendIdeaHandler', idea)">-->
        <!--          <Promotion/>-->
        <!--        </el-icon>-->
        <!--      </Tooltip>-->
        <Tooltip :content="userStore.hasFavoritedIdea(idea) ? 'Saqlangan' : 'Saqlash'" placement="top" class="dark:hover:bg-neutral-700 dark:hover:rounded">
          <el-icon size="20" class="icon-pointer mt-0.5 ml-2 dark:text-[#409EFF]" @click="$emit('favoriteIdeaHandler', idea)">
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
}
.idea-header {
  margin-bottom: 10px;
}
.idea-desc {
  height: auto;
  cursor: text;
  text-decoration: none;
  border-radius: 5px;
  //border: 1px solid #ffffff;
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
