<style>
.active{
	
}
</style>
<input type="hidden" name="userID" id="userId" value="<?php if(isset($_SESSION['pid'])) { echo $_SESSION['pid']; } ?>" />
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html" style="color: #021048;"> SWASTHYAA</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">     
        <li><a href="view_notif.php"><i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i></a></li>
		<li>
            <div class="inset">
                <img alt="User Pic" src="../assets/temp/<?php if(isset($_SESSION['pid'])) { echo $_SESSION['pid']; } ?>.jpg" id="profile-image1" class="img-circle" style="width : 30px; height : 30px;">
			</div>
		</li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <?php if(isset($_SESSION['Name'])) { echo $_SESSION['Name']; } ?>&nbsp;<i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="anm_pro.php"><i class="fa fa-user fa-fw"></i> User Profile</a></li>                        
				<li class="divider"></li>
                <li style="margin-left : 20px;"><i class="fa fa-sign-out fa-fw"></i><input type="button" name="" id="" value="Logout" style="background : transparent; border : none;" onclick="logOut();"/></li>
            </ul>
        </li>
    </ul>
	
    <nav class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
				<li style="" id="dashboard">
                    <a href="dashboard.php"><img src="../assets/image/d.png" id="dashboardIcon"/>&nbsp;&nbsp; Dashboard</a>
                </li>
                <li id="npatient">
                    <a href="new_patient.php"><img src="../assets/image/edit.png" id="referralIcon">&nbsp;&nbsp; New referral slip</a>
                </li>
                <li id="fpatient">
                    <a href="forw_patient.php"><img src="../assets/image/eye.png" id="fpatientIcon">&nbsp;&nbsp;View forwarded referral slip</a>
                </li>
                <li id="alist">
					<a href="asha_list.php"><img src="../assets/image/pro.png" id="adetailsIcon">&nbsp;&nbsp;&nbsp; ASHA Details</a>
                </li>
                <li id="anmpro">
                    <a href="anm_pro.php"><img src="../assets/image/p.png" id="profileIcon">&nbsp;&nbsp;&nbsp; Profile</a>              
                </li>
            </ul>
        </div>
	</nav>  <!-- /.navbar-static-side -->
</nav>
<script type="text/javascript">
$(document).ready( function() {  
	var userId = $('#userId').val();
	if(userId == ''){
		alert('Please Login');
		window.location.href = "http://localhost/swasthyaa/";
	}
});
function logOut(){
	window.location.href = "http://localhost/swasthyaa/anm/model/logout.php";
	//window.location.href = "http://mycity24x7.com/service/model/logout.php";
}		
</script>