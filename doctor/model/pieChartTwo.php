<?php
	include '../../db/dbconn.php';
	
	$query = "select COUNT(*) AS count from reference_master WHERE date = CURDATE() and status = '0'";
	$r1 = $conn->prepare($query);
	$r1->execute();
	while($row = $r1->fetch(PDO::FETCH_ASSOC)){
		 $notcomplete= $row['count'];  
	}
	
	$query = "select COUNT(*) AS count from reference_master WHERE date = CURDATE() and status = '2'";
	$r4 = $conn->prepare($query);
	$r4->execute();
	while($row = $r4->fetch(PDO::FETCH_ASSOC)){
		 $complete= $row['count'];  
	}
	
	$response[] = array('Patient'=>'Record' , 'Complete'=>$complete , 'Incomplete'=>$notcomplete);
	echo json_encode($response);
	$conn = null;