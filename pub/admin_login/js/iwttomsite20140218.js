﻿(function (G,D,s,c,p) {
c={//监测配置
UA:"UA-yiche-000001", //客户项目编号,由系统生成
NO_FLS:0,//是否使用Flash LocalStorage，默认为0开启，1表示不使用
WITH_REF: location.host.toLowerCase() === "photo.m.yiche.com" ? 1 :  0,//是否监测当前页面的Referrer参数，默认为0不监测，1表示监测
URL:('https:' == document.location.protocol ? 'https://' : 'http://') + 'img1.bitautoimg.com/stat/iwt-min-bitauto.js?v=20170112.1'//iwt.js的URL位置，如需客户托管JS文件，只需修改此值
};
G._iwt?G._iwt.track(c,p):(G._iwtTQ=G._iwtTQ || []).push([c,p]),!G._iwtLoading && lo();
function lo(t) {
G._iwtLoading=1;s=D.createElement("script");s.src=c.URL;
t=D.getElementsByTagName("script");t=t[t.length-1];
t.parentNode.insertBefore(s,t);
}
})(this,document);