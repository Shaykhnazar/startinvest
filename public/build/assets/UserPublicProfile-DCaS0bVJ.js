import{q as x,o as l,f as n,b as e,g as w,t as c,d as b,l as s,Q as m,c as k,w as u,a as h,u as p,Z as _}from"./app-Benr1l_s.js";import{A as v}from"./App-B2rY-6EB.js";import"./UserStore-B383T_I7.js";/* empty css             */import"./el-main-DYkBO8te.js";import"./plugin-vue_export-helper-YubtJ2nj.js";import"./ApplicationLogo-D-qszFHX.js";const y={class:"p-5 pb-0 bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700"},z=s('<figure><svg class="w-full" preserveAspectRatio="none" width="1113" height="161" viewBox="0 0 1113 161" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_697_201879)"><rect x="1" width="1112" height="348" fill="#B2E7FE"></rect><rect width="185.209" height="704.432" transform="matrix(0.50392 0.86375 -0.860909 0.508759 435.452 -177.87)" fill="#FF8F5D"></rect><rect width="184.653" height="378.667" transform="matrix(0.849839 -0.527043 0.522157 0.852849 -10.4556 -16.4521)" fill="#3ECEED"></rect><rect width="184.653" height="189.175" transform="matrix(0.849839 -0.527043 0.522157 0.852849 35.4456 58.5195)" fill="#4C48FF"></rect></g><defs><clipPath id="clip0_697_201879"><rect x="0.5" width="1112" height="161" rx="12" fill="white"></rect></clipPath></defs></svg></figure>',1),B={class:"-mt-24"},C={class:"relative flex w-[120px] h-[120px] mx-auto border-4 border-white rounded-full dark:border-neutral-800"},M=e("img",{class:"object-cover size-full rounded-full",src:"https://images.unsplash.com/photo-1659482633369-9fe69af50bfb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80",alt:"Hero Image"},null,-1),P={key:0,class:"absolute bottom-0 -end-2"},F=s('<button type="button" class="group p-2 max-w-[125px] inline-flex justify-center items-center gap-x-1.5 text-start bg-white border border-gray-200 text-gray-800 text-xs font-medium rounded-full whitespace-nowrap shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dsm"><svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" x2="9.01" y1="9" y2="9"></line><line x1="15" x2="15.01" y1="9" y2="9"></line></svg><span class="group-hover:block hidden">Set status</span></button>',1),j=[F],A={class:"mt-3 text-center"},E={class:"text-xl font-semibold text-gray-800 dark:text-neutral-200"},V={class:"text-gray-500 dark:text-neutral-500"},D={class:"mt-7 py-0.5 flex flex-row justify-between items-center gap-x-2 whitespace-nowrap overflow-x-auto overflow-y-hidden [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500"},N=s('<div class="pb-3"><label for="hs-pro-dupfub" class="relative py-2 px-3 w-full sm:w-auto block text-center sm:text-start rounded-lg cursor-pointer text-sm font-medium focus:outline-none"><input type="checkbox" id="hs-pro-dupfub" class="peer absolute top-0 start-0 size-full bg-transparent border border-gray-200 text-transparent rounded-lg cursor-pointer focus:ring-white after:block after:size-full after:rounded-md checked:text-transparent checked:border-gray-200 checked:hover:border-gray-200 checked:focus:border-gray-200 checked:bg-none focus:border-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:checked:after:bg-neutral-800 dark:checked:border-neutral-700 dark:focus:ring-0 dark:focus:ring-offset-0 dark:focus:border-neutral-600 dark:checked:focus:after:border-neutral-600" checked><span class="relative z-10 peer-checked:hidden text-gray-800 dark:text-white"> Kuzatish </span><span class="relative z-10 hidden peer-checked:flex peer-checked:text-gray-800 text-gray-200 dark:text-white dark:peer-checked:text-white"> Kuzatishdan voz kechish </span></label></div>',1),$={class:"pb-3"},H=s('<svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path><path d="M8 12h.01"></path><path d="M12 12h.01"></path><path d="M16 12h.01"></path></svg>',1),S={__name:"PublicProfileUserCardSection",props:{isPublic:{type:Boolean,default:!1},user:Object},setup(a){const t=x(a.user),i=o=>{const r=route("chat.cabinet",{friend:o});window.open(r,"_blank","width=600,height=400,scrollbars=yes,resizable=yes")};return(o,r)=>(l(),n("div",y,[z,e("div",B,[e("div",C,[M,a.isPublic?w("",!0):(l(),n("div",P,j))]),e("div",A,[e("h1",E,c(t.value.name),1),e("p",V,c(t.value.email),1)])]),e("div",D,[N,e("div",$,[e("a",{class:"py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-blue-600 text-white shadow-sm hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none focus:bg-blue-700 dark:bg-blue-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-blue-700 dark:focus:bg-blue-700",onClick:r[0]||(r[0]=g=>{var d;return i((d=t.value)==null?void 0:d.id)}),href:"#"},[H,b(" Aloqa ")])])])]))}},U={class:"max-w-6xl mx-auto"},q=e("ol",{class:"md:hidden pt-3 pb-1 sm:pb-3 px-2 sm:px-5 flex items-center whitespace-nowrap"},[e("li",{class:"flex items-center text-sm text-gray-600 dark:text-neutral-500"},[b(" User Profile "),e("svg",{class:"shrink-0 overflow-visible size-4 ms-1.5 text-gray-400 dark:text-neutral-600",width:"16",height:"16",viewBox:"0 0 16 16",fill:"none",xmlns:"http://www.w3.org/2000/svg","aria-hidden":"true"},[e("path",{d:"M6 13L10 3",stroke:"currentColor","stroke-linecap":"round"})])])],-1),G={class:"p-2 sm:p-5 sm:py-0 md:pt-5 space-y-5"},R={__name:"UserPublicProfile",setup(a){const t=m().props.user.data;return(i,o)=>(l(),k(v,null,{header:u(()=>[h(p(_),{title:"Umumiy profil"})]),default:u(()=>[e("div",U,[q,e("div",G,[h(S,{"is-public":!0,user:p(t)},null,8,["user"])])])]),_:1}))}};export{R as default};