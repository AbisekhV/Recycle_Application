<?php
class Customer {	
   
	private $customerTable = 'customer';	
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function login(){
		if($this->email && $this->password) {
			$sqlQuery = "
				SELECT * FROM ".$this->customerTable." 
				WHERE email = ? AND password = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			// $password = md5($this->password);
			$password = $this->password;
			$stmt->bind_param("ss", $this->email, $password);	
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0){
				$user = $result->fetch_assoc();
				$_SESSION["userid"] = $user['id'];				
				$_SESSION["name"] = $user['name'];					
				return 1;		
			} else {
				return 0;		
			}			
		} else {
			return 0;
		}
	}
	
	public function loggedIn (){
		if(!empty($_SESSION["userid"])) {
			return 1;
		} else {
			return 0;
		}
	}
	
	function getAddress(){
		if($_SESSION["userid"]) {
			$stmt = $this->conn->prepare("
				SELECT email, phone, address 
				FROM ".$this->customerTable." 
				WHERE id = '".$_SESSION["userid"]."'");				
			$stmt->execute();			
			$result = $stmt->get_result();		
			return $result;	
		}
	}

	function getWallet(){
		if($_SESSION["userid"]) {
			$stmt = $this->conn->prepare("
				SELECT wallet 
				FROM ".$this->customerTable." 
				WHERE id = '".$_SESSION["userid"]."'");				
			$stmt->execute();			
			$result = $stmt->get_result();		
			return $result;	
		}
	}

	function setWallet($amount){
		if($_SESSION["userid"]) {
			$stmt = $this->conn->prepare(
			"UPDATE ".$this->customerTable." SET wallet=$amount WHERE id ='".$_SESSION["userid"]."'"
			);				
			$stmt->execute();			
			$result = $stmt->get_result();		
			return $result;	
		}
	}
}
?>