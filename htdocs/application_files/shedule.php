<?php 
// Turn on output buffering:
 ob_start();
  define('TITLE', 'shedule');
include('templates/shedule_header.html');
 if  (isset($_COOKIE['shedule'])){
echo"<center><img src='images/pending.png' id='pending' /></center>
<div id='shedule_pend'><a>{$_COOKIE['shedule']} </a>
   <form action='cancel' method='post' id='cancel_shdle'>
      <input type='submit' name='submit' value='cancel' id='submit' />
      <input type='password' placeholder='Key' size=4 name='user' title='ENTER PASSWORD TO CANCEL' required />
   </form>
<img src='images/lock.gif' id='lock' />
</div>
";
}

#                                             ---------------____________-----------------------
                                             ////////////////___________/||||||||||||||||||||||||
                                             #    /////   **        schedule         **    \\\\  ||
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
										
										
 //sheduler.php created by gyftdchyld (this page handles the shedules form that i placed in shedules_header)

/* This script displays and handles an HTML form. This script takes text input and stores it in a text file. */


require('includes/config.inc.php');
// Add the cascade style sheet (CSS):
print '<style type="text/css" media="screen">
	.error { color: red; }
</style>';







// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
// Initialize an array for errors.
$errors = array( );

		  

                     if (empty($_POST['name']) OR (substr_count($_POST['name'], ' ') > 0)) 
                         {
							          $ename= '<div id ="errr"><center>Please enter a valid name!</center></div>';
							 setcookie ('ename', $ename, time( )+360, '/application_files/shedule', '', 0, TRUE);
                           }
												  
							 else  if (is_numeric($_POST['name'])) 
                               {
							          $ename = '<div id ="errr"><center>Please enter a valid name!</center></div>';
									  setcookie ('ename', $ename, time( )+360, '/application_files/shedule', '', 0, TRUE);
                             }
								 
														  
                           //check if contact number is valid
                           if ((strlen($_POST['contact']) !== 10)) 
                             {
							  $econtact = '<div id ="errr"><center>Please enter a valid 10 digit contact number!</center></div>';
							  setcookie ('econtact', $econtact, time( )+360, '/application_files/shedule', '', 0, TRUE);
                               }
							 
							     else if (substr_count($_POST['contact'],'+') != 0) 
					                 {
							          $econtact = '<div id ="errr"><center>Please enter a valid 10 digit contact number!</center></div>';
									  setcookie ('econtact', $econtact, time( )+360, '/application_files/shedule', '', 0, TRUE);
					                    }
									 
									 
									  if(empty($_POST['location']))
									     {
							                     $elocation= '<div id ="errr"><center>Please enter your location!</center></div>';
												 setcookie ('elocation', $elocation, time( )+360, '/application_files/shedule', '', 0, TRUE);
                                           }

																		
							          //check if form is filled out appropriately
							           if (empty($_POST['time'])) 							   
                                          {
							               $etime = '<div id ="errr"><center>Please select the time!</center></div>';
										   setcookie ('etime', $etime, time( )+360, '/application_files/shedule', '', 0, TRUE);
                                             }
								   
								               if(empty($_POST['date']))
									             {
							                      $edate = '<div id ="errr"><center>Please select the date!</center></div>';
												  setcookie ('edate', $edate, time( )+360, '/application_files/shedule', '', 0, TRUE);
                                                    }
													
	if ( empty($_POST['name'])
	OR (is_numeric($_POST['name']))
    OR (empty($_POST['contact']))
	 OR (!is_numeric($_POST['contact']))
	  OR (strlen($_POST['contact']) != 10)
	   OR (substr_count($_POST['contact'],'+') != 0)
        OR (empty($_POST['location']))
	   //&& (!empty($_POST['dropoff']))
	      OR (empty($_POST['date']))
	       OR (empty($_POST['time']))
		    OR (substr_count($_POST['name'], ' ') != 0)){
			$url ='shedule';
			header("Location: $url");
			}
			

