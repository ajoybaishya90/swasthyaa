<?php
    if(isset($_POST['pid'])){
		
		$response =array();
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		
		$query = "select * from diagnosis_n where  PID = :id";
		$result = $conn->prepare($query);
		$result->bindParam("id", $pid);
		$result->execute();
		$count = $result->rowCount();
		if($count == 0){
			$response['result'] = 'Absent';
		}else{
			$response['result'] = 'Present';	
		}
		
		echo json_encode($response);
		$conn=null;
}		