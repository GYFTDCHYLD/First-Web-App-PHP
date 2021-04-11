<?php
require('../../includes/config.inc.php');
	function get_requests() {
		
		//$query = "SELECT Msg_id, Sender, Message, DATE_FORMAT(Time_entered, '%a %b %e, %l:%i %p <font color =\"yellow\"> \_____________________________/</font> %Y') AS Date, driver_id FROM quick_cab ORDER BY `Msg_ID` DESC";
		@$query = "SELECT Msg_id, Sender, Message, Time_entered, driver_id FROM quick_cab ORDER BY `Msg_ID` DESC";		
		@$query2 = "SELECT `contact` FROM `quick_cab` WHERE `msg_id`= 1";
		    
		$run = mysql_query($query);  
		$run2 = mysql_query($query2); 
		
		$requests = array();
		$requests2 = array();
		
		while($message = mysql_fetch_assoc($run)) {
			$requests[] = array( 'Date' => $message ['Time_entered'],
			                     'msg_id' => $message ['Msg_id'],
			                    'sender' => $message ['Sender'],
								'message'=>$message['Message'],
								'driver_id'=>$message['driver_id']);
		}
		
		while($message2 = mysql_fetch_assoc($run2)) {
			$requests2[] = array('PhoneNumber' => $message2['contact'] );
		}			
		return $requests;
		return $requests2;		
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
