

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
        header("Location: home.php");
    
    }else{
    
        echo mysql_error();
    }       
	
	}

?>

<html>
    
    <head>

        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

        <link rel="stylesheet"  type="text/css" href="css/bootstrap.min.css"/>

        <script rel="stylesheet" src="js/main.js" type="text/javascript"></script>

        <script src="js/bootstrap.min.js"></script>

        <link href="bootstrap/global.css" rel="stylesheet" >

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <script src="bootstrap/js/jquery-1.12.2.js"></script>

        <script src="bootstrap/js/bootstrap.min.js"></script>

        <title>  MPG :: View </title>
      
    </head>

    <body>

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
            
                    <li > <a href="createAlbum.php"> Create </a> </li>
            
                    <li class="active"> <a href="view.php"> View </a> </li>
            
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


		<style type="text/css">
			
			body
			
			{
			 background:#fff;
			}
			
			img
			{
			 width:auto;
			 box-shadow:0px 0px 20px #cecece;
			 -moz-transform: scale(0.7);
			 -moz-transition-duration: 0.6s; 
			 -webkit-transition-duration: 0.6s;
			 -webkit-transform: scale(0.7);
			 
			 -ms-transform: scale(0.7);
			 -ms-transition-duration: 0.6s; 
			}

			img:hover
			{
			  box-shadow: 20px 20px 20px #dcdcdc;
			 -moz-transform: scale(0.8);
			 -moz-transition-duration: 0.6s;
			 -webkit-transition-duration: 0.6s;
			 -webkit-transform: scale(0.8);
		 
			 -ms-transform: scale(0.8);
			 -ms-transition-duration: 0.6s; 
			}

		</style>

</body>

</html>



<?php
	$folder_path = 'images/uploads/'; 

	$num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

	$folder = opendir($folder_path);
	 
	if($num_files > 0)
	{
	    while(false !== ($file = readdir($folder))) 
	 {
	  $file_path = $folder_path.$file;
	  $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
	  if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp') 
	  {
	   ?>
	            <a href="<?php echo $file_path; ?>"><img src="<?php echo $file_path; ?>"  height="250" /></a>
	            <?php
	  }
	 }
	}
	else
	{
	    echo "the folder was empty !";
	}
	closedir($folder);
?>

