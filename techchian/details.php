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
<link href="../assets/css/techchian/breadcum.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="../assets/js/metisMenu.min.js"></script>
<script src="../assets/js/sb-admin-2.js"></script>
<title> Swasthyaa</title>
<style>
table{
	font-weight : 500;
}
.table{
	border-bottom : 0px !important;
}
.table th , .table td{
		border : 0px !important; 
}
.form-control{
	border-radius : 0;
}
.btn-warning: hover {
	background : #bdc6b4 !important;
}
</style>
<script type="text/javascript">
	
	var pid = '';
	var nstatus = '';
	var pstatus = '';
	
$(document).ready(function() {
	$('#examination').addClass('active');
	$('#labIcon').attr("src", '../assets/image/eyew.png');
	$('.dropdown-toggle').dropdown();
	
	pid = $('#pId').val();
	getPatienDetails(pid);
	checkNikshayStatus(pid);
	//checkPatientStatus(pid);
	
});

function checkPatientStatus(pid){
	$.ajax({
		type: "POST",
		url: 'model/checkPatientStatus.php',
		data: { pid : pid },
		dataType: 'JSON',
		success: function(data){ 
            if(data.result == 'Absent'){
				pstatus = '0';
			}
			if(data.result == 'Present'){
				pstatus = '1';
			}
			
		}		
	});
}

function checkNikshayStatus(pid){
	$.ajax({
		type: "POST",
		data: { pid : pid },
		url: 'model/checkNikshayStatus.php',
		dataType: 'JSON',
		success: function(data){ 
		    if(data.result == 'Absent'){
				nstatus = '0';
			}
			if(data.result == 'Present'){
				nstatus = '1';
			}
		}		
	});
}

function getPatienDetails(pid){
	$.ajax({
		type: "POST",
		url: 'model/getPatientDetails.php',
		data: { pid : pid },
		dataType: 'JSON',
		success: function(data){ 
				for(var i in data){	
				
					$('#date').html(data[i].Date);
					$('#referring').html(data[i].Referring_Lab);
					$('#anm').html(data[i].HName);
					
				    $('#PName').html(data[i].PName);
					$('#Sex').html(data[i].Sex);
					$('#Age').html(data[i].Age);
					$('#Address').html(data[i].Address);
					
					if(data[i].PMobile == ''){
						$('#status').html('ASHA Assigned');
						$('.refreashTd').show();
						$('#mobileVerificationDiv').show();
						$('#reason').show();
					}
					
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
					
					
					if(data[i].Status == 'Not Verified' && data[i].PMobile!= ''){
						$('#status').html('Pending');
						$('.refreashTd').show();
						$('#mobileVerificationDiv').show();
						$('#reason').show();
					}
					
					if(data[i].Status == 'Verified'){
						$('#status').html(data[i].Status);
						$('.refreashTd').hide();
						$('#mobileVerificationDiv').hide();
					}
					
				}
		}		
	});
}

function refreashStatus(){
	$.ajax({
		type: "POST",
		data: { pid : pid },
		url: 'model/changeStatus.php',
		dataType: 'JSON',
		success: function(data){ 
		    location.reload();
		}		
	});
}

