(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-681f38c6"],{"049b":function(t,n,a){"use strict";a.d(n,"b",(function(){return i})),a.d(n,"a",(function(){return s})),a.d(n,"c",(function(){return o}));var e=a("1bab");function i(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0;return Object(e["a"])({url:"/vue/VueProjectData/vantmachine/getbookings.php",params:{page:t,time:n}})}function s(t){return Object(e["a"])({url:"/vue/VueProjectData/vantmachine/booking.php",params:{data:t}})}function o(t,n){return Object(e["a"])({url:"/vue/VueProjectData/vantmachine/updatebooking.php",params:{id:t,statu:n}})}},"2a2b":function(t,n,a){"use strict";a("509d")},"45bb":function(t,n,a){"use strict";a("9299")},"4a32":function(t,n,a){},"509d":function(t,n,a){},"743d":function(t,n,a){"use strict";a("7c6c")},7671:function(t,n,a){t.exports=a.p+"img/false.4b244865.svg"},"7c6c":function(t,n,a){},"816d":function(t,n,a){},8639:function(t,n,a){t.exports=a.p+"img/usericon.0dfe032c.svg"},9299:function(t,n,a){},b269:function(t,n,a){t.exports=a.p+"img/pass.acdbc590.svg"},bb51:function(t,n,a){"use strict";a.r(n);var e,i,s=function(){var t=this,n=t.$createElement,a=t._self._c||n;return a("div",{attrs:{id:"category"}},[a("van-nav-bar",{staticClass:"nav",attrs:{title:"预约列表","right-text":"按钮"},on:{"click-right":t.onClickRight}}),a("van-tabs",{style:{margin:"20px 0"},attrs:{type:"card",color:"#516df5"},on:{click:t.todayClick}},[a("van-tab",{staticClass:"van-box",attrs:{title:"今日"}},[a("book-content",{attrs:{"day-booking":t.bookingObj["todayBooking"]},on:{onLoad:t.onLoad}})],1),a("van-tab",{staticClass:"van-box",attrs:{title:"明日"}},[a("book-content",{attrs:{"day-booking":t.bookingObj["tomBooking"]},on:{onLoad:t.onLoad}})],1),a("van-tab",{staticClass:"van-box",attrs:{title:"后日"}},[a("book-content",{attrs:{"day-booking":t.bookingObj["afterTomBooking"]},on:{onLoad:t.onLoad}})],1)],1)],1)},o=[],r=a("2909"),c=a("ade3"),u=(a("db46"),a("1451")),l=(a("efff"),a("526a")),d=(a("5dc8"),a("cfd4"),a("e000")),f=(a("8b6b"),a("470c"),a("cbde"),a("2138")),g=(a("15bd"),a("9975")),h=(a("b0c0"),a("049b")),b=function(){var t=this,n=t.$createElement,a=t._self._c||n;return a("van-list",{attrs:{finished:t.dayBooking["finished"],"finished-text":"没有更多了",offset:10},on:{load:t.onLoad},model:{value:t.dayBooking["loading"],callback:function(n){t.$set(t.dayBooking,"loading",n)},expression:"dayBooking['loading']"}},[a("div",{staticClass:"user-item-box"},t._l(t.dayBooking.list,(function(n,e){return a("book-user-item",{key:e,attrs:{user:n},on:{agree:t.agree,cancel:t.cancel}})})),1)])},p=[],m=(a("c740"),function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"book-user-item"},[e("div",{staticClass:"user-top-box"},[e("img",{staticClass:"uimg",attrs:{src:a("8639")}}),e("div",{staticClass:"user-info"},[e("h3",[t._v(t._s(t.user.username)+" "),e("div",{staticClass:"user-status"},[1==t.user.status?e("img",{staticClass:"statusimg",attrs:{src:a("b269")}}):e("img",{staticClass:"statusimg",attrs:{src:a("7671")}}),e("font",{attrs:{color:t.statusText.color}},[t._v(t._s(t.statusText.text))])],1)]),e("div",{staticClass:"user-info-row"},[t._v("电话："+t._s(t.user.telephone))]),e("div",{staticClass:"user-info-row"},[t._v("预约时间："+t._s(t.user.booktime))]),e("div",{staticClass:"user-info-row"},[t._v("地址："+t._s(t.user.address))]),e("div",{staticClass:"user-info-row"},[t._v("预约机器(编号)："+t._s(t.user.machinename)+" ("+t._s(t.user.machinenum)+")")])])]),e("div",{staticClass:"user-bottom-box"},[e("van-row",[e("van-col",{attrs:{span:"4"}}),e("van-col",{attrs:{span:"8"}},[e("van-button",{staticClass:"bnt",attrs:{type:"primary",size:"normal",color:"#21cbb0"},on:{click:t.agree}},[t._v("同意")])],1),e("van-col",{attrs:{span:"8"}},[e("van-button",{staticClass:"bnt",attrs:{plain:"",type:"primary",color:"#fe7450"},on:{click:t.cancel}},[t._v("拒绝")])],1),e("van-col",{attrs:{span:"4"}})],1)],1)])}),v=[],k=(a("1845"),a("f309")),y=(a("816d"),a("c74c")),x=a("f1cb"),j=Object(y["a"])("row"),O=j[0],C=j[1],B=O({mixins:[Object(x["b"])("vanRow")],props:{type:String,align:String,justify:String,tag:{type:String,default:"div"},gutter:{type:[Number,String],default:0}},computed:{spaces:function(){var t=Number(this.gutter);if(t){var n=[],a=[[]],e=0;return this.children.forEach((function(t,n){e+=Number(t.span),e>24?(a.push([n]),e-=24):a[a.length-1].push(n)})),a.forEach((function(a){var e=t*(a.length-1)/a.length;a.forEach((function(a,i){if(0===i)n.push({right:e});else{var s=t-n[a-1].right,o=e-s;n.push({left:s,right:o})}}))})),n}}},methods:{onClick:function(t){this.$emit("click",t)}},render:function(){var t,n=arguments[0],a=this.align,e=this.justify,i="flex"===this.type;return n(this.tag,{class:C((t={flex:i},t["align-"+a]=i&&a,t["justify-"+e]=i&&e,t)),on:{click:this.onClick}},[this.slots()])}}),_=(a("4a32"),Object(y["a"])("col")),w=_[0],T=_[1],S=w({mixins:[Object(x["a"])("vanRow")],props:{span:[Number,String],offset:[Number,String],tag:{type:String,default:"div"}},computed:{style:function(){var t=this.index,n=this.parent||{},a=n.spaces;if(a&&a[t]){var e=a[t],i=e.left,s=e.right;return{paddingLeft:i?i+"px":null,paddingRight:s?s+"px":null}}}},methods:{onClick:function(t){this.$emit("click",t)}},render:function(){var t,n=arguments[0],a=this.span,e=this.offset;return n(this.tag,{style:this.style,class:T((t={},t[a]=a,t["offset-"+e]=e,t)),on:{click:this.onClick}},[this.slots()])}}),D={name:"BookUserItem",components:(e={},Object(c["a"])(e,S.name,S),Object(c["a"])(e,B.name,B),Object(c["a"])(e,k["a"].name,k["a"]),e),props:{user:{type:Object,default:function(){return{}}}},computed:{statusText:function(){var t={};return t.text=0==this.user.status?"未通过":"已通过",t.color=0==this.user.status?"#fe7450":"green",t}},methods:{agree:function(){this.$emit("agree",this.user.id)},cancel:function(){this.$emit("cancel",this.user.id)}}},$=D,L=(a("45bb"),a("2877")),E=Object(L["a"])($,m,v,!1,null,"770f1d16",null),I=E.exports,N={name:"BookContent",components:Object(c["a"])({BookUserItem:I},l["a"].name,l["a"]),props:{dayBooking:{type:Object,default:function(){return{}}}},data:function(){return{}},methods:{onLoad:function(){this.$emit("onLoad")},agree:function(t){var n={id:t,status:1,toastText:"该项已通过",toastText2:"已同意"};this.changeStatus(n)},cancel:function(t){var n={id:t,status:0,toastText:"该项没有通过",toastText2:"已拒绝"};this.changeStatus(n)},updateStatus:function(t,n){Object(h["c"])(t,n).then((function(t){console.log(t)}))},changeStatus:function(t){var n=this.dayBooking.list.findIndex((function(n){return n.id==t.id}));this.dayBooking.list[n].status!=t.status?(this.dayBooking.list[n].status=t.status,this.updateStatus(t.id,t.status),this.$Toast(t.toastText2)):this.$Toast(t.toastText)}},computed:{}},R=N,P=(a("743d"),Object(L["a"])(R,b,p,!1,null,"3c07a443",null)),V=P.exports,z={name:"Category",components:(i={BookContent:V},Object(c["a"])(i,g["a"].name,g["a"]),Object(c["a"])(i,f["a"].name,f["a"]),Object(c["a"])(i,d["a"].name,d["a"]),Object(c["a"])(i,l["a"].name,l["a"]),Object(c["a"])(i,u["a"].name,u["a"]),i),data:function(){return{bookingObj:{todayBooking:{page:0,list:[],loading:!1,refreshing:!1,finished:!1,total:0,time:0},tomBooking:{page:0,list:[],loading:!1,refreshing:!1,finished:!1,total:0,time:20},afterTomBooking:{page:0,list:[],loading:!1,refreshing:!1,finished:!1,total:11,time:23}},list:[],loading:!1,finished:!1,currentDay:"todayBooking",dateSize:10}},methods:{onLoad:function(){this.getBooking(this.currentDay,this.bookingObj[this.currentDay]["time"])},onClickRight:function(){this.$Toast("按钮")},getBooking:function(t,n){var a=this.bookingObj[t],e=a.page+1;Object(h["b"])(e,n).then((function(t){var n;if(a.loading=!1,0!=t.length){var e=t[0].total;a.total=e,(n=a.list).push.apply(n,Object(r["a"])(t)),a.page+=1,a.list.length>=e&&(a.finished=!0)}else a.finished=!0}))},todayClick:function(t){switch(t){case 0:this.currentDay="todayBooking";break;case 1:this.currentDay="tomBooking";break;case 2:this.currentDay="afterTomBooking";break}}},computed:{currentDayData:function(){return this.bookingObj[this.currentDay].list}},mounted:function(){},created:function(){}},A=z,J=(a("2a2b"),Object(L["a"])(A,s,o,!1,null,"71bfa3dc",null));n["default"]=J.exports},c740:function(t,n,a){"use strict";var e=a("23e7"),i=a("b727").findIndex,s=a("44d2"),o="findIndex",r=!0;o in[]&&Array(1)[o]((function(){r=!1})),e({target:"Array",proto:!0,forced:r},{findIndex:function(t){return i(this,t,arguments.length>1?arguments[1]:void 0)}}),s(o)}}]);
//# sourceMappingURL=chunk-681f38c6.9acab387.js.map