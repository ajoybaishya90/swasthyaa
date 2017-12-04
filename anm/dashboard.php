<?php
    session_start();                        
?>
<!DOCTYPE html>
<html lang="eng">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Swasthyaa</title>
<link rel="icon" href="favicon.png" type="image/png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/bootstrap/css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link href="../assets/css/anm/app.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="../assets/js/metisMenu.min.js"></script>
<script src="../assets/js/sb-admin-2.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(pieChartOne);
	function pieChartOne(){ 
		$.ajax({
			type: "POST",
			url: 'model/pieChartOne.php',
			dataType: 'JSON',
			success: function(data){ 
                    for(var i in data){
						drawPieChartOne(data[i].VPNumber , data[i].NVPNumber);
						$('#vp').html(data[i].VPNumber);
						$('#nvp').html(data[i].NVPNumber);
					}			
					
				}		
		});
	}
	
	function drawPieChartOne(Verified , NotVerified){
		var nonVerifiedColor = '#606c38';
		var verifiedColor = '#e5b45c';
		var data = google.visualization.arrayToDataTable([
			['Patient', 'Record'],
			['Verified', parseInt(Verified)],
			['NotVerified', parseInt(NotVerified)]
		]);

		var options = {
			legend:'none',
			//pieSliceText: 'value',
			slices: {
				0: { color: verifiedColor },
				1: { color: nonVerifiedColor }
			}
		};
		var chart = new google.visualization.PieChart(document.getElementById('verified_patient'));
		chart.draw(data, options);
		pieChartTwo();
	}
	
	function pieChartTwo(){ 
		$.ajax({
			type: "POST",
			url: 'model/pieChartTwo.php',
			dataType: 'JSON',
			success: function(data){ 
                    for(var i in data){
						drawPieChartTwo(data[i].Total);
						$('#tp').html(data[i].Total);
					}			
					
				}		
		});
	}
	
	function drawPieChartTwo(total){
		var color = '#1b3e78';
		var data = google.visualization.arrayToDataTable([
			['Patient', 'Record'],
			['Total', parseInt(total)],
		]);

		var options = {
			legend:'none',
			//pieSliceText: 'value',
			slices: {
				0: { color: color }
			}
		};
		var chart = new google.visualization.PieChart(document.getElementById('total_patient'));
		chart.draw(data, options);
	}
 
</script>
<script>
$(document).ready(function() {
	$('.dropdown-toggle').dropdown();
	getRecentPatientList();
});

function getRecentPatientList(){
	$('.thead').empty();
	$('.tbody').empty();
	$.ajax({
		type: "POST",
		url: 'model/getRecentPatient.php',
		dataType: 'JSON',
		success: function(data){ 
		    $('.thead').append('<th>PATIENT NAME</th><th>SLIP FILLED</th><th>MOBILE VERIFICATION</th><th>VISITED DMC</th><th>DMC MOBILE VERIFICATION</th><th>TEST RESULT</th><th>REPORT COLLECTED</th><th>ACTION</th>');
            for(var i in data){
				$('.tbody').append('<tr><td>'+data[i].Patient_Name+'</td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td>To Be Done</td></tr>');		
			}				
		}		
	});
}

function getFilteredList(){
	var month = $('#month').val();
	var year = $('#year').val();
	
	if(month == '00'){
		alert('Please choose month');
	}else if(year == '00'){
		alert('Please choose year');
	}else{
		//$('.thead').empty();
		$('.tbody').empty();
		$.ajax({
			type: "POST",
			data: { month : month , year : year },
			url: 'model/getRecentPatientFilter.php',
			dataType: 'JSON',
			success: function(data){ 
				if(jQuery.isEmptyObject(data)){
					$('.tbody').append('<tr><td colspan="8" style="font-size : 14px;">No Data Found</td></tr>');		
				}else{
				//$('.thead').append('<th>PATIENT NAME</th><th>SLIP FILLED</th><th>MOBILE VERIFICATION</th><th>VISITED DMC</th><th>DMC MOBILE VERIFICATION</th><th>TEST RESULT</th><th>REPORT COLLECTED</th><th>ACTION</th>');
					for(var i in data){
						$('.tbody').append('<tr><td>'+data[i].Patient_Name+'</td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td><img src="../assets/image/error.png" ></td><td>To Be Done</td></tr>');		
					}
				}					
			}		
		});
	}
}

function viewpatientYearly(){
	$('#monthSelect').hide();
}

function viewpatientMonthly(){
	$('#monthSelect').show();
}



</script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
th , td{
	text-align : center; font-size : 12px;
}
</style>
</head>
<body>
<div>
	<?php include 'header.php'; ?>
