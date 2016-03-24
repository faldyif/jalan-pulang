<?php 
	/*
	* Project Name : Jalan Pulang
	* Description : Mari pulang dengan selamat dengan Jalan Pulang!
	* Creator : Burjo Rangers
	* Date Created : 28 Novermber 2015
	* Version : 1.0.0
	* License : public
	* All files are stored in files /pulang/
	*/
	
	session_start() ;
	
	// include the base setting web data
	require "settings.php" ;
	
	// call the main database setting
	require "database.php" ;
	$db = new Db ;
	$db->connect() ;
	
	// call the main SQL Functions library
	require "actions.php" ;
	$act = new Actions ;
	
	require "fungsi.php" ;
?>