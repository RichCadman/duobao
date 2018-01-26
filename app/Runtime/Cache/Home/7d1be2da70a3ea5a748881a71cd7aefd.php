<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm.css">
        <link rel="stylesheet" href="https://g.alicdn.com/msui/sm/0.6.2/css/sm-extend.css">
        <link rel="stylesheet" type="text/css" href="/duobao/pub/home/css/weui.min.css"/>
        <link rel="stylesheet" type="text/css" href="/duobao/pub/home/css/swiper.css"/>
        <!--<link rel="stylesheet" type="text/css" href="/duobao/pub/home/css/swiper.min.css"/>-->
        <link rel="stylesheet" type="text/css" href="/duobao/pub/home/css/home.css"/>
        <link rel="stylesheet" href="/duobao/pub/home/css/index.css" />
        <!--<link rel="stylesheet" href="/duobao/pub/home/css/imageflow.css" />-->
        <style type="text/css">
            html{
                font-size:20px ;
            }
            .icon {
               width: 1.2em; height: 1.2em;
               vertical-align: -0.15em;
               fill: currentColor;
               overflow: hidden;
            }
        </style>
        <script type='text/javascript' src='https://g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'></script>
        <script src="/duobao/pub/home/js/fastclick.js"></script>
        <script type='text/javascript' src='https://g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'></script>
        <!--如果你用到了拓展包中的组件，还需要引用下面两个-->
        <script type='text/javascript' src='https://g.alicdn.com/msui/sm/0.6.2/js/sm-extend.js' charset='utf-8'></script>
        <script src="/duobao/pub/home/js/zepto.min.js" type="text/javascript" charset="utf-8"></script>
        
        <script src="/duobao/pub/home/js/exa.js" type="text/javascript" charset="utf-8"></script>
        <script src="/duobao/pub/home/js/swiper.jquery.min.js"></script>
        <script src="/duobao/pub/home/js/home.js" type="text/javascript" charset="utf-8"></script>
        <script src="/duobao/pub/home/js/dropload.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="/duobao/pub/home/js/aui-dialog.js" type="text/javascript" charset="utf-8"></script>
        
        <!--字体库-->
        <script src="https://at.alicdn.com/t/font_402007_u1musog5uyirizfr.js " type="text/javascript" charset="utf-8"></script>
        <script>
		//跳转页面并刷新
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
                    <a class="tab-item external active" href="/duobao/index.php/Index/index.html">
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
                    <a class="tab-item external" href="/duobao/index.php/My/index.html">
                        <svg class="icon" aria-hidden="true" >
                            <use xlink:href="#icon-wode"></use>
                        </svg>
                        <span class="tab-label">我的</span>
                    </a>
                </nav>
                <!--内容-->
                <div class="content lottery">
                    <!--头部-->
                    <div class="card lottery_top" >
                        <div class="card-header row">
                            <div class="col-5">
                                <svg class="icon" aria-hidden="true" >
                                    <use xlink:href="#icon-laba"></use>
                                </svg>
                            </div>
                            <div class="col-95">
                                <marquee> 22:00 - 02:00每五分钟开奖一次  10:00 - 22:00每十分钟开奖一次 ，人人半价夺宝，最公正、透明的二人夺宝平台！</marquee>
                            </div>
                        </div>
                        <!--头部信息-->
                        <div class="card-content lottery_middle">
                            <div class="list-block media-list">
                                <ul >
                                    <li class="item-content row">
                                        <div class="item-media col-20">
                                          <img src="<?php echo ($userinfo['user_photo']); ?>" width="44">
                                        </div>
                                        <div class="item-inner col-80 lottery_middle_card">
                                            <ul >
                                                <li style="border:1px solid black" id="tixian_all">
                                                    <a  href="#"  >
                                                        <svg class="icon" aria-hidden="true" style="width:1.5em">
                                                            <use xlink:href="#icon-tixian"></use>
                                                        </svg>
                                                        提
                                                    </a>
                                                </li>
                                                <li style="border:1px solid black">
                                                    <a href="#" class="open-duihuan">
                                                        <svg class="icon" aria-hidden="true" >
                                                            <use xlink:href="#icon-duifutixian"></use>
                                                        </svg>
                                                        兑
                                                    </a>
                                                </li>
                                                <li style="border:1px solid black">
                                                    <a href="#" class='open-chongzhi'>
                                                        <svg class="icon" aria-hidden="true" >
                                                            <use xlink:href="#icon-chongzhi1"></use>
                                                        </svg>
                                                        充
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="row lottery_middle_id">
                                        <div class="col-60 ">
                                            <span><?php echo ($userinfo['user_name']); ?></span>
                                            <p>
                                                ID:<span><?php echo ($userinfo['id']); ?></span>
                                            </p>
                                        </div>
                                        <div class="col-40">
                                            <span>夺宝币</span>
                                            <svg class="icon" aria-hidden="true" >
                                                <use xlink:href="#icon-qianbizhuanhuan"></use>
                                            </svg>
                                            <span><?php echo ($userinfo['money']); ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--下面-->
                        <div class="card-footer lottery_bottom">
                            <p>
                                上期开奖号<span style="font-size:0.8rem;color:#fc5a39" id="hao"><?php echo ($info["award_number"]); ?></span>
                                <?php if($info['award_number']%2==0): ?><span style="background-color:#fc5a39" id="res">买双</span>成功夺宝
                                <?php else: ?>
                                <span style="background-color:#fc5a39" id="res">买单</span>成功夺宝<?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <!--中间-->
                    <div class="lotteryTab">
                        <div class="buttons-tab">
                            <a href="#tab1" class="tab-link active button" title='20'>20元商品</a>
                            <a href="#tab2" class="tab-link button" title='50'>50元商品</a>
                            <a href="#tab3" class="tab-link button" title='100'>100元商品</a>
                        </div>
                        <div class="content-block lotteryTab_block">
                            <div class="tabs">
                                <div id="tab1" class="tab active">
                                    <div class="content-block lotteryTab_blockbanner">
                                        
                                        <div class="card_box card_box_1  swiper-container-horizontal swiper-container-3d swiper-container-coverflow">   
                                            <div class="swiper-wrapper" >
                                                <div  class="swiper-slide box" data-id="9" data-cp="20元充值卡" data-cptype="20" data-price="12" data-pic="YDK20">
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/ydk20.png" class="swiper-lazy">
                                                        <span>夺宝价:12元</span>
                                                    </div>
                                                </div>
                                                <div  class="swiper-slide box" data-id="10" data-cp="20元京东卡" data-cptype="20" data-price="12" data-pic="JDK20" >
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/jdk20.png" class="swiper-lazy">
                                                        <span>夺宝价:12元</span>
                                                    </div>
                                                </div>
                        
                                                <div  class="swiper-slide box" data-id="11" data-cp="20元加油卡" data-cptype="20" data-price="12" data-pic="JYK2 ">
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/jyk20.png" class="swiper-lazy">
                                                        <span>夺宝价:12元</span>
                                                    </div>
                                                </div>
                                                <div  class="swiper-slide box" data-id="12" data-cp="20元骏卡一卡通" data-cptype="20"  data-price="12" data-pic="YXK20" >
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/yxk20.png" class="swiper-lazy">
                                                        <span>夺宝价:12元</span>
                                                    </div>
                                                </div>

                                            </div>  
                                        </div>  
                                        
                                    </div>
                                </div>
                                <div id="tab2" class="tab">
                                    <div class="content-block lotteryTab_blockbanner">
                                        
                                        <div class="card_box card_box_1  swiper-container-horizontal swiper-container-3d swiper-container-coverflow">   
                                            <div class="swiper-wrapper" >
                                                <div  class="swiper-slide box" data-id="9" data-cp="50元充值卡" data-cptype="20" data-price="12" data-pic="YDK20">
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/ydk50.png" class="swiper-lazy">
                                                        <span>夺宝价:28元</span>
                                                    </div>
                                                </div>
                                                <div  class="swiper-slide box" data-id="10" data-cp="50元京东卡" data-cptype="20" data-price="12" data-pic="JDK20" >
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/jdk50.png" class="swiper-lazy">
                                                        <span>夺宝价:28元</span>
                                                    </div>
                                                </div>
                        
                                                <div  class="swiper-slide box" data-id="11" data-cp="50元加油卡" data-cptype="20" data-price="12" data-pic="JYK2 ">
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/jyk50.png" class="swiper-lazy">
                                                        <span>夺宝价:28元</span>
                                                    </div>
                                                </div>
                                                <div  class="swiper-slide box" data-id="12" data-cp="50元骏卡一卡通" data-cptype="20"  data-price="12" data-pic="YXK20" >
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/yxk50.png" class="swiper-lazy">
                                                        <span>夺宝价:28元</span>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>  
                                        </div>  
                                        
                                    </div>
                                </div>
                                <div id="tab3" class="tab">
                                    <div class="content-block lotteryTab_blockbanner">
                                        <div class="card_box card_box_3  swiper-container-horizontal swiper-container-3d swiper-container-coverflow">   
                                            <div class="swiper-wrapper" >
                                                <div  class="swiper-slide box" data-id="9" data-cp="100元充值卡" data-cptype="20" data-price="12" data-pic="YDK20">
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/ydk100.png" class="swiper-lazy">
                                                        <span>夺宝价:55元</span>
                                                    </div>
                                                </div>
                                                <div  class="swiper-slide box" data-id="10" data-cp="100元京东卡" data-cptype="20" data-price="12" data-pic="JDK20" >
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/jdk100.png" class="swiper-lazy">
                                                        <span>夺宝价:55元</span>
                                                    </div>
                                                </div>
                        
                                                <div  class="swiper-slide box" data-id="11" data-cp="100元加油卡" data-cptype="20" data-price="12" data-pic="JYK2 ">
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/jyk100.png" class="swiper-lazy">
                                                        <span>夺宝价:55元</span>
                                                    </div>
                                                </div>
                                                <div  class="swiper-slide box" data-id="12" data-cp="100元骏卡一卡通" data-cptype="20"  data-price="12" data-pic="YXK20" >
                                                    <div class="card bannerCard">
                                                        <img src="/duobao/pub/home/img/yxk100.png" class="swiper-lazy">
                                                        <span>夺宝价:55元</span>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="card lotteryTab_footer">
                            <div class="card-content">
                                <div class="card-content-inner">
                                    <div class="row lotteryTab_footertext">
                                        <span>
                                            夺宝规则：根据当期"开奖号"的最后一个数字，为单数则为"买单"夺宝成功，反之"买双"夺宝成功。
                                        </span>
                                        <a href="#" class="open-rule">详情说明>>></a>
                                    </div>
                                    <ul class="row lotteryTab_footerul">
                                        <li class="col-33">
                                            <a href="#"><input type="button" id="maidan" value="买单" class="open-about"/></a>
											<!-- <a href="#"><input type="button" id="maidan" value="测试单" class="open-about"/></a> -->
                                        </li>
                                        <!-- 点击获取最新期号 -->
                                        <script type="text/javascript">
                                        var price="";
                                        $("#maidan").click(function(){
											//清空总价格
											$(".tixingspans").html("");
                                            $('.tab-link').each(function(){
											//判断选择哪个类型的产品20.50.100
                                                if($(this).hasClass('active')){
                                                    price=$(this).attr('title');
                                                      return false;
                                                }
                                            })
												//把价格放到夺宝商品处
                                               $(".shangpin").html(price+'充值卡');
                                            //alert(price);
										//此处获取表里最新时彩期号
                                          $.getJSON("/duobao/index.php/Index/get_date_number",function(json){
                                                $(".maidan").html(json.date_number);
                                            });  
                                        })
                                            
                                        </script>
                                        <li class="col-33" style="margin-right:0 !important;width:32.333%;">
                                            <p style="text-align:center">
                                                本期开奖倒计时
                                            </p>
                                            <!--<span id="times_day"> 0</span>天 -->
                                          <!--<span id="times_hour"> 0</span>时  
                                          <span id="times_minute">0 </span>分    
                                          <span id="second"> 0</span>秒   -->
                                            <div id="fnTimeCountDown" data-end="">
                                                <!--<span class="year">00</span>年
                                                <span class="month">00</span>月
                                                <span class="day">00</span>天-->
                                                <span class="hour">0</span>时
                                                <span class="mini">00</span>分
                                                <span class="sec">00</span>秒
                                                <!-- <span class="hm">000</span> -->
                                            </div>
                                        </li>
                                        <li class="col-33">
                                            <input style="background-color:#1bcebb" type="button" id="maishuang" value="买双" class="open-services"/>
											<!-- <input type="button" id="maishuang" value="测试双" class="open-services"/>  -->
                                        </li>
                                        <!-- 点击获取最新期号 备注同上买单-->
                                        <script type="text/javascript">
                                        var price="";
                                        $("#maishuang").click(function(){
											//清空总价格
											$(".tixingspans").html("");
                                            $('.tab-link').each(function(){
                                                if($(this).hasClass('active')){
                                                    price=$(this).attr('title');
                                                      return false;
                                                }
                                            })
                                            $(".shangpin").html(price+'充值卡');
                                            //alert(price);
                                          $.getJSON("/duobao/index.php/Index/get_date_number",function(json){
                                                $(".maishuang").html(json.date_number);
                                            });  
                                        })
                                            
                                        </script>
                                    </ul>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--尾部-->
                    <div class="lotteryfooterTab">
                        <div class="buttons-tab">
                            <a href="#tab4" id="a1"  class="tab-link active button">最新参与记录</a>
                            <a href="#tab5" id="a2"  class="tab-link button">最新夺宝榜单</a>
                            <a href="#tab6" id="a3" class="tab-link button">开奖记录</a>
                        </div>
                        <div class="content-block lotteryTab_block">
                            <div class="tabs">
                                <div id="tab4" class="tab active">
                                    <div class="content-block">
                                        <div class="list-block media-list">
                                            <ul class=" lotteryfooterTab_ul">

                                            <?php if(is_array($info1)): foreach($info1 as $key=>$v): ?><li >
                                                <a  class=" item-content kj" info='<?php echo ($v["user_id"]); ?>'>
                                                  <div class="item-media">
                                                    <img src="<?php echo ($v['user_photo']); ?>" style='width: 2.5rem;'>
                                                  </div>
                                                  <div class="item-inner lotteryTab_blockInner">
                                                    <div class="item-title-row">
                                                      <div style="color:#1592c6" class="item-title lotteryTab_blockInnerTitle"><?php echo ($v["user_name"]); ?></div>
                                                      <div class="item-after lotteryTab_blockInnerafter">
                                                            <span style="color:#999999"><?php echo date("Y-m-d H:i:s",$v['buy_time']);?></span>
                                                            <!-- <span>15:30:25</span> -->
                                                      </div>
                                                    </div>
                                                    <div style="color:#1a1a1a" class="item-text lotteryTab_blockInnertext">刚刚参与了<?php echo ($v["number"]); ?>单--<span><?php echo ($v["goods_price"]); ?></span>元充值卡</div>
                                                  </div>
                                                </a>
                                              </li><?php endforeach; endif; ?>           
                                            <script>
												//查看购买商品信息
												$(function(){
													$('.kj').click(function(){
														var id=$(this).attr('info');
														window.location.href='/duobao/index.php/Lottery/index/user_id/'+id;
													})
												})
												</script>    

                                            </ul>
                                         </div>
                                    </div>
                                </div>
                                <div id="tab5" class="tab">
                                    <div class="content-block">
                                      <div class="list-block media-list">
                                            <ul class=" lotteryfooterTab_ul">

                                            <?php if(is_array($info2)): foreach($info2 as $key=>$v): ?><li >
                                                <a href="#" class=" item-content">
                                                  <div class="item-media"><img src="<?php echo ($v['user_photo']); ?>" style='width: 2.5rem;'></div>
                                                  <div class="item-inner lotteryTab_blockInner">
                                                    <div class="item-title-row">
                                                      <div style="color:#1592c6" class="item-title lotteryTab_blockInnerTitle"><?php echo ($v["user_name"]); ?></div>
                                                      <div class="item-after lotteryTab_blockInnerafter">
                                                            <span style="color:#999999"><?php echo date("Y-m-d H:i:s",$v['buy_time']);?></span>
                                                            <!-- <span>15:30:25</span> -->
                                                      </div>
                                                    </div>
                                                    <div style="color:#1a1a1a" class="item-text lotteryTab_blockInnertext">刚刚胜出~夺得<?php echo ($v["number"]); ?>张--<span><?php echo ($v["goods_price"]); ?></span>元充值卡</div>
                                                  </div>
                                                </a>
                                              </li><?php endforeach; endif; ?>  

                                              
                                            </ul>
                                         </div>
                                    </div>
                                </div>
                                <div id="tab6" class="tab lotteryTab_blockTab6">
                                    <div class="content-block">
                                      <div class="content-block-title row lotteryTab_blockTab6Title">
                                            <div class="col-33">
                                                <span>期号</span>
                                            </div>
                                            <div class="col-33">
                                                <span>开奖号</span>
                                            </div>
                                            <div class="col-33">
                                                <span>中奖</span>
                                            </div>
                                      </div>
                                     <div class="list-block">
                                        <ul>

                                        <?php if(is_array($info3)): foreach($info3 as $key=>$v): if($v['award_number']!=''): ?><li class="item-content">
                                            <div class="item-inner lotteryTab_blockTab6Inner">
                                              <div class="item-title"><?php echo ($v["date_number"]); ?></div>
                                              <div class="item-after">
                                                <?php echo (substr($v['award_number'],0,4)); ?><span style="color:#fc431f"><?php echo (substr($v['award_number'],-1)); ?></span>
                                              </div>
                                              <?php if($v['award_number']%2==0): ?><div style="color:#fc5a39" class="item-after colorone">
                                                买双
                                              </div>
                                             <?php else: ?>
                                             <div class="item-after" style="color:#20d865">
                                                买单
                                              </div><?php endif; ?>
                                            </div>
                                          </li><?php endif; endforeach; endif; ?>
                                          
                                        </ul>
                                      </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                
                </div>
                
                <!--popup-->
                <!-- 买单 -->
                <div class="popup popup-about aboutPop">
                    <div class="content">
                        <div class="content-block">
                            <!--购买单数-->
                            <div class="card">
                                <div class="card-header pay_header">
                                    <span>购买</span>
                                    <a class="close-popup">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-close"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-content ">
                                    <ul class="row">
                                        <li class="col-25">
                                            <input type="button" id="" value="1单" class="aboutPopclick"/>
                                        </li>
                                        <li class="col-25 "><input type="button" id="" value="5单"class="aboutPopclick" /></li>
                                        <li class="col-25 "><input type="button" id="" value="10单" class="aboutPopclick"/></li>
                                        <li class="col-25 "><input type="button" id="" value="20单" class="aboutPopclick"/></li>
                                        <li class="col-25 "><input type="button" id="" value="50单"class="aboutPopclick" /></li>
                                            <li class="col-25 "><input type="button" id="" value="60单"class="aboutPopclick" /></li>
                                            <li class="col-25 "><input type="button" id="" value="80单" class="aboutPopclick"/></li>
                                            <li class="col-25">
                                                <input onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"  type="text" id="" value="" placeholder="其他数"  class="aboutPopclickText aboutPopclick sr1"/>
                                            </li>
                                    </ul>
                                    
                                </div>
                             </div>
                             <!--支付方式-->
                             <div class="card">
                                <div class="card-header">支付方式</div>
                                <div class="card-content aboutPop_cardcontent">
                                    <ul class="row ">
                                        <li class="col-33"><input type="button" id="" value="夺宝币" class="aboutPop_pay"/></li>
                                        <li class="col-33"><input type="button" id="" value="微信" class="aboutPop_pay"/></li>
                                        <!-- <li class="col-33"><input type="button" id="" value="支付宝" class="aboutPop_pay"/></li> -->
                                    </ul>
                                    <input type="hidden" id="fangshi" value="" />
                                    <input type="hidden" id="danshu" value="" />
									<input type="hidden" id="shuru" value="" />
                                    <!-- 获取方式-->
                                    <script type="text/javascript">
										$(function(){
											$('.aboutPop_pay').click(function(){
												$("#dan").removeAttr('disabled','');
												$(".sr1").blur();
												//获得方式
												var fangshi=$(this).val();
												$("#fangshi").val(fangshi);//放入隐藏域
												//获得其他数量
												var shul = $(".sr1").val();
												$("#shuru").val(shul);//放入隐藏域
												//alert(shul);
												//获取单数
												var danshu=$("#danshu").val();
												var danshu=danshu.substr(0,danshu.length-1);
												//alert(danshu);
												//判断选择哪个单数
												if(danshu!=''){
													var num=danshu;
												}else{
													var num=shul;
												}
												//获取夺宝商品的价格
												var price=$(".shangpin").text();
												var b=price.substr(0,price.length-3);
												if(b==20){
												 var c=12;
												}else if(b==50){
												 var c=28;
												}else if(b==100){
												 var c=55;
												}
												//把计算出来的总价放入文本中
												$(".tixingspans").html(num*c);
											})
										})
                                    </script>
                                    <!-- 获取单数 -->
                                    <script type="text/javascript">
									$(function(){
									 $('.aboutPopclick').click(function(){
											$("#dan").removeAttr('disabled','');
											$(".sr1").blur();
                                            var danshu=$(this).val();
                                            $("#danshu").val(danshu);
                                        })
									})
                                    </script>
									
									<!-- 获取输入值 -->
                                    
                                </div>
                             </div>
                             <!--支付详情-->
                             <div class="card aboutPop_tixing">
                                <div class="card-header">
                                    <span>温馨提示：夺宝有风险，参与需谨慎</span>
                                </div>
                                <div class="card-content ">
                                    <ul class="row">
                                        <li class="col-50">
                                            <p class="pay_text">
                                                <span>夺宝商品：</span><span class="aboutPop_tixingspan shangpin"></span>
                                            </p>
                                            <p class="pay_text">
                                                <span>购买：</span><span  class="aboutPop_tixingspans">买单数</span>
                                            </p>
                                        </li>
                                        <li class="col-50" style="width:50%;margin-left:0;">
                                            <p class="pay_text">
                                                <span>期号：</span><span  class="aboutPop_tixingspan maidan"></span>
                                                <!-- <?php if($_SESSION['number']): echo ($_SESSION['number']); ?>
                                                <?php else: ?>
                                                <?php echo ($_SESSION['new_date_number']); endif; ?> -->
                                            </p>
                                            <p class="pay_text">
                                                <span>总共需：</span><span  class="aboutPop_tixingspans tixingspans"></span><span>夺宝币</span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                             </div>
                             <!-- 异步请求最新购买期号 -->
                             <script type="text/javascript">

                             </script>
                             <!--按钮-->
                             <div class="aboutPop_btn">
                                <input type="button" id="dan" value="确定" />
                             </div>
                             <script type="text/javascript">
								//点击买单按钮
                                $("#dan").click(function(){
									$(this).attr('disabled','disabled');
									//获取总价格
									var total_price=$(".tixingspans").val();
									if(total_price!=''){
										var fangshi=$("#fangshi").val();
                                        if(fangshi=='夺宝币'){
                                            //alert("夺宝币");
                                            var price1=$(".shangpin").text();
                                            var b=price1.substr(0,price1.length-3);
                                            if(b==20){
                                             var c=12;
                                             var d=1;
                                             var e=4;
                                            }else if(b==50){
                                             var c=28;
                                             var d=2;
                                             var e=8;
                                            }else if(b==100){
                                             var c=55;
                                             var d=3;
                                             var e=12;
                                            }
											//获取总价格
                                            var price=$(".tixingspans").text();
                                            var number=parseFloat(price)/c;
                                            var type=1;
                                            var p_id=d;
                                            var goods_id=e;
                                            var date_number=$(".maidan").text();
											if(date_number!=""){
												$.post("/duobao/index.php/Index/money",{p_id:p_id,number:number},function(data){
													if(data==0){
														alert("余额不足");
													}else{
														$.post("/duobao/index.php/Index/pay",{p_id:p_id,number:number},function(data){
															if(data==0){
																 alert("支付失败");
															}else{
																$.post("/duobao/index.php/Index/buy",{p_id:p_id,number:number,goods_id:goods_id,type:type,date_number:date_number},function(data){
																		if(data==1){
																			alert('购买成功');
																			window.location='/duobao/index.php/Index/index.html';
																		}else{
																			alert('购买失败');
																			window.history.go(-1);
																		}
																})
															}
														})
													}
												})
											}else{
												alert("购买失败");
												return false;
											}
                                            
											
                                        }else if(fangshi=='微信'){
                                            //alert("微信");
                                            var price1=$(".shangpin").text();
                                            var b=price1.substr(0,price1.length-3);
                                            if(b==20){
                                             var c=12;
                                             var d=1;
                                             var e=4;
                                            }else if(b==50){
                                             var c=28;
                                             var d=2;
                                             var e=8;
                                            }else if(b==100){
                                             var c=55;
                                             var d=3;
                                             var e=12;
                                            }
											//获取总价格
                                            var price=$(".tixingspans").text();
                                            var number=parseFloat(price)/c;
                                            var type=1;
                                            var p_id=d;
                                            var goods_id=e;
                                            var date_number=$(".maidan").text();
											if(date_number!=""){
												window.location="/duobao/index.php/Index/wxbuy/p_id/"+p_id+"/number/"+number+"/goods_id/"+goods_id+"/type/"+type+"/date_number/"+date_number;
											}else{
												alert("购买失败");
												return false;
											}
                                            
                                        }else{
                                            alert("选择支付方式");
                                            return false;
                                        }
									}else{
										alert("请选择单数");
                                        return false;
									}
                                })
                             </script>

                         </div>
                    </div>
                </div>
                <!-- 买双 -->
                <div class="popup popup-services servicesPop">
                    <div class="content">
                        <div class="content-block">
                           <!--购买单数-->
                            <div class="card">
                                <div class="card-header pay_header">
                                    <span>购买</span>
                                    <a class="close-popup">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-close"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-content ">
                                    <ul class="row">
                                        <li class="col-25">
                                            <input type="button" id="" value="1单" class="aboutPopclick aboutPopclick1" />
                                        </li>
                                        <li class="col-25 "><input type="button" id="" value="5单"class="aboutPopclick aboutPopclick1" title="5"/></li>
                                        <li class="col-25 "><input type="button" id="" value="10单" class=" aboutPopclick aboutPopclick1"/></li>
                                        <li class="col-25 "><input type="button" id="" value="20单" class="aboutPopclick aboutPopclick1"/></li>
                                        <li class="col-25 "><input type="button" id="" value="50单"class="aboutPopclick aboutPopclick1" /></li>
                                            <li class="col-25 "><input type="button" id="" value="60单"class="aboutPopclick aboutPopclick1" /></li>
                                            <li class="col-25 "><input type="button" id="" value="80单" class="aboutPopclick aboutPopclick1"/></li>
                                            <li class="col-25">
                                                <input onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" type="text" id="" value="" placeholder="其他数"   class="aboutPopclickText aboutPopclick aboutPopclick1 sr2"/>
                                            </li>
                                    </ul>

                                    
                                </div>
                             </div>
                             <!--支付方式-->
                             <div class="card">
                                <div class="card-header">支付方式</div>
                                <div class="card-content aboutPop_cardcontent">
                                    <ul class="row">
                                        <li class="col-33"><input type="button" id="" value="夺宝币" class="aboutPop_pay aboutPop_pay1"/></li>
                                        <li class="col-33"><input type="button" id="" value="微信" class="aboutPop_pay aboutPop_pay1"/></li>
                                        <!-- <li class="col-33"><input type="button" id="" value="支付宝" class="aboutPop_pay"/></li> -->
                                    </ul>
                                    <!-- 获取方式 -->
                                    <script type="text/javascript">
									$(function(){
										$('.aboutPop_pay1').click(function(){
											$("#shuang").removeAttr('disabled','');
											$(".sr2").blur();
											//获得方式
											var fangshi=$(this).val();
											$("#fangshi").val(fangshi);//放入隐藏域
											//获得其他数量
											var shul = $(".sr2").val();
											$("#shuru").val(shul);//放入隐藏域
											//alert(shul);
											//获取单数
											var danshu=$("#danshu").val();
											var danshu=danshu.substr(0,danshu.length-1);
											//alert(danshu);
											//判断选择哪个单数
											if(danshu!=''){
												var num=danshu;
											}else{
												var num=shul;
											}
											//获取夺宝商品的价格
											var price=$(".shangpin").text();
											var b=price.substr(0,price.length-3);
											if(b==20){
											 var c=12;
											}else if(b==50){
											 var c=28;
											}else if(b==100){
											 var c=55;
											}
											//把计算出来的总价放入文本中
											$(".tixingspans").html(num*c);
										})
									})
                                    </script>
                                    <!-- 获取单数 -->
                                    <script type="text/javascript">
									$(function(){
									 $('.aboutPopclick1').click(function(){
											$("#shuang").removeAttr('disabled','');
											$(".sr2").blur();
											$("#shuru").val("");//清空输入框的隐藏域的值
                                            var danshu=$(this).val();
                                            $("#danshu").val(danshu);
                                        })
									})
                                       
                                    </script>
                                </div>
                             </div>
                             <!--支付详情-->
                             <div class="card servicesPop_tixing">
                                <div class="card-header">
                                    <span>温馨提示：夺宝有风险，参与需谨慎</span>
                                </div>
                                <div class="card-content ">
                                    <ul class="row">
                                        <li class="col-50">
                                            <p class="pay_text">
                                                <span>夺宝商品：</span><span class="aboutPop_tixingspan shangpin"></span>
                                            </p>
                                            <p class="pay_text">
                                                <span>购买：</span><span  class="aboutPop_tixingspans">买双数</span>
                                            </p>
                                        </li>
                                        <li class="col-50" style="width:50%;margin-left:0;">
                                            <p class="pay_text">
                                                <span>期号：</span><span  class="aboutPop_tixingspan maishuang"></span>
                                            </p>
                                            <p class="pay_text">
                                                <span>总共需：</span><span  class="aboutPop_tixingspans tixingspans"></span><span>夺宝币</span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                             </div>
                             <!--按钮-->
                             <div class="aboutPop_btn">
                                <input type="button" id="shuang" value="确定" />
                             </div>
                        </div>

                  

                        <script type="text/javascript">
                                $("#shuang").click(function(){
									$(this).attr('disabled','disabled');
									//获取总价格
									var total_price=$(".tixingspans").val();
									if(total_price!=''){
										var fangshi=$("#fangshi").val();
										if(fangshi=='夺宝币'){
											//alert('夺宝币');
											var price1=$(".shangpin").text();
											var b=price1.substr(0,price1.length-3);
											if(b==20){
											 var c=12;
											 var d=1;
											 var e=4;
											}else if(b==50){
											 var c=28;
											 var d=2;
											 var e=8;
											}else if(b==100){
											 var c=55;
											 var d=3;
											 var e=12;
											}
											//获取总价格
											var price=$(".tixingspans").text();
											//alert(price);
											var number=parseFloat(price)/c;
											var type=2;
											var p_id=d;
											var goods_id=e;
											var date_number=$(".maishuang").text();
											if(date_number!=""){
												$.post("/duobao/index.php/Index/money",{p_id:p_id,number:number},function(data){
													if(data==0){
														alert("余额不足");
													}else{
														$.post("/duobao/index.php/Index/pay",{p_id:p_id,number:number},function(data){
															if(data==0){
																 alert("支付失败");
															}else{
																$.post("/duobao/index.php/Index/buy",{p_id:p_id,number:number,goods_id:goods_id,type:type,date_number:date_number},function(data){
																		if(data==1){
																			alert('购买成功');
																			window.location='/duobao/index.php/Index/index.html';
																		}else{
																			alert('购买失败');
																			window.history.go(-1);
																		}
																})
															}
														})
													}
												})
											}else{
												alert('购买失败');
												return false;
											}
											
										}else if(fangshi=='微信'){
											//alert('微信');
											var price1=$(".shangpin").text();
											var b=price1.substr(0,price1.length-3);
											if(b==20){
											 var c=12;
											 var d=1;
											 var e=4;
											}else if(b==50){
											 var c=28;
											 var d=2;
											 var e=8;
											}else if(b==100){
											 var c=55;
											 var d=3;
											 var e=12;
											}
											//获取总价格
											var price=$(".tixingspans").text();
											//alert(price);
											var number=parseFloat(price)/c;
											var type=2;
											var p_id=d;
											var goods_id=e;
											var date_number=$(".maishuang").text();
											if(date_number!=""){
												window.location="/duobao/index.php/Index/wxbuy/p_id/"+p_id+"/number/"+number+"/goods_id/"+goods_id+"/type/"+type+"/date_number/"+date_number;
											}else{
												alert("购买失败");
												return false;
											}
											
										}else{
											alert("选择支付方式");
											return false;
										}
									}else{
										alert("请选择单数");
										return false;
									}
                                })
                             </script>
                    </div>
                </div>
                <!-- 充值 -->
                <div class="popup popup-chongzhi aboutPop chongzhiPage">
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
                                            <input type="button" id="" value="10元" class="aboutPopclick aboutPopclick11"/>
                                        </li>
                                        <li class="col-25 "><input type="button" id="" value="30元"class="aboutPopclick aboutPopclick11" /></li>
                                        <li class="col-25 "><input type="button" id="" value="50元" class="aboutPopclick aboutPopclick11"/></li>
                                        <li class="col-25 "><input type="button" id="" value="100元" class="aboutPopclick aboutPopclick11"/></li>
                                        <li class="col-25 "><input type="button" id="" value="200元"class="aboutPopclick aboutPopclick11" /></li>
                                            <li class="col-25 "><input type="button" id="" value="500元"class="aboutPopclick aboutPopclick11" /></li>
                                            <li class="col-25 "><input type="button" id="" value="990元" class="aboutPopclick aboutPopclick11"/></li>
                                            <li class="col-25">
                                                <input type="text" id="" value="" placeholder="其他金额"  class="aboutPopclickText sr11" style="padding:0.25rem 0.1rem;"/>
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
                                    <input type="hidden" id="fangshi1" value="" />
                                    <input type="hidden" id="jine" value="" />
                                    <input type="hidden" id="shuru1" value="" />
									<input type="hidden" id="price" value="" />
									
                                </div>
                             </div>
                             
                             <!--按钮-->
                             <div class="aboutPop_btn">
                                <input type="button" id="dan1" value="支付" />
                             </div>
                             <script>
								//获取金额
								$(function(){
									$(".aboutPopclick11").click(function(){
										//失去焦点
										$(".sr11").blur();
										//清除输入框内容
										$(".sr11").val("");
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
										$(".sr11").blur();
										var fangshi=$(".aboutPop_pay").val();
										$("#fangshi1").val(fangshi);//把支付方式放进隐藏域
									})
								})
							</script>
							
							<script>
								$(function(){
									$("#dan1").click(function(){
									
										//获取金额
										var jine=$("#jine").val();
										//alert(jine);
										//获取输入金额
										var sr=$(".sr11").val();
										
										$("#shuru1").val(sr);//把输入金额放进隐藏域
										var shuru=$("#shuru1").val();
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
										var fangshi=$("#fangshi1").val();
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
											$("#fangshi1").val("");
											window.location="/duobao/index.php/My/chongzhi/money/"+money;
										}
									})
								})
							</script>

                         </div>
                    </div>
                </div>
                <!-- 兑换 -->
                <div class="popup popup-duihuan aboutPop chongzhiPage">
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
                </div>
				<!--夺宝规则 -->
                <div class="popup popup-rule aboutPop chongzhiPage">
                    <div class="content">
                        <div class="content-block" style="position: relative;top: 50%;">
                            <!--购买单数-->
                            <div class="card">
                                <div class="card-header pay_header">
                                    <span>夺宝规则</span>
                                    <a class="close-popup">
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-close"></use>
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-content " style="background: #fde47f;margin: 0.5rem;">
                                	<div class="row" style="border-bottom: none;">
                                		<div class="col-25" style="">
                                			<img src="/duobao/pub/home/img/hover1.png"/>
                                		</div>
                                		<div class="col-50 row" style="border-bottom: none;position: relative;top:0.5rem;padding-bottom: 0;">
                                			<div class="col-33">
                                				<p style="font-weight: 900;color: #333;">玩家A</p>
                                				<p style="border: 1px solid #ccc;text-align: center;background: white;color:#cb1b3f ;">买单</p>
                                			</div>
                                			<div class="col-33">
                                				<img src="/duobao/pub/home/img/vs.png" style="padding-top:1.2rem;"/>
                                			</div>
                                			<div class="col-33" style="">
                                				<p style="font-weight: 900;color: #333;">玩家B</p>
                                				<p style="border: 1px solid #ccc;text-align: center;background: white;color:#cb1b3f ;">买双</p>
                                			</div>
                                		</div>
                                		<div class="col-25">
                                			<img src="/duobao/pub/home/img/hover2.png"/>
                                		</div>
                                	</div>
								    <div class="card-content">
								      <div class="list-block media-list">
								        <ul>
								          <li class="item-content">
								            <div class="item-inner">
								              <div class="item-title-row">
								                <div class="item-title" style="margin: 0 auto;">夺宝规则</div>
								              </div>
								              <div class="item-subtitle" style=" word-wrap:break-word;text-align: center;">根据最近一期的开奖号码的最后<br />一位数字的单双为本期PK获胜方</div>
								            </div>
								          </li>
								        </ul>
								      </div>
								      <div class="row" style="border-bottom: none;">
								      	<div class="col-80" style="margin-left: 12%;text-align: center;background: url(/duobao/pub/home/img/tuan.png) no-repeat 1rem 0.5rem;">
								      		<p style="margin-top:1.5rem;margin-bottom: 0;color: white;">当期开奖号码</p>
								      		<p style="margin-top:0;margin-bottom: 0;color: white;">11058</p>
								      		<p style="margin-top:0;margin-bottom: 0;color: white;">最后一个数字8为双</p>
								      		<p style="margin-top:0;margin-bottom:2rem;color: white;">本期获胜方为玩家B</p>
								      	</div>
								      </div>
							    	</div>
                                    

                                </div>
                                <div class="card-footer">
							      <span class="close-popup" style="text-align: center;margin:0 auto;color: #5593b8;">知道了</span>
							    </div>
                             </div>
                         </div>
                    </div>
                </div><!--/ 夺宝规则 -->




            </div>  
        </div>
        
        <script type="text/javascript">
            $(function() {
                FastClick.attach(document.body);
                //popup关闭
                $(document).on('click','.open-about', function () {
                  $.popup('.popup-about');
                });
                $(document).on('click','.open-services', function () {
                  $.popup('.popup-services');
                });
                $(document).on('click','.open-chongzhi', function () {
                  $.popup('.popup-chongzhi');
                });
                $(document).on('click','.open-duihuan', function () {
                  $.popup('.popup-duihuan');
                });
				$(document).on('click','.open-rule', function () {
                  $.popup('.popup-rule');
                });

                //popup点击事件  文本框输入事件
				$('.aboutPopclickText').click(function(){
					$("#danshu").val("");//清除单数隐藏域的值
					//$(this).attr('autofocus');
					$(this).focus();
					$(this).css({'background':'red','color':'white'});
                     $(this).parent().siblings().find('.aboutPopclick').css({'background':'','color':''}) 
				})
              
               
				$('.aboutPopclick').click(function(){
					$(this).css({'background':'red','color':'white'});
                	$(this).parent().siblings().find('input').css({'background':'','color':''});
                	 $('.aboutPopclickText').val('');
				})
                // 只输入数字
                $('input[type=text]').keypress(function(e) { 
                    if (!String.fromCharCode(e.keyCode).match(/[0-9\.]/)) { 
                        alert("请输入数字") ;  
                        
                    }           
                });
                // 获取焦点
                <!-- $('.aboutPopclickText').focus(function (){  -->
                    <!-- $(this).css({'background':'red','color':'white'}); -->
                      <!-- $(this).parent().siblings().find('.aboutPopclick').css({'background':'','color':''})    -->
                <!-- });  -->


                $('.aboutPop_pay').click(function(e){
                    $(this).css({'background':'red','color':'white'})
                    $(this).parent().siblings().find('.aboutPop_pay').css({'background':'','color':''})
                });
            });
