import{j as J,Q as _,o as c,f as h,b as e,a as R,w as S,d as k,u as g,i as C,F as E,p as T,t as m,g as j}from"./app-C7xNQ4M2.js";import{u as y,J as b}from"./UserStore-Cn8X6r0f.js";import{a as p}from"./api-BLGzapwd.js";import{u as N}from"./helpers-DAkbBD4a.js";function V(o){const{success:l,info:u,warning:f}=N(),a=y(),i=(t,s)=>{window.confirm(s)&&t()},d=t=>{w()&&(a.hasPendingJoinRequest(t)?i(()=>r(t),"So'rovni bekor qilmoqchimisiz?"):a.isContributor(t)?i(()=>v(t),"Jamoani tark etmoqchimisiz?"):i(()=>n(t),"Jamoaga qo'shilish uchun so'rov yuborishni xohlaysizmi?"))},n=async t=>{try{await p.startups.sendRequest(t,{status:b.PENDING.value}),l("Jamoaga qo'shilish so'rovi muvaffaqiyatli yuborildi!"),x()}catch(s){console.error("Jamoaga qo'shilish so'rovini yuborishda xato:",s),u("Jamoaga qo'shilish so'rovini yuborishda xatolik")}},r=async t=>{try{const s=a.getJoinRequest(t);await p.startups.handleJoinRequest(t,{requestId:s==null?void 0:s.id,fromStatus:s==null?void 0:s.status,toStatus:b.CANCELED.value}),f("Jamoaga qo'shilish so'rovi bekor qilindi!"),x()}catch(s){console.error("Error cancel joining:",s)}},v=async t=>{try{await p.startups.sendRequest(t,{status:b.LEAVED.value}),l("Jamoani tark etish so'rovi jo'natildi!"),x()}catch(s){console.error("Error leaving team:",s)}},x=()=>{a.updateUserJoinRequests(_().props.auth.user.data.joinRequests)},q=J(()=>{const t=a.hasPendingJoinRequest(o.id),s=a.isContributor(o.id);return a.isGuest?"Jamoaga qo'shilish":t?"So'rovni bekor qilish ❌":s?"Jamoani tark etish":"Jamoaga qo'shilish"});function w(){return a.isGuest?(u("Iltimos, so'rov yuborish uchun tizimga kiring"),!1):!0}return{handleJoinRequest:d,sendJoinRequest:n,cancelJoining:r,leaveTeam:v,buttonText:q}}const D={class:"p-4 relative flex flex-col bg-white border border-gray-200 rounded-xl dark:bg-neutral-800 dark:border-neutral-700"},P={class:"grid lg:grid-cols-12 gap-y-2 lg:gap-y-0 gap-x-4"},U={class:"lg:col-span-3"},z=e("svg",{xmlns:"http://www.w3.org/2000/svg",width:"16",height:"16",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round",class:"lucide lucide-view"},[e("path",{d:"M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"}),e("path",{d:"M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"}),e("circle",{cx:"12",cy:"12",r:"1"}),e("path",{d:"M18.944 12.33a1 1 0 0 0 0-.66 7.5 7.5 0 0 0-13.888 0 1 1 0 0 0 0 .66 7.5 7.5 0 0 0 13.888 0"})],-1),A={class:"mt-1 lg:mt-2 -mx-0.5 sm:-mx-1"},B={class:"lg:col-span-6"},M={class:"mt-1 text-md text-dark-500 dark:text-neutral-200"},G={class:"mt-2 flex items-center gap-x-3"},H={class:"text-xs text-gray-500 dark:text-neutral-400"},L={class:"lowercase"},F={class:"lg:col-span-3"},O={class:"flex lg:flex-col justify-end items-center gap-2 border-t border-gray-200 lg:border-t-0 pt-3 lg:pt-0 dark:border-neutral-700"},Q={key:0,class:"lg:order-2 lg:ms-auto"},Y={__name:"StartupCard",props:{startup:Object},setup(o){const l=o,u=y(),{handleJoinRequest:f,buttonText:a}=V(l.startup);return(i,d)=>{var n;return c(),h("div",D,[e("div",P,[e("div",U,[e("p",null,[R(g(C),{href:i.route("startups.show",o.startup.id),class:"inline-flex items-center gap-x-1 text-gray-800 decoration-2 hover:underline font-medium hover:text-blue-600 focus:outline-none focus:underline focus:text-blue-600 dark:text-neutral-200 dark:hover:text-blue-500 dark:focus:outline-none dark:focus:text-blue-500"},{default:S(()=>[z,k(" Tanishish ")]),_:1},8,["href"])]),e("div",A,[(c(!0),h(E,null,T(o.startup.industries,r=>(c(),h("span",{key:r.id,class:"m-0.5 sm:m-1 p-1.5 sm:p-2 inline-block bg-gray-100 text-gray-800 text-xs rounded-md dark:bg-neutral-700 dark:text-neutral-200"},m(r.title),1))),128))])]),e("div",B,[e("p",M,m(o.startup.title),1),e("div",G,[e("h4",H,[k(" Holati: "),e("span",L,m(o.startup.status.label),1)])])]),e("div",F,[e("div",O,[((n=g(u).authUser)==null?void 0:n.id)!==o.startup.owner.id?(c(),h("div",Q,[e("button",{type:"button",onClick:d[0]||(d[0]=r=>g(f)(o.startup.id)),class:"py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700","data-hs-overlay":"#hs-pro-dtlam"},m(g(a)),1)])):j("",!0)])])])])}}};export{Y as _,V as u};