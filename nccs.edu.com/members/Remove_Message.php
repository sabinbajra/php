<?
	session_start();

	include("../include/db.php");
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	$MsgID = $_POST['MsgID'];
	//count selected messages
	$intTotal	=	count($MsgID);
	
	if ($intTotal == 0) {
		echo "<br><table width=\"80%\" cellpadding=\"2\" cellspacing=\"0\" border=\"0\" class=\"text\" align=\"center\">
				<tr>
				  <td><font color=\"#FF0000\"><strong>Error:</strong></font><br>You haven't select to Delete...<p align=\"center\"><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?MemberPageID=Inbox'\" class=\"text_box\"></p></td>
				</tr>
			  </table>";
	}
	else {	
		echo "<br><table width=\"80%\" cellpadding=\"2\" cellspacing=\"0\" border=\"0\" class=\"text\" align=\"center\">
				<tr>
				  <td width=\"20%\" background=\"../manage/images/bks/button1_fill.gif\">From</td>
				  <td width=\"80\" background=\"../manage/images/bks/button1_fill.gif\">Subject</td>
				</tr>";
		
		for($i=0; $i<=$intTotal-1; $i++)
			{
				$MID	=	$MsgID[$i];
				
				//first remove picture
				$strSql		=	"SELECT attachment FROM tbl_message WHERE id='$MID'";
				$dbSql		=	mysql_query($strSql);
				$Att_File	=	mysql_result($dbSql,0,0);
				
				//now remove att. file
				@unlink("../contents/msg_attach/".$Att_File);
				
				//first remove picture
				$str_Sql	=	"SELECT from_member, subject FROM tbl_message WHERE id='$MID'";
				$db_Sql		=	mysql_query($str_Sql);
				$rev		=	mysql_fetch_array($db_Sql);
				
				echo "<tr class=\"EE\"><td>&nbsp;<img src=\"../images/icons/pin_blue.gif\" width=\"4\" height=\"4\" align=\"absmiddle\">&nbsp;<strike>$rev[from_member]</strike></td><td><strike>$rev[subject]</strike></td></tr>";
				
				$strSql	=	"DELETE FROM tbl_message WHERE id='$MID'";
				$dbSql	=	mysql_query($strSql);
			}//end of for loop
		echo "</table>
			  <table width=\"80%\" cellpadding=\"2\" cellspacing=\"0\" border=\"0\" class=\"text\" align=\"center\">
				<tr>
				  <td width=\"50%\" background=\"../manage/images/bks/button1_fill.gif\">&nbsp;Message(s) Deleted: [$i]</td>
				  <td width=\"50%\" background=\"../manage/images/bks/button1_fill.gif\"><div align=\"right\"><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?MemberPageID=Inbox'\" class=\"text_box\">&nbsp;</div></td>
				</tr>
			  </table><br>";
	}
	
	//redirect
	//echo "<meta http-equiv=\"refresh\" content=\"0; URL=?MemberPageID=Inbox\">";

?>