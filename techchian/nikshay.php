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
.form-control{
	border-radius : 0;
}
.btn-warning: hover {
	background : #bdc6b4 !important;
}
</style>
<script>

	var pid = '';
	var pstatus = '';

$(document).ready(function() {
	$('#examination').addClass('active');
	$('#labIcon').attr("src", '../assets/image/eyew.png');
	$('.dropdown-toggle').dropdown();
	
	pid = $('#pId').val();
	getReferringHf(pid);
	checkPatientStatus(pid);
	getNikshayDetails(pid);
	
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

function getReferringHf(pid){
	$.ajax({
		type: "POST",
		data: { pid : pid },
		url: 'model/getrefHf.php',
		dataType: 'JSON',
		success: function(data){
		    for(var i in data){
				$('#referringHf').val(data[i].HName);
				$('#state').val(data[i].State);
				$('#district').val(data[i].District);
				
			}
		}		
	});
}



function saveNikshayDetails(){
	//window.location.href = "http://localhost/swasthyaa/techchian/diagnosis.php?id="+pid;
	var nikshayId = $('#establishmentId').val();
	var cdl = $('#cdl1').val();
	var rntpc = $('#rntpc').val();
	var pmdt = $('#pmdt').val();
	var drid = $('#drid').val();
	var tb_unit = $('#tb_unit').val();
	
	$.ajax({
		type: "POST",
		data: { pid : pid , nikshayId : nikshayId , cdl : cdl , rntpc : rntpc , pmdt : pmdt , drid : drid , tb_unit : tb_unit},
		url: 'model/saveNikshayDetails.php',
		dataType: 'JSON',
		success: function(data){
		    	if(data.result == 'Success'){					
						window.location.href = "http://localhost/swasthyaa/techchian/pcategory.php?id="+pid;										
				}else{
					alert('Nikshay Details is not saed');
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
<div>
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
				<div class="col-md-8 col-lg-8">
					<div class="form-group">
						<label>Name of Reffering Facility</label>
						<input type="text" name="referringHf" id="referringHf" class="form-control" placeholder="Referring Facility" disabled>
					</div>
			
					<div class="form-group">
						<label>Health Establishment ID (NIKSHY)</label>
						<input type="text" name="establishmentId" id="establishmentId" class="form-control" placeholder="Enter NIKSHY ID">
					</div>
					
					<div class="form-group">
						<label>CDL NIKSHAY ID</label>				
						<input type="text" name="cdl1" id="cdl1" class="form-control" placeholder="Enter CDL Nikshay Id">				
					</div>
					
					<div class="form-group">
						<label>RNTPC TB Reg No.</label>
						<input type="text" name="rntpc" id="rntpc" class="form-control" placeholder="Enter RNTPC TB Reg No">
					</div>
			
					<div class="form-group">
						<label>PMDT TH Number</label>
						<input type="text" name="pmdt" id="pmdt" class="form-control" placeholder="Enter PMDT TH Number">
					</div>
			
					<div class="form-group">
						<label>DR TB NIKSHY ID</label>
						<input type="text" name="drid" id="drid" class="form-control" placeholder="Enter DR TB NIKSHY ID">
					</div>
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-2 col-lg-2" style="">
					<div class="form-group">
						<label>State</label>
						<input type="text" name="state" id="state" class="form-control" placeholder="State" disabled>
					</div>
				</div>
				
				<div class="col-md-3 col-lg-3">
					<div class="form-group">
						<label>District</label>
						<input type="text" name="district" id="district" class="form-control" placeholder="District" disabled>
					</div>
				</div>
				
				<div class="col-md-3 col-lg-3" style="">
					<div class="form-group">
						<label>Tuberculosis Unit(TU):</label>
						<input type="text" name="tb_unit" id="tb_unit" class="form-control" placeholder="Tb Unit">
					</div>
				</div>
			</div>
			<div class="row" style="margin-top : 20px; margin-bottom : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="text-align : center;">					
						<input type="button" class="btn btn-primary" value="BACK">
						<input type="button" class="btn btn-primary" value="NEXT" onclick="saveNikshayDetails();">					
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
