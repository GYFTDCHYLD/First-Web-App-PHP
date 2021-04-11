<?php

header('Content-Type: application/json');

	require('../../../users/mysqli_connect.php');
	require('../../includes/functions/quick_cab.func.php');
	
	$requests = get_requests();
	$html = '';
			foreach($requests as $message) {
			    $html .=  '<div class="main">
				<ul class="cbp_tmtimeline">
					<li><strong><div class="cbp_tmicon"><font color="black"><i>'.$message['msg_id'].'</i></font></div></strong>';
				$html .=  '<div class="cbp_tmlabel"><font size="1.5"><p>'. $message['Date'].'<font color="transparent">____</font><font color="black">('.$message['msg_id'].')</font></p></font>';
				$html .=  '<i><strong><font color="black"><div id="m_head">'.$message['sender'].'<font></strong></div>';
				$html .=  '<font color ="green" size ""><p>'.$message['message'].'</p></font>';
				$html .=  '<i><u>ACCEPTED BY</u></i>:<font color ="blue" size "">   '.$message['driver_id'].'</div>
					</li>
					</div></div>';
			}
			
	
$data = ['html' => $html, 'count' => count($requests)];
	echo json_encode($data);
?>