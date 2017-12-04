
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
<input type="hidden" name="userID" id="userId" value="<?php if(isset($_SESSION['pid'])) { echo $_SESSION['pid']; } ?>" />
<div id="header" class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="icon-reorder"></i>
        </button>
        <a class="navbar-brand" href="#" style="color: #021048;"> SWASTHYAA</a>
    </div>
    <nav class="collapse navbar-collapse">
        <ul class="nav navbar-nav">

        </ul>
        <ul class="anmcode nav navbar-nav pull-right">
            <li><a href=""><i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i></a></li>
			<li><div class="inset"><img alt="User Pic" src="../assets/temp/<?php if(isset($_SESSION['pid'])) { echo $_SESSION['pid']; } ?>.jpg" id="profile-image1" class="img-circle" style="width : 30px; height : 30px; margin-top:10px;"></div></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php if(isset($_SESSION['Name'])) { echo $_SESSION['Name']; } ?>&nbsp;<i class="fa fa-caret-down"></i></a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="anm_pro.php"><i class="fa fa-user fa-fw"></i> User Profile</a></li>                        
					<li class="divider"></li>
					<li style="margin-left : 20px;"><i class="fa fa-sign-out fa-fw"></i><input type="button" name="" id="" value="Logout" style="background : transparent; border : none;" onclick="logOut();"/></li>
				</ul>
			</li>
        </ul>
    </nav>
</div>
<script type="text/javascript">
$(document).ready( function() {  
	var userId = $('#userId').val();
	if(userId == ''){
		alert('Please Login');
		window.location.href = "http://172.16.16.125/swasthyaa/";
	}
});
function logOut(){
	window.location.href = "http://172.16.16.125/swasthyaa/anm/model/logout.php";
	//window.location.href = "http://mycity24x7.com/service/model/logout.php";
}		
</script>