if ( !empty($_POST['name'])
 && (!is_numeric($_POST['name']))
    && (!empty($_POST['contact']))
	 && (is_numeric($_POST['contact']))
	  && (strlen($_POST['contact']) == 10)
	   && (substr_count($_POST['contact'],'+') == 0)
        && (!empty($_POST['location']))
	   //&& (!empty($_POST['dropoff']))
	      && (!empty($_POST['date']))
	       && (!empty($_POST['time']))
		    && (substr_count($_POST['name'], ' ') == 0))
	
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
	     $time = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['time']))), $dbc);
	  $date = mysql_real_escape_string(trim(htmlentities(strip_tags($_POST['date']))), $dbc);
	   $user = mysql_real_escape_string(trim(htmlentities(strip_tags(SHA1($_POST['user'])))), $dbc);
		
		                                           // Create a full name variable:
                                                   $fullname = $title . ' ' . $name;
	

	          } 
	 

       {

		//Define the query:
		$query = "INSERT INTO shedules (entry_id, title, name, contact, location, destination, time, date, date_entered)
		VALUES (0, '$title', '$name', '$contact', '$location', '$destination', '$time', '$date', NOW())"; //*/
		
		// Execute the query:
		if (@mysql_query($query, $dbc)) 
		{
		if (!empty($_POST['destination'])){
		
		 $she="<div id='shdle'><font> Hello!:<font color=\"blue\"> $fullname </font>,
			<br/ >You have shedule a taxi to pick you up at: <a>$location</a><br />
			On:<a> $date, $time.</a><br />and take you to <a>$destination</a></font></div>";
			}
			else{
			$she="<div id='shdle'><font> Hello!:<font color=\"blue\"> $fullname </font>,
			<br/ >You have shedule a taxi to pick you up at:<br /> <a>$location</a><br />
			On:<a> $date, $time</a>.</font></div>";
			}
			

			// Print a message:
			$shed="$title $name <br>";
			
			setcookie ('shedule', $shed, time( )+36000000, '/application_files/shedule', '', 0, TRUE);
			setcookie ('name', $name, time( )+36000000, '/application_files/cancel', '', 0, TRUE);
			setcookie ('contact', $contact, time( )+36000000, '/application_files/cancel', '', 0, TRUE);
			setcookie ('location', $location, time( )+36000000, '/application_files/cancel', '', 0, TRUE);
			setcookie ('time', $time, time( )+36000000, '/application_files/cancel', '', 0, TRUE);
			setcookie ('date', $date, time( )+36000000, '/application_files/cancel', '', 0, TRUE);
			setcookie ('a', $user, time( )+36000000, '/application_files/cancel', '', 0, TRUE);
			setcookie ('yshed', $she, time( )+360, '/application_files/shedule', '', 0, TRUE);
			
			$url ='shedule';
			header("Location: $url");
			$_POST = array(); //empty the form
		} 
		     else 
		       {
			   $url ='shedule'; // Define the URL.
			    $nshed = "<div id='Sorry'>Sorry! $title $name,<br /><font color='red'> It seems as if you currently have a schedule pending. <br /> Please cancel, or Contact us to cancel.</font><br /> thank you.!</div>";
			     setcookie ('nshed', $nshed, time( )+360, '/application_files/shedule', '', 0, TRUE);
				 //print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		       header("Location: $url");
			   }
	
	} // No problem!

	mysql_close($dbc); // Close the connection.
	
}		 
                     

                                                    
												   
	
}

if (isset($errors) && is_array($errors)) 
{
	
	foreach ($errors as $error) 
    {echo '<font size =2>';
		echo "<p class=\"error\">$error</p>";
    }
	echo '</font>';
	
} // End of submitted IF.

// Leave PHP and display the form:


