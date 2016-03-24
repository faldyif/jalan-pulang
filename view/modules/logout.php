<?php 
	if(!empty($_SESSION)){
		session_start() ;
		$now = date("Y-m-d H:i:s") ;
		$user = $_SESSION['user'] ;
		$pass = $_SESSION['pass'] ;
		$sql = $act->update("user", "`last_accessed` = '".$now."'", "`username` = '".$user."' AND `password` = '".$pass."'") ;
		
		$_SESSION = array() ;
		unset($_SESSION) ;
		session_destroy() ;
		
		header("location:/pulang/home") ;
	}else{
		header("location:/pulang/home") ;
	}
?>