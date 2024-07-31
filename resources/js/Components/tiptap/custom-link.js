import Link from '@tiptap/extension-link'

export const CustomLink = Link.extend({
  priority: 1000,
  attrs: {
    href: {
      default: null,
    },
    target: {
      default: null,
    },
    class: {
      default: null,
    },
  },
  inclusive: false,
  parseDOM: [
    {
      tag: 'a[href]',
      getAttrs: (dom) => ({
        href: dom.getAttribute('href'),
        target: dom.getAttribute('target'),
        class: dom.getAttribute('class'),
      }),
    },
  ],
  toDOM: (node) => [
    'a',
    {
      ...node.attrs,
      target: '__blank',
      rel: 'noopener noreferrer nofollow',
    },
    0,
  ],
})

// export default class CustomLink extends Link {
//   get schema() {
//     return {
//       attrs: {
//         href: {
//           default: null,
//         },
//         target: {
//           default: null,
//         },
//       },
//       inclusive: false,
//       parseDOM: [
//         {
//           tag: 'a[href]',
//           getAttrs: (dom) => ({
//             href: dom.getAttribute('href'),
//             target: dom.getAttribute('target'),
//           }),
//         },
//       ],
//       toDOM: (node) => [
//         'a',
//         {
//           ...node.attrs,
//           target: '__blank',
//           rel: 'noopener noreferrer nofollow',
//         },
//         0,
//       ],
//     }
//   }
// }
