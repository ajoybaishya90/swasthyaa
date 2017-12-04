<?php
	include '../../db/dbconn.php';
	$response = array();
	
    $query = "SELECT COUNT(*) AS count FROM patient_personal_info WHERE patient_personal_info.Status='Verified'";
	$result = $conn->prepare($query);
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		 $p11= $row['count'];  
	}
	
	$query = "SELECT COUNT(*) AS count FROM patient_personal_info WHERE patient_personal_info.Status='Not Verified' ";
	$result = $conn->prepare($query);
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		 $q11= $row['count'];  
	}
         
	$sum = $p11+$q11;
	$response[] = array('Patient'=>'Record' , 'Total'=>$sum);
	echo json_encode($response);
	$conn = null;
	
/*	$query = "SELECT COUNT(*) AS count FROM patient_personal_info WHERE entry_date BETWEEN NOW() - INTERVAL 2 DAY AND NOW()";
	$result = $conn->prepare($query);
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		 $total= $row['count'];  
	}
	$response[] = array('Patient'=>'Record' , 'Total'=>$total);
	echo json_encode($response);
	$conn = null;*/