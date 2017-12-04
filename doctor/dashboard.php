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
<link href="../assets/css/techchian/app.css" rel="stylesheet">
<link href="../assets/css/techchian/lab.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
						drawPieChartOne(data[i].Total);
						$('#trequest').html(data[i].Total);
					}			
					
				}		
		});
	}
	
	function drawPieChartOne(total){
		var color = '#1b3e78';
		var data = google.visualization.arrayToDataTable([
			['Patient', 'Record'],
			['Total', parseInt(total)]
		]);

		var options = {
			legend:'none',
			//pieSliceText: 'value',
			slices: {
				0: { color: color }
			},
		};
		var chart = new google.visualization.PieChart(document.getElementById('testRequested'));
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
						$('#tdone').html(data[i].Complete);
						$('#tpending').html(data[i].Incomplete);
						drawPieChartTwo(data[i].Complete , data[i].Incomplete);
					}			
					
				}		
		});
	}
	
	function drawPieChartTwo(Complete , Incomplete){
		var complete = '#e5b45c';
		var incomplete = '#606c38';
		var data = google.visualization.arrayToDataTable([
			['Patient', 'Record'],
			['Complete', parseInt(Complete)],
			['Pending', parseInt(Incomplete)]
		]);

		var options = {
			legend:'none',
			//pieSliceText: 'value',
			slices: {
				0: { color: complete },
				1: { color: incomplete }
			}
		};
		var chart = new google.visualization.PieChart(document.getElementById('testPending'));
		chart.draw(data, options);
	}
</script>
<script>
$(document).ready(function() {
	$('.dropdown-toggle').dropdown();
	getRecentTestList();
});

function getRecentTestList(){
	
	var status = '';
	var suggest = '';
	$('.thead').empty();
	$('.tbody').empty();
	$.ajax({
		type: "POST",
		url: 'model/getRecentTestListDetails.php',
		dataType: 'JSON',
		success: function(data){ 
		    $('.thead').append('<tr><th>PATIENT NAME</th><th>PATIENT CATEGORY</th><th>REFERRAL DATE</th><th>STATUS</th><th>ACTION REQUIRED</th></tr>');
            for(var i in data){
				if(data[i].status == '0'){
					$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].pcat+'</td><td>'+data[i].date+'</td><td style="color : red;">Pending</td><td><input type="button" style="background : transparent; border : none; color : #3ea0dc;" value="Suggest Requested Test" onclick="patientDetails('+data[i].pid+' , '+data[i].dataID+')"></td></tr>');		
				}
				if(data[i].status == '1'){
					$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].pcat+'</td><td>'+data[i].date+'</td><td style="color : red;">Pending</td><td><input type="button" style="background : transparent; border : none; color : #3ea0dc" value="Edit Requested Test" onclick="updateTestList('+data[i].pid+' , '+data[i].dataID+')"></td></tr>');		
				}
				if(data[i].status == '2'){
					$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].pcat+'</td><td>'+data[i].date+'</td><td>Completed</td><td><input type="button" style="background : transparent; border : none; color : #3ea0dc" value="View Report" onclick="viewReport('+data[i].pid+' , '+data[i].dataID+')"></td></tr>');		
				}
			}				
		}		
	});
}

function patientDetails(id , dataID){
	window.location.href = "http://localhost/swasthyaa/doctor/details.php?id="+id+"&did="+dataID;
}

function updateTestList(id , dataID){
	window.location.href = "http://localhost/swasthyaa/doctor/updatetest.php?id="+id+"&did="+dataID;
}

