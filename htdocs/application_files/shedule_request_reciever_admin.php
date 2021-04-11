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
		   && (isset($_SESSION['admin']))
//		  &&  (($_SESSION['agent']) === SHA1($_SERVER ['HTTP_USER_AGENT']) ) // citreo browser not supported as yet 
           )
{
   {
   //set login through session
    $_POST['username'] = $_SESSION['UZR-ID'];
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
	echo "<p><a href='loggout' id = 'logout'><font color =\"red\">Logout </a></p></font>
	<img src='drivers/$file.png' id='login_image'width='100em'/>
	<p><div id ='login_name'><center><font size=1>Loggedin as:  {$_SESSION['first_name']} {$_SESSION['last_name']}</font></center></div></p>";		
     }
echo "<div id='leave'><p><a href='login'><font color =\"green\">LEAVE</a></p></div><a href='#' id='chat_icon'>CHAT</a>";	

#                                             ---------------____________-----------------------
                                             ////////////////___________/||||||||||||||||||||||||
                                             #    /////   **     quickcab admin     **    \\\\  ||
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


  
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Page Title -->
		<title>Shedule Admin</title>
		
		<!-- CSS Stylesheets -->
		<link type="text/css" rel="stylesheet" href="css/gyftdchyld2.css" />
		<script type="text/javascript" src="scripts/js/auto_request_handle.js"></script>
		<script type="text/javascript" src="scripts/js/auto_request_shedule.js"></script>
	</head>
	<body>
		
	<center>
                            <!-- Messages -->
		<font size = 3 ><h2><fieldset><legend>SHEDULE-ADMIN</legend>
<a href='quickcab_request_reciever_admin'><font color ="green" size=1>quickcab</font></a>		
		 <div id="messages"></fieldset>
								  </div></font>
						    <!-- Messages -->
	
		<!-- Javascript -->
		
		

	
	
	
<?php	
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
		 
		 
		 if  (empty($_POST['username']))
          { 
           $errors[ ] = 'Please enter your info!';
           }
			  
		   
		       if  (empty($_POST['uzr_pass']))
               { 
                 $errors[ ] = 'Please enter your pass!';
                }
				 
				
				
		 
if ( 
    !empty($_POST['request_id'])
	&& (!empty($_POST['uzr_pass']))
	 && (is_numeric($_POST['request_id']))
	 // && (trim($_POST['username'] === 'Mr. Reid (5829083)') AND (trim($_POST['uzr_pass'] === '94da77b67182807eeb06794dacec3a66e1e800a5')))
	   )
	
   { // Need some thing to write.
	require (MYSQL);

	
		// Validate the form data:
	$problem = FALSE;

                          {	   
		                     $request_id = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['request_id']))), $dbc);
							 $username = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['username']))), $dbc);
		               
	                                 }
									 
if (!$problem)							 
       {
       //Define the query:
	   

	   	   $query = "DELETE  FROM `shedules` WHERE `entry_id` = $request_id";
		
		
		
		// Execute the query:
		if (@mysql_query($query, $dbc)) 
		
		
		{         //redirect to remove page trace for logedout bug
		//	 		 $url = BASE_URL . 'application_files/shedule_request_reciever_admin.php'; // Define the URL.
	//ob_end_clean(); // Delete the buffer.
//	header("Location: $url");
		    }
		  
		  else 
         //if someone is already logged in, execute an alert and print a message 
           {
			echo "<h3>Shedule has been:<font color=\"red\" size=\"2\" > DELETED!!!</font></h3>";
			// Print a message:
			// include ('templates/request_alert.html');
		}
	
	} // No problem!

	mysql_close($dbc); // Close the connection.
	
}		 
		 
		 
           else 
            { 
              $errors[ ] = 'You Are trying to use quickcab service with invalid info!';
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
		 

?>		
	<br>		
		
	
		                 
					      <!-- form-->	
		<form action="shedule_request_reciever_admin.php" method="post">
		
		
	<p> <input type="number" name="request_id" size="5" required />  REQUEST ID </p>
	
	<p> <font color ="gold"><i> property of anblascar</i></p>
	

	<p><input type="submit" name="submit" value="REMOVE" /></p>	
	
	                      <!--end of form-->						  
<div id = "my_time"><font color = "black" size = 2><script language="JavaScript">

/*
Drop Down World Clock- By JavaScript Kit (http://www.javascriptkit.com)
Portions of code by Kurt @ http://www.btinternet.com/~kurt.grigg/javascript
This credit notice must stay intact
*/

if (document.all||document.getElementById)
document.write('<span id="worldclock" style="font:bold 16px Arial;"></span><br />')

zone=0;
isitlocal=true;
ampm='';

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

var finaltime=hr2+':'+((mins < 10)?"0"+mins:mins)+':'+((secs < 10)?"0"+secs:secs)+' '+statusampm;

if (document.all)
worldclock.innerHTML=finaltime
else if (document.getElementById)
document.getElementById("worldclock").innerHTML=finaltime
else if (document.layers){
document.worldclockns.document.worldclockns2.document.write(finaltime)
document.worldclockns.document.worldclockns2.document.close()
}


setTimeout('WorldClock()',1000);
}

window.onload=WorldClock
//-->
</script>
<?php 
date_default_timezone_set('Jamaica');
 echo date('l F j');
 ?>
 </font></div>
		
	</body>
	<?php include('templates/footer.html'); // Need the footer.
exit( );
?>
</html>