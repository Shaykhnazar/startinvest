<template>
    <button
        class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-neutral-400 dark:hover:bg-amber-100 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        :type="type"
        @click="$emit('click')"
    >
      <slot />
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: "submit",
        },
    },
};
</script>
