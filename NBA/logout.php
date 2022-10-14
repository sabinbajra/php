<?php
	
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: index.php");
		}
		
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=Validlogout.php\">";
	
?>