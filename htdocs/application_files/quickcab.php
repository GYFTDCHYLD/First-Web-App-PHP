<?php
// Turn on output buffering:
 ob_start();
 define('TITLE', 'quickcab');
include('templates/quickcab_header.html');


#                                             ---------------____________----------------------/|
                                             ///////////////|___________/|||||||||||||||||||||||||
                                             #    /////   **       quickcab         **    \\\\  |||         [|PREZZZI]>
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



require('includes/config.inc.php');
// Add the cascade style sheet (CSS):
print '<style type="text/css" media="screen">
	.error { color: red; }
</style>';

// Print introductory text:
  


//3. php include contactform-code.php at the end of the page

	
// Identify the file to use:
$file = '../quickcab.txt';
$note= 'audio/phone.ogg';


				
// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{ // Handle the form.

// Initialize an array for errors.
$errors = array(); 

             
			 
			   if (empty($_POST['name'])) 
                   {
					$ename= '<div id ="errr"><center>Please enter a valid name!</center></div>';
							 setcookie ('ename', $ename, time( )+360, '/application_files/quickcab', '', 0, TRUE);
                        }
			           else if (is_numeric($_POST['name'])) 
                           {
				            $ename= '<div id ="errr"><center>Please enter a valid name!</center></div>';
							 setcookie ('ename', $ename, time( )+360, '/application_files/quickcab', '', 0, TRUE);
                              }
                      
                              
							  if ((strlen($_POST['contact']) !== 7)) 
                                  {
								    $econtact = '<div id ="errr"><center>Please enter a valid 7 digit contact number!</center></div>';
							        setcookie ('econtact', $econtact, time( )+360, '/application_files/quickcab', '', 0, TRUE);
                                    }
									else if ((!is_numeric($_POST['contact']))) 
                                  {
								    $econtact = '<div id ="errr"><center>Please enter a valid 7 digit contact number!</center></div>';
							        setcookie ('econtact', $econtact, time( )+360, '/application_files/quickcab', '', 0, TRUE);
                                    }
							 
							                                 
							        if (empty($_POST['location'])) 
                                         {
							               $elocation= '<div id ="errr"><center>Please enter your location!</center></div>';
												 setcookie ('elocation', $elocation, time( )+360, '/application_files/quickcab', '', 0, TRUE);
                                           }
									  
									  
									     if (empty($_POST['response'])) 
                                             {
											  $eresponse= '<div id ="errr"><center>Please select a response!<center></div>';
												 setcookie ('eresponse', $eresponse, time( )+360, '/application_files/quickcab', '', 0, TRUE);
                                               }
											   
											   
											   
if ( empty($_POST['name'])
    OR (empty($_POST['contact']))
	 OR (!is_numeric($_POST['contact']))
	  OR (strlen($_POST['contact']) !== 7)
	   OR (substr_count($_POST['contact'],'+') !== 0)
        OR (empty($_POST['location']))
	   //&& (!empty($_POST['dropoff']))
	      OR (empty($_POST['response']))
	       OR (empty($_POST['time']))
		    OR (substr_count($_POST['name'], ' ') !== 0)){
			$url ='quickcab';
			header("Location: $url");
			}
										   
										   
									       
										   
										      

