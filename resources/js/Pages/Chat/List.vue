<template>
  <App>
    <template #header>
      <Head title="Chat list"/>
    </template>
    <div>
      <h1 class="text-xl font-semibold leading-tight text-gray-800">My Chats</h1>
      <ul>
        <li v-for="friend in friends" :key="friend.id">
          <Link :href="`/chat/${friend.id}`" class="text-blue-500 hover:underline">
            {{ friend.name }}
          </Link>
        </li>
      </ul>
    </div>
  </App>
</template>

<script>
import App from '@/Layouts/App.vue'
import { Head, Link } from '@inertiajs/vue3'

export default {
  components: { App, Head, Link },
  props: {
    friends: Array,
    currentUser: Object
  }
}
</script>
