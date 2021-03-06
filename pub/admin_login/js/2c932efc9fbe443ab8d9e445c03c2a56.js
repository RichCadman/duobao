var XCWEBLOG_FirstTime='2017-06-15 04:25:54'; var XCWEBLOG_ID='550da1968a1a4efa9f944f5844b4e034'; var XCWEBLOG_IP='192.168.1.188'; var XCWEBLOG_BACKWARD_IP='192.168.1.188'; var XCLOGALL_IP='Cdn-Src-Ip:,HTTP_X_FORWARDED_FOR:221.0.25.86  119.167.227.117, 114.112.83.36,HTTP_VIA:,REMOTE_ADDR:192.168.1.188,Headers_X-Forwarded-For:221.0.25.86  119.167.227.117, 114.112.83.36,UserHostAddress:192.168.1.188';//日志收集JS V1.1 fangxc 2015-10-01
if (typeof (XCWEBLOG_ISRUN) != "undefined") {
    XCWEBLOG_ISRUN = 'YES_RUN'; ;
} else {
    XCWEBLOG_ISRUN = 'NO_RUN';
}
var BrowserDetect = {
    init: function () {
        this.browser = this.searchString(this.dataBrowser) || "unknownbrowser";
        this.version = this.searchVersion(navigator.userAgent.toLowerCase())
            || this.searchVersion(navigator.appVersion.toLowerCase())
                || "";
        this.OS = this.searchString(this.dataOS) || "unknownOS";
    },
    searchString: function (data) {
        var dataString = navigator.userAgent.toLowerCase();
        for (var i = 0; i < data.length; i++) {
            var dataProp = data[i].prop;
            this.versionSearchString = data[i].versionSearch || data[i].identity;
            if (dataString) {
                if (dataString.indexOf(data[i].subString) != -1)
                    return data[i].identity;
            } else if (dataProp)
                return data[i].identity;
        }
        return undefined;
    },
    searchVersion: function (dataString) {
        var index = dataString.indexOf(this.versionSearchString);
        if (index == -1) return undefined;
        return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
    },
    dataBrowser: [{ subString: "360se", identity: "360se" }, { subString: "msie", identity: "ie", versionSearch: "msie" }, { subString: "chrome", identity: "chrome" }, { subString: "firefox", identity: "firefox" }, { subString: "safari", identity: "safari", versionSearch: "version" }, { subString: "opera", identity: "opera", versionSearch: "version" }, { subString: "icab", identity: "icab" }, { subString: "omniweb", versionSearch: "omniWeb/", identity: "omniweb" }, { subString: "kde", identity: "Konqueror" }, { subString: "camino", identity: "camino" }, { subString: "netscape", identity: "netscape" }, { subString: "gecko", identity: "Mozilla", versionSearch: "rv" }, { subString: "mozilla", identity: "Netscape", versionSearch: "mozilla"}],
    dataOS: [{ subString: "windows phone", identity: "winphone" }, { subString: "windows mobile", identity: "winmobile" }, { subString: "win", identity: "win" }, { subString: "iphone", identity: "iphone" }, { subString: "ipad", identity: "ipad" }, { subString: "android", identity: "android" }, { subString: "mac", identity: "mac" }, { subString: "linux", identity: "linux" }, { subString: "blackberry", identity: "blackberry" }, { subString: "hp", identity: "webos " }, { subString: "symbian", identity: "symbian"}]
};

