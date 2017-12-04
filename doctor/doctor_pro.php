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
<link rel="icon" href="favicon.png" type="image/png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/bootstrap/css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link href="../assets/css/techchian/app.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="../assets/js/metisMenu.min.js"></script>
<script src="../assets/js/sb-admin-2.js"></script>
<style>
table{
	text-align : center; font-size : 15px;
}
.table{
	border-bottom : 0px !important;
}
.table th , .table td{
	border : 0px !important;
}
.btn-bs-file{
    position:relative;
}
.btn-bs-file input[type="file"]{
    position: absolute;
    top: -9999999;
    filter: alpha(opacity=0);
    opacity: 0;
    width:0;
    height:0;
    outline: none;
    cursor: inherit;
}
</style>
</head>
<input type="hidden" name="pid" id="pid" value="<?php echo $_SESSION['pid'] ; ?>" />
<body>
<div>
<?php include 'header.php' ; ?>
</div>
<div id="wrapper">
	<div id="sidebar-wrapper" class="col-md-2" style="">
        <div id="sidebar">
            <ul class="nav list-group">
                <li>
					<a href="dashboard.php"><img src="../assets/image/d.png" id="dashboardIcon"/>&nbsp;&nbsp; Dashboard</a>
				</li>
				<li>
					<a href="patientDetails.php"><img src="../assets/image/edit.png" id="pdIcon">&nbsp;&nbsp;Patient Details</a>
				</li>
				<li>
					<a href=""><img src="../assets/image/edit.png" id="addpIcon">&nbsp;&nbsp;Lab Technician Details</a>
				</li>      
				<li class="active">
					<a  href=""><img src="../assets/image/pw.png" id="profileIcon">&nbsp;&nbsp;&nbsp; Profile</a>              
				</li>
            </ul>
        </div>
    </div>
	<div id="main-wrapper" class="col-md-10 pull-right" style="">
        <div id="main">
			<div class="row form-group" style="height: 65px; border-top: 11px solid #606c38; background-color: #f4f4f5;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14);">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="" style="text-align : right;">
					<i class="fa fa-edit fa-fw" style="color: #a0a0a0;  margin-top:18px;"></i>&nbsp;&nbsp;<b style="color: #a0a0a0; margin-top : 18px; font-size : 18px; font-weight : 500;" >Profile</b>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-1 col-lg-1"></div>
				<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="text-align : center; margin-top : 20px;">
					 <div style="margin-top : 10px; text-align : center;">
						<img alt="User Pic" src="../assets/temp/<?php echo $_SESSION['pid']?>.jpg" id="profile-image" class="" width="170px" height="200px;">	
					 </div>
					 <div style="margin-top : 10px; text-align : center;">
					 <form action="model/changeProfile.php" method="POST" enctype="multipart/form-data">
						<label class="btn-bs-file btn btn-primary">Edit Picture <input type="file" name="file" onchange="readURL(this);"/> </label>
						<button  class="btn btn-default" type="submit" id="imgSubBtn" style="" disabled>Submit</button>                          
					 </form>
					 </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" style="text-align : center; margin-top : 0px;">
					<table class="table borderless">
						<tbody class="tbody">
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
<script type="text/javascript">
$(document).ready(function() {
	$('.dropdown-toggle').dropdown();
	var pid = $('#pid').val();
	getPersonalInfo(pid);
});

function getPersonalInfo(pid){
	$.ajax({
		type: "POST",
		url: 'model/getPersonalInfo.php',
		data: { pid : pid },
		dataType: 'JSON',
		success: function(data){ 
            for(var i in data){
				$('.tbody').append('<tr><td colspan="2" style="text-align : left; font-size : 25px;">'+data[i].adminName+'</td></tr><tr><td colspan="2" style="text-align : left; font-weight : bold;">'+data[i].adminDesignation+'</td></tr><tr><td colspan="2" style=""><hr /></td></tr><tr><td style="text-align : left; font-weight : bold;">Mobile Number</td><td style="text-align : left">'+data[i].adminMobile+'</td></tr><tr><td style="text-align : left; font-weight : bold;">Health Facility</td><td style="text-align : left">'+data[i].hname+'</td></tr><tr><td style="text-align : left; font-weight : bold;">Address</td><td style="text-align : left">'+data[i].adminAddress+'</td></tr><tr><td style="text-align : left; font-weight : bold;">District</td><td style="text-align : left">'+data[i].adminDistrict+'</td></tr><tr><td colspan="2" style="text-align : left;"><input type="button" class="btn" value="Edit Details" style="text-align : center; background-color:#f1635d; color : #fff;" onclick="updateInfo('+data[i].aid+');"></td></tr>');
			}
		}		
	});
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#profile-image')
                .attr('src', e.target.result);
        
        };
        reader.readAsDataURL(input.files[0]);
		$('#imgSubBtn').prop("disabled",false);
    }
}

