<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
	include ("../include/db.php");
	if ($_SESSION['valid_auth'] == "Student") {
		$query = "Select * from tbl_students,tbl_members where tbl_students.id = tbl_members.id and tbl_members.id = $_SESSION[valid_id]";
	}
	else {
		$query = "Select * from tbl_staffs,tbl_members where tbl_staffs.id = tbl_members.id and tbl_members.id = $_SESSION[valid_id]";
	}
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
		echo "<table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" class=\"table\">"
			."  <tr>"
			."	  <td colspan=3 class=text><strong><img src=\"../images/icons/profile.gif\" width=\"16\" height=\"16\" align=\"absmiddle\"> My Profile: </strong> "
			."    <td rowspan=22 valign=top>"
			."		<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\">"
			."		  <tr>"
			."			<td>";
						if (empty($show[photo])) {
							if ($show[gender] == "Female") {
							echo "<center><img src=\"../images/icons/nopic_female.gif\" width=\"90\" height=\"113\" alt=\"My Photo\" align=\"top\"></center>";
							}
							else {
							echo "<center><img src=\"../images/icons/nopic_male.gif\" width=\"90\" height=\"113\" alt=\"My Photo\" align=\"top\"></center>";							
							}
						} else { 
							echo "<center><img src='../members/mem_photos/".$show[photo]."' alt=\"$show[firstname] $show[middlename] $show[lastname]\" width=90 height=113></center>";
						}
		 echo"			</td>"
		 	."		  </tr>"
			."		</table>";
		 echo"		<table width=\"100\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"text\">"
			."		  <tr class=\"small\">"
			."			<td>";
						if ($show[hide_personal_details]==1) { 
							echo "<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> : Hidden to other members.<hr size=1 color=\"#EEEFF9\"><img src=\"../images/icons/postdate.gif\" width=\"14\" height=\"10\" alt=\"Unhide my Personal Details\">&nbsp;<a href=\"member.php?MemberPageID=Option&Opt=ENF&Details=UnHide\" class=\"small_lk\">Unhide details</a>";
						} else { 
							echo "<img src=\"../images/icons/postdate.gif\" width=\"14\" height=\"10\" alt=\"Hide my Personal Details\">&nbsp;<a href=\"member.php?MemberPageID=Option&Opt=ENF&Details=Hide\" class=\"small_lk\">Hide details...</a>";
						}
		 echo"			</td>"
		 	."		  </tr>"
			."		</table>"	
			."	  </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td width=\"85\" class=\"text\">&nbsp;Username</td>"
			."	  <td width=\"15\"><div align=\"center\">:</div></td>"
			."	  <td width=\"315\" class=\"text\"><strong>$show[username]</strong></td>"
			."  </tr>"
			."  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Name</td>"
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
			."	  <td class=\"text\">&nbsp;Email</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if ($show[hide_personal_details]==1) {
				echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> <a href=\"mailto:$show[email]\">$show[email]</a>";
			}
			else {
				echo "<a href=\"mailto:$show[email]\">$show[email]</a>";
			}
		echo"  	  </td>"
			."</tr>"
			."  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Date of Birth</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">$show[dob]</td>"
			."  </tr>"
			."  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Education</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[education])) { 
				echo "None";
			} else { 
				echo "$show[education]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Website</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[website])) { 
				echo "None";
			} else { 
				echo "<a href=\"$show[website]\" target=\"_blank\">$show[website]</a>";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Telephone 1</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[phone1])) { 
				echo "None";
			} else { 
				if ($show[hide_personal_details]==1) {
					echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[phone1]";
				}
				else {
					echo "$show[phone1]";
				}
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Telephone 2</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[phone2])) { 
				echo "None";
			} else {
				if ($show[hide_personal_details]==1) {
					echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[phone2]";
				}
			else { 
				echo "$show[phone2]";
				}
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
				if ($show[hide_personal_details]==1) {
					echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[mobile]";
				}
				else {
				echo "$show[mobile]";
				}
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Place</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if ($show[hide_personal_details]==1) {
				echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[address1]";
			}
			else {
				echo"$show[address1]</td>";
			}
		echo"  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Home Town</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[address2])) { 
				echo "None";
			} else {
				if ($show[hide_personal_details]==1) {
					echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[address2]";
				}
				else { 
					echo "$show[address2]";
				}
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\"> "
			."	  <td class=\"text\">&nbsp;City</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">$show[city]</td>"
			."  </tr>"
			."  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Country</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">$show[country]</td>"
			."  </tr>"
			."  <tr class=\"EE\" valign=\"top\">"
			."	  <td class=\"text\">&nbsp;Hobbies</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[hobbies])) { 
				echo "None";
			} else { 
				echo "$show[hobbies]";
			} 
		echo "    </td>"
			."  </tr>"
			."</table>";
?>