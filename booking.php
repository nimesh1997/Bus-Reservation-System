<?php
session_start();
require("config.php"); 
if(isset($_SESSION['id']))
{
$uid = $_SESSION['id'];
$bus = $_GET['bus'];
$bust = $bus.'bus';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Booking</title>
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
				<?php 
					if(isset($_SESSION['id']))
{
$uid = $_SESSION['id'];	

$sql = mysql_query("select * from `customers` where id = '$uid'");
if(mysql_num_rows($sql)>0)
{
	$r = mysql_fetch_array($sql);
	$name = $r['name'];		
}
?>
				<ul id="top_nav1">
								<li>Welcome! <?php echo $name;?></li><br />
								<li><a href="logout.php">Logout</a></li>
							</ul>
			</div>
			<nav>
				<ul id="menu">
					<li><a href="index.php" class="nav1">Home</a></li>
					<li><a href="About.html" class="nav2">About Us </a></li>
					<li><a href="Tours.html" class="nav3">Our Tours</a></li>
					<li><a href="Destinations.html" class="nav4">Destinations</a></li>
					<li class="end"><a href="Contacts.html" class="nav5">Contacts</a></li>
				</ul>
			</nav>
			<br />
			<div class="text">
				<h2 style="color:red>"Book Your tickets</h2>
				<?php

$uid = $_SESSION['id'];
echo $bus = $_GET['bus'];
$bust = $bus.'bus';
?>
<?php
if(isset($_POST['book']))
{

	 $seat = $_POST['seat'];
	 $choice = $_POST['choice'];
	 $date = date("Y-m-d");
	echo "<br>";
	if($seat !='')
	{
		if($choice !='')
		{
	
	$book="<b style:font-size:><br>Your ticket is booked</b>";
	}
	else
	{
		?>
        <script>
		alert("Enter your Choice:");
		</script>
        <?php
	}
	}
	else
	{
		?>
        <script>
		alert("Enter Number of seats to be booked:");
		</script>
        <?php
	}
	}
?>
				<form id="ContactForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $uid;?>&bus=<?php echo $bus;?>">   			
<div class="wrapper1">
<b style="font-size:18px">No. of Seats:</b> <input style="width:280px;" class="input" type="text" name="seat" required></div>
<div class="wrapper1" style="margin-left:-120px; margin-top:-30px">
<b style="font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choice:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
<select style="width:280px; height:25px;" name="choice" required>
<option value=""></option>
<option value="N">No Choice</option>
<option value="W">Window</option>
</select></div>
<br />
<input class="button" type="submit" name="book" value="Book">
<div class="book">
<?php
if (isset($_POST['book']))
echo $book;
?>
</div>
</form>
				<br /><br /><br />
			</div>
			<div class="img">&nbsp;</div>
			
			<!--<div class="img" style="margin-top:20px;">&nbsp;<img src="images/vvv.jpg" alt=""></div>-->
			<div class="img" style="margin-top:20px;"><b><?php echo date("D d-M-Y");?></b></div> 

		</header>
<!-- / header -->
	</div>

</div>
<div class="body1">
	<div class="main">
<!-- footer -->
		<footer>
			<a rel="nofollow" href="" target="_blank"></a>&copy; 2012 Sigma Travels<br>
			</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>

    <?php
	
	}

}

else
{
	header("Location:Home.php?id=$uid");
}
?>
</body>
</html>