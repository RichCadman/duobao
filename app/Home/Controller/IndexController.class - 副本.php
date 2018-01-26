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
            $info2=M("buy a,cow_userinfo b,cow_goods c")->where("a.wx=1 and a.user_id=b.id and a.goods_id=c.id and a.controller!=0 and a.success=1")->order("buy_time desc")->select();
            $this->assign("info2",$info2);
        //}else if($type==3){//开奖记录
            $info3=M("award")->order("award_time desc")->select();
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
    public function ajax_buy(){
        //商品类型
        $p_id=$_POST['p_id'];
        //数量
        $number=$_POST['number'];
        if($p_id==1){
            $price=$number*12;
        }else if($p_id==2){
            $price=$number*28;
        }else if($p_id){
            $price=$number*55;
        }
        $this->ajaxReturn($price);
    }

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
        //$res1=M("award")->where("date_number='$date_number'")->find();
        //if($res1){
            //开奖号码分解
            $number = explode(",",$number);
            foreach($number as $k => $v) {
                $html .= $v;
            }  
            //用号码除以2取余数
            //余数为0时则买双号的赢
            $user_id=$_SESSION['userinfo']['id'];
            $res=$html%2;
            if($res==0){
                $jieg="2";//双号
            }else{
                $jieg="1";//单号
            }
            //更新开奖记录表
            //$arr['date_number']=$date_number;
            $arr['award_number']=$html;
            $arr['type']=$jieg;
            $arr['award_time']=$time;
            M("award")->where("date_number='$date_number'")->save($arr);
            /*echo M()->getLastSql();
            exit;*/
            if($jieg==2){
                //echo "2";
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
                        //echo M()->getLastSql();
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
                $info2=M("buy")->where("date_number='$date_number'")->select();
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
                    //echo $user_id;exit;
                    $number=$info2[$i]['number'];
                    $info3=M("userinfo")->where("id=$user_id")->find();
                    //echo M()->getLastSql();exit;
                    $money=$info3['money'];
                    if($p_id==1){//20
                        $datab['money']=$money+$number*20;
                        $res=M("userinfo")->where("id=$user_id")->save($datab);
                        //echo M()->getLastSql();
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
                $info1=M("buy")->where("date_number='$date_number'")->select();
                for($i=0;$i<count($info1);$i++){
                    $id=$info1[$i]['id'];
                    $data1['controller']=1;
                    M("buy")->where("id='$id'")->save($data1);
                }
            }
        //}
        
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

    //请求接口
    public function get_number(){
        $data = file_get_contents("http://a.apiplus.net/newly.do?token=t3c80a82fb817426fk&code=cqssc&format=json");
        //$data缓存
        $array = json_decode($data,true);
        $a=$array['data'];
        $a=array_slice($a, 0, 1);//获取数组第一个成员
        foreach ($a as $key => $v) {
            $date_number=$v['expect'];
            $number=$v['opencode'];
            $time=$v['opentime'];
        }
        //把刚开奖的一期存入session
        unset($_SESSION['old_date_number']);
        $_SESSION['old_date_number']=$date_number;
        //购买最新的期号(还未开奖的)
		if($date_number!=''){
			//查询当前开奖的这一期号是否已存入表中
			$b=M("award")->where("date_number='$date_number'")->find();
			if(!$b){//不存在  添加
				$arr1['date_number']=$date_number;
				M("award")->add($arr1);
			}else{
				//查询是否是当天的最后一期
				$a=substr($date_number, -3);
				if($a=='120'){
					$res=M("award")->where("date_number='$date_number'")->find();
					 if(!$res){//不存在添加
						 $arr['date_number']=$date_number;
						 M("award")->add($arr);
					 }else{
						 //拼接第二天第一期的时彩期号
						 $new=date("Ymd",time())."001";
						 $res2=M("award")->where("date_number='$new'")->find();
						 if(!res2){
							 //添加第二天最新一期的时彩号
							 $arr2['date_number']=$new;
							 M("award")->add($arr2);
						 }
					 }
				}else{
					$new_date_number=$date_number+1;
					unset($_SESSION['new_date_number']);
					$_SESSION['new_date_number']=$new_date_number;
					//查看最新的购买期号是否已存在
					 $res=M("award")->where("date_number='$new_date_number'")->find();
					 if(!$res){//不存在添加
						 $arr['date_number']=$new_date_number;
						 M("award")->add($arr);
					 }
				}
			}
		}
        
    }
    //时时更新时时彩期号
    public function add_date_number(){
		//判断当前时间点
		$hour=date("H");
		$minute=date("i");
		if(hour==00 && $minute<'05'){
			$new=date("Ymd",time())."001";
			$res2=M("award")->where("date_number='$new'")->find();
			 if(!res2){
				 //添加第二天最新一期的时彩号
				 $arr2['date_number']=$new;
				 M("award")->add($arr2);
			 }
		}else{
			//查询已开奖最大的期号
			// $info=M("award")->order("date_number desc")->limit(0,1)->find();
			// $date_number=$info['date_number']+1;
			//$date_number=$_SESSION['new_date_number']+1;
			// $res=M("award")->where("date_number='$date_number'")->find();
			// if(!$res){
				// $arr['date_number']=$date_number;
				// M("award")->add($arr);
			// }
			//请求接口
			$data = file_get_contents("http://a.apiplus.net/newly.do?token=t3c80a82fb817426fk&code=cqssc&format=json");
			//$data缓存
			$array = json_decode($data,true);
			$a=$array['data'];
			$a=array_slice($a, 0, 1);//获取数组第一个成员
			foreach ($a as $key => $v) {
				$date_number=$v['expect'];
				$number=$v['opencode'];
				$time=$v['opentime'];
			}
			if($date_number!=''){
				//添加最新期号到数据库
				$zuixin=$date_number+2;
				$res3=M("award")->where("date_number='$zuixin'")->find();
				if(!$res3){
					$arr3["date_number"]=$zuixin;
					M("award")->add($arr3);
				}
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
	
	//提现
    public function tixian(){
        $jine=$_POST['jine'];
        $id=$_SESSION['userinfo']['id'];
        $res=M("userinfo")->where("id='$id'")->find();
        $money=$res['money'];
        $bad=$money-$jine;
        if($bad<0){
            $this->ajaxReturn(-1);//金额不够
        }else{
            $data['money']=$bad;
            M("userinfo")->where("id='$id'")->save($data);
            $this->ajaxReturn($bad);
        }
    }
}