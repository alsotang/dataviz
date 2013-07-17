<?php 
	include_once('db_conn.php');
	include_once('util.php');
	include_once('tpl.php');
	$type = paramGet('type');
	//添加
	if($type == "a"){
		$content = paramPost('content');	
		if($content!=""){
			$page_html = $tpl_header.$content.$tpl_footer;
			$pid = addPage($page_html);
			echo $pid;
		}
	//查询
	}else if($type == "q"){
		$pageid = paramGet('pageid');
		if($pageid!=""){
			echo findPageById($pageid);
		}
	}


	function addPage($content){
		$sql = "INSERT INTO tb_genpage (page_content, create_time) VALUES ( \"".str_replace("\"", "'", $content)."\", now())";
		$result = mysql_query($sql);
		return mysql_insert_id();
	}


	function findPageById($id){
		$result = mysql_query("SELECT * FROM tb_genpage");
		while($row = mysql_fetch_array($result)){
			if($row['page_id'] == $id){
				return $row['page_content'];
			}
		}
	}

	// echo $tpl_header;
	// echo $tpl_footer;
?>