function updateInfo(id){
	$.ajax({
		type: "POST",
		url: 'model/getPersonalInfo.php',
		data: { pid : id },
		dataType: 'JSON',
		success: function(data){ 
		    $('.tbody').empty();
            for(var i in data){
				$('.tbody').append('<tr><td colspan="2" style="text-align : left; font-size : 25px; color : #f1635d;"></td></tr><tr><td colspan="2" style="text-align : left; font-weight : bold;">'+data[i].adminName+'</td></tr><tr><td colspan="2" style="text-align : left; font-weight : bold;">'+data[i].adminDesignation+'</td></tr><tr><td colspan="2" style=""><hr /></td></tr><tr><td style="text-align : left; font-weight : bold;">Mobie Number</td><td style="text-align : left"><input type="text" class="form-control" value="'+data[i].adminMobile+'" name="newMobile" id="newMobile"></td></tr><tr><td style="text-align : left; font-weight : bold;">Health Facility</td><td style="text-align : left"><select class="form-control" name="hf" id="hf"></select></td></tr><tr><td style="text-align : left; font-weight : bold;">Address</td><td style="text-align : left"><input type="text" class="form-control" name="newAddress" id="newAddress" value="'+data[i].adminAddress+'"></td></tr><tr><td style="text-align : left; font-weight : bold;">District</td><td style="text-align : left"><input type="text" class="form-control" name="newDistrict" id="newDistrict" value="'+data[i].adminDistrict+'"></td></tr><tr><td colspan="2" style="text-align : left;"><input type="button" class="btn" value="Update Details" style="text-align : center; background-color:#f1635d; color : #fff;" onclick="saveUpdatedInfo('+data[i].aid+')"></td></tr>');
				getHealthCenterList();
			}
		}	
	});	
	//$('.tbody').empty();
	//$('.tbody').append('<tr><td colspan="2" style="text-align : left; font-size : 25px; color : #f1635d;"></td></tr><tr><td colspan="2" style="text-align : left; font-weight : bold;"></td></tr><tr><td colspan="2" style=""><hr /></td></tr><tr><td style="text-align : left; font-weight : bold;">Mobie Number</td><td style="text-align : left"></td></tr><tr><td style="text-align : left; font-weight : bold;">Health Facility</td><td style="text-align : left"><input type="text" class="form-control" name="" id=""></td></tr><tr><td style="text-align : left; font-weight : bold;">Address</td><td style="text-align : left"><input type="text" class="form-control" name="" id=""></td></tr><tr><td style="text-align : left; font-weight : bold;">District</td><td style="text-align : left"><input type="text" class="form-control" name="" id=""></td></tr><tr><td colspan="2" style="text-align : left;"><input type="button" class="btn" value="Edit Details" style="text-align : center; background-color:#f1635d; color : #fff;" onclick=""></td></tr>');
}

function getHealthCenterList(){
	$('#hf').empty();
	$('#hf').append('<option value="0">Select Health Center</option>');
	$.ajax({
		type: "POST",
		url: 'model/getHealthCenterList.php',
		dataType: 'JSON',
		success: function(data){   
            for(var i in data){
				$('#hf').append('<option value="'+data[i].ID+'">'+data[i].Name+'</option>');		
			}
		}		
	});
}

function saveUpdatedInfo(id){
	var hf_id = $('#hf').val();
	var mobile = $('#newMobile').val();
	var address = $('#newAddress').val();
	var district = $('#newDistrict').val();
	if(hf_id == '0'){
		alert('Please Choose Health Center');
	}else if(mobile == ''){
		alert('Please Enter New Mobile');
	}else if(address == ''){
		alert('Please Enter New Address');
	}else if(district == ''){
		alert('Please Enter New District');
	}else{
		$.ajax({
		type: "POST",
		url: 'model/updateAdminInfo.php',
		data: { id : id , hf : hf_id , address : address , district : district , mobile : mobile},
		dataType: 'JSON',
		success: function(data){   
            for(var i in data){
				alert(data.result);
				location.reload();
			}
		}		
	});
	}
}
</script>    
</body>
</html>

