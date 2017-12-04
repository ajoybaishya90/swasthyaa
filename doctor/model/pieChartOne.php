<?php
	include '../../db/dbconn.php';
	
	$query = "select COUNT(*) AS count from reference_master WHERE date = CURDATE()";
	$result = $conn->prepare($query);
	$result->execute();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		 $total= $row['count'];  
	}
	$response[] = array('Patient'=>'Record' , 'Total'=>$total);
	
	
	echo json_encode($response);
	$conn = null;