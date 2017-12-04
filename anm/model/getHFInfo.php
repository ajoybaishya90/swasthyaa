<?php
	include '../../db/dbconn.php';
	$response = array();
	
	$query = "SELECT * FROM HF_Info";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$response[] = $row;
		}
	}
	echo json_encode($response);
	$conn = null;		