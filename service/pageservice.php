<?php 
include_once('db_conn.php');
include_once('util.php');
	$pagesize = 10;
	$page = paramGet('page') ? paramGet('page') : 1;
	$totalPage;

	function findListByPage($page){
		global $pagesize;
		global $totalPage;
		$total = mysql_query("select COUNT(*) as total FROM tb_page");
		$totalNum = 0;
		while($row = mysql_fetch_array($total,MYSQL_ASSOC)){
			$totalNum = $row['total'];
		}
		$totalPage = ceil($totalNum/$pagesize);
		$page = ($page <= 0 || $page > $totalPage) ? 1 : $page;
		// SELECT a.*,b.nick FROM tb_page a,tb_user b   where a.user_id = b.guId order by a.create_time desc limit 0,10
		$sql = "SELECT a.*,b.nick FROM tb_page a,tb_user b where a.user_id = b.guId  order by a.create_time desc limit ".($page-1) * $pagesize.",".$pagesize;
		// echo $sql;
		$result = mysql_query($sql);
		$list = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			array_push($list, $row);
		}
		return $list;
	}

	$demolist = findListByPage($page);
?>