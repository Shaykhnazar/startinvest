<script setup>
import { Head, router, usePage } from '@inertiajs/vue3'
import CabinetLayout from '@/Layouts/CabinetLayout.vue'
import { useFormatFriendlyDate } from '@/Composables/helpers'
import { computed, onMounted } from 'vue'
import { JOIN_REQUEST_STATUSES } from '@/services/const.js'
import api from '@/services/api.js'
import { useElMessage } from '@/Composables/helpers.js'
import MyStartupCardGrid from '@/Components/MyStartupCardGrid.vue'
import { wTrans } from 'laravel-vue-i18n'
import { marked } from 'marked'
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
const showConfirmationDialog = (callback, confirmTextKey, params = {}) => {
  const confirmText = wTrans(confirmTextKey, params);
  if (window.confirm(confirmText)) {
    callback();
  }
};

const handleManageStartup = (startupId, contributorId, fromStatus = null, toStatus = null, handleRequest = true) => {
  if (handleRequest) {
    // Cancel the pending request
    showConfirmationDialog(() => handleJoinRequest(startupId, fromStatus, toStatus),
      'cabinet.startup_show.messages.confirm_change_status',
      { status: t(JOIN_REQUEST_STATUSES[toStatus].toShow) }
    )
  } else {
    // Prompt user to send a join request
    showConfirmationDialog(() => removeContributorHandle(startupId, contributorId),
      'cabinet.startup_show.messages.confirm_remove_contributor'
    )
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
    success(wTrans('cabinet.startup_show.messages.request_success'))
  } catch (error) {
    console.error('Qo\'shilish so\'rovini bajarishda xato yuz berdi', error)
    info(wTrans('cabinet.startup_show.messages.request_fail'))
  }
}

// remove contributors
const removeContributorHandle = async (startupId, contributorId) => {
  try {
    await api.startups.removeContributor(startupId, {
      contributorId: contributorId,
    })
    success(wTrans('cabinet.startup_show.messages.request_success'))
  } catch (error) {
    console.error('Qo\'shilish so\'rovini bajarishda xato yuz berdi', error)
    info(wTrans('cabinet.startup_show.messages.request_fail'))
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
  return wTrans(JOIN_REQUEST_STATUSES[row.status].toShow)
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

// Configure marked options
marked.setOptions({
  breaks: true,
  gfm: true,
  headerIds: true,
  mangle: false
})

// Convert markdown to HTML
const renderedContent = computed(() => {
  if (!startup.description) return ''
  return marked(startup.description)
})
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
<!--                {{ $t('cabinet.startup_show.tabs.all') }} -->
<!--              </button>-->
<!--              <button type="button" class="hs-tab-active:bg-white hs-tab-active:shadow-sm hs-tab-active:focus:bg-gray-50 hs-tab-active:focus:text-gray-800 py-2 px-3 inline-flex justify-center items-center gap-x-2  text-sm font-medium text-gray-800 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 dark:hs-tab-active:bg-neutral-700 dark:hs-tab-active:focus:bg-neutral-800 dark:hs-tab-active:focus:text-neutral-200  " id="hs-pro-tabs-dupt-item-archived" aria-selected="false" data-hs-tab="#hs-pro-tabs-dupt-archived" aria-controls="hs-pro-tabs-dupt-archived" role="tab">-->
<!--                {{ $t('cabinet.startup_show.tabs.archive') }} -->
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
                {{ startup.typeOriginal === 'public' ? $t('cabinet.startup_show.actions.make_private') : $t('cabinet.startup_show.actions.publish') }}
              </button>
              <button type="button"
                      v-if="!startup.trashed"
                      @click="archiveStartup(startup.id)"
                      class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-gray-500"
              >
                {{ $t('cabinet.startup_show.actions.archive') }}
              </button>
              <button type="button"
                      v-if="startup.trashed"
                      @click="restoreStartup(startup.id)"
                      class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500"
              >
                {{ $t('cabinet.startup_show.actions.restore') }}
              </button>
              <el-popconfirm
                :confirm-button-text="$t('cabinet.common.yes')"
                :cancel-button-text="$t('cabinet.common.no')"
                icon-color="#626AEF"
                :title="$t('cabinet.startup_show.actions.confirm_delete')"
                @confirm="deleteStartup(startup.id)"
                @cancel="cancelEvent"
              >
                <template #reference>
                  <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-red-500"
                  >
                    {{ $t('cabinet.startup_show.actions.delete') }}
                  </button>
                </template>
              </el-popconfirm>
              <button type="button"
                      v-if="!startup.trashed"
                      @click="editStartup(startup.id)"
                      class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-yellow-600 text-white hover:bg-yellow-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-yellow-500"
              >
                {{ $t('cabinet.startup_show.actions.edit') }}
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
                            {{ $t('cabinet.startup_show.join_requests.title') }}
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
                                <el-table-column prop="user.name" :label="$t('cabinet.startup_show.join_requests.user')" />
                                <el-table-column prop="status" :label="$t('cabinet.startup_show.join_requests.status')" :formatter="formatJoinRequestStatus"/>
                                <el-table-column prop="decision_at" :label="$t('cabinet.startup_show.join_requests.last_change')" />
                                <el-table-column :label="$t('cabinet.startup_show.actions.label')">
                                  <template #default="scope">
                                    <el-button
                                      type="success"
                                      @click="handleManageStartup(scope.row.id, null, scope.row.status, JOIN_REQUEST_STATUSES.ACCEPTED.value)"
                                      v-if="scope.row.status !== JOIN_REQUEST_STATUSES.ACCEPTED.value"
                                      round
                                    >{{ $t('cabinet.startup_show.join_requests.accept') }}</el-button>
                                    <el-button
                                      type="danger"
                                      @click="handleManageStartup(scope.row.id, null, scope.row.status, JOIN_REQUEST_STATUSES.REJECTED.value)"
                                      v-if="scope.row.status !== JOIN_REQUEST_STATUSES.REJECTED.value"
                                      round
                                    >{{ $t('cabinet.startup_show.join_requests.reject') }}</el-button>
                                    <!-- Chat with User Button -->
                                    <el-button
                                      type="primary"
                                      @click="goToChat(scope.row.user_id)"
                                      round
                                    >{{ $t('cabinet.startup_show.join_requests.chat') }}</el-button>
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
                            {{ $t('cabinet.startup_show.contributors.title') }}
                          </h2>

                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="p-5">
                          <div class="mt-5">
                            <!-- List Group -->
                            <div class="grid gap-y-5">
                              <el-table :data="startup.contributors" stripe>
                                <el-table-column :label="$t('cabinet.startup_show.contributors.user')" prop="name" />
                                <el-table-column :label="$t('cabinet.startup_show.contributors.email')" prop="email" />
                                <!--                  <el-table-column prop="decision_at" label="After the last change time" />-->
                                <el-table-column :label="$t('cabinet.startup_show.actions.label')">
                                  <template #default="scope">
                                    <el-button
                                      type="danger"
                                      @click="handleManageStartup(startup.id, scope.row.id, null, null, false)"
                                      round
                                    >{{ $t('cabinet.startup_show.contributors.remove') }}</el-button>
                                    <!-- Chat with User Button -->
                                    <el-button
                                      type="primary"
                                      @click="goToChat(scope.row.id)"
                                      round
                                    >{{ $t('cabinet.startup_show.join_requests.chat') }}</el-button>
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
