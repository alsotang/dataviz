<?php 
	include 'ssoFilter.php';
	$user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
	require('smarty/libs/Smarty.class.php');
	$smarty = new Smarty;
	// $smarty->debugging = true;
	$smarty->assign("user",$user,true);
	$smarty->assign("host",$_SERVER['SERVER_NAME']);
	$smarty->display('tpl/header.tpl');
?>
