<?php 
	//页面
	include_once('db_conn.php');
	include_once('util.php');
	$page = array('title' => '测试','html' => 'test','script' => 'test','user_id'=>34);
	function addPage($page){
		echo "INSERT INTO tb_page (title,html,script,create_time,user_id,last_modify_time) VALUES ('".$page['title']."','".$page['html']."','".$page['script']."',now(),'".$page['user_id']."',now())";
		$rs = mysql_query("INSERT INTO tb_page (title,html,script,create_time,user_id,last_modify_time) VALUES ('".$page['title']."','".$page['html']."','".$page['script']."',now(),'".$page['user_id']."',now())");
		// while($row = mysql_fetch_array($rs,MYSQL_ASSOC)){

		// }
		if($rs) return true;
		return false;
	}

	addPage($page);

	function deletePage($id){


	}

	function updatePage($page){

	}

	function getPageByPageId($id){

	}
?>