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
$setlimit=$r1['setlimit'];
$mobile=$r1['mobile'];

$q2=mysql_query("select * from eb_power where uname='$uname' && month='$month' && year='$year'");
$n2=mysql_num_rows($q2);
if($n2==0)
{
$mq=mysql_query("select max(id) from eb_power");
    $mr=mysql_fetch_array($mq);
    $id = $mr['max(id)']+1;
	
	mysql_query("insert into eb_power(id,uname,seconds,units,amount,month,year) values($id,'$uname','0','0','0',$month,$year)");
	

}
else
{
	
$x=0;
				  $d=explode(",",$dvv);
				  foreach($d as $d1)
				  {
				  $x++;
				  $q22=mysql_query("select * from eb_device where id=$d1");
				  $r22=mysql_fetch_array($q22);
				  $u=$r22['unit'];
				  
				  $q31=mysql_query("select * from eb_monitor where edevice=$d1 && uname='$uname' && month='$month' && year='$year'");
				  $r31=mysql_fetch_array($q31);
				  	if($r31['status']=="1")
					{
					mysql_query("update eb_monitor set seconds=seconds+20,unit=unit+$u where edevice=$d1 && uname='$uname' && month='$month' && year='$year'");
					}
				  }
				  
				  $q32=mysql_query("select sum(seconds),sum(unit) from eb_monitor where uname='$uname' && month='$month' && year='$year'");
				  $r32=mysql_fetch_array($q32);
				  $sec=$r32['sum(seconds)'];
				  $units=$r32['sum(unit)'];
	if($units<100)
	{
	$amt=$units*1;
	}
	else if($units<300)
	{
	$amt=$units*1.5;
	}
	else if($units<500)
	{
	$amt=$units*2;
	}
	else
	{
	$amt=$units*3;
	}
mysql_query("update eb_power set seconds='$sec',units='$units',amount='$amt' where uname='$uname' && month='$month' && year='$year'");

		if($units>$setlimit)
		{
		$message="Your Power usage has over the limit, so keep reduce your Electronic Devices";
		echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:block"></iframe>';
		}
}
	
/*if($r2['load1']=="1")
	  {
	  mysql_query("update eb_power set seconds=seconds+20 where uname='$uname' && month='$month' && year='$year'");
	  }
if($r2['load2']=="1")
	  {
	  mysql_query("update eb_power set seconds=seconds+20 where uname='$uname' && month='$month' && year='$year'");
	  }	 
if($r2['load3']=="1")
	  {
	  mysql_query("update eb_power set seconds=seconds+20 where uname='$uname' && month='$month' && year='$year'");
	  }
if($r2['load4']=="1")
	  {
	  mysql_query("update eb_power set seconds=seconds+40 where uname='$uname' && month='$month' && year='$year'");
	  }
if($r2['load5']=="1")
	  {
	  mysql_query("update eb_power set seconds=seconds+30 where uname='$uname' && month='$month' && year='$year'");
	  }
	  
$q3=mysql_query("select * from eb_power where uname='$uname' && month='$month' && year='$year'");
$r3=mysql_fetch_array($q3);	  
$sec=$r3['seconds'];	  	  
if($sec>=60)
{
	$units=ceil($sec/60);
	if($units<100)
	{
	$amt=$units*1;
	}
	else if($units<300)
	{
	$amt=$units*1.5;
	}
	else if($units<500)
	{
	$amt=$units*2;
	}
	else
	{
	$amt=$units*3;
	}
	
	 mysql_query("update eb_power set units=$units,amount=$amt where uname='$uname' && month='$month' && year='$year'");
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h2>Units: <?php echo $units; ?></h2>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
//   //Redirect with JavaScript
   window.location.href= 'load.php';
}, 20000);
</script>
</body>
</html>
