<?php
	include '../../db/dbconn.php';
	$response = array();
	session_start();
	$hfID = $_SESSION['HF_ID'];
	
	$query = "select p.ID as pid , p.Name as pname , r.pCategory as pcat, r.dataID as dataID , r.date as date , r.time as time , r.Status as status from patient_personal_info as p , reference_master r where p.ID = r.PID and r.hfID = '$hfID' and r.status = '1' and r.date <= CURDATE()";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$pid= $row['pid'];
			$pname= $row['pname'];
			$pcat= $row['pcat'];
			$dataID= $row['dataID'];
			$time= $row['time'];
			$date= $row['date'];
			$status= $row['status'];
			//$response[] = array('pid'=>$pid , 'pname'=>$pname , 'pcat'=>$pcat , 'time'=>$time  , 'status'=>$status);
			$response[] = array('pid'=>$pid , 'label'=>$pname . ' Test Request Approved' , 'date'=>$date , 'time'=>$time , 'dataID'=>$dataID);
		}	
	}
	echo json_encode($response);
	$conn = null;		