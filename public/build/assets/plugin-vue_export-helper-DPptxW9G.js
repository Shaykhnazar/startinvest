import{aw as m,a8 as p,V as i,m as $,j as N,u as _}from"./app-D1EimZBk.js";const F=(t,n)=>{if(t.install=e=>{for(const r of[t,...Object.values(n??{})])e.component(r.name,r)},n)for(const[e,r]of Object.entries(n))t[e]=r;return t},G=(t,n)=>(t.install=e=>{t._context=e._context,e.config.globalProperties[n]=t},t),d=(t,n)=>(t.install=e=>{e.directive(n,t)},t),j=t=>(t.install=m,t),v="el",y="is-",o=(t,n,e,r,u)=>{let l=`${t}-${n}`;return e&&(l+=`-${e}`),r&&(l+=`__${r}`),u&&(l+=`--${u}`),l},V=Symbol("namespaceContextKey"),w=t=>{const n=t||(p()?i(V,$(v)):$(v));return N(()=>_(n)||v)},q=(t,n)=>{const e=w(n);return{namespace:e,b:(s="")=>o(e.value,t,s,"",""),e:s=>s?o(e.value,t,"",s,""):"",m:s=>s?o(e.value,t,"","",s):"",be:(s,a)=>s&&a?o(e.value,t,s,a,""):"",em:(s,a)=>s&&a?o(e.value,t,"",s,a):"",bm:(s,a)=>s&&a?o(e.value,t,s,"",a):"",bem:(s,a,c)=>s&&a&&c?o(e.value,t,s,a,c):"",is:(s,...a)=>{const c=a.length>=1?a[0]:!0;return s&&c?`${y}${s}`:""},cssVar:s=>{const a={};for(const c in s)s[c]&&(a[`--${e.value}-${c}`]=s[c]);return a},cssVarName:s=>`--${e.value}-${s}`,cssVarBlock:s=>{const a={};for(const c in s)s[c]&&(a[`--${e.value}-${t}-${c}`]=s[c]);return a},cssVarBlockName:s=>`--${e.value}-${t}-${s}`}};var x=(t,n)=>{const e=t.__vccOpts||t;for(const[r,u]of n)e[r]=u;return e};export{x as _,j as a,d as b,w as c,v as d,G as e,V as n,q as u,F as w};