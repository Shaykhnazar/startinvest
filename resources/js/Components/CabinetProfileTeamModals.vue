<script setup>

</script>

<template>

  <!-- Add Team Account Modal -->
  <div id="hs-pro-dasadam" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--close-when-click-inside:true] pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-pro-dasadam-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
      <div class="w-full max-h-full overflow-hidden flex flex-col bg-white rounded-xl pointer-events-auto shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-800">
        <!-- Header -->
        <div class="py-2.5 px-4 flex justify-between items-center border-b dark:border-neutral-700">
          <h3 id="hs-pro-dasadam-label" class="font-medium text-gray-800 dark:text-neutral-200">
            Add team account
          </h3>
          <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-pro-dasadam">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
          <div class="p-4 space-y-5">
            <div class="space-y-2">
              <label for="hs-pro-dasadamtn" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Team name
              </label>

              <input id="hs-pro-dasadamtn" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm text-gray-800 focus:z-10 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600" placeholder="Preline">
            </div>

            <div class="space-y-2">
              <label for="hs-pro-dasadamtn" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Subscription plan
              </label>

              <!-- Select -->
              <div class="relative">
                <select data-hs-select='{
                    "placeholder": "Select a plan",
                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm text-gray-500 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-500",
                    "dropdownClasses": "mt-2 z-50 w-full min-w-36 max-h-72 p-1 space-y-0.5 overflow-hidden overflow-y-auto bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:bg-neutral-900",
                    "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200",
                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 dark:text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
                  }' class="hidden">
                  <option value="">Choose</option>
                  <option>Pro (Monthly - $59 / user / month)</option>
                  <option>Free - (Free forever)</option>
                </select>

                <div class="absolute top-1/2 end-2.5 -translate-y-1/2">
                  <svg class="shrink-0 w-[17px] h-[17px] text-neutral-500" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.35355 4.06066C8.15829 3.8654 7.84171 3.8654 7.64645 4.06066L5.35355 6.35355C5.15829 6.54882 4.84171 6.54882 4.64645 6.35355C4.45118 6.15829 4.45118 5.84171 4.64645 5.64645L6.93934 3.35356C7.52513 2.76777 8.47487 2.76777 9.06066 3.35355L11.3536 5.64645C11.5488 5.84171 11.5488 6.15829 11.3536 6.35355C11.1583 6.54882 10.8417 6.54882 10.6464 6.35355L8.35355 4.06066Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.35355 11.9393C8.15829 12.1346 7.84171 12.1346 7.64645 11.9393L5.35355 9.64645C5.15829 9.45119 4.84171 9.45119 4.64645 9.64645C4.45118 9.84171 4.45118 10.1583 4.64645 10.3536L6.93934 12.6464C7.52513 13.2322 8.47487 13.2322 9.06066 12.6464L11.3536 10.3536C11.5488 10.1583 11.5488 9.84171 11.3536 9.64645C11.1583 9.45119 10.8417 9.45119 10.6464 9.64645L8.35355 11.9393Z" />
                  </svg>
                </div>
              </div>
              <!-- End Select -->
            </div>
          </div>
        </div>
        <!-- End Body -->

        <!-- Footer -->
        <div class="p-4 flex justify-between gap-x-2">
          <div class="w-full hidden">
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-red-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dlcam">
              Delete card
            </button>
          </div>

          <div class="flex-1 flex flex-wrap justify-end items-center gap-2">
            <button type="button" class="py-2 px-3 inline-flex justify-center items-center text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dasadam">
              Cancel
            </button>

            <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500" data-hs-overlay="#hs-pro-dasadam">
              Create team
            </button>
          </div>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </div>
  <!-- End Add Team Account Modal -->

  <!-- Add Team Modal -->
  <div id="hs-pro-datm" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--close-when-click-inside:true] pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-pro-datm-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-xl sm:w-full mx-3 mb-7 h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] sm:mx-auto">
      <div class="w-full max-h-full flex flex-col bg-white rounded-xl pointer-events-auto shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-800">
        <!-- Header -->
        <div class="py-2.5 px-4 flex justify-between items-center border-b dark:border-neutral-700">
          <h3 id="hs-pro-datm-label" class="font-medium text-gray-800 dark:text-neutral-200">
            Create team
          </h3>
          <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-pro-datm">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
          <div class="p-4 space-y-5">
            <div class="space-y-2">
              <label for="hs-pro-dactmt" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Title
              </label>

              <input id="hs-pro-dactmt" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Team title" value=" ">
            </div>

            <div class="space-y-2">
              <label for="dactmi" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Industry
              </label>

              <input id="dactmi" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter name">
            </div>

            <div class="space-y-2">
              <label for="dactmd" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Description
              </label>

              <textarea id="dactmd" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" rows="3" placeholder="Tell us a little bit about team"></textarea>
            </div>

            <div class="space-y-2">
              <label for="dactmm" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Members
              </label>

              <!-- Input Form -->
              <div class="flex items-center gap-x-3">
                <input id="dactmm" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter name">

                <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                  </svg>
                  Add
                </button>
              </div>
              <!-- End Input Form -->
            </div>

            <div class="space-y-2">
              <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Suggested members
              </label>

              <div class="flex items-center space-x-2">
                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach1" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-dactcach1" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    James Collins
                  </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach2" class="relative block rounded-full cursor-pointer">
                    <span class="hs-tooltip-toggle flex shrink-0 justify-center items-center size-[46px] bg-white border border-gray-200 text-gray-700 font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">L</span><span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-dactcach2" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    Lori Hunter
                  </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach3" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-dactcach3" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    Lewis Clarke
                  </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach4" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-dactcach4" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    Ella Lauda
                  </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-dactcach5" class="relative block rounded-full cursor-pointer">
                    <span class="hs-tooltip-toggle flex shrink-0 justify-center items-center size-[46px] bg-white border border-gray-200 text-gray-700 font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">O</span><span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-dactcach5" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    Ols Schols
                  </span>
                </div>
                <!-- End User -->
              </div>
            </div>

            <!-- Drag 'n Drop -->
            <div class="space-y-2">
              <label class="block block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Cover
              </label>
              <div class="p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600">
                <div class="text-center">
                  <svg class="w-16 text-gray-400 mx-auto dark:text-neutral-400" width="70" height="46" viewBox="0 0 70 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.05172 9.36853L17.2131 7.5083V41.3608L12.3018 42.3947C9.01306 43.0871 5.79705 40.9434 5.17081 37.6414L1.14319 16.4049C0.515988 13.0978 2.73148 9.92191 6.05172 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500" />
                    <path d="M63.9483 9.36853L52.7869 7.5083V41.3608L57.6982 42.3947C60.9869 43.0871 64.203 40.9434 64.8292 37.6414L68.8568 16.4049C69.484 13.0978 67.2685 9.92191 63.9483 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500" />
                    <rect x="17.0656" y="1.62305" width="35.8689" height="42.7541" rx="5" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500" />
                    <path d="M47.9344 44.3772H22.0655C19.3041 44.3772 17.0656 42.1386 17.0656 39.3772L17.0656 35.9161L29.4724 22.7682L38.9825 33.7121C39.7832 34.6335 41.2154 34.629 42.0102 33.7025L47.2456 27.5996L52.9344 33.7209V39.3772C52.9344 42.1386 50.6958 44.3772 47.9344 44.3772Z" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500" />
                    <circle cx="39.5902" cy="14.9672" r="4.16393" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500" />
                  </svg>

                  <div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
                    <span class="pe-1 font-medium text-gray-800 dark:text-neutral-200">
                      Drop your files here or
                    </span>
                    <label for="hs-pro-dactc" class="relative cursor-pointer bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-neutral-800 dark:text-blue-500 dark:hover:text-blue-600">
                      <span>browse</span>
                      <input id="hs-pro-dactc" type="file" class="sr-only">
                    </label>
                  </div>

                  <p class="mt-1 text-xs text-gray-400 dark:text-neutral-400">
                    CSV, XLS, DOCX
                  </p>
                </div>
              </div>
            </div>
            <!-- End Drag 'n Drop -->
          </div>
        </div>
        <!-- End Body -->

        <!-- Footer -->
        <div class="p-4 flex justify-between gap-x-2">
          <div class="flex-1 flex flex-wrap justify-end items-center gap-2">
            <button type="button" class="py-2 px-3 inline-flex justify-center items-center text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-datm">
              Cancel
            </button>

            <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500" data-hs-overlay="#hs-pro-datm">
              Create team
            </button>
          </div>
        </div>
        <!-- Footer -->
      </div>
    </div>
  </div>
  <!-- End Add Team Modal -->

  <!-- Add Team Modal -->
  <div id="hs-pro-detm" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--close-when-click-inside:true] pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-pro-detm-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-xl sm:w-full mx-3 mb-7 h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] sm:mx-auto">
      <div class="w-full max-h-full flex flex-col bg-white rounded-xl pointer-events-auto shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-800">
        <!-- Header -->
        <div class="py-2.5 px-4 flex justify-between items-center border-b dark:border-neutral-700">
          <h3 id="hs-pro-detm-label" class="font-medium text-gray-800 dark:text-neutral-200">
            Edit team
          </h3>
          <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-pro-detm">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
          <div class="p-4 space-y-5">
            <div class="space-y-2">
              <label for="hs-pro-daetmt" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Title
              </label>

              <input id="hs-pro-daetmt" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Team title" value="conference ">
            </div>

            <div class="space-y-2">
              <label for="daetmi" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Industry
              </label>

              <input id="daetmi" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter name">
            </div>

            <div class="space-y-2">
              <label for="daetmd" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Description
              </label>

              <textarea id="daetmd" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" rows="3" placeholder="Tell us a little bit about team">Online meeting services group</textarea>
            </div>

            <div class="space-y-2">
              <label for="daetmm" class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Members
              </label>

              <!-- Input Form -->
              <div class="flex items-center gap-x-3">
                <input id="daetmm" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter name">

                <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                  </svg>
                  Add
                </button>
              </div>
              <!-- End Input Form -->
            </div>

            <div class="space-y-2">
              <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Suggested members
              </label>

              <div class="flex items-center space-x-2">
                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach1" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-daetcach1" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none" checked>
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    James Collins
                  </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach2" class="relative block rounded-full cursor-pointer">
                    <span class="hs-tooltip-toggle flex shrink-0 justify-center items-center size-[46px] bg-white border border-gray-200 text-gray-700 font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">L</span><span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-daetcach2" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    Lori Hunter
                  </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach3" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-daetcach3" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    Lewis Clarke
                  </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach4" class="relative block rounded-full cursor-pointer">
                    <img class="hs-tooltip-toggle shrink-0 size-[46px] rounded-full" src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    <span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-daetcach4" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none">
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    Ella Lauda
                  </span>
                </div>
                <!-- End User -->

                <!-- User -->
                <div class="hs-tooltip inline-block">
                  <label for="hs-pro-daetcach5" class="relative block rounded-full cursor-pointer">
                    <span class="hs-tooltip-toggle flex shrink-0 justify-center items-center size-[46px] bg-white border border-gray-200 text-gray-700 font-medium uppercase rounded-full dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300">O</span><span class="block absolute -top-1 -end-1 bg-white rounded-full dark:bg-neutral-800">
                      <span class="relative flex flex-col justify-center items-center size-5 bg-blue-100 border-2 border-white text-blue-600 rounded-full dark:bg-blue-500/40 dark:border-neutral-800 dark:text-blue-300">
                        <input type="checkbox" id="hs-pro-daetcach5" class="absolute top-0 start-0 size-full bg-transparent border-transparent rounded-full focus:outline-none" checked>
                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                      </span>
                    </span>
                  </label>
                  <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg dark:bg-neutral-700" role="tooltip">
                    Ols Schols
                  </span>
                </div>
                <!-- End User -->
              </div>
            </div>

            <!-- Drag 'n Drop -->
            <div class="space-y-2">
              <label class="block block mb-2 text-sm font-medium text-gray-800 dark:text-neutral-200">
                Cover
              </label>
              <div class="p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl dark:bg-neutral-800 dark:border-neutral-600">
                <div class="text-center">
                  <svg class="w-16 text-gray-400 mx-auto dark:text-neutral-400" width="70" height="46" viewBox="0 0 70 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.05172 9.36853L17.2131 7.5083V41.3608L12.3018 42.3947C9.01306 43.0871 5.79705 40.9434 5.17081 37.6414L1.14319 16.4049C0.515988 13.0978 2.73148 9.92191 6.05172 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500" />
                    <path d="M63.9483 9.36853L52.7869 7.5083V41.3608L57.6982 42.3947C60.9869 43.0871 64.203 40.9434 64.8292 37.6414L68.8568 16.4049C69.484 13.0978 67.2685 9.92191 63.9483 9.36853Z" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500" />
                    <rect x="17.0656" y="1.62305" width="35.8689" height="42.7541" rx="5" fill="currentColor" stroke="currentColor" stroke-width="2" class="fill-white stroke-gray-400 dark:fill-neutral-800 dark:stroke-neutral-500" />
                    <path d="M47.9344 44.3772H22.0655C19.3041 44.3772 17.0656 42.1386 17.0656 39.3772L17.0656 35.9161L29.4724 22.7682L38.9825 33.7121C39.7832 34.6335 41.2154 34.629 42.0102 33.7025L47.2456 27.5996L52.9344 33.7209V39.3772C52.9344 42.1386 50.6958 44.3772 47.9344 44.3772Z" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500" />
                    <circle cx="39.5902" cy="14.9672" r="4.16393" stroke="currentColor" stroke-width="2" class="stroke-gray-400 dark:stroke-neutral-500" />
                  </svg>

                  <div class="mt-4 flex flex-wrap justify-center text-sm leading-6 text-gray-600">
                    <span class="pe-1 font-medium text-gray-800 dark:text-neutral-200">
                      Drop your files here or
                    </span>
                    <label for="hs-pro-daetc" class="relative cursor-pointer bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 dark:bg-neutral-800 dark:text-blue-500 dark:hover:text-blue-600">
                      <span>browse</span>
                      <input id="hs-pro-daetc" type="file" class="sr-only">
                    </label>
                  </div>

                  <p class="mt-1 text-xs text-gray-400 dark:text-neutral-400">
                    CSV, XLS, DOCX
                  </p>
                </div>
              </div>
            </div>
            <!-- End Drag 'n Drop -->
          </div>
        </div>
        <!-- End Body -->

        <!-- Footer -->
        <div class="p-4 flex justify-between gap-x-2">
          <div class="flex-1 flex flex-wrap justify-end items-center gap-2">
            <button type="button" class="py-2 px-3 inline-flex justify-center items-center text-start bg-white border border-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-detm">
              Cancel
            </button>

            <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500" data-hs-overlay="#hs-pro-detm">
              Save changes
            </button>
          </div>
        </div>
        <!-- Footer -->
      </div>
    </div>
  </div>
  <!-- End Add Team Modal -->

  <!-- Delete Team Alert Modal -->
  <div id="hs-pro-dtlam" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--close-when-click-inside:true] pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-pro-dtlam-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-md sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
      <div class="relative w-full max-h-full overflow-hidden flex flex-col bg-white rounded-xl pointer-events-auto shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] dark:shadow-[0_10px_40px_10px_rgba(0,0,0,0.2)] dark:bg-neutral-800">
        <!-- Close Button -->
        <div class="absolute top-2 end-4 z-10">
          <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-pro-dtlam">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18" />
              <path d="m6 6 12 12" />
            </svg>
          </button>
        </div>
        <!-- End Close Button -->

        <!-- Body -->
        <div class="p-4">
          <h3 id="hs-pro-dtlam-label" class="text-lg font-medium text-gray-800 dark:text-neutral-200">
            Are you sure?
          </h3>
          <p class="mt-1 text-gray-500 dark:text-neutral-500">
            Are you sure you want to delete this team?
          </p>

          <!-- Button Group -->
          <div class="mt-4 flex justify-end gap-x-3">
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dtlam">
              Cancel
            </button>
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
              Yes, I’m sure
            </button>
          </div>
          <!-- End Button Group -->
        </div>
        <!-- End Body -->
      </div>
    </div>
  </div>
  <!-- End Delete Team Alert Modal -->

</template>

<style scoped>

</style>
