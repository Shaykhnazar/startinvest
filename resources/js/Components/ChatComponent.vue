<template>
  <div>
    <div class="flex flex-col justify-end h-80">
      <div ref="messagesContainer" class="p-4 overflow-y-auto max-h-fit">
        <div
          v-for="message in messages"
          :key="message.id"
          class="flex items-center mb-2"
        >
          <div
            v-if="message.sender_id === currentUser.id"
            class="p-2 ml-auto text-white bg-blue-500 rounded-lg"
          >
            {{ message.text }}
          </div>
          <div v-else class="p-2 mr-auto bg-gray-200 rounded-lg">
            {{ message.text }}
          </div>
        </div>
      </div>
    </div>
    <div class="flex items-center">
      <input
        type="text"
        v-model="newMessage"
        @keydown="sendTypingEvent"
        @keyup.enter="sendMessage"
        placeholder="Type a message..."
        class="flex-1 px-2 py-1 border rounded-lg"
      />
      <button
        @click="sendMessage"
        class="px-4 py-1 ml-2 text-white bg-blue-500 rounded-lg"
      >
        Send
      </button>
    </div>
    <small v-if="isFriendTyping" class="text-gray-700">
      {{ friend.name }} is typing...
    </small>
  </div>
</template>

<script setup>
import { ref, watch, onMounted, nextTick } from 'vue';
import api from '@/services/api';

const props = defineProps({
  friend: {
    type: Object,
    required: true,
  },
  currentUser: {
    type: Object,
    required: true,
  },
});

const messages = ref([]);
const newMessage = ref('');
const messagesContainer = ref(null);
const isFriendTyping = ref(false);
const isFriendTypingTimer = ref(null);

watch(
  messages,
  () => {
    nextTick(() => {
      messagesContainer.value.scrollTo({
        top: messagesContainer.value.scrollHeight,
        behavior: 'smooth',
      });
    });
  },
  { deep: true }
);

const sendMessage = async () => {
  if (newMessage.value.trim() !== '') {
    try {
      const response = await api.messages.sendMessage(props.friend.id, {
        message: newMessage.value,
      });
      messages.value.push(response.data.message);
      newMessage.value = '';
    } catch (error) {
      console.error('Failed to send message:', error);
    }
  }
};

const sendTypingEvent = () => {
  Echo.private(`chat.${props.friend.id}`).whisper('typing', {
    userID: props.currentUser.id,
  });
};

onMounted(async () => {
  try {
    const response = await api.messages.getMessages(props.friend.id);
    messages.value = response.data;
  } catch (error) {
    console.error('Failed to load messages:', error);
  }

  Echo.private(`chat.${props.currentUser.id}`)
    .listen('MessageSent', (response) => {
      messages.value.push(response.message);
    })
    .listenForWhisper('typing', (response) => {
      isFriendTyping.value = response.userID === props.friend.id;

      if (isFriendTypingTimer.value) {
        clearTimeout(isFriendTypingTimer.value);
      }

      isFriendTypingTimer.value = setTimeout(() => {
        isFriendTyping.value = false;
      }, 1000);
    });
});
</script>
