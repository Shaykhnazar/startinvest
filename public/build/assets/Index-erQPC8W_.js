import"./base-BRKkDIcw.js";import{b as D,E as N,a as V}from"./el-main-CkGzPhlV.js";import{E as M}from"./el-card-C8bpmrV7.js";import{E as T}from"./el-tag-C7BJAxTU.js";import{E as q,a as A,b as H}from"./el-col-BwWVsGOH.js";import{_ as L,Q as Y,m as $,s as j,o as n,f as c,a as e,u as r,w as t,F as p,Z as P,b as a,d as s,p as E,g as Q,ap as w,c as x,t as i,h as R,y as Z,D as z,E as G}from"./app-BRJ0eliL.js";import{_ as J}from"./CabinetLayout-DMqZ-iNP.js";import{a as K}from"./helpers-Dcc7D1sH.js";import"./index-DgnUq1te.js";import"./index-DNUojZND.js";import"./UserStore-7gsr9b7Z.js";import"./ApplicationLogo-BTbi3OE5.js";import"./index-ekk1B9sa.js";const d=_=>(z("data-v-a0282c4c"),_=_(),G(),_),O={class:"common-layout"},U={class:"card-header"},W={class:"ml-1"},X={class:"text item"},tt=d(()=>a("br",null,null,-1)),et={class:"text item"},at=d(()=>a("br",null,null,-1)),st={class:"text item"},ot=d(()=>a("br",null,null,-1)),nt={class:"text item"},lt=d(()=>a("br",null,null,-1)),it={key:0},ct={key:1},_t={__name:"Index",setup(_){const g=Y();$(!1);const m=g.props.startups;j(()=>{});const k=()=>{w.visit(route("dashboard.startups.add"))},b=f=>{w.visit(route("dashboard.startups.show",{id:f}),{data:{with_content:!0}})},{formatFriendlyDate:C}=K();return(f,rt)=>{const S=q,h=A,y=H,B=D,l=T,F=M,I=N,v=V;return n(),c(p,null,[e(r(P),{title:"Loyihalarim"}),e(J,null,{default:t(()=>[a("div",O,[e(v,null,{default:t(()=>[e(B,{width:"200px",class:"aside"},{default:t(()=>[e(y,null,{default:t(()=>[e(h,null,{default:t(()=>[e(S,{type:"primary",icon:"el-icon-plus",onClick:k},{default:t(()=>[s(" ➕ Yangi qo'shish ")]),_:1})]),_:1})]),_:1})]),_:1}),e(v,null,{default:t(()=>[e(I,null,{default:t(()=>[e(y,{gutter:20},{default:t(()=>[r(m).meta.total>0?(n(!0),c(p,{key:0},E(r(m).data,o=>(n(),x(h,{xs:24,sm:12,lg:8,key:o.id,class:"startup-card"},{default:t(()=>[e(F,{shadow:"hover",onClick:u=>b(o.id)},{header:t(()=>[a("div",U,[a("span",null,i(o.title),1),a("span",W,[R(e(l,{type:"warning",round:""},{default:t(()=>[s("⛔ Arxivlangan")]),_:2},1536),[[Z,o.trashed]])])])]),footer:t(()=>[s("Holati: "),e(l,{type:"primary",round:""},{default:t(()=>[s(i(o.status),1)]),_:2},1024)]),default:t(()=>[a("p",X,"📝 Eslatma: "+i(o.additional_information),1),tt,a("p",et,"📅 Boshlanish Sanasi: "+i(r(C)(o.start_date)),1),at,a("p",st,[s("📢 Turi: "),e(l,{type:"primary"},{default:t(()=>[s(i(o.type),1)]),_:2},1024)]),ot,a("p",nt,[s("🔍 Sanoatlar: "),(n(!0),c(p,null,E(o.industries,u=>(n(),x(l,{key:u.id,type:"success",class:"ml-1"},{default:t(()=>[s(i(u.title),1)]),_:2},1024))),128))]),lt,a("p",null,[s(" MVP versiyasi mavjud: "),o.has_mvp?(n(),c("span",it,[e(l,{type:"success"},{default:t(()=>[s("Ha")]),_:1})])):(n(),c("span",ct,[e(l,{type:"info"},{default:t(()=>[s("Yo'q")]),_:1})]))])]),_:2},1032,["onClick"])]),_:2},1024))),128)):Q("",!0)]),_:1})]),_:1})]),_:1})]),_:1})])]),_:1})],64)}}},bt=L(_t,[["__scopeId","data-v-a0282c4c"]]);export{bt as default};