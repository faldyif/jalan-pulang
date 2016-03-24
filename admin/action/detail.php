<?php 

	if(!empty($_GET)){
		
		if(file_exists("modules/".$modules."/detail.php")){
			
			require "modules/".$modules."/detail.php" ;
			
		}else{
			
			danger("Modul tidak tersedia") ;
			
		}
		
	}

?>