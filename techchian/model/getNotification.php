<?php
	include '../../db/dbconn.php';
	session_start();
	$hfID = $_SESSION['HF_ID'];
	
	$response = array();
	
	$query = "select count(*) as count from reference_master r  where r.hfID = '$hfID' and r.date <= CURDATE() and status = '1'";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$count= $row['count'];
			$response[] = array('total' => $count);
		}	
	}
	echo json_encode($response);
	$conn = null;