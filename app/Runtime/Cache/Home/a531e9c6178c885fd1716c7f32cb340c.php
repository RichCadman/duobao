<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>夺宝看盘</title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm.css">
		<link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.css">
		<link rel="stylesheet" type="text/css" href="/duobao/pub/home/css/record.css"/>
		<script type='text/javascript' src='https://g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'></script>
		<script type='text/javascript' src='https://g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'></script>
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
		</style>
	</head>
	<body>
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
				<div class="content">
					<!--屏幕滚动-->
					<div class="card-header row look_header">
				    	<div class="col-5">
				    		<svg class="icon" aria-hidden="true" >
							    <use xlink:href="#icon-laba"></use>
							</svg>
				    	</div>
				    	<div class="col-95">
				    		<marquee> 22:00 - 02:00每五分钟开奖一次  10:00 - 22:00每十分钟开奖一次 ，人人半价夺宝，最公正、透明的二人夺宝平台！</marquee>
				    	</div>
				    </div>
				    <!--列表-->
				    <div class="content-block-title  row">
				    	<div class="col-33">
				    		时时彩期号
				    	</div>
				    	<div class="col-33">
				    		开奖号
				    	</div>
				    	<div class="col-33">
				    		中奖
				    	</div>
				    </div>
					 <div class="list-block record_lists  infinite-scroll infinite-scroll-bottom"  data-distance="100">
					    <ul class="list-container">
					    <?php if(is_array($look)): foreach($look as $key=>$v): ?><li class="item-content">
					        <div class="item-inner record_list">
					          <div class="item-title"><?php echo ($v["date_number"]); ?></div>
					          <div class="item-after">
					          	<?php echo (substr($v['award_number'],0,4)); ?><span><?php echo (substr($v['award_number'],-1)); ?></span>
					          </div>
							<?php if($v['award_number']%2==0): ?><div class="item-after record_listOne">
					          	买双
					          </div>
							<?php else: ?>
							<div class="item-after" style="color:green">
					          	买单
					          </div><?php endif; ?>
					        </div>
					      </li><?php endforeach; endif; ?>
					    </ul>
					    	 <!-- 加载提示符 -->
          <!--<div class="infinite-scroll-preloader">
              <div class="preloader"></div>
          </div>-->
					 </div>
				    
				    
				    <!--/列表-->
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				
				// 加载flag
      var loading = false;
      // 最多可加载的条目
      var maxItems = 100;

      // 每次加载添加多少条目
      var itemsPerLoad = 20;

      function addItems(number, lastIndex) {
              // 生成新条目的HTML
              var html = '';
              for (var i = lastIndex + 1; i <= lastIndex + number; i++) {
//                html += '<li class="item-content"><div class="item-inner"><div class="item-title">Item ' + i + '</div></div></li>';
				html += '<li class="item-content"><div class="item-inner record_list"> <div class="item-title">2017091023</div><div class="item-after">1,3,5,6,<span>8</span> </div><div class="item-after record_listOne">	买单 </div> </div> </li><li class="item-content"><div class="item-inner record_list"> <div class="item-title">2017091023</div><div class="item-after">1,3,5,6,<span>8</span></div> <div class="item-after record_listTwo">	买双 </div> </div></li>';
              }
              // 添加新条目
              //$('.infinite-scroll-bottom .list-container').append(html);

          }
          //预先加载20条
      addItems(itemsPerLoad, 0);

      // 上次加载的序号

      var lastIndex = 20;

      // 注册'infinite'事件处理函数
      $(document).on('infinite', '.infinite-scroll-bottom',function() {

          // 如果正在加载，则退出
          if (loading) return;

          // 设置flag
          loading = true;

          // 模拟1s的加载过程
          setTimeout(function() {
              // 重置加载flag
              loading = false;

              if (lastIndex >= maxItems) {
                  // 加载完毕，则注销无限加载事件，以防不必要的加载
                  $.detachInfiniteScroll($('.infinite-scroll'));
                  // 删除加载提示符
                  $('.infinite-scroll-preloader').remove();
                  return;
              }

              // 添加新条目
              addItems(itemsPerLoad, lastIndex);
              // 更新最后加载的序号
              lastIndex = $('.list-container li').length;
              //容器发生改变,如果是js滚动，需要刷新滚动
              $.refreshScroller();
          }, 1000);
      });
				
			})
		</script>
	</body>
</html>