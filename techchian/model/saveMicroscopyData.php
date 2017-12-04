<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$did = $_POST['did'];
		$mtype = $_POST['mtype'];
		
		$lab_a = $_POST['lab_a'];
		$appearance_a = $_POST['appearance_a'];
		$negative_a = $_POST['negative_a'];
		$scanty_a = $_POST['scanty_a'];
		$a_1 = $_POST['a_1'];
		$a_2 = $_POST['a_2'];
		$a_3 = $_POST['a_3'];
		
		$lab_b = $_POST['lab_b'];
		$appearance_b = $_POST['appearance_b'];
		$negative_b = $_POST['negative_b'];
		$scanty_b = $_POST['scanty_b'];
		$b_1 = $_POST['b_1'];
		$b_2 = $_POST['b_2'];
		$b_3 = $_POST['b_3'];
		
		$date = date('Y-m-d');
		$response = array();
		
		$query = "INSERT INTO microscopy_test (PID , DID , Type , Lab_no_A , Appearance_A , Negative_A , Scanty_A , 1_A , 2_A , 3_A , Lab_no_B , Appearance_B , Negative_B , Scanty_B , 1_B , 2_B , 3_B  , Status , date) VALUES
			(:pid , :did , :type , :lA , :aA , :nA , :sA , :A1 , :A2 , :A3 , :lB , :aB , :nB , :sB , :B1 , :B2 , :B3 , :status , :date)";
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':did' , $did);
		$result->bindValue(':type' , $mtype);
		
		$result->bindValue(':lA' , $lab_a);
		$result->bindValue(':aA' , $appearance_a);
		$result->bindValue(':nA' , $negative_a);
		$result->bindValue(':sA' , $scanty_a);
		$result->bindValue(':A1' , $a_1);
		$result->bindValue(':A2' , $a_2);
		$result->bindValue(':A3' , $a_3);
		
		$result->bindValue(':lB' , $lab_b);
		$result->bindValue(':aB' , $appearance_b);
		$result->bindValue(':nB' , $negative_b);
		$result->bindValue(':sB' , $scanty_b);
		$result->bindValue(':B1' , $b_1);
		$result->bindValue(':B2' , $b_2);
		$result->bindValue(':B3' , $b_3);
		
		$result->bindValue(':status' , '0');
		$result->bindValue(':date' , $date);
		$r= $result->execute();
		
		if($r){
			$updateQuery = "Update testdetails_master set status = :status where PID=:pid and DID=:did and testID=:testID";
			$r = $conn->prepare($updateQuery);
			$r->bindValue(':pid' , $pid);
			$r->bindValue(':did' , $did);
			$r->bindValue(':testID' , '1');
			$r->bindValue(':status' , '1');
			$r->execute();
			
		   	$countQuery = "Select count from reference_master where PID = '$pid' and dataID = '$did'";
			if($r1 = $conn->prepare($countQuery)) {
				$r1->execute();
				while($row = $r1->fetch(PDO::FETCH_ASSOC)){
					$count= $row['count'];
					$count = $count -1;
				}	
			}
			
			$updateQuery = "Update reference_master set count = :count where PID=:pid and dataID=:did";
			$r2 = $conn->prepare($updateQuery);
			$r2->bindValue(':pid' , $pid);
			$r2->bindValue(':did' , $did);
			$r2->bindValue(':count' , $count);
			$r2->execute();
			
			$response['result'] = 'Success';
			 
		}else{
			$response['result'] = 'Fail'; 
		}
		
		echo json_encode($response);
		$conn = null;
	}	