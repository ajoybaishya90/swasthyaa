<?php
    if(isset($_POST['pid'])){
		$pid = $_POST['pid'];
		include '../../db/dbconn.php';
		$response = array();
		
		$query = "SELECT p.State as State , p.District as District , h.Name as HName FROM patient_personal_info p , referral_info r , hf_info h WHERE p.ID=r.PID and r.Referring_HF_ID=h.ID and p.ID='$pid'";
		if($result = $conn->prepare($query)) {
			$result->execute();
			while($row = $result->fetch(PDO::FETCH_ASSOC)){
				$response[] = $row;
			}
		}
		echo json_encode($response);
		$conn = null;
	}
	
	
	
	
			