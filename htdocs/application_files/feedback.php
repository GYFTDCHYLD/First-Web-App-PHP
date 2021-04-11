<?php
// Turn on output buffering:
 ob_start();
 define('TITLE', 'feedback');
include('templates/feedback_header.html');
#                                            					     ---------------____________----------------------/|
                                           				            ///////////////|___________/|||||||||||||||||||||||||
                                           					   #    /////   **       feedback         **    \\\\  |||        [|PREZZZI]>
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
 
 
/* This script displays and handles an HTML form. This script takes text input and stores it in a text file. */

require('includes/config.inc.php');
// Add the cascade style sheet (CSS):
print '<style type="text/css" media="screen">
	.error { color: red; }
</style>';

// Print introductory text:

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{ 
// Initialize an array for errors.
$errors = array( );  


                 
				 
			
									    
					 if (empty($_POST['name']) OR(is_numeric($_POST['name']))) 
                     {
					     $ename= '<div id ="errr"><center>Please enter a valid name!</center></div>';
							 setcookie ('ename', $ename, time( )+360, '/application_files/feedback', '', 0, TRUE);
                        }
									
					 
                            
							     
									              if (empty($_POST['response'])) 
                                                     {
							                        $eresponse= '<div id ="errr"><center>Please select a response!</center></div>';
												     setcookie ('eresponse', $eresponse, time( )+360, '/application_files/feedback', '', 0, TRUE);

                                                      }
										 
												        if (empty($_POST['quote'])) 
                                                           {
							                               $equote= '<div id ="errr"><center>Please enter your comment!</center></div>';
												            setcookie ('equote', $equote, time( )+360, '/application_files/feedback', '', 0, TRUE);

                                                          }
														else if ($_POST['quote'] == 'Enter your comment here.')
															 {
							                                  $equote= '<div id ="errr"><center>Please enter your comment!</center></div>';
												            setcookie ('equote', $equote, time( )+360, '/application_files/feedback', '', 0, TRUE);

                                                              }
															
																  
      if (empty($_POST['quote'])
	    OR (empty($_POST['name']))
	     OR (empty($_POST['response']))
		  OR (is_numeric($_POST['name']))){
		  $url ='feedback';
			header("Location: $url");
			}		  


if ( !empty($_POST['quote'])
	&& ($_POST['quote'] != 'Enter your comment here.')
	    && (!empty($_POST['name']))
	     && (!empty($_POST['response']))
		  && (!is_numeric($_POST['name'])))
	
   { // Need some thing to write.
	// Handle the form.
require (MYSQL);
	
		// Validate the form data:
	$problem = FALSE;

	
              {	   
		                     $title = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['title']))), $dbc);
		                 $name = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['name']))), $dbc);
		          
	        
	     $response = mysql_real_escape_string(trim(htmlentities($_POST['response'])), $dbc);
		 
		 $quote = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['quote']))), $dbc);
		
	                                               // Create a full name variable:
                                                   $fullname = $title . ' ' . $name;

	          } 
	
	if (!$problem) {

		//Define the query:
		$query = "INSERT INTO feedback (entry_id, title, name, response, comment, date_entered)
		VALUES (0, '$title', '$name', '$response', '$quote', NOW())"; //*/
		
		// Execute the query:
		if (@mysql_query($query, $dbc)) {
			$fbk= "<div id='feedback_post'><font>Thank you:<font color='blue'> $fullname </font><br> For your feedback.
                  <br />You've seem to find our <FONT COLOR = 'MAGENTA'> WEB-APP</FONT>/<FONT COLOR ='MAGENTA'>SERVICE</FONT> <BR />to be <u><i>$response</i></u>
                  <br /> and you quote: <a> \"$quote\"</a>.</font></div>";
		setcookie ('fbk', $fbk, time( )+360, '/application_files/feedback', '', 0, TRUE);
		$url ='feedback';
			header("Location: $url");
		} else {
		echo"temporarily unavailable!!!!";
			//print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
	
	} // No problem!

	mysql_close($dbc); // Close the connection.
	
} 
} 
//displays the errors
if (isset($errors) && is_array($errors)) 
{
	
	foreach ($errors as $error) 
    {echo '<font size =2>';
		echo "<p class=\"error\">$error</p>";
    }
	echo '</font>';
	
}



if (!isset($_COOKIE['fbk'])  && (!isset($_COOKIE['ename']))  && (!isset($_COOKIE['econtact'])) && (!isset($_COOKIE['eresponse'])) && (!isset($_COOKIE['equote']))){
echo    "<img src='images/infobck.png' id='infobck' >
<div id='advettisment'><center><img src='images/prez1.png'></center></div>
<br>"; 
}

if (isset($_COOKIE['fbk'])){
 echo "{$_COOKIE['fbk']}<br>";
 setcookie ('fbk', '', time( )-360, '/application_files/feedback', '', 0, 0);
}

if (isset($_COOKIE['ename'])){
 echo "{$_COOKIE['ename']}<br><br><br><br><br><br><br><br><br><br><br><br>";
 setcookie ('ename', '', time( )-360, '/application_files/feedback', '', 0, 0);
}

if (isset($_COOKIE['eresponse'])){
 echo "{$_COOKIE['eresponse']}";
 setcookie ('eresponse', '', time( )-360, '/application_files/feedback', '', 0, 0);
}

if (isset($_COOKIE['equote'])){
 echo "{$_COOKIE['equote']}";
 setcookie ('equote', '', time( )-360, '/application_files/feedback', '', 0, 0);
}

echo"<div id = 'side_head'><h2><font color='black' size =6><strong><img src='images/skru.png' width ='25em' align='left' id='skru'>FEEDBACK<img src='images/skru.png' width ='25em' align='right' id='skru'></strong></h2></div>
<div id = 'side_body'>


</font>
</div>
";
?>

<?php include('templates/footer.html'); // Need the footer.
 exit( );?>