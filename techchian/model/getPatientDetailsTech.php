<?php
	include '../../db/dbconn.php';
	$response = array();
	$pid = $_POST['pid'];
	
	$query = "Select p.Name as PName , p.DOB as DOB , p.Address as Address , p.Patient_Mobile as PMobile , p.Family_Mobile as FMobile , h.Caugh as Caugh , h.Fever as Fever , h.Loss_of_Weight as Weight , h.Night_Sweat as Sweat , h.Blood_in_Sputum as Blood from patient_personal_info p , patient_health_info h where p.ID = h.PID and p.id='$pid'";
	
	if($result = $conn->prepare($query)) {
		$result->execute();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$response[] = array('PName'=>$row['PName'] , 'DOB'=>$row['DOB'], 'Address'=>$row['Address'] , 'PMobile'=>$row['PMobile'] , 'FMobile'=>$row['FMobile'] , 'Caugh'=>$row['Caugh'], 'Fever'=>$row['Fever'] , 'Weight'=>$row['Weight'] , 'Sweat'=>$row['Sweat'], 'Sputum'=>$row['Blood']);
		}
	}
	
	$query = "Select hf.Name as Referred_Lab from referral_info r , hf_info hf where r.Referred_Lab_ID = hf.ID and r.PID = '$pid'";
	if($hr = $conn->prepare($query)) {
		$hr->execute();
		while($row = $hr->fetch(PDO::FETCH_ASSOC)){
			$response[] = array('Referred_Lab'=>$row['Referred_Lab']);
		}
	}
	
	$query = "Select hf.Name as Referring_Lab from referral_info r , hf_info hf where r.Referring_HF_ID = hf.ID and r.PID = '$pid'";
	if($hr = $conn->prepare($query)) {
		$hr->execute();
		while($row = $hr->fetch(PDO::FETCH_ASSOC)){
			$response[] = array('Referring_Lab'=>$row['Referring_Lab']);
		}
	}
	
	$query = "select p.* , h.PID as PID from populations p , patient_health_info h where p.ID=h.Population_ID and h.PID = '$pid'";
	if($pr = $conn->prepare($query)) {
		$pr->execute();
		while($row = $pr->fetch(PDO::FETCH_ASSOC)){
			$response[] = array('Contact'=>$row['Contact'],'Diabetes'=>$row['Diabetes'],'Tobacco'=>$row['Tobacco'],'Prison'=>$row['Prison'],'Miner'=>$row['Miner'],'Migrant'=>$row['Migrant'],'Refugee'=>$row['Refugee'],'Urban'=>$row['Urban'],'Health_worker'=>$row['Health_worker'],'Other'=>$row['Other'],);
		}
	}
	
	
	
	echo json_encode($response);
	$conn = null;		