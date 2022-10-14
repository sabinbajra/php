<?php
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	//get current user
	$strUserID	=	$_SESSION["valid_user"];

	include ("../include/db.php");
	// To display the name of a member...
	$MemberQuery = "SELECT * FROM tbl_members WHERE id=" . $_SESSION["valid_id"];
	$MemberResult = mysql_query($MemberQuery) or die(mysql_error());
	$MemberShow = mysql_fetch_array($MemberResult);
	
	$MsgQuery = "SELECT * FROM tbl_message WHERE to_member = '$strUserID' order by id DESC";
	$MsgResult = mysql_query($MsgQuery) or die(mysql_error());
	$num = mysql_num_rows($MsgResult);

	// Find total number of new message(s)
	$query_run = "SELECT * FROM tbl_message WHERE to_member = '$strUserID'";
	$result_run = mysql_query($query_run) or die(mysql_error());	
	$unread = 0;
	while ($new = mysql_fetch_array($result_run)) {
		if ($new[msg_checked]==0) {
			$unread++;
		}
	}
?>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<table width="510" border="0" cellspacing="0" cellpadding="0" class="small">
  <tr> 
    <td height="22" colspan="2" valign="top" class="title">
      <table width="510" cellspacing="0" cellpadding="0">
        <tr> 
          <td colspan="2" class="title">Welcome: <? echo $MemberShow["firstname"]." ".$MemberShow["middlename"]." ".$MemberShow["lastname"];?></td>         
        </tr>
        <tr class="EE">
		  <td width="340" bgcolor="#FDFFD7" class="text">
<?php
  		 if (empty($log_show[last_login])) {
			echo "&nbsp;You are logged in 1st time to this section...</div>";
		 }
		 else {
			echo "&nbsp;<strong>Last Login</strong>:&nbsp;". $log_show[last_login];			
		 }
		 ?>	
		  </td>
		  <td width="168" bgcolor="#FDFFD7" align="right">
		  <?
		  	if ($unread == 0) {
				echo "&nbsp;";
			}
			else {
				echo "<a href=\"?MemberPageID=Inbox\" class=\"small_lk\">New Message(s)</a>: [$unread]&nbsp;";
			}	  
		  ?>
		  </td>
        </tr>
        <tr class="EE"> 
          <td colspan="2"><img src="../images/spacer.gif"></td>
        </tr>
        <tr> 
          <td height="10" colspan="2"><img src="../images/spacer.gif"></td>
        </tr>
      </table> </td>
  </tr>
</table>

<? 
	if ($_SESSION["valid_auth"] == "Library") {
include "../contents/news_articles.php";
	}else
		include"../contents/news_articles.php";
?> 
<p>
<!-- Spry Assets -->
<script language="javascript" src="../include/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../include/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
  <?
  	if ($_SESSION["valid_auth"] == "Library") {
		echo "<li class=\"TabbedPanelsTab\" tabindex=\"0\"><img src=\"../images/icons/articles.GIF\" width=\"10\" height=\"11\" align=\"absmiddle\" />&nbsp;New Books</li>";
		echo "<li class=\"TabbedPanelsTab\" tabindex=\"0\"><img src=\"../images/icons/articles.GIF\" width=\"10\" height=\"11\" align=\"absmiddle\" />&nbsp;Grade 11</li>";
		echo "<li class=\"TabbedPanelsTab\" tabindex=\"0\"><img src=\"../images/icons/articles.GIF\" width=\"10\" height=\"11\" align=\"absmiddle\" />&nbsp;Grade 12</li>";
		echo "<li class=\"TabbedPanelsTab\" tabindex=\"0\"><img src=\"../images/icons/_i.gif\" width=\"14\" height=\"10\" align=\"absmiddle\" />&nbsp;Issue</li>";
		echo "<li class=\"TabbedPanelsTab\" tabindex=\"0\"><img src=\"../images/icons/_r.gif\" width=\"14\" height=\"10\" align=\"absmiddle\" />&nbsp;Receipt</li>";
	}
	if ($_SESSION["valid_auth"] == "Student") {
		echo "<li class=\"TabbedPanelsTab\" tabindex=\"0\">Notes</li>";
		echo "<li class=\"TabbedPanelsTab\" tabindex=\"0\">Result</li>";
		echo "<li class=\"TabbedPanelsTab\" tabindex=\"0\">Book of 11</li>";
		echo "<li class=\"TabbedPanelsTab\" tabindex=\"0\">Book of 12</li>";

	}
  ?>
  </ul>
  <div class="TabbedPanelsContentGroup">
  <?
  	if ($_SESSION["valid_auth"] == "Library") {
		//New Books
			echo "<div class=\"TabbedPanelsContent\">&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"text\"><strong>New Books</strong></span>";
		include "../contents/BookNewList.php";
		echo"</div>";
		echo "<div class=\"TabbedPanelsContent\">&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"text\"><strong>Book of Grade 11</strong></span>";
		include "../contents/grade11.php";
		echo "</div>";
		echo "<div class=\"TabbedPanelsContent\">&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"text\"><strong>Book of Grade 11</strong></span>";
		include "../contents/grade12.php";
		echo "</div>";
		//Issue Books
		echo "<div class=\"TabbedPanelsContent\">&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"text\"><strong>Issue Book</strong></span>";
		include "../contents/BookIssue.php";
		echo "</div>";
		//Receipt Books
		echo "<div class=\"TabbedPanelsContent\">&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"text\"><strong>Receipt Book</strong></span>";
		include "../contents/BookReceipt.php";
		echo "</div>";
	}
	if ($_SESSION["valid_auth"] == "Student") {
		echo "<div class=\"TabbedPanelsContent\">";
		include "../contents/Note.php";
		echo "</div><div class=\"TabbedPanelsContent\">";
		include "../contents/RsltPubUnPub.php";
		echo "</div><div class=\"TabbedPanelsContent\">";
		include "../contents/grade11.php";
		echo "</div><div class=\"TabbedPanelsContent\">";
		include "../contents/grade12.php";
		echo"</div>";
			
	}
	
  ?>   
    
  </div>
</div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
