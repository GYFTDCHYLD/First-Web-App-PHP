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
	 (isset($_SESSION['first_name']))
      && (isset($_SESSION['last_name']))
        &&(isset($_SESSION['UZR-ID']))
         && (isset($_SESSION['UZR-PS']))
	//	 &&  (($_SESSION['agent']) === SHA1($_SERVER ['HTTP_USER_AGENT']) ) // citreo browser not supported as yet 
		  )
	 
{
   {
   //set login through session
    $_POST['driver_info'] = $_SESSION['UZR-ID'];
      $_POST['uzr_pass'] = $_SESSION['UZR-PS'];
       }
	   
      // create a dummy request id for login purpose
      if (empty($_POST['request_id'])) 
         {
           $_POST['request_id'] = 1041534625753689;
            }
  
 }
 else { // No valid ID, kill the script.
 setcookie (session_name(QUICK_CAB_DRIVER), '', time()-3600, '/'); //delete the session
 $url =  'login'; // Define the URL.
			ob_end_clean(); // Delete the buffer.
			header("Location: $url");
			exit(); // Quit the script.
 echo '<center><font color = "red" size = 10 >This page is for administrative use only.</font></center>';
 exit( );
 }
 if ( (isset($_SESSION['first_name']))
      && (isset($_SESSION['last_name']))
	  && (isset($_SESSION['UZR-ID']))){
	  $file=	"{$_SESSION['UZR-ID']}";  //image size = 1X1.1cm
	echo "<p><a href='logout' id = 'logout'><font color =\"red\">Logout </a></p></font>
	<img src='drivers/$file.png' id='login_image'width='100em'/>
	<p><div id ='login_name'><center><font size=1>Loggedin as:  {$_SESSION['first_name']} {$_SESSION['last_name']}</font></center></div></p>";		
     }
echo "<div id='leave'><p><a href='login'><font color =\"green\">LEAVE</a></p></div><a href='cha/t_application' id='chat_icon'>CHAT</a>";	



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
echo '

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta name="HandheldFriendly" content="true" /><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->

		<!-- Page Title -->
		<title>quick cab driver\'s</title>
		<link rel="stylesheet" type="text/css" href="css/slide.css" />
		<script src="js/modernizr.custom.js"></script>
		
		<!-- CSS Stylesheets -->
		<link type="text/css" rel="stylesheet" href="css/gyftdchyld2.css" />
		<link rel="stylesheet" type="text/css" href="css/cab.css" />
		<script src="js/modernizr.custom.js"></script>
				<script type="text/javascript" src="scripts/js/auto_request_handle.js"></script>
		<script type="text/javascript" src="scripts/js/auto_request.js"></script>
	</head>
	<body>
		
	<center>                 <div id="messages2"></div>
                            <!-- Messages -->
		<font size = 3 ><h2><fieldset><legend>QUICK-CAB</legend>
		
    
		                   <div id="messages"></fieldset>
								  </div></font>
						    <!-- Messages -->
	<br />
		<!-- Javascript -->

		
 
	';
	
	

	// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
// Initialize an array for errors.
$errors = array( );


if (!is_numeric ($_POST['request_id']))

   
      { 
      $errors[ ] = 'Please enter a valid REQUEST ID!';
       }
	   
        else if  (empty($_POST['request_id']))
        { 
        $errors[ ] = 'Please enter a REQUESR ID!';
         }
		 
		 
		 if  (empty($_POST['driver_info']))
          { 
           $errors[ ] = 'Please enter your info!';
           }
		   
		      if  (empty($_POST['uzr_pass']))
               { 
                $errors[ ] = 'Please enter your pass!';
                }
				 
				
		 
if ( 
    !empty($_POST['request_id'])
	&& (isset($_POST['uzr_pass']))
	 && (is_numeric($_POST['request_id']))
	 // && (trim($_POST['driver_info'] === 'Mr. Reid (5829083)') AND (trim($_POST['uzr_pass'] === '94da77b67182807eeb06794dacec3a66e1e800a5')))
	   )
	
   { // Need some thing to write.
	
require (MYSQL);
	
	
		// Validate the form data:
	$problem = FALSE;

                          {	   
		                     $request_id = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['request_id']))), $dbc);
		                       $driver_info = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['driver_info']))), $dbc);
							            $pass = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['uzr_pass']))), $dbc);
	                           $_POST['License Plate Number']  = $_SESSION['car_id']; 
							   $license = $_POST['License Plate Number'];
	 
                                     $response = ('Hello!: Am on my way ' . '<br />' .
									                             'My Name and contact number is:<br />' .' '.$driver_info . '<br />' .
												                 'License Plate Number: ' .$license);
	                                 }
									 
