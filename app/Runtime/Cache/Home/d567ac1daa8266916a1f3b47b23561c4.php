<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <title>我的生活</title> 
  <meta name="viewport" content="initial-scale=1, maximum-scale=1" /> 
  <link rel="shortcut icon" href="/favicon.ico" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black" /> 
  <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css" /> 
  <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css" /> 
  <style type="text/css">
    .icon {
       width: 1.5em; height: 1.5em;
       vertical-align: -0.15em;
       fill: currentColor;
       overflow: hidden;
    }
</style>
 </head> 
 <body> 
  <div class="page-group"> 
   <div class="page page-current"> 
    <!-- 你的html代码 --> 
    <header class="bar bar-nav"> 
      
     <h1 class="title">天天夺宝半价</h1> 
    </header> 
    <nav class="bar bar-tab"> 
     <a class="tab-item active" href="#"> 
        <svg class="icon" aria-hidden="true" style="fill:red">
            <use xlink:href="#icon-duobaozhongjiang"></use>
        </svg>
      <span class="tab-label">夺宝</span> </a> 
     <a class="tab-item" href="#"> <span class="icon icon-me"></span> <span class="tab-label">风云榜</span> </a> 
     <a class="tab-item" href="#"> <span class="icon icon-star"></span> <span class="tab-label">开奖</span> </a> 
     <a class="tab-item" href="#"> <span class="icon icon-settings"></span> <span class="tab-label">我的</span> </a> 
    </nav> 
    <div class="content"> 
     <!-- 这里是页面内容区 --> 
     <view class="page" xmlns:wx="http://www.w3.org/1999/xhtml">
    <view class="page__hd">
        <view class="page__title">Input</view>
        <view class="page__desc">表单输入</view>
    </view>
    <view class="page__bd">
        <view class="weui-toptips weui-toptips_warn" wx:if="{{showTopTips}}">错误提示</view>

        <view class="weui-cells__title">单选列表项</view>
        <view class="weui-cells weui-cells_after-title">
            <radio-group bindchange="radioChange">
                <label class="weui-cell weui-check__label" wx:for="{{radioItems}}" wx:key="value">
                    <radio class="weui-check" value="{{item.value}}" checked="{{item.checked}}"/>

                    <view class="weui-cell__bd">{{item.name}}</view>
                    <view class="weui-cell__ft weui-cell__ft_in-radio" wx:if="{{item.checked}}">
                        <icon class="weui-icon-radio" type="success_no_circle" size="16"></icon>
                    </view>
                </label>
            </radio-group>
            <view class="weui-cell weui-cell_link">
                <view class="weui-cell__bd">添加更多</view>
            </view>
        </view>

        <view class="weui-cells__title">复选列表项</view>
        <view class="weui-cells weui-cells_after-title">
            <checkbox-group bindchange="checkboxChange">
                <label class="weui-cell weui-check__label" wx:for="{{checkboxItems}}" wx:key="value">
                    <checkbox class="weui-check" value="{{item.value}}" checked="{{item.checked}}"/>

                    <view class="weui-cell__hd weui-check__hd_in-checkbox">
                        <icon class="weui-icon-checkbox_circle" type="circle" size="23" wx:if="{{!item.checked}}"></icon>
                        <icon class="weui-icon-checkbox_success" type="success" size="23" wx:if="{{item.checked}}"></icon>
                    </view>
                    <view class="weui-cell__bd">{{item.name}}</view>
                </label>
            </checkbox-group>
            <view class="weui-cell weui-cell_link">
                <view class="weui-cell__bd">添加更多</view>
            </view>
        </view>

        <view class="weui-cells__title">表单</view>
        <view class="weui-cells weui-cells_after-title">
            <view class="weui-cell weui-cell_input">
                <view class="weui-cell__hd">
                    <view class="weui-label">qq</view>
                </view>
                <view class="weui-cell__bd">
                    <input class="weui-input" placeholder="请输入qq"/>
                </view>
            </view>
            <view class="weui-cell weui-cell_input weui-cell_vcode">
                <view class="weui-cell__hd">
                    <view class="weui-label">手机号</view>
                </view>
                <view class="weui-cell__bd">
                    <input class="weui-input" placeholder="请输入手机号" />
                </view>
                <view class="weui-cell__ft">
                    <view class="weui-vcode-btn">获取验证码</view>
                </view>
            </view>
            <view class="weui-cell weui-cell_input">
                <view class="weui-cell__hd">
                    <view class="weui-label">日期</view>
                </view>
                <view class="weui-cell__bd">
                    <picker mode="date" value="{{date}}" start="2015-09-01" end="2017-09-01" bindchange="bindDateChange">
                        <view class="weui-input">{{date}}</view>
                    </picker>
                </view>
            </view>
            <view class="weui-cell weui-cell_input">
                <view class="weui-cell__hd">
                    <view class="weui-label">时间</view>
                </view>
                <view class="weui-cell__bd">
                    <picker mode="time" value="{{time}}" start="09:01" end="21:01" bindchange="bindTimeChange">
                        <view class="weui-input">{{time}}</view>
                    </picker>
                </view>
            </view>
            <view class="weui-cell weui-cell_input weui-cell_vcode">
                <view class="weui-cell__hd">
                    <view class="weui-label">验证码</view>
                </view>
                <view class="weui-cell__bd">
                    <input class="weui-input" placeholder="请输入验证码" />
                </view>
                <view class="weui-cell__ft">
                    <image class="weui-vcode-img" src="../images/vcode.jpg" style="width: 108px"></image>
                </view>
            </view>
        </view>
        <view class="weui-cells__tips">底部说明文字底部说明文字</view>

        <view class="weui-cells__title">表单报错</view>
        <view class="weui-cells weui-cells_after-title">
            <view class="weui-cell weui-cell_input weui-cell_warn">
                <view class="weui-cell__hd">
                    <view class="weui-label">卡号</view>
                </view>
                <view class="weui-cell__bd">
                    <input class="weui-input" placeholder="请输入卡号"/>
                </view>
                <view class="weui-cell__ft">
                    <icon type="warn" size="23" color="#E64340"></icon>
                </view>
            </view>
        </view>

        <view class="weui-cells__title">开关</view>
        <view class="weui-cells weui-cells_after-title">
            <view class="weui-cell weui-cell_switch">
                <view class="weui-cell__bd">标题文字</view>
                <view class="weui-cell__ft">
                    <switch checked />
                </view>
            </view>
        </view>

        <view class="weui-cells__title">文本框</view>
        <view class="weui-cells weui-cells_after-title">
            <view class="weui-cell weui-cell_input">
                <view class="weui-cell__bd">
                    <input class="weui-input" placeholder="请输入文本" />
                </view>
            </view>
        </view>

        <view class="weui-cells__title">文本域</view>
        <view class="weui-cells weui-cells_after-title">
            <view class="weui-cell">
                <view class="weui-cell__bd">
                    <textarea class="weui-textarea" placeholder="请输入文本" style="height: 3.3em" />
                    <view class="weui-textarea-counter">0/200</view>
                </view>
            </view>
        </view>

        <view class="weui-cells__title">选择</view>
        <view class="weui-cells weui-cells_after-title">
            <view class="weui-cell weui-cell_select">
                <view class="weui-cell__hd" style="width: 105px">
                    <picker bindchange="bindCountryCodeChange" value="{{countryCodeIndex}}" range="{{countryCodes}}">
                        <view class="weui-select">{{countryCodes[countryCodeIndex]}}</view>
                    </picker>
                </view>
                <view class="weui-cell__bd weui-cell__bd_in-select-before">
                    <input class="weui-input" placeholder="请输入号码" />
                </view>
            </view>
        </view>

        <view class="weui-cells__title">选择</view>
        <view class="weui-cells weui-cells_after-title">
            <view class="weui-cell weui-cell_select">
                <view class="weui-cell__bd">
                    <picker bindchange="bindAccountChange" value="{{accountIndex}}" range="{{accounts}}">
                        <view class="weui-select">{{accounts[accountIndex]}}</view>
                    </picker>
                </view>
            </view>
            <view class="weui-cell weui-cell_select">
                <view class="weui-cell__hd weui-cell__hd_in-select-after">
                    <view class="weui-label">国家/地区</view>
                </view>
                <view class="weui-cell__bd">
                    <picker bindchange="bindCountryChange" value="{{countryIndex}}" range="{{countries}}">
                        <view class="weui-select weui-select_in-select-after">{{countries[countryIndex]}}</view>
                    </picker>
                </view>
            </view>
        </view>

        <checkbox-group bindchange="bindAgreeChange">
            <label class="weui-agree" for="weuiAgree">
                <view class="weui-agree__text">
                    <checkbox class="weui-agree__checkbox" id="weuiAgree" value="agree" checked="{{isAgree}}" />
                    <view class="weui-agree__checkbox-icon">
                        <icon class="weui-agree__checkbox-icon-check" type="success_no_circle" size="9" wx:if="{{isAgree}}"></icon>
                    </view>
                    阅读并同意<navigator url="" class="weui-agree__link">《相关条款》</navigator>
                </view>
            </label>
        </checkbox-group>

        <view class="weui-btn-area">
            <button class="weui-btn" type="primary" bindtap="showTopTips">确定</button>
        </view>
    </view>
</view>
    </div> 
   </div> 
  </div> 
  <script type="text/javascript" src="//g.alicdn.com/sj/lib/zepto/zepto.min.js" charset="utf-8"></script> 
  <script type="text/javascript" src="//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js" charset="utf-8"></script> 
  <script type="text/javascript" src="//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js" charset="utf-8"></script> 
  <script type="text/javascript" src="//at.alicdn.com/t/font_401117_0e9tc5om6ajor.js"></script> 
 </body>
</html>