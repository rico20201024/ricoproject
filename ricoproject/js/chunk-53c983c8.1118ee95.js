(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-53c983c8"],{"0097":function(t,n,e){"use strict";e("a5a1")},"0de1":function(t,n,e){"use strict";e.d(n,"a",(function(){return o})),e.d(n,"b",(function(){return s}));var i=e("1bab");function o(t){return Object(i["a"])({url:"/vue/VueProjectData/manager/login.php",params:{loginInfo:t}})}function s(t){return Object(i["a"])({url:"/vue/VueProjectData/manager/register.php",params:{registerInfo:t}})}},1691:function(t,n,e){},"3e31":function(t,n,e){"use strict";e("1691")},a5a1:function(t,n,e){},a7ac:function(t,n,e){"use strict";var i=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"nar-bar"},[e("div",{staticClass:"left"},[t._t("left")],2),e("div",{staticClass:"center"},[t._t("center")],2),e("div",{staticClass:"right"},[t._t("right")],2)])},o=[],s={name:"NavBar"},a=s,r=(e("b38e"),e("2877")),c=Object(r["a"])(a,i,o,!1,null,"0e37ea4e",null);n["a"]=c.exports},b38e:function(t,n,e){"use strict";e("b3b5")},b3b5:function(t,n,e){},ede4:function(t,n,e){"use strict";e.r(n);var i=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{attrs:{id:"login"}},[e("nav-bar",{staticClass:"login-nav-bar"},[e("div",{staticClass:"icon-left",attrs:{slot:"left"},on:{click:t.backClick},slot:"left"}),e("div",{attrs:{slot:"center"},slot:"center"},[t._v(" 登录 ")])]),e("login-content",{attrs:{"login-info":t.loginInfo},on:{visitorClick:t.visitorClick,loginClick:t.loginClick}})],1)},o=[],s=e("a7ac"),a=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"login-content"},[e("form",{attrs:{action:""}},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.loginInfo.username,expression:"loginInfo.username"}],attrs:{type:"text",name:"username",placeholder:"请输入用户名"},domProps:{value:t.loginInfo.username},on:{input:function(n){n.target.composing||t.$set(t.loginInfo,"username",n.target.value)}}}),e("input",{directives:[{name:"model",rawName:"v-model",value:t.loginInfo.password,expression:"loginInfo.password"}],attrs:{type:"password",name:"password",placeholder:"请输入密码"},domProps:{value:t.loginInfo.password},on:{input:function(n){n.target.composing||t.$set(t.loginInfo,"password",n.target.value)}}}),e("button",{staticClass:"seed-icon",attrs:{type:"button"},on:{click:t.loginClick}},[t._v("登录")])]),e("div",{staticClass:"x"},[t._v("联系我 "),e("span",{staticClass:"clickright register",on:{click:t.regClick}},[t._v("立即注册")]),e("span",{staticClass:"clickright ",on:{click:t.visitorClick}},[t._v("体验登录")])])])},r=[],c={name:"LoginContent",components:{},props:{loginInfo:{type:Object,default:function(){return{}}}},methods:{loginClick:function(){this.$emit("loginClick")},visitorClick:function(){this.$emit("visitorClick")},regClick:function(){this.$router.push("/register").catch((function(t){}))}}},l=c,u=(e("3e31"),e("2877")),f=Object(u["a"])(l,a,r,!1,null,null,null),g=f.exports,p=e("0de1"),d={name:"Login",components:{NavBar:s["a"],LoginContent:g},data:function(){return{loginInfo:{username:"",password:""},message:""}},methods:{loginClick:function(){var t=this;return this.loginInfo.username&&this.loginInfo.password?this.loginInfo.username.length<2||this.loginInfo.username.length>18?(this.$toast.show("用户名长度：2~18字符",2e3),!1):this.loginInfo.password.length<6||this.loginInfo.password.length>18?(this.$toast.show("密码长度：6~18字符",2e3),!1):void Object(p["a"])(this.loginInfo).then((function(n){0===n.status?(t.$store.dispatch("setToken",n.token),t.$store.dispatch("setUser",n.username),t.loginInfo.username="",t.loginInfo.password="",t.$router.push("/mine").catch((function(t){})),t.$toast.show("欢迎登录,"+n.username,2e3)):t.$toast.show(n.message,2e3)})):(this.$toast.show("账号或者密码不能为空",2e3),!1)},visitorClick:function(){this.loginInfo.username="测试",this.loginInfo.password="123456",this.loginClick()},backClick:function(){this.$router.go(-1)}},created:function(){document.title="登录"}},h=d,m=(e("0097"),Object(u["a"])(h,i,o,!1,null,"36bd4bb6",null));n["default"]=m.exports}}]);
//# sourceMappingURL=chunk-53c983c8.1118ee95.js.map