<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$did = $_POST['did'];
		$sample = $_POST['sample'];
		
		$mtb = $_POST['mtb'];
		$rif = $_POST['rif'];
		$test = $_POST['test'];
		$code = $_POST['code'];
		
		$date = date('Y-m-d');
		$response = array();
		
		$query = "INSERT INTO cbnaat (PID , DID , Sample ,MTB , Rif , Test , Error_code , Status , D_tested , D_reported , Reported_by) VALUES
			(:pid , :did , :sample , :mtb , :rif , :test , :code , :status , :d_date , :r_date , :reported_by)";
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':did' , $did);
		$result->bindValue(':sample' , $sample);
		
		$result->bindValue(':mtb' , $mtb);
		$result->bindValue(':rif' , $rif);
		$result->bindValue(':test' , $test);
		$result->bindValue(':code' , $code);
		$result->bindValue(':status' , '0');
		$result->bindValue(':d_date' , $date);
		$result->bindValue(':r_date' , $date);
		$result->bindValue(':reported_by' , '');
		
		$r= $result->execute();
		
		if($r){
			$updateQuery = "Update testdetails_master set status = :status where PID=:pid and DID=:did and testID=:testID";
			$r = $conn->prepare($updateQuery);
			$r->bindValue(':pid' , $pid);
			$r->bindValue(':did' , $did);
			$r->bindValue(':testID' , '7');
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