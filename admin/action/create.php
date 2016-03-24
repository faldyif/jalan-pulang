<?php 
	if(!empty($_GET)){
		
		if(file_exists("modules/".$modules."/create.php")){
			
			require "modules/".$modules."/create.php" ;
			
		}else{
			
			danger("Modul tidak tersedia") ;
			
		}
		
	}
?>