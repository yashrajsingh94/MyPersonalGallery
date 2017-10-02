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

        <title> MPG :: Dashboard </title>
        <style type="text/css">
    
            body { 
            background-image: url('images/img/home-page.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center; 
            }

        </style>    
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
                    <li class="active"> <a href="home.php"> Home </a> </li>
                    <li > <a href="createAlbum.php"> Create </a> </li>
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

    <div class="container-fluid">

            <div class="row">

                <div class="col-xs-2" >

                </div>

                <div class="col-xs-8" style="background-color:transparent ">
            
            
                    <!-- Home Page Message -->
                    <div class="jumbotron" style="background: rgba(0,0,0,.7)">
                        <h1><font color="#c5c8cc">My Personal Gallery </h1>
                        <p>Personal storage and organization for all your memories.</p>
                        <p>MPG offer users an easy way to create new albums, upload new images and manage existing.</font> </p>
                    </div>
                
                </div>
            </div>

    </div>

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
            </div>     
        </div>
<!-- Modal form for Update END -->


</body>

</html>