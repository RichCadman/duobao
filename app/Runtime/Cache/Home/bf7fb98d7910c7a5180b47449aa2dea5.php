<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>风云榜</title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm.css">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.css">
		<link rel="stylesheet" href="/duobao/pub/home/css/hito.css" />
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
                    <a class="tab-item external active" href="/duobao/index.php/List/index.html">
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
                    <a class="tab-item external " href="/duobao/index.php/My/index.html">
                        <svg class="icon" aria-hidden="true" >
                            <use xlink:href="#icon-wode"></use>
                        </svg>
                        <span class="tab-label">我的</span>
                    </a>
                </nav>
				<!--内容-->
				<div class="content hito">
					<div class="hitoTab">
						<div class="buttons-tab">
						    <a href="#tab7" class="tab-link active button">24小时</a>
						    <a href="#tab8" class="tab-link button">一周</a>
						    <a href="#tab9" class="tab-link button">一月</a>
						</div>
						<div class="content-block hitoTab_content">
						    <div class="tabs">
						      	<div id="tab7" class="tab active">
							        <div class="content-block hitoTab_contentblock">
							        	<div class="list-block media-list">
										    <ul class="">
											<!-- 24小时 -->
											<?php if(is_array($info1)): foreach($info1 as $k=>$v): ?><li >
										        <a href="#" class=" item-content">
										          <div class="item-media"><img src="<?php echo ($v["user_photo"]); ?>" style='width: 2.5rem;'></div>
										          <div class="item-inner">
										            <div class="item-title-row">
										              <div style="color:#1592c6" class="item-title hitoTab_contentblocktitle"><?php echo ($v["user_name"]); ?></div>
										              <div class="item-after">
										              		<span style="color:#1592c6"><?php echo ($k+1); ?></span>
										              </div>
										            </div>
										            <div style="color:#1592c6" class="item-text hitoTab_contentblocktext">获胜:<span><?php echo ($v["hour_count"]); ?></span>单</div>
										          </div>
										        </a>
										      </li><?php endforeach; endif; ?>
										      
										      
										      
										      
										    </ul>
										 </div>
							        	
							        </div>
						    	</div>
						    	<div id="tab8" class="tab">
							        <div class="content-block hitoTab_contentblock">
							          
							          <div class="list-block media-list">
										    <ul class="">
											<!-- 一周 -->

										      <?php if(is_array($info2)): foreach($info2 as $k=>$v): ?><li >
										        <a href="#" class=" item-content">
										          <div class="item-media"><img src="<?php echo ($v["user_photo"]); ?>" style='width: 2.5rem;'></div>
										          <div class="item-inner">
										            <div class="item-title-row">
										              <div style="color:#1592c6" class="item-title hitoTab_contentblocktitle"><?php echo ($v["user_name"]); ?></div>
										              <div class="item-after">
										              		<span><?php echo ($k+1); ?></span>
										              </div>
										            </div>
										            <div class="item-text hitoTab_contentblocktext">获胜:<span><?php echo ($v["week_count"]); ?></span>单</div>
										          </div>
										        </a>
										      </li><?php endforeach; endif; ?>


										      
										    </ul>
										 </div>
							          
							        </div>
						    	</div>
							    <div id="tab9" class="tab">
							        <div class="content-block hitoTab_contentblock">
							          
							          	<div class="list-block media-list">
										    <ul class="">
											<!-- 一月 -->

										      <?php if(is_array($info3)): foreach($info3 as $k=>$v): ?><li >
										        <a href="#" class=" item-content">
										          <div class="item-media"><img src="<?php echo ($v["user_photo"]); ?>" style='width: 2.5rem;'></div>
										          <div class="item-inner">
										            <div class="item-title-row">
										              <div class="item-title hitoTab_contentblocktitle"><?php echo ($v["user_name"]); ?></div>
										              <div class="item-after">
										              		<span><?php echo ($k+1); ?></span>
										              </div>
										            </div>
										            <div class="item-text hitoTab_contentblocktext">获胜:<span><?php echo ($v["mouth_count"]); ?></span>单</div>
										          </div>
										        </a>
										      </li><?php endforeach; endif; ?>

										      


										    </ul>
										 </div>
							          
							        </div>
							    </div>
						    </div>
						</div>
						
						
						
						
						
					</div>
					
					
					
				
	        </div>	
		</div>
		<script type="text/javascript">
			$.init();
		</script>
	</body>
</html>