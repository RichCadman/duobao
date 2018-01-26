<?php
namespace Home\Controller;
use Think\Controller;
//微信支付类
class WxpayController extends Controller {
	//获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
	public function pay(){
		header("content-type:text/html;charset=utf-8");
		Vendor('WxPayPubHelper.WxPayPubHelper');
		Vendor('Card.class_weixin_adv');
		//appid   secretwx0de0d2651bf91c4a
		$weixin=new \class_weixin_adv("wx7d6168bbba1648d5","b8a3ef6648a4d4bf0fed886f7b343d9f");
	    //使用jsapi接口
	    $jsApi = new \JsApi_pub();
	 
	    //=========步骤1:网页授权获取用户openid============//
		//通过code获得openid
		
		if (!isset($_GET['code']))
		{
			//触发微信返回code码
			$loginurl=urlencode('http://'.$_SERVER['HTTP_HOST']."/index.php/Home/Wxpay/pay/id/".$_GET['id']);
			$url = $jsApi->createOauthUrlForCode($loginurl);
			Header("Location:".$url);
		}else {
			$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx7d6168bbba1648d5&secret=b8a3ef6648a4d4bf0fed886f7b343d9f&code=".$_GET['code']."&grant_type=authorization_code";
			$res = $weixin->https_request($url);
			$res=(json_decode($res, true));
			//获取code码，以获取openid
			$code = $_GET['code'];
			$jsApi->setCode($code);
			//$openid = $jsApi->getOpenId();
			$openid =$res['openid'];
			
		
		}
		$id=$_GET['id'];
		//echo $id;exit;
		$info=M("buy a,cow_goods b")->field("a.p_id,b.goods_price,b.remark,a.order_number,a.number")->where("a.goods_id=b.id and a.id=$id")->find();
		//echo M()->getLastSql();exit;
		//dump($info);exit;
		//商品描述
		
		$p_id=$info['p_id'];
		if($p_id==1){
			$price=12;
		}else if($p_id==2){
			$price=28;
		}else if($p_id==3){
			$price=55;
		}
		//数量
		$number=$info['number'];
		//订单号
		$order_number=$info['order_number'];
		$remark=$info['remark']=$info['goods_price'].'元充值卡';
		$price= $price*$number ;
		
		
		
	    //=========步骤2：使用统一支付接口，获取prepay_id============
		//使用统一支付接口
		$unifiedOrder = new \UnifiedOrder_pub();
		//var_dump($msg); exit;
		//设置统一支付接口参数
		//设置必填参数
		//appid已填,商户无需重复填写
		//mch_id已填,商户无需重复填写
		//noncestr已填,商户无需重复填写
		//spbill_create_ip已填,商户无需重复填写
		//sign已填,商户无需重复填写
		$unifiedOrder->setParameter("openid","$openid");//商品描述
		$unifiedOrder->setParameter("body",$remark);//商品描述
		//自定义订单号，此处仅作举例
		
		$unifiedOrder->setParameter("out_trade_no",$order_number);//商户订单号
		$unifiedOrder->setParameter("total_fee",$price*100);//总金额
	
		$unifiedOrder->setParameter("notify_url",\WxPayConf_pub::NOTIFY_URL);//通知地址
		$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
		//var_dump($unifiedOrder);  exit;
		//非必填参数，商户可根据实际情况选填
		//$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
		//$unifiedOrder->setParameter("device_info","XXXX");//设备号
		//$unifiedOrder->setParameter("attach","XXXX");//附加数据
		//$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
		//$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间
		//$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
		//$unifiedOrder->setParameter("openid","XXXX");//用户标识
		//$unifiedOrder->setParameter("product_id","XXXX");//商品ID

		$prepay_id = $unifiedOrder->getPrepayId();
		//=========步骤3：使用jsapi调起支付============
		$jsApi->setPrepayId($prepay_id);
		$jsApiParameters = $jsApi->getParameters();
	    $this->assign('jsApiParameters',$jsApiParameters);
		
	    $this->display();
	}
	//异步通知url，商户根据实际开发过程设定
	public function notify(){
		Vendor('WxPayPubHelper.WxPayPubHelper');
		//使用通用通知接口
		$notify = new \Notify_pub();
		//存储微信的回调
		$xml = $GLOBALS['HTTP_RAW_POST_DATA'];
		$notify->saveData($xml);
		//验证签名，并回应微信。
		//对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
		//微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
		//尽可能提高通知的成功率，但微信不保证通知最终能成功。
		if($notify->checkSign() == FALSE){
			$notify->setReturnParameter("return_code","FAIL");//返回状态码
			$notify->setReturnParameter("return_msg","签名失败");//返回信息
		}else{
			$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
		}
		$returnXml = $notify->returnXml();
		echo $returnXml;

		//==商户根据实际情况设置相应的处理流程，此处仅作举例=======

		//以log文件形式记录回调信息
		$log_name="./notify_url.log";//log文件路径
		//log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");

		if($notify->checkSign() == TRUE)
		{
			if ($notify->data["return_code"] == "FAIL") {
				//此处应该更新一下订单状态，商户自行增删操作
				log_result($log_name,"【通信出错】:\n".$xml."\n");
			}
			elseif($notify->data["result_code"] == "FAIL"){
				//此处应该更新一下订单状态，商户自行增删操作
				log_result($log_name,"【业务出错】:\n".$xml."\n");
			}
			else{
				//此处应该更新一下订单状态，商户自行增删操作
				$out_trade_no=$notify->data["out_trade_no"];
				$arr['wx']=1;
				M("buy")->where("order_number='$out_trade_no'")->save($arr);
			}
			
			//商户自行增加处理流程,
			//例如：更新订单状态
			//例如：数据库操作
			//例如：推送支付完成信息
		}
	}
	// 打印log
	public function log_result($file,$word)
	{
	    $fp = fopen($file,"a");
	    flock($fp, LOCK_EX) ;
	    fwrite($fp,"执行日期：".strftime("%Y-%m-%d-%H：%M：%S",time())."\n".$word."\n\n");
	    flock($fp, LOCK_UN);
	    fclose($fp);
	}
	
