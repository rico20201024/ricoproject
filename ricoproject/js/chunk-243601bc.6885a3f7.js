(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-243601bc"],{"0e58":function(t,e,s){},"28bb":function(t,e,s){"use strict";s("b506")},2934:function(t,e,s){"use strict";s("d146")},2988:function(t,e,s){"use strict";s("b254")},"4f9c":function(t,e,s){},"4ff7":function(t,e,s){},"6ab7":function(t,e,s){"use strict";s.r(e);var n=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{attrs:{id:"detail"}},[s("nav-bard",{staticClass:"detail-nav-bar"},[s("div",{staticClass:"left",attrs:{slot:"left"},on:{click:t.back},slot:"left"},[s("right-nav-icon",{attrs:{icons:t.next}})],1),s("div",{staticClass:"center",attrs:{slot:"center"},slot:"center"},[t._v(" 商品详情 ")]),s("div",{staticClass:"right",attrs:{slot:"right"},slot:"right"},[s("right-nav-icon",{attrs:{icons:t.icons}})],1)]),s("tab-control",{directives:[{name:"show",rawName:"v-show",value:t.isDis,expression:"isDis"}],ref:"tab1",staticStyle:{position:"fixed","z-index":"999",width:"100%"},attrs:{ctitles:["人物属性","道具/装备","宠物/孩子","技能","法宝"]},on:{tabClick:t.tabClick}}),s("scroll",{ref:"scroller",staticClass:"detail-scroller",attrs:{"probe-type":3},on:{bscroll:t.scroll}},[s("detail-preview",{attrs:{"role-info":t.roleInfoArr}}),s("tab-control",{ref:"tab2",attrs:{ctitles:["人物属性","道具/装备","宠物/孩子","技能","法宝"]},on:{tabClick:t.tabClick}}),s("content-all",{attrs:{roleInfoList:t.roleInfoObj}}),s("goods-list",{attrs:{"role-arr":t.roleArr}})],1),s("collect-and-buy",{on:{collectClick:t.collectClick}})],1)},i=[],a=s("2909"),c=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"nar-bar"},[s("div",{staticClass:"left"},[t._t("left")],2),s("div",{staticClass:"center"},[t._t("center")],2),s("div",{staticClass:"right"},[t._t("right")],2)])},l=[],o={name:"NavBard"},r=o,u=(s("f34b"),s("2877")),f=Object(u["a"])(r,c,l,!1,null,"46102362",null),d=f.exports,v=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"icon"},t._l(t.icons,(function(e,n){return s("a",{key:n,attrs:{href:"#"}},[t._v(" "+t._s(e.id)+" ")])})),0)},p=[],b={name:"RightNavIcon",props:{icons:{type:Array,default:function(){return[]}}}},C=b,_=(s("7fb9"),Object(u["a"])(C,v,p,!1,null,"1e9877d6",null)),h=_.exports,m=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"detail-preview"},[t._m(0),s("div",{staticClass:"border"}),s("div",{staticClass:"list-item flex"},[s("div",{staticClass:"avatar"},[t._v(" 头像 ")]),s("div",{staticClass:"info"},[s("div",{staticClass:"row"},[s("span",{staticClass:"sect"},[t._v(t._s(t.roleInfo.menpai))]),s("span",{staticClass:"level"},[t._v(t._s(t.roleInfo.level)+"级")]),s("span",{staticClass:"collect"},[t._v("43人收藏")])]),s("div",{staticClass:"row"},[s("h3",{staticClass:"price"},[t._v("￥"+t._s(t.roleInfo.price))])]),t._m(1),t._m(2)])]),s("div",{staticClass:"border"}),t._m(3)])},k=[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"list-item"},[s("div",{staticClass:"serve-name"},[s("span",[t._v("一区-再续前缘")])]),s("div",{staticClass:"state"},[s("span",{staticClass:"hightblack"},[t._v("上架中")])])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"row"},[s("span",{staticClass:"grade"},[t._v("总评分:38154")]),s("span",{staticClass:"pgrade"},[t._v("人物评分:22800")])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"row"},[s("span",{staticClass:"icon"},[t._v("激活经脉")]),s("span",{staticClass:"icon"},[t._v("满级阵法x1")]),s("span",{staticClass:"icon"},[t._v("全红宝宝")])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"list-item"},[s("div",{staticClass:"row"},[s("span",{staticClass:"sell-last-time"},[t._v("出售剩余：3天8小时")]),s("span",{staticClass:"collect"},[t._v("卖家：狸猫换猴子")])]),s("div",{staticClass:"row"},[s("span",{staticClass:"sell-last-time"},[t._v("编号：161083")]),s("span",{staticClass:"collect"},[t._v("卖家ID：174906123")])])])}],g={name:"DetailPreview",props:{icons:{type:Array,default:function(){return[]}},roleInfo:{type:Object,default:function(){return{}}}},methods:{}},y=g,I=(s("b4ee"),Object(u["a"])(y,m,k,!1,null,"f56f5db8",null)),j=I.exports,w=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"tab-control"},t._l(t.ctitles,(function(e,n){return s("div",{key:e,staticClass:"tab-control-item",on:{click:function(e){return t.tabItemClick(n)}}},[s("span",{class:{active:n===t.currentIndex}},[t._v(t._s(e))])])})),0)},x=[],O={name:"TabControl",props:{ctitles:{type:Array,default:function(){return[]}}},data:function(){return{currentIndex:0}},methods:{tabItemClick:function(t){this.currentIndex=t,this.$emit("tabClick",t)}}},$=O,A=(s("2988"),Object(u["a"])($,w,x,!1,null,"48702724",null)),E=A.exports,L=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"content-all"},t._l(t.roleInfo,(function(t,e){return s("content-box-item",{key:e,attrs:{"base-info":t}})})),1)},D=[],T=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"content-item"},[s("p",{staticClass:"title"},[t._v(t._s(t.baseInfo.title))]),s("div",{staticClass:"heightlines"},t._l(t.baseInfo.tags,(function(e,n){return s("div",{key:n,staticClass:"heightline"},[t._v(" "+t._s(e)+" ")])})),0),s("ul",{staticClass:"clearfix"},t._l(t.baseInfo.productInfo,(function(e,n){return s("li",{key:n,staticClass:"product-content"},[s("span",[t._v(t._s(e.key)+"：")]),s("span",{staticClass:"hightblack"},[t._v(t._s(e.value))])])})),0)])},S=[],B={name:"ContentBoxItem",props:{baseInfo:{type:Object,default:function(){return{}}}}},N=B,G=(s("b0c3"),Object(u["a"])(N,T,S,!1,null,"1c98aad9",null)),P=G.exports,R={name:"ContentAll",props:{icons:{type:Array,default:function(){return[]}},roleInfoList:{type:Object,default:function(){return{}}}},components:{ContentBoxItem:P},data:function(){return{}},computed:{roleInfo:function(){return this.roleInfoList.roleInfoList},isShow:function(){return this.roleInfoList.showType}}},J=R,V=Object(u["a"])(J,L,D,!1,null,"318acce6",null),z=V.exports,q=s("b1c3"),F=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"collect-buy"},[s("div",{staticClass:"collect"},[s("div",{staticClass:"box",on:{click:t.collectClick}},[t._v(t._s(t.collect))])]),s("div",{staticClass:"buy",on:{click:t.buyClick}},[t._v(" "+t._s(t.buy)+" ")])])},H=[],K={name:"CollectAndBuy",data:function(){return{collect:"收藏",buy:"2021-02-25  14:03后可以购买分享后可以设置提醒",huan:"还价"}},methods:{collectClick:function(){this.$emit("collectClick")},buyClick:function(){console.log("购买")}}},M=K,Q=(s("2934"),Object(u["a"])(M,F,H,!1,null,"62221c64",null)),U=Q.exports,W=s("5d17"),X=s("735b");s("d9e2");s("b0c0");var Y=s("1bab");function Z(t){return Object(Y["a"])({url:"/vue/VueProjectData/manager/detail.php",params:{id:t}})}var tt={name:"Detail",components:{NavBard:d,RightNavIcon:h,DetailPreview:j,TabControl:E,ContentAll:z,GoodsList:q["a"],Scroll:W["a"],CollectAndBuy:U},data:function(){return{roleInfoArr:{menpai:"魔王寨"},roleArr:[],icons:[{url:"http://119.91.97.157/vue/vuecliproject/manager/src/assets/images/common/fenxiang.svg",title:"分享",id:1},{url:"http://119.91.97.157/vue/vuecliproject/manager/src/assets/images/common/move.svg",id:2}],next:[{url:"http://119.91.97.157/vue/vuecliproject/manager/src/assets/images/common/prev.svg",title:"分享",id:1}],isShowIndex:0,roleInfoObj:{showType:!0,roleInfoList:[{title:"基础信息",tags:["激活经脉"],productInfo:[{key:"仙玉数",value:"80个"},{key:"银币",value:"人物属性"}]},{title:"基础信息",tags:["激活经脉","满级阵法","罕见双蓝","综合实力46000"],productInfo:[{key:"仙玉数",value:"80个"},{key:"银币",value:"人物属性"}]}]},currentIndex:0,isDis:!1,tabOffsetTop:0}},mounted:function(){this.tabOffsetTop=this.$refs.tab2.$el.offsetTop},methods:{back:function(){this.$router.go(-1)},tabClick:function(t){switch(this.isShowIndex=t,this.currentIndex=t,t){case 0:this.roleInfoObj={showType:!0,roleInfoList:[{title:"基础信息",tags:["激活经脉"],productInfo:[{key:"等级",value:"115"},{key:"经验",value:"7684551"}]},{title:"基础信息",tags:["激活经脉","满级阵法","罕见双蓝","综合实力46000"],productInfo:[{key:"仙玉数",value:"1000"},{key:"金币",value:"3640"}]}]};break;case 1:this.roleInfoObj={showType:!1,roleInfoList:[{title:"基本",tags:[],productInfo:[{key:"基本格子总数：",value:"60"},{key:"仓库总数",value:8}]},{title:"已装备道具",tags:[],productInfo:[{key:"仙玉数",value:"60个"},{key:"银币",value:"4960000"}]}]};break}this.$refs.tab1.currentIndex=t,this.$refs.tab2.currentIndex=t},scroll:function(t){this.isDis=-t.y>=this.tabOffsetTop},collectClick:function(){var t=this.roleInfoArr,e={menpai:t.menpai,oid:t.id,level:t.level,price:t.price,serve:t.serve,type:"tohdayOrder"};this.$store.dispatch("addRole",e).then((function(t){console.log(t)}))}},created:function(){var t=this;Object(X["a"])().then((function(e){var s;(s=t.roleArr).push.apply(s,Object(a["a"])(e))})),Z().then((function(e){t.roleInfoArr=e[0]}))},computed:{getIsShow:function(){var t=0;switch(this.isShowIndex){case 0:t=0,console.log("属性");break;case 1:t=1,console.log("属性1");break;case 2:t=2,console.log("属性2");break;case 3:t=3,console.log("属性3");break;case 4:t=4,console.log("属性4");break}return t}}},et=tt,st=(s("28bb"),Object(u["a"])(et,n,i,!1,null,"767decb6",null));e["default"]=st.exports},7003:function(t,e,s){"use strict";s("0e58")},"735b":function(t,e,s){"use strict";s.d(e,"a",(function(){return i}));var n=s("1bab");function i(){return Object(n["a"])({url:"/vue/VueProjectData/manager/goods.php"})}},"7fb9":function(t,e,s){"use strict";s("f023")},a5c7:function(t,e,s){},b0c3:function(t,e,s){"use strict";s("a5c7")},b1c3:function(t,e,s){"use strict";var n=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"goods-list"},[s("h5",[t._v("猜你喜欢")]),t._l(t.roleArr,(function(e,n){return s("goods-item",{key:n,attrs:{obj:e},nativeOn:{click:function(s){return t.itemClick(e.id)}}})}))],2)},i=[],a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"goods-item"},[s("div",{staticClass:"avatar"},[s("img",{attrs:{src:t.obj.imgurl}})]),s("div",{staticClass:"info"},[s("div",{staticClass:"row"},[s("span",{staticClass:"sect"},[t._v(t._s(t.obj.menpai))]),s("span",{staticClass:"level"},[t._v(t._s(t.obj.level)+"级")]),s("span",{staticClass:"serve-name"},[t._v("一区-"+t._s(t.obj.serve))])]),s("div",{staticClass:"row"},[s("span",{staticClass:"grade"},[t._v("总评分:38154")]),s("span",{staticClass:"pgrade"},[t._v("人物评分:22800")]),s("span",{staticClass:"sprice"},[t._v("￥"+t._s(t.obj.price))])]),s("div",{staticClass:"row"},[t._l(t.obj.jingmai,(function(e,n){return s("span",{key:n,staticClass:"icon"},[t._v(t._s(e))])})),s("span",{staticClass:"game-type"},[s("i",{staticClass:"game-icon"},[t._v("梦幻西游手游"+t._s(t.obj.id))])])],2)])])},c=[],l={name:"GoodItem",components:{},props:{obj:{type:Object,default:function(){return{}}}}},o=l,r=(s("7003"),s("2877")),u=Object(r["a"])(o,a,c,!1,null,"07b67d5b",null),f=u.exports,d={name:"GoodsList",components:{GoodsItem:f},methods:{itemClick:function(t){console.log("点击"+t),this.$router.push("/detail/"+t).catch((function(t){}))}},data:function(){return{testList:[{title:"标题1",id:1},{title:"标题2",id:2},{title:"标题3",id:3},{title:"标题4",id:41},{title:"标题5",id:5},{title:"标题6",id:6},{title:"标题7",id:7},{title:"标题8",id:8},{title:"标题9",id:9},{title:"标题10",id:10},{title:"标题11",id:11}]}},props:{roleArr:{type:Array,default:function(){return[]}}}},v=d,p=(s("fd4c"),Object(r["a"])(v,n,i,!1,null,"0e185ce2",null));e["a"]=p.exports},b254:function(t,e,s){},b4ee:function(t,e,s){"use strict";s("4f9c")},b506:function(t,e,s){},be86:function(t,e,s){},d146:function(t,e,s){},f023:function(t,e,s){},f34b:function(t,e,s){"use strict";s("be86")},fd4c:function(t,e,s){"use strict";s("4ff7")}}]);
//# sourceMappingURL=chunk-243601bc.6885a3f7.js.map