if ((!isset($_COOKIE['no'])) && (!isset($_COOKIE['yes'])) && (!isset($_COOKIE['nshed'])) && (!isset($_COOKIE['yshed']))
 && (!isset($_COOKIE['ename']))  && (!isset($_COOKIE['econtact']))  && (!isset($_COOKIE['elocation']))  && (!isset($_COOKIE['etime']))
  && (!isset($_COOKIE['edate']))){
echo"<img src='images/infobck.png' id='infobck'><div id='information'><center><strong><font color ='blue'>SHEDULE</strong></font><br>
<font >Scheduling give u the advantage of making an appointment
 for taxi without the hassle of making calls at the very minute of departure,
 
 You also have the option of cancelling at any given time
 with your 'password/key' <br>in-which as been set upon submission of the form.
</center>
</font></div>
";
}



if (isset($_COOKIE['no'])){
 echo "<div id='Sorry2'><strong><font color ='red'><center>INCORRECT KEY</strong>!</center></font></div>
<br><br><br><br><br><br><br><br><br><br><br><br>";
 setcookie ('no', '', time( )-360, '/application_files/shedule', '', 0, 0);
}

if (isset($_COOKIE['yes'])){
echo "<div id='Sorry2'><strong><font color ='green'><center>SHEDULE HAS BEEN CANCELED</center></strong></font></div>
<br><br><br><br><br><br><br><br><br><br><br><br>";
 setcookie ('yes', '', time( )-360, '/application_files/shedule', '', 0, 0);
}

if (isset($_COOKIE['nshed'])){
echo "{$_COOKIE['nshed']}<br><br><br><br><br><br>";
 setcookie ('nshed', '', time( )-360, '/application_files/shedule', '', 0, 0);
}

if (isset($_COOKIE['yshed'])){
echo "{$_COOKIE['yshed']}<br><br><br><br>";
 setcookie ('yshed', '', time( )-360, '/application_files/shedule', '', 0, 0);
}

if (isset($_COOKIE['ename'])){
 echo "{$_COOKIE['ename']}";
 setcookie ('ename', '', time( )-360, '/application_files/shedule', '', 0, 0);
}

if (isset($_COOKIE['econtact'])){
 echo "{$_COOKIE['econtact']}";
 setcookie ('econtact', '', time( )-360, '/application_files/shedule', '', 0, 0);
}

if (isset($_COOKIE['elocation'])){
 echo "{$_COOKIE['elocation']}";
 setcookie ('elocation', '', time( )-360, '/application_files/shedule', '', 0, 0);
}

if (isset($_COOKIE['etime'])){
 echo "{$_COOKIE['etime']}";
 setcookie ('etime', '', time( )-360, '/application_files/shedule', '', 0, 0);
}

if (isset($_COOKIE['edate'])){
 echo "{$_COOKIE['edate']}";
 setcookie ('edate', '', time( )-360, '/application_files/shedule', '', 0, 0);
}

if ((isset($_COOKIE['econtact']))
&& (!isset($_COOKIE['ename']))
&& (!isset($_COOKIE['elocation']))
&& (!isset($_COOKIE['etime']))
&& (!isset($_COOKIE['edate']))){
echo"<br><br><br><br><br><br><br><br><br><br><br><br>";
}
if ((isset($_COOKIE['ename']))
&& (!isset($_COOKIE['econtact']))
&& (!isset($_COOKIE['elocation']))
&& (!isset($_COOKIE['etime']))
&& (!isset($_COOKIE['edate']))){
echo"<br><br><br><br><br><br><br><br><br><br><br><br>";
}

if ((isset($_COOKIE['edate']))
&& (!isset($_COOKIE['etime']))
&& (!isset($_COOKIE['econtact']))
&& (!isset($_COOKIE['elocation']))
&& (!isset($_COOKIE['ename']))){
echo"<br><br><br><br><br><br><br><br><br><br><br><br>";
}

