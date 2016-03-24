<?php 
	if(!empty($_POST)){
		extract($_POST) ;
		// check first
		if(empty($name) || empty($safe) || empty($lati2) || empty($longi2)){
			// jika data kosong throw to page lapor
			alertGo("Data kurang lengkap!", "lapor") ;
		}else{
			$safe = safety($safe) ;
			// jika semua data terisi, lakukan..
			if(strcspn($name, '0123456789') != strlen($name)){
				// return error name
				alertGo("Data tidak bisa kami terima!", "index.php?modules=$modules&&action=index") ;
			}else{
				// insert the data to bahaya
				$usr = $_SESSION['user'] ;
				$pass = $_SESSION['pass'] ;
				$date = date("Y-m-d") ;
				
				$ins = $act->insert("aman", "'$name', '$longi2', '$lati2', '$safe', '$date'") ;
				
				if($ins) alertGo("Penambahan sukses! Terimakasih atas kontribusinya!", "index.php?modules=$modules&&action=index") ;
				else alertGo("Penambahan gagal! Ada error!", "index.php?modules=$modules&&action=index") ;
			}
		}
	}
?>