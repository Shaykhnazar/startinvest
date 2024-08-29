<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { useUserStore } from '@/stores/UserStore.js'
import { ref } from 'vue';

defineProps({
  mustVerifyEmail: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});
const user = ref(useUserStore().authUser)

const form = useForm({
  name: user.value.name,
  email: user.value.email,
});
</script>

<template>
    <div class="py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700">
      <h2 class="font-semibold text-gray-800 dark:text-neutral-200">
        Shaxsiy ma'lumotlar
      </h2>
      <form @submit.prevent="form.patch(route('dashboard.profile.update', user?.id))" class="mt-6 space-y-6">

      <!-- Grid -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
          <label for="hs-pro-dappinm" class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
            Ism
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-8 xl:col-span-4">
          <input id="hs-pro-dappinm" type="text" v-model="form.name" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter full name">

          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
            To`liq ismingizni yoki o`zingiz uchun qulay bo`lgan ismni kiriting.
          </p>
        </div>

        <InputError class="mt-2" :message="form.errors.name" />
        <!-- End Col -->
      </div>
      <!-- End Grid -->

      <!-- Grid -->
<!--      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">-->
<!--        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">-->
<!--          <label for="hs-pro-dappiun" class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">-->
<!--            Username-->
<!--          </label>-->
<!--        </div>-->
<!--        &lt;!&ndash; End Col &ndash;&gt;-->
<!--  -->
<!--        <div class="sm:col-span-8 xl:col-span-4">-->
<!--          <input id="hs-pro-dappiun" type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter username">-->
<!--  -->
<!--          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">-->
<!--            Enter your display name on Preline public forums.-->
<!--          </p>-->
<!--        </div>-->
<!--        &lt;!&ndash; End Col &ndash;&gt;-->
<!--      </div>-->
      <!-- End Grid -->

      <!-- Grid -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">
          <label for="hs-pro-dappiem" class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">
            Elektron pochta
          </label>
        </div>
        <!-- End Col -->

        <div class="sm:col-span-8 xl:col-span-4">
          <input id="hs-pro-dappiem" type="text" v-model="form.email" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600" placeholder="Enter email address">

          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
            Tizimga kirish uchun foydalanmoqchi bo'lgan elektron pochta manzilini kiriting.
          </p>
        </div>

        <InputError class="mt-2" :message="form.errors.email" />
        <!-- End Col -->
      </div>
      <!-- End Grid -->

<!--      <div v-if="mustVerifyEmail && user.email_verified_at === null">-->
<!--        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">-->
<!--          Elektron pochta manzilingiz tasdiqlanmagan.-->
<!--          <Link-->
<!--            :href="route('verification.send')"-->
<!--            method="post"-->
<!--            as="button"-->
<!--            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"-->
<!--          >-->
<!--            Tasdiqlash elektron pochtasini qayta yuborish uchun shu yerga bosing.-->
<!--          </Link>-->
<!--        </p>-->

<!--        <div-->
<!--          v-show="status === 'verification-link-sent'"-->
<!--          class="mt-2 font-medium text-sm text-green-600 dark:text-green-400"-->
<!--        >-->
<!--          Yangi tasdiqlash havolasi elektron pochta manzilingizga yuborildi.-->
<!--        </div>-->
<!--      </div>-->

      <!-- Grid -->
      <!--            <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">-->
      <!--              <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2">-->
      <!--                <label class="sm:mt-2.5 inline-block text-sm text-gray-500 dark:text-neutral-500">-->
      <!--                  Location-->
      <!--                </label>-->
      <!--              </div>-->
      <!--              &lt;!&ndash; End Col &ndash;&gt;-->

      <!--              <div class="sm:col-span-8 xl:col-span-4">-->
      <!--                &lt;!&ndash; Select &ndash;&gt;-->
      <!--                <div class="relative">-->
      <!--                  <select data-hs-select='{-->
      <!--                      "placeholder": "Select country",-->
      <!--                      "hasSearch": true,-->
      <!--                      "searchPlaceholder": "Search country",-->
      <!--                      "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 py-2 px-3",-->
      <!--                      "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",-->
      <!--                      "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span data-icon></span><span class=\"text-gray-800 dark:text-neutral-200\" data-title></span></button>",-->
      <!--                      "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 ps-3 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",-->
      <!--                      "dropdownClasses": "max-h-64 p-1 pt-0 space-y-0.5 z-50 w-full overflow-hidden overflow-y-auto bg-white rounded-xl shadow-[0_10px_40px_10px_rgba(0,0,0,0.08)] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900",-->
      <!--                      "optionClasses": "hs-selected:bg-gray-100 dark:hs-selected:bg-neutral-800 py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800",-->
      <!--                      "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200\" data-title></div></div></div>",-->
      <!--                      "viewport": "#hs-pro-dapl"-->
      <!--                    }' class="hidden">-->
      <!--                    <option value="">Choose</option>-->
      <!--                    <option value="AF" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/af.png\" alt=\"Afghanistan\" />"}'>-->
      <!--                      Afghanistan-->
      <!--                    </option>-->
      <!--                    <option value="AX" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ax.png\" alt=\"Aland Islands\" />"}'>-->
      <!--                      Aland Islands-->
      <!--                    </option>-->
      <!--                    <option value="AL" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/al.png\" alt=\"Albania\" />"}'>-->
      <!--                      Albania-->
      <!--                    </option>-->
      <!--                    <option value="DZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/dz.png\" alt=\"Algeria\" />"}'>-->
      <!--                      Algeria-->
      <!--                    </option>-->
      <!--                    <option value="AS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/as.png\" alt=\"American Samoa\" />"}'>-->
      <!--                      American Samoa-->
      <!--                    </option>-->
      <!--                    <option value="AD" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ad.png\" alt=\"Andorra\" />"}'>-->
      <!--                      Andorra-->
      <!--                    </option>-->
      <!--                    <option value="AO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ao.png\" alt=\"Angola\" />"}'>-->
      <!--                      Angola-->
      <!--                    </option>-->
      <!--                    <option value="AI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ai.png\" alt=\"Anguilla\" />"}'>-->
      <!--                      Anguilla-->
      <!--                    </option>-->
      <!--                    <option value="AG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ag.png\" alt=\"Antigua and Barbuda\" />"}'>-->
      <!--                      Antigua and Barbuda-->
      <!--                    </option>-->
      <!--                    <option value="AR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ar.png\" alt=\"Argentina\" />"}'>-->
      <!--                      Argentina-->
      <!--                    </option>-->
      <!--                    <option value="AM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/am.png\" alt=\"Armenia\" />"}'>-->
      <!--                      Armenia-->
      <!--                    </option>-->
      <!--                    <option value="AW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/aw.png\" alt=\"Aruba\" />"}'>-->
      <!--                      Aruba-->
      <!--                    </option>-->
      <!--                    <option value="AU" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/au.png\" alt=\"Australia\" />"}'>-->
      <!--                      Australia-->
      <!--                    </option>-->
      <!--                    <option value="AT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/at.png\" alt=\"Austria\" />"}'>-->
      <!--                      Austria-->
      <!--                    </option>-->
      <!--                    <option value="AZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/az.png\" alt=\"Azerbaijan\" />"}'>-->
      <!--                      Azerbaijan-->
      <!--                    </option>-->
      <!--                    <option value="BS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bs.png\" alt=\"Bahamas\" />"}'>-->
      <!--                      Bahamas-->
      <!--                    </option>-->
      <!--                    <option value="BH" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bh.png\" alt=\"Bahrain\" />"}'>-->
      <!--                      Bahrain-->
      <!--                    </option>-->
      <!--                    <option value="BD" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bd.png\" alt=\"Bangladesh\" />"}'>-->
      <!--                      Bangladesh-->
      <!--                    </option>-->
      <!--                    <option value="BB" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bb.png\" alt=\"Barbados\" />"}'>-->
      <!--                      Barbados-->
      <!--                    </option>-->
      <!--                    <option value="BY" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/by.png\" alt=\"Belarus\" />"}'>-->
      <!--                      Belarus-->
      <!--                    </option>-->
      <!--                    <option value="BE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/be.png\" alt=\"Belgium\" />"}'>-->
      <!--                      Belgium-->
      <!--                    </option>-->
      <!--                    <option value="BZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bz.png\" alt=\"Belize\" />"}'>-->
      <!--                      Belize-->
      <!--                    </option>-->
      <!--                    <option value="BJ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bj.png\" alt=\"Benin\" />"}'>-->
      <!--                      Benin-->
      <!--                    </option>-->
      <!--                    <option value="BM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bm.png\" alt=\"Bermuda\" />"}'>-->
      <!--                      Bermuda-->
      <!--                    </option>-->
      <!--                    <option value="BT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bt.png\" alt=\"Bhutan\" />"}'>-->
      <!--                      Bhutan-->
      <!--                    </option>-->
      <!--                    <option value="BO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bo.png\" alt=\"Bolivia (Plurinational State of)\" />"}'>-->
      <!--                      Bolivia (Plurinational State of)-->
      <!--                    </option>-->
      <!--                    <option value="BQ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bq.png\" alt=\"Bonaire, Sint Eustatius and Saba\" />"}'>-->
      <!--                      Bonaire, Sint Eustatius and Saba-->
      <!--                    </option>-->
      <!--                    <option value="BA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ba.png\" alt=\"Bosnia and Herzegovina\" />"}'>-->
      <!--                      Bosnia and Herzegovina-->
      <!--                    </option>-->
      <!--                    <option value="BW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bw.png\" alt=\"Botswana\" />"}'>-->
      <!--                      Botswana-->
      <!--                    </option>-->
      <!--                    <option value="BR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/br.png\" alt=\"Brazil\" />"}'>-->
      <!--                      Brazil-->
      <!--                    </option>-->
      <!--                    <option value="IO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/io.png\" alt=\"British Indian Ocean Territory\" />"}'>-->
      <!--                      British Indian Ocean Territory-->
      <!--                    </option>-->
      <!--                    <option value="BN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bn.png\" alt=\"Brunei Darussalam\" />"}'>-->
      <!--                      Brunei Darussalam-->
      <!--                    </option>-->
      <!--                    <option value="BG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bg.png\" alt=\"Bulgaria\" />"}'>-->
      <!--                      Bulgaria-->
      <!--                    </option>-->
      <!--                    <option value="BF" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bf.png\" alt=\"Burkina Faso\" />"}'>-->
      <!--                      Burkina Faso-->
      <!--                    </option>-->
      <!--                    <option value="BI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bi.png\" alt=\"Burundi\" />"}'>-->
      <!--                      Burundi-->
      <!--                    </option>-->
      <!--                    <option value="CV" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cv.png\" alt=\"Cabo Verde\" />"}'>-->
      <!--                      Cabo Verde-->
      <!--                    </option>-->
      <!--                    <option value="KH" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kh.png\" alt=\"Cambodia\" />"}'>-->
      <!--                      Cambodia-->
      <!--                    </option>-->
      <!--                    <option value="CM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cm.png\" alt=\"Cameroon\" />"}'>-->
      <!--                      Cameroon-->
      <!--                    </option>-->
      <!--                    <option value="CA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ca.png\" alt=\"Canada\" />"}'>-->
      <!--                      Canada-->
      <!--                    </option>-->
      <!--                    <option value="KY" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ky.png\" alt=\"Cayman Islands\" />"}'>-->
      <!--                      Cayman Islands-->
      <!--                    </option>-->
      <!--                    <option value="CF" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cf.png\" alt=\"Central African Republic\" />"}'>-->
      <!--                      Central African Republic-->
      <!--                    </option>-->
      <!--                    <option value="TD" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/td.png\" alt=\"Chad\" />"}'>-->
      <!--                      Chad-->
      <!--                    </option>-->
      <!--                    <option value="CL" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cl.png\" alt=\"Chile\" />"}'>-->
      <!--                      Chile-->
      <!--                    </option>-->
      <!--                    <option value="CN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cn.png\" alt=\"China\" />"}'>-->
      <!--                      China-->
      <!--                    </option>-->
      <!--                    <option value="CX" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cx.png\" alt=\"Christmas Island\" />"}'>-->
      <!--                      Christmas Island-->
      <!--                    </option>-->
      <!--                    <option value="CC" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cc.png\" alt=\"Cocos (Keeling) Islands\" />"}'>-->
      <!--                      Cocos (Keeling) Islands-->
      <!--                    </option>-->
      <!--                    <option value="CO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/co.png\" alt=\"Colombia\" />"}'>-->
      <!--                      Colombia-->
      <!--                    </option>-->
      <!--                    <option value="KM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/km.png\" alt=\"Comoros\" />"}'>-->
      <!--                      Comoros-->
      <!--                    </option>-->
      <!--                    <option value="CK" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ck.png\" alt=\"Cook Islands\" />"}'>-->
      <!--                      Cook Islands-->
      <!--                    </option>-->
      <!--                    <option value="CR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cr.png\" alt=\"Costa Rica\" />"}'>-->
      <!--                      Costa Rica-->
      <!--                    </option>-->
      <!--                    <option value="HR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/hr.png\" alt=\"Croatia\" />"}'>-->
      <!--                      Croatia-->
      <!--                    </option>-->
      <!--                    <option value="CU" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cu.png\" alt=\"Cuba\" />"}'>-->
      <!--                      Cuba-->
      <!--                    </option>-->
      <!--                    <option value="CW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cw.png\" alt=\"Curaçao\" />"}'>-->
      <!--                      Curaçao-->
      <!--                    </option>-->
      <!--                    <option value="CY" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cy.png\" alt=\"Cyprus\" />"}'>-->
      <!--                      Cyprus-->
      <!--                    </option>-->
      <!--                    <option value="CZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cz.png\" alt=\"Czech Republic\" />"}'>-->
      <!--                      Czech Republic-->
      <!--                    </option>-->
      <!--                    <option value="CI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ci.png\" alt=Côte dIvoire\" />"}'>-->
      <!--                      Côte dIvoire-->
      <!--                    </option>-->
      <!--                    <option value="CD" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cd.png\" alt=\"Democratic Republic of the Congo\" />"}'>-->
      <!--                      Democratic Republic of the Congo-->
      <!--                    </option>-->
      <!--                    <option value="DK" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/dk.png\" alt=\"Denmark\" />"}'>-->
      <!--                      Denmark-->
      <!--                    </option>-->
      <!--                    <option value="DJ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/dj.png\" alt=\"Djibouti\" />"}'>-->
      <!--                      Djibouti-->
      <!--                    </option>-->
      <!--                    <option value="DM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/dm.png\" alt=\"Dominica\" />"}'>-->
      <!--                      Dominica-->
      <!--                    </option>-->
      <!--                    <option value="DO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/do.png\" alt=\"Dominican Republic\" />"}'>-->
      <!--                      Dominican Republic-->
      <!--                    </option>-->
      <!--                    <option value="EC" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ec.png\" alt=\"Ecuador\" />"}'>-->
      <!--                      Ecuador-->
      <!--                    </option>-->
      <!--                    <option value="EG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/eg.png\" alt=\"Egypt\" />"}'>-->
      <!--                      Egypt-->
      <!--                    </option>-->
      <!--                    <option value="SV" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sv.png\" alt=\"El Salvador\" />"}'>-->
      <!--                      El Salvador-->
      <!--                    </option>-->
      <!--                    <option value="GB-ENG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gb.png\" alt=\"England\" />"}'>-->
      <!--                      England-->
      <!--                    </option>-->
      <!--                    <option value="GQ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gq.png\" alt=\"Equatorial Guinea\" />"}'>-->
      <!--                      Equatorial Guinea-->
      <!--                    </option>-->
      <!--                    <option value="ER" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/er.png\" alt=\"Eritrea\" />"}'>-->
      <!--                      Eritrea-->
      <!--                    </option>-->
      <!--                    <option value="EE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ee.png\" alt=\"Estonia\" />"}'>-->
      <!--                      Estonia-->
      <!--                    </option>-->
      <!--                    <option value="ET" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/et.png\" alt=\"Ethiopia\" />"}'>-->
      <!--                      Ethiopia-->
      <!--                    </option>-->
      <!--                    <option value="FK" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/fk.png\" alt=\"Falkland Islands\" />"}'>-->
      <!--                      Falkland Islands-->
      <!--                    </option>-->
      <!--                    <option value="FO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/fo.png\" alt=\"Faroe Islands\" />"}'>-->
      <!--                      Faroe Islands-->
      <!--                    </option>-->
      <!--                    <option value="FM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/fm.png\" alt=\"Federated States of Micronesia\" />"}'>-->
      <!--                      Federated States of Micronesia-->
      <!--                    </option>-->
      <!--                    <option value="FJ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/fj.png\" alt=\"Fiji\" />"}'>-->
      <!--                      Fiji-->
      <!--                    </option>-->
      <!--                    <option value="FI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/fi.png\" alt=\"Finland\" />"}'>-->
      <!--                      Finland-->
      <!--                    </option>-->
      <!--                    <option value="FR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/fr.png\" alt=\"France\" />"}'>-->
      <!--                      France-->
      <!--                    </option>-->
      <!--                    <option value="GF" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gf.png\" alt=\"French Guiana\" />"}'>-->
      <!--                      French Guiana-->
      <!--                    </option>-->
      <!--                    <option value="PF" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pf.png\" alt=\"French Polynesia\" />"}'>-->
      <!--                      French Polynesia-->
      <!--                    </option>-->
      <!--                    <option value="TF" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tf.png\" alt=\"French Southern Territories\" />"}'>-->
      <!--                      French Southern Territories-->
      <!--                    </option>-->
      <!--                    <option value="GA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ga.png\" alt=\"Gabon\" />"}'>-->
      <!--                      Gabon-->
      <!--                    </option>-->
      <!--                    <option value="GM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gm.png\" alt=\"Gambia\" />"}'>-->
      <!--                      Gambia-->
      <!--                    </option>-->
      <!--                    <option value="GE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ge.png\" alt=\"Georgia\" />"}'>-->
      <!--                      Georgia-->
      <!--                    </option>-->
      <!--                    <option value="DE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/de.png\" alt=\"Germany\" />"}'>-->
      <!--                      Germany-->
      <!--                    </option>-->
      <!--                    <option value="GH" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gh.png\" alt=\"Ghana\" />"}'>-->
      <!--                      Ghana-->
      <!--                    </option>-->
      <!--                    <option value="GI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gi.png\" alt=\"Gibraltar\" />"}'>-->
      <!--                      Gibraltar-->
      <!--                    </option>-->
      <!--                    <option value="GR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gr.png\" alt=\"Greece\" />"}'>-->
      <!--                      Greece-->
      <!--                    </option>-->
      <!--                    <option value="GL" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gl.png\" alt=\"Greenland\" />"}'>-->
      <!--                      Greenland-->
      <!--                    </option>-->
      <!--                    <option value="GD" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gd.png\" alt=\"Grenada\" />"}'>-->
      <!--                      Grenada-->
      <!--                    </option>-->
      <!--                    <option value="GP" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gp.png\" alt=\"Guadeloupe\" />"}'>-->
      <!--                      Guadeloupe-->
      <!--                    </option>-->
      <!--                    <option value="GU" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gu.png\" alt=\"Guam\" />"}'>-->
      <!--                      Guam-->
      <!--                    </option>-->
      <!--                    <option value="GT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gt.png\" alt=\"Guatemala\" />"}'>-->
      <!--                      Guatemala-->
      <!--                    </option>-->
      <!--                    <option value="GG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gg.png\" alt=\"Guernsey\" />"}'>-->
      <!--                      Guernsey-->
      <!--                    </option>-->
      <!--                    <option value="GN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gn.png\" alt=\"Guinea\" />"}'>-->
      <!--                      Guinea-->
      <!--                    </option>-->
      <!--                    <option value="GW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gw.png\" alt=\"Guinea-Bissau\" />"}'>-->
      <!--                      Guinea-Bissau-->
      <!--                    </option>-->
      <!--                    <option value="GY" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gy.png\" alt=\"Guyana\" />"}'>-->
      <!--                      Guyana-->
      <!--                    </option>-->
      <!--                    <option value="HT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ht.png\" alt=\"Haiti\" />"}'>-->
      <!--                      Haiti-->
      <!--                    </option>-->
      <!--                    <option value="VA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/va.png\" alt=\"Holy See\" />"}'>-->
      <!--                      Holy See-->
      <!--                    </option>-->
      <!--                    <option value="HN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/hn.png\" alt=\"Honduras\" />"}'>-->
      <!--                      Honduras-->
      <!--                    </option>-->
      <!--                    <option value="HK" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/hk.png\" alt=\"Hong Kong\" />"}'>-->
      <!--                      Hong Kong-->
      <!--                    </option>-->
      <!--                    <option value="HU" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/hu.png\" alt=\"Hungary\" />"}'>-->
      <!--                      Hungary-->
      <!--                    </option>-->
      <!--                    <option value="IS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/is.png\" alt=\"Iceland\" />"}'>-->
      <!--                      Iceland-->
      <!--                    </option>-->
      <!--                    <option value="IN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/in.png\" alt=\"India\" />"}'>-->
      <!--                      India-->
      <!--                    </option>-->
      <!--                    <option value="ID" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/id.png\" alt=\"Indonesia\" />"}'>-->
      <!--                      Indonesia-->
      <!--                    </option>-->
      <!--                    <option value="IR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ir.png\" alt=\"Iran (Islamic Republic of)\" />"}'>-->
      <!--                      Iran (Islamic Republic of)-->
      <!--                    </option>-->
      <!--                    <option value="IQ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/iq.png\" alt=\"Iraq\" />"}'>-->
      <!--                      Iraq-->
      <!--                    </option>-->
      <!--                    <option value="IE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ie.png\" alt=\"Ireland\" />"}'>-->
      <!--                      Ireland-->
      <!--                    </option>-->
      <!--                    <option value="IM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/im.png\" alt=\"Isle of Man\" />"}'>-->
      <!--                      Isle of Man-->
      <!--                    </option>-->
      <!--                    <option value="IL" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/il.png\" alt=\"Israel\" />"}'>-->
      <!--                      Israel-->
      <!--                    </option>-->
      <!--                    <option value="IT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/it.png\" alt=\"Italy\" />"}'>-->
      <!--                      Italy-->
      <!--                    </option>-->
      <!--                    <option value="JM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/jm.png\" alt=\"Jamaica\" />"}'>-->
      <!--                      Jamaica-->
      <!--                    </option>-->
      <!--                    <option value="JP" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/jp.png\" alt=\"Japan\" />"}'>-->
      <!--                      Japan-->
      <!--                    </option>-->
      <!--                    <option value="JE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/je.png\" alt=\"Jersey\" />"}'>-->
      <!--                      Jersey-->
      <!--                    </option>-->
      <!--                    <option value="JO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/jo.png\" alt=\"Jordan\" />"}'>-->
      <!--                      Jordan-->
      <!--                    </option>-->
      <!--                    <option value="KZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kz.png\" alt=\"Kazakhstan\" />"}'>-->
      <!--                      Kazakhstan-->
      <!--                    </option>-->
      <!--                    <option value="KE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ke.png\" alt=\"Kenya\" />"}'>-->
      <!--                      Kenya-->
      <!--                    </option>-->
      <!--                    <option value="KI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ki.png\" alt=\"Kiribati\" />"}'>-->
      <!--                      Kiribati-->
      <!--                    </option>-->
      <!--                    <option value="KW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kw.png\" alt=\"Kuwait\" />"}'>-->
      <!--                      Kuwait-->
      <!--                    </option>-->
      <!--                    <option value="KG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kg.png\" alt=\"Kyrgyzstan\" />"}'>-->
      <!--                      Kyrgyzstan-->
      <!--                    </option>-->
      <!--                    <option value="LA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/la.png\" alt=\"Laos\" />"}'>-->
      <!--                      Laos-->
      <!--                    </option>-->
      <!--                    <option value="LV" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/lv.png\" alt=\"Latvia\" />"}'>-->
      <!--                      Latvia-->
      <!--                    </option>-->
      <!--                    <option value="LB" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/lb.png\" alt=\"Lebanon\" />"}'>-->
      <!--                      Lebanon-->
      <!--                    </option>-->
      <!--                    <option value="LS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ls.png\" alt=\"Lesotho\" />"}'>-->
      <!--                      Lesotho-->
      <!--                    </option>-->
      <!--                    <option value="LR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/lr.png\" alt=\"Liberia\" />"}'>-->
      <!--                      Liberia-->
      <!--                    </option>-->
      <!--                    <option value="LY" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ly.png\" alt=\"Libya\" />"}'>-->
      <!--                      Libya-->
      <!--                    </option>-->
      <!--                    <option value="LI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/li.png\" alt=\"Liechtenstein\" />"}'>-->
      <!--                      Liechtenstein-->
      <!--                    </option>-->
      <!--                    <option value="LT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/lt.png\" alt=\"Lithuania\" />"}'>-->
      <!--                      Lithuania-->
      <!--                    </option>-->
      <!--                    <option value="LU" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/lu.png\" alt=\"Luxembourg\" />"}'>-->
      <!--                      Luxembourg-->
      <!--                    </option>-->
      <!--                    <option value="MO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mo.png\" alt=\"Macau\" />"}'>-->
      <!--                      Macau-->
      <!--                    </option>-->
      <!--                    <option value="MG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mg.png\" alt=\"Madagascar\" />"}'>-->
      <!--                      Madagascar-->
      <!--                    </option>-->
      <!--                    <option value="MW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mw.png\" alt=\"Malawi\" />"}'>-->
      <!--                      Malawi-->
      <!--                    </option>-->
      <!--                    <option value="MY" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/my.png\" alt=\"Malaysia\" />"}'>-->
      <!--                      Malaysia-->
      <!--                    </option>-->
      <!--                    <option value="MV" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mv.png\" alt=\"Maldives\" />"}'>-->
      <!--                      Maldives-->
      <!--                    </option>-->
      <!--                    <option value="ML" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ml.png\" alt=\"Mali\" />"}'>-->
      <!--                      Mali-->
      <!--                    </option>-->
      <!--                    <option value="MT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mt.png\" alt=\"Malta\" />"}'>-->
      <!--                      Malta-->
      <!--                    </option>-->
      <!--                    <option value="MH" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mh.png\" alt=\"Marshall Islands\" />"}'>-->
      <!--                      Marshall Islands-->
      <!--                    </option>-->
      <!--                    <option value="MQ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mq.png\" alt=\"Martinique\" />"}'>-->
      <!--                      Martinique-->
      <!--                    </option>-->
      <!--                    <option value="MR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mr.png\" alt=\"Mauritania\" />"}'>-->
      <!--                      Mauritania-->
      <!--                    </option>-->
      <!--                    <option value="MU" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mu.png\" alt=\"Mauritius\" />"}'>-->
      <!--                      Mauritius-->
      <!--                    </option>-->
      <!--                    <option value="YT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/yt.png\" alt=\"Mayotte\" />"}'>-->
      <!--                      Mayotte-->
      <!--                    </option>-->
      <!--                    <option value="MX" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mx.png\" alt=\"Mexico\" />"}'>-->
      <!--                      Mexico-->
      <!--                    </option>-->
      <!--                    <option value="MD" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/md.png\" alt=\"Moldova\" />"}'>-->
      <!--                      Moldova-->
      <!--                    </option>-->
      <!--                    <option value="MC" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mc.png\" alt=\"Monaco\" />"}'>-->
      <!--                      Monaco-->
      <!--                    </option>-->
      <!--                    <option value="MN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mn.png\" alt=\"Mongolia\" />"}'>-->
      <!--                      Mongolia-->
      <!--                    </option>-->
      <!--                    <option value="ME" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/me.png\" alt=\"Montenegro\" />"}'>-->
      <!--                      Montenegro-->
      <!--                    </option>-->
      <!--                    <option value="MS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ms.png\" alt=\"Montserrat\" />"}'>-->
      <!--                      Montserrat-->
      <!--                    </option>-->
      <!--                    <option value="MA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ma.png\" alt=\"Morocco\" />"}'>-->
      <!--                      Morocco-->
      <!--                    </option>-->
      <!--                    <option value="MZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mz.png\" alt=\"Mozambique\" />"}'>-->
      <!--                      Mozambique-->
      <!--                    </option>-->
      <!--                    <option value="MM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mm.png\" alt=\"Myanmar\" />"}'>-->
      <!--                      Myanmar-->
      <!--                    </option>-->
      <!--                    <option value="NA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/na.png\" alt=\"Namibia\" />"}'>-->
      <!--                      Namibia-->
      <!--                    </option>-->
      <!--                    <option value="NR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/nr.png\" alt=\"Nauru\" />"}'>-->
      <!--                      Nauru-->
      <!--                    </option>-->
      <!--                    <option value="NP" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/np.png\" alt=\"Nepal\" />"}'>-->
      <!--                      Nepal-->
      <!--                    </option>-->
      <!--                    <option value="NL" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/nl.png\" alt=\"Netherlands\" />"}'>-->
      <!--                      Netherlands-->
      <!--                    </option>-->
      <!--                    <option value="NC" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/nc.png\" alt=\"New Caledonia\" />"}'>-->
      <!--                      New Caledonia-->
      <!--                    </option>-->
      <!--                    <option value="NZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/nz.png\" alt=\"New Zealand\" />"}'>-->
      <!--                      New Zealand-->
      <!--                    </option>-->
      <!--                    <option value="NI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ni.png\" alt=\"Nicaragua\" />"}'>-->
      <!--                      Nicaragua-->
      <!--                    </option>-->
      <!--                    <option value="NE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ne.png\" alt=\"Niger\" />"}'>-->
      <!--                      Niger-->
      <!--                    </option>-->
      <!--                    <option value="NG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ng.png\" alt=\"Nigeria\" />"}'>-->
      <!--                      Nigeria-->
      <!--                    </option>-->
      <!--                    <option value="NU" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/nu.png\" alt=\"Niue\" />"}'>-->
      <!--                      Niue-->
      <!--                    </option>-->
      <!--                    <option value="NF" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/nf.png\" alt=\"Norfolk Island\" />"}'>-->
      <!--                      Norfolk Island-->
      <!--                    </option>-->
      <!--                    <option value="KP" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kp.png\" alt=\"North Korea\" />"}'>-->
      <!--                      North Korea-->
      <!--                    </option>-->
      <!--                    <option value="MK" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mk.png\" alt=\"North Macedonia\" />"}'>-->
      <!--                      North Macedonia-->
      <!--                    </option>-->
      <!--                    <option value="GB-NIR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gb.png\" alt=\"Northern Ireland\" />"}'>-->
      <!--                      Northern Ireland-->
      <!--                    </option>-->
      <!--                    <option value="MP" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mp.png\" alt=\"Northern Mariana Islands\" />"}'>-->
      <!--                      Northern Mariana Islands-->
      <!--                    </option>-->
      <!--                    <option value="NO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/no.png\" alt=\"Norway\" />"}'>-->
      <!--                      Norway-->
      <!--                    </option>-->
      <!--                    <option value="OM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/om.png\" alt=\"Oman\" />"}'>-->
      <!--                      Oman-->
      <!--                    </option>-->
      <!--                    <option value="PK" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pk.png\" alt=\"Pakistan\" />"}'>-->
      <!--                      Pakistan-->
      <!--                    </option>-->
      <!--                    <option value="PW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pw.png\" alt=\"Palau\" />"}'>-->
      <!--                      Palau-->
      <!--                    </option>-->
      <!--                    <option value="PA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pa.png\" alt=\"Panama\" />"}'>-->
      <!--                      Panama-->
      <!--                    </option>-->
      <!--                    <option value="PG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pg.png\" alt=\"Papua New Guinea\" />"}'>-->
      <!--                      Papua New Guinea-->
      <!--                    </option>-->
      <!--                    <option value="PY" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/py.png\" alt=\"Paraguay\" />"}'>-->
      <!--                      Paraguay-->
      <!--                    </option>-->
      <!--                    <option value="PE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pe.png\" alt=\"Peru\" />"}'>-->
      <!--                      Peru-->
      <!--                    </option>-->
      <!--                    <option value="PH" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ph.png\" alt=\"Philippines\" />"}'>-->
      <!--                      Philippines-->
      <!--                    </option>-->
      <!--                    <option value="PN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pn.png\" alt=\"Pitcairn\" />"}'>-->
      <!--                      Pitcairn-->
      <!--                    </option>-->
      <!--                    <option value="PL" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pl.png\" alt=\"Poland\" />"}'>-->
      <!--                      Poland-->
      <!--                    </option>-->
      <!--                    <option value="PT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pt.png\" alt=\"Portugal\" />"}'>-->
      <!--                      Portugal-->
      <!--                    </option>-->
      <!--                    <option value="PR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pr.png\" alt=\"Puerto Rico\" />"}'>-->
      <!--                      Puerto Rico-->
      <!--                    </option>-->
      <!--                    <option value="QA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/qa.png\" alt=\"Qatar\" />"}'>-->
      <!--                      Qatar-->
      <!--                    </option>-->
      <!--                    <option value="CG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/cg.png\" alt=\"Republic of the Congo\" />"}'>-->
      <!--                      Republic of the Congo-->
      <!--                    </option>-->
      <!--                    <option value="RO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ro.png\" alt=\"Romania\" />"}'>-->
      <!--                      Romania-->
      <!--                    </option>-->
      <!--                    <option value="RU" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ru.png\" alt=\"Russia\" />"}'>-->
      <!--                      Russia-->
      <!--                    </option>-->
      <!--                    <option value="RW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/rw.png\" alt=\"Rwanda\" />"}'>-->
      <!--                      Rwanda-->
      <!--                    </option>-->
      <!--                    <option value="RE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/re.png\" alt=\"Réunion\" />"}'>-->
      <!--                      Réunion-->
      <!--                    </option>-->
      <!--                    <option value="BL" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bl.png\" alt=\"Saint Barthélemy\" />"}'>-->
      <!--                      Saint Barthélemy-->
      <!--                    </option>-->
      <!--                    <option value="SH" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sh.png\" alt=\"Saint Helena, Ascension and Tristan da Cunha\" />"}'>-->
      <!--                      Saint Helena, Ascension and Tristan da Cunha-->
      <!--                    </option>-->
      <!--                    <option value="KN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kn.png\" alt=\"Saint Kitts and Nevis\" />"}'>-->
      <!--                      Saint Kitts and Nevis-->
      <!--                    </option>-->
      <!--                    <option value="LC" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/lc.png\" alt=\"Saint Lucia\" />"}'>-->
      <!--                      Saint Lucia-->
      <!--                    </option>-->
      <!--                    <option value="MF" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/mf.png\" alt=\"Saint Martin\" />"}'>-->
      <!--                      Saint Martin-->
      <!--                    </option>-->
      <!--                    <option value="PM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/pm.png\" alt=\"Saint Pierre and Miquelon\" />"}'>-->
      <!--                      Saint Pierre and Miquelon-->
      <!--                    </option>-->
      <!--                    <option value="VC" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/vc.png\" alt=\"Saint Vincent and the Grenadines\" />"}'>-->
      <!--                      Saint Vincent and the Grenadines-->
      <!--                    </option>-->
      <!--                    <option value="WS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ws.png\" alt=\"Samoa\" />"}'>-->
      <!--                      Samoa-->
      <!--                    </option>-->
      <!--                    <option value="SM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sm.png\" alt=\"San Marino\" />"}'>-->
      <!--                      San Marino-->
      <!--                    </option>-->
      <!--                    <option value="ST" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/st.png\" alt=\"Sao Tome and Principe\" />"}'>-->
      <!--                      Sao Tome and Principe-->
      <!--                    </option>-->
      <!--                    <option value="SA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sa.png\" alt=\"Saudi Arabia\" />"}'>-->
      <!--                      Saudi Arabia-->
      <!--                    </option>-->
      <!--                    <option value="GB-SCT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gb.png\" alt=\"Scotland\" />"}'>-->
      <!--                      Scotland-->
      <!--                    </option>-->
      <!--                    <option value="SN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sn.png\" alt=\"Senegal\" />"}'>-->
      <!--                      Senegal-->
      <!--                    </option>-->
      <!--                    <option value="RS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/rs.png\" alt=\"Serbia\" />"}'>-->
      <!--                      Serbia-->
      <!--                    </option>-->
      <!--                    <option value="SC" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sc.png\" alt=\"Seychelles\" />"}'>-->
      <!--                      Seychelles-->
      <!--                    </option>-->
      <!--                    <option value="SL" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sl.png\" alt=\"Sierra Leone\" />"}'>-->
      <!--                      Sierra Leone-->
      <!--                    </option>-->
      <!--                    <option value="SG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sg.png\" alt=\"Singapore\" />"}'>-->
      <!--                      Singapore-->
      <!--                    </option>-->
      <!--                    <option value="SX" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sx.png\" alt=\"Sint Maarten\" />"}'>-->
      <!--                      Sint Maarten-->
      <!--                    </option>-->
      <!--                    <option value="SK" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sk.png\" alt=\"Slovakia\" />"}'>-->
      <!--                      Slovakia-->
      <!--                    </option>-->
      <!--                    <option value="SI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/si.png\" alt=\"Slovenia\" />"}'>-->
      <!--                      Slovenia-->
      <!--                    </option>-->
      <!--                    <option value="SB" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sb.png\" alt=\"Solomon Islands\" />"}'>-->
      <!--                      Solomon Islands-->
      <!--                    </option>-->
      <!--                    <option value="SO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/so.png\" alt=\"Somalia\" />"}'>-->
      <!--                      Somalia-->
      <!--                    </option>-->
      <!--                    <option value="ZA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/za.png\" alt=\"South Africa\" />"}'>-->
      <!--                      South Africa-->
      <!--                    </option>-->
      <!--                    <option value="GS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gs.png\" alt=\"South Georgia and the South Sandwich Islands\" />"}'>-->
      <!--                      South Georgia and the South Sandwich Islands-->
      <!--                    </option>-->
      <!--                    <option value="KR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kr.png\" alt=\"South Korea\" />"}'>-->
      <!--                      South Korea-->
      <!--                    </option>-->
      <!--                    <option value="SS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ss.png\" alt=\"South Sudan\" />"}'>-->
      <!--                      South Sudan-->
      <!--                    </option>-->
      <!--                    <option value="ES" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/es.png\" alt=\"Spain\" />"}'>-->
      <!--                      Spain-->
      <!--                    </option>-->
      <!--                    <option value="LK" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/lk.png\" alt=\"Sri Lanka\" />"}'>-->
      <!--                      Sri Lanka-->
      <!--                    </option>-->
      <!--                    <option value="PS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ps.png\" alt=\"State of Palestine\" />"}'>-->
      <!--                      State of Palestine-->
      <!--                    </option>-->
      <!--                    <option value="SD" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sd.png\" alt=\"Sudan\" />"}'>-->
      <!--                      Sudan-->
      <!--                    </option>-->
      <!--                    <option value="SR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sr.png\" alt=\"Suriname\" />"}'>-->
      <!--                      Suriname-->
      <!--                    </option>-->
      <!--                    <option value="SJ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sj.png\" alt=\"Svalbard and Jan Mayen\" />"}'>-->
      <!--                      Svalbard and Jan Mayen-->
      <!--                    </option>-->
      <!--                    <option value="SZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sz.png\" alt=\"Swaziland\" />"}'>-->
      <!--                      Swaziland-->
      <!--                    </option>-->
      <!--                    <option value="SE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/se.png\" alt=\"Sweden\" />"}'>-->
      <!--                      Sweden-->
      <!--                    </option>-->
      <!--                    <option value="CH" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ch.png\" alt=\"Switzerland\" />"}'>-->
      <!--                      Switzerland-->
      <!--                    </option>-->
      <!--                    <option value="SY" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/sy.png\" alt=\"Syrian Arab Republic\" />"}'>-->
      <!--                      Syrian Arab Republic-->
      <!--                    </option>-->
      <!--                    <option value="TW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tw.png\" alt=\"Taiwan\" />"}'>-->
      <!--                      Taiwan-->
      <!--                    </option>-->
      <!--                    <option value="TJ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tj.png\" alt=\"Tajikistan\" />"}'>-->
      <!--                      Tajikistan-->
      <!--                    </option>-->
      <!--                    <option value="TZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tz.png\" alt=\"Tanzania\" />"}'>-->
      <!--                      Tanzania-->
      <!--                    </option>-->
      <!--                    <option value="TH" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/th.png\" alt=\"Thailand\" />"}'>-->
      <!--                      Thailand-->
      <!--                    </option>-->
      <!--                    <option value="TL" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tl.png\" alt=\"Timor-Leste\" />"}'>-->
      <!--                      Timor-Leste-->
      <!--                    </option>-->
      <!--                    <option value="TG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tg.png\" alt=\"Togo\" />"}'>-->
      <!--                      Togo-->
      <!--                    </option>-->
      <!--                    <option value="TK" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tk.png\" alt=\"Tokelau\" />"}'>-->
      <!--                      Tokelau-->
      <!--                    </option>-->
      <!--                    <option value="TO" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/to.png\" alt=\"Tonga\" />"}'>-->
      <!--                      Tonga-->
      <!--                    </option>-->
      <!--                    <option value="TT" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tt.png\" alt=\"Trinidad and Tobago\" />"}'>-->
      <!--                      Trinidad and Tobago-->
      <!--                    </option>-->
      <!--                    <option value="TN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tn.png\" alt=\"Tunisia\" />"}'>-->
      <!--                      Tunisia-->
      <!--                    </option>-->
      <!--                    <option value="TR" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tr.png\" alt=\"Turkey\" />"}'>-->
      <!--                      Turkey-->
      <!--                    </option>-->
      <!--                    <option value="TM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tm.png\" alt=\"Turkmenistan\" />"}'>-->
      <!--                      Turkmenistan-->
      <!--                    </option>-->
      <!--                    <option value="TC" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tc.png\" alt=\"Turks and Caicos Islands\" />"}'>-->
      <!--                      Turks and Caicos Islands-->
      <!--                    </option>-->
      <!--                    <option value="TV" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/tv.png\" alt=\"Tuvalu\" />"}'>-->
      <!--                      Tuvalu-->
      <!--                    </option>-->
      <!--                    <option value="UG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ug.png\" alt=\"Uganda\" />"}'>-->
      <!--                      Uganda-->
      <!--                    </option>-->
      <!--                    <option value="UA" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ua.png\" alt=\"Ukraine\" />"}'>-->
      <!--                      Ukraine-->
      <!--                    </option>-->
      <!--                    <option value="AE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ae.png\" alt=\"United Arab Emirates\" />"}'>-->
      <!--                      United Arab Emirates-->
      <!--                    </option>-->
      <!--                    <option value="GB" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gb.png\" alt=\"United Kingdom\" />"}'>-->
      <!--                      United Kingdom-->
      <!--                    </option>-->
      <!--                    <option value="UM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/um.png\" alt=\"United States Minor Outlying Islands\" />"}'>-->
      <!--                      United States Minor Outlying Islands-->
      <!--                    </option>-->
      <!--                    <option value="US" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/us.png\" alt=\"United States of America\" />"}'>-->
      <!--                      United States of America-->
      <!--                    </option>-->
      <!--                    <option value="UY" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/uy.png\" alt=\"Uruguay\" />"}'>-->
      <!--                      Uruguay-->
      <!--                    </option>-->
      <!--                    <option value="UZ" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/uz.png\" alt=\"Uzbekistan\" />"}'>-->
      <!--                      Uzbekistan-->
      <!--                    </option>-->
      <!--                    <option value="VU" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/vu.png\" alt=\"Vanuatu\" />"}'>-->
      <!--                      Vanuatu-->
      <!--                    </option>-->
      <!--                    <option value="VE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ve.png\" alt=\"Venezuela (Bolivarian Republic of)\" />"}'>-->
      <!--                      Venezuela (Bolivarian Republic of)-->
      <!--                    </option>-->
      <!--                    <option value="VN" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/vn.png\" alt=\"Vietnam\" />"}'>-->
      <!--                      Vietnam-->
      <!--                    </option>-->
      <!--                    <option value="VG" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/vg.png\" alt=\"Virgin Islands (British)\" />"}'>-->
      <!--                      Virgin Islands (British)-->
      <!--                    </option>-->
      <!--                    <option value="VI" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/vi.png\" alt=\"Virgin Islands (U.S.)\" />"}'>-->
      <!--                      Virgin Islands (U.S.)-->
      <!--                    </option>-->
      <!--                    <option value="GB-WLS" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/gb.png\" alt=\"Wales\" />"}'>-->
      <!--                      Wales-->
      <!--                    </option>-->
      <!--                    <option value="WF" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/wf.png\" alt=\"Wallis and Futuna\" />"}'>-->
      <!--                      Wallis and Futuna-->
      <!--                    </option>-->
      <!--                    <option value="EH" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/eh.png\" alt=\"Western Sahara\" />"}'>-->
      <!--                      Western Sahara-->
      <!--                    </option>-->
      <!--                    <option value="YE" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ye.png\" alt=\"Yemen\" />"}'>-->
      <!--                      Yemen-->
      <!--                    </option>-->
      <!--                    <option value="ZM" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/zm.png\" alt=\"Zambia\" />"}'>-->
      <!--                      Zambia-->
      <!--                    </option>-->
      <!--                    <option value="ZW" data-hs-select-option='{-->
      <!--                      "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/zw.png\" alt=\"Zimbabwe\" />"}'>-->
      <!--                      Zimbabwe-->
      <!--                    </option>-->
      <!--                  </select>-->

      <!--                  <div class="absolute top-1/2 end-2.5 -translate-y-1/2">-->
      <!--                    <svg class="shrink-0 size-3.5 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">-->
      <!--                      <path d="m7 15 5 5 5-5" />-->
      <!--                      <path d="m7 9 5-5 5 5" />-->
      <!--                    </svg>-->
      <!--                  </div>-->
      <!--                </div>-->
      <!--                &lt;!&ndash; End Select &ndash;&gt;-->
      <!--              </div>-->
      <!--              &lt;!&ndash; End Col &ndash;&gt;-->
      <!--            </div>-->
      <!-- End Grid -->

      <!-- Button Group -->
      <div class="grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5">
        <div class="sm:col-span-4 xl:col-span-3 2xl:col-span-2"></div>

        <div class="sm:col-span-8 xl:col-span-4">
          <div class="flex gap-x-3">
            <button type="submit" :disabled="form.processing" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500">
              Saqlash
            </button>
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
              Bekor qilish
            </button>
            <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saqlandi.</p>
          </div>
        </div>
      </div>
      <!-- End Button Group -->
      </form>
    </div>
</template>
