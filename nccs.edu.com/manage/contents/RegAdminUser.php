<?php
	// connect database
	include ("../include/db.php");


	// ==== Input validation and PHP dBase code ===============================
	//
	// ========================================================================

	if ( $_GET["Register"] == "User" )
		{
		$bInputFlag = false;
		foreach ( $_POST as $field )
			{
			if ($field == "")
				{
				$bInputFlag = false;
				}
			else
				{
				$bInputFlag = true;
				}
			}
		// If we had problems with the input, exit with error
		if ($bInputFlag == false)
			{
			die( "Problem with your registration info. "
				."Please go back and try again.");
			}
		
		$s_date= date("F j, Y");
		//  Setup query
		$q = "INSERT INTO `tbl_admin` (
		username,
		password,
		firstname, 
		middlename, 
		lastname, 
		gender, 
		privilege
		) 
		
		VALUES (
		'$_POST[username]',		
		'$_POST[password]',		
		'$_POST[firstname]', 
		'$_POST[middlename]', 
		'$_POST[lastname]', 
		'$_POST[gender]',
		'$_POST[privilege]'
		)"; 

		//  Run query
		$r = mysql_query($q);
		
		// Make sure query inserted user successfully
		if ( !$r )
			{
			echo "
			  <table width=\"750\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"1\" class=\"table\">
				<tr> 
				  <td class=\"text\" colspan=\"2\"><font color=\"#FF0000\">Username: <strong>$username</strong> already exist please try another...<br>Or you can use the following names instead... </font>
				<font color=#FF0000><ul>
					<li>".STRTOLOWER($_POST[username])."_". STRTOLOWER($_POST[firstname])."</li>
					<li>".STRTOLOWER($_POST[firstname])."_".STRTOLOWER($_POST[lastname])."</li>
					<li>".STRTOLOWER($_POST[firstname])."_".STRTOLOWER($_POST[username])."</li>
					<li>".STRTOLOWER($_POST[username])."_01</li>
					<li>".STRTOLOWER($_POST[username])."_02</li>
				</ul></font>
				  </td>
				</tr>
				<tr>
			  </table>			
			<form action=\"?AdminPageID=Users&New=Register_User&Register=User\" method=\"POST\" enctype=\"multipart/form-data\" onSubmit=\" return form_Validator(this)\">
			  <table width=\"750\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"1\" class=\"table\">
				<tr> 
				  <td class=\"text\" width=\"100\">Username <font color=\"#FF0000\">*</font></td>
				  <td><input name=\"username\" size=\"15\" maxlength=\"15\" id=\"uname\" class=\"search_box1\"></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">Password <font color=\"#FF0000\">*</font></td>
				  <td><input name=\"password\" type=\"password\" size=\"15\" maxlength=\"15\" id=\"passwd\" class=\"search_box1\"></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">First Name <font color=\"#FF0000\">*</font></td>
				  <td><input name=\"firstname\" value=\"$_POST[firstname]\" size=\"20\" id=\"fname\" class=\"search_box1\"></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">Middle Name</td>
				  <td><input name=\"middlename\" value=\"$_POST[middlename]\" size=\"10\" class=\"search_box1\"></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">Last Name <font color=\"#FF0000\">*</font></td>
				  <td><input name=\"lastname\" value=\"$_POST[lastname]\" size=\"20\" id=\"lname\" class=\"search_box1\"></td>
				</tr>
				<tr>
				  <td class=\"text\">Gender <font color=\"#FF0000\">*</font></td>
				  <td><select name=\"gender\" id=\"gender\" class=\"search_box1\">
					  <option value=\"$_POST[gender]\" selected>$_POST[gender]</option>
					  <option>--------</option>
					  <option>Male</option>
					  <option>Female</option>
					</select></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">Privilege</td>
				  <td><select name=\"privilege\" id=\"privilege\" class=\"search_box1\">
					  <option value=\"$_POST[privilege]\" selected>$_POST[privilege]</option>
					  <option>--------</option>
					  <option>Administrator</option>
					  <option>Limited User</option>
					</select></td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td><input name=\"submit\" type=\"submit\" value=\"Submit\" class=\"search_box1\">&nbsp;&nbsp;<input type=\"button\" name=\"Submit\" value=\"Cancel\" onClick=\"javascript: history.back(-2)\" class=\"search_box1\"></td>
				</tr>
			  </table>
			</form>	";
			}
		else
			{
			// Redirect to thank you page.
			echo "<meta http-equiv=\"refresh\" content=\"0.0; URL=?AdminPageID=Users&New=RegisterENF&NewUser=Add\">";
			//include ("RegisterENF.php");
			//header ("Location: thanks.php");
			}
		} // end if



	// ==== Thank you page ====================================================
	// 
	// ========================================================================
	elseif ( $_GET["op"] == "thanks" )
		{
		echo "<meta http-equiv=\"refresh\" content=\"1; URL=?AdminPageID=Users&New=RegisterENF&NewUser=Add\">";
		//echo "<h2>Thanks for registering!</h2>";
		}
		


	// ==== Main Form =========================================================
	//
	// ========================================================================
	else
		{
		echo "
			<form action=\"?AdminPageID=Users&New=Register_User&Register=User\" method=\"POST\" enctype=\"multipart/form-data\" onSubmit=\" return form_Validator(this)\">
			  <table width=\"750\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"1\" class=\"table\">
				<tr> 
				  <td class=\"text\" width=\"100\">Username <font color=\"#FF0000\">*</font></td>
				  <td><input name=\"username\" size=\"15\" maxlength=\"15\" id=\"uname\" class=\"search_box1\"></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">Password <font color=\"#FF0000\">*</font></td>
				  <td><input name=\"password\" type=\"password\" size=\"15\" maxlength=\"15\" id=\"passwd\" class=\"search_box1\"></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">First Name <font color=\"#FF0000\">*</font></td>
				  <td><input name=\"firstname\" size=\"20\" id=\"fname\" class=\"search_box1\"></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">Middle Name</td>
				  <td><input name=\"middlename\" size=\"10\" class=\"search_box1\"></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">Last Name <font color=\"#FF0000\">*</font></td>
				  <td><input name=\"lastname\" size=\"20\" id=\"lname\" class=\"search_box1\"></td>
				</tr>
				<tr>
				  <td class=\"text\">Gender <font color=\"#FF0000\">*</font></td>
				  <td><select name=\"gender\" id=\"gender\" class=\"search_box1\">
					  <option selected> </option>
					  <option>Male</option>
					  <option>Female</option>
					</select></td>
				</tr>
				<tr bgcolor=\"#FFFFFF\"> 
				  <td class=\"text\">Privilege <font color=\"#FF0000\">*</font></td>
				  <td><select name=\"privilege\" id=\"privilege\" class=\"search_box1\">
					  <option selected> </option>
					  <option>Administrator</option>
					  <option>Limited User</option>
					</select></td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td><input name=\"submit\" type=\"submit\" value=\"Submit\" class=\"search_box1\">&nbsp;&nbsp;<input type=\"button\" name=\"Submit\" value=\"Cancel\" onClick=\"javascript: history.back()\" class=\"search_box1\"></td>
				</tr>
			  </table>
			</form>
		";
		}
	// EOF
	?> 