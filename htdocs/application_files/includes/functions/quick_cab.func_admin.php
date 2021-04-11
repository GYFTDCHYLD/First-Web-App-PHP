<?php
require('../../includes/config.inc.php');
	function get_requests() {
	
	
	

		
		$query = "SELECT Msg_id, Sender, Message_admin, Time_entered, driver_id, DATE_FORMAT(driver_time_stamp, '%l:%i %p') AS Time FROM quick_cab ORDER BY `Msg_ID` DESC";
		
		$run = mysql_query($query);
		
		$requests = array();
		
		while($message = mysql_fetch_assoc($run)) {
			$requests[] = array( 'Date' => $message ['Time_entered'],
			                     'msg_id' => $message ['Msg_id'],
			                    'sender' => $message ['Sender'],
								'message_admin'=>$message['Message_admin'],
								'driver_id'=>$message['driver_id'],
								'Time'=>$message['Time']);
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
