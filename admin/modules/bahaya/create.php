<?php 
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
				alertGo("Data tidak bisa kami terima!", "index.php?modules=$modules&&action=index") ;
			}else{
				// insert the data to bahaya
				$contrib = 1 ;
				$usr = $_SESSION['user'] ;
				$pass = $_SESSION['pass'] ;
				$date = date("Y-m-d") ;
				
				$ins = $act->insert("bahaya", "'$name', '$longi', '$lati', '$crime', '$contrib', '$date'") ;
				
				if($ins) alertGo("Penambahan sukses! Terimakasih atas kontribusinya!", "index.php?modules=$modules&&action=index") ;
				else alertGo("Penambahan gagal! Ada error!", "index.php?modules=$modules&&action=index") ;
			}
		}
	}
?>