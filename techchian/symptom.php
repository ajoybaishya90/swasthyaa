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
	font-weight : 500; margin-top : 20px;
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

input[type="text"]:disabled {
    background: #fff;
}
</style>
<script>

	var pid = '';

$(document).ready(function() {
	$('.dropdown-toggle').dropdown();
	
	pid = $('#pId').val();
	getPatientHealthDetails(pid);
});

function getPatientHealthDetails(pid){
	$.ajax({
		type: "POST",
		url: 'model/getPatientHealthDetails.php',
		data: { pid : pid },
		dataType: 'JSON',
		success: function(data){
			for(var i in data){
				$('#pCategory').text(data[i].category);
				if(data[i].antiTB == 'Yes'){
					$("#antitbyes").prop("checked", true);
				}
				if(data[i].antiTB == 'No'){
					$("#antitbno").prop("checked", true);
				}
				//$('#antiTB').val(data[i].antiTB);
				//$('#preTB').val(data[i].preTB);
				//$('#exam').val(data[i].exam);
				//$('#ntm').val(data[i].ntm);
				if(data[i].preTB == 'Yes'){
					$("#presumtive").attr('checked', true);
				}
				if(data[i].exam == 'Yes'){
					$("#repeat").attr('checked', true);
				}
				if(data[i].ntm == 'Yes'){
					$("#ntm").attr("checked", true);
				}
				
				$('#symptom').val(data[i].symptom);
				$('#duration').val(data[i].duration);
				$('#dataID').val(data[i].dataID);
				//alert(data[i].dataID);
			}
		}		
	});
}

function enableDetails(){
/*	$('#antiTB').prop("disabled",false);
	$('#preTB').prop("disabled",false);
	$('#exam').prop("disabled",false);
	$('#ntm').prop("disabled",false);
	$('#symptom').prop("disabled",false);
	$('#duration').prop("disabled",false);
	$('.editBtn').hide();
	$('.saveBtn').show();*/
	$('#antitbyes').prop("disabled",false);
	$('#antitbno').prop("disabled",false);
	$('#presumtive').prop("disabled",false);
	$('#repeat').prop("disabled",false);
	$('#ntm').prop("disabled",false);
	$('#symptom').prop("disabled",false);
	$('#duration').prop("disabled",false);
	$('.editBtn').hide();
	$('.saveBtn').show();
}

function saveDetails(){
	var dataId = $('#dataID').val();
	/*var antiTB = $('#antiTB').val();
	var preTB = $('#preTB').val();
	var exam = $('#exam').val();
	var ntm = $('#ntm').val();
	var symptom = $('#symptom').val();
	var duration = $('#duration').val();*/
	var antitb = $('input[name=antitb]:checked').val();
	
	var presumtive = $('input[name=presumtive]:checked').val();
	if(presumtive == 'Yes'){}
	else{ presumtive = 'No';}
	
	var repeat = $('input[name=repeat]:checked').val();
	if(repeat == 'Yes'){}
	else{ repeat = 'No';}
	
	var ntm = $('input[name=ntn]:checked').val();
	if(ntm == 'Yes'){}
	else{ ntm = 'No';}
	
	var symptom = $('#symptom').val();
	var duration = $('#duration').val();
	$.ajax({
			type: "POST",
			//data: { pid : pid , dataId : dataId , antiTB : antiTB , preTB : preTB , exam : exam , ntm : ntm ,symptom : symptom , duration : duration },
			data: { pid : pid , dataId : dataId , antiTB : antitb , preTB : presumtive , exam : repeat , ntm : ntm ,symptom : symptom , duration : duration },
			url: 'model/updateHealthDetails.php',
			dataType: 'JSON',
			success: function(data){ 
				if(data.result == 'Success'){
					alert('Successfully Updated');
					location.reload();
				}else{
					alert('Datas are not updated');
				}
			}		
		});
}

function goToNext(){
	window.location.href = "http://localhost/swasthyaa/techchian/testlist.php";
}

