import{C as v,h as T,o as t,f as w,b as l,r as f,n as o,u as a,c,w as r,a as g,aF as k,e as y,g as C,I as b,G as N}from"./app-d86e0e0e.js";import{b as I,u as M,E as h,_ as V,w as $}from"./base-ccfe9847.js";import{c as F,b as P}from"./el-button-232ec27b.js";const G=I({type:{type:String,values:["primary","success","info","warning","danger"],default:"primary"},closable:Boolean,disableTransitions:Boolean,hit:Boolean,color:String,size:{type:String,values:F},effect:{type:String,values:["dark","light","plain"],default:"light"},round:Boolean}),K={close:n=>n instanceof MouseEvent,click:n=>n instanceof MouseEvent},j=v({name:"ElTag"}),q=v({...j,props:G,emits:K,setup(n,{emit:i}){const _=n,E=P(),s=M("tag"),u=T(()=>{const{type:e,hit:d,effect:S,closable:B,round:z}=_;return[s.b(),s.is("closable",B),s.m(e||"primary"),s.m(E.value),s.m(S),s.is("hit",d),s.is("round",z)]}),p=e=>{i("close",e)},m=e=>{i("click",e)};return(e,d)=>e.disableTransitions?(t(),w("span",{key:0,class:o(a(u)),style:b({backgroundColor:e.color}),onClick:m},[l("span",{class:o(a(s).e("content"))},[f(e.$slots,"default")],2),e.closable?(t(),c(a(h),{key:0,class:o(a(s).e("close")),onClick:y(p,["stop"])},{default:r(()=>[g(a(k))]),_:1},8,["class","onClick"])):C("v-if",!0)],6)):(t(),c(N,{key:1,name:`${a(s).namespace.value}-zoom-in-center`,appear:""},{default:r(()=>[l("span",{class:o(a(u)),style:b({backgroundColor:e.color}),onClick:m},[l("span",{class:o(a(s).e("content"))},[f(e.$slots,"default")],2),e.closable?(t(),c(a(h),{key:0,class:o(a(s).e("close")),onClick:y(p,["stop"])},{default:r(()=>[g(a(k))]),_:1},8,["class","onClick"])):C("v-if",!0)],6)]),_:3},8,["name"]))}});var A=V(q,[["__file","tag.vue"]]);const L=$(A);export{L as E,G as t};