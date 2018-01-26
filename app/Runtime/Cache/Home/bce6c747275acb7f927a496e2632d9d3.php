<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>我的</title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm.css">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.css">
		<link rel="stylesheet" href="/duobao/pub/home/css/my.css" />
		<link rel="stylesheet" href="/duobao/pub/home/css/index.css" />
		<script type='text/javascript' src='https://g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'></script>
		<script type='text/javascript' src='https://g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'></script>
		<!--如果你用到了拓展包中的组件，还需要引用下面两个-->
		
		<script type='text/javascript' src='https://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.js' charset='utf-8'></script>
		<!--字体库-->
        <script src="https://at.alicdn.com/t/font_402007_u1musog5uyirizfr.js " type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			html{
				font-size:20px ;
			}
			.icon {
		       width: 1em; height: 1em;
		       vertical-align: -0.15em;
		       fill: currentColor;
		       overflow: hidden;
		    }
		    li{
		    	list-style: none;
		    }
		</style>
		<script>
		$(function(){
			$('#tixian_all').click(function(){
				window.location.href='/duobao/index.php/List/tixian.html';
			})
		})
		</script>
	</head>
	<body >
		<script type="text/javascript">
	<!-- $(function(){ -->
		<!-- function getNumber(){ -->
			<!-- $.getJSON("/duobao/index.php/Index/get_number",function(json){ -->
				
		   <!-- }) -->
		<!-- } -->
		<!-- setInterval(getNumber,'10000'); -->
	<!-- }) -->
    
 
</script>

<script type="text/javascript">
	$(function(){
		function add_date_number(){
		
			$.getJSON("/duobao/index.php/Index/add_date_number",function(json){
				//alert(json);
		   })
		}
		setInterval(add_date_number,'8000');
	})
    
 
</script>

<script type="text/javascript">
	$(function(){
		function bangdan(){
		
			$.getJSON("/duobao/index.php/List/bangdan",function(json){
				
		   })
		}
		setInterval(bangdan,'3600000');
	})
    
 
</script>

<script type="text/javascript">
	$(function(){
		function lottery_start(){
			$.getJSON("/duobao/index.php/Index/lottery_start",function(json){
				
		   })
		}
		setInterval(lottery_start,'8000');
	})
    
 
</script>


<script type="text/javascript">
	//60秒请求一次统计接口
    function tongji(){
        $.getJSON("/duobao/index.php/Index/tongji",function(json){
			
	   })
	}
 setInterval(tongji,'60000');
