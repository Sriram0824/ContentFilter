<?php
session_start(); 
require_once("./Private/DBConnections.php");
require_once("./Private/Functions.php");
$userName=$_SESSION["UserName"];
$userId=$_SESSION["UserId"];
//checking if logged in or not if not will be redirected back to login page
Check_Login_Status($userName);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Securly View URL</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="FilterPage.php">Securly</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="FilterPage.php">Filter Page</a></li>
            <li><a href="AddURL.php">ADD URL</a></li>
            <li class="active"><a href="ViewURL.php">View URL</a></li>
            <li><a href="Logout.php">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br/>
    <br/>
    <div class="container">
<?php
//retrieving all the restricted url's  added to the db
  $sql="select * from urllist  where uid='$userId' ";
  $rs = mysqli_query($connection,$sql) or die("Error: ".mysqli_error($connection));
    //checking if any restricted url's added to db or not
  if(mysqli_num_rows($rs)>0){
    ?>
    <form action="" method="post">
    <table class="table table-hover">
    <tr>
    <td>
    <b>Select<b>
    </td>
    <td>
    <b>URL</b>
    </td>
    </tr>
  <?php
         
         while($row = mysqli_fetch_array($rs))
        {
?>    
  <tr>
    <td>
    <input type="Checkbox" Name="check_list[]" value="<?=$row["sid"]?>" class="form-group">
    </td>
    <td>
    <?=$row["url"]?>
    </td>
  </tr>
  <?php
       } 
  ?>
  </table>
  <br/>
  <button id="DeleteRURL" class="btn btn-sm btn-primary btn-block" type="submit">Delete</button>
  </form>
  <?php
        }
        //display message if no url's in the db
          else
            {
              echo "<h4 class='text-danger'>There are no Restricted URL's please go to add page to add URL's</h4>";
            }
        ?>

    </div><!-- /.container -->

    <footer class="footer">
      <div class="container">
        <p class="text-muted">© Copyright Securly Inc, 2017</p>
      </div>
    </footer>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(!empty($_POST['check_list'])){
foreach($_POST['check_list'] as $selected){
$sql1="delete from urllist where sid='$selected' ";
$rs=mysqli_query($connection, $sql1);
    }
header('Location:ViewURL.php');
  }
}
?>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
