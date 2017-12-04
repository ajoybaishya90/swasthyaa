<?php
	include '../../db/dbconn.php';
	$response = array();
	
	$query = "select p.ID as pid , p.Unique_ID as uid , p.Name as pname , p.Sex as sex, p.entry_date as rdate, p.Patient_Mobile as mobile , p.Status as status , p.referenceStatus as refstatus , h.Name as hname from patient_personal_info as p , health_admin_info h where p.CHW_ID=h.ID and YEAR(p.entry_date) = YEAR(CURDATE()) and MONTH(p.entry_date) = MONTH(CURDATE())";
	
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$pid= $row['pid'];
			$uid= $row['uid'];
			$pname= $row['pname'];
			$sex= $row['sex'];
			$rdate= $row['rdate'];
			$mobile= $row['mobile'];
			$status= $row['status'];
			$hname= $row['hname'];
			$refstatus= $row['refstatus'];
			$response[] = array('pid'=>$pid , 'uid'=>$uid , 'pname'=>$pname , 'sex'=>$sex , 'rdate'=>$rdate , 'mobile'=>$mobile , 'status'=>$status , 'hname'=>$hname , 'refstatus'=>$refstatus);
		}	
	}
	echo json_encode($response);
	$conn = null;	