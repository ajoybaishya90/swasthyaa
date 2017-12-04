<?php                               
    session_start();                        
   // $newfilename= $_SESSION['newfilename'];
?>
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
<link href="../assets/css/anm/app.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="../assets/js/metisMenu.min.js"></script>
<script src="../assets/js/sb-admin-2.js"></script>
    
<script type="text/javascript">
$(document).ready(function() {
	$('.dropdown-toggle').dropdown();
    $('#alist').addClass('active');
	$('#adetailsIcon').attr("src", '../assets/image/prow.png');
	getHealthCenterList();
});
function showTable(){
    $('#dataTables-example2').show();
}

function getHealthCenterList(){
	$('.healthList').empty();
	$('.healthList').append('<option value="0">Select Health Center</option>');
	$.ajax({
		type: "POST",
		url: 'model/getHealthCenterList.php',
		dataType: 'JSON',
		success: function(data){   
            for(var i in data){
				$('.healthList').append('<option value="'+data[i].ID+'">'+data[i].Name+'</option>');		
			}
		}		
	});
}

function getAshaList(){
	var j = 1;
	$('.ashaList').empty();
	var healthCenter = $('.healthList').val();
	if(healthCenter == '0'){
		alert('Please choose health center');
	}else{
		$.ajax({
			type: "POST",
			url: 'model/getAshaListByHF.php',
			data: { hid : healthCenter },
			dataType: 'JSON',
			success: function(data){ 
                if(jQuery.isEmptyObject(data)){
						$('.ashaList').append('<tr><td colspan="4">No Data Found</td></tr>');		
				}else{			
					for(var i in data){
						$('.ashaList').append('<tr><td>'+j+'</td><td>'+data[i].name+'</td><td>'+data[i].mobile+'</td><td>'+data[i].total+'</td><td><i style=" color: black !important;" class=" glyphicon glyphicon-eye-open"></i>&nbsp;<input type="button" style="background:transparent; border : none; color : #3ea0dc" value="View" onclick="showPatientList('+data[i].id+');"></td></tr>');		
						j++;
					}
				}
			}		
		});
	}
}

function showPatientList(id){
	var j = 1;
	$('.plist').empty();
	$('.phead').empty();
	$.ajax({
		type: "POST",
		url: 'model/getPatientList.php',
		data: { asha_id : id },
		dataType: 'JSON',
		success: function(data){ 
			$('.phead').append('<tr><th>SL NO</th><th>PATIENT NAME</th><th>DETAILS</th></tr>');
            if(jQuery.isEmptyObject(data)){
						
			}else{			
				for(var i in data){
					$('.plist').append('<tr><td>'+j+'</td><td>'+data[i].Name+'</td><td><i style=" color: black !important;" class=" glyphicon glyphicon-eye-open"></i>&nbsp;<input type="button" style="background:transparent; border : none; color : #3ca0dc;" value="View" onclick="showPatientDetails('+data[i].ID+');"></td></tr>');		
					j++;
				}
			}
		}		
	});
}

