<?php 
	
	include_once('util.php');
	include_once('userUtil.php');
	session_start();
	$type = paramGet("type");
	$email = paramGet("email");
	$pwd = paramGet("pwd");
	$nick = paramGet("nick") ? paramGet("nick") : "unknown";
	switch ($type) {
		//注册
		case '1':
			regist($email,$pwd,$nick);
			break;
		//登录
		default:
			login($email,$pwd);
			break;
	}

?>