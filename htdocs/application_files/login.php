<?php 
echo'<center><img  id ="imgs_head" ></center>';
// Add the cascade style sheet (CSS):
print '<style type="text/css" media="screen">
	.error { color: red; }
</style>';

// Turn on output buffering:
 ob_start();

#                                             ---------------____________----------------------/|
                                             ///////////////|___________/|||||||||||||||||||||||||
                                             #    /////   **         login          **    \\\\  |||         [|PREZZZI]>
	                                        #   **********  Created by: GYFTDCHYLD **********   ||  
	                                       # **G           -------_________________________C**__|
	                                      #______________________/ ______ --_______--__--------#
										   /////////////////////////////////////////////
										   #           ++++++++++++++++++++
										   #          #  \ |     #
										  #     #     #   \|    #
										 #            ##########        
									    #             #
									   #             #
									  #      #       #
									  #              #
									  #               #
									  ##################
#									   [/////////////]
#									 [[_______________]]

//* Set the page title and include the header file:

include('templates/login_header.html');


# login.php
// This page both displays and handles the login form.

// Always need the configuration file:
require('includes/config.inc.php');

// Set the page title and include the HTML header:
$page_title = 'Login';
$file=	"{$_COOKIE['imi']}"; //image size = 1X1.1cm
if  ((isset($_COOKIE['log']))&&(isset($_COOKIE['id'])))
    {
     $user = ($_COOKIE['log']);
     echo"<center><img src='images/2.gif' id='login_gif' /><img src='drivers/$file.png' id='login_image'width='100em'/></center>
	 <form action='loggedin' method='post' id='loggin_status'><div id='logged_inn'>
	     <input name='user' type='hidden' size=5 value=\"$user\" />
	     <input type='submit' name='submit' value='ENTER' id='submit' /> <font size=1><strong>LOGGED-IN</strong></font>
     </form></div>";
    }

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

if (empty($_POST['driver_info']))
   
      { 
      $errors[] = 'Please enter a valid contact Number!';
       }
    
if (empty($_POST['uzr_pass']))
   
      { 
      $errors[] = 'Please enter uour password!';
       }



