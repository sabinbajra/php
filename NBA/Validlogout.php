<?
	session_start();
	session_unset();
	session_destroy();

	//Logged out, return home.
	header("Location: index.php");
?>
