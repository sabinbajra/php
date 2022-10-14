<?	
	session_start();
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_news_articles WHERE id='".$_GET['id']."'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
	if ($_SESSION["valid_privilege"] == "Administrator") {
		if ($_POST) {
			$AppQuery = mysql_query("UPDATE tbl_news_articles SET approved='".$_POST['app']."' WHERE id='".$_POST['id']."'");
			echo "<body onLoad='javascript:window.opener.location.reload(true); window.close();'>";
		}
		
		if ($show["approved"] == 0 || $show["approved"] == 2 || $show["approved"] == 3) {
		$AppTable = "<div align=\"right\"><table width=\"38\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
			."	<tr>"
			."	  <td bgcolor=\"#FCFCFC\" class=\"text\"><form action=\"$_SERVER[PHP_SELF]\" method=\"post\"><input type=\"hidden\" name=\"id\" value=\"$show[id]\"><input type=\"hidden\" name=\"app\" value=\"1\"><input name=\"approve\" type=\"image\" src=\"../images/icons/ico_unblock.gif\" align=\"middle\" alt=\"Approve News/Articles!\"></form></td>"
			."	  <td bgcolor=\"#FCFCFC\" class=\"text\"><form action=\"$_SERVER[PHP_SELF]\" method=\"post\"><input type=\"hidden\" name=\"id\" value=\"$show[id]\"><input type=\"hidden\" name=\"app\" value=\"3\"><input name=\"disapprove\" type=\"image\" src=\"../images/icons/ico_block.gif\" align=\"middle\" alt=\"Disapprove News/Articles!\"></form></td>"
			."	</tr>"
			."</table></div>";
		}
		else {
		$AppTable = "<form action=\"$_SERVER[PHP_SELF]\" method=\"post\"><div align=\"right\"><table width=\"19\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
			."	<input type=\"hidden\" name=\"id\" value=\"$show[id]\">"
			."	<input type=\"hidden\" name=\"app\" value=\"3\">"
			."	<tr>"
			."	  <td bgcolor=\"#FCFCFC\" class=\"text\"><input name=\"approve\" type=\"image\" src=\"../images/icons/ico_block.gif\" align=\"middle\" alt=\"Disapprove News/Articles!\"></td>"
			."	</tr>"
			."</table></div></form>";
		}
	}
?>
<title><? echo stripslashes($show[headlines]);?></title>
<link href="../include/bcis.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="3" class="table">
  <tr>
	<td width="18%" valign="top" class="text">Headline</td>
	<td width="2%" valign="top" class="text">:</td>
	<td width="100%" class="text"><?=stripslashes($show[headlines]);?></td>
    <td width="38" class="text"><?=$AppTable;?></td>
  </tr>
  <tr class="EE">
	<td class="text">Submitted By</td>
	<td class="text">:</td>
	<td colspan="2" class="text">
	<?
		if (empty($show[submitted_by])) {
			echo "-----";
		}
		else {
			echo "$show[submitted_by]";
		}
	?>
	</td>
  </tr>
  <tr class="EE">
	<td class="text">Submitted Date</td>
	<td class="text">:</td>
	<td colspan="2" class="text"><?=$show[submitted_on];?></td>
  </tr>
  <tr class="EE">
	<td colspan="4" class="text1">
	<?
		$DetailContents = stripslashes($show[contents]);
		echo "$DetailContents";
	?>
	<br><br></td>
  </tr>
</table>