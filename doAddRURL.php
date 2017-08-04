<?php
session_start(); 
require_once("Private/DBConnections.php");
require_once("Private/Functions.php");
$userName=$_SESSION["UserName"];
Check_Login_Status($userName);
?>
<?php
	$rurl=$_POST["ResURL"];
	$userid=$_SESSION["UserId"];

	$sql="select * from urllist where url='$rurl' and uid='$userid'";
	$rs=mysqli_query($connection,$sql);
	//checking if url is already added to db or not

	if(mysqli_num_rows($rs)>=1){
		header('Location:ViewURL.php');
	}

	else{
    $sql1 = "INSERT INTO `urllist`( `url`, `uid`) VALUES ('$rurl','$userid')";
	if(mysqli_query($connection, $sql1)){
	 header('Location:ViewURL.php');
	} 
	else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
		 mysqli_close($connection);
	  }
   }
		
?>  