<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: index.php");
	}
	
	include ("include/db.php");
	$query = "SELECT * FROM tbl_member WHERE idtbl_member=$_GET[id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
	
	$query1 = "SELECT * FROM tbl_validity WHERE memno='$show[memno]'";
	$result1 = mysql_query($query1);
	$show1 = mysql_fetch_array($result1);
	?>

	<table width="750" border="0" cellspacing="0" cellpadding="3" align="center" class="table">
	  <tr>
		<td colspan=3 class=text><strong><img src="images/icons/profile.gif" width="16" height="16" align="absmiddle">&nbsp;Profile: </strong></td>
		<td width="66" rowspan=24 valign=top>
		  <table width="100%" border="0" cellspacing="1" cellpadding="3" class="table">
			<tr>
			  <td>
			  <?
				if (empty($show[image])) {
					if ($show[gender] == "Female") {
						echo "<center><img src=\"images/icons/nopic_female.gif\" width=\"90\" height=\"113\" alt=\"My Photo\" align=\"top\"></center>";
					}
					else {
						echo "<center><img src=\"images/icons/nopic_male.gif\" width=\"90\" height=\"113\" alt=\"My Photo\" align=\"top\"></center>";							
					}
				}
				else { 
					echo "<center>
					
					<img src=\"image/member/".$show[image]."\" alt=\"$show[fname] $show[mname] $show[lname]\" width=\"90\" height=\"113\"></center>";
				}
			  ?>		 	  </td>
		  	</tr>
		  </table>
		<br><div align="center"><input type="button" name="Submit" value="Back" onClick="javascript: history.back()" ></div>		</td>
	  </tr>
	  <tr class="EE">
		<td width="135" class="text"><strong>&nbsp;Name</strong></td>
		<td width="31"><div align="center"><strong>:</strong></div></td>
		<td width="494" class="text"><strong>
	    <?=$show['fname'] . " " . $show['mname'] . " " . $show['lname'];?>
		</strong></td>
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
		  <td class="text">&nbsp;Gender</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show['sex'])) { 
				echo "None";
			} else { 
				echo "$show[sex]";
			}
		  ?>		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Member No.</td>
		  <td><div align="center">:</div></td>
		  <td class="text"><?=$show['memno'];?></td>
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
		  <td class="text">&nbsp;Firmname</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
		  	if (empty($show['firmname'])) {
				echo "None";
			}
			else {
				echo $show['firmname'];
			}
		  ?>
		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Designation</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
		  	if (empty($show['designation'])) {
				echo "None";
			}
			else {
				echo $show['designation'];
			}
		  ?>
		  </td>
		</tr>
		<tr class="EE" valign="top">
		  <td class="text">&nbsp;Blood</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show[blood])) { 
				echo "None";
			} else { 
				echo "$show[blood]";
			}
		  ?>		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">&nbsp;Passport</td>
		  <td><div align="center">:</div></td>
		  <td class="text"><?=$show['passport'];?></td>
		</tr>
		<tr class="EE">
		  <td class="text">Citizenship</td>
		  <td><div align="center">:</div></td>
		  <td class="text">
		  <?
			if (empty($show[citizenship])) { 
				echo "None";
			} else { 
				echo "$show[citizenship]";
			}
		  ?>		  </td>
		</tr>
		<tr class="EE">
		  <td class="text">Valid Upto </td>
		  <td><div align="center">:</div></td>
		  <td class="text"> 
		  <?
			if (empty($show1[tillYear])) { 
				echo "20XX ";
			} else { 
				echo "$show1[tillYear]"."&nbsp;";
			}
			if (empty($show1[tillMth])) { 
				echo "/-/ ";
			} else { 
				echo "$show1[tillMth]"."&nbsp;";
			}
			if (empty($show1[tillDate])) { 
				echo " - ";
			} else { 
				echo "$show1[tillDate]"."&nbsp;";
			}
		  ?>		
		  </td>
	  </tr>
	  </table>
	<br>