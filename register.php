<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php include("title.php"); ?></title>
<link rel="shortcut icon" href="img/icon.ico">

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
<script language="javascript">
            function validate()
            {
			  
                if (document.form1.name.value == "")
                {
                    alert("Enter the Name");
                    document.form1.name.focus();
                    return false;
                }
			
                if (document.form1.mobile.value == "")
                {
                    alert("Enter the Mobile No.");
                    document.form1.mobile.focus();
                    return false;
                }
			
                if (document.form1.email.value == "")
                {
                    alert("Enter the E-mail");
                    document.form1.email.focus();
                    return false;
                }
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.form1.email.value))  
				  {  
					//return (true)  
				  }  
				  else
				  {
					alert("You have entered an invalid email address!");
					document.form1.email.select();
					return false; 
				  }
               
				
               
                if (document.form1.pass.value == "")
                {
                    alert("Enter the Password");
                    document.form1.pass.focus();
                    return false;
                }
				if (document.form1.cpass.value == "")
                {
                    alert("Enter the Confirm Password");
                    document.form1.cpass.focus();
                    return false;
                }
				if (document.form1.pass.value != document.form1.cpass.value)
                {
                    alert("Both password are not equals!");
                    document.form1.cpass.select();
                    return false;
                }
				
                
                return true;
            }
        </script>
</head>

<body>
  
 <div class="panel panel-default">
  <div class="t1" align="center"><spa><?php include("title.php"); ?></span></div>
  <div class="panel-body">
   <h3 align="center"></h3>
  </div>
</div>
 <!--start content area-->
 <?php
if($_REQUEST['act']=="success")
{
?>
<div class="alert alert-success">
  <strong>Register Success!</strong> 
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
<div class="row">
			<div class="col-lg-3">
				
				<!-- A grey horizontal navbar that becomes vertical on small screens -->
			</div>
 	
			
			
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display display">
                    <h2>User Registration</h2>
                  </h2>
                </div>
                <div class="card-block">
                  <p></p>
                  <form name="form1" method="post" enctype="multipart/form-data">
                    
					<div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>EB No.</label>
                      <input type="text" name="ebno" class="form-control">
                    </div>
					 <div class="form-group">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control">
                    </div>
					 <div class="form-group">
                      <label>Area</label>
                      <input type="text" name="area" class="form-control">
                    </div>
					 <div class="form-group">
                      <label>City</label>
                      <input type="text" name="city" class="form-control">
                    </div>
               
					<div class="form-group">
                      <label>Mobile No.</label>
                      <input type="text" name="mobile" class="form-control">
                    </div>
                   <div class="form-group">
                      <label>E-mail</label>
                      <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="uname" class="form-control">
                    </div>
					<div class="form-group">
                      <label>Password</label>
                      <input type="password" name="pass" class="form-control">
                    </div>
                                                                                               
                     <div class="form-group">
                      <label>Re-type Password</label>
                      <input type="password" name="cpass" class="form-control">
                    </div>
					
					
                    <div class="form-group">       
                      <input type="submit" name="btn" value="Register" class="btn btn-primary" onClick="return validate()">
                    </div>
                  </form>
                </div>
              </div>
			  <a href="index.php">Home</a> |
			  <a href="login.php">Login</a>
</div>
 <?php
 $msg="";
	 	$rdate=date("d-m-Y");
		$yr=date("y");
	 if(isset($btn))
	 {
                                                      
			
	$mq=mysql_query("select max(id) from eb_register");
    $mr=mysql_fetch_array($mq);
    $id = $mr['max(id)']+1;
	
	$n=mysql_query("insert into eb_register(id,name,ebno,area,address,city,mobile,email,uname,pass,rdate) values($id,'$name','$ebno','$area','$address','$city','$mobile','$email','$uname','$pass','$rdate')");
                 
	 ?>
	 <script language="javascript">
	 window.location.href="register.php?act=success";
	 </script>
	 <?php
	 	
	 }
	 ?>
<!--end content area-->
  <p align="center" class="msg"><?php
  if($msg!="")
  {
  echo $msg;
  }
  ?></p>
  <p>&nbsp;</p>
</body>
</html>