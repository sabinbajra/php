<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
	// =========================== T0 Change The PWD ===========================//
	include ("../include/db.php");
	$CheckOldPwdQ = "SELECT password from tbl_admin WHERE id = $_SESSION[valid_id]";
	$CheckOldPwdR = mysql_query($CheckOldPwdQ);
	$CheckOldPwd = mysql_fetch_array($CheckOldPwdR);	
	if ($Action == "Change") {
		if ($old_pwd == $CheckOldPwd["password"]) {
			if ($new_pwd == $retype_pwd) {	
				$query = "UPDATE tbl_admin SET 
						password = '$new_pwd'
					WHERE id = $_SESSION[valid_id]
					";
				$result = mysql_query($query);
				echo "<br><center><table width=\"60%\" height=\"150\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#F4F4F4\" class=\"table\" align=\"center\">
						  <tr>
							<td height=\"12\" class=\"text\"></td>
						  </tr>		
						  <tr bgcolor=\"#FFFFFF\">
							<td height=\"22\" class=\"text\"><img src=\"../images/icons/c_pwd.gif\" width=\"23\" height=\"22\"> Confirmation:<hr size =\"1\" color=\"#c1cdd8\"><div align=\"center\">Your <font color=\"#FF0000\"><strong>password</strong></font> has been <font color=\"#FF0000\"><strong>changed</strong></font> succesfully!<p>Please remember your new password...
							</div></td>
						  </tr>
						</table></center>";
			}
			else {
				echo "
			<br><table width=\"510\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\" align=\"center\">
			  <tr> 
				  <td class=\"text\"><strong><font color=\"#FF0000\">Password</font></strong> Miss match. Please <strong>try again!</strong></td>
			  </tr>
			</table>";				  
				include "Change_Pwd.php";
			}
		}
		else {
			echo "
			<br><table width=\"510\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\" align=\"center\">
			  <tr> 
				  <td class=\"text\">Your <strong><font color=\"#FF0000\">Old Password</font></strong> did not match. Please <strong>try again!</strong></td>
			  </tr>
			</table>";
			include "Change_Pwd.php";		
		}
	}
	else {
		@header ("Location: admin.php");
	}
	// =========================== End of Changing PWD ===========================//

?>