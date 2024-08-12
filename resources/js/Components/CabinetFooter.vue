<script setup>

</script>

<template>
  <!-- ========== FOOTER ========== -->
  <footer class="lg:ps-[260px] h-[40px] sm:h-[64px] absolute bottom-0 inset-x-0">
    <div class="p-2 sm:p-5 flex justify-between items-center">
      <p class="text-xs sm:text-sm text-gray-500 dark:text-neutral-500">
        © {{ new Date().getFullYear() }} StartInvest.uz
      </p>

      <!-- List -->
      <ul>
        <li class="inline-block relative pe-5 text-xs sm:text-sm text-gray-500 align-middle last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:w-px before:h-3.5 before:bg-gray-400 before:rotate-[18deg] dark:text-neutral-500 dark:before:bg-neutral-600">
          <a class="hover:text-blue-600 focus:outline-none focus:underline dark:hover:text-neutral-200" href="#">
            FAQ
          </a>
        </li>
        <li class="inline-block relative pe-5 text-xs sm:text-sm text-gray-500 align-middle last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:w-px before:h-3.5 before:bg-gray-400 before:rotate-[18deg] dark:text-neutral-500 dark:before:bg-neutral-600">
          <a class="hover:text-blue-600 focus:outline-none focus:underline dark:hover:text-neutral-200" href="#">
            License
          </a>
        </li>
        <li class="inline-block relative pe-5 text-xs sm:text-sm text-gray-500 align-middle sm:leading-3 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:w-px before:h-3.5 before:bg-gray-400 before:rotate-[18deg] dark:text-neutral-500 dark:before:bg-neutral-600">
          <button type="button" class="hover:text-blue-600 focus:outline-none focus:text-gray-800 dark:hover:text-neutral-200 dark:focus:text-neutral-400" data-hs-overlay="#hs-pro-dfkm">
            <svg class="shrink-0 size-3.5 sm:size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3" />
            </svg>
          </button>
        </li>
      </ul>
      <!-- End List -->
    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->
</template>

<style scoped>

</style>
