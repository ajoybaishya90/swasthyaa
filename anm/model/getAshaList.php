<?php
	include '../../db/dbconn.php';
	$response = array();
	
	$id = $_POST['id'];
	
	$query = "SELECT * FROM asha_details where HF_ID = '$id'";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$response[] = $row;
		}
	}
	echo json_encode($response);
	$conn = null;		