<?php
	include '../../db/dbconn.php';
	$pid = $_POST['pid'];
	$did = $_POST['did'];
	
	$response = array();
	
	$query = "select count from reference_master where PID = '$pid' and dataID = '$did' and status = '1'";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$count= $row['count'];
			$response[] = array('total' => $count);
			if($count == 0){
				$updateQuery = "UPDATE reference_master SET status = :status , seen=:seen WHERE PID =:pid and dataID=:did";
				$r = $conn->prepare($updateQuery);
				$r->bindValue(':status' , '2');
				$r->bindValue(':seen' , '2');
				$r->bindValue(':pid' , $pid);
				$r->bindValue(':did' , $did);
				$r->execute();
				
				$updateQuery = "UPDATE patient_personal_info SET referenceStatus = :status WHERE ID =:pid";
				$r = $conn->prepare($updateQuery);
				$r->bindValue(':status' , '3');
				$r->bindValue(':pid' , $pid);
				$r->execute();
			}
		}	
	}
	echo json_encode($response);
	$conn = null;