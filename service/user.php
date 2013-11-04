<?php 
	include_once('db_conn.php');
	include_once('util.php');
	session_start();
	//方法
	$type = paramGet("type");
	$email = paramGet("email");
	$pwd = paramGet("pwd");
	$nick = paramGet("nick") ? paramGet("nick") : "匿名";
	//TODO 登录
	//第一次新增 之后就更新last_login_time即可
	function login(){
		global $email;
		global $pwd;
		global $nick; 
		if(isExist()){
			$user = findByEmail();
			updateLoginTime($user['guId']);
			$_SESSION['user'] = $user;
			header("location:../index.php");
		}else{
			header("location:../error.php");
		}
	}
	function regist(){
		global $email;
		global $pwd;
		global $nick; 
		$sql = "INSERT INTO tb_user (nick,create_time,last_login_time,email,pwd) VALUES ('".$nick."',NOW(),NOW(),'".$email."','".crypt($pwd)."')";
		$rs = mysql_query($sql);
		if($rs) return true;
		return false;
	}
	//通过用户
	function isExist(){
		global $email;
		$total = 0;
		$sql = "SELECT COUNT(*) AS total FROM tb_user WHERE email = '".$email."'";
		echo $sql;
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs,MYSQL_ASSOC)){
			$total = $row['total'];
		}
		if($total) return true;
		return false;
	}

	function findByEmail(){
		global $email;
		$sql = "SELECT * FROM tb_user WHERE email = '".$email."'";
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs,MYSQL_ASSOC)){
			return $row;
		}
		return false;
	}

	// function regist(){
	// 	global $email;
	// 	global $pwd;
	// 	global $nick; 
	// 	$sql = "INSERT INTO tb_user (nick,create_time,last_login_time,email,pwd) VALUES ('".$nick."',NOW(),NOW(),'".$email."','".crypt($pwd)."')";
	// 	$rs = mysql_query($sql);
	// }

	function updateLoginTime($guId){
		$sql = "UPDATE tb_user SET last_login_time = now() WHERE guId = ".$guId;
		$rs = mysql_query($sql);
		if($rs) return true;
		return false;
	}

	switch ($type) {
		//注册
		case '1':
			regist();
			break;
		//登录
		default:
			login();
			break;
	}
	// echo isExist();
	// updateLoginTime();
	// findByEmail();
	// login();

?>