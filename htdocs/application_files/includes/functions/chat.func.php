<?php
require('../../includes/config.inc.php');

session_name('QUICK_CAB_DRIVER');
session_start();

if	(isset($_SESSION['UZR-ID']))
{
$_POST['from'] = $_SESSION['UZR-ID'];
}
else
{
$_POST['from'] = $_COOKIE['from'];
}
$_POST['to'] = $_COOKIE['to'];

	function get_requests() {
	
	
$to = ($_POST['to']);
$from = mysql_real_escape_string(trim(strip_tags($_POST['from'])));

	
	
//$query = "SELECT Msg_id, Sender, Message,  DATE_FORMAT(Time_entered, '%a %b %e, %l:%i %p <font color =\"yellow\"> \_____________________________/</font> %Y') AS Date, driver_id FROM quick_cab WHERE driver_id =('pending') ORDER BY `Msg_ID` DESC";
		
		$query = "SELECT from_id, to_id, DATE_FORMAT(time_sent, '<font color =\"white\"> \_________________________/</font>%a %b %e, %l:%i %p') AS time, message FROM `private_messages` WHERE (to_id ='$from' ) ORDER BY `entry_ID` DESC";
		
		$run = mysql_query($query);
		
		$requests = array();
		
		while($message = mysql_fetch_assoc($run)) {
			$requests[] = array( 'time' => $message ['time'],
			                      'from_id' => $message ['from_id'],
			                     'message' => $message ['message']);
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
