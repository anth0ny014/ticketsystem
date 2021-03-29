<?php
// class Sessions extends DbConnect{
	
// 	public function userSession($user){
// 		$query =  $this->pgConnect()->prepare("SELECT cas FROM employees WHERE upper(account_name) = 'ONSEMI\\$user';");
// 		$query->execute();
// 		$row = $query->fetch(PDO::FETCH_ASSOC);
// 		$cas = $row['cas'];
// 		$this->pgDisconnect();
		
// 		if($cas == ""){ $cas = 0; }
		
// 		return $cas;
// 	}
	
// }
// $con = new DbConnect();
// $con->pgConnect();
?>