<?php
		include '../../db/dbconn.php';
		$response = array();
		if(isset($_POST['id']) && isset($_POST['hf']) && isset($_POST['address']) && isset($_POST['district'])){
		$id = $_POST['id'];
		$hf = $_POST['hf'];
		$address = $_POST['address'];
		$district = $_POST['district'];
		$mobile = $_POST['mobile'];
			
		$query = "UPDATE health_admin_info set HF_ID = :hf , Address = :address , District = :district , Contact_No = :mobile WHERE ID = :id";
		$result = $conn->prepare($query);
		$result->bindValue(':id' , $id);
		$result->bindValue(':hf' , $hf);
		$result->bindValue(':address' , $address);
		$result->bindValue(':district' , $district);
		$result->bindValue(':mobile' , $mobile);
		$r = $result->execute();
		if($r){
			$response['result'] = 'Successfully updated';
		}
		else{
			$response['result'] = 'Data is not updated.Please try again';
		} 
		echo json_encode($response);
		$conn=null;
	}	