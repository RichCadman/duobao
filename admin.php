<?php
	header("content-type:text/html;charset=utf-8");
	
	define("BIND_MODULE","Admin");
	define("APP_PATH","app/");
	define("APP_DEBUG",true);
	define("BUILD_DIR_SECURE",false);
	include_once 'lib/ThinkPHP/ThinkPHP.php';

