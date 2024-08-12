<template>
  <div class="editor-block">
    <div v-if="editor" :editor="editor">
      <div class="menubar">
        <button
          class="menubar__button"
          :class="{ 'is-active': editor.isActive('bold') }"
          @click="editor.chain().focus().toggleBold().run()"
        >
          <font-awesome-icon :icon="icons.bold" />
        </button>

        <button
          class="menubar__button"
          :class="{ 'is-active': editor.isActive('italic') }"
          @click="editor.chain().focus().toggleItalic().run()"
        >
          <font-awesome-icon :icon="icons.italic" />
        </button>

        <button
          class="menubar__button"
          :class="{ 'is-active': editor.isActive('strike') }"
          @click="editor.chain().focus().toggleStrike().run()"
        >
          <font-awesome-icon :icon="icons.strike" />
        </button>

        <button
          class="menubar__button"
          :class="{ 'is-active': editor.isActive('underline') }"
          @click="editor.chain().focus().toggleUnderline().run()"
        >
          <font-awesome-icon :icon="icons.under" />
        </button>

        <button
          class="menubar__button"
          :class="{ 'is-active': editor.isActive('code') }"
          @click="editor.chain().focus().toggleCode().run()"
        >
          <font-awesome-icon :icon="icons.code" />
        </button>

        <button
          class="menubar__button"
          :class="{
            'is-active': editor.isActive('heading', { level: 1 }),
          }"
          @click="editor.chain().focus().toggleHeading({ level: 1 }).run()"
        >
          <span>H1</span>
        </button>

        <button
          class="menubar__button"
          :class="{
            'is-active': editor.isActive('heading', { level: 2 }),
          }"
          @click="editor.chain().focus().toggleHeading({ level: 2 }).run()"
        >
          <span>H2</span>
        </button>

        <button
          class="menubar__button"
          :class="{
            'is-active': editor.isActive('heading', { level: 3 }),
          }"
          @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
        >
          <span>H3</span>
        </button>

        <button
          class="menubar__button"
          :class="{ 'is-active': editor.isActive('bulletList') }"
          @click="editor.chain().focus().toggleBulletList().run()"
        >
          <font-awesome-icon :icon="icons.ul" />
        </button>

        <button
          class="menubar__button"
          :class="{ 'is-active': editor.isActive('orderedList') }"
          @click="editor.chain().focus().toggleOrderedList().run()"
        >
          <font-awesome-icon :icon="icons.ol" />
        </button>

        <button
          class="menubar__button"
          :class="{ 'is-active': editor.isActive('blockquote') }"
          @click="editor.chain().focus().toggleBlockquote().run()"
        >
          <font-awesome-icon :icon="icons.quote" />
        </button>

        <button class="menubar__button" @click="editor.chain().focus().setHorizontalRule().run()">
          <b>—</b>
        </button>

        <button
          class="menubar__button"
          :class="{ 'is-active': editor.isActive('codeBlock') }"
          @click="editor.chain().focus().toggleCodeBlock().run()"
        >
          <font-awesome-icon :icon="icons.code" />
        </button>

        <button class="menubar__button" @click="editor.chain().focus().undo().run()">
          <font-awesome-icon :icon="icons.undo" />
        </button>

        <button class="menubar__button" @click="editor.chain().focus().redo().run()">
          <font-awesome-icon :icon="icons.redo" />
        </button>

        <button class="menubar__button" :class="{ 'is-active': editor.isActive('iframe') }" @click="addVideo">
          <font-awesome-icon :icon="icons.iframe" />
        </button>
      </div>
    </div>
    <editor-content class="editor" :editor="editor" />
  </div>
</template>

<script>
import {
  faBold,
  faCode,
  faItalic,
  faListOl,
  faListUl,
  faQuoteRight,
  faRedo,
  faStrikethrough,
  faTrash,
  faUnderline,
  faUndo,
  faVideo,
  faLink,
} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { nextTick, ref, toRef, watch, onMounted } from 'vue'

import { useEditor, EditorContent } from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import Underline from '@tiptap/extension-underline'
import Link from '@tiptap/extension-link'
import Iframe from '@/Components/tiptap/iframe'
import YouTube from '@tiptap/extension-youtube'

