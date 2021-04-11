<?php

	header('Content-Type: application/json');

	require('../../../users/mysqli_connect.php');
	require('../../includes/functions/quick_cab.func_admin.php');
	
	$requests = get_requests();
	$html = '';
	foreach($requests as $message) {
			    $html .= '<div id="cab_request"><strong><font color ="red" size "">'.$message['msg_id'].'</font></strong>:<font color ="gold">\________________________________/</font>';
				$html .=  '<font color ="red" size "">'. $message['Date'].'</font><br />';
				$html .=  '<u><i>FROM</i></u>:   <strong><font color ="blue" size "">'.$message['sender'].'</font></strong><br />';
				$html .=  '<font color ="green" size "">'.$message['message_admin'].'</font><br />';
				$html .=  '<u><i>ACCEPTED BY</i></u>:  <font color ="blue" size "">'.$message['driver_id'].'</font><font color ="magenta" size "">\______________/</font>';
				$html .=  '<font color ="red" size "">'.$message['Time'].'</font><br /><br /></div><br />';
			}
	
	$data = ['html' => $html, 'count' => count($requests)];
	echo json_encode($data);
		

?>