<?php
    if(isset($_POST['pid'])){
		
		session_start();
		
		$ltID = $_SESSION['pid'];
		$hfID = $_SESSION['HF_ID'];
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$presumptive = $_POST['presumptive'];
		$diagnosis = $_POST['diagnosis'];
		$contact = $_POST['contact'];
		$followup = $_POST['followup'];
		$disordarance = $_POST['discordance'];
		$date = date('Y-m-d');
		$response = array();
		
		$query = "INSERT INTO diagnosis_mdr (PID , Type , At_diagnosis , Contact , Follow_up , Private_referral , Disordarance , date) VALUES
			(:pid , :type , :diagnosis , :contact , :followup , :private , :disordarance , :date)";
			
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':type' , $presumptive);
		$result->bindValue(':diagnosis' , $diagnosis);
		$result->bindValue(':contact' , $contact);
		$result->bindValue(':followup' , $followup);
		$result->bindValue(':private' , '');
		$result->bindValue(':disordarance' , $disordarance);
		$result->bindValue(':date' , $date);
		
		$r= $result->execute();
		
		if($r){
			//insert into reference_master
			$dataID = $conn->lastInsertId();
			
		/*	$insertQuery="INSERT INTO reference_master (PID , dataID , ltID , hfID , date , status) VALUES
													   (:pid , :dataID , :ltID , :hfID , :date , :status)";*/
													   
			$insertQuery="INSERT INTO reference_master (PID , dataID , ltID , hfID , date , status) VALUES
													   ('20' , '1' , '1' , '1' , '2017-10-10' , '0')";
													   
													   
			$r = $conn->prepare($insertQuery);
			/*$r->bindValue(':pid' , $pid);
			$r->bindValue(':dataID' , $dataID);
			$r->bindValue(':ltID' , $ltID);
			$r->bindValue(':hfID' , $hfID);
			$r->bindValue(':date' , $date);
			$r->bindValue(':status' , '0');*/
			$r->execute();
			
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