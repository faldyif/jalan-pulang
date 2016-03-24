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
	
	class Actions extends Db{
		public $query ;
		
		public $sql ;
		
		public $c ;
		
		public $tbl = "pulang_" ;
		
		// set the app date to GMT+7
		public function __construct(){
			return date_default_timezone_set("Asia/Jakarta") ;
		}
		
		// to execute query selection
		public function query($query){
			$pdo = $this->connect() ;
			
			try{
				$sql = $pdo->query($query) ;
				
				return $sql ;
			}catch(PDOException $e){
				die($e->getMessage()) ;
			}
		}
		
		// to exectute query works with database such as insert,update and delete
		public function exec($query){
			$pdo = $this->connect() ;
			
			try{
				$sql = $pdo->exec($query) ;
				
				return $sql ;
			}catch(PDOException $e){
				die($e->getMessage()) ;
			}
		}
		
		// readable query (SELECT)
		public function selectAll($param){
			$sql = "SELECT * FROM `".$this->tbl.$param."`" ;
			
			$act = $this->query($sql) ;
			
			return $act ;
		}
		
		public function selectSome($column,$param){
			$sql = "SELECT ".$column." FROM `".$this->tbl.$param."`" ;
			
			$act = $this->query($sql) ;
			
			return $act ;
		}
		
		public function selectWhere($param,$where){
			$sql = "SELECT * FROM `".$this->tbl.$param."` WHERE ".$where ;
			
			$act = $this->query($sql) ;
			
			return $act ;
		}
		
		public function selectSomeWhere($column,$param,$where){
			$sql = "SELECT ".$column." FROM `".$this->tbl.$param."` WHERE ".$where ;
			
			$act = $this->query($sql) ;
			
			return $act ;
		}
		
		public function selectSort($param,$order,$format){
			$sql = "SELECT * FROM `".$this->tbl.$param."` ORDER BY ".$order." ".$format ;
			
			$act = $this->query($sql) ;
			
			return $act ;
		}
		
		public function selectSortWhere($param,$where,$order,$format){
			$sql = "SELECT * FROM `".$this->tbl.$param."` WHERE ".$where." ORDER BY ".$order." ".$format ;
			
			$act = $this->query($sql) ;
			
			return $act ;
		}
		
		public function selectJoin($data,$tbl1,$tbl2,$join){
			$sql = "SELECT ".$data." FROM `".$this->tbl.$tbl1."` JOIN `".$this->tbl.$tbl2."` ON ".$join ;
			
			$act = $this->query($sql) ;
			
			return $act ;
		}
		
		public function lastData($param,$order){
			$sql = "SELECT * FROM `".$this->tbl.$param."` ORDER BY ".$order." DESC LIMIT 1" ;
			
			$act = $this->query($sql) ;
			
			return $act ;
		}
		
		// SQL Instruction to inserting and deleting data
		public function insert($param,$data){
			$sql = "INSERT INTO `".$this->tbl.$param."` VALUES (NULL,".$data.")" ;
			
			$act = $this->exec($sql) ;
			
			return $sql ;
		}
		
		public function delete($param,$where){
			$sql = "DELETE FROM `".$this->tbl.$param."` WHERE ".$where ;
			
			$act = $this->exec($sql) ;
			
			return $sql ;
		}
		
		public function update($param,$set,$where){
			$sql = "UPDATE `".$this->tbl.$param."` SET ".$set." WHERE ".$where ;
			
			$act = $this->exec($sql) ;
			
			return $sql ;	
		}
	}
?>