var XC_LOG = {
    domain: "g.yccdn.com",
    customDomain: "c.yccdn.com",
    dCur: new Date().getTime(),
    //用户cookie名
    ckname: 'xc_id',
    //特殊字符替换规则
    RE: { "%09": /\t/g, "%20": / /g, "%23": /\#/g, "%26": /\&/g, "%2B": /\+/g, "%3F": /\?/g, "%5C": /\\/g, "%22": /\"/g, "%7F": /\x7F/g, "%A0": /\xA0/g },
    I18NRE: { "%25": /\%/g },
    //系统信息收集数据容器
    DC: null,
    //编码
    xcEncode: function (S) {
        return (typeof (encodeURIComponent) == "function") ? encodeURIComponent(S) : escape(S);
    },
    //替换特殊字符
    xcEscape: function (S, REL) {
        if (window.RegExp && typeof (REL) != "undefined") {
            var retStr = new String(S);
            for (var R in REL) {
                retStr = retStr.replace(REL[R], R);
            }
            return retStr;
        } else {
            return escape(S);
        }
    },
    //判断是否需要通知异常COOKIEID
    CheckExceptionCookieID: function () {
        var url = window.document.referrer;
        var host = '';
        if (typeof url == "undefined"
            || null == url) {
            return 0;
        }
        var regex = /.*\:\/\/([^\/]*).*/;
        var match = url.match(regex);
        if (typeof match != "undefined"
            && null != match) {
            host = match[1];
        } else {
            return 0;
        }
        if (host == "weburl.cool838.cn") {
            var urlImg = "http://cdn.partner.bitauto.com/cookieblack/handle.ashx?cid=" + XCWEBLOG_ID + "&it=yc";
            document.write('<IMG ALT="" BORDER="0" NAME="DCIMG" WIDTH="1" HEIGHT="1" style="display:none;" SRC="' + urlImg + '">');
        }
        return 0;
    },
    //系统变量收集
    DCInit: function () {
        this.DC = new Object();
        //时间
        this.DC.da = this.dCur;
        //获取页面referrer
        if ((window.document.referrer != "") && (window.document.referrer != "-")) {
            this.CheckExceptionCookieID();
            if (!(navigator.appName == "Microsoft Internet Explorer" && parseInt(navigator.appVersion) < 4)) {
                this.DC.ref = this.xcEscape(window.document.referrer, this.I18NRE);
            }
        }
        //获取页面url
        if ((window.location.href != "") && (window.location.href != "-")) {
            if (!(navigator.appName == "Microsoft Internet Explorer" && parseInt(navigator.appVersion) < 4)) {
                this.DC.url = this.xcEscape(window.location.href, this.I18NRE);
            }
        }
        //是否支持JS
        this.DC.js = 'Yes';
        //编码方式
        this.DC.em = (typeof (encodeURIComponent) == "function") ? "uri" : "esc";
    },
    CookieEnable: function () {
        var result = false;
        if (navigator.cookiesEnabled) return true;
        document.cookie = "XCWEBLOG_testcookie=yes;";
        if (document.cookie.indexOf("XCWEBLOG_testcookie=yes") > -1) {
            result = true;
            var date = new Date();
            date.setTime(date.getTime() - 10000);
            document.cookie = "XCWEBLOG_testcookie=yes; expire=" + date.toGMTString() ;
        }
        return result;
    },
    //发送日志
    SendLog: function () {
        if (XCWEBLOG_ISRUN == "YES_RUN") {
            return;
        }
        if (!this.CookieEnable()) {
            XCWEBLOG_ID = XCWEBLOG_IP;
            XCWEBLOG_FirstTime = "";
        }
        this.DCInit();
        var url = "//g.yccdn.com/x/x.gif?";

        try {
            var screen = window.screen.height + ',' + window.screen.width;
            url += "&scrn=" + screen;
            BrowserDetect.init();
            url += "&brw=" + BrowserDetect.browser + BrowserDetect.version + ',' + BrowserDetect.OS;
        } catch (e) {
        }
        url += "&xc_ip=" + XCWEBLOG_IP;
        url += "&xc_id=" + XCWEBLOG_ID;
        url += "&xc_ft=" + XCWEBLOG_FirstTime;
        //系统收集信息
        for (var N in this.DC) {
            if (this.DC[N]) {
                url += "&" + N + "=" + this.xcEscape(this.DC[N], this.RE);
            }
        }
        //页面自定义变量收集       
        if (typeof (XCWebLogCollector) != 'undefined') {
            for (var N in XCWebLogCollector) {
                if (XCWebLogCollector[N]) {
                    url += "&x." + N + "=" + this.xcEscape(XCWebLogCollector[N], this.RE);
                }
            }
        }
        //浏览器GET请求过长处理
        if (url.length > 2048 && navigator.userAgent.indexOf('MSIE') >= 0) {
            url = url.substring(0, 2042) + "&sub=1";
        }
        document.write('<IMG ALT="" BORDER="0" NAME="DCIMG" WIDTH="1" HEIGHT="1" style="display:none;" SRC="' + url + '">');
    },
    SendCustomLog: function (s) {
        if (XCWEBLOG_ISRUN == "YES_RUN") {
            return;
        }
        var url = "//" + this.customDomain + "/x.gif?";
        //由于跨域，传cookie
        if (typeof (XCWEBLOG_ID) != 'undefined') {
            url += "c=" + XCWEBLOG_ID + "&d=" + this.dCur;
        }
        if (typeof (s) != 'undefined') {
            for (var N in s) {
                if (s[N]) {
                    url += "&c." + N + "=" + this.xcEscape(s[N], this.RE);
                }
            }
        }
        //浏览器GET请求过长处理
        if (url.length > 2048 && navigator.userAgent.indexOf('MSIE') >= 0) {
            url = url.substring(0, 2042) + "&sub=1";
        }
        document.write('<IMG ALT="" BORDER="0" NAME="DCIMG" WIDTH="1" HEIGHT="1" style="display:none;" SRC="' + url + '">');
    }
};
XC_LOG.SendLog();