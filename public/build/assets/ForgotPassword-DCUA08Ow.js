import{T as m,o as r,f as n,a as o,u as t,b as e,t as g,g as h,e as x,h as p,v as f,d as l,w as b,F as k,Z as _,i as w}from"./app-kI7NWIfm.js";import{_ as y}from"./InputError-BJxYzIGX.js";import{_ as v}from"./AuthSidebar-DgKYcVf9.js";import"./ApplicationLogo-qIYZ8qfT.js";const z={class:"flex min-h-full"},B={class:"grow px-5"},V={key:0,class:"mb-4 font-medium text-sm text-green-600 dark:text-green-400"},N={class:"h-full min-h-screen sm:w-[448px] flex flex-col justify-center mx-auto space-y-5"},P=e("div",null,[e("h1",{class:"text-xl sm:text-2xl font-semibold text-gray-800 dark:text-neutral-200"}," Parolingizni tiklang "),e("p",{class:"mt-1 text-sm text-gray-500 dark:text-neutral-500"}," Hisobingizga bog'langan elektron pochta manzilini kiriting. Biz sizga parolingizni tiklash uchun havolani yuboramiz. ")],-1),j={class:"space-y-5"},C=e("label",{for:"hs-pro-dale",class:"block mb-2 text-sm font-medium text-gray-800 dark:text-white"}," Elektron pochta ",-1),E=["disabled"],F={class:"text-sm text-gray-500 dark:text-neutral-500"},S=e("svg",{class:"shrink-0 size-4",xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round"},[e("path",{d:"m9 18 6-6-6-6"})],-1),q={__name:"ForgotPassword",props:{status:{type:String}},setup(i){const s=m({email:""}),d=()=>{s.post(route("password.email"))};return(u,a)=>(r(),n(k,null,[o(t(_),{title:"Parolni tiklash"}),e("main",z,[o(v),e("div",B,[i.status?(r(),n("div",V,g(i.status),1)):h("",!0),e("div",N,[P,e("form",{onSubmit:x(d,["prevent"])},[e("div",j,[e("div",null,[C,p(e("input",{type:"email",id:"hs-pro-dale",class:"py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600",placeholder:"sizning@email.com","onUpdate:modelValue":a[0]||(a[0]=c=>t(s).email=c),required:"",autofocus:"",autocomplete:"username"},null,512),[[f,t(s).email]]),o(y,{class:"mt-2",message:t(s).errors.email},null,8,["message"])]),e("button",{type:"submit",disabled:t(s).processing,class:"py-2.5 px-3 w-full inline-flex justify-center items-center gap-x-2 text-start bg-blue-600 border border-blue-600 text-white text-sm font-medium rounded-lg shadow-sm align-middle hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-300 dark:focus:ring-blue-500"}," Elektron pochtani yuborish ",8,E)])],32),e("p",F,[l(" Parolingizni unutmadingizmi? "),o(t(w),{href:u.route("login"),class:"inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-500"},{default:b(()=>[l(" Kirish "),S]),_:1},8,["href"])])])])])],64))}};export{q as default};