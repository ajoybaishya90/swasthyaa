<?php
    if(isset($_POST['pid'])){
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$reason = $_POST['reason'];
		$response = array();
		$query = "UPDATE patient_personal_info SET reason=:reason WHERE ID=:id";
		$result = $conn->prepare($query);
		$result->bindValue(':reason' , $reason);
		$result->bindValue(':id' , $pid);
		$result->execute();
		
		$response['result'] = 'Success'; 
		echo json_encode($response);
		$conn = null;
	}	