function showPatientDetails(pid){
	$.ajax({
		type: "POST",
		url: 'model/getPatientDetailsTech.php',
		data: { pid : pid },
		dataType: 'JSON',
		success: function(data){ 
				$('#infoUpdateModal').modal('toggle');
				for(var i in data){	
				    $('#PName').html(data[i].PName);
					$('#DOB').html(data[i].DOB);
					$('#Address').html(data[i].Address);
					$('#Mobile').html(data[i].PMobile);
					$('#FMobile').html(data[i].FMobile);
					
					$('#caugh').html(data[i].Caugh);
					$('#fever').html(data[i].Fever);
					$('#weight').html(data[i].Weight);
					$('#sweat').html(data[i].Sweat);
					$('#sputum').html(data[i].Sputum);
					
					$('#contact').html(data[i].Contact);
					$('#refugee').html(data[i].Refugee);
					$('#diabetes').html(data[i].Diabetes);
					$('#urban').html(data[i].Urban);
					$('#tobacco').html(data[i].Tobacco);
					$('#health').html(data[i].Health_worker);
					$('#prison').html(data[i].Prison);
					$('#migrant').html(data[i].Migrant);
					$('#miner').html(data[i].Miner);
					$('#other').html(data[i].Other);
					
					$('#referring').html(data[i].Referring_Lab);
					$('#referred').html(data[i].Referred_Lab);
				}
		}		
	});
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
	text-align : center;
}
a:hover{
	text-decoration : none;
}



</style>
</head>
<body>
<div>
<?php include 'header.php'; ?>
</div>
<div id="wrapper">
	<div id="sidebar-wrapper" class="col-md-2">
        <div id="sidebar">
            <ul class="nav list-group">
                <li class="active">
					<a class="" href="dashboard.php"><img src="../assets/image/dw.png" id="dashboardIcon"/>&nbsp;&nbsp; Dashboard</a>
				</li>
				<li>
					<a class="" href="patientDetails.php"><img src="../assets/image/edit.png" id="pdIcon">&nbsp;&nbsp;Patient Details</a>
				</li>
				<li>
					<a class="" href="add_patient.php"><img src="../assets/image/edit.png" id="addpIcon">&nbsp;&nbsp;Lab Technician Details</a>
				</li>
	     
				<li>
					<a class="" href="doctor_pro.php"><img src="../assets/image/p.png" id="profileIcon">&nbsp;&nbsp;&nbsp; Profile</a>              
				</li>
            </ul>
        </div>
    </div>
    <div id="main-wrapper" class="col-md-10 pull-right" style="overflow:">
        <div id="main">
			<div class="row form-group" style="height: 65px; border-top: 11px solid #606c38; background-color: #f4f4f5;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14);">
				<div class="col-md-5 col-lg-5">
					<ul class="nav nav-pills" style="margin-top : 10px;">
						<!--<li><input type="button" class="btn btn-primary" value="TODAY" id="todayBtn" onclick=""/></li>
						<li style="margin-left : 20px;"><input type="button" class="btn btn-primary" value="MONTHLY" id="monthlyBtn" onclick=""/></li>-->
					</ul>
				</div>
				<div class="col-md-3 col-md-offset-4 col-lg-3 col-lg-offset-4" id="" style="text-align : right;">
					<i class="fa fa-edit fa-fw" id="headingIcon"></i>&nbsp;<b style="color: #a0a0a0; margin-top : 18px; font-size : 18px; font-weight : 500;" >Dashboard</b>
				</div>
			</div>
		
			<div class="row" style="margin-top : 15px;">
				<div class="col-md-12 col-lg-12">
					<h5 style="font-weight : 600;">Patient Arrival Details</h5>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-6 col-lg-6" style="">
					<div id="testRequested" style="height: 300px; text-align : center;"></div>
					<div id="" style="width: 100%; text-align: center;">
						<button class="btn btn-default" style="width: 45px; background-color :#1b3e78!important; color :#fff; height :28px; line-height : 16px; border-radius : 4px;"><b id="trequest"></b></button>&nbsp;&nbsp;<a href="patientDetails.php?value=2">Patients Test Requested Today</a>
					</div>
				</div>
				<div class="col-md-6 col-lg-6">
					<div id="testPending" style="height: 300px;"></div>
					<div id="" style="width: 100%; text-align: center;">
						<button class="btn btn-default" style="width: 45px; background-color :#e5b45c !important; color : #fff; height :28px; line-height : 16px; border-radius : 4px;"><b id="tdone"></b></button>&nbsp;&nbsp;<a href="patientDetails.php?value=1">Patient Test Report Sent</a><br /><br />
						<button class="btn btn-default button3" style="width: 45px; background-color :#606c38 !important; color : #fff; height :28px; line-height : 16px; border-radius : 4px; margin-left: 28px;"><b id="tpending"></b></button>&nbsp;&nbsp;<a href="patientDetails.php?value=5">Patient's Test Report Pending </a>
					</div>
				</div>
			</div><hr style="margin-top : 70px;"/>
		
			<div class="row">
			    <div class="col-md-12 col-lg-12">
					<h5 style="font-weight : 600;">Patient Arrival Details</h5>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >				
					<div style="text-align: center; margin-top : 20px;">
					<table class="table table-bordered table-hover" style="margin-bottom : 70px;">
						<thead class="thead" style="background: #cfd2c3; font-size : 12px;"></thead>
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

