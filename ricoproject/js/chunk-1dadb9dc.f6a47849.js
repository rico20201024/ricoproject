(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1dadb9dc"],{"089f":function(t,e,n){"use strict";n("bfb5")},"163d":function(t,e,n){},"329f":function(t,e,n){t.exports=n.p+"img/prev2.cc762a0e.svg"},"47c9":function(t,e,n){"use strict";n.d(e,"c",(function(){return i})),n.d(e,"e",(function(){return s})),n.d(e,"d",(function(){return o})),n.d(e,"a",(function(){return c})),n.d(e,"b",(function(){return r}));var a=n("1bab");function i(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;return Object(a["a"])({url:"/vue/VueProjectData/manager/addgoods.php",params:{obj:t,page:e}})}function s(t){return Object(a["a"])({url:"/vue/VueProjectData/manager/uploadimg.php",params:{imgs:t}})}function o(t){return Object(a["a"])({url:"/vue/VueProjectData/manager/updategoods.php",params:{obj:t}})}function c(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"allSelect",e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,n=arguments.length>2?arguments[2]:void 0,i=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1;return Object(a["a"])({url:"/vue/VueProjectData/manager/product.php",params:{typeid:i,type:t,productname:n,page:e}})}function r(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1;return Object(a["a"])({url:"/vue/VueProjectData/manager/productdetail.php",params:{id:t}})}},4932:function(t,e,n){"use strict";n("9810")},5334:function(t,e,n){"use strict";var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"item-list-box"},[n("h4",{staticClass:"item-list-title",on:{click:t.titleClick}},[n("span",{staticClass:"lefticon"},[t._t("itemtitle")],2),n("i",{staticClass:"itemrighticon"},[t.isShow?n("div",[t._t("show")],2):n("div",[t._t("hidden")],2)])]),n("div",{directives:[{name:"show",rawName:"v-show",value:t.isShow,expression:"isShow"}]},[t._t("itemlist")],2)])},i=[],s={name:"ItemListBox",components:{},methods:{titleClick:function(){this.$emit("titleClick")}},props:{isShow:{type:Boolean,default:!0}}},o=s,c=(n("4932"),n("2877")),r=Object(c["a"])(o,a,i,!1,null,null,null);e["a"]=r.exports},"77fb":function(t,e,n){"use strict";n("163d")},"78c9":function(t,e,n){"use strict";var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"item-input"},[t._t("inputtitle"),t._t("inputvalue")],2)},i=[],s={name:"ItemInput",components:{}},o=s,c=(n("a902"),n("2877")),r=Object(c["a"])(o,a,i,!1,null,null,null);e["a"]=r.exports},"7fdd":function(t,e,n){},"81bd":function(t,e,n){},9810:function(t,e,n){},9858:function(t,e,n){"use strict";var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"action-btn"},[n("i",{staticClass:"zhixing-btn",on:{click:t.zhixingClick}},[t._v(t._s(t.btnName))])])},i=[],s={name:"ActionBtn",props:{btnName:{type:String,default:"执行"}},methods:{zhixingClick:function(){this.$emit("zhixingClick")}}},o=s,c=(n("c414"),n("2877")),r=Object(c["a"])(o,a,i,!1,null,null,null);e["a"]=r.exports},a7ac:function(t,e,n){"use strict";var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"nar-bar"},[n("div",{staticClass:"left"},[t._t("left")],2),n("div",{staticClass:"center"},[t._t("center")],2),n("div",{staticClass:"right"},[t._t("right")],2)])},i=[],s={name:"NavBar"},o=s,c=(n("b38e"),n("2877")),r=Object(c["a"])(o,a,i,!1,null,"0e37ea4e",null);e["a"]=r.exports},a902:function(t,e,n){"use strict";n("fca2")},b38e:function(t,e,n){"use strict";n("b3b5")},b3b5:function(t,e,n){},bfb5:function(t,e,n){},c414:function(t,e,n){"use strict";n("81bd")},d5a1:function(t,e,n){t.exports=n.p+"img/more.76d371a2.svg"},db0b:function(t,e,n){"use strict";n.r(e);var a=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"addgoods"}},[a("nav-bar",{staticClass:"addgoods-nav-bar"},[a("div",{staticClass:"icon-left",attrs:{slot:"left"},on:{click:t.backClick},slot:"left"},[a("img",{attrs:{src:n("329f")}})]),a("div",{attrs:{slot:"center"},slot:"center"},[t._v(" 货品筛选 ")]),a("div",{attrs:{slot:"right"},slot:"right"})]),a("scroll",{ref:"scroller",staticClass:"addgoods-scroller",attrs:{"probe-type":3},on:{pullingup:t.loadMove}},[a("filter-goods-content",{attrs:{"base-info":t.baseInfo}})],1),a("action-btn",{attrs:{"btn-name":t.btnName},on:{zhixingClick:t.zhixingClick}})],1)},i=[],s=n("a7ac"),o=n("5d17"),c=n("9858"),r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"filter-goods-content"},[n("form",{attrs:{action:""}},[n("item-list-box",[n("span",{attrs:{slot:"itemtitle"},slot:"itemtitle"},[t._v("搜索信息")]),n("div",{staticClass:"itemlist",attrs:{slot:"itemlist"},slot:"itemlist"},[n("item-input",[n("span",{staticClass:"attrName",attrs:{slot:"inputtitle"},slot:"inputtitle"},[t._v("货品名称"),n("i",{staticClass:"blue"},[t._v("*")]),t._v("：")]),n("input",{directives:[{name:"model",rawName:"v-model",value:t.baseInfo.productName,expression:"baseInfo.productName"}],attrs:{slot:"inputvalue",type:"text",placeholder:"请输入产品名称",name:"productName"},domProps:{value:t.baseInfo.productName},on:{input:function(e){e.target.composing||t.$set(t.baseInfo,"productName",e.target.value)}},slot:"inputvalue"})]),n("item-input",[n("span",{staticClass:"attrName",attrs:{slot:"inputtitle"},slot:"inputtitle"},[t._v("货品类型：")]),n("input-select",{attrs:{slot:"inputvalue",path:"/selectproduct"},slot:"inputvalue"},[n("input",{directives:[{name:"model",rawName:"v-model",value:t.baseInfo.productType,expression:"baseInfo.productType"}],attrs:{type:"text",readonly:"readonly",placeholder:"点击选择",name:"productType"},domProps:{value:t.baseInfo.productType},on:{input:function(e){e.target.composing||t.$set(t.baseInfo,"productType",e.target.value)}}})])],1)],1)])],1)])},l=[],u=n("5334"),p=n("78c9"),d=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"input-select",on:{click:t.SelectClick}},[t._t("default"),a("img",{staticClass:"imgmore",attrs:{src:n("d5a1")}})],2)},f=[],m={name:"InputSelect",components:{},props:{path:{type:String,default:""}},methods:{SelectClick:function(){this.$router.push(this.path).catch((function(t){}))}}},v=m,b=(n("089f"),n("2877")),h=Object(b["a"])(v,d,f,!1,null,null,null),g=h.exports,C={name:"FilterGoodsContent",components:{ItemListBox:u["a"],ItemInput:p["a"],InputSelect:g},props:{baseInfo:{type:Object,default:function(){return{}}}},data:function(){return{}},methods:{addIconClict:function(){console.log("添加")}},computed:{keyInfoError:function(){return isNaN(this.baseInfo.productName)?"不是数字":this.baseInfo.productName}}},_=C,x=(n("f710"),Object(b["a"])(_,r,l,!1,null,null,null)),I=x.exports,k=n("47c9"),j={name:"FilterSelect",components:{NavBar:s["a"],Scroll:o["a"],FilterGoodsContent:I,ActionBtn:c["a"]},data:function(){return{btnName:"确定",baseInfo:{productName:"",typeid:""}}},methods:{backClick:function(){this.$router.go(-1)},loadMove:function(){console.log("加载更多")},zhixingClick:function(){this.$router.push({name:"product",params:{info:this.baseInfo}})},seedAddGoodsData:function(t){Object(k["c"])(t).then((function(t){console.log(t)}))}},activated:function(){}},N=j,y=(n("77fb"),Object(b["a"])(N,a,i,!1,null,null,null));e["default"]=y.exports},f710:function(t,e,n){"use strict";n("7fdd")},fca2:function(t,e,n){}}]);
//# sourceMappingURL=chunk-1dadb9dc.f6a47849.js.map