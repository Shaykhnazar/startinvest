import{T as m,j as f,o as a,c as g,w as s,a as o,u as t,Z as p,f as y,g as _,b as i,d as r,n as k,i as x,e as h}from"./app-BRJ0eliL.js";import{_ as v}from"./GuestLayout-BLlGVmwd.js";import{P as b}from"./PrimaryButton-DgghbwGH.js";import{u as w}from"./UserStore-7gsr9b7Z.js";import"./ApplicationLogo-BTbi3OE5.js";const V=i("div",{class:"mb-4 text-sm text-gray-600 dark:text-gray-400"}," Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),B={key:0,class:"mb-4 font-medium text-sm text-green-600 dark:text-green-400"},S={class:"mt-4 flex items-center justify-between"},$={__name:"VerifyEmail",props:{status:{type:String}},setup(n){const c=n,e=m({}),d=()=>{e.post(route("verification.send"))},u=f(()=>c.status==="verification-link-sent"),l=()=>{e.post(route("logout"),{onSuccess:()=>{w().$reset()}})};return(C,E)=>(a(),g(v,null,{default:s(()=>[o(t(p),{title:"Email Verification"}),V,u.value?(a(),y("div",B," A new verification link has been sent to the email address you provided during registration. ")):_("",!0),i("form",{onSubmit:h(d,["prevent"])},[i("div",S,[o(b,{class:k({"opacity-25":t(e).processing}),disabled:t(e).processing},{default:s(()=>[r(" Resend Verification Email ")]),_:1},8,["class","disabled"]),o(t(x),{onClick:l,method:"post",as:"button",class:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"},{default:s(()=>[r("Log Out")]),_:1})])],32)]),_:1}))}};export{$ as default};