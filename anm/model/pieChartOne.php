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
	$Verified = ($p11/$sum)*100;
	$Not_Verified = ($q11/$sum)*100;
	$response[] = array('Patient'=>'Record' , 'Verified'=>$Verified , 'NotVerified'=>$Not_Verified , 'VPNumber'=>$p11 , 'NVPNumber'=>$q11 , 'Total'=>$sum);
	echo json_encode($response);
	$conn = null;