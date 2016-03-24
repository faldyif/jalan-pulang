<?php 
	if(!empty($_POST)){
		// do if else
		extract($_POST) ;
		if(empty($user) || empty($pass)){
			// error empty
			alertBack("Isi semua form!") ;
		}else{
			// do validation
			$pass = enc($pass) ;
			if(filter_var($user, FILTER_VALIDATE_EMAIL)){
				// check to db using email
				$sel = $act->selectWhere("user", "`email` = '".$user."' AND `password` = '".$pass."'") ;
			}else{
				// check using username
				$sel = $act->selectWhere("user", "`username` = '".$user."' AND `password` = '".$pass."'") ;
			}
			
			if($sel->rowCount() == 1){
				// there is a valid data, create session
				$date = date("Y-m-d H:i:s") ;
				$row = $sel->fetchObject() ;
				$_SESSION['user'] = $row->username ;
				$_SESSION['pass'] = $row->password ;
				$_SESSION['auth'] = enc($row->username.$row->password.$date) ;
				
				$upd = $act->update("user", "`last_accessed` = '".$date."'", "`username` = '".$row->username."' AND `password` = '".$row->password."'") ;
				
				redirGo("home") ;
			}else{
				alertBack("Anda belum terdaftar dalam database kami!") ;
			}
		}
	}else{
		redirGo("home") ;
	}
?>