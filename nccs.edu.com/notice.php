<?php
	include ("include/db.php");
	$queryNotice = "SELECT * from tbl_notice ORDER BY id DESC LIMIT 5";
	$runNotice = mysql_query($queryNotice);
	
	$ToTNoT = mysql_num_rows($runNotice);
	
	if ($ToTNoT == 0) {
		echo "<div align=\"center\"><br>No new notice!</div></br>";
	}

	echo " 
		<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"#A7A1C7\" class=\"login_sm_text\">";
		while ($show = mysql_fetch_array($runNotice)) {
		echo "
		  <tr bgcolor=\"#D8D6E7\" class=\"AA\">
			<td width=\"5%\" valign=\"top\">&nbsp;<img src=\"". $Images . "icons/pin.gif\" width=\"4\" height=\"4\"></td>
			<td width=\"95%\">
				  [<strong>$show[submitted_on]</strong>]<br>";
					$len = strlen($show[headlines]);
					if ($len >= 30) {
						$Notice	=	stripslashes($show[headlines]);
						echo substr($Notice,0,30) . "...<br>";
						echo "<div align=\"right\"><a href=\"#\" onClick=\"MM_openBrWindow('" . $AppConts . "ViewNotice.php?id=$show[id]','Notice','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">more</a> »</div>";
					}
					else {
						echo "$show[headlines]...<br>";
						echo "<div align=\"right\"><a href=\"#\" onClick=\"MM_openBrWindow('" . $AppConts . "ViewNotice.php?id=$show[id]','Notice','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">more</a> »</div>";						
					}
				  echo" 
			</td>
		  </tr>";
		}
	echo"</table>";
?>