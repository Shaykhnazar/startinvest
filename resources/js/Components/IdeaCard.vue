<script setup>
import { Comment, More, Promotion } from '@element-plus/icons-vue'
import Popover from '@/Components/Popover.vue'
import Tooltip from '@/Components/Tooltip.vue'
import { useAuthUser } from '@/Composables/useAuthUser.ts'
import { useIdea } from '@/Composables/useIdea.ts'
import { ref } from 'vue'

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


const { isAuthorOfIdea, circleUrl } = useAuthUser()
const {cancelEvent} = useIdea()

const showIdeaDescByCollapse = ref(false)
const toggleDescription = () => {
  showIdeaDescByCollapse.value = !showIdeaDescByCollapse.value
}
</script>

<template>
  <!-- IDEA HEADER -->
  <el-row justify="center" align="middle" :gutter="12" class="idea-header">
    <el-col :xs="6" :sm="6" :md="6" :lg="6" :xl="6" class="flex-start-col">
      <Popover>
        <template #reference>
          <el-avatar :size="20" :src="circleUrl" class="mr-2 icon-pointer"/>
        </template>
        <p>{{ idea.author?.name }}</p>
      </Popover>
      <el-text size="small" class="icon-pointer">
        <Popover>
          <template #reference>
            <span>{{ idea.author?.name }}</span>
          </template>
          <div>
            <p>{{ idea.author?.name }}</p>
          </div>
        </Popover>
      </el-text>
    </el-col>
    <el-col :xs="6" :sm="6" :md="6" :lg="6" :xl="6" class="flex-end-col">
      <el-text size="small">
        {{ idea.created_at }}
      </el-text>
      <Popover placement="right-end" trigger="click" :width="50" :show-after="0" :hide-after="0">
        <template #reference>
          <el-icon size="20" class="icon-pointer ml-1"><More/></el-icon>
        </template>
        <ul>
          <template v-if="isAuthorOfIdea(idea)">
            <li class="icon-pointer" @click="$emit('showEditModalHandler', true, idea)">Edit</li><hr/>
            <el-popconfirm
              confirm-button-text="Yes"
              cancel-button-text="No"
              icon-color="#626AEF"
              title="Are you sure to delete this?"
              @confirm="$emit('deleteIdeaHandler', idea.id)"
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
  <!-- Title -->
  <el-row justify="center" align="middle" :gutter="12" class="flex-col">
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12" class="idea-title" @click="toggleDescription">
      <el-text>
        {{ idea.title }}
      </el-text>
    </el-col>
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12">
      <el-collapse-transition>
        <div v-show="showIdeaDescByCollapse && !!idea.description" class="idea-desc">
          <el-text>
            {{ idea.description }}
          </el-text>
        </div>
      </el-collapse-transition>
    </el-col>
  </el-row>
  <!-- Actions -->
  <el-row justify="center" align="middle" :gutter="12" class="mt-5">
    <el-col :xs="6" :sm="6" :md="6" :lg="6" :xl="6" class="flex-start-col">
      <el-badge :hidden="idea.upvotes === 0" :value="idea.upvotes" class="item" type="success">
        <Tooltip :content="idea.has_user_upvoted ? 'Liked' : 'Like'" placement="top">
          <el-icon size="20" class="icon-pointer mt-0.5 mr-2" @click="$emit('voteUpHandler', idea)">
            <icon-svg name="like-solid" v-if="idea.has_user_upvoted ?? false" />
            <icon-svg name="like-regular" v-else />
          </el-icon>
        </Tooltip>
      </el-badge>
      <el-badge :hidden="idea.downvotes === 0" :value="idea.downvotes" class="item">
        <Tooltip :content="idea.has_user_downvoted ? 'Disliked' : 'Dislike'" placement="top">
          <el-icon size="20" class="icon-pointer mt-0.5 ml-2 mr-2" @click="$emit('voteDownHandler', idea)">
            <icon-svg name="dislike-solid" v-if="idea.has_user_downvoted ?? false" />
            <icon-svg name="dislike-regular" v-else />
          </el-icon>
        </Tooltip>
      </el-badge>
    </el-col>
    <el-col :xs="6" :sm="6" :md="6" :lg="6" :xl="6" class="flex-end-col">
      <el-badge :hidden="idea.comments_count == null || idea.comments_count === 0" :value="idea.comments_count" class="item" type="info">
        <Tooltip content="Comment" placement="top">
          <el-icon size="20" class="icon-pointer mt-0.5 mr-2" @click="$emit('showCommentModalHandler', true, idea)">
            <Comment/>
          </el-icon>
        </Tooltip>
      </el-badge>
<!--      <Tooltip content="Send" placement="top">-->
<!--        <el-icon size="20" class="icon-pointer mr-2" @click="$emit('sendIdeaHandler', idea)">-->
<!--          <Promotion/>-->
<!--        </el-icon>-->
<!--      </Tooltip>-->
        <Tooltip :content="idea.has_user_favorited ? 'Saved' : 'Save'" placement="top">
          <el-icon size="20" class="icon-pointer mt-0.5 ml-2" @click="$emit('favoriteIdeaHandler', idea)">
            <icon-svg name="save-solid" v-if="idea.has_user_favorited ?? false" />
            <icon-svg name="save-regular" v-else/>
          </el-icon>
        </Tooltip>
    </el-col>
  </el-row>
  <el-row justify="center" align="top" :gutter="12"  class="default-row">
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12" >
      <el-divider/>
    </el-col>
  </el-row>
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
  background-color: #fcfcf1;
  border-radius: 5px;
  border: 1px solid #eded90;
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
