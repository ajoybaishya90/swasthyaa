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
		$response = array();
		
		$query = "UPDATE nikshy_details SET  nikshay_id=:nid , cdl=:cdl , rntpc=:rntpc , pmdt=:pmdt , drtb=:drtb, tb_unit=:tb_unit WHERE pid = :pid";

		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':nid' , $nikshayId);
		$result->bindValue(':cdl' , $cdl);
		$result->bindValue(':rntpc' , $rntpc);
		$result->bindValue(':pmdt' , $pmdt);
		$result->bindValue(':drtb' , $drid);
		$result->bindValue(':tb_unit' , $tb_unit);
		$r= $result->execute();
		
		if($r){
			$response['result'] = 'Success'; 
		}else{
			$response['result'] = 'Fail'; 
		}
		
		echo json_encode($response);
		$conn = null;
	}	