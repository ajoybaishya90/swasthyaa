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
<link href="../assets/css/anm/app.css" rel="stylesheet">
<link href="../assets/css/anm/new_patient.css" rel="stylesheet">
<link href="../assets/css/anm/breadcum.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<title> Swasthyaa</title>
<style>
table{
	font-weight : 500;
}
.form-control{
	border-radius : 0;
}

.breadcum a { display: inline-block; position: relative; height: 30px; width: 200px; padding: 0 10px 0 40px; font: 14px/30px helvetica, sans-serif; text-decoration: none; color: #fff; background: coral; }
.breadcum a:first-child { border-radius: 4px 0 0 5px; }
.breadcum a:last-of-type { border-radius: 0 4px 4px 0; }

.breadcum a:after { content: ""; display: inline-block; position: absolute; right: -15px; z-index: 2; border-left: 15px solid coral; border-top: 15px solid transparent; border-bottom: 15px solid transparent; }
   
.breadcum a:before { content: ""; display: inline-block; position: absolute; top: -2px; left: 0; z-index: 1; border-left: 17px solid white; border-top: 18px solid transparent; border-bottom: 15px solid transparent; }
.breadcum a:first-of-type:before { display: none; }

.breadcum a:hover { background: powderblue; color: black; }
.breadcum a:hover:after { border-left-color: powderblue; }


.linkOn { background: orange; }
.linkOn:after { border-left-color: orange; }
</style>
<script>
$(document).ready(function() { 
	$('.dropdown-toggle').dropdown();
	
	//Deactivate health details and referral link
	
	
	var url = "http://172.16.16.125/swasthyaa/anm/new_patient.php";
	var successpersonalInfo = url + '?successPersonalInfo';
	var failpersonalInfo = url + '?failPersonalInfo';
	var existpersonalInfo = url + '?exist';
	
	var successhealthInfo = url + '?successHealthInfo';
	var failhealthInfo = url + '?failHealthInfo';
	
	var successReferralInfo = url + '?successReferralInfo';
	var failReferralInfo = url + '?failReferralInfo';
	
	if(document.URL == successpersonalInfo){
		 
		$('#personalDetailsForm').hide();
		$('#referralDetailsForm').hide();
		$('#healthDetailsForm').show();
	}
	if(document.URL == failpersonalInfo){
		alert('Please try again');
		$('#personalDetailsForm').show();
		$('#referralDetailsForm').hide();
		$('#healthDetailsForm').hide();
	}
	if(document.URL == existpersonalInfo){
		alert('This mobile number already exist');
		$('#personalDetailsForm').show();
		$('#referralDetailsForm').hide();
		$('#healthDetailsForm').hide();
	}
	
	if(document.URL == successhealthInfo){
		$('#personalDetailsForm').hide();
		$('#referralDetailsForm').show();
		$('#healthDetailsForm').hide();
	}
	if(document.URL == failhealthInfo){
		alert('Please try again');
		$('#personalDetailsForm').hide();
		$('#referralDetailsForm').hide();
		$('#healthDetailsForm').show();
	}
	
    if(document.URL == successReferralInfo){
		alert('Patient Details Successfully Saved');
		window.location = 'http://172.16.16.125/swasthyaa/anm/dashboard.php';
		$('#personalDetailsForm').hide();
		$('#referralDetailsForm').show();
		$('#healthDetailsForm').hide();
	}
	if(document.URL == failReferralInfo){
		alert('Please try again');
		$('#personalDetailsForm').hide();
		$('#referralDetailsForm').show();
		$('#healthDetailsForm').hide();
	}
	
	$('#patientPersonalForm').on('submit',(function(event) {
	
    var radioValue = $("input[name='patientMobile']:checked").val();
		if(radioValue == 'Yes'){
			if($('#patientNumber').val() == ''){
				alert('Please enter your mobile no.');
				event.preventDefault();
			}else{
				$("#patientPersonalForm").submit();
			}
		}
	}));
	
	$("input[type='radio']").click(function(){
    var radioValue = $("input[name='patientMobile']:checked").val();
		if(radioValue == 'Yes'){
			$('#patientNumber').show();
			$('#ashaName').hide();
		}
		if(radioValue == 'No'){
			$('#patientNumber').hide();
			$('#ashaName').show();
			var hf_id = $('#hf_id').val();
			getAshaList(hf_id);
		}
	});
	
	$("input[type='radio']").click(function(){
    var radioValue = $("input[name='coughradio']:checked").val();
		if(radioValue == 'Yes'){
			$('#coughDays').prop("disabled",false);
		}
		if(radioValue == 'No'){
			$('#coughDays').prop("disabled",true);
		}
	});
	
	$("input[type='radio']").click(function(){
    var radioValue = $("input[name='feverradio']:checked").val();
		if(radioValue == 'Yes'){
			$('#feverDays').prop("disabled",false);
		}
		if(radioValue == 'No'){
			$('#feverDays').prop("disabled",true);
		}
	});
	
	$("input[type='radio']").click(function(){
    var radioValue = $("input[name='weightradio']:checked").val();
		if(radioValue == 'Yes'){
			$('#weightDays').prop("disabled",false);
		}
		if(radioValue == 'No'){
			$('#weightDays').prop("disabled",true);
		}
	});
	
	$("input[type='radio']").click(function(){
    var radioValue = $("input[name='sweatradio']:checked").val();
		if(radioValue == 'Yes'){
			$('#sweatDays').prop("disabled",false);
		}
		if(radioValue == 'No'){
			$('#sweatDays').prop("disabled",true);
		}
	});
	
	$("input[type='radio']").click(function(){
    var radioValue = $("input[name='coughsputumradio']:checked").val();
		if(radioValue == 'Yes'){
			$('#coughsputumDays').prop("disabled",false);
		}
		if(radioValue == 'No'){
			$('#coughsputumDays').prop("disabled",true);
		}
	});
	
	
	$("#Other").click(function() {
		var checked_status = this.checked;
		if (checked_status == true) {
			$("#othervalue").attr("disabled", false);
		} else {
			$("#othervalue").attr("disabled", true);
		}
		
	});
	
	getHfName();
});

function showHealthForm(){
	var PName = $('#PName').val();
	if(PName == ''){
		alert('Enter Patient name');
	}else{
		$('#healthDetailsBtn').addClass('active');
		$('#personalDetailsBtn').removeClass('active');
		$('#personalDetailsBtn').prop("disabled",true);
		$('#healthDetailsBtn').prop("disabled",false);
		$('#personalDetailsForm').hide();
		$('#referralDetailsForm').hide();
		$('#healthDetailsForm').show();
	}
}

function showreferralForm(){
	$('#referralDetailsBtn').addClass('active');
	$('#healthDetailsBtn').removeClass('active');
	$('#personalDetailsBtn').removeClass('active');
	$('#healthDetailsBtn').prop("disabled",true);
	$('#personalDetailsBtn').prop("disabled",true);
	$('#referralDetailsBtn').prop("disabled",false);
	$('#personalDetailsForm').hide();
	$('#referralDetailsForm').show();
	$('#healthDetailsForm').hide();
}

function formOne(){
	$('#personalDetailsBtn').addClass('active');
	$('#healthDetailsBtn').removeClass('active');
	$('#referralDetailsBtn').removeClass('active');
	//$('#healthDetailsBtn').prop("disabled",true);
	//$('#referralDetailsBtn').prop("disabled",true);
	$('#personalDetailsForm').show();
	$('#referralDetailsForm').hide();
	$('#healthDetailsForm').hide();
}

function formTwo(){
	$('#personalDetailsBtn').removeClass('active');
	$('#healthDetailsBtn').addClass('active');	
	$('#referralDetailsBtn').removeClass('active');
	//$('#healthDetailsBtn').prop("disabled",true);
	//$('#referralDetailsBtn').prop("disabled",true);
	$('#personalDetailsForm').hide();
	$('#referralDetailsForm').hide();
	$('#healthDetailsForm').show();
}
function formThree(){
	$('#personalDetailsBtn').removeClass('active');
	$('#healthDetailsBtn').removeClass('active');	
	$('#referralDetailsBtn').addClass('active');
	//$('#healthDetailsBtn').prop("disabled",true);
	//$('#referralDetailsBtn').prop("disabled",true);
	$('#personalDetailsForm').hide();
	$('#referralDetailsForm').show();
	$('#healthDetailsForm').hide();
}

function getHfName(){
	$('#referred_to').empty();
	$('#referring').empty();
	$.ajax({
		type: "POST",
		url: 'model/getHFInfo.php',
		dataType: 'JSON',
		success: function(data){ 
            for(var i in data){
				$('#referred_to').append('<option value="'+data[i].ID+'">'+data[i].Name+'</option>');
				$('#referring').append('<option value="'+data[i].ID+'">'+data[i].Name+'</option>');
			}
		}		
	});
}

function calculateAge(){
	var now = new Date();
	
	var birthDate = $('#birthDay').val();
	var birthMonth = $('#birthMonth').val();
	var birthYear = $('#birthYear').val();
	
	if(birthDate == '00'){
		alert('Please choose Birth Date');
	}else if(birthMonth == '00'){
		alert('Please choose BirthMonth');
	}else{
		var dob = birthDate+'/'+birthMonth+'/'+birthYear;
		var dob = dob.split("/");
        var born = new Date(dob[2], dob[1]-1, dob[0]);
        age=get_age(born,now);
		//alert(age);
		$('#age').val(age);
	}
}

function get_age(born, now) {
      var birthday = new Date(now.getFullYear(), born.getMonth(), born.getDate());
      if (now >= birthday) 
        return now.getFullYear() - born.getFullYear();
      else
        return now.getFullYear() - born.getFullYear() - 1;
    }
	
function getAshaList(hf_id){
	$('#ashaName').empty();
	
	$.ajax({
		type: "POST",
		url: 'model/getAshaList.php',
		dataType: 'JSON',
		data: { id : hf_id },
		success: function(data){ 
					
			for(var i in data){
				$('#ashaName').append('<option value="'+data[i].id+'">'+data[i].Name+'</option>');		
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
<input type="hidden" name="hf_id" id="hf_id" value="<?php if(isset($_SESSION['HF_ID'])) echo $_SESSION['HF_ID']; ?>">
<div>
	<?php include 'header.php'; ?>
</div>
<div id="wrapper">
	<div id="sidebar-wrapper" class="col-md-2" style="">
        <div id="sidebar">
            <ul class="nav list-group">
                <li>
                    <a href="dashboard.php"><img src="../assets/image/d.png" id="dashboardIcon"/>&nbsp;&nbsp; Dashboard</a>
                </li>
                <li class="active">
                    <a href="new_patient.php"><img src="../assets/image/editw.png" id="referralIcon">&nbsp;&nbsp; New referral slip</a>
                </li>
                <li>
                    <a href="forw_patient.php"><img src="../assets/image/eye.png" id="fpatientIcon">&nbsp;&nbsp;Forwarded referral slip</a>
                </li>
                <li>
					<a href="asha_list.php"><img src="../assets/image/pro.png" id="adetailsIcon">&nbsp;&nbsp;&nbsp; ASHA Details</a>
                </li>
                <li>
                    <a href="anm_pro.php"><img src="../assets/image/p.png" id="profileIcon">&nbsp;&nbsp;&nbsp; Profile</a>              
                </li>
            </ul>
        </div>
    </div>
	<div id="main-wrapper" class="col-md-10 pull-right" style="">
        <div id="main">
			<div class="row form-group" style="height: 65px; border-top: 11px solid #f1635d; background-color: #f4f4f5;  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14);">
				<div class="col-xs-8 col-sm-8 col-md-9 col-lg-9" style="">
					<div class="breadcum" style="margin-top : 13px; margin-left : 50px;">
					<a href="#" style="">PERSONAL DETAILS</a><a href="#">HEALTH DETAILS</a><a href="#">REFERRAL DETAILS</a>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3" style="text-align:right; ">
					<i class="fa fa-edit fa-fw" style="color: #a0a0a0;  margin-top:18px;"></i>&nbsp;&nbsp;<b style="color: #a0a0a0; margin-top : 18px; font-size : 18px; font-weight : 500;" >New Referral Slip</b>
				</div>
			</div>
		
			<div class="row" style="margin-top : 10px; margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<form name = "" id="patientPersonalForm" action="model/savePatientPersonalInfo.php" method="POST" style="margin-top : 20px;">
						<div class="" id="personalDetailsForm">
							<div class="form-group">
								<label>Patient Name</label>
								<input name="PName" id="PName" type="text"  placeholder="Enter Patient Name" class="form-control" required>
							</div>
			
							<div class="form-inline" style="margin-top : 20px;">
								<div class="form-group">
									<label>Date of Birth</label>
									<select name="birthDay" id="birthDay" style="" class="form-control" required>
										<option value="00" selected>Date</option>
										<option>01</option>
										<option>02</option>
										<option>03</option>
										<option>04</option>
										<option>05</option>
										<option>06</option>
										<option>07</option>
										<option>08</option>
										<option>09</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
										<option>13</option>
										<option>14</option>
										<option>15</option>
										<option>16</option>
										<option>17</option>
										<option>18</option>
										<option>19</option>
										<option>20</option>
										<option>21</option>
										<option>22</option>
										<option>23</option>
										<option>24</option>
										<option>25</option>
										<option>26</option>
										<option>27</option>
										<option>28</option>
										<option>29</option>
										<option>30</option>
										<option>31</option>										
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
									
									<select name="birthYear" id="birthYear" style="" placeholder="Year" class="form-control" onchange="calculateAge();" required>
										<option disabled selected>Year</option>
										<option>1968</option>
										<option>1969</option>
										<option>1970</option>
										<option>1971</option>
										<option>1972</option>
										<option>1973</option>
										<option>1974</option>
										<option>1975</option>
										<option>1976</option>
										<option>1977</option>
										<option>1978</option>
										<option>1979</option>
										<option>1980</option>
										<option>1981</option>
										<option>1982</option>
										<option>1983</option>
										<option>1984</option>
										<option>1985</option>
										<option>1986</option>
										<option>1987</option>
										<option>1988</option>
										<option>1989</option>
										<option>1990</option>
										<option>1991</option>
										<option>1992</option>
										<option>1993</option>
										<option>1994</option>
										<option>1995</option>
										<option>1996</option>
										<option>1997</option>
										<option>1998</option>
										<option>1999</option>
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
									<input name="age" id="age"  style="" type="number" class="form-control" placeholder="Age" value="">
								</div>                                        
							</div>
		
							<div class="form-group" style="margin-top : 20px;">
								<div class="form-inline">
								<label>Sex</label>&nbsp;&nbsp;&nbsp;
									<input type="radio" name="gender" value="Female" checked>&nbsp;Female&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="gender" value="Male" >&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio" name="gender" value="TG">&nbsp;TG&nbsp;&nbsp;&nbsp;&nbsp;
								</div>
							</div>
							<div class="form-group">
								<label>Address</label>
									<input name="address" id="address" type="text" class="form-control"  placeholder="Enter House No." value=""/><br />
									<input name="locality" id="locality" type="text" class="form-control"  placeholder="Enter Locality" value="" />
							</div>
							<div class="form-inline">
								<div class="form-group">
									<input name="pin" id="pin" type="text" class="form-control" style="width : 150px;" placeholder="Enter PIN Code" value="" maxlength="6" size="6">            
									<select name="district" id="district" class="form-control" style="margin-left : 10px;">
										<option value="Kamrup">Kamrup  </option>
										<option value="Barpeta">Barpeta</option>
									</select>
									<select name="city" id="city" class="form-control" style="margin-left : 10px;">
										<option value="Guwahati">Guwahati</option>
										<option value="Barpeta">Barpeta</option>
									</select>
								</div>			 
							</div>
							<div class="form-inline" style="margin-top : 20px;">
								<label>Patient mobile number</label>&nbsp;&nbsp;						
								<input type="radio" name="patientMobile" value="Yes" checked>&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="patientMobile" value="No" >&nbsp;No&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="text" name="patientNumber" id="patientNumber" placeholder="Patient mobile no." class="form-control" maxlength="10" value="">
								<select name="ashaName"  class="form-control"  onchange="" id="ashaName" style="display : none;"></select>              
							</div>
		
							<label style="margin-top : 20px;">Mobile number of any family member</label>
							<div class="input-group">
							  <span class="input-group-addon">+91</span>
							  <input type="number" name="familyNumber" id="familyNumber" placeholder="Family mobile no." class="form-control" maxlength="10" value="">
							</div> 
		
							<div class="input-group" style="margin-top : 20px; margin-bottom : 30px;">
																	
								<label>Please call on &nbsp;<span style="color:#d0011b; font-size: 18px;">9999555500</span>&nbsp; to register.</label><br />                                     										 
								<input type="submit" id="activate-step-2" class="btn btn-default" value="Next"/>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="row" style="margin-bottom : 40px; margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
					<form name="" action="model/savePatientHealthInfo.php" method="POST">
						<div class="" style="display : none;" id="healthDetailsForm">                                 									        
							<label>Cough</label>
							<div class="form-inline">                                          
							  
									Yes <input type="radio" name="coughradio" value="Yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					                                                  
									No <input type="radio" name="coughradio" value="No" checked>                                  
									<input name="coughDays" id="coughDays"  style="width : 160px; margin-left : 15px;" type="number" class="form-control" placeholder="Enter Days" value="" disabled>               
							</div>
							<label style="margin-top : 20px;">Fever</label>
							<div class="form-inline">                                                  
									Yes <input type="radio" name="feverradio" value="Yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                
									No <input type="radio" name="feverradio" value="No" checked>                                    
									<input name="feverDays" id="feverDays"  style=" width: 160px; margin-left : 15px;" type="number" class="form-control" placeholder="Enter Days" value="" disabled>                
							</div>
							<label style="margin-top : 20px;">Loss of weight</label>
							<div class="form-inline">                                                           
									Yes&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="weightradio" value="Yes">&nbsp;&nbsp;&nbsp;&nbsp;                                    
									No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="weightradio" value="No" checked>                                    
									<input name="weightDays" id="weightDays"  style=" width: 160px; margin-left : 15px;" type="number" class="form-control" placeholder="Enter Days" value="" disabled>                
							</div>
							<label style="margin-top : 20px;">Night Sweat</label>
							<div class="form-inline">   
									Yes <input type="radio" name="sweatradio" value="Yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									No <input type="radio" name="sweatradio" value="No" checked>
									<input name="sweatDays" id="sweatDays"  style=" width: 160px; margin-left : 15px;" type="number" class="form-control" placeholder="Enter Days" value="" disabled>            
							</div>
							<label style="margin-top : 20px;">Blood in Cough/Sputum</label>
							<div class="form-inline">                     
									Yes <input type="radio" name="coughsputumradio" value="Yes">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                  
									No <input type="radio" name="coughsputumradio" value="No" checked>					
									<input name="coughsputumDays" id="coughsputumDays"  style=" width: 160px; margin-left : 15px;" type="number" class="form-control" placeholder="Enter Days" value="" disabled>                
							</div><br />                            
							<label>Key Population Indicator</label><br> 
							<table>
								<tr>
									<td style="width : 250px;"><input type="checkbox" value="Yes" name="Contact">&nbsp;Contact of TB/MDR TB Patient</td>
									<td><input type="checkbox" value="Yes" name="Refugee">&nbsp;Refugee</td>
								</tr>
								<tr>
									<td><input type="checkbox" value="Yes" name="Diabetes">&nbsp;Diabetes</td>
									<td><input type="checkbox" value="Yes" name="Urban">&nbsp;Urban Slum</td>
								</tr>
								<tr>
									<td><input type="checkbox" value="Yes" name="Tobacco">&nbsp;Tobacco</td>
									<td><input type="checkbox" value="Yes" name="Health">&nbsp;Health Care Worker</td>
								</tr>
								<tr>
									<td><input type="checkbox" value="Yes" name="Prison">&nbsp;Prison</td>
									<td><input type="checkbox" value="Yes" name="Migrant">&nbsp;Migrant</td>
								</tr>
								<tr>
									<td><input type="checkbox" value="Yes" name="Miner">&nbsp;Miner</td>
									<td><input type="checkbox" value="Yes" name="Other" id="Other">&nbsp;Other</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="text" value="" name="othervalue" id="othervalue" class="form-control" style="margin-top : 10px;" placeholder="Specify" disabled/></td>
								</tr>
							</table> <br />
							<input type="submit"  class="btn btn-default" id="activate-step-3" value="Next"/>
						</div>
					</form>
				</div>
			</div>

			<div class="row" style="margin-top : 10px; margin-left : 40px;">
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
					<form name="" action="model/savePatientreferralInfo.php" method="POST">
						<div class="" style="display : none;" id="referralDetailsForm">
							<div class="form-group">
								<label>Lab referred to</label>
									<select name="referred_to" id="referred_to" class="form-control" required></select>
							</div>
							<div class="form-group">
								<label>Name of referrring HF</label>
									<select name="referring" id="referring" class="form-control" required></select>
							</div>
							<label>Enter Nikshay ID</label>
							<div class="form-group">
								<input name="NIK"  type="text" class="form-control" style="" placeholder="Enter ID If Applicable" value="">
							</div>
							<button type="submit" name="submit" class="btn btn-default" value="submit" id="referralSubBtn">Forward to Lab Technichian</button>
							<button type="reset" class="btn">Reset</button>
						</div>
					</form>
				</div>
			</div>
        </div>                        
    </div>
</div>
	
	
	<div class="row">
		<?php include 'footer.php'; ?>
	</div>
	</div>
	
</div>		
</body>
</html>
