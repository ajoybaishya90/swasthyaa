<?php
	include '../../db/dbconn.php';
	
	$query = "select COUNT(*) AS count from patient_personal_info p WHERE p.entry_date >= DATE(NOW()) - INTERVAL 3 DAY ORDER BY p.entry_date DESC ";
	$result = $conn->prepare($query);
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		 $total= $row['count'];  
	}
	$response[] = array('Patient'=>'Record' , 'Total'=>$total);
	
	
	echo json_encode($response);
	$conn = null;