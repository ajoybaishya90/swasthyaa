<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$response = array();
		
		$query = "select count(*) as count from reference_master where PID = :id and status = '0'";
		$result = $conn->prepare($query);
		$result->bindParam("id", $pid);
		//$result->bindParam("status", '0');
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$count = $row['count'];
			$response[] = array('Total'=>$count);
		}
		echo json_encode($response);
		$conn=null;
}		