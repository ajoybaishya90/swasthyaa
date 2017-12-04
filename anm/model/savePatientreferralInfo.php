<?php
	
	session_start();
	$patientId = $_SESSION['patientId'];
	
	// Refferral Details
	$refferedTo = $_POST['referred_to'];
	$referring = $_POST['referring'];
	$date = date('Y-m-d');
	
	include '../../db/dbconn.php';
	
	$query = "INSERT INTO referral_info (PID , Datee , Referred_Lab_ID , Referring_HF_ID , Referred_by_ID) 
		VALUES  (:PID , :Date , :Referred_Lab_ID , :Referring_HF_ID , :Referred_by_ID)";
		
	$result = $conn->prepare($query);
	$result->bindValue(':PID' , $_SESSION['patientId']);
	$result->bindValue(':Date' , $date);
	$result->bindValue(':Referred_Lab_ID' , $refferedTo);
	$result->bindValue(':Referring_HF_ID' , $referring);
	$result->bindValue(':Referred_by_ID' , $_SESSION['pid']);
	
	$r= $result->execute();
	if($r){
		header("location: ../new_patient.php?successReferralInfo");
	}else{
		header("location: ../new_patient.php?failReferralInfo");
	}
	
	$conn = null;
	
	
	