</script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<input type="hidden" name="pId" id="pId" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
<input type="hidden" name="dataID" id="dataID">
<div>
<?php include 'header.php'; ?> 
</div>
<div id="wrapper">
	<div id="sidebar-wrapper" class="col-md-2">
        <div id="sidebar">
            <ul class="nav list-group">
                <li class="active">
					<a  href="dashboard.php"><img src="../assets/image/dw.png" id="dashboardIcon"/>&nbsp;&nbsp; Dashboard</a>
				</li>
				<li>
					<a  href="patientDetails.php"><img src="../assets/image/edit.png" id="pdIcon">&nbsp;&nbsp;Patient Details</a>
				</li>
				<li>
					<a  href="add_patient.php"><img src="../assets/image/edit.png" id="addpIcon">&nbsp;&nbsp;Add Private Patient Details</a>
				</li>
				<li>
					<a  href="login.php"><img src="../assets/image/eye.png" id="labIcon">&nbsp;&nbsp;Lab Examination</a>
				</li>       
				<li>
					<a  href="lt_pro.php"><img src="../assets/image/p.png" id="profileIcon">&nbsp;&nbsp;&nbsp; Profile</a>              
				</li>
            </ul>
        </div>
    </div>
    <div id="main-wrapper" class="col-md-10 pull-right" style="overflow:">
        <div id="main">
			<div class="row form-group" style="height: 65px; border-top: 11px solid #606c38; background-color: #f4f4f5;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14);">
				<div class="col-md-9 col-lg-9" id="">
					<div class="btn-group btn-breadcrumb" style="margin-top : 15px;">
						<a href="#" class="btn btn-warning" style="border : none !important;">REFERRAL SLIP</a>
						<a href="#" class="btn btn-warning" style="border : none !important;">NIKSHYA DETAILS</a>
						<a href="#" class="btn btn-warning" style="border : none !important;">DIAGNOSIS/FOLLOW UP</a>
						<a href="#" class="btn btn-warning" style="border : none !important;">LAB TEST</a>
					</div>
				</div>
				<div class="col-md-3 col-lg-3" id="" style="text-align : right;">
					<i class="fa fa-edit fa-fw" id="headingIcon"></i>&nbsp;<b style="color: #a0a0a0; margin-top : 18px; font-size : 18px; font-weight : 500;" >Lab Examination</b>
				</div>
			</div>	
		<!--	<div class="row" style="margin-left : 40px;">
				<div class="col-md-6 col-lg-6">
					<div class="form-group" style="margin-top : 20px;">
						<div class="form-group">
							<label id="pCategory"></label>	
							<table class="table">
								<tr>
									<td style="width : 200px;">H/O anti TB Rx for > 1 month</td><td><input type="text" class="form-control" name="antiTB" id="antiTB" value="" disabled></td>
								</tr>
								<tr>
									<td>Presumptive TB</td><td><input type="text" class="form-control" name="preTB" id="preTB" value="" disabled></td>
								</tr>
								<tr>
									<td>Repeat Exam</td><td><input type="text" class="form-control" name="exam" id="exam" value="" disabled></td>
								</tr>
								<tr>
									<td>Presumptive NTM</td><td><input type="text" class="form-control" name="ntm" id="ntm" value="" disabled></td>
								</tr>
								<tr>
									<td>Prdominant symptom</td><td><input type="text" class="form-control" name="symptom" id="symptom" value="" disabled></td>
								</tr>
								<tr>
									<td>Duration</td><td><input type="text" class="form-control" name="duration" id="duration" value="" disabled></td>
								</tr>
							</table>
						</div>
										
					</div>
				</div>
			</div>-->
			<!-- Normal TB Diagnosis Update Form-->
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="form-group" style="margin-top : 20px;">
						<label>Normal TB - Diagnosis</label><br /><br />
						<label>H/O Anti TB Rx for > 1 Month</label><br /><br />
						<input type="radio" name="antitb" id="antitbyes" value="Yes" disabled>&nbsp;&nbsp;&nbsp;&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="antitb" id="antitbno" value="No" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No&nbsp;&nbsp;&nbsp;&nbsp;
						<br /><br />
						<label>Kindly Select</label>
						<table>
							<tr>
								<td><input type="checkbox" value="Yes" name="presumtive" id="presumtive" disabled>&nbsp;&nbsp;&nbsp;Presumtive TB</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="repeat" id="repeat" disabled>&nbsp;&nbsp;&nbsp;Repeat Exam</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="ntn" id="ntm" disabled>&nbsp;&nbsp;&nbsp;Presumptive NTN</td>
							</tr>
						</table><br /><br />
						<label>Predominant Symptom</label>
						<input name="symptom" id="symptom" type="text"  placeholder="Enter Predominant Symptom" class="form-control" value="" disabled><br />
						<label>Duration</label>
						<input name="duration" id="duration" type="text"  placeholder="Enter Duration" class="form-control" value="" disabled>
					</div>
				</div>
			</div>
			<!-- End of Form -->
			<div class="row" style="margin-top : 20px; margin-bottom : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="text-align : center;">					
						<input type="button" class="btn btn-primary" value="BACK">
						<input type="button" class="btn btn-primary editBtn" value="EDIT" onclick="enableDetails();">
						<input type="button" class="btn btn-primary saveBtn" value="SAVE" onclick="saveDetails();" style="display : none;">
						<input type="button" class="btn btn-primary" value="NEXT" onclick="goToNext();">					
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