<!-- Information Update Modal -->
<div class="modal fade" id="infoUpdateModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h4 id="PName"></h4>
		</div>
		<div class="modal-body">
			<div class="row">
			<div class="col-md-6 col-lg-6" style="background : #fff !important;">
				<table class="table table-bordered table-hover">
					<tbody>
						<tr><td colspan="2" style="text-align : left">Personal Details</td></tr>
						<tr><td>DOB</td><td id="DOB"></td></tr>
						<tr><td>Address</td><td id="Address"></td></tr>
						<tr><td>Mobile</td><td id="Mobile"></td></tr>
						<tr><td>Family Mobile</td><td id="FMobile"></td></tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-6 col-lg-6" style="background : #fff !important;">
				<table class="table table-bordered table-hover">
					<tbody>
						<tr><td colspan="2" style="text-align : left">Health Details</td></tr>
						<tr><td>Cough</td><td id="caugh"></td></tr>
						<tr><td>Fever</td><td id="fever"></td></tr>
						<tr><td>Loss of Weight</td><td id="weight"></td></tr>
						<tr><td>Night Sweat</td><td id="sweat"></td></tr>
						<tr><td>Blood in Cough/Sputum</td><td id="sputum"></td></tr>
					</tbody>
				</table>
			</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-6" style="background : #fff !important;">
				<table class="table table-bordered table-hover">
					<tbody>
						<tr><td colspan="2" style="text-align : left">Key Population Indicator</td></tr>
						<tr><td>Contact of TB/MDR TB Patient</td><td id="contact"></td></tr>
						<tr><td>Refugee</td><td id="refugee"></td></tr>
						<tr><td>Diabetes</td><td id="diabetes"></td></tr>
						<tr><td>Urban Slum</td><td id="urban"></td></tr>
						<tr><td>Tobacco</td><td id="tobacco"></td></tr>
						<tr><td>Health Care Worker</td><td id="health"></td></tr>
						<tr><td>Prison</td><td id="prison"></td></tr>
						<tr><td>Migrant</td><td id="migrant"></td></tr>
						<tr><td>Miner</td><td id="miner"></td></tr>
						<tr><td>Other</td><td id="other"></td></tr>
					</tbody>
				</table>
				</div>
				<div class="col-md-6 col-lg-6" style="background : #fff !important;">
				<table class="table table-bordered table-hover">
					<tbody>
						<tr><td colspan="2" style="text-align : left">Reffering Details</td></tr>
						<tr><td colspan="2" style="text-align : left">Reffering Health Facility</td></tr>
						<tr><td colspan="2" style="text-align : left" id="referring"></td></tr>
						<tr><td colspan="2" style="text-align : left">Referred health facility</td></tr>
						<tr><td colspan="2" style="text-align : left" id="referred"></td></tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>
</body>
</html>