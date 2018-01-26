function initSwiper(index) {
    return new Swiper('.card_box_' + index, {
        effect: 'coverflow',
        slidesPerView: "auto",
        loop: true,
        centeredSlides: true,
        initialSlide: 0,
        slideToClickedSlide: true,
        preloadImages:true,
        updateOnImagesReady : true,
        coverflow: {
            rotate: 0,
            stretch: 20,
            depth: 150,
            modifier: 2,
            slideShadows: true
        },
        onSlideChangeEnd: function () {
            return false;
        },
    })
}
function setTab(id, tab) {
    var tabsSwiper = new Swiper(id, {
        speed: 500,
        onSlideChangeEnd: function () {
        },
        onSlideChangeStart: function () {
            $(tab + " .active").removeClass('active')
            $(tab + " a").eq(tabsSwiper.activeIndex).addClass('active');
            loadlist($(tab + " a").eq(tabsSwiper.activeIndex).data("id"),'1');
        },

    })
    $(tab + " a").on('click', function (e) {
        e.preventDefault()
        $(tab + " .active").removeClass('active')
        $(this).addClass('active')
        tabsSwiper.slideTo($(this).index())
    })

}

var paynum=10;
function chongzhi() {
    paytype=1;
    var load_html='<div class="pop-panel show" id="pay"> ' +
        '<div class="pop-box"> ' +
        '<div class="pop-title">充值<a class="btn close" onclick="chongzhicom()"><i class="iconfont icon-guanbi"></i></a></div> ' +
        '<div class="pop-content pop_buy"> ' +
        '<div class="btn-gards"> ' +
        '<div class="btn-row l_4"> ' +
        '<a class="active" onclick="selpay(0,10)">10元</a> <a  onclick="selpay(1,30)">30元</a> <a  onclick="selpay(2,50)">50元</a> <a  onclick="selpay(3,100)">100元</a> <a  onclick="selpay(4,200)">200元</a> <a  onclick="selpay(5,500)">500元</a> <a  onclick="selpay(6,1000)">1000元</a> <a onclick="selpayn(7)"><input type="tel" onfocus="payfocus(this);" onblur="payblur(this)" placeholder="其它金额"></a> ' +
        '</div> ' +
        '<div class="select-gards"> ' +
        '<div style="margin-top: 10px;">支付方式</div> ' +
        '<div class="select-row l_3"> ' +
        '<div class="l_33"> <a onclick="selpaytt(0,1)" style="line-height: 20px;"  class="active"><img src="/duobao/wzpay.png" width="65%"></a> </div> ' +
        '<div class="l_33"> <a onclick="selpaytt(1,2)" style="line-height: 20px;"><img src="/duobao/zfbpay.png" width="65%"></a> </div> ' +
        '</div> ' +
        '</div> ' +
        '</div> ' +
        '<div class="footer"> ' +
        '<a class="btn btn-primary define" onclick="gotopay()">支付</a> ' +
        '</div> ' +
        '</div> ' +
        '</div><div class="bg"></div>  </div>';
    $("body").append(load_html);
    var qsele=document.querySelector(".pop-panel")
    qsele.addEventListener("touchmove", function(e){
        e.preventDefault();
    })
}

function chongzhicom() {
    var loadingMask = document.getElementById('pay');
    if (!loadingMask) return;
    loadingMask.parentNode.removeChild(loadingMask);
}

function payfocus(o) {
    o.value='';
    o.placeholder='';
}

function payblur(o) {
    if(/^[0-9]*[1-9][0-9]*$/.test(o.value)){
        paynum=o.value;
        o.value=o.value+"元";
    }else{
        o.value='';
        o.placeholder='其它金额';
        selpay(0,1)
    }

}

function selpayn(n) {
    $("#pay .l_4 ").find("a").removeClass("active");
    $("#pay .l_4 a").eq(n).addClass("active");
}
function selpay(n,m) {
    $("#pay .l_4 ").find("a").removeClass("active");
    $("#pay .l_4 a").eq(n).addClass("active");
    $("#pay .l_4 a>input").val('');
    $("#pay .l_4 a>input").attr('placeholder','其它金额');
    paynum=m;
}

function selpaytt(n,m) {
        $("#pay .l_33 ").find("a").removeClass("active");
        $("#pay .l_33 a").eq(n).addClass("active");
        paytype=m;
}


