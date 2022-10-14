<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}

?> 
<?
	//========================== Search Students ==========================
	if ($searchcat == "Student") {
		include ("../include/db.php");
		$sql = "SELECT * FROM student_profile WHERE $searchtype LIKE '%$searchstring%'
ORDER BY firstname ASC";
		$result = mysql_query($sql);
		$resultsnumber = @mysql_num_rows($result);

		if ($result) {
			if ($resultsnumber) { 
					echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> No. of student(s) found: <strong><font color='#FF0000'>$resultsnumber</font></strong></span>";	
				?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td> 
      <?
	
	// Gives total number of Student...
	$qu = "SELECT * FROM student_profile";
	$re = mysql_query($qu);
	$count = mysql_num_rows($re);
	
	  	echo "<span class=\"title\"><strong>::</strong> Total student(s): $count</span><p>";
		
?>
    </td>
  </tr>
</table>
<table width="750" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
  <tr class="text"> 
    <td width="251" height="22" bgcolor="#ECECEC"><strong>&nbsp;Name</strong></td>
    <td width="58" height="22" bgcolor="#ECECEC"><div align="center"><strong>Gender</strong></div></td>
    <td width="111" height="22" bgcolor="#ECECEC"><strong>Batch</strong></td>
    <td width="308"height="22" bgcolor="#ECECEC"><strong>Faculty</strong></td>
    <td height="22" colspan="3" bgcolor="#ECECEC">&nbsp;</td>
  </tr>
  <?
				while ($show = mysql_fetch_array($result)) {
					if ($alternate == "1") { 
						$color = "#FDFDF7"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; 
						$alternate = "1";
					}
		?>
  <tr  <? echo "bgcolor=$color";?> class="EE"> 
    <td>&nbsp; 
      <?=$show[firstname] . " " . $show[middlename] . " " . $show[lastname];?>
    </td>
    <td> <div align="center"> 
        <?
				if ($show[gender]=="Male") {
					echo "<img src=\"../contents/directory/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
				}
				else if ($show[gender]=="Female"){
					echo "<img src=\"../contents/directory/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
				} 
			?>
      </div></td>
    <td> 
      <?=$show[year_batch];?>
    </td>
    <td> 
      <?
				if (empty($show[faculty])) { 
					echo "None";
				} 
				else { 
					echo "$show[faculty]";
				} 
			?>
    </td>
    <td width="18"> <div align="center"> 
        <?
				echo "<a href=\"?pageID=Student&View=Student_Profile&id=$show[id]\"><img src=\"../contents/directory/icons/ico_detail.gif\" border=\"0\" align=\"middle\" alt=\"View Profile of $show[firstname] $show[middlename] $show[lastname]\"></a>";
			?>
      </div></td>
    <td width="18"> 
      <?
			if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "administrator") {
			echo "<center><a href=\"?pageID=Student&New=Modify_Student_Profile&id=".$show[id]."\"><img src='../contents/directory/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[firstname] $show[middlename] $show[lastname]\"></a></center>";
			}
			else {
			echo "<center><img src='../contents/directory/icons/ico_edit.gif' border='0' title=\"You don't have Permission to Edit Profile of $show[firstname] $show[middlename] $show[lastname]. Please contact your Administrator\"></center>";			
			}
			?>
    </td>
    <td width="22"> 
      <?
			if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "administrator") {
			echo "<center><a href=\"?pageID=Student&New=RegisterENF&Student=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete this Student')\"><img src='../contents/directory/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[firstname] $show[middlename] $show[lastname])\"></a></center>";
			}
			else {
			echo "<center><img src='../contents/directory/icons/ico_delete.gif' border='0' title=\"You don't have Permission to Delete Record of ($show[firstname] $show[middlename] $show[lastname]). Please contact your Administrator\"></center>";			
			}
		?>
    </td>
  </tr>
  <?			
				} 
		  ?>

</table>
<br>
<?
				
			}
			else{
				echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> The searched student(s) <font color='#FF0000'><strong>'$searchstring'</strong></font> was not found !</span><p>";
			}
		
	?>
