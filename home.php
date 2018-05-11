<?php
session_start();
require("config.php");
if(isset($_SESSION['id']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<body id="page2 ">
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
					<li><a href="index.html" class="nav1">Home</a></li>
					<li><a href="About.html" class="nav2">About Us </a></li>
					<li><a href="Tours.html" class="nav3">Our Tours</a></li>
					<li><a href="Destinations.html" class="nav4">Destinations</a></li>
					<li class="end"><a href="Contacts.html" class="nav5">Contacts</a></li>
				</ul>
			</nav>
			<br />
			<div class="text1">
				<h2>Your Account Setting :</h2>
				
		<div class="wrapper">
		<div class="alpha">
		<a href="password-update.php?id=<?php echo $uid;?>">
		<i class="fa fa-lock" style="font-size: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password:</i>
		<!--<img src="images/password.png" width="38" height="38" alt="" />--></a>
		</div>
		</div>
		<br />
		<div class="wrapper">
		<div class="alpha1">
		<!--<img align="absmiddle" src="images/profile.png" width="38" height="38" alt="" />-->
		<a href="profile.php?id=<?php echo $uid;?>">
		<i class="fa fa-user" style="font-size: 25px">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Profile:</i></a>
		</div>
		</div>
		<!--<div class="wrapper">
		<img align="absmiddle" src="images/ticket.png" width="38" height="38" alt="" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="myticket.php?id=<?php echo $uid;?>">My Ticket History:</a>
		</div>-->

			</div>
			<!--<div class="img" style="margin-left:600px;margin-top:-250px;margin-bottom:100px;" ><img src="images/volvo-bus.jpg" alt="bus"></div>-->
			<div class="card">
			<img src="images/vvv1.jpg" alt="bus" width="100%"></div>
		</header>
<!-- / header -->
<!-- content -->
<hr>
<br /><br /><br /><br /><br /><br /><br />
		<section id="content">
			
			<article class="col2 pad_left2">
				<h2><u>Search For Bus Services:</u></h2>
				<form method="post" id="SearchForm">
				<b>From:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php
								$sql = mysql_query("select * from  bus_rev.destinations");
							?>
							<select name="from" class="select-big">
							<option value="">Select</option>
							<?php
        	           while($arrvar = mysql_fetch_array($sql))
					  	{
						?>
        		        <option value="<?php echo $arrvar['destination']?>"><?php echo $arrvar['destination']?></option>
               			<?php 
						}
					   ?>
							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>To:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php
								mysql_connect("localhost","root","");
								mysql_select_db('bus_rev');
								$sql = mysql_query("select * from  bus_rev.destinations");
							?>
							<select name="to" class="select-big">
							<option value="">Select</option>
							<?php
        	           while($arrvar = mysql_fetch_array($sql))
					  	{
        		        echo "<option value='$arrvar[destination]'>$arrvar[destination]</option>";
               			}
					   ?>
							</select><br /><br />
							<div class="wrapper" ><b>Date of Journey  : </b><input type="text" class="input input2" value="mm/dd/yy"  onblur="if(this.value=='') this.value='mm/dd/yy'" onfocus="if(this.value =='mm/dd/yy' ) this.value=''"> &nbsp;</div>
							<br /> <br><br>
							<input type="submit" name="search" class="button" value="Search" onclick="return callfrm(document.getElementById('currentdate').value);" class="html-button">&nbsp;
			
			 	       <input type="submit" name="resert" class="button" value="Reset"  class="html-button">
				  
				</form><br />
				
				<div class="errormessage" align="center">
					 
				</div>
				<br />
				<?php
if(isset($_POST["search"]))
{
	require('config.php');
	 $from = $_POST['from'];
	 $to = $_POST['to'];
	 
	 $query = mysql_query("select * from bus where from_stop ='$from' AND to_stop ='$to'");
	 $c = mysql_num_rows($query);
	if($c>0)
	{
?>
<table width="650" height="75" align="center">

<tr align="center"><td width="105"><b><u>Bus Name</u></b></td><td width="95"><b><u>From</u></b></td><td width="95"><b><u>To</u></b></td><td width="117"><b><u>Dept Time</u></b></td><td width="119"><b><u>Arrival Time</u></b></td><td width="110"><b><u>Distance</u></b></td><td width="110"><b><u>Fare</u></b></td><td><b><u>Available</u></b></td><td width="101">&nbsp;</td></b></tr>
<?php
while($r1 = mysql_fetch_array($query))
{
	$bus= $r1['id'];
	$bus_name = $r1['bus_name'];
	$from = $r1['from_stop'];
	$to = $r1['to_stop'];
	$dept_time = $r1['dept_time'];
	$arrival_time = $r1['arrival_time'];
	$distance = $r1['distance'];
	$fare = $r1['fare'];
	
	$bust = $bus.'bus';
	$query1 = mysql_query("SELECT * from $bust where status='Available'");
	$c = mysql_num_rows($query1);
?>

<tr align="center"><td><b><?php echo $bus_name;?></b><br/><br/></td><td><b><?php echo $from;?></b></td><td><b><?php echo $to;?></b></td><td><b><?php echo $dept_time;?></b></td><td><b><?php echo $arrival_time;?></b></td><td nowrap="nowrap"><b><?php echo $distance;?></b></td><td><b><?php echo $fare; ?></b></td><td><b><?php echo $c;?></b></td><td><a style="color: #A81722;"href="booking.php?id=<?php echo $uid;?>&bus=<?php echo $bus;?>"><b style="color: #A81722;">Book</b></a>
</td></tr>
<?php
}
?>
</table>
<?php
}
}
?>
        	</article>
		</section>
<!-- / content -->
	</div>
	<div class="wall">
		<div class="wall1">
			&nbsp;
		</div>
		<div class="wall2">
			&nbsp;
		</div>
		<div class="wall3">
		&nbsp;
		</div>
	</div>
	<div class="block"></div>
</div>
<hr></hr>
<div class="body1">
	<div class="main1">
<!-- footer -->
		<footer>
			<br /><br /><br /><br /><a rel="nofollow" href="" target="_blank"></a>&copy;<b>2016 Sigma Travels</b><br />
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
<?php
}
else
{
	header("Location:index.php");
}
}
else
{
	header("Location:Home.php?id=$uid");
}
?>

</body>
</html>
