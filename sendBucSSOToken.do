<?php
include 'buc_sso_macro.php';

$ssoToken=$_REQUEST['SSO_TOKEN'];
$backUrl=$_REQUEST['BACK_URL'];

if(empty($ssoToken)){
	exit;
}

$app_host= $_SERVER['HTTP_HOST'];

$backurl_path = parse_url($backUrl);
$backurl_host=$backurl_path['host'];


if(strcmp($app_host,$backurl_host)!=0){
header("Location: ".BUC_SSO_SERVER_URL."/error.htm?id=1401&msg=".$backUrl);//redirect to backUrl
exit;
}

if(!communicate($ssoToken,'true')){
	redirectToSSOServer($backUrl);
	exit;
}

header("Location: ".$backUrl);//redirect to backUrl
?>