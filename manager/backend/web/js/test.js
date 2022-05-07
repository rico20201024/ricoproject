     
            function browserRedirect()
            {
                var browser =
                    {
                        versions: function ()
                        {
                            var u = navigator.userAgent, app = navigator.appVersion;
                            return {//移动终端浏览器版本信息
                                trident: u.indexOf('Trident') > -1, //IE内核
                                presto: u.indexOf('Presto') > -1, //opera内核
                                webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                                mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                                iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器
                                iPad: u.indexOf('iPad') > -1, //是否iPad
                                webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
                            };
                        }(),
                        language: (navigator.browserLanguage || navigator.language).toLowerCase()
                    }
                    if (browser.versions.mobile==false)
                    {
                        document.writeln("你在PC端访问：<br/>");
                        //window.location.href="http://www.baidu.com";
                    }
                    else
                    {
                        document.writeln("你在移动端访问：<br/>");
                        //window.location.href="http://www.sina.com";
                    }
                    document.writeln("语言版本: " + browser.language + "<br/>");
                    document.writeln("是否为移动终端: " + browser.versions.mobile + "<br/>");
                    document.writeln("IOS终端: " + browser.versions.ios+ "<br/>");
                    document.writeln("Android终端: " + browser.versions.android + "<br/>");
                    document.writeln("是否为iPhone: " + browser.versions.iPhone + "<br/>");
                    document.writeln("是否iPad: " + browser.versions.iPad + "<br/>");
                    document.writeln("屏幕分辨率：" + window.screen.width + "x" + window.screen.height + "<br/>");
                    document.writeln("颜色系数：" + window.screen.colorDepth + "位<br/>");
                    document.writeln("是否是webApp框架：" + browser.versions.webApp + "<br/>");
                    document.writeln("是否是webKit内核：" + browser.versions.webKit + "<br/>");
                    document.writeln("Cookie是否可用：" + navigator.cookieEnabled + "<br />");
                    document.writeln("是否在线：" + navigator.onLine + "<br />");
                    document.writeln("userAgent：" + navigator.userAgent);   
						
            }
			
		
