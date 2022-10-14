<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
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
	//get current user
	$strUserID	=	$_SESSION["valid_user"];

	include ("../include/db.php");
	$query = "SELECT * FROM tbl_message WHERE to_member = '$strUserID' order by from_member DESC";
	$result = mysql_query($query) or die(mysql_error());
	$num = mysql_num_rows($result);
	
	if ($num == 0) {
	?>
	<table width="100%" border="0" cellspacing="1" cellpadding="3">
	  <tr> 
		<td width="31%" height="23" valign="top" class="text">There are no messages...</td>
		<td width="69%" valign="top" class="text"><div align="right"><img src="../images/icons/compose.gif" width="16" height="16" align="absmiddle">&nbsp;<a href="member.php?MemberPageID=Compose">Compose 
			New Message</a> </div></td>
	  </tr>
	</table>
	<?
	}
	else {
		if ($num == 1) {
			$Total = "<span class=\"text\">Total message $num</span>";	
		}
		else {
			$Total = "<span class=\"text\">Total messages $num</span>";
		}
	?>
	<table width="100%" border="0" cellspacing="1" cellpadding="3">
	  <tr> 
		<td width="31%" height="23" valign="top" class="text"><?=$Total;?></td>
		<td width="69%" valign="top" class="text"><div align="right"><img src="../images/icons/compose.gif" width="16" height="16" align="absmiddle">&nbsp;<a href="member.php?MemberPageID=Compose">Compose 
			New Message</a> </div></td>
	  </tr>
	  <tr> 
		<td colspan="2"><!-- <hr size="1" color="#EEEFF9">  -->
		  <?php
			echo "<form name='frm_msgs' method='POST' action='?MemberPageID=Remove_Message'>\n";
			echo "
			  <table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" class=\"text\">
				<tr> 
				  <td width=\"15\" background=\"../manage/images/bks/button1_fill.gif\"><div align=\"center\"><img src=\"".$Images."/icons/new_mail.gif\" width=\"14\" height=\"11\" alt=\"New Message(s)\"></div></td>
				  <td width=\"15\" background=\"../manage/images/bks/button1_fill.gif\"><div align=\"center\"><img src=\"".$Images."/icons/attach.gif\" width=\"13\" height=\"12\" alt=\"Attachment(s)\"></div></td>
				  <td width=\"10\" background=\"../manage/images/bks/button1_fill.gif\"><div align=\"center\"> 
					  <input name='main_checkbox' type='checkbox' value='' class='small' onclick=\"setCheckboxes( 'frm_msgs', true ); return false;\">
					</div></td>
				  <td width=\"70\" background=\"../manage/images/bks/button1_fill.gif\">From ^</td>
				  <td width=\"310\" background=\"../manage/images/bks/button1_fill.gif\">Subject</td>
				  <td width=\"80\" background=\"../manage/images/bks/button1_fill.gif\">Date</td>
				</tr>";
				$unread = 0;
			while ($show = mysql_fetch_array($result)) {
				if ($show[msg_checked]==0) { // show total number of unread message(s)
					$unread++;
				}
				if ($show[msg_checked]==0) { // Show color table row for new mesage(s)
					echo "<tr class=\"FF\">";
				}
				else { // show normal table row for read mesage(s)
				  echo "<tr class=\"EE\">";
				}
			echo"<td align=\"center\">";
				if ($show[msg_checked]==0) { // if unread/new mesage(s) then Icon is close Envelope
					echo "<img src=\"".$Images."/icons/new_mail.gif\" width=\"14\" height=\"11\" alt=\"New Message\">";
				}
				else { // Icon for read mesage(s)
					echo "<img src=\"".$Images."/icons/read.gif\" width=\"15\" height=\"12\" alt=\"Read Message\">";
					}
			echo "</td>
				  <td align=\"center\">"; 
				if (empty($show[attachment])) { // if no attachment then no Icon
					echo "&nbsp;";
				}
				else { // Attachment Icon if exist
					echo "<img src=\"".$Images."/icons/attach.gif\" width=\"13\" height=\"12\" alt=\"Attachment\">";
				}
					
			echo "</td>
				  <td align=\"center\"><input name='MsgID[]' type='checkbox' value='".$show[id]."' class='small'> 
				  </td>
				  <td>";
				 if ($show[msg_checked]==0) { // if unread/new mesage(s) then bold sender's name
					echo "<strong>$show[from_member]</strong>";
				 }
				 else { // if mesage(s) read then unbold sender's name
					echo "$show[from_member]";
				 }
			echo "</td>
				  <td>";
				  $r= mysql_query("select firstname,middlename,lastname from tbl_members where username='$show[from_member]'");
				  $GetName = mysql_fetch_array($r);
				  if (empty($show[subject])) {
				  	echo "<a href=\"?MemberPageID=ViewMsg&id=$show[id]\" title=\"No Subject, from: $GetName[firstname] $GetName[middlename] $GetName[lastname]\">No Subject!</a>";
				  }
				  else {
				  	echo "<a href=\"?MemberPageID=ViewMsg&id=$show[id]\" title=\"$show[subject], from: $GetName[firstname] $GetName[middlename] $GetName[lastname]\">".stripslashes($show[subject])."</a>";
				  }
			echo "</td>
				  <td>"
					 . date("M d, Y",$show[rec_date]). "
				  </td>
				</tr>";
				
			} // End of while...
			echo "</table>";
			echo "<table width=\"500\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" class=\"text\">
				<tr> 
				  <td background=\"../manage/images/bks/button1_fill.gif\" height=\"23\"><input name=\"imageField\" type=\"image\" src=\"".$Images."/icons/delete.gif\" width=\"11\" height=\"12\" border=\"0\" alt= \"Delete Message(s)\" onClick=\"return confirm('Remove selected message(s)?');\">&nbsp;|&nbsp;<span class=\"text\">Unread [$unread]</span>&nbsp;|&nbsp;<A onclick=\"setCheckboxes( 'frm_msgs', true ); return false;\" href=\"javascript:%20void(0);\">Check all</A> / <A onclick=\"setCheckboxes( 'frm_msgs', false ); return false;\" href=\"javascript:%20void(0);\">Uncheck all</A>&nbsp;</td>
				</tr>
				</table>";
			echo "</form>";
			?>
		</td>
	  </tr>
	</table>
<?
	} // End of Else...
?>