<?php
namespace Home\Controller;

class IndexController extends BaseController {
    public function index(){
		$openid=$_SESSION['userinfo']['openid'];
		$userinfo=M("userinfo")->where("openid='$openid'")->find();
		$_SESSION['userinfo']=$userinfo;
        //$type=reset($_GET['type'])?$_GET['type']:"1";
    	//if($type==1){//最新参与记录
            $info1=M("buy a,cow_userinfo b,cow_goods c")->where("a.wx=1 and a.controller=0 and a.user_id=b.id and a.goods_id=c.id")->order("buy_time desc")->select();
            $this->assign("info1",$info1);
        //}else if($type==2){//最新夺宝榜单
            //$old_number=$_SESSION['old_number'];//上一期的时时彩编号
            $info2=M("buy a,cow_userinfo b,cow_goods c")->where("a.wx=1 and a.user_id=b.id and a.goods_id=c.id and a.controller!=0 and a.success=1")->order("buy_time desc")->limit(0,40)->select();
            $this->assign("info2",$info2);
        //}else if($type==3){//开奖记录
            $info3=M("award")->order("award_time desc")->limit(0,100)->select();
            $this->assign("info3",$info3);
        //}
        //最新时时彩期号
        $info=M("award")->where("award_number!=''")->order("date_number desc")->limit(0,1)->find();
		//$date_number=$info['date_number'];
		//$date_number1=$date_number-1;
		//$info=M("award")->where("date_number='$date_number1'")->find();
        $this->assign("info",$info);
		$this->assign("userinfo",$userinfo);
    	$this->display("index");
    }
	//购买商品
    public function wxbuy(){
        
        //商品父id
        $data['p_id']=$_GET['p_id'];
        //商品ID
        $data['goods_id']=$_GET['goods_id'];
        //用户id
        $data['user_id']=$_SESSION['userinfo']['id'];
        //购买类型
        $data['type']=$_GET['type'];
        //购买时间
        $data['buy_time']=time();
        //购买数量
        $data['number']=$_GET['number'];
        //是否开奖
        $data['controller']="0";
        //时时彩期号
        $data['date_number']=$_GET['date_number'];
         //订单号
        $data['order_number']=time().rand(1000,9999);
		
		//print_r($data);exit;
		
        $res=M("buy")->add($data);
		//echo M()->getLastSql();exit;
        $appid = "wx7d6168bbba1648d5";
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri=http://www.detaihome.com/bocai/index.php/Wxpay/pay/id/'.$res.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
       header("Location:".$url);
     }   
    //购买商品
    public function buy(){

        //商品父id
        $data['p_id']=$_POST['p_id'];
        //商品ID
        $data['goods_id']=$_POST['goods_id'];
        //用户id
        $data['user_id']=$_SESSION['userinfo']['id'];
        //购买类型
        $data['type']=$_POST['type'];
        //购买时间
        $data['buy_time']=time();
        //购买数量
        $data['number']=$_POST['number'];
        //是否开奖
        $data['controller']="0";
        //时时彩期号
        $data['date_number']=$_POST['date_number'];
		//订单号
        $data['order_number']=time().rand(1000,9999);
		//订单状态
		$data['wx']=1;
        $res=M("buy")->add($data);
        if($res){
            $this->ajaxReturn(1);//购买成功
            //echo "<meta charset='utf-8' /><script>alert('购买成功');window.location='/index.php/Index/index.html';</script>";
        }else{
            $this->ajaxReturn(0);//购买失败
            //echo "<meta charset='utf-8' /><script>alert('购买失败');window.history.go(-1);</script>";
        }

    }

    //支付
    public function pay(){
        //商品父id
        $p_id=$_POST['p_id'];
        //用户id
        $user_id=$_SESSION['userinfo']['id'];
        //购买数量
        $number=$_POST['number'];
        //查询用户余额
        $info=M("userinfo")->where("id=$user_id")->find();
        $money=$info['money'];
        //在此之前已经异步判断好余额是否充足
        //扣除购买商品的价钱
        if($p_id==1){
            $price=$number*12;
            $chaz=$money-$price;
            $data['money']=$chaz;
            $res=M("userinfo")->where("id=$user_id")->save($data);
            if($res){
                $this->ajaxReturn(1);//购买成功
                //echo "<meta charset='utf-8' /><script>alert('购买成功');window.location='/index.php/Index/index.html';</script>";
            }else{
                $this->ajaxReturn(0);//购买失败
              //echo "<meta charset='utf-8' /><script>alert('购买失败');window.history.go(-1);</script>";  
            }
        }else if($p_id==2){
            $price=$number*28;
            $chaz=$money-$price;
            $data['money']=$chaz;
            $res=M("userinfo")->where("id=$user_id")->save($data);
            if($res){
                $this->ajaxReturn(1);//购买成功
                //echo "<meta charset='utf-8' /><script>alert('购买成功');window.location='/index.php/Index/index.html';</script>";
            }else{
                $this->ajaxReturn(0);//购买失败
              //echo "<meta charset='utf-8' /><script>alert('购买失败');window.history.go(-1);</script>";  
            }
        }else if($p_id==3){
            $price=$number*55;
            $chaz=$money-$price;
            $data['money']=$chaz;
            $res=M("userinfo")->where("id=$user_id")->save($data);
            if($res){
                $this->ajaxReturn(1);//购买成功
                //echo "<meta charset='utf-8' /><script>alert('购买成功');window.location='/index.php/Index/index.html';</script>";
            }else{
                $this->ajaxReturn(0);//购买失败
              //echo "<meta charset='utf-8' /><script>alert('购买失败');window.history.go(-1);</script>";  
            }
        }
    }

