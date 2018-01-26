<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>开奖</title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm.css">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.css">
		<link rel="stylesheet" href="/duobao/pub/home/css/award.css" />
		<script type='text/javascript' src='https://g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'></script>
		<script type='text/javascript' src='https://g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'></script>
		<!--如果你用到了拓展包中的组件，还需要引用下面两个-->
		<script type='text/javascript' src='https://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.js' charset='utf-8'></script>
		<script src="https://at.alicdn.com/t/font_402007_u1musog5uyirizfr.js" type="text/javascript" charset="utf-8"></script>
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
                    <a class="tab-item external active" href="/duobao/index.php/Lottery/index.html">
                        <svg class="icon" aria-hidden="true" >
                            <use xlink:href="#icon-kaijiang"></use>
                        </svg>
                        <span class="tab-label">开奖</span>
                    </a>
                    <a class="tab-item external" href="/duobao/index.php/My/index.html">
                        <svg class="icon" aria-hidden="true" >
                            <use xlink:href="#icon-wode"></use>
                        </svg>
                        <span class="tab-label">我的</span>
                    </a>
                </nav>
				<!--内容-->
				<div class="content hito">
					
					 <div class="title  row  hitoTitle" style="margin-left:0 ;">
				    	<div class="col-33">

				    		24时参与:<span>
							<?php if($total_count==0): ?>0
							<?php else: ?>
				    		<?php echo ($total_count); endif; ?>
				    	</span>单
				    	</div>
				    	<div class="col-33">
				    		24时获胜:<span>
							<?php if($success_count==0): ?>0
							<?php else: ?>
				    		<?php echo ($success_count); endif; ?>
				    	</span>单
				    	</div>
				    	<div class="col-33">
				    		24时失败:<span>
							<?php if($error_count==0): ?>0
							<?php else: ?>
				    		<?php echo ($error_count); endif; ?>
				    	</span>单
				    	</div>
				    </div>
					<ul class="card hitoCard">
						<!--等待开奖-->

						<?php if(is_array($info)): foreach($info as $key=>$v ): ?><li>
						    <div class="card-content">
						      <div class="list-block media-list">
						        <ul>
						          <li class="item-content">
						            <div class="item-media hitoCard_img">
						              <img src="/duobao/pub/home/img/<?php echo ($v["goods_image"]); ?>" width="">
						            	<!--<div class="hitoCard_state"style="background:#FAFAFA;">-->
						            	
						            		<?php if($v['controller']==0): ?><div class="hitoCard_state state_bg">
						            		等待开奖
						            		</div>

						            		<?php elseif($v['success']==1): ?>

						            		<div class="hitoCard_state success_bg">
						            		恭喜获胜
						            		</div>

											<?php elseif($v['success']==0): ?>

											<div class="hitoCard_state loser_bg">
											已失败
											</div><?php endif; ?>	
						            	
						            </div>
						            <div class="item-inner">
						              <div class="item-title-row">
						                <div class="item-title"><span><?php echo ($v["goods_price"]); ?></span>元充值卡</div>
						                <a class="item-after button hitoCard_btn open-btn " href="#" id="dianji" info1="<?php echo ($v["date_number"]); ?>" info="<?php echo ($v["id"]); ?>">查看</a>
						              </div>
						              <div class="item-subtitle">参与:买
						              	<?php if($v['type']==1): ?>单
						              	<?php else: ?>
						              	双<?php endif; ?>
								
						              	x<span><?php echo ($v["number"]); ?></span>单</div>
						               <!-- <div class="item-text hitoCard_text">时彩期号:<span id="qihao"><?php echo ($v["date_number"]); ?></span></div> -->
									   <input type="hidden" id="qihao" value="<?php echo ($v["date_number"]); ?>" />
						            </div>
						          </li>
						        </ul>
						      </div>
						    </div>
							
						    <div class="card-footer hitoCardFooter">
						       <div class="item-media hitoCardFooter_img">
						       	<img src="<?php echo ($v["user_photo"]); ?>" style='width: 2rem;'>
						       </div>
					          <div class="item-inner hitoCardFooter_inner">
					            <div class="item-title-row">
					              <div class="item-title"><span><?php echo ($v["user_name"]); ?></span></div>
					            </div>
					          </div>
						      <p	>
						      	时间:<span><?php echo date("Y-m-d H:i:s",$v['buy_time']);?></span><!-- <span>今天</span><span>12</span>:<span>30</span> -->
						      </p>
						    </div>
						</li><?php endforeach; endif; ?>


					  </ul>  
					  
					  <!-- 点击获取用户信息 -->
					  <script>
						<!-- $(function(){ -->
							<!-- $("#dianji").click(function(){ -->
							<!-- alert(json); -->
								<!-- var id=$(this).attr('info'); -->
								<!-- $.getJSON("/duobao/index.php/Lottery/getInfo",{id:id},function(json){ -->
									<!-- alert(json); -->
								<!-- }) -->
							<!-- }) -->
						<!-- }) -->
					  </script>
	        </div>	
	        <!-- About Popup -->
			<div class="popup popup-btn btnPop ">
			
			
			
				<div class="content btnPop_content">
					 <div class="card btnPop_card">
					    <div class="card-header">
					    	<div class="btnPop_title">
					    		<span id="goods_type"></span>元充值卡
					    	</div>
					    	<a href="#" class="close-popup">
						    	<svg class="icon" aria-hidden="true" >
									<use xlink:href="#icon-close"></use>
								</svg>
					    	</a>
					    	
					    </div>
					    <div class="card-content btnPop_cardContent">
					    	<div class="row">
					    		<div class="col-33">
					    			<p id="user1"></p>
					    			<p id="type1"></p>
					    			<div class="btnPop_img">
					    				<img class="photo1" src=""/>
					    			</div>
					    		</div>
					    		<div class="col-33">
					    			<div class="btnPop_img btnPop_imgPk">
					    				<img src="/duobao/pub/home/img/pk.png"/>
					    			</div>
					    		</div>
					    		<div class="col-33">
					    			<p id="user2">123123</p>
					    			<p id="type2"></p>
					    			<div class="btnPop_img">
					    				<img class="photo2" src=""/>
					    			</div>
					    		</div>
					    	</div>
					      	<ul class="card-content-inner btnPop_contentInner">
					      		<!-- <li> -->
					      			<!-- <span>时时彩期号:</span> -->
					      			<!-- <span id="date_number"></span> -->
					      		<!-- </li> -->
					      		<li>
					      			<span>时时彩开奖结果:</span>
					      			<span id="award_number"></span>
					      		</li>
					      		<li>
					      			<span>双人夺宝规则:</span>
					      			<span id="guize"></span>
					      		</li>
					      		<li>
					      			<span>本期中奖:</span>
					      			<span id="zj_type"></span>
					      		</li>
					      	</ul>
					    </div>
					    <div class="card-footer btnPopFooter">
					      	<img class="zj_photo"  src="" style="width:3rem;margin-top:-1.5rem;clear:both;"/>
					      	<div class="content btnPopFooter_content" >
							<img src="/duobao/pub/home/img/winner.png" alt="">
					      		<div class="card-content-inner btnPopFooter_text"  >
								
					     		<span id="zj_user"></span>
					     	</div>
					      	</div>
					     	
					    </div>
					 </div>
				</div>
				
				
				 
			</div>
	        
	        <input type="hidden" id="haoma1" value="" />
		</div>
		<script type="text/javascript">
			$(function(){
				
				$(document).on('click','.open-btn', function () {
					$("#guize").html("");
					$("#zj_type").html("");
					var qihao=$(this).attr('info1');
					<!-- $.getJSON("/duobao/index.php/Lottery/getNumber",{qihao:qihao},function(json){ -->
						<!-- //alert(json); -->
						<!-- //获取当前购买的中奖号 -->
						<!-- var haoma=json.award_number; -->
						<!-- alert(haoma); -->
						<!-- $("#haoma1").val(haoma); -->
						<!-- //alert(haoma); -->
					<!-- }) -->
					<!-- var haoma2=$("#haoma1").val(); -->
					<!-- //alert(haoma2); -->
					var id=$(this).attr('info');
					//alert(id);
					$.getJSON("/duobao/index.php/Lottery/getInfo",{id:id,qihao:qihao},function(json){
						//alert(json);
						//商品类型
						var goods_id=json.goods_id;
						//购买单双号类型
						var type=json.type;
						//期号
						var date_number=json.date_number;
						//购买人名
						var user_name=json.user_name;
						//购买人头像
						var user_photo=json.user_photo;
					
						//中奖号码
						var award_number=json.award_number;
						//获取当前购买的中奖号
						var haoma=json.award_number;
						//当前用户是否中奖
						var success=json.success;
						//系统名
						var xt_name=json.xt_name;
						//系统图片
						var xt_photo=json.xt_photo;
						//是否已经开奖
						var controller=json.controller;
						//alert(haoma);
						//赋值单双号
						if(type==1){
							$("#type1").html("买单");
							$("#type2").html("买双");
						}else{
							$("#type1").html("买双");
							$("#type2").html("买单");
						}
						//用户图片
						$(".photo1").attr("src",user_photo);
						$(".photo2").attr("src",xt_photo);
						if(controller==0){
							if(goods_id=='4'){
								$("#goods_type").html("20");
							}else if(goods_id=='8'){
								$("#goods_type").html("50");
							}else if(goods_id=='12'){
								$("#goods_type").html("100");
							}
							
							$("#user1").html(user_name);
							$("#user2").html(xt_name);
							$("#date_number").html(date_number);
							$("#award_number").html("等待开奖");
							$("#guize").html("");
							$("#zj_type").html("");
						}else{
							if(goods_id=='4'){
								$("#goods_type").html("20");
							}else if(goods_id=='8'){
								$("#goods_type").html("50");
							}else if(goods_id=='12'){
								$("#goods_type").html("100");
							}
							$("#user1").html(user_name);
							$("#user2").html(xt_name);
							$("#date_number").html(date_number);
							$("#award_number").html(haoma);
							var a=haoma%2;
							if(a==0){
								$("#guize").html("本期时时彩开奖号最后一个数字为双");
								$("#zj_type").html("买双");
							}else{
								$("#guize").html("本期时时彩开奖号最后一个数字为单");
								$("#zj_type").html("买单");
							}
							if(success==1){
								$("#zj_user").html(user_name);
								$(".zj_photo").attr("src",user_photo);
							}else{
								$("#zj_user").html(xt_name);
								$(".zj_photo").attr("src",xt_photo);
							}
						}
					});
					
					
				  $.popup('.popup-btn');
				  
					
				});
				
				$('.hitoCard_state').on('change',function(e){
					if($('.hitoCard_state').html()=='失败'){
						$(this).css({'background':'#999999','color':'white'})
					}else if($('.hitoCard_state').html()=='恭喜获胜'){
						$(this).css({'background':'red','color':'white'})
					}else{
						$(this).css('background','#FAFAFA')
					};
				})
				var vs=$('.hitoCard_state').html();
				switch (vs){
					case "失败":
					  $(this).css({'background':'#999999','color':'white'});
					  break;
					case '恭喜获胜':
					  $(this).css({'background':'red','color':'white'});
					  break;
					case '等待开奖':
					  $(this).css('background','#FAFAFA');
					  break;
				}
			})
			$.init();
		</script>
	</body>
</html>