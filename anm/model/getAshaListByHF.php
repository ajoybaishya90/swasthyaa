<?php
$i=0;
	include '../../db/dbconn.php';
	$response = array();
	$hid = $_POST['hid'];
	
	$query = "SELECT * FROM asha_details WHERE HF_ID = $hid";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$id = $row['id'];
			$name = $row['Name'];
			$mobile = $row['Mobile'];
			
			$query = "SELECT count(ID) AS total FROM `patient_personal_info` WHERE ASHA_ID = '$id'";
			if($r = $conn->prepare($query)) {
				$r->execute();
				while($row = $r->fetch(PDO::FETCH_ASSOC)){
					$total = $row['total'];	     
					$response[] = array('id'=>$id , 'name'=>$name , 'mobile'=>$mobile , 'total'=>$total);
				}			
			}
			
			
		}
	}
	echo json_encode($response);
	$conn = null;		