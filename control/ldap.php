<?php

class Ldap{
	static private $ldaphost 	= "ldap://ad.onsemi.com";
	static private $domain 		= "@ad.onsemi.com";
	private $output,$login,$user_ad,$user_name,$user_title,$user_email,$user_image;
	
	public function bindLdap($user,$pass){
		$username	= $user.self::$domain;

		// Connecting to LDAP
		$ldapconn = ldap_connect(self::$ldaphost) or die("Could not connect to ".self::$ldaphost);
				  

		ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

		$dn="DC=ad,DC=onsemi,DC=com";
		$bind = @ldap_bind($ldapconn,$username,$pass);
		$thumbnailphoto = "N/A";

		if($bind){
			$this->output 		= "Login Successfully!";
			$filter 			= '(samaccountname=' . $user. ')';
			$justthese 			= array("thumbnailphoto","cn","displayname","memberof", "sn", "givenname", "mail","displayname","samaccountname","title");
			$result 			= ldap_search($ldapconn, $dn, $filter, $justthese) or exit("Unable to Search");
			$entries 			= ldap_get_entries($ldapconn,$result);
			$this->login		= 1;
			$this->user_ad 		= $user;
			
			for ($i=0; $i<$entries["count"]; $i++) {
			   $displayname 	= $entries[$i]["displayname"][0];
			   $title 			= $entries[$i]["title"][0];
			   $mail 			= $entries[$i]["mail"][0];
			   
			   if(isset($entries[$i]["thumbnailphoto"][0])){
				   $thumbnailphoto = $entries[$i]["thumbnailphoto"][0];
			   }
			}
			
			$this->user_name	= $displayname;
			$this->user_title 	= $title;
			$this->user_email 	= $mail;
			$this->user_image	= $thumbnailphoto;
			
		}
		else{
			$this->output = "Incorrect Username or Password!";
		}
		
		$result = array($this->output,$this->login,$this->user_ad,$this->user_name,$this->user_title,$this->user_email,$this->user_image);
		return $result;
	}	

	public function ldapLogin($user,$pass){
	
		$this->user = $user;
		$this->pass = $pass;

		$ldapconn = new Ldap();
		$ldapArray = $ldapconn->bindLdap($this->user,$this->pass);
		
		if($ldapArray[0] == "Login Successfully!"){
			$_SESSION['login'] 		=  $ldapArray[1];
			$_SESSION['user_ad'] 	=  $ldapArray[2];
			$_SESSION['user_name'] 	=  $ldapArray[3];
			$_SESSION['user_title'] =  $ldapArray[4];
			$_SESSION['user_email'] =  $ldapArray[5];
			$_SESSION['user_image']	=  $ldapArray[6];
		}
		
		echo $ldapArray[0];
			
	}
	
}

?>