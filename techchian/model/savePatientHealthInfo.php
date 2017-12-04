<?php
    session_start();
	
	$coughDays = '0';
	$feverDays = '0';
	$weightDays = '0';
	$sweatDays = '0';
	$coughsputumDays = '0';
	
	
	// Health Details
	if(isset($_POST['coughDays'])){
		$coughDays = $_POST['coughDays'];
	}
	if(isset($_POST['feverDays'])){
		$feverDays = $_POST['feverDays'];
	}
	if(isset($_POST['weightDays'])){
		$weightDays = $_POST['weightDays'];
	}
	if(isset($_POST['sweatDays'])){
		$sweatDays = $_POST['sweatDays'];
	}
	if(isset($_POST['coughsputumDays'])){
		$coughsputumDays = $_POST['coughsputumDays'];
	}
	
	//Population Details
	$contact = 'No';
	$refugee = 'No';
	$diabetes = 'No';
	$urban = 'No';
	$tobacco = 'No';
	$healthcare = 'No';
	$prison = 'No';
	$migrant = 'No';
	$miner = 'No';
	$other = 'No';
		
	$date = date('Y-m-d');
	
	include '../../db/dbconn.php';
	
	$query = "INSERT INTO patient_health_info (PID , Caugh , Fever , Loss_of_Weight , Night_Sweat , Blood_in_Sputum , Population_ID , date) 
		VALUES  (:PID , :Caugh , :Fever , :Loss_of_Weight , :Night_Sweat , :Blood_in_Sputum , :Population_ID , :Date)";
		
	$result = $conn->prepare($query);
	$result->bindValue(':PID' , $_SESSION['patientId']);
	$result->bindValue(':Caugh' , $coughDays);
	$result->bindValue(':Fever' , $feverDays);
	$result->bindValue(':Loss_of_Weight' , $weightDays);
	$result->bindValue(':Night_Sweat' , $sweatDays);
	$result->bindValue(':Blood_in_Sputum' , $coughsputumDays);
	$result->bindValue(':Population_ID' , '0');
	$result->bindValue(':Date' , $date);
	
	$r= $result->execute();
	if($r){
		
		$last_id_in_health = $conn->lastInsertId();
		
		if(isset($_POST['Contact'])){
			$contact = $_POST['Contact'];
		}
		if(isset($_POST['Refugee'])){
			$refugee = $_POST['Refugee'];
		}
		if(isset($_POST['Diabetes'])){
			$diabetes = $_POST['Diabetes'];
		}
		if(isset($_POST['Urban'])){
			$urban = $_POST['Urban'];
		}
		if(isset($_POST['Tobacco'])){
			$tobacco = $_POST['Tobacco'];
		}
		if(isset($_POST['Health'])){
			$healthcare = $_POST['Health'];
		}
		if(isset($_POST['Prison'])){
			$prison = $_POST['Prison'];
		}
		if(isset($_POST['Migrant'])){
			$migrant = $_POST['Migrant'];
		}
		if(isset($_POST['Miner'])){
			$miner = $_POST['Miner'];
		}
		if(isset($_POST['Other'])){
			$other = $_POST['Other'];
		}
		
		$query = "INSERT INTO populations (Contact , Diabetes , Tobacco , Prison , Miner , Migrant  , Refugee , Urban , Health_worker , Other) 
		VALUES  (:Contact , :Diabetes , :Tobacco , :Prison , :Miner , :Migrant  , :Refugee , :Urban , :Health_worker , :Other)";
		
		$result = $conn->prepare($query);
		$result->bindValue(':Contact' , $contact);
		$result->bindValue(':Diabetes' , $diabetes);
		$result->bindValue(':Tobacco' , $tobacco);
		$result->bindValue(':Prison' , $prison);
		$result->bindValue(':Miner' , $miner);
		$result->bindValue(':Migrant' , $migrant);
		$result->bindValue(':Refugee' , $refugee);
		$result->bindValue(':Urban' , $urban);
		$result->bindValue(':Health_worker' , $healthcare);
		$result->bindValue(':Other' , $other);
	
		$r= $result->execute();
		if($r){
			$last_id = $conn->lastInsertId();
			$update_query = "UPDATE patient_health_info SET Population_ID = :pid WHERE ID = :hid";
			$result = $conn->prepare($update_query);
			$result->bindValue(':pid' , $last_id);
			$result->bindValue(':hid' , $last_id_in_health);
			$result->execute();
			header("location: ../add_patient.php?successHealthInfo");
		}
	}else{
			header("location: ../add_patient.php?failHealthInfo");
	    }
	$conn = null;
	
	
	