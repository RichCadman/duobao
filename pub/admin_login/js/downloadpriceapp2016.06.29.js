var DownloadPriceApp = {
    cookieName: 'wapPriceApp',
    tipId: '',
    getCookie: function (name) {
        var ck = document.cookie;
        var exp1 = new RegExp(name + "=.*?(?=;|$)");
        var mch = ck.match(exp1);
        return mch ? unescape(mch[0].substring(name.length + 1)) : null;
    },
    //写入cookie
    setCookie: function (name, value, expires) {
        document.cookie = name + "=" + escape(value) +
				((expires) ? "; expires=" + expires.toGMTString() : "") +
				("; path=/;domain=yiche.com");
    },
    getCookieExpire: function () {
        var exp = new Date();
        exp.setTime(exp.getTime() + 24 * 60 * 60 * 1000); //一天
        return exp;
    },
    $: function (id) {
        return document.getElementById(id);
    },
    showTip: function (tipId) {
        var times = this.getCookie(this.cookieName);
        if (times == null) {
            var tip = this.$(tipId);
            tip.style.display = "";
            var ua = navigator.userAgent;
            var app = navigator.appVersion;
           
            if (/(360.*?browser)/i.test(ua)||/(qhbrowser)/i.test(ua)||/(vivo)/i.test(ua)) {
                    tip.style.display = "none";
            }
			if(/(mqqbrowser)/i.test(ua))
			{
				 tip.style.display = "none";
			}
            var url = window.location.href;
            if (url.indexOf("m.qichetong.com") > -1 
			|| url == 'http://m.yiche.com/'
			||/(m.yiche.com\/\?WT.mc_id=.*?)/i.test(url)) 
			{
                tip.style.display = "none";
            }
			
			if(typeof ( global_app_download)!='undefined')
			{
				if(global_app_download==false)
					tip.style.display = "none";
			}
        }
    },
    close: function () {
        DownloadPriceApp.$(DownloadPriceApp.tipId).style.display = "none";
        DownloadPriceApp.setCookie(DownloadPriceApp.cookieName, 1, DownloadPriceApp.getCookieExpire());
    },
    addEvent: function (obj, eventType, func) {
        if(obj!=null)
		{
			if (obj.addEventListener) {
				obj.addEventListener(eventType, func, false);
			} else if (obj.attachEvent) {
				obj.attachEvent("on" + eventType, func);
			}
		}
    },
    init: function (tipId, closeBtn) {
        this.tipId = tipId;
        if (!this.$(tipId)) return;
        this.showTip(tipId);
		this.addEvent(this.$(closeBtn), 'click', DownloadPriceApp.close);
	
    }
};
