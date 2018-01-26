<?php
namespace Home\Controller;

class LotteryController extends BaseController{
	//开奖记录
	public function index(){
		//$this->display("index");
		//exit;
		$time=time();//当前时间
		if(!$_GET){//本人
			
			$old_time=$time-24*3600;
			$user_id=$_SESSION['userinfo']['id'];
			//$user_id=2;
			$total=M("buy")->where("wx=1 and user_id=$user_id and buy_time between '$old_time' and '$time'")->select();
			//echo M()->getLastSql();exit;
			$total_count="";
			for($i=0;$i<count($total);$i++){
				$total_count=$total_count+$total[$i]['number'];//24小时参与单数
			}
			//echo $total_count;exit;
			$success=M("buy")->where("wx=1 and user_id=$user_id and buy_time between '$old_time' and '$time' and success=1")->select();
			$success_count="";
			for($i=0;$i<count($success);$i++){
				$success_count=$success_count+$success[$i]['number'];//24小时参与成功单数
			}
			$error=M("buy")->where("wx=1 and user_id=$user_id and buy_time between '$old_time' and '$time' and success=0")->select();
			//echo M()->getLastSql();exit;
			$error_count="";
			for($i=0;$i<count($error);$i++){
				$error_count=$error_count+$error[$i]['number'];//24小时参与失败单数
			}
			$info=M("buy a,cow_userinfo b,cow_goods c")
				->field("a.id,a.user_id,a.controller,a.success,a.number,a.date_number,a.buy_time,a.type,b.user_name,b.user_photo,c.goods_price,c.goods_image,c.remark")
				->where("a.wx=1 and a.user_id=b.id and a.goods_id=c.id and user_id=$user_id")
				->order("a.buy_time desc")
				->select();//所有参与的记录
			//echo M()->getLastSql();exit;
			$this->assign("total_count",$total_count);
			$this->assign("success_count",$success_count);
			$this->assign("error_count",$error_count);
			$this->assign("info",$info);
			$this->display("index");
		}else{//其他人
			$user_id=$_GET['user_id'];
			$old_time=$time-24*3600;
			$total=M("buy")->where("wx=1 and user_id=$user_id and buy_time between '$old_time' and '$time'")->select();
			$total_count="";
			for($i=0;$i<count($total);$i++){
				$total_count=$total_count+$total[$i]['number'];//24小时参与单数
			}
			$success=M("buy")->where("wx=1 and user_id=$user_id and buy_time between '$old_time' and '$time' and success=1")->select();
			$success_count="";
			for($i=0;$i<count($success);$i++){
				$success_count=$success_count+$success[$i]['number'];//24小时参与成功单数
			}
			$error=M("buy")->where("wx=1 and user_id=$user_id and buy_time between '$old_time' and '$time' and success=0")->select();
			$error_count="";
			for($i=0;$i<count($error);$i++){
				$error_count=$error_count+$error[$i]['number'];//24小时参与失败单数
			}
			$info=M("buy a,cow_userinfo b,cow_goods c")
				->field("a.id,a.user_id,a.controller,a.success,a.number,a.date_number,a.buy_time,a.type,b.user_name,b.user_photo,c.goods_price,c.goods_image,c.remark")
				->where("a.wx=1 and a.user_id=b.id and a.goods_id=c.id and user_id=$user_id")
				->order("a.buy_time desc")
				->select();//所有参与的记录
			$this->assign("total_count",$total_count);
			$this->assign("success_count",$success_count);
			$this->assign("error_count",$error_count);
			$this->assign("info",$info);
			$this->display("index");
		}
		
	}
	//获取PK信息
	public function getInfo(){
		//获取期号
		$date_number=$_GET['qihao'];
		//判断是否是120的一期
		$a=substr($date_number,-3);
		if($a=='120'){
			$b=date("Ymd");
			$date_number=$b."001";
		}else{
			$date_number=$_GET['qihao']+1;
		}
		
		$info1=M("award")->where("date_number='$date_number'")->find();
		//获取购买的id
		$id=$_GET['id'];
		$info=M("buy a,cow_userinfo b")
			->field("a.controller,a.success,a.goods_id,a.type,a.buy_time,b.user_name,b.user_photo")
			->where("a.id='$id' and a.user_id=b.id")
			->find();
		$info3=M("userinfo")->limit("0,1")->order("rand()")->find();
		$info['xt_name']=$info3['user_name'];
		$info['xt_photo']=$info3['user_photo'];
		$info['award_number']=$info1['award_number'];
		$info['date_number']=$info1['date_number'];
		$this->ajaxReturn($info);
	}
	//获取期号
	public function getNumber(){
		$date_number=$_GET['qihao'];
		$info=M("award")->where("date_number='$date_number'")->find();
		$this->ajaxReturn($info);
	}
}





































