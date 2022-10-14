<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
	include ("../include/db.php");
	$query = "Select * from tbl_members where id = $id";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
		echo "<table width=\"750\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\" class=\"table\">"
			."  <tr>"
			."	  <td colspan=3 class=text><strong><img src=\"../images/icons/profile.gif\" width=\"16\" height=\"16\">Profile: </strong> "
			."		<p>Profile Viewed: [$show[profile_view]] times.</td>"
			."    <td rowspan=23 valign=top>"
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
			."		</table>"
			."		<br><div align=\"center\"><input type=\"button\" name=\"Submit\" value=\"Back\" onClick=\"javascript: history.back()\" class=\"search_box1\"></div>"	
			."	  </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td width=\"100\" class=\"text\">&nbsp;Username</td>"
			."	  <td width=\"30\"><div align=\"center\">:</div></td>"
			."	  <td width=\"530\" class=\"text\"><strong>$show[username]</strong></td>"
			."  </tr>";
			if ($_SESSION["valid_user"] == "admin") {
		echo"   <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Password</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\"><strong>$show[password]</strong></td>"
			."  </tr>";
			}
		echo"	<tr class=\"EE\">" 
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
			."	  <td class=\"text\">"
			."		<a href=\"mailto:$show[email]\">$show[email]</a>"
			." 	  </td>"
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
			."	  <td class=\"text\">&nbsp;Telephone</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[phone1])) { 
				echo "None";
			} 
			else {
					echo "$show[phone1]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Telephone</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[phone2])) { 
				echo "None";
			}
			else { 
				echo "$show[phone2]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Mobile</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[mobile])) { 
				echo "None";
			} 
			else {
				echo "$show[mobile]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Address</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">"
			."		$show[address1]</td>"
			."  </tr>"
			."  <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Address</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[address2])) { 
				echo "None";
			} 
			else { 
					echo "$show[address2]";
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
			."	  <td class=\"text\">&nbsp;Fav Book(s)</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[fav_books])) { 
				echo "None";
			} else { 
				echo "$show[fav_books]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\" valign=\"top\">"
			."	  <td class=\"text\">&nbsp;Fav Movie(s)</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[fav_movies])) { 
				echo "None";
			} else { 
				echo "$show[fav_movies]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\" valign=\"top\">"
			."	  <td class=\"text\">&nbsp;Fav Artist(s)</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[fav_artists])) { 
				echo "None";
			} else { 
				echo "$show[fav_artists]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\" valign=\"top\">"
			."	  <td class=\"text\">&nbsp;Fav Music(s)</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[fav_musics])) { 
				echo "None";
			} else { 
				echo "$show[fav_musics]";
			} 
		echo "    </td>"
			."  </tr>"
			."  <tr class=\"EE\" valign=\"top\">"
			."	  <td class=\"text\">&nbsp;About Me</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[about_me])) { 
				echo "None";
			} else { 
				echo "$show[about_me]";
			} 
		echo "    </td>"
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
			."  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Joined On</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">$show[joined_date]</td>"
			."  </tr>"
			."  <tr class=\"EE\">" 
			."	  <td class=\"text\">&nbsp;Last Login</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\">";
			if (empty($show[last_login])) { 
				echo "Not logged in yet.";
			} else { 
				echo "$show[last_login]";
			} 
		echo "    </td>"
			."  </tr>"
			."</table><br>";

?>