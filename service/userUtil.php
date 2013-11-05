<?php 
	include_once('db_conn.php');
	session_start();
	function login($email,$pwd){
		if(isExist($email)){
			$user = findByEmail($email);
			if($user['pwd'] == md5($pwd)){
				//登录成功
				updateLoginTime($user['guId']);
				$_SESSION['user'] = $user;
				header("location:../index.php");
			}else{
				//密码错误
				header("location:../login.php?error=1");
			}
		}else{
			//用户名不存在
			header("location:../login.php?error=2");
		}
	}
	function regist($email,$pwd,$nick){
		if(!isExist($email)){
			$sql = "INSERT INTO tb_user (nick,create_time,last_login_time,email,pwd,type) VALUES ('".$nick."',NOW(),NOW(),'".$email."','".md5($pwd)."','normal')";
			$rs = mysql_query($sql);
			if($rs) {
				header("location:../login.php");
			}
		}else{
			header("location:../login.php");
		}
		
	}
	//通过用户
	function isExist($email){
		$total = 0;
		$sql = "SELECT COUNT(*) AS total FROM tb_user WHERE email = '".$email."'";
		// echo $sql;
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs,MYSQL_ASSOC)){
			$total = $row['total'];
		}
		if($total) return true;
		return false;
	}

	function findByEmail($email){
		$sql = "SELECT * FROM tb_user WHERE email = '".$email."'";
		$rs = mysql_query($sql);
		while($row = mysql_fetch_array($rs,MYSQL_ASSOC)){
			return $row;
		}
		return false;
	}

	function updateLoginTime($guId){
		$sql = "UPDATE tb_user SET last_login_time = now() WHERE guId = ".$guId;
		$rs = mysql_query($sql);
		if($rs) return true;
		return false;
	}

	//处理SSO 用户
	function updateSSOUser($user){
		$sql = "";
		if(!isExist($user['email'])){
			$sql =  "INSERT INTO tb_user (nick,create_time,last_login_time,email,pwd,type) VALUES ('".$user['nick']."',NOW(),NOW(),'".$user['email']."','','sso')";
		}else{
			$sql = "UPDATE tb_user SET last_login_time = now() WHERE email = '".$user['email']."'";
		}
		$rs = mysql_query($sql);
		$querySql = "SELECT * FROM tb_user where email = '".$user['email']."'";
		$rs1 = mysql_query($querySql);
		while ($row = mysql_fetch_array($rs1,MYSQL_ASSOC)) {
			$_SESSION['user'] = $row;
		}
	}

?>