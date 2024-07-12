<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$month=date("m");
$year=date("Y");

$qry=mysql_query("select * from eb_power where month='$month' && year='$year'");

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
<?php include("link_admin.php"); ?>
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

<h3 align="center">Admin</h3>
<div class="row">
			<div class="col-lg-3">
				
				<!-- A grey horizontal navbar that becomes vertical on small screens -->
			</div>
 
			
			
            <div class="col-lg-6">
              
              </div>
  </div> 
</div>
 <div align="center">
    <p>Monitor </p>
   <table width="95%" border="1" align="center">
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">User</th>
      <th scope="col">EB No. </th>
      <th scope="col">Address</th>
      <th scope="col">Area</th>
      <th scope="col">City</th>
      <th scope="col">Units</th>
    </tr>
    <?php
	$i=0;
	
	while($row=mysql_fetch_array($qry))
	{
	$i++;
	 $qry1=mysql_query("select * from eb_register where uname='".$row['uname']."'");
	$row1=mysql_fetch_array($qry1);
	?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['uname']; ?></td>
      <td><?php echo $row1['ebno']; ?></td>
      <td><?php echo $row1['address']; ?></td>
      <td><?php echo $row1['area']; ?></td>
      <td><?php echo $row1['city']; ?></td>
      <td><?php echo $row['units']; ?></td>
    </tr>
    <?php
	}
	?>
  </table>
  <p align="center" class="txt">&nbsp;</p>
  <p align="center" class="txt">&nbsp;</p>
  <p align="center" class="txt">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center" class="sd">&nbsp;</p>
</form>
</div>
<!--end content area-->
  
  <p>&nbsp;</p>
</body>
</html>