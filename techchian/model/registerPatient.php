<?php
    if(isset($_GET['mobile'])){
		
		$response =array();
		include '../../db/dbconn.php';
		$mobile = $_GET['mobile'];
		
		$query = "select * from patient_personal_info where Patient_Mobile=:mobile";
		$result = $conn->prepare($query);
		$result->bindParam("mobile", $mobile);
		$result->execute();
		$count = $result->rowCount();
		if($count == 0) {
			$response['result'] = 'This Number is Not Available';
		}else{
			$updateQuery="Update patient_personal_info set Status = 'Verified' where Patient_Mobile=:mobile";
			$result = $conn->prepare($updateQuery);
			$result->bindValue(':mobile' , $mobile);
			$r= $result->execute();
			if($r){
				$response['result'] = 'Your Number is registered';
			}else{
				$response['result'] = 'Try again';
			}
			
		}
		
		echo json_encode($response);
		$conn=null;
}		