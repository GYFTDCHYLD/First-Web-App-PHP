<?php
// Add the cascade style sheet (CSS):
print '<style type="text/css" media="screen">
	.error { color: red; }
</style>';
// start session to read the variables from the set session
session_name('QUICK_CAB_ADMIN');
session_start();
require('includes/config.inc.php');
 // Check for a valid login info, through POST:
 if ( 
	 (isset($_SESSION['first_name']))
      && (isset($_SESSION['last_name']))
        &&(isset($_SESSION['UZR-ID']))
         && (isset($_SESSION['UZR-PS']))
	//	 &&  (($_SESSION['agent']) === SHA1($_SERVER ['HTTP_USER_AGENT']) ) // citreo browser not supported as yet 
 
    )
{
  
 }
 else { // No valid ID, kill the script.
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
	  else 
	  {
	   $_POST['from'] = 'dummy';
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
#									 [[_______________]]	?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Page Title -->
		<title>Chat</title>
		
		<!-- CSS Stylesheets -->
		<link type="text/css" rel="stylesheet" href="css/gyftdchyld2.css" />
		<link type="text/css" rel="stylesheet" href="css/nav.css" />
	</head>
	<body>
	
		
	<center>
                            <!-- Messages -->
		<font size = 3 ><h2><fieldset><legend>CHAT</legend>
		<a href='quickcab_request_reciever_admin.php'><font color ="green" size=1>quick_cab</font></a>
		<a href='shedule_request_reciever_admin.php'><font color ="green" size=1>shedule</font></a>
		                   <div id="chat"></fieldset>
								  </div></font>
						    <!-- Messages -->
	
		<!-- Javascript -->
		<script type="text/javascript" src="scripts/js/auto_request_handle.js"></script>
		<script type="text/javascript" src="scripts/js/auto_chat.js"></script>

		
<?php

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
					 $admin_message = "\{$message\}";
					 
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
		VALUES (0, '$to', '$from', '$first_name', '$last_name', '$admin_message' ,NOW( ))";
		
		
		          // Execute the query:
		          if (@mysql_query($query, $dbc)) 
		          {
			 //     setcookie ('first_name', $data ['first_name'], time( )+3600, '/', '', 0, 0);
				  setcookie ('to', $_POST['to'], time( )+3600, '/chat_app_admin.php', '', 0, TRUE);
                  
				  
				  
                  echo "SENT TO:<font color = 'blue' size=1> $to</font><br />MESSAGE: $message";
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
	   	  
	
	
?>		
		
		
	
		                
					      <!-- form-->	
		<form action="cha_tapp_admin.php" method="post"  id= "chat1">
<textarea  id='chat_tex' name='message' rows=4 cols=61 required ></textarea>
		<br><select name="to" id = "option" required /> 
	<option ></option>
	<p><option  value='Miss. Reid (8764033664)'>  Reneae</option>
	<option value='Miss. Richards (8762528405)'>  Sanique</option>
	<option value='Mr. Reid (8765829083)'>  Craig</option> 
	<option value='Carol'>  Carol</option> 
	<option value='Reid'> Reid</p></select><input type='submit' name='submit' value='SEND' /></form>
	
	
  
	
	<p>  USER ID: <?php if (isset($_SESSION['UZR-ID'])){ echo "<font color=\"blue\" size=\"2\" > {$_SESSION['UZR-ID']}</font>";}?></p>
	<br /><p><font color ="gold"><i> property of anblascar</i></font></p>
	


	
	                      <!--end of form-->
		<?php include('templates/footer.html');exit( ); // Need the footer.
?>
</html>