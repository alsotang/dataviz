<?php 
	include '../buc_sso_macro.php';
	//注销
	//判断是否是sso登录方式
	$type = isset($_SESSION['user']) ? $_SESSION['user']['type'] : "normal";

	session_unset();
	session_destroy();
	if($type == "sso"){
		removeUser();
		header("location:https://login.alibaba-inc.com/ssoLogout.htm?BACK_URL=".$_SERVER['SERVER_NAME']."/dataviz/login.php");
	}else{
		header("location:../login.php");
	}
	
	
?>