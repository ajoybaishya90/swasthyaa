<?php
	include '../../db/dbconn.php';
	
	$query = "select COUNT(*) AS count from patient_personal_info p WHERE ( p.referenceStatus = '1' or p.referenceStatus = '2') and p.entry_date >= DATE(NOW()) - INTERVAL 3 DAY ORDER BY p.entry_date DESC ";
	$result = $conn->prepare($query);
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		 $pending = $row['count']; 
	}
	
	$query = "select COUNT(*) AS count from patient_personal_info p WHERE p.referenceStatus = '3' and p.entry_date >= DATE(NOW()) - INTERVAL 3 DAY ORDER BY p.entry_date DESC ";
	$result = $conn->prepare($query);
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		 $complete = $row['count'];  
	}
	
	$response[] = array('Patient'=>'Record' , 'Pending'=>$pending , 'Complete'=>$complete);
	
	echo json_encode($response);
	$conn = null;