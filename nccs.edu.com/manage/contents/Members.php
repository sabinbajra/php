<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> 
		  
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<?
	// Gives total number of members...
	include ("../include/db.php");
	$QMembers = "SELECT * FROM tbl_members";
	$RMembers = mysql_query($QMembers);
	$count 	= mysql_num_rows($RMembers);
?>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td class="title"><img src="../images/icons/users.gif" width="23" height="22"> 
      Member's Profile 
      <hr size="1">
      <br>
    </td>
  </tr>
  <tr> 
    <td> <div align="center">
        <table width="765" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr> 
            <td><table width="751" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
                <tr> 
                  <td width="372"><? echo "<span class=\"title\"><strong>Total Members(s) : $count</strong></span>";?> 
                  </td>
                  <td width="367"><div align="right"> 
                      <?
		  if ($_SESSION["valid_user"] == "admin") {
			  echo "<a href=\"?AdminPageID=Users&New=Register_User\">Register New User</a>";
		  }
		  ?>
                    </div></td>
                </tr>
              </table>
              <br> 
              <?
	
	if(!isset($start)) $start = 0;
	if($_SESSION["valid_user"] == "admin")
	$query = "SELECT * FROM tbl_members order by firstname ASC LIMIT " . $start . ", 50";
	$result = mysql_query($query);
		
	$num = mysql_num_rows($result);
	$finish = $start+$num;
	$first = $start+1;
	
		if ($New == "Register_User" || $New == "Reg_User_Profile" || $New == "RegisterENF" || $New == "Modify_User_Profile") {
			include $New . ".php";
		}
		else if ($View == "Members_Profile") {
			include $View . ".php";
		}
		else if ($Upload == "upload_photo" || $Upload == "upload_enf")
			include $Upload . ".php";
		else {
			if ($num == 0) {
				echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> No user has been added yet...</span>";
			}
			else {
				if ($num == 1) {
					echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> No. of user: $first - $finish of $count</span>";	
				}
				else {
					echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> No. of users: $first - $finish of $count</span>";
				}
			}
				
?>
            </td>
          </tr>
          <tr> 
            <td> 
              <table width="750" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
                <tr class="text"> 
                  <td width="85" height="25" bgcolor="#ECECEC"><strong>Username</strong></td>
                  <td width="165" height="25" bgcolor="#ECECEC"><strong>&nbsp;Name</strong></td>
                  <td width="55" height="25" bgcolor="#ECECEC"><div align="center"><strong>Gender</strong></div></td>
                  <td width="200" height="25" bgcolor="#ECECEC"><strong>E-mail</strong></td>
                  <td width="180" bgcolor="#ECECEC"><strong>Last Login</strong></td>
                  <td width="65" colspan="3" bgcolor="#ECECEC">&nbsp;</td>
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
					
					$id = $show["id"];
					
		?>
                <tr  <? echo "bgcolor=$color";?> class="EE"> 
                  <td>&nbsp;
                    <?
				if (empty($show[username])) { 
					echo "None";
				} 
				else { 
					echo "$show[username]";
				} 
			?>
                  </td>
                  <td> 
		  	<?=$show[firstname] . " " . $show[middlename] . " " . $show[lastname];?>
                  </td>
                  <td> <div align="center"> 
                      <?
				if ($show[gender]=="Male") {
					echo "<img src=\"../images/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
				}
				else if ($show[gender]=="Female"){
					echo "<img src=\"../images/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
				} 
			?>
                    </div></td>
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
                  <td>
                    <?
				if (empty($show[last_login])) { 
					echo "Not Logged in Yet.";
				} 
				else { 
					echo "$show[last_login]";
				} 
					?> 
                  </td>
                  <td width="17"> <div align="center"> 
                      <?
				echo "<a href=\"?AdminPageID=Members&View=Members_Profile&id=$show[id]\"><img src=\"../images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" alt=\"View Profile of $show[firstname] $show[middlename] $show[lastname]\"></a>";
			?>
                    </div></td>
                  <td width="17"> 
                    <?
			if ($_SESSION["valid_user"] == "admin") {
			echo "<center><a href=\"?AdminPageID=Users&New=Modify_User_Profile&id=".$show[id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[firstname] $show[middlename] $show[lastname]\"></a></center>";
			}

			else if ($id == $_SESSION["valid_id"]) {
			echo "<center><a href=\"?AdminPageID=Option&Opt=Modify_My_Profile&id=".$_SESSION["valid_id"]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit your Profile?\"></a></center>";			
			}
			else {
			echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Modify profile of ($show[firstname] $show[middlename] $show[lastname]). Please contact your Administrator.')\"><img src='../images/icons/ico_edit.gif' border='0'></a></center>";			
			}
			?>
                  </td>
                  <td width="27"> 
                    <?
			if ($_SESSION["valid_user"] == "admin") {
				if ($_SESSION["valid_user"] == "admin" && $show["privilege"] == "Administrator") {
					echo "<center><img src='../images/icons/ico_delete.gif' border='0' title=\"You Can't Kill Yourself ($show[firstname] $show[middlename] $show[lastname])\"></center>";
				}
				else {
					echo "<center><a href=\"?AdminPageID=Users&New=RegisterENF&UserDel=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete this User')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[firstname] $show[middlename] $show[lastname])\"></a></center>";
				}
			}
			else if ($id == $_SESSION["valid_id"]) {
			echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to kill yourself. Please contact your Administrator.')\"><img src='../images/icons/ico_delete.gif' border='0'></a></center>";			
			}
			else {
			echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Delete ($show[firstname] $show[middlename] $show[lastname]). Please contact your Administrator.')\"><img src='../images/icons/ico_delete.gif' border='0'></a></center>";			
			}
		?>
                  </td>
                </tr>
                <?			
				} 
		  ?>
                <tr> 
                  <td colspan="9"> 
                    <?
		$q = "SELECT count(*) as count FROM tbl_admin";
		$r = mysql_query($q);
		$row = mysql_fetch_array($r);
		$numrows = $row['count'];
	?>
                    <table width="600" border="0" align="center" cellpadding="3" cellspacing="1" class="text">
                      <tr> 
                        <td width="300" align="left"> 
                          <?
		if($start > 0)
			echo "<a href=\"" . $PHP_SELF . "?pageID=Teacher&&Teacher_Profile&&start=" . ($start - 50) . "\"><img src='../images/icons/ico_prev.gif' border='0' title=\"Previous\"></a>";
	?>
                        </td>
                        <td width="300" align="right"> 
                          <?
		if($numrows > ($start + 50))
			echo "<a href=\"" . $PHP_SELF . "?pageID=Teacher&&Teacher_Profile&&start=" . ($start + 50) . "\"><img src='../images/icons/ico_next.gif' border='0' title=\"Next\"></a>";	
	?>
                        </td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <br>
              <? } //end of (echo - Student's List) & else?>
            </td>
          </tr>
          <tr> 
            <td> <table width="751" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
                <tr class="text"> 
                  <td width="19"><img src="../images/icons/ico_detail.gif" width="19" height="19"></td>
                  <td width="141">View Profile</td>
                  <td width="19"><img src="../images/icons/ico_delete.gif" width="19" height="19"></td>
                  <td width="315">Delete Record</td>
                  <td width="227" colspan="2" rowspan="2">&nbsp;</td>
                </tr>
                <tr class="text"> 
                  <td valign="top"><img src="../images/icons/ico_edit.gif" width="19" height="19"></td>
                  <td valign="top">Edit (Modify) Profile</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table>
        <br>
      </div></td>
  </tr>
</table>