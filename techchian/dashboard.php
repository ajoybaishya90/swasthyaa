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
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.min.css" rel="stylesheet"/>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
						$('#tp').html(data[i].Total);
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
		var chart = new google.visualization.PieChart(document.getElementById('total_patient'));
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
						$('#pa').html(data[i].Arrival);
						$('#npa').html(data[i].NArrival);
						drawPieChartTwo(data[i].Arrival , data[i].NArrival);
					}			
					
				}		
		});
	}
	
	function drawPieChartTwo(Arrival , NArrival){
		var arrived = '#e5b45c';
		var notarrived = '#606c38';
		var data = google.visualization.arrayToDataTable([
			['Patient', 'Record'],
			['Arrived', parseInt(Arrival)],
			['Not Arrived', parseInt(NArrival)]
		]);

		var options = {
			legend:'none',
			//pieSliceText: 'value',
			slices: {
				0: { color: arrived },
				1: { color: notarrived }
			}
		};
		var chart = new google.visualization.PieChart(document.getElementById('patientArrival'));
		chart.draw(data, options);
		pieChartThree();
	}
	
	function pieChartThree(){ 
		$.ajax({
			type: "POST",
			url: 'model/pieChartThree.php',
			dataType: 'JSON',
			success: function(data){ 
                    for(var i in data){
						$('#testdone').html(data[i].Complete);
						$('#testpending').html(data[i].Pending);
						drawPieChartThree(data[i].Pending , data[i].Complete);
					}			
					
				}		
		});
	}
	
	function drawPieChartThree(pending , complete){
		var completeColor = '#606c38';
		var pendingColor = '#e5b45c';
		var data = google.visualization.arrayToDataTable([
			['Patient', 'Record'],
			['Lab Test Pending', parseInt(pending)],
			['Lab Test Done', parseInt(complete)]
		]);

		var options = {
			legend:'none',
			//pieSliceText: 'value',
			slices: {
				0: { color: completeColor },
				1: { color: pendingColor }
			}
		};
		var chart = new google.visualization.PieChart(document.getElementById('labTest'));
		chart.draw(data, options);
		pieChartThree();
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
		url: 'model/getRecentPatientList.php',
		dataType: 'JSON',
		success: function(data){ 
		    $('.thead').append('<tr><th>PATIENT ID</th><th>PATIENT NAME</th><th>SEX</th><th>REFERRAL DATE</th><th>REFERRED BY</th><th>MOBILE NUMBER</th><th>MOBILE VERIFICATION</th><th>ACTION REQUIRED</th></tr>');
            for(var i in data){
				
				var refstatus = data[i].refstatus;
				if(refstatus== '0'){
					$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="RNTPC FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
				}
				
				if(refstatus== '1'){
					$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="EDIT FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
				}
				
				if(refstatus== '2'){
					$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="PERFORM LAB TEST" onclick="testDetails('+data[i].pid+')"></td></tr>');		
				}
				
				if(refstatus== '3'){
					$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="VIEW REPORT" onclick=""></td></tr>');
				}
				
			}				
		}		
	});
}

function getFilteredList(){
	var key = $('#key').val();
	
		//$('.thead').empty();
		$('.tbody').empty();
		$.ajax({
			type: "POST",
			data: { key : key},
			url: 'model/getRecentPatientListByAction.php',
			dataType: 'JSON',
			success: function(data){ 
				if(jQuery.isEmptyObject(data)){
					$('.tbody').append('<tr><td colspan="8" style="font-size : 14px;">No Data Found</td></tr>');		
				}else{
				//$('.thead').append('<th>PATIENT NAME</th><th>SLIP FILLED</th><th>MOBILE VERIFICATION</th><th>VISITED DMC</th><th>DMC MOBILE VERIFICATION</th><th>TEST RESULT</th><th>REPORT COLLECTED</th><th>ACTION</th>');
					for(var i in data){
						var refstatus = data[i].refstatus;
							if(refstatus== '0'){
								$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="RNTPC FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
							}
							
							if(refstatus== '1'){
								$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="EDIT FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
							}
							
							if(refstatus== '2'){
								$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="PERFORM LAB TEST" onclick="testDetails('+data[i].pid+')"></td></tr>');		
							}
							
							if(refstatus== '3'){
								$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="VIEW REPORT" onclick=""></td></tr>');		
							}
						}
					}					
				}		
			});
	}



