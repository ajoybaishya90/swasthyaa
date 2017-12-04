<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$response = array();
		
		$query = "select * from reference_master where PID = :id and status = '0'";
		$result = $conn->prepare($query);
		$result->bindParam("id", $pid);
		//$result->bindParam("status", '0');
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$pCategory = $row['pCategory'];
			$dataID = $row['dataID'];
		}
		
		if($pCategory == 'Normal TB - Diagnosis'){
			$query = "select d.Anti_TB_Rx as anti , d.Presumptive_TB as pretb , d.Repeat_exam as exam , d.Presumptive_NTM as ntm , d.Symptom as symptom , d.Duration as duration from diagnosis_n d where d.ID = :id";
			$normalTB = $conn->prepare($query);
			$normalTB->bindParam("id", $dataID);
			$normalTB->execute();
			while($row = $normalTB->fetch(PDO::FETCH_ASSOC)){
				$antiTB = $row['anti'];
				$preTB = $row['pretb'];
				$exam = $row['exam'];
				$ntm = $row['ntm'];
				$symptom = $row['symptom'];
				$duration = $row['duration'];
				$category = 'Normal TB - Diagnosis';
				
				$response[] = array('dataID'=>$dataID , 'antiTB'=>$antiTB , 'preTB'=>$preTB , 'exam'=>$exam , 'ntm'=>$ntm , 'symptom'=>$symptom , 'duration'=>$duration , 'category'=>$category);
			
			}
		}
		
		
		echo json_encode($response);
		$conn=null;
}		