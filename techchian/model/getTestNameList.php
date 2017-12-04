<?php
	include '../../db/dbconn.php';
	$response = array();
	$pid = $_POST['pid'];
	
	$query = "SELECT t.id as id , t.Name as name , r.dataID as dataID from testname_master t , testdetails_master d , reference_master r where t.id = d.testID and d.PID = r.PID and r.status = '1' and d.PID = '$pid' ";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$id = $row['id'];
			$name = $row['name'];
			$dataID = $row['dataID'];
			$response[] = array('id'=>$id , 'name'=>$name , 'dataID'=>$dataID);
		}	
	}
	echo json_encode($response);
	$conn = null;		