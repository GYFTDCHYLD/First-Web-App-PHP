<?php
 // Add the cascade style sheet (CSS):
print '<style type="text/css" media="screen">
	.error { color: red; }
</style>';
// start session to read the variables from the set session
session_name('QUICK_CAB_DRIVER');
session_start();
require('includes/config.inc.php');
 // Check for a valid login info, through POST:
 if ( 
	 (!isset($_SESSION['first_name']))
      && (!isset($_SESSION['last_name']))
        &&(!isset($_SESSION['UZR-ID']))
         && (!isset($_SESSION['UZR-PS']))
	
 
// &&(trim($_POST['driver_info'] === 'Mr. Reid (5829083)'))
// && (trim($_POST['uzr_pass'] === '94da77b67182807eeb06794dacec3a66e1e800a5'))
    )
 { // No valid ID, kill the script.
 $url =  'login.php'; // Define the URL.
			ob_end_clean(); // Delete the buffer.
			header("Location: $url");
			exit(); // Quit the script.
 echo '<center><font color = "red" size = 10 >This page is for administrative use only.</font></center>';
 exit( );
}

if (isset($_SESSION['UZR-ID']))
   {
   //set login through session
    $_POST['from'] = ($_SESSION['UZR-ID']);
   
       }



#                                             ---------------____________-----------------------
                                             ////////////////___________/||||||||||||||||||||||||
                                             #    /////   **     quickcab drivers   **    \\\\  ||
	                                        #   **********  Created by: GYFTDCHYLD **********   ||  
	                                       # **G           -------_________________________C**__|
	                                      #______________________/ ______ --_______--__--------#
										 #/////////////////////////////////////////////
										  #           ##################
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






 echo'

	
		<title>Chat</title>
		

		<link type="text/css" rel="stylesheet" href="css/gyftdchyld2.css" />
		<link type="text/css" rel="stylesheet" href="css/nav.css" />
	
	<center>
             
		<font size = 3 ><h2><fieldset><legend>CHAT</legend>
		<a href="quickcab_request_reciever.php"><font color ="green" size=1>reciever</font></a>
		                   <div id="chat"></fieldset>
								  </div></font>
	
		<script type="text/javascript" src="scripts/js/auto_request_handle.js"></script>
		<script type="text/javascript" src="scripts/js/auto_chat.js"></script>
';
		

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{ // Handle the form.

// Initialize an array for errors.
$errors = array( ); 

             
			 
			   if (empty($_POST['to'])) 
                   {
					 $errors[ ] = 'Please enter your name!';
                        }
									  
									     if (empty($_POST['message'])) 
                                             {
							                  $errors[ ] = 'Please enter message!';
                                               }
										   
										   
									       
										   
										      

if (( !empty($_POST['to']))
	 && (!empty($_POST['message'])))
	
   { // Need some thing to write.
	
require (MYSQL);

		// Validate the form data:
	$problem = FALSE;
	
              {	   
		                     $to = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['to']))), $dbc);
		                 $from = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['from']))), $dbc);
		             $message = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['message']))), $dbc);
					 
					 if (isset( $_SESSION['first_name']))
					 {
					 $first_name = $_SESSION['first_name'];
					 }
					 
					 if (isset( $_SESSION['last_name']))
					 {
					 $last_name = $_SESSION['last_name'];
					 }
	
	if (!$problem)
	   
	   {
	   
		//Define the query:
		//Define the query:
		$query = "INSERT INTO private_messages (entry_id, to_id, from_id, first_name, last_name, message, time_sent)
		VALUES (0, '$to', '$from', '$first_name', '$last_name', '$message' ,NOW( ))";
		
		
		          // Execute the query:
		          if (@mysql_query($query, $dbc)) 
		          {
				   echo "SENT TO:<font color = 'blue' size=1> $to </font><br />MESSAGE: $message";
			 }
		    else 
		    {
			$errors[ ] = 'MESSAGE NOT SENT:<br />';
		    }
	
	   } // No problem!

	  mysql_close($dbc); // Close the connection.
	
   }		// Print a message:
			

		
	
} if (isset($errors) && is_array($errors)) 
{
	
	foreach ($errors as $error) 
    {echo '<font size =2>';
		echo "<p class=\"error\">$error</p>";
    }
	echo '</font>';
	
}// End of submitted IF.

// Leave PHP and display the form:
						
	   
}
	   	  
	
	
		
		
		
	
	echo"	                
					      <!-- form-->	
		<form action='chat_app.php' method='post'  id= 'chat1'>
		
		
<textarea  id='chat_tex' name='message' rows=4 cols=61 required ></textarea>
	<br><select name='to' id = 'option' required /> 
	<option ></option>
	<option value='admin'>ADMIN</option>
	<p><option  value='Miss. Reid (8764060721)'>  Reneae</option>
	<option value='Mr. Reid (8765829083)'>  Craig</option> 
	<option value='Carol'>  Carol</option> 
	<option value='Reid'> Reid</p></select><input type='submit' name='submit' value='SEND' /></form>
	
	
	
	
	
	<p>  USER ID: ";if (isset($_SESSION['UZR-ID']))
	{ 
	echo "<font color='blue' size=2 > {$_SESSION['UZR-ID']}</font>";
	}
echo "	</p>
	<br /><p><font color ='gold'><i> property of anblascar</i></font></p>";
	


	
	                 
		 include('templates/footer.html');exit( ); // Need the footer.
?>