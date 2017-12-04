<?php
	include '../../db/dbconn.php';
	$response = array();
	session_start();
	$hfID = $_SESSION['HF_ID'];
	
	$query = "select p.ID as pid , p.Name as pname , r.pCategory as pcat, r.dataID as dataID  , p.entry_date as date , r.time as time , r.Status as status from patient_personal_info as p , reference_master r where p.ID = r.PID and r.hfID = '$hfID' and MONTH(r.date)= MONTH(CURDATE()) and YEAR(r.date) = YEAR(CURDATE()) order by r.id desc";
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
			$response[] = array('pid'=>$pid , 'pname'=>$pname , 'pcat'=>$pcat , 'dataID'=>$dataID , 'date'=>$date , 'time'=>$time  , 'status'=>$status);
		}	
	}
	echo json_encode($response);
	$conn = null;		