/**
 * Created by jf on 2015/9/11.
 * Modified by bear on 2016/9/7.
 */
$(function () {
    var pageManager = {
        $container: $('#container'),
        _pageStack: [],
        _configs: [],
        _pageAppend: function(){},
        _defaultPage: null,
        _pageIndex: 1,
        setDefault: function (defaultPage) {
            this._defaultPage = this._find('name', defaultPage);
            return this;
        },
        setPageAppend: function (pageAppend) {
            this._pageAppend = pageAppend;
            return this;
        },
        init: function () {
            var self = this;
            $(window).on('hashchange', function () {
                var state = history.state || {};
                var url = location.hash.indexOf('#') === 0 ? location.hash.split("&")[0] : '#home';
                var page = self._find('url', url) || self._defaultPage;
                if (state._pageIndex <= self._pageIndex || self._findInStack(url)) {
                    self._back(page);
                } else {
                    self._go(page);
                }
            });

            if (history.state && history.state._pageIndex) {
                this._pageIndex = history.state._pageIndex;
            }

            this._pageIndex--;

            var url = location.hash.indexOf('#') === 0 ? location.hash.split("&")[0] : '#home';
            var page = self._find('url', url) || self._defaultPage;
            this._go(page);
            return this;
        },
        push: function (config) {
            this._configs.push(config);
            return this;
        },
        go: function (to,id) {
            var config = this._find('name', to);
            var id=arguments[1]?"&"+encodeURIComponent(arguments[1]):'';
            if (!config) {
                return;
            }
            location.hash = config.url+id;
        },
        goo: function (to,id,id2,id3) {
            var config = this._find('name', to);
            var id=arguments[1]?"&"+encodeURIComponent(arguments[1]):'';
            if (!config) {
                return;
            }
            location.hash = config.url+id+"&"+id2+"&"+id3;
        },
        gooo: function (to,id,id2,id3,id4,id5,id6) {
            var config = this._find('name', to);
            var id=arguments[1]?"&"+encodeURIComponent(arguments[1]):'';
            var id2=arguments[2]?"&"+encodeURIComponent(arguments[2]):'';
            var id3=arguments[3]?"&"+encodeURIComponent(arguments[3]):'';
            var id4=arguments[4]?"&"+encodeURIComponent(arguments[4]):'';
            var id5=arguments[5]?"&"+encodeURIComponent(arguments[5]):'';
            var id6=arguments[6]?"&"+encodeURIComponent(arguments[6]):'';
            if (!config) {
                return;
            }
            location.hash = config.url+id+id2+id3+id4+id5+id6;
        },
        gowxpay: function (to,id,id2,id3,id4,id5) {
            var config = this._find('name', to);
            var id=arguments[1]?"&"+encodeURIComponent(arguments[1]):'';
            var id2=arguments[2]?"&"+encodeURIComponent(arguments[2]):'';
            var id3=arguments[3]?"&"+encodeURIComponent(arguments[3]):'';
            var id4=arguments[4]?"&"+encodeURIComponent(arguments[4]):'';
            var id5=arguments[5]?"&"+encodeURIComponent(arguments[5]):'';
            if (!config) {
                return;
            }
            location.hash = config.url+id+id2+id3+id4+id5;
        },
        goooo: function (to) {
            var config = this._find('name', to);
            if (!config) {
                return;
            }
            location.hash = config.url;
            location.reload(true)
        },
        _go: function (config) {
            var self=this;
            $.each(this._pageStack, function(index, item){
                if (item.config.name!=config.name) {
                    item.dom.addClass('slideOutc').on('animationend webkitAnimationEnd', function () {
                        item.dom.remove();
                    });
                    self._pageStack.splice(index,1);
                }
            })
//          var html = $(config.template).html();
     //       var $html = $(html).addClass('slideIn').addClass(config.name);
            $html.on('animationend webkitAnimationEnd', function(){
                $html.removeClass('slideIn').addClass('js_show');
            });
            this.$container.append($html);
            this._pageAppend.call(this, $html);
            this._pageStack.push({
                config: config,
                dom: $html
            });
            if (!config.isBind) {
                this._bind(config);
            }

            return this;
        },
        back: function () {
            history.back();
        },
        _back: function (config) {
            this._pageIndex --;
            var stack = this._pageStack.pop();
            if (!stack) {
                return;
            }
            var url = location.hash.indexOf('#') === 0 ? location.hash.split("&")[0] : '#home';
            var found = this._findInStack(url);
            if (!found && stack.config.name!=config.name) {
                var html = $(config.template).html();
                var $html = $(html).addClass('js_show').addClass(config.name);
                $html.insertBefore(stack.dom);
                if (!config.isBind) {
                    this._bind(config);
                }
                this._pageStack.push({
                    config: config,
                    dom: $html
                });
                stack.dom.addClass('slideOut').on('animationend webkitAnimationEnd', function () {
                    stack.dom.remove();
                });
            }else if (stack.config.name==config.name){
                stack.dom.remove();
                var html = $(config.template).html();
                var $html = $(html).addClass('js_show').addClass(config.name);
                this.$container.append($html);
                if (!config.isBind) {
                    this._bind(config);
                }
                this._pageStack.push({
                    config: config,
                    dom: $html
                });
            }else{
                if(config.name=="home" || config.name=="doctorlist" || config.name=="asklist" || config.name=="wdfw"){
                    stack.dom.addClass('slideOut').on('animationend webkitAnimationEnd', function () {
                        stack.dom.remove();
                    });
                    var self=this;
                    $.each(this._pageStack, function(index, item){
                        if (item.config.name!=config.name) {
                            item.dom.addClass('slideOutc').on('animationend webkitAnimationEnd', function () {
                                item.dom.remove();
                            });
                            self._pageStack.splice(index,1);
                        }
                    })
                }else{
                    stack.dom.addClass('slideOut').on('animationend webkitAnimationEnd', function () {
                        stack.dom.remove();
                    });
                }
            }
            this._pageAppend.call(this, $html);
            return this;
        },
        _findInStack: function (url) {
            var found = null;
            for(var i = 0, len = this._pageStack.length; i < len; i++){
                var stack = this._pageStack[i];
                if (stack.config.url === url) {
                    found = stack;
                    break;
                }
            }
            return found;
        },
        _find: function (key, value) {
            var page = null;
            for (var i = 0, len = this._configs.length; i < len; i++) {
                if (this._configs[i][key] === value) {
                    page = this._configs[i];
                    break;
                }
            }
            return page;
        },
        _bind: function (page) {
            var events = page.events || {};
            for (var t in events) {
                for (var type in events[t]) {
                    this.$container.on(type, t, events[t][type]);
                }
            }
            page.isBind = true;
        }
    };

    function fastClick(){
        var supportTouch = function(){
            try {
                document.createEvent("TouchEvent");
                return true;
            } catch (e) {
                return false;
            }
        }();
        var _old$On = $.fn.on;

        $.fn.on = function(){
            if(/click/.test(arguments[0]) && typeof arguments[1] == 'function' && supportTouch){ // 只扩展支持touch的当前元素的click事件
                var touchStartY, callback = arguments[1];
                _old$On.apply(this, ['touchstart', function(e){
                    touchStartY = e.changedTouches[0].clientY;
                }]);
                _old$On.apply(this, ['touchend', function(e){
                    if (Math.abs(e.changedTouches[0].clientY - touchStartY) > 10) return;
                    e.preventDefault();
                    callback.apply(this, [e]);
                }]);
            }else{
                _old$On.apply(this, arguments);
            }
            return this;
        };
    }
    function preload(){
        $(window).on("load", function(){
            var imgList = [
                "/duobao/YDK100.png",
                "/duobao/JDK100.png",
                "/duobao/JYK100.png",
                "/duobao/YDK50.png",
                "/duobao/JDK50.png",
                "/duobao/JYK50.png",
                "/duobao/YDK20.png",
                "/duobao/JDK20.png",
                "/duobao/JYK20.png",
                "/duobao/guizhe.jpg",
                "/duobao/kfwx.jpg",
                "/duobao/czwx4.jpg"
            ];
            for (var i = 0, len = imgList.length; i < len; ++i) {
                new Image().src = imgList[i];
            }
        });
    }
    function androidInputBugFix(){
        // .container 设置了 overflow 属性, 导致 Android 手机下输入框获取焦点时, 输入法挡住输入框的 bug
        // 相关 issue: https://github.com/weui/weui/issues/15
        // 解决方法:
        // 0. .container 去掉 overflow 属性, 但此 demo 下会引发别的问题
        // 1. 参考 http://stackoverflow.com/questions/23757345/android-does-not-correctly-scroll-on-input-focus-if-not-body-element
        //    Android 手机下, input 或 textarea 元素聚焦时, 主动滚一把
        if (/Android/gi.test(navigator.userAgent)) {
            window.addEventListener('resize', function () {
                if (document.activeElement.tagName == 'INPUT' || document.activeElement.tagName == 'TEXTAREA') {
                    window.setTimeout(function () {
                        document.activeElement.scrollIntoViewIfNeeded();
                    }, 0);
                }
            })
        }
    }
    function setPageManager(){
        var pages = {}, tpls = $('script[type="text/html"]');
        for (var i = 0, len = tpls.length; i < len; ++i) {
            var tpl = tpls[i], name = tpl.id.replace(/tpl_/, '');
            pages[name] = {
                name: name,
                url: '#' + name,
                template: '#' + tpl.id
            };
        }

        //pages.home.url = '#home';
        for (var page in pages) {
            pageManager.push(pages[page]);
        }
        pageManager
            .setPageAppend(function($html){
                var url = location.hash.indexOf('#') === 0 ? location.hash.split("&")[0] : '#home';
                $("#footer .aui-bar-tab-item").each(function(){
                    if(url=="#"+$(this).data('id')){
                        $(this).addClass("aui-active");
                    }else{
                        $(this).removeClass("aui-active");
                    }
                });

            })
            .setDefault('home')
            .init();
    }

    function init(){
        preload();
        fastClick();
        androidInputBugFix();
        setPageManager();

        window.pageManager = pageManager;
        window.home = function(){
            location.hash = '#home';
        };
    }
    init();
});

$.fn.scrollTo =function(options){
    var defaults = {
        toT : 0,    //滚动目标位置
        durTime : 1000,  //过渡动画时间
        delay : 10,     //定时器时间
        callback:null   //回调函数
    };
    var opts = $.extend(defaults,options),
        timer = null,
        _this = this,
        curTop = _this.scrollTop(),//滚动条当前的位置
        subTop = opts.toT - curTop,    //滚动条目标位置和当前位置的差值
        index = 0,
        dur = Math.round(opts.durTime / opts.delay),
        smoothScroll = function(t){
            index++;
            var per = Math.round(subTop/dur);
            if(index >= dur){
                _this.scrollTop(t);
                window.clearInterval(timer);
                if(opts.callback && typeof opts.callback == 'function'){
                    opts.callback();
                }
                return;
            }else{
                _this.scrollTop(curTop + index*per);
            }
        };
    timer = window.setInterval(function(){
        smoothScroll(opts.toT);
    }, opts.delay);
    return _this;
};