if ((isset($_COOKIE['etime']))
&& (!isset($_COOKIE['edate']))
&& (!isset($_COOKIE['econtact']))
&& (!isset($_COOKIE['elocation']))
&& (!isset($_COOKIE['ename']))){
echo"<br><br><br><br><br><br><br><br><br><br><br><br>";
}

if ((isset($_COOKIE['etime']))
&& (isset($_COOKIE['edate']))
&& (!isset($_COOKIE['econtact']))
&& (!isset($_COOKIE['elocation']))
&& (!isset($_COOKIE['ename']))){
echo"<br><br><br><br><br><br><br><br>";
}

if ((!isset($_COOKIE['etime']))
&& (!isset($_COOKIE['edate']))
&& (isset($_COOKIE['econtact']))
&& (!isset($_COOKIE['elocation']))
&& (isset($_COOKIE['ename']))){
echo"<br><br><br><br><br><br><br><br>";
}



echo"<div id = 'side_head'><h2><font color='magenta' size =6><strong><img src='images/skru.png' width ='25em' align='left' id='skru'>SCHEDULE<img src='images/skru.png' width ='25em' align='right' id='skru'></strong></h2></div>
<div id = 'side_body'>
<br>
<img src='images/skru.png' width ='30em' align='left' id='skru'>
<img src='images/skru.png' width ='30em' align='right' id='skru'>
<select id= 'tour'><option>>>>KINGSTON TOUR<<<</option>
<option>Round-town tour starts at :</option>
<option></option>
<option  title='give detail'>New Kingston</option>
<option></option>
<option>Trench Town</option>
<option></option>
<option>Collie Smith Drive</option>
<option></option>
<option>Ghost Town</option>
<option></option>
<option>Jones Town</option>
<option></option>
<option>Rema</option>
<option></option>
<option>{Bob Marley} culture yard</option>
<option></option>
<option>Denham Town</option>
<option></option>
<option>Tivoli Garden</option>
<option></option>
<option>Craft Market</option>
<option></option>
<option>Water Front</option>
<option></option>
<option>Digicel Building</option>
<option></option>
<option>Mineral Bath</option>
<option></option>
<option>Port Royal</option>
<option></option>
<option>A {View }of Blue mountain peak</option>
<option></option>
<option>Sabina Park</option>
<option></option>
<option>The Jewish Synagogue</option>
<option></option>
<option>Heroes Circle</option>
<option></option>
<option>Tom Redcom drive</option>
<option></option>
<option>Army Base</option>
<option></option>
<option>Little Theatre</option>
<option></option>
<option>Author Wint  Drive</option>
<option></option>
<option>Edna Manley School</option>
<option></option>
<option>Bustamante Hospital</option>
<option></option>
<option>Indoor Sports Centre </option>
<option></option>
<option>Herbe McKinley Drive</option>
<option></option>
<option>National Arena </option>
<option></option>
<option>{Bob Marley Statue}</option>
<option></option>
<option>A View of Beverly hills {Crown House}</option>
<option></option>
<option>{Famous Athlete} House</option>
<option></option>
<option>{Famous Coach} House</option>
<option></option>
<option>{Famous Singer} House </option>
<option></option>
<option>Inside UWI Campus Puma Track Field-</option>
<option>for {Usain Bolt}</option>
<option></option>
<option>UTEC Training Ground for {Asafa Powel}</option>
<option></option>
<option>Hope Botanical Garden</option>
<option></option>
<option>Liguanea</option>
<option>{Bob Marley Museum}</option>
<option></option>
<option>Kings House</option>
<option></option>
<option>Jamaica House</option>
<option></option>
<option>Louise Benett &-</option>
<option>Roney Williams  Gordon Theatre</option>
<option></option>
<option>Ardenne High School</option>
<option></option>
<option>Devon House</option>
<option></option>
<option>Calara Cemetery</option>
<option></option>
<option>Shopping Mall, State Of the Art Bus Park</option>
<option></option>
<option>Nelson Mandela Park</option>
<option></option>
<option>(Finally) Emancipation Park.</option>
<option></option>
<option>*(Special) Liberty Hall-</option>
<option>Marcus Garvey Museum*</option>
</select>