function patientDetails(id){
	window.location.href = "http://localhost/swasthyaa/techchian/details.php?id="+id;
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

/*function testDetails(id){
	window.location.href = "http://localhost/swasthyaa/techchian/patienttest.php?id="+id;
}*/
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
					<a class="" href="add_patient.php"><img src="../assets/image/edit.png" id="addpIcon">&nbsp;&nbsp;Add Private Patient Details</a>
				</li>
				<li>
					<a class="" href="login.php"><img src="../assets/image/eye.png" id="labIcon">&nbsp;&nbsp;Lab Examination</a>
				</li>       
				<li>
					<a class="" href="lt_pro.php"><img src="../assets/image/p.png" id="profileIcon">&nbsp;&nbsp;&nbsp; Profile</a>              
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
				<div class="col-md-6 col-lg-6">
					<h5 style="font-weight : 600;">Patient Arrival Details</h5>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-4 col-lg-4" style="">
					<div id="total_patient" style="height: 300px; text-align : center;"></div>
					<div id="" style="width: 100%; text-align: center;">
						<button class="btn btn-default" style="width: 45px; background-color :#1b3e78!important; color :#fff;height :28px; line-height : 16px; border-radius : 4px;"><b id="tp"></b></button>&nbsp;&nbsp;<a href="patientDetails.php?value=2">Patients Arriving Today</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4">
					<div id="patientArrival" style="height: 300px;"></div>
					<div id="" style="width: 100%; text-align: center;">
						<button class="btn btn-default" style="width: 45px; background-color :#e5b45c !important; color : #fff; height :28px; line-height : 16px; border-radius : 4px;"><b id="pa"></b></button>&nbsp;&nbsp;<a href="patientDetails.php?value=1">Patient Arrived</a><br /><br />
						<button class="btn btn-default pap" style="width: 45px; background-color :#606c38 !important; color : #fff; height :28px; line-height : 16px; border-radius : 4px;"><b id="npa"></b></button>&nbsp;&nbsp;<a href="patientDetails.php?value=5">Patient's Arrival Pending</a>
					</div>
				</div>
				<div class="col-md-4 col-lg-4">
					<div id="labTest" style="height: 300px;"></div>
					<div id="" style="width: 100%; text-align: center;">
						<button class="btn btn-default" style=" width: 50px; background-color :#e5b45c !important; color : #fff; height :28px; line-height : 16px; border-radius : 4px;"><b id="testdone"></b></button>&nbsp;&nbsp;<a href="patientDetails.php?value=6">Lab Test Done</a><br /><br />
						<button class="btn btn-default ltp" style="width: 50px; background-color :#606c38 !important; color : #fff; height :28px; line-height : 16px; border-radius : 4px;"><b id="testpending"></b></button>&nbsp;&nbsp;<a href="patientDetails.php?value=7">Lab Test Pending</a></div>
				</div>
			</div><hr style="margin-top : 70px;"/>
		
			<div class="row">
			    <div class="col-md-4 col-lg-4">
					<h5 style="font-weight : 600;">Upcoming Patient Details</h5>
				</div>
				<div class="col-md-8 col-lg-8" style="text-align : right;">
					<div class="form-inline">
						<select class="form-control" id="key" onchange="getFilteredList();">
							<option value="00">All Actions</option>
							<option value="0">RNTPC FORM</option>
							<option value="1">EDIT FORM</option>
							<option value="2">PERFORM LAB TEST</option>
							<option value="3">VIEW REPORT</option>
						</select>
					</div>
				</div>
			</div>	
			<div class="row">	
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >				
					<div style="text-align: center; margin-top : 20px;">
					<table id="patientTable" class="table table-bordered table-hover" style="margin-bottom : 70px;">
						<thead class="thead" style="background: #cfd2c3; font-size : 12px;">
							<tr><th>PATIENT ID</th><th>PATIENT NAME</th><th>SEX</th><th>REFERRAL DATE</th><th>REFERRED BY</th><th>MOBILE NUMBER</th><th>MOBILE VERIFICATION</th><th>ACTION REQUIRED</th></tr>
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