<template>
  <div
      class="xl:p-5 flex flex-col xl:bg-white xl:border xl:border-gray-200 xl:shadow-sm xl:rounded-xl dark:xl:bg-neutral-800 dark:xl:border-neutral-700">
    <!-- Grid -->
    <div class="xl:flex">
      <!-- Activity Offcanvas -->
<!--      <div id="hs-pro-dupsd"-->
<!--           class="hs-overlay [&#45;&#45;auto-close:xl] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-[320px] bg-white p-5 overflow-y-auto xl:relative xl:z-0 xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 xl:p-0 border-e border-gray-200 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-800 dark:border-neutral-700"-->
<!--           role="dialog" tabindex="-1" aria-labelledby="hs-pro-dupsd-label">-->
<!--        <div class="xl:hidden">-->
<!--          &lt;!&ndash; Close Button &ndash;&gt;-->
<!--          <div class="absolute top-2 end-4 z-10">-->
<!--            <button type="button"-->
<!--                    class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"-->
<!--                    aria-label="Close" data-hs-overlay="#hs-pro-dupsd">-->
<!--              <span class="sr-only">Close</span>-->
<!--              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"-->
<!--                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
<!--                <path d="M18 6 6 18"/>-->
<!--                <path d="m6 6 12 12"/>-->
<!--              </svg>-->
<!--            </button>-->
<!--          </div>-->
<!--          &lt;!&ndash; End Close Button &ndash;&gt;-->
<!--        </div>-->

<!--        &lt;!&ndash; Body &ndash;&gt;-->
<!--        <div class="xl:pe-4 mt-3 space-y-5 divide-y divide-gray-200 dark:divide-neutral-700">-->
<!--          <div class="pt-4 first:pt-0">-->
<!--            <h2 id="hs-pro-dupsd-label" class="text-sm font-semibold text-gray-800 dark:text-neutral-200">-->
<!--              About-->
<!--            </h2>-->

<!--            &lt;!&ndash; List &ndash;&gt;-->
<!--            <ul class="mt-3 space-y-2">-->
<!--              <li>-->
<!--                <div class="inline-flex items-center gap-x-3 text-sm text-gray-800 dark:text-neutral-200">-->
<!--                  <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg"-->
<!--                       width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
<!--                       stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>-->
<!--                    <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>-->
<!--                    <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>-->
<!--                    <path d="M10 6h4"/>-->
<!--                    <path d="M10 10h4"/>-->
<!--                    <path d="M10 14h4"/>-->
<!--                    <path d="M10 18h4"/>-->
<!--                  </svg>-->
<!--                  Organization-->
<!--                </div>-->
<!--              </li>-->
<!--              <li>-->
<!--                <div class="inline-flex items-center gap-x-3 text-sm text-gray-800 dark:text-neutral-200">-->
<!--                  <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg"-->
<!--                       width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
<!--                       stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>-->
<!--                    <circle cx="12" cy="10" r="3"/>-->
<!--                  </svg>-->
<!--                  Country-->
<!--                </div>-->
<!--              </li>-->
<!--              <li>-->
<!--                <div class="inline-flex items-center gap-x-3 text-sm text-gray-800 dark:text-neutral-200">-->
<!--                  <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg"-->
<!--                       width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
<!--                       stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <circle cx="12" cy="12" r="10"/>-->
<!--                    <polyline points="12 6 12 12 16 14"/>-->
<!--                  </svg>-->
<!--                  Time zone-->
<!--                </div>-->
<!--              </li>-->
<!--              <li>-->
<!--                <div class="inline-flex items-center gap-x-3 text-sm text-gray-800 dark:text-neutral-200">-->
<!--                  <svg class="shrink-0 size-4 text-gray-600 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg"-->
<!--                       width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
<!--                       stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <rect width="20" height="16" x="2" y="4" rx="2"/>-->
<!--                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>-->
<!--                  </svg>-->
<!--                  Email-->
<!--                </div>-->
<!--              </li>-->
<!--            </ul>-->
<!--            &lt;!&ndash; End List &ndash;&gt;-->
<!--          </div>-->

<!--          <div class="pt-4 first:pt-0">-->
<!--            <h2 class="mb-2 text-sm text-gray-500 dark:text-neutral-500">-->
<!--              Explore help topics-->
<!--            </h2>-->