</div>
<div id="wrapper">
	<div id="sidebar-wrapper" class="col-md-2" style="">
        <div id="sidebar">
            <ul class="nav list-group">
                <li class="active">
                    <a href="dashboard.php"><img src="../assets/image/dw.png"/>&nbsp;&nbsp; Dashboard</a>
                </li>
                <li>
                    <a href="new_patient.php"><img src="../assets/image/edit.png">&nbsp;&nbsp; New referral slip</a>
                </li>
                <li>
                    <a href="forw_patient.php"><img src="../assets/image/eye.png">&nbsp;&nbsp;Forwarded referral slip</a>
                </li>
                <li>
					<a href="asha_list.php"><img src="../assets/image/pro.png">&nbsp;&nbsp;&nbsp; ASHA Details</a>
                </li>
                <li>
                    <a href="anm_pro.php"><img src="../assets/image/p.png">&nbsp;&nbsp;&nbsp; Profile</a>              
                </li>
            </ul>
        </div>
    </div>
	<div id="main-wrapper" class="col-md-10 pull-right" style="">
        <div id="main">
			<div class="row form-group" style="height: 65px; border-top: 11px solid #f1635d; background-color: #f4f4f5;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14);">
				<div class="col-md-5 col-lg-5">
					<ul class="nav nav-pills" style="margin-top : 10px;">
						<!--<li><input type="button" class="btn btn-primary" value="TODAY" onclick=""/></li>
						<li style="margin-left : 20px;"><input type="button" class="btn btn-primary" value="MONTHLY" onclick=""/></li>-->
					</ul>
				</div>
				<div class="col-md-3 col-md-offset-4 col-lg-3 col-lg-offset-4" id="" style="text-align : right;">
					<i class="fa fa-edit fa-fw" style="color: #a0a0a0;  margin-top:18px;"></i>&nbsp;&nbsp;<b style="color: #a0a0a0; margin-top : 18px; font-size : 18px; font-weight : 500;" >Dashboard</b>
				</div>
			</div>
		
			<div class="row" style="margin-top : 15px;">
				<div class="col-md-12 col-lg-12">
					<h5 style="font-weight : 600;">Patient Arrival Details</h5>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4 col-md-offset-1 col-lg-4 col-lg-offset-1">
					<div id="total_patient" style="height: 300px; text-align : center;"></div>
					<div id="" style="width: 100%; height: 40px; text-align: center;">
						<button class="btn btn-default" style="width: 45px; background-color :#1b3e78!important; color :#fff; border-radius: 4px; height: 28px; line-height: 16px;"><b id="tp"></b></button>&nbsp;&nbsp;Total Patient Enrolled
					</div>
				</div>
				<div class="col-md-4 col-lg-4">
					<div id="verified_patient" style="height: 300px;"></div>
					<div id="" style="width: 100%; height: 40px; text-align: center;">
						<button class="btn btn-default" style=" width: 45px; background-color :#e5b45c !important; color : #fff; border-radius: 4px; height: 28px; line-height: 16px;"><b id="vp"></b></button>&nbsp;&nbsp;Verified Patients<br /><br />
						<button class="btn btn-default button2" style="width: 45px; background-color :#606c38 !important; color : #fff; border-radius: 4px; height: 28px; line-height: 16px;"><b id="nvp"></b></button>&nbsp;&nbsp;Non Verified Patients</div>
				</div>
			</div><hr style="margin-top : 70px;"/>

			<div class="row" style="margin-bottom:20px;">
			    <div class="col-md-4 col-lg-4">
					<h5 style="font-weight : 600;">Recent Patient Timeline</h5>
				</div>
				 <div class="col-md-8 col-lg-8" style="text-align : right;">
					<div class="form-inline">
						<select class="form-control" name="" id="month" onchange="getFilteredList();">
							<option value="00">Choose Month</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select class="form-control" id="year">
							<option value="00">Choose Year</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-bottom:40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">				
					<div style="text-align: center;">
					<table class="table table-bordered table-hover" style="margin-bottom : 40px">
						<thead class="thead" style="background-color: #f7a9a5; height : 50px;">
							<tr>
								<th>PATIENT NAME</th><th>SLIP FILLED</th><th>MOBILE VERIFICATION</th><th>VISITED DMC</th><th>DMC MOBILE VERIFICATION</th><th>TEST RESULT</th><th>REPORT COLLECTED</th><th>ACTION</th>
							</tr>
						</thead>
						<tbody class="tbody"></tbody>
					</table>
					</div>
				</div>
			</div>
        </div>                        
    </div>
</div>
<div class="row">
	<?php include 'footer.php'; ?>
</div>
</body>
</html>
