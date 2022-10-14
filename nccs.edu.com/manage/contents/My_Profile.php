<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}

	echo "<link href=\"../../edit.css\" rel=\"stylesheet\" type=\"text/css\">";
	
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_admin WHERE id='$_SESSION[valid_id]'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);

		echo "<br><table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\" class=\"table\">"
			."  <tr>"
			."	  <td colspan=\"3\" class=\"text\">&nbsp;</td>"
			."    <td rowspan=11 valign=top>"
			."		<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\">"
			."		  <tr>"
			."			<td>";
						if (empty($show[photo])) { 
							echo "<img src=\"../contents/photos_admin/default.jpg\" alt=\"No Photo\" width=\"90\" height=\"113\" align=\"top\">";
						} else { 
							echo "<img src='../contents/photos_admin/".$show[photo]."' alt=\"$show[firstname] $show[middlename] $show[lastname]\" width=90 height=113>";
						}
		 echo"			</td>"
		 	."		  </tr>"
			."		</table>"
			."		<div align=\"center\"><a href=\"#\" onClick=\"MM_openBrWindow('profiles/upload_photo_teacher.php?id=$_SESSION[valid_id]','Upload','scrollbars=no,width=342,height=169, toolbar=no, location=no')\" class=\"small_lk\">Upload/Change Photo</a></div>"
			."		<table width=\"10%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" align=\"center\" class=\"table\">"
			."		  <tr>"
			."			<td><center><a href=\"?AdminPageID=Option&Opt=Modify_My_Profile&id=".$_SESSION[valid_id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[firstname] $show[middlename] $show[lastname]\"></a></center></td>"
			."			<td><input type=\"button\" name=\"Submit\" value=\"Back\" onClick=\"javascript: history.back()\" class=\"search_box1\"></td>"
		 	."		  </tr>"
			."		</table>"
		 	."	  </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td width=\"18%\" class=\"text\">&nbsp;Username</td>"
			."	  <td width=\"8%\"><div align=\"center\">:</div></td>"
			."	  <td width=\"74%\" class=\"text\"><strong>$show[username]</strong></td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Privilege</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\"><strong>$show[privilege]</strong></td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Full Name</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">$show[firstname] $show[middlename] $show[lastname]</td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Gender</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[gender])) { 
				echo "None";
			} else { 
				echo "$show[gender]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Date of Birth</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[dob])) { 
				echo "None";
			} else { 
				echo "$show[dob]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Telephone</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[phone])) { 
				echo "None";
			} else { 
				echo "$show[phone]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Mobile</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[mobile])) { 
				echo "None";
			} else { 
				echo "$show[mobile]";
			} 
		echo "    </td>"
			."  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Email</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[email])) { 
				echo "None";
			} else { 
				echo "<a href=\"mailto:$show[email]\">$show[email]</a>";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Address</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[address])) { 
				echo "None";
			} else { 
				echo "$show[address]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\" valign=\"top\">"
			."	  <td class=\"text\">&nbsp;Remarks</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if ($show[privilege] == "Administrator") { 
				echo "Administrators have complete and unrestricted access to the website/system.";
			} else { 
				echo "Limited Users are prevented from making accidental or intentional system-wide changes.  Thus, Users can use/modifiy limited applications, but not most legacy applications.";
			} 
		echo "    </td>"
			."  </tr>"
			."</table><br>";

	?>