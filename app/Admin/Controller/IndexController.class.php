<?php
namespace Admin\Controller;
class IndexController extends BaseController {
	//开奖记录统计
    public function index(){
      	$info=M("buy a,cow_userinfo b")->where("a.user_id=b.id and a.controller=1 and wx=1")->order("buy_time desc")->select();

      	$this->assign("info",$info);
        $this->display();
    }
	//购买记录统计
    public function buy(){
      	$info=M("buy a,cow_userinfo b")->field("a.id,a.controller,a.success,a.number,a.type,a.buy_time,a.goods_id,b.user_name")->where("a.user_id=b.id and wx=1")->order("buy_time desc")->select();

      	$this->assign("info",$info);
        $this->display();
    }
	//修改购买记录页面
     public function update_index2($id){
        $info=M("buy a,cow_userinfo b")->field("a.id,a.controller,a.success,b.user_name")->where("a.user_id=b.id and a.id='$id'")->find();
		//echo M()->getLastSql();exit;
        $this->assign("info",$info);
        $this->display();

     } 
	 
	 //修改购买记录
     public function update2($id){
        $arr['controller']=$_POST['controller'];
		$arr['success']=$_POST['success'];
		$res=M("buy")->where("id='$id'")->save($arr);
		if($res){
			echo "<script type='text/javascript'>alert('修改成功');window.location=\"/duobao/admin.php/Index/buy\";</script>";
		}else{
			echo "<script type='text/javascript'>alert('添加失败');window.history.go(-1);</script>";
		}

     } 
	 //删除购买记录
     public function del2($id){
        $res=M("buy")->where("id='$id'")->delete();
        if($res){
            echo "<script type='text/javascript'>alert('删除成功');window.location=\"/duobao/admin.php/Index/buy\";</script>";
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";    
        }
     }
	//盈利统计
	public function tongji(){
      	$tongji=M("tongji")->order("tj_time desc")->select();

      	$this->assign("tongji",$tongji);
        $this->display("tongji");
    }
    //时时彩期号
    public function date_number(){
    	$award=M("award")->where("award_number!=''")->order("date_number desc")->select();
    	$this->assign("award",$award);
    	$this->display("date_number");
    }
	
	//添加期号
    public function add_datenumber(){
		
    	$this->display();
    }
	