function gotopay() {
    $.post("/index/pay_order/",{paynum:paynum},function (data) {
        chongzhicom();
        if(data.code){
            localStorage.wxpaystate1=1;
            if(paytype==1){
                window.pageManager.gowxpay('wxpay1',data.id,"wxPub")
            }else if(paytype==2){
                window.pageManager.gowxpay('wxpay1',data.id,"alipayQR")
            }
        }else{
            dialog.alert({
                title:"提示",
                msg:'支付失败',
                buttons:['确定']
            })
        }
    },"json");
}


function loadbuy(type,size) {
    cpid=$("."+type+" div.swiper-slide-active").data("id");
    cpsize=size;
    cptype=$("."+type+" div.swiper-slide-active").data("cptype");
    cpnum=5;
    var cp=$("."+type+" div.swiper-slide-active").data("cp");
    var price=$("."+type+" div.swiper-slide-active").data("price");
    cpprice=price;
    cpname=cp;
    ispaygold=1;
    paygoldnum=0;
    buyonline=1;
    paytype=1;
    if(size==2){
        var hao="买双数";
    }
    if(size==1){
        var hao="买单数";
    }
    var load_html='<div class="pop-panel show" id="buy"> ' +
        '<div class="pop-box"> ' +
        '<div class="pop-title">购买<a class="btn close" onclick="loadbuycom()"><i class="iconfont icon-guanbi"></i></a></div> ' +

        '<div class="pop-content pop_buy"> ' +
        '<div class="attrs"> ' +
        '<div>夺宝商品：<span class="text-green" id="buy_type">'+cp+'</span></div> ' +
        '<div>时彩期号：<span class="text-green" id="buy_cqsscid">'+cqsscid+'</span></div> ' +
        '<div>购买：<span class="text-red" id="buy_hao">'+hao+'</span></div> ' +
        '<div>总共需：<span class="text-red"><span id="buy_price">'+cpprice*cpnum+'</span>夺宝币</span></div> ' +
        '</div> ' +
        '<div class="btn-gards"> ' +
        '<div class="btn-row l_4"> ' +
        '<a onclick="selnum(0,1)">1单</a> <a class="active" onclick="selnum(1,5)">5单</a> <a  onclick="selnum(2,10)">10单</a> <a  onclick="selnum(3,20)">20单</a> <a  onclick="selnum(4,50)">50单</a> <a  onclick="selnum(5,80)">80单</a> <a  onclick="selnum(6,100)">100单</a> <a onclick="selshuru(7)"><input type="tel" onfocus="shuruonfocus(this);" onblur="shuruonblur(this)" placeholder="其它数"></a> ' +
        '</div> ' +
        '</div> ' +
        '<div class="select-gards"> ' +
        '<div style="margin-top: 10px;">支付方式</div> ' +
        '<div class="select-row l_3"> ' +
        '<div onclick="selgold()"> <a class="active">使用夺宝币<br><small>余额<i class="gold_y" >'+$(".money .gold").text()+'</i>个</small></a> </div> ' +
        '<div class="l_33"> <a onclick="selpayt(0,1)" style="line-height: 20px;"  class="active"><img src="/duobao/wzpay.png" width="65%"></a> </div> ' +
        '<div class="l_33"> <a onclick="selpayt(1,2)" style="line-height: 20px;"><img src="/duobao/zfbpay.png" width="65%"></a> </div> ' +
        '</div> ' +
        '</div> ' +
        '<div class="prompt_box"> ' +
        '<div class="prompt hide"></div> ' +
        '</div> ' +
        '<div class="buy_title" style="text-align: center;">温馨提示：夺宝有风险，参与需谨慎</div> ' +
        '<div class="footer"> ' +
        '<a class="btn btn-primary define" onclick="buy()">确定</a> ' +
        '</div> ' +
        '</div> ' +
        '</div> <div class="bg"></div> </div>';
    $("body").append(load_html);
    changgold();
    var qsele=document.querySelector(".pop-panel")
    qsele.addEventListener("touchmove", function(e){
        e.preventDefault();
    })
}
function loadbuycom() {
    var loadingMask = document.getElementById('buy');
    if (!loadingMask) return;
    loadingMask.parentNode.removeChild(loadingMask);
}

function shuruonfocus(o) {
    o.value='';
    o.placeholder='';
}

function shuruonblur(o) {
    if(/^[0-9]*[1-9][0-9]*$/.test(o.value)){
        cpnum=o.value;
        $("#buy_price").html(cpprice*o.value);
        o.value=o.value+"单";
        changgold()
    }else{
        o.value='';
        o.placeholder='其它数';
        selnum(0,1)
    }

}

