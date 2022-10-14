<?
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_notice WHERE id='".$_GET['id']."'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
?>
<title><? echo "$show[headlines]";?></title>
<?
	echo "<link href=\"../include/bcis.css\" rel=\"stylesheet\" type=\"text/css\">";
	echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" class=\"table\">"
		."  <tr>"
		."    <td width=\"18%\" class=\"text\">Headline</td>"
		."    <td width=\"2%\" class=\"text\">:</td>"
		."    <td width=\"80%\" class=\"text\">$show[headlines]</td>"
		."  </tr>"
		."  <tr class=\"EE\">"
		."	  <td class=\"text\">Submitted Date</td>"
		."    <td class=\"text\">:</td>"
		."	  <td class=\"text\">$show[submitted_on]</td>"
		."  </tr>"
		."	<tr class=\"EE\">"
		."	  <td colspan=\"3\" class=\"text1\">";
				$DetailContents = stripslashes($show[contents]);
				echo "$DetailContents
		<br><br></td>"
		."  </tr>"
		."</table>";
?>