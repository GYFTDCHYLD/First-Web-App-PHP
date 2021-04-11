<?php 
// Turn on output buffering:
 ob_start();
#                                             ---------------____________----------------------/|
                                             ///////////////|___________/|||||||||||||||||||||||||
                                             #    /////   **       register         **    \\\\  |||         [|PREZZZI]>
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
                                           



// Set the page title and include the header file:
define('TITLE', 'Register');
include('templates/register_header.html');
require('includes/config.inc.php');

// Print introductory text:

	
// Add the cascade style sheet (CSS):
print '<style type="text/css" media="screen">
	.error { color: red; }
</style>'; //register.php
/* This script registers a user by storing their information in a text file and creating a directory for them. */



if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{ // Handle the form.
    $okay= TRUE;
	     
               //check if email is valid
               if ((substr_count($_POST['email'],'@yahoo.com') !== 1)
                  && (substr_count($_POST['email'],'@gmail.com') !== 1)
                    && (substr_count($_POST['email'],'@rocketmail.com') !== 1)
                     && (substr_count($_POST['email'],'@ymail.com') !== 1)
                       && (substr_count($_POST['email'],'@hotmail.com') !== 1) )
	              {
                     $okay = FALSE;
                     print '<font color ="red" size =2><p class="error">Please enter a valid email address!</p>';
                  }
	  
	                      //check if contact number is valid
                          if ((strlen($_POST['contact']) !== 10)) 
                             {
							 $okay = FALSE;
                              print '<p class="error">Please enter a valid 10 digit contact number!</p>';
                             }
							 
							      if (substr_count($_POST['contact'],'+') !== 0) 
					                 {
							         $okay = FALSE;
					                 print'<p class="error">"+" is not accepted in contact!</p>';
					                 }
									 
									    if (empty($_POST['first_name'])) 
                                           {
							                $okay = FALSE;
                                            print '<p class="error">Please enter your first name!</p>';
                                           }
												
												if (empty($_POST['last_name'])) 
                                                   {
							                        $okay = FALSE;
                                                    print '<p class="error">Please enter your last name!</p>';
                                                   }
												   
												      if (empty($_POST['password'])) 
                                                         {
							                             $okay = FALSE;
                                                         print '<p class="error">Please enter your password!</p>';
                                                         }
														     // check if both passwords match
														     if ($_POST['password2'] !== ($_POST['password'])) 
                                                                {
							                                    $okay = FALSE;
                                                                print '<p class="error">Your confirmation password does\'t match your original password!</p>';
                                                                }
																      //check if password characters is less than 8
																     if (strlen($_POST['password']) < 8)
																        {
							                                            $okay = FALSE;
                                                                        print '<p class="error">password too short! must be atleast 8 characters</p>';
                                                                        }
																
																
																            if (empty($_POST['terms'])) 
                                                                               {
							                                                   $okay = FALSE;
                                                                                print '<p class="error">You have to agree to the terms in order to sign up!</p></font>';
                                                                               }
									 
									 
									 
									 
												   
												       

if ( !empty($_POST['first_name'])
    && (!empty($_POST['last_name']))
      && (!empty($_POST['contact']))
	    && ((strlen($_POST['contact']) === 10))
	      && (is_numeric($_POST['contact']))
	        && (substr_count($_POST['contact'],'+') === 0)
	          && (!empty($_POST['email']))
			    && (strlen($_POST['password']) > 7)
	              && (!empty($_POST['password']))
	                && (!empty($_POST['password2']))
                      && ($_POST['password'] === ($_POST['password2']))
					    && (!empty($_POST['car_id']))
				          && (!empty($_POST['terms'])))
    
  {$okay = TRUE;
	require (MYSQL);
	
              {	   // Get the values from the $_POST array:
			          $title = mysql_real_escape_string(trim(strip_tags($_POST['title'])), $dbc);
		            $first_name = mysql_real_escape_string(trim(strip_tags($_POST['first_name'])), $dbc);
		        $last_name = mysql_real_escape_string(trim(strip_tags($_POST['last_name'])), $dbc);
		    $contact = mysql_real_escape_string(trim(strip_tags($_POST['contact'])), $dbc);
		$email = mysql_real_escape_string(trim(strip_tags($_POST['email'])), $dbc);
	  $password = mysql_real_escape_string(trim(strip_tags (SHA1($_POST['password']))), $dbc);
	  $car_id = mysql_real_escape_string(trim(strip_tags($_POST['car_id'])), $dbc);
	
		
	                                                    // Create a full name and a username variable:
														
                                                   $name = $first_name . ' ' . $last_name;
												   $uzer_name =   $title  . ' ' . $last_name . ' ' ."($contact)";
												   
												   	if (isset($_FILES['upload'])) {
		
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
		
			// Move the file over.
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "drivers/$uzer_name.png")) {
				echo '<p><em>The file has been uploaded!</em></p>';
			} // End of move... IF.
			
		} else { // Invalid type.
			echo '<p class="error">Please upload a JPEG or PNG image.</p>';
		}

	} // End of isset($_FILES['upload']) IF.
	
	// Check for an error:
	if ($_FILES['upload']['error'] > 0) {
		echo '<p class="error">The file could not be uploaded because: <strong>';
	
		// Print a message based upon the error.
		switch ($_FILES['upload']['error']) {
			case 1:
				print 'The file exceeds the upload_max_filesize setting in php.ini.';
				break;
			case 2:
				print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
				break;
			case 3:
				print 'The file was only partially uploaded.';
				break;
			case 4:
				print 'No file was uploaded.';
				break;
			case 6:
				print 'No temporary folder was available.';
				break;
			case 7:
				print 'Unable to write to the disk.';
				break;
			case 8:
				print 'File upload stopped.';
				break;
			default:
				print 'A system error occurred.';
				break;
		} // End of switch.
		
		print '</strong></p>';
	
	} // End of error IF.
	
	// Delete the file if it still exists:
	if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name']) ) {
		unlink ($_FILES['upload']['tmp_name']);
	}

	          }

 
	{

		//Define the query:
		$query = "INSERT INTO users (user_id, title, first_name, last_name, email, password, uzr_name, car_id, date_entered)
		VALUES ('$contact', '$title', '$first_name', '$last_name', '$email', '$password', '$uzer_name', '$car_id', NOW())"; //*/
		
		// Execute the query:
		if (@mysql_query($query, $dbc)) {
			print "<h3><div>Thank you:<font color=\"blue\" size=\"3\" > $name </font><br />for registering with<font color=\"green\" size=\"3\" >  ANBLASCAR TAXI & TOURS</font></div></h3>";
		    include ('templates/registration_alert.html');
		} else {
		echo "<font color =\"red\" size =\"2\"> Sorry: $name<br /> An account already exist with the given  CONTACT NUMBER or EMAIL ADDERESS!";
		
		//	print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
	
	} // No problem!

	mysql_close($dbc); // Close the connection.
	
}  // Open the file.
			
}			
			

	   
 // End of submitted IF.
 // Display the form.

// Leave PHP and display the form:

 include('templates/footer.html'); // Need the footer. 
 ?>
</html>