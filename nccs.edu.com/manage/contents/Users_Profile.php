<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	

	include ("../include/db.php");
	$query = "SELECT * from tbl_admin where id=$_GET[id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	$id = $show["id"];

		echo "<table width=\"750\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\" class=\"table\">"
			."  <tr>"
			."	  <td colspan=\"3\" class=\"text\">:: Profile<p></td>"
			."    <td rowspan=12 valign=top>"
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
			."		<br><div align=\"center\"><input type=\"button\" name=\"Submit\" value=\"Back\" onClick=\"javascript: history.back()\" class=\"search_box1\"></div>"
			."	  </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td width=\"20%\" class=\"text\">&nbsp;Username</td>"
			."	  <td width=\"7%\"><div align=\"center\">:</div></td>"
			."	  <td width=\"73%\" class=\"text\"><strong>$show[username]</strong></td>"
			."  </tr>";
			if ($_SESSION["valid_user"] == "admin") {
		echo"   <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Password</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\"><strong>$show[password]</strong></td>"
			."  </tr>";
			}
		echo"  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Privilege</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\"><strong>$show[privilege]</strong></td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Name</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\"><strong>$show[firstname] $show[middlename] $show[lastname]</strong></td>"
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
