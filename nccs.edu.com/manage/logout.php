<?php
	//session_start();
	//session_unset();
	//session_destroy();
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
		
	include ("../include/db.php");
	$last_login = date("F j, Y, g:i A", $_SESSION["valid_time"]);
	$LogQuery = "UPDATE tbl_admin SET last_login='$last_login' WHERE id=$_SESSION[valid_id]";
	$LogRun = mysql_query($LogQuery);

	echo "<meta http-equiv=\"refresh\" content=\"0;URL=valid_logout.php\">
";
	// Logged out, return home.
	//header("Location: index.php");
?>