</script>



		<div class="page-group">
		 	<div class="page page-current">
	        	<!-- 工具栏 -->
                <nav class="bar bar-tab">
                    <a class="tab-item external " href="/duobao/index.php/Index/index.html">
                        <svg class="icon" aria-hidden="true" >
                            <use xlink:href="#icon-duobao"></use>
                        </svg>
                        <span class="tab-label">夺宝</span>
                    </a>
                    <a class="tab-item external" href="/duobao/index.php/List/index.html">
                        <svg class="icon" aria-hidden="true" >
                            <use xlink:href="#icon-agent_jiangbei"></use>
                        </svg>
                        <span class="tab-label">风云榜</span>
                    </a>
                    <a class="tab-item external" href="/duobao/index.php/Lottery/index.html">
                        <svg class="icon" aria-hidden="true" >
                            <use xlink:href="#icon-kaijiang"></use>
                        </svg>
                        <span class="tab-label">开奖</span>
                    </a>
                    <a class="tab-item external active" href="/duobao/index.php/My/index.html">
                        <svg class="icon" aria-hidden="true" >
                            <use xlink:href="#icon-wode"></use>
                        </svg>
                        <span class="tab-label">我的</span>
                    </a>
                </nav>
				<!--内容-->
				<div  class="content my">
					<!--头部-->
					<div style="background-color:#1bcebb" class="my_header">
						<div style="background-color:#1bcebb" class="my_headertop">
							<div class="my_headertopimg">
								<div class="filt_box" >
									<img src="<?php echo ($userinfo['user_photo']); ?>" id="upimg"/>
									<input type="file" id="upfile"/>
								</div>
								<p><?php echo ($userinfo['user_name']); ?></p>
							</div>
							<!--夺宝-->
						  	<div class="content-padded grid-demo">
						    	<div class="row">
						      		<div class="col-33">
						      			<p><?php echo ($userinfo['money']); ?></p>
						      			<p>夺宝币</p>
						      		</div>
						      		<div class="col-33">
						      			<p><?php echo ($success_count); ?></p>
						      			<p>获胜</p>
						      		</div>
						      		<div class="col-33">
						      			<p><?php echo ($userinfo['exchange_count']); ?></p>
						      			<p>兑换</p>
						      		</div>
						    	</div>
						  	</div>
						</div>
					</div>
					<!--中间-->
					<div class="my_middle">
					  	<div class="list-block">
						    <ul >
						    	<li class="item-content row my_middleli">
							        <div class="col-33" id="tixian_all">
						      			<p style="color:#1a1a1a">提现</p>
						      		</div>
						      		<div class="col-33">
						      			<p><a href="#" class="open-huanqian" style="color:#1a1a1a">兑换</a></p>
						      		</div>
						      		<div class="col-33">
						      			<p>
						      			<a href="#" class="open-pay" style="color:#1a1a1a">充值</a>	
						      			</p>
						      		</div>
						      	</li>
						      	<li class="item-content item-link" id="duobao">
							        <div class="item-inner">
							          <div class="item-title">夺宝记录</div>
							        </div>

						      	</li>
						      	<script type="text/javascript">
							        $("#duobao").click(function(){
							        	window.location="/duobao/index.php/Lottery/index.html";
							        })
							    </script>
						      	<!-- <li class="item-content item-link" id="duihuan"> -->
							        <!-- <div class="item-inner"> -->
							          <!-- <div class="item-title">兑换记录</div> -->
							        <!-- </div> -->
						      	<!-- </li> -->
						      	<script type="text/javascript">
							        $("#duihuan").click(function(){
							        	//window.location="/duobao/index.php/Lottery/index.html";
							        })
							    </script>
								<li class="item-content item-link" id="tixian">
							        <div class="item-inner">
							          <div class="item-title">提现记录</div>
							        </div>
						      	</li>
						      	<script type="text/javascript">
							        $("#tixian").click(function(){
							        	window.location="/duobao/index.php/My/tixianrecord.html";
							        })
							    </script>
						    </ul>
						</div>
					</div>
					<!--列表-->
					<div class="my_middle">
						<div class="list-block">
						    <ul >
						      	<li class="item-content item-link" id="paihang">
							        <div class="item-inner">
							          <div class="item-title">总排行榜</div>
							        </div>
						      	</li>
						      	<script type="text/javascript">
							        $("#paihang").click(function(){
							        	window.location="/duobao/index.php/List/index.html";
							        })
							    </script>
						      	<li class="item-content item-link" id="kanpan">
							        <div class="item-inner">
							          <div class="item-title">夺宝看盘</div>
							        </div>
						      	</li>
						      	<script type="text/javascript">
							        $("#kanpan").click(function(){
							        	window.location="/duobao/index.php/My/look.html";
							        })
							    </script>
						    </ul>
						</div>
					</div>
					<!--退出登录-->
					<!-- <div class="my_footer">
						<input type="button" name="" id="" value="退出登录" />
					</div> -->
					
				</div>
				<!--popup-->
				<!-- 充值 -->
                <div class="popup popup-pay aboutPop payPage">
                    <div class="content">
                        <div class="content-block">
                            <!--购买单数-->
                            <div class="card">
                                <div class="card-header pay_header">
                                    <span>充值</span>
                                    <a class="close-popup">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-close"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-content ">
                                    <ul class="row">
                                        <li class="col-25">
                                            <input type="button" id="" value="10元" class="aboutPopclick aboutPopclick1"/>
                                        </li>
                                        <li class="col-25 "><input type="button" id="" value="30元"class="aboutPopclick aboutPopclick1" /></li>
                                        <li class="col-25 "><input type="button" id="" value="50元" class="aboutPopclick aboutPopclick1"/></li>
                                        <li class="col-25 "><input type="button" id="" value="100元" class="aboutPopclick aboutPopclick1"/></li>
                                        <li class="col-25 "><input type="button" id="" value="200元"class="aboutPopclick aboutPopclick1" /></li>
                                            <li class="col-25 "><input type="button" id="" value="500元"class="aboutPopclick aboutPopclick1" /></li>
                                            <li class="col-25 "><input type="button" id="" value="990元" class="aboutPopclick aboutPopclick1"/></li>
                                            <li class="col-25">
                                                <input  onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" type="text" id="" value="" placeholder="其他金额"  class="aboutPopclickText sr" style="padding:0.25rem 0.1rem;"/>
                                            </li>
                                    </ul>
                                    
                                </div>
                             </div>
                             <!--支付方式-->
                             <div class="card">
                                <div class="card-header">支付方式</div>
                                <div class="card-content aboutPop_cardcontent">
                                    <ul class="row ">
                                        <li class="col-33"><input type="button" id="" value="微信" class="aboutPop_pay"/></li>
                                        <!-- <li class="col-33"><input type="button" id="" value="支付宝" class="aboutPop_pay"/></li> -->
                                    </ul>
                                    <input type="hidden" id="fangshi" value="" />
                                    <input type="hidden" id="jine" value="" />
                                    <input type="hidden" id="shuru" value="" />
									<input type="hidden" id="price" value="" />
                                </div>
                             </div>
                             
                             <!--按钮-->
                             <div class="aboutPop_btn">
                                <input type="button" id="dan" value="支付" />
                             </div>
							<script>
								//获取金额
								$(function(){
									$(".aboutPopclick1").click(function(){
										//失去焦点
										$(".sr").blur();
										//清除输入框内容
										$(".sr").val("");
										var jine=$(this).val();
										
										var b=jine.substr(0,jine.length-1);
										$("#jine").val(b);//把金额放进隐藏域
									})
								})
							</script>
							
							<script>
								//popup点击事件  文本框输入事件
								$('.aboutPopclickText').click(function(){
									$("#jine").val("");//清除金额隐藏域的值
									//$(this).attr('autofocus');
									$(this).focus();
									$(this).css({'background':'red','color':'white'});
									 $(this).parent().siblings().find('.aboutPopclick').css({'background':'','color':''}) 
								})
							</script>
							
							<script>
								//支付方式
								$(function(){
									$(".aboutPop_pay").click(function(){
										//失去焦点
										$(".sr").blur();
										var fangshi=$(".aboutPop_pay").val();
										$("#fangshi").val(fangshi);//把支付方式放进隐藏域
									})
								})
							</script>
							
							<script>
								$(function(){
									$("#dan").click(function(){
									
										//获取金额
										var jine=$("#jine").val();
										//alert(jine);
										//获取输入金额
										var sr=$(".sr").val();
										
										$("#shuru").val(sr);//把输入金额放进隐藏域
										var shuru=$("#shuru").val();
										//alert(shuru);
										if(jine!=''){
											var money=jine;
										}else{
											var money=shuru;
										}
										//alert(money);
										//把金额放进隐藏域
										$("#price").val(money);
									
										//获取总价格
										var money=$("#price").val();
										//获取充值方式
										var fangshi=$("#fangshi").val();
										if(money==''){
											alert("请选择充值金额");
											return false;
										}else if(fangshi==''){
											alert("请选择充值方式");
											
											return false;
										}else{
											//alert(1);
											$("#jine").val("");//清除金额隐藏域的值
											$("#price").val("");
											$("#fangshi").val("");
											window.location="/duobao/index.php/My/chongzhi/money/"+money;
										}
									})
								})
							</script>

                         </div>
                    </div>
                </div>
                
                <!-- 兑换 -->
                <div class="popup popup-huanqian aboutPop chongzhiPage">
                    <div class="content">
                        <div class="content-block">
                            <!--购买单数-->
                            <div class="card">
                                <div class="card-header pay_header">
                                    <span>兑换</span>
                                    <a class="close-popup">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-close"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-content ">
                                    
                                    <div class="card demo-card-header-pic">
                                        <div valign="bottom" class="card-header color-white no-border no-padding">
                                          <img class='card-cover' src="/duobao/pub/home/img/weixin.png" alt="">
                                        </div>
                                        <div class="card-content">
                                          <div class="card-content-inner">
                                            <p  style="margin:0 auto;">提现请加二维码,按住三秒扫一扫</p>
                                            
                                          </div>
                                        </div>
                                    </div>

                                </div>
                             </div>
                         </div>
                    </div>
                </div><!--/ 兑换 -->
				
				
	        </div>	
		</div>
		<script type="text/javascript">
			
			$(document).on('click','.open-pay', function () {
                  $.popup('.popup-pay');
             });
             $(document).on('click','.open-huanqian', function () {
                  $.popup('.popup-huanqian');
             });
             //popup点击事件
                $(document).on('click','.aboutPopclick', function (e) {
                  $(this).css({'background':'red','color':'white'});
                  $(this).parent().siblings().find('input').css({'background':'','color':''})
                });
                 $('.aboutPop_pay').click(function(e){
                    $(this).css({'background':'red','color':'white'})
                    $(this).parent().siblings().find('.aboutPop_pay').css({'background':'','color':''})
                });
			//图像上传
			$("#upfile").change(function(){
				var url = this.files[0];
				var src = window.URL.createObjectURL(url);
				document.getElementById('upimg').src = src;
			});
			$.init();
		</script>
	</body>
</html>