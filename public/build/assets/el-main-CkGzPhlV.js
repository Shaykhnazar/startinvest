import{u as c,_ as i,w as S,a as p}from"./base-BRKkDIcw.js";import{G as n,a4 as b,j as h,o as u,f as _,r as d,n as f,u as s,K as m}from"./app-BRJ0eliL.js";const k=n({name:"ElContainer"}),B=n({...k,props:{direction:{type:String}},setup(o){const t=o,e=b(),a=c("container"),r=h(()=>t.direction==="vertical"?!0:t.direction==="horizontal"?!1:e&&e.default?e.default().some(v=>{const E=v.type.name;return E==="ElHeader"||E==="ElFooter"}):!1);return(l,v)=>(u(),_("section",{class:f([s(a).b(),s(a).is("vertical",s(r))])},[d(l.$slots,"default")],2))}});var C=i(B,[["__file","container.vue"]]);const F=n({name:"ElAside"}),H=n({...F,props:{width:{type:String,default:null}},setup(o){const t=o,e=c("aside"),a=h(()=>t.width?e.cssVarBlock({width:t.width}):{});return(r,l)=>(u(),_("aside",{class:f(s(e).b()),style:m(s(a))},[d(r.$slots,"default")],6))}});var g=i(H,[["__file","aside.vue"]]);const N=n({name:"ElFooter"}),V=n({...N,props:{height:{type:String,default:null}},setup(o){const t=o,e=c("footer"),a=h(()=>t.height?e.cssVarBlock({height:t.height}):{});return(r,l)=>(u(),_("footer",{class:f(s(e).b()),style:m(s(a))},[d(r.$slots,"default")],6))}});var $=i(V,[["__file","footer.vue"]]);const z=n({name:"ElHeader"}),A=n({...z,props:{height:{type:String,default:null}},setup(o){const t=o,e=c("header"),a=h(()=>t.height?e.cssVarBlock({height:t.height}):{});return(r,l)=>(u(),_("header",{class:f(s(e).b()),style:m(s(a))},[d(r.$slots,"default")],6))}});var y=i(A,[["__file","header.vue"]]);const M=n({name:"ElMain"}),x=n({...M,setup(o){const t=c("main");return(e,a)=>(u(),_("main",{class:f(s(t).b())},[d(e.$slots,"default")],2))}});var w=i(x,[["__file","main.vue"]]);const G=S(C,{Aside:g,Footer:$,Header:y,Main:w}),K=p(g),q=p($),D=p(y),J=p(w);export{J as E,G as a,K as b,D as c,q as d};