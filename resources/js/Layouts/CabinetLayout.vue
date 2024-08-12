<script setup>
import CabinetHeader from '@/Components/CabinetHeader.vue'
import CabinetFooter from '@/Components/CabinetFooter.vue'

import { ref, onMounted } from 'vue';
import { useUserStore } from '@/stores/UserStore.js'
import { Head } from '@inertiajs/vue3'
import CabinetAside from '@/Components/CabinetAside.vue'

const showingNavigationDropdown = ref(false);

const logoutHandle = () => {
  useUserStore().$reset()
}

onMounted(() => {
  // Apex Line Chart
  // (function () {
  //   buildChart('#hs-sales-line-chart', (mode) => ({
  //     chart: {
  //       height: 400,
  //       type: 'area',
  //       toolbar: {
  //         show: false
  //       },
  //       zoom: {
  //         enabled: false
  //       }
  //     },
  //     series: [
  //       {
  //         name: '2022',
  //         data: [18000, 51000, 60000, 38000, 88000, 50000, 40000, 52000, 88000, 80000, 60000, 70000]
  //       },
  //       {
  //         name: '2023',
  //         data: [27000, 38000, 60000, 77000, 40000, 50000, 49000, 29000, 42000, 27000, 42000, 50000]
  //       }
  //     ],
  //     legend: {
  //       show: false
  //     },
  //     dataLabels: {
  //       enabled: false
  //     },
  //     stroke: {
  //       curve: 'straight',
  //       width: 2
  //     },
  //     fill: {
  //       type: 'gradient',
  //       gradient: {
  //         type: 'vertical',
  //         shadeIntensity: 1,
  //         opacityFrom: 0.2,
  //         opacityTo: 0.8
  //       }
  //     },
  //     xaxis: {
  //       type: 'category',
  //       tickPlacement: 'on',
  //       categories: [
  //         '25 January 2023',
  //         '28 January 2023',
  //         '31 January 2023',
  //         '1 February 2023',
  //         '3 February 2023',
  //         '6 February 2023',
  //         '9 February 2023',
  //         '12 February 2023',
  //         '15 February 2023',
  //         '18 February 2023',
  //         '21 February 2023',
  //         '25 February 2023'
  //       ],
  //       axisBorder: {
  //         show: false
  //       },
  //       axisTicks: {
  //         show: false
  //       },
  //       crosshairs: {
  //         stroke: {
  //           dashArray: 0
  //         },
  //         dropShadow: {
  //           show: false
  //         }
  //       },
  //       tooltip: {
  //         enabled: false
  //       },
  //       labels: {
  //         style: {
  //           colors: '#9ca3af',
  //           fontSize: '13px',
  //           fontFamily: 'Inter, ui-sans-serif',
  //           fontWeight: 400
  //         },
  //         formatter: (title) => {
  //           let t = title;
  //
  //           if (t) {
  //             const newT = t.split(' ');
  //             t = `${newT[0]} ${newT[1].slice(0, 3)}`;
  //           }
  //
  //           return t;
  //         }
  //       }
  //     },
  //     yaxis: {
  //       labels: {
  //         align: 'left',
  //         minWidth: 0,
  //         maxWidth: 140,
  //         style: {
  //           colors: '#9ca3af',
  //           fontSize: '12px',
  //           fontFamily: 'Inter, ui-sans-serif',
  //           fontWeight: 400
  //         },
  //         formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
  //       }
  //     },
  //     tooltip: {
  //       x: {
  //         format: 'MMMM yyyy'
  //       },
  //       y: {
  //         formatter: (value) => `$${value >= 1000 ? `${value / 1000}k` : value}`
  //       },
  //       custom: function (props) {
  //         return buildTooltipCompareTwo(props, {
  //           title: 'Revenue',
  //           mode,
  //           hasTextLabel: true,
  //           wrapperExtClasses: 'min-w-48',
  //         });
  //       }
  //     },
  //     responsive: [{
  //       breakpoint: 568,
  //       options: {
  //         chart: {
  //           height: 300
  //         },
  //         labels: {
  //           style: {
  //             colors: '#9ca3af',
  //             fontSize: '11px',
  //             fontFamily: 'Inter, ui-sans-serif',
  //             fontWeight: 400
  //           },
  //           offsetX: -2,
  //           formatter: (title) => title.slice(0, 3)
  //         },
  //         yaxis: {
  //           labels: {
  //             align: 'left',
  //             minWidth: 0,
  //             maxWidth: 140,
  //             style: {
  //               colors: '#9ca3af',
  //               fontSize: '11px',
  //               fontFamily: 'Inter, ui-sans-serif',
  //               fontWeight: 400
  //             },
  //             formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
  //           }
  //         },
  //       },
  //     }]
  //   }), {
  //     colors: ['#2563eb', '#9333ea'],
  //     fill: {
  //       gradient: {
  //         stops: [0, 90, 100]
  //       }
  //     },
  //     xaxis: {
  //       labels: {
  //         style: {
  //           colors: '#9ca3af'
  //         }
  //       }
  //     },
  //     yaxis: {
  //       labels: {
  //         style: {
  //           colors: '#9ca3af'
  //         }
  //       }
  //     },
  //     grid: {
  //       strokeDashArray: 2,
  //       borderColor: '#e5e7eb'
  //     }
  //   }, {
  //     colors: ['#3b82f6', '#a855f7'],
  //     fill: {
  //       gradient: {
  //         stops: [100, 90, 0]
  //       }
  //     },
  //     xaxis: {
  //       labels: {
  //         style: {
  //           colors: '#a3a3a3',
  //         }
  //       }
  //     },
  //     yaxis: {
  //       labels: {
  //         style: {
  //           colors: '#a3a3a3'
  //         }
  //       }
  //     },
  //     grid: {
  //       strokeDashArray: 2,
  //       borderColor: '#404040'
  //     }
  //   });
  // })();
  // // Apex Lines Chart
  // (function () {
  //   buildChart(
  //     "#hs-total-sales-lines-chart",
  //     (mode) => ({
  //       series: [
  //         {
  //           name: "Store sales",
  //           data: [0, 27000, 5000, 27000, 40000, 30000, 48000],
  //         },
  //         {
  //           name: "Online sales",
  //           data: [19500, 10000, 1000, 17500, 6000, 20500, 24000],
  //         },
  //         {
  //           name: "Others",
  //           data: [12500, 7000, 4000, 8000, 10000, 12800, 8500],
  //         },
  //       ],
  //       chart: {
  //         height: 100,
  //         type: "line",
  //         sparkline: {
  //           enabled: true,
  //         },
  //       },
  //       stroke: {
  //         curve: "straight",
  //         width: 2,
  //       },
  //       xaxis: {
  //         type: "category",
  //         categories: [
  //           "25 January 2023",
  //           "1 February 2023",
  //           "5 February 2023",
  //           "10 February 2023",
  //           "15 February 2023",
  //           "20 February 2023",
  //           "25 February 2023",
  //         ],
  //         crosshairs: {
  //           show: false,
  //         },
  //       },
  //       markers: {
  //         hover: {
  //           size: 0,
  //         },
  //       },
  //       tooltip: {
  //         custom: function (props) {
  //           const { categories } = props.ctx.opts.xaxis;
  //           const { dataPointIndex } = props;
  //           const title = categories[dataPointIndex];
  //
  //           return buildTooltip(props, {
  //             title: title,
  //             mode,
  //             hasTextLabel: true,
  //             wrapperExtClasses: "min-w-48",
  //             labelDivider: ":",
  //             labelExtClasses: "ms-2",
  //           });
  //         },
  //       },
  //     }),
  //     {
  //       colors: ["#2563EB", "#9333ea", "#d1d5db"],
  //       grid: {
  //         borderColor: "#e5e7eb",
  //       },
  //       fill: {
  //         type: "gradient",
  //         gradient: {
  //           gradientToColors: ["#fff", "#fff", "#fff"],
  //         },
  //       },
  //     },
  //     {
  //       colors: ["#3b82f6", "#a855f7", "#737373"],
  //       grid: {
  //         borderColor: "#404040",
  //       },
  //       fill: {
  //         type: "gradient",
  //         gradient: {
  //           gradientToColors: ["#262626", "#262626", "#262626"],
  //         },
  //       },
  //     }
  //   );
  // })();
})
</script>

<template>
  <slot name="header" />

  <CabinetHeader/>

  <CabinetAside/>

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" class="lg:ps-[260px] pt-[59px] pb-[40px] sm:pb-[64px] ">
    <slot/>
  </main>
  <!-- ========== END MAIN CONTENT ========== -->

  <CabinetFooter/>
</template>

<style scoped>

</style>
