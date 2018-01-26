<?php
namespace Home\Controller;

class MyController extends BaseController{
	//我的页面
	public function index(){
		$user_id=$_SESSION['userinfo']['id'];
		$userinfo=M("userinfo")->where("id='$user_id'")->find();
		//统计总获胜的次数
		$success_count=M("userinfo a,cow_buy b")->where("a.id=b.user_id and b.user_id='$user_id' and b.success=1")->count();
		$this->assign("success_count",$success_count);
		$this->assign("userinfo",$userinfo);
		$this->display();
	}
	//夺宝记录
	// public function record(){
		// $user_id=$_SESSION['userinfo']['id'];
		// $info=M("buy a,cow_goods b,cow_userinfo c")
			// ->where("a.goods_id=b.id and a.user_id=c.id and a.user_id='$user_id'")
			// ->select();
	// }
	//兑换记录
	public function exchange(){
		$user_id=$_SESSION['userinfo']['id'];
		$exchange=M("exchange a,cow_userinfo b")->where("a.user_id=$user_id and a.user_id=b.id")->order("record_time desc")->select();
		$this->assign("exchange",$exchange);
		$this->display("exchange");
	}

	//提现记录
	public function tixianrecord(){
		$user_id=$_SESSION['userinfo']['id'];
		$withdraw=M("withdraw a,cow_userinfo b")->where("a.user_id=$user_id and a.user_id=b.id")->order("withdraw_time desc")->select();
		$this->assign("withdraw",$withdraw);
		$this->display("tixianrecord");
	}

	//夺宝看盘
	public function look(){
		$look=M("award")->where("award_number!=''")->order("date_number desc")->select();

		$this->assign("look",$look);
		$this->display("look");
	}
	//充值
	public function chongzhi(){
		$data['openid']=$_SESSION['userinfo']['openid'];
		$data['cz_name']=$_SESSION['userinfo']['user_name'];
		$data['cz_time']=time();
		$data['order_num']=time().rand(1000,9999);
		$data['jine']=$_GET['money'];
		$res=M("chongzhi")->add($data);
		if($res){
			$appid = "wx7d6168bbba1648d5";
			$url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri=http://www.detaihome.com/bocai/index.php/Wxpay/chongzhi/id/'.$res.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
			header("Location:".$url);
			
		}
	}
	//提现
    public function tixian(){
        $jine=$_POST['jine'];
        $id=$_SESSION['userinfo']['id'];
		$user_name=$_SESSION['userinfo']['user_name'];
        $res=M("userinfo")->where("id='$id'")->find();
        $money=$res['money'];
        $bad=$money-$jine;
        if($bad<0){
            $this->ajaxReturn(-1);//金额不够
        }else{
            $data['money']=$bad;
            M("userinfo")->where("id='$id'")->save($data);
			//提现成功存表
			//判断当天第几次提现
			$info=M("withdraw")->where("user_id='$id'")->order("withdraw_time desc")->limit(0,1)->find();
			//获取最后一次提现时间
			$old_time=$info['withdraw_time'];
			//获取当前时间戳
			$time=time();
			//时间差
			$bad_time=$time-$old_time;
			if($bad_time>86400){
				$type='1';
			}else{
				$type="2";
			}
			//提现成功存表
			$arr['user_id']=$id;
			$arr['record']=$jine;
			$arr['withdraw_time']=time();
			$arr['tx_name']=$user_name;
			$arr['type']=$type;
			M("withdraw")->add($arr);
            $this->ajaxReturn($bad);
        }
    }
}


















