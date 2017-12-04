<?php
    if(isset($_POST['pid'])){
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$response = array();
		$query = "UPDATE patient_personal_info SET Status=:status WHERE ID=:id";
		$result = $conn->prepare($query);
		$result->bindValue(':status' , 'Verified');
		$result->bindValue(':id' , $pid);
		$result->execute();
		
		$response['result'] = 'Success'; 
		echo json_encode($response);
		$conn = null;
	}	