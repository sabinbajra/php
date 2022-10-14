<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> 
<?
	include ("../include/db.php");
	$QueryMemberName = "Select * from tbl_members where id = $_GET[id]";
	$ResultMemberName = mysql_query($QueryMemberName);
	$ShowMemberName = mysql_fetch_array($ResultMemberName);
	
	//for tbl_students for Semester
	$q = "Select * from tbl_students where id = $_GET[id]";
	$r = mysql_query($q);
	$s = mysql_fetch_array($r);
	
	//for tbl_staffs for education
	$qq= "Select * from tbl_staffs where id = $_GET[id]";
	$rr = mysql_query($qq);
	$ss = mysql_fetch_array($rr);
	
	
?>
<title>-: Profile: <?=$ShowMemberName[firstname] ." ". $ShowMemberName[middlename] ." ". $ShowMemberName[lastname];?> :- </title>
<link href="../include/bcis.css" rel="stylesheet" type="text/css">
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="628" border="0" align="left" cellpadding="3" cellspacing="0" class="AA">
  <tr> 
    <td> 
      <?

	include ("../include/db.php");
	$query = "Select * from tbl_members where id = $_GET[id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
		echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" class=\"table\">"
			."  <tr>"
			."	  <td colspan=3 class=text><strong><img src=\"../images/icons/profile.gif\" width=\"16\" height=\"16\"> Profile: </strong> ";
			if ($show[username] == $_SESSION["valid_user"]) {
				echo "You are viewing your own profile.";
			}
			else {
				echo "&lt;<strong>$show[firstname] $show[middlename] $show[lastname]</strong>&gt;";
			}
		echo"     </td>"
			."    <td rowspan=22 valign=top>"
			."		<table width=\"90\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\">"
			."		  <tr>"
			."			<td>";
						if (empty($show[photo])) {
							if ($show[gender] == "Female") {
							echo "<center><img src=\"../images/icons/nopic_female.gif\" width=\"90\" height=\"113\" alt=\"No Photo of $show[firstname] $show[middlename] $show[lastname]\" align=\"top\"></center>";
							}
							else {
							echo "<center><img src=\"../images/icons/nopic_male.gif\" width=\"90\" height=\"113\" alt=\"No Photo of $show[firstname] $show[middlename] $show[lastname]\" align=\"top\"></center>";							
							}
						} else { 
							echo "<img src='../option/images/photos/".$show[photo]."' alt=\"$show[firstname] $show[middlename] $show[lastname]\" width=90 height=113>";
						}
		 echo"			</td>"
		 	."		  </tr>"
			."		</table>";
		echo "<br><center><input type=\"button\" name=\"Submit\" value=\"Back\" onClick=\"javascript: history.back()\" class=\"text_box\"></center>";
			
					if($show[username] == $_SESSION["valid_user"]) {
		echo"		<hr size=1 color=\"#EEEFF9\"><table width=\"100\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"text\">"
			."		  <tr class=\"small\">"
			."			<td>";

						if ($show[hide_personal_details]==1) { 
							echo "<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> : Hidden to other members.<hr size=1 color=\"#EEEFF9\"><img src=\"../images/icons/postdate.gif\" width=\"14\" height=\"10\" alt=\"Unhide my Personal Details\">&nbsp;<a href=\"member.php?MemberPageID=Option&Opt=ENF&Details=UnHide\" class=\"small_lk\">Unhide details</a>";
						} else { 
							echo "<img src=\"../images/icons/postdate.gif\" width=\"14\" height=\"10\" alt=\"Hide my Personal Details\">&nbsp;<a href=\"member.php?MemberPageID=Option&Opt=ENF&Details=Hide\" class=\"small_lk\">Hide details...</a>";
						}

		 echo"			</td>"
		 	."		  </tr>"
			."		</table>";
					}
					
		 echo"	  </td>"
			."  </tr>"
			."  <tr>"
			."	  <td width=\"85\" class=\"text\">&nbsp;Username</td>"
			."	  <td width=\"15\"><div align=\"center\">:</div></td>"
			."	  <td width=\"415\" class=\"text\"><strong>$show[username]</strong></td>"
			."  </tr>"
			."  <tr>" 
			."	  <td class=\"text\">&nbsp;Name</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">$show[firstname] $show[middlename] $show[lastname]</td>"
			."  </tr>"
			."  <tr>"
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
			."  <tr>" 
			."	  <td class=\"text\">&nbsp;Email</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if ($show[hide_personal_details]==1) {
				if($show[username] == $_SESSION["valid_user"]) {
					echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> <a href=\"mailto:$show[email]\">$show[email]</a>";
				}
				else {
					echo "Hidden";
				}
			}
			else {
				echo "<a href=\"mailto:$show[email]\">$show[email]</a>";
			}
		echo"  	  </td>"
			."</tr>"
			."  <tr>" 
			."	  <td class=\"text\">&nbsp;Date of Birth</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">$show[dob]</td>"
			."  </tr>";
			
