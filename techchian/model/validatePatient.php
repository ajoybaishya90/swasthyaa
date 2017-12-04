<?php
    if(isset($_POST['pname']) && isset($_POST['dob'])){
		
		$response =array();
		include '../../db/dbconn.php';
		$pname = $_POST['pname'];
		$dob = $_POST['dob'];
		
		$query = "select * from patient_personal_info where  Name = :name and DOB = :dob";
		$result = $conn->prepare($query);
		$result->bindParam("name", $pname);
		$result->bindParam("dob", $dob);
		$result->execute();
		$count = $result->rowCount();
		if($count == 0) {
			$response['result'] = 'No';
		}else{
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$response['result'] = $row['ID'];
			}	
		}
		
		echo json_encode($response);
		$conn=null;
}		