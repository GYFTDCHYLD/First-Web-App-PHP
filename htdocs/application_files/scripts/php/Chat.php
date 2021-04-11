<?php
header('Content-Type: application/json');

	//require('../../../users/mysqli_connect.php');
	require('../../includes/functions/chat.func.php');
	
	$requests = get_requests();
	$html = '';
			foreach($requests as $message) {
			    $html .=  '<font color ="green" size= "1"><strong>FROM</strong> : </font><font color ="blue" size= "1">'. $message['from_id'].'</font> <font color ="" size= "1">';
				$html .=   $message['time'].'</font><br />';
				$html .=  '<font color ="red" size= "1">MESSAGE :</font><font color ="" size= "2">'.$message['message'].'<br /><br /><br /><br />';
				
				}
$data = ['html' => $html, 'count' => count($requests)];
	echo json_encode($data);
?>