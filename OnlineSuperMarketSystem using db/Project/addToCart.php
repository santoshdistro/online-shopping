<?php
include "connection.php";
if(isset($_POST["pid"]) && isset($_POST["quantity"]))
{
	$pid=mysqli_real_escape_string($con,$_POST["pid"]);
	$quantity=mysqli_real_escape_string($con,$_POST["quantity"]);
	if(isset($_SESSION["pid"]) && !empty($_SESSION["pid"]))
	{
	
		$i=array_search($pid,$_SESSION["pid"]);
		if(!in_array($pid,$_SESSION["pid"]))
		{
			//not found
			$q=mysqli_query($con,"select * from products where pid='$pid'");
			$qq=mysqli_fetch_assoc($q);
			$availability=$qq["availability"];
			if($quantity<=$availability && $quantity>0)
			{
				array_push($_SESSION["pid"],$pid);
				array_push($_SESSION["quantity"],$quantity);
				echo "1";
			}
			else
				echo "Selected quantity Not Available. \nFailed to add product to your cart.";
			}
		else
		{
			//found
			//$q=$_SESSION["quantity"][$i];
			$q=mysqli_query($con,"select * from products where pid='$pid'");
			$qq=mysqli_fetch_assoc($q);
			$availability=$qq["availability"];
			if(($_SESSION["quantity"][$i]+$quantity)<=$availability && $quantity>0)
			{
				$_SESSION["quantity"][$i]+=$quantity;
				echo "1";
			}
			else
				echo "Selected quantity Not Available. \nFailed to add product to your cart.";
		}
	}
	else
	{
		//first time
		$q=mysqli_query($con,"select * from products where pid='$pid'");
		$qq=mysqli_fetch_assoc($q);
		$availability=$qq["availability"];
		if($quantity<=$availability && $quantity>0)
		{
			$_SESSION["pid"][0]=$pid;
			$_SESSION["quantity"][0]=$quantity;
			echo "1";
		}
		else
			echo "Selected quantity Not Available. \nFailed to add product to your cart.";
		
	}
}
else
	header("Location: index.php");

?>