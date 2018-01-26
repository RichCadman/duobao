<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
	//登录验证
	public function login_do(){
	
		header("Content-type: text/html; charset=utf-8");
		Vendor('Card.class_weixin_adv');
		$weixin=new \class_weixin_adv("wxc175994813eb8f2a","904a4e52b1ce258f0e717ea2d978351b");
		
		if (isset($_GET['code'])){
			$url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxc175994813eb8f2a&secret=904a4e52b1ce258f0e717ea2d978351b&code=".$_GET['code']."&grant_type=authorization_code";
            $res = $weixin->https_request($url);
			
            $res=json_decode($res, true);
            $access_token = $res['access_token'];
            $openid = $res['openid'];
            $get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN'; 
      		$res = $weixin->https_request($get_user_info_url);//调用SDK方法获取到res 从中可以得到open
			//解析json  
			$row = json_decode($res,true);
				if ($row['openid']) {
					$_SESSION['wx_user'] = $row;
					$openid = $row['openid'];
					$user = M("userinfo")->where("openid='$openid'")->find();
					if($user){//查询到该用户并且时时更新头像和用户名
						$data1['user_name']=$row['nickname'];
						$data1['user_photo']=$row['headimgurl'];
						M("userinfo")->where("openid='$openid'")->save($data1);
						$user1= M("userinfo")->where("openid='$openid'")->find();
						$_SESSION['userinfo']=$user1;
						header('Location:'.__APP__.'/Index/index.html');
					
				}else{//未查询到用户openID
					$data['openid']=$row['openid'];
					$data['user_name']=$row['nickname'];
					$data['user_photo']=$row['headimgurl'];

					$add_user=M("userinfo")->add($data);
					if(!$add_user){
						echo "<meta charset='utf-8' /><script>alert('no_add_user!');</script>";
						
					}else{
						$userinfo=M("userinfo")->where("id=$add_user")->find();
						$_SESSION['userinfo']=$userinfo;
						header('Location:'.__APP__.'/Index/index.html');
					}
				}
				
			}else{
				echo "<meta charset='utf-8' /><script>alert('授权出错,请重新授权!');</script>";
				echo "<script>history.back();</script>";
			}
		}else{
			echo "<script>alert('NO CODE!');</script>";
			echo "<script>history.back();</script>";
		}
	}
	
	//登陆
	public function login(){
		$appid = "wxc175994813eb8f2a";
       $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxc175994813eb8f2a&redirect_uri=http://www.detaihome.com/duobao/index.php/Login/login_do&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect';
	   header("Location:".$url);
	}
		
}