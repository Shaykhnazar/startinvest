<script setup>
import { Head, usePage, Link } from '@inertiajs/vue3';
import { useFormatFriendlyDate } from '@/Composables/helpers';
import App from '@/Layouts/App.vue'
import Popover from '@/Components/Popover.vue'

const page = usePage();
const startup = page.props.startup.data;

const { formatFriendlyDate } = useFormatFriendlyDate();

const goToChat = (userId) => {
  const url = route('chat.cabinet', { friend: userId });
  const windowFeatures = "width=600,height=400,scrollbars=yes,resizable=yes";
  window.open(url, '_blank', windowFeatures);
};
</script>

<template>
  <App>
    <template #header>
      <Head title="Startups" />
    </template>

    <el-container>
      <!-- Startup Show Page -->
      <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
          <!-- Content -->
          <div class="lg:col-span-2">
            <div class="py-8 lg:pe-8">
              <div class="space-y-5 lg:space-y-8">
                <Link class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-none focus:underline dark:text-blue-500" :href="route('startups.index')">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                  Startuplar
                </Link>

                <h2 class="text-3xl font-bold lg:text-5xl dark:text-white">{{ startup.title }}</h2>

                <div class="flex items-center gap-x-5">
                  <Popover>
                    <template #reference>
                      <p class="text-xs sm:text-sm text-gray-800 dark:text-neutral-200"><el-avatar :size="20" :src="startup.owner.avatar" class="mr-2 icon-pointer"/> {{ startup.owner.name }} tomonidan</p>
                    </template>
                    <p class="text-xs sm:text-sm text-gray-800 dark:text-neutral-200"><el-avatar :size="20" :src="startup.owner.avatar" class="mr-2 icon-pointer"/> {{ startup.owner.name }}</p>
                  </Popover>
                  <p class="text-xs sm:text-sm text-gray-800 dark:text-neutral-200">{{ formatFriendlyDate(startup.start_date) }} da boshlangan</p>
                </div>

                <p class="text-lg text-gray-800 dark:text-neutral-200" v-html="startup.description"></p>

                <div class="space-y-3">
                  <h4 class="text-2xl font-semibold dark:text-white">Holati: <el-tag type="primary" round>{{ startup.status }}</el-tag></h4>
                  <p class="text-lg text-gray-800 dark:text-neutral-200"> MVP versiya mavjudmi?:
                    <span v-if="startup.has_mvp">
                      <el-tag type="success">Ha</el-tag>
                    </span>
                        <span v-else>
                      <el-tag type="info">Yo'q</el-tag>
                    </span>
                  </p>
                </div>

                <ul class="list-disc list-outside space-y-5 ps-5 text-lg text-gray-800 dark:text-neutral-200">
<!--                  <li class="ps-2">Location: {{ startup.location }}</li>-->
                  <li class="ps-2" v-if="startup.contributors_count && startup.contributors_count > 0">Jamoa hajmi: {{ startup.contributors_count }}</li>
                </ul>

                <p class="text-lg text-gray-800 dark:text-neutral-200">Agar siz bizning startapimizga qo'shilishni istasangiz, asoschi bilan to'g'ridan-to'g'ri bog'laning yoki platformamiz orqali murojaat qiling.</p>

                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-y-5 lg:gap-y-0">
                  <!-- Badges/Tags -->
                  <div>
                    <a v-for="industry in startup.industries" :key="industry.id" class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">
                      {{ industry.title }}
                    </a>
                    <!-- Add more tags as needed -->
                  </div>
                  <!-- End Badges/Tags -->

<!--                  <div class="flex justify-end items-center gap-x-1.5">-->
<!--                    &lt;!&ndash; Button &ndash;&gt;-->
<!--                    <div class="hs-tooltip inline-block">-->
<!--                      <button type="button" class="hs-tooltip-toggle flex items-center gap-x-2 text-sm text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200">-->
<!--                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>-->
<!--                        875-->
<!--                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-black" role="tooltip">-->
<!--                          Like-->
<!--                        </span>-->
<!--                      </button>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Button &ndash;&gt;-->

<!--                    <div class="block h-3 border-e border-gray-300 mx-3 dark:border-neutral-600"></div>-->

<!--                    &lt;!&ndash; Button &ndash;&gt;-->
<!--                    <div class="hs-tooltip inline-block">-->
<!--                      <button type="button" class="hs-tooltip-toggle flex items-center gap-x-2 text-sm text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200">-->
<!--                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>-->
<!--                        Share-->
<!--                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-black" role="tooltip">-->
<!--                        Share this startup-->
<!--                      </span>-->
<!--                      </button>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Button &ndash;&gt;-->
<!--                  </div>-->
                </div>
              </div>
            </div>
          </div>
          <!-- End Content -->

          <!-- Sidebar -->
