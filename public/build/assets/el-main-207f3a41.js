import{u as c,_ as i,w as C,d as p}from"./base-ccfe9847.js";import{C as n,m as S,h,o as u,f as _,r as d,n as f,u as s,I as m}from"./app-d86e0e0e.js";const b=n({name:"ElContainer"}),k=n({...b,props:{direction:{type:String}},setup(a){const t=a,e=S(),o=c("container"),r=h(()=>t.direction==="vertical"?!0:t.direction==="horizontal"?!1:e&&e.default?e.default().some(v=>{const E=v.type.name;return E==="ElHeader"||E==="ElFooter"}):!1);return(l,v)=>(u(),_("section",{class:f([s(o).b(),s(o).is("vertical",s(r))])},[d(l.$slots,"default")],2))}});var B=i(k,[["__file","container.vue"]]);const F=n({name:"ElAside"}),H=n({...F,props:{width:{type:String,default:null}},setup(a){const t=a,e=c("aside"),o=h(()=>t.width?e.cssVarBlock({width:t.width}):{});return(r,l)=>(u(),_("aside",{class:f(s(e).b()),style:m(s(o))},[d(r.$slots,"default")],6))}});var g=i(H,[["__file","aside.vue"]]);const A=n({name:"ElFooter"}),M=n({...A,props:{height:{type:String,default:null}},setup(a){const t=a,e=c("footer"),o=h(()=>t.height?e.cssVarBlock({height:t.height}):{});return(r,l)=>(u(),_("footer",{class:f(s(e).b()),style:m(s(o))},[d(r.$slots,"default")],6))}});var $=i(M,[["__file","footer.vue"]]);const N=n({name:"ElHeader"}),V=n({...N,props:{height:{type:String,default:null}},setup(a){const t=a,e=c("header"),o=h(()=>t.height?e.cssVarBlock({height:t.height}):{});return(r,l)=>(u(),_("header",{class:f(s(e).b()),style:m(s(o))},[d(r.$slots,"default")],6))}});var y=i(V,[["__file","header.vue"]]);const z=n({name:"ElMain"}),I=n({...z,setup(a){const t=c("main");return(e,o)=>(u(),_("main",{class:f(s(t).b())},[d(e.$slots,"default")],2))}});var w=i(I,[["__file","main.vue"]]);const q=C(B,{Aside:g,Footer:$,Header:y,Main:w}),D=p(g),G=p($),J=p(y),K=p(w);export{K as E,q as a,D as b,J as c,G as d};