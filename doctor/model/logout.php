<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['pid']);
	unset($_SESSION['Name']);
	unset($_SESSION['patientId']);
	session_unset();
	session_destroy();
	header('location:../../login.php');
 