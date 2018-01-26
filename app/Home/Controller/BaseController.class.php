<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function _initialize(){
    	if(!isset($_SESSION['userinfo'])){
    		echo "<meta charset='utf-8' /><script>window.location='index.php/Login/login.html';</script>";
    	}
    	
    }
}