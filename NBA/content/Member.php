<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: index.php");
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
	include ("include/db.php");
	if(!isset($start)) $start = 0;

	if($_SESSION["valid_user"] == "admin" ||  $_SESSION["valid_user"] == "ADMIN")
	
	$query = "SELECT * FROM tbl_member order by fname ASC LIMIT " . $start . ", 50";
	
	$result = mysql_query($query);
	$count 	= mysql_num_rows($result);
		
	//$num = mysql_num_rows($result);
	$finish = $start+$count;
	$first = $start+1;
	
?>




<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td class="title"><img src="images/icons/users.gif" width="13" height="16" align="absmiddle"> 
      Member's Profile 
        <hr size="1"></hr>
      <br>
    </td>
  </tr>
  <tr> 
    <td> <div align="center">
        <table width="765" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr> 
            <td><table width="751" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
                <tr> 
                  <td width="372" ><? echo "<span ><strong>Total Member(s) : $count</strong></span>";?> 
                  </td>
                  <td width="367"><div align="right">
				  <?
				  	if ($_SESSION["valid_user"] == "admin" ||  $_SESSION["valid_user"] == "ADMIN") {
						echo "<a href=\"?AdminPageID=Member&Edit=New\">Register New Member!</a>";
					}
				  ?>
                  </div></td>
                </tr>
              </table>
              <br> 
              <?
			  if($Edit == "New"){
			  include $Edit . "member.php";
			  }
			  else if($Edit == "NewMemberEnf")
				{
				
					include $Edit.".php";
				}
				else if($View == "Member")
				{
				include $View."view.php";
				}
			  	/*if ($New == "RegStd" || $New == "RegStdProfile" || $New == "RegisterENF" || $New == "ModStdProfile") {
					include $New . ".php";
				}
				else if ($View == "StdProfile") {
					include $View . ".php";
				}
				else if ($Upload == "upload_photo" || $Upload == "upload_enf") {
					include $Upload . ".php";
				}
				else {
					if ($count == 0) {
						echo "&nbsp;&nbsp;<span class=\"title\"><strong>::</strong> No Member has been added yet...</span>";
					}*/
					else {
						echo "&nbsp;&nbsp;<span ><strong>::</strong> Showing: $first - $finish of $count <br><br></span>";
					
				?>
            </td>
          </tr>
          <tr> 
            <td> 
              <table width="750" border="0" align="center" cellpadding="2" cellspacing="0" class="table">
                <tr class="text"> 
                  <td width="190" height="25" bgcolor="#ECECEC"><div align="left"><strong>Name|</strong></div></td>
                  <td width="53" height="25" bgcolor="#ECECEC"><div align="left"><strong>Gender|</strong></div></td>
                  <td width="196" height="25" bgcolor="#ECECEC"><div align="left"><strong>Firm Name| </strong></div></td>
                  <td width="83" bgcolor="#ECECEC"><div align="left"><strong>Designation|</strong></div></td>
                  <td width="134" bgcolor="#ECECEC"><div align="left"><strong>Member No </strong></div></td>
                  <td colspan="3" bgcolor="#ECECEC"><div align="left"></div></td>
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
					
					$id = $show["tbl_memberid"];
				?>
                <tr  <? echo "bgcolor=$color";?> class="EE"> 
                  <td>&nbsp;<?=$show[fname]." ".$show[mname]." ".$show[lname];?>
                    <div align="justify"></div></td>
                  <td>                    <?
				  	if ($show[sex]=="Male") {
					
						echo "<img src=\"images/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
					}
					else if ($show[sex]=="Female"){
						echo "<img src=\"images/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
					} 
				  ?>
                    <div align="justify"></div></td>
                  <td><?=$show[firmname];?> 
                    <div align="justify"></div></td>
                  <td><?=$show[designation];?>&nbsp;
                    <div align="justify"></div></td>
                  <td><?=$show[memno];?>&nbsp;
				    <div align="justify"></div></td>
                  <td width="19">				    <?
					echo "<a href=\"?AdminPageID=Member&View=Member&id=$show[idtbl_member]\"><img src=\"images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" title=\"View Profile of $show[fname] $show[mname] $show[lname]\"></a>";
				  ?>
                    <div align="justify"></div></td>
                  <td width="20">
				  <?
					if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "ADMIN") {
						echo "<center><a href=\"?AdminPageID=Students&New=ModStdProfile&id=".$show[id]."\"><img src='images/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[fname] $show[mname] $show[lname]\"></a></center>";
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Modify profile of ($show[fname] $show[mname] $show[lame]). Please contact your Administrator.')\"><img src='images/icons/ico_edit.gif' border='0'></a></center>";			
					}
				  ?>
				  <div align="justify"></div></td>
                  <td width="23"> 
                  <?
				  	if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "ADMIN") {
						echo "<center><a href=\"?AdminPageID=Member&Edit=NewMemberEnf&mem=Delete&id=".$show[idtbl_member]."\" onclick=\"return confirm('Are you sure to delete this User')\"><img src='images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[fname] $show[mname] $show[lname])\"></a></center>";
					
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Delete ($show[fname] $show[mname] $show[lname]). Please contact your Administrator.')\"><img src='images/icons/ico_delete.gif' border='0'></a></center>";			
					}
				  ?>
				  <div align="justify"></div></td>
                </tr>
                <?			
				} //end of while
		  		?>
                <tr> 
                  <td colspan="9"> 
                  <?
					$q = "SELECT count(*) as count FROM tbl_member";
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