<!--            &lt;!&ndash; List Group &ndash;&gt;-->
<!--            <ul class="space-y-2">-->
<!--              &lt;!&ndash; List Item &ndash;&gt;-->
<!--              <li>-->
<!--                <a class="p-2.5 flex items-center gap-x-3 bg-white border border-gray-200 text-sm font-medium text-gray-800 dark:text-neutral-200 rounded-xl hover:text-blue-600 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:text-blue-500 dark:focus:bg-neutral-700"-->
<!--                   href="#">-->
<!--                        <span-->
<!--                            class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                          <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-500"-->
<!--                               xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"-->
<!--                               viewBox="0 0 16 16">-->
<!--                            <path-->
<!--                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>-->
<!--                          </svg>-->
<!--                        </span>-->
<!--                  <div class="grow">-->
<!--                    <p>-->
<!--                      Preline Course-->
<!--                    </p>-->
<!--                  </div>-->
<!--                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
<!--                       viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
<!--                       stroke-linejoin="round">-->
<!--                    <path d="m9 18 6-6-6-6"/>-->
<!--                  </svg>-->
<!--                </a>-->
<!--              </li>-->
<!--              &lt;!&ndash; End List Item &ndash;&gt;-->

<!--              &lt;!&ndash; List Item &ndash;&gt;-->
<!--              <li>-->
<!--                <a class="p-2.5 flex items-center gap-x-3 bg-white border border-gray-200 text-sm font-medium text-gray-800 dark:text-neutral-200 rounded-xl hover:text-blue-600 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:text-blue-500 dark:focus:bg-neutral-700"-->
<!--                   href="#">-->
<!--                        <span-->
<!--                            class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                          <svg class="shrink-0 size-3.5 text-purple-600 dark:text-purple-500"-->
<!--                               xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"-->
<!--                               viewBox="0 0 16 16">-->
<!--                            <path-->
<!--                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>-->
<!--                          </svg>-->
<!--                        </span>-->
<!--                  <div class="grow">-->
<!--                    <p>-->
<!--                      Community Group-->
<!--                    </p>-->
<!--                  </div>-->
<!--                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
<!--                       viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
<!--                       stroke-linejoin="round">-->
<!--                    <path d="m9 18 6-6-6-6"/>-->
<!--                  </svg>-->
<!--                </a>-->
<!--              </li>-->
<!--              &lt;!&ndash; End List Item &ndash;&gt;-->

<!--              &lt;!&ndash; List Item &ndash;&gt;-->
<!--              <li>-->
<!--                <a class="p-2.5 flex items-center gap-x-3 bg-white border border-gray-200 text-sm font-medium text-gray-800 dark:text-neutral-200 rounded-xl hover:text-blue-600 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:text-blue-500 dark:focus:bg-neutral-700"-->
<!--                   href="#">-->
<!--                        <span-->
<!--                            class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                          <svg class="shrink-0 size-3.5 text-cyan-600 dark:text-cyan-500"-->
<!--                               xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"-->
<!--                               viewBox="0 0 16 16">-->
<!--                            <path-->
<!--                                d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>-->
<!--                            <path-->
<!--                                d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>-->
<!--                          </svg>-->
<!--                        </span>-->
<!--                  <div class="grow">-->
<!--                    <p>-->
<!--                      Hire a Partner Expert-->
<!--                    </p>-->
<!--                  </div>-->
<!--                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
<!--                       viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
<!--                       stroke-linejoin="round">-->
<!--                    <path d="m9 18 6-6-6-6"/>-->
<!--                  </svg>-->
<!--                </a>-->
<!--              </li>-->
<!--              &lt;!&ndash; End List Item &ndash;&gt;-->

<!--              &lt;!&ndash; List Item &ndash;&gt;-->
<!--              <li>-->
<!--                <a class="p-2.5 flex items-center gap-x-3 bg-white border border-gray-200 text-sm font-medium text-gray-800 dark:text-neutral-200 rounded-xl hover:text-blue-600 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:hover:text-blue-500 dark:focus:bg-neutral-700"-->
<!--                   href="#">-->
<!--                        <span-->
<!--                            class="flex shrink-0 justify-center items-center size-7 bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">-->
<!--                          <svg class="shrink-0 size-3.5 text-indigo-600 dark:text-indigo-500"-->
<!--                               xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"-->
<!--                               viewBox="0 0 16 16">-->
<!--                            <path-->
<!--                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>-->
<!--                          </svg>-->
<!--                        </span>-->
<!--                  <div class="grow">-->
<!--                    <p>-->
<!--                      Help center-->
<!--                    </p>-->
<!--                  </div>-->
<!--                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
<!--                       viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
<!--                       stroke-linejoin="round">-->
<!--                    <path d="m9 18 6-6-6-6"/>-->
<!--                  </svg>-->
<!--                </a>-->
<!--              </li>-->
<!--              &lt;!&ndash; End List Item &ndash;&gt;-->
<!--            </ul>-->
<!--            &lt;!&ndash; End List Group &ndash;&gt;-->
<!--          </div>-->
<!--        </div>-->
<!--        &lt;!&ndash; End Body &ndash;&gt;-->
<!--      </div>-->
      <!-- End Activity Offcanvas -->

      <!-- Content -->
