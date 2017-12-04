<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Swasthyaa</title>
<link rel="icon" href="favicon.png" type="image/png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">

<!-- MetisMenu CSS -->
<link href="assets/css/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../assets/css/sb-admin-2.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/sb-admin-2.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>	
@font-face {
	font-family: "bebas";
	src: url("bebas.otf");
}
.title
{		
	text-align:center;
	color: #a9a9a9;
	font-family:bebas;
	font-size:50px;
	font-weight: 500;
	margin-top: 50px;
}
</style>
</head>

<body>
    <div class="container">
		<div class="row">
		<h1 class="title"> Swasthyaa</h1>
	</div>
    <div class="row" style="margin-top: -60px;">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Log In</h3>
                </div>
                <div class="panel-body">          
                        <fieldset>
							<form action = "anm/model/validateUser.php" method = "POST">
							<div class="form-group">
                                <input class="form-control" placeholder="Username" type="text" name = "username" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" type="password" name = "password" required>
							</div>                       
                            <!-- Change this to a button or input when using this as a form -->
                            <input type = "submit" value = "Login" name="Login"/><br /><br><br>
							</form>
						</fieldset>                    
                </div>
            </div>
        </div>
    </div>
    </div>

  <!-- Login Fail Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header" style="background : #e8692e;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login Failed</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready( function(){
	var current_url = "http://127.16.16.125/swasthyaa/login.php";
	var fail_url = current_url + '?fail';
	if(document.URL == fail_url){
		$('#myModal').modal('toggle');
	}
});
</script>
</body>
</html>