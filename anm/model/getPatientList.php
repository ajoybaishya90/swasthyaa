<?php
	include '../../db/dbconn.php';
	$response = array();
	$id = $_POST['asha_id'];
	
	$query = "SELECT * FROM patient_personal_info where ASHA_ID='$id'";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$response[] = $row;
		}
	}
	echo json_encode($response);
	$conn = null;		