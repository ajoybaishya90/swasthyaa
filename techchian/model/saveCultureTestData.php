<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$ctype = $_POST['ctype'];
		$labno = $_POST['labno'];
		$negative = $_POST['negative'];
		$positive = $_POST['positive'];
		$ntm = $_POST['ntm'];
		$contamination = $_POST['contamination'];
		$date = date('Y-m-d');
		$response = array();
		
		$query = "INSERT INTO culture_test (PID , Type , Lab_no , Negative , Positive , NTM , Contamination , D_result , D_reported , Reported_by , Status) VALUES
			(:pid , :type , :lab_no , :negative , :positive , :ntm , :contamination , :d_result ,  :d_reported , :reported_by , :status)";
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':type' , $ctype);
		
		$result->bindValue(':lab_no' , $labno);
		$result->bindValue(':negative' , $negative);
		$result->bindValue(':positive' , $positive);
		$result->bindValue(':ntm' , $ntm);
		$result->bindValue(':contamination' , $contamination);
		
		$result->bindValue(':d_result' , $date);
		$result->bindValue(':d_reported' , $date);
		$result->bindValue(':reported_by' , '');
		$result->bindValue(':status' , '0');
		$r= $result->execute();
		
		if($r){
			$response['result'] = 'Success'; 
		}else{
			$response['result'] = 'Fail'; 
		}
		
		echo json_encode($response);
		$conn = null;
	}	