import { router, usePage } from '@inertiajs/vue3'
import { reactive, computed} from 'vue';
import { useIntersect } from '@/Composables/useIntersect.js'


export function useInfiniteScroll(propName, landmark = null) {

  const value = () => usePage().props[propName];
  const items = reactive([...value().data]);
  const initialUrl = usePage().url;
  const canLoadMoreItems = computed(() => value().links.next !== null);

  const loadMoreItems = () => {
    if (!canLoadMoreItems.value) {
      return;
    }

    router.get(value().links.next, {}, {
      preserveScroll: true,
      preserveState: true,
      onSuccess: () => {
        window.history.replaceState({}, '', initialUrl);
        items.push(...value().data);
      }
    })
  }

  if (landmark !== null) {
    useIntersect(landmark, loadMoreItems, {
      rootMargin: '0px 0px 250px 0px'
    })
  }

  return {
    items,
    loadMoreItems,
    canLoadMoreItems
  }
}
