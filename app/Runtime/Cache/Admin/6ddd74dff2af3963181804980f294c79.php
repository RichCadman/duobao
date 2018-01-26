<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/duobao/pub/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="/duobao/pub/admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/duobao/pub/admin/css/colorpicker.css" />
<link rel="stylesheet" href="/duobao/pub/admin/css/datepicker.css" />
<link rel="stylesheet" href="/duobao/pub/admin/css/uniform.css" />
<link rel="stylesheet" href="/duobao/pub/admin/css/select2.css" />
<link rel="stylesheet" href="/duobao/pub/admin/css/matrix-style.css" />
<link rel="stylesheet" href="/duobao/pub/admin/css/matrix-media.css" />
<link rel="stylesheet" href="/duobao/pub/admin/css/bootstrap-wysihtml5.css" />
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
    <li><a href="/duobao/admin.php/Index/index.html"><i class="icon icon-th"></i> <span>开奖统计</span></a></li>
	<li><a href="/duobao/admin.php/Index/buy.html"><i class="icon icon-th"></i> <span>购买记录</span></a></li>
	<li><a href="/duobao/admin.php/Index/tongji.html"><i class="icon icon-th"></i> <span>盈利统计</span></a></li>
    <li><a href="/duobao/admin.php/Index/date_number.html"><i class="icon icon-fullscreen"></i> <span>开奖记录</span></a></li>
	<li><a href="/duobao/admin.php/Index/tixian.html"><i class="icon icon-fullscreen"></i> <span>提现记录</span></a></li>
	<li><a href="/duobao/admin.php/Index/chongzhi.html"><i class="icon icon-fullscreen"></i> <span>充值记录</span></a></li>
	<li><a href="/duobao/admin.php/Index/yonghu.html"><i class="icon icon-fullscreen"></i> <span>用户</span></a></li>
	<!-- <li><a href="/duobao/admin.php/Index/qihao.html"><i class="icon icon-fullscreen"></i> <span>修改</span></a></li> -->
  <!-- <li><a href="/duobao/admin.php/Index/kj.html"><i class="icon icon-fullscreen"></i> <span>开奖</span></a></li> -->
    <!-- <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">3</span></a> -->
      <!-- <ul> -->
        <!-- <li><a href="#">Basic Form</a></li> -->
        <!-- <li><a href="#">Form with Validation</a></li> -->
        <!-- <li><a href="#">Form with Wizard</a></li> -->
      <!-- </ul> -->
    <!-- </li>  -->
     <!-- <li><a href="#"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li> -->
   <!-- <li><a href="#"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li> -->
   <!-- <li class="#"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a> -->
     <!-- <ul> -->
       <!-- <li><a href="#">Dashboard2</a></li> -->
       <!-- <li><a href="#">Gallery</a></li> -->
       <!-- <li><a href="#">Calendar</a></li> -->
       <!-- <li><a href="#">Chat option</a></li> -->
     <!-- </ul> -->
   <!-- </li>  -->
   <!--  <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
     <ul>
       <li><a href="error403.html">Error 403</a></li>
       <li><a href="error404.html">Error 404</a></li>
       <li><a href="error405.html">Error 405</a></li>
       <li><a href="error500.html">Error 500</a></li>
     </ul>
   </li> -->
    <!-- <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li> -->
    <!-- <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li> -->
  </ul>
</div>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> 首页</a> <a href="#" class="tip-bottom">添加期号</a> </div>
  <h1>添加期号</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>添加期号</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="/duobao/admin.php/Index/add" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">期号 :</label>
              <div class="controls">
                <input type="text" class="span11" name="date_number" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">中奖号码 :</label>
              <div class="controls">
                <input type="text" class="span11" name="award_number" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">开奖时间 :</label>
              <div class="controls">
                <input type="text"  class="span11" name="award_time" placeholder="格式:2017-09-27 01:55:50"/>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success">保存</button>
            </div>
          </form>
        </div>
      </div>

  </div>
</div></div>
<!--Footer-part-->

<!--end-Footer-part--> 
<script src="/duobao/pub/admin/js/jquery.min.js"></script> 
<script src="/duobao/pub/admin/js/jquery.ui.custom.js"></script> 
<script src="/duobao/pub/admin/js/bootstrap.min.js"></script> 
<script src="/duobao/pub/admin/js/bootstrap-colorpicker.js"></script> 
<script src="/duobao/pub/admin/js/bootstrap-datepicker.js"></script> 
<script src="/duobao/pub/admin/js/jquery.toggle.buttons.html"></script> 
<script src="/duobao/pub/admin/js/masked.js"></script> 
<script src="/duobao/pub/admin/js/jquery.uniform.js"></script> 
<script src="/duobao/pub/admin/js/select2.min.js"></script> 
<script src="/duobao/pub/admin/js/matrix.js"></script> 
<script src="/duobao/pub/admin/js/matrix.form_common.js"></script> 
<script src="/duobao/pub/admin/js/wysihtml5-0.3.0.js"></script> 
<script src="/duobao/pub/admin/js/jquery.peity.min.js"></script> 
<script src="/duobao/pub/admin/js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>