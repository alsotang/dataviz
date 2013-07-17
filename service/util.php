<?php  
	function paramPost($paramName){
		if(isset($_POST[$paramName])){
			return $_POST[$paramName];
		}
		return "";
	}

	function paramGet($paramName){
		if(isset($_GET[$paramName])){
			return $_GET[$paramName];
		}
		return "";
	}
?>