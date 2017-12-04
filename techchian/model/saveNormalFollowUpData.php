<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$regimen = $_POST['regimen'];
		$reason = $_POST['reason'];
		$post = $_POST['post'];
		$date = date('Y-m-d');
		$response = array();
		
		$query = "INSERT INTO follow_n (PID , Regimen , Reason , Post_treatment , date) VALUES
			(:pid , :regimen , :reason , :post , :date)";
			
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':regimen' , $regimen);
		$result->bindValue(':reason' , $reason);
		$result->bindValue(':post' , $post);
		$result->bindValue(':date' , $date);
		
		$r= $result->execute();
		
		if($r){
			$response['result'] = 'Success'; 
		}else{
			$response['result'] = 'Fail'; 
		}
		
		echo json_encode($response);
		$conn = null;
	}	