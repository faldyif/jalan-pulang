<?php 

	if(!empty($_GET)){
		
		if(file_exists("modules/".$modules."/index.php")){
			
			require "modules/".$modules."/index.php" ;
			
		}else{
			
			danger("Modul tidak tersedia") ;
			
		}
		
	}else{
		
		require "modules/index.php" ;
		
	}

?>