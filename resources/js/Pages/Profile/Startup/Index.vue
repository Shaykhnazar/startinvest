<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, router, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'

const page = usePage()
const showModal = ref(false)

const startups = page.props.startups

const addNew = () => {
  router.visit(route('dashboard.startups.add'))
}
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
            <template v-if="startups.count > 0">
              <el-col :span="6" v-for="startup in startups" :key="startup.id">
                <el-card>
                  <h3>{{ startup.title }}</h3>
                  <p>{{ startup.description }}</p>
                  <p>{{ startup.additional_information }}</p>
                  <p>{{ startup.start_date }}</p>
                  <p>{{ startup.type }}</p>
                  <p>{{ startup.status }}</p>
                  <p>{{ startup.has_mvp ? 'MVP Ready' : 'No MVP' }}</p>
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
</style>
