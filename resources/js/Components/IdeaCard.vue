<script setup>
import { Comment, More, Promotion } from '@element-plus/icons-vue'
import Popover from '@/Components/Popover.vue'
import Tooltip from '@/Components/Tooltip.vue'
import { useAuthUser } from '@/Composables/useAuthUser.ts'
import { useIdea } from '@/Composables/useIdea.ts'

defineProps({
  idea: Object,
  submitting: Boolean
})
defineEmits(['showEditModalHandler', 'deleteIdeaHandler', 'voteUpHandler', 'voteDownHandler'])

const { isAuthorOfIdea, circleUrl } = useAuthUser()
const {cancelEvent, ideaShow} = useIdea()


</script>

<template>
  <!-- IDEA HEADER -->
  <el-row justify="center" align="middle" :gutter="12">
    <el-col :xs="8" :sm="8" :md="8" :lg="8" :xl="8">
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
    <el-col :xs="4" :sm="4" :md="4" :lg="4" :xl="4" :push="2">
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
  <el-row justify="center" align="middle" :gutter="12" class="pb-4">
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12" class="idea-title">
      <el-text  @click="ideaShow(idea)">
        {{ idea.title }}
      </el-text>
    </el-col>
  </el-row>
  <!-- Icon Actions -->
  <el-row justify="center" align="middle" :gutter="12">
    <el-col :xs="8" :sm="8" :md="8" :lg="8" :xl="8">
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
    <el-col :xs="4" :sm="4" :md="4" :lg="4" :xl="4" :push="1">
      <Tooltip content="Comment" placement="top">
        <el-icon size="20" class="icon-pointer mr-2">
          <Comment/>
        </el-icon>
      </Tooltip>
      <Tooltip content="Send" placement="top">
        <el-icon size="20" class="icon-pointer mr-2">
          <Promotion/>
        </el-icon>
      </Tooltip>
      <Tooltip content="Save" placement="top">
        <el-icon size="20" class="icon-pointer">
          <icon-svg name="save-regular"/>
        </el-icon>
      </Tooltip>
    </el-col>
  </el-row>
  <el-row justify="center" align="middle" :gutter="12"  class="default-row">
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12">
      <el-divider />
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
  background-color: #fcfcf1;
  border-radius: 5px;
  &:hover {
    background-color: #eded90;
  }
}
.default-row {
  max-height: 30px;
}
</style>
