<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title></title>
  <link href="/favicon.ico" type="image/ico" rel="shortcut icon" />
  <link rel="stylesheet" type="text/css" href="/duobao/pub/admin_login/css/reset.min.css" />
  <link rel="stylesheet" type="text/css" href="/duobao/pub/admin_login/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/duobao/pub/admin_login/css/roboto.css" />
  <link href="/duobao/pub/admin_login/css/roboto.css" rel="stylesheet" />
  <link href="/duobao/pub/admin_login/css/authentication.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="/duobao/pub/admin_login/css/authentication.min.css" />
  <script src="/duobao/pub/admin_login/js/jquery-3.1.1.js" type="text/javascript"></script>
  <script type="text/javascript">
    function check(){
        if($("#admin_name").val()==""){
            $("#admin_name").focus();
            return false;
        }else if($("#password").val()==""){
            $("#password").focus();
            return false;
        }else{
            return true;
        }
    }
    </script>
 </head>
 <body>
  <div class="container">
   <div class="row">
    <div class="col-md-4 col-md-offset-4 authentication-form-wrapper">
     <div class="company-logo">
      <a href="#" class=" logo img-responsive">
        <div style="font-family:微软雅黑;color:#FFF;font-size: 32px;text-align:center">Admin</div><!-- <img src="/duobao/public/admin/images/logo.png" class="img-responsive" alt="Wexone - CRM客户关系管理系统" /> --></a>
     </div>
     <div class="mtop40 authentication-form">
      <h1>登录</h1>
      <div class="row">
      </div>
      <form action="/duobao/admin.php/Login/login.html" method="post" accept-charset="utf-8" onsubmit="return check()">
       <div class="form-group">
        <label for="email" class="control-label">用户名</label>
        <input type="text" id="admin_name" name="admin_name" class="form-control" autofocus="1" />
       </div>
       <div class="form-group">
        <label for="password" class="control-label">密码</label>
        <input type="password" id="password" name="password" class="form-control" />
       </div>
       <div class="form-group">
        <button type="submit" class="btn btn-info btn-block">登录</button>
       </div>
       <!-- <div class="form-group">
        <a href="http://demo.jupress.com/wexone/authentication/forgot_password">忘记密码?</a>
       </div> -->
      </form>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>