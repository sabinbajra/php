<?php
//this page included for the edit of the management
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
$Edit = $_GET['Edit'];
$view = $_GET['view'];

?>
<?
if($Edit)
{
	include  "Edit_Saving.php";
}

if($edited)
{
	include "editedservice.php";
}

	if($view)
	{
	include "View_Saving.php";
	}
?>	
