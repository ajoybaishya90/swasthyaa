<?php
    if(isset($_POST['pid'])){
		
		include '../../db/dbconn.php';
		$pid = $_POST['pid'];
		$dataId = $_POST['dataId'];
		$antiTB = $_POST['antiTB'];
		$preTB = $_POST['preTB'];
		$exam = $_POST['exam'];
		$ntm = $_POST['ntm'];
		$symptom = $_POST['symptom'];
		$duration = $_POST['duration'];
		$response = array();
		
		$query = "UPDATE diagnosis_n SET  Anti_TB_Rx =:antiTB , Presumptive_TB=:preTB , Repeat_exam=:exam , Presumptive_NTM=:ntm , Symptom=:symptom, Duration=:duration WHERE ID = :id and PID =:pid";

		$result = $conn->prepare($query);
		$result->bindValue(':pid' , $pid);
		$result->bindValue(':id' , $dataId);
		$result->bindValue(':antiTB' , $antiTB);
		$result->bindValue(':preTB' , $preTB);
		$result->bindValue(':exam' , $exam);
		$result->bindValue(':ntm' , $ntm);
		$result->bindValue(':symptom' , $symptom);
		$result->bindValue(':duration' , $duration);
		$r= $result->execute();
		
		if($r){
			$response['result'] = 'Success'; 
		}else{
			$response['result'] = 'Fail'; 
		}
		
		echo json_encode($response);
		$conn = null;
	}	