function selshuru(n) {
    $("#buy .l_4 ").find("a").removeClass("active");
    $("#buy .l_4 a").eq(n).addClass("active");
}

function selnum(n,m) {
    $("#buy .l_4 ").find("a").removeClass("active");
    $("#buy .l_4 a").eq(n).addClass("active");
    $("#buy .l_4 a>input").val('');
    $("#buy .l_4 a>input").attr('placeholder','其它数');
    cpnum=m;
    $("#buy_price").text(cpprice*m);
    changgold();
}

function selpayt(n,m) {
        $("#buy .l_33 ").find("a").removeClass("active");
        $("#buy .l_33 a").eq(n).addClass("active");
        paytype=m;
}

function selgold() {
    if(ispaygold){
        ispaygold=0;
        paygoldnum=0;
        paywxnum=cpprice*cpnum;
        $("#buy .l_3 a").eq(0).removeClass("active");
        $("#buy .prompt").html("需支付"+(cpprice*cpnum)+"元")
    }else{
        ispaygold=1;
        $("#buy .l_3 a").eq(0).addClass("active");
        $("#buy .prompt").removeClass("hide");
        if(cpprice*cpnum>parseInt($(".money .gold").text()) && parseInt($(".money .gold").text())>0){
            $("#buy .prompt").html("支付"+parseInt($(".money .gold").text())+"个夺宝币，还需支付"+(cpprice*cpnum-parseInt($(".money .gold").text()))+"元");
            paygoldnum=parseInt($(".money .gold").text());
            paywxnum=cpprice*cpnum-parseInt($(".money .gold").text());
        }else if(parseInt($(".money .gold").text())===0){
            $("#buy .prompt").html("账户夺宝币为0，需支付"+(cpprice*cpnum-parseInt($(".money .gold").text()))+"元");
            paywxnum=cpprice*cpnum;
            paygoldnum=0;
        }else{
            $("#buy .prompt").html("需支付"+(cpprice*cpnum)+"个夺宝币");
            paygoldnum=cpprice*cpnum;
            paywxnum=0;
        }
    }
}

function changgold() {
    if(ispaygold){
        if(cpprice*cpnum>parseInt($(".money .gold").text()) && parseInt($(".money .gold").text())>0){
            $("#buy .prompt").html("支付"+parseInt($(".money .gold").text())+"个夺宝币，还需微信支付"+(cpprice*cpnum-parseInt($(".money .gold").text()))+"元");
            paygoldnum=parseInt($(".money .gold").text());
            paywxnum=cpprice*cpnum-parseInt($(".money .gold").text());
        }else if(parseInt($(".money .gold").text())===0){
            $("#buy .prompt").html("账户夺宝币为0，需微信支付"+(cpprice*cpnum)+"元");
            paywxnum=cpprice*cpnum;
            paygoldnum=0
        }else{
            $("#buy .prompt").html("需支付"+(cpprice*cpnum)+"个夺宝币");
            paygoldnum=cpprice*cpnum;
            paywxnum=0;
        }
    }else{
        $("#buy .prompt").html("微信支付"+(cpprice*cpnum)+"元")
    }
}

function loadbuyok(orderid,size,cptype) {
    var load_html='<div class="pop-panel show" id="buyok"><div style="width: 70%; margin: 50% auto;"><a href="javascript:loadbuyokcom();" class="btn btn-primary" style="width: 100%; background-color: #fff;height: 40px; line-height: 40px">继续购买</a><a href="javascript:loadbuyokcom();window.pageManager.goo(\'look_order\',\''+orderid+'\','+size+','+cptype+');" class="btn btn-primary" style="width: 100%; background-color: #fff; padding: 0 10px;height: 40px; line-height: 40px; margin-top: 10px;">查看结果</a></div><div class="bg"></div> </div>'
    $("body").append(load_html);
    var qsele=document.querySelector(".pop-panel")
    qsele.addEventListener("touchmove", function(e){
        e.preventDefault();
    })
}

function loadbuyokcom() {
    var loadingMask = document.getElementById('buyok');
    if (!loadingMask) return;
    loadingMask.parentNode.removeChild(loadingMask);
}

