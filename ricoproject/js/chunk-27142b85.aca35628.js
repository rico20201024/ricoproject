(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-27142b85"],{"2e2b":function(t,e,n){"use strict";n("dfc7")},"329f":function(t,e,n){t.exports=n.p+"img/prev2.cc762a0e.svg"},"35f3":function(t,e,n){},"381f":function(t,e,n){},"42c3":function(t,e,n){},"4cc9":function(t,e,n){"use strict";n("381f")},5821:function(t,e,n){"use strict";var s=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"select-tabbar"},[n("div",{staticClass:"select-tag"},[n("span",{directives:[{name:"show",rawName:"v-show",value:t.$store.state.menuSelect.title,expression:"$store.state.menuSelect.title"}],staticClass:"tag-icon",on:{click:t.cancleClick}},[t._v(t._s(t.$store.state.menuSelect.title))])]),n("div",{staticClass:"select-success"},[n("span",{on:{click:t.successClick}},[t._v("确定")])])])},i=[],c={name:"SelectTabbar",components:{},methods:{successClick:function(){console.log("确定"),this.$store.state.selectClassify.title=this.$store.state.menuSelect.title,this.$store.state.selectClassify.id=this.$store.state.menuSelect.id,this.$router.go(-1)},cancleClick:function(){this.$store.state.menuSelect.title="",this.$store.state.menuSelect.currentIndex=-1}}},l=c,a=(n("4cc9"),n("2877")),r=Object(a["a"])(l,s,i,!1,null,null,null);e["a"]=r.exports},9891:function(t,e,n){"use strict";n("42c3")},a7ac:function(t,e,n){"use strict";var s=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"nar-bar"},[n("div",{staticClass:"left"},[t._t("left")],2),n("div",{staticClass:"center"},[t._t("center")],2),n("div",{staticClass:"right"},[t._t("right")],2)])},i=[],c={name:"NavBar"},l=c,a=(n("b38e"),n("2877")),r=Object(a["a"])(l,s,i,!1,null,"0e37ea4e",null);e["a"]=r.exports},af41:function(t,e,n){"use strict";n.r(e);var s=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{attrs:{id:"select-store"}},[s("nav-bar",{staticClass:"salesslip-nav-bar"},[s("div",{staticClass:"icon-left",attrs:{slot:"left"},on:{click:t.backClick},slot:"left"},[s("img",{attrs:{src:n("329f")}})]),s("div",{attrs:{slot:"center"},slot:"center"},[t._v(" 货品类型 ")]),s("div",{attrs:{slot:"right"},slot:"right"},[t._v(" 图标 ")])]),s("select-content",{attrs:{"new-data":t.getParsenMenu,"menu-select":t.menuSelect},on:{getNewData:t.getNewData}}),s("select-tabbar"),s("select-tabbar")],1)},i=[],c=n("a7ac"),l=n("c8e2"),a=n("5821"),r={name:"SelectStore",components:{NavBar:c["a"],SelectContent:l["a"],SelectTabbar:a["a"]},data:function(){return{}},methods:{backClick:function(){this.$router.go(-1),this.$store.state.menuSelect.currentIndex=-1,this.$store.state.menuSelect.title=""},nextmenuClick:function(t){console.log(t)},getNewData:function(t){this.$store.dispatch("getClassifyData",{cid:t})}},computed:{getParsenMenu:function(){return[{cid:1,description:"",id:1,imgurl:"",num:0,parentid:1,sort:0,title:"仓库1"},{cid:2,description:"",id:2,imgurl:"",num:0,parentid:1,sort:0,title:"仓库2"},{cid:3,description:"",id:3,imgurl:"",num:0,parentid:1,sort:0,title:"仓库3"}]},menuSelect:function(){return this.$store.state.menuStock}},created:function(){}},u=r,o=(n("9891"),n("2877")),d=Object(o["a"])(u,s,i,!1,null,null,null);e["default"]=d.exports},b38e:function(t,e,n){"use strict";n("b3b5")},b3b5:function(t,e,n){},becb:function(t,e,n){"use strict";n("c314")},c314:function(t,e,n){},c8e2:function(t,e,n){"use strict";var s=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{attrs:{id:"select-content"}},[n("select-top-nav",{staticClass:"select-nav",attrs:{list:t.list},on:{changeMenuClick:t.changeMenuClick}}),n("div",{staticClass:"pd10s"},t._l(t.newData,(function(e,s){return n("select-item",{key:s,staticClass:"select-item",attrs:{index:s,itemInfo:e}},[n("div",{staticClass:"left-inline-box",attrs:{slot:"leftselect"},on:{click:function(n){return n.stopPropagation(),t.itemClick(s,e.id)}},slot:"leftselect"},[n("i",{staticClass:"select-icon-p",class:{selectaction:t.currentIndex==s}}),n("span",[t._v(t._s(e.title))])]),n("div",{directives:[{name:"show",rawName:"v-show",value:t.isShow,expression:"isShow"}],staticClass:"right-inline-box",attrs:{slot:"nextmenu"},on:{click:function(n){return t.nextmenuClick(e,s)}},slot:"nextmenu"},[t._v(" 下级 ")])])})),1)],1)},i=[],c=(n("a434"),function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"select-top-item"},[t._t("leftselect"),t._t("nextmenu")],2)}),l=[],a={name:"SelectItem",components:{},data:function(){return{}},props:{},methods:{itemClick:function(){}}},r=a,u=(n("2e2b"),n("2877")),o=Object(u["a"])(r,c,l,!1,null,null,null),d=o.exports,f=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"select-top-nav"},[n("div",{staticClass:"select-content-info"},t._l(t.list,(function(e,s){return n("span",{key:s,on:{click:function(n){return t.changeMenuClick(e.id,s)}}},[t._v(t._s(e.title))])})),0)])},m=[],h={name:"SelectTopNav",components:{},methods:{changeMenuClick:function(t,e){this.$emit("changeMenuClick",t,e)}},data:function(){return{}},props:{list:{type:Array,default:function(){return[]}}}},p=h,v=(n("becb"),Object(u["a"])(p,f,m,!1,null,null,null)),C=v.exports,b={name:"SelectContent",components:{SelectItem:d,SelectTopNav:C},data:function(){return{list:[{title:"顶层",id:0}],isShow:!0}},props:{newData:{type:Array,default:function(){return[]}},menuSelect:{type:Object,default:function(){return{}}}},methods:{itemClick:function(t){this.menuSelect.currentIndex==t?(this.menuSelect.currentIndex=-1,this.menuSelect.title=""):(this.menuSelect.currentIndex=t,this.menuSelect.title=this.newData[this.currentIndex].title,this.menuSelect.id=this.newData[this.currentIndex].id)},nextmenuClick:function(t,e){if(console.log("?"),-1!=this.menuSelect.currentIndex)return alert("选中状态下不能展开"),!1;this.getNewData(t.id),this.list.push({title:"->"+this.newData[e]["title"],id:t.id}),this.deleteClick(),0!==t.parentid&&(this.isShow=!1)},changeMenuClick:function(t,e){this.deleteClick(),this.$emit("getNewData",t),0==e&&(this.isShow=!0),this.list.splice(e+1,this.list.length)},deleteClick:function(){this.menuSelect.currentIndex=-1,this.menuSelect.title="",this.menuSelect.id=0},getNewData:function(t){this.$store.dispatch("getClassifyData",{cid:t})}},computed:{currentIndex:function(){return this.menuSelect.currentIndex}},created:function(){this.getNewData(0)}},S=b,g=(n("d020"),Object(u["a"])(S,s,i,!1,null,null,null));e["a"]=g.exports},d020:function(t,e,n){"use strict";n("35f3")},dfc7:function(t,e,n){}}]);
//# sourceMappingURL=chunk-27142b85.aca35628.js.map