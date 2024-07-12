<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$month=date("m");
$year=date("Y");
$q1=mysql_query("select * from eb_register where uname='$uname'");
$r1=mysql_fetch_array($q1);
$dvv=$r1['edevice'];
if($act=="ON")
{
	$q4=mysql_query("select * from eb_monitor where edevice='$edevice' && uname='$uname' && month=$month && year='$year'");
	$n4=mysql_num_rows($q4);
	if($n4==0)
	{
	$mq=mysql_query("select max(id) from eb_monitor");
    $mr=mysql_fetch_array($mq);
    $id = $mr['max(id)']+1;
	mysql_query("insert into eb_monitor(id,uname,edevice,status,seconds,unit,month,year) values($id,'$uname','$edevice','1','0','0','$month','$year')");
	}
	else
	{
	mysql_query("update eb_monitor set status=1 where edevice='$edevice' && uname='$uname' && month=$month && year='$year'");
	}
	
?>
<script language="javascript">
window.location.href="monitor2.php";
</script>
<?php
}
if($act=="OFF")
{
mysql_query("update eb_monitor set status=0 where edevice='$edevice' && uname='$uname' && month=$month && year='$year'");
?>
<script language="javascript">
window.location.href="monitor2.php";
</script>

<?php
}

/*if($act=="ON")
{
	$q1=mysql_query("select * from eb_power where uname='$uname' && month='$month' && year='$year'");
	$n1=mysql_num_rows($q1);
	
	if($n1==0)
	{
$mq=mysql_query("select max(id) from eb_power");
    $mr=mysql_fetch_array($mq);
    $id = $mr['max(id)']+1;
	
	mysql_query("insert into eb_power(id,uname,load1,load2,load3,load4,load5,month,year) values($id,'$uname','0','0','0','0','0',$month,$year)");
	
	$aa="load".$load;
	
	mysql_query("update eb_power set $aa=1 where uname='$uname' && month='$month' && year='$year'");
	
	}
	else
	{
	$aa="load".$load;
	
	mysql_query("update eb_power set $aa=1 where uname='$uname' && month='$month' && year='$year'");
	}
	
	
?>
<script language="javascript">
window.location.href="monitor2.php";
</script>
<?php	
}
if($act=="OFF")
{
$aa="load".$load;
	
	mysql_query("update eb_power set $aa=0 where uname='$uname' && month='$month' && year='$year'");
?>
<script language="javascript">
window.location.href="monitor2.php";
</script>
<?php	
}*/
	
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
                    <h2>Information</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  
				  <p align="center" class="txt">Monitor</p>
                 
                  <table width="90%" height="209" border="1" align="center">
				  <?php
				  $x=0;
				  $d=explode(",",$dvv);
				  foreach($d as $d1)
				  {
				  $x++;
				  $q2=mysql_query("select * from eb_device where id=$d1");
				  $r2=mysql_fetch_array($q2);
				  ?>
				   <tr>
                      <th width="128" align="left" scope="col"><?php echo $r2['device']; ?></th>
					  <th width="128" align="left" scope="col"><?php
		$q3=mysql_query("select * from eb_monitor where uname='$uname' && month='$month' && year='$year' && edevice='$d1'");
		$r3=mysql_fetch_array($q3);
	  if($r3['status']=="1")
	  {
	  echo "ON";
	  }
	  else
	  {
	  echo "OFF";
	  }
	  ?></th>
                      <th width="175" align="left" scope="col"><a href="monitor2.php?act=ON&edevice=<?php echo $d1; ?>">On</a> | <a href="monitor2.php?act=OFF&edevice=<?php echo $d1; ?>">OFF</a></th>
					 </tr>
					 <?php
					 }
					 ?>
                  </table>
				   <p align="center" class="txt"><iframe src="load.php" width="300" height="300"></iframe></p>
                </div>
              </div>
  </div> 
</div>

<!--end content area-->
  
  <p>&nbsp;</p>
</body>
</html>