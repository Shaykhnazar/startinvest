import{_ as m}from"./CabinetLayout.vue_vue_type_script_setup_true_lang-CeMVhmg_.js";import{_ as v,Q as _,q as y,x as k,o as a,f as o,a as c,u as i,w,F as d,Z as C,b as t,t as n,d as V,p as u,m as j,c as p,G as B,H as I}from"./app-kQIvtYe5.js";import{_ as h}from"./MyStartupCardGrid-BDUvZKJt.js";import"./UserStore-Bndz46nd.js";import"./api-CAARxPJW.js";import"./helpers-DSJ9C8Au.js";import"./index-CJjSb77c.js";import"./plugin-vue_export-helper-CUxCVZqI.js";import"./ApplicationLogo-DrXEAwCt.js";const b=s=>(B("data-v-a08cba65"),s=s(),I(),s),L={class:"max-w-6xl mx-auto"},$={class:"p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5"},z={class:"p-5 space-y-4 flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700"},N={class:"flex justify-between items-center gap-x-2"},S={class:"p-1 inline-flex bg-gray-100 rounded-xl dark:bg-neutral-900/50","aria-label":"Tabs",role:"tablist","aria-orientation":"horizontal"},F={type:"button",class:"hs-tab-active:bg-white hs-tab-active:shadow-sm hs-tab-active:focus:bg-gray-50 hs-tab-active:focus:text-gray-800 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium text-gray-800 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 dark:hs-tab-active:bg-neutral-700 dark:hs-tab-active:focus:bg-neutral-800 dark:hs-tab-active:focus:text-neutral-200 active",id:"hs-pro-tabs-dupt-item-open","aria-selected":"true","data-hs-tab":"#hs-pro-tabs-dupt-open","aria-controls":"hs-pro-tabs-dupt-open",role:"tab"},A={type:"button",class:"hs-tab-active:bg-white hs-tab-active:shadow-sm hs-tab-active:focus:bg-gray-50 hs-tab-active:focus:text-gray-800 py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium text-gray-800 rounded-lg disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 dark:hs-tab-active:bg-neutral-700 dark:hs-tab-active:focus:bg-neutral-800 dark:hs-tab-active:focus:text-neutral-200",id:"hs-pro-tabs-dupt-item-archived","aria-selected":"false","data-hs-tab":"#hs-pro-tabs-dupt-archived","aria-controls":"hs-pro-tabs-dupt-archived",role:"tab"},M={class:"flex justify-end items-center gap-x-2"},T=b(()=>t("svg",{class:"hidden sm:block shrink-0 size-3",xmlns:"http://www.w3.org/2000/svg",width:"16",height:"16",fill:"currentColor",viewBox:"0 0 16 16"},[t("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M8 1C8.55228 1 9 1.44772 9 2V7L14 7C14.5523 7 15 7.44771 15 8C15 8.55228 14.5523 9 14 9L9 9V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V9.00001L2 9.00001C1.44772 9.00001 1 8.5523 1 8.00001C0.999999 7.44773 1.44771 7.00001 2 7.00001L7 7.00001V2C7 1.44772 7.44772 1 8 1Z"})],-1)),Z=b(()=>t("div",{class:"p-[3px] flex items-center bg-white border border-gray-200 rounded-lg dark:bg-neutral-800 dark:border-neutral-700"},[t("a",{class:"inline-flex shrink-0 justify-center items-center size-[30px] border-md text-gray-800 rounded-md disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:focus:text-neutral-500 bg-gray-100 focus:bg-gray-200 focus:text-gray-800 dark:focus:text-neutral-200 dark:bg-neutral-700 dark:focus:bg-neutral-600",href:"#"},[t("svg",{class:"shrink-0 size-4",xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round"},[t("rect",{width:"7",height:"7",x:"3",y:"3",rx:"1"}),t("rect",{width:"7",height:"7",x:"14",y:"3",rx:"1"}),t("rect",{width:"7",height:"7",x:"14",y:"14",rx:"1"}),t("rect",{width:"7",height:"7",x:"3",y:"14",rx:"1"})])])],-1)),q={id:"hs-pro-tabs-dupt-open",role:"tabpanel","aria-labelledby":"hs-pro-tabs-dupt-item-open"},D={class:"grid sm:grid-cols-1 xl:grid-cols-2 gap-5"},E={class:"grid gap-y-5"},G={id:"hs-pro-tabs-dupt-archived",role:"tabpanel",class:"hidden","aria-labelledby":"hs-pro-tabs-dupt-item-archived"},H={class:"grid sm:grid-cols-1 xl:grid-cols-2 gap-5"},Q={class:"grid gap-y-5"},J={__name:"Index",setup(s){const l=_();y(!1);const g=l.props.startups,x=l.props.startupsArchived;k(()=>{});const f=()=>{j.visit(route("dashboard.startups.add"))};return(r,K)=>(a(),o(d,null,[c(i(C),{title:"Loyihalarim"}),c(m,null,{default:w(()=>[t("div",L,[t("div",$,[t("div",z,[t("div",N,[t("nav",S,[t("button",F,n(r.$t("cabinet.startup_teams.all")),1),t("button",A,n(r.$t("cabinet.startup_teams.archive")),1)]),t("div",M,[t("button",{type:"button",onClick:f,class:"py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-blue-500"},[T,V(" "+n(r.$t("cabinet.dashboard.add_startup")),1)]),Z])]),t("div",null,[t("div",q,[t("div",D,[t("div",null,[t("div",E,[(a(!0),o(d,null,u(i(g).data,e=>(a(),p(h,{key:e.id,startup:e},null,8,["startup"]))),128))])])])]),t("div",G,[t("div",H,[t("div",null,[t("div",Q,[(a(!0),o(d,null,u(i(x).data,e=>(a(),p(h,{key:e.id,startup:e},null,8,["startup"]))),128))])])])])])])])])]),_:1})],64))}},at=v(J,[["__scopeId","data-v-a08cba65"]]);export{at as default};