//          $.init();
        </script>
        <!--banner-->
        <script type="text/javascript">
            var mySwiper1 = new Swiper('.card_box_1' , {
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
                observer:true,//修改swiper自己或子元素时，自动初始化swiper  
                observeParents:true,//修改swiper的父元素时，自动初始化swiper  
           });
           var mySwiper2 = new Swiper('.card_box_2' , {
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
                observer:true,//修改swiper自己或子元素时，自动初始化swiper  
                observeParents:true,//修改swiper的父元素时，自动初始化swiper
           });
            var mySwiper3 = new Swiper('.card_box_3' , {
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
                observer:true,//修改swiper自己或子元素时，自动初始化swiper  
                observeParents:true,//修改swiper的父元素时，自动初始化swiper
           });
            
        </script>

    




        <script type="text/javascript">
            $(function(){
           
                $('.swiper-slide').click(function(){
                    if($(this).hasClass('swiper-slide-active')){
                        window.pageManager.gooo('good',$(this).data('id'),$(this).data('cp'),$(this).data('cptype'),$(this).data('price'),$(this).data('pic'),'card_box_3')
                    };
             });

                 $('.aboutPopclick').click(function(){
                       var num=$(this).val();
                       var price=$(".shangpin").text();
                       var b=price.substr(0,price.length-3);
                       if(b==20){
                        var c=12;
                       }else if(b==50){
                        var c=28;
                       }else if(b==100){
                        var c=55;
                       }
                       //alert(b);
					   //把总价格放入文本中
                       var a =num.substr(0,num.length-1);
                        $(".tixingspans").html(a*c);
                    })
                
            })
        </script>
        <!--循环倒计时-->
        <!--<script type="text/javascript"  language="javascript">
            setTimeout("count_down()",1000);//设置每一秒调用一次倒计时函数
            //根据天，时，分，秒的ID找到相对应的元素
