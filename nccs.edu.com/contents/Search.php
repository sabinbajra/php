<?php
	session_start();
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
?>
<form id="form1" name="form1" method="post" action="<?=$_SERVER['PHP_SELF'];?>?MemberPageID=Search">
  <table width="510" border="0" align="center" cellpadding="3" cellspacing="0" class="text">
    <tr>
      <td colspan="7" height="5"><img src="../images/spacer.gif" /></td>
    </tr>    
	<tr>
      <td width="106">Search Name </td>
      <td width="84"><input name="searchstring" value="<?=$_POST['searchstring'];?>" type="text" id="fname" class="login_box" size="13" /></td>
      <td width="75">Search by </td>
      <td width="96"><select name="SearchBy" id="SearchBy" class="login_box">
      <?
		if ($_POST) {
			echo "<option value=\"$_POST[SearchBy]\" selected>$_POST[SearchBy]</option>";
			echo "<option>---------</option>";
		}
	  ?>
        <option value="username">UserName</option>
        <option value="firstname">FirstName</option>
		<option value="middlename">MidName</option>
        <option value="lastname">LastName</option>
		<option value="semester">Semester</option>
		<option value="year_batch">Year/Batch</option>
		<option value="email">E-mail</option>
        <option value="dob">DOB</option>
		<option value="address1">Address</option>
        <option value="city">City</option>
      </select></td>
      <td width="56">Category</td>
      <td width="82"><select name="Category" id="Category" class="login_box">
      <?
		if ($_POST) {
			echo "<option value=\"$_POST[Category]\" selected>$_POST[Category]</option>";
			echo "<option>---------</option>";
		}
	  ?>
        <option>Student</option>
        <option>Staff</option>
      </select></td>
      <td width="21"><input name="search" type="image" src="<?=$Images;?>go_sm.gif" align="middle"></td>
    </tr>
    <tr>
      <td colspan="7" height="5"><img src="../images/spacer.gif" /></td>
    </tr>
  </table>
</form>
<?php
	if ($_POST) {
		include "../include/db.php";
		$SearchBy = $_POST['SearchBy'];
		$searchstring = $_POST['searchstring'];
		
		$ErrorMSGs = "The searched <strong><font color='#FF0000'>'$searchstring'</strong></font> was not found with <strong>$SearchBy</strong> in category <strong>$_POST[Category]</strong>!";
		
		//For earching Students		
		if ($_POST['Category'] == "Student") {
			$sql = "SELECT * FROM tbl_members, tbl_students WHERE $SearchBy LIKE '%$searchstring%' AND tbl_members.id = tbl_students.id ORDER BY $SearchBy ASC";
			$result = mysql_query($sql);
			$total = @mysql_num_rows($result);
	
			if ($result) {
				if ($total) { 
					echo "<span class=\"title\"><strong>::</strong> No. of student(s) found: <strong><font color='#FF0000'>$total</font></strong></span>";
					?>
					<table width="510" border="0" align="center" cellpadding="3" cellspacing="0">
					  <tr class="text"> 
					  	<td width="100" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>&nbsp;Username</strong></td>
					  	<td width="242" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>Name</strong></td>
					  	<td width="80" background="<?=$AdminImages;?>bks/button1_fill.gif"><div align="center"><strong>Gender</strong></div></td>
					  	<td width="72" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>Semester</strong></td>
					  	<td width="16" background="<?=$AdminImages;?>bks/button1_fill.gif">&nbsp;</td>
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
					  	<td>&nbsp;<?=$show[username];?></td>
					  	<td><?=$show[firstname]. " " . $show[middlename] . " " .$show[lastname];?></td>
					  	<td><div align="center">
						<?
							if ($show[gender]=="Male") {
								echo "<img src=\"../images/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
							}
							else {
								echo "<img src=\"../images/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
							} 
						?>
					 	</div></td>
					  	<td><div align="center"><?=$show[semester];?></div></td>
					  	<td><div align="center">
						<?
							echo "<a href=\"?MemberPageID=View_Profile&id=$show[id]\" class=\"small_lk\"><img src=\"../images/icons/individual.gif\" width=\"15\" height=\"12\" border=\"0\" alt=\"View Profile of $show[username]\"></a>";
						?>
					  	</div></td>
					  </tr>
        			  <?			
						} // End of While...
		  			  ?>
					</table>
					<?
				} // end of if $total
				else {
					echo $ErrorMSGs;
				}
			} // end of if result
			else {
				echo $ErrorMSGs;
			}
		} // end of if category == Student
		
		//For earching Staffs
		if ($_POST['Category'] == "Staff") {
			$sql = "SELECT * FROM tbl_members, tbl_staffs WHERE $SearchBy LIKE '%$searchstring%' AND tbl_members.id = tbl_staffs.id ORDER BY $SearchBy ASC";
			$result = mysql_query($sql);
			$total = @mysql_num_rows($result);
	
			if ($result) {
				if ($total) { 
					echo "<span class=\"title\"><strong>::</strong> No. of staff(s) found: <strong><font color='#FF0000'>$total</font></strong></span>";
					?>
					<table width="510" border="0" align="center" cellpadding="3" cellspacing="0">
					  <tr class="text"> 
					  	<td width="80" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>&nbsp;Username</strong></td>
					  	<td width="173" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>Name</strong></td>
					  	<td width="60" background="<?=$AdminImages;?>bks/button1_fill.gif"><div align="center"><strong>Gender</strong></div></td>
					  	<td width="96" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>Designation</strong></td>
					  	<td width="86" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>Education</strong></td>
					  	<td width="15" background="<?=$AdminImages;?>bks/button1_fill.gif">&nbsp;</td>
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
                   		<td>&nbsp;<?=$show[username];?></td>
                   		<td><?=$show[firstname] . " " . $show[middlename] . " " . $show[lastname];?></td>
                    	<td><div align="center">
                        <?
							if ($show[gender]=="Male") {
								echo "<img src=\"../images/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
							}
							else {
								echo "<img src=\"../images/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
							} 
						?>
                   		</div></td>
                    	<td><?=$show[designation];?></td>
                    	<td>
						<?
							if (empty($show[education])) { 
								echo "None";
							} 
							else { 
								echo "$show[education]";
							} 
						?>
                    	</td>
                    	<td><div align="center">
                        <?
							echo "<a href=\"?MemberPageID=View_Profile&id=$show[id]\" class=\"small_lk\"><img src=\"../images/icons/individual.gif\" width=\"15\" height=\"12\" border=\"0\" alt=\"View Profile of $show[username]\"></a>";
						?>
                    	</div></td>
                  	  </tr>
        			  <?			
						} // End of While...
		  			  ?>
					</table>
					<?
				} // end of if $total
				else {
					echo $ErrorMSGs;
				}
			} // end of if result
			else {
				echo $ErrorMSGs;
			}
		} // end of if category == Staff
		
	}
?>
