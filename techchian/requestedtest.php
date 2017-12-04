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
<link href="../assets/css/metisMenu.min.css" rel="stylesheet">
<link href="../assets/css/sb-admin-2.css" rel="stylesheet">
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
.table{
	border-bottom : 0px !important;
}
.table th , .table td{
		border : 0px !important; text-align : center;
}
.form-control{
	border-radius : 0;
}
.testBtn{
	width : 210px;
}
</style>

<script type="text/javascript">
	
	var pid = '';
	
$(document).ready(function() {
	$('#examination').addClass('active');
	$('#labIcon').attr("src", '../assets/image/eyew.png');
	$('.dropdown-toggle').dropdown();
	
	pid = $('#pId').val();
	getPatienDetails(pid);
	
});

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
					$('#Mobile').html(data[i].PMobile);
					$('#Asha').html(data[i].ASHA);
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
					
					$('#status').html(data[i].Status);
					if(data[i].Status == 'Not Verified'){
						$('.refreashTd').show();
						$('#mobileVerificationDiv').show();
						$('#reason').show();
					}
					
					if(data[i].Status == 'Verified'){
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

function gotoMicroscopy(){
	window.location.href = "http://localhost/swasthyaa/techchian/microscopy.php?id="+pid;
}

function gotoCbnaat(){
	window.location.href = "http://localhost/swasthyaa/techchian/cbnaat.php?id="+pid;
}

function gotoCulture(){
	window.location.href = "http://localhost/swasthyaa/techchian/culturetest.php?id="+pid;
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
<input type="hidden" name="hf_id" id="hf_id" value="<?php if(isset($_SESSION['HF_ID'])) echo $_SESSION['HF_ID']; ?>">
<input type="hidden" name="pId" id="pId" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
<div class="container-fluid">
	<div class="row">
		<?php include 'header.php'; ?>
	</div>
	
	<div class="row form-group" id="headingForm" style="border-top: 11px solid #f1635d; background-color: #f4f4f5;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14);  margin:0 -3.5vw;">
		<div class="col-xs-8 col-sm-8 col-sm-offset-2 col-md-7 col-md-offset-3 col-lg-6 col-lg-offset-3">
			<div class="btn-group btn-breadcrumb" style="margin-top : 15px;">
				<a href="#" class="btn btn-warning" style="border : none !important;">REFERRAL SLIP</a>
				<a href="#" class="btn btn-warning" style="border : none !important;">NIKSHYA DETAILS</a>
				<a href="#" class="btn btn-warning" style="border : none !important;">DIAGNOSIS/FOLLOW UP</a>
				<a href="#" class="btn btn-warning" style="border : none !important;">LAB TEST</a>
			</div>
		</div>
		<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 col-lg-offset-1">
			<i class="fa fa-edit fa-fw" id="headingIcon"></i>&nbsp;<b id="headingText">Lab Examination</b>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-7 col-md-offset-3 col-lg-7 col-lg-offset-3" style="padding-left:0; padding-right:0;">
			<div class="form-group" style="margin-top : 20px;">
				<label>Requestor Details</label>
				<table class="table" >
					<tbody>
						<tr>
							<td style="font-weight : 600; width : 10%;">Name</td><td style="width : 25%;" id="name">Ajoy Baishya</td>
							<td style="font-weight : 600; width : 16%;">Designation</td><td style="width : 18%;" id="designation">Lab Technichian</td>
							<td style="font-weight : 600; width : 18%;">Contact Number</td><td id="mobile">9707211053</td>
						</tr>
						<tr>
							<td style="font-weight : 600; width : 10%;">Email Id</td><td style="width : 30%;" id="email">ajoybaishya90@gmail.com</td>
						</tr>
					</tbody>
				</table><hr />
				<label>Test Requested</label>
				<table class="table" style="margin-top : 20px;">
					<tbody>
						<tr>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="Microscopy" onclick="gotoMicroscopy();"></td>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="TST"></td>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="IGRA"></td>
						</tr>
						<tr>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="Chest X Ray"></td>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="Cytopathology"></td>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="Histopathology"></td>
						</tr>
						<tr>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="CBNAAT" onclick="gotoCbnaat();"></td>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="Culture" onclick="gotoCulture();"></td>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="DST"></td>
						</tr>
						<tr>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="Line Probe Assay"></td>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="Gene Sequencing"></td>
							<td style="width : 33%;" id=""><input type="button" class="btn btn-primary testBtn" value="Other"></td>

						</tr>
					</tbody>
				</table>
			</div>						
		</div>		
	</div>
	
	<div class="row" style="margin-top : 20px;">
		<div class="col-xs-12 col-sm-12 col-md-7 col-md-offset-3 col-lg-7 col-lg-offset-3">
			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
				<input type="button" class="btn btn-primary" value="BACK">
				<input type="button" class="btn btn-primary" value="GENERATE REPORT" onclick="">
			</div>
		</div>
	</div>
</div>		
</body>
</html>