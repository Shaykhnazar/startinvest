<script setup>
import { Head, router, usePage } from '@inertiajs/vue3'
import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import DashboardPageHeader from '@/Pages/Cabinet/Startup/DashboardPageHeader.vue'
import { useFormatFriendlyDate } from '@/Composables/helpers'
import { onMounted } from 'vue'
import { JOIN_REQUEST_STATUSES } from '@/services/const.js'
import api from '@/services/api.js'
import { useElMessage } from '@/Composables/helpers.js'

const { info, success } = useElMessage();


const page = usePage()
const startup = page.props.startup.data
const { formatFriendlyDate } = useFormatFriendlyDate()

onMounted(() => {
  // console.log(startup)
})


const editStartup = (id) => {
  router.visit(route('dashboard.startups.edit', { id }))
}

const setType = (id, type) => {
  router.visit(route('dashboard.startups.setType', { id }), {method: 'put', data: { type: type }})
}

const deleteStartup = (id) => {
  router.visit(route('dashboard.startups.delete', { id }), {method: 'delete'})
}

const archiveStartup = (id) => {
  router.visit(route('dashboard.startups.archive', { id }), { method: 'delete' })
}

const restoreStartup = (id) => {
  router.visit(route('dashboard.startups.restore', { id }), { method: 'put' })
}
const showConfirmationDialog = (callback, confirmText) => {
  // console.log('Opening confirmation dialog...');
  if (window.confirm(confirmText)) {
    callback();
  }
}

const handleManageStartup = (startupId, contributorId, fromStatus = null, toStatus = null, handleRequest = true) => {
  if (handleRequest) {
    // Cancel the pending request
    showConfirmationDialog(() => handleJoinRequest(startupId, fromStatus, toStatus), `Do you want to change the status of request to: ${toStatus}?`);
  } else {
    // Prompt user to send a join request
    showConfirmationDialog(() => removeContributorHandle(startupId, contributorId), `Do you want to detach this contributor from the current startup?`);
  }
}

// Handle join requests
const handleJoinRequest = async (requestId, fromStatus, toStatus) => {
  try {
    await api.startups.handleJoinRequest(startup.id, {
      requestId: requestId,
      fromStatus: fromStatus,
      toStatus: toStatus
    })
    success('Join request handled successfully')
  } catch (error) {
    console.error('Error handling join request:', error)
    info('Failed to handle join request')
  }
}

// remove contributors
const removeContributorHandle = async (startupId, contributorId) => {
  try {
    await api.startups.removeContributor(startupId, {
      contributorId: contributorId,
    })
    success('Join request handled successfully')
  } catch (error) {
    console.error('Error handling join request:', error)
    info('Failed to handle join request')
  }
}

const goToChat = (userId) => {
  const url = route('chat.cabinet', { friend: userId });
  const windowFeatures = "width=600,height=400,scrollbars=yes,resizable=yes";
  window.open(url, '_blank', windowFeatures);
};


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
          <span class="ml-1"><el-tag type="warning" round v-if="startup.trashed">🚧 Arxivlangan</el-tag></span>
        </template>
        <template #extra>
          <el-row :gutter="12">
            <el-col :xs="24" :sm="12" :md="startup.trashed ? 12 : 6" :lg="startup.trashed ? 12 : 6" :xl="6" v-if="!startup.trashed">
              <el-button
                :type="startup.typeOriginal === 'public' ? 'primary' : 'success'"
                @click="setType(startup.id, startup.typeOriginal === 'public' ? 'private' : 'public')"
                round
                class="ml-2"
              >
                {{ startup.typeOriginal === 'public' ? '🔒 Maxfiy Qilish' : '📢 E\'lon Qilish' }}
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
                  <span class="ml-1"><el-tag type="warning" round v-show="startup.trashed">🚧 Arxivlangan</el-tag></span>
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
      <div style="padding: 20px 20px">
        <el-row :gutter="20">
          <el-col :span="24">
            <el-card>
              <template #header>
                <div class="card-header">
                  <span>Jamoaga qo'shilish so'rovlari</span>
                </div>
              </template>
              <!-- Join Requests Section -->
              <div>
                <el-table :data="startup.joinRequests" stripe>
                  <el-table-column prop="user.name" label="Foydalanuvchi" />
                  <el-table-column prop="status" label="So'rov holati" />
                  <el-table-column prop="decision_at" label="Oxirgi o'zgartirish vaqtidan keyin" />
                  <el-table-column label="Amallar">
                    <template #default="scope">
                      <el-button
                        type="success"
                        @click="handleManageStartup(scope.row.id, null, scope.row.status, JOIN_REQUEST_STATUSES.ACCEPTED)"
                        v-if="scope.row.status !== JOIN_REQUEST_STATUSES.ACCEPTED"
                        round
                      >Qabul qilish ✅</el-button>
                      <el-button
                        type="danger"
                        @click="handleManageStartup(scope.row.id, null, scope.row.status, JOIN_REQUEST_STATUSES.REJECTED)"
                        v-if="scope.row.status !== JOIN_REQUEST_STATUSES.REJECTED"
                        round
                      >Rad etish ⛔</el-button>
                      <!-- Chat with User Button -->
                      <el-button
                        type="primary"
                        @click="goToChat(scope.row.user_id)"
                        round
                      >Chat 💬</el-button>
                    </template>
                  </el-table-column>
                </el-table>
              </div>
              <!-- End Join Requests Section -->
<!--              <template #footer></template>-->
            </el-card>
          </el-col>
        </el-row>
      </div>
      <div style="padding: 20px 20px">
        <el-row :gutter="20">
          <el-col :span="24">
            <el-card>
              <template #header>
                <div class="card-header">
                  <span>Ishtirokchilar</span>
                </div>
              </template>
              <!-- Contributors Section -->
              <div>
                <el-table :data="startup.contributors" stripe>
                  <el-table-column prop="name" label="Foydalanuvchi" />
                  <el-table-column prop="email" label="E-Pochta" />
<!--                  <el-table-column prop="decision_at" label="After the last change time" />-->
                  <el-table-column label="Amallar">
                    <template #default="scope">
                      <el-button
                        type="danger"
                        @click="handleManageStartup(startup.id, scope.row.id, null, null, false)"
                        round
                      >Chetlatish ❌</el-button>
                      <!-- Chat with User Button -->
                      <el-button
                        type="primary"
                        @click="goToChat(scope.row.id)"
                        round
                      >Chat 💬</el-button>
                    </template>
                  </el-table-column>
                </el-table>
              </div>
              <!-- End Contributors Section -->
<!--              <template #footer></template>-->
            </el-card>
          </el-col>
        </el-row>
      </div>
      </div>
  </CabinetLayout>
</template>

<style scoped>
</style>
