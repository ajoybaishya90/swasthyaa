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
$(document).ready(function(){
	$('.dropdown-toggle').dropdown();
	getPatientList();
});

function getPatientList(){
	//$('.thead').empty();
	$('.tbody').empty();
	$.ajax({
		type: "POST",
		url: 'model/getPatientList.php',
		dataType: 'JSON',
		success: function(data){ 
			if(jQuery.isEmptyObject(data)){
				$('.tbody').append('<tr><td colspan="8" style="font-size : 14px;">No Data Found</td></tr>');		
			}else{
				for(var i in data){
					var refstatus = data[i].refstatus;
					if(refstatus== '0'){ 
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient May Arrive Today</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="RNTPC FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
					}
					
					if(refstatus== '1'){
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient Arrived</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="EDIT FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
					}
					
					if(refstatus== '2'){
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient Arrived</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="PERFORM LAB TEST" onclick="testDetails('+data[i].pid+')"></td></tr>');		
					}
					
					if(refstatus== '3'){
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient Arrived</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="VIEW REPORT" onclick=""></td></tr>');		
					}
				}
			}
		    //$('.thead').append('<tr><th>PATIENT NAME</th><th>SEX</th><th>REFERRAL DATE</th><th>REFERRED BY</th><th>MOBILE NUMBER</th><th>MOBILE VERIFICATION</th><th>PATIENT STATUS</th><th>ACTION</th></tr>'); 				
		}		
	});
}

function patientDetails(id){
	window.location.href = "http://localhost/swasthyaa/techchian/details.php?id="+id;
}

function getPList(){
	$('.tbody').empty();
	var month = $('#month').val();
	var year = $('#year').val();
	if(month == '00'){
		alert('Please choose year');
		
	}else if(year == '00'){
		alert('Please choose year');
	}else{
		$.ajax({
		type: "POST",
		data: { month : month , year : year } ,
		url: 'model/getPatientListByTime.php',
		dataType: 'JSON',
		success: function(data){ 
		    if(jQuery.isEmptyObject(data)){
				$('.tbody').append('<tr><td colspan="8" style="font-size : 14px;">No Data Found</td></tr>');		
			}else{
				for(var i in data){
					var refstatus = data[i].refstatus;
					if(refstatus== '0'){ 
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient May Arrive Today</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="RNTPC FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
					}
					
					if(refstatus== '1'){
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient Arrived</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="EDIT FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
					}
					
					if(refstatus== '2'){
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient Arrived</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="PERFORM LAB TEST" onclick="testDetails('+data[i].pid+')"></td></tr>');		
					}
					
					if(refstatus== '3'){
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient Arrived</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="VIEW REPORT" onclick=""></td></tr>');		
					}
				}
			}				
		}		
	});
	}
}