function buy() {
    if(cpnum>100){
        alert("最多购买100单");
        return false;
    }
    if(buyonline){
        buyonline=0;
    }else{
        return false;
    }
    $.post("/index/put_order/",{cpname:cpname,size:cpsize,cpnum:cpnum,cpid:cpid,cptype:cptype,cpprice:cpprice,paygoldnum:paygoldnum,paywxnum:paywxnum},function (data) {
        loadbuycom();
        buyonline=1;
        var orderid=data.orderid;
        var size=data.size;
        if(data.code==1){
            localStorage.wxpaystate=1;
            if(paytype==1){
                window.pageManager.gowxpay('wxpay',data.orderid,data.size,data.cpid,data.cqsscid,data.paygoldnum)
            }else if(paytype==2){
                window.pageManager.gowxpay('zhbpay',data.orderid,data.size,data.cpid,data.cqsscid,data.paygoldnum)
            }
        }else if(data.code==2){
            var gold=parseInt($(".money .gold").text())-cpprice*cpnum
            $(".money .gold").text(gold);
            $(".gold_y").text(gold);
            loadbuyok(orderid,size,cpid)
        }else if(data.code==3){
            chongzhi2()
        }else{
            dialog.alert({
                title:"提示",
                msg:data.msg,
                buttons:['确定']
            })
        }
    },"json")
}

function chongzhicom2() {
    var loadingMask = document.getElementById('chongzhi2');
    if (!loadingMask) return;
    loadingMask.parentNode.removeChild(loadingMask);
}
function chongzhi2() {
    var load_html='<div class="pop-panel show" id="chongzhi2"> ' +
        '<div class="pop-box1"> ' +
        '<div class="pop-title">为保障资金安全<a class="btn close" onclick="chongzhicom2()"><i class="iconfont icon-guanbi"></i></a></div> ' +
        '<div class="pop-content pop_buy"> ' +
        '<div class="btn-gards"> ' +
        '<div class="btn-row l_4"> ' +
        '<p style="font-size: 14px; color: #FF0000; text-align: center">请联系客服充值</p>' +
        '<img src="http://ask.dfcbos.com/duobao/czwx4.jpg" width="100%">' +
        '</div> ' +
        '</div> ' +
        '<div class="footer"> ' +
        '<a class="btn btn-primary define" onclick="chongzhicom2()">知道了</a> ' +
        '</div> ' +
        '</div> ' +
        '</div><div class="bg"></div>  </div>';
    $("body").append(load_html);
    var qsele=document.querySelector(".pop-panel")
    qsele.addEventListener("touchmove", function(e){
        e.preventDefault();
    })
}

