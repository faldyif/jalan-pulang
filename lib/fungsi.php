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
	
	function render($page){
		include "view/layout/header.php" ;
		include "view/modules/".$page.".php" ;
		include "view/layout/footer.php" ;
	}
	
	function renderPartial($page){
		include "view/modules/".$page.".php" ;
	}
	
	function error404(){
		header("location:".BASEPATH."404") ;
	}
	
	function redirBack(){
		echo "<script>" ;
		echo "window.history.back()" ;
		echo "</script>" ;
	}
	
	function redirGo($url){
		echo "<script>" ;
		echo "window.location.href='".BASEPATH.$url."'" ;
		echo "</script>" ;
	}
	
	function redirAdmin($url){
		echo "<script>" ;
		echo "window.location.href='".ADMIN.$url."'" ;
		echo "</script>" ;
	}
	
	function alertBack($msg){
		echo "<script>" ;
		echo "alert('".$msg."'); window.history.back() ;" ;
		echo "</script>" ;
	}
	
	function alertGo($msg,$url){
		echo "<script>" ;
		echo "alert('".$msg."'); window.location.href='".$url."'" ;
		echo "</script>" ;
	}
	
	function safety($data){
		return addslashes(htmlspecialchars(trim(strip_tags($data)))) ;
	}
	
	function post($data){
		return safety($_POST[$data]) ;
	}
	
	function get($data){
		return safety($_GET[$data]) ;
	}
	
	function enc($data){
		$salt = "Ac9%&20Pr12Af|3G(Uadf%^*()12Asbn.?#11a%@do&?!`~{[]\q+" ;
		
		return 	sha1($salt.md5($data.sha1($salt.md5($data)))) ;
	}
?>