function getListByName(){
	var pname = $('#patientname').val();
	$('.tbody').empty();
	$.ajax({
		type: "POST",
		url: 'model/getPatientListByName.php',
		data: { name : pname },
		dataType: 'JSON',
		success: function(data){ 
		    if(jQuery.isEmptyObject(data)){
				$('.tbody').append('<tr><td colspan="8" style="font-size : 14px;">No Data Found</td></tr>');		
			}else{
				for(var i in data){
					var refstatus = data[i].refstatus;
					if(refstatus== '0'){ 
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient May Arrive Today</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="RNTPC FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
					}
					
					if(refstatus== '1'){
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient Arrived</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="EDIT FORM" onclick="patientDetails('+data[i].pid+');"></td></tr>');		
					}
					
					if(refstatus== '2'){
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient Arrived</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="PERFORM LAB TEST" onclick="testDetails('+data[i].pid+')"></td></tr>');		
					}
					
					if(refstatus== '3'){
						$('.tbody').append('<tr><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].uid+'" onclick="showPatientDetails('+data[i].pid+');"></td><td><input type="button" style="background : transparent; border :none; color : blue;" value="'+data[i].pname+'" onclick="showPatientDetails('+data[i].pid+');"></td><td>'+data[i].sex+'</td><td>'+data[i].rdate+'</td><td>'+data[i].hname+'</td><td>'+data[i].mobile+'</td><td>'+data[i].status+'</td><td>Patient Arrived</td><td><img src="../assets/image/eye.png"><input type="button" style="background:transparent; color:#6396e8; border : none;" value="VIEW REPORT" onclick=""></td></tr>');		
					}
				}
			}				
		}		
	});
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
</style>
</head>
<body>
<input type="hidden" name="value" id="value" value="<?php if(isset($_GET['value'])) echo $_GET['value']; ?>">
<div>
<?php include 'header.php'; ?>
</div>
<div id="wrapper">
	<div id="sidebar-wrapper" class="col-md-2">
        <div id="sidebar">
            <ul class="nav list-group">
                <li>
					<a class="" href="dashboard.php"><img src="../assets/image/d.png" id="dashboardIcon"/>&nbsp;&nbsp; Dashboard</a>
				</li>
				<li class="active">
					<a class="" href="patientDetails.php"><img src="../assets/image/editw.png" id="pdIcon">&nbsp;&nbsp;Patient Details</a>
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
					<!--	<li><input type="button" class="btn btn-primary" value="TODAY" onclick=""/></li>				
						<li style="margin-left : 20px;"><input type="button" class="btn btn-primary" value="MONTHLY" onclick=""/></li>-->
					</ul>
				</div>
				<div class="col-md-3 col-md-offset-4 col-lg-3 col-lg-offset-4" id="" style="text-align : right;">
					<i class="fa fa-edit fa-fw" style="color: #a0a0a0;  margin-top:18px;"></i>&nbsp;&nbsp;<b style="color: #a0a0a0; margin-top : 18px; font-size : 18px; font-weight : 500;" >Patient Details</b>
				</div>
			</div>

			<div class="row">				
				<div class="col-sm-5 col-md-4 col-lg-3">
						<label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
						<div class="input-group mb-2 mb-sm-0">
							<input type="text" class="form-control" id="patientname" placeholder="Search Patient Name">
							<span class="input-group-addon">
								<i class="fa fa-search" onclick="getListByName();"></i>
							</span>
						</div>
				</div>
				<div class="col-sm-2 col-md-2 col-lg-2"></div>
				<div class="col-sm-5 col-md-6 col-lg-7" style="text-align : right;">
				<div class="form-inline">
					<select class="form-control" name="" id="month" onchange="getPList();">
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
							<option value="11" selected>November</option>
							<option value="12">December</option>
						</select>
						<select class="form-control" id="year">
							<option value="00">Choose Year</option>
							<option value="2017" selected>2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
						</select>
					<!--<select class="form-control" id="selectOption" onchange="getPList();">
						<option value="0">All Patients</option>
						<option value="1">Patient Arrived Today</option>
						<option value="2">Patient Arriving Today</option>
						<!--<option value="3">Patient May Arrive Today</option>
						<option value="4">Patient Arrival Lapsed</option>
					</select>-->
				</div>
				</div>
			</div>
	
			<div class="row">
			    <!--<div class="col-md-12 col-lg-12">
					<h5 style="font-weight : 600;">Patient Details</h5>
				</div>-->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >				
					<div style="text-align: center; margin-top : 20px;">
					<table class="table table-bordered table-hover" style="margin-bottom : 70px">
						<thead class="thead" style="background-color: #d6d8db; font-size : 12px;">							
							<tr><th>PATIENT ID</th><th>PATIENT NAME</th><th>SEX</th><th>REFERRAL DATE</th><th>REFERRED BY</th><th>MOBILE NUMBER</th><th>MOBILE VERIFICATION</th><th>PATIENT STATUS</th><th>ACTION</th></tr>
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