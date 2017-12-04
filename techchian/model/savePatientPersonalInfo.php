<?php
	
	include '../../db/dbconn.php';
	session_start();
	$chw_id = $_SESSION['pid'];
	// Personal Details
	$patientNumber = '0';
	$asha_id = '0';
	$Pname = $_POST['PName'];
	$birthDay = $_POST['birthDay'];
	$birthMonth = $_POST['birthMonth'];
	$birthYear = $_POST['birthYear'];
	$dob = $birthDay.'-'.$birthMonth.'-'.$birthYear;
	$age = $_POST['age'];
	$sex = $_POST['gender'];
	$address = $_POST['address'];
	$locality = $_POST['locality'];
	$pin = $_POST['pin'];
	$district = $_POST['district'];
	$city = $_POST['city'];
	$hfID = $_POST['hfList'];
	$familyNumber = $_POST['familyNumber'];
	$date = date('Y-m-d');
	
	//Unique Id for patient
	$sub = strtolower($Pname);
	$sub1 = substr($sub, 0, 3);
	$widget_id = str_replace(array('/','-','_'), '',$dob);
	$sub2 = substr($widget_id, 0, 4);
	$sub3 = substr($widget_id, 6, 7);
	$unique_id = $sub1.$sub2.$sub3;
	
	if(isset($_POST['ashaName'])){
		$asha_id = $_POST['ashaName'];
		$query = "INSERT INTO patient_personal_info (Unique_ID , Name , DOB , Age , Sex , Address , Area , District , State , PIN , Patient_Mobile , Family_Mobile , CHW_ID , ASHA_ID , HF_ID , Status , entry_date , Arrival_status , referenceStatus) 
			VALUES  (:Unique_ID , :Pname , :dob , :age , :sex , :address , :area , :district , :state , :pin , :patient_mobile , :family_mobile , :chw_id , :asha_id , :hf_id  ,:status , :date , :astatus , :refstatus)";
		
		$result = $conn->prepare($query);
		$result->bindValue(':Unique_ID' , $unique_id);
		$result->bindValue(':Pname' , $Pname);
		$result->bindValue(':dob' , $dob);
		$result->bindValue(':age' , $age);
		$result->bindValue(':sex' , $sex);
		$result->bindValue(':address' , $address);
		$result->bindValue(':area' , $locality);
		$result->bindValue(':district' , $district);
		$result->bindValue(':state' , 'Assam');
		$result->bindValue(':pin' , $pin);
		$result->bindValue(':patient_mobile' , $patientNumber);
		$result->bindValue(':family_mobile' , $familyNumber);
		$result->bindValue(':chw_id' , $chw_id);
		$result->bindValue(':asha_id' , $asha_id);
		$result->bindValue(':hf_id' , $hfID);
		$result->bindValue(':status' , 'Not Verified');
		$result->bindValue(':date' , $date);
		$result->bindValue(':astatus' , '0');
		$result->bindValue(':refstatus' , '0');
	
		$r= $result->execute();
		if($r){
			$patientId = $conn->lastInsertId();
			$_SESSION['patientId'] = $patientId;
			
			header("location: ../add_patient.php?successPersonalInfo");
		}else{
			header("location: ../add_patient.php?failPersonalInfo");
		}
	}
	
	if(isset($_POST['patientNumber'])){
		$patientNumber = $_POST['patientNumber'];
		//check patient mobile number
		$selectQuery="Select count(*) from patient_personal_info where Patient_Mobile = :mobile";
		$result = $conn->prepare($selectQuery);
		$result->bindParam("mobile", $patientNumber);
		$result->execute();
		$count = $result->rowCount();
		if($count == 0) {
			//Insert into database
			$query = "INSERT INTO patient_personal_info (Unique_ID , Name , DOB , Age , Sex , Address , Area , District , State , PIN , Patient_Mobile , Family_Mobile , CHW_ID , ASHA_ID , HF_ID , Status , entry_date , Arrival_status , referenceStatus) 
			VALUES  (:Unique_ID , :Pname , :dob , :age , :sex , :address , :area , :district , :state , :pin , :patient_mobile , :family_mobile , :chw_id , :asha_id , :hf_id  ,:status , :date , :astatus , :refstatus)";
		
			$result = $conn->prepare($query);
			$result->bindValue(':Unique_ID' , $unique_id);
			$result->bindValue(':Pname' , $Pname);
			$result->bindValue(':dob' , $dob);
			$result->bindValue(':age' , $age);
			$result->bindValue(':sex' , $sex);
			$result->bindValue(':address' , $address);
			$result->bindValue(':area' , $locality);
			$result->bindValue(':district' , $district);
			$result->bindValue(':state' , 'Assam');
			$result->bindValue(':pin' , $pin);
			$result->bindValue(':patient_mobile' , $patientNumber);
			$result->bindValue(':family_mobile' , $familyNumber);
			$result->bindValue(':chw_id' , $chw_id);
			$result->bindValue(':asha_id' , $asha_id);
			$result->bindValue(':hf_id' , $hfID);
			$result->bindValue(':status' , 'Not Verified');
			$result->bindValue(':date' , $date);
			$result->bindValue(':astatus' , '0');
			$result->bindValue(':refstatus' , '0');
	
			$r= $result->execute();
			if($r){
				$patientId = $conn->lastInsertId();
				$_SESSION['patientId'] = $patientId;
				
				header("location: ../add_patient.php?successPersonalInfo");
			}else{
				header("location: ../add_patient.php?failPersonalInfo");
			}
		}else{
			header("location: ../add_patient.php?exist");	
		}
	}
		
	$conn = null;