<!--      <div class="xl:ps-5 grow space-y-5">-->
<!--        &lt;!&ndash; Projects Card &ndash;&gt;-->
<!--        <div-->
<!--            class="flex flex-col bg-white border border-gray-200 rounded-xl shadow-sm xl:shadow-none dark:bg-neutral-800 dark:border-neutral-700">-->
<!--          &lt;!&ndash; Header &ndash;&gt;-->
<!--          <div class="p-5 pb-2 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">-->
<!--            <h2 class="inline-block font-semibold text-gray-800 dark:text-neutral-200">-->
<!--              Projects-->
<!--            </h2>-->

<!--            &lt;!&ndash; Form Group &ndash;&gt;-->
<!--            <div class="flex sm:justify-end items-center gap-x-2">-->
<!--              &lt;!&ndash; Search Input &ndash;&gt;-->
<!--              <div class="relative">-->
<!--                <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3">-->
<!--                  <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg"-->
<!--                       width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"-->
<!--                       stroke-linecap="round" stroke-linejoin="round">-->
<!--                    <circle cx="11" cy="11" r="8"/>-->
<!--                    <path d="m21 21-4.3-4.3"/>-->
<!--                  </svg>-->
<!--                </div>-->
<!--                <input type="text"-->
<!--                       class="py-1.5 px-8 w-40 sm:w-full block bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600"-->
<!--                       placeholder="Search">-->
<!--                <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1">-->
<!--                  <button type="button"-->
<!--                          class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"-->
<!--                          aria-label="Close">-->
<!--                    <span class="sr-only">Close</span>-->
<!--                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
<!--                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
<!--                         stroke-linejoin="round">-->
<!--                      <circle cx="12" cy="12" r="10"/>-->
<!--                      <path d="m15 9-6 6"/>-->
<!--                      <path d="m9 9 6 6"/>-->
<!--                    </svg>-->
<!--                  </button>-->
<!--                </div>-->
<!--              </div>-->
<!--              &lt;!&ndash; End Search Input &ndash;&gt;-->

