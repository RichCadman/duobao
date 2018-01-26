<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	 //控制登录
    public function _initialize(){
        if(!isset($_SESSION['admin'])){
            echo "<script type='text/javascript'>alert('你没有登录,没有权限访问');window.location=\"/bocai/admin.php/Login/index\";</script>";
        }
    }
}