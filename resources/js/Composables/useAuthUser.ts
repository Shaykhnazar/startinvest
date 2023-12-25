import {usePage} from "@inertiajs/vue3";
import {computed, reactive, ref, toRefs} from "vue";

export function useAuthUser() {
  const $page = usePage()

  const authUser = ref($page.props.auth.user || null)
  const isGuest = computed(() => authUser.value === null)
  const isAuthorOfIdea = ref((idea) => !isGuest.value && authUser.value.id === idea.author.id)

  const state = reactive({
    circleUrl:
      'https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png',
  })
  const {circleUrl} = toRefs(state)

  return {
    authUser,
    isGuest,
    isAuthorOfIdea,
    circleUrl
  }
}