<select id= 'tour'><option>>>>Around Blue Mountain Tour<<<</option>
<option>starts at:</option>
<option></option>
<option>( Irish Town)</option>
<option></option>
<option>( Strawberry Hill)</option>
<option></option>
<option>( Criton Coffee Estate)</option>
<option></option>
<option>(Mavis Bank Coffee  Factory &-</option>
<option>Blue mountain peak)</option>
</select>

<select id= 'tour'><option>>>><font color='red'>Port Royal TOUR<<<</option>
<option></option>
<option>(18th Century Pirate Town</option>
<option>{Jamaica 2nd Capital})</option>
<option></option>
<option>(Lime-Key {white sand beach})</option>
</select>

<select id= 'tour'><option>>>>Kingston To Montego Bay Tour<<<</option>
<option>On route:</option>
<option>(Nelson Mandela Highway)</option>
<option></option>
<option>(Arawacks museum)</option>
<option></option>
<option>(jose marti high)</option>
<option></option>
<option>(Spanish Town Jamaica Ist Capital)</option>
<option></option>
<option>(Flat Bridge Built in the 17th Century)</option>
<option></option>
<option>(Pum-Pum rock)</option>
<option></option>
<option>(Fern Gully)</option>
<option></option>
<option>__Ochi Rios__</option>
<option></option>
<option>(duns river falls)</option>
<option></option>
<option>(mystic mountain)</option>
<option></option>
<option>(dolphin cove)</option>
<option>( White sand beach with glass bottom boat</option>
<option>snorkelling also available)</option>
<option></option>
<option>( runaway bay)</option>
<option></option>
<option>(discovery bay {Christopher Columbus Park})</option>
<option></option>
<option>(Green Grotto Cave)</option>
<option></option>
<option>(Rose Hall Great House)</option>
<option></option>
<option>__Montego Bay__</option>
<option></option>
<option>(Doctors Cave Beach)</option>
<option></option>
<option>__Negri__</option>
<option></option>
<option>{Finally}(Ritz Cafe )</option>
</select>

<select id= 'tour'><option>>>>ST Cathrine TOUR<<<</option>
<option></option>
<option>(Elshire Beach)</option>
<option></option>
<option>(Two-Sisters Cave)</option>
</select>


<select id= 'tour'><option>>>>ST MARY TOUR<<<</option>
<option></option>
<option>(Fire Fly {Overview of the sea})</option>
<option></option>
<option>(James Bond Beach)</option>
</select>

<select id= 'tour'><option>>>>Portland TOUR<<<</option>
<option></option>
<option>(Summer set falls)</option>
<option></option>
<option>(Reach falls)</option>
<option></option>
<option>(rafting on {Reo Grande})</option>
<option></option>
<option>(Blue Lagoon)</option>
<option></option>
<option>(The famous {Boston Jerk Centre})</option>
<option></option>
<option>(Navy Island)</option>
</select>

<select id= 'tour'><option>>>>ST Elizabeth  TOUR<<<</option>
<option></option>
<option>(Lovers leap)</option>
<option></option>
<option>(Little Ochi)</option>
<option></option>
<option>(YS falls)</option>
<option></option>
<option>(Black river safari)</option>
<option></option>
<option>(Appleton Rum Tour)</option>
<option></option>
<option>(A compound maroon village)</option>
<option></option>
<option>(Treasure beach)</option>
</select>

</font></div>

<div id ='side_foot'>
<img src='images/skru.png' width ='25em' align='left' id='skru'>
<img src='images/skru.png' width ='25em' align='right' id='skru'>
<marquee id='shedule_page' behavior='slide' direction='left' scrollamount='20'><img src='images/tour4.png'/></marquee>
</div>
   

<font size =1>";

include('templates/footer.html');exit( ); // Need the footer.
?>