<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}

	// =========================== T0 Change The PWD ===========================//
	include ("../include/db.php");
	$CheckOldPwdQ = "SELECT password from tbl_members WHERE id = $_SESSION[valid_id]";
	$CheckOldPwdR = mysql_query($CheckOldPwdQ);
	$CheckOldPwd = mysql_fetch_array($CheckOldPwdR);	
	if ($Action == "Change") {
		if ($old_pwd == $CheckOldPwd["password"]) {
			if ($new_pwd == $retype_pwd) {	
				$query = "UPDATE tbl_members SET 
						password = '$_POST[new_pwd]'
					WHERE id = $_SESSION[valid_id]
					";
				$result = mysql_query($query);
				echo "<br><center><table width=\"60%\" height=\"140\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#F4F4F4\" class=\"table\">
						  <tr>
							<td height=\"12\" class=\"title\"><img src=\"../images/icons/c_pwd.gif\" width=\"23\" height=\"22\" align=\"absmiddle\"> Confirmation:</td>
						  </tr>		
						  <tr bgcolor=\"#FFFFFF\">
							<td height=\"\" class=\"text\"><div align=\"center\">Your <font color=\"#FF0000\"><strong>password</strong></font> has been <font color=\"#FF0000\"><strong>changed</strong></font> succesfully!<p>Please remember your new password...
							</div></td>
						  </tr>
						</table></center>";
			}
			else {
				echo "
			<table width=\"500\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\" align=\"center\">
			  <tr> 
				  <td class=\"text\"><strong><font color=\"#FF0000\">Password</font></strong> Miss match. Please <strong>try again!</strong></td>
			  </tr>
			</table>";				  
				include "Change_Pwd.php";
			}
		}
		else {
			echo "
			<table width=\"500\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\" align=\"center\">
			  <tr> 
				  <td class=\"text\">Your <strong><font color=\"#FF0000\">Old Password</font></strong> did not match. Please <strong>try again!</strong></td>
			  </tr>
			</table>";
			include "Change_Pwd.php";		
		}
	}
	else {
		@header ("Location: member.php");
	}
	// =========================== End of Changing PWD ===========================//
	
	// =========================== To Modify Profile ===========================//
	
	if ($Modify == "Profile") {	
		include ("../include/db.php");
		$query = "UPDATE tbl_members SET 
			firstname = '$_POST[firstname]',
			middlename = '$_POST[middlename]',
			lastname = '$_POST[lastname]',
			gender = '$_POST[gender]',
			dob = '$_POST[dob]',
			website = '$_POST[website]',
			phone1 = '$_POST[phone1]',
			phone2 = '$_POST[phone2]',
			mobile = '$_POST[mobile]',
			address1 = '$_POST[address1]',
			address2 = '$_POST[address2]',
			city = '$_POST[city]',
			country = '$_POST[country]',
			hobbies = '$_POST[hobbies]'		
			WHERE id = $_SESSION[valid_id]
		";
		$result = mysql_query($query);
		
				echo "<table width=\"510\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"table\">
						  <tr>
							<td class=\"text\">Your <font color=\"#FF0000\"><strong>profile</strong></font> has been <font color=\"#FF0000\"><strong>modified</strong></font> succesfully!</td>
						  </tr>
						</table><br>";
				include "My_Profile.php";
	}
	else {
		@header ("Location: member.php");
	}
	// =========================== End of Modifing Profile ===========================//
	
	// =========================== To Hide Personal Details ===========================//
	
	if ($Details == "Hide") {	
		include ("../include/db.php");
		$value=1;
		$query = "UPDATE tbl_members SET 
			hide_personal_details = '$value'
			WHERE id = $_SESSION[valid_id]
		";
		$result = mysql_query($query);
		
				echo "<table width=\"510\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"table\">
						  <tr>
							<td class=\"text\">Now your <font color=\"#FF0000\"><strong>personal details</strong></font> has been <font color=\"#FF0000\"><strong>$Details</strong></font> succesfully!</td>
						  </tr>
						</table><br>";
				include "My_Profile.php";
	}
	else {
		@header ("Location: member.php");
	}
	// =========================== End of Hiding Profile ===========================//
	
	// =========================== To UnHide Personal Details ===========================//
	
	if ($Details == "UnHide") {	
		include ("../include/db.php");
		$value=0;
		$query = "UPDATE tbl_members SET 
			hide_personal_details = '$value'
			WHERE id = $_SESSION[valid_id]
		";
		$result = mysql_query($query);
		
				echo "<table width=\"510\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"table\">
						  <tr>
							<td class=\"text\">Now your <font color=\"#FF0000\"><strong>personal details</strong></font> has been <font color=\"#FF0000\"><strong>$Details</strong></font> succesfully!</td>
						  </tr>
						</table><br>";
				include "My_Profile.php";
	}
	else {
		@header ("Location: member.php");
	}
	// =========================== End of UnHiding Profile ===========================//
?>