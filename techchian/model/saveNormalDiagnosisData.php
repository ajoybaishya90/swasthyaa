<?php
    if(isset($_POST['pid'])){
		
		session_start();
		
		$ltID = $_SESSION['pid'];
		$hfID = $_SESSION['HF_ID'];
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$antitb = $_POST['antitb'];
		$presumtive = $_POST['presumtive'];
		$repeat = $_POST['repeat'];
		$ntn = $_POST['ntn'];
		$symptom = $_POST['symptom'];
		$duration = $_POST['duration'];
		$date = date('Y-m-d');
		$response = array();
		
		$query = "INSERT INTO diagnosis_n (PID , Anti_TB_Rx , Presumptive_TB , Repeat_exam , Private_referral , Presumptive_NTM , Symptom , Duration , date) VALUES
			(:pid , :antitb , :presumptive , :repeat , :private , :ntm , :symptom ,  :duration , :date)";
			
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':antitb' , $antitb);
		$result->bindValue(':presumptive' , $presumtive);
		$result->bindValue(':repeat' , $repeat);
		$result->bindValue(':private' , '0');
		$result->bindValue(':ntm' , $ntn);
		$result->bindValue(':symptom' , $symptom);
		$result->bindValue(':duration' , $duration);
		$result->bindValue(':date' , $date);
		$r= $result->execute();
		
		if($r){
			$dataID = $conn->lastInsertId();
			
			$insertQuery="INSERT INTO reference_master (PID , pCategory  ,dataID , ltID , hfID , date , time , status , count) VALUES
													   (:pid , :pcat , :dataID , :ltID , :hfID , :date , :time , :status , :count)";												   														   													   
			$r = $conn->prepare($insertQuery);
			$r->bindValue(':pid' , $pid);
			$r->bindValue(':pcat' , 'Normal TB - Diagnosis');
			$r->bindValue(':dataID' , $dataID);
			$r->bindValue(':ltID' , $ltID);
			$r->bindValue(':hfID' , $hfID);
			$r->bindValue(':date' , $date);
			$r->bindValue(':time' , date('H:m:s'));
			$r->bindValue(':status' , '0');
			$r->bindValue(':count' , '0');
			$r->execute();
			
			$updateQuery="UPDATE patient_personal_info SET Arrival_status= :status , referenceStatus = :refstatus , Arrival_date = :date WHERE ID = :id";
			$r = $conn->prepare($updateQuery);
			$r->bindValue(':id' , $pid);
			$r->bindValue(':date' , $date);
			$r->bindValue(':status' , '1');
			$r->bindValue(':refstatus' , '1');
			$r->execute();
			$response['result'] = 'Success'; 
		}else{
			$response['result'] = 'Report is not forwarded.Please try again'; 
		}
		
		echo json_encode($response);
		$conn = null;
	}	