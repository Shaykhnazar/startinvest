<script setup>
import { Head, router, usePage } from '@inertiajs/vue3'
import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import { useFormatFriendlyDate } from '@/Composables/helpers'
import { onMounted } from 'vue'
import { JOIN_REQUEST_STATUSES } from '@/services/const.js'
import api from '@/services/api.js'
import { useElMessage } from '@/Composables/helpers.js'
import MyStartupCardGrid from '@/Components/MyStartupCardGrid.vue'

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
    showConfirmationDialog(() => handleJoinRequest(startupId, fromStatus, toStatus), `So'rov holatini ${JOIN_REQUEST_STATUSES[toStatus].toShow} ga o'zgartirmoqchimisiz?`);
  } else {
    // Prompt user to send a join request
    showConfirmationDialog(() => removeContributorHandle(startupId, contributorId), `Ushbu ishtirokchini hozirgi startupdan chetlatmoqchimisiz?`);
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
    success('So\'rov muvaffaqiyatli bajarildi')
  } catch (error) {
    console.error('Qo\'shilish so\'rovini bajarishda xato yuz berdi', error)
    info('Qo\'shilish so\'rovini bajarishda xato yuz berdi')
  }
}

// remove contributors
const removeContributorHandle = async (startupId, contributorId) => {
  try {
    await api.startups.removeContributor(startupId, {
      contributorId: contributorId,
    })
    success('So\'rov muvaffaqiyatli bajarildi')
  } catch (error) {
    console.error('Qo\'shilish so\'rovini bajarishda xato yuz berdi', error)
    info('Qo\'shilish so\'rovini bajarishda xato yuz berdi')
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

const formatJoinRequestStatus = (row) => {
  return JOIN_REQUEST_STATUSES[row.status].toShow
}

const publishToPlatform = async (platform) => {
  try {
    await api.startups.publish(startup.id, platform);
    publication.value[platform] = true;
    success(`${platform} publishing succeeded`);
  } catch (error) {
    console.error('Error publishing to platform:', error);
    info(`Failed to publish on ${platform}`);
  }
};
</script>

<template>
  <Head :title="startup.title"/>

  <CabinetLayout>
    <div class="max-w-6xl mx-auto">
      <div class="p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5">
        <div class="p-5 space-y-4 flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
          <!-- Header -->
          <div class="flex justify-between items-center gap-x-2">
            <!-- Nav Tab -->
            <nav class="p-1 inline-flex bg-gray-100 rounded-xl dark:bg-neutral-900/50" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
<!--              <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-sm hs-tab-active:focus:bg-gray-50 hs-tab-active:focus:text-gray-800 py-2 px-3 inline-flex justify-center items-center gap-x-2  text-sm font-medium text-gray-800 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 dark:hs-tab-active:bg-neutral-700 dark:hs-tab-active:focus:bg-neutral-800 dark:hs-tab-active:focus:text-neutral-200 active " id="hs-pro-tabs-dupt-item-open" aria-selected="true" data-hs-tab="#hs-pro-tabs-dupt-open" aria-controls="hs-pro-tabs-dupt-open" role="tab">-->
<!--                Hammasi-->
<!--              </button>-->
<!--              <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-sm hs-tab-active:focus:bg-gray-50 hs-tab-active:focus:text-gray-800 py-2 px-3 inline-flex justify-center items-center gap-x-2  text-sm font-medium text-gray-800 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 dark:hs-tab-active:bg-neutral-700 dark:hs-tab-active:focus:bg-neutral-800 dark:hs-tab-active:focus:text-neutral-200  " id="hs-pro-tabs-dupt-item-archived" aria-selected="false" data-hs-tab="#hs-pro-tabs-dupt-archived" aria-controls="hs-pro-tabs-dupt-archived" role="tab">-->
<!--                Arxiv-->
<!--              </button>-->
            </nav>
            <!-- End Nav Tab -->

            <!-- Form Group -->
            <div class="flex flex-row flex-wrap justify-between items-center gap-x-2 gap-y-2">
              <!-- Button -->
              <button type="button"
                      @click="setType(startup.id, startup.typeOriginal === 'public' ? 'private' : 'public')"
                      :class="{'bg-violet-600 hover:bg-violet-700 focus:ring-violet-500': startup.typeOriginal === 'public', 'bg-green-600 hover:bg-green-700 focus:ring-green-500': startup.typeOriginal !== 'public'}"
                      class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent text-white disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 "
              >
                {{ startup.typeOriginal === 'public' ? '🔒 Maxfiy Qilish' : '📢 E\'lon Qilish' }}
              </button>
              <button type="button"
                      v-if="!startup.trashed"
                      @click="archiveStartup(startup.id)"
                      class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-gray-500"
              >
                🚧 Arxivlash
              </button>
              <button type="button"
                      v-if="startup.trashed"
                      @click="restoreStartup(startup.id)"
                      class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
                🔄 Tiklash
              </button>
              <el-popconfirm
                confirm-button-text="Ha"
                cancel-button-text="Yo'q"
                icon-color="#626AEF"
                title="O'chirishni tasdiqlaysizmi?"
                @confirm="deleteStartup(startup.id)"
                @cancel="cancelEvent"
              >
                <template #reference>
                  <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-red-500"
                  >
                    🗑️ O'chirish
                  </button>
                </template>
              </el-popconfirm>
              <button type="button"
                      v-if="!startup.trashed"
                      @click="editStartup(startup.id)"
                      class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-yellow-600 text-white hover:bg-yellow-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-yellow-500"
              >
                ✏️ Tahrirlash
              </button>
              <!-- End Button -->
            </div>
            <!-- End Form Group -->
          </div>
          <!-- End Header -->

          <div>
            <!-- Tab Content -->
            <div id="hs-pro-tabs-dupt-open" role="tabpanel" aria-labelledby="hs-pro-tabs-dupt-item-open">
              <div class="space-y-4 flex flex-col">
                <!-- Startup Grid -->
                <div class="grid sm:grid-cols-1 md:grid-cols-1 xl:grid-cols-1 gap-5">

                  <div>
                    <!-- Grid -->
                    <div class="grid gap-y-5">
                      <!-- Startup Card -->
                        <MyStartupCardGrid
                          :startup="startup"
                          :show-page="true"
                        />
                      <!-- End Startup Card -->
                    </div>
                    <!-- End Grid -->
                  </div>
                  <!-- End Col -->

                </div>
                <!-- End Startups Grid -->

                <!-- Contribution sections -->
                <div class="grid sm:grid-cols-1 md:grid-cols-1 xl:grid-cols-1 gap-5">
                  <!-- Grid -->
                  <div>
                    <!-- Content -->
                    <div class="grid gap-y-5">
                      <!-- Join Requests Section -->
                      <div class="flex flex-col bg-white border border-gray-200 rounded-xl shadow-sm xl:shadow-none dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->
                        <div class="p-5 pb-0 flex justify-between items-center gap-2">
                          <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">
                            Jamoaga qo'shilish so'rovlari
                          </h2>

                          <!-- Form Group -->
                          <div class="flex sm:justify-end items-center gap-x-2">
                            <!-- Button -->
  <!--                          <button type="button" class="p-2 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500" data-hs-overlay="#hs-pro-daem">-->
  <!--                            <svg class="hidden sm:block shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
  <!--                              <path d="M5 12h14" />-->
  <!--                              <path d="M12 5v14" />-->
  <!--                            </svg>-->
  <!--                            Add event-->
  <!--                          </button>-->
                            <!-- End Button -->
                          </div>
                          <!-- End Form Group -->
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="p-5">
  <!--                        <h2 class="text-sm font-semibold text-gray-800 dark:text-neutral-200">-->
  <!--                          March 29, 2023-->
  <!--                        </h2>-->

                          <div class="mt-5">
                            <!-- List Group -->
                            <div class="grid gap-y-5">
                              <el-table :data="startup.joinRequests" stripe>
                                <el-table-column prop="user.name" label="Foydalanuvchi" />
                                <el-table-column prop="status" label="So'rov holati" :formatter="formatJoinRequestStatus"/>
                                <el-table-column prop="decision_at" label="Oxirgi o'zgartirish vaqtidan keyin" />
                                <el-table-column label="Amallar">
                                  <template #default="scope">
                                    <el-button
                                      type="success"
                                      @click="handleManageStartup(scope.row.id, null, scope.row.status, JOIN_REQUEST_STATUSES.ACCEPTED.value)"
                                      v-if="scope.row.status !== JOIN_REQUEST_STATUSES.ACCEPTED.value"
                                      round
                                    >Qabul qilish ✅</el-button>
                                    <el-button
                                      type="danger"
                                      @click="handleManageStartup(scope.row.id, null, scope.row.status, JOIN_REQUEST_STATUSES.REJECTED.value)"
                                      v-if="scope.row.status !== JOIN_REQUEST_STATUSES.REJECTED.value"
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
                            <!-- End List Group -->
                          </div>

                        </div>
                        <!-- End Body -->
                      </div>
                      <!-- End Join Requests Section  -->
                    </div>
                    <!-- End Content -->
                  </div>
                  <!-- End Grid -->

                  <!-- Grid -->
                  <div>
                    <!-- Content -->
                    <div class="grid gap-y-5">
                      <!-- Join Requests Section -->
                      <div class="flex flex-col bg-white border border-gray-200 rounded-xl shadow-sm xl:shadow-none dark:bg-neutral-800 dark:border-neutral-700">
                        <!-- Header -->
                        <div class="p-5 pb-0 flex justify-between items-center gap-2">
                          <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">
                            Ishtirokchilar
                          </h2>

                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="p-5">
                          <div class="mt-5">
                            <!-- List Group -->
                            <div class="grid gap-y-5">
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
                            <!-- End List Group -->
                          </div>

                        </div>
                        <!-- End Body -->
                      </div>
                      <!-- End Join Requests Section  -->
                    </div>
                    <!-- End Content -->
                  </div>
                  <!-- End Grid -->

                </div>
                <!-- End Contribution sections -->
              </div>
            </div>
            <!-- End Tab Content -->

            <!-- Tab Content -->
            <div id="hs-pro-tabs-dupt-archived" role="tabpanel" class="hidden"
                 aria-labelledby="hs-pro-tabs-dupt-item-archived">
              <!-- Startups Grid -->
              <div class="grid sm:grid-cols-1 xl:grid-cols-2 gap-5">
                <div>
                  <!-- Grid -->
                  <div class="grid gap-y-5">

                  </div>
                  <!-- End Grid -->
                </div>
                <!-- End Col -->

              </div>
              <!-- End Startups Grid -->
            </div>
            <!-- End Tab Content -->
          </div>
        </div>
      </div>
    </div>

  </CabinetLayout>
</template>

<style scoped>
</style>
