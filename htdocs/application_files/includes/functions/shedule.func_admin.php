<?php
require('../../includes/config.inc.php');
	function get_requests() {
	
	
	

		
		$query = "SELECT entry_id, title, name, contact, location, destination, DATE_FORMAT(date, '%a %b %e, %l:%i %p <font color =\"yellow\"> \_____________________________/</font> %Y') AS Date, DATE_FORMAT(time, '%l:%i %p') AS Time FROM shedules ORDER BY  `shedules`.`date` ASC";
		
		$run = mysql_query($query);
		
		$requests = array();
		
		while($message = mysql_fetch_assoc($run)) {
			$requests[] = array('entry_id' => $message ['entry_id'],
			                    'title' => $message ['title'],
								'name'=>$message['name'],
								'contact'=>$message['contact'],
								'location'=>$message['location'],
								'destination'=>$message['destination'],
								'Date' => $message ['Date'],
								'Time'=>$message['Time']);
		}
		
		return $requests;
		
	}
	
	function accept_request($Driver_info, $message) {
		
		if(!empty($Driver_info) && !empty($message)) {
			
			$Driver_info 	= mysql_real_escape_string($Driver_info);
			$message 	= mysql_real_escape_string($message);
			
			//define your query
			$query = "INSERT INTO shedules (driver_pesponse, driver_id)
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
