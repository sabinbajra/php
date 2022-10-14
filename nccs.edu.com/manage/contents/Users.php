<?php
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
<?php
	// Gives total number of members...
	include ("../include/db.php");
	if ($_SESSION["valid_user"] == "admin") {	
		$QUser = "SELECT * FROM tbl_admin";
		$RUser = mysql_query($QUser);
		$count = mysql_num_rows($RUser);
	}
	else {
		$QUser = "SELECT * FROM tbl_admin WHERE id <> '1'";
		$RUser = mysql_query($QUser);
		$count = mysql_num_rows($RUser);
	}
?>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td class="title"><img src="../images/icons/users.gif" width="13" height="16" align="absmiddle"> 
      User's Profile 
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
                  <td width="372"><? echo "<span class=\"title\"><strong>Total User(s) : $count</strong></span>";?> 
                  </td>
                  <td width="367"><div align="right"> 
                  	<?php
						if ($_SESSION["valid_user"] == "admin") {
			  				echo "<a href=\"?AdminPageID=Users&New=RegAdminUser\">Register Admin User</a>";
		  				}
					?>
                  </div></td>
                </tr>
              </table>
              <br> 
              	<?php
					if($_SESSION["valid_user"] == "admin") {
						$query = "SELECT * FROM tbl_admin order by firstname ASC";
						$result = mysql_query($query);
					}
					else {
						$query = "SELECT * FROM tbl_admin where id <> '1' order by firstname ASC";
						$result = mysql_query($query);	
					}
					if ($New == "RegAdminUser" || $New == "Reg_User_Profile" || $New == "RegisterENF" || $New == "Modify_User_Profile") {
						include $New . ".php";
					}
					else if ($View == "Users_Profile") {
						include $View . ".php";
					}
					else if ($Upload == "upload_photo" || $Upload == "upload_enf")
						include $Upload . ".php";
					else {				
				?>
            </td>
          </tr>
          <tr> 
            <td> 
              <table width="750" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
                <tr class="text"> 
                  <td width="165" height="25" bgcolor="#ECECEC"><strong>&nbsp;Name</strong></td>
                  <td width="60" height="25" bgcolor="#ECECEC"><div align="center"><strong>Gender</strong></div></td>
                  <td width="80" height="25" bgcolor="#ECECEC"><strong>Privilege</strong></td>
                  <td width="200" height="25" bgcolor="#ECECEC"><strong>E-mail</strong></td>
                  <td width="180" bgcolor="#ECECEC"><strong>Last Login</strong></td>
                  <td width="65" colspan="3" bgcolor="#ECECEC">&nbsp;</td>
                </tr>
                <?php
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
                  <td class="pointer" title="Username: <?=$show["username"]?>">&nbsp; 
                    <?php
						if ($show["privilege"] == "Administrator") {
							echo "<b>";
						}
		  			
						echo $show[firstname] . " " . $show[middlename] . " " . $show[lastname];

						if ($show["privilege"] == "Administrator") {
							echo "<font color=\"#FF0000\">*</font></b>";
						}
				  	?>
                  </td>
                  <td> <div align="center"> 
                  	<?php
						if ($show[gender]=="Male") {
							echo "<img src=\"../images/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
						}
						else if ($show[gender]=="Female"){
							echo "<img src=\"../images/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
						} 
					?>
                    </div></td>
                  <td> 
                    <?php
						if (empty($show[privilege])) { 
							echo "None";
						} 
						else { 
							echo "$show[privilege]";
						} 
					?>
                  </td>
                  <td> 
                    <?php
						if (empty($show[email])) { 
							echo "None";
						} 
						else { 
							echo "<a href=\"mailto:$show[email]\" class=\"slink\">$show[email]</a>";
						} 
					?>
                  </td>
                  <td>
                    <?php
						if (empty($show[last_login])) { 
							echo "Not Logged in Yet.";
						} 
						else { 
							echo "$show[last_login]";
						} 
					?> 
                  </td>
                  <td width="17"> <div align="center"> 
                  	<?php
						echo "<a href=\"?AdminPageID=Users&View=Users_Profile&id=$show[id]\"><img src=\"../images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" alt=\"View Profile of $show[firstname] $show[middlename] $show[lastname]\"></a>";
					?>
                    </div></td>
                  <td width="17"> 
                    <?php
						if ($_SESSION["valid_user"] == "admin") {
						echo "<center><a href=\"?AdminPageID=Users&New=Modify_User_Profile&id=".$show[id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[firstname] $show[middlename] $show[lastname]\"></a></center>";
						}
			
						else if ($_SESSION["valid_user"] != "admin" && $id == $_SESSION["valid_id"]) {
						echo "<center><a href=\"?AdminPageID=Option&Opt=Modify_My_Profile&id=".$_SESSION["valid_id"]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit your Profile?\"></a></center>";			
						}
						else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Modify profile of ($show[firstname] $show[middlename] $show[lastname]). Please contact your Administrator.')\"><img src='../images/icons/ico_edit.gif' border='0'></a></center>";			
						}
					?>
                  </td>
                  <td width="27"> 
                    <?php
						if (($_SESSION["valid_user"] == "admin" && $show["privilege"] == "Administrator") || ($_SESSION["valid_user"] == "admin" && $show["privilege"] == "Limited User")) {
							if ($show["username"] == "$_SESSION[valid_user]" && $show["privilege"] == "Administrator") {
								echo "<center><img src='../images/icons/ico_delete.gif' border='0' title=\"You Can't Kill Yourself ($show[firstname] $show[middlename] $show[lastname])\"></center>";
							}
							else {
								echo "<center><a href=\"?AdminPageID=Users&New=RegisterENF&UserDel=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete \'$show[privilege]\' $show[firstname]?')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[firstname] $show[middlename] $show[lastname])\"></a></center>";
							}
						}
						else if (isset($_SESSION["valid_id"])) {
							if ($id != $_SESSION["valid_id"] && $show["privilege"] != "Administrator") {
								echo "<center><a href=\"?AdminPageID=Users&New=RegisterENF&UserDel=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete \'$show[privilege]\' $show[firstname]?')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[firstname] $show[middlename] $show[lastname])\"></a></center>";
							}
							else if (($id == $_SESSION["valid_id"] && $show["privilege"] == "Administrator") || ($id == $_SESSION["valid_id"] && $show["privilege"] == "Limited User")) {
								echo "<center><a href=\"#\" onclick=\"alert('You don\'t have Permission to kill yourself. Please contact your Administrator.')\"><img src='../images/icons/ico_delete.gif' border='0'></a></center>";
							}
							else {
								echo "<center><a href=\"#\" onclick=\"alert('You don\'t have Permission to Delete ($show[firstname] $show[middlename] $show[lastname]). Please contact your Administrator.')\"><img src='../images/icons/ico_delete.gif' border='0'></a></center>";				
							}			
						}
						else {
						echo "<center><a href=\"#\" onclick=\"alert('You don\'t have Permission to Delete ($show[firstname] $show[middlename] $show[lastname]). Please contact your Administrator.')\"><img src='../images/icons/ico_delete.gif' border='0'></a></center>";			
						}
					?>
                  </td>
                </tr>
                <?php			
				} // End of While...
		  		?>
              </table>
              <br>
              <? } //end of else ?>
            </td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>