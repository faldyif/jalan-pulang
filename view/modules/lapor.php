<?php
	if(empty($_SESSION['auth'])){
		redirGo("home") ;
	}
	
	if(!empty($_POST)){
		extract($_POST) ;
		// check first
		if(empty($name) || empty($crime) || empty($lati) || empty($longi)){
			// jika data kosong throw to page lapor
			alertGo("Data kurang lengkap!", "lapor") ;
		}else{
			$crime = safety($crime) ;
			// jika semua data terisi, lakukan..
			if(strcspn($name, '0123456789') != strlen($name)){
				// return error name
			}else{
				// insert the data to bahaya
				$contrib = $pro_disp->id_user ;
				$usr = $_SESSION['user'] ;
				$pass = $_SESSION['pass'] ;
				$date = date("Y-m-d") ;
				$qty = $pro_disp->kontribusi+1 ;
				
				$ins = $act->insert("bahaya", "'$name', '$longi', '$lati', '$crime', '$contrib', '$date'") ;
				$upd = $act->update("user", "`kontribusi` = '$qty'", "`username` = '$usr' AND `password` = '$pass'") ;
				
				if($ins) alertGo("Penambahan sukses! Terimakasih atas kontribusinya!", "home") ;
				else alertGo("Penambahan gagal! Ada error!", "home") ;
			}
		}
	}
?>
<div id="map" data-target="#lapor" data-toggle="modal"></div>