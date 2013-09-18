<?php
include 'buc_sso_macro.php';

$params=array('APP_NAME'=>BUC_SSO_APP_NAME,'CLIENT_VERSION'=>BUC_SSO_CLIENT_VERSION);
$params=http_build_query($params);

$opts=array(
		'http'=>array(
				'method'=>'POST',
				'header'=>"Content-type: application/x-www-form-urlencoded",
				'content'=>$params
		),
);

$context=stream_context_create($opts);
file_get_contents(BUC_SSO_UPDATE_APP_VERSION_URL,false,$context);

$my_protocal="";
if(empty($_SERVER['HTTPS'])) {
	$my_protocal="http";
}else{
	$my_protocal="https";
}

$back_url=$my_protocal."://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];

if(!checkUser()){
	redirectToSSOServer($back_url);
	exit;
}

if(isHeartBeatExpired()){
	$ssoToken=buc_sso_decode($_COOKIE["SSO_TOKEN"],BUC_SSO_CLIENT_KEY,true);
	if(!communicate($ssoToken,'false')){
		redirectToSSOServer($back_url);
		exit;
	}
}



?>