if (!$problem)

 
							 
       {
       //Define the query:
	   

	   	  
		
	$query = "UPDATE  `QUICK_CAB_DATABASE`.`quick_cab` SET `message` = '', `driver_response` =  '$response',
`driver_id` =  '$driver_info', `drvr_pass` = '$pass', `driver_time_stamp` = NOW() WHERE `quick_cab`.`driver_id` =('pending') AND  `quick_cab`.`msg_id` = $request_id";	
		
		// Execute the query:
		if (@mysql_query($query, $dbc)) 
		
           { 
		   	true;
                    $query2 = "SELECT contact FROM `quick_cab` WHERE msg_id = $request_id";
			        foreach($query2 as $CONTACT) {
			        echo"<font size =20>$CONTACT</font>";
			        }
		    }
		     else 
		       {
			   $errors[ ] = ' Sorry! Someone already accept.';
			//print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		       
			   }
	
	} // No problem!

	mysql_close($dbc); // Close the connection.
	
}		 
		 
		 
           else 
            { 
             $errors[ ] = 'You Are trying to use quickcab service with invalid info!';
             }		 
		 
		 
}	 
if (isset($errors) && is_array($errors)) 
{
	
	foreach ($errors as $error) 
    {echo '<font size =2>';
		echo "<p class=\"error\">$error</p>";
    }
	echo '</font>';
	
}		 

	
		
echo '<br><br><br>
		
		
	
		                 
					      <!-- form-->	
		<form action="quickcab_request_reciever.php" method="post">
		
		
	<p> <div id = "">REQUEST ID <input type="number" name="request_id" size="5" required />    <input type="submit" name="submit" value="ACCEPT" /></div></p>
	
	
	
				<div id = "my_time"><font color = "black" size = 2><script language="JavaScript">

/*
Drop Down World Clock- By JavaScript Kit (http://www.javascriptkit.com)
Portions of code by Kurt @ http://www.btinternet.com/~kurt.grigg/javascript
This credit notice must stay intact
*/

if (document.all||document.getElementById)
document.write(\'<span id="worldclock" style="font:bold 16px Arial;"></span><br />\')

zone=0;
isitlocal=true;
ampm=\'\';

function updateclock(z){
zone=z.options[z.selectedIndex].value;
isitlocal=(z.options[0].selected)?true:false;
}

function WorldClock(){
now=new Date();
ofst=now.getTimezoneOffset()/60;
secs=now.getSeconds();
sec=-1.57+Math.PI*secs/30;
mins=now.getMinutes();
min=-1.57+Math.PI*mins/30;
hr=(isitlocal)?now.getHours():(now.getHours() + parseInt(ofst)) + parseInt(zone);
hrs=-1.575+Math.PI*hr/6+Math.PI*parseInt(now.getMinutes())/360;
if (hr < 0) hr+=24;
if (hr > 23) hr-=24;
ampm = (hr > 11)?"PM":"AM";
statusampm = ampm.toLowerCase();

hr2 = hr;
if (hr2 == 0) hr2=12;
(hr2 < 13)?hr2:hr2 %= 12;
if (hr2<10) hr2="0"+hr2

var finaltime=hr2+\':\'+((mins < 10)?"0"+mins:mins)+\':\'+((secs < 10)?"0"+secs:secs)+\' \'+statusampm;

if (document.all)
worldclock.innerHTML=finaltime
else if (document.getElementById)
document.getElementById("worldclock").innerHTML=finaltime
else if (document.layers){
document.worldclockns.document.worldclockns2.document.write(finaltime)
document.worldclockns.document.worldclockns2.document.close()
}


setTimeout(\'WorldClock()\',1000);
}

window.onload=WorldClock
//-->
</script>';
 date_default_timezone_set('Jamaica');
 echo date('l F j');?></font></div>