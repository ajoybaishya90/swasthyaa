<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['pid']);
	unset($_SESSION['Name']);
	unset($_SESSION['patientId']);
	unset($_SESSION['email']);
	unset($_SESSION['mobile']);
	session_unset();
	session_destroy();
	header('location:../../login.php');
 