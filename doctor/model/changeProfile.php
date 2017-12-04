<?php
	require_once('ImageManipulator.php');
	$validExtensions = array('.jpg', '.jpeg', '.png');
	$file = $_FILES['file'];
	$fileExtension = strrchr($_FILES['file']['name'], ".");
	if(in_array($fileExtension, $validExtensions)) {
		session_start();
		$pid= $_SESSION['pid'];
		$filename = $pid . '.jpg';
		$manipulator = new ImageManipulator($_FILES['file']['tmp_name']);
		// resizing to 500x600
		$newImage = $manipulator->resample(500, 600);
		// saving file to uploads folder
		$manipulator->save("../../assets/temp/" . $filename);
		header("location: ../doctor_pro.php");
		exit(); 
	}else{
		header("location: ../doctor_pro.php?extensionErrior");
	}