<!--              &lt;!&ndash; Button &ndash;&gt;-->
<!--              <button type="button"-->
<!--                      class="p-2 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500"-->
<!--                      data-hs-overlay="#hs-pro-dasadpm">-->
<!--                <svg class="hidden sm:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
<!--                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
<!--                     stroke-linejoin="round">-->
<!--                  <path d="M5 12h14"/>-->
<!--                  <path d="M12 5v14"/>-->
<!--                </svg>-->
<!--                Add project-->
<!--              </button>-->
<!--              &lt;!&ndash; End Button &ndash;&gt;-->
<!--            </div>-->
<!--            &lt;!&ndash; End Form Group &ndash;&gt;-->
<!--          </div>-->
<!--          &lt;!&ndash; End Header &ndash;&gt;-->
<!--          &lt;!&ndash; Empty State &ndash;&gt;-->
<!--          <div class="p-5 min-h-[328px]  flex flex-col justify-center items-center text-center">-->
<!--            <svg class="w-48 mx-auto mb-4" width="178" height="90" viewBox="0 0 178 90" fill="none"-->
<!--                 xmlns="http://www.w3.org/2000/svg">-->
<!--              <rect x="27" y="50.5" width="124" height="39" rx="7.5" fill="currentColor"-->
<!--                    class="fill-white dark:fill-neutral-800"/>-->
<!--              <rect x="27" y="50.5" width="124" height="39" rx="7.5" stroke="currentColor"-->
<!--                    class="stroke-gray-50 dark:stroke-neutral-700/10"/>-->
<!--              <rect x="34.5" y="58" width="24" height="24" rx="4" fill="currentColor"-->
<!--                    class="fill-gray-50 dark:fill-neutral-700/30"/>-->
<!--              <rect x="66.5" y="61" width="60" height="6" rx="3" fill="currentColor"-->
<!--                    class="fill-gray-50 dark:fill-neutral-700/30"/>-->
<!--              <rect x="66.5" y="73" width="77" height="6" rx="3" fill="currentColor"-->
<!--                    class="fill-gray-50 dark:fill-neutral-700/30"/>-->
<!--              <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" fill="currentColor"-->
<!--                    class="fill-white dark:fill-neutral-800"/>-->
<!--              <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" stroke="currentColor"-->
<!--                    class="stroke-gray-100 dark:stroke-neutral-700/30"/>-->
<!--              <rect x="27" y="36" width="24" height="24" rx="4" fill="currentColor"-->
<!--                    class="fill-gray-100 dark:fill-neutral-700/70"/>-->
<!--              <rect x="59" y="39" width="60" height="6" rx="3" fill="currentColor"-->
<!--                    class="fill-gray-100 dark:fill-neutral-700/70"/>-->
<!--              <rect x="59" y="51" width="92" height="6" rx="3" fill="currentColor"-->
<!--                    class="fill-gray-100 dark:fill-neutral-700/70"/>-->
<!--              <g filter="url(#filter13)">-->
<!--                <rect x="12" y="6" width="154" height="40" rx="8" fill="currentColor"-->
<!--                      class="fill-white dark:fill-neutral-800" shape-rendering="crispEdges"/>-->
<!--                <rect x="12.5" y="6.5" width="153" height="39" rx="7.5" stroke="currentColor"-->
<!--                      class="stroke-gray-100 dark:stroke-neutral-700/60" shape-rendering="crispEdges"/>-->
<!--                <rect x="20" y="14" width="24" height="24" rx="4" fill="currentColor"-->
<!--                      class="fill-gray-200 dark:fill-neutral-700 "/>-->
<!--                <rect x="52" y="17" width="60" height="6" rx="3" fill="currentColor"-->
<!--                      class="fill-gray-200 dark:fill-neutral-700"/>-->
<!--                <rect x="52" y="29" width="106" height="6" rx="3" fill="currentColor"-->
<!--                      class="fill-gray-200 dark:fill-neutral-700"/>-->
<!--              </g>-->
<!--              <defs>-->
<!--                <filter id="filter13" x="0" y="0" width="178" height="64" filterUnits="userSpaceOnUse"-->
<!--                        color-interpolation-filters="sRGB">-->
<!--                  <feFlood flood-opacity="0" result="BackgroundImageFix"/>-->
<!--                  <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"-->
<!--                                 result="hardAlpha"/>-->
<!--                  <feOffset dy="6"/>-->
<!--                  <feGaussianBlur stdDeviation="6"/>-->
<!--                  <feComposite in2="hardAlpha" operator="out"/>-->
<!--                  <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>-->
<!--                  <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1187_14810"/>-->
<!--                  <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1187_14810" result="shape"/>-->
<!--                </filter>-->
<!--              </defs>-->
<!--            </svg>-->

<!--            <div class="max-w-sm mx-auto">-->
<!--              <p class="mt-2 font-medium text-gray-800 dark:text-neutral-200">-->
<!--                No closed projects-->
<!--              </p>-->
<!--              <p class="mb-5 text-sm text-gray-500 dark:text-neutral-500">-->

<!--              </p>-->
<!--            </div>-->
<!--            <button type="button"-->
<!--                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500"-->
<!--                    data-hs-overlay="#hs-pro-dasadpm">-->
<!--              <svg class="hidden sm:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
<!--                   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
<!--                   stroke-linejoin="round">-->
<!--                <path d="M5 12h14"/>-->
<!--                <path d="M12 5v14"/>-->
<!--              </svg>-->
<!--              Add project-->
<!--            </button>-->
<!--          </div>-->
<!--          &lt;!&ndash; End Empty State &ndash;&gt;-->
<!--        </div>-->
<!--        &lt;!&ndash; End Projects Card &ndash;&gt;-->

<!--        &lt;!&ndash; Events Card &ndash;&gt;-->
<!--        <div-->
<!--            class="flex flex-col bg-white border border-gray-200 rounded-xl shadow-sm xl:shadow-none dark:bg-neutral-800 dark:border-neutral-700">-->

