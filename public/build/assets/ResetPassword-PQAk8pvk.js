import{T as c,o as p,f,a as r,u as s,b as e,e as g,h as x,v as h,w as k,n as w,F as b,d as i,Z as _}from"./app-D8wfOprS.js";import{_ as l}from"./InputError-DL9VClcn.js";import{P as y}from"./PrimaryButton-DR0uw6qg.js";import{_ as d}from"./TextInput-CRCV97vX.js";import{_ as v}from"./AuthSidebar-D-vfLFa1.js";import"./ApplicationLogo-BKJj3f3c.js";const z={class:"flex min-h-full"},V={class:"grow px-5"},P={class:"h-full min-h-screen sm:w-[448px] flex flex-col justify-center mx-auto space-y-5"},q=e("div",null,[e("h1",{class:"text-xl sm:text-2xl font-semibold text-gray-800 dark:text-neutral-200"}," Parolingizni tiklang "),e("p",{class:"mt-1 text-sm text-gray-500 dark:text-neutral-500"}," Hisobingizga bog'langan elektron pochta manzilini kiriting. Biz sizga parolingizni tiklash uchun havolani yuboramiz. ")],-1),B={class:"space-y-5"},T=e("label",{for:"hs-pro-dale",class:"block mb-2 text-sm font-medium text-gray-800 dark:text-white"}," Elektron pochta ",-1),C=e("label",{for:"password",class:"block mb-2 text-sm font-medium text-gray-800 dark:text-white"}," Yangi parol ",-1),F=e("label",{for:"password_confirmation",class:"block mb-2 text-sm font-medium text-gray-800 dark:text-white"}," Parolni tasdiqlash ",-1),N=e("p",{class:"text-sm text-gray-500 dark:text-neutral-500"},[i(" Parolingizni unutmadingizmi? "),e("a",{class:"inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-500",href:"#"},[i(" Tizimga kirish "),e("svg",{class:"shrink-0 size-4",xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round"},[e("path",{d:"m9 18 6-6-6-6"})])])],-1),H={__name:"ResetPassword",props:{email:{type:String,required:!0},token:{type:String,required:!0}},setup(u){const n=u,t=c({token:n.token,email:n.email,password:"",password_confirmation:""}),m=()=>{t.post(route("password.store"),{onFinish:()=>t.reset("password","password_confirmation")})};return(S,a)=>(p(),f(b,null,[r(s(_),{title:"Parolni tiklash"}),e("main",z,[r(v),e("div",V,[e("div",P,[q,e("form",{onSubmit:g(m,["prevent"])},[e("div",B,[e("div",null,[T,x(e("input",{type:"email",id:"hs-pro-dale",class:"py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600",placeholder:"sizning@email.com","onUpdate:modelValue":a[0]||(a[0]=o=>s(t).email=o),required:"",autofocus:"",autocomplete:"username"},null,512),[[h,s(t).email]]),r(l,{class:"mt-2",message:s(t).errors.email},null,8,["message"])]),e("div",null,[C,r(d,{id:"password",type:"password",modelValue:s(t).password,"onUpdate:modelValue":a[1]||(a[1]=o=>s(t).password=o),required:"",autocomplete:"new-password",class:"py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"},null,8,["modelValue"]),r(l,{class:"mt-2",message:s(t).errors.password},null,8,["message"])]),e("div",null,[F,r(d,{id:"password_confirmation",type:"password",modelValue:s(t).password_confirmation,"onUpdate:modelValue":a[2]||(a[2]=o=>s(t).password_confirmation=o),required:"",autocomplete:"new-password",class:"py-2.5 px-3 block w-full border-gray-200 rounded-lg text-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:placeholder:text-white/60 dark:focus:ring-neutral-600"},null,8,["modelValue"]),r(l,{class:"mt-2",message:s(t).errors.password_confirmation},null,8,["message"])]),r(y,{class:w({"opacity-25":s(t).processing}),disabled:s(t).processing},{default:k(()=>[i(" Parolni tiklash ")]),_:1},8,["class","disabled"])])],32),N])])])],64))}};export{H as default};