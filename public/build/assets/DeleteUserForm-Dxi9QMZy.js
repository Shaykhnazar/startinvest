import{_ as k,o as m,f as b,r as x,q as $,s as B,x as z,j as C,c as S,a as o,w as n,h as y,y as g,b as e,z as p,n as v,g as V,A as E,m as _,T as H,d as h,B as U,u as c,C as D}from"./app-CUnbgRqf.js";import{_ as T}from"./InputError-kLPOwpX4.js";import{_ as q,a as N}from"./TextInput-DuC6PB6t.js";const M={},W={class:"inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"};function j(s,r){return m(),b("button",W,[x(s.$slots,"default")])}const F=k(M,[["render",j]]),I={class:"fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50","scroll-region":""},K=e("div",{class:"absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"},null,-1),L=[K],P={__name:"Modal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(s,{emit:r}){const t=s,a=r;$(()=>t.show,()=>{t.show?document.body.style.overflow="hidden":document.body.style.overflow=null});const d=()=>{t.closeable&&a("close")},i=u=>{u.key==="Escape"&&t.show&&d()};B(()=>document.addEventListener("keydown",i)),z(()=>{document.removeEventListener("keydown",i),document.body.style.overflow=null});const l=C(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[t.maxWidth]);return(u,f)=>(m(),S(E,{to:"body"},[o(p,{"leave-active-class":"duration-200"},{default:n(()=>[y(e("div",I,[o(p,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:n(()=>[y(e("div",{class:"fixed inset-0 transform transition-all",onClick:d},L,512),[[g,s.show]])]),_:1}),o(p,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95","enter-to-class":"opacity-100 translate-y-0 sm:scale-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100 translate-y-0 sm:scale-100","leave-to-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"},{default:n(()=>[y(e("div",{class:v(["mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto",l.value])},[s.show?x(u.$slots,"default",{key:0}):V("",!0)],2),[[g,s.show]])]),_:3})],512),[[g,s.show]])]),_:3})]))}},A=["type"],O={__name:"SecondaryButton",props:{type:{type:String,default:"button"}},setup(s){return(r,t)=>(m(),b("button",{type:s.type,class:"inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"},[x(r.$slots,"default")],8,A))}},G={class:"py-6 sm:py-8 space-y-5 border-t border-gray-200 first:border-t-0 dark:border-neutral-700"},J=e("div",{class:"sm:col-span-4 xl:col-span-3 2xl:col-span-2"},[e("label",{class:"inline-block text-sm text-gray-500 dark:text-neutral-500"}," Hisobni o‘chirish ")],-1),Q=e("p",{class:"mt-3 text-sm text-gray-500 dark:text-neutral-500"},[h(" Bu darhol barcha ma'lumotlarni o'chirib tashlaydi. Bu amalni qaytarib bo‘lmaydi, shuning uchun ehtiyotkorlik bilan davom eting. "),e("a",{class:"text-sm text-blue-600 decoration-2 hover:underline font-medium focus:outline-none focus:underline dark:text-blue-400 dark:hover:text-blue-500",href:"#"},"Batafsil ma'lumot")],-1),R={class:"p-6"},X=e("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Hisobingizni o‘chirishni xohlayotganingizdan aminmisiz? ",-1),Y=e("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Hisobingiz o‘chirib tashlanganidan so‘ng, barcha resurslar va ma’lumotlar doimiy ravishda o‘chirib tashlanadi. Hisobingizni doimiy ravishda o‘chirishni xohlayotganingizni tasdiqlash uchun parolingizni kiriting. ",-1),Z={class:"mt-6"},ee={class:"mt-6 flex justify-end"},oe={__name:"DeleteUserForm",setup(s){const r=_(!1),t=_(null),a=H({password:""}),d=()=>{r.value=!0,U(()=>t.value.focus())},i=()=>{a.delete(route("profile.destroy"),{preserveScroll:!0,onSuccess:()=>l(),onError:()=>t.value.focus(),onFinish:()=>a.reset()})},l=()=>{r.value=!1,a.reset()};return(u,f)=>(m(),b("div",G,[e("div",{class:"grid sm:grid-cols-12 gap-y-1.5 sm:gap-y-0 sm:gap-x-5"},[J,e("div",{class:"sm:col-span-8 xl:col-span-4"},[e("button",{type:"button",onClick:d,class:"py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-red-500 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"}," Hisobimni o'chirish "),Q])]),o(P,{show:r.value,onClose:l},{default:n(()=>[e("div",R,[X,Y,e("div",Z,[o(q,{for:"password",value:"Parol",class:"sr-only"}),o(N,{id:"password",ref_key:"passwordInput",ref:t,modelValue:c(a).password,"onUpdate:modelValue":f[0]||(f[0]=w=>c(a).password=w),type:"password",class:"mt-1 block w-3/4",placeholder:"Parol",onKeyup:D(i,["enter"])},null,8,["modelValue"]),o(T,{message:c(a).errors.password,class:"mt-2"},null,8,["message"])]),e("div",ee,[o(O,{onClick:l},{default:n(()=>[h(" Bekor qilish")]),_:1}),o(F,{class:v(["ms-3",{"opacity-25":c(a).processing}]),disabled:c(a).processing,onClick:i},{default:n(()=>[h(" Hisobni o‘chirish ")]),_:1},8,["class","disabled"])])])]),_:1},8,["show"])]))}};export{oe as default};