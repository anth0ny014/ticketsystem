<?php

# Start Session
session_start();

# Unset Sessions
$_SESSION = array();

# Destroy Session Cookies
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
	);
}

# Destroy Session
session_destroy();

# Redirect to Login Page
header("location:index.php?q=Login");

?>