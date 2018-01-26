<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="favicon.png" type="image/x-icon">
<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
<title>在线支付</title>
</head>
<body>
</body>
<script src="/bocai/pub/home/js/jquery-3.1.0.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    $(function(){
        callpay();
    });

    //调用微信JS api 支付
    function jsApiCall()
    {
        WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
        <?php echo $jsApiParameters;?>,
        function(res){
            WeixinJSBridge.log(res.err_msg);
            //alert(res.err_code+res.err_desc+res.err_msg);
            if(res.err_msg == "get_brand_wcpay_request:ok"){
                //alert("支付成功");
                //WeixinJSBridge.call('closeWindow');
               
                window.location.href="http://www.detaihome.com/bocai/index.php/Index/index";
            }else{
                //alert("支付失败");
                //WeixinJSBridge.call('closeWindow');
            	  window.location.href="http://www.detaihome.com/bocai/index.php/Index/index";
            }
        }
    );
    }

    function callpay()
    {
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            jsApiCall();
        }
    }
</script>
</html>