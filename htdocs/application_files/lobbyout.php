<?php # Script 18.9 - logout.php
// This is the logout page for the site.
require ('includes/config.inc.php');
$page_title = 'Logout';

session_name('QUICK_CAB_LOBBY');
	         session_start();
// If no first_name session variable exists, redirect the user:
if (isset($_SESSION['UZR-ID'])) {
	 setcookie ('UZR-ID', '', time( )-3600, '/', '', 0, 0);
 setcookie ('UZR-PS', '', time( )-3600, '/', '', 0, 0);
 setcookie ('from', '', time( )-3600, '/', '', 0, 0);
 setcookie ('to', '', time( )-3600, '/application_files/cha_tapp_admin', '', 0, 0);
  setcookie ('lobby', '', time( )-3600, '/application_files/quickcab', '', 0, 0);
  setcookie ('my', '', time( )-3600, '/application_files/quickcab', '', 0, 0);
 $_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(QUICK_CAB_LOBBY), '', time()-3600, '/'); // Destroy the cookie.
	
	$url = BASE_URL . 'application_files/quickcab'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.
	
}
 else 
{ // Log out the user.

	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(QUICK_CAB_LOBBY), '', time()-3600, '/'); // Destroy the cookie.
setcookie ('from', '', time( )-3600, '/', '', 0, 0);
setcookie ('to', '', time( )-3600, '/application_files/cha_tapp_admin', '', 0, 0);
setcookie ('lobby', '', time( )-3600, '/application_files/quickcab', '', 0, 0);
setcookie ('my', '', time( )-3600, '/application_files/quickcab', '', 0, 0);
}

// Print a customized message:
echo '<h3>You are now logged out.</h3>';
$url = BASE_URL . 'application_files/quickcab'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.
?>