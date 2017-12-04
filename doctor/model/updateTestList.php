<?php
	include '../../db/dbconn.php';
	$response = array();
	
	$pid = $_POST['pid'];
	$did = $_POST['did'];
	$testList = $_POST['testList'];
	//$testList = '1|2|3|4|10';
	$date = date('Y-m-d');
	
	$list = explode("|", $testList);
	$i = 0;
	
	$deleteQuery = "Delete from testDetails_master where PID = :pid and DID = :did";
	$result = $conn->prepare($deleteQuery);
	$result->bindValue(':pid' , $pid);
	$result->bindValue(':did' , $did);
	$result->execute();
	
	foreach($list as $key){
		//echo $key .'</br>';
		$query = "INSERT INTO testDetails_master (PID , DID , testID , date) VALUES (:pid , :did , :key , :date)";
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':did' , $did);
		$result->bindValue(':key' , $key);
		$result->bindValue(':date' , $date);
		$result->execute();
		$i++;
	}
	
	$updateQuery = "UPDATE reference_master SET count = :count WHERE PID =:pid and dataID=:did";
	$r = $conn->prepare($updateQuery);
	$r->bindValue(':pid' , $pid);
	$r->bindValue(':did' , $did);
	$r->bindValue(':count' , $i-1);
	$r->execute();
	
	if($r){
		$response['result'] = 'Success';//'Forwarded to Lab Technician Successfully';
	}else{
		$response['result'] = 'Fail';//'Please try again';
	}
	echo json_encode($response);
	$conn = null;		