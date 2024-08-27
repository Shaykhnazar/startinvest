<script setup>

</script>

<template>
  <!-- Add Project Modal -->
  <div id="hs-pro-dasadpm" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--close-when-click-inside:true] pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-pro-dasadpm-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
      <div class="w-full max-h-full flex flex-col bg-white rounded-xl pointer-events-auto shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-800">
        <!-- Header -->
        <div class="py-2.5 px-4 flex justify-between items-center border-b dark:border-neutral-700">
          <h3 id="hs-pro-dasadpm-label" class="font-medium text-gray-800 dark:text-neutral-200">
            Add project
          </h3>
          <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-pro-dasadpm">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
        <!-- End Header -->

        <form>
          <!-- Body -->
          <div class="p-4 space-y-5">
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Project logo
              </label>

              <!-- Logo Upload Group -->
              <div class="flex flex-wrap items-center gap-3 sm:gap-5">
                <span class="flex shrink-0 justify-center items-center size-20 border-2 border-dotted border-gray-300 text-gray-400 rounded-full dark:border-neutral-700 dark:text-neutral-600">
                  <svg class="shrink-0 size-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                    <circle cx="9" cy="9" r="2" />
                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                  </svg>
                </span>

                <div class="grow">
                  <div class="flex items-center gap-x-2">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <polyline points="17 8 12 3 7 8" />
                        <line x1="12" x2="12" y1="3" y2="15" />
                      </svg>
                      Upload photo
                    </button>
                  </div>
                </div>
              </div>
              <!-- End Logo Upload Group -->
            </div>

            <div>
              <label for="hs-pro-dalpn" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                Project name
              </label>

              <input type="text" id="hs-pro-dalpn" class="py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="My project">
            </div>

            <div>
              <label for="hs-pro-dalsd" class="block mb-2 text-sm font-medium text-gray-800 dark:text-white">
                Subdomain
              </label>

              <div class="relative">
                <input type="text" id="hs-pro-dalsd" class="py-2.5 ps-3 pe-24 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="myproject">
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-4">
                  <span class="text-sm text-gray-500 dark:text-neutral-500">.preline.co</span>
                </div>
              </div>
            </div>
          </div>
          <!-- End Body -->

          <!-- Footer -->
          <div class="p-4 flex justify-end gap-x-2">
            <div class="flex-1 flex flex-wrap justify-end items-center gap-2">
              <button type="button" class="py-2 px-3 inline-flex justify-center items-center text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dasadpm">
                Cancel
              </button>

              <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500" data-hs-overlay="#hs-pro-dasadpm">
                Save
              </button>
            </div>
          </div>
          <!-- End Footer -->
        </form>
      </div>
    </div>
  </div>
  <!-- End Add Project Modal -->
</template>

<style scoped>

</style>
