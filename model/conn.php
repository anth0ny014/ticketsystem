<?php
date_default_timezone_set('Asia/Taipei');

class DbConnect{
    private $conn, $host, $user, $pass, $dbname, $charset;
	
	public function pgConnect(){
		// Database Connection
		$this->host 	= "localhost";
		$this->user 	= "postgres";
		$this->pass 	= "ospiprobe";
		$this->dbname 	= "mydb";
		
		try{
			$this->conn = new PDO("pgsql:host=".$this->host.";dbname=".$this->dbname.";user=".$this->user.";password=".$this->pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->conn;
		}
		catch (PDOException $e){
			echo "Connection Failed: ".$e->getMessage();
		}
	}
	
	protected function pgDisconnect(){
		$this->conn = null;
	}
}

?>