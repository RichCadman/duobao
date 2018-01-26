<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>我的</title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm.css">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.css">
		
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
		    .txRecordLists{
		    	margin: 0;
		    	width: 100%;
		    }
		    .txRecordLists ul{
		    	width: 100%;
		    }
		    .txRecordLists ul li{
		    	width: 100%;
		    	border-bottom: 1px solid #ccc;
		    }
		    .txRecordLists ul li .item-content{
		    	padding-left: 0.5rem;
		    }
		    .txRecordLists_inner{
		    	padding: 0.5rem !important;
		    	margin-left: 0!important;
		    }
		    .txRecordLists_inner .item-title-row{
		    	width: 100%;
		    	font-size: 0.6rem;
		    	line-height: 1.4rem;
		    }
		    .txRecordLists_suc{
		    	padding: 0.2rem;
		    	background: limegreen;
		    	margin: 0 0.2rem;
		    	border-radius: 5px;
		    	color: white;
		    }
		    .txRecordLists_media img{
		    	border-radius: 50%;
		    	width:1.5rem;
		    }
		</style>
		
	</head>
	<body >
		<script type="text/javascript">
	<!-- $(function(){ -->
		<!-- function getNumber(){ -->
			<!-- $.getJSON("/bocai/index.php/Index/get_number",function(json){ -->
				
		   <!-- }) -->
		<!-- } -->
		<!-- setInterval(getNumber,'10000'); -->
	<!-- }) -->
    
 
</script>

<script type="text/javascript">
	$(function(){
		function add_date_number(){
		
			$.getJSON("/bocai/index.php/Index/add_date_number",function(json){
				//alert(json);
		   })
		}
		setInterval(add_date_number,'8000');
	})
    
 
</script>

<script type="text/javascript">
	$(function(){
		function bangdan(){
		
			$.getJSON("/bocai/index.php/List/bangdan",function(json){
				
		   })
		}
		setInterval(bangdan,'3600000');
	})
    
 
</script>

<script type="text/javascript">
	$(function(){
		function lottery_start(){
			$.getJSON("/bocai/index.php/Index/lottery_start",function(json){
				
		   })
		}
		setInterval(lottery_start,'8000');
	})
    
 
</script>


<script type="text/javascript">
	//60秒请求一次统计接口
    function tongji(){
        $.getJSON("/bocai/index.php/Index/tongji",function(json){
			
	   })
	}
 setInterval(tongji,'60000');
</script>



		<div class="page-group">
		 	<div class="page page-current">
				<!--内容-->
				<div class="content ">
					<div class="list-block media-list txRecordLists">
					    <ul>
						
						
						<?php if(is_array($withdraw)): foreach($withdraw as $key=>$v): ?><li>
					        <div class="item-content">
					          <div class="item-media txRecordLists_media">
					          	<img src="<?php echo ($v["user_photo"]); ?>" style='width:1.5rem;'>
					          </div>
					          <div class="item-inner txRecordLists_inner">
					            <div class="item-title-row">
					              <div class="item-title">
					              	<?php if($v['type']==1): ?>¥<span><?php echo ($v["record"]); ?></span>&nbsp;<span class="txRecordLists_suc">成功</span>&nbsp;实时到账<span><?php echo ($v['record']); ?></span>元(今日首单)
					              	<?php else: ?>
										¥<span><?php echo ($v["record"]); ?></span>&nbsp;<span class="txRecordLists_suc">成功</span>&nbsp;实时到账<span><?php echo ($v['record']-2); ?></span>元(手续费<span>2</span>元)<?php endif; ?>
								  </div>
					               <div class="item-after">
					               		<!-- <span>2017</span>-<span>08</span>-<span>25</span>&nbsp;&nbsp;<span >21</span>:<span>35</span> -->
										<span><?php echo date("Y-m-d H:i:s",$v['withdraw_time']);?></span>
					               </div>
					            </div>
					          </div>
					        </div>
					      </li><?php endforeach; endif; ?>
						  
						  
					    </ul>
					</div>
				</div>	
	        </div>	
		</div>
		<script type="text/javascript">
			
			$.init();
		</script>
	</body>
</html>