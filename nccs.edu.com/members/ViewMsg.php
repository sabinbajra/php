<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
	include ("../include/db.php");

	$query = "SELECT * FROM tbl_message WHERE id = '".$_GET['id']."'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);	
	
	// Check Valid Member or Not...
	if ($show["to_member"] == $_SESSION["valid_user"]) {
		// if message is already been checked then show already checked...
		$MessageChecked = 1;
		$UpdateChkQuery	= "UPDATE tbl_message SET msg_checked = '$MessageChecked' WHERE id = '".$_GET['id']."'";
		$RunQueryUpdateChk = mysql_query($UpdateChkQuery);	
		
		$intTotal	=	mysql_num_rows($result);
		
		if($intTotal == 0)
			die("Message not found!");
			
		// Display Links
		echo "<br>";
		echo "<table width=\"510\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\">
			  <tr bgcolor=\"#e4eaf2\"> 
				<td colspan=\"3\" class=\"text\" background=\"../manage/images/bks/button1_fill.gif\"><img src=\"".$Images."icons/compose.gif\" width=\"16\" height=\"16\" align=\"absmiddle\"><a href='member.php?MemberPageID=Compose'>Compose</a> | <img src=\"".$Images."icons/rep.gif\" width=\"23\" height=\"22\" border=\"0\" align=\"absmiddle\"><a href=\"member.php?MemberPageID=Reply&id=$_GET[id]\">Reply</a></td>
			  </tr>
			  </table>
			  <table width=\"510\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
			  <tr bgcolor=\"#F5F8FA\"> 
				<td width=\"76\" class=\"text\">From</td>
				<td width=\"1\" class=\"text\">:</td>
				<td width=\"433\" class=\"text\">$show[from_member]</td>
			  </tr>
			  <tr bgcolor=\"#F5F8FA\"> 
				<td class=\"text\">To</td>
				<td class=\"text\">:</td>
				<td class=\"text\">$show[to_member]</td>
			  </tr>
			  <tr bgcolor=\"#F5F8FA\"> 
				<td class=\"text\">Received on</td>
				<td class=\"text\">:</td>
				<td class=\"text\">" .date("F j, Y, H:i:s A",$show[rec_date]) . "</td>
			  </tr>
			  <tr bgcolor=\"#F5F8FA\"> 
				<td class=\"text\">Subject</td>
				<td class=\"text\">:</td>
				<td class=\"text\">".stripslashes($show[subject])."</td>
			  </tr>";
				if (empty($show[attachment])) {
					echo "";
				} else {
					// Check for the size of file...
					$path = "../contents/msg_attach/";
					$size   = filesize($path . $show[attachment]);
					if($size >= 1024*1024) {
						$size=vsprintf("%1.2f Mb", $size/(1024*1024));
					}
					else if ($size >= 1024) {
						$size=vsprintf("%1.2f Kb",$size/1024);
					}
					else {
						$size = $size . " Bytes";
					}
					echo "
					  <tr bgcolor=\"#F5F8FA\"> 
						<td class=\"text\">Attachment</td>
						<td class=\"text\">:</td>
						<td class=\"text\">$show[attachment] [$size]</td>
					  </tr>";
				}				  
			echo"			  
			  <tr bgcolor=\"#F5F8FA\"> 
				<td colspan=\"3\" class=\"text\">
				  <hr size=\"1\" color=\"#c1cdd8\">
				  <table width=\"98%\" height=\"368\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"text\" align=\"center\" bgcolor=\"#000000\">
					<tr bgcolor=\"#FFFFFF\">
					  <td valign=\"top\">";
					  	$Message = stripslashes($show[message]);
						echo "$Message<p>";
						if (empty($show[attachment])) {
							echo "";
						} else {
							echo "<hr size=\"1\" color=\"#c1cdd8\">";
							echo "<img src='../contents/msg_attach/".$show[attachment]."'>";
						}				  
			echo"	  </td>
					</tr>
				  </table><br>
				</td>
			  </tr>
			</table>";
	}
	else {
		echo "<br><center><img src=\"../images/icons/ukn.gif\" width=\"16\" height=\"16\" align=\"absmiddle\"> <span class=\"text\">You don't have <font color=\"#FF0000\"><strong>Permission</strong></font> to open other's <font color=\"#FF0000\"><strong>Message</strong></font>...</span><p><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?MemberPageID=Inbox'\" class=\"text_box\"></center>";
	}
	
?>