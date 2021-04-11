<?php

#                                             ---------------____________-----------------------
                                             ////////////////___________/||||||||||||||||||||||||
                                             #    /////   **     cancel shedule     **    \\\\  ||
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
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
$url ='shedule'; // Define the URL.
	            header("Location: $url");
}




if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

$u = (SHA1($_POST['user']));

if ($u != $_COOKIE['a'] ){
setcookie ('no', 'nok', time( )+360, '/application_files/shedule', '', 0, TRUE);
$url ='shedule.php'; // Define the URL.
	            header("Location: $url");
}	

if ( isset($_COOKIE['name'])
    && (isset($_COOKIE['contact']))
      && (isset($_COOKIE['location']))
	      && (isset($_COOKIE['date']))
	       && (isset($_COOKIE['time']))
		   && (isset($_COOKIE['a']))
		   && ($u === ($_COOKIE['a'] ))
		   )
	
   { // Need some thing to write.
	
require('../users/mysqli_connect.php');
	
		// Validate the form data:
	$problem = FALSE;

              {	   
		                    
		                 $name = mysql_real_escape_string(trim(htmlentities(strip_tags($_COOKIE['name']))), $dbc);
		             $contact = mysql_real_escape_string(trim(htmlentities(strip_tags($_COOKIE['contact']))), $dbc);
		         $location = mysql_real_escape_string(trim(htmlentities(strip_tags($_COOKIE['location']))), $dbc);
	     $time = mysql_real_escape_string(trim(htmlentities(strip_tags($_COOKIE['time']))), $dbc);
	  $date = mysql_real_escape_string(trim(htmlentities(strip_tags($_COOKIE['date']))), $dbc);
		
		                                          
	

	          } 
	 

       {

		//Define the query:
		$query = "DELETE FROM shedules WHERE (contact = '$contact' AND name = '$name' AND location = '$location' AND date = '$date' AND time = ('$time'))"; 
		
		// Execute the query:
		if (@mysql_query($query, $dbc)) 
		{
			echo"<font color = 'blue' size = 4>Request has been recieved";
			 //include ('templates/request_alert.html');
			$_POST = array(); //empty the form
			setcookie ('name', '', time( )-36000000, '/application_files/cancel', '', 0, 0);
			setcookie ('contact', '', time( )-36000000, '/application_files/cancel', '', 0, 0);
			setcookie ('location', '', time( )-36000000, '/application_files/cancel', '', 0, 0);
			setcookie ('time', '', time( )-36000000, '/application_files/cancel', '', 0, 0);
			setcookie ('date', '', time( )-36000000, '/application_files/cancel', '', 0, 0);
			setcookie ('shedule', '', time( )-36000000, '/application_files/shedule', '', 0, 0);
			setcookie ('a', '', time( )-36000000, '/application_files/cancel', '', 0, 0);
			setcookie ('yes', 'ok', time( )+360, '/application_files/shedule', '', 0, TRUE);
			
				$url ='shedule'; // Define the URL.
	            header("Location: $url");
		} 
		     else 
		       {
			   $errors[ ] = ' Sorry! Sir/Madam $name,<br /> your request cannot be process at the moment!. <br /> Please contact us to cancel, or wait until sheduled date expires<br /> thank you.';
			//print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		       
			   }
	
	} // No problem!

	mysql_close($dbc); // Close the connection.
	
}		 
                     


                                                    
}												   
	
 if (isset($errors) && is_array($errors)) 
{
	
	foreach ($errors as $error) 
    {
	echo '<font size =3>';
		echo "<p class=\"error\">$error</p>";
    }
	echo '</font>';
	
}// End of submitted IF.

// Leave PHP and display the form:
$url ='shedule'; // Define the URL.
	            header("Location: $url");
?>