	//添加期号
    public function add(){
    	$award_number=$_POST['award_number'];
		$arr['award_number']=$award_number;
		$arr['date_number']=$_POST['date_number'];
		$arr['award_time']=$_POST['award_time'];
		$a=$award_number%2;
		if($a==0){
			$arr['type']='2';
		}else{
			$arr['type']='1';
		}
		$res=M("award")->add($arr);
		if($res){
			echo "<script type='text/javascript'>alert('添加成功');window.location=\"/duobao/admin.php/Index/date_number\";</script>";
		}else{
			echo "<script type='text/javascript'>alert('添加失败');window.history.go(-1);</script>";
		}
    }
    //后台时时彩期号
    /*public function qihao(){
      $qihao=M("power")->where("qihao!=''")->order("qihao desc")->select();
      $this->assign("qihao",$qihao);
      $this->display("qihao");
    }*/   
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
            echo "<script type='text/javascript'>alert('修改成功');window.location=\"/duobao/admin.php/Index/date_number\";</script>";
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
        }
     } 

     //修改页面
     /*public function update_index($id){
        $info=M("power")->where("id='$id'")->find();

        $this->assign("info",$info);
        $this->display("update");

     }  
    
     //修改后台最新期号并保存至前台时时彩期号表
     public function update($id){
        $kjhao=$_POST['award_number'];
        $qihao=$_POST['date_number'];
        $a=$kjhao%2;
        if($a==0){
          $type=2;
        }else{
          $type=1;
        }
        $data['qihao']=$_POST['date_number'];
        $data['kjhao']=$_POST['award_number'];
        $data['time']=$_POST['award_time'];
        $data['type']=$type;
        $info=M("power")->where("id='$id'")->save($data);
		
        if($info){
            $res1=M("award")->where("date_number='$qihao'")->find();
            if(!$res1){
              $data1['date_number']=$_POST['date_number'];
              $data1['award_number']=$_POST['award_number'];
              $data1['award_time']=$_POST['award_time'];
              $data1['type']=$type;
              $res2=M("award")->add($data1);
              if($res2){
                echo "<script type='text/javascript'>alert('修改成功');window.location=\"/bocai/admin.php/Index/qihao\";</script>";
              }else{
                echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
              }
            }else{
              echo "<script type='text/javascript'>alert('重复修改');window.history.go(-1);</script>";
            }
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
        }
     }*/  

     //删除期号
     public function del($id){
        $res=M("award")->where("id='$id'")->delete();
        if($res){
            echo "<script type='text/javascript'>alert('删除成功');window.location=\"/bocai/admin.php/Index/date_number\";</script>";
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";    
        }
     }
	 //删除用户
     public function del_user($id){
        $res=M("userinfo")->where("id='$id'")->delete();
        if($res){
            echo "<script type='text/javascript'>alert('删除成功');window.location=\"/duobao/admin.php/Index/yonghu\";</script>";
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";    
        }
     }
	 
	 //修改用户页面
     public function update_index1($id){
        $info=M("userinfo")->where("id='$id'")->find();

        $this->assign("info",$info);
        $this->display("update_index1");

     } 

	 
	 //修改用户
     public function update_user($id){
        $data['money']=$_POST['money'];
        $info=M("userinfo")->where("id='$id'")->save($data);
        if($info){
            echo "<script type='text/javascript'>alert('修改成功');window.location=\"/duobao/admin.php/Index/yonghu\";</script>";
        }else{
            echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
        }
     } 
	 //提现记录
	 public function tixian(){
		 $tixian=M("withdraw")->order("withdraw_time desc")->select();
		 $this->assign("tixian",$tixian);
		 $this->display("tixian");
	 }
	 //充值记录
	  public function chongzhi(){
		 $chongzhi=M("chongzhi")->where("stage=1")->order("cz_time desc")->select();
		 $this->assign("chongzhi",$chongzhi);
		 $this->display("chongzhi");
	 }
	 
	 //用户
	 public function yonghu(){
		 $yonghu=M("userinfo")->select();
		 $this->assign("yonghu",$yonghu);
		 $this->display("yonghu");
	 }
	 
	  //开奖
   /*public function kj(){
     
     $this->display("kj");
   }*/
      //开奖
    /*public function lottery_start(){    
			//判断
			$new=M("power")->order("qihao desc")->limit(0,1)->find();
			$new_num=$new['qihao'];
			
			$res4=M("award")->where("date_number='$new_num'")->find();
			if(!$res4){
				  $data1['date_number']=$new['qihao'];
				  $data1['award_number']=$new['kjhao'];
				  $data1['award_time']=$new['time'];
				  $data1['type']=$new['type'];
				  $res2=M("award")->add($data1);
			}
           $aa=M("award")->where("date_number!=''")->order("date_number desc")->limit(0,1)->find();
		   $date_number=$aa['date_number'];
           $bb=$aa['award_number'];
		   // echo $res;
			// exit;
            //用号码除以2取余数
            //余数为0时则买双号的赢
            $res=$bb%2;
            if($res==0){
                $jieg="2";//双号
            }else{
                $jieg="1";//单号
            }
            //判断当前时间是否是00点
            $hour=date("H");
            $minute=date('i');
            if($hour=='00' && $minute<'05'){
                $date_number=$_SESSION['qihao']."120";//拼接昨天的最后一期号码
            }else{
                $_SESSION['qihao']=date("Ymd");
                $date_number=$date_number-1;
            }
            if($jieg==2){
                //echo "2";
                $info1=M("buy")->where("wx=1 and type=2 and controller=0 and date_number='$date_number'")->select();
                //echo M()->getLastSql();exit;
                for($i=0;$i<count($info1);$i++){
                    $id=$info1[$i]['id'];
                    $p_id=$info1[$i]['p_id'];
                    $user_id=$info1[$i]['user_id'];
                    //echo $user_id;exit;
                    $number=$info1[$i]['number'];//几单
                    $info4=M("userinfo")->where("id='$user_id'")->find();
                    //echo M()->getLastSql();
                    $money=$info4['money'];
                    if($p_id==1){//20
                        $dataa['money']=$money+$number*20;
                        $res=M("userinfo")->where("id='$user_id'")->save($dataa);
                        //echo M()->getLastSql();
                    }else if($p_id==2){//50
                        $dataa['money']=$money+$number*50;
                        $res=M("userinfo")->where("id='$user_id'")->save($dataa);
                        
                    }else if($p_id==3){//100
                        $dataa['money']=$money+$number*100;
                        $res=M("userinfo")->where("id=$user_id")->save($dataa);
                        
                    }
                    $succ['success']=1;
                    M("buy")->where("id='$id'")->save($succ);
                }
                $info2=M("buy")->where("date_number='$date_number'")->select();
                for($i=0;$i<count($info2);$i++){
                    $id=$info2[$i]['id'];
                    $data1['controller']=1;
                    M("buy")->where("id=$id")->save($data1);
                }
                
            //否则 则买单号的赢
            }else if($jieg==1){
                //echo "1";
                $info2=M("buy")->where("wx=1 and type=1 and controller=0 and date_number='$date_number'")->select();
                //echo M()->getLastSql();exit;
                for($i=0;$i<count($info2);$i++){
                    $id=$info2[$i]['id'];
                    $p_id=$info2[$i]['p_id'];
                    $user_id=$info2[$i]['user_id'];
                    //echo $user_id;exit;
                    $number=$info2[$i]['number'];
                    $info3=M("userinfo")->where("id=$user_id")->find();
                    //echo M()->getLastSql();exit;
                    $money=$info3['money'];
                    if($p_id==1){//20
                        $datab['money']=$money+$number*20;
                        $res=M("userinfo")->where("id=$user_id")->save($datab);
                        //echo M()->getLastSql();
                    }else if($p_id==2){//50
                        $datab['money']=$money+$number*50;
                        $res=M("userinfo")->where("id=$user_id")->save($datab);
                        
                    }else if($p_id==3){//100
                        $datab['money']=$money+$number*100;
                        $res=M("userinfo")->where("id=$user_id")->save($datab);
                        
                    }
                    $succ['success']=1;
                    M("buy")->where("id='$id'")->save($succ);
                }
                $info1=M("buy")->where("date_number='$date_number'")->select();
                for($i=0;$i<count($info1);$i++){
                    $id=$info1[$i]['id'];
                    $data1['controller']=1;
                    M("buy")->where("id='$id'")->save($data1);
                }
            }
            
            echo "<script type='text/javascript'>alert('开奖成功');window.history.back();</script>";
    }*/
}




































