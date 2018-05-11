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
$password = $r['password'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile</title>
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
					<li><a href="Destinations.html" class="nav4">Destinations</a></li>
					<li class="end"><a href="Contacts.html" class="nav5">Contact Us</a></li>
				</ul>
			</nav>
			<div class="text">
			<form id="ContactForm">
				<h2 style="padding-left:-110px;">your Profile Details</h2>

<div class="wrapper">
Name:</td><td width="307"> <input class="input" type="text" value="<?php echo $name;?>"  readonly="readonly"></div>
<div class="wrapper">
Address: <input class="input" type="text" value="<?php echo $adress;?>"  readonly="readonly"></div>
<div class="wrapper">
Pin code: <input class="input" type="text" value="<?php echo $pincode; ?>"  readonly="readonly"></div>
<div class="wrapper">
DOB: <input class="input" type="text" value="<?php echo $dob;?>"  readonly="readonly"></div>
<div class="wrapper">
Gender: <input class="input" type="text" value="<?php echo $gender; ?>"  readonly="readonly"></div>
<div class="wrapper">
Mobile No: <input class="input" style="width:330px;" type="text" value="<?php echo $mobile; ?>"  readonly="readonly"></div>
</form>
				<br />
			</div>
			<div class="img">&nbsp;</div>

			<div class="img" style="margin-top:20px;"><b><?php echo date("D d-M-Y");?></b></div>
		</header>
<!-- / header -->
<!-- content -->
		<section id="content">


<form id="ContactForm1">
<div class="wrapper">
Email: <input class="input" type="text" value="<?php echo $email; ?>"  readonly="readonly"></div>
<div class="wrapper">
Password:<input class="input"  type="text" value="- - - - - - -"  readonly="readonly"></div>

<!--<a class="button" href="profile-update.php?id=<?php echo $uid; ?>">EDIT</a>-->
</form>
<br /><br />
<a class="button" href="Home.php?id=<?php echo $uid; ?>">Back</a>

		</section>
<!-- / content -->
	</div>
	<div class="block"></div>
</div>
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
}
else
{
	header("Location:Home.php?id=$uid");
}
?>
</body>
</html>
