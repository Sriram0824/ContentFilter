<?php
session_start(); 
require_once("./Private/DBConnections.php");
require_once("./Private/Functions.php");
$userName=$_SESSION["UserName"];
Check_Login_Status($userName);
//destroying session and redirecting to login page
session_destroy();
header('Location:Login.php');
?>