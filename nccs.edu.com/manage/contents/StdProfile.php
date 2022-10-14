<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_members, tbl_students WHERE tbl_members.id=tbl_students.id AND tbl_members.id=$_GET[id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	?>
	<table width="750" border="0" cellspacing="0" cellpadding="3" align="center" class="table">
	  <tr>
		<td colspan=3 class=text><strong><img src="../images/icons/profile.gif" width="16" height="16" align="absmiddle">&nbsp;Profile: </strong></td>
		<td width="66" rowspan=23 valign=top>
		  <table width="100%" border="0" cellspacing="1" cellpadding="3" class="table">
			<tr>
			  <td>
			  <?
				if (empty($show[photo])) {
					if ($show[gender] == "Female") {
						echo "<center><img src=\"../images/icons/nopic_female.gif\" width=\"90\" height=\"113\" alt=\"My Photo\" align=\"top\"></center>";
					}
					else {
						echo "<center><img src=\"../images/icons/nopic_male.gif\" width=\"90\" height=\"113\" alt=\"My Photo\" align=\"top\"></center>";							
					}
				}
				else { 
					echo "<center><img src=\"../members/mem_photos/".$show['photo']."\" alt=\"$show[firstname] $show[middlename] $show[lastname]\" width=\"90\" height=\"113\"></center>";
				}
			  ?>		 	  </td>
		  	</tr>
		  </table>
		<br><div align="center"><input type="button" name="Submit" value="Back" onClick="javascript: history.back()" class="search_box1"></div>		</td>
	  </tr>
	  <tr class="EE">
		<td width="127" class="text">&nbsp;Username</td>
		<td width="13"><div align="center">:</div></td>
		<td width="520" class="text"><strong><?=$show['username'];?></strong></td>
	  </tr>
		<?
			if ($_SESSION["valid_user"] == "admin") {
				echo"   <tr class=\"EE\">"
			."	  <td class=\"text\">&nbsp;Password</td>"
			."	  <td><div align=\"center\">:</div></td>"
			."	  <td class=\"text\"><strong>$show[password]</strong></td>"
			."  </tr>";
			}
		?>
		<tr class="EE"> 
		  <td class="text">&nbsp;Name</td>
		  <td><div align="center">:</div></td>
		  <td class="text"><?=$show['firstname'] . " " . $show['middlename'] . " " . $show['lastname'];?></td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Gender</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show['gender'])) { 
				echo "None";
			} else { 
				echo "$show[gender]";
			}
		  ?>		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Registration No.</td>
		  <td><div align="center">:</div></td>
		  <td class="text"><?=$show['reg_no'];?></td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Year/batch</td>
		  <td><div align="center">:</div></td>
		  <td class="text"><?=$show['year_batch'];?></td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Semester</td>
		  <td><div align="center">:</div></td>
		  <td class="text"><?=$show['semester'];?></td>
		</tr>
		<tr class="EE"> 
		  <td class="text">&nbsp;Father's Name</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show['father_fn']) && empty($show['father_mn']) && empty($show['father_ln'])) { 
				echo "None";
			} else { 
				echo $show['father_fn'] . " " . $show['father_mn'] . " " . $show['father_ln'];
			}
		  ?>		  </td>
		</tr>
		<tr class="EE"> 
		  <td class="text">&nbsp;Email</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
		  	if (empty($show['email'])) {
				echo "None";
			}
			else {
				echo "<a href=\"mailto:$show[email]\">$show[email]</a>";
			}
		  ?>
		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Date of Birth</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
		  	if (empty($show['dob'])) {
				echo "None";
			}
			else {
				echo "$show[dob]";
			}
		  ?>
		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Website</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show['website'])) { 
				echo "None";
			} else { 
				echo "<a href=\"$show[website]\" target=\"_blank\">$show[website]</a>";
			}
		  ?>		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Telephone 1</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show['phone1'])) { 
				echo "None";
			} 
			else {
					echo "$show[phone1]";
			}
		  ?></td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Telephone 2</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show['phone2'])) { 
				echo "None";
			}
			else { 
				echo "$show[phone2]";
			}
		  ?>		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Mobile</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show['mobile'])) { 
				echo "None";
			} 
			else {
				echo "$show[mobile]";
			}
		  ?>		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Permanent Address </td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
		  	if (empty($show['address1'])) {
		  		echo "None";
		  	}
			else {
				echo $show['address1'];
			}
		  ?>
		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Temporary Address</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show['address2'])) { 
				echo "None";
			} 
			else { 
					echo "$show[address2]";
			}
		  ?>
		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;City</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
		  	if (empty($show['city'])) {
				echo "None";
			}
			else {
				echo $show['city'];
			}
		  ?>
		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Country</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
		  	if (empty($show['country'])) {
				echo "None";
			}
			else {
				echo $show['country'];
			}
		  ?>
		  </td>
		</tr>
		<tr class="EE" valign="top">
		  <td class="text">&nbsp;Hobbies</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show[hobbies])) { 
				echo "None";
			} else { 
				echo "$show[hobbies]";
			}
		  ?>		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Admission On</td>
		  <td><div align="center">:</div></td>
		  <td class="text"><?=$show['admission_date'];?></td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Last Login</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show[last_login])) { 
				echo "Not logged in yet.";
			} else { 
				echo "$show[last_login]";
			}
		  ?>		  </td>
		</tr>
	  </table>
	<br>