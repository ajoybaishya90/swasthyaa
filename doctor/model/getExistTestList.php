<?php
	include '../../db/dbconn.php';
	$pid = $_POST['pid'];
	$did = $_POST['did'];
	
	$response = array();
	
	$query = "select testname_master.id , testname_master.Name from testname_master , reference_master , testdetails_master where testdetails_master.testID = testname_master.id and reference_master.PID = testdetails_master.PID and reference_master.dataID = testdetails_master.DID and reference_master.status = '1' and testdetails_master.PID = '$pid' and testdetails_master.DID = '$did'";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$id = $row['id'];
			$name = $row['Name'];
			$response[] = array('id' => $id , 'Name'=>$name);
		}	
	}
	echo json_encode($response);
	$conn = null;