<!--          <div class="lg:col-span-1">-->
<!--            <div class="space-y-8">-->
<!--              &lt;!&ndash; Founder Info &ndash;&gt;-->
<!--              <div class="p-6 bg-gray-50 rounded-lg dark:bg-neutral-800">-->
<!--                <h3 class="text-lg font-semibold dark:text-white">Loyiha asoschisi</h3>-->
<!--                <p class="text-sm text-gray-800 dark:text-neutral-200">{{ startup.owner.name }}</p>-->
<!--                <p class="text-sm text-gray-800 dark:text-neutral-200">{{ startup.owner.email }}</p>-->
<!--&lt;!&ndash;                <p class="text-sm text-gray-800 dark:text-neutral-200">{{ startup.owner.phone }}</p>&ndash;&gt;-->
<!--              </div>-->
<!--              &lt;!&ndash; End Founder Info &ndash;&gt;-->

<!--              &lt;!&ndash; Additional Sidebar Content &ndash;&gt;-->
<!--              <div class="p-6 bg-gray-50 rounded-lg dark:bg-neutral-800">-->
<!--                <h3 class="text-lg font-semibold dark:text-white">Bog'lanish</h3>-->
<!--                <p class="text-sm text-gray-800 dark:text-neutral-200">Agar sizda ushbu startap haqida savollaringiz bo'lsa, loyiha asoschisi bilan chat orqali bog'laning.</p>-->
<!--                <p class="mt-2">-->
<!--                  <el-button-->
<!--                    type="primary"-->
<!--                    @click="goToChat(startup.owner.id)"-->
<!--                    round-->
<!--                  >Chat 💬</el-button>-->
<!--                </p>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Additional Sidebar Content &ndash;&gt;-->
<!--            </div>-->
<!--          </div>-->
          <!-- End Sidebar -->

          <!-- Sidebar -->
          <div class="lg:col-span-1 lg:w-full lg:h-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-neutral-800">
            <div class="sticky top-0 start-0 py-8 lg:ps-8">
              <!-- Avatar Media -->
              <div class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8 dark:border-neutral-700">
                <Link :href="route('user.profile', startup.owner.id)" class="block shrink-0 focus:outline-none">
                  <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                </Link>

                <Link class="group grow block focus:outline-none" :href="route('user.profile', startup.owner.id)">
                  <h5 class="group-hover:text-gray-600 group-focus:text-gray-600 text-sm font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:group-focus:text-neutral-400 dark:text-neutral-200">
                    {{ startup.owner.name }}
                  </h5>
                  <p class="text-sm text-gray-500 dark:text-neutral-500">
                    {{ startup.owner.email }}
                  </p>
                </Link>

                <div class="grow">
                  <div class="flex justify-end">
                    <el-button
                      type="primary"
                      @click="goToChat(startup.owner.id)"
                      class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    >
                      <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M8 12h.01"/><path d="M12 12h.01"/><path d="M16 12h.01"/></svg>Aloqa
                    </el-button>
<!--                    <button type="button" class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">-->
<!--                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>-->
<!--                      Follow-->

<!--                      Bog'lanish-->
<!--                    </button>-->
                  </div>
                </div>
              </div>
              <!-- End Avatar Media -->

<!--              <div class="space-y-6">-->
<!--                &lt;!&ndash; Media &ndash;&gt;-->
<!--                <a class="group flex items-center gap-x-6 focus:outline-none" href="#">-->
<!--                  <div class="grow">-->
<!--                    <span class="text-sm font-bold text-gray-800 group-hover:text-blue-600 group-focus:text-blue-600 dark:text-neutral-200 dark:group-hover:text-blue-500 dark:group-focus:text-blue-500">-->
<!--                      5 Reasons to Not start a UX Designer Career in 2022/2023-->
<!--                    </span>-->
<!--                  </div>-->

<!--                  <div class="shrink-0 relative rounded-lg overflow-hidden size-20">-->
<!--                    <img class="size-full absolute top-0 start-0 object-cover rounded-lg" src="https://images.unsplash.com/photo-1567016526105-22da7c13161a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80" alt="Blog Image">-->
<!--                  </div>-->
<!--                </a>-->
<!--                &lt;!&ndash; End Media &ndash;&gt;-->
<!--              </div>-->
            </div>
          </div>
          <!-- End Sidebar -->
        </div>
      </div>
    </el-container>
  </App>
</template>

<style scoped>
</style>
