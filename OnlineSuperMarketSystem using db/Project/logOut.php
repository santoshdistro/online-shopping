<?php
session_start();

unset($_SESSION["uid"]);
unset($_SESSION["fname"]);
unset($_SESSION["lname"]);
$location=$_SESSION['redirection'];
header("Location: $location");
?>