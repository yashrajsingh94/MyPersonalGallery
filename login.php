<?php
session_start();
include_once 'connect.php';

if(isset($_SESSION['use'])!="")
{
	header("Location: index.php");
}

if(isset($_POST['btn-login']))
{
	$uemail = mysql_real_escape_string($_POST['uemail']);
	$upass = mysql_real_escape_string($_POST['upass']);
	
	$res=mysql_query("SELECT * FROM user WHERE uemail='$uemail'");
	$row=mysql_fetch_array($res);
	
	$count = mysql_num_rows($res); 
	
	if($count == 1 && $row['upass'] == $upass)
	{
		$_SESSION['use'] = $row['uid'];
		$_SESSION['use_name'] = $row['ufname'].' '.$row['ulname'];
		header("Location: home.php");
	}
	else
	{
		?>
		<script>alert('Username or Password Is Wrong !');</script>
		<?php
	}
	
}
?>

