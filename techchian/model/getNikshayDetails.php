<?php
	include '../../db/dbconn.php';
	$response = array();
	$pid = $_POST['pid'];
	
	$query = "SELECT * FROM nikshy_details WHERE pid = '$pid'";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$response[] = $row;
		}
	}
	echo json_encode($response);
	$conn = null;		