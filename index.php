<?php 
	/*
	* Project Name : Jalan Pulang
	* Description : Mari pulang dengan selamat dengan Jalan Pulang!
	* Creator : Burjo Rangers
	* Date Created : 28 Novermber 2015
	* Version : 1.0.0
	* License : public
	* All files are stored in files /pulang/
	* All system library configrations are placed in /pulang/lib/
	* All assets library are placed in /pulang/lib/
	*/
	
	include "lib/config.php" ;
	
	// detect if user acces get
	if(!empty($_GET)){
		// make $get simpler
		extract($_GET) ;
		if(!empty($page) || isset($page)){
			// if access page, check whether it's exist
			if($page == "admin"){
				// redir page to admin
				redirAdmin("index.php") ;
			}elseif($page == "404" || $page == "logout" || $page == "login" || $page == "signup"){
				// render partial page 404
				//renderPartial($page) ;
				include "view/modules/".$page.".php" ;
			}else{
				// if not admin or 404 
				if(file_exists("view/modules/".$page.".php")){
					// render the page if there is the page 
					include "view/layout/header.php" ;
					include "view/modules/".$page.".php" ;
					include "view/layout/footer.php" ;
				}else{
					// throw to 404: Page Not Found!
					error404() ;
				}
			}
		}
	}else{
		// if user doesn't acces any pages
		redirGo("home") ;
	}
?>