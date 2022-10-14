<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}

	include ("../include/db.php");
	$query = "Select * from tbl_admin where id = $_SESSION[valid_id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
		echo "<form action=\"?AdminPageID=Option&Opt=My_Profile_Enf&ProMod=Mod&id=$_SESSION[valid_id]\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"id\" value=\"$show[id]\">\n"
			."<table width=\"95%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" align=\"center\" class=\"table\">\n"
			."  <tr>\n" 
			."	<td class=\"text\">Username</td>\n"
			."	<td class=\"text\"><strong>$show[username]</strong></td>\n"
			."  </tr>\n"
			."  <tr>\n" 
			."	<td class=\"text\">Privilege</td>\n"
			."	<td class=\"text\"><strong>$show[privilege]</strong></td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\">First Name</td>\n"
			."	<td class=\"text\">";
			if ($_SESSION["valid_user"] == "admin" && $show["privilege"] == "Administrator") {
				echo "$show[firstname]";
			}
			else {
				echo "<input type=\"text\" name=\"firstname\" value=\"$show[firstname]\" class=\"search_box1\">";
			}
		echo "</td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\">Middle Name</td>\n"
			."	<td class=\"text\">";
			if ($_SESSION["valid_user"] == "admin" && $show["privilege"] == "Administrator") {
				echo "$show[middlename]";
			}
			else {
				echo "<input type=\"text\" name=\"middlename\" value=\"$show[middlename]\" class=\"search_box1\">";
			}			
		echo"	  </td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\">Last Name</td>\n"
			."	<td class=\"text\">";
			if ($_SESSION["valid_user"] == "admin" && $show["privilege"] == "Administrator") {
				echo "$show[lastname]";
			}
			else {
				echo "<input type=\"text\" name=\"lastname\" value=\"$show[lastname]\" class=\"search_box1\">";
			}			
		echo"	  </td>\n"
			."  </tr>\n"
			."  <tr>\n" 
			."	<td class=\"text\">Gender</td>\n"
			."	<td class=\"text\"><input type=\"text\" name=\"gender\" value=\"$show[gender]\" class=\"search_box1\"></td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\">Date of Birth</td>\n"
			."	<td class=\"text\"><input type=\"text\" name=\"dob\" value=\"$show[dob]\" class=\"search_box1\"> Eg: August 04, 1983</td>\n"
			."  </tr>\n"
			."  <tr>\n" 
			."	<td class=\"text\">Telephone</td>\n"
			."	<td><input name=\"phone\" value=\"$show[phone]\" class=\"search_box1\"></td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\">Mobile</td>\n"
			."	<td><input name=\"mobile\" value=\"$show[mobile]\" class=\"search_box1\"></td>\n"
			."  </tr>\n"
			."  <tr>\n" 
			."	<td class=\"text\">Email</td>\n"
			."	<td><input name=\"email\" value=\"$show[email]\" class=\"search_box1\"></td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\" valign=\"top\">Address</td>\n"
			."	<td><textarea name=\"address\" cols=\"30\" rows=\"5\" class=\"search_box1\">$show[address]</textarea></td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\">&nbsp;</td>\n"
			."	<td><input type=submit name=submit value=\"Modify\" class=\"search_box1\">&nbsp;<input type=\"button\" name=\"Submit\" value=\"Back\" onClick=\"javascript: history.back()\" class=\"search_box1\"></td>\n"
			."  </tr>\n"
			."</table><br>";
?>