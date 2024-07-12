<template>
  <App>
    <template #header>
      <Head :title="'Private chat with ' + friend.name"/>
    </template>
    <div>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ friend.name }}</h2>
      <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              <chat-component
                :friend="friend"
                :current-user="currentUser"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </App>
</template>

<script>
import ChatComponent from '@/Components/ChatComponent.vue';
import { Head } from '@inertiajs/vue3'
import App from '@/Layouts/App.vue'

export default {
  components: {
    App,
    Head,
    ChatComponent,
  },
  props: {
    friend: Object,
    currentUser: Object,
  },
};
</script>
