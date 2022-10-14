<?
	session_start();
	
	//if (!$_SESSION["valid_user"])
		//{
		// User not logged in, redirect to login page
		//Header("Location: ../index.php");
		//}
	
	// dBase file
	include "../include/db.php";

	if ($_GET["login"] == "member") {
		if (!$_POST["username"] || !$_POST["password"]) {
			echo ("You need to supply a username and password.");
			include "login_failed.php";
			die ();
		}
		
		// Create query
		$q = "SELECT * FROM `tbl_members` WHERE `username`='$_POST[username]' AND `password`='$_POST[password]' LIMIT 1";
		// Run query
		$r = mysql_query($q);

		if ( $obj = @mysql_fetch_object($r) ) {
			// Login O.K., create session variables
			$_SESSION["valid_id"] = $obj->id;
			$_SESSION["valid_user"] = $_POST["username"];
			$_SESSION["valid_auth"] = $obj->auth_user;
			$_SESSION["valid_time"] = time();
			$_SESSION["LOGIN"]	=	"TRUE";
			
			//$_SESSION["log_y"]	=	$obj->login_yn;
			//Set login status, if logged in = 1
			$logy_q = "UPDATE tbl_members SET login_yn = '1' WHERE id = " . $_SESSION["valid_id"];
			$logy_r = mysql_query($logy_q);

			// Redirect to member page
			header("Location: member.php");
		}
		else {
			// Login not successful
			include "login_failed.php";
		}
	}
	else {
		include "login_failed.php";
	}
	?>