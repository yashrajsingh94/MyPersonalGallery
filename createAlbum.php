
<?php
	session_start();
	include_once 'connect.php';

		if(!isset($_SESSION['use']))
		{
			header("Location: login.php");
		}
		
		$id=$_SESSION['use'];
		$res=mysql_query("SELECT * FROM user WHERE user.uid=$id;");
		$Row=mysql_fetch_array($res);

		if(isset($_POST['btn-update']))
		{
			$uemail = mysql_real_escape_string($_POST['uemail']);
			$upass = mysql_real_escape_string($_POST['upass']);
			$umobile = mysql_real_escape_string($_POST['umobile']);
			$ufname = mysql_real_escape_string($_POST['ufname']);
			$ulname = mysql_real_escape_string($_POST['ulname']);

		if(mysql_query("UPDATE user SET ufname='$ufname',ulname = '$ulname',uemail = '$uemail',umobile = '$umobile',upass = '$upass' WHERE user.uid='$id';")){
		echo 'Record updated successfully';
		header("Location: createAlbum.php");
		}
		else
		{
		echo mysql_error();
		}		
	}
?>


<!DOCTYPE html>
<html>

<head>
	
	<title>MPG :: Upload</title>

	<link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
	
	<link rel="stylesheet"  type="text/css" href="css/bootstrap.min.css"/>
	
	<script rel="stylesheet" src="js/main.js" type="text/javascript"></script>
	
	<script src="js/bootstrap.min.js"></script> 

</head>



<body background="images/img/create.jpg">

	<nav class="navbar navbar-inverse">
							    
		<div class="container-fluid">
							        
			<!-- Logo -->
			<div class="navbar-header">
							   
				<a hre="#" class="navbar-brand" align="center" /> My Personal Gallery </a>
							
			</div>

			<!-- Menu on Left -->
			<div>
							
			<ul class="nav navbar-nav">
							
				<li > <a href="home.php"> Home </a> </li>
							
				<li class="active"> <a href="createAlbum.php"> Create </a> </li>
				            
				<li > <a href="view.php"> View </a> </li>
							
			</ul>
							
			</div>

			<!-- Menu on Right -->
			<ul class="nav navbar-nav navbar-right">
		                    
		    	<li class="dropdown">
		                    
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $_SESSION['use_name'] ?> <span class="caret"></span></a>
		                    
		            <ul class="dropdown-menu">
		                    
		                <li><a class="dropdown-toggle"  data-toggle="modal" data-target="#popUpWindow" name="btnsub" style="width:100%"> Update </a></li>
		                    
		                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span> Log-Out </a></li>
		                    
		            </ul>
		                    
		        </li>
		           
		    </ul>
									            
		</div>
							        
	</nav>
	
	<script type="text/javascript">
	
		
		function validatePassword()
		{
			var x = document.getElementById('pwd1').value;
			var y = document.getElementById('pwd2').value;

				if(x == y)
				{
					return true;
				}
				else
				{
					alert(" Passwords Do Not Match !");
					return false;
				}
				
		}

	</script>	

	<div class="col-xs-4" >

        <div class="modal fade" id="popUpWindow">

        	<div class="modal-dialog">

                <div class="modal-content">

                        <div class="modal-header">
                            
                            <button class="close" data-dismiss="modal"> &times; </button>
                                
                                <h2> Update your profile...! </h2>
                                
                        </div>

                        <div class="modal-body">

	                        <!-- Update Form -->
							<form role="form" method="post" action="createAlbum.php" onsubmit="return validatePassword()">
	                        
	                            <div class="form" align="center">
	                            <br/><br/>
	                                            
	                                <input class="form-control" placeholder="First Name" name="ufname" type="text" value="<?php echo $Row['ufname']; ?>" autofocus="" required><br/>
	                                <input class="form-control" placeholder="Last Name" name="ulname" type="text" value="<?php echo $Row['ulname']; ?>" required><br/>
	                                <input class="form-control" placeholder="Phone Number" name="umobile" type="tel" value="<?php echo $Row['umobile']; ?>" required><br/>
	                                <input class="form-control" placeholder="Email" name="uemail" type="email" value="<?php echo $Row['uemail']; ?>" required><br/>
	                                <input class="form-control" placeholder="Password" id="pwd1" name="upass" type="text"  required><br/>
	                                <input class="form-control" placeholder="Password" id="pwd2" type="text" value="<?php $Row['upass']; ?>" required><br/><br/>

	                                <button class="btn btn-success" type="submit" name="btn-update">Update Information</button>
	                            </div>
	                            <br/>

	                        </form>

                        </div>
                </div>

        	</div>

        </div>

    </div>
<!-- Modal form for Update END -->




	<div class="container-fluid">
	
		<div class="page-header text-center">
	
			Welcome,<h3 class="text-uppercase"> <?php echo $_SESSION['use_name']?><h3>
		</div>
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">Create New Album</div>
						<div class="panel-body">
							<form role="form" method="post" enctype="multipart/form-data">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="Album Name" name="album_name" type="text" autofocus="" required>
									</div>
									<div class="form-group">
										<input class="form-control" list="categories" placeholder="Image Category Name" name="ulname" type="text"  required>
										<datalist id="categories">
											<option value="small"/>
											<option value="medium"/>
											<option value="big"/>
										</datalist>
									</div>
									<div class="form-group">
										<p>Image Upload :</p>
										<input  type="file" name="files[]" id="files" multiple="multiple" onChange="makeFileList();">
										<p>
											<strong>Files You Selected:</strong>
										</p>
										<ul id="fileList">
											<li>No Files Selected</li>
										</ul>
									</div>
									<button class="btn btn-success" type="submit" name="btn-createAlbum">Create Album</button>
									<button class="btn btn-success" type="reset">RESET</button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		


		<script>
			function makeFileList() {
				var input = document.getElementById("files");
				var ul = document.getElementById("fileList");
				while (ul.hasChildNodes()) {
					ul.removeChild(ul.firstChild);
				}
				for (var i = 0; i < input.files.length; i++) {
					var li = document.createElement("li");
					console.log(input.files);
					li.innerHTML = '<img src="'+input.files[i].name+'" alt="'+input.files[i].name+'">';
					ul.appendChild(li);
				}
				if(!ul.hasChildNodes()) {
					var li = document.createElement("li");
					li.innerHTML = 'No Files Selected';
					ul.appendChild(li);
				}
			}
		</script>

	</body>

</html>



<?php
	
	$format_file = array("jpg", "png", "gif", "jpeg");
	
	$path = "images/uploads/"; // Lokasi folder untuk menampung file
	
	$count = 0;
		
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	
			foreach ($_FILES['files']['name'] as $f => $name) {     
		
				if ($_FILES['files']['error'][$f] == 4) {
	        	
	        		continue; // Skip file if any error found
	    		
	    			}	       
	    		
	    		if ($_FILES['files']['error'][$f] == 0) {	           
	    	
	    			if (! in_array(pathinfo($name, PATHINFO_EXTENSION), $format_file)) {
	    		
	    				$message[] = "$name is not a valid format";
				
						continue; // Skip invalid file formats
	        
	        			}else{ // No error found! Move uploaded files 
	        	
	        		if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
	        		
	        			echo "Success: File ".$name." uploaded.<br/>";
	        	
	        		else
	        	
	        			echo "Error: File ".$name." cannot be uploaded.<br/>";
	   
	   				    }
					}
				}
			}
?>