if  (isset($_POST['driver_info']) 
    && (isset($_POST['uzr_pass'])))
	
 {	// Need the database:
	require (MYSQL);
	// Array for storing errors:
	$errors = array();
	
	// Validate the username:
	if (isset($_POST['driver_info']) && !empty($_POST['driver_info'])) {
		$u = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['driver_info']))), $dbc);
		
		
	} else {
		$errors[] = 'You forgot to enter your user ID!';
	}
	
	// Validate the password:
	if (isset($_POST['uzr_pass']) && !empty($_POST['uzr_pass'])) {
		$p = mysql_real_escape_string(trim(SHA1(htmlentities(strip_tags($_POST['uzr_pass'])))), $dbc);
	} else {
		$errors[] = 'You forgot to enter your password!';
	}
	
	
	if (!isset($_POST['response']))
	{
	$_POST['response'] = 'drivers';
	}
	
	
	
	
	//check if admin user
	if ($_POST['response'] === "adm")
	{
		// Query the database:
		$q = "SELECT first_name, last_name, uzr_name, password, user_id, admin FROM users WHERE (user_id ='$u' AND password = ('$p') AND activated = ('approved') AND admin = ('admin'))";
		if(@mysql_query($q, $dbc)){
		$r = mysql_query ($q);
		}
		if (@mysql_num_rows($r) === 1 )
		{ // A match was made.
			
		$dat =  mysql_fetch_assoc ($r);
	
	session_name('QUICK_CAB_ADMIN');
	         session_start();
		  
 $_SESSION['UZR-ID'] = $dat['uzr_name'];  $_SESSION['UZR-PS'] = $dat['password']; 
 $_SESSION['first_name'] = $dat['first_name'];  $_SESSION['last_name'] = $dat['last_name'];
 $_SESSION['admin'] = $dat['admin'];
  $_SESSION['agent'] = SHA1($_SERVER['HTTP_USER_AGENT']); // for added secutity
$uzer_name =   $_SESSION['first_name']  . ' ' . $_SESSION['last_name'];
 
  // Set chat cookie
setcookie ('a', $dat['password'], time( )+36000, '/application_files/loggedin', '', 0, TRUE);
setcookie ('imi', $dat['uzr_name'], time( )+36000, '/application_files/login', '', 0, TRUE);
 setcookie ('id', $dat['first_name'], time( )+36000, '/application_files/login', '', 0, TRUE);
setcookie ('log', $dat['password'], time( )+36000, '/application_files/login', '', 0, TRUE);  
setcookie ('from', $dat['admin'], time( )+36000, '/', '', 0, TRUE);
			// Clean up:
			mysql_free_result($r);
			mysql_close();
			
						

			

			
			// Redirect the user:
						$url = 'quickcab_request_reciever_admin'; // Define the URL.
echo'<div id="log"><font color="gold" size= 4><center><img src="images/loader.gif" width ="100em">';
				echo "<br /><br /><font size =4 color = 'blue'>LOGIN SUCCESSFUL</font><br /><font size =4 color = 'blue'><br />WELCOME </font>:<font size =4 color = 'green'><strong>$uzer_name<s/trong></font> </div>";

			header("refresh: 5; $url");
			exit(); // Quit the script. 
			
		} 
		else 
		{ // No match.
		$errors[ ] = '<div id="errr">Incorrect User-ID/Password</div>';
		}
	}
	
	
	
	
	
	
	//check if admin user
	else if ($_POST['response'] === "adms")
	{
	// Query the database:
		$q = "SELECT first_name, last_name, uzr_name, password, user_id, admin FROM users WHERE (user_id ='$u' AND password = ('$p') AND activated = ('approved') AND admin = ('admin'))";
		if(@mysql_query($q, $dbc)){
		$r = mysql_query ($q);
		}
		if (@mysql_num_rows($r) === 1 )
		{ // A match was made.
			
		$dat =  mysql_fetch_assoc ($r);
	
	session_name('QUICK_CAB_ADMIN');
	         session_start();
		  
 $_SESSION['UZR-ID'] = $dat['uzr_name'];  $_SESSION['UZR-PS'] = $dat['password']; 
 $_SESSION['first_name'] = $dat['first_name'];  $_SESSION['last_name'] = $dat['last_name'];
 $_SESSION['admin'] = $dat['admin'];
  $_SESSION['agent'] = SHA1($_SERVER['HTTP_USER_AGENT']); // for added secutity
 $uzer_name =   $_SESSION['first_name']  . ' ' . $_SESSION['last_name'];
  // Set chat cookie
  setcookie ('a', $dat['password'], time( )+36000, '/application_files/loggedin', '', 0, TRUE);
 setcookie ('log', $dat['password'], time( )+36000, '/application_files/login', '', 0, TRUE); 
 setcookie ('imi', $dat['uzr_name'], time( )+36000, '/application_files/login', '', 0, TRUE);
  setcookie ('id', $dat['first_name'], time( )+36000, '/application_files/login', '', 0, TRUE);
setcookie ('from', $dat['admin'], time( )+36000, '/', '', 0, TRUE);
			// Clean up:
			mysql_free_result($r);
			mysql_close($dbc);
			
						

			

		
		$url = 'shedule_request_reciever_admin'; // Define the URL.
		echo'<div id="log"><font color="gold" size= 4><center><img src="images/loader.gif" width ="100em">';

				echo "<br /><br /><font size =4 color = 'blue'>LOGIN SUCCESSFUL</font><br /><font size =4 color = 'blue'><br />WELCOME </font>:<font size =4 color = 'green'><strong>$uzer_name<s/trong></font> </div>";

			header("refresh: 5; $url");
			exit(); // Quit the script. 
			
		} 
		else 
		{ // No match.
			$errors[ ] = '<div id="errr">Incorrect User-ID/Password</div>';
		}
	}
	
	
	
	
	
	//check if driver
	else
	{
	// No errors!
		
		// Query the database:
		$q = "SELECT first_name, last_name, uzr_name, password, user_id, car_id FROM users WHERE (user_id ='$u' AND password = ('$p') AND activated = ('approved'))";
		if(@mysql_query($q, $dbc)){
		$r = mysql_query ($q);
		}
		if (@mysql_num_rows($r) === 1 )
		{ // A match was made.
	$dat =  mysql_fetch_assoc ($r);
	
	// Store the data in cookie or session
	
	session_name('QUICK_CAB_DRIVER');
	         session_start();
		  
 $_SESSION['UZR-ID'] = $dat['uzr_name'];  $_SESSION['UZR-PS'] = $dat['password']; 
 $_SESSION['first_name'] = $dat['first_name'];  $_SESSION['last_name'] = $dat['last_name'];
 $_SESSION['car_id'] = $dat['car_id'];
 $_SESSION['agent'] = SHA1($_SERVER['HTTP_USER_AGENT']); // for added secutity
  $uzer_name =   $_SESSION['first_name']  . ' ' . $_SESSION['last_name'];
 // Set chat cookie
 setcookie ('log', $dat['password'], time( )+36000, '/application_files/login', '', 0, TRUE);
 setcookie ('id', $dat['first_name'], time( )+36000, '/application_files/login', '', 0, TRUE);
  setcookie ('imi', $dat['uzr_name'], time( )+36000, '/application_files/login', '', 0, TRUE);
  setcookie ('b', $dat['password'], time( )+36000, '/application_files/loggedin', '', 0, TRUE);
 
 setcookie ('from', $dat['uzr_name'], time( )+36000, '/application_files/cha_tapp', '', 0, TRUE);
 
  	
			  
		/*	setcookie('UZR-ID', ($_POST['driver_info']), time () +3600);
			setcookie('UZR-PS', SHA1($_POST['uzr_pass']), time () +3600);*/
			// Clean up:
			mysql_free_result($r);
			mysql_close($dbc);
			
						

			

			
		
						$url = 'quickcab_request_reciever'; // Define the URL.
			echo'<div id="log"><font color="gold" size= 4><center><img src="images/loader.gif" width ="100em">';
				echo "<br /><br /><font size =4 color = 'blue'>LOGIN SUCCESSFUL</font><br /><font size =4 color = 'blue'><br />WELCOME </font>:<font size =4 color = 'green'><strong>$uzer_name<s/trong></font> </div>";
		
			header("refresh: 5; $url");
			exit(); // Quit the script. 
			
		} 
		else 
		{ // No match.
			$errors[ ] = '<div id="errr">Incorrect User-ID/Password</div>';
		}

	} // End of $errors IF.
	
	
	
	

	// Close the database connection:
	mysql_close($dbc);
	
}
} //End of form submission check.

     //Display any errors:
