<script setup>
import CabinetLayout from '@/Layouts/CabinetLayout.vue'
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
  router.visit(route('dashboard.startups.show', { id }));
}

const { formatFriendlyDate } = useFormatFriendlyDate()
</script>

<template>
  <Head title="Loyihalarim"/>

  <CabinetLayout>
    <div class="common-layout">
      <el-container>
        <el-aside width="200px" class="aside">
          <el-row>
            <el-col>
              <el-button type="primary" icon="el-icon-plus" @click="addNew">
                ➕ Yangi qo'shish
              </el-button>
            </el-col>
          </el-row>
        </el-aside>
        <el-container>
          <el-main>
            <el-row :gutter="20">
              <template v-if="startups.meta.total > 0">
                <el-col :xs="24" :sm="12" :lg="8" v-for="startup in startups.data" :key="startup.id" class="startup-card">
                  <el-card shadow="hover" @click="viewStartup(startup.id)">
                    <template #header>
                      <div class="card-header">
                        <span>{{ startup.title }}</span>
                        <span class="ml-1"><el-tag type="warning" round v-show="startup.trashed">🚧 Arxivlangan</el-tag></span>
                      </div>
                    </template>
                    <p class="text item">📝 Eslatma: {{ startup.additional_information }}</p><br/>
                    <p class="text item">📅 Boshlanish Sanasi: {{ formatFriendlyDate(startup.start_date) }}</p><br/>
                    <p class="text item">📢 Turi:
                      <el-tag type="primary">{{ startup.type }}</el-tag>
                    </p><br/>
                    <p class="text item">🔍 Sanoat tarmoqlari:
                      <el-tag v-for="industry in startup.industries" :key="industry.id" type="success" class="ml-1">
                        {{ industry.title }}
                      </el-tag>
                    </p><br/>
                    <p>
                      MVP versiyasi mavjud:
                      <span v-if="startup.has_mvp">
                        <el-tag type="success">Ha</el-tag>
                      </span>
                      <span v-else>
                        <el-tag type="info">Yo'q</el-tag>
                      </span>
                    </p>
                    <template #footer>Holati: <el-tag type="primary" round>{{ startup.status.label }}</el-tag></template>
                  </el-card>
                </el-col>
              </template>
            </el-row>
          </el-main>
        </el-container>
      </el-container>
    </div>
  </CabinetLayout>
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

.startup-card {
  margin-bottom: 20px;
}

.aside {
  background-color: #f9f9f9;
  padding: 20px;
}

@media (max-width: 768px) {
  .el-container {
    flex-direction: column !important;
  }
  .aside {
    width: 100%;
    margin-bottom: 20px;
  }
  .el-main {
    width: 100%;
  }
}
</style>