function showPatientDetails(pid){
	//alert(id);
	$.ajax({
		type: "POST",
		url: 'model/getPatientDetails.php',
		data: { pid : pid },
		dataType: 'JSON',
		success: function(data){ 
				$('#infoUpdateModal').modal('toggle');
				for(var i in data){	
				    $('#PName').html(data[i].PName);
					$('#DOB').html(data[i].DOB);
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
</script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
table{
	font-size : 12px; text-align : center;
}
th{
	text-align : center;
}
</style>
</head>

<body>
<div>
<?php include 'header.php'; ?>
</div>
<div id="wrapper">
	<div id="sidebar-wrapper" class="col-md-2" style="">
        <div id="sidebar">
            <ul class="nav list-group">
                <li style="border-bottom : 1px solid #9fa1a3;">
                    <a href="dashboard.php"><img src="../assets/image/d.png" id="dashboardIcon"/>&nbsp;&nbsp; Dashboard</a>
                </li>
                <li style="border-bottom : 1px solid #9fa1a3;">
                    <a href="new_patient.php"><img src="../assets/image/edit.png" id="referralIcon">&nbsp;&nbsp; New referral slip</a>
                </li>
                <li style="border-bottom : 1px solid #9fa1a3;">
                    <a href="forw_patient.php"><img src="../assets/image/eye.png" id="fpatientIcon">&nbsp;&nbsp;Forwarded referral slip</a>
                </li>
                <li class="active" style="border-bottom : 1px solid #9fa1a3;">
					<a href="asha_list.php"><img src="../assets/image/prow.png" id="adetailsIcon">&nbsp;&nbsp;&nbsp; ASHA Details</a>
                </li>
                <li style="border-bottom : 1px solid #9fa1a3;">
                    <a href="anm_pro.php"><img src="../assets/image/p.png" id="profileIcon">&nbsp;&nbsp;&nbsp; Profile</a>              
                </li>
            </ul>
        </div>
    </div>
	<div id="main-wrapper" class="col-md-10 pull-right" style="">
        <div id="main">
			<div class="row form-group" style="height: 65px; border-top: 11px solid #f1635d; background-color: #f4f4f5;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14);">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="" style="text-align : right;">
					<i class="fa fa-edit fa-fw" style="color: #a0a0a0;  margin-top:18px;"></i>&nbsp;<b style="color: #a0a0a0; margin-top : 18px; font-size : 18px; font-weight : 500;" >Asha List</b>
				</div>
			</div>
			
			<div class="row" style="margin-top : 20px;">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<select name="dist" class="form-control healthList" onchange="getAshaList();"></select>	
				</div>
			</div>
			
			<div class="row" style="margin-top : 20px;">
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
					<table class="table table-bordered   table-hover">
						<thead class="thead" style="background-color: #f7a9a5; font-weight : bold;">
							<tr><th>SL NO</th><th>ASHA NAME</th><th>MOBILE NUMBER</th><th>TOTAL PATIENT</th><th>PATIENT DETAILS</th></tr>
						</thead>
						<tbody class="tbody ashaList"></tbody>
					</table>
				</div>
		
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
					<table class="table table-bordered   table-hover" style="display : none;">
						<thead class="thead phead" style="background-color: #f7a9a5; font-weight : bold;">
						</thead>
						<tbody class="tbody plist">
						</tbody>
					</table>
				</div>
			</div>
			
		
	
        </div>                        
    </div>
</div>
<div class="row">
	<?php include 'footer.php'; ?>
</div>

<!-- Information Update Modal -->
<div class="modal fade" id="infoUpdateModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h4 id="PName">Ajoy Baishya</h4>
		</div>
		<div class="modal-body">
			<div class="row">
			<div class="col-md-6 col-lg-6" style="background : #fff !important;">
				<table class="table table-bordered table-hover">
					<tbody>
						<tr><td colspan="2" style="text-align : left">Personal Details</td></tr>
						<tr><td>DOB</td><td id="DOB"></td></tr>
						<tr><td>Address</td><td id="Address"></td></tr>
						<tr><td>Mobile</td><td id="Mobile"></td></tr>
						<tr><td>Family Mobile</td><td id="FMobile"></td></tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-6 col-lg-6" style="background : #fff !important;">
				<table class="table table-bordered table-hover">
					<tbody>
						<tr><td colspan="2" style="text-align : left">Health Details</td></tr>
						<tr><td>Cough</td><td id="caugh"></td></tr>
						<tr><td>Fever</td><td id="fever"></td></tr>
						<tr><td>Loss of Weight</td><td id="weight"></td></tr>
						<tr><td>Night Sweat</td><td id="sweat"></td></tr>
						<tr><td>Blood in Cough/Sputum</td><td id="sputum"></td></tr>
					</tbody>
				</table>
			</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-6" style="background : #fff !important;">
				<table class="table table-bordered table-hover">
					<tbody>
						<tr><td colspan="2" style="text-align : left">Key Population Indicator</td></tr>
						<tr><td>Contact of TB/MDR TB Patient</td><td id="contact"></td></tr>
						<tr><td>Refugee</td><td id="refugee"></td></tr>
						<tr><td>Diabetes</td><td id="diabetes"></td></tr>
						<tr><td>Urban Slum</td><td id="urban"></td></tr>
						<tr><td>Tobacco</td><td id="tobacco"></td></tr>
						<tr><td>Health Care Worker</td><td id="health"></td></tr>
						<tr><td>Prison</td><td id="prison"></td></tr>
						<tr><td>Migrant</td><td id="migrant"></td></tr>
						<tr><td>Miner</td><td id="miner"></td></tr>
						<tr><td>Other</td><td id="other"></td></tr>
					</tbody>
				</table>
				</div>
				<div class="col-md-6 col-lg-6" style="background : #fff !important;">
				<table class="table table-bordered table-hover">
					<tbody>
						<tr><td colspan="2" style="text-align : left">Reffering Details</td></tr>
						<tr><td colspan="2" style="text-align : left">Reffering Health Facility</td></tr>
						<tr><td colspan="2" style="text-align : left" id="referring"></td></tr>
						<tr><td colspan="2" style="text-align : left">Referred health facility</td></tr>
						<tr><td colspan="2" style="text-align : left" id="referred"></td></tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>	

</body>
</html>
