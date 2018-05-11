<?php
session_start();
require("config.php"); 
if(isset($_SESSION['id']))
{
$uid=$_SESSION['id'];
$sql = mysql_query("select * from `customers` where id = '$uid'");
$r = mysql_fetch_array($sql);

$name = $r['name'];
$dob = $r['dob'];
$adress = $r['address'];
$mobile = $r['mobile'];
$pincode = $r['pin_code'];
$gender = $r['gender'];
$email = $r['email'];
$password = sha1($r['password']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Password Update</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>  
<script type="text/javascript" src="js/Myriad_Pro_600.font.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
	<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
</head>
<body id="page2">
<div class="extra">
	<div class="main">
<!-- header -->
		<header>
			<header>
			<div class="wrapper1">
				<div class="logo1"><h1><a href="index.html">Sigma Travels</a></h1></div>
							<ul id="top_nav1">
								<li>Welcome! <?php echo $name;?></li><br />
								<li><a href="logout.php">Logout</a></li>
							</ul>
			</div>
			<nav>
				<ul id="menu">
					<li><a href="index.html" class="nav1">Home</a></li>
					<li><a href="About.html" class="nav2">About Us </a></li>
					<li><a href="Tours.html" class="nav3">Our Tours</a></li>
					<li><a href="Destinations.html" class="nav4">Destinations</a></li>
					<li class="end"><a href="Contacts.html" class="nav5">Contacts</a></li>
				</ul>
			</nav>
			<div class="text">
				
				<form id="ContactForm" method="post">
				<h2>Change Your Password</h2><br>   
<div class="wrapper3">
<b style="float:left;padding-left:68px;">OLD PASSWORD :</b> <input class="input" type="password" name="oldp" required></div>
<div class="wrapper3">
<b style="float:left;padding-left:68px;">NEW PASSWORD :</b> <input class="input" type="password"  name="newp" required ></div>
<div class="wrapper3">
<b style="float:left;padding-left:68px;">CONFIRM PASSWORD :</b> <input class="input" type="password" name="conp" required ></div>
<input class="button" type="submit" value="Change" name="pas"><br><br>
</form>
				<br />
			</div>
			<div class="img">&nbsp;</div>
		</header>
		<a class="button" href="home.php?id=<?php echo $uid; ?>" style="margin-right: 240px;">Back</a>
<!-- / header -->
	</div>

</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div class="body1">
	<div class="main">
<!-- footer -->
		<footer>
			<a rel="nofollow" href="" target="_blank"></a>&copy; <b>2016 Sigma Travels</b><br>
			</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
<?php

if(isset($_POST['pas'])){
	$oldp = sha1($_POST['oldp']);
	$newp = sha1($_POST['newp']);
	$conp = sha1($_POST['conp']);
	
	$uid=$_SESSION['id'];
$sql = mysql_query("select * from customers where id = '$uid'");
$r = mysql_fetch_array($sql);
$password = sha1($r['password']);
	
 	/*if($oldp=='' || $oldp=='' || $newp==''){
		echo "<table class=table cellpadding=0 cellspacing=0 align=center bgcolor=#FFFF66 style=font-family:verdana;>
		<tr><td><font color=#FF0000 size=2>&nbsp;Please Enter The Password in All Fields &nbsp;</font></td></tr></table>";
	}*/
	/*else if($oldp!=$password){
			echo "<table class=table cellpadding=0 cellspacing=0 align=center bgcolor=#FFFF66 style=font-family:verdana;>
		<tr><td><font color=#FF0000 size=2>&nbsp;The Old Password is incorrect &nbsp;</font></td></tr></table>";
			}*/
	
	 if($newp != $conp){
		echo "<table class=table cellpadding=0 cellspacing=0 align=center bgcolor=#FFFF66 style=font-family:verdana;>
		<tr><td><font color=#FF0000 size=2>&nbsp; New Password and Confirm Password are not match &nbsp;</font></td></tr></table>";
		}
		
else{
	$sql = mysql_query("update customers set password='$newp' where id='$uid' AND password='$oldp'");
	header('location:Home.php?id=$uid');
	?>
    <script>
	alert('Password Successfully changed');
	</script>
    <?php
	
	}

}

}
else
{
	header("location: /home.php?id=$uid");
}
?>
</body>
</html>