function saveReason(){
	if($('#reason').css('display') == 'none'){
		if(nstatus == '0'){
			window.location.href = "http://localhost/swasthyaa/techchian/nikshay.php?id="+pid;
		}
		if(nstatus == '1'){
			window.location.href = "http://localhost/swasthyaa/techchian/nikshayDetails.php?id="+pid;
		}
	}else{
		var reason = $('#reason').val();
		if(reason == '0'){
			alert('Please choose reason for non verification');
		}else{
			$.ajax({
			type: "POST",
			data: { pid : pid , reason : reason },
			url: 'model/saveReason.php',
			dataType: 'JSON',
			success: function(data){ 
				if(data.result == 'Success'){
					if(nstatus == '0'){
						window.location.href = "http://localhost/swasthyaa/techchian/nikshay.php?id="+pid;
					}
					if(nstatus == '1'){
						window.location.href = "http://localhost/swasthyaa/techchian/nikshayDetails.php?id="+pid;
					}
					
				}
			}		
		});
	}
	}
}
</script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
.col-md-5 .col-lg-5{
}
</style>
<body>
<input type="hidden" name="pId" id="pId" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
<div id="header" class="navbar navbar-default navbar-fixed-top">
<?php  include 'header.php'; ?>
</div>
<div id="wrapper">
	<div id="sidebar-wrapper" class="col-md-2">
        <div id="sidebar">
            <ul class="nav list-group">
                <li style="border-bottom : 1px solid #9fa1a3;">
					<a  href="dashboard.php"><img src="../assets/image/d.png" id="dashboardIcon"/>&nbsp;&nbsp; Dashboard</a>
				</li>
				<li style="border-bottom : 1px solid #9fa1a3;">
					<a  href="patientDetails.php"><img src="../assets/image/edit.png" id="pdIcon">&nbsp;&nbsp;Patient Details</a>
				</li>
				<li style="border-bottom : 1px solid #9fa1a3;">
					<a  href="add_patient.php"><img src="../assets/image/edit.png" id="addpIcon">&nbsp;&nbsp;Add Private Patient Details</a>
				</li>
				<li class="active">
					<a  href="login.php"><img src="../assets/image/eyew.png" id="labIcon">&nbsp;&nbsp;Lab Examination</a>
				</li>       
				<li style="border-bottom : 1px solid #9fa1a3;">
					<a  href="lt_pro.php"><img src="../assets/image/p.png" id="profileIcon">&nbsp;&nbsp;&nbsp; Profile</a>              
				</li>
            </ul>
        </div>
    </div>
    <div id="main-wrapper" class="col-md-10 pull-right" style="overflow:">
        <div id="main">
			<div class="row form-group" style="height: 65px; border-top: 11px solid #606c38; background-color: #f4f4f5;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14);">
				<div class="col-md-3 col-md-offset-9 col-lg-3 col-lg-offset-9" id="" style="text-align : right;">
					<i class="fa fa-edit fa-fw" id="headingIcon"></i>&nbsp;<b style="color: #a0a0a0; margin-top : 18px; font-size : 18px; font-weight : 500;" >Lab Examination</b>
				</div>
			</div>	
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-12 col-lg-12">
					<div class="form-group" style="margin-top : 20px;">
						<label>Reffering Details</label><hr />
						<table class="table" >
							<tbody>
								<tr>
									<td style="font-weight : 600; width : 18%;">Date Reffered</td><td style="width : 18%;" id="date"></td>
									<td style="font-weight : 600; width : 18%;">Refferring HF</td><td style="width : 18%;" id="referring"></td>
									<td style="font-weight : 600; width : 15%;">Referred By</td><td id="anm"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-12 col-lg-12">
					<div class="form-group" style="margin-top : 30px;">
						<label>Patient Details</label><hr />
						<table class="table" >
							<tbody>
								<tr>
									<td style="font-weight : 600; width : 18%;">Patient Name</td><td style="width : 18%;" id="PName"></td>
									<td style="font-weight : 600; width : 18%;">Age</td><td style="width : 18%;" id="Age"></td>
									<td style="font-weight : 600; width : 15%;">Sex</td><td id="Sex"></td>
								</tr>
								<tr>
									<td style="font-weight : 600; width : 18%;">Address</td><td style="width : 18%;" id="Address"></td>
									<td style="font-weight : 600; width : 18%;">Mobile</td><td style="width : 18%;" id="Mobile"></td>
									<td style="font-weight : 600; width : 15%;">family Mobile</td><td id="FMobile"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-12 col-lg-12">
					<label>Patient Health Details</label><hr />
					<table class="table" >
						<tbody>
							<tr>
								<td style="font-weight : 600; width : 18%;">Cough</td><td style="width : 18%;" id="caugh"></td>
								<td style="font-weight : 600; width : 18%;">Fever</td><td style="width : 18%;" id="fever"></td>
								<td style="font-weight : 600; width : 15%;">Loss of Weight</td><td id="weight"></td>
							</tr>
							<tr>
								<td style="font-weight : 600; width : 18%;">Night Sweat</td><td style="width : 18%;" id="sweat"></td>
								<td style="font-weight : 600; width : 18%;">Blood Sputum</td><td style="width : 18%;" id="sputum"></td>								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-12 col-lg-12">
					<label>Key Population Indicator</label><hr />
					<table class="table" >
						<tbody>
							<tr>
								<td style="font-weight : 600; width : 18%;">Contact of TB/MDR TB Patient</td><td style="width : 18%;" id="contact"></td>
								<td style="font-weight : 600; width : 18%;">Diabetes</td><td style="width : 18%;" id="diabetes"></td>
								<td style="font-weight : 600; width : 15%;">Tobacco</td><td id="tobacco"></td>
							</tr>
							<tr>
								<td style="font-weight : 600; width : 18%;">Prison</td><td style="width : 18%;" id="prison"></td>
								<td style="font-weight : 600; width : 18%;">Miner</td><td style="width : 18%;" id="miner"></td>
								<td style="font-weight : 600; width : 15%;">Migrant</td><td id="migrant"></td>
							</tr>
							<tr>
								<td style="font-weight : 600; width : 18%;">Refugee</td><td style="width : 18%;" id="refugee"></td>
								<td style="font-weight : 600; width : 18%;">Urban</td><td style="width : 18%;" id="urban"></td>
								<td style="font-weight : 600; width : 15%;">Health Worker</td><td id="health"></td>
							</tr>
							<tr>
								<td style="font-weight : 600; width : 18%;">Other</td><td style="width : 18%;" id="other"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-12 col-lg-12">
					<label>Mobile Verication</label><hr />
					<table class="table">
						<tbody>
							<tr>
								<td style="font-weight : 600; width : 25%;">Status : <b id="status"></b>
								<td style="font-weight : 600; width : 18%;" class="refreashTd"><input type="button" class="btn btn-primary" value="Refreash Status" onclick="refreashStatus();"></td><td style="width : 2%;" class="refreashTd">or</td>
								<td colspan="2" style="width : 50%" class="refreashTd">
									<select name="reason" id="reason" class="form-control" style="display : none;">
										<option value="0">Reason For Non Verification</option>
										<option value="Mobile Not Available Currently">Mobile phone not available currently</option>
										<option value="Mobile Recharge Not Available">Mobile phone recharge not sufficient</option>										
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;" id="mobileVerificationDiv">
				<div class="col-md-12 col-lg-12">
					<div class="input-group">
						<label>For Patient mobile verification call on</label>	<br />									
						<label><span style="color:#d0011b; font-size: 18px;">9999555500</span> from patient registered mobile number.</label>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px; margin-bottom : 50px;">
				<div class="col-md-12 col-lg-12">
					<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
						<input type="button" class="btn btn-primary" value="BACK">
						<input type="button" class="btn btn-primary" value="NEXT" onclick="saveReason();">
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
