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
<link href="../assets/css/doctor/app.css" rel="stylesheet">
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
	var did = '';
	var nstatus = '';
	var pstatus = '';
	var count = 0;
	
$(document).ready(function() {
	$('#examination').addClass('active');
	$("#testBtn").attr("disabled", true);
	$('#labIcon').attr("src", '../assets/image/eyew.png');
	$('.dropdown-toggle').dropdown();
	
	$("#microscopy").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#tst").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#igra").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#chest").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#cytopathology").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#histopathology").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#cbnaat").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#culture").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#dst").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#lineprobe").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#genesequencing").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	$("#othertest").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			count++;
			$("#testBtn").attr("disabled", false);
		} else {
			count--;
				if(count == 0){
				$("#testBtn").attr("disabled", true);
			}
		}
	});
	
	
	
	
	pid = $('#pId').val();
	did = $('#dId').val();
	getPatienDetails(pid);
	getNormalDiagnosisData(pid);
});

function getExistTestList(pid , did){
	alert(pid + '\n' + did);
}



function getNormalDiagnosisData(pid){
	$.ajax({
		type: "POST",
		data: { pid : pid },
		url: 'model/getNormalDiagnosisData.php',
		dataType: 'JSON',
		success: function(data){ 
		    for(var i in data){
				$('#antitb').html(data[i].antitb);
				$('#pretb').html(data[i].pretb);
				$('#exam').html(data[i].exam);
				$('#ntm').html(data[i].ntm);
				$('#symptom').html(data[i].symptom);
				$('#duration').html(data[i].duration);
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
				
					$('#referedDate').html(data[i].Date);
					$('#referringHF').html(data[i].Referring_Lab);
					$('#referredBy').html(data[i].HName);
					
					$('#testDate').html(data[i].RequestedDate);
					$('#ltName').html(data[i].LTName);
					$('#pType').html(data[i].Category);
					
				    $('#PName').html(data[i].PName);
					$('#Sex').html(data[i].Sex);
					$('#Age').html(data[i].Age);
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

function forwardToLT(){
	var checkbox_value = "";
    $(":checkbox").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + "|";
        }
    });
    $.ajax({
		type: "POST",
		data: { pid : pid , did : did , testList : checkbox_value },
		url: 'model/forwardedTestToLt.php',
		dataType: 'JSON',
		success: function(data){ 
			if(data.result == 'Success'){
				window.location.href = "http://localhost/swasthyaa/doctor/dashboard.php";
			}else{
				alert('Please try again');
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
</head>
<style>
</style>
<body>
<input type="hidden" name="pId" id="pId" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
<input type="hidden" name="dId" id="dId" value="<?php if(isset($_GET['did'])) echo $_GET['did']; ?>">
<div id="header" class="navbar navbar-default navbar-fixed-top">
<?php  include 'header.php'; ?>
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
					<a class="" href="lt_pro.php"><img src="../assets/image/p.png" id="profileIcon">&nbsp;&nbsp;&nbsp; Profile</a>              
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
									<td style="font-weight : 600; width : 18%;">Date Reffered</td><td style="width : 18%;" id="referedDate"></td>
									<td style="font-weight : 600; width : 16%;">Refferring HF</td><td style="width : 18%;" id="referringHF"></td>
									<td style="font-weight : 600; width : 15%;">Referred By</td><td id="referredBy"></td>
								</tr>
								<tr>
									<td style="font-weight : 600; width : 18%;">Test Requested</td><td style="width : 18%;" id="testDate"></td>
									<td style="font-weight : 600; width : 16%;">Lab Technician</td><td style="width : 18%;" id="ltName"></td>
									<td style="font-weight : 600; width : 15%;">Patient Type</td><td id="pType"></td>
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
									<td style="font-weight : 600; width : 16%;">Age</td><td style="width : 18%;" id="Age"></td>
									<td style="font-weight : 600; width : 15%;">Sex</td><td id="Sex"></td>
								</tr>
								<tr>
									<td style="font-weight : 600; width : 18%;">Address</td><td style="width : 18%;" id="Address"></td>
									<td style="font-weight : 600; width : 16%;">Mobile</td><td style="width : 18%;" id="Mobile"></td>
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
								<td style="font-weight : 600; width : 16%;">Fever</td><td style="width : 18%;" id="fever"></td>
								<td style="font-weight : 600; width : 15%;">Loss of Weight</td><td id="weight"></td>
							</tr>
							<tr>
								<td style="font-weight : 600; width : 18%;">Night Sweat</td><td style="width : 18%;" id="sweat"></td>
								<td style="font-weight : 600; width : 16%;">Blood Sputum</td><td style="width : 18%;" id="sputum"></td>								
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
								<td style="font-weight : 600; width : 20%;">Contact of TB/MDR TB Patient</td><td style="width : 12%;" id="contact"></td>
								<td style="font-weight : 600; width : 18%;">Diabetes</td><td style="width : 14%;" id="diabetes"></td>
								<td style="font-weight : 600; width : 18%;">Tobacco</td><td id="tobacco"></td>
							</tr>
							<tr>
								<td style="font-weight : 600; width : 18%;">Prison</td><td style="width : 18%;" id="prison"></td>
								<td style="font-weight : 600; width : 16%;">Miner</td><td style="width : 18%;" id="miner"></td>
								<td style="font-weight : 600; width : 15%;">Migrant</td><td id="migrant"></td>
							</tr>
							<tr>
								<td style="font-weight : 600; width : 18%;">Refugee</td><td style="width : 18%;" id="refugee"></td>
								<td style="font-weight : 600; width : 16%;">Urban</td><td style="width : 18%;" id="urban"></td>
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
					<label>Normal TB Diagnosis</label><hr />
					<table class="table" style="width : 50%;">
						<tbody>
							<tr>
								<td style="font-weight : 600; width : 20%;">H/O anti TB Rx for >1 month : </td><td style="width : 18%;" id="antitb"></td>
							</tr>
							<tr>
								<td style="font-weight : 600;">Presumptive TB : </td><td style="width : 18%;" id="pretb"></td>
							</tr>
							<tr>
								<td style="font-weight : 600;">Repeat Exam : </td><td style="width : 18%;" id="exam"></td>
							</tr>
							<tr>
								<td style="font-weight : 600;">Presumptive NTM : </td><td style="width : 18%;" id="ntm"></td>
							</tr>
							<tr>
								<td style="font-weight : 600;">Predominant symptom : </td><td style="width : 18%;" id="symptom"></td>
							</tr>
							<tr>
								<td style="font-weight : 600;">Duration : </td><td style="width : 18%;" id="duration"></td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-12 col-lg-12">
					<label>Kindly Suggest Test</label><hr />
					<table class="table" >
						<tbody>
							<tr>
								<td style="width : 33%"><input type="checkbox" value="1" name="testList[]" id="microscopy">&nbsp;&nbsp;&nbsp;Microscopy</td>
								<td style="width : 33%"><input type="checkbox" value="2" name="testList[]" id="tst">&nbsp;&nbsp;&nbsp;TST</td>
								<td style="width : 33%"><input type="checkbox" value="3" name="testList[]" id="igra">&nbsp;&nbsp;&nbsp;IGRA</td>
							</tr>
							<tr>
								<td style="width : 33%"><input type="checkbox" value="4" name="testList[]" id="cst">&nbsp;&nbsp;&nbsp;CHEST X RAY</td>
								<td style="width : 33%"><input type="checkbox" value="5" name="testList[]" id="cytopathology">&nbsp;&nbsp;&nbsp;CYTOPATHOLOGY</td>
								<td style="width : 33%"><input type="checkbox" value="6" name="testList[]" id="histopathology">&nbsp;&nbsp;&nbsp;HISTOPATHOLOGY</td>
							</tr>
							<tr>
								<td style="width : 33%"><input type="checkbox" value="7" name="testList[]" id="cbnaat">&nbsp;&nbsp;&nbsp;CBNAAT</td>
								<td style="width : 33%"><input type="checkbox" value="8" name="testList[]" id="culture">&nbsp;&nbsp;&nbsp;CULTURE</td>
								<td style="width : 33%"><input type="checkbox" value="9" name="testList[]" id="dst">&nbsp;&nbsp;&nbsp;DST</td>
							</tr>
							<tr>
								<td style="width : 33%"><input type="checkbox" value="10" name="testList[]" id="lineprobe">&nbsp;&nbsp;&nbsp;LINE PROBE ASSAY</td>
								<td style="width : 33%"><input type="checkbox" value="11" name="testList[]" id="genesequencing">&nbsp;&nbsp;&nbsp;GENE SEQUENCING</td>
								<td style="width : 33%"><input type="checkbox" value="12" name="testList[]" id="othertest">&nbsp;&nbsp;&nbsp;OTHER</td>
							</tr>													
						</tbody>
					</table>
				</div>
			</div>
			
			
			<div class="row" style="margin-left : 40px; margin-bottom : 50px;">
				<div class="col-md-12 col-lg-12">
					<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
						<input type="button" class="btn btn-primary" value="BACK">
						<input type="button" class="btn btn-primary" value="SEND REQUESTED TEST" onclick="forwardToLT();" id="testBtn">
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
