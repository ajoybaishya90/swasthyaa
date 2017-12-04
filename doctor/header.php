<style>
.button__badge {
  background-color: #fa3e3e;
  border-radius: 30px;
  color: white;
  padding-top: 0px;
  height : 20px;
  width : 20px;
  font-size: 10px;
  text-align : center;
  position: absolute; /* Position the badge within the relatively positioned button */
  top: 5px;
  right: 0;
}

.navbar-default .dropdown-menu.notify-drop {
  min-width: 330px;
  background-color: #fff;
  min-height: 360px;
  max-height: 360px;
}
.navbar-default .dropdown-menu.notify-drop .notify-drop-title {
  border-bottom: 1px solid #e2e2e2;
  padding: 5px 15px 10px 15px;
}
.navbar-default .dropdown-menu.notify-drop .drop-content {
  min-height: 280px;
  max-height: 280px;
  overflow-y: scroll;
}
.navbar-default .dropdown-menu.notify-drop .drop-content::-webkit-scrollbar-track
{
  background-color: #F5F5F5;
}

.navbar-default .dropdown-menu.notify-drop .drop-content::-webkit-scrollbar
{
  width: 8px;
  background-color: #F5F5F5;
}

.navbar-default .dropdown-menu.notify-drop .drop-content::-webkit-scrollbar-thumb
{
  background-color: #ccc;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li {
  border-bottom: 1px solid #e2e2e2;
  padding: 10px 0px 5px 0px;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li:nth-child(2n+0) {
  background-color: #fafafa;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li:after {
  content: "";
  clear: both;
  display: block;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li:hover {
  background-color: #fcfcfc;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li:last-child {
  border-bottom: none;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li .notify-img {
  float: left;
  display: inline-block;
  width: 45px;
  height: 45px;
  margin: 0px 0px 8px 0px;
}
.navbar-default .dropdown-menu.notify-drop .allRead {
  margin-right: 7px;
}
.navbar-default .dropdown-menu.notify-drop .rIcon {
  float: right;
  color: #999;
}
.navbar-default .dropdown-menu.notify-drop .rIcon:hover {
  color: #333;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li a {
  font-size: 12px;
  font-weight: normal;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li {
  font-weight: bold;
  font-size: 11px;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li hr {
  margin: 5px 0;
  width: 70%;
  border-color: #e2e2e2;
}
.navbar-default .dropdown-menu.notify-drop .drop-content .pd-l0 {
  padding-left: 0;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li p {
  font-size: 11px;
  color: #666;
  font-weight: normal;
  margin: 3px 0;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li p.time {
  font-size: 10px;
  font-weight: 600;
  top: -6px;
  margin: 8px 0px 0px 0px;
  padding: 0px 3px;
  border: 1px solid #e2e2e2;
  position: relative;
  background-image: linear-gradient(#fff,#f2f2f2);
  display: inline-block;
  border-radius: 2px;
  color: #B97745;
}
.navbar-default .dropdown-menu.notify-drop .drop-content > li p.time:hover {
  background-image: linear-gradient(#fff,#fff);
}
.navbar-default .dropdown-menu.notify-drop .notify-drop-footer {
  border-top: 1px solid #e2e2e2;
  bottom: 0;
  position: relative;
  padding: 8px 15px;
}
.navbar-default .dropdown-menu.notify-drop .notify-drop-footer a {
  color: #777;
  text-decoration: none;
}
.navbar-default .dropdown-menu.notify-drop .notify-drop-footer a:hover {
  color: #333;
}

.nav > #ndropdown > a:hover{
	background-color: transparent !important;
}

</style>


<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
<input type="hidden" name="userID" id="userId" value="<?php if(isset($_SESSION['pid'])) { echo $_SESSION['pid']; } ?>" />
<div id="header" class="navbar navbar-default navbar-fixed-top" style="background : #dfdcdc !important;">
    <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="icon-reorder"></i>
        </button>
        <a class="navbar-brand" href="#" style="color: #021048;"> SWASTHYAA</a>
    </div>
    <nav class="collapse navbar-collapse">
        <ul class="nav navbar-nav">

        </ul>
        <ul class=" anmcode nav navbar-nav pull-right">
            <li class="dropdown" id="ndropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bell" aria-hidden="true" id="nicon"></i>
					<span class="button__badge"></span>
				</a>
				
				<ul class="dropdown-menu notify-drop" style="margin-left : -285px;">
					<div class="notify-drop-title">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-md-6 col-xs-6">Notification (<b id="ncount"></b>)</div>     
						</div>
					</div>
					<!-- end notify title -->
					<!-- notify content -->
					<div class="drop-content">
						<!-- Append Notification List-->
						<table class="table">
							<tbody class="ntbody"></tbody>
						</table>
					</div>
					<div class="notify-drop-footer text-center">
						<a href="">Show all</a>
					</div>
				</ul>
			</li>
			<li style="margin-left : 10px;"><div class="inset"><img alt="User Pic" src="../assets/temp/<?php if(isset($_SESSION['pid'])) { echo $_SESSION['pid']; } ?>.jpg" id="profile-image1" class="img-circle" style="width : 30px; height : 30px; margin-top:10px;"></div></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php if(isset($_SESSION['Name'])) { echo $_SESSION['Name']; } ?>&nbsp;<i class="fa fa-caret-down"></i></a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="doctor_pro.php"><i class="fa fa-user fa-fw"></i> User Profile</a></li>                        
					<li class="divider"></li>
					<li style="margin-left : 20px;"><i class="fa fa-sign-out fa-fw"></i><input type="button" name="" id="" value="Logout" style="background : transparent; border : none;" onclick="logOut();"/></li>
				</ul>
			</li>
        </ul>
    </nav>
</div>
<script type="text/javascript">
$(document).ready( function() {
	$('.dropdown-toggle').dropdown();
	getNotification();
	var userId = $('#userId').val();
	$("#nicon").click(function(){
		$('.button__badge').hide();
		getRecentNotification();
	});
	if(userId == ''){
		alert('Please Login');
		window.location.href = "http://localhost/swasthyaa/";
	}
});

function getNotification(){
	$.ajax({
		type: "POST",
		url: 'model/getNotification.php',
		dataType: 'JSON',
		success: function(data){
			for(var i in data){
				$('.button__badge').text(data[i].total);
				$('#ncount').text(data[i].total);
			}						  	
		}		
	});
}

function getRecentNotification(){
	$('.ntbody').empty();
	$.ajax({
		type: "POST",
		url: 'model/getRecentTestList.php',
		dataType: 'JSON',
		success: function(data){ 
            for(var i in data){
				$('.ntbody').append('<tr><td style="text-align : left;"><li><div class="col-md-3 col-sm-3 col-xs-3"><div class="notify-img"><img src="http://placehold.it/45x45" alt=""></div></div><div class="col-md-9 col-sm-9 col-xs-9 pd-l0"><input type="button" style="background : transparent; border : none" value="'+data[i].label+'" onclick="patientTestDetails('+data[i].pid+' , '+data[i].dataID+')"><br /><p>Date : '+data[i].date+'&nbsp;&nbsp;'+data[i].time+'&nbsp;&nbsp;'+data[i].dataID+'</p></div></li></td></tr>');
			}				
		}		
	});
}

function patientTestDetails(id , dataID){
	window.location.href = "http://localhost/swasthyaa/doctor/details.php?id="+id+"&did="+dataID;
}

function logOut(){
	window.location.href = "http://localhost/swasthyaa/doctor/model/logout.php";
	//window.location.href = "http://mycity24x7.com/service/model/logout.php";
}		
</script>