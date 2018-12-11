<?php
session_start();
$con=mysqli_connect("localhost","id1263923_rameshwaree","rameshwaree","id1263923_project");
if(!isset($_SESSION["gateway"]))
	header("Location: cart.php");
if(isset($_GET["mode"]) && !empty($_GET["mode"]))
{
	$mode=mysqli_real_escape_string($con,$_GET["mode"]);
	if($mode=="cod" || $mode=="card" || $mode=="net")
	{
		//process payment
		$_SESSION["payment_accepted"]="true";
		$_SESSION["payment_mode"]=$mode;
		
	}
}
?>
<html>
<h2 align="center" style="color:green"><b1>Payment Successful!</b></h2>

<h3 align="center" >Please wait while you are redirected to the merchant site...</h3>
<h2 align="center"><img src="pics/loading.gif" /></h2>
<script>
setTimeout(function() {
  window.location.href = "bill.php";
}, 4000);

</script>
</html>