<?php
session_start(); 
require_once("./Private/DBConnections.php");
require_once("./Private/Functions.php");
$userName=$_SESSION["UserName"];
$userId=$_SESSION["UserId"];
Check_Login_Status($userName);
    $url=$_POST["InputURL"];
    //triming of https,http and www to check even the domain name exists in restricted url's in the db
    $url1= preg_replace( "#^[^:/.]*[:/]+#i", "", preg_replace( "{/$}", "", urldecode( $url) ) );  
	  $domainName = preg_replace('/^www\./', '', $url1);
    //sql query
    $sql="select * from urllist where (url='$url' or url like '%$domainName%') and uid='$userId'";
    $rs=mysqli_query($connection,$sql) or die("Error: ".mysqli_error($connection));
    //if there exists the url in db then initialsing to session variables to persit the last opened url
    if(mysqli_num_rows($rs)>=1){
      $_SESSION["URLContent"]=$url;
      $_SESSION["URLAllowance"]="Blocked";
      header('Location:FilterPage.php');
    }
    else{
        $_SESSION["URLContent"]=$url;
        $_SESSION["URLAllowance"]="Passed";
        header('Location:FilterPage.php');
    }
 ?>