export default {
  name: 'TextEditor',
  components: {
    FontAwesomeIcon,
    EditorContent,
  },
  props: {
    editable: {
      type: Boolean,
      default: true,
    },
    content: [Object, String],
  },
  emits: ['onChange'],

  setup(props, context) {
    const content = toRef(props, 'content')

    const editable = toRef(props, 'editable')

    const linkUrl = ref(null)

    const linkMenuIsActive = ref(false)

    const linkInput = ref(null)

    const width = ref('640')
    const height = ref('480')

    const editor = useEditor({
      extensions: [
        StarterKit,
        Underline,
        Iframe,
        YouTube.configure({
          controls: false,
        }),
        Link.configure({
          HTMLAttributes: {
            class: 'editor__link',
          },
        }),
      ],
      onUpdate: () => {
        onChange()
      },
    })

    //methods=========================================================//

    function onChange() {
      context.emit('onChange')
    }

    function getContent() {
      return editor.value.getJSON()
    }

    function getContentAsHTML() {
      return editor.value.getHTML()
    }

    function setContent(content) {
      editor.value.commands.setContent(content)
    }

    function showLinkMenu(attrs) {
      linkUrl.value = attrs.href
      linkMenuIsActive.value = true
      nextTick(() => {
        linkInput.value.focus()
      })
    }

    function hideLinkMenu() {
      linkUrl.value = null
      linkMenuIsActive.value = false
    }

    function setLinkUrl(command, url) {
      command({ href: url })
      hideLinkMenu()
    }

    function addVideo() {
      const url = window.prompt('URL')
      editor.value.commands.setYoutubeVideo({
        src: url,
        width: Math.max(320, parseInt(width.value, 10)) || 640,
        height: Math.max(180, parseInt(height.value, 10)) || 480,
      })
    }

    //methods=========================================================//

    //watch=========================================================//

    watch(content, (newValue) => {
      // console.log('watch content and setContent')
      if (editor.value) {
        setContent(newValue)
      }
    })

    watch(editable, (newValue) => {
      editor.value.setOptions({ editable: newValue })
    })

    onMounted(() => {
      nextTick(() => {
        if (content.value) {
          setContent(content.value)
        }
      })
    })

    //watch=========================================================//

    return {
      editor,
      onChange,
      getContent,
      getContentAsHTML,
      setContent,
      linkUrl,
      linkMenuIsActive,
      linkInput,
      setLinkUrl,
      content,
      hideLinkMenu,
      showLinkMenu,
      addVideo,
    }
  },

  data() {
    return {
      icons: {
        bold: faBold,
        italic: faItalic,
        strike: faStrikethrough,
        under: faUnderline,
        code: faCode,
        ul: faListUl,
        ol: faListOl,
        quote: faQuoteRight,
        undo: faUndo,
        redo: faRedo,
        delete: faTrash,
        iframe: faVideo,
        remove: faTrash,
        link: faLink,
      },
      preview: {
        width: 0,
        height: 0,
        left: 0,
        top: 0,
      },
      cropperReady: false,
    }
  },
}
</script>

<style scoped lang="scss">
.editor-block {
  padding: 10px 16px;
  border: 1px solid #aebac8 !important;
  color: #000000;
  border-radius: 3px;
  background-color: #fff;
}
.menubar {
  margin-bottom: 1rem;
}

.menubar__button {
  font-weight: 700;
  display: inline;
  background: transparent;
  border: 0;
  padding: 0.2rem 0.5rem;
  margin-right: 0.2rem;
  border-radius: 3px;
  cursor: pointer;
  color: #707070;
  &:focus {
    outline: none;
  }
}
.menubar__button.is-active {
  background-color: rgba(0, 0, 0, 0.1);
}
.menubar__button:hover {
  background-color: rgba(0, 0, 0, 0.05);
}

.menububble {
  position: absolute;
  display: -webkit-box;
  display: flex;
  z-index: 20;
  background: #000;
  border-radius: 5px;
  padding: 0.3rem;
  margin-bottom: 0.5rem;
  -webkit-transform: translateX(-50%);
  transform: translateX(-50%);
  visibility: hidden;
  opacity: 0;
  -webkit-transition: opacity 0.2s, visibility 0.2s;
  transition: opacity 0.2s, visibility 0.2s;
}

.menububble.is-active {
  opacity: 1;
  visibility: visible;
}

.menububble__input {
  font: inherit;
  border: none;
  background: transparent;
  color: #fff;
}

.menububble__button {
  display: -webkit-inline-box;
  display: inline-flex;
  background: transparent;
  border: 0;
  color: #fff;
  padding: 0.2rem 0.5rem;
  margin-right: 0.2rem;
  border-radius: 3px;
  cursor: pointer;
}

.icon {
  margin: 0 0.3rem;
  top: -0.05rem;
  fill: currentColor;
  height: 100%;
  border: none;
  background: transparent;
  color: #fff;
}

.menububble__button {
  display: -webkit-inline-box;
  display: inline-flex;
  background: transparent;
  border: 0;
  color: #fff;
  padding: 0.2rem 0.5rem;
  margin-right: 0.2rem;
  border-radius: 3px;
  cursor: pointer;
}

.icon {
  margin: 0 0.3rem;
  top: -0.05rem;
  fill: currentColor;
  height: 100%;
}
</style>
