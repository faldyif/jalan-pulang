<?php 
	if(empty($_SESSION['auth'])) redirGo("home") ;
	
	if(!empty($_POST)){
		extract($_POST) ;
		if(empty($judul) || empty($desc)){
			alertBack("Data harus terisi!") ;
		}else{
			// jika data terisi semua, maka
			if(is_numeric($judul)){
				// throw error 
				alertBack("Kami tidak bisa menerima feedback Anda!") ;
			}elseif(md5($captcha) != $_SESSION['captcha']){
				alertBack("Captcha Anda Salah!") ;
			}else{
				// jika semua kondisi terpenuhi maka...
				$date = date("Y-m-d") ;
				$usr = $_SESSION['user'] ;
				$pass = $_SESSION['pass'] ;
				$sel = $act->selectWhere("user","`username` = '".$usr."' AND `password` = '".$pass."'") ;
				$row = $sel->fetchObject() ;
				$id = $row->id_user ;
				
				$ins = $act->insert("feedback", "'$judul', '$desc', '$longi2', '$lati2', '$id', '$date'");
				
				if($ins) alertGo("Feedback Anda kami terima.", "home") ;
				else alertGo("Error mengirimkan feedback!", "home") ;
			}
		}
	}
?>
<div id="map" data-target="#feedback" data-toggle="modal"></div>