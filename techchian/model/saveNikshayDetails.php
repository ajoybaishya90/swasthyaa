<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$nikshayId = $_POST['nikshayId'];
		$cdl = $_POST['cdl'];
		$rntpc = $_POST['rntpc'];
		$pmdt = $_POST['pmdt'];
		$drid = $_POST['drid'];
		$tb_unit = $_POST['tb_unit'];
		$date = date('Y-m-d');
		$response = array();
		
		$query = "INSERT INTO nikshy_details (pid , nikshay_id , cdl , rntpc , pmdt , drtb, tb_unit , date) VALUES
			(:pid , :nikshay_id , :cdl , :rntpc , :pmdt , :drtb , :tb_unit , :date)";
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':nikshay_id' , $nikshayId);
		$result->bindValue(':cdl' , $cdl);
		$result->bindValue(':rntpc' , $rntpc);
		$result->bindValue(':pmdt' , $pmdt);
		$result->bindValue(':drtb' , $drid);
		$result->bindValue(':tb_unit' , $tb_unit);
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