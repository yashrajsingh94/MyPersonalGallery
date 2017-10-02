<?php
	
	session_start();
	
	include_once 'connect.php';

	if(isset($_SESSION['use'])!="")
	{
		header("Location: index.php");
	}

	if(isset($_POST['btn-signup']))
	{
		$uemail = mysql_real_escape_string($_POST['uemail']);
		$upass = mysql_real_escape_string($_POST['upass']);
		$umobile = mysql_real_escape_string($_POST['umobile']);
		$ufname = mysql_real_escape_string($_POST['ufname']);
		$ulname = mysql_real_escape_string($_POST['ulname']);

		if(mysql_query("INSERT into user(ufname,ulname,uemail,umobile,upass) values ('$ufname','$ulname','$uemail','$umobile','$upass') ;")){
			echo 'Record inserted successfully';
			header("Location: index.php");
		}else{
			echo mysql_error();
		}		
	}
?>

<!DOCTYPE html>

<html>

<head>

<title>MPG :: Log-In</title>

		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet"  type="text/css" href="css/bootstrap.min.css"/>
		<script rel="stylesheet" src="js/main.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href="bootstrap/global.css" rel="stylesheet" >
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="bootstrap/js/jquery-1.12.2.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		
</head>

<body background="images/img/index.jpg">

<header>

	 <nav class="navbar navbar-inverse">
	
		<div class="container-fluid">
		
			<!-- Logo -->
			<div class="navbar-header">
				<a hre="#" class="navbar-brand" align="center" /> My Personal Gallery </a>
			</div>
			
			</div>
			
		</div>
		
	</nav>

	<div class="container-fluid">
         
    <div class="row">

		<div class="col-xs-4" >

		</div>

		<div class="col-xs-4" style="background-color:rgba(202, 205, 205, 0.100) " id="menu">

			<div align="center" class="mylogin" style="background: rgba(0,0,0,.5)">
				<br/>
			<h1> <strong><font color="white"> LOG-IN </font></strong></h1>
			<br/><span class="text-danger" ></span>
			<form method="post" action="login.php" role="form">
			<br/>
			<input type="email" class="form-control" name="uemail" placeholder="Enter Your Email" style="width:80%" aria-describedby="basic-addon1" required> <br/><br/>
			<input type="password" class="form-control" name="upass" placeholder="Enter Your Password" style="width:80%" aria-describedby="basic-addon1" required><br/><br/>
			<input class="btn btn-primary btn-lg" type="submit" name="btn-login" value="Login"  style=" width:50%"/><br/>
			<br/>
			</form>
			<button class="btn btn-danger btn-lg"  data-toggle="modal" data-target="#popUpWindow"  name="btn-login" style=" width:50%"> Sign Up </button>
			<br/>
			<br/>
			</div>
			
		</div>




		<div class="col-xs-4" >

			<div class="modal fade" id="popUpWindow">

				<div class="modal-dialog">

					<div class="modal-content">

						<div class="modal-header">
						<button class="close" data-dismiss="modal"> &times; </button>
						<h2> Register yourself here...! </h2>
						</div>

						<div class="modal-body">

							<!-- Sign Up Form -->

							<script>
								var password = document.getElementById("password")
								, confirm_password = document.getElementById("confirm_password");

								function validatePassword(){
									if(password.value != confirm_password.value) {
										confirm_password.setCustomValidity("Passwords Don't Match");
									} else {
										confirm_password.setCustomValidity('');
									}
								}

								password.onchange = validatePassword;
								confirm_password.onkeyup = validatePassword;
							</script>


							<form role="form" method="post"  onsubmit="return validatePassword()">
							<div class="form" align="center">
							<br/><br/>
							
							<input type="text" class="form-control" name="ufname"  placeholder="Enter First Name" aria-describedby="basic-addon1" style="width:80%" required ><br/>
							<input type="text" class="form-control" name="ulname"  placeholder="Enter Last Name" aria-describedby="basic-addon1" style="width:80%" required > <br/>
							
							<input type="text" class="form-control" name="umobile"  placeholder="Enter Mobile Number" aria-describedby="basic-addon1" style="width:80%" required > <br/>
							
							<input type="email" class="form-control" name="uemail"  placeholder="Enter Your Email Address" aria-describedby="basic-addon1" style="width:80%" required > <span class="text-danger"> </span> <br/>
							<input type="password" class="form-control" name="upass" id="pwd1" placeholder="Enter Password" aria-describedby="basic-addon1" style="width:80%" required > <br/>
							<input type="password" class="form-control" placeholder="Confirm Password" id="pwd2" aria-describedby="basic-addon1" style="width:80%" required > <br/><br/>

								
							<input class="btn btn-primary btn-lg" type="submit" name="btn-signup" value="Register"  style=" width:auto"/><br/><br/>
							
							</div>
							</form>
						</div>

					</div>

				</div>

			</div>
			
		</div> 

</body>

</html>