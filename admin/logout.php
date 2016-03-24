<?php 
	session_start() ;		
	if(!empty($_SESSION)){
		$_SESSION = array() ;
		unset($_SESSION) ;	
		session_destroy() ;
		
		header("location:/pulang/admin/login.php") ;
	}else{
		header("location:/pulang/admin/index.php") ;
	}
?>