<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//登录页面 
    public function index(){

        $this->display();
    }

    //登录验证
    public function login(){
        $admin_name=$_POST['admin_name'];
        $password=md5($_POST['password']);
        $res=M("admin")->where("admin_name='$admin_name' and password='$password'")->find();
        if($res){
            $_SESSION['admin']=$res;
            echo "<script type='text/javascript'>window.location=\"/duobao/admin.php/Index/index\";</script>";
        }else{
           echo "<script type='text/javascript'>alert('登录失败');window.history.go(-1);</script>"; 
        }

    }
}