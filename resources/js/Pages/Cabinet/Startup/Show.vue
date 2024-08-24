<script setup>
import { Head, router, usePage } from '@inertiajs/vue3'
import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import DashboardPageHeader from '@/Pages/Cabinet/Startup/DashboardPageHeader.vue'
import { useFormatFriendlyDate } from '@/Composables/helpers'
import { onMounted } from 'vue'

const page = usePage()
const startup = page.props.startup.data
const { formatFriendlyDate } = useFormatFriendlyDate()

onMounted(() => {
  // console.log(startup)
})


const editStartup = (id) => {
  router.visit(route('dashboard.startups.edit', { id }), { data: { with_content: true },
    onFinish: visit => {
      window.location.reload()
    },
  })
}

const setType = (id, type) => {
  router.visit(route('dashboard.startups.setType', { id }), {method: 'put', data: { type: type },     onFinish: visit => {
      window.location.reload()
    },
  })
}

const deleteStartup = (id) => {
  router.visit(route('dashboard.startups.delete', { id }), {method: 'delete',     onFinish: visit => {
      window.location.reload()
    },
  })
}

const archiveStartup = (id) => {
  router.visit(route('dashboard.startups.archive', { id }), { method: 'delete',     onFinish: visit => {
      window.location.reload()
    },
  })
}

const restoreStartup = (id) => {
  router.visit(route('dashboard.startups.restore', { id }), { method: 'put',     onFinish: visit => {
      window.location.reload()
    },
  })
}

const cancelEvent = () => {
  console.log('cancel!')
}
</script>

<template>
  <Head :title="startup.title"/>

  <CabinetLayout>
    <div style="margin: 20px 20px;">
      <dashboard-page-header :has-extra-slot="true">
        <template #content>
          <span class="text-large font-600 mr-3">{{ startup.title }} 🚀</span>
          <span class="ml-1"><el-tag type="warning" round v-if="startup.trashed">⛔ Arxivlangan</el-tag></span>
        </template>
        <template #extra>
          <el-row :gutter="12">
            <el-col :xs="24" :sm="12" :md="startup.trashed ? 12 : 6" :lg="startup.trashed ? 12 : 6" :xl="6" v-if="!startup.trashed">
              <el-button
                :type="startup.type === 'public' ? 'primary' : 'success'"
                @click="setType(startup.id, startup.type === 'public' ? 'private' : 'public')"
                round
                class="ml-2"
              >
                {{ startup.type === 'public' ? '🔒 Maxfiy Qilish' : '📢 E\'lon Qilish' }}
              </el-button>
            </el-col>
            <el-col :xs="24" :sm="12" :md="startup.trashed ? 12 : 6" :lg="startup.trashed ? 12 : 6" :xl="6" :span="startup.trashed ? 12 : 0">
              <el-button
                type="info"
                v-if="!startup.trashed"
                @click="archiveStartup(startup.id)"
                round
                class="ml-2"
              >
                🚧 Arxivlash
              </el-button>
              <el-button
                type="warning"
                v-else
                @click="restoreStartup(startup.id)"
                round
                class="ml-2"
              >
                🔄 Tiklash
              </el-button>
            </el-col>
            <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6" :span="startup.trashed ? 12 : 0">
              <el-popconfirm
                confirm-button-text="Ha"
                cancel-button-text="Yo'q"
                icon-color="#626AEF"
                title="O'chirishni tasdiqlaysizmi?"
                @confirm="deleteStartup(startup.id)"
                @cancel="cancelEvent"
              >
                <template #reference>
                  <el-button type="danger" native-type="button" round class="ml-2">
                    🗑️ O'chirish
                  </el-button>
                </template>
              </el-popconfirm>
            </el-col>
            <el-col :xs="24" :sm="12" :md="6" :lg="6" :xl="6" v-if="!startup.trashed">
              <el-button type="warning" @click="editStartup(startup.id)" round class="ml-2">
                ✏️ Tahrirlash
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
                  <span class="ml-1"><el-tag type="warning" round v-show="startup.trashed">⛔ Arxivlangan</el-tag></span>
                </div>
              </template>
              <p class="text item">📖 Tavsif: <span v-html="startup.description"></span></p><br/>
              <p class="text item">📝 Eslatma: {{ startup.additional_information }}</p><br/>
              <p class="text item">📅 Boshlanish Sanasi: {{ formatFriendlyDate(startup.start_date) }}</p><br/>
              <p class="text item">📢 Turi: <el-tag type="primary">{{ startup.type }}</el-tag></p><br/>
              <p class="text item">🔍 Sanoat tarmoqlari:
                <el-tag v-for="industry in startup.industries" :key="industry.id" type="success" class="ml-1">
                  {{ industry.title }}
                </el-tag>
              </p><br/>
              <p>
                MVP versiya mavjud:
                <span v-if="startup.has_mvp">
                  <el-tag type="success">Ha</el-tag>
                </span>
                <span v-else>
                  <el-tag type="info">Yo'q</el-tag>
                </span>
              </p>
              <template #footer>Holati: <el-tag type="primary" round>{{ startup.status }}</el-tag></template>
            </el-card>
          </el-col>
        </el-row>
      </div>
    </div>
  </CabinetLayout>
</template>

<style scoped>
.common-layout {
  padding: 50px;
}
</style>
