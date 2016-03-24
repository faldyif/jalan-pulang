<?php 
	if(!empty($_GET)){
		
		if(file_exists("modules/".$modules."/update.php")){
			
			require "modules/".$modules."/update.php" ;
			
		}else{
			
			danger("Modul tidak tersedia") ;
			
		}
		
	}
?>