<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];

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

	  <h2 align="center"><?php echo $g1;?></h2>
<div class="row">
			<div class="col-lg-3">
				
				<!-- A grey horizontal navbar that becomes vertical on small screens -->
			</div>
 
			
			
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display display">
                    <h2>Generate Monthly Bill</h2>
                  </h2>
                </div>
                <div class="card-block">
				 <form name="form1" method="post" enctype="multipart/form-data">
                    
					<div class="form-group">
                      <label>Month & Year</label>
                      <select name="month" class="form-control" id="month">
					  <span id="error"></span>

      <option value="0">-Month-</option>

      <?php
	  $dq=mysql_query("select distinct(month) from eb_power order by month");
	  while($dr=mysql_fetch_array($dq))
	  {
	  ?>
      <option <?php if($month==$dr['month']) echo "selected"; ?>><?php echo $dr['month']; ?></option>
      <?php
	  }
	  ?>

    </select>
    <select name="year" class="form-control" id="year">
	<span id="error"></span>

      <option value="0">-Year-</option>
      <?php
	  $dq1=mysql_query("select distinct(year) from eb_power order by year desc");
	  while($dr1=mysql_fetch_array($dq1))
	  {
	  ?>
      <option <?php if($year==$dr1['year']) echo "selected"; ?>><?php echo $dr1['year']; ?></option>
      <?php
	  }
	  
	  ?>
    </select>
	<input type="submit" name="btn" value="Sent Bill" class="btn btn-primary" onClick="return validate()">
	<input type="submit" name="btn1" value="Not Sent" class="btn btn-danger" onClick="return validate1()">


                   </div>
                  </form>
                 
                </div>
              </div>
  </div> 
</div>
 <div align="center">
   <?php
	if(isset($btn))
	{
	$qry=mysql_query("update eb_power set status=1 where month='$month' && year='$year'");
	echo "bill has generated";
	
	}
	elseif(isset($btn1))
	{
	$qry=mysql_query("update eb_power set status=1-status where month='$month' && year='$year'");
	echo "bill has not generated";
	
	}
	
			
			?>
</div>
<!--end content area-->
  
  <p>&nbsp;</p>
</body>
<script>
    return validate() {
        var error = document.getElementById("error")
        if (isNaN(document.getElementById("month").value))
        {
             
            // Changing content and color of content
            error.textContent = "Please enter a valid number"
            error.style.color = "red"
        } else {
            error.textContent = ""
        }
		if (isNaN(document.getElementById("year").value))
        {
             
            // Changing content and color of content
            error.textContent = "Please enter Year"
            error.style.color = "red"
        } else {
            error.textContent = ""
        }
		
    }
</script>
 
</html>