//          var time_day = document.getElementById("times_day");
            var time_hour = document.getElementById("times_hour");
            var time_minute = document.getElementById("times_minute");
            var time_second = document.getElementById("second");
            var time_end = new Date();  // 设定活动结束结束时间
            time_end = time_end.getTime();
            //定义倒计时函数
            function count_down(){ 
               var time_now = new Date();  // 获取当前时间
               time_now = time_now.getTime();
               var time_distance = time_end - time_now;  // 时间差：活动结束时间减去当前时间  
               var  int_hour, int_minute, int_second;   
                 if(time_distance >= 0){   
                     // 相减的差数换算成天数   
//                   int_day = Math.floor(time_distance/86400000)
//                   time_distance -= int_day * 86400000; 
                 // 相减的差数换算成小时
                        int_hour = Math.floor(time_distance/3600000) 
                        time_distance -= int_hour * 3600000;  
                // 相减的差数换算成分钟   
                     int_minute = Math.floor(time_distance/60000)    
                    time_distance -= int_minute * 60000; 
                 // 相减的差数换算成秒数  
                      int_second = Math.floor(time_distance/1000)  
                    // 判断小时小于10时，前面加0进行占位
                        if(int_hour < 10) 
                        int_hour = "0" + int_hour;  
                // 判断分钟小于10时，前面加0进行占位      
                  if(int_minute < 10)    
                   int_minute = "0" + int_minute;  
                 // 判断秒数小于10时，前面加0进行占位 
                       if(int_second < 10) 
                       int_second = "0" + int_second;    
                // 显示倒计时效果     
//              time_day.innerHTML = int_day;
                time_hour.innerHTML = int_hour; 
                time_minute.innerHTML = int_minute; 
                time_second.innerHTML = int_second;
                setTimeout("count_down()",1000);
                   }else{
                //指定的结束日期结束后，往后推迟3天，或者称之为：往后加3天
                //在这里可以非常灵活的设置：比如往后推迟2天或往后加2天：2*24*60*60*1000
                //比如往后推迟1天或往后加1天：1*24*60*60*1000
                //比如往后推迟2小时或往后加2小时：2*60*60*1000
                // 比如往后推迟40分钟或往后加40分钟：40*1000这里设置根据大家需要，灵活设置。
                // time_end=time_end+0*24*60*60*1000;
                time_end=time_end+5*60*1000;
                setTimeout("count_down()",1000); 
                   }
        }
        </script>-->
        <script type="text/javascript">
    $.extend($.fn,{
        //懒人建站 http://www.51xuediannao.com/
        fnTimeCountDown:function(d){
            this.each(function(){
                var $this = $(this);
                var o = {
                    hm: $this.find(".hm"),
                    sec: $this.find(".sec"),
                    mini: $this.find(".mini"),
                    hour: $this.find(".hour"),
                    day: $this.find(".day"),
                    month:$this.find(".month"),
                    year: $this.find(".year")
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
                        //d = d || Date.UTC(2050, 0, 1); //如果未定义时间，则我们设定倒计时日期是2050年1月1日
                        var _d = $this.data("end") || d;
                        var now = new Date(),
                            endDate = new Date(_d);
                        //现在将来秒差值
                        //alert(future.getTimezoneOffset());
                        var dur = (endDate - now.getTime()) / 1000 , mss = endDate - now.getTime() ,pms = {
                            hm:"000",
                            sec: "00",
                            mini: "00",
                            hour: "00",
                            day: "00",
                            month: "00",
                            year: "0"
                        };
                        if(mss > 0){
                            pms.hm = f.haomiao(mss % 1000);
                            pms.sec = f.zero(dur % 60);
                            pms.mini = Math.floor((dur / 60)) > 0? f.zero(Math.floor((dur / 60)) % 60) : "00";
                            pms.hour = Math.floor((dur / 3600)) > 0? f.zero(Math.floor((dur / 3600)) % 24) : "00";
                            pms.day = Math.floor((dur / 86400)) > 0? f.zero(Math.floor((dur / 86400)) % 30) : "00";
                            //月份，以实际平均每月秒数计算
                            pms.month = Math.floor((dur / 2629744)) > 0? f.zero(Math.floor((dur / 2629744)) % 12) : "00";
                            //年份，按按回归年365天5时48分46秒算
                            pms.year = Math.floor((dur / 31556926)) > 0? Math.floor((dur / 31556926)) : "0";
                        }else{
                            pms.year=pms.month=pms.day=pms.hour=pms.mini=pms.sec="00";
                            pms.hm = "000";

                           //alert('结束了');

                         //倒计时结束时时彩期号必须+1;
                         $.post("/duobao/index.php/Index/add_date_number",function(data){

                         });
						 
                           $.getJSON("/duobao/index.php/Index/number",function(json){
                                $("#fnTimeCountDown").fnTimeCountDown(json.date);
                           })

                            
                            return;
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
                        if(o.day){
                            o.day.html(f.dv().day);
                        }
                        if(o.month){
                            o.month.html(f.dv().month);
                        }
                        if(o.year){
                            o.year.html(f.dv().year);
                        }
                        setTimeout(f.ui, 1);
                    }
                };
                f.ui();
            });
        }
    });
