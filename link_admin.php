<div class="topnav" id="myTopnav">
  <a href="admin.php" class="active">Home</a>
  <!--<div class="dropdown">
    <button class="dropbtn">Buy
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
		<a href="cus_cart.php">Cart</a>
		<a href="cus_purchase.php">Purchased</a>
		<a href="cus_return.php">Returned</a>
    </div>
  </div> -->
  <a href="monitor.php">Monitoring</a>
  <a href="usage.php">Usage</a>
  <a href="generatebill.php">Sent Bill</a>
  <a href="view_req.php">Request</a>
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