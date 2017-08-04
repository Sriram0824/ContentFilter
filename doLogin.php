<?php
session_start(); 
require_once("Private/DBConnections.php");
//to prevent sql injection
$userName=strip_tags($_POST['userName']);
$password=strip_tags($_POST['password']);
 //hardcoding the values
 $userName="Securly";
 $password="Secret";
// SQL query
	$sql = "SELECT * FROM users where username='$userName' and password='$password' ";
// Execute the query (the recordset $rs contains the result)
	$rs=mysqli_query($connection, $sql);
	if(mysqli_num_rows($rs)==1)
	{
	while($row = mysqli_fetch_assoc($rs))
	{
      $_SESSION['UserName']=$userName;
      $_SESSION['UserId']=$row["sid"];
   }
   header('Location:FilterPage.php');
	}
  else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
	}
	  
?>