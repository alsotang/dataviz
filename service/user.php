<?php 
	include_once('db_conn.php');
	include_once('util.php');
	//第一次新增 之后就更新last_login_time即可
	function addUser($email,){
		$sql = "INSERT INTO tb_user ('nick','id','create_time','last_login_time','email') VALUES (".$nick.",".$id.",now(),'',".$email.",".crypt($pwd).")";
		$rs = mysql_query($sql);
	}

	function regist(){
		$sql = "INSERT INTO tb_user ('nick','id','create_time','last_login_time','email') VALUES (".$nick.",".$id.",now(),'',".$email.",".crypt($pwd).")";
		$rs = mysql_query($sql);
	}

	function updateLoginTime($guId,$last_login_time){
		$sql = "UPDATE tb_user SET last_login_time = ".$last_login_time." WHERE guId = ".$guId;
		$rs = mysql_query($sql);
	}
?>