if (( !empty($_POST['name']))
 &&(!is_numeric($_POST['name']))
   && ((strlen($_POST['contact']) == 7))
	 && (!empty($_POST['contact']))
	   &&(is_numeric($_POST['contact']))
	     && (!empty($_POST['response']))
	       && (substr_count($_POST['contact'],'+') == 0)
	         && (!empty($_POST['location']))
			  )
	
   { // Need some thing to write.
	require (MYSQL);


		// Validate the form data:
	$problem = FALSE;
	
              {	   
		                     $title = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['title']))), $dbc);
		                 $name = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['name']))), $dbc);
		             $contact = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['contact']))), $dbc);
		         $location = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['location']))), $dbc);
	         $destination = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['destination']))), $dbc);
	     $response = mysql_real_escape_string(trim($_POST['response']), $dbc);		
                                       


                                                     // Create a full name variable:
                                                   $fullname = $title . ' ' . $name;
												   
												   $request = trim('I need a: ' . $response . '  cab,' .' '. '<br />' .
												    'From: ' . $location .', ' .'<br />'.
													'To: '. $destination . '. '. '<br />'. 
													'My contact number is: '. $contact );
													
													 $request2 = trim('I need a: ' . $response . '  cab,' .' '. '<br />' .
												    'From: ' . $location .', ' .'<br />'.
													'My contact number is: '. $contact );
													
											
													
													
						if (!empty($_POST['destination']))
						{
						 $message = "<p><center>Thank you:<font color='blue' > $fullname ,</font></center> for using <strong><font color='gold' >QUICK-CAB</font></strong>
			      <br/ >Your request has been received ;<br>for a <font color='red' > <u>$response</u> </font> cab <br />to pick you up at :<u><i>$location</i></u>,
			<br>and take you to : <u><i>$destination</i></u>.";
				   }
				  
				  else{
				 	 $message = "<p><center>Thank you:<font color='blue' > $fullname ,</font></center> for using <strong><font color='gold'>QUICK-CAB</font></strong>
			      <br/ >Your request has been received ;<br>for a <font color='red' > <u>$response</u> </font> cab <br />to pick you up at : <u><i>$location</i></u>";
				  }
	        }

	
	if (!$problem)
	   
	   {date_default_timezone_set('Jamaica');		
											$time_id = date('D M j, g:i a  Y'); 
	   
		//Define the query:
		$query = "INSERT INTO quick_cab (msg_id, sender,contact, message, message_admin, driver_id, time_entered)
		VALUES (0, '$fullname','$contact' , '$request', '$request', 'pending', '$time_id')";
		
		
		          // Execute the query:
		          if (@mysql_query($query, $dbc)) 
		          {
			     
				   session_name('QUICK_CAB_LOBBY');
                   session_start();
				 
				
				   $_SESSION['fullname'] = "$fullname";  
                        $_SESSION['contact'] = "$contact";
           						$_SESSION['location'] = "$location";
                                        $_SESSION['message'] = "$message";
										$_SESSION['request'] = "$request";
										$_SESSION['time_id'] = "$time_id";
										
             setcookie ('lobby', $fullname, time( )+3600, '/application_files/quickcab', '', 0, TRUE);
			if (!empty($_POST['destination']))
						{ 
						setcookie ('my', $request, time( )+3600, '/application_files/quickcab', '', 0, TRUE);
						}
						else
						{
						setcookie ('my', $request2, time( )+3600, '/application_files/quickcab', '', 0, TRUE);
						}
				  // Redirect the user:
						$url = 'quickcab'; // Define the URL.
			
			//	echo "<embed src =\"$note\" hidden=\"true\" autostart=\"true\"></embed>";
		echo'<div id="qcload"><font color="gold" size= 4><center><img src="images/phone.gif" width ="200em"></div>';
			header("refresh: 10; $url");
			exit(); // Quit the script. 
                  
			      $_POST = array(); //empty the form
		          } 
		    else 
		    {
			$errors[ ] = 'technical difficulties';
			//$errors[ ] = 'technical difficulties' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query .';
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

// Leave PHP and display the form:if ((!isset($_COOKIE['no'])) && (!isset($_COOKIE['yes'])) && (!isset($_COOKIE['nshed'])) && (!isset($_COOKIE['yshed']))
if ((!isset($_COOKIE['ename']))  && (!isset($_COOKIE['econtact']))  && (!isset($_COOKIE['elocation']))  && (!isset($_COOKIE['eresponse']))
  && (!isset($_COOKIE['lobby']))&&(!isset($_COOKIE['my']))){

echo    "<img src='images/infobck.png' id='infobck'><div id='information'><center><strong><font color ='blue' >QUICK CAB</strong></font><br><br>
<font>Quick cab give You the advantage and privilege of requesting
 taxi to pick you up at your given location within the response time given.
 You will recieve real-time info on the driver that will be at your service
</center></div>
<div id='Phone_message'>
    <img src='images/quick_cab.png' id='quick_cab'>
    
	<div id='phone_vid'>
	   <video  autoplay loop width = 262>
          <source src='video/ep.mp4'>
          <source src='video/ep.webm'>
       </video>
	</div>
    <div id='phone_vid2'>
       <video  autoplay loop   width = 262 >
          <source src='video/loby.mp4'>
          <source src='video/loby.webm'>
       </video>
	</div>
    <div id='phone_vid3'>
       <video  autoplay loop   width = 262 >
          <source src='video/loby.mp4'>
          <source src='video/loby.webm'>
       </video>
	</div>
</div>
";
}else{
 session_name('QUICK_CAB_LOBBY');
session_start();
echo "<img src='images/infobck.png' id='infobck'><div id='information'>{$_SESSION['message']}</div>
<img src='images/quick_cab2.png' id='quick_cab2'>
<div id='Phone_message'>
<div id='user_mes'><img id='my_image' src='images/me.png'><div id='my_message'><i>{$_COOKIE['my']}</i></div><div id='lobby4' ></div><div id='me_user'><i>ME</i></div></div>
<div id='lobby' ></div>
</div>

";
}


if (isset($_COOKIE['ename'])){
 echo "{$_COOKIE['ename']}";
 setcookie ('ename', '', time( )-360, '/application_files/quickcab', '', 0, 0);
}

if (isset($_COOKIE['econtact'])){
 echo "{$_COOKIE['econtact']}";
 setcookie ('econtact', '', time( )-360, '/application_files/quickcab', '', 0, 0);
}

if (isset($_COOKIE['elocation'])){
 echo "{$_COOKIE['elocation']}";
 setcookie ('elocation', '', time( )-360, '/application_files/quickcab', '', 0, 0);
}

if (isset($_COOKIE['eresponse'])){
 echo "{$_COOKIE['eresponse']}";
 setcookie ('eresponse', '', time( )-360, '/application_files/quickcab', '', 0, 0);
}

 include('templates/footer.html'); // Need the footer.
 exit( );?>