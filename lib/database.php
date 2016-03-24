<?php 
	/*
	* Project Name : Jalan Pulang
	* Description : Mari pulang dengan selamat dengan Jalan Pulang!
	* Creator : Burjo Rangers
	* Date Created : 28 Novermber 2015
	* Version : 1.0.0
	* License : public
	* All files are stored in files /pulang/
	*/
	
	class Db {
		public $host = "localhost" ;
		
		public $db = "pulang" ;
		
		public $user = "root" ;
		
		public $pass = "" ;
		
		public function connect(){
			$base = "mysql:host=".$this->host.";dbname=".$this->db ;
			
			try{
				$conn = new PDO($base, $this->user,$this->pass) ;
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
				$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false) ;
				
				return $conn ;
			}catch(PDOException $e){
				
				die($e->getMessage()) ;
				
			}
			
		}
		
	}
?>