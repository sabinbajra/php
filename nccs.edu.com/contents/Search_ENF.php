<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	include ("../include/db.php");
	$searchstring = $_POST['searchstring'];
	//Search Books
	if ($SearchCat == "Book") {
		$srh_q = "SELECT * FROM tbl_lib_book WHERE bk_name LIKE '%$searchstring%' ORDER BY bk_name ASC";
		$srh_r = mysql_query($srh_q);
		$srh_n = mysql_num_rows($srh_r);
		
		if ($srh_r) {
			if ($srh_n) {
				echo "&nbsp;&nbsp;<span class=\"text\"><strong>::</strong> No. of book(s) found: <strong><font color='#FF0000'>$srh_n</font></strong></span>";
				//Show Found Books
				?>
<table width="500" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr class="text">
          <td width="9" background="../manage/images/bks/button1_fill.gif"><strong>&nbsp;</strong></td>
		  <td width="60" background="../manage/images/bks/button1_fill.gif"><strong>&nbsp;Code No</strong></td>
          <td width="200" background="../manage/images/bks/button1_fill.gif"><strong>Name</strong></td>
          <td width="87" background="../manage/images/bks/button1_fill.gif"><strong>Author</strong></td>
		  <td width="87" background="../manage/images/bks/button1_fill.gif"><div align="center"><strong>Grade</strong></div></td>
		  <?
		  	if ($_SESSION["valid_auth"] == "Library") {
			?>
			<td width="57" colspan="3" background="../manage/images/bks/button1_fill.gif">&nbsp;		  </td>
			<?
			}
			else {
		  ?>
          <td width="16" background="../manage/images/bks/button1_fill.gif">&nbsp;</td>
		  <?
		  	}
		  ?>
        </tr>
        <?
				while ($show = mysql_fetch_array($srh_r)) {
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
          <td> <div align="center"> 
            <?
				if ($show[ref_yn] == 1 && $show[in_out] != 1) {
					echo "<img src=\"../images/icons/b_blue.gif\" width=\"9\" height=\"9\" alt=\"Reference book!\"/>";
				}
				else if ($show[ref_yn] == 1 && $show[in_out] == 1) {
					echo "<img src=\"../images/icons/b_mul.gif\" width=\"9\" height=\"9\" alt=\"Reference book is in use!\"/>";
				}
				else {
					if ($show[in_out] == 0) { 
						echo "<img src=\"../images/icons/b_green.gif\" width=\"9\" height=\"9\" alt=\"Book is in the Library!\"/>";
					}
					else { 
						echo "<img src=\"../images/icons/b_red.gif\" width=\"9\" height=\"9\" alt=\"The book is in use!\"/>";
					}
				} 
			?>
          </div></td>
		  <td> &nbsp; 
            <?=$show[code_no];?>          </td>
          <td> 
             <?=$show[bk_name];?>          </td>
          <td> 
            <?=$show[bk_author];?>          </td>
		  <td><div align="center">
		    <?=$show[grade];?>
		  </div></td>
		  <?
		  	if ($_SESSION["valid_auth"] == "Library") {
			?>
          <td width="19"> 
           	<?php
				echo "<center><a href=\"#\" onClick=\"MM_openBrWindow('" . $AppConts . "BookDetails.php?id=$show[code_no]','Books','scrollbars=yes,width=650,height=370')\"><img src=\"../images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" alt=\"View Details: $show[bk_name]\"></a></center>";
			?>          </td>
          <td width="19"> 
            <?php
				if ($show[bk_out_qty] > 1) {
					echo "<center><a href=\"#\" onclick=\"alert('You don\'t have Permission to Modify: \\nBook is in use.')\"><img src='../images/icons/ico_edit.gif' border='0'></a></center>";
				}
				else {
					echo "<center><a href=\"?MemberPageID=BookModify&id=".$show[bk_id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit: $show[bk_name]\"></a></center>";
				}
			?>          </td>
          <td width="19"> 
            <?php
				if ($show[bk_out_qty] > 1) {
					echo "<center><a href=\"#\" onclick=\"alert('You don\'t have Permission to Delete: \\nBook is in use.')\"><img src='../images/icons/ico_delete.gif' border='0'></a></center>";
				}
				else {
					echo "<center><a href=\"?MemberPageID=Book_ENF&Book=Delete&id=".$show[bk_id]."\" onclick=\"return confirm('Are you sure to delete:- \\nBook: $show[bk_name] \\nAuthor: $show[bk_author]')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[bk_name])\"></a></center>";		
				}
			?>          </td>
		  <?
			}
			else {
		  ?>
          <td>
		  	<?
				if ($show[ref_yn] == 1 && $show[in_out] != 1) {
					$Type = "Reference book!";
				}
				else if ($show[ref_yn] == 1 && $show[in_out] == 1) {
					$Type = "Reference book is in use!";
				}
				else {
					if ($show[in_out] == 0) { 
						$Type = "Book is in the Library!";
					}
					else { 
						$Type = "The book is in use!";
					}
				} 
			?>
		  	<center><a href="#" onclick="alert('<?=$Type;?>\n\nCode No.: <?=$show["code_no"];?>\nName      : <?=$show["bk_name"];?>\nAuthor    : <?=$show["bk_author"];?>\nPublisher : <?=$show["bk_publisher"];?>')"><img src="../images/icons/_info.gif" border="0" alt="Book Info."></a></center></td>
		  <?
		  	}
		  ?>
        </tr>
        <?			
				} // End of While...
		  	?>
</table>
				
				<?
			}
			else {
				echo "&nbsp;&nbsp;<span class=\"text\"><strong>::</strong> The searched book <font color='#FF0000'><strong>'$searchstring'</strong></font> was not found !</span><p>";
			}
		}
	}
	
	//Search Borrowers
	if ($SearchCat == "Borrower") {
		$srh_q = "SELECT * FROM tbl_members,tbl_book_detail WHERE tbl_members.firstname LIKE '%$searchstring%' AND tbl_members.username = tbl_book_detail.mem_id ORDER BY firstname ASC";
		$srh_r = mysql_query($srh_q);
		$srh_n = mysql_num_rows($srh_r);
		
		if ($srh_r) {
			if ($srh_n) {
				echo "&nbsp;&nbsp;<span class=\"text\"><strong>::</strong> No. of borrower(s) found: <strong><font color='#FF0000'>$srh_n</font></strong></span>";
				
				while ($show = mysql_fetch_array($srh_r)) {
					echo "<p><strong>:: $show[firstname] $show[middlename] $show[lastname]</strong> ( <strong>$show[username])</strong><br>";
					$qu1="select * from tbl_lib_book where code_no='$show[bk_id]'";
					$re1=mysql_query($qu1);
					$s1=mysql_fetch_array($re1);
					echo "&nbsp;&nbsp;&nbsp;» Book: $s1[bk_name]<br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Code No.: $show[bk_id]<br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Author: $s1[bk_author]<br>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Publisher: $s1[bk_publisher]";
				}		
			}
			else {
				echo "&nbsp;&nbsp;<span class=\"text\"><strong>::</strong> The searched borrower <font color='#FF0000'><strong>'$searchstring'</strong></font> was not found !</span><p>";
			}
		}
	}
	
	//Search Students
	if ($SearchCat == "Students") {
		$srh_q = "SELECT * FROM tbl_members, tbl_students WHERE firstname LIKE '%$searchstring%' AND tbl_members.id = tbl_students.id ORDER BY firstname ASC";
		$srh_r = mysql_query($srh_q);
		$srh_n = mysql_num_rows($srh_r);
		
		if ($srh_r) {
			if ($srh_n) {
				//Show Found Students
				?>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr> 
		<td width="50%" class="text">Total Found: <font color="#FF0000"><strong><?=$srh_n;?></strong></font></td>
		<td width="50%" valign="top">
          <form name="form1" method="post" action="?MemberPageID=Search_ENF&SearchCat=Students">
		  <div align="right">
          <input name="searchstring" type="text" class="text_box_sm" onFocus="if(this.value=='Search students')this.value='';" value="Search students" size="20" maxlength="20">
          <input name="imageField" type="image" src="../images/icons/search.gif" alt="Search Staff(s) with FirstName" align="middle" width="16" height="16" border="0">
		  </div>
		  </form>
		</td>
	  </tr>
	  </table>
	  <table width="510" border="0" align="center" cellpadding="3" cellspacing="0">
       <tr class="text"> 
			  <td width="100" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>&nbsp;Username</strong></td>
			  <td width="242" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>Name</strong></td>
			  <td width="80" background="<?=$AdminImages;?>bks/button1_fill.gif"><div align="center"><strong>Gender</strong></div></td>
			  <td width="72" background="<?=$AdminImages;?>bks/button1_fill.gif"><strong>Semester</strong></td>
			  <td width="16" background="<?=$AdminImages;?>bks/button1_fill.gif">&nbsp;</td>
		</tr>
        <?
				while ($show = mysql_fetch_array($srh_r)) {
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
			}
			else {
			?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr> 
		<td width="50%" class="text">Total Found: <font color="#FF0000"><strong><?=$srh_n;?></strong></font></td>
		<td width="50%" valign="top">
          <form name="form1" method="post" action="?MemberPageID=Search_ENF&SearchCat=Students">
		  <div align="right">
          <input name="searchstring" type="text" class="text_box_sm" onFocus="if(this.value=='Search students')this.value='';" value="Search students" size="20" maxlength="20">
          <input name="imageField" type="image" src="../images/icons/search.gif" alt="Search Staff(s) with FirstName" align="middle" width="16" height="16" border="0">
		  </div>
		  </form>
		</td>
	  </tr>
	  </table>
			<?
				echo "&nbsp;&nbsp;<span class=\"text\"><strong>::</strong> The searched student <font color='#FF0000'><strong>'$searchstring'</strong></font> was not found !</span><p>";
			}
		}
	}
	
	//Search Staffs
	if ($SearchCat == "Staffs") {
		$srh_q = "SELECT * FROM tbl_members, tbl_staffs WHERE firstname LIKE '%$searchstring%' AND tbl_members.id = tbl_staffs.id ORDER BY firstname ASC";
		$srh_r = mysql_query($srh_q);
		$srh_n = mysql_num_rows($srh_r);
		
		if ($srh_r) {
			if ($srh_n) {
				//Show Found Staffs
				?>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr> 
		<td width="50%" class="text">Total Found: <font color="#FF0000"><strong><?=$srh_n;?></strong></font></td>
		<td width="50%" valign="top">
          <form name="form1" method="post" action="?MemberPageID=Search_ENF&SearchCat=Staffs">
		  <div align="right">
          <input name="searchstring" type="text" class="text_box_sm" onFocus="if(this.value=='Search staffs')this.value='';" value="Search staffs" size="20" maxlength="20">
          <input name="imageField" type="image" src="../images/icons/search.gif" alt="Search Staff(s) with FirstName" align="middle" width="16" height="16" border="0">
		  </div>
		  </form>
		</td>
	  </tr>
	  </table>
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
				while ($show = mysql_fetch_array($srh_r)) {
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
                        <?=$show[username];?></td>
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
                    <td><?
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
			}
			else {
			?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr> 
		<td width="50%" class="text">Total Found: <font color="#FF0000"><strong><?=$srh_n;?></strong></font></td>
		<td width="50%" valign="top">
          <form name="form1" method="post" action="?MemberPageID=Search_ENF&SearchCat=Staffs">
		  <div align="right">
          <input name="searchstring" type="text" class="text_box_sm" onFocus="if(this.value=='Search staffs')this.value='';" value="Search staffs" size="20" maxlength="20">
          <input name="imageField" type="image" src="../images/icons/search.gif" alt="Search Staff(s) with FirstName" align="middle" width="16" height="16" border="0">
		  </div>
		  </form>
		</td>
	  </tr>
	  </table>
			<?
				echo "&nbsp;&nbsp;<span class=\"text\"><strong>::</strong> The searched staff <font color='#FF0000'><strong>'$searchstring'</strong></font> was not found !</span><p>";
			}
		}
	}
?>