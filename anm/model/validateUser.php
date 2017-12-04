<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
		include '../../db/dbconn.php';
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "SELECT h.ID as PID , h.Name as Name , h.Email as email , h.Contact_No as mobile  , h.Designation as Designation , h.HF_ID as hf , user.Username as username FROM userid user , health_admin_info h where h.ID = user.PID and user.Username=:username AND user.Password=:password";
		$result = $conn->prepare($query);
		$result->bindParam("username", $username);
		$result->bindParam("password", $password);
		$result->execute();
		$count = $result->rowCount();
		if($count == 1) {
			while($row = $result->fetch(PDO::FETCH_ASSOC)){
				$designation = $row['Designation'];
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['pid'] = $row['PID'];
				$_SESSION['Name'] = $row['Name'];
				$_SESSION['HF_ID'] = $row['hf'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['mobile'] = $row['mobile'];
				
				
				if($designation == 'Auxiliary Nurse Midwife'){
					header('location:../dashboard.php');
				}
				if($designation == 'Lab Techchian'){
					header('location:../../techchian/dashboard.php');
				}
				if($designation == 'Medical Officer'){
					header('location:../../doctor/dashboard.php');
				}
				 
			}
		}else{
			header('location:../../login.php?fail'); 
		}
		$conn = null;
}		