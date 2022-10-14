<?
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_events WHERE id='".$_GET['id']."'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
?>
<title><? echo "$show[date]";?></title>
<?
	echo "<link href=\"../include/bcis.css\" rel=\"stylesheet\" type=\"text/css\">";

	echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" class=\"table\">"
		."  <tr>"
		."    <td width=\"10%\" class=\"text\">Events On</td>"
		."    <td width=\"2%\" class=\"text\">:</td>"
		."    <td width=\"83%\" class=\"text\">$show[date]</td>"
		."  </tr>"
		."	<tr class=\"EE\">"
		."	  <td colspan=\"3\" class=\"text1\">$show[events]<br><br></td>"
		."  </tr>"
		."</table>";
?>