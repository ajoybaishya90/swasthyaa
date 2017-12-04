<?php
	include '../../db/dbconn.php';
	$response = array();
	$pid = $_POST['pid'];
	
	$query = "SELECT hf.Name as hname , admin.ID as aid , admin.Name as adminName , admin.Designation as adminDesignation , admin.Address as adminAddress ,
		admin.Contact_No as adminMobile , admin.District as adminDistrict FROM health_admin_info admin , hf_info hf  WHERE admin.ID = '$pid' and admin.HF_ID = hf.ID";
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$response[] = $row;
		}
	}
	echo json_encode($response);
	$conn = null;		