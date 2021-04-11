<?php
header('Content-Type: application/json');

	require('../../../users/mysqli_connect.php');
	require('../../includes/functions/lobby.func.php');
	
	$requests = get_requests();
	$html = '';
			foreach($requests as $message) {
			     $html .= '<div id="lobby3" >
				           <div id ="lobby_exit" >
						   <img id="note1" src="images/note1.png" style="cursor: pointer;" onclick=window.location="lobbyout.php">
						   <img id="bin" src="images/trash.png"  style="cursor: pointer;" onclick=window.location="lobbyout.php"></div>
						   </div>';
			     $html .= '<div id="lobby2" >
						   <div id="driver_msg"><b>Hello: I\'m on my way</b><br><' . $message['driver_response'];
				 $html .= '.<br><font  color="red"><center><i> TAXIS & TOURS</i></center></font></div><div id="lobby5" ></div><img id="drvr_image" src="drivers/'.$message['driver_id'].'.png"/>
				        <div id="me_driver"><i>Driver</i></div>   </div>';
				   }
$data = ['html' => $html, 'count' => count($requests)];
	echo json_encode($data);
/* */
?>