<?
		} // End of if ($result)...
	} //End of if ($look)
	//======End Search Students======//

	//====================================================================================================================//

	//========================== Search Staffs ==========================
	if ($searchcat == "Staff") {
		include ("../include/db.php");
		$sql = "SELECT * FROM staff WHERE $searchtype LIKE '%$searchstring%'
ORDER BY firstname ASC";
		$result = mysql_query($sql);
		$resultsnumber = @mysql_num_rows($result);

		if ($result) {
			if ($resultsnumber) { 
					echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> No. of staff(s) found: <strong><font color='#FF0000'>$resultsnumber</font></strong></span>";	
				?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td> 
      <?
	// Gives total number of Staffs...
	$qu = "SELECT * FROM staff";
	$re = mysql_query($qu);
	$count = mysql_num_rows($re);
	
	  	echo "<span class=\"title\"><strong>::</strong> Total staff(s): $count</span><p>";
		
?>
    </td>
  </tr>
</table>
<table width="750" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
  <tr class="text"> 
    <td width="181" height="22" bgcolor="#ECECEC"><strong>&nbsp;Name</strong></td>
    <td width="58" height="22" bgcolor="#ECECEC"><div align="center"><strong>Gender</strong></div></td>
    <td width="308" height="22" bgcolor="#ECECEC"><strong>Designation</strong></td>
    <td width="181" height="22" bgcolor="#ECECEC"><strong>E-mail</strong></td>
    <td height="22" colspan="3" bgcolor="#ECECEC">&nbsp;</td>
  </tr>
  <?
				while ($show = mysql_fetch_array($result)) {
					if ($alternate == "1") { 
						$color = "#FDFDF7"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; 
						$alternate = "1";
					}
		?>
  <tr  <? echo "bgcolor=$color";?> class="EE"> 
    <td>&nbsp; 
      <?=$show[firstname] . " " . $show[middlename] . " " . $show[lastname];?>
    </td>
    <td> <div align="center"> 
        <?
				if ($show[gender]=="Male") {
					echo "<img src=\"../contents/directory/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
				}
				else if ($show[gender]=="Female"){
					echo "<img src=\"../contents/directory/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
				} 
			?>
      </div></td>
    <td> 
      <?=$show[designation];?>
    </td>
    <td> 
      <?
				if (empty($show[email])) { 
					echo "None";
				} 
				else { 
					echo "<a href=\"mailto:$show[email]\" class=\"slink\">$show[email]</a>";
				} 
			?>
    </td>
    <td width="18"> <div align="center"> 
        <?
				echo "<a href=\"?pageID=Staff&View=Staff_Profile&id=$show[id]\"><img src=\"../contents/directory/icons/ico_detail.gif\" border=\"0\" align=\"middle\" alt=\"View Profile of $show[firstname] $show[middlename] $show[lastname]\"></a>";
			?>
      </div></td>
    <td width="18"> 
      <?
			if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "administrator") {
			echo "<center><a href=\"?pageID=Staff&New=Modify_Staff_Profile&id=".$show[id]."\"><img src='../contents/directory/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[firstname] $show[middlename] $show[lastname]\"></a></center>";
			}
			else {
			echo "<center><img src='../contents/directory/icons/ico_edit.gif' border='0' title=\"You don't have Permission to Edit Profile of $show[firstname] $show[middlename] $show[lastname]. Please contact your Administrator\"></center>";			
			}
			?>
    </td>
    <td width="22"> 
      <?
			if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "administrator") {
			echo "<center><a href=\"?pageID=Staff&New=RegisterENF&StaffDel=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete this Staff')\"><img src='../contents/directory/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[firstname] $show[middlename] $show[lastname])\"></a></center>";
			}
			else {
			echo "<center><img src='../contents/directory/icons/ico_delete.gif' border='0' title=\"You don't have Permission to Delete Record of ($show[firstname] $show[middlename] $show[lastname]). Please contact your Administrator\"></center>";			
			}
		?>
    </td>
  </tr>
  <?			
				} 
		  ?>
</table>
<br>
<?
				
			}
			else{
				echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> The searched staff(s) <font color='#FF0000'><strong>'$searchstring'</strong></font> was not found !</span><p>";
			}
		
	?>
