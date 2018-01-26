<?php
namespace Home\Controller;

class ListController extends BaseController{
	//风云榜
	public function index(){
		//24小时风云榜
		$info1=M("userinfo")->order("hour_count desc")->limit(0,20)->select();
		//一周风云榜
		$info2=M("userinfo")->order("week_count desc")->limit(0,20)->select();
		//一月风云榜
		$info3=M("userinfo")->order("mouth_count desc")->limit(0,20)->select();
		
		$this->assign("info1",$info1);
		$this->assign("info2",$info2);
		$this->assign("info3",$info3);
		$this->display("index");
	}

	
	//每隔一小时请求一次数据
	public function bangdan(){
		//24小时风云榜
		$time=time();//当前时间
		$old_time_24=$time-86400;
		$list_24=M("buy a,cow_userinfo b")->where("a.wx=1 and a.user_id=b.id and a.success=1 and a.buy_time between '$old_time_24' and '$time'")->select();
		//echo M()->getLastSql();exit;
		for($i=0;$i<count($list_24);$i++){
			//用户id
			$id_24=$list_24[$i]['user_id'];
			//查询当前这个用户在24小时内总共购买的记录
			$a=M("buy")->where("wx=1 and user_id='$id_24' and success=1 and buy_time between '$old_time_24' and '$time'")->select();
			$count_24="";
			foreach ($a as $k => $v) {
				$count_24=$count_24+$v['number'];
			}
			$data_24['hour_count']=$count_24;
			M("userinfo")->where("id='$id_24'")->save($data_24);	
		}
		
		//一周风云榜
		$old_time_week=$time-604800;
		$list_week=M("buy a,cow_userinfo b")->where("a.wx=1 and a.user_id=b.id and a.success=1 and a.buy_time between '$old_time_week' and '$time'")->select();
		for($i=0;$i<count($list_week);$i++){
			//用户id
			$id_week=$list_week[$i]['user_id'];
			//查询当前这个用户在一周内总共购买的记录
			$b=M("buy")->where("wx=1 and user_id='$id_week'and success=1 and buy_time between '$old_time_week' and '$time'")->select();
			$count_week="";
			foreach ($b as $k => $vv) {
				$count_week=$count_week+$vv['number'];
			}
			$data_week['week_count']=$count_week;
			M("userinfo")->where("id='$id_week'")->save($data_week);
		}
		
		//一月风云榜
		$old_time_mouth=$time-$days*86400;
		$list_mouth=M("buy a,cow_userinfo b")->where("a.wx=1 and a.user_id=b.id and a.success=1 and a.buy_time between '$old_time_mouth' and '$time'")->select();
		for($i=0;$i<count($list_mouth);$i++){
			//用户id
			$id_mouth=$list_mouth[$i]['user_id'];
			//查询当前这个用户在一月内总共购买的记录
			$c=M("buy")->where("wx=1 and user_id='$id_mouth'and success=1 and buy_time between '$old_time_mouth' and '$time'")->select();
			$count_mouth="";
			foreach ($c as $k => $v) {
				$count_mouth=$count_mouth+$v['number'];
			}
			$data_mouth['mouth_count']=$count_mouth;
			M("userinfo")->where("id='$id_mouth'")->save($data_mouth);
		}
		
	}
	//提现
	public function tixian(){
		$id=$_SESSION['userinfo']['id'];
		$info=M("userinfo")->where("id='$id'")->find();
		//查询最后一次提现记录
		$info1=M("withdraw")->where("user_id='$id'")->order("withdraw_time desc")->limit(0,1)->find();
    	//最后一次提现时间
    	$last_time=$info1['withdraw_time'];
    	$time=time();
    	$bad_time=$time-$last_time;
    	if($bad_time>86400){//大于一天
    		$msg="免手续费";
    	}else{
    		$msg="手续费 2 元";
    	}
    	$this->assign("msg",$msg);
		$this->assign("info",$info);
		$this->display("tixian");
	}
}