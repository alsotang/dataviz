<?php 
	session_start();
	if(isset($_POST['series'])){
		$_SESSION['series'] = $_POST['series'];
		echo "success";
	}else{
		echo "fail";
	}
	
?>