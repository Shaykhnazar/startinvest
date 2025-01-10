<template>
  <div class="markdown-editor-container">
    <textarea ref="editor"></textarea>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, watch } from 'vue'
import EasyMDE from 'easymde'
import 'easymde/dist/easymde.min.css'

const props = defineProps({
  modelValue: {
    type: String,
    default: ''
  },
  placeholder: {
    type: String,
    default: 'Write your content here...'
  },
  autosave: {
    type: Boolean,
    default: true
  }
})

const emit = defineEmits(['update:modelValue', 'change'])
const editor = ref(null)
let easyMDE = null

onMounted(() => {
  easyMDE = new EasyMDE({
    element: editor.value,
    initialValue: props.modelValue,
    placeholder: props.placeholder,
    spellChecker: false,
    status: ['lines', 'words'],
    autosave: props.autosave ? {
      enabled: true,
      uniqueId: 'editor-content',
      delay: 1000,
    } : undefined,
    toolbar: [
      'bold',
      'italic',
      'strikethrough',
      'heading',
      'code',
      '|',
      'quote',
      'unordered-list',
      'ordered-list',
      '|',
      'link',
      'image',
      '|',
      'preview',
      'side-by-side',
      'fullscreen',
      '|',
      'guide'
    ],
    uploadImage: true,
    imageUploadFunction: uploadImageHandler,
    minHeight: '300px', // Changed from fixed maxHeight
    autofocus: false,
    renderingConfig: {
      codeSyntaxHighlighting: true,
      singleLineBreaks: false,
    },
    styleSelectedText: false,
  })

  easyMDE.codemirror.on('change', () => {
    const value = easyMDE.value()
    emit('update:modelValue', value)
    emit('change', value)
  })
})

onBeforeUnmount(() => {
  if (easyMDE) {
    easyMDE.toTextArea()
    easyMDE = null
  }
})

watch(() => props.modelValue, (newValue) => {
  if (easyMDE && newValue !== easyMDE.value()) {
    easyMDE.value(newValue)
  }
})

// Image upload handler - customize this based on your needs
const uploadImageHandler = async (file) => {
  try {
    // Implement your image upload logic here
    // For example:
    // const formData = new FormData()
    // formData.append('image', file)
    // const response = await axios.post('/api/upload-image', formData)
    // return response.data.imageUrl

    // For now, returning a placeholder
    return new Promise((resolve) => {
      const reader = new FileReader()
      reader.onload = (e) => resolve(e.target.result)
      reader.readAsDataURL(file)
    })
  } catch (error) {
    console.error('Image upload failed:', error)
    return null
  }
}
</script>

<style>
/* Base container */
.markdown-editor-container {
  width: 100%;
  position: relative;
  min-height: 300px;
}

/* Main container styling */
.EasyMDEContainer {
  width: 100% !important;
  min-height: 300px;
  padding: 10px;
}

/* Editor area */
.EasyMDEContainer .CodeMirror {
  width: 100% !important;
  height: auto !important;
  min-height: 300px !important;
  border-radius: 0.375rem;
  border: 1px solid #e5e7eb;
}

/* Toolbar styling */
.editor-toolbar {
  width: 100% !important;
  display: flex;
  flex-wrap: wrap;
  border: 1px solid #e5e7eb;
  border-bottom: none;
  border-radius: 0.375rem 0.375rem 0 0;
  background: #fff;
  padding: 0.5rem;
}

.editor-toolbar button {
  border: 1px solid #e5e7eb;
  border-radius: 0.25rem;
  margin: 0.25rem !important;
  padding: 0.5rem !important;
}

/* Mobile Styles */
@media screen and (max-width: 768px) {
  .markdown-editor-container {
    width: 100vw;
    margin-left: -1rem;
    margin-right: -1rem;
  }

  .EasyMDEContainer {
    border-radius: 0;
    padding: 10px;
  }

  .editor-toolbar {
    padding: 0.25rem;
    justify-content: center;
    border-radius: 0;
  }

  .editor-toolbar button {
    padding: 0.375rem !important;
  }

  .EasyMDEContainer .CodeMirror {
    border-radius: 0;
    font-size: 16px;
    padding: 0.5rem;
  }
}

/* Dark mode */
@media (prefers-color-scheme: dark) {
  .EasyMDEContainer .CodeMirror {
    background-color: #1a1a1a;
    color: #fff;
    border-color: #374151;
  }

  .editor-toolbar {
    background-color: #1a1a1a;
    border-color: #374151;
  }

  .editor-toolbar button {
    color: #fff !important;
    border-color: #374151;
  }

  .editor-toolbar button:hover {
    background-color: #374151;
  }

  .editor-toolbar i.separator {
    border-left: 1px solid #374151;
  }
}
</style>
