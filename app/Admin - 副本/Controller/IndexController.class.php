<?php
namespace Admin\Controller;

class IndexController extends BaseController {
	//开奖记录统计
    public function index(){
      	$info=M("award a,cow_buy b")->where()->order()->select();

      	$this->assign("info",$info);
        $this->display();
    }

    //时时彩期号
    public function date_number(){
    	$award=M("award")->where("award_number!=''")->order("date_number desc")->select();
    	$this->assign("award",$award);
    	$this->display("date_number");
    }
          
     //修改页面
     public function update_index($id){
        $info=M("award")->where("id='$id'")->find();

        $this->assign("info",$info);
        $this->display("update");

     }  
    //修改期号
     public function update($id){
        $data['date_number']=$_POST['date_number'];
        $data['award_number']=$_POST['award_number'];
        $data['award_time']=$_POST['award_time'];
        $info=M("award")->where("id='$id'")->save($data);
        if($info){
            echo "<script type='text/javascript'>alert('修改成功');window.location=\"/admin.php/Index/date_number\";</script>";
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
        }
     }  

     //删除期号
     public function del($id){
        $res=M("award")->where("id='$id'")->delete();
        if($res){
            echo "<script type='text/javascript'>alert('删除成功');window.location=\"/admin.php/Index/date_number\";</script>";
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";    
        }
     }
}