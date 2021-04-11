<?php
header('Content-Type: application/json');

	require('../../../users/mysqli_connect.php');
	require('../../includes/functions/shedule.func_admin.php');
	
	$requests = get_requests();
	$html = '';
			foreach($requests as $message) {
			    $html .= '<div id="cab_request"><strong><font color ="red" size "">'.$message['entry_id'].'</font></strong>:<font color ="gold">\________________________________/</font>';
				$html .= '<font color ="blue" size ""><strong>'. $message['title'].'</font>';
				$html .= '<font color ="blue" size "">'. $message['name'].'</strong></font><br />';
				$html .= '<font color ="" size "">CONTACT:  <strong> '. $message['contact'].'</strong></font><br />';
				$html .= '<u><i>LOCATION</i></u>:   <strong><font color ="blue" size "">'.$message['location'].'</font></strong><br />';
				$html .= '<u><i>DESTINATION</i></u>:    <strong> <font color ="green" size "">'.$message['destination'].'</strong></font><br />';
				$html .= '<u><i>ON</i></u>:  <font color ="blue" size "">'.$message['Date'].'</font><font color ="magenta" size "">\_______________________________/</font>';
				$html .= '<font color ="red" size "">'.$message['Time'].'</font><br /><br /></div><br />';
			}
	
$data = ['html' => $html, 'count' => count($requests)];
	echo json_encode($data); 
?>