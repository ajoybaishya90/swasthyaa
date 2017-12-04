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
<script>

	var pid = '';

$(document).ready(function() {
	$('#examination').addClass('active');
	$('#labIcon').attr("src", '../assets/image/eyew.png');
	$('.dropdown-toggle').dropdown();
	
	pid = $('#pId').val();
	
});

function saveXDRFollowUpData(){
	
	var inh = $('input[name=inh]:checked').val();
	if(inh == 'Yes'){}
	else{ inh = 'No';}
	
	var mdr = $('input[name=mdr]:checked').val();
	if(mdr == 'Yes'){}
	else{ mdr = 'No';}
	
	var shorterRegimen = $('input[name=shorterRegimen]:checked').val();
	if(shorterRegimen == 'Yes'){}
	else{ shorterRegimen = 'No';}
	
	var modifiedRegimen = $('input[name=modifiedRegimen]:checked').val();
	if(modifiedRegimen == 'Yes'){}
	else{ modifiedRegimen = 'No';}
	
	var xdrTB = $('input[name=xdrTB]:checked').val();
	if(xdrTB == 'Yes'){}
	else{ xdrTB = 'No';}
	
	var mixedPattern = $('input[name=mixedPattern]:checked').val();
	if(mixedPattern == 'Yes'){}
	else{ mixedPattern = 'No';}
	
	var regimenFQ = $('input[name=regimenFQ]:checked').val();
	if(regimenFQ == 'Yes'){}
	else{ regimenFQ = 'No';}
	
	var drugXDR = $('input[name=drugXDR]:checked').val();
	if(drugXDR == 'Yes'){}
	else{ drugXDR = 'No';}
	
	var failureMDR = $('input[name=failureMDR]:checked').val();
	if(failureMDR == 'Yes'){}
	else{ failureMDR = 'No';}
	
	var failureXDR = $('input[name=failureXDR]:checked').val();
	if(failureXDR == 'Yes'){}
	else{ failureXDR = 'No';}
	
	var dmPattern = $('input[name=dmPattern]:checked').val();
	if(dmPattern == 'Yes'){}
	else{ dmPattern = 'No';}
	
	var treatment = $('input[name=treatment]:checked').val();
	if(treatment == 'Yes'){}
	else{ treatment = 'No';}
	
	var tvalue = $('#tvalue').val();
	
	$.ajax({
		type: "POST",
		data: { pid : pid , inh : inh , mdr : mdr , shorterRegimen : shorterRegimen , modifiedRegimen : modifiedRegimen , xdrTB : xdrTB , mixedPattern : mixedPattern , regimenFQ : regimenFQ , drugXDR :  drugXDR , failureMDR : failureMDR , failureXDR : failureXDR , dmPattern : dmPattern , treatment : treatment , tvalue : tvalue},
		url: 'model/saveXDRFollowUpData.php',
		dataType: 'JSON',
		success: function(data){ 
		    if(data.result == 'Success'){
				window.location.href = "http://localhost/swasthyaa/techchian/testlist.php";
			}else{
				alert(data.result);
				location.reload();
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
<body>
<input type="hidden" name="pId" id="pId" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
<div id="header" class="navbar navbar-default navbar-fixed-top">
<?php include 'header.php'; ?>
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
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="form-group" style="margin-top : 20px;">
						<label>Follow Up - Culture</label><br /><br />
						<label>Regimen</label><br /><br />
						<table>
							<tr>
								<td><input type="checkbox" value="Yes" name="inh">&nbsp;&nbsp;&nbsp;Regimen for INH mono/poly resistant TB</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="mdr">&nbsp;&nbsp;&nbsp;Regimen for MDR / RR TB</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="shorterRegimen">&nbsp;&nbsp;&nbsp;Shorter Regimen*</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="modifiedRegimen">&nbsp;&nbsp;&nbsp;Modified regimen for MDR/RR TB+FQ/SLI resistance</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="xdrTB">&nbsp;&nbsp;&nbsp;Regimen for XDR TB</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="mixedPattern">&nbsp;&nbsp;&nbsp;Modified Regimen for mixed pattern resistance</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="regimenFQ">&nbsp;&nbsp;&nbsp;Regimen with New Drug for MDR/RR TB+FQ/SLI resistance</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="drugXDR">&nbsp;&nbsp;&nbsp;Regimen with New Drug for XDR TB</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="failureMDR">&nbsp;&nbsp;&nbsp;Regimen with New Drug for failures of regimen for MDR TB</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="failureXDR">&nbsp;&nbsp;&nbsp;Regimen with New Drug for failures of regimen for XDR TB</td>
							</tr>
							<tr>
								<td><input type="checkbox" value="Yes" name="dmPattern">&nbsp;&nbsp;&nbsp;Regimen with New Drug for mixed pattern resistance</td>
							</tr>				
						</table><br /><br />
			
						<label>Treatment</label><br /><br />
						<div class="form-inline">
							<input type="radio" name="treatment" value="month" checked>&nbsp;&nbsp;&nbsp;&nbsp;Month&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="treatment" value="week" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Week&nbsp;&nbsp;&nbsp;&nbsp;
							<input name="tvalue" id="tvalue" type="text"  value="" placeholder="Enter Months" class="form-control">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-top : 20px; margin-bottom : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="text-align:center;">					
						<input type="button" class="btn btn-primary" value="BACK">
						<input type="button" class="btn btn-primary" value="FORWARD TO DOCTOR" onclick="saveXDRFollowUpData();">
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