function tCDThml(element){
    element.html('准备开始下一期...<br><span class="mini"></span>分<span class="sec"></span>秒<span class="hm"></span>');
}
var times;
var _d;
var o;
function djs(o) {
    $(o).each(function(){
        var $this = $(this);
        _d = localStorage.lasttime;
        o = {
            hm: $this.find(".hm"),
            sec: $this.find(".sec"),
            mini: $this.find(".mini"),
            hour: $this.find(".hour"),
        };
        var f = {
            haomiao: function(n){
                if(n < 10)return "00" + n.toString();
                if(n < 100)return "0" + n.toString();
                return n.toString();
            },
            zero: function(n){
                var _n = parseInt(n, 10);//解析字符串,返回整数
                if(_n > 0){
                    if(_n <= 9){
                        _n = "0" + _n
                    }
                    return String(_n);
                }else{
                    return "00";
                }
            },
            dv: function(){
                var now = new Date(),
                    endDate = new Date(_d);
                var dur = (endDate - now.getTime()) / 1000 , mss = endDate - now.getTime() ,pms = {
                    hm:"000",
                    sec: "00",
                    mini: "00",
                    hour: "00"
                };
                if(mss > 0){
                    pms.hm = f.haomiao(mss % 1000);
                    pms.sec = f.zero(dur % 60);
                    pms.mini = Math.floor((dur / 60)) > 0? f.zero(Math.floor((dur / 60)) % 60) : "00";
                    pms.hour = Math.floor((dur / 3600)) > 0? f.zero(Math.floor((dur / 3600)) % 24) : "00";
                }else{
                    clearTimeout(times)
                    o = {
                        hm: false,
                        sec: false,
                        mini: false,
                        hour: false
                    };
                    tCDThml($this);
                    setTimeout(function(){
                        $.get("/index/gettime/",function (data) {
                            _d=data.time;
                            localStorage.lasttime=data.time;
                            $this.html(data.fntime);
                            o = {
                                hm: $this.find(".hm"),
                                sec: $this.find(".sec"),
                                mini: $this.find(".mini"),
                                hour: $this.find(".hour")
                            };
                            f.ui();
                            cqsscid=data.cqsscid;
                            cqsscid_s=data.cqsscid_s;
                            $("#buy_cqsscid").html(data.cqsscid);
                            clearTimeout(cqsscid_s_settime);
                            cqsscid_s_fun()
                        },"json")
                    },2000);
                    pms.hm = "00";
                    pms.sec = "00";
                    pms.mini = "00";
                    pms.hour = "00";
                }
                return pms;
            },
            ui: function(){
                if(o.hm){
                    o.hm.html(f.dv().hm);
                }
                if(o.sec){
                    o.sec.html(f.dv().sec);
                }
                if(o.mini){
                    o.mini.html(f.dv().mini);
                }
                if(o.hour){
                    o.hour.html(f.dv().hour);
                }
                times=setTimeout(f.ui, 1);
            }
        };
        f.ui();
    });
}
$.extend($.fn,{
    fnTimeCountDown:function(asas){
        this.each(function(){
            var $this = $(this);
            _d = localStorage.lasttime;
            o = {
                hm: $this.find(".hm"),
                sec: $this.find(".sec"),
                mini: $this.find(".mini"),
                hour: $this.find(".hour"),
            };
            var f = {
                haomiao: function(n){
                    if(n < 10)return "00" + n.toString();
                    if(n < 100)return "0" + n.toString();
                    return n.toString();
                },
                zero: function(n){
                    var _n = parseInt(n, 10);//解析字符串,返回整数
                    if(_n > 0){
                        if(_n <= 9){
                            _n = "0" + _n
                        }
                        return String(_n);
                    }else{
                        return "00";
                    }
                },
                dv: function(){
                    var now = new Date(),
                        endDate = new Date(_d);
                    var dur = (endDate - now.getTime()) / 1000 , mss = endDate - now.getTime() ,pms = {
                        hm:"000",
                        sec: "00",
                        mini: "00",
                        hour: "00"
                    };
                    if(mss > 0){
                        pms.hm = f.haomiao(mss % 1000);
                        pms.sec = f.zero(dur % 60);
                        pms.mini = Math.floor((dur / 60)) > 0? f.zero(Math.floor((dur / 60)) % 60) : "00";
                        pms.hour = Math.floor((dur / 3600)) > 0? f.zero(Math.floor((dur / 3600)) % 24) : "00";
                    }else{
                        clearTimeout(times)
                        o = {
                            hm: false,
                            sec: false,
                            mini: false,
                            hour: false
                        };
                        asas($this);
                        setTimeout(function(){
                            $.get("/index/gettime/",function (data) {
                                _d=data.time;
                                localStorage.lasttime=data.time;
                                $this.html(data.fntime);
                                o = {
                                    hm: $this.find(".hm"),
                                    sec: $this.find(".sec"),
                                    mini: $this.find(".mini")
                                    ,
                                    hour: $this.find(".hour")
                                };
                                f.ui();
                                cqsscid=data.cqsscid;
                                cqsscid_s=data.cqsscid_s;
                                $("#buy_cqsscid").html(data.cqsscid);
                                clearTimeout(cqsscid_s_settime);
                                cqsscid_s_fun()
                            },"json")
                        },2000);
                        pms.hm = "00";
                        pms.sec = "00";
                        pms.mini = "00";
                        pms.hour = "00";
                    }
                    return pms;
                },
                ui: function(){
                    if(o.hm){
                        o.hm.html(f.dv().hm);
                    }else{
                        clearTimeout(times)
                    }
                    if(o.sec){
                        o.sec.html(f.dv().sec);
                    }else{
                        clearTimeout(times)
                    }
                    if(o.mini){
                        o.mini.html(f.dv().mini);
                    }else{
                        clearTimeout(times)
                    }
                    if(o.hour){
                        o.hour.html(f.dv().hour);
                    }else{
                        clearTimeout(times)
                    }
                    times=setTimeout(f.ui, 1);
                }
            };
            f.ui();
        });
    }
});

function relu() {
    setTimeout(function () {
        dialog.alert({
            title:"夺宝规则",
            msg:'<img src="/duobao/guizhe.jpg" width="100%" style="min-height: 200px;">',
            buttons:['知道了']
        })
    },500)

}