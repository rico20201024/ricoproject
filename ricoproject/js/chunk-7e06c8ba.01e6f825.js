(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-7e06c8ba"],{"0457":function(t,s,e){},"0693":function(t,s,e){"use strict";e("cdf1")},"0d8d":function(t,s,e){},"102c":function(t,s,e){},1148:function(t,s,e){"use strict";var i=e("da84"),n=e("5926"),a=e("577e"),r=e("1d80"),c=i.RangeError;t.exports=function(t){var s=a(r(this)),e="",i=n(t);if(i<0||i==1/0)throw c("Wrong number of repetitions");for(;i>0;(i>>>=1)&&(s+=s))1&i&&(e+=s);return e}},"15a4":function(t,s,e){"use strict";e("343a")},"26fd":function(t,s,e){"use strict";e.r(s);var i=function(){var t=this,s=t.$createElement,i=t._self._c||s;return i("div",{staticClass:"product-detail"},[i("nav-bar",{staticClass:"product-detail-nav-bar"},[i("div",{staticClass:"icon-left",attrs:{slot:"left"},on:{click:t.backClick},slot:"left"},[i("img",{attrs:{src:e("329f")}})]),i("div",{attrs:{slot:"center"},slot:"center"},[t._v(" "+t._s(t.title)+" ")]),i("div",{staticClass:"slotright",attrs:{slot:"right"},slot:"right"},[i("i",{staticClass:"delete",on:{click:t.deleteClick}},[i("img",{attrs:{src:e("2ae0")}})]),i("i",{staticClass:"update",on:{click:t.updateClick}},[i("img",{attrs:{src:e("a17b")}})])])]),i("scroll",{ref:"scroller",staticClass:"product-detail-scroller",attrs:{"probe-type":3}},[i("product-swiper",{attrs:{banners:t.banners},on:{swiperImgLoad:t.swiperImgLoad}}),i("product-detail-content",{attrs:{"detail-info":t.detailInfoOne}})],1)],1)},n=[],a=e("2909"),r=e("a7ac"),c=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("swiper",t._l(t.banners,(function(s,i){return e("swiper-item",{key:i},[e("a",{attrs:{href:"#"}},[e("img",{attrs:{src:s.url},on:{load:t.swiperImgLoad}})])])})),1)},o=[],l=e("dc2c"),u={name:"ProductSwiper",props:{banners:{type:Array,default:function(){return[]}}},data:function(){return{isLoad:!1}},components:{Swiper:l["a"],SwiperItem:l["b"]},methods:{swiperImgLoad:function(){this.isLoad||(this.$emit("swiperImgLoad"),this.isLoad=!0)}}},d=u,f=e("2877"),p=Object(f["a"])(d,c,o,!1,null,null,null),h=p.exports,v=e("b050"),m=e("47c9"),_=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"product-detail-content"},[e("div",{staticClass:"p-info"},[t._v(t._s(t.title)),e("span",{staticClass:"fright"},[t._v("打印")])]),e("cost-analysis",{attrs:{"prime-cost":t.primeCost}}),e("stock-info",{attrs:{stock:t.stock}}),e("product-info",{attrs:{pinfo:t.pinfo}}),e("warehouse-detail",{attrs:{"detail-info":t.storeAndshipment}})],1)},C=[],b=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"stock-info"},[t._m(0),e("div",{staticClass:"stock-box"},[e("ul",{staticClass:"info-item"},[e("li",{staticClass:"blue"},[t._v("库存合计："),e("span",{staticClass:"bolds"},[t._v(t._s(t.stock.num))])]),e("li",{staticClass:"red"},[t._v("成本合计："),e("span",{staticClass:"bolds"},[t._v(t._s(t.allCotsMoneys))])])]),e("ul",{staticClass:"info-item"},[e("li",[t._v("未发货："),e("span",{staticClass:"bolds black"},[t._v(t._s(t.stock.num))])]),e("li",[t._v("销售价合计："),e("span",{staticClass:"bolds black"},[t._v(t._s(t.allPriceMoneys))])])])]),e("div",{staticClass:"little-box"},[t._m(1),e("div",{staticClass:"little-item"},[e("h4",[t._v("库存")]),e("p",{staticClass:"blue"},[t._v(t._s(t.stock.num))])]),e("div",{staticClass:"little-item"},[e("h4",[t._v("仓库金额")]),e("p",{staticClass:"red"},[t._v(t._s(t.allCotsMoneys))])])])])},g=[function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("h4",{staticClass:"stock-title"},[t._v("库存信息"),e("a",{attrs:{href:"#"}},[t._v("查看库存详情")])])},function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"little-item"},[e("h4",[t._v("仓库名称")]),e("p",[t._v("1号仓库")])])}],w=(e("b680"),{name:"StockInfo",components:{},methods:{},props:{stock:{type:Object,default:function(){return{}}}},computed:{allCotsMoneys:function(){return parseFloat(this.stock.costs*this.stock.num).toFixed(2)},allPriceMoneys:function(){return parseFloat(this.stock.price*this.stock.num).toFixed(2)}}}),k=w,I=(e("a2e4"),Object(f["a"])(k,b,g,!1,null,null,null)),x=I.exports,y=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"product-info-p"},[t._m(0),e("ul",{staticClass:"product-list"},[e("li",[e("span",{staticClass:"ps-title"},[t._v("货品编码")]),e("span",{staticClass:"p-v"},[t._v(t._s(t.pinfo.encoded))])]),t._m(1),e("li",[e("span",{staticClass:"ps-title"},[t._v("货品类型")]),e("span",{staticClass:"p-v"},[t._v(t._s(t.pinfo.ctitle))])]),e("li",[e("span",{staticClass:"ps-title"},[t._v("生成厂商")]),e("span",{staticClass:"p-v"},[t._v(t._s(t.pinfo.manufacturer))])])])])},j=[function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("h4",{staticClass:"product-title"},[t._v("货品信息"),e("a",{attrs:{href:"#"}},[t._v("查看库存详情")])])},function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("li",[e("span",{staticClass:"ps-title"},[t._v("条形码")]),e("span",{staticClass:"p-v"},[t._v("645451055")])])}],O={name:"productInfo",components:{},props:{pinfo:{type:Object,default:function(){return{}}}},methods:{}},D=O,$=(e("b7ca"),Object(f["a"])(D,y,j,!1,null,null,null)),P=$.exports,E=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"warehouse-detail"},[e("div",{staticClass:"pd10"},[t._m(0),e("ul",{staticClass:"warehouse-list"},[e("li",[e("span",{staticClass:"black"},[t._v("入库总数：")]),e("span",{staticClass:"blue"},[t._v(t._s(t.DetailInfo.stock))])]),t._m(1)])]),e("order-list")],1)},S=[function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("h4",{staticClass:"warehouse-title"},[t._v("出入库明细"),e("a",{attrs:{href:"#"}},[t._v("查看详情")])])},function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("li",[e("span",{staticClass:"black"},[t._v("出库总数：")]),e("span",{staticClass:"orange"},[t._v("3500")])])}],T=function(){var t=this,s=t.$createElement;t._self._c;return t._m(0)},W=[function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"order-list"},[e("div",{staticClass:"pd10"},[e("h4",[e("span",{staticClass:"order-t"},[t._v("单号")]),e("span",{staticClass:"ordernum"},[t._v("RK-20210324-008")]),e("span",{staticClass:"fright"},[e("i",{staticClass:"fright-icon"},[t._v("出 库")])])]),e("div",{staticClass:"order-info-box"},[e("div",{staticClass:"order-info-item"},[e("span",{staticClass:"o-title"},[t._v("仓库")]),e("span",{staticClass:"o-value black"},[t._v("1号仓")]),e("span",{staticClass:"tright"},[t._v("￥0.50")])]),e("div",{staticClass:"order-info-item"},[e("span",{staticClass:"o-title"},[t._v("往来单位")]),e("span",{staticClass:"o-value "}),e("span",{staticClass:"tright black"},[t._v("X80")])]),e("div",{staticClass:"order-info-item"},[e("span",{staticClass:"o-title"},[t._v("经办人")]),e("span",{staticClass:"o-value"}),e("span",{staticClass:"tright red"},[t._v("￥0.50")])])]),e("div",{staticClass:"manager-info"},[e("span",{staticClass:"m-user"},[t._v("admin")]),e("span",{staticClass:"m-date"},[t._v("2021-03-24 16:05")]),e("span",{staticClass:"m-detail"},[e("a",{attrs:{href:"#"}},[t._v("查看详情")])])])])])}],N={name:"OrderList",components:{},methods:{}},M=N,X=(e("951f"),Object(f["a"])(M,T,W,!1,null,null,null)),L=X.exports,A={name:"WarehouseDetail",components:{OrderList:L},methods:{},props:{DetailInfo:{type:Object,default:function(){return{}}}}},F=A,R=(e("8917"),Object(f["a"])(F,E,S,!1,null,null,null)),V=R.exports,B=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"costanalysis-info-p"},[e("h4",{staticClass:"costanalysis-title"},[t._v("成本分析"),e("span",{on:{click:t.CostClick}},[t._v("查看详情")])]),e("div",{staticClass:"costanalysis-box"},[e("div",[e("p",[t._v("近一个月最低价")]),e("p",{staticClass:"costanalysis-text"},[t._v(t._s(t.primeCost.costs))])]),e("div",[e("p",[t._v("产品造价")]),e("p",{staticClass:"costanalysis-text"},[t._v(t._s(t.primeCost.costs))])]),e("div",[e("p",[t._v("推荐售价")]),e("p",{staticClass:"costanalysis-text last-text"},[t._v(t._s(t.primeCost.newPrice))])])])])},J=[],q={name:"CostAnalysis",components:{},methods:{CostClick:function(){this.$router.push("/costanalysis").catch((function(t){}))}},props:{primeCost:{type:Object,default:function(){return{}}}}},H=q,K=(e("86f7"),Object(f["a"])(H,B,J,!1,null,null,null)),U=K.exports,z={name:"ProductDetailContent",components:{ProductInfo:P,StockInfo:x,WarehouseDetail:V,CostAnalysis:U},data:function(){return{primeCost:{oneMminPrice:0,thereMminPrice:0,newPrice:0,costs:0},stock:{num:0,amount:0,warehouseName:"默认仓库",stockNum:0,stockMoney:0,sales:0,costs:0,price:0},pinfo:{encoded:"HPXXXXX",type:"",cid:0,manufacturer:"默认厂商",ctitle:"默认类别"},storeAndshipment:{stock:0},title:""}},methods:{},props:{DetailInfo:{type:Object,default:function(){return{}}}},watch:{DetailInfo:function(t){this.title=t.title,this.primeCost.newPrice=t.price,this.primeCost.costs=t.costs,this.stock.num=t.stock,this.stock.warehouseName=t.warehouseid,this.stock.sales=t.sales,this.stock.costs=t.costs,this.stock.price=t.price,this.pinfo.encoded=t.encoded,this.pinfo.ctitle=t.ctitle,this.pinfo.type=t.type,this.pinfo.cid=t.cid,this.storeAndshipment.stock=t.stock}},activated:function(){}},G=z,Q=(e("b6c7"),Object(f["a"])(G,_,C,!1,null,null,null)),Y=Q.exports,Z=e("5d17"),tt={name:"ProductDetail",components:{NavBar:r["a"],ProductSwiper:h,Scroll:Z["a"],ProductDetailContent:Y},data:function(){return{title:"产品详情",banners:[],productDetailInfo:null,currentId:1}},created:function(){var t=this;this.getProductDetail(this.currentId),Object(v["a"])().then((function(s){var e;(e=t.banners).push.apply(e,Object(a["a"])(s))}))},methods:{swiperImgLoad:function(){},backClick:function(){this.$router.go(-1)},getProductDetail:function(t){var s=this;Object(m["b"])(t).then((function(t){s.productDetailInfo=t[0]}))},updateClick:function(){this.$router.push({name:"updategoods",params:{baseInfo:this.productDetailInfo}}).catch((function(t){}))},deleteClick:function(){console.log("删除商品")}},mounted:function(){this.$refs.scroller.refresh(),this.$refs.scroller.finishPullUp()},computed:{detailInfoOne:function(){return this.productDetailInfo}},activated:function(){this.currentId=this.$route.params&&this.$route.params.id,this.getProductDetail(this.currentId)}},st=tt,et=(e("3103"),Object(f["a"])(st,i,n,!1,null,null,null));s["default"]=et.exports},"2a3b":function(t,s,e){},"2ae0":function(t,s,e){t.exports=e.p+"img/delete.d39ccb11.svg"},3103:function(t,s,e){"use strict";e("102c")},"329f":function(t,s,e){t.exports=e.p+"img/prev2.cc762a0e.svg"},"343a":function(t,s,e){},"47c9":function(t,s,e){"use strict";e.d(s,"c",(function(){return n})),e.d(s,"e",(function(){return a})),e.d(s,"d",(function(){return r})),e.d(s,"a",(function(){return c})),e.d(s,"b",(function(){return o}));var i=e("1bab");function n(t){var s=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;return Object(i["a"])({url:"/vue/VueProjectData/manager/addgoods.php",params:{obj:t,page:s}})}function a(t){return Object(i["a"])({url:"/vue/VueProjectData/manager/uploadimg.php",params:{imgs:t}})}function r(t){return Object(i["a"])({url:"/vue/VueProjectData/manager/updategoods.php",params:{obj:t}})}function c(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"allSelect",s=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,e=arguments.length>2?arguments[2]:void 0,n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:1;return Object(i["a"])({url:"/vue/VueProjectData/manager/product.php",params:{typeid:n,type:t,productname:e,page:s}})}function o(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:1;return Object(i["a"])({url:"/vue/VueProjectData/manager/productdetail.php",params:{id:t}})}},"86f7":function(t,s,e){"use strict";e("0d8d")},8917:function(t,s,e){"use strict";e("89aa")},"89aa":function(t,s,e){},9068:function(t,s,e){},"951f":function(t,s,e){"use strict";e("0457")},a17b:function(t,s,e){t.exports=e.p+"img/updated.bd064c74.svg"},a2e4:function(t,s,e){"use strict";e("c877")},a7ac:function(t,s,e){"use strict";var i=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"nar-bar"},[e("div",{staticClass:"left"},[t._t("left")],2),e("div",{staticClass:"center"},[t._t("center")],2),e("div",{staticClass:"right"},[t._t("right")],2)])},n=[],a={name:"NavBar"},r=a,c=(e("b38e"),e("2877")),o=Object(c["a"])(r,i,n,!1,null,"0e37ea4e",null);s["a"]=o.exports},ace8:function(t,s,e){"use strict";var i=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{attrs:{id:"hy-swiper"}},[e("div",{staticClass:"swiper",on:{touchstart:t.touchStart,touchmove:t.touchMove,touchend:t.touchEnd}},[t._t("default")],2),t._t("indicator"),e("div",{staticClass:"indicator"},[t.showIndicator&&t.slideCount>1?t._t("indicator",(function(){return t._l(t.slideCount,(function(s,i){return e("div",{key:i,staticClass:"indi-item",class:{active:i===t.currentIndex-1}})}))})):t._e()],2)],2)},n=[],a=(e("a9e3"),{name:"Swiper",props:{interval:{type:Number,default:3e3},animDuration:{type:Number,default:300},moveRatio:{type:Number,default:.25},showIndicator:{type:Boolean,default:!0}},data:function(){return{slideCount:0,totalWidth:0,swiperStyle:{},currentIndex:1,scrolling:!1}},mounted:function(){var t=this;setTimeout((function(){t.handleDom(),t.startTimer()}),100)},methods:{startTimer:function(){var t=this;this.playTimer=window.setInterval((function(){t.currentIndex++,t.scrollContent(-t.currentIndex*t.totalWidth)}),this.interval)},stopTimer:function(){window.clearInterval(this.playTimer)},scrollContent:function(t){this.scrolling=!0,this.swiperStyle.transition="transform "+this.animDuration+"ms",this.setTransform(t),this.checkPosition(),this.scrolling=!1},checkPosition:function(){var t=this;window.setTimeout((function(){t.swiperStyle.transition="0ms",t.currentIndex>=t.slideCount+1?(t.currentIndex=1,t.setTransform(-t.currentIndex*t.totalWidth)):t.currentIndex<=0&&(t.currentIndex=t.slideCount,t.setTransform(-t.currentIndex*t.totalWidth)),t.$emit("transitionEnd",t.currentIndex-1)}),this.animDuration)},setTransform:function(t){this.swiperStyle.transform="translate3d(".concat(t,"px, 0, 0)"),this.swiperStyle["-webkit-transform"]="translate3d(".concat(t,"px), 0, 0"),this.swiperStyle["-ms-transform"]="translate3d(".concat(t,"px), 0, 0")},handleDom:function(){var t=document.querySelector(".swiper"),s=t.getElementsByClassName("slide");if(this.slideCount=s.length,this.slideCount>1){var e=s[0].cloneNode(!0),i=s[this.slideCount-1].cloneNode(!0);t.insertBefore(i,s[0]),t.appendChild(e),this.totalWidth=t.offsetWidth,this.swiperStyle=t.style}this.setTransform(-this.totalWidth)},touchStart:function(t){this.scrolling||(this.stopTimer(),this.startX=t.touches[0].pageX)},touchMove:function(t){this.currentX=t.touches[0].pageX,this.distance=this.currentX-this.startX;var s=-this.currentIndex*this.totalWidth,e=this.distance+s;this.setTransform(e)},touchEnd:function(t){var s=Math.abs(this.distance);0!==this.distance&&(this.distance>0&&s>this.totalWidth*this.moveRatio?this.currentIndex--:this.distance<0&&s>this.totalWidth*this.moveRatio&&this.currentIndex++,this.scrollContent(-this.currentIndex*this.totalWidth),this.startTimer())},previous:function(){this.changeItem(-1)},next:function(){this.changeItem(1)},changeItem:function(t){this.stopTimer(),this.currentIndex+=t,this.scrollContent(-this.currentIndex*this.totalWidth),this.startTimer()}}}),r=a,c=(e("15a4"),e("2877")),o=Object(c["a"])(r,i,n,!1,null,"69349c3b",null);s["a"]=o.exports},b050:function(t,s,e){"use strict";e.d(s,"a",(function(){return n}));var i=e("1bab");function n(){return Object(i["a"])({url:"/vue/VueProjectData/manager/swiper.php"})}},b38e:function(t,s,e){"use strict";e("b3b5")},b3b5:function(t,s,e){},b680:function(t,s,e){"use strict";var i=e("23e7"),n=e("da84"),a=e("e330"),r=e("5926"),c=e("408a"),o=e("1148"),l=e("d039"),u=n.RangeError,d=n.String,f=Math.floor,p=a(o),h=a("".slice),v=a(1..toFixed),m=function(t,s,e){return 0===s?e:s%2===1?m(t,s-1,e*t):m(t*t,s/2,e)},_=function(t){var s=0,e=t;while(e>=4096)s+=12,e/=4096;while(e>=2)s+=1,e/=2;return s},C=function(t,s,e){var i=-1,n=e;while(++i<6)n+=s*t[i],t[i]=n%1e7,n=f(n/1e7)},b=function(t,s){var e=6,i=0;while(--e>=0)i+=t[e],t[e]=f(i/s),i=i%s*1e7},g=function(t){var s=6,e="";while(--s>=0)if(""!==e||0===s||0!==t[s]){var i=d(t[s]);e=""===e?i:e+p("0",7-i.length)+i}return e},w=l((function(){return"0.000"!==v(8e-5,3)||"1"!==v(.9,0)||"1.25"!==v(1.255,2)||"1000000000000000128"!==v(0xde0b6b3a7640080,0)}))||!l((function(){v({})}));i({target:"Number",proto:!0,forced:w},{toFixed:function(t){var s,e,i,n,a=c(this),o=r(t),l=[0,0,0,0,0,0],f="",v="0";if(o<0||o>20)throw u("Incorrect fraction digits");if(a!=a)return"NaN";if(a<=-1e21||a>=1e21)return d(a);if(a<0&&(f="-",a=-a),a>1e-21)if(s=_(a*m(2,69,1))-69,e=s<0?a*m(2,-s,1):a/m(2,s,1),e*=4503599627370496,s=52-s,s>0){C(l,0,e),i=o;while(i>=7)C(l,1e7,0),i-=7;C(l,m(10,i,1),0),i=s-1;while(i>=23)b(l,1<<23),i-=23;b(l,1<<i),C(l,1,1),b(l,2),v=g(l)}else C(l,0,e),C(l,1<<-s,0),v=g(l)+p("0",o);return o>0?(n=v.length,v=f+(n<=o?"0."+p("0",o-n)+v:h(v,0,n-o)+"."+h(v,n-o))):v=f+v,v}})},b6c7:function(t,s,e){"use strict";e("9068")},b7ca:function(t,s,e){"use strict";e("2a3b")},c877:function(t,s,e){},cdf1:function(t,s,e){},dc2c:function(t,s,e){"use strict";e.d(s,"a",(function(){return i["a"]})),e.d(s,"b",(function(){return u}));var i=e("ace8"),n=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"slide"},[t._t("default")],2)},a=[],r={name:"Slide"},c=r,o=(e("0693"),e("2877")),l=Object(o["a"])(c,n,a,!1,null,"376fae32",null),u=l.exports}}]);
//# sourceMappingURL=chunk-7e06c8ba.01e6f825.js.map