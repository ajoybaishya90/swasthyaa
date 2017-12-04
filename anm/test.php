<?php
	$date1 = date('Y-m-d');//"2017-11-10";
	$date2 = "2017-11-05";

	$diff = abs(strtotime($date2) - strtotime($date1));

	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

	//printf("%d years, %d months, %d days\n", $years, $months, $days);
	echo $days;
	
?>	


SELECT DATE_FORMAT(entry_date, '%Y/%d/%m') as record FROM patient_personal_info WHERE entry_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()

SELECT Name as name , District as district , DATE_FORMAT(entry_date, '%Y/%d/%m') as record FROM patient_personal_info WHERE entry_date BETWEEN NOW() - INTERVAL 2 DAY AND NOW()