<?
		} // End of if ($result)...
	} //End of if ($look)
	//======End Search Staffs======//

	//====================================================================================================================//

	//========================== Search Teachers ==========================
	if ($searchcat == "Teacher") {
		include ("../include/db.php");
		$sql = "SELECT * FROM teacher WHERE $searchtype LIKE '%$searchstring%'
ORDER BY firstname ASC";
		$result = mysql_query($sql);
		$resultsnumber = @mysql_num_rows($result);

		if ($result) {
			if ($resultsnumber) { 
					echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> No. of teacher(s) found: <strong><font color='#FF0000'>$resultsnumber</font></strong></span>";	
				?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td> 
      <?
	
	// Gives total number of Teacher...
	$qu = "SELECT * FROM teacher";
	$re = mysql_query($qu);
	$count = mysql_num_rows($re);
	
	  	echo "<span class=\"title\"><strong>::</strong> Total teacher(s): $count</span><p>";
		
?>
    </td>
  </tr>
</table>
<table width="750" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
  <tr class="text"> 
    <td width="148" height="22" bgcolor="#ECECEC"><strong>&nbsp;Name</strong></td>
    <td width="50" height="22" bgcolor="#ECECEC"><div align="center"><strong>Gender</strong></div></td>
    <td width="80" height="22" bgcolor="#ECECEC"><strong>Designation</strong></td>
    <td width="215" bgcolor="#ECECEC"><strong>Faculty</strong></td>
    <td width="151" height="22" bgcolor="#ECECEC"><strong>E-mail</strong></td>
    <td height="22" colspan="3" bgcolor="#ECECEC">&nbsp;</td>
  </tr>
  <?
				while ($show = mysql_fetch_array($result)) {
					if ($alternate == "1") { 
						$color = "#FDFDF7"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; 
						$alternate = "1";
					}
		?>
  <tr  <? echo "bgcolor=$color";?> class="EE"> 
    <td>&nbsp; 
      <?=$show[firstname] . " " . $show[middlename] . " " . $show[lastname];?>
    </td>
    <td> <div align="center"> 
        <?
				if ($show[gender]=="Male") {
					echo "<img src=\"../contents/directory/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
				}
				else if ($show[gender]=="Female"){
					echo "<img src=\"../contents/directory/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
				} 
			?>
      </div></td>
    <td> 
      <?=$show[designation];?>
    </td>
    <td> 
      <?=$show[faculty];?>
    </td>
    <td> 
      <?
				if (empty($show[email])) { 
					echo "None";
				} 
				else { 
					echo "<a href=\"mailto:$show[email]\" class=\"slink\">$show[email]</a>";
				} 
			?>
    </td>
    <td width="17"> <div align="center"> 
        <?
				echo "<a href=\"?pageID=Teacher&View=Teacher_Profile&id=$show[id]\"><img src=\"../contents/directory/icons/ico_detail.gif\" border=\"0\" align=\"middle\" alt=\"View Profile of $show[firstname] $show[middlename] $show[lastname]\"></a>";
			?>
      </div></td>
    <td width="17"> 
      <?
			if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "administrator") {
			echo "<center><a href=\"?pageID=Teacher&New=Modify_Teacher_Profile&id=".$show[id]."\"><img src='../contents/directory/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[firstname] $show[middlename] $show[lastname]\"></a></center>";
			}
			else {
			echo "<center><img src='../contents/directory/icons/ico_edit.gif' border='0' title=\"You don't have Permission to Edit Profile of $show[firstname] $show[middlename] $show[lastname]. Please contact your Administrator\"></center>";			
			}
			?>
    </td>
    <td width="24"> 
      <?
			if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "administrator") {
			echo "<center><a href=\"?pageID=Teacher&New=RegisterENF&TeacherDel=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete this Staff')\"><img src='../contents/directory/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[firstname] $show[middlename] $show[lastname])\"></a></center>";
			}
			else {
			echo "<center><img src='../contents/directory/icons/ico_delete.gif' border='0' title=\"You don't have Permission to Delete Record of ($show[firstname] $show[middlename] $show[lastname]). Please contact your Administrator\"></center>";			
			}
		?>
    </td>
  </tr>
  <?			
				} 
		  ?>

</table>
<br>

<?
				
			}
			else{
				echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> The searched teacher(s) <font color='#FF0000'><strong>'$searchstring'</strong></font> was not found !</span><p>";
			}
		
	?>
<?
		} // End of if ($result)...
	} //End of if ($look)
	//======End Search Teachers======//
?>