<!--          &lt;!&ndash; Empty State &ndash;&gt;-->
<!--          <div class="p-5 min-h-[328px]  flex flex-col justify-center items-center text-center">-->
<!--            <svg class="w-48 mx-auto mb-4" width="178" height="90" viewBox="0 0 178 90" fill="none"-->
<!--                 xmlns="http://www.w3.org/2000/svg">-->
<!--              <rect x="27" y="50.5" width="124" height="39" rx="7.5" fill="currentColor"-->
<!--                    class="fill-white dark:fill-neutral-800"/>-->
<!--              <rect x="27" y="50.5" width="124" height="39" rx="7.5" stroke="currentColor"-->
<!--                    class="stroke-gray-50 dark:stroke-neutral-700/10"/>-->
<!--              <rect x="34.5" y="58" width="24" height="24" rx="4" fill="currentColor"-->
<!--                    class="fill-gray-50 dark:fill-neutral-700/30"/>-->
<!--              <rect x="66.5" y="61" width="60" height="6" rx="3" fill="currentColor"-->
<!--                    class="fill-gray-50 dark:fill-neutral-700/30"/>-->
<!--              <rect x="66.5" y="73" width="77" height="6" rx="3" fill="currentColor"-->
<!--                    class="fill-gray-50 dark:fill-neutral-700/30"/>-->
<!--              <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" fill="currentColor"-->
<!--                    class="fill-white dark:fill-neutral-800"/>-->
<!--              <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" stroke="currentColor"-->
<!--                    class="stroke-gray-100 dark:stroke-neutral-700/30"/>-->
<!--              <rect x="27" y="36" width="24" height="24" rx="4" fill="currentColor"-->
<!--                    class="fill-gray-100 dark:fill-neutral-700/70"/>-->
<!--              <rect x="59" y="39" width="60" height="6" rx="3" fill="currentColor"-->
<!--                    class="fill-gray-100 dark:fill-neutral-700/70"/>-->
<!--              <rect x="59" y="51" width="92" height="6" rx="3" fill="currentColor"-->
<!--                    class="fill-gray-100 dark:fill-neutral-700/70"/>-->
<!--              <g filter="url(#filter2)">-->
<!--                <rect x="12" y="6" width="154" height="40" rx="8" fill="currentColor"-->
<!--                      class="fill-white dark:fill-neutral-800" shape-rendering="crispEdges"/>-->
<!--                <rect x="12.5" y="6.5" width="153" height="39" rx="7.5" stroke="currentColor"-->
<!--                      class="stroke-gray-100 dark:stroke-neutral-700/60" shape-rendering="crispEdges"/>-->
<!--                <rect x="20" y="14" width="24" height="24" rx="4" fill="currentColor"-->
<!--                      class="fill-gray-200 dark:fill-neutral-700 "/>-->
<!--                <rect x="52" y="17" width="60" height="6" rx="3" fill="currentColor"-->
<!--                      class="fill-gray-200 dark:fill-neutral-700"/>-->
<!--                <rect x="52" y="29" width="106" height="6" rx="3" fill="currentColor"-->
<!--                      class="fill-gray-200 dark:fill-neutral-700"/>-->
<!--              </g>-->
<!--              <defs>-->
<!--                <filter id="filter2" x="0" y="0" width="178" height="64" filterUnits="userSpaceOnUse"-->
<!--                        color-interpolation-filters="sRGB">-->
<!--                  <feFlood flood-opacity="0" result="BackgroundImageFix"/>-->
<!--                  <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"-->
<!--                                 result="hardAlpha"/>-->
<!--                  <feOffset dy="6"/>-->
<!--                  <feGaussianBlur stdDeviation="6"/>-->
<!--                  <feComposite in2="hardAlpha" operator="out"/>-->
<!--                  <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"/>-->
<!--                  <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1187_14810"/>-->
<!--                  <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1187_14810" result="shape"/>-->
<!--                </filter>-->
<!--              </defs>-->
<!--            </svg>-->

<!--            <div class="max-w-sm mx-auto">-->
<!--              <p class="mt-2 font-medium text-gray-800 dark:text-neutral-200">-->
<!--                No closed projects-->
<!--              </p>-->
<!--              <p class="mb-5 text-sm text-gray-500 dark:text-neutral-500">-->

<!--              </p>-->
<!--            </div>-->
<!--            <button type="button"-->
<!--                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500"-->
<!--                    data-hs-overlay="#hs-pro-daem">-->
<!--              <svg class="hidden sm:block shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"-->
<!--                   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"-->
<!--                   stroke-linejoin="round">-->
<!--                <path d="M5 12h14"/>-->
<!--                <path d="M12 5v14"/>-->
<!--              </svg>-->
<!--              Add event-->
<!--            </button>-->
<!--          </div>-->
<!--          &lt;!&ndash; End Empty State &ndash;&gt;-->
<!--        </div>-->
<!--        &lt;!&ndash; End Events Card &ndash;&gt;-->
<!--      </div>-->
      <!-- End Content -->
    </div>
    <!-- End Grid -->
  </div>
</template>
<script setup>

</script>
