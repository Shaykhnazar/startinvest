/* empty css             */import{c as y,a as z,d as B,E as $}from"./el-main-BUru61ID.js";import{_ as m,o as l,f as i,g as k,E as M,G as C,b as e,l as h,a as t,w as d,u,i as x,F as p,p as S,d as j,t as g,n as q,ak as A,H as T,Q as E,s as F,r as v}from"./app-D1EimZBk.js";import{u as I}from"./UserStore-D6bwQrhd.js";import{_ as f}from"./ApplicationLogo-BramxRBp.js";const N={props:{isTestMode:{type:Boolean,required:!0}}},V=n=>(M("data-v-16c150ac"),n=n(),C(),n),H={key:0,id:"scroll-container"},D=V(()=>e("div",{id:"scroll-text"}," ⚠️ Veb-sayt hozirda test rejimida ishlamoqda. Ba'zi imkoniyatlar mavjud bo'lmasligi mumkin. ⚠️ ",-1)),G=[D];function L(n,o,r,a,c,s){return r.isTestMode?(l(),i("div",H,G)):k("",!0)}const Y=m(N,[["render",L],["__scopeId","data-v-16c150ac"]]),P={},U=h('<button type="button" class="hs-dark-mode hs-dark-mode-active:hidden inline-flex items-center gap-x-2 py-2 px-3 bg-dark/10 rounded-full text-sm text-dark hover:bg-dark/20 focus:outline-none focus:bg-dark/20" data-hs-theme-click-value="dark"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path></svg></button><button type="button" class="hs-dark-mode hs-dark-mode-active:inline-flex hidden items-center gap-x-2 py-2 px-3 bg-white/10 rounded-full text-sm text-white hover:bg-white/20 focus:outline-none focus:bg-white/20" data-hs-theme-click-value="light"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2"></path><path d="M12 20v2"></path><path d="m4.93 4.93 1.41 1.41"></path><path d="m17.66 17.66 1.41 1.41"></path><path d="M2 12h2"></path><path d="M20 12h2"></path><path d="m6.34 17.66-1.41 1.41"></path><path d="m19.07 4.93-1.41 1.41"></path></svg></button>',2);function K(n,o){return U}const Q=m(P,[["render",K]]),R={class:"relative max-w-7xl w-full flex flex-wrap md:flex-nowrap md:grid md:grid-cols-12 basis-full items-center px-4 md:px-6 mx-auto"},Z={class:"md:col-span-3"},J={class:"flex items-center gap-x-1 md:gap-x-2 ms-auto py-1 md:ps-6 md:order-3 md:col-span-3"},O=h('<div class="md:hidden"><button type="button" class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" id="hs-navbar-hcail-collapse" aria-expanded="false" aria-controls="hs-navbar-hcail" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-hcail"><svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"></line><line x1="3" x2="21" y1="12" y2="12"></line><line x1="3" x2="21" y1="18" y2="18"></line></svg><svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>',1),W={id:"hs-navbar-hcail",class:"hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6 bg-white dark:bg-gray-800 md:bg-transparent md:dark:bg-transparent","aria-labelledby":"hs-navbar-hcail-collapse"},X={class:"flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0"},ee={__name:"HomeNavbar",props:{canLogin:{type:Boolean},canRegister:{type:Boolean},isTestMode:{type:Boolean,default:!1}},setup(n){const o=[{name:"G'oyalar",route:"ideas.index"},{name:"Startuplar",route:"startups.index"},{name:"Biz haqimizda",route:"about-us"}],r=a=>A.visit(a);return(a,c)=>(l(),i("nav",R,[e("div",Z,[t(u(x),{href:a.route("home"),class:"flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"},{default:d(()=>[t(f,{"custom-class":"-mb-5"})]),_:1},8,["href"])]),e("div",J,[t(Q),a.$page.props.canLogin?(l(),i(p,{key:0},[a.$page.props.auth.user?(l(),i("button",{key:1,type:"button",onClick:c[1]||(c[1]=s=>r(a.route("dashboard.index"))),class:"py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-lime-400 text-black hover:bg-lime-500 focus:outline-none focus:bg-lime-500 transition disabled:opacity-50 disabled:pointer-events-none"}," Kabinet ")):(l(),i("button",{key:0,type:"button",onClick:c[0]||(c[0]=s=>r(a.route("login"))),class:"py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-lime-400 text-black hover:bg-lime-500 focus:outline-none focus:bg-lime-500 transition disabled:opacity-50 disabled:pointer-events-none"}," Tizimga kirish "))],64)):k("",!0),O]),e("div",W,[e("div",X,[(l(),i(p,null,S(o,s=>e("div",null,[t(u(x),{class:q({"relative inline-block text-black focus:outline-none before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 dark:text-white":a.route().current()===s.route,"inline-block text-black hover:text-gray-600 focus:outline-none focus:text-gray-600 dark:text-white dark:hover:text-neutral-300 dark:focus:text-neutral-300":a.route().current()!==s.route}),href:a.route(s.route),"aria-current":"page"},{default:d(()=>[j(g(s.name),1)]),_:2},1032,["class","href"])])),64))])])]))}},te={class:"mt-auto w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto"},ae={class:"grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 my-10"},oe={class:"col-span-full hidden lg:col-span-1 lg:block"},re={class:"mt-3 text-xs sm:text-sm text-gray-600 dark:text-neutral-400"},se=e("h4",{class:"text-xs font-semibold text-gray-900 uppercase dark:text-neutral-100"},"Bo'limlar",-1),ne={class:"mt-3 grid space-y-3 text-sm"},le=["href"],ie=["href"],de=["href"],ce=["href"],ue=h('<div><h4 class="text-xs font-semibold text-gray-900 uppercase dark:text-neutral-100">Aloqa</h4><div class="mt-3 grid space-y-3 text-sm"><p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="https://t.me/startinvest_uz_aloqa_bot" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="19.375" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"></path></svg> Biz bilan bog&#39;lanish </a></p><p><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-life-buoy"><circle cx="12" cy="12" r="10"></circle><path d="m4.93 4.93 4.24 4.24"></path><path d="m14.83 9.17 4.24-4.24"></path><path d="m14.83 14.83 4.24 4.24"></path><path d="m9.17 14.83-4.24 4.24"></path><circle cx="12" cy="12" r="4"></circle></svg> Yordam va qo`llab-quvvatlash</a></p></div></div>',1),he={class:"pt-5 mt-5 border-t border-gray-200 dark:border-neutral-700"},xe={class:"sm:flex sm:justify-between sm:items-center"},pe=h('<div class="flex flex-wrap items-center gap-3"><div class="space-x-4 text-sm"><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">Terms</a><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">Privacy</a><a class="inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" href="#">Status</a></div></div>',1),ge={class:"flex flex-wrap justify-between items-center gap-3"},fe={class:"mt-3 sm:hidden"},me={class:"mt-1 text-xs sm:text-sm text-gray-600 dark:text-neutral-400"},ve=h('<div class="space-x-4"><a href="https://t.me/startinvest_uz" target="_blank" class="inline-block text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="19.375" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"></path></svg></a><a href="https://www.linkedin.com/company/startinvestuz/" target="_blank" class="inline-block text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect width="4" height="12" x="2" y="9"></rect><circle cx="4" cy="4" r="2"></circle></svg></a><a href="https://instagram.com/startinvest_uz" target="_blank" class="inline-block text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg></a><a href="https://www.youtube.com/@startinvest_uz" target="_blank" class="inline-block text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"></path><path d="m10 15 5-3-5-3z"></path></svg></a></div>',1),ke={__name:"HomeFooter",setup(n){return(o,r)=>(l(),i("footer",te,[e("div",ae,[e("div",oe,[t(u(x),{href:o.route("home"),class:"flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 dark:text-white","aria-label":"Brand"},{default:d(()=>[t(f)]),_:1},8,["href"]),e("p",re,"© "+g(new Date().getFullYear())+" StartInvest.uz",1)]),e("div",null,[se,e("div",ne,[e("p",null,[e("a",{class:"inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200",href:o.route("ideas.index")},"Go'yalar",8,le)]),e("p",null,[e("a",{class:"inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200",href:o.route("startups.index")},"Startuplar",8,ie)]),e("p",null,[e("a",{class:"inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200",href:o.route("chat")},"Chat",8,de)]),e("p",null,[e("a",{class:"inline-flex gap-x-2 text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200",href:o.route("about-us")},"Biz haqimizda",8,ce)])])]),ue]),e("div",he,[e("div",xe,[pe,e("div",ge,[e("div",fe,[t(u(x),{href:o.route("home"),class:"flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80 dark:text-white","aria-label":"Brand"},{default:d(()=>[t(f)]),_:1},8,["href"]),e("p",me,"© "+g(new Date().getFullYear())+" StartInvest.",1)]),ve])])])]))}},be=T({__name:"App",setup(n){const o=I(),r=E().props;return F(()=>{setTimeout(()=>{window.HSStaticMethods.autoInit()},100),r.auth.user&&o.setAuthUser(r.auth.user.data)}),(a,c)=>{const s=y,b=z,_=B,w=$;return l(),i(p,null,[t(Y,{"is-test-mode":u(r).isTestMode},null,8,["is-test-mode"]),v(a.$slots,"header",{},void 0,!0),t(w,{class:"main-container bg-[#F4F2EE] dark:bg-[#000000]"},{default:d(()=>[t(s,{class:"flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-white dark:bg-[#262626]",style:{"padding-bottom":"5rem"}},{default:d(()=>[t(ee)]),_:1}),t(b,null,{default:d(()=>[v(a.$slots,"default",{},void 0,!0)]),_:3}),t(_,null,{default:d(()=>[t(ke)]),_:1})]),_:3})],64)}}}),$e=m(be,[["__scopeId","data-v-14fd2434"]]);export{$e as A};