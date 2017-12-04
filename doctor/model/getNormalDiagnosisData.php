<?php
	include '../../db/dbconn.php';
	$response = array();
	
	$pid = $_POST['pid'];
	
	$query = "select Anti_TB_Rx as antitb , Presumptive_TB as pretb , Repeat_exam as exam , Presumptive_ntm as ntm , Symptom as symptom , Duration as duration from diagnosis_n where PID = '$pid'";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$response[] = $row;
		}	
	}
	echo json_encode($response);
	$conn = null;