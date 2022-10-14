<?
	session_start();
	
	if($_SESSION["LOGIN"] != "TRUE")
		{
			header("Location: ../members/index.php");
			die();
		}
?>