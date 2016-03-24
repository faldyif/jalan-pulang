<?php 
	if(!empty($_GET)){
		
		if(file_exists("modules/".$modules."/delete.php")){
			
			require "modules/".$modules."/delete.php" ;
			
		}else{
			
			danger("Modul tidak tersedia") ;
			
		}
		
	}
?>