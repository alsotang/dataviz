<?php 
header('Content-Type: text/plain; charset=utf-8');
define('BUC_SSO_SERVER_URL',"https://login.alibaba-inc.com");
define('BUC_SSO_COMMUNICATE_URL',BUC_SSO_SERVER_URL."/rpc/sso/communicate.json");
define('BUC_SSO_LOGIN_URL',BUC_SSO_SERVER_URL."/ssoLogin.htm");
define('BUC_SSO_UPDATE_APP_VERSION_URL',BUC_SSO_SERVER_URL."/updateAppVersion.do");
define('BUC_SSO_APP_NAME',"kcharts");
define('BUC_SSO_CLIENT_VERSION',"1.0.0");
define('BUC_SSO_CLIENT_KEY',"0350e607-75c4-4eca-bad9-1276d37f9c99");
define('BUC_SSO_HEART_BEAT_PERIOD',5*60*1000);
define('BUC_SSO_COOKIE_DOMAIN',null);
define('BUC_SSO_COOKIE_PATH',null);

//扩展点 检查登录态 是否合法
function checkUser(){
	if(isset($_COOKIE["USER_COOKIE"])){
		//获取工号
		$v=buc_sso_decode($_COOKIE["USER_COOKIE"],BUC_SSO_CLIENT_KEY,true);
		if (!empty($v))
		return true;
	}
	return false;
}
//扩展点 增加登录态
function addUser($user_info){
	$v=buc_sso_encode($user_info['empId'],BUC_SSO_CLIENT_KEY,true);
	//$user_info['id']  buc id
//$user_info['lastName']  真名
//$user_info['nickNameCn']  花名
//$user_info['empId']  工号
//$user_info['emailAddr']  邮箱
//$user_info['loginName']  登录名


	setcookie("USER_COOKIE",$v,0,BUC_SSO_COOKIE_PATH,BUC_SSO_COOKIE_DOMAIN,false,false);//set user_cookie
}
//扩展点 删除登录态
function removeUser(){
	setcookie("USER_COOKIE","",time()-3600);
}

function isHeartBeatExpired(){
	$tmpCurrentTime;
	if(isset($_COOKIE["LAST_HEART_BEAT_TIME"])){
		$tmp=buc_sso_decode($_COOKIE["LAST_HEART_BEAT_TIME"],BUC_SSO_CLIENT_KEY,true);
		$tmpCurrentTime=getMillisecond();
		if(($tmpCurrentTime-$tmp)> BUC_SSO_HEART_BEAT_PERIOD){
			return true;
		}
	}else{
		return true;
	}
	return false;
}


function getMillisecond(){
	list($s1,$s2)=explode(' ',microtime());
	return (float)sprintf('%.0f',(floatval($s1)+floatval($s2))*1000);
}

function redirectToSSOServer($backUrl){
	header("Location: ".BUC_SSO_LOGIN_URL."?BACK_URL=".urlencode($backUrl)."&APP_NAME=".BUC_SSO_APP_NAME);
}

function communicate($ssoToken,$isReturnUser){
	$params=array('SSO_TOKEN'=>$ssoToken,'RETURN_USER'=>$isReturnUser);
	$params=http_build_query($params);

	$opts=array(
			'http'=>array(
					'method'=>'POST',
					'header'=>"Content-type: application/x-www-form-urlencoded",
					'content'=>$params
			),
	);

	$context=stream_context_create($opts);
	$tmp=file_get_contents(BUC_SSO_COMMUNICATE_URL,false,$context);
	if(empty($tmp)){
		return false;
	}
	$json_array=json_decode($tmp,true);
	if(empty($json_array)){
		return false;
	}
	$user_info=json_decode($json_array['content'],true);
	if(empty($user_info)){
		return false;
	}
	$newToken=$user_info['token'];
	if(empty($newToken)){
		return false;
	}

	setcookie("LAST_HEART_BEAT_TIME",buc_sso_encode(getMillisecond(),BUC_SSO_CLIENT_KEY,true),0,BUC_SSO_COOKIE_PATH,BUC_SSO_COOKIE_DOMAIN,false,true);//set last heart beat time
	setcookie("SSO_TOKEN",buc_sso_encode($newToken,BUC_SSO_CLIENT_KEY,true),0,BUC_SSO_COOKIE_PATH,BUC_SSO_COOKIE_DOMAIN,false,true);//set sso token
	if($isReturnUser){
		addUser($user_info);
	}
	return true;
}

function buc_sso_encode($code, $seed = "!@#89", $safe = false){
	if ($safe) $code = base64_encode(strrev(str_rot13($code)));
	$c_l = strlen($code);
	$s_m = md5($seed);
	$s_l = strlen($s_m);
	$a=0;
	while ($a <$c_l){
		$str .= sprintf ("%'02s",base_convert(ord($code{$a})+ord($s_m{$s_l % ($a+1)}),10,32));
		$a++;
	}
	return $str;//wordwrap($str, 80, "\n", true)
}


function buc_sso_decode($code, $seed = '!@#89', $safe = false){
	//$code = preg_replace("'[ \r\n\t]+'", '', $code);
	$str = "";
	preg_match_all("/.{2}/", $code, $arr);
	$arr = $arr[0];
	$s_m = md5($seed);
	$s_l = strlen($s_m);
	$a = 0;
	foreach ($arr as $value){
		$str .= chr(base_convert($value,32,10)-ord($s_m{$s_l % ($a+1)}));
		$a++;
	}
	if ($safe) $str = str_rot13(strrev(base64_decode($str)));
	return $str;
}

?>