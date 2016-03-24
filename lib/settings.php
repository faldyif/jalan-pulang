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
	
	$set['protocol'] = 'http://' ;
	
	$set['host'] = $_SERVER['HTTP_HOST'] ;
	
	$set['path'] = '/pulang/' ;
	
	// define each path to simpler words
	DEFINE("BASEPATH",$set['protocol'].$set['host'].$set['path']) ;
	
	DEFINE("ADMIN",$set['protocol'].$set['host'].$set['path']."admin/") ;
	
	DEFINE("ASSETS",$set['protocol'].$set['host'].$set['path']."assets/") ;
	
	DEFINE("LIB",$set['protocol'].$set['host'].$set['path']."lib/") ;
	
	DEFINE("VIEW",$set['protocol'].$set['host'].$set['path']."view/") ;
?>