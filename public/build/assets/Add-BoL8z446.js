/* empty css             */import{E as A,a as D}from"./el-col-aLxSbulN.js";import{T as H,E as N,a as P,b as L}from"./TextEditor-DxovW3tG.js";import{E as Y}from"./el-button-B7EDOKWM.js";import{E as z,a as G,b as Z,c as $}from"./el-date-picker-Db27T04T.js";import"./el-tag-6h-A_USl.js";import"./el-scrollbar-Dia7V6qD.js";import"./el-popper-tpVSzAGU.js";import{_ as j,Q as J,m as d,T as K,o as r,f as _,a as t,u as n,w as a,F as f,Z as W,b as S,e as X,n as ee,p as h,d as c,c as E,t as y,E as te,G as le}from"./app-DsmxtUJJ.js";import ae from"./DashboardPageHeader-DRwxhSoh.js";import{_ as oe}from"./CabinetLayout.vue_vue_type_script_setup_true_lang-C4q04Kw2.js";import"./use-global-config--rHybDE_.js";import"./index-CNIv-9fU.js";import"./plugin-vue_export-helper-LSmp1Upx.js";import"./UserStore-B5zn-MnH.js";import"./ApplicationLogo-zlMZ0daU.js";const ne=p=>(te("data-v-90076aa2"),p=p(),le(),p),se={style:{margin:"20px 20px"}},ie=ne(()=>S("span",{class:"text-large font-600 mr-3"},"Yangi Startup Qo'shish 🚀",-1)),re={style:{padding:"20px 20px"}},de={__name:"Add",setup(p){const v=J(),k=d(v.props.startupTypes),x=d(v.props.startupStatuses.data),o=K({title:"",description:"",additional_information:"",start_date:"",type:"private",status_id:x[0],has_mvp:!1,industry_ids:[]}),F=d(v.props.industries.data||[]),w={title:[{validator:(m,l,i)=>{l===null||l===""?i(new Error("'Sarlavha' maydoni talab qilinadi.")):i()},trigger:"change"}],description:[{validator:(m,l,i)=>{l===null?i(new Error("'Tarkib' maydoni talab qilinadi.")):i()},trigger:"change"}]},C=d(!1),u=d(null),T=d(null),B=()=>{console.log(o),o.transform(m=>({...m,description:u.value.getContentAsHTML()})).post("/dashboard/startups/add")},U=()=>{u.value.getContent().content.length===1&&typeof u.value.getContent().content[0].content>"u"?o.description=null:o.description=u.value.getContent()};return(m,l)=>{const i=N,s=P,q=z,b=$,g=G,I=Z,Q=Y,R=L,M=A,O=D;return r(),_(f,null,[t(n(W),{title:"Yangi Startup Qo'shish"}),t(oe,null,{default:a(()=>[S("div",se,[t(ae,{"has-extra-slot":!0},{content:a(()=>[ie]),_:1}),S("div",re,[t(O,{gutter:20},{default:a(()=>[t(M,{span:18,offset:3},{default:a(()=>[t(R,{ref_key:"startupFormRef",ref:T,"status-icon":"",rules:w,onSubmit:l[7]||(l[7]=X(()=>{},["prevent"]))},{default:a(()=>[t(s,{label:"Sarlavha",prop:"title"},{default:a(()=>[t(i,{modelValue:n(o).title,"onUpdate:modelValue":l[0]||(l[0]=e=>n(o).title=e)},null,8,["modelValue"])]),_:1}),t(s,{label:"Batafsil",prop:"description",class:ee(C.value?"":"required-field")},{default:a(()=>[t(H,{ref_key:"editorRef",ref:u,content:n(o).description,editable:!C.value,onOnChange:U},null,8,["content","editable"])]),_:1},8,["class"]),t(s,{label:"Qo'shimcha Ma'lumot",prop:"additional_information"},{default:a(()=>[t(i,{modelValue:n(o).additional_information,"onUpdate:modelValue":l[1]||(l[1]=e=>n(o).additional_information=e)},null,8,["modelValue"])]),_:1}),t(s,{label:"Boshlanish Sanasi",prop:"start_date"},{default:a(()=>[t(q,{modelValue:n(o).start_date,"onUpdate:modelValue":l[2]||(l[2]=e=>n(o).start_date=e)},null,8,["modelValue"])]),_:1}),t(s,{label:"Turi"},{default:a(()=>[t(g,{modelValue:n(o).type,"onUpdate:modelValue":l[3]||(l[3]=e=>n(o).type=e)},{default:a(()=>[(r(!0),_(f,null,h(k.value,(e,V)=>(r(),E(b,{key:V,value:e.value,label:e.label},{default:a(()=>[c(y(e.label),1)]),_:2},1032,["value","label"]))),128))]),_:1},8,["modelValue"])]),_:1}),t(s,{label:"Holati"},{default:a(()=>[t(g,{modelValue:n(o).status_id,"onUpdate:modelValue":l[4]||(l[4]=e=>n(o).status_id=e)},{default:a(()=>[(r(!0),_(f,null,h(x.value,(e,V)=>(r(),E(b,{key:V,value:e.id,label:e.label},{default:a(()=>[c(y(e.label),1)]),_:2},1032,["value","label"]))),128))]),_:1},8,["modelValue"])]),_:1}),t(s,{label:"Sanoat tarmoqlari",required:""},{default:a(()=>[t(g,{modelValue:n(o).industry_ids,"onUpdate:modelValue":l[5]||(l[5]=e=>n(o).industry_ids=e),multiple:""},{default:a(()=>[(r(!0),_(f,null,h(F.value,e=>(r(),E(b,{key:e.id,value:e.id,label:e.title},{default:a(()=>[c(y(e.title),1)]),_:2},1032,["value","label"]))),128))]),_:1},8,["modelValue"])]),_:1}),t(s,{label:"MVP versiya ishlab chiqilganmi?"},{default:a(()=>[t(I,{modelValue:n(o).has_mvp,"onUpdate:modelValue":l[6]||(l[6]=e=>n(o).has_mvp=e)},null,8,["modelValue"])]),_:1}),t(s,null,{default:a(()=>[t(Q,{type:"primary",onClick:B,round:"",disabled:!n(o).title,class:"ml-2 mr-10"},{default:a(()=>[c(" ➕Qo'shish ")]),_:1},8,["disabled"])]),_:1})]),_:1},512)]),_:1})]),_:1})])])]),_:1})],64)}}},we=j(de,[["__scopeId","data-v-90076aa2"]]);export{we as default};