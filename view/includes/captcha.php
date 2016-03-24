<?php 
	session_start() ;
	
	$huruf = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789" ;
	$acakhuruf = substr(str_shuffle($huruf), 0 , 6) ;
	$background = imagecreatefromjpeg("../../assets/img/gambar.jpg") ;
	$warnahuruf = imagecolorallocate($background,0,0,0) ; //insyaAllah hitam
	imagestring ($background, 5, 5, 8, $acakhuruf, $warnahuruf) ;
	$_SESSION['captcha'] = md5($acakhuruf) ;
	header("Expires: Mon, 21 Oct 2013 07:00:00 GMT") ;
	header("Last-Modified: ". gmdate("D, d M Y H:i:s") ." GMT") ;
	header("Cache-Control: no-store,no-cache,must-revalidate") ;
	header("Cache-Control: post-check=0, pre-check=0",false) ;
	header("Pragma: no-cache") ;
	header('Content-type: image/png') ;//ubah ke mode gambar.png
	imagepng($background) ;
	imagedestroy($background) ;
?>