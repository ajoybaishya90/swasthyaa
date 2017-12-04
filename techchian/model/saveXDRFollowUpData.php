<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$inh = $_POST['inh'];
		$mdr = $_POST['mdr'];
		$shorterRegimen = $_POST['shorterRegimen'];
		$modifiedRegimen = $_POST['modifiedRegimen'];
		$xdrTB = $_POST['xdrTB'];
		$mixedPattern = $_POST['mixedPattern'];
		$regimenFQ = $_POST['regimenFQ'];
		$drugXDR = $_POST['drugXDR'];
		$failureMDR = $_POST['failureMDR'];
		$failureXDR = $_POST['failureXDR'];
		$dmPattern = $_POST['dmPattern'];
		$treatment = $_POST['treatment'];
		$tvalue = $_POST['tvalue'];
		$date = date('Y-m-d');
		$response = array();
		
		$query = "INSERT INTO follow_xdr (PID , INH , MDR , Shorter_regimen , Modified_regimen , xdr_TB , Mixed_pattern , Regimen_fq , Drug_XDR , Drug_failure_MDR , Drug_failure_XDR , Drug_mixed_pattern , treatment , tvalue , date) VALUES
			(:pid , :inh , :mdr , :sr , :mr , :xdrTB , :mp , :rfq , :drugXDR , :dfMDR , :dfXDR , :dmp , :treatment , :tvalue , :date)";
			
		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':inh' , $inh);
		$result->bindValue(':mdr' , $mdr);
		$result->bindValue(':sr' , $shorterRegimen);
		$result->bindValue(':mr' , $modifiedRegimen);
		$result->bindValue(':xdrTB' , $xdrTB);
		$result->bindValue(':mp' , $mixedPattern);
		$result->bindValue(':rfq' , $regimenFQ);
		$result->bindValue(':drugXDR' , $drugXDR);
		$result->bindValue(':dfMDR' , $failureMDR);
		$result->bindValue(':dfXDR' , $failureXDR);
		$result->bindValue(':dmp' , $dmPattern);
		$result->bindValue(':treatment' , $treatment);
		$result->bindValue(':tvalue' , $tvalue);
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