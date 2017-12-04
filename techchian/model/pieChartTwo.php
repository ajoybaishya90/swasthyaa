<?php
	include '../../db/dbconn.php';
	
	$query = "SELECT COUNT(*) AS count FROM patient_personal_info p WHERE p.Arrival_status='0' and p.entry_date >= DATE(NOW()) - INTERVAL 3 DAY";
	$r1 = $conn->prepare($query);
	$r1->execute();
	while($row = $r1->fetch(PDO::FETCH_ASSOC)){
		 $tna= $row['count'];  
	}
	
	$query = "SELECT COUNT(*) AS count FROM patient_personal_info p WHERE p.Arrival_status='1' and p.entry_date >= DATE(NOW()) - INTERVAL 3 DAY";
	$r4 = $conn->prepare($query);
	$r4->execute();
	while($row = $r4->fetch(PDO::FETCH_ASSOC)){
		 $ta= $row['count'];  
	}
	
	$response[] = array('Patient'=>'Record' , 'Arrival'=>$ta , 'NArrival'=>$tna);
	echo json_encode($response);
	$conn = null;