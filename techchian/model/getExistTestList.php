<?php
	include '../../db/dbconn.php';
	$pid = $_POST['pid'];
	$did = $_POST['did'];
	
	$response = array();
	
	$query = "select testID from testdetails_master where PID = '$pid' and DID = '$did' and status = '1'";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$testID= $row['testID'];
			$response[] = array('testID' => $testID);
		}	
	}
	echo json_encode($response);
	$conn = null;