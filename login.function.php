<?php 

# Start Session
session_start();

# Check Login Status
if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
	echo '<script>window.location.href = "?q=Home"</script>';
}
else{
	# Database Connection
	include_once "model/conn.php";
	include_once "model/login.php";
	include_once "control/ldap.php";

	# Variables
	$username = strtoupper(htmlspecialchars($_POST['username']));
	$password = htmlspecialchars($_POST['pass']);
	ldapLogin($username,$password);
}
	
function ldapLogin($user,$pass){
	
	$ldapconn = new Ldap();
	$ldapArray = $ldapconn->bindLdap($user,$pass);
	
	if($ldapArray[0] == "Login Successfully!"){
		$_SESSION['login'] 		=  $ldapArray[1];
		$_SESSION['user_ad'] 	=  $ldapArray[2];
		$_SESSION['user_name'] 	=  $ldapArray[3];
		$_SESSION['user_title'] =  $ldapArray[4];
		$_SESSION['user_email'] =  $ldapArray[5];
		$_SESSION['user_image']	=  $ldapArray[6];
		
		$userLogin = new Sessions();
		$_SESSION['cas'] = $userLogin->userSession($user);
	}
	
	echo $ldapArray[0];
	
}
?>