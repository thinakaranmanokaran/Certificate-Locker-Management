<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$month=date("m");
$year=date("Y");

$q2=mysql_query("select * from eb_power where uname='$uname' && month='$month' && year='$year'");
$r2=mysql_fetch_array($q2);

$q1=mysql_query("select * from eb_register where uname='".$r2['uname']."'");
$r1=mysql_fetch_array($q1);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<link rel="shortcut icon" href="img/icon.ico">
<style type="text/css">
<!--
.box {
	background-color: #F3F3F3;
	height: 270px;
	width: 270px;
	border: 1px solid #A8A8A8;
	padding:10px;
}
.box1 {
	background-color: #F3F3F3;
	height: 100px;
	width: 270px;
	border: 1px solid #A8A8A8;
	padding:10px;
}
.box2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
	padding:10px;
}
.box3 {
padding:10px;
}
.t1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 24px;
	font-weight: bold;
	color: #0066CC;
	font-variant: small-caps;
	text-transform: none;
}
.msg {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FF0000;
}
.box4
{
width:250px;
height:35px;
}
-->
</style>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="shortcut icon" href="favicon.ico">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
</head>

<body>
  
 <div class="panel panel-default">
  <div align="center" class="t1"><span><?php include("title.php"); ?></span></div>
  
</div>
<?php include("link_user.php"); ?>
 <!--start content area-->
 <?php
if($_REQUEST['act']=="success")
{
?>
<div class="alert alert-success">
  <strong>Added to Cart!</strong> 
</div>
<?php
}
if($_REQUEST['act']=="wrong")
{
?>

<div class="alert alert-warning">
  <strong>Warning!</strong> This Username already exist!
</div>
<?php
}
?>			

<h3 align="center">Welcome  (<?php echo $uname; ?>)</h3>
<div class="row">
			<div class="col-lg-3">
				
				<!-- A grey horizontal navbar that becomes vertical on small screens -->
			</div>
 
			
			
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display display">
                    <h2>EB Bill </h2>
                  </h2>
                </div>
                <div class="card-block">
				<form name="form1" method="post">
                  <p></p>
                  
				  <p align="center" class="txt">&nbsp;</p>
                  <table width="450" height="256" border="1" align="center">
                    <tr>
                      <th width="160" align="left" scope="col">Customer</th>
                      <th width="156" align="left" scope="col"><?php echo $r1['name']; ?></th>
                    </tr>
                    <tr>
                      <th align="left" scope="row">EB No. </th>
                      <td align="left"><?php echo $r1['ebno']; ?></td>
                    </tr>
                    <tr>
                      <th align="left" scope="row">Address</th>
                      <td align="left"><?php echo $r1['address'].", ".$r1['area'].", ".$r1['city']; ?></td>
                    </tr>
                    <tr>
                      <th align="left" scope="row">Month &amp; Year </th>
                      <td align="left"><?php echo $r2['month']."/".$r2['year']?></td>
                    </tr>
                    <tr>
                      <th align="left" scope="row">Power Usage (Units) </th>
                      <td align="left"><?php echo $r2['units']; ?> Units</td>
                    </tr>
                    <tr>
                      <th align="left" scope="row">&nbsp;</th>
                      <td align="left"><input type="submit" name="btn" value="Bill Amount" /></td>
                    </tr>
                  </table>
                  <p align="center" class="txt">
                    <?php
  if(isset($btn))
  {
  $email=$r1['email'];
  $mobile=$r1['mobile'];
  $amt=$r2['amount'];
  $uni=$r2['units'];
  	if($r2['amount']<=100)
	{
	$message="Units:$uni, Amount:Rs. $amt, You have used 100 and below units, Very Good for your Power usage";
	}
	else
	{
	$message="Units:$uni, Amount:Rs. $amt, You have used 100 and above units, so try to resuce your power usage";
	}
	
  ?>
</p>
                  <p align="center" class="txt">Your Amount is: Rs. <?php echo $r2['amount']; ?> </p>
<center>
<a class="btn btn-primary" href="payment.php?id=<?php echo $r2['id'];?>">Pay</a>
</center>
                  <?php
  
  }
  ?>
  
  </form>
</div>
              </div>
  </div> 
</div>

<!--end content area-->
  
  <p>&nbsp;</p>
</body>
</html>