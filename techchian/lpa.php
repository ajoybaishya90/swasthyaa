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
	
	pid = $('#pId').val();
	did = $('#dId').val();
	
});

function saveXDRFollowUpData(){
	

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
                <li>
					<a  href="dashboard.php"><img src="../assets/image/d.png" id="dashboardIcon"/>&nbsp;&nbsp; Dashboard</a>
				</li>
				<li>
					<a  href="patientDetails.php"><img src="../assets/image/edit.png" id="pdIcon">&nbsp;&nbsp;Patient Details</a>
				</li>
				<li>
					<a  href="add_patient.php"><img src="../assets/image/edit.png" id="addpIcon">&nbsp;&nbsp;Add Private Patient Details</a>
				</li>
				<li class="active">
					<a  href="login.php"><img src="../assets/image/eyew.png" id="labIcon">&nbsp;&nbsp;Lab Examination</a>
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
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group" style="margin-top : 20px;">
						<label>Line Probe Assay (LPA)</label><br /><br />				
						<input type="radio" name="mtype" value="ZN" checked>&nbsp;&nbsp;&nbsp;&nbsp;Direct&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="mtype" value="Florescent" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Indirect<br /><br />
						<label>Lab Serial Number</label>
						<input type="text" value="" name="lab_no" id="lab_no" class="form-control" placeholder="Enter Serial Number" style="width : 250px;"><br />
						<label>First Line LPA</label><br />
						<p>RpoB : Locus Control</p><br />						
					</div>
				</div>
			</div>
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11" style="background : #dee0e2;">
					<div class="form-group">																							
						<table class="table" style="width : 50%">
								<tr><td><label>Present In (WT1-WT8)</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT1</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT2</td>									
								</tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT3</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT4</td>									
								</tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT5</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT6</td>									
								</tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT7</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT8</td>									
								</tr>
								<tr><td><label>Present In (WT1-WT8)</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT1(D516V)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT2A(H526Y)</td>									
								</tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT2B(H526D)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT3(S531L)</td>									
								</tr>								
						</table>																															
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group" style="margin-top : 20px;">
						<label>Kat G : Locus Control</label>										
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11" style="background : #dee0e2;">
					<div class="form-group">           					
						<table class="table" style="width : 50%">
								<tr><td><label>Present In</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT1</td>									
								</tr>							
								<tr><td><label>Present In (MUT1-MUT2)</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT1(S315T1)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT2A(S315T2)</td>									
								</tr>																
						</table>																															
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group" style="margin-top : 20px;">
						<label>Inh A : Locus Control</label>										
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11" style="background : #dee0e2;">
					<div class="form-group">           					
						<table class="table" style="width : 50%">
								<tr><td><label>Present In</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT1(-15 ,-16)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT2(-8)</td>
								</tr>							
								<tr><td><label>Present In (MUT1-MUT2)</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT1(C15T)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT2(A16G)</td>									
								</tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT3A(T18C)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT3B(T8A)</td>									
								</tr>
						</table>																															
					</div>
				</div>
			</div><hr />
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group" style="margin-top : 20px;">
						<label>Second Line LPA</label>
						<p>gyrA : Locus Control</p><br />							
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11" style="background : #dee0e2;">
					<div class="form-group">																							
						<table class="table" style="width : 50%">
								<tr><td><label>Present In (WT1-WT3)</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT1</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT2</td>									
								</tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT3</td>								
								</tr>
								<tr><td><label>Present In (MUT1-MUT3)</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT1 (A90V)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT2 (S91P)</td>									
								</tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT3A (D94A)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT3B (D94N/Y)</td>									
								</tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT3C (D94G)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT3D (D94H)</td>									
								</tr>
						</table>																															
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group" style="margin-top : 20px;">
						<p>gyrB : Locus Control</p><br />							
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11" style="background : #dee0e2;">
					<div class="form-group">																							
						<table class="table" style="width : 50%">
								<tr><td><label>Present In</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT1 (536-541)</td>									
								</tr>
								<tr><td><label>Present In (MUT1-MUT2)</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT1 (N538D)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT2 (E540V)</td>									
								</tr>
						</table>																															
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group" style="margin-top : 20px;">
						<p>rrs : Locus Control</p><br />							
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11" style="background : #dee0e2;">
					<div class="form-group">																							
						<table class="table" style="width : 50%">
								<tr><td><label>Present In</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT1 (1401-02)</td>	
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT2 (1484)</td>									
								</tr>
								<tr><td><label>Present In (MUT1-MUT2)</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT1 (A1401G)</td>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT2 (G1484T)</td>									
								</tr>
						</table>																															
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="form-group" style="margin-top : 20px;">
						<p>eis</p><br />							
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11" style="background : #dee0e2;">
					<div class="form-group">																							
						<table class="table" style="width : 50%">
								<tr><td><label>Present In</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT1 (37)</td>	
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT2 (14,12,10)</td>									
								</tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;WT3 (2)</td>									
								</tr>
								<tr><td><label>Present In (MUT1-MUT2)</label></td></tr>
								<tr>
									<td><input type="checkbox" name="r" value="yes">&nbsp;&nbsp;&nbsp;MUT1 (C-14T)</td>									
								</tr>
								
						</table>																															
					</div>
				</div>
			</div><hr />
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label>Final LPA Interpretation</label><br /><br />
						<label>MTB result</label><br /><br />
						<input type="radio" name="mtype" value="ZN" checked>&nbsp;&nbsp;&nbsp;&nbsp;MTB positive&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="mtype" value="Florescent" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MTB negative<br /><br />						
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label>RIF</label><br /><br />
						<table style="width : 100%;">
							<tr>
								<td><input type="radio" name="mtype" value="ZN" checked>&nbsp;&nbsp;&nbsp;Sensitive</td>
								<td><input type="radio" name="mtype" value="ZN">&nbsp;&nbsp;&nbsp;Resistant</td>
								<td><input type="radio" name="mtype" value="ZN">&nbsp;&nbsp;&nbsp;Indeterminante</td>
								
							</tr>
						</table>												
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px; margin-top:20px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label>INH</label><br /><br />
						<table style="width : 100%;">
							<tr>
								<td><input type="radio" name="mtype" value="ZN" checked>&nbsp;&nbsp;&nbsp;Sensitive</td>
								<td><input type="radio" name="mtype" value="ZN">&nbsp;&nbsp;&nbsp;Resistant</td>
								<td><input type="radio" name="mtype" value="ZN">&nbsp;&nbsp;&nbsp;Indeterminante</td>
								
							</tr>
						</table>												
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px; margin-top:20px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label>Quinolone</label><br /><br />
						<table style="width : 100%;">
							<tr>
								<td><input type="radio" name="mtype" value="ZN" checked>&nbsp;&nbsp;&nbsp;Sensitive</td>
								<td><input type="radio" name="mtype" value="ZN">&nbsp;&nbsp;&nbsp;Resistant</td>
								<td><input type="radio" name="mtype" value="ZN">&nbsp;&nbsp;&nbsp;Indeterminante</td>
								
							</tr>
						</table>												
				</div>
			</div>
			
			<div class="row" style="margin-left : 40px; margin-top:20px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label>SLID</label><br /><br />
						<table style="width : 100%;">
							<tr>
								<td><input type="radio" name="mtype" value="ZN" checked>&nbsp;&nbsp;&nbsp;Sensitive</td>
								<td><input type="radio" name="mtype" value="ZN">&nbsp;&nbsp;&nbsp;Resistant</td>
								<td><input type="radio" name="mtype" value="ZN">&nbsp;&nbsp;&nbsp;Indeterminante</td>
								
							</tr>
						</table>												
				</div>
			</div>
			
			<div class="row" style="margin-top : 20px; margin-bottom : 60px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align:center;">					
						<input type="button" class="btn btn-primary" value="BACK">
						<input type="button" class="btn btn-primary" value="SAVE AND NEXT" onclick="">
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