	//微信充值
	//获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
	public function chongzhi(){
		header("content-type:text/html;charset=utf-8");
		Vendor('WxPayPubHelper.WxPayPubHelper');
		Vendor('Card.class_weixin_adv');
		//appid   secretwx0de0d2651bf91c4a
		$weixin=new \class_weixin_adv("wx7d6168bbba1648d5","b8a3ef6648a4d4bf0fed886f7b343d9f");
	    //使用jsapi接口
	    $jsApi = new \JsApi_pub();
	 
	    //=========步骤1:网页授权获取用户openid============//
		//通过code获得openid
		
		if (!isset($_GET['code']))
		{
			//触发微信返回code码
			$loginurl=urlencode('http://'.$_SERVER['HTTP_HOST']."/index.php/Home/Wxpay/chongzhi/id/".$_GET['id']);
			$url = $jsApi->createOauthUrlForCode($loginurl);
			Header("Location:".$url);
		}else {
			$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx7d6168bbba1648d5&secret=b8a3ef6648a4d4bf0fed886f7b343d9f&code=".$_GET['code']."&grant_type=authorization_code";
			$res = $weixin->https_request($url);
			$res=(json_decode($res, true));
			//获取code码，以获取openid
			$code = $_GET['code'];
			$jsApi->setCode($code);
			//$openid = $jsApi->getOpenId();
			$openid =$res['openid'];
			
		
		}
		$id=$_GET['id'];
		//echo $id;exit;
		$info=M("chongzhi")->where("id=$id")->find();
		//echo M()->getLastSql();exit;
		//dump($info);exit;
		//商品价格
		$price=$info['jine'];
		
		//订单号
		$order_number=$info['order_num'];
		$remark=$info['jine'].'元充值卡';
		
		
	    //=========步骤2：使用统一支付接口，获取prepay_id============
		//使用统一支付接口
		$unifiedOrder = new \UnifiedOrder_pub();
		//var_dump($msg); exit;
		//设置统一支付接口参数
		//设置必填参数
		//appid已填,商户无需重复填写
		//mch_id已填,商户无需重复填写
		//noncestr已填,商户无需重复填写
		//spbill_create_ip已填,商户无需重复填写
		//sign已填,商户无需重复填写
		$unifiedOrder->setParameter("openid","$openid");//商品描述
		$unifiedOrder->setParameter("body",$remark);//商品描述
		//自定义订单号，此处仅作举例
		
		$unifiedOrder->setParameter("out_trade_no",$order_number);//商户订单号
		$unifiedOrder->setParameter("total_fee",$price*100);//总金额
	
		$unifiedOrder->setParameter("notify_url","http://www.detaihome.com/bocai/index.php/Wxpay/notify_cz");//通知地址
		$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
		//var_dump($unifiedOrder);  exit;
		//非必填参数，商户可根据实际情况选填
		//$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
		//$unifiedOrder->setParameter("device_info","XXXX");//设备号
		//$unifiedOrder->setParameter("attach","XXXX");//附加数据
		//$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
		//$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间
		//$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
		//$unifiedOrder->setParameter("openid","XXXX");//用户标识
		//$unifiedOrder->setParameter("product_id","XXXX");//商品ID

		$prepay_id = $unifiedOrder->getPrepayId();
		//=========步骤3：使用jsapi调起支付============
		$jsApi->setPrepayId($prepay_id);
		$jsApiParameters = $jsApi->getParameters();
	    $this->assign('jsApiParameters',$jsApiParameters);
	    $this->display();
	}
	
	
	//微信充值回调地址
	//异步通知url，商户根据实际开发过程设定
	public function notify_cz(){
		Vendor('WxPayPubHelper.WxPayPubHelper');
		//使用通用通知接口
		$notify = new \Notify_pub();
		//存储微信的回调
		$xml = $GLOBALS['HTTP_RAW_POST_DATA'];
		$notify->saveData($xml);
		//验证签名，并回应微信。
		//对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
		//微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
		//尽可能提高通知的成功率，但微信不保证通知最终能成功。
		if($notify->checkSign() == FALSE){
			$notify->setReturnParameter("return_code","FAIL");//返回状态码
			$notify->setReturnParameter("return_msg","签名失败");//返回信息
		}else{
			$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
		}
		$returnXml = $notify->returnXml();
		echo $returnXml;

		//==商户根据实际情况设置相应的处理流程，此处仅作举例=======

		//以log文件形式记录回调信息
		$log_name="./notify_url.log";//log文件路径
		//log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");

		if($notify->checkSign() == TRUE)
		{
			if ($notify->data["return_code"] == "FAIL") {
				//此处应该更新一下订单状态，商户自行增删操作
				log_result($log_name,"【通信出错】:\n".$xml."\n");
			}
			elseif($notify->data["result_code"] == "FAIL"){
				//此处应该更新一下订单状态，商户自行增删操作
				log_result($log_name,"【业务出错】:\n".$xml."\n");
			}
			else{
				//此处应该更新一下订单状态，商户自行增删操作
				$out_trade_no=$notify->data["out_trade_no"];
				$arr['stage']=1;
				M("chongzhi")->where("order_num='$out_trade_no'")->save($arr);
				$info=M("chongzhi")->where("order_num='$out_trade_no' and stage=1")->find();
				if($info){
					$openid=$info['openid'];
					$jine=$info['jine'];
					$info1=M("userinfo")->where("openid='$openid'")->find();
					if($info1){
						$money=$info1['money'];
						$data_money['money']=$money+$jine;
						M("userinfo")->where("openid='$openid'")->save($data_money);
					}
				}
				
			}
			
			//商户自行增加处理流程,
			//例如：更新订单状态
			//例如：数据库操作
			//例如：推送支付完成信息
		}
	}
	

}

























?>