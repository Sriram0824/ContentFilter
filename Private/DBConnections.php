<?php
// Connect to database server
	$connection = mysqli_connect("localhost", "root", "") or die (mysqli_error ());

	// Select database
	mysqli_select_db($connection,'CFilter') or die("Error in Connection");
?>