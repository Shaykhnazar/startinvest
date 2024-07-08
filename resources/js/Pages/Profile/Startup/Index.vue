<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, router, usePage } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'
import { useFormatFriendlyDate } from '@/Composables/helpers.js'

const page = usePage()
const showModal = ref(false)

const startups = page.props.startups

onMounted(() => {
  // console.log(startups)
})

const addNew = () => {
  router.visit(route('dashboard.startups.add'))
}

const viewStartup = (id) => {
  router.visit(route('dashboard.startups.show', { id }), {data: { with_content: true }});
}

const { formatFriendlyDate } = useFormatFriendlyDate()

</script>

<template>
  <Head title="My Startups"/>

  <AuthenticatedLayout>
    <div class="common-layout">
      <el-container>
        <el-aside width="200px">
          <el-row>
            <el-col>
              <el-button type="primary" icon="el-icon-plus" @click="addNew">
               + Add new
              </el-button>
            </el-col>
          </el-row>
        </el-aside>
        <el-main>
          <el-row :gutter="20">
            <template v-if="startups.meta.total > 0">
              <el-col :span="12" v-for="startup in startups.data" :key="startup.id">
                <el-card shadow="hover" @click="viewStartup(startup.id)">
                  <template #header>
                    <div class="card-header">
                      <span>{{ startup.title }}</span>
                    </div>
                  </template>
                  <p class="text item">{{ startup.additional_information }}</p>
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
            </template>
          </el-row>
        </el-main>
      </el-container>
    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.common-layout {
  padding: 20px;
}
.el-row {
  margin-bottom: 20px;
}
.el-card {
  cursor: pointer;
}
</style>
