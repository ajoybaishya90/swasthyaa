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

.testBtn : hover{
	color : #000;
}
</style>
<script>

var pid = '';
var did = '';
$(document).ready(function() {
	$('.dropdown-toggle').dropdown();
	$('#generateReport').prop("disabled",true);
	pid = $('#pId').val();
	did = $('#dId').val();
	getTestNameList(pid);
	if(did!= ''){
		getTestCount(pid , did);
		getExistTestList(pid , did);
	}
	
	
});

function getTestCount(pid , did){
	$.ajax({
		type: "POST",
		data: { pid : pid , did : did },
		url: 'model/getTestCount.php',
		dataType: 'JSON',
		success: function(data){ 
            for(var i in data){
				if(data[i].total == '0'){
					$('#generateReport').prop("disabled",false);
				}
			}					
		}		
	});
}

function getExistTestList(pid , did){
	var id = '';
	$.ajax({
		type: "POST",
		data: { pid : pid , did : did },
		url: 'model/getExistTestList.php',
		dataType: 'JSON',
		success: function(data){ 
            for(var i in data){
				tid = data[i].testID;
				if(tid == '1'){
					$('#1').attr('disabled', true);
				}
				if(tid == '2'){
					$('#2').attr('disabled', true);
				}
				if(tid == '3'){
					$('#3').attr('disabled', true);
				}
				if(tid == '4'){
					$('#4').attr('disabled', true);
				}
				if(tid == '5'){
					$('#5').attr('disabled', true);
				}
				if(tid == '6'){
					$('#6').attr('disabled', true);
				}
				if(tid == '7'){
					$('#7').attr('disabled', true);
				}
				if(tid == '8'){
					$('#8').attr('disabled', true);
				}
				if(tid == '9'){
					$('#9').attr('disabled', true);
				}
				if(tid == '10'){
					$('#10').attr('disabled', true);
				}
				if(tid == '11'){
					$('#11').attr('disabled', true);
				}
				if(tid == '12'){
					$('#12').attr('disabled', true);
				}
			}			
					
		}		
	});
}



function getTestNameList(pid){
	$.ajax({
		type: "POST",
		data: { pid : pid },
		url: 'model/getTestNameList.php',
		dataType: 'JSON',
		success: function(data){ 
            for(var i in data){
				if(data[i].id == '1'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="1" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '2'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="2" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '3'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="3" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '4'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="4" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '5'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="5" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '6'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="6" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '7'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="7" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '8'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="8" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '9'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="9" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '11'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="11" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
				if(data[i].id == '12'){
					$('.tbody').append('<div class="col-md-3 col-lg-3 col-sm-4"><table class="table"><tbody><tr><td><input type="button" id="12" class="btn testBtn" value="'+data[i].name+'" style="width : 180px;" onclick="gotoTest('+data[i].id+' , '+data[i].dataID+');"></td></tr></tbody></table></div>');
				}
				
			}			
					
		}		
	});
}

function gotoHome(){
	window.location.href = "http://localhost/swasthyaa/techchian/dashboard.php"
}

function gotoTest(id , dataID){
	if(id == '1'){
		window.location.href = "http://localhost/swasthyaa/techchian/microscopy.php?id="+pid+"&did="+dataID;
	}
	if(id == '2'){
		//window.location.href = "http://localhost/swasthyaa/techchian/microscopy.php?id="+pid+"&did="+dataID;
	}
	if(id == '3'){
		//window.location.href = "http://localhost/swasthyaa/techchian/microscopy.php?id="+pid+"&did="+dataID;
	}
	if(id == '4'){
		//window.location.href = "http://localhost/swasthyaa/techchian/microscopy.php?id="+pid+"&did="+dataID;
	}
	if(id == '5'){
		//window.location.href = "http://localhost/swasthyaa/techchian/microscopy.php?id="+pid+"&did="+dataID;
	}
	if(id == '6'){
		//window.location.href = "http://localhost/swasthyaa/techchian/microscopy.php?id="+pid+"&did="+dataID;
	}
	if(id == '7'){
		window.location.href = "http://localhost/swasthyaa/techchian/cbnaat.php?id="+pid+"&did="+dataID;
	}
	if(id == '8'){
		window.location.href = "http://localhost/swasthyaa/techchian/culturetest.php?id="+pid+"&did="+dataID;
	}
	if(id == '9'){
		window.location.href = "http://localhost/swasthyaa/techchian/dst.php?id="+pid+"&did="+dataID;
	}
	if(id == '10'){
		window.location.href = "http://localhost/swasthyaa/techchian/lpa.php?id="+pid+"&did="+dataID;
	}
	if(id == '11'){
		//window.location.href = "http://localhost/swasthyaa/techchian/.php?id="+pid+"&did="+dataID;
	}
	if(id == '12'){
		//window.location.href = "http://localhost/swasthyaa/techchian/microscopy.php?id="+pid+"&did="+dataID;
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
			<div class="row" style="margin-left : 0px;">
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
					<div class="form-group" style="margin-top : 20px;">
						 <label>Requestor Details</label><hr />
						 <table class="table">
							<tbody>
								<tr>
									<td style="font-weight : 600; width : 18%;">Name</td><td style="width : 18%;" id="ltName"><?php echo $_SESSION['Name']; ?></td>
									<td style="font-weight : 600; width : 16%;">Designation</td><td style="width : 18%;" id="ltDesignation">Lab Technician</td>
									<td style="font-weight : 600; width : 15%;">Contact Number</td><td id="ltMobile"><?php echo $_SESSION['mobile']; ?></td>
								</tr>
								<tr>
									<td style="font-weight : 600; width : 18%;">Email ID</td><td style="width : 18%;" id="ltEmail"><?php echo $_SESSION['email']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 0px;">
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
					<div class="form-group" style="margin-top : 20px;">
						 <label>Test Requested</label><hr />
						 <div class="tbody form-inline">
							
						 </div>
						</table>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-top : 70px; margin-bottom:40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">					
					<input type="button" class="btn btn-primary" value="BACK" onclick="gotoHome();">
					<input type="button" class="btn btn-primary" value="GENERATE REPORT" onclick="" id="generateReport">
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
