<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
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
	if(!isset($start)) $start = 0;
	//if($_SESSION["valid_user"] == "admin")
	$query = "SELECT * FROM tbl_members, tbl_staffs WHERE auth_user <> 'Student' AND tbl_members.id=tbl_staffs.id order by firstname ASC LIMIT " . $start . ", 50";
	$result = mysql_query($query);
	$count 	= mysql_num_rows($result);
		
	//$num = mysql_num_rows($result);
	$finish = $start+$count;
	$first = $start+1;
	
?>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td class="title"><img src="../images/icons/users.gif" width="13" height="16" align="absmiddle"> 
      Staff's Profile 
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
                  <td width="372"><? echo "<span class=\"title\"><strong>Total Staff(s) : $count</strong></span>";?> 
                  </td>
                  <td width="367"><div align="right">
				  <?
				  	if ($_SESSION["valid_user"] == "admin") {
						echo "<a href=\"?AdminPageID=Registration\">Register Student/Staff!</a>";
					}
				  ?>
                  </div></td>
                </tr>
              </table>
              <br> 
              <?
			  	if ($New == "RegStd" || $New == "RegStfProfile" || $New == "RegisterENF" || $New == "ModStfProfile") {
					include $New . ".php";
				}
				else if ($View == "StfProfile") {
					include $View . ".php";
				}
				else if ($Upload == "upload_photo" || $Upload == "upload_enf") {
					include $Upload . ".php";
				}
				else {
					if ($count == 0) {
						echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> No Staff has been added yet...</span>";
					}
					else {
						echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> Showing: $first - $finish of $count</span>";
					}
				?>
            </td>
          </tr>
          <tr> 
            <td> 
              <table width="750" border="0" align="center" cellpadding="2" cellspacing="0" class="table">
                <tr class="text"> 
                  <td width="90" height="25" bgcolor="#ECECEC"><strong>Username</strong></td>
                  <td width="160" height="25" bgcolor="#ECECEC"><strong>Name</strong></td>
                  <td width="55" height="25" bgcolor="#ECECEC"><div align="center"><strong>Gender</strong></div></td>
                  <td width="89" height="25" bgcolor="#ECECEC"><strong>Designation</strong></td>
                  <td width="89" bgcolor="#ECECEC"><strong>Department</strong></td>
                  <td width="210" bgcolor="#ECECEC"><strong>Last Login</strong></td>
                  <td width="57" colspan="3" bgcolor="#ECECEC">&nbsp;</td>
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
                  <td>&nbsp;<?=$show[username];?></td>
                  <td><?=$show[firstname] . " " . $show[middlename] . " " . $show[lastname];?></td>
                  <td><div align="center"> 
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
				  	if (empty($show[designation])) {
						echo "-";
					}
					else {
						echo $show[designation];
					}
				  ?>
				  </td>
                  <td><?=$show[auth_user];?></td>
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
                  <td width="19"><div align="center">
				  <?
					echo "<a href=\"?AdminPageID=Staffs&View=StfProfile&id=$show[id]\"><img src=\"../images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" alt=\"View Profile of $show[firstname] $show[middlename] $show[lastname]\"></a>";
				  ?>
                  </div></td>
                  <td width="19">
				  <?
					if ($_SESSION["valid_user"] == "admin") {
						echo "<center><a href=\"?AdminPageID=Staffs&New=ModStfProfile&id=".$show[id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[firstname] $show[middlename] $show[lastname]\"></a></center>";
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Modify profile of ($show[firstname] $show[middlename] $show[lastname]). Please contact your Administrator.')\"><img src='../images/icons/ico_edit.gif' border='0'></a></center>";			
					}
				  ?>
				  </td>
                  <td width="19"> 
                  <?
				  	if ($_SESSION["valid_user"] == "admin") {
						echo "<center><a href=\"?AdminPageID=Staffs&New=RegisterENF&Staff=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete this User')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[firstname] $show[middlename] $show[lastname])\"></a></center>";
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Delete ($show[firstname] $show[middlename] $show[lastname]).\\n Please contact your Administrator.')\"><img src='../images/icons/ico_delete.gif' border='0'></a></center>";			
					}
				  ?>
				  </td>
                </tr>
                <?			
				} //end of while
		  		?>
                <tr> 
                  <td colspan="10"> 
                  <?
					$q = "SELECT count(*) as count FROM tbl_members where auth_user = 'Student'";
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
                    </table>
				  </td>
                </tr>
              </table>
              <br>
              <? } //end of else?>
            </td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>