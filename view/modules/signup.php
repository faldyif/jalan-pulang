<?php 
	//include "lib/config.php" ;
	extract($_POST) ;
	if(empty($nama) || empty($email) || empty($user) || empty($password) || empty($captcha)){
		// throw back to home page do nothing
		alertBack("ISI SEMUA DATA TERLEBIH DULU!") ;
	}else{
		// to detect number strcspn($_REQUEST['q'], '0123456789') != strlen($_REQUEST['q'])
		// if all datas are filled...
		if(is_numeric($nama)){
			alertBack("Nama Anda harus alfabet!") ;
		}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			// throw error email
			alertBack("Email Anda tidak sesuai format email yang ada!") ;
		}elseif(md5($captcha) != $_SESSION['captcha']){
			// error capctha
			alertBack("Captcha salah!") ;
		}else{
			// check if there is same username
			$sel = $act->selectWhere("user", "`username` = '".$user."' OR `email` = '".$email."'") ;
			
			if($sel->rowCount() == 1){
				// throw error 
				alertBack("Username/Email sudah terpakai!") ;
			}else{
				// process the data
				$date = date("Y-m-d H:i:s") ;
				$password = enc($password) ;
				$ins = $act->insert("user", "'$nama','$user', '$password', '$email', '$date', '$date', '', '0'") ;
				
				if($ins){
					alertGo("Register Success!", "home") ;
				}else{
					alertGo("Register failed!", "home") ;
				}
			}
		}
	}
?>