//---------------------//for EDUCATION or SEMESTER-----------------------------------
			if($show[auth_user]!='Student') {
			echo "<tr>" 
			
			."	  <td class=\"text\">&nbsp;Education</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
					if (empty($ss[education])) { 
							echo "None";
								} 
								else { 
										echo "$ss[education]";
									} 
			echo "</td>"
			." </tr>";
			}
			else if($show[auth_user]=='Student'){
			echo	" <tr>" 
			."	  <td class=\"text\">&nbsp;Semester</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
				if (empty($s[semester])) { 
							echo "None";
								} 
						else { 
							echo "$s[semester]";
							} 		
			echo	"</td>"
			."		</tr>";
			}
//-----------------------------------------------------
			if($show[auth_user]!='Student')
			{
			echo " </td>"
			."  </tr>"
			."	  <td class=\"text\">&nbsp;Designation</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($ss[designation])) { 
				echo "None";
			} else { 
				echo "$ss[designation]";
			} 
			}			
			echo " </td>"
			."  </tr>"
			."  <tr>"
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
			."  <tr>"
			."	  <td class=\"text\">&nbsp;Telephone 1</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[phone1])) { 
				echo "None";
			} else { 
				if ($show[hide_personal_details]==1) {
					if($show[username] == $_SESSION["valid_user"]) {
						echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[phone1]";
					}
					else {
						echo "Hidden";
					}
				}
				else {
					echo "$show[phone1]";
				}
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr>"
			."	  <td class=\"text\">&nbsp;Telephone 2</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[phone2])) { 
				echo "None";
			} else {
				if ($show[hide_personal_details]==1) {
					if($show[username] == $_SESSION["valid_user"]) {
						echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[phone2]";
					}
					else {
						echo "Hidden";
					}
				}
			else { 
				echo "$show[phone2]";
				}
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr>" 
			."	  <td class=\"text\">&nbsp;Mobile</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[mobile])) { 
				echo "None";
			} else { 
				if ($show[hide_personal_details]==1) {
					if($show[username] == $_SESSION["valid_user"]) {
						echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[mobile]";
					}
					else {
						echo "Hidden";
					}
				}
				else {
				echo "$show[mobile]";
				}
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr>"
			."	  <td class=\"text\">&nbsp;Place</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if ($show[hide_personal_details]==1) {
				if($show[username] == $_SESSION["valid_user"]) {
					echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[address1]";
				}
				else {
					echo "Hidden";
				}
			}
			else {
				echo"$show[address1]</td>";
			}
		echo"  </tr>"
			."  <tr>"
			."	  <td class=\"text\">&nbsp;Home Town</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[address2])) { 
				echo "None";
			} else {
				if ($show[hide_personal_details]==1) {
					if($show[username] == $_SESSION["valid_user"]) {
						echo"<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\"> $show[address2]";
					}
					else {
						echo "Hidden";
					}
				}
				else { 
					echo "$show[address2]";
				}
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr> "
			."	  <td class=\"text\">&nbsp;City</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">$show[city]</td>"
			."  </tr>"
			."  <tr>" 
			."	  <td class=\"text\">&nbsp;Country</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">$show[country]</td>"
			."  </tr>";
			
			echo "    </td>"
			."  </tr>"
			."  <tr valign=\"top\">"
			."	  <td class=\"text\">&nbsp;Hobbies</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[hobbies])) { 
				echo "None";
			} else { 
				echo "$show[hobbies]";
			} 
			
//---------------------//for JOINED DATE OR ADMISSION DATE-----------------------------------
			if($show[auth_user]!='Student') {
			echo "<tr>" 
			
			."	  <td class=\"text\">&nbsp;Joined Date</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
					if (empty($ss[joined_date])) { 
							echo "None";
								} 
								else { 
										echo "$ss[joined_date]";
									} 
			echo "</td>"
			." </tr>";
			}
			else if($show[auth_user]=='Student'){
			echo	" <tr>" 
			."	  <td class=\"text\">&nbsp;Admission On</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
				if (empty($s[admission_date])) { 
										echo "None";
										} 
								else { 
								echo "$s[admission_date]";
								} 
					
			echo	"</td>"
			."		</tr>";
			}
		
?>
 </td>
  </tr>
</table>