    //异步查询余额是否充足
    public function money(){
        //商品父id
        $p_id=$_POST['p_id'];
        //用户id
        $user_id=$_SESSION['userinfo']['id'];
        //购买数量
        $number=$_POST['number'];
        //查询用户余额
        $info=M("userinfo")->where("id=$user_id")->find();
        $money=$info['money'];
        if($p_id==1){
            $chaz=$money-$number*12;
            if($chaz>=0){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }else if($p_id==2){
            $chaz=$money-$number*28;
            if($chaz>=0){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }else if($p_id==3){
            $chaz=$money-$number*55;
            if($chaz>=0){
                $this->ajaxReturn(1);
            }else{
                $this->ajaxReturn(0);
            }
        }
    }
    //异步刷新购买所需夺宝币
    // public function ajax_buy(){
        //商品类型
        // $p_id=$_POST['p_id'];
        //数量
        // $number=$_POST['number'];
        // if($p_id==1){
            // $price=$number*12;
        // }else if($p_id==2){
            // $price=$number*28;
        // }else if($p_id){
            // $price=$number*55;
        // }
        // $this->ajaxReturn($price);
    // }

    //开奖
    public function lottery_start(){    
        //设置参数
        $data = file_get_contents("http://a.apiplus.net/newly.do?token=t3c80a82fb817426fk&code=cqssc&format=json");

        //$data缓存
         $array = json_decode($data,true);
         $a=$array['data'];
         $a=array_slice($a, 0, 1);//获取数组第一个成员
         foreach ($a as $k => $v) {
             $date_number=$v['expect'];
             $number=$v['opencode'];
             $time=$v['opentime'];
         }
        //print_r($date_number);exit;
        //查询最新的开奖号码是否是刚结束的一期号码
        $res1=M("award")->where("date_number='$date_number'")->find();
        if($res1){
            /*//开奖号码分解
             $number = explode(",",$number);
             foreach($number as $k => $v) {
                 $html .= $v;
             }*/ 
			//从表中查询最新开奖号码
			$newNum=M("award")->where("date_number='$date_number'")->find();
			$html=$newNum['award_number'];
            //用号码除以2取余数
            //余数为0时则买双号的赢
             $res=$html%2;
             if($res==0){
                 $jieg="2";//双号
             }else{
                 $jieg="1";//单号
             }
			//判断当前时间是否是00点
			 $hour=date("H");
			 $minute=date('i');
			 if($hour=='00' && $minute<'05'){
				 $date_number=$_SESSION['qihao']."120";//拼接昨天的最后一期号码
			 }else{
				 $_SESSION['qihao']=date("Ymd");
				 $date_number=$date_number-1;
			 }
             if($jieg==2){
               // echo "2";
                 $info1=M("buy")->where("wx=1 and type=2 and controller=0 and date_number='$date_number'")->select();
                //echo M()->getLastSql();exit;
                 for($i=0;$i<count($info1);$i++){
					 $id=$info1[$i]['id'];
                     $p_id=$info1[$i]['p_id'];
                     $user_id=$info1[$i]['user_id'];
                    //echo $user_id;exit;
                     $number=$info1[$i]['number'];//几单
                     $info4=M("userinfo")->where("id='$user_id'")->find();
                    //echo M()->getLastSql();
                     $money=$info4['money'];
                     if($p_id==1){//20
                         $dataa['money']=$money+$number*20;
                         $res=M("userinfo")->where("id='$user_id'")->save($dataa);
                        echo M()->getLastSql();
                     }else if($p_id==2){//50
                         $dataa['money']=$money+$number*50;
                         $res=M("userinfo")->where("id='$user_id'")->save($dataa);
                        
                     }else if($p_id==3){//100
                         $dataa['money']=$money+$number*100;
                         $res=M("userinfo")->where("id=$user_id")->save($dataa);
                        
                     }
					 $succ['success']=1;
					 M("buy")->where("id='$id'")->save($succ);
                 }
                 $info2=M("buy")->where("date_number='$date_number' and wx=1")->select();
                 for($i=0;$i<count($info2);$i++){
                     $id=$info2[$i]['id'];
                     $data1['controller']=1;
                     M("buy")->where("id=$id")->save($data1);
                 }
				
            //否则 则买单号的赢
             }else if($jieg==1){
                //echo "1";
                 $info2=M("buy")->where("wx=1 and type=1 and controller=0 and date_number='$date_number'")->select();
                //echo M()->getLastSql();exit;
                 for($i=0;$i<count($info2);$i++){
					 $id=$info2[$i]['id'];
                     $p_id=$info2[$i]['p_id'];
                     $user_id=$info2[$i]['user_id'];
                   // echo $user_id;exit;
                     $number=$info2[$i]['number'];
                     $info3=M("userinfo")->where("id=$user_id")->find();
                   // echo M()->getLastSql();exit;
                     $money=$info3['money'];
                     if($p_id==1){//20
                         $datab['money']=$money+$number*20;
                         $res=M("userinfo")->where("id=$user_id")->save($datab);
                        echo M()->getLastSql();
                     }else if($p_id==2){//50
                         $datab['money']=$money+$number*50;
                         $res=M("userinfo")->where("id=$user_id")->save($datab);
                        
                     }else if($p_id==3){//100
                         $datab['money']=$money+$number*100;
                         $res=M("userinfo")->where("id=$user_id")->save($datab);
                        
                     }
					 $succ['success']=1;
					 M("buy")->where("id='$id'")->save($succ);
                 }
                 $info1=M("buy")->where("date_number='$date_number' and wx=1")->select();
                 for($i=0;$i<count($info1);$i++){
                     $id=$info1[$i]['id'];
                     $data1['controller']=1;
                     M("buy")->where("id='$id'")->save($data1);
                 }
             }
        }
        
    }
    //查询最新开奖号
    public function number(){
        $info=M("award")->where("award_number!=''")->order("date_number desc")->limit(0,1)->find();
        /*echo M()->getLastSql();
        exit;*/
        //判断三种时间段
        $hour=date('H');
        if(10<=$hour&&$hour<22){
            $info['date']=date('Y-m-d H:i:s',strtotime("+10 minutes"));
        }else if(22<=$hour&&$hour<=24 ){
            $info['date']=date('Y-m-d H:i:s',strtotime("+5 minutes"));
        }else if($hour<2){
            $info['date']=date('Y-m-d H:i:s',strtotime("+5 minutes"));
        }else if(2<=$hour&&$hour<10){
            $info['date']=date('Y-m-d H:i:s',strtotime("+8 hours"));
        }
        $this->ajaxReturn($info);
    }
 
    //时时更新时时彩期号
	//8秒时时更新时时彩旗号
    /* public function add_date_number(){
		
		// 设置参数
         $data = file_get_contents("http://a.apiplus.net/newly.do?token=t3c80a82fb817426fk&code=cqssc&format=json");

        //获取数据
         $array = json_decode($data,true);
         $a=$array['data'];
         $a=array_slice($a, 0, 1);//获取数组第一个成员
         foreach ($a as $k => $v) {
             $date_number=$v['expect'];
             $number=$v['opencode'];
               $time=$v['opentime'];
         }
		
		//期号如果为空
		 if($date_number==null){
			//$this->ajaxReturn('kong');
			 exit;
		 }else{
			//$this->ajaxReturn('youzhi');
			//exit;
			//开奖号码分解
			 $number = explode(",",$number);
			 foreach($number as $k => $v) {
				 $html .= $v;
			 }
			 $res=$html%2;
			 if($res==0){
				 $jieg="2";//双号
			 }else{
				 $jieg="1";//单号
			 }
			//判断最新接口的期号是否已经存在表中
			 $res1=M("award")->where("date_number='$date_number'")->find();
			 if(!$res1){//如果不存在
				//$this->ajaxReturn('tianjia');
				//exit;
				 $arr['date_number']=$date_number;
				 $arr['award_number']=$html;
				 $arr['award_time']=$time;
				 $arr['type']=$jieg;
				 M("award")->add($arr);
			 }
		 }
		
		
     }*/
		
		//时时更新时时彩期号
	//8秒时时更新时时彩旗号
	public function add_date_number(){
        
         //设置参数
        $data = file_get_contents("http://a.apiplus.net/newly.do?token=t3c80a82fb817426fk&code=cqssc&format=json");

        //获取数据
        $array = json_decode($data,true);
        $a=$array['data'];
        $a=array_slice($a, 0, 1);//获取数组第一个成员
        foreach ($a as $k => $v) {
            $date_number=$v['expect'];
            $number=$v['opencode'];
            $time=$v['opentime'];
        }
        
        //期号如果为空
        if($date_number==null){
            exit;
        }else{
			//判断当前时间是否是00点
			 $hour=date("H");
			 $minute=date('i');
			 if($hour=='00' && $minute<'05'){
				 $date_number1=$_SESSION['qihao']."120";//拼接昨天的最后一期号码
			 }else{
				 $_SESSION['qihao']=date("Ymd");
				 $date_number1=$date_number-1;
			 }
            //判断最新接口的期号是否已经存在表中
            $res1=M("award")->where("date_number='$date_number'")->find();
            if(!$res1){//如果不存在
                // $this->ajaxReturn('tianjia');
                // exit;
				
                $arr['date_number']=$date_number;
				$buy=M("buy")->where("date_number='$date_number1'")->select();
				//定义买单和买双的金额
				$dan=0;
				$shuang=0;
				foreach($buy as $row){
					$p_id=$row['p_id'];
					if($row['type']==1){
						if($p_id==1){
							$dan+=$row['number']*12;
						}else if($p_id==2){
							$dan+=$row['number']*28;
						}else if($p_id==3){
							$dan+=$row['number']*55;
						}
					}else{
						if($p_id==1){
							$shuang+=$row['number']*12;
						}else if($p_id==2){
							$shuang+=$row['number']*28;
						}else if($p_id==3){
							$shuang+=$row['number']*55;
						}
					}
				}
				$arr['dan']=$dan;
				$arr['shuang']=$shuang;
				$rand=rand(10000,99999);
				$result=$rand%2;
				//买单数的金额小于买双数的金额，则单号赢
				if($dan<$shuang){
					if($result==0){
						$arr['award_number']=$rand+1;
					}else{
						$arr['award_number']=$rand;
					}
					$arr['type']="1";
				}else if($dan>$shuang){//买单数的金额大于买双数的金额，则双号赢
					if($result==0){
						$arr['award_number']=$rand;
					}else{
						$arr['award_number']=$rand+1;
					}
					$arr['type']="2";
				}else if($dan==$shuang){//相等则随机赢
					$arr['award_number']=$rand;
					if($result==0){
						$arr['type']="2";
					}else{
						$arr['type']="1";
					}
				}
                $arr['award_time']=$time;
                M("award")->add($arr);
            }
        }
    }
	
	
    //购买时获取最新期号
    public function get_date_number(){
        $info=M("award")->order("date_number desc")->limit(0,1)->find();
		//echo M()->getLastSql();exit;
		//print_r($info);exit;
		//$info['date_number']=$_SESSION['old_date_number']+1;
        $this->ajaxReturn($info);
    }
	
	 //统计数据
    public function tongji(){
        //判断时间
        $hour=date("H");
        $minute=date("i");
        if($hour=='00'){
            $time=time();
            $old_time=$time-96400;
			
            //失败单数
            $lost=M("buy")->where("wx=1 and controller=1 and buy_time between '$old_time' and '$time'")->select();
            //统计平台收入多少钱
            $lost_count="";
            for($i=0;$i<count($lost);$i++){
                $goods_id=$lost[$i]['goods_id'];
                $number=$lost[$i]['number'];
                if($goods_id==4){
                    $a=$number*12;
                    $lost_count=$lost_count+$a;
                }else if($goods_id==8){
                    $a=$number*28;
                    $lost_count=$lost_count+$a;  
                }else if($goods_id==12){
                    $a=$number*55;
                    $lost_count=$lost_count+$a;  
                }
            }

            //成功单数
            $success=M("buy")->where("wx=1 and controller=1 and success=1 and buy_time between '$old_time' and '$time'")->select();
            //统计平台支出多少钱
            $success_count="";
            for($i=0;$i<count($success);$i++){
                $goods_id=$success[$i]['goods_id'];
                $number=$success[$i]['number'];
                if($goods_id==4){
                    $b=$number*20;
                    $success_count=$success_count+$b;
                }else if($goods_id==8){
                    $b=$number*50;
                    $success_count=$success_count+$b;  
                }else if($goods_id==12){
                    $b=$number*100;
                    $success_count=$success_count+$b;  
                }
            }
			$a=date("Ymd");
			//先查询今天有没有统计过数据
			$res2=M("tongji")->where("date='$a'")->find();
			if(!$res2){
				//把数据存入表中
				$chaz=$lost_count-$success_count;
				$arr['money_in']=$lost_count;
				$arr['money_out']=$success_count;
				$arr['result']=$chaz;
				$arr['tj_time']=$time;
				$arr['date']=$a;
				M("tongji")->add($arr);
			}
             
        }
    }	
}