if (isset($errors) && is_array($errors)) 
{
	
	foreach ($errors as $error) 
    {echo '<font size =2>';
		echo "<p class=\"error\">$error</p>";
    }
	echo '</font>';
	
}


 if  (isset($_COOKIE['loggedin_admin']))
{ // No valid ID, kill the script..
 $url =  'quickcab_request_reciever_admin'; // Define the URL.
			echo'<div id="loggedin_loading"><font color="gold" size= 4><center><img src="images/loading1.gif" width ="100em"></div>';
			 setcookie ('loggedin_admin', '', time( )-36000, '/application_files/login', '', 0, 0);
			header("refresh: 2; $url");
			
			exit(); // Quit the script.
}
elseif  (isset($_COOKIE['loggedin']))
{ // No valid ID, kill the script..
 $url =  'quickcab_request_reciever'; // Define the URL.
			echo'<div id="loggedin_loading"><font color="gold" size= 4><center><img src="images/loading1.gif" width ="100em"></div>';
	
	 setcookie ('loggedin', '', time( )-36000, '/application_files/login', '', 0, 0);
			header("refresh: 2; $url");
			exit(); // Quit the script.
}

 // Show the form:
?>

<script src="js/login.js"></script> 



<?php include('templates/footer.html'); // Need the footer.
?>