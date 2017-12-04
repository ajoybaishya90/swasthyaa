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
	var did = '';

$(document).ready(function() {
	$('#examination').addClass('active');
	$('#labIcon').attr("src", '../assets/image/eyew.png');
	$('.dropdown-toggle').dropdown();
	
	pid = $('#pId').val();
	did = $('#dId').val();
	
});

function saveMicroscopyData(){
	var mtype = $("input[name=mtype]:checked").val();
	var lab_a = $('#lab_a').val();
	var appearance_a = $('#appearance_a').val();
	var negative_a = $('#negative_a').val();
	var scanty_a = $('#scanty_a').val();
	var a_1 = $('#a_1').val();
	var a_2 = $('#a_2').val();
	var a_3 = $('#a_3').val();
	var lab_b = $('#lab_b').val();
	var appearance_b = $('#appearance_b').val();
	var negative_b = $('#negative_b').val();
	var scanty_b = $('#scanty_b').val();
	var b_1 = $('#b_1').val();
	var b_2 = $('#b_2').val();
	var b_3 = $('#b_3').val();
	
	$.ajax({
		type: "POST",
		data: {pid:pid, did : did ,mtype:mtype, lab_a:lab_a, appearance_a:appearance_a, negative_a:negative_a, scanty_a:scanty_a, a_1:a_1, a_2:a_2, a_3:a_3, lab_b:lab_b, appearance_b:appearance_b, negative_b:negative_b, scanty_b:scanty_b, b_1:b_1, b_2:b_2, b_3:b_3},
		url: 'model/saveMicroscopyData.php',
		dataType: 'JSON',
		success: function(data){ 
		    if(data.result == 'Success'){
				window.location.href = "http://localhost/swasthyaa/techchian/patienttest.php?id="+pid+"&did="+did;
			}else{
				alert('Datas are not saved');
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
<input type="hidden" name="dId" id="dId" value="<?php if(isset($_GET['did'])) echo $_GET['did']; ?>">
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
				<div class="col-lg-12 col-md-12 col-sm-12 form-group" style="margin-top : 30px; padding-left:0; padding-right:0">
					<label>Microscopy</label><br />
					<input type="radio" name="mtype" value="ZN" checked>&nbsp;&nbsp;&nbsp;&nbsp;ZN&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="mtype" value="Florescent" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FLORESCENT<br />
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-lg-12 col-md-12 col-sm-12 form-group" style="padding-left:0; padding-right:0">
					<label>Sample A :</label>
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-3 col-lg-3" style="padding-left:0;">
					<label>Lab Serial Number</label>
					<input type="text" name="lab_a" id="lab_a" class="form-control" value="" style="width : 200px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-3 col-lg-3">
					<label>Visual Appearance</label>
					<input type="text" name="appearance_a" id="appearance_a" class="form-control" value="" style="width : 200px;" placeholder="Enter Result"/><br />
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-lg-12 col-md-12 col-sm-12 form-group" style="padding-left:0; padding-right:0">
					<label>Result A :</label>
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-2 col-lg-2" style="padding-left:0;">
					<label>Negative</label>
					<input type="text" name="negative_a" id="negative_a" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>Scanty</label>
					<input type="text" name="scanty_a" id="scanty_a" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>1+</label>
					<input type="text" name="a_1" id="a_1" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>2+</label>
					<input type="text" name="a_2" id="a_2" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>3+</label>
					<input type="text" name="a_3" id="a_3" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/><br />
				</div>
			</div>	
			<div class="row" style="margin-left : 40px;">
				<div class="col-lg-12 col-md-12 col-sm-12 form-group" style="padding-left:0; padding-right:0">
					<label>Sample B :</label>
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-3 col-lg-3" style="padding-left:0;">
					<label>Lab Serial Number</label>
					<input type="text" name="lab_b" id="lab_b" value="" class="form-control" style="width : 200px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-3 col-lg-3">
					<label>Visual Appearance</label>
					<input type="text" name="appearance_b" id="appearance_b" value="" class="form-control" style="width : 200px;" placeholder="Enter Result"/><br />
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-lg-12 col-md-12 col-sm-12 form-group" style="padding-left:0; padding-right:0">
					<label>Result B :</label>
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-2 col-lg-2" style="padding-left:0;">
					<label>Negative</label>
					<input type="text" name="negative_b" id="negative_b" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>Scanty</label>
					<input type="text" name="scanty_b" id="scanty_b" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>1+</label>
					<input type="text" name="b_1" id="b_1" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>2+</label>
					<input type="text" name="b_2" id="b_2" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/>
				</div>
				<div class="col-md-2 col-lg-2">
					<label>3+</label>
					<input type="text" name="b_3" id="b_3" value="" class="form-control" style="width : 100px;" placeholder="Enter Result"/>
				</div>
			</div>
			<div class="row" style="margin-top : 20px; margin-bottom : 60px;">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="text-align:center;">					
						<input type="button" class="btn btn-primary" value="BACK">
						<input type="button" class="btn btn-primary" value="SAVE AND NEXT" onclick="saveMicroscopyData();">
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
