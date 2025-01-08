<template>
  <h3 class="text-2xl font-bold mb-6">Maqolani ulashing</h3>

  <div class="flex items-center space-x-4 my-6 p-4 bg-gray-50 rounded-lg">

    <!-- Copy URL Button -->
    <button
      @click="copyUrl"
      type="button"
      class="[--is-toggle-tooltip:false] hs-tooltip relative py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-mono rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
    >
      {{ props.url }}
      <span class="border-s ps-3.5 dark:border-neutral-700">
        <!-- Default Copy Icon -->
        <svg
          :class="{'hidden': copied, 'block': !copied}"
          class="size-4 group-hover:rotate-6 transition"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <rect width="8" height="4" x="8" y="2" rx="1" ry="1"/>
          <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
        </svg>

            <!-- Success Check Icon -->
        <svg
          :class="{'hidden': !copied, 'block': copied}"
          class="size-4 text-blue-600 rotate-6"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <polyline points="20 6 9 17 4 12"/>
        </svg>
      </span>

      <!-- Tooltip -->
      <span
        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity absolute z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-lg shadow-sm dark:bg-neutral-700"
        role="tooltip"
      >
        {{ copied ? 'Copied!' : 'Copy' }}
      </span>
    </button>

    <!-- Social Share Buttons -->
    <a
      :href="'https://t.me/share/url?url=' + encodedUrl + '&text=' + encodedTitle"
      target="_blank"
      class="flex items-center space-x-2 text-blue-500 hover:text-blue-600"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"/><path d="m21.854 2.147-10.94 10.939"/></svg>
      <span>Telegram</span>
    </a>

    <a
      :href="'https://www.facebook.com/sharer/sharer.php?u=' + encodedUrl"
      target="_blank"
      class="flex items-center space-x-2 text-blue-600 hover:text-blue-700"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
      <span>Facebook</span>
    </a>

    <a
      :href="'https://twitter.com/intent/tweet?text=' + encodedTitle + '&url=' + encodedUrl"
      target="_blank"
      class="flex items-center space-x-2 text-blue-400 hover:text-blue-500"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
      <span>Twitter</span>
    </a>

    <a
      :href="'https://www.linkedin.com/shareArticle?mini=true&url=' + encodedUrl + '&title=' + encodedTitle"
      target="_blank"
      class="flex items-center space-x-2 text-blue-600 hover:text-blue-700"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
      <span>LinkedIn</span>
    </a>

    <a
      :href="'mailto:?subject=' + encodedTitle + '&body=' + encodedUrl"
      target="_blank"
      class="flex items-center space-x-2 text-gray-600 hover:text-gray-800"
    >
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
      <span>Email</span>
    </a>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useElMessage } from '@/Composables/helpers'

const props = defineProps({
  url: {
    type: String,
    required: true
  },
  title: {
    type: String,
    required: true
  }
})

const { error, success } = useElMessage()
const copied = ref(false)

const encodedUrl = computed(() => encodeURIComponent(props.url))
const encodedTitle = computed(() => encodeURIComponent(props.title))

const copyUrl = async () => {
  try {
    if (navigator.clipboard && window.isSecureContext) {
      await navigator.clipboard.writeText(props.url)
    } else {
      const textArea = document.createElement('textarea')
      textArea.value = props.url

      textArea.style.position = 'fixed'
      textArea.style.left = '-999999px'
      textArea.style.top = '-999999px'
      document.body.appendChild(textArea)

      textArea.focus()
      textArea.select()

      try {
        document.execCommand('copy')
        textArea.remove()
      } catch (err) {
        console.error('Fallback: Oops, unable to copy', err)
        textArea.remove()
        error('Failed to copy URL')
        return
      }
    }

    copied.value = true
    success('URL copied to clipboard')

    setTimeout(() => {
      copied.value = false
    }, 2000)
  } catch (err) {
    console.error('Failed to copy:', err)
    error('Failed to copy URL')
  }
}
</script>
