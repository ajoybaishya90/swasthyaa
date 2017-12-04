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
$(document).ready(function() {
	$('.dropdown-toggle').dropdown();
});

function patientLogin() {
	
	var birthDay = $('#birthDay').val();
	var birthMonth = $('#birthMonth').val();
	var birthYear = $('#birthYear').val();
	
	var dob = birthDay + '-' + birthMonth + '-' + birthYear;
	
	var pname = $('#pname').val();
	
	if(pname == ''){
		alert('Please enter patient name');
	}else if(birthDay == '00'){
		alert('Choose Birth Date');
	}else if(birthMonth == '00'){
		alert('Choose Birth Month');
	}else if(birthYear == '00'){
		alert('Choose Birth Year');
	}else{
		$.ajax({
			type: "POST",
			data: { pname : pname , dob : dob },
			url: 'model/validatePatient.php',
			dataType: 'JSON',
			success: function(data){  
				if(data.result == 'No'){
					alert('No Patient with this name');
				}else{
					window.location.href = "http://localhost/swasthyaa/techchian/details.php?id="+data.result;
				}
			}		
		});
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
<input type="hidden" name="hf_id" id="hf_id" value="<?php if(isset($_SESSION['HF_ID'])) echo $_SESSION['HF_ID']; ?>">
<div>
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
					<a  href="add_patient.php"><img src="../assets/image/edit.png" id="addpIcon">&nbsp;&nbsp;Add Patient Details</a>
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
				<div class="col-md-5 col-lg-5">
					<div class="form-group">
						<label>Patient Name</label>
						<input type="text" name="pname" id="pname" class="form-control" placeholder="Enter Patient Name" required>
					</div>
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-md-6 col-lg-6">
					<div class="form-group" style="margin-top : 20px;">
					<label>Date of Birth</label>
						<div class="form-inline">
							<select name="birthDay" id="birthDay" style="" class="form-control" required>
								<option value="00" selected>Date</option>
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option> 
								<option value="04">04</option> 
								<option value="05">05</option> 
								<option value="06">06</option> 
								<option value="07">07</option> 
								<option value="08">08</option> 
								<option value="09">09</option>
								<option value="10">10</option> 
							</select>
					
							<select name="birthMonth" id="birthMonth" style="" class="form-control" required>
								<option value="00" selected>Month</option>
								<option value="01">January</option>
								<option value="02">Februry</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>                                                                                                   
							</select>
					
							<select name="birthYear" id="birthYear" style="" placeholder="Year" class="form-control" required>
								<option value="00" selected>Year</option>
								<option>2000</option>
								<option>2001</option>
								<option>2002</option>
								<option>2004</option>
								<option>2005</option>
								<option>2006</option>
								<option>2007</option>
								<option>2008</option>
								<option>2009</option>
								<option>2010</option>
								<option>2011</option>
								<option>2012</option>
								<option>2013</option>
								<option>2014</option>
								<option>2015</option>
								<option>2016</option>
								<option>2017</option>                                                                                                    
							</select>
						</div>
					</div>
				</div>				
			</div>
			<div class="row" style="margin-left : 40px; margin-top : 20px;">
				<div class="col-md-5 col-lg-5" style="text-align : center;">					
					<input type="button" class="btn btn-primary" value="ENTER" onclick="patientLogin();">
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
