import { router, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

export function usePaginationLoadMore(propName) {
  const value = () => usePage().props[propName];
  const items = ref(value().data);
  const initialUrl = usePage().url;
  const loading = ref(false);
  const canLoadMoreItems = computed(() => value().links.next !== null);

  const loadMoreItems = () => {
    if (!canLoadMoreItems.value || loading.value) {
      return;
    }

    loading.value = true;

    router.get(value().links.next, {}, {
      preserveScroll: true,
      preserveState: true,
      onSuccess: () => {
        window.history.replaceState({}, '', initialUrl);
        items.value = [...items.value, ...value().data];
        loading.value = false;
      },
      onError: () => {
        loading.value = false;
      },
    });
  };

  const resetItems = () => {
    items.value = value().data; // Reset with new data
  };

  return {
    items,
    loadMoreItems,
    canLoadMoreItems,
    loading,
    resetItems,
  };
}
