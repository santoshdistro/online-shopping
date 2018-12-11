<?php
include "connection.php";
if(isset($_POST["pid"]))
{
	$pid=mysqli_real_escape_string($con,$_POST["pid"]);
	if(isset($_SESSION["pid"]) && !empty($_SESSION["pid"]))
	{
	
		$i=array_search($pid,$_SESSION["pid"]);
		if(!in_array($pid,$_SESSION["pid"]))
		{
		
		}
		else
		{
			//found
			//$q=$_SESSION["quantity"][$i];
			array_splice($_SESSION["quantity"], $i, 1);
			array_splice($_SESSION["pid"], $i, 1);
			
		}
	}
	
}
?>