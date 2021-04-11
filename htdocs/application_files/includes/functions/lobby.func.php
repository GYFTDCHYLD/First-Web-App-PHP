<?php
require('../../includes/config.inc.php');

session_name('QUICK_CAB_LOBBY');
session_start();

if ((isset($_SESSION['fullname']))
	 &&(isset($_SESSION['contact']))
         && (isset($_SESSION['location']))
		 && (isset($_SESSION['message'])))
{
$_POST['fullname'] = $_SESSION['fullname'];
$_POST['contact'] = $_SESSION['contact'];
$_POST['location'] = $_SESSION['location'];
$_POST['request'] = $_SESSION['request'];
$_POST['time_id'] =$_SESSION['time_id'];
}


	function get_requests() {
	
	
$fullname = $_POST['message'];
$contact = $_POST['contact'];
$location = $_POST['location'];
$request = $_POST['request'];
$time_id = $_POST['time_id'];


	
	
//$query = "SELECT Msg_id, Sender, Message,  DATE_FORMAT(Time_entered, '%a %b %e, %l:%i %p <font color =\"yellow\"> \_____________________________/</font> %Y') AS Date, driver_id FROM quick_cab WHERE driver_id =('pending') ORDER BY `Msg_ID` DESC";
		
		$query = "SELECT driver_id, driver_response, DATE_FORMAT(driver_time_stamp, '<font color =\"yellow\"> ......... </font>%a %b %e, %l:%i %p') AS time FROM `quick_cab` WHERE message_admin ='$request' AND driver_id != 'pending' AND time_entered = '$time_id'";
		
		$run = mysql_query($query);
		
		$requests = array();
		
		while($message = mysql_fetch_assoc($run)) {
			$requests[] = array( 'time' => $message ['time'],
			                      
			                     'driver_response' => $message ['driver_response'],
								 'driver_id' => $message ['driver_id']);
		}
		
		return $requests;
		
	}
	
	function accept_request($Driver_info, $message) {
		
		if(!empty($Driver_info) && !empty($message)) {
			
			$Driver_info 	= mysql_real_escape_string($Driver_info);
			$message 	= mysql_real_escape_string($message);
			
			//define your query
			$query = "INSERT INTO quick_cab (driver_pesponse, driver_id)
			VALUES ('$driver_response', '$driver_id')";
			
			if($run = mysql_query($query)) {
				return true;
			} else {
				return false;
			}
			
		} else {
			return false;
		}
	}

?>
