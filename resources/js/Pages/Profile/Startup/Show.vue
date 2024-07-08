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
  router.visit(route('dashboard.startups.edit', { id }), {data: { with_content: true }});
}

</script>

<template>
  <Head :title="startup.title"/>

  <AuthenticatedLayout>
    <div style="margin: 20px 20px;">
      <dashboard-page-header :has-extra-slot="true">
        <template #content>
          <span class="text-large font-600 mr-3">{{ startup.title }} 🚀</span>
        </template>
        <template #extra>
          <el-button type="warning" @click="editStartup(startup.id)" round class="ml-2 mr-10">
            Edit
          </el-button>
        </template>
      </dashboard-page-header>
      <div style="padding: 20px 20px">
        <el-row :gutter="20">
          <el-col :span="24">
            <el-card>
              <template #header>
                <div class="card-header">
                  <span>{{ startup.title }}</span>
                </div>
              </template>
              <p class="text item">Description: <span v-html="startup.description"></span></p>
              <p class="text item">Additional Information: {{ startup.additional_information }}</p>
              <p class="text item">Started Date: {{ formatFriendlyDate(startup.start_date) }}</p>
              <p class="text item">Type: <el-tag type="primary">{{ startup.type }}</el-tag></p>
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
