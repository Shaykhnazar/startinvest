import{T as d,o as l,c as m,w as t,a as o,u as a,Z as c,b as e,d as p,n as u,e as f}from"./app-C7xNQ4M2.js";import{_,P as w}from"./PrimaryButton-B6lSQ577.js";import{_ as b}from"./InputError-Bo4Vr0lY.js";import{_ as x,a as g}from"./TextInput-08ehnP6H.js";import"./ApplicationLogo-Qfvn7D1_.js";const y=e("div",{class:"mb-4 text-sm text-gray-600 dark:text-gray-400"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),h={class:"flex justify-end mt-4"},N={__name:"ConfirmPassword",setup(P){const s=d({password:""}),i=()=>{s.post(route("password.confirm"),{onFinish:()=>s.reset()})};return(V,r)=>(l(),m(_,null,{default:t(()=>[o(a(c),{title:"Confirm Password"}),y,e("form",{onSubmit:f(i,["prevent"])},[e("div",null,[o(x,{for:"password",value:"Password"}),o(g,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:a(s).password,"onUpdate:modelValue":r[0]||(r[0]=n=>a(s).password=n),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),o(b,{class:"mt-2",message:a(s).errors.password},null,8,["message"])]),e("div",h,[o(w,{class:u(["ms-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:t(()=>[p(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{N as default};