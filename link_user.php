<div class="topnav" id="myTopnav">
  <a href="home.php" class="active">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Power
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
		<a href="setlimit.php">Set Limit</a>
		<a href="add_device.php">Home Appliances</a>
		<a href="user_req.php">Request</a>
		
    </div>
  </div> 
  <a href="monitor2.php">Monitoring</a>
  <a href="usage2.php">Usage</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onClick="myFunction()">&#9776;</a>
</div>


<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>