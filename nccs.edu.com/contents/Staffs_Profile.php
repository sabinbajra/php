<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
?> 
<SCRIPT language=javascript src="../include/check_uncheck.js" type=text/javascript></SCRIPT>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<?php

	include ("../include/db.php");
	if(!isset($start)) $start = 0;
	$query = "SELECT * FROM tbl_members, tbl_staffs WHERE tbl_members.id = tbl_staffs.id AND username <> '".$_SESSION["valid_user"]."' order by username ASC LIMIT " . $start . ", 50";
	$result = mysql_query($query);
		
	// Gives total number of members...
	$qu = "SELECT * FROM tbl_staffs";
	$re = mysql_query($qu);
	$count = mysql_num_rows($re);
	
	$num = mysql_num_rows($result);
	$finish = $start+$num;
	$first = $start+1;
	
	if ($num == 0) {
		echo "<span class=\"text\">&nbsp;No staffs added</span>";
	}
	else {
		if ($num == 1) {
			$Total =  "<span class=\"text\">&nbsp;No. of staff: $first - $finish of $count</span>";	
		}
		else {
			$Total =  "<span class=\"text\">&nbsp;No. of staffs: $first - $finish of $count</span>";
		}
	}
?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr> 
		<td width="50%" class="text"><?=$Total;?></td>
		<td width="50%" valign="top">
          <form name="form1" method="post" action="?MemberPageID=Search_ENF&SearchCat=Staffs">
		  <div align="right">
          <input name="searchstring" type="text" class="text_box_sm" onFocus="if(this.value=='Search staffs')this.value='';" value="Search staffs" size="20" maxlength="20">
          <input name="imageField" type="image" src="../images/icons/search.gif" alt="Search Staff(s) with FirstName" align="middle" width="16" height="16" border="0">
		  </div>
		  </form>
		</td>
	  </tr>
	  <tr> 
        <td colspan="2">
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
				</div>
			  </td>
			</tr>
        	<?			
				} // End of While...
		  	?>
			<tr> 
			  <td colspan="6"> 
				<?
					$q = "SELECT count(*) as count FROM tbl_staffs";
					$r = mysql_query($q);
					$row = mysql_fetch_array($r);
					$numrows = $row['count'];
				?>
				<table width="490" border="0" align="center" cellpadding="2" cellspacing="0" class="text">
				  <tr> 
					<td width="245" align="left">&nbsp;&nbsp; 
					<?
					  	if($start > 0)
								echo "<a href=\"" . $PHP_SELF . "?MemberPageID=Members_Profile&start=" . ($start - 50) . "\"><img src='../images/icons/ico_prev.gif' border='0' title=\"Previous\"></a>";
					?>
					</td>
					<td width="245" align="right"> 
					<?
					  	if($numrows > ($start + 50))
				echo "<a href=\"" . $PHP_SELF . "?MemberPageID=Members_Profile&start=" . ($start + 50) . "\"><img src='../images/icons/ico_nxt.gif' border='0' title=\"Next\"></a>";
					?>
					&nbsp;&nbsp;</td>
				  </tr>
            	</table>
			  </td>
        	</tr>
      	  </table>
		</td>
	  </tr>
	</table>