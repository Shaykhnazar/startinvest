<script setup>
import { Head, router, usePage } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import DashboardPageHeader from '@/Pages/Profile/Startup/DashboardPageHeader.vue'
import { useFormatFriendlyDate } from '@/Composables/helpers'
import { onMounted } from 'vue'

const page = usePage()
const startup = page.props.startup.data
const { formatFriendlyDate } = useFormatFriendlyDate()

onMounted(() => {
  console.log(startup)
})


const editStartup = (id) => {
  router.visit(route('dashboard.startups.edit', { id }), { data: { with_content: true }});
}

const setType = (id, type) => {
  router.visit(route('dashboard.startups.setType', { id }), {method: 'put', data: { type: type }});
}

const deleteStartup = (id) => {
  router.visit(route('dashboard.startups.delete', { id }), {method: 'delete'});
}

const archiveStartup = (id) => {
  router.visit(route('dashboard.startups.archive', { id }), { method: 'delete' });
}

const restoreStartup = (id) => {
  router.visit(route('dashboard.startups.restore', { id }), { method: 'put' });
}

const cancelEvent = () => {
  console.log('cancel!')
}

</script>

<template>
  <Head :title="startup.title"/>

  <AuthenticatedLayout>
    <div style="margin: 20px 20px;">
      <dashboard-page-header :has-extra-slot="true">
        <template #content>
          <span class="text-large font-600 mr-3">{{ startup.title }} 🚀</span>
          <span class="ml-1"><el-tag type="warning" round v-show="startup.trashed">⛔Archived</el-tag></span>
        </template>
        <template #extra>
          <el-row :gutter="12">
            <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6" v-show="!startup.trashed">
              <el-button
                :type="startup.type === 'public' ? 'primary' : 'success'"
                @click="setType(startup.id, startup.type === 'public' ? 'private' : 'public')"
                round
                class="ml-2"
              >
                {{ startup.type === 'public' ? '🔒 Make Private' : '📢 Publish' }}
              </el-button>
            </el-col>
            <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6">
              <el-button
                type="info"
                v-if="!startup.trashed"
                @click="archiveStartup(startup.id)"
                round
                class="ml-2"
              >
                🚧 Archive
              </el-button>
              <el-button
                type="warning"
                v-else
                @click="restoreStartup(startup.id)"
                round
                class="ml-2"
              >
                🔄 Restore
              </el-button>
            </el-col>
            <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6">
              <el-popconfirm
                confirm-button-text="Yes"
                cancel-button-text="No"
                icon-color="#626AEF"
                title="Are you sure to delete this?"
                @confirm="deleteStartup(startup.id)"
                @cancel="cancelEvent"
              >
                <template #reference>
                  <el-button type="danger" native-type="button" round class="ml-2">
                    🗑️ Delete
                  </el-button>
                </template>
              </el-popconfirm>
            </el-col>
            <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6" v-show="!startup.trashed">
              <el-button type="warning" @click="editStartup(startup.id)" round class="ml-2">
                ✏️Edit
              </el-button>
            </el-col>
          </el-row>
        </template>
      </dashboard-page-header>
      <div style="padding: 20px 20px">
        <el-row :gutter="20">
          <el-col :span="24">
            <el-card>
              <template #header>
                <div class="card-header">
                  <span>{{ startup.title }}</span>
                  <span class="ml-1"><el-tag type="warning" round v-show="startup.trashed">⛔Archived</el-tag></span>
                </div>
              </template>
              <p class="text item">📖Description: <span v-html="startup.description"></span></p><br/>
              <p class="text item">📝Note: {{ startup.additional_information }}</p><br/>
              <p class="text item">📅Started Date: {{ formatFriendlyDate(startup.start_date) }}</p><br/>
              <p class="text item">📢Type: <el-tag type="primary">{{ startup.type }}</el-tag></p><br/>
              <p>
              Has MVP version:
              <span v-if="startup.has_mvp">
                  <el-tag type="success">MVP Ready</el-tag>
                </span>
              <span v-else>
                  <el-tag type="info">No MVP</el-tag>
                </span>
              </p>
              <template #footer>Status: <el-tag type="primary" round>{{ startup.status }}</el-tag></template>
            </el-card>
          </el-col>
        </el-row>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.common-layout {
  padding: 50px;
}
</style>
