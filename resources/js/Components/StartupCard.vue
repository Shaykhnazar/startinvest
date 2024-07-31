<script setup>
import { More } from '@element-plus/icons-vue';
import Popover from '@/Components/Popover.vue';
import { useUserStore } from '@/stores/UserStore.js';
import { ref } from 'vue';
import api from '@/services/api.js';

defineProps({
  startup: Object,
});
defineEmits([
  'voteUpHandler',
  'voteDownHandler',
  'favoriteStartupHandler'
]);

const userStore = useUserStore();
const showStartupDescByCollapse = ref(false);
const isLoadingDescription = ref(false);
const startupDescription = ref('');

const toggleDescription = async (startup) => {
  if (!showStartupDescByCollapse.value && !startupDescription.value) {
    isLoadingDescription.value = true;
    try {
      const response = await api.startups.show(startup.id);
      startupDescription.value = response.data.description;
    } catch (error) {
      console.error('Failed to fetch startup description:', error);
    } finally {
      isLoadingDescription.value = false;
    }
  }
  showStartupDescByCollapse.value = !showStartupDescByCollapse.value;
};
</script>

<template>
  <!-- STARTUP HEADER -->
  <el-row justify="center" align="middle" :gutter="12" class="startup-header">
    <el-col :xs="6" :sm="6" :md="6" :lg="6" :xl="6" class="flex-start-col">
      <Popover>
        <template #reference>
          <el-avatar :size="20" :src="userStore.avatar" class="mr-2 icon-pointer" />
        </template>
        <p>{{ startup.author?.name }}</p>
      </Popover>
      <el-text size="small" class="icon-pointer">
        <Popover>
          <template #reference>
            <span>{{ startup.author?.name }}</span>
          </template>
          <div>
            <p>{{ startup.author?.name }}</p>
          </div>
        </Popover>
      </el-text>
    </el-col>
    <el-col :xs="6" :sm="6" :md="6" :lg="6" :xl="6" class="flex-end-col">
      <el-text size="small">
        {{ startup.created_at }}
      </el-text>
      <Popover placement="right-end" trigger="click" :width="50" :show-after="0" :hide-after="0">
        <template #reference>
          <el-icon size="20" class="icon-pointer ml-1"><More/></el-icon>
        </template>
        <ul>
          <li class="icon-pointer" style="color: #e72121">Report</li>
        </ul>
      </Popover>
    </el-col>
  </el-row>
  <!-- Title -->
  <el-row justify="center" align="middle" :gutter="12" class="flex-col">
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12" class="startup-title" @click="toggleDescription(startup)">
      <el-text>
        {{ startup.title }} <span >...</span>
      </el-text>
    </el-col>
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12">
      <el-collapse-transition>
        <div v-show="showStartupDescByCollapse" class="startup-desc">
          <el-text v-if="isLoadingDescription">Loading...</el-text>
          <el-text v-else>{{ startupDescription }}</el-text>
        </div>
      </el-collapse-transition>
    </el-col>
  </el-row>
  <!-- Actions -->
  <el-row justify="center" align="top" :gutter="12" class="default-row">
    <el-col :xs="12" :sm="12" :md="12" :lg="12" :xl="12" >
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
.startup-title {
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
.startup-header {
  margin-bottom: 10px;
}
.startup-desc {
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
