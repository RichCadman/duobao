<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/bocai/pub/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="/bocai/pub/admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/bocai/pub/admin/css/colorpicker.css" />
<link rel="stylesheet" href="/bocai/pub/admin/css/datepicker.css" />
<link rel="stylesheet" href="/bocai/pub/admin/css/uniform.css" />
<link rel="stylesheet" href="/bocai/pub/admin/css/select2.css" />
<link rel="stylesheet" href="/bocai/pub/admin/css/matrix-style.css" />
<link rel="stylesheet" href="/bocai/pub/admin/css/matrix-media.css" />
<link rel="stylesheet" href="/bocai/pub/admin/css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<!-- <div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

start-top-serch
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
close-top-serch  -->


<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
    <!-- <li><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li><a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li> -->
    <li><a href="/bocai/admin.php/Index/index.html"><i class="icon icon-th"></i> <span>开奖统计</span></a></li>
  <li><a href="/bocai/admin.php/Index/tongji.html"><i class="icon icon-th"></i> <span>盈利统计</span></a></li>
    <li><a href="/bocai/admin.php/Index/date_number.html"><i class="icon icon-fullscreen"></i> <span>开奖记录</span></a></li>
  <li><a href="/bocai/admin.php/Index/tixian.html"><i class="icon icon-fullscreen"></i> <span>提现记录</span></a></li>
  <li><a href="/bocai/admin.php/Index/chongzhi.html"><i class="icon icon-fullscreen"></i> <span>充值记录</span></a></li>
  <li><a href="/bocai/admin.php/Index/yonghu.html"><i class="icon icon-fullscreen"></i> <span>用户</span></a></li>
  <!-- <li><a href="/bocai/admin.php/Index/qihao.html"><i class="icon icon-fullscreen"></i> <span>修改</span></a></li> -->
   <!-- <li><a href="/bocai/admin.php/Index/kj.html"><i class="icon icon-fullscreen"></i> <span>开奖</span></a></li> -->
    
  </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Common elements</a> </div>
  <h1>开奖</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>开奖</h5>
        </div>
        <div class="widget-content nopadding">
            <div class="form-actions">
              <a href="/bocai/admin.php/Index/lottery_start"><button type="submit" class="btn btn-success">开奖</button></a>
            </div>
        </div>
      </div>

  </div>
</div></div>
<!--Footer-part-->

<!--end-Footer-part--> 
<script src="/bocai/pub/admin/js/jquery.min.js"></script> 
<script src="/bocai/pub/admin/js/jquery.ui.custom.js"></script> 
<script src="/bocai/pub/admin/js/bootstrap.min.js"></script> 
<script src="/bocai/pub/admin/js/bootstrap-colorpicker.js"></script> 
<script src="/bocai/pub/admin/js/bootstrap-datepicker.js"></script> 
<script src="/bocai/pub/admin/js/jquery.toggle.buttons.html"></script> 
<script src="/bocai/pub/admin/js/masked.js"></script> 
<script src="/bocai/pub/admin/js/jquery.uniform.js"></script> 
<script src="/bocai/pub/admin/js/select2.min.js"></script> 
<script src="/bocai/pub/admin/js/matrix.js"></script> 
<script src="/bocai/pub/admin/js/matrix.form_common.js"></script> 
<script src="/bocai/pub/admin/js/wysihtml5-0.3.0.js"></script> 
<script src="/bocai/pub/admin/js/jquery.peity.min.js"></script> 
<script src="/bocai/pub/admin/js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>