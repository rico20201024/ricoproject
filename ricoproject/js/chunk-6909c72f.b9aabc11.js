(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-6909c72f"],{"0795":function(t,e,s){"use strict";s("78d0")},"0de1":function(t,e,s){"use strict";s.d(e,"a",(function(){return i})),s.d(e,"b",(function(){return o}));var n=s("1bab");function i(t){return Object(n["a"])({url:"/vue/VueProjectData/manager/login.php",params:{loginInfo:t}})}function o(t){return Object(n["a"])({url:"/vue/VueProjectData/manager/register.php",params:{registerInfo:t}})}},"0f9e":function(t,e,s){"use strict";s.r(e);var n=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{attrs:{id:"register"}},[n("nav-bar",{staticClass:"register-nav-bar"},[n("div",{staticClass:"icon-left",attrs:{slot:"left"},on:{click:t.backClick},slot:"left"},[n("img",{attrs:{src:s("329f")}})]),n("div",{attrs:{slot:"center"},slot:"center"},[t._v(" 注册 ")])]),n("register-content",{ref:"resform",attrs:{"login-info":t.registerInfo},on:{registerClick:t.registerClick}})],1)},i=[],o=(s("ac1f"),s("5319"),s("00b4"),s("a7ac")),r=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"register-content"},[s("form",{attrs:{action:""}},[s("register-item",{attrs:{"login-info":t.loginInfo,info:t.comInfos},on:{textBlur:t.textBlur}}),s("register-item",{attrs:{"login-info":t.loginInfo,info:t.usernameInfos},on:{textBlur:t.userBlur}}),s("register-item",{attrs:{"login-info":t.loginInfo,info:t.passwordInfos},on:{textBlur:t.passBlur}}),s("register-item",{attrs:{"login-info":t.loginInfo,info:t.emailInfos},on:{textBlur:t.emailBlur}}),s("register-item",{attrs:{"login-info":t.loginInfo,info:t.teleInfos},on:{textBlur:t.teleBlur}}),s("button",{staticClass:"seed-icon",attrs:{type:"button"},on:{click:t.registerClick}},[t._v("注册")])],1),t._m(0)])},a=[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"point"},[t._v("提示： "),s("ul",[s("li",[t._v("1.以上内容为必填信息")]),s("li",[t._v("2.提示2")]),s("li",[t._v("3.提示3")])])])}],c=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("div",{staticClass:"label-box"},[s("label",[s("span",{staticClass:"label-text"},[t._v(t._s(t.info["inputtext"]))]),s("input",{directives:[{name:"model",rawName:"v-model",value:t.loginInfo[t.info["name"]],expression:"loginInfo[info['name']]"}],attrs:{type:"text",name:"info['name']",placeholder:t.info["placeholderText"]},domProps:{value:t.loginInfo[t.info["name"]]},on:{blur:function(e){return t.textBlur(t.loginInfo[t.info["name"]])},input:function(e){e.target.composing||t.$set(t.loginInfo,t.info["name"],e.target.value)}}})])]),s("div",{staticClass:"errinfo",class:{passinfo:t.info["isPass"]},attrs:{slot:"errorinfo"},slot:"errorinfo"},[t._v(t._s(t.info["checkText"]))])])},l=[],f={name:"RegisterItem",components:{},props:{loginInfo:{type:Object,default:function(){return{}}},name:{type:String,default:""},placeholderText:{type:String,default:""},info:{type:Object,default:function(){return{}}}},methods:{textBlur:function(t){this.$emit("textBlur",t)}}},u=f,h=(s("2e87"),s("2877")),m=Object(h["a"])(u,c,l,!1,null,null,null),g=m.exports,p={name:"RegisterContent",components:{RegisterItem:g},props:{loginInfo:{type:Object,default:function(){return{}}}},data:function(){return{usernameInfos:{name:"username",checkText:"",isPass:!1,inputtext:"用户名",placeholderText:"请输入用户名"},passwordInfos:{name:"password",text:"",isPass:!1,inputtext:"密码",checkText:"",placeholderText:"请输入密码"},emailInfos:{name:"email",checkText:"",isPass:!1,inputtext:"邮箱",placeholderText:"请输入邮箱"},comInfos:{name:"company",checkText:"",isPass:!1,inputtext:"公司名",placeholderText:"请输入公司名"},teleInfos:{name:"telephone",checkText:"",isPass:!1,inputtext:"手机号",placeholderText:"请输入手机号"}}},methods:{registerClick:function(){this.$emit("registerClick")},visitorClick:function(){this.$emit("visitorClick")},userBlur:function(t){t.length<3||t.length>8?(this.usernameInfos.isPass=!1,this.usernameInfos.checkText="用户名长度应为3~8个字符"):(this.usernameInfos.isPass=!0,this.usernameInfos.checkText="恭喜,该用户名可以使用")},passBlur:function(t){t.length<6||t.length>30?(this.passwordInfos.isPass=!1,this.passwordInfos.checkText="密码长度应为6~30个字符"):(this.passwordInfos.isPass=!0,this.passwordInfos.checkText="恭喜,密码可以使用")},emailBlur:function(t){var e=/^[a-zA-Z0-9_-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/;if(!e.test(t))return this.emailInfos.isPass=!1,this.emailInfos.checkText="邮箱格式必须为：xxx@xx.com",!1;this.emailInfos.isPass=!0,this.emailInfos.checkText="恭喜,邮箱可以使用"},teleBlur:function(t){if(!/^1[3456789]\d{9}$/.test(t))return this.teleInfos.isPass=!1,this.teleInfos.checkText="手机号码格式不正确",!1;this.teleInfos.isPass=!0,this.teleInfos.checkText="恭喜,手机号可以使用"},textBlur:function(t){t.length<3||t.length>8?(this.comInfos.isPass=!1,this.comInfos.checkText="公司名称长度3~8"):(this.comInfos.isPass=!0,this.comInfos.checkText="合法，可以使用")}}},d=p,x=(s("0795"),Object(h["a"])(d,r,a,!1,null,null,null)),I=x.exports,v=s("0de1"),b={name:"Register",components:{NavBar:o["a"],RegisterContent:I},data:function(){return{registerInfo:{username:"",password:"",telephone:"",email:"",company:"",isCheckPass:!1},message:""}},methods:{registerClick:function(){var t=this,e=this.registerInfo["username"].replace(/\s*/g,""),s=this.registerInfo["password"].replace(/\s*/g,""),n=this.registerInfo["email"].replace(/\s*/g,""),i=this.registerInfo["telephone"].replace(/\s*/g,"");if(""==e)return this.$toast.show("用户名不能为空",1500),!1;if(""==s)return this.$toast.show("密码不能为空",1500),!1;if(""==n)return this.$toast.show("邮箱不能为空",1500),!1;if(""==i)return this.$toast.show("手机号不能为空",1500),!1;if(e.length<2||e.length>8)return this.$toast.show("用户名长度：2 - 8位",1500),!1;if(s.length<6||s.length>18)return this.$toast.show("密码：6 - 18位",1500),!1;var o=/^[a-zA-Z0-9_-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/;return o.test(n)?/^1[3456789]\d{9}$/.test(i)?void Object(v["b"])(this.registerInfo).then((function(e){0==e?(t.$toast.show("注册成功,请登录",1500),t.$router.push("/login").catch((function(t){}))):t.$toast.show(e,1500)})):(this.$toast.show("手机号码格式有误",1500),!1):(this.$toast.show("邮箱格式不正确",1500),!1)},backClick:function(){this.$router.go(-1)},checkInfo:function(){}},created:function(){document.title="登录"}},k=b,w=(s("556f7"),Object(h["a"])(k,n,i,!1,null,"8fedce7a",null));e["default"]=w.exports},"2e87":function(t,e,s){"use strict";s("84e6")},"329f":function(t,e,s){t.exports=s.p+"img/prev2.cc762a0e.svg"},"556f7":function(t,e,s){"use strict";s("fd7c")},"78d0":function(t,e,s){},"84e6":function(t,e,s){},a7ac:function(t,e,s){"use strict";var n=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"nar-bar"},[s("div",{staticClass:"left"},[t._t("left")],2),s("div",{staticClass:"center"},[t._t("center")],2),s("div",{staticClass:"right"},[t._t("right")],2)])},i=[],o={name:"NavBar"},r=o,a=(s("b38e"),s("2877")),c=Object(a["a"])(r,n,i,!1,null,"0e37ea4e",null);e["a"]=c.exports},b38e:function(t,e,s){"use strict";s("b3b5")},b3b5:function(t,e,s){},fd7c:function(t,e,s){}}]);
//# sourceMappingURL=chunk-6909c72f.b9aabc11.js.map