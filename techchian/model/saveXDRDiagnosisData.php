<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$mdrtb = $_POST['mdrtb'];
		$culturepositive = $_POST['culturepositive'];
		$persistanceculture = $_POST['persistanceculture'];
		$reversion = $_POST['reversion'];
		$regimenfailure = $_POST['regimenfailure'];
		$treatment = $_POST['treatment'];
		$resolution = $_POST['resolution'];
		$month = $_POST['month'];
		$date = date('Y-m-d');
		$response = array();
		
		$query = "INSERT INTO diagnosis_xdr (PID , MDR_diagnosis , Culture_positive , Persistent_culture , Month , Reversion , Failure_MDR , Second_line_treatment , Discordance , date) VALUES
			(:pid , :diagnosis , :culturepositive , :persistanceculture , :month , :reversion , :regimenfailure , :treatment , :resolution ,  :date)";
			
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':diagnosis' , $mdrtb);
		$result->bindValue(':culturepositive' , $culturepositive);
		$result->bindValue(':persistanceculture' , $persistanceculture);
		$result->bindValue(':month' , $month);
		$result->bindValue(':reversion' , $reversion);
		$result->bindValue(':regimenfailure' , $regimenfailure);
		$result->bindValue(':treatment' , $treatment);
		$result->bindValue(':resolution' , $resolution);
		$result->bindValue(':date' , $date);
		
		$r= $result->execute();
		
		if($r){
			$updateQuery="UPDATE patient_personal_info SET Arrival_status= :status , Arrival_date = :date WHERE ID = :id";
			$r = $conn->prepare($updateQuery);
			$r->bindValue(':id' , $pid);
			$r->bindValue(':date' , $date);
			$r->bindValue(':status' , '1');
			$r->execute();
			$response['result'] = 'Success'; 
		}else{
			$response['result'] = 'Fail'; 
		}
		
		echo json_encode($response);
		$conn = null;
	}	