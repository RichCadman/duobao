<?php

/**
 * 微信SDK
 * pan041ymail@gmail.com
 */

class class_weixin_adv
{
    var $appid = "wxc175994813eb8f2a";
    var $appsecret = "904a4e52b1ce258f0e717ea2d978351b";
  //构造函数，获取Access Token
    public function __construct($appid = NULL, $appsecret = NULL)
    {
        if($appid){
            $this->appid = $appid;
        }
        if($appsecret){
            $this->appsecret = $appsecret;
        }


        $this->lasttime = 1503035890;
        $this->access_token = "kjxsrw5lNtfZqqA8o6kMCVFjwjO87U_CMMj4BT4x6gYC_n3jmXvLhJpCRiAA4FD_R9dEWr-L5ymsudREFzg6NFdbjsTceob5vV8W4uolTnzkJcMUwn92B4XBRHNEu3eXWHHeAAADOO";
		
        if (time() > ($this->lasttime + 7200)){
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appid."&secret=".$this->appsecret;
            $res = $this->https_request($url);
            $result = json_decode($res, true);

            $this->access_token = $result["access_token"];
            $this->lasttime = time();
        }
    }
//获取用户基本信息
    public function get_user_info($openid)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$this->access_token."&openid=".$openid."&lang=zh_CN";
        $res = $this->https_request($url);
        return json_decode($res, true);
    }

//https请求
    public function https_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}