</script>
<script type="text/javascript">
   
    var oDate = new Date(); //实例一个时间对象；
    var year=oDate.getFullYear();   //获取系统的年；
    var month=oDate.getMonth()+1;   //获取系统月份，由于月份是从0开始计算，所以要加1
    var date=oDate.getDate(); // 获取系统日，
    var hours=oDate.getHours(); //获取系统时，
    var minutes=oDate.getMinutes(); //分
    var Seconds=oDate.getSeconds(); //秒

    if(hours >= 10 && hours<22){
        if(minutes<10 && minutes>=0){
            var time_now_server=year+'/'+month+'/'+date+' '+(hours)+':10'+':'+'00';
        }
        if(minutes>=10 && minutes<20){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':20'+':'+'00';
        }
        if(minutes>=20 && minutes<30){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':30'+':'+'00';
        }
        if(minutes>=30 && minutes<40){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':40'+':'+'00';
        }
        if(minutes>=40 && minutes<50){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':50'+':'+'00';
        }
        if(minutes>=50){
            var time_now_server=year+'/'+month+'/'+date+' '+(hours+1)+':00'+':'+'00';
        }
    }
    if(hours >= 22 && hours<=24){
        if(minutes<5 && minutes>0){
            var time_now_server=year+'/'+month+'/'+date+' '+(hours)+':5'+':'+'00';
        }
        if(minutes>=5 && minutes<10){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':10'+':'+'00';
        }
        if(minutes>=10  && minutes<15){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':15'+':'+'00';
        }
        if(minutes>=15  && minutes<20){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':20'+':'+'00';
        }
        if(minutes>=20  && minutes<25){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':25'+':'+'00';
        }
        if(minutes>=25  && minutes<30){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':30'+':'+'00';
        }
        if(minutes>=30  && minutes<35){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':35'+':'+'00';
        }
        if(minutes>=35  && minutes<40){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':40'+':'+'00';
        }
        if(minutes>=40  && minutes<45){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':45'+':'+'00';
        }
        if(minutes>=45  && minutes<50){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':50'+':'+'00';
        }
        if(minutes>=50  && minutes<55){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':55'+':'+'00';
        }
        if(minutes>=50){
            var time_now_server=year+'/'+month+'/'+date+' '+(hours+1)+':00'+':'+'00';
        }
    }
    if(hours<2){
        if(minutes<5 && minutes>0){
            var time_now_server=year+'/'+month+'/'+date+' '+(hours)+':5'+':'+'00';
        }
        if(minutes>=5 && minutes<10){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':10'+':'+'00';
        }
        if(minutes>=10  && minutes<15){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':15'+':'+'00';
        }
        if(minutes>=15  && minutes<20){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':20'+':'+'00';
        }
        if(minutes>=20  && minutes<25){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':25'+':'+'00';
        }
        if(minutes>=25  && minutes<30){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':30'+':'+'00';
        }
        if(minutes>=30  && minutes<35){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':35'+':'+'00';
        }
        if(minutes>=35  && minutes<40){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':40'+':'+'00';
        }
        if(minutes>=40  && minutes<45){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':45'+':'+'00';
        }
        if(minutes>=45  && minutes<50){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':50'+':'+'00';
        }
        if(minutes>=50  && minutes<55){
            var time_now_server=year+'/'+month+'/'+date+' '+hours+':55'+':'+'00';
        }
        if(minutes>=50){
            var time_now_server=year+'/'+month+'/'+date+' '+(hours+1)+':00'+':'+'00';
        }
    }
    if(hours>2 && hours<10){
        var time_now_server=year+'/'+month+'/'+date+' '+10+':00'+':'+'00';
    }
    $("#fnTimeCountDown").fnTimeCountDown(time_now_server);
    
</script>
<script type="text/javascript">
   function information(){
        //alert(1);
        $.getJSON("/duobao/index.php/Index/number",function(json){
            result=json.award_number;
              
            if(result!=""){

				$("#hao").html(result);
            }
            var res=parseFloat(result);
            if(result%2==0){
                <!-- $.get("/duobao/index.php/Index/lottery_start",function(data){ -->
                    <!-- //alert(1); -->
                <!-- }) -->
                if(result!=""){
                $("#res").html("买双");
                }
            }else{
                <!-- $.get("/duobao/index.php/Index/lottery_start",function(data){ -->
                    <!-- //alert(2); -->
                <!-- }) -->
                if(result!=""){
                    $("#res").html("买单");
                }
            }
       })
    }
 setInterval(information,'1000'); 

</script>


    </body>
</html>