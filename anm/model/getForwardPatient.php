<?php
	include '../../db/dbconn.php';
	$response = array();
	
	$query = "SELECT p.ID as ID , p.Unique_ID as Unique_ID, p.Name as Patient_Name, p.Sex as sex, p.Patient_Mobile as Patient_Mobile, p.Status as Status,
                                 h.Name as Referring_HF_Name, z.Datee as Datee,c.Name as Referred_HF_Name, d.Name as Doctor_Name from HF_Info as h JOIN HF_Info as c JOIN health_admin_info as d 
                                 JOIN referral_info as z JOIN patient_personal_info as p where z.Referred_Lab_ID=c.ID AND z.Referring_HF_ID=h.ID and
                                   z.Referred_by_ID= d.ID and p.ID = z.PID";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$response[] = $row;
		}
	}
	echo json_encode($response);
	$conn = null;		