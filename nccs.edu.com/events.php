<?php
	include ("include/db.php");
	$queryEvents = "SELECT * from tbl_events ORDER BY date DESC LIMIT 5";
	$runEvents = mysql_query($queryEvents);

	echo " 
		<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"#A7A1C7\" class=\"login_sm_text\">";
		while ($show = mysql_fetch_array($runEvents)) {
		echo "
		  <tr bgcolor=\"#D8D6E7\" class=\"AA\">
			<td width=\"5%\" valign=\"top\">&nbsp;<img src=\"". $Images . "icons/pin.gif\" width=\"4\" height=\"4\"></td>
			<td width=\"95%\">
				  [<strong>$show[date]</strong>]<br>";
					$len = strlen($show[events]);
					if ($len >= 30) {
						$News	=	stripslashes($show[events]);
						echo substr($News,0,30) . "...<br>";
						echo "<div align=\"right\"><a href=\"#\" onClick=\"MM_openBrWindow('" . $AppConts . "ViewEvents.php?id=$show[id]','Events','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">more</a> »</div>";
					}
					else {
						echo "$show[events]...<br>";
						echo "<div align=\"right\"><a href=\"#\" onClick=\"MM_openBrWindow('" . $AppConts . "ViewEvents.php?id=$show[id]','Events','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">more</a> »</div>";						
					}
				  echo" 
			</td>